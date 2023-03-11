<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_informasi extends CI_Model {

	public function f001_create($data)
	{
		return $this->db->insert('t_informasi', $data);
	}


	public function getdata(){
		
		$query =$this->db->query("SELECT * FROM t_informasi ORDER BY judul_informasi ASC");
		return $query->result();
	}

	public function f002_getPosisiBy($informasi_id)
	{
		$this->db->where('informasi_id', $informasi_id);
		return $this->db->get('t_informasi');
	}

	public function f002_get()
	{
		$this->db->order_by('informasi_date DESC');
		$this->db->join('p_user', 'p_user.user_id=t_informasi.informasi_user');
		return $this->db->get('t_informasi');
	}

	public function f003_getby($informasi_user)
	{
		$this->db->order_by('informasi_date DESC');
		$this->db->where('informasi_user', $informasi_user);
		return $this->db->get('t_informasi');
	}

	public function f005_getUserBy($informasi_id)
		{
			$this->db->where('informasi_id', $informasi_id);

			return $this->db->get('t_informasi');
		}

	public function f006_updateInformasi($informasi_id, $data)
	{
		$this->db->where('informasi_id', $informasi_id);
		return $this->db->update('t_informasi', $data);
	}
	private $table = "t_informasi";
	public function delete($id)
    {
        return $this->db->delete($this->table, array("informasi_id" => $id));
    }

	}