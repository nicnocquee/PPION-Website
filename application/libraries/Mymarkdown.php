<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

include_once "markdown.php";

class Mymarkdown {

    public function convert($my_text)
    {
    	log_message('debug', ($my_text));
    	return Markdown($my_text);
    }
}

/* End of file Someclass.php */