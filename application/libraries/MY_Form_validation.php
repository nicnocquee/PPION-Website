<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {
	function __construct()  {
		parent::__construct();
	}

	function unique($value, $params)
	{
		$CI =& get_instance();

		$CI->form_validation->set_message('unique',
			'%s sudah terdaftar.');

		list($model, $field) = explode(".", $params, 2);

		$CI->load->library('doctrine');
		
		if ($CI->doctrine->em->getRepository('models\\'.$model)->findOneBy(array($field => $value))) {
			return false;
		} else {
			return true;
		}

	}
	
	function date($value, $params)
	{
		$CI =& get_instance();

		$CI->form_validation->set_message('date',
			'Format tanggal tidak tepat.');
		
		$exploded = explode("/", $value);
		if (count($exploded) != 3) return false;
		list($year, $month, $date) = explode("/", $value);
		
		if (is_numeric($year)&&is_numeric($month)&&is_numeric($date)&&$month>0&&$month<13&&$date>0&&$date<32&&$year>0) {
			return true;
		} else {
			return false;
		}
	}
	
	function datetime($value, $params)
	{
		$CI =& get_instance();

		$CI->form_validation->set_message('datetime',
			'Format tanggal dan waktu tidak tepat.');
		
		$datetime = explode(" ", $value);
		if (count($datetime) != 2) return false;
		list($datepart, $timepart) = explode(" ", $value);
		$exploded = explode("/", $datepart);
		if (count($exploded) != 3) return false;
		list($year, $month, $date) = explode("/", $datepart);
		
		if (is_numeric($year)&&is_numeric($month)&&is_numeric($date)&&$month>0&&$month<13&&$date>0&&$date<32&&$year>0) {
			//return true;
		} else {
			return false;
		}
		
		$exploded = explode(":", $timepart);
		if (count($exploded) != 2) return false;
		list($hour, $minute) = explode(":", $timepart);
		
		if (is_numeric($hour)&&is_numeric($minute)&&$hour>-1&&$hour<24&&$minute>-1&&$minute<60) {
			return true;
		} else {
			return false;
		}
	}
}