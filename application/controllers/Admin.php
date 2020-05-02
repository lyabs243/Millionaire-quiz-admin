<?php
/**
 * Created by PhpStorm.
 * User: lyabs
 * Date: 01/05/2020
 * Time: 10:13
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->helper('url');
		if (!$this->ion_auth->logged_in()) {
			redirect('user/signin');
		}
	}

	private function getUser()
	{
		$user = $this->ion_auth->user()->row();
		return$user;
	}

	public function index()
	{
		$data['user'] = $this->getUser();
		$this->load->view('admin_panel', $data);
	}

	public function user()
	{
		$data['user'] = $this->getUser();
		$this->load->view('admin_user_page', $data);
	}
}