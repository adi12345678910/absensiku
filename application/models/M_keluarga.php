<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_keluarga extends CI_Model {

	public function f000_getJenisPendidikan()
	{
		return $this->db->get('p_pendidikan_formal_jenis');
	}

	//

	public function f001_getStatusPernikahan($nikah_user)
	{
		$this->db->where('nikah_user', $nikah_user);
		return $this->db->get('t_status_pernikahan');
	}

	public function f001_1_updateStatusPernikahan($nikah_id, $nikah_user, $data)
	{
		$this->db->where('nikah_id', $nikah_id);
		$this->db->where('nikah_user', $nikah_user);
		return $this->db->update('t_status_pernikahan', $data);
	}

	public function f001_2_insertStatusPernikahan($data)
	{
		return $this->db->insert('t_status_pernikahan', $data);
	}

	//

	public function f002_getKeluargaSatuSuami($k_satu_user)
	{
		$this->db->where('k_satu_user', $k_satu_user);
		$this->db->where('k_satu_status', 'suami');
		$this->db->join('p_pendidikan_formal_jenis', 'p_pendidikan_formal_jenis.formal_jenis_id=t_keluarga_satu.k_satu_pendidikan');
		return $this->db->get('t_keluarga_satu');
	}

	public function f002_1_getKeluargaSatuBy($k_satu_id, $k_satu_user)
	{
		$this->db->where('k_satu_id', $k_satu_id);
		$this->db->where('k_satu_user', $k_satu_user);
		return $this->db->get('t_keluarga_satu');
	}

	public function f002_2_getKeluargaSatuUpdate($k_satu_id, $k_satu_user, $data)
	{
		$this->db->where('k_satu_id', $k_satu_id);
		$this->db->where('k_satu_user', $k_satu_user);
		return $this->db->update('t_keluarga_satu', $data);
	}

	public function f002_3_getKeluargaSatuCreate($data)
	{
		return $this->db->insert('t_keluarga_satu', $data);
	}

	public function f002_4_getKeluargaSatuDelete($k_satu_id)
	{
		$this->db->where('k_satu_id', $k_satu_id);
		return $this->db->delete('t_keluarga_satu');
	}

	public function f003_getKeluargaSatuIstri($k_satu_user)
	{
		$this->db->where('k_satu_user', $k_satu_user);
		$this->db->order_by('k_satu_name ASC');
		$this->db->where('k_satu_status', 'istri');
		$this->db->join('p_pendidikan_formal_jenis', 'p_pendidikan_formal_jenis.formal_jenis_id=t_keluarga_satu.k_satu_pendidikan');
		return $this->db->get('t_keluarga_satu');
	}

	public function f004_getKeluargaSatuAnak($k_satu_user)
	{
		$this->db->where('k_satu_user', $k_satu_user);
		$this->db->order_by('k_satu_tgl_lahir ASC');
		$this->db->where_not_in('k_satu_status', 'suami');
		$this->db->where_not_in('k_satu_status', 'istri');
		$this->db->join('p_pendidikan_formal_jenis', 'p_pendidikan_formal_jenis.formal_jenis_id=t_keluarga_satu.k_satu_pendidikan');
		return $this->db->get('t_keluarga_satu');
	}

	//

	public function f005_getKeluargaDuaAyah($k_dua_user)
	{
		$this->db->where('k_dua_user', $k_dua_user);
		$this->db->where('k_dua_status', 'ayah');
		$this->db->join('p_pendidikan_formal_jenis', 'p_pendidikan_formal_jenis.formal_jenis_id=t_keluarga_dua.k_dua_pendidikan');
		return $this->db->get('t_keluarga_dua');
	}

	public function f005_1_getKeluargaDuaBy($k_dua_id, $k_dua_user)
	{
		$this->db->where('k_dua_id', $k_dua_id);
		$this->db->where('k_dua_user', $k_dua_user);
		return $this->db->get('t_keluarga_dua');
	}

	public function f005_2_getKeluargaDuaUpdate($k_dua_id, $k_dua_user, $data)
	{
		$this->db->where('k_dua_id', $k_dua_id);
		$this->db->where('k_dua_user', $k_dua_user);
		return $this->db->update('t_keluarga_dua', $data);
	}

	public function f005_3_getKeluargaDuaCreate($data)
	{
		return $this->db->insert('t_keluarga_dua', $data);
	}

	public function f005_4_getKeluargaDuaDelete($k_dua_id)
	{
		$this->db->where('k_dua_id', $k_dua_id);
		return $this->db->delete('t_keluarga_dua');
	}

	public function f006_getKeluargaDuaIbu($k_dua_user)
	{
		$this->db->where('k_dua_user', $k_dua_user);
		$this->db->where('k_dua_status', 'ibu');
		$this->db->join('p_pendidikan_formal_jenis', 'p_pendidikan_formal_jenis.formal_jenis_id=t_keluarga_dua.k_dua_pendidikan');
		return $this->db->get('t_keluarga_dua');
	}

	public function f007_getKeluargaDuaAnak($k_dua_user)
	{
		$this->db->where('k_dua_user', $k_dua_user);
		$this->db->order_by('k_dua_tgl_lahir ASC');
		$this->db->where_not_in('k_dua_status', 'ayah');
		$this->db->where_not_in('k_dua_status', 'ibu');
		$this->db->join('p_pendidikan_formal_jenis', 'p_pendidikan_formal_jenis.formal_jenis_id=t_keluarga_dua.k_dua_pendidikan');
		return $this->db->get('t_keluarga_dua');
	}

	//

	public function f008_getAhliWaris($ahli_waris_user)
	{
		$this->db->order_by('ahli_waris_name ASC');
		$this->db->where('ahli_waris_user', $ahli_waris_user);
		return $this->db->get('t_ahli_waris');
	}

	public function f009_getAhliWarisBy($ahli_waris_id, $ahli_waris_user)
	{
		$this->db->where('ahli_waris_id', $ahli_waris_id);
		$this->db->where('ahli_waris_user', $ahli_waris_user);
		return $this->db->get('t_ahli_waris');
	}

	public function f010_getAhliWarisUpdate($ahli_waris_id, $ahli_waris_user, $data)
	{
		$this->db->where('ahli_waris_id', $ahli_waris_id);
		$this->db->where('ahli_waris_user', $ahli_waris_user);
		return $this->db->update('t_ahli_waris', $data);
	}

	public function f011_getAhliWarisCreate($data)
	{
		return $this->db->insert('t_ahli_waris', $data);
	}

	public function f012_getAhliWarisDelete($ahli_waris_id)
	{
		$this->db->where('ahli_waris_id', $ahli_waris_id);
		return $this->db->delete('t_ahli_waris');
	}



}

/* End of file M_keluarga.php */
/* Location: ./application/models/M_keluarga.php */