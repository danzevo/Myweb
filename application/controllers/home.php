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
	
	function view_data($id) {
		$art = $this->artikel_model->get_row_artikel($id);
		
		$data = array (
					'art'		=> $art
					,'title'	=> 'View Artikel'
					,'content'	=> 'view_data'
				);
		
		load('index', $data['content'], $data);
	}
	
	function profile($msg='',$error='') {
		$list = $this->artikel_model->get_user(array('ID_USER' => trim($this->session->USERDATA('id_user'))));
		$user = $list->row_array();
		
		$msg 	= str_replace('_', ' ', $msg);
		$error 	= str_replace('_', ' ', $error);
		
		$data = array (
					'user'		=> $user,
					'title'		=> 'My Profile',
					'content'	=> 'profile',
					'msg'		=> $msg,
					'error'		=> $error
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
	
	function update_profile($id_user='')
	{
		$rules = array(
					array(
						'field'		=> 'nama',
						'rules'		=> 'trim|required'
						),
					array(
						'field'		=> 'email',
						'rules'		=> 'trim|required|valid_email'
						),
					);
		
		$this->form_validation->set_rules($rules);
		
		if($this->form_validation->run() === false) {
			$msg = 'Nama Atau Email harus terisi';
			$this->profile($msg);
		}else {
			$config['upload_path']		= APPPATH.'../asset/upload/';
			$config['allowed_types']	= 'gif|jpg|png';
			$config['file_name']		= date('dmY').'-'.trim($this->session->userdata('username'));
			$config['max_width'] 		= 192;
			$config['max_height'] 		= 192;
			$config['overwrite'] 		= true;
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload('foto'))
			{
				$file = $this->upload->data();
				
				$file_name = $config['upload_path'].$file['file_name'];	
			}	
			else
			{
				$file_name = '';
				$error = $this->upload->display_errors();
				// $this->profile($error);
			}	
			
			$data = array(
					'NAMA'		=> $_POST['nama'],
					'EMAIL'		=> $_POST['email'],
					'ALAMAT'	=> $_POST['alamat'],
					'KOTA'		=> $_POST['kota'],
					'IMAGE'		=> $file_name,
					);
			
			$save = $this->db->update('user', $data, array('ID_USER' => $_POST['id_user']));
			
			if($save)
			{
				$msg 		= 'Data_Updated';
				$error 		= strip_tags($error);
				$error		= str_replace(' ', '_', $error);
				$error 		= strtolower(str_replace('.', ' ', $error));
				
				redirect('home/profile/'.$msg.'/'.$error);
			}	
			else
			{
				$msg = 'Data_failed_to_update';
				redirect('home/profile/'.$msg);
			}	
			
		}
		
		
	//	echo $file['file_name'];
	}
}