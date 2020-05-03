<?php
/**
 * Created by PhpStorm.
 * User: lyabs
 * Date: 03/05/2020
 * Time: 13:51
 */

class User_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->library('ion_auth');
	}

	public function add_user($user)
	{
		$username = $user['username'];
		$password = $user['password'];
		$email = $user['email'];
		$additional_data = array(
			'username' => $user['username'],
			'first_name' => $user['first_name'],
			'last_name' => $user['last_name'],
		);
		$group = array($user['group']); // Sets user to admin.

		return $this->ion_auth->register('hello', $password, $email, $additional_data, $group);
	}

	public function update_user($id, $user)
	{
		$data = array(
			'first_name' => $user['first_name'],
			'last_name' => $user['last_name'],
			'username' => $user['username'],
			'email' => $user['email'],
		);
		if(isset($user['password']))
		{
			$data['password'] = $user['password'];
		}
		return $this->ion_auth->update($id, $data);
	}

	public function get_users()
	{
		return $this->ion_auth->users()->result();
	}
}