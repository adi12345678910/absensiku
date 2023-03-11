<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rekap_karyawan extends CI_Model {

	public function f001_getLembaga()
	{
		$this->db->where('lembaga_status', 1);
		$this->db->order_by('lembaga_name ASC');
		return $this->db->get('p_lembaga');
	}

	public function f002_getNamaKaryawan($user_lembaga)
	{
		$this->db->order_by('user_name  ASC');
		$this->db->where_not_in('user_role', 1);
		$query = $this->db->get_where('p_user', array('user_lembaga' => $user_lembaga));
		return $query->result();
	}	

	public function f003_filterAbsen($user_id, $tgl_mulai, $tgl_akhir)
	{
		$this->db->where('absen_user', $user_id);
		$this->db->where('absen_date >=', $tgl_mulai);
		$this->db->where('absen_date <=', $tgl_akhir);
		$this->db->where_not_in('p_user.user_role', 1);
		$this->db->join('p_user', 'p_user.user_id=t_absen.absen_user');
		$this->db->order_by('absen_date ASC');
		return $this->db->get('t_absen');
	}

	public function f004_filterSemuaLembaga($lembaga_id, $tgl_mulai, $tgl_akhir)
	{
		$this->db->where('user_lembaga', $lembaga_id);
		$this->db->where('absen_date >=', $tgl_mulai);
		$this->db->where('absen_date <=', $tgl_akhir);
		$this->db->where_not_in('p_user.user_role', 1);
		$this->db->join('p_user', 'p_user.user_id=t_absen.absen_user');
		$this->db->order_by('absen_date ASC');
		return $this->db->get('t_absen');
	}

	// todo list
	public function f005_filterAbsen($todo_user, $tgl_mulai, $tgl_akhir)
	{
		$this->db->where('todo_user', $todo_user);
		$this->db->where('todo_tgl_input >=', $tgl_mulai);
		$this->db->where('todo_tgl_input <=', $tgl_akhir);
		$this->db->join('p_program_kerja', 'p_program_kerja.kerja_id=t_todo.todo_kerja');
		$this->db->join('p_user', 'p_user.user_id=t_todo.todo_user');
		$this->db->join('p_lembaga', 'p_lembaga.lembaga_id=p_user.user_lembaga');
		$this->db->where_not_in('p_user.user_role', 1);
		$this->db->order_by('todo_tgl_input ASC');
		return $this->db->get('t_todo');
	}

	public function f006_filterSemuaLembaga($lembaga_id, $tgl_mulai, $tgl_akhir)
	{
		$this->db->where('user_lembaga', $lembaga_id);
		$this->db->where('todo_tgl_input >=', $tgl_mulai);
		$this->db->where('todo_tgl_input <=', $tgl_akhir);
		$this->db->join('p_program_kerja', 'p_program_kerja.kerja_id=t_todo.todo_kerja');
		$this->db->join('p_user', 'p_user.user_id=t_todo.todo_user');
		$this->db->join('p_lembaga', 'p_lembaga.lembaga_id=p_user.user_lembaga');
		$this->db->where_not_in('p_user.user_role', 1);
		$this->db->order_by('todo_tgl_input ASC');
		return $this->db->get('t_todo');
	}

	public function f007_inputAbsen($absen_user, $absen_date)
	{
		$this->db->where('absen_user', $absen_user);
		$this->db->where('absen_date', $absen_date);
		return $this->db->get('t_absen');
	}

	public function f008_absenMasuk($data)
	{
		return $this->db->insert('t_absen', $data);
	}

	public function f009_jamMasuk()
	{
		$this->db->where('setting_id', 7);
		return $this->db->get('p_setting');
	}

	public function f010_jamPulang()
	{
		$this->db->where('setting_id', 8);
		return $this->db->get('p_setting');
	}

}

/* End of file M_rekap_karyawan.php */
/* Location: ./application/models/M_rekap_karyawan.php */