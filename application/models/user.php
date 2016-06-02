<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class user extends CI_Model{

	public function all()
	{
		return $this->db->query("SELECT * FROM users")->result_array();
	}

	function create($post)
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules('register_first_name', 'First Name', 'trim|required|alpha|');
		$this->form_validation->set_rules('register_last_name', 'Last Name', 'trim|required|alpha|');
		$this->form_validation->set_rules('register_email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('register_password', 'Password', 'required|min_length[8]|alpha_dash');
		$this->form_validation->set_rules('register_confirm_password', 'Password Confirmation', 'required|matches[register_password]');

		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata("registration_error", validation_errors());
			redirect('/welcome/register');
			exit;
		}
		else
		{
			$query = "INSERT INTO users (email, first_name, last_name, password, user_level, created_at) VALUES (?, ?, ?, ?, ?, ?)";
			$values = array($post['register_email'], $post['register_first_name'], $post['register_last_name'], $post['register_password'], "Normal", date('Y-m-d H:i:s'));
			return $this->db->query($query, $values);
		}
	}
	function login($post)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('login_email', 'Email', 'required');
		$this->form_validation->set_rules('login_password', 'Password', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata("login_error", validation_errors());
			redirect('/welcome/start');
			exit;
		}
		else
		{
			$query = "SELECT * FROM users WHERE email =? AND password=?";
			$values = array($post['login_email'], $post['login_password']);
			return $this->db->query($query, $values)->row_array();
		}
	}
	function update($post, $id)
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules('edit_email', 'Email', 'required|valid_email|');
		$this->form_validation->set_rules('edit_first_name', 'First Name', 'trim|required|alpha|');
		$this->form_validation->set_rules('edit_last_name', 'Last Name', 'trim|required|alpha|');

		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata("edit_error", validation_errors());
			redirect('/users/edit/' . $id);
			exit;
		}
		else
		{
			$query = "UPDATE users SET email=?, first_name=?, last_name=?, user_level=?, updated_at=? WHERE id=?";
			$values = array($post['edit_email'], $post['edit_first_name'], $post['edit_last_name'], $post['edit_user_level'], date('Y-m-d H:i:s'), $id);
			return $this->db->query($query, $values);
		}
	}
	function update_password($post, $id)
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules('edit_password', 'Password', 'required|min_length[8]|alpha_dash');
		$this->form_validation->set_rules('edit_confirm_password', 'Password Confirmation', 'required|matches[edit_password]');

		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata("edit_error", validation_errors());
			redirect('/users/edit/' . $id);
			exit;
		}
		else
		{
			$query = "UPDATE users SET password=?, updated_at=? WHERE id=?";
			$values = array($post['edit_password'], date('Y-m-d H:i:s'), $id);
			return $this->db->query($query, $values);
		}
	}
	function update_description($post, $id)
	{
		$query = "UPDATE users SET description=?, updated_at=? WHERE id=?";
		$values = array($post['edit_description'], date('Y-m-d H:i:s'), $id);
		return $this->db->query($query, $values);
	}
	function remove($id)
	{
		$query = "DELETE FROM users WHERE id=?";
		$value = array($id);
		return $this->db->query($query, $value);
	}
	function find_by($email)
	{
		$query = "SELECT * FROM users WHERE email=?";
		$values = array($email);
		return $this->db->query($query, $values)->row_array();
	}
	function find_by_id($id)
	{
		$query = "SELECT * FROM users WHERE id=?";
		$values = array($id);
		return $this->db->query($query, $values)->row_array();
	}
}