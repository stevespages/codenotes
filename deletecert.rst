Delete Let's Encrypt Cert
=========================

.. code-block:: console
   :caption: deleting a cert

   ubuntu@ip-172-31-32-80:~$ sudo certbot certificates
   Saving debug log to /var/log/letsencrypt/letsencrypt.log
   
   - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
   Found the following certs:
     Certificate Name: bgrgolf.com
       Serial Number: 39a7eff2c2a2c181a1e34df20f5b4fe44cf
       Key Type: RSA
       Domains: bgrgolf.com learntospell.org.uk stevespages.org.uk wcvpnamer.org www.bgrgolf.com www.learntospell.org.uk www.stevespages.org.uk www.wcvpnamer.org
       Expiry Date: 2023-01-05 20:10:56+00:00 (VALID: 89 days)
       Certificate Path: /etc/letsencrypt/live/bgrgolf.com/fullchain.pem
       Private Key Path: /etc/letsencrypt/live/bgrgolf.com/privkey.pem
     Certificate Name: hanningtonlogs.co.uk
       Serial Number: 42d66d22368d39eca2872b2422ffea74bcb
       Key Type: RSA
       Domains: hanningtonlogs.co.uk wcvpnamer.org www.hanningtonlogs.co.uk www.wcvpnamer.org
       Expiry Date: 2022-10-23 14:56:44+00:00 (VALID: 15 days)
       Certificate Path: /etc/letsencrypt/live/hanningtonlogs.co.uk/fullchain.pem
       Private Key Path: /etc/letsencrypt/live/hanningtonlogs.co.uk/privkey.pem
     Certificate Name: learntospell.org.uk
       Serial Number: 4a2d22ac6aeb9bb0ccf02aad849ebf4653a
       Key Type: RSA
       Domains: learntospell.org.uk
       Expiry Date: 2022-11-28 17:22:27+00:00 (VALID: 51 days)
       Certificate Path: /etc/letsencrypt/live/learntospell.org.uk/fullchain.pem
       Private Key Path: /etc/letsencrypt/live/learntospell.org.uk/privkey.pem
     Certificate Name: stevespages.org.uk
       Serial Number: 383f71e03f8ac6530a0a337b387522734cf
       Key Type: RSA
       Domains: stevespages.org.uk
       Expiry Date: 2022-11-28 19:11:07+00:00 (VALID: 51 days)
       Certificate Path: /etc/letsencrypt/live/stevespages.org.uk/fullchain.pem
       Private Key Path: /etc/letsencrypt/live/stevespages.org.uk/privkey.pem
   - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
   ubuntu@ip-172-31-32-80:~$R
   
   
   ubuntu@ip-172-31-32-80:~$ sudo certbot delete
   Saving debug log to /var/log/letsencrypt/letsencrypt.log
   
   Which certificate(s) would you like to delete?
   - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
   1: bgrgolf.com
   2: hanningtonlogs.co.uk
   3: learntospell.org.uk
   4: stevespages.org.uk
   - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
   Select the appropriate numbers separated by commas and/or spaces, or leave input
   blank to select all options shown (Enter 'c' to cancel): 2
   
   - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
   The following certificate(s) are selected for deletion:
   
     * hanningtonlogs.co.uk
   
   WARNING: Before continuing, ensure that the listed certificates are not being
   used by any installed server software (e.g. Apache, nginx, mail servers).
   Deleting a certificate that is still being used will cause the server software
   to stop working. See https://certbot.org/deleting-certs for information on
   deleting certificates safely.
   
   Are you sure you want to delete the above certificate(s)?
   - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
   (Y)es/(N)o:
