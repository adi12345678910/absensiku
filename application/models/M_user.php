<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function f001_getUser()
	{
		$this->db->where('user_deleted_at', NULL);
		$this->db->join('p_role', 'p_role.role_id=p_user.user_role');
		$this->db->join('p_lembaga', 'p_lembaga.lembaga_id=p_user.user_lembaga');
		$this->db->join('p_divisi', 'p_divisi.divisi_id=p_user.user_divisi');
		$this->db->join('p_jabatan', 'p_jabatan.jabatan_id=p_user.user_jabatan');
		$this->db->join('p_posisi', 'p_posisi.posisi_id=p_user.user_posisi');
		$this->db->order_by('user_name ASC');
		return $this->db->get('p_user');
	}

	public function f002_insertUsert($data)
	{
		return $this->db->insert('p_user', $data);
	}

	public function getdata(){
		
		$query =$this->db->query("SELECT * FROM p_divisi ORDER BY divisi_name ASC");
		return $query->result();
	}

	public function getjabatan(){
		
		$query =$this->db->query("SELECT * FROM p_jabatan ORDER BY jabatan_name ASC");
		return $query->result();
	}

	public function getposisi(){
		
		$query =$this->db->query("SELECT * FROM p_posisi ORDER BY posisi_name ASC");
		return $query->result();
	}

	public function f003_getRole()
	{
		$this->db->where('role_status', 1);
		$this->db->order_by('role_name ASC');
		return $this->db->get('p_role');
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

	private $table = "p_user";
	public function delete($id)
    {
        return $this->db->delete($this->table, array("user_id" => $id));
    }

}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */