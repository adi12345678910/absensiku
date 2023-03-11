<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_divisi extends CI_Model {

	public function f001_getDivisi()
	{
		$this->db->order_by('divisi_name ASC');
		return $this->db->get('p_divisi');
	}

	public function getdata(){
		
		$query =$this->db->query("SELECT * FROM p_divisi ORDER BY divisi_name ASC");
		return $query->result();
	}

	public function f002_getDivisiBy($divisi_id)
	{
		$this->db->where('divisi_id', $divisi_id);
		return $this->db->get('p_divisi');
	}

	public function f003_updateDivisi($divisi_id, $data)
	{
		$this->db->where('divisi_id', $divisi_id);
		return $this->db->update('p_divisi', $data);
	}

	public function f004_createDivisi($data)
	{
		return $this->db->insert('p_divisi', $data);
	}
	
	private $table = "p_divisi";
	public function delete($id)
    {
        return $this->db->delete($this->table, array("divisi_id" => $id));
    }

}

/* End of file M_divisi.php */
/* Location: ./application/models/M_divisi.php */