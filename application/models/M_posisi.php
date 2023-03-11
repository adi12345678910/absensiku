<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_posisi extends CI_Model {

	public function f001_getPosisi()
	{
		$this->db->order_by('posisi_name ASC');
		return $this->db->get('p_posisi');
	}

	public function getdata(){
		
		$query =$this->db->query("SELECT * FROM p_posisi ORDER BY posisi_name ASC");
		return $query->result();
	}

	public function f002_getPosisiBy($posisi_id)
	{
		$this->db->where('posisi_id', $posisi_id);
		return $this->db->get('p_posisi');
	}

	public function f003_updatePosisi($POSISI_id, $data)
	{
		$this->db->where('POSISI_id', $POSISI_id);
		return $this->db->update('p_POSISI', $data);
	}

	public function f004_createPosisi($data)
	{
		return $this->db->insert('p_posisi', $data);
	}
	
	private $table = "p_posisi";
	public function delete($id)
    {
        return $this->db->delete($this->table, array("posisi_id" => $id));
    }

}

/* End of file M_posisi.php */
/* Location: ./application/models/M_posisi.php */