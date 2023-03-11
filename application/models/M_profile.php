<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profile extends CI_Model {

	public function f000_getJenisPendidikan()
	{
		return $this->db->get('p_pendidikan_formal_jenis');
	}

	public function f001_getDivisi()
	{
		$this->db->where('divisi_deleted_at', NULL);
		$this->db->order_by('divisi_name ASC');
		return $this->db->get('p_divisi');
	}

	public function getdata(){
		
		$query =$this->db->query("SELECT * FROM p_divisi ORDER BY divisi_name ASC");
		return $query->result();
	}

	public function f001_getProfileBy($user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->join('p_role', 'p_role.role_id=p_user.user_role');
		$this->db->join('p_lembaga', 'p_lembaga.lembaga_id=p_user.user_lembaga');
		$this->db->join('p_jabatan', 'p_jabatan.jabatan_id=p_user.user_jabatan');
		$this->db->join('p_divisi', 'p_divisi.divisi_id=p_user.user_divisi');
		return $this->db->get('p_user');
	}

	public function f002_updateProfile($user_id, $data)
	{
		$this->db->where('user_id', $user_id);
		return $this->db->update('p_user', $data);
	}	


	// pendidikan formal

	public function f003_getPendidikanFormal($pendidikan_formal_user)
	{
		$this->db->where('pendidikan_formal_user', $pendidikan_formal_user);
		$this->db->order_by('formal_jenis_posisi ASC');
		$this->db->join('p_pendidikan_formal_jenis', 'p_pendidikan_formal_jenis.formal_jenis_id=t_pendidikan_formal.pendidikan_formal_jenis');
		return $this->db->get('t_pendidikan_formal');
	}

	public function f003_1_getPendidikanFormalBy($pendidikan_formal_id, $pendidikan_formal_user)
	{
		$this->db->where('pendidikan_formal_id', $pendidikan_formal_id);
		$this->db->where('pendidikan_formal_user', $pendidikan_formal_user);
		return $this->db->get('t_pendidikan_formal');
	}

	public function f003_2_getPendidikanFormalUpdate($pendidikan_formal_id, $pendidikan_formal_user, $data)
	{
		$this->db->where('pendidikan_formal_id', $pendidikan_formal_id);
		$this->db->where('pendidikan_formal_user', $pendidikan_formal_user);
		return $this->db->update('t_pendidikan_formal', $data);
	}

	public function f003_3_getPendidikanFormalCreate($data)
	{
		return $this->db->insert('t_pendidikan_formal', $data);
	}

	public function f003_4_getPendidikanFormalDelete($pendidikan_formal_id)
	{
		$this->db->where('pendidikan_formal_id', $pendidikan_formal_id);
		return $this->db->delete('t_pendidikan_formal');
	}

	// karya imliah

	public function f004_getKaryaIlmiah($karya_ilmiah_user)
	{
		$this->db->order_by('karya_ilmiah_name ASC');
		$this->db->where('karya_ilmiah_user', $karya_ilmiah_user);
		return $this->db->get('t_karya_ilmiah');
	}

	public function f004_1_getKaryaIlmiahBy($karya_ilmiah_id, $karya_ilmiah_user)
	{
		$this->db->where('karya_ilmiah_id', $karya_ilmiah_id);
		$this->db->where('karya_ilmiah_user', $karya_ilmiah_user);
		return $this->db->get('t_karya_ilmiah');
	}

	public function f004_2_getKaryaIlmiahUpdate($karya_ilmiah_id, $karya_ilmiah_user, $data)
	{
		$this->db->where('karya_ilmiah_id', $karya_ilmiah_id);
		$this->db->where('karya_ilmiah_user', $karya_ilmiah_user);
		return $this->db->update('t_karya_ilmiah', $data);
	}

	public function f004_3_getKaryaIlmiahCreate($data)
	{
		return $this->db->insert('t_karya_ilmiah', $data);
	}

	public function f004_4_getKaryaIlmiahDelete($karya_ilmiah_id)
	{
		$this->db->where('karya_ilmiah_id', $karya_ilmiah_id);
		return $this->db->delete('t_karya_ilmiah');
	}

	// pendidikan non formal

	public function f005_getPendidikanNonFormal($formal_non_user)
	{
		$this->db->order_by('formal_non_name ASC');
		$this->db->where('formal_non_user', $formal_non_user);
		return $this->db->get('t_pendidikan_formal_non');
	}

	public function f005_1_getPendidikanNonFormalBy($formal_non_id, $formal_non_user)
	{
		$this->db->where('formal_non_id', $formal_non_id);
		$this->db->where('formal_non_user', $formal_non_user);
		return $this->db->get('t_pendidikan_formal_non');
	}

	public function f005_2_getPendidikanNonFormalUpdate($formal_non_id, $formal_non_user, $data)
	{
		$this->db->where('formal_non_id', $formal_non_id);
		$this->db->where('formal_non_user', $formal_non_user);
		return $this->db->update('t_pendidikan_formal_non', $data);
	}

	public function f005_3_getPendidikanNonFormalCreate($data)
	{
		return $this->db->insert('t_pendidikan_formal_non', $data);
	}

	public function f005_4_getPendidikanNonFormalDelete($formal_non_id)
	{
		$this->db->where('formal_non_id', $formal_non_id);
		return $this->db->delete('t_pendidikan_formal_non');
	}

	// bahasa asing

	public function f006_getBahasaAsing($bahasa_asing_user)
	{
		$this->db->order_by('bahasa_asing_name ASC');
		$this->db->where('bahasa_asing_user', $bahasa_asing_user);
		return $this->db->get('t_bahasa_asing');
	}

	public function f006_1_getBahasaAsingBy($bahasa_asing_id, $bahasa_asing_user)
	{
		$this->db->where('bahasa_asing_id', $bahasa_asing_id);
		$this->db->where('bahasa_asing_user', $bahasa_asing_user);
		return $this->db->get('t_bahasa_asing');
	}

	public function f006_2_getBahasaAsingUpdate($bahasa_asing_id, $bahasa_asing_user, $data)
	{
		$this->db->where('bahasa_asing_id', $bahasa_asing_id);
		$this->db->where('bahasa_asing_user', $bahasa_asing_user);
		return $this->db->update('t_bahasa_asing', $data);
	}

	public function f006_3_getBahasaAsingCreate($data)
	{
		return $this->db->insert('t_bahasa_asing', $data);
	}

	public function f006_4_getBahasaAsingDelete($bahasa_asing_id)
	{
		$this->db->where('bahasa_asing_id', $bahasa_asing_id);
		return $this->db->delete('t_bahasa_asing');
	}

	// pengalaman kerja

	public function f007_getPEngalamanKerja($pengalaman_kerja_user)
	{
		$this->db->order_by('pengalaman_kerja_nama_perusahaan ASC');
		$this->db->where('pengalaman_kerja_user', $pengalaman_kerja_user);
		return $this->db->get('t_pengalaman_kerja');
	}

	public function f007_1_getPengalamanKerjaBy($pengalaman_kerja_id, $pengalaman_kerja_user)
	{
		$this->db->where('pengalaman_kerja_id', $pengalaman_kerja_id);
		$this->db->where('pengalaman_kerja_user', $pengalaman_kerja_user);
		return $this->db->get('t_pengalaman_kerja');
	}

	public function f007_2_getPengalamanKerjaUpdate($pengalaman_kerja_id, $pengalaman_kerja_user, $data)
	{
		$this->db->where('pengalaman_kerja_id', $pengalaman_kerja_id);
		$this->db->where('pengalaman_kerja_user', $pengalaman_kerja_user);
		return $this->db->update('t_pengalaman_kerja', $data);
	}

	public function f007_3_getPengalamanKerjaCreate($data)
	{
		return $this->db->insert('t_pengalaman_kerja', $data);
	}

	public function f007_4_getPengalamanKerjaDelete($pengalaman_kerja_id)
	{
		$this->db->where('pengalaman_kerja_id', $pengalaman_kerja_id);
		return $this->db->delete('t_pengalaman_kerja');
	}

	// pengalaman organisasi

	public function f008_getPengalamanOrganisasi($pengalaman_organisasi_user)
	{
		$this->db->order_by('pengalaman_organisasi_name ASC');
		$this->db->where('pengalaman_organisasi_user', $pengalaman_organisasi_user);
		return $this->db->get('t_pengalaman_organisasi');
	}

	public function f008_1_getOPengalamanORganisasiBy($pengalaman_organisasi_id, $pengalaman_organisasi_user)
	{
		$this->db->where('pengalaman_organisasi_id', $pengalaman_organisasi_id);
		$this->db->where('pengalaman_organisasi_user', $pengalaman_organisasi_user);
		return $this->db->get('t_pengalaman_organisasi');
	}

	public function f008_2_getOPengalamanORganisasiUpdate($pengalaman_organisasi_id, $pengalaman_organisasi_user, $data)
	{
		$this->db->where('pengalaman_organisasi_id', $pengalaman_organisasi_id);
		$this->db->where('pengalaman_organisasi_user', $pengalaman_organisasi_user);
		return $this->db->update('t_pengalaman_organisasi', $data);
	}

	public function f008_3_getOPengalamanORganisasiCreate($data)
	{
		return $this->db->insert('t_pengalaman_organisasi', $data);
	}

	public function f008_4_getOPengalamanORganisasiDelete($pengalaman_organisasi_id)
	{
		$this->db->where('pengalaman_organisasi_id', $pengalaman_organisasi_id);
		return $this->db->delete('t_pengalaman_organisasi');
	}


	// hobby atau kegemaran

	public function f009_getHobbyKegemaran($hk_user)
	{
		$this->db->order_by('hk_name ASC');
		$this->db->where('hk_user', $hk_user);
		return $this->db->get('t_hobby_kegemaran');
	}

	public function f008_1_getHobbyKegemaranBy($hk_id, $hk_user)
	{
		$this->db->where('hk_id', $hk_id);
		$this->db->where('hk_user', $hk_user);
		return $this->db->get('t_hobby_kegemaran');
	}

	public function f008_2_getHobbyKegemaranUpdate($hk_id, $hk_user, $data)
	{
		$this->db->where('hk_id', $hk_id);
		$this->db->where('hk_user', $hk_user);
		return $this->db->update('t_hobby_kegemaran', $data);
	}

	public function f008_3_getHobbyKegemaranCreate($data)
	{
		return $this->db->insert('t_hobby_kegemaran', $data);
	}

	public function f008_4_getHobbyKegemaranDelete($hk_id)
	{
		$this->db->where('hk_id', $hk_id);
		return $this->db->delete('t_hobby_kegemaran');
	}

	public function f009_getProvinsi()
	{
		$this->db->order_by('prov_name');
		return $this->db->get('m_provinsi');
	}

	public function f010_getKokab($kokab_prov)
	{
		$this->db->order_by('kokab_name  ASC');
		$query = $this->db->get_where('m_kokab', array('kokab_prov' => $kokab_prov));
		return $query->result();
	}

	public function f011_getKec($kec_kokab)
	{
		$this->db->order_by('kec_name  ASC');
		$query = $this->db->get_where('m_kec', array('kec_kokab' => $kec_kokab));
		return $query->result();
	}

	public function f012_getDesa($desa_kec)
	{
		$this->db->order_by('desa_name  ASC');
		$query = $this->db->get_where('m_desa', array('desa_kec' => $desa_kec));
		return $query->result();
	}

	// luar bandung

	public function f013_alamatLuarBandung($alamat_luar_user)
	{
		$this->db->where('alamat_luar_user', $alamat_luar_user);
		$this->db->join('m_desa', 'm_desa.desa_id=p_user_alamat_luar_bandung.alamat_luar_desa');
		$this->db->join('m_kec', 'm_kec.kec_id=p_user_alamat_luar_bandung.alamat_luar_kec');
		$this->db->join('m_kokab', 'm_kokab.kokab_id=p_user_alamat_luar_bandung.alamat_luar_kokab');
		$this->db->join('m_provinsi', 'm_provinsi.prov_id=p_user_alamat_luar_bandung.alamat_luar_prov');
		return $this->db->get('p_user_alamat_luar_bandung');
	}

	public function f013_1_alamatLuarBandungUpdate($alamat_luar_id, $alamat_luar_user, $data)
	{
		$this->db->where('alamat_luar_id', $alamat_luar_id);
		$this->db->where('alamat_luar_user', $alamat_luar_user);
		return $this->db->update('p_user_alamat_luar_bandung', $data);
	}

	public function f013_2_alamatLuarBandungCreate($data)
	{
		return $this->db->insert('p_user_alamat_luar_bandung', $data);
	}

	// di bandung

	public function f014_alamatDiBandung($alamat_di_user)
	{
		$this->db->where('alamat_di_user', $alamat_di_user);
		$this->db->join('m_desa', 'm_desa.desa_id=p_user_alamat_di_bandung.alamat_di_desa');
		$this->db->join('m_kec', 'm_kec.kec_id=p_user_alamat_di_bandung.alamat_di_kec');
		$this->db->join('m_kokab', 'm_kokab.kokab_id=p_user_alamat_di_bandung.alamat_di_kokab');
		$this->db->join('m_provinsi', 'm_provinsi.prov_id=p_user_alamat_di_bandung.alamat_di_prov');
		return $this->db->get('p_user_alamat_di_bandung');
	}

	public function f014_1_alamatDiBandungUpdate($alamat_di_id, $alamat_di_user, $data)
	{
		$this->db->where('alamat_di_id', $alamat_di_id);
		$this->db->where('alamat_di_user', $alamat_di_user);
		return $this->db->update('p_user_alamat_di_bandung', $data);
	}

	public function f014_2_alamatDiBandungCreate($data)
	{
		return $this->db->insert('p_user_alamat_di_bandung', $data);
	}

}

/* End of file M_profile.php */
/* Location: ./application/models/M_profile.php */