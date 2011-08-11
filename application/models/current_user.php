<?php

namespace models;

class Current_User {

	private static $user;

	private function __construct() {}

	public static function user() {

		if(!isset(self::$user)) {

			$CI =& get_instance();
			$CI->load->library('session');

			if (!$user_id = $CI->session->userdata('user_id')) {
				return FALSE;
			}
			
			$CI->load->library('doctrine');
			if (!$u = $CI->doctrine->em->getRepository('models\User')->find($user_id)) {
			//if (!$u = Doctrine::getTable('User')->find($user_id)) {
				return FALSE;
			}

			self::$user = $u;
		}

		return self::$user;
	}

	public static function login($email, $password) {

		// get User object by username
		$CI =& get_instance();
		$CI->load->library('doctrine');
		if ($u = $CI->doctrine->em->getRepository('models\User')->findOneBy(array('email' => $email))) {
		//if ($u = Doctrine::getTable('User')->findOneByUsername($username)) {

			// password match (comparing encrypted passwords)
			if ($u->getPassword() == md5($password)) {

				$CI =& get_instance();
				$CI->load->library('session');
				$CI->session->set_userdata('user_id',$u->getId());
				self::$user = $u;

				return TRUE;
			}
		}

		// login failed
		return FALSE;

	}

	public function __clone() {
		trigger_error('Clone is not allowed.', E_USER_ERROR);
	}

}