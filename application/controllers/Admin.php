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
		$this->load->helper('form');
		$this->load->library('ion_auth');
		$this->load->helper('url');
	}

	public function index()
	{
		if ($this->ion_auth->logged_in()) {
			$user = $this->ion_auth->user()->row();
			$data['user'] = $user;
			$this->load->view('admin_panel', $data);
		}
		else {
			$this->load->view('login_page');
		}
	}
}