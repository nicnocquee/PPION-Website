<?php

class Markdown extends MY_Controller {
	function  __construct()  {
		parent::__construct();
		$this->load->helper(array('url'));
	}
	
	function convert() {
		$this->load->library('mymarkdown');
		$myhtml = $this->mymarkdown->convert($this->input->post('text'));
		log_message('debug', $myhtml);
		$this->load->view('markdown', array('html' => $myhtml));
	}
}