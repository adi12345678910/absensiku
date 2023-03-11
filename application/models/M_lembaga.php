<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lembaga extends CI_Model {

	public function f001_getLembaga()
	{
		$this->db->where('lembaga_deleted_at', NULL);
		$this->db->order_by('lembaga_name ASC');
		return $this->db->get('p_lembaga');
	}	

	public function f002_getLembagaBy($lembaga_id)
	{
		$this->db->where('lembaga_id', $lembaga_id);
		return $this->db->get('p_lembaga');
	}

	public function f003_updateLembaga($lembaga_id, $data)
	{
		$this->db->where('lembaga_id', $lembaga_id);
		return $this->db->update('p_lembaga', $data);
	}

	public function f004_createLembaga($data)
	{
		return $this->db->insert('p_lembaga', $data);
	}
}

/* End of file M_lembaga.php */
/* Location: ./application/models/M_lembaga.php */