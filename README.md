# Ambitions
A project for my undergraduate thesis in 2014, built entirely in pure PHP, framework-free, to demonstrate the use of logic without any framework's aid. It was a small social media website based on individual goals.

### Requirements

+ [PHP 5.4](http://php.net/)
+ [Apache 2](https://www.apache.org/)
+ [MySQL](https://www.mysql.com/)

### Running

- Import the /ambitions.sql file (see `#database` section)
- Run on localhost

### Database

- Using PDO library
- Project expects a local database called `samaritan` with user `root` and no password. Feel free to change this on /app/model/connection.class.php

### Observations

- The Facebook API has gone through several changes since this project was made, so the `login with facebook` option is no longer available.
