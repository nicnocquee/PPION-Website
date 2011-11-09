<?php

class Login extends MY_Controller {
	function  __construct()  {
		/* Inherit the CI_Controller construct because we're using a 
		   custom controller with $this->em for Doctrine already set */
		parent::__construct();
		
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');
	}
            
    public function index() {
		//$this->load->view('login_form');
		$this->template->title('Login');
		$this->template->build('login_form');
	}

	public function submit() {

		if ($this->_submit_validate() === FALSE) {
			$this->index();
			return;
		}
		$next = $this->session->userdata('next');
		$this->session->unset_userdata('next');
		if ($next) redirect($next);
		else redirect('dashboard');

	}

	private function _submit_validate() {
		$this->form_validation->set_rules('email', 'E-mail',
			'trim|required|callback_authenticate');

		$this->form_validation->set_rules('password', 'Password',
			'trim|required');

		$this->form_validation->set_message('authenticate','Invalid login. Please try again.');

		return $this->form_validation->run();
	}
	
	public function authenticate() {
		return models\Current_User::login(trim($this->input->post('email')), $this->input->post('password'));

	}
}