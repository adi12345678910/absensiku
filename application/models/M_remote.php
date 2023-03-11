<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class M_remote extends CI_Model {



	public function f001_getUser($user_id)

	{

		$this->db->where('user_id', $user_id);

		return $this->db->get('p_user');

	}

	public function f002_create($data)

	{

		return $this->db->insert('t_remote', $data);

	}

	public function create($data)

	{

		return $this->db->insert('t_notif', $data);

	}

	public function admin_get()

	{

		$this->db->order_by('is_pengajuan_date DESC');
		
		$this->db->where_in('is_status', array('diterima','diteruskan','ditolak','diajukan','diproses'));

		$this->db->order_by('user_name ASC');

		$this->db->join('p_user', 'p_user.user_id=t_remote.user_id');

		$this->db->join('p_jabatan', 'p_jabatan.jabatan_id=p_user.user_jabatan');
		
		return $this->db->get('t_remote');

	}

	public function hrd_get()

	{

		$this->db->order_by('is_pengajuan_date DESC');
		
		$this->db->where_in('is_status', array('diterima','diteruskan','diminta','ditolak2'));

		$this->db->join('p_user', 'p_user.user_id=t_remote.user_id');

		$this->db->join('p_jabatan', 'p_jabatan.jabatan_id=p_user.user_jabatan');

		$this->db->join('p_divisi', 'p_divisi.divisi_id=p_user.user_divisi');

		$this->db->join('p_posisi', 'p_posisi.posisi_id=p_user.user_posisi');

		return $this->db->get('t_remote');

	}


	public function f0get()

	{

		$this->db->order_by('is_pengajuan_date DESC');

		$this->db->where_in('is_posisi', array('5','9','11','12','13'));
		
		$this->db->join('p_user', 'p_user.user_id=t_remote.user_id');

		return $this->db->get('t_remote');

	}

	public function f1get()

	{

		$this->db->order_by('is_pengajuan_date DESC');
		
		$this->db->where_in('is_posisi', array('2','13'));

		$this->db->where_in('is_jabatan', array('5','3'));

		$this->db->join('p_user', 'p_user.user_id=t_remote.user_id');

		return $this->db->get('t_remote');

	}

	public function f2get()

	{

		$this->db->order_by('is_pengajuan_date DESC');

		$this->db->where_in('is_posisi', array('2','3'));

		$this->db->where_in('is_divisi', array('2'));
		
		$this->db->join('p_user', 'p_user.user_id=t_remote.user_id');

		return $this->db->get('t_remote');

	}

	public function f3get()

	{

		$this->db->order_by('is_pengajuan_date DESC');

		$this->db->where_in('is_posisi', array('2','4'));

		$this->db->where_in('is_divisi', array('3'));
		
		$this->db->join('p_user', 'p_user.user_id=t_remote.user_id');

		return $this->db->get('t_remote');

	}

	public function f4get()

	{

		$this->db->order_by('is_pengajuan_date DESC');

		$this->db->where_in('is_posisi', array('2','3','5','6','7'));

		$this->db->where_in('is_divisi', array('4'));
		
		$this->db->join('p_user', 'p_user.user_id=t_remote.user_id');

		return $this->db->get('t_remote');

	}

	public function f5get()

	{

		$this->db->order_by('is_pengajuan_date DESC');

		$this->db->where_in('is_posisi', array('6','8'));

		$this->db->where_in('is_divisi', array('5'));
		
		$this->db->join('p_user', 'p_user.user_id=t_remote.user_id');

		return $this->db->get('t_remote');

	}
	
	public function f6get()

	{

		$this->db->order_by('is_pengajuan_date DESC');

		$this->db->where_in('is_posisi', array('10'));

		$this->db->where_in('is_divisi', array('6'));
		
		$this->db->join('p_user', 'p_user.user_id=t_remote.user_id');

		return $this->db->get('t_remote');

	}

	public function f7get()

	{

		$this->db->order_by('is_pengajuan_date DESC');
		
		$this->db->where_in('is_posisi', array('9'));

		$this->db->where_in('is_divisi', array('7'));

		$this->db->join('p_user', 'p_user.user_id=t_remote.user_id');

		return $this->db->get('t_remote');

	}

	public function m2get()

	{

		$this->db->order_by('is_pengajuan_date DESC');
		
		$this->db->where_in('is_posisi', array('3'));

		$this->db->where_in('is_divisi', array('2'));

		$this->db->join('p_user', 'p_user.user_id=t_remote.user_id');

		return $this->db->get('t_remote');

	}

	public function m3get()

	{

		$this->db->order_by('is_pengajuan_date DESC');
		
		$this->db->where_in('is_posisi', array('4'));

		$this->db->where_in('is_divisi', array('3'));

		$this->db->join('p_user', 'p_user.user_id=t_remote.user_id');

		return $this->db->get('t_remote');

	}

	public function m4get()

	{

		$this->db->order_by('is_pengajuan_date DESC');
		
		$this->db->where_in('is_posisi', array('5','14'));

		$this->db->where_in('is_divisi', array('8'));

		$this->db->join('p_user', 'p_user.user_id=t_remote.user_id');

		return $this->db->get('t_remote');

	}

	public function m5get()

	{

		$this->db->order_by('is_pengajuan_date DESC');
		
		$this->db->where_in('is_posisi', array('6'));

		$this->db->where_in('is_divisi', array('4'));

		$this->db->join('p_user', 'p_user.user_id=t_remote.user_id');

		return $this->db->get('t_remote');

	}

	public function m6get()

	{

		$this->db->order_by('is_pengajuan_date DESC');
		
		$this->db->where_in('is_posisi', array('3'));

		$this->db->where_in('is_divisi', array('4'));

		$this->db->join('p_user', 'p_user.user_id=t_remote.user_id');

		return $this->db->get('t_remote');

	}

	public function m7get()

	{

		$this->db->order_by('is_pengajuan_date DESC');
		
		$this->db->where_in('is_posisi', array('7'));

		$this->db->where_in('is_divisi', array('4'));

		$this->db->join('p_user', 'p_user.user_id=t_remote.user_id');

		return $this->db->get('t_remote');

	}

	public function m8get()

	{

		$this->db->order_by('is_pengajuan_date DESC');
		
		$this->db->where_in('is_posisi', array('6'));

		$this->db->where_in('is_divisi', array('5'));

		$this->db->join('p_user', 'p_user.user_id=t_remote.user_id');

		return $this->db->get('t_remote');

	}

	public function m9get()

	{

		$this->db->order_by('is_pengajuan_date DESC');
		
		$this->db->where_in('is_posisi', array('8'));

		$this->db->where_in('is_divisi', array('5'));

		$this->db->join('p_user', 'p_user.user_id=t_remote.user_id');

		return $this->db->get('t_remote');

	}

	public function m10get()

	{

		$this->db->order_by('is_pengajuan_date DESC');
		
		$this->db->where_in('is_posisi', array('14'));

		$this->db->where_in('is_divisi', array('8'));

		$this->db->join('p_user', 'p_user.user_id=t_remote.user_id');

		return $this->db->get('t_remote');

	}
	
	public function m11get()

	{

		$this->db->order_by('is_pengajuan_date DESC');
		
		$this->db->where_in('is_posisi', array('11'));

		$this->db->join('p_user', 'p_user.user_id=t_remote.user_id');

		return $this->db->get('t_remote');

	}

	public function m12get()

	{

		$this->db->order_by('is_pengajuan_date DESC');
		
		$this->db->where_in('is_posisi', array('12'));

		$this->db->join('p_user', 'p_user.user_id=t_remote.user_id');

		return $this->db->get('t_remote');

	}
	
	public function f004_getPerUser($is_user)

	{

		$this->db->order_by('is_pengajuan_date DESC');

		$this->db->where('is_user', $is_user);

		return $this->db->get('t_remote');

	}

	public function f006_getISBy($is_id)

	{

		$this->db->where('is_id', $is_id);

		$this->db->join('p_user', 'p_user.user_id=t_remote.user_id');

		$this->db->join('p_jabatan', 'p_jabatan.jabatan_id=p_user.user_jabatan');

		$this->db->join('p_divisi', 'p_divisi.divisi_id=p_user.user_divisi');

		$this->db->join('p_posisi', 'p_posisi.posisi_id=p_user.user_posisi');

		return $this->db->get('t_remote');

	}

	public function f007_updatePengajuan($is_id, $is_user, $data1)

	{

		$this->db->where('is_id', $is_id);

		$this->db->where('is_user', $is_user);

		return $this->db->update('t_remote', $data1);

	}

	public function f009_updatePengajuan($user_id, $user_role, $data)

	{

		$this->db->where('user_id', $user_id);

		return $this->db->update('p_user', $data);

	}

	public function updatePengajuan($is_id, $is_user, $data)

	{

		$this->db->where('is_id', $is_id);

		$this->db->where('is_user', $is_user);

		return $this->db->update('t_notif', $data);

	}

	public function f008_cek_hari_libur($tgl_mulai, $tgl_sampai)

	{

		$this->db->where('hari_libur_tanggal >=', $tgl_mulai);

		$this->db->where('hari_libur_tanggal <=', $tgl_sampai);

		return $this->db->get('p_hari_libur');

	}

	//kategori
	public function getdata(){
		
		$query =$this->db->query("SELECT * FROM t_kategori_remote ORDER BY kategori_name ASC");
		return $query->result();
	}

	public function f001_getKategori()
	{
		$this->db->order_by('kategori_name ASC');
		return $this->db->get('t_kategori_remote');
	}

	public function f002_getKategoriBy($kategori_id)
	{
		$this->db->where('kategori_id', $kategori_id);
		return $this->db->get('t_kategori_remote');
	}

	public function f003_updateKategori($kategori_id, $data)
	{

		$this->db->where('kategori_id', $kategori_id);
		return $this->db->update('t_kategori_remote', $data);
	}
	
	public function f004_createKategori($data)
	{
		return $this->db->insert('t_kategori_remote', $data);
	}	
	
	private $table = "t_kategori_remote";
	public function delete($id)
    {
        return $this->db->delete($this->table, array("kategori_id" => $id));
    }

	public function hitungJumlahAdmin()
	{   
		$this->db->where_in('is_status', array('diproses','diteruskan','diminta'));

		$query = $this->db->get('t_remote');

		if($query->num_rows()>0)
		{
			return $query->num_rows();
		}
			else
		{
			return;
		}
	}

	public function hitungJumlahDirektur()

	{

		$this->db->order_by('is_pengajuan_date DESC');

		$this->db->where_in('is_posisi', array('5','9','11','12','13'));
		
		$this->db->where_in('is_status', array('diproses','diminta'));

		$query = $this->db->get('t_remote');

		if($query->num_rows()>0)
		{
			return $query->num_rows();
		}
			else
		{
			return;
		}

	}

	public function hitungJumlahHrd()

	{

		$this->db->order_by('is_pengajuan_date DESC');
		
		$this->db->where_in('is_status', array('diteruskan'));

		$query = $this->db->get('t_remote');

		if($query->num_rows()>0)
		{
			return $query->num_rows();
		}
			else
		{
			return;
		}

	}

	public function hitungJumlahCmo()

	{

		$this->db->order_by('is_pengajuan_date DESC');
		
		$this->db->where_in('is_posisi', array('2'));

		$this->db->where_in('is_jabatan', array('5'));

		$this->db->where_in('is_status', array('diproses'));

		$query = $this->db->get('t_remote');

		if($query->num_rows()>0)
		{
			return $query->num_rows();
		}
			else
		{
			return;
		}

	}

	public function hitungJumlahSv2()

	{

		$this->db->order_by('is_pengajuan_date DESC');

		$this->db->where_in('is_posisi', array('2','3'));

		$this->db->where_in('is_divisi', array('2'));
		
		$this->db->where_in('is_status', array('diproses'));

		$query = $this->db->get('t_remote');

		if($query->num_rows()>0)
		{
			return $query->num_rows();
		}
			else
		{
			return;
		}

	}

	public function hitungJumlahSv3()

	{

		$this->db->order_by('is_pengajuan_date DESC');

		$this->db->where_in('is_posisi', array('2','4'));

		$this->db->where_in('is_divisi', array('3'));
		
		$this->db->where_in('is_status', array('diproses'));

		$query = $this->db->get('t_remote');

		if($query->num_rows()>0)
		{
			return $query->num_rows();
		}
			else
		{
			return;
		}

	}

	public function hitungJumlahSv4()

	{

		$this->db->order_by('is_pengajuan_date DESC');

		$this->db->where_in('is_posisi', array('3','5','6','7'));

		$this->db->where_in('is_divisi', array('4'));
		
		$this->db->where_in('is_status', array('diproses'));

		$query = $this->db->get('t_remote');

		if($query->num_rows()>0)
		{
			return $query->num_rows();
		}
			else
		{
			return;
		}

	}

	public function hitungJumlahSv5()

	{

		$this->db->order_by('is_pengajuan_date DESC');

		$this->db->where_in('is_posisi', array('6','8'));

		$this->db->where_in('is_divisi', array('5'));
		
		$this->db->where_in('is_status', array('diproses'));

		$query = $this->db->get('t_remote');

		if($query->num_rows()>0)
		{
			return $query->num_rows();
		}
			else
		{
			return;
		}

	}
	
	public function hitungJumlahSv6()

	{

		$this->db->order_by('is_pengajuan_date DESC');

		$this->db->where_in('is_posisi', array('10'));

		$this->db->where_in('is_divisi', array('6'));
		
		$this->db->where_in('is_status', array('diproses'));

		$query = $this->db->get('t_remote');

		if($query->num_rows()>0)
		{
			return $query->num_rows();
		}
			else
		{
			return;
		}

	}

	public function hitungJumlahSv7()

	{

		$this->db->order_by('is_pengajuan_date DESC');

		$this->db->where_in('is_posisi', array('14'));
		
		$this->db->where_in('is_status', array('diproses'));

		$query = $this->db->get('t_remote');

		if($query->num_rows()>0)
		{
			return $query->num_rows();
		}
			else
		{
			return;
		}

	}

}



/* End of file M_sakti.php */

/* Location: ./application/models/M_sakti.php */