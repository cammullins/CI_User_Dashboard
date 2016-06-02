<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
	}
	
	public function index()
	{

	}
	public function new()
	{
		$this->load->view('new');
	}
	public function edit($id)
	{
		$data['user'] = $this->user->find_by_id($id);
		$this->load->view('edit', $data);
	}
	public function edit_profile()
	{
		$this->load->view('edit_profile');
	}

	public function update($id)
	{
		$post = $this->input->post();
		$this->user->update($post, $id);
		redirect('/dashboard');
	}
	public function update_password($id)
	{
		$post = $this->input->post();
		$this->user->update_password($post, $id);
		redirect('/dashboard');
	}
	public function update_description($id)
	{
		$post = $this->input->post();
		$this->user->update_description($post, $id);
		$user = $this->user->find_by_id($id);
		$this->session->set_userdata($user);
		redirect('/users/show');
	}
	public function show()
	{
		$this->load->view('show');
	}
	public function remove($id)
	{
		$data['user'] = $this->user->remove($id);
		redirect('/dashboard');
	}
}
