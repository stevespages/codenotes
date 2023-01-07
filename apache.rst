Apache
======

Configuration
-------------

See https://httpd.apache.org/docs/current/configuring.html

In debian config file is at */etc/apache2/apache2.conf*

.. code-block:: console
   :caption: config filesa

   $ ls -la /etc/apache2/
   total 96
   drwxr-xr-x   8 root root  4096 Nov 20 02:06 .
   drwxr-xr-x 136 root root 12288 Dec  8 18:50 ..
   -rw-r--r--   1 root root  7224 Jun 14 13:30 apache2.conf
   drwxr-xr-x   2 root root  4096 Nov 20 02:05 conf-available
   drwxr-xr-x   2 root root  4096 Nov  8 23:32 conf-enabled
   -rw-r--r--   1 root root  1782 Mar 23  2022 envvars
   -rw-r--r--   1 root root 31063 Mar 23  2022 magic
   drwxr-xr-x   2 root root 12288 Dec  7 16:49 mods-available
   drwxr-xr-x   2 root root  4096 Nov  8 23:32 mods-enabled
   -rw-r--r--   1 root root   320 Mar 23  2022 ports.conf
   drwxr-xr-x   2 root root  4096 Nov 20 02:06 sites-available
   drwxr-xr-x   2 root root  4096 Nov  8 23:32 sites-enabled

Editing apache2.conf
--------------------

Note that ``sudo apachectl configtest`` can be used to test configuration files for syntax errors. Omitting the *sudo* might result in an syntax error being reported (presumably because the test can not run properly as some files may need to be accessed that can only be accessed with *sudo*. If all is well you should see: ``Syntax OK``.

Apache directives can be seen at https://httpd.apache.org/docs/current/mod/directives.html

To prevent Apache listing the contents of directories I modified the `Indexes` directive. First ``vim /etc/apache2/apache2.conf*`` then search for Indexes. This showed:

.. code-block:: console
   :caption: inside apache2.conf

   <Directory /var/www/>
           Options Indexes FollowSymLinks
           AllowOverride None
           Require all granted
   </Directory>

The word *Indexes* was edited to read *-Indexes*, and the word *FollowSymLinks* was edited to read *+FollowSymLinks*. A comment was made and the file saved. Now this part of *apache2.conf* looks like this:

.. code-block:: console
   :caption: inside apache2.conf

   <Directory /var/www/>
   # I added the - and + on the next line:
           Options -Indexes +FollowSymLinks
           AllowOverride None
           Require all granted
   </Directory>

Note that it is a syntax error to mix options which are preceeded by a - or + with options which are not. That is why I had to put a + in front of *FollowSymLinks*. See https://httpd.apache.org/docs/2.4/mod/core.html#options for more information on this issue and also on the *Options* directive generally.

It is necessary to restart Apache in order for configuration changes to be applied.
