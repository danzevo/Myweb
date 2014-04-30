<?php if( ! defined('BASEPATH')) exit('No Direct Script Access allowed');

class Home extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('artikel_model');
		
		if(!is_logged_in())
			redirect('login');
	}
	
	var $msg = array();
	
	function index() {
	
		$data = array (
				'title'		=> 'Artikel'
				,'content'	=> 'main'
				);
				
		load('index', $data['content'], $data);
	}
	
	function page($pg=1) {
		$limit = 5;
		
		$data = array(
				'list'		=> $this->artikel_model->get_list_artikel()
				,'content'	=> 'list'
				);
		
		$this->load->view($data['content'], $data);
	}
	
	function input($id=0) {
		
		$art = $this->artikel_model->get_row_artikel($id);
		
		$data = array (
					'art'		=> $art
					,'title'		=> 'Input Artikel'
					,'content'	=> 'input'
				);
		
		load('index', $data['content'], $data);
	}
	
	function save() {
		$rules = array (
					array (
						'field'		=> 'judul',
						'rules'		=> 'required'
						)
					);
		
		$this->form_validation->set_rules($rules);
		
		if($this->form_validation->run() === FALSE)
		{
			$this->msg['val_error'] = 'Judul Harus Diisi..!';
		}else
		{
			$id_artikel = ($_POST['id_artikel'] ? $_POST['id_artikel'] : '');
			
			$data = array(
					'JUDUL'		=> $_POST['judul']
					,'ISI'		=> $_POST['isi']
					,'ID_USER'	=> trim($this->session->userdata('id_user'))
					);
			
			if($id_artikel)
				$save = $this->db->update('artikel', $data, array('ID_ARTIKEL'=>$id_artikel));
			else
				$save = $this->db->insert('artikel', $data);
			
			if($save)
				$this->msg['message'] = 'Data Berhasil Disimpan';
			else
				$this->msg['message'] = 'Data Gagal Disimpan';
		}
		
		echo json_encode($this->msg);
	}
	
	function delete($id) {
		$del = $this->db->delete('artikel', array('ID_ARTIKEL' => $id));
		
		if($del)
			$this->msg['message'] = 'Data Berhasil Dihapus';
		else
			$this->msg['message'] = 'Data Gagal Dihapus';
		
		echo json_encode($this->msg);
	}
	
	function view_data($id) {
		$art = $this->artikel_model->get_row_artikel($id);
		
		$data = array (
					'art'		=> $art
					,'title'	=> 'View Artikel'
					,'content'	=> 'view_data'
				);
		
		load('index', $data['content'], $data);
	}
}