<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('urlly');
	}
	
	public function index()
	{
		if($this->uri->segment(2) == 'new_url')#I have the routing set up in such a way...
		{
			$this->new_url();
		}
		elseif( $this->uri->segment(2) == '' || $this->uri->segment(2) == 'index')#...that this horseshit is required for now
		{
			$this->load->view('main');
		}
		else 
		{
			$this->relocate($this->uri->segment(2));
		}
	}
	
	public function new_url()
	{
		$this->load->model('new_url_model', 'new_url');
		$url = $this->input->post('url');
		$slug = slug();
		
		if(strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' && !empty($url))
		{
			check_settings($url);
			
			if(blacklist($url) == false) #not on the blacklist
			{
				$this->new_url->create($url,$slug);
				echo 'localhost/urlly/index.php/home/'.$slug;
				//echo "http://url.ly/".$slug;
			}
		}
	}
	
	public function relocate($slug)
	{
		$this->load->model('get_url_model');
		$data = $this->get_url_model->get_url($slug);
		
		if(show_ads($slug)==true)
		{
			$this->load->view('relocate',$data);
		}
		else
		{
			header('Content-Type: text/html; charset=utf-8');
			header('X-Powered-By: Deez Nutz');
			Header('HTTP/1.1 301 Moved Permanently'); 
			Header('Location: '.$data->url);
		}
	}
	
}