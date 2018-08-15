<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	function tampil_data($table){
		$this->db->from($table);
		// $this->db->join('bidang','bidang.id_bidang=peserta.id_bidang');
		return $query = $this->db->get();
		// return $this->db->get($table);
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}

	function detail($where,$table){	
		// $this->db->join('bidang','bidang.id_bidang=bidang.id_bidang');
		return $this->db->get_where($table,$where);
	}

	function randomData($where,$table){	
		$this->db->order_by('rand()');
		$this->db->limit(1);
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */