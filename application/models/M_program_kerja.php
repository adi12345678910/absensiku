<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_program_kerja extends CI_Model {

	public function f001_create($data)
	{
		return $this->db->insert('p_program_kerja', $data);
	}

	public function f002_get()
	{
		$this->db->order_by('p_program_kerja.kerja_periode_tahun DESC, p_program_kerja.kerja_periode_bulan DESC');
		$this->db->join('p_user', 'p_user.user_id=.p_program_kerja.kerja_user');
		$this->db->join('p_lembaga', 'p_lembaga.lembaga_id=.p_program_kerja.kerja_lembaga');
		return $this->db->get('p_program_kerja');
	}

	public function f003_getLembaga($kerja_lembaga)
	{
		$this->db->order_by('p_program_kerja.kerja_periode_tahun DESC, p_program_kerja.kerja_periode_bulan DESC');
		$this->db->where('kerja_lembaga', $kerja_lembaga);
		$this->db->join('p_user', 'p_user.user_id=.p_program_kerja.kerja_user');
		$this->db->join('p_lembaga', 'p_lembaga.lembaga_id=.p_program_kerja.kerja_lembaga');
		return $this->db->get('p_program_kerja');
	}

	public function f004_getBy($kerja_id)
	{
		$this->db->where('kerja_id', $kerja_id);
		return $this->db->get('p_program_kerja');
	}

	public function f005_update($kerja_id, $data)
	{
		$this->db->where('kerja_id', $kerja_id);
		return $this->db->update('p_program_kerja', $data);
	}

	public function f006_getTodo($todo_kerja)
	{
		$this->db->order_by('p_user.user_name ASC');
		$this->db->join('p_user', 'p_user.user_id=.t_todo.todo_user');
		$this->db->where('todo_kerja', $todo_kerja);
		return $this->db->get('t_todo');
	}

	public function f007_delete($kerja_id)
	{
		$this->db->where('kerja_id', $kerja_id);
		$this->db->delete('p_program_kerja');
	}

}

/* End of file M_program_kerja.php */
/* Location: ./application/models/M_program_kerja.php */