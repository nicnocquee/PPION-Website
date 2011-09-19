## Requirements

1. PHP 5+.
2. MySQL.

## Database

1. Create a new database in MySQL with name: `ppion`. Can be anything, doesn't need to be `ppion`, but make sure to assign the database name in `application/config/database.php` (the database name you created in the mysql should be the same as the database name you define in database.php file).

2. Open Terminal (Unix/Mac).

3. Go to `application` directory in the root folder of this app.

4. Run this: `php doctrine.php orm:schema-tool:create`

5. If no error, the tables should be created in the database.

6. Populate the database with some dummy data, for example using phpmyadmin.

## Setting up VirtualHost in MAMP (Mac)

1.  Open `/Applications/MAMP/conf/apache/httpd.conf` file.

2.  Add the following at the end of the file:

        NameVirtualHost *
        <VirtualHost *>
            ServerName ppion.local
            DocumentRoot /path/to/root/folder/of/this/app

            SetEnv APPLICATION_ENV "development"

            <Directory /path/to/root/folder/of/this/app>
                DirectoryIndex index.php
                AllowOverride All
                Order allow,deny
                Allow from all
            </Directory>
        </VirtualHost>

3.  Save it.

4.  Edit the host database of your Mac in `/etc/hosts` file. You will need root access.

5.  Add `ppion.local` after the localhost. For example,

        127.0.0.1       localhost ppion.local
    
6.  Flush the DNS by running this: `dscacheutil -fluscache`

7.  Restart Apache.

7.  Open browser then go to `http://ppion.local:8888/`