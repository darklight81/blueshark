<h3 align="center">Blueshark entry task</h3>

  <p align="center">
    Web application for a virtual address book.
  </p>
<p align="center">
    Estimated spent time ~5 hours.

  </p>


### Built With

* [PHP](https://www.php.net/)
* [Symfony](https://symfony.com/)
* [Doctrine](https://www.doctrine-project.org/)
* [Twig](https://twig.symfony.com/)
* [PostgreSQL](https://www.postgresql.org/)


### Prerequisites

* php 
* php-pgsql (I am using postgres, but you can use your preferable database)
* composer
* symfony

### Installation

1. Clone the repository
   ```sh
   git clone https://github.com/darklight81/blueshark.git
   ```
2. Install packages
   ```sh
   composer install
   ```
3. Set up your database in ```.env``` file, more information [here](https://symfony.com/doc/current/doctrine.html)
4. Create the database
    ```sh 
    php bin/console doctrine:database:create
    php bin/console make:migration
    php bin/console doctrine:migrations:migrate
    ```
5. Start the server
   ```sh
   symfony server:start
   ```
   Proceed to the web server to see the app. 
