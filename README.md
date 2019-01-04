# Laravel-CMS-CRUD
Basic CRUD app with invitation-based registration.

<b>Installation</b>

``` 
composer install
php artisan key:generate
php artisan migrate
```  

Remember to modify your .env file to connect to a mail driver and database.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog
DB_USERNAME=example
DB_PASSWORD=

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=example@gmail.com
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls
```

<b>Adding users</b> <br>
To create first user (admin) you need to use command line
``` 
php artisan create:admin
```

After that, you can go to localhost/login and log in. Now you should be able to send invitation to other users.
