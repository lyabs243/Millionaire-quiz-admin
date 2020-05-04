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
		$this->load->model('User_model');
		$this->load->model('Question_model');
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
		$data['users'] = $this->User_model->get_users();
		$data['questions'] = $this->Question_model->get_questions(0, 5);
		$data['total_easy_question'] = $this->Question_model->total_questions(0);
		$data['total_medium_question'] = $this->Question_model->total_questions(1);
		$data['total_hard_question'] = $this->Question_model->total_questions(2);
		$this->load->view('admin_panel', $data);
	}

	public function user()
	{
		if(isset($this->session->message))
		{
			$data['message'] = $this->session->message;
			$data['success'] = $this->session->success;

			unset($_SESSION['success']);
			unset($_SESSION['message']);
		}
		$data['user'] = $this->getUser();
		$data['users'] = $this->User_model->get_users();
		$this->load->view('admin_user_page', $data);
	}

	public function question()
	{
		if(isset($this->session->message))
		{
			$data['message'] = $this->session->message;
			$data['success'] = $this->session->success;

			unset($_SESSION['success']);
			unset($_SESSION['message']);
		}
		$data['user'] = $this->getUser();
		$this->load->view('admin_quiz_page', $data);
	}
}