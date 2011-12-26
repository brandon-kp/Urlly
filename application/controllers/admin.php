<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->_check_login();
	}
	public function index()
	{
		$this->login();
	}
	
	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if($this->form_validation->run() !== TRUE) //if the login form hasn't been submitted
		{
			$this->load->view('admin/admin_login.php');
		}
		else //the login form HAS been submitted
		{
			if(/*the credentials are correct*/$this->input->post('username') === $this->config->item('admin_username') && $this->input->post('password') === $this->config->item('admin_password'))
			{
				$this->session->set_userdata(array('logged_in'=>'TRUE'));
				redirect('admin/config/');
			}
		}
	}
	
	public function config()
	{
		$this->load->model('Config_model', 'conf');
		$this->form_validation->set_rules('url_length', 'Url Length', 'required');
		
		if($this->form_validation->run() == TRUE)
		{
			$this->conf->update(
				trim($this->input->post('blacklist')),
				$this->input->post('url_length'),
				$this->input->post('show_ads'),
				$this->input->post('allow_dupes'));
			echo "1";
		} 
		else
		{
			$conf = $this->conf->read();
			$this->load->view('admin/admin_config.php',$conf);
		}
	}
	
	public function _check_login()
	{
		if($this->session->userdata('logged_in') !== 'TRUE' && $this->uri->segment(2) !=='login')
		{
			redirect('admin/login');
		}
	}
	
}