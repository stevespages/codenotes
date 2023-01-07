Install MySQL
=============

See https://dev.mysql.com/doc/refman/8.0/en/

See https://www.digitalocean.com/community/tutorials/how-to-install-mysql-on-ubuntu-20-04

See https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-22-04

After running ``~$ apt-cache policy mysql-server`` to check that *mysql-server* package is available and which version will be installed, I ran ``~$ sudo apt install mysql-server``.

The output from the install showed that *mysqld*, the daemon, was now running as confirmed by:


.. code-block:: console
   :caption: Is mysql daemon running?

   steve@steve-Inspiron-3268:~$ ps ax | grep mysql
     10499 ?        Ssl    0:01 /usr/sbin/mysqld
     10695 pts/1    S+     0:00 grep --color=auto mysql
   steve@steve-Inspiron-3268:~$

We can also see that *mysql* is active and running like this:

.. code-block:: console
   :caption: mysql is active and running

   steve@steve-Inspiron-3268:~$ sudo service mysql status
   [sudo] password for steve: 
   ● mysql.service - MySQL Community Server
        Loaded: loaded (/lib/systemd/system/mysql.service; enabled; vendor preset: enabled)
        Active: active (running) since Wed 2022-11-23 15:07:42 GMT; 17min ago
       Process: 10491 ExecStartPre=/usr/share/mysql/mysql-systemd-start pre (code=exited, status=0/SUCC>
      Main PID: 10499 (mysqld)
        Status: "Server is operational"
         Tasks: 38 (limit: 9346)
        Memory: 364.2M
           CPU: 5.440s
        CGroup: /system.slice/mysql.service
                └─10499 /usr/sbin/mysqld
   
   Nov 23 15:07:39 steve-Inspiron-3268 systemd[1]: Starting MySQL Community Server...
   Nov 23 15:07:42 steve-Inspiron-3268 systemd[1]: Started MySQL Community Server.

We can use ``~$ sudo service mysql stop`` and ``~$ sudo service mysql start`` to stop and start *mysqld*.

Probably it would be better to use ``sytemctl`` than ``service``. Also probably *mysql-server* should be configured, using ``systemctl`` to close down when the computer is shut down and to automatically restart when the computer is turned on. The latter depends on the intended use of *mysql-server* and may not be a good idea in my case.

Note that I have not created any users or set any passwords yet. I think a *root* user has been created but no password has been created by the system.

Assuming the *mysqld* daemon is active, I can open up the MySQL prompt without specifying a user by running ``~$ mysql``. That gives me a ``mysql>`` prompt. This is shown below along with a successfull SQL statement:

.. code-block:: console
   :caption: Open the MySQL prompt and issue a Statement

   steve@steve-Inspiron-3268:~$ sudo mysql
   Welcome to the MySQL monitor.  Commands end with ; or \g.
   Your MySQL connection id is 9
   Server version: 8.0.31-0ubuntu0.22.04.1 (Ubuntu)
   
   Copyright (c) 2000, 2022, Oracle and/or its affiliates.
   
   Oracle is a registered trademark of Oracle Corporation and/or its
   affiliates. Other names may be trademarks of their respective
   owners.
   
   Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.
   
   mysql> show databases;
   +--------------------+
   | Database           |
   +--------------------+
   | information_schema |
   | mysql              |
   | performance_schema |
   | sys                |
   +--------------------+
   4 rows in set (0.00 sec)
   
   mysql> 

I can see what user I am by running ``mysql> SELECT user();``:

.. code-block:: console
   :caption: What user am I?

   mysql> SELECT user();
   +----------------+
   | user()         |
   +----------------+
   | root@localhost |
   +----------------+
   1 row in set (0.04 sec)
   
I guess if you do not specifiy a user when you open *mysql* you are automatically logged in as *root*. Note that you can log in with ``sudo mysql`` as I did earlier or ``sudo mysql -u root -p``. In the latter case you are asked for a password but just hitting the enter key is OK presumably because there is no password associated with the root account.

I can make a database:

.. code-block:: console
   :caption: Make a database

   mysql> CREATE DATABASE steve_test_db;
   Query OK, 1 row affected (0.20 sec)
   
   mysql> show databases;
   +--------------------+
   | Database           |
   +--------------------+
   | information_schema |
   | mysql              |
   | performance_schema |
   | steve_test_db      |
   | sys                |
   +--------------------+
   5 rows in set (0.00 sec)

Now we can use the new database:

.. code-block:: console
   :caption: Use the database...

   mysql> USE steve_test_db
   Database changed
   mysql> 

Then we make a table and display details about it and put some data in it:

.. code-block:: console
   :caption: Make table, show it, add data and extract the data...

   mysql> CREATE TABLE test (col1 VARCHAR(50));
   Query OK, 0 rows affected (0.55 sec)
   
   mysql> DESCRIBE test;
   +-------+-------------+------+-----+---------+-------+
   | Field | Type        | Null | Key | Default | Extra |
   +-------+-------------+------+-----+---------+-------+
   | col1  | varchar(50) | YES  |     | NULL    |       |
   +-------+-------------+------+-----+---------+-------+
   1 row in set (0.07 sec)
   
   mysql> INSERT INTO test VALUE ("Some data");
   Query OK, 1 row affected (0.14 sec)
   
   mysql> SELECT * FROM test;
   +-----------+
   | col1      |
   +-----------+
   | Some data |
   +-----------+
   1 row in set (0.00 sec)

How about making a database from a script? A file was created in the same directory as the mysql session is open in. It is called *makedatabase.sql* and consists of just one line ``CREATE DATABASE my_new_db;``. Now we use ``source`` from the *mysql>* prompt to run the SQL in the file and then ``show databases`` to demonstrate that it worked:

.. code-block:: console
   :caption: source SQL from a file

   mysql> source ./makedatabase.sql
   Query OK, 1 row affected (0.16 sec)
   
   mysql> show databases;
   +--------------------+
   | Database           |
   +--------------------+
   | information_schema |
   | my_new_db          |
   | mysql              |
   | performance_schema |
   | steve_test_db      |
   | sys                |
   +--------------------+
   6 rows in set (0.02 sec)

Install MySQL Workbench
-----------------------

Make sure *mysqld* is active (running) using ``sudo service mysql status`` (``systemctl``?) although this may not be necessary??

Now run ``sudo apt-get -y install mysql-workbench-community``...

.. code-block:: console
   :caption: woops no package!

   steve@steve-Inspiron-3268:~$ sudo apt-get -y install mysql-workbench-community
   [sudo] password for steve: 
   Reading package lists... Done
   Building dependency tree... Done
   Reading state information... Done
   
   No apt package "mysql-workbench-community", but there is a snap with that name.
   Try "snap install mysql-workbench-community"
   
   E: Unable to locate package mysql-workbench-community

So, I ran ``snap install mysql-workbench-community`` and the GUI program is now available on my Desktop but I found I could not connect to MySQL using the MySQL Connections box displayed on the Welcome Screen of MySQL Workbench. The box had: *Local instance 3306, root, localhost:3306* written in it. I thought this might be because I had not run *mysql_secure_installation* so I did this but first I had to set a password for MySQL which I had not done at installation.

Setting root password for MySQL
-------------------------------

I did ``sudo mysql`` and then ``mysql> ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';`` where ``password`` was an actual 8 char long password. That means now when I run ``sudo mysql`` I am prompted for that password.

mysql_secure_installation
-------------------------

The console input and output for this is shown below

.. code-block:: console
   :caption: mysql_secure_installation wizard

   steve@steve-Inspiron-3268:~$ sudo mysql_secure_installation
   
   Securing the MySQL server deployment.
   
   Enter password for user root: 
   
   VALIDATE PASSWORD COMPONENT can be used to test passwords
   and improve security. It checks the strength of password
   and allows the users to set only those passwords which are
   secure enough. Would you like to setup VALIDATE PASSWORD component?
   
   Press y|Y for Yes, any other key for No: n 
   Using existing password for root.
   Change the password for root ? ((Press y|Y for Yes, any other key for No) : n
   
    ... skipping.
   By default, a MySQL installation has an anonymous user,
   allowing anyone to log into MySQL without having to have
   a user account created for them. This is intended only for
   testing, and to make the installation go a bit smoother.
   You should remove them before moving into a production
   environment.
   
   Remove anonymous users? (Press y|Y for Yes, any other key for No) : n
   
    ... skipping.
   
   
   Normally, root should only be allowed to connect from
   'localhost'. This ensures that someone cannot guess at
   the root password from the network.
   
   Disallow root login remotely? (Press y|Y for Yes, any other key for No) : y
   Success.
   
   By default, MySQL comes with a database named 'test' that
   anyone can access. This is also intended only for testing,
   and should be removed before moving into a production
   environment.
   
   
   Remove test database and access to it? (Press y|Y for Yes, any other key for No) : n
   
    ... skipping.
   Reloading the privilege tables will ensure that all changes
   made so far will take effect immediately.
   
   Reload privilege tables now? (Press y|Y for Yes, any other key for No) : y
   Success.
   
   All done!

Sadly this did not solve the problem of not being able to connect to MySQL from the Workbench. I finally found this post: https://askubuntu.com/questions/1242026/cannot-connect-mysql-workbench-to-mysql-server. On the advice in the post I ran: ``connect mysql-workbench-community:password-manager-service :password-manager-service``. Now I can connect from the Workbench. From the post: 
    
    However, a Snap package is sandboxed; it is not by default allowed to access this service. When you choose "Store in keychain" MySQLWorkbench is blocked by AppArmor.
    
    You need to enter a command to allow this package to access the service. The command is: ``connect mysql-workbench-community:password-manager-service :password-manager-service``

Using MySQL Workbench
---------------------

Start by using the root account to make an *admin* account. Grant all *Administrative Roles*, leave *Account Limits* all at 0 (??). Grant *admin*. For *Schema Privileges*, allow access to all databases (ie. do nothing). Click *Apply* to create the account. Add a connection to home screen selecting defaults, save the password in the keychain.  
