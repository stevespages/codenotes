Updates
=======

The ubuntu operating system should be periodically updated

Firstly, update the ubuntu packages:

``sudo apt-get update``

Secondly, upgrade the packages:

``sudo apt-get upgrade``

Thirdly, `exit` bash session.

Fourthly, reboot the EC2 instance (`Reboot your instance <https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/ec2-instance-reboot.html>`_):

``EC2 > Instance state > Reboot instance``

**Note:** After clicking on "Reboot instance" it took a few minutes before I was able to to SSH back into my instance or connect to it using EC2 Instance Connect.
