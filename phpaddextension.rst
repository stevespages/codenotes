PHP: Add an Extension
=====================

The following relates to the GD Graphics Extension but I think the process is similar for most extensions.

The output of `phpinfo()` may indicate whether an extension is enabled. If GD is enabled there will be a section for it showing configuration for it. Also, of course, it should be possible to use the extension (for example functions provided by the extension).

Also looking at `phpinfo()` will give the name and path of the main configuration file. I found that this was `/etc/php/8.1/apache2/php.ini`. It also gives the name and path of a directory to scan for additional `.ini` files. In my case it is `/etc/php/8.1/apache2/conf.d/`. The `conf.d` directory has a lot of file links to files in a `mods-available` directory. For example:

.. code-block:: console
   :caption: an entry in conf.d

   lrwxrwxrwx 1 root root   34 Dec  7 00:19 20-gd.ini -> /etc/php/8.1/mods-available/gd.ini

Much of the above information is not necessary for installing a new extension which, at least in some cases, is very simple. The `answer <https://stackoverflow.com/questions/74710049/how-to-install-gd-extension-for-php?noredirect=1#comment131863399_74710049>`_ to my Stack Overflow question is probably sufficient:

    You can run php -v to see what version of PHP you have on the machine. After that, you can run sudo apt-get install php<your-php-version>-gd, e.g. sudo apt-get install php8.1-gd. Hope it helps!

Configuration seems to be handled automatically as there was no need for me to change anything. Doing the above worked. I do not know if it started and stopped Apache but I did not have to do that. I assume that the file link in `conf.d` and the file it links to in `mods-available` were generated automatically.
