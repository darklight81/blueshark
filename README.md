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
* php-pgsql (I'll be using postgres, but it's up to you)
* composer
* symfony

### Installation

_Below is an example of how you can instruct your audience on installing and setting up your app. This template doesn't rely on any external dependencies or services._

1. Clone the repository
   ```sh
   git clone https://github.com/darklight81/blueshark.git
   ```
2. Install packages
   ```sh
   composer install
   ```
3. Set up your database in ```.env``` file, more information [here](https://symfony.com/doc/current/doctrine.html)
4. Create a database
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
