<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superuser extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('auth')){
			redirect('auth');
		}
		$this->blade->sebarno('ctrl', $this);
		$this->load->library('session');
		$this->load->model('m_config');
		$this->load->model('m_user');
        $this->load->model('m_jembatan');
		$this->data['config'] = $this->m_config->ambil('config',1)->row();
	}

	public function index()
	{
		$data            = $this->data;
		$data['menu']    = "dashboard";
		echo $this->blade->nggambar('admin.home',$data);
	}
	//---------------------------------------------------------------------


    //
    // Start Config
    public function config ($type=null){
        $data         = $this->data;
        // $data         = $this->data;
        $data['menu'] = "config";

        if ($this->input->is_ajax_request()) {

            switch ($type) {

                case 'update':

                    $logoname 		= $data['config']->logo;
                    $iconname 		= $data['config']->icon;

                    if (!empty($_FILES['logo']['name'])) {
                        $upload 	= $this->upload('./assets/images/website/config/logo/','logo','logo');

                        if($upload['auth']	== false){
                            echo goResult(false,$upload['msg']);
                            return;
                        }

                        $logoname 	= $upload['msg']['file_name'];
                        if(!empty($logoname)){remFile(base_url().'assets/images/website/config/logo/'.$data['config']->logo);}
                    }

                    if (!empty($_FILES['icon']['name'])) {
                        $upload 	= $this->upload('./assets/images/website/config/icon/','icon','icon');
                        if($upload['auth']	== false){
                            echo goResult(false,$upload['msg']);
                            return;
                        }

                        $iconname 	= $upload['msg']['file_name'];
                        if(!empty($iconname)){remFile(base_url().'assets/images/website/config/icon/'.$data['config']->icon);}
                    }

                    $id             = 1;
                    $name           = $this->input->post('name');
                    $email          = $this->input->post('email');
                    $phone          = $this->input->post('phone');
                    $facebook       = $this->input->post('facebook');
                    $instagram      = $this->input->post('instagram');
                    $address        = $this->input->post('address');
                    $description    = $this->input->post('description');
                    $meta_deskripsi = $this->input->post('meta_deskripsi');
                    $meta_keyword   = $this->input->post('meta_keyword');

                    $data = array(
                        'name'           => $name,
                        'email'          => $email,
                        'phone'          => $phone,
                        'facebook'       => $facebook,
                        'instagram'      => $instagram,
                        'address'        => $address,
                        'description'    => $description,
                        'icon'           => $iconname,
                        'logo'           => $logoname,
                        'meta_deskripsi' => $meta_deskripsi,
                        'meta_keyword'   => $meta_keyword
                    );

                    $where = array(
                        'id' => $id
                    );

                    if($this->m_config->update_data($where,$data,'config')){
                        echo goResult(true,"Data Telah Di Perbarui");
                        return;
                    }

                    break;

                default:
                    echo goResult(false,"Konfigurasi Telah Di Simpan");
                    return;
                    break;
            }
            return;
        }

        echo $this->blade->nggambar('admin.config.index',$data);
        return;
    }
    // End Config

    //
    public function jembatan($url=null,$id=null){
        $data             = $this->data;
        $data['menu']     = "jembatan";
        $data['jembatan']  = $this->m_jembatan->tampil_data('jembatan')->result();

        if ($url=="create") {
            $data['type']			= "create";
            echo $this->blade->nggambar('admin.jembatan.content',$data);
            return;
        }else if ($url == "created" && $this->input->is_ajax_request() == true) {

            $nomor_ruas      = $this->input->post('nomor_ruas');
            $nama_ruas   = $this->input->post('nama_ruas');
            $nama_jembatan = $this->input->post('nama_jembatan');
            $lokasi = $this->input->post('lokasi');
            $lat = $this->input->post('lat');
            $lng = $this->input->post('lng');
            $jumlah = $this->input->post('jumlah');
            $dimensiP = $this->input->post('dimensiP');
            $dimensiL = $this->input->post('dimensiL');
            $dimensiT = $this->input->post('dimensiT');
            $atas_jenis = $this->input->post('atas_jenis');
            $atas_kondisi = $this->input->post('atas_kondisi');
            $bawah_jenis = $this->input->post('bawah_jenis');
            $bawah_kondisi = $this->input->post('bawah_kondisi');


            $data = array(
                'jembatan_no_ruas'      => $nomor_ruas,
                'jembatan_nama_ruas'   => $nama_ruas,
                'jembatan_nama'      => $nama_jembatan,
                'jembatan_lokasikm' => $lokasi,
                'jembatan_lat'      => $lat,
                'jembatan_lng'   => $lng,
                'jembatan_jml_bentang'      => $jumlah,
                'jembatan_dimensiP' => $dimensiP,
                'jembatan_dimensiL'      => $dimensiL,
                'jembatan_dimensiT'   => $dimensiT,
                'jembatan_bang_atas_jenis'      => $atas_jenis,
                'jembatan_bang_atas_kondisi' => $atas_kondisi,
                'jembatan_bang_bawah_jenis' => $bawah_jenis,
                'jembatan_bang_bawah_jenis' => $bawah_kondisi
            );

            if($this->m_jembatan->input_data($data,'jembatan')){
                echo goResult(true,"Data Telah Di Tambahkan");
                return;
            }
        }
        else if ($url=="update" && $id!=null) {
            $data['type']    = "update";
            $where           = array('jembatan_id' => $id);
            $data['jembatan'] = $this->m_jembatan->detail($where,'jembatan')->row();
            echo $this->blade->nggambar('admin.jembatan.content',$data);
        }
        else if ($url=="updated" && $id!=null && $this->input->is_ajax_request() == true) {
            $where           = array('jembatan_id' => $id);

            $nomor_ruas      = $this->input->post('nomor_ruas');
            $nama_ruas   = $this->input->post('nama_ruas');
            $nama_jembatan = $this->input->post('nama_jembatan');
            $lokasi = $this->input->post('lokasi');
            $lat = $this->input->post('lat');
            $lng = $this->input->post('lng');
            $jumlah = $this->input->post('jumlah');
            $dimensiP = $this->input->post('dimensiP');
            $dimensiL = $this->input->post('dimensiL');
            $dimensiT = $this->input->post('dimensiT');
            $atas_jenis = $this->input->post('atas_jenis');
            $atas_kondisi = $this->input->post('atas_kondisi');
            $bawah_jenis = $this->input->post('bawah_jenis');
            $bawah_kondisi = $this->input->post('bawah_kondisi');


            $data = array(
                'jembatan_no_ruas'      => $nomor_ruas,
                'jembatan_nama_ruas'   => $nama_ruas,
                'jembatan_nama'      => $nama_jembatan,
                'jembatan_lokasikm' => $lokasi,
                'jembatan_lat'      => $lat,
                'jembatan_lng'   => $lng,
                'jembatan_jml_bentang'      => $jumlah,
                'jembatan_dimensiP' => $dimensiP,
                'jembatan_dimensiL'      => $dimensiL,
                'jembatan_dimensiT'   => $dimensiT,
                'jembatan_bang_atas_jenis'      => $atas_jenis,
                'jembatan_bang_atas_kondisi' => $atas_kondisi,
                'jembatan_bang_bawah_jenis' => $bawah_jenis,
                'jembatan_bang_bawah_jenis' => $bawah_kondisi
            );

            if($this->m_jembatan->update_data($where,$data,'jembatan')){
                echo goResult(true,"Data Telah Di Tambahkan");
                return;
            }

        }
        else if ($url=="deleted" && $id != null) {
            $where           = array('pejabat_id' => $id);
            if ($this->m_jembatan->hapus_data($where,'jembatan')) {

            }
            redirect('superuser/jembatan/');
        }else{
            echo $this->blade->nggambar('admin.jembatan.index',$data);
            return;
        }
    }

	//--------------------------------------------------------fungsi global
	private function upload($dir,$name ='userfile',$filename=null){
		$config['upload_path']      = $dir;
        $config['allowed_types']    = 'gif|jpg|png|jpeg|docx|doc|pdf';
        $config['max_size']         = 8000;
        $config['encrypt_name'] 	= FALSE;
        $config['file_name'] 		= $filename;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($name))
        {
        		$data['auth'] 	= false;
                $data['msg'] 	= $this->upload->display_errors();
                return $data;
        }
        else
        {
        		$data['auth']	= true;
        		$data['msg']	= $this->upload->data();
        		return $data;
        }
	}

	function lokasi(){
        $data             = $this->data;
        $data['menu']     = "lokasi";

        echo $this->blade->nggambar('admin.lokasi.index',$data);
        return;
    }

	private function upload1($dir,$name ='user',$filename=null){
		// echo $filename;
		$config['upload_path']      = $dir;
        $config['allowed_types']    = 'gif|jpg|png|jpeg|docx|doc|pdf';
        $config['max_size']         = 8000;
        $config['encrypt_name'] 	= FALSE;
        $config['file_name'] 		= $filename;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($name))
        {
        		$data['auth'] 	= false;
                $data['msg'] 	= $this->upload->display_errors();
                return $data;
        }
        else
        {
        		$data['auth']	= true;
        		$data['msg']	= $this->upload->data();
        		return $data;
        }
	}

	private function upload_files($path,$files){

        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'gif|jpg|png|jpeg',
            'max_size'		=> '10000',
            'overwrite'     => false,
            'encrypt_name'  => FALSE
        );

        $this->load->library('upload', $config);

        $images 		= array();
        $data['msg']	= array();
        $data['auth']	= false;
        foreach ($files['name'] as $key => $image) {
			$_FILES['images[]']['name']     = $files['name'][$key];
			$_FILES['images[]']['type']     = $files['type'][$key];
			$_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
			$_FILES['images[]']['error']    = $files['error'][$key];
			$_FILES['images[]']['size']     = $files['size'][$key];

			$value 		= str_replace(' ', '_', $_FILES['images[]']['name']);
            $config['file_name'] 		= $value;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
            	$data['auth']		= true;
            	array_push($data['msg'],$this->upload->data());
            } else {
            	$data['auth']		= ($data['auth']==true) ? true : false;
            	array_push($data['msg'],$this->upload->display_errors());
            }
        }

        return $data;
    }

    private function isImage($file){
		if ((($_FILES[$file]['type'] == 'image/gif') || ($_FILES[$file]['type'] == 'image/jpeg') || ($_FILES[$file]['type'] == 'image/png'))){
			return true;
		}
		else {
			return false;
		}
	}
}
