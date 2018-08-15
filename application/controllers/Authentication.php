<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_config');
		$this->data['config'] 			= $this->m_config->ambil('config',1)->row();
		$this->load->model('m_user');
		$this->load->library('session');
		$this->load->library('magicmailer');
		$this->blade->sebarno('controller', $this);
	}

	public function index()
	{
		//meload 
		redirect('main');
	}



	public function register($type){
		
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}

		$data 	= $this->data;


		switch ($type) {
			default:
				if($this->session->userdata('authmember')){
					echo goResult(false,"Anda Telah Masuk Akun Member Silahkan Keluar Untuk Mendaftar");
					return;
				}

				$rules = [
						    'required' 	=>	[
						    					['nama'],['jenjang'],['sekolah'],['program_studi'],['email'],['password'],['passwordconf']
						    				],
						   	'email' 	=> [
						   						['email']
						   	]
						   	,
						   	'lengthMin' => [
						        ['password', 8],
						        ['passwordconf', 8]
						    ]
						];
						
				if(!$this->validate($rules,'post')){
					echo goResult(false,"Opps! Form Tidak Benar");
					return;
				}

				if($this->input->post('password') != $this->input->post('passwordconf')){
					echo goResult(false,"Opps! Password Dan Konfirmasi Password Tidak Cocok");
					return;
				}


				$where 	= array(
							'email' 	=> $this->input->post('email'),
						  );


				$check		= $this->m_user->detail($where,'user')->row();

				if(isset($check->id_user)){
						echo goResult(false,"Opps! Email Yang Anda Pakai , Telah Di Gunakan");
						return;	
						if($check->status == 0 ){
								echo goResult(false,"Anda Belum Menkonfirmasi Email Anda");
								return;	
						}
				}

				$data_user = array(
					'nm_user'  => $this->input->post('email'),
					'email'    => $this->input->post('email'),
					'password' => sha1(md5($this->input->post('password'))),
				);

				if($user=$this->m_user->input_data($data_user,'user')){
					$data_peserta = array(
						'nm_peserta'         => $this->input->post('nama'),
						'jenjang_pendidikan' => $this->input->post('jenjang'),
						'nm_sekolah'         => $this->input->post('sekolah'),
						'program_studi'      => $this->input->post('program_studi'),
						'id_user'            => $user
					);
					if($this->m_peserta->input_data($data_peserta,'peserta')){
						echo goResult(true,'Sukses');	
					}
				}
				else {
					echo goResult(false,'Ada Yang Salah Silahkan Coba Kembali Nanti');						
					return;
				}
					return;
					break;
					break;
				}


	}

	public function confirmation($type,$token){
		switch ($type) {
			default:
				if($this->session->userdata('authmember')){
					exit("Logout Akun Member Anda Terlebih Dahulu");
					return;
				}


				$where 			= array(
									'id_member' 		=> $token,
									'status' 	=> 0,
								  );

				$member			= $this->m_member->detail($where,'member')->row();

				if(!isset($member->id_member)){
					exit("Opps! Akun Member Tidak Di Temukan");
				}

				$data_member = array(
					'lastlog'       => date('Y-m-d H:i:s '),
					'ipaddress'     => $this->input->ip_address(),
					'status' 		=> 1
				);

				$this->m_member->update_data($where,$data_member,'member');

				$newdata = array(
								   'authmember_name'	=>  $member->name,
								   'authmember_email'	=>	$member->email,
								   'authmember'			=>	TRUE,
								   'authmember_id'		=> 	$member->id_member,
		               		);
				$this->session->set_userdata($newdata);

				redirect('main');
				break;
		}
	}

	public function go($type){
		
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}

		switch ($type) {
			
			default:
					if($this->session->userdata('authmember')){
					echo goResult(false,"Anda Telah Masuk Akun Member");
					return;
				}

				$rules = [
						    'required' 	=>	[
						    					['username'],
						    					['password'],
						    				]
						];
						
				if(!$this->validate($rules,'post')){
					echo goResult(false,"Opps! Form Tidak Benar");
					return;
				}


				$where 	= array(
							'nm_user' 	=> $this->input->post('username'),
							'password'	=> sha1(md5($this->input->post('password'))),
						  );


				$authmember	= $this->m_user->detail($where,'user')->row();
				
		
				if(!isset($authmember->id_user)){
					echo goResult(false,"Opps! Authentication Gagal , check Email Dan Password!");
					return;
				}


				$newdata = array(
								   'authmember_name'	=>  $authmember->nm_user,
								   'authmember_email'	=>	$authmember->email,
								   'authmember'			=>	TRUE,
								   'authmember_id'		=> 	$authmember->id_user,
								   'authmember_role'		=> 	$authmember->role
		               		);

				$this->session->set_userdata($newdata);

				echo goResult(true,"Authentication Berhasil , redirecting");
				return;

				break;
		}

		
	}

	public function logout($type){

		switch ($type) {
			default:
				if(!$this->session->userdata('auth')){
					redirect('auth');
					return;
				}

				$this->session->sess_destroy();
				redirect('auth');
				break;
		}
	}

	private function validate($rules,$type){
		if($type=="post"){
			$v = new Valitron\Validator($_POST);
		}
		else {
			$v = new Valitron\Validator($_GET);		
		}
		$v->rules($rules);
		if(!$v->validate()){
			return false;
		}
		else {
			return true;
		}
	}

}

/* End of file Autentication.php */
/* Location: ./application/controllers/Autentication.php */