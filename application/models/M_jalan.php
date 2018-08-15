<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_jalan extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	function tampil_data($table){
		$this->db->from($table);
        $this->db->order_by("jalan_update", "desc");
		return $query = $this->db->get();
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}

	function detail($where,$table){	
		return $this->db->get_where($table,$where);
	}

	function randomData($where,$table){	
		$this->db->order_by('rand()');
		$this->db->limit(1);
		return $this->db->get_where($table,$where);
	}

    function tampil_laporan($table){
        $this->db->from($table);
        $this->db->order_by("jalan_update", "desc");
        return $query = $this->db->get();
    }

    function getkecamatan($where,$table){
        $this->db->from($table);
        $this->db->where($where);
        return $query = $this->db->get();
    }

    function kondisiLaporan($where,$table){
        $this->db->select('MIN(jalan_kondisi_detail_km_manual) as MinKM,MAX(jalan_kondisi_detail_km_manual) as MaxKM');
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get();
    }

    function typekondisiLaporan($where,$table){
        $this->db->select('DISTINCT(jalan_kondisi_detail.jalan_kondisi_id) as JalanKondisiID,jalan_kondisi_tipe,jalan_kondisi_nama');
        $this->db->join('jalan_kondisi','jalan_kondisi.jalan_kondisi_id=jalan_kondisi_detail.jalan_kondisi_id');
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get();
    }

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function detailmap($where,$table){
        $this->db->from($table);
        $this->db->join('jalan_pointer','jalan.jalan_id=jalan_pointer.jalan_id');
        $this->db->where($where);
        $this->db->order_by("jalan_pointer_id", "asc");
        return $query = $this->db->get();
    }

    function getfoto($where,$table){
        $this->db->from($table);
        $this->db->where($where);
        return $query = $this->db->get();
    }

    function laporanruas($where,$table){
        $this->db->from($table);
        $this->db->join('jalan_kondisi','jalan_kondisi.jalan_kondisi_id=jalan_kondisi_detail.jalan_kondisi_id','inner');
        $this->db->order_by("jalan_kondisi_detail_id", "asc");
        $this->db->where($where);
        return $query = $this->db->get();
    }

    function lebar($where,$table){
        $this->db->select('SUM(jalan_kondisi_lebar) as total');
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get();
    }

    function getruaskondisi($where,$table){
        $this->db->select('jalan_kondisi_id,MIN(jalan_kondisi_detail_km_manual) as MinKM,MAX(jalan_kondisi_detail_km_manual) as MaxKM');
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get();
    }

    function tipekondisi($where,$table){
	    $this->db->select('jalan_kondisi_tipe,jalan_kondisi_nama');
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get();
    }
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */