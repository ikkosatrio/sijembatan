<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->blade->sebarno('controller', $this); 
		$this->load->model('m_login');
		$this->load->model('m_config');
		$this->load->library('session');
		
		$this->data['config'] 			= $this->m_config->ambil('config',1)->row();
	}

	public function index()
	{
		if($this->session->userdata('auth')){
			redirect('superuser');
		}

		redirect('auth/masuk');
	}

	public function masuk()
	{
		//fungsi untuk masuk kuesioner

		if($this->session->userdata('auth')){
			redirect('superuser');
		}

		$data 		= $this->data;
		echo $this->blade->nggambar('admin.login',$data);
		
	}

	public function authentication(){
		//fungsi untuk verifikasi user masuk
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}

		$where 	= array(
			'user_auth_name' 	=> $this->input->post('user'),
			'user_auth_pass'	=> $this->input->post('pass'),
		);
		$cek = $this->m_login->cek_login("user_auth",$where)->row();

		if($cek==NULL){
			$data['auth']		= false;
			$data['msg']		= "Opss! Nama Pengguna Atau Password Salah";
			echo json_encode($data);
			return;
		}

		$data_session = array(
			// 'nama'      => $this->input->post('user'),
			'auth_name' => $cek->user_auth_name,
			'id'        => $cek->user_auth_id,
			'auth'      => TRUE,
		);

		$this->session->set_userdata($data_session);

		$data['auth']		= true;
		$data['msg']		= "Berhasil! selamat datang".$this->session->userdata("auth_name");

		echo json_encode($data);
		return;
	}

	public function keluar(){
		//fungsi untuk keluar

		if(!$this->session->userdata('auth')){
			redirect('auth');
			return;
		}

		$this->session->sess_destroy();
		redirect('auth');

	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */