#Sabre Recruitement Task

To run this project you need:
* PHP 7.2.5 or higher
* Composer
* Node.js and NPM
* MariaDB database (set your MariaDB version at the end of the DATABASE_URL variable)
* Symfony CLI

After cloning the project navigate to the root project directory and modify the .env file.
Inside the file change the DATABASE_URL variable so that it matches with the credentials to your database.

Before you proceed, you have to configure all necessary dependencies. To do that, run the following command:
~~~
composer install
~~~

This should install all the necessary composer dependencies. After that, go ahead and install the NPM dependencies too. To do that, run:
~~~
npm install
~~~

After all dependencies are installed, you can proceed to the next step.

Please run the command:
~~~
php bin/console doctrine:database:create
~~~
This should create a database called "sabre". After that, you have to generate a migration to create all required tables in your database. To do that, run:
~~~
php bin/console make:migration
~~~
This should put a new file inside your migrations directory. Now you need to execute the migration by running:
~~~
php bin/console doctrine:migrations:migrate
~~~
The last thing that you have to do before you run the project is generating all necessary CSS and JS files. To do that, run:
~~~
npm run encore
~~~
After this, you should be able to easily start the project by running the following command in the root directory of the project:
~~~
symfony server:start
~~~
If everything went right, you should be able to see the site by visiting http://localhost:8000
