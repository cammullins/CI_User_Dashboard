<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome');
	}

	public function start()
	{
		$this->load->view('sign_in');
	}
	public function register()
	{
		$this->load->view('register');
	}
}
