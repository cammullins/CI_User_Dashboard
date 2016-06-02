<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class posts extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('post');
	}

	public function index()
	{
		$data['post'] = $this->post->all();
		$this->load->view('show', $data);
	}

	public function make_post()
	{
		$post= $this->input->post();
		$this->post->create_post($post);
		redirect('/posts');
	}

	public function make_comment()
	{
		$post= $this->input->post();
		$this->post->create_comment($post);
		redirect('/posts');
	}
}