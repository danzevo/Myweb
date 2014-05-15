<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('artikel_model');
		$this->load->library('form_validation');
		
	}
	var $msg = array();
	
	function index($msg='') {
		if(!is_logged_in()) 			
			load('login', 'form_login',array('msg' => $msg));
		else
			redirect('home');
	}
	
	function check($username, $password) {
		$data = array();
		
		$this->db->where('USERNAME', $username);
		$this->db->where('PASSWORD', $password);
		$this->db->where('AKTIF', 1);
		
		$query = $this->db->get('user');
		
		if($query->num_rows() == 1)
		{
			return $query->row_array();
		}else
		{
			return false;
		}
	}
	
	function do_login() {
		$this->load->library('form_validation');
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$rules = array(
					array(
						'field'		=> 'username',
						'rules'		=> 'trim|required'
						),
					array(
						'field'		=> 'password',
						'rules'		=> 'trim|required'
						)
					);
		
		$this->form_validation->set_rules($rules);
		
		if($this->form_validation->run() == false) {
			$this->index('Username Atau Password Harus Diisi');
		}else {
		
			$check = $this->check($username, $password);
			
			if($check) {
				$data = array(
						'id_user'		=> $check['ID_USER']
						,'username'		=> $check['USERNAME']
						,'level_user'	=> $check['LEVEL_USER']
						);
				
				$this->session->set_userdata($data);
				
				$this->db->where('ID_USER', $check['ID_USER']);
				$this->db->set('NUM_LOGIN', 'NUM_LOGIN+1', FALSE);
				$this->db->update('user');
				
				echo 'berhasil';
			}else
			{
				$this->index('Username Atau Password Tidak Sesuai');
			}
		}	
	}
	
	function log_out() {
		$this->session->sess_destroy();
		redirect('login');
	}
	
	function sign_up($msg='') {
		$data = array(
				'msg'	=> $msg
				);
				
		load('login', 'form_sign_up', $data);
	}
	
	function sign_up_add() {		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$rules = array(
					array(
						'field'		=> 'nama',
						'rules'		=> 'trim|required'
						),
					array(
						'field'		=> 'username',
						'rules'		=> 'trim|required'
						),
					array(
						'field'		=> 'email',
						'rules'		=> 'trim|required|valid_email'
						),
					array(
						'field'		=> 'password',
						'rules'		=> 'trim|required'
						)
					);
		
		$this->form_validation->set_rules($rules);
		
		if($this->form_validation->run() === false) {
			$this->sign_up('Pengisian Field tidak Sesuai');
		}else {
			// define('ROOT', 'http://localhost/myweb/login/');
			
			$kode = md5(uniqid(rand()));
			$username = $_POST['username'];
			$email = $_POST['email'];
			
			$data = array (
						'NAMA'			=> $_POST['nama'],
						'USERNAME'		=> $username,
						'PASSWORD'		=> $_POST['password'],
						'EMAIL'			=> $email,
						'ALAMAT'		=> $_POST['alamat'],
						'KOTA'			=> $_POST['kota'],
						'TANGGAL'		=> date('Y-m-d'),
						'LEVEL_USER'	=> $_POST['level_user'],
						'KODE'			=> $kode,
					);
			
			$user = $this->artikel_model->get_user(array('USERNAME' => $username, 'EMAIL' => $email));
			
			if($user->num_rows() > 0) {
				$this->sign_up('Username Atau Email Telah Dipakai');
			}else {
			
				$save = $this->db->insert('user', $data);
				
				$to 	= $email;
				$judul	= 'Aktivasi Akun Anda';
				// $from	= 'admin@localhost.com \n';
				// $from	.= 'content-type: text/html \r\n';
				$headers = 'From: webmaster@localhost.com' . "\r\n" .
							'Reply-To: webmaster@localhost.com' . "\r\n" .
							'X-Mailer: PHP/' . phpversion();
				
				$pesan	= 'Klik link berikut untuk mengaktifkan akun : <br>';
				$pesan	.= "<a href='http://localhost/myweb/login/val_sign_up/aktivasi&$email&$username&$kode' title='Akftivasi Akun'>Aktivasi Akun</a>";
				
				$kirim = mail($to, $judul, $pesan, $headers);
				
				if($kirim)
					$this->val_sign_up('verifikasi&\'\'&\'\'&\'\'');
			}		
				
		}		
	}
	
	function val_forgot_password() {
		$rules	= array(
					array(
						'field'	=> 'email',
						'rules' => 'trim|required|valid_email'
						)
					);
		
		$this->form_validation->set_rules($rules);
		
		if($this->form_validation->run() === false) {
			$this->forgot_password('Email Anda Tidak Sesuai');
		}else
		{
			$email 		= $_POST['email'];
			
			$data 		= array();
			
			$artikel	= $this->artikel_model->get_user(array('EMAIL' => $email));
			$data		= $artikel->row_array();
			
			if($artikel->num_rows() > 0) {
				$to			= $_POST['email'];
				$judul		= 'Password Anda';
				$headers	= 'From: webmaster@localhost.com' . "\r\n" .
								'Reply-to: webmaster@localhost.com' . "\r\n" .
								'X-mailer: PHP/'. phpversion();
				
				$pesan		= "Password Anda : ".$data['PASSWORD']." <br>";
				$pesan		.= "Silahkan Untuk <a href='http://localhost/myweb/login/'>Login</a> Kembali <br>";
				$pesan		.= 'Terima Kasih';
				
				$kirim		= mail($to, $judul, $pesan, $headers);
				
				$this->forgot_password('Password Telah Kami Kirim Melalui Email Anda');
			}else {
				$this->forgot_password('Email Anda Tidak Sesuai');
			}
		}
	}
	
	function val_sign_up($par='') {
		list($msg, $email, $username, $kode) = explode('&', $par);
		
		$data = array (
					'par'	=> $msg
				);
				
		load('login','val_sign_up',$data);
		
		if($kode && $email && $username) {
			$this->db->update('user', array('AKTIF' => 1), array('KODE'=>$kode,'EMAIL'=>$email,'USERNAME'=>$username));
		}
	}
	
	function forgot_password($msg='') {
		load('login', 'forgot_password', array('msg'=>$msg));
	}
}
