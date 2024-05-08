# UNISHARK
## Requirement
[XAMPP](https://www.apachefriends.org/) Version: 8.2.12 or later 
## Prestige
- Change `DocumentRoot` to in Apache `httpd.conf` file, can be access from `XAMPP` -> `Apache config` 
    ``` cmd
    directory/to/this/repo/src/
    ```
- Start Apache and MySQL service from XAMPP
- Open PHPAdmin of XAMPP, create a new database name `btl`
- Click on import tab and import this database file: [btl.sql](./btl.sql)
## Getting started
- Visit the web at [localhost](http://localhost/)
- Credentials for database: 
```
username: root
password: ""
databasename: btl
```
- Credentials for test user:
```
username: haha
password: test
```
- Login path for admin: [admin](http://localhost/admin/login.php)
- Credentials for admin:
```
username: admin
password: admin
```
## Noted:
- Password is hashed when store in database




