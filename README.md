# Codeigniter3-Improved
A codeigniter 3 improvement attempt before codeigniter 4 is officially released. It adds various libraries and classes from different sources.
## Installation
If you do not already have it installed visit: https://getcomposer.org/ to download and install.

Switch to the codeigniter3-improved directory from your terminal or cmd prompt and run
```bash
composer install
```

Composer will pull in all the required files to get you up and running.

See resources below to setup Migrations.

## Improvements
These improvements do not stop you from sticking to the original Codeigniter methods. i.e. you could still use CI's original routing, views, models and migration.

### 1. Better routing class
Your routes.php will now look like this:
```php
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

Route::any('account', 'welcome/account');
Route::post('login' 'welcome/login');

$route = Route::map($route);
```
See resources to learn more

### 2. ORM based on Laravel's Eloquent.
You can now create using Eloquent. For example a model: application/models/post.php will look like this
```php
<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Post extends Eloquent
{
	protected $table = 'posts';
}
```
and can be used like this in
```php
<?php
...

$this->load->database();
$this->load->model('post');

// display post with id '1'
print_r(Post::find(1));

// insert a post

$post = new Post;

$post->title = 'post title';

$post->save();

//update a post
$post = Post::find(1);

$post->title = 'New post title';

$post->save();

// delete a post
$post = Post::find(1);

$post->delete();
```
See resources to learn more

### 3. Twig templating engine for easier layout, creation of themes and templates.
Twiggy follows a specific theme-layout-template structure that helps separates your logic from your views. You can create multiple themes and layouts and switch themes and layout on the fly!

1. Create a directory structure:

	```
    +-application/
    | +-themes/
    | | +-default/
    | | | +-layouts/
	```

2. Create a default layout `index.html.twig` and place it in layouts folder:

	```
    <!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->
			<title>Default layout</title>
		</head>
        <body>
            {% block content %}

            {% endblock %}
		</body>
	</html>
	```

3. Create a default template file `index.html.twig` at the root of `default` theme folder:

	```
	{% extends _layout %}

	{% block content %}

		Default template file.

	{% endblock %}
	```

4. You should end up with a structure like this:

	```
    +-application/
    | +-themes/
    | | +-default/
    | | | +-layouts/
    | | | | +-index.html.twig
    | | | +-index.html.twig
	```

5. Use twiggy in controllers

```php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->library('twiggy');
		$this->twiggy->layout('index');
		$this->twiggy->template('index');
		$this->twiggy->display();
	}

	public function account()
	{
		$this->twiggy->layout('blog');
		$this->twiggy->template('account');
		$this->twiggy->display();
	}
}
```

### 4. Better migrations

See resources to configure and use.

### 5. Dotenv file for sensitive configurations

You can save sensitive information in .env file. Just rename the .env.example file to begin. It contains environment configuration and database configuration

```
APP_ENV="development"
APP_KEY=base64:CtXClYBzi7NhBuACUHVX3qt2z19lB6mmrUmI+Vj8EE0=

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=ci
DB_USERNAME=root
DB_PASSWORD=
```

You can also add other values and use them like this
```php
$sitename = env('MY_SITE_NAME');

// or with a default value specified if empty.
$sitename = env('MY_SITE_NAME', 'Codeigniter');
```

## Resources

* Routing: http://cibonfire.com/docs/developer/routes

* Templating:
  * Twig: http://twig.sensiolabs.org/doc/tags/extends.html
  * Twiggy library: http://edmundask.github.io/codeigniter-twiggy/

* Database: https://laravel.com/docs/5.3/eloquent

* Migrations: http://docs.phinx.org/en/latest/migrations.html

* .ENV: https://github.com/vlucas/phpdotenv

## Contributing
Thank you for considering contributing to this project! There's room for a lot more improvements, I only ask that you stick to Codeigniter's model of keeping things a simple as possible. That's the major reason I have omitted using DI containers here.
