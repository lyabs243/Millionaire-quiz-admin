<?php
/**
 * Created by PhpStorm.
 * User: lyabs
 * Date: 05/05/2020
 * Time: 07:09
 */

class Api extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Question_model');

		$apiKey = $this->input->post('api_key');
		if($apiKey != 'xz]nNQz%mX+g<*Rd,*eA4\'0w~EYs9N')
		{
			redirect('user/signin');
		}
	}

	public function get_questions($level=0, $number=10)
	{
		$questions = $this->Question_model->generate_questions((int)$level, (int)$number);
		header( 'Content-Type: application/json; charset=utf-8' );
		$result['data'] = $questions;
		echo json_encode($result,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		die;
	}

}