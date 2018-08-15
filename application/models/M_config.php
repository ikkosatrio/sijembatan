<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_config extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	function ambil($table,$id){
		$where = array('id' => $id);		
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function tampil_laporan($table){
		$this->db->from($table);
        $this->db->order_by("jalan_update", "desc");
		return $query = $this->db->get();
	}

	function detil_laporan_1($where,$table){
		$this->db->select('DISTINCT(jalan_kondisi_detail.jalan_kondisi_id),jalan_kondisi_tipe,jalan_kondisi_nama');
		return $this->db->get_where($table,$where);
	}

	function detil_laporan_2($where,$table){
		$this->db->select('MIN(jalan_kondisi_detail_km_manual), MAX(jalan_kondisi_detail_km_manual)');
		return $this->db->get_where($table,$where);
	}

	function info_ruas($table,$where){
		$this->db->from($table);
        $this->db->order_by("jalan_update", "desc");
        $this->db->where($where);
		return $query = $this->db->get();
	}

}

/* End of file M_config.php */
/* Location: ./application/models/M_config.php */