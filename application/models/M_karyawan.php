<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan extends CI_Model {

	public function f001_getUser()
	{
		$this->db->where('user_deleted_at', NULL);
		$this->db->join('p_role', 'p_role.role_id=p_user.user_role');
		$this->db->join('p_lembaga', 'p_lembaga.lembaga_id=p_user.user_lembaga');
		$this->db->order_by('user_name ASC');
		return $this->db->get('p_user');
	}

	public function f002_insertUsert($data)
	{
		return $this->db->insert('p_user', $data);
	}

	public function f003_getRole()
	{
		$this->db->where('role_status', 1);
		$this->db->where_not_in('role_id', 1);
		$this->db->order_by('role_name ASC');
		return $this->db->get('p_role');
	}

	public function f003_getDivisi()
	{
		$this->db->where('divisi_status', 1);
		$this->db->where_not_in('divisi_id', 1);
		$this->db->order_by('divisi_name ASC');
		return $this->db->get('p_divisi');
	}

	public function f004_getLembaga()
	{
		$this->db->where('lembaga_status', 1);
		$this->db->order_by('lembaga_name ASC');
		return $this->db->get('p_lembaga');
	}

	public function f005_getUserBy($user_id)
	{
		$this->db->where('user_id', $user_id);
		return $this->db->get('p_user');
	}

	public function f006_updateUSer($user_id, $data)
	{
		$this->db->where('user_id', $user_id);
		return $this->db->update('p_user', $data);
	}

	public function f007_checkUSer($user_nik)
	{
		$this->db->where('user_nik', $user_nik);
		return $this->db->get('p_user');
	}

}

/* End of file M_karyawan.php */
/* Location: ./application/models/M_karyawan.php */