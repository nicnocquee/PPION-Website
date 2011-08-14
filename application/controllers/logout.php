<?php
class Logout extends MY_Controller {

	public function index() {
		$this->history->exclude();
		$this->session->sess_destroy();
		$this->load->view('logout');
	}

}