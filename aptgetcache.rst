apt-get and apt-cache
=====================

These commands can be substituted by the newer, *apt*, command which uses these commands.

Package Info
------------

In order to obtain information about a package which is available on your system you have to know the name of the package eg *mysql-server* not *mysql*. If we try with the wrong name or the correct name of a package but one which is not on our system:

.. code-block:: console
   :caption: package does not exist

   steve@steve-Inspiron-3268:~$ apt-cache policy mysql
   N: Unable to locate package mysql


Now for a package that does exist:

.. code-block:: console
   :caption: package does exist

   steve@steve-Inspiron-3268:~$ apt-cache policy mysql-server
   mysql-server:
     Installed: (none)
     Candidate: 8.0.31-0ubuntu0.22.04.1
     Version table:
        8.0.31-0ubuntu0.22.04.1 500
           500 http://gb.archive.ubuntu.com/ubuntu jammy-updates/main amd64 Packages
           500 http://gb.archive.ubuntu.com/ubuntu jammy-updates/main i386 Packages
           500 http://security.ubuntu.com/ubuntu jammy-security/main amd64 Packages
           500 http://security.ubuntu.com/ubuntu jammy-security/main i386 Packages
        8.0.28-0ubuntu4 500
           500 http://gb.archive.ubuntu.com/ubuntu jammy/main amd64 Packages
           500 http://gb.archive.ubuntu.com/ubuntu jammy/main i386 Packages


