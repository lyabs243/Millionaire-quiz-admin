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
		//Loading url helper
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('admin_panel');
	}

	public function signin()
	{
		$this->load->view('login_page');
	}
}