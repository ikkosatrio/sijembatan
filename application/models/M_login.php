<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */