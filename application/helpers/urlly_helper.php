<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function blacklist($item)
{
	preg_match_all ("/.*?((?:[a-z][a-z\\.\\d\\-]+)\\.(?:[a-z][a-z\\-]+))(?![\\w\\.])/is", $item, $matches);
	
	$ci =& get_instance();
	
	$ci->load->model('Config_model','conf');
	
	$conf      = $ci->conf->read();
	$blacklist = explode(',',trim($conf->blacklist));
	$check     = $matches[1][0];
	
	if(in_array($check,$blacklist))
	{
		return $ci->load->view('partials/url_blacklisted');
	}
	else
	{
		return false;
	}
}

function show_ads($slug)
{
	$ci =& get_instance();
	$ci->load->model('Config_model','conf');
	$conf = $ci->conf->read();
	
	if($conf->show_ads == '1')
	{
		return true; //show_ads()==true
	}
	else
	{
		return false;
	}
}

function slug()
{
	$ci =& get_instance();
	$ci->load->model('Config_model','conf');
	$conf = $ci->conf->read();
	
	return substr(uniqid(),'-'.$conf->url_length);
}

function check_settings($url)
{
	blacklist($url);
}