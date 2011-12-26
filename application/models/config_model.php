<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Config_model extends CI_Model {
	
	public function read()
	{
		$query = $this->db->get('config')->result();
		return $query[0];
	}
	
	public function update($blacklist,$url_length,$show_ads,$allow_dupes)
	{
		$data = array(
		'blacklist' => $blacklist,
		'url_length' => $url_length,
		'show_ads' => $show_ads,
		'allow_dupes' => $allow_dupes,
		);
		$this->db->update('config', $data); 
	}
	
}