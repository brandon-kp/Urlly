<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class New_url_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
		$table = 'urls';
	}
	
	public function create($url,$slug)
	{
		$this->db->escape($url);
		$this->db->insert('urls',array('url'=>$url,'slug'=>$slug));
	}
	
}