<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->library('twiggy');
		$this->twiggy->layout('index');
		$this->twiggy->template('index');
		$this->twiggy->display();

		$this->load->database();
		//$this->load->model('post');
		//print_r(Post::find(1));

		//$this->load->view('welcome_message');
	}

	public function account()
	{
		$this->twiggy->layout('blog');
		$this->twiggy->template('account');
		$this->twiggy->display();
	}
}
