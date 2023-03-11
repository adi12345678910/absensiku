<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_hari_libur extends CI_Model {

	public function f001_getHariLibur()
	{
		$this->db->where('hari_libur_deleted_at', NULL);
		$this->db->order_by('hari_libur_tanggal DESC');
		return $this->db->get('p_hari_libur');
	}

	public function f002_insertHariLibur($data)
	{
		return $this->db->insert('p_hari_libur', $data);
	}

	public function f003_updateHariLibur($hari_libur_id, $data)
	{
		$this->db->where('hari_libur_id', $hari_libur_id);
		return $this->db->update('p_hari_libur', $data);
	}

}

/* End of file M_hari_libur.php */
/* Location: ./application/models/M_hari_libur.php */