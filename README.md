## Requirements

1. PHP 5+.
2. MySQL.

## Database

1. Create a new database in MySQL with name: `ppion`. Can be anything, but make sure to assign the database name in `application/config/database.php`.

2. Open Terminal (Unix/Mac).

3. Go to `application` directory.

4. Run this: `php doctrine.php orm:schema-tool:create`

5. If no error, the tables should be created in the database.

6. Populate the database with some dummy data, for example using phpmyadmin.



