<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
	}
	
	public function index()
	{
		$slug = $this->uri->segment(2);
		if(strlen($slug) > 0 )//if theere is no URL direct set, show the main page
		{	
			//$this->_redirect($this->uri->segment(2));
			echo "if(strlen($slug) > 0 )";
		} 
		else //but if there is, load the redirect function
		{ 	
			redirect('home');
		}
	}
	
	public function _redirect($slug)
	{
		//redirect
	}

}
