<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class M_auth extends CI_Model {



	public function f001_getNIK($nik)

	{

		// $this->db->where('user_nik', $nik);

		$this->db->where("user_nik LIKE BINARY '".$nik."'", NULL, true); 

		return $this->db->get_where('p_user');

	}



	public function f002_updateLogin($user_id, $data)

	{

		$this->db->where('user_id', $user_id);

		return $this->db->update('p_user', $data);

	}



	public function f003_getUser($user_id)

	{

		$this->db->where('user_id', $user_id);

		$this->db->join('p_role', 'p_role.role_id=p_user.user_role');

		$this->db->join('p_lembaga', 'p_lembaga.lembaga_id=p_user.user_lembaga');

		$this->db->join('p_jabatan', 'p_jabatan.jabatan_id=p_user.user_jabatan');

		$this->db->join('p_divisi', 'p_divisi.divisi_id=p_user.user_divisi');

		$this->db->join('p_posisi', 'p_posisi.posisi_id=p_user.user_posisi');


		return $this->db->get('p_user');

	}

	

	public function f004_getUserAll()
	{
		return $this->db->get('p_user');
	
	}

	
}



/* End of file M_auth.php */

/* Location: ./application/models/M_auth.php */