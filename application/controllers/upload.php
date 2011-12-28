<?php

class Upload extends MY_Controller {
	function  __construct()  {
		parent::__construct();
		$this->load->helper(array('url'));
	}
	
	function doupload()
		{
			$config['upload_path'] = APPPATH.'../uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '7000';
			$config['max_width']  = '600';
			$config['max_height']  = '600';
	
			$this->load->library('upload', $config);
	
			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
	
				$this->load->view('upload_result', array('result' => json_encode($error)));
			}
			else
			{
				$return = array();
				$data = $this->upload->data();
				$data['name'] = $data['file_name'];
				$return[] = $data;
	
				$this->load->view('upload_result', array('result' => $return));
			}
		}
}