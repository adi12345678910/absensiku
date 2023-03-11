<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jabatan extends CI_Model {

	public function f001_getJabatan()
	{
		$this->db->order_by('jabatan_name ASC');
		return $this->db->get('p_jabatan');
	}

	public function getdata(){
		
		$query =$this->db->query("SELECT * FROM p_jabatan ORDER BY jabatan_name ASC");
		return $query->result();
	}

	public function f002_getJabatanBy($jabatan_id)
	{
		$this->db->where('jabatan_id', $jabatan_id);
		return $this->db->get('p_jabatan');
	}

	public function f003_updateJabatan($jabatan_id, $data)
	{
		$this->db->where('jabatan_id', $jabatan_id);
		return $this->db->update('p_jabatan', $data);
	}

	public function f004_createJabatan($data)
	{
		return $this->db->insert('p_jabatan', $data);
	}
	
	private $table = "p_jabatan";
	public function delete($id)
    {
        return $this->db->delete($this->table, array("jabatan_id" => $id));
    }

}

/* End of file M_jabatan.php */
/* Location: ./application/models/M_jabatan.php */