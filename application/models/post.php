<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Post extends Eloquent
{
	protected $table = 'posts';
}
