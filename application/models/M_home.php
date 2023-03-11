<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {

	public function f001_getUser($user_id)

	{

		$this->db->where('user_id', $user_id);

		return $this->db->get('p_user');

	}
	
	public function f001_checkAbsen($absen_user, $absen_date)
	{
		$this->db->where('absen_user',$absen_user);
		$this->db->where('absen_date',$absen_date);
		$this->db->join('p_user', 'p_user.user_id=t_absen.absen_user', 'left');
		return $this->db->get('t_absen');
	}

	public function f002_absenMasuk($data)
	{
		return $this->db->insert('t_absen', $data);
	}

	public function f003_jamMasuk()
	{
		$this->db->where('setting_id', 7);
		return $this->db->get('p_setting');
	}

	public function f004_absenPulang($user, $date, $data)
	{
		$this->db->where('absen_user', $user);
		$this->db->where('absen_date', $date);
		return $this->db->update('t_absen', $data);
	}

	public function f005_jamPulang()
	{
		$this->db->where('setting_id', 8);
		return $this->db->get('p_setting');
	}

	public function f006_checkAbsen($absen_user, $absen_date)
	{
		$this->db->where('absen_user', $absen_user);
		$this->db->where('absen_date', $absen_date);
		return $this->db->get('t_absen');
	}

	public function f007_getUSer()
	{
		$this->db->where_not_in('user_role', 1);
		return $this->db->get('p_user');
	}

	public function f008_getProgramKerja($kerja_lembaga, $kerja_periode_bulan, $kerja_periode_tahun)
	{
		$this->db->where('kerja_lembaga', $kerja_lembaga);
		$this->db->where('kerja_periode_bulan', $kerja_periode_bulan);
		$this->db->where('kerja_periode_tahun', $kerja_periode_tahun);
		return $this->db->get('p_program_kerja');
	}

	public function f009_createTodo($data)
	{
		return $this->db->insert('t_todo', $data);
	}

	public function f010_cekTodo($todo_user)
	{
		$this->db->where('todo_user', $todo_user);
		$this->db->where('todo_status', 'todo');
		return $this->db->get('t_todo');
	}

	public function f002_getinfo($informasi_id)
	{
		$this->db->order_by('informasi_date DESC');
		$this->db->join('p_user', 'p_user.user_id=t_informasi.informasi_id');
		$this->db->where('informasi_user', $informasi_id);
		return $this->db->get('t_informasi');
	}

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

/* End of file M_home.php */
/* Location: ./application/models/M_home.php */