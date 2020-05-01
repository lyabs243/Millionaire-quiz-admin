<?php
/**
 * Created by PhpStorm.
 * User: lyabs
 * Date: 01/05/2020
 * Time: 19:31
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('ion_auth');
	}

	public function login() {

		$this->load->library('form_validation');
		// définition des règles de validation
		$this->form_validation->set_rules('email', '« Email »', 'required');
		$this->form_validation->set_rules('password', '« Password »', 'required');

		// ajout du style pour les messages d'erreur
		$this->form_validation->set_error_delimiters('<br /><div class="errorMessage"><span style="font-size: 150%;">&uarr;&nbsp;</span>', '</div>');

		if ($this->form_validation->run() == FALSE){
			redirect('admin/signin');
		} else {
			// succès de la validation : récupération des données passées en post
			$data['email'] = $this->input->post('email');
			$data['password'] = $this->input->post('password');
			$data['remember'] = $this->input->post('remember');

			$remember = isset($data['remember'])? TRUE : FALSE; // remember the user
			$login = $this->ion_auth->login($data['email'], $data['password'], $remember);

			if($login) {
				redirect('admin/');
			} else {
				redirect('admin/signin');
			}
		}

	}
}