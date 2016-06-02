<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
	}
	public function index()
	{
		if($this->session->userdata['user_level'] === "Admin")
		{
			$data['user'] =$this->user->all();
			$this->load->view('dashboard_admin', $data);
		}
		else{
			$data['user'] = $this->user->all();
			$this->load->view('dashboard', $data);
		}
	}
	public function login()
	{
		if($this->session->userdata['user_level'] === "Admin")
		{
			$data['user'] =$this->user->all();
			$this->load->view('dashboard_admin', $data);
		}
		else{
			$data['user'] = $this->user->all();
			$this->load->view('dashboard', $data);
		}
	}
	public function profile()
	{
		$this->load->model('post');
		$data['post'] = $this->post->all();
		$this->load->view('show', $data);
	}
}
