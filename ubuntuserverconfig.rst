Ubuntu Server Configuration
===========================

The aim is to take a newly installed Ubuntu Server OS and configure it to serve virtual hosts on Apache through HTTPS. A bash script could be used which would be more reproducible and lead to better documentation of the configuration. However mainly because of the difficulty of dealing with interactive commands a step by step approach was taken.

When Ubuntu installs it creates a root user and a user called ubuntu which does not have a password. The ubuntu user can use sudo. We will configure the Ubuntu server for one user, who will be ubuntu, to manage the server including all the virtual hosts on it. If it was intended that more than one user would be managing the server, perhaps different users for different virtual hosts, a specific multi user configuration would be required.

The single user approach means that only the ownership of /var/www needs to be altered. Its owner is changed from root to ubuntu. Multi user configurations would require more complex ownership changes and probably require the SGID bit to be changed for certain directories. One option for multiusers would be to make a soft link from their ~/Public directory to the directory in /var/www which their website content should be.

Connecting to the server is not discussed here but could be through a product specific console or CLI or by working directly on the server machine or through an SSH connection.

Configuration
-------------

# Configuration should be done as user, ubuntu.

# For scripts apt-get is more stable than apt. I will use it here.

.....................................................................

# Update the package information in the list of repositories

``sudo apt-get update``

.....................................................................

# Upgrade all packages in the list of repositories

# When dialog box appears hit enter key

``sudo apt-get -y install apache2``

.....................................................................

# Install latest stable PHP and PHP module for Apache

# When dialog box appears hit entre key

``sudo apt-get install php libapache2-mod-php``

.....................................................................

# Install SQLite and PHP-SQLite

# Do you have to specify a version for PHP?

``sudo apt-get -y install sqlite3 php8.1-sqlite3``

.....................................................................

# Change ownership of /var/www/ from root to ubuntu

# Now ubuntu can create dirs & files in www/

``sudo chown -R ubuntu:ubuntu /var/www``

.....................................................................

# Make dirs for web content for each virtual host

# Note sudo is not needed and we want dirs to be owned by ubuntu

# The -p option creates intermediary dirs

``mkdir -p /var/www/wcvpnamer.org/public_html``

``mkdir -p /var/www/hanningtonlogs.co.uk/public_html``

.....................................................................

# Put some HTML in index.html file inside the public_html dirs

# This is just so we can test the server is working.

``echo "<html><head><title>WCVPNamer</title></head><body><h1>WCVPNamer</h1><?php echo '<p>from PHP</p>'; ?></body></html>" > /var/www/wcvpnamer.org/public_html/index.php``

``echo "<html><head><title>Hannington Logs</title></head><body><h1>Hannington Logs</h1><?php echo '<p>from PHP</p>'; ?></body></html>" > /var/www/hanningtonlogs.co.uk/public_html/index.php``

.....................................................................

# Create and edit the Apache config files

# Create two files: wcvpnamer.org.conf and hanningtonlogs.co.uk.conf

# These files should be in the /etc/apache2/sites-available/ dir

# If using a script redirect a series echo statements to config file

# Alternatively use vim to create:

.. code::

        # Edit wcvpnamer.org.conf to contain:
        <VirtualHost *:80>
        ServerName wcvpnamer.org
        ServerAlias www.wcvpnamer.org
        DocumentRoot /var/www/wcvpnamer.org/public_html
        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined
        </VirtualHost>

.. code::

        # Edit hanningtonlogs.co.uk.conf to contain
        <VirtualHost *:80>
        ServerName hanningtonlogs.co.uk
        ServerAlias www.hanningtonlogs.co.uk
        DocumentRoot /var/www/hanningtonlogs.co.uk/public_html
        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined
        </VirtualHost>

.....................................................................

# Enable the virtual hosts

``sudo a2ensite wcvpnamer.org.conf``

``sudo a2ensite hanningtonlogs.org.conf``

.....................................................................

# Disable the default site

``sudo a2dissite 000-default.conf``

.....................................................................

# Reload Apache to make changes take effect 

``sudo systemctl reload apache2``

.....................................................................

# Go to http://wcvpnamer.org and http://hanningtonlogs.co.uk

# It should work but with warnings because we are using http not https

.....................................................................

# Obtain Let's Encrypt certificates for using https for our domains

# We need certbot. This can be installed using snap on ubuntu

``sudo snap install --classic certbot``

.....................................................................

# To enable the certbot command to run:

``sudo ln -s /snap/bin/certbot /usr/bin/certbot``

.....................................................................

# Get and install certificates

# This changes wcvpnamer.org.conf and hanningtonlogs.co.uk.conf

# It creates wcvpnamer.org-le-ssl.conf and hanningtonlogs.co.uk-le-ssl.conf

# The configuration enables https to be used for these domains

# It also configures requests to http to redirect to https

# A debug log is created at /var/log/letsencrypt/letsencrypt.log

# This is interactive and various questions need responses

# In order to obtain one certificate per domain run this command...

# ... then choose just one domain plus any of its subdomains such...

# ... as example.com and www.example.com. Then run this command...

# ... again for other.com and www.other.com. 

``sudo certbot --apache``

.....................................................................

Miscellaneous
-------------

Although this all worked fine, if I put the IPv4 address into a browser I get the website belonging to the virtual host which comes first in the alphabet. I guess this does not matter.

It would be good to find a way to record all the commands and responses during the configuration for reproducibility, troubleshooting etc. That would probably be facilitated by running everything as a bash script assuming the difficulties related to the requirement for user interaction could be solved.

