Data from the Web
=================

File uploads need to be stored in directories. Other data needs to be stored in databases. This is only possible with certain combinations of permissions and ownerships on these directories and files. Some configurations may allow the uploads but they may make themselves to unwanted access and therefore be insecure.

Although changing file permissions allows data from the web to be stored, I think it is more secure to only change the ownership of the directory and / or file to the user that the web server runs as. For Apache on Ubuntu this is *www-data*.

SQLite
------

In this case the directory that the SQLite database is in and the database file itself should have their ownership changed to *www-data*. To do this use `cd` to navigate to the directory which contains the database file. I normally call this directory *sqlite*. Now use `ls -la` to check the permissions and ownerships:

.. code-block:: console
   :caption: navigate to and list directory containing the database

   myproject/sqlite$ ls -la
   total 461024
   drwxrwxr-x  2 ubuntu ubuntu      4096 Dec  7 00:28 .
   drwxrwxr-x 10 ubuntu ubuntu      4096 Dec  5 23:28 ..
   -rw-r--r--  1 ubuntu ubuntu 472076288 Dec  7 00:28 database.db

Then use `chown` to change the ownership and then `ls -la` again:

.. code-block:: console
   :caption: changing file and directory ownerships

   myproject/sqlite$ sudo chown www-data:ubuntu . ./database.db
   myproject/sqlite$ ls -la
   drwxrwxr-x  2 www-data ubuntu      4096 Dec  7 00:28 .
   drwxrwxr-x 10 ubuntu ubuntu      4096 Dec  5 23:28 ..
   -rw-r--r--  1 www-data ubuntu 472076288 Dec  7 00:28 database.db

File Uploads
------------

This is very similar to the situation with *SQLite* except that only the ownership of the directory in which the uploaded files are to be kept needs to be changed. If the files were to be stored in a directory called *photos* inside a directory called media, navigate to *media* and from there change the ownership of *photos*

.. code-block:: console
   :caption: changing directory ownership for file uploads

   myproject/media$ ls -la
   total 24
   drwxrwxr-x  6 ubuntu ubuntu 4096 Aug 30 21:38 .
   drwxrwxr-x 10 ubuntu ubuntu 4096 Dec  5 23:28 ..
   drwxrwxr-x  2 ubuntu ubuntu 4096 Aug 30 21:36 originals
   drwxrwxr-x  2 ubuntu ubuntu 4096 Aug 30 21:38 thumbnails

Now change the ownerships and list again:

.. code-block:: console
   :caption: changing directory ownership for file uploads

   myproject/media$ sudo chown www-data:ubuntu ./originals ./thumbnails
   myproject/media$ ls -la
   total 24
   drwxrwxr-x  6 ubuntu   ubuntu 4096 Aug 30 21:38 .
   drwxrwxr-x 10 ubuntu   ubuntu 4096 Dec  5 23:28 ..
   drwxrwxr-x  2 www-data ubuntu 4096 Aug 30 21:36 originals
   drwxrwxr-x  2 www-data ubuntu 4096 Aug 30 21:38 thumbnails

Issues
------

Now that the ownership of these directories and files has changed there may be some things which need to be considered when using them in a different context than through Apache which is the new owner. One example is that if the *SQLite* database is used via the *sqlite3* command line interface program it will only be possible to do read operations. If it is required to write to the database as required for creating tables adding or changing data then the ownership needs to be restored to *ubuntu* in order to do so.

