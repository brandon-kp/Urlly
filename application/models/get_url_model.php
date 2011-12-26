<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Get_url_model extends CI_Model {
	
	public function get_url($slug)
	{
		$q = $this->db->get_where('urls',array('slug'=>$slug), 1)->result();
		return $q[0];
	}
	
}