<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_role extends CI_Model {

	public function f001_getRole()
	{
		$this->db->where('role_deleted_at', NULL);
		$this->db->order_by('role_name ASC');
		return $this->db->get('p_role');
	}

	public function f002_getRoleBy($role_id)
	{
		$this->db->where('role_id', $role_id);
		return $this->db->get('p_role');
	}

	public function f003_updateRole($role_id, $data)
	{
		$this->db->where('role_id', $role_id);
		return $this->db->update('p_role', $data);
	}

	public function f004_createRole($data)
	{
		return $this->db->insert('p_role', $data);
	}	

}

/* End of file M_role.php */
/* Location: ./application/models/M_role.php */