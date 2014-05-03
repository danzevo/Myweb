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
	
	function page() {
		
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
			
			if($id_artikel)
				$art = $this->artikel_model->get_row_artikel($id_artikel);
			
			$data = array(
					'JUDUL'			=> $_POST['judul']
					,'TGL_ARTIKEL'	=> date('Y-m-d', strtotime($_POST['tgl_artikel']))
					,'ISI'			=> $_POST['isi']
					,'ID_USER'		=> ($id_artikel ? $art['ID_USER'] : trim($this->session->userdata('id_user')))
					);
			
			if($id_artikel) {
				$save = $this->db->update('artikel', $data, array('ID_ARTIKEL'=>$id_artikel));
				
				$this->db->where('ID_USER', trim($this->session->userdata('id_user')));
				$this->db->set('NUM_EDIT_ART', 'NUM_EDIT_ART+1', FALSE);
				$this->db->update('user');
			}
			else {
				$save = $this->db->insert('artikel', $data);
				
				$this->db->where('ID_USER', trim($this->session->userdata('id_user')));
				$this->db->set('NUM_TAMBAH_ART', 'NUM_TAMBAH_ART+1', FALSE);
				$this->db->update('user');
			}
			
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
	
	function main_sch_tgl() {
		$data = array(
				'list'		=> $this->artikel_model->get_user(),
				'content'	=> 'main_sch_tgl',
				'title'		=> 'Laporan Daftar User Per Periode'
				);
				
		load('index', $data['content'], $data);
	}
	
	function page_sch_tgl() {
		$sch_tgl_dari	= ($_POST['sch_tgl_dari'] ? date('Y-m-d', strtotime($_POST['sch_tgl_dari'])) : '');
		$sch_tgl_ke 	= ($_POST['sch_tgl_dari'] ? date('Y-m-d', strtotime($_POST['sch_tgl_ke'])) : '');
		
		if($sch_tgl_dari && $sch_tgl_ke) 
			$where = "TANGGAL BETWEEN '$sch_tgl_dari' AND '$sch_tgl_ke'";
		else
			$where = '';
			
		$data = array(
				'list'		=> $this->artikel_model->get_user($where),
				'content'	=> 'list_sch_tgl'
				);
		
		$this->load->view($data['content'], $data);
	}
	
	function main_sch_aktif() {
		$data = array(
				'list'		=> $this->artikel_model->get_user(),
				'content'	=> 'main_sch_aktif',
				'title'		=> 'Laporan Daftar User Aktif'
				);
				
		load('index', $data['content'], $data);
	}
	
	function page_sch_aktif() {
		$filter = (isset($_POST['filter']) ? $_POST['filter'] : '');
		
		if($filter == 1)
			$order = 'NUM_LOGIN';
		elseif($filter == 2)
			$order = 'NUM_TAMBAH_ART';
		elseif($filter == 3)
			$order = 'NUM_EDIT_ART';
		else
			$order = '';
			
		$data = array(
				'list'		=> $this->artikel_model->get_user('',$order),
				'content'	=> 'list_sch_aktif'
				);
				
		$this->load->view($data['content'], $data);
	}
}