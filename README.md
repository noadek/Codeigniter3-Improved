# Codeigniter3-Improved
A codeigniter 3 improvement attempt before codeigniter 4 is officially released. It adds various libraries and classes from different sources.
## Installation
If you do not already have it installed visit: https://getcomposer.org/ to download and install.

Switch to the codeigniter3-improved directory from your terminal or cmd prompt and run `composer install`

Composer will pull in all the required files to get you up and running.

See resources below to setup Migrations.

## Improvements
Here are some of the improvements.
1. Better routing class.
2. ORM based on Laravel's Eloquent.
3. Twig templating engine for easier layout, creation of themes and templates.
4. Better migrations
5. dotenv file for sensitive configurations.

These improvements do not stop you from sticking to the original Codeigniter methods. i.e. you could still use CI's original routing, views, models and migration.

## Resources

* Routing: http://cibonfire.com/docs/developer/routes

* Templating:
  * Twig: http://twig.sensiolabs.org/doc/tags/extends.html
  * Twiggy library: http://edmundask.github.io/codeigniter-twiggy/

* Database: https://github.com/illuminate/database

* Migrations: http://docs.phinx.org/en/latest/migrations.html

* .ENV: https://github.com/vlucas/phpdotenv

## Contributing
Thank you for considering contributing to this project! There's room for a lot more improvements, I only ask that you stick to Codeigniter's model of keeping things a simple as possible. That's the major reason I have omitted using DI containers here.
