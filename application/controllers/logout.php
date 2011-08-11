<?php
class Logout extends MY_Controller {

	public function index() {

		$this->session->sess_destroy();
		$this->load->view('logout');
	}

}