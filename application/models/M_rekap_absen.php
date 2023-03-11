<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rekap_absen extends CI_Model {

	public function f001_getRekapAbsen($absen_user)
	{
		$this->db->order_by('absen_date DESC');
		$this->db->where_in('absen_user', array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45' ,$absen_user));
		$this->db->join('p_user', 'p_user.user_id=t_absen.absen_user');
		$this->db->join('p_lembaga', 'p_lembaga.lembaga_id=p_user.user_lembaga');
		return $this->db->get('t_absen');
	}

	public function f00_getRekapAbsen($absen_user)
	{
		$this->db->order_by('absen_date DESC');
		$this->db->where('absen_user' ,$absen_user);
		$this->db->join('p_user', 'p_user.user_id=t_absen.absen_user');
		$this->db->join('p_lembaga', 'p_lembaga.lembaga_id=p_user.user_lembaga');
		return $this->db->get('t_absen');
	}

	public function f002_getRekapAbsenBy($absen_id)
	{
		$this->db->where('absen_id',$absen_id);
		$this->db->where_in('absen_user', array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45' ,$absen_user));
		$this->db->join('p_user', 'p_user.user_id=t_absen.absen_user');
		$this->db->join('p_lembaga', 'p_lembaga.lembaga_id=p_user.user_lembaga');
		return $this->db->get('t_absen');
	}

	public function f003_getstatus($setting_id)
	{
		$this->db->where('setting_id', $setting_id);
		return $this->db->get('p_setting');
	}

	public function f004_jamMasuk()
	{
		$this->db->where('setting_id', 7);
		return $this->db->get('p_setting');
	}

	public function f005_updateUSer($absen_id, $absen_user, $data)
	{
		$this->db->where('absen_id', $absen_id);
		$this->db->where('absen_user', $absen_user);
		return $this->db->update('t_absen', $data);
	}

	public function f006_jamPulang()
	{
		$this->db->where('setting_id', 8);
		return $this->db->get('p_setting');
	}

	public function f007_edit_rekap($absen_id, $data)
	{

		$this->db->where('absen_id', $absen_id);
		return $this->db->update('t_absen', $data);
	}

	public function f007_edit_rekap_pulang($absen_id, $data)
	{

		$this->db->where('absen_id', $absen_id);
		return $this->db->update('t_absen', $data);
	}


}

/* End of file M_rekap_absen.php */
/* Location: ./application/models/M_rekap_absen.php */