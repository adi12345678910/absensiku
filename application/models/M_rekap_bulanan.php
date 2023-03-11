<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rekap_bulanan extends CI_Model {

	public function f001_getKaryawan($user_lembaga)
	{
		$this->db->order_by('user_name ASC');
		$this->db->where_not_in('user_role', 1);
		$this->db->where('user_status', 1);
		$this->db->join('p_lembaga', 'p_lembaga.lembaga_id=p_user.user_lembaga');
		$this->db->join('p_jabatan', 'p_jabatan.jabatan_id=p_user.user_jabatan');
		$this->db->join('p_divisi', 'p_divisi.divisi_id=p_user.user_divisi');
		$this->db->join('p_posisi', 'p_posisi.posisi_id=p_user.user_posisi');
		$this->db->where('user_lembaga', $user_lembaga);
		return $this->db->get('p_user');
	}

	public function f002_jumlahKehadiran($absen_user, $absen_month, $year_now)
	{
		$this->db->where('absen_user', $absen_user);
		$this->db->where('absen_masuk_status', 2);
		$this->db->where('MONTH(absen_date)', $absen_month);
		$this->db->where('YEAR(absen_date)', $year_now);
		$this->db->from('t_absen');
		return $this->db->count_all_results();
	}

	public function f003_presentaseKehadiran($year_now, $month_now)
	{
		$this->db->where('hari_libur_deleted_at', NULL); // baru
		$this->db->where('YEAR(hari_libur_tanggal)', $year_now);
		$this->db->where('MONTH(hari_libur_tanggal)', $month_now);
		$this->db->from('p_hari_libur');
		return $this->db->count_all_results();
	}

	public function f004_jumlahTelat($absen_user, $absen_month)
	{
		$this->db->where('absen_user', $absen_user);
		$this->db->where('MONTH(absen_date)', $absen_month);
		$this->db->where('absen_masuk_poin <', 0); 
		$this->db->from('t_absen');
		return $this->db->count_all_results();
	}

	public function f005_jumlahIzin($absen_user, $absen_month, $absen_year)
	{
		// $this->db->where('absen_user', $absen_user);
		// $this->db->where('MONTH(absen_date)', $absen_month);
		// $this->db->where('absen_masuk_status', 5); 
		// $this->db->from('t_absen');
		$this->db->where('YEAR(is_mulai) >=', $absen_year);
		$this->db->where('YEAR(is_sampai) <=', $absen_year);
		$this->db->where('MONTH(is_mulai) >=', $absen_month);
		$this->db->where('MONTH(is_sampai) <=', $absen_month);
		$this->db->where('is_status', 'diterima');
		$this->db->where('is_name', 'izin');
		$this->db->where('is_user', $absen_user);
		return $this->db->get('t_izin');
		// return $this->db->count_all_results();
	}

	public function f006_jumlahSakit($absen_user, $absen_month, $absen_year)
	{
		// $this->db->where('absen_user', $absen_user);
		// $this->db->where('MONTH(absen_date)', $absen_month);
		// $this->db->where('absen_masuk_status', 4); 
		// $this->db->from('t_absen');
		$this->db->where('YEAR(is_mulai) >=', $absen_year);
		$this->db->where('YEAR(is_sampai) <=', $absen_year);
		$this->db->where('MONTH(is_mulai) >=', $absen_month);
		$this->db->where('MONTH(is_sampai) <=', $absen_month);
		$this->db->where('is_status', 'diterima');
		$this->db->where('is_name', 'sakit');
		$this->db->where('is_user', $absen_user);
		return $this->db->get('t_sakit');
		// return $this->db->count_all_results();
	}

	public function f0_jumlahcutitahunan($absen_user, $absen_month, $absen_year)
	{
		// $this->db->where('absen_user', $absen_user);
		// $this->db->where('MONTH(absen_date)', $absen_month);
		// $this->db->where('absen_masuk_status', 4); 
		// $this->db->from('t_absen');
		$this->db->where('YEAR(is_mulai) >=', $absen_year);
		$this->db->where('YEAR(is_sampai) <=', $absen_year);
		$this->db->where('MONTH(is_mulai) >=', $absen_month);
		$this->db->where('MONTH(is_sampai) <=', $absen_month);
		$this->db->where('is_status', 'diterima');
		$this->db->where('is_name', 'Cuti Tahunan');
		$this->db->where('is_user', $absen_user);
		return $this->db->get('t_cuti_tahunan');
		// return $this->db->count_all_results();
	}

	public function f1_jumlahcutikhusus($absen_user, $absen_month, $absen_year)
	{
		// $this->db->where('absen_user', $absen_user);
		// $this->db->where('MONTH(absen_date)', $absen_month);
		// $this->db->where('absen_masuk_status', 4); 
		// $this->db->from('t_absen');
		$this->db->where('YEAR(is_mulai) >=', $absen_year);
		$this->db->where('YEAR(is_sampai) <=', $absen_year);
		$this->db->where('MONTH(is_mulai) >=', $absen_month);
		$this->db->where('MONTH(is_sampai) <=', $absen_month);
		$this->db->where('is_status', 'diterima');
		$this->db->where('is_name', 'Cuti Khusus');
		$this->db->where('is_user', $absen_user);
		return $this->db->get('t_cuti_khusus');
		// return $this->db->count_all_results();
	}

	public function f2_jumlahRemote($absen_user, $absen_month, $absen_year)
	{
		// $this->db->where('absen_user', $absen_user);
		// $this->db->where('MONTH(absen_date)', $absen_month);
		// $this->db->where('absen_masuk_status', 4); 
		// $this->db->from('t_absen');
		$this->db->where('YEAR(is_mulai) >=', $absen_year);
		$this->db->where('YEAR(is_sampai) <=', $absen_year);
		$this->db->where('MONTH(is_mulai) >=', $absen_month);
		$this->db->where('MONTH(is_sampai) <=', $absen_month);
		$this->db->where('is_status', 'diterima');
		$this->db->where_in('is_name', array('Bencana Alam','Berobat','Ke Bank','Sakit','dll'));
		$this->db->where('is_user', $absen_user);
		return $this->db->get('t_remote');
		// return $this->db->count_all_results();
	}

	public function f007_jumlahAlfa($absen_user, $absen_month)
	{
		$this->db->where('absen_user', $absen_user);
		$this->db->where('MONTH(absen_date)', $absen_month);
		$this->db->where('absen_masuk_status', 6); 
		$this->db->from('t_absen');
		return $this->db->count_all_results();
	}

	public function f008_getLembaga()
	{
		$this->db->where('lembaga_deleted_at', NULL);
		$this->db->order_by('lembaga_name ASC');
		return $this->db->get('p_lembaga');
	}

	public function f009_getKaryawanView()
	{
		$this->db->order_by('user_name ASC');
		$this->db->where_not_in('user_role', 1);
		$this->db->join('p_lembaga', 'p_lembaga.lembaga_id=p_user.user_lembaga');
		$this->db->join('p_jabatan', 'p_jabatan.jabatan_id=p_user.user_jabatan');

		$this->db->join('p_divisi', 'p_divisi.divisi_id=p_user.user_divisi');

		$this->db->join('p_posisi', 'p_posisi.posisi_id=p_user.user_posisi');
		return $this->db->get('p_user');
	}

	// rekap karyawan

	public function f010_jumlahKehadiran($absen_user, $tgl_mulai, $tgl_akhir)
	{
		$this->db->where('absen_user', $absen_user);
		$this->db->where('absen_date >=', $tgl_mulai);
		$this->db->where('absen_date <=', $tgl_akhir);
		$this->db->from('t_absen');
		return $this->db->count_all_results();
	}

	public function f011_presentaseKehadiran($tgl_mulai, $tgl_akhir)
	{
		$this->db->where('hari_libur_deleted_at', NULL); // baru
		$this->db->where('hari_libur_tanggal >=', $tgl_mulai);
		$this->db->where('hari_libur_tanggal <=', $tgl_akhir);
		$this->db->from('p_hari_libur');
		return $this->db->count_all_results();
	}


	public function f012_jumlahTelat($absen_user, $tgl_mulai, $tgl_akhir)
	{
		$this->db->where('absen_user', $absen_user);
		$this->db->where('absen_date >=', $tgl_mulai);
		$this->db->where('absen_date <=', $tgl_akhir);
		$this->db->where('absen_masuk_poin <', 0); 
		$this->db->from('t_absen');
		return $this->db->count_all_results();
	}

	public function f013_jumlahIzin($absen_user,$tgl_mulai, $tgl_akhir)
	{
		$this->db->where('absen_user', $absen_user);
		$this->db->where('absen_date >=', $tgl_mulai);
		$this->db->where('absen_date <=', $tgl_akhir);
		$this->db->from('t_absen');
		return $this->db->count_all_results();
	}

	public function f014_jumlahSakit($absen_user,$tgl_mulai, $tgl_akhir)
	{
		$this->db->where('absen_user', $absen_user);
		$this->db->where('absen_date >=', $tgl_mulai);
		$this->db->where('absen_date <=', $tgl_akhir);
		$this->db->from('t_absen');
		return $this->db->count_all_results();
	}

	public function f015_jumlahAlfa($absen_user,$tgl_mulai, $tgl_akhir)
	{
		$this->db->where('absen_user', $absen_user);
		$this->db->where('absen_date >=', $tgl_mulai);
		$this->db->where('absen_date <=', $tgl_akhir);
		$this->db->where('absen_masuk_status', 6); 
		$this->db->from('t_absen');
		return $this->db->count_all_results();
	}

	public function f015_getKaryawanView($user_lembaga)
	{
		$this->db->order_by('user_name ASC');
		$this->db->where('user_lembaga', $user_lembaga);
		$this->db->where_not_in('user_role', 1);
		$this->db->join('p_lembaga', 'p_lembaga.lembaga_id=p_user.user_lembaga');
		return $this->db->get('p_user');
	}

	public function f016_getLembaga($lembaga_id)
	{
		$this->db->where('lembaga_id', $lembaga_id);
		return $this->db->get('p_lembaga');
	}

	public function f017_jumlahcutikhusus($absen_user,$tgl_mulai, $tgl_akhir)
	{
		$this->db->where('absen_user', $absen_user);
		$this->db->where('absen_date >=', $tgl_mulai);
		$this->db->where('absen_date <=', $tgl_akhir);
		$this->db->from('t_absen');
		return $this->db->count_all_results();
	}

	public function f018_jumlahcutitahunan($absen_user,$tgl_mulai, $tgl_akhir)
	{
		$this->db->where('absen_user', $absen_user);
		$this->db->where('absen_date >=', $tgl_mulai);
		$this->db->where('absen_date <=', $tgl_akhir);
		$this->db->from('t_absen');
		return $this->db->count_all_results();
	}

	public function f019_jumlahRemote($absen_user,$tgl_mulai, $tgl_akhir)
	{
		$this->db->where('absen_user', $absen_user);
		$this->db->where('absen_date >=', $tgl_mulai);
		$this->db->where('absen_date <=', $tgl_akhir);
		$this->db->from('t_absen');
		return $this->db->count_all_results();
	}
}

/* End of file M_rekap_bulanan.php */
/* Location: ./application/models/M_rekap_bulanan.php */