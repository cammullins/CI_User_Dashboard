<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class post extends CI_Model{

	public function all()
	{
		return $this->db->query("SELECT 
								    CONCAT(users.first_name, ' ', users.last_name) AS full_name,
								    posts.text AS post,
								    posts.created_at AS post_time,
								    posts.id AS post_id
								FROM
								    users
								        JOIN
								    posts ON posts.users_id = users.id")->result_array();
	}

	function create_post($post)
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules('post_message', 'post', 'required');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('post_error', validation_errors());
			redirect('/posts');
		}
		else{
		$query = "INSERT INTO posts (text, created_at, users_id) VALUES (?, ?, ?)";
		$values = array($post['post_message'], date('Y-m-d H:i:s'), $this->session->userdata['id']);
		return $this->db->query($query, $values);
		}
	}

	function create_comment($post)
	{
			$query = "INSERT INTO comments (text, created_at, users_id, posts_id) VALUES (?, ?, ?, ?)";
			$values = array($post['new_comment'], date('Y-m-d H:i:s'), $this->session->userdata['id'], $post['id']);
			return $this->db->query($query, $values);
		}
}




								//SELECT 
								//     CONCAT(users.first_name, ' ', users.last_name) AS full_name,
								//     posts.text AS post,
								//     posts.created_at AS post_time,
								//     posts.id AS post_id,
								//     comments.text AS comment,
								//     comments.created_at AS comment_time
								// FROM
								//     users
								//         JOIN
								//     posts ON posts.users_id = users.id
								//     	JOIN
								//     comments on comments.user_id = users.id