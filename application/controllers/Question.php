<?php
/**
 * Created by PhpStorm.
 * User: lyabs
 * Date: 03/05/2020
 * Time: 20:06
 */

class Question extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Question_model');
		$this->load->library('ion_auth');
		if (!$this->ion_auth->logged_in()) {
			redirect('user/signin');
		}
	}

	public function add()
	{
		$this->load->library('form_validation');

		$user = $this->ion_auth->user()->row();

		// définition des règles de validation
		$this->form_validation->set_rules('question', '« Question »', 'required');
		$this->form_validation->set_rules('level', '« Level »', 'required');
		$this->form_validation->set_rules('answer-1', '« First answe »', 'required');
		$this->form_validation->set_rules('answer-2', '« Second answer »', 'required');
		$this->form_validation->set_rules('answer-3', '« Third answer »', 'required');
		$this->form_validation->set_rules('answer-4', '« Fourth answer »', 'required');
		$this->form_validation->set_rules('correct-answer', '« Correct answer »', 'required');

		$_SESSION['success'] = true;
		if ($this->form_validation->run() == FALSE) {
			$_SESSION['success'] = false;
		} else {
			$question['description'] = $this->input->post('question');
			$question['level'] = $this->input->post('level');

			$validAnswer = $this->input->post('correct-answer');

			$answer1['description'] = $this->input->post('answer-1');
			$answer1['is_valid_answer'] = ($validAnswer == 1);
			$question['answers'][] = $answer1;

			$answer2['description'] = $this->input->post('answer-2');
			$answer2['is_valid_answer'] = ($validAnswer == 2);
			$question['answers'][] = $answer2;

			$answer3['description'] = $this->input->post('answer-3');
			$answer3['is_valid_answer'] = ($validAnswer == 3);
			$question['answers'][] = $answer3;

			$answer4['description'] = $this->input->post('answer-4');
			$answer4['is_valid_answer'] = ($validAnswer == 4);
			$question['answers'][] = $answer4;

			$this->Question_model->add_question($user->id, $question);
		}
		if ($_SESSION['success']) {
			$_SESSION['message'] = 'The new question has been successfully added!';
		} else {
			$_SESSION['message'] = 'Error when adding a new question, please check your data.';
		}
		redirect('admin/question');
	}
}