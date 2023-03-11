<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kritik_saran extends CI_Model {

	public function f001_create($data)
	{
		return $this->db->insert('t_kritik_saran', $data);
	}

	public function f002_get()
	{
		$this->db->order_by('ks_date DESC');
		$this->db->join('p_user', 'p_user.user_id=t_kritik_saran.ks_user');
		return $this->db->get('t_kritik_saran');
	}

	public function f003_getby($ks_user)
	{
		$this->db->order_by('ks_date DESC');
		$this->db->where('ks_user', $ks_user);
		return $this->db->get('t_kritik_saran');
	}

}

/* End of file M_kritik_saran.php */
/* Location: ./application/models/M_kritik_saran.php */