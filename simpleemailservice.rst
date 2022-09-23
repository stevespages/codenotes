AWS EC2 SES SMTP PHPMailer
==========================

https://docs.aws.amazon.com/ses/latest/dg/setting-up.html

An AWS EC2 instance will be launched. Apache and PHP will be installed. SES will then be configured so that email can be sent from a PHP script. The script will use PHPMailer, installed using Composer.

An EC2 instance running Ubuntu 22.04 was launched from the AWS console. I followed the CodeNotes Ubuntu Server Configuration to install  Apache and PHP. However after I ran ``sudo chown -R ubuntu:ubuntu /var/www`` (which changes /var/www/ and /var/www/html directory ownerships to ubuntu from root), I then used the html directory as the root directory for my application to test SES.

I replaced the default index.html file in /var/www/html with an index.php file and now I can browse to http://<ipV4-address> and see the index.php file displayed as a web page.

Note that with SES you can only send email from addresses or domains that you prove to Amazon you own. 

Overview
--------

In order to be able to use PHPMailer (or other email software) to send emails we will need the following:

- Ubuntu Server running PHP and Apache
- Composer Package manager
- PHPMailer
- A verified domain, subdomain or email address as 'From' address
- An smtp_username and password for your Amazon SES account
- An SES SMTP endpoint host for an appropriate AWS region

The following sections help explain how to obtain these requirements.

SES SMTP Credentials
--------------------

https://docs.aws.amazon.com/ses/latest/dg/send-email-concepts-credentials.html

You need SMTP credentials for sending an email using the Amazon SMTP interface. SES SMTP credentials are a type of IAM credential. The credentials used are unique to each AWS Region. An IAM user can create SES SMTP credentials if the IAM user's policy gives them permissions to access the following actions:

- iam:ListUsers
- iam:CreateUser
- iam:CreateAccessKey
- iam:PutUserPolicy

Create SES SMTP Credentials
---------------------------

https://docs.aws.amazon.com/ses/latest/dg/smtp-credentials.html

- From Amazon Console go to Simple Email Service and click on SMTP Settings
- Click on 'Create SMTP credentials'
- Enter or accept name of new IAM user and click Create
- Show the Credentials and save them

Sender Identity
---------------

https://docs.aws.amazon.com/ses/latest/dg/creating-identities.html#verify-domain-procedure

(I think that) SES only allows emails to be sent from a verified sender identity which corresponds either to a verified domain subdomain or email address. For domains verification is through updates in the DNS records. For email, verification is through clicking a link in  a verification email. You can verify both a domain and an email address in that domain. This will allow a greater range of capabilities than just one form of verification. To verify the  identity of a domain:

- go to SES
- Ensure correct region is chosen at top of page
- Click Verified identities
- Click Create identity
- Select Domain
- Type in domain name
- Assign a default configuration set ??? I did not tick the box.
- Use a custom MAIL FROM domain. The MAIL FROM address must align with the From address which is necessary for DMARC. Can this be achieved from within the app? It can be done later. I did not tick the box.
- DKIM-based domain verification. If the domain is registered with Route 53, SES will automatically update the DNS server (unless otherwise desired).
- Tags can be added for organization of resources.
- Click Create identity
- CNAME records get added to the domain's Route 53 DNS record

I went through this procedure with the wrong region selected at the top of the page. So, I deleted the Domain identity and redid it correctly. I do not think the CNAME records added in the first attempt were removed. I removed the old records from the DNS record. They could be identified as they were the CNAME records not in the SES -> Verified identity -> DKIM section for the domain. 

Send Test Email
---------------

- Go to SES -> Verified identities
- Click on an identity name
- Click 'Send test email'
- Type in the part of the address before @ for the From-address
- You can choose various test scenarios or send it to an Amazon verified email address.
- Put in a Subject and (optional) body
- Choose configuration set (optional)
- Send test email
- On the domain identity detail page, a message appeared
  - Successfully sent a test email to success@simulator.amazonses.com

Get Out of the Sandbox
----------------------

https://docs.aws.amazon.com/ses/latest/dg/request-production-access.html

New accounts are placed in the SES sandbox:

- Mail can only be sent to verified email addresses and domains or the SES mailbox simulator.
- only! 200 messages can be sent per 24 hours
- You can send a max of 1 email per second

When out of the sandbox you can send to any email but you have to verify the identities of 'From', 'Sourse', 'Sender' or 'Return-Path' addresses.

Request account removal from sandbox:

- Does this apply to all verified identities (domains and email addresses)?
- SES -> Account dashboard
- Choose Request production access
- Fill up the form and submit
- It may take up to 24 hours...

SES SMTP Endpoints
------------------

https://docs.aws.amazon.com/ses/latest/dg/smtp-connect.html

To send email using the SES SMTP interface you connect to an SMTP endpoint. See: https://docs.aws.amazon.com/general/latest/gr/ses.html

For Europe, London (Region: eu-west-2) the SMTP endpoint is email-smtp.eu-west-2.amazonaws.com and the associated protocol is SMTP. The value of the SMTP endpoint is used in the PHPMailer script which sends email(s).

Connections should be encrypted using STARTTLS (ports 25, 587 or 2587) or TLS Wrapper (ports 465 and 2465). The choice may depend on the software you use eg PHPMailer

STARTTLS
--------

- SMTP client connects to SES SMTP endpoint on port 25, 287 or 2587
- SMTP client issues EHLO command
- Server announces it supports STARTTLS SMTP extension
- SMTP client issues STARTTLS command, initiating TLS negotiation
- SMTP client issues EHLO command over encrypted connection
- SMTP session proceeds

Remove Throttle on Port 25
--------------------------

This is unnecessary as you can use port 587.

This seems to be specific to a single EC2 instance. So it is probably not worth doing for 

https://aws.amazon.com/premiumsupport/knowledge-center/ec2-port-25-throttle/

- Route 53 (or DNS record if hosted elsewhere)
- Choose Hosted zones
- Select a zone
- Create Record
- Choose Simple routing -> Next
- Click 'Define simple record'
- Record Name, IP address of EC2 instance
- Click 'Define simple Record'
- Click 'Create Records'
- Request to remove the port 25 restriction on your instance
- Choose Support Centre
- Click Create Case
- Select Service limit increase
- Limit Type: EC2 email
- Open the link for EC2 email
- Type in your email address (for correspondence I think) and Use case.
- Optionally, fill in Elastic IP address and Reverse DNS record. This can help reduce the liklihood of emails being delivered to Spam. Hopefully the information can be supplied at a later date.
- Submit
- You should get an email telling you the port 25 restriction has been removed.
- Create A record pointing to IP address of EC2 instance that will be hosting the SMTP service.
-

Using SES SMTP to send email
----------------------------

https://docs.aws.amazon.com/ses/latest/dg/send-email-smtp.html

Send Emails with PHP via SES SMTP
---------------------------------

First install composer into /var/www/html/. To run a composer command type ``php composer.phar`` which is lovely because I quite like typing. You could use ``mv`` to put composer.phar into a directory in your PATH variable either for access by all users or just by a given user. I am going to leave it in the project directory.

https://docs.aws.amazon.com/ses/latest/dg/send-using-smtp-programmatically.html

Problems
--------

https://docs.aws.amazon.com/ses/latest/dg/troubleshoot-smtp.html

