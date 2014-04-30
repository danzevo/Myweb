<?php
if( ! function_exists('element')) {
	function load($template = 'index', $view='', $data=array()) {
		$ci = &get_instance();
		$data['view'] = $view;
		return $ci->load->view($template, $data);
	}
}

function is_logged_in() {
	$ci = &get_instance();
	
	if($ci->session->userdata('id_user') != '')
		return TRUE;
	else
		return FALSE;
}