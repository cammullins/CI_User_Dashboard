<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class loginRegister extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
	}
	public function index()
	{
		$this->load->view('sign_in');
	}

	public function login()
	{
		$post = $this->input->post();
		$user = $this->user->login($post);
		if (!empty($user)){
			$this->session->set_userdata($user);
			redirect('/dashboard/login');
		}
		else{
			$this->session->set_flashdata('login_error', 'Email and password must match');
			redirect('/loginRegister');
		}
	}

	public function register()
	{
		$post = $this->input->post();
		$this->user->create($post);
		$user = $this->user->find_by($post['register_email']);
		$this->session->set_userdata($user);
		redirect('/dashboard');
	
	}

	public function create_new()
	{
		$post= $this->input->post();
		$this->user->create($post);
		redirect('/dashboard');
	}

	public function logoff()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
