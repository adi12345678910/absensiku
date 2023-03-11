<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class izin extends CI_Controller {

	public function __construct() 
	{
		parent:: __construct();

		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');

	}

	public function index()
	{
		$data['title_page'] = "PENGAJUAN IZIN";

		$data['alert'] 		= $this->session->flashdata('alert');

		$data['datakategori'] 		= $this->m_izin->getdata();

		$this->template->show('izin/v_pengajuan', $data);
	}

	public function pengajuan_izin()
	{
		$date_mulai = $this->input->post('is_mulai');
			$dm 		= explode(' ', $date_mulai);
			$is_mulai 	= $dm[2].'-'.month_number($dm[1]).'-'.$dm[0];
		$is_name 	= $this->input->post('is_name');
		
		$is_jam 	= $this->input->post('is_jam');
		$is_jam_sampai 	= $this->input->post('is_jam_sampai');
		$is_name 	= $this->input->get('is_name');
		$is_ket 	= $this->input->post('is_ket');
		$is_type 	= $this->input->post('is_type');
		$name_karyawan = $this->m_izin->f001_getUser($this->template->user_id())->row()->user_name;

		if ($this->template->role_id() == 3 ) {
			$data = array(
				'user_id'			=> $this->template->user_id(),
				'is_user'			=> $this->template->role_id(),
				'is_divisi'			=> $this->template->divisi_id(),
				'is_jabatan'		=> $this->template->jabatan_id(),
				'is_posisi'			=> $this->template->posisi_id(),				
				'is_pengajuan_date' => date('Y-m-d'),
				'is_name' 			=> 'Izin',
				'is_mulai' 			=> $is_mulai,
				'is_type' 			=> $is_type,
				'is_jam' 			=> $is_jam,
				'is_jam_sampai' 	=> $is_jam_sampai,
				'is_ket' 			=> $is_ket,
				'is_nama' 			=> 'Izin',
				'is_status' 		=> 'diteruskan'
			);
	
			$this->m_izin->f002_create($data);
			$this->m_izin->create($data);

			$this->session->set_flashdata('alert', 
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<i class="icon fa fa-check"></i> Pengajuan berhasil diajukan.
				</div>');
		}

		elseif ($this->template->role_id() == 4 ) {
			$data = array(
				'user_id'			=> $this->template->user_id(),
				'is_user'			=> $this->template->role_id(),
				'is_divisi'			=> $this->template->divisi_id(),
				'is_jabatan'		=> $this->template->jabatan_id(),
				'is_posisi'			=> $this->template->posisi_id(),				
				'is_pengajuan_date' => date('Y-m-d'),
				'is_name' 			=> 'Izin',
				'is_mulai' 			=> $is_mulai,
				'is_type' 			=> $is_type,
				'is_jam' 			=> $is_jam,
				'is_jam_sampai' 	=> $is_jam_sampai,
				'is_ket' 			=> $is_ket,
				'is_nama' 			=> 'Izin',
				'is_status' 		=> 'diminta'
			);
	
			$this->m_izin->f002_create($data);
			$this->m_izin->create($data);

			$this->session->set_flashdata('alert', 
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<i class="icon fa fa-check"></i> Pengajuan berhasil diajukan.
				</div>');
		}
		
		else 
			{
			$data = array(
				'user_id'			=> $this->template->user_id(),
				'is_user'			=> $this->template->role_id(),
				'is_divisi'			=> $this->template->divisi_id(),
				'is_jabatan'		=> $this->template->jabatan_id(),
				'is_posisi'			=> $this->template->posisi_id(),				
				'is_pengajuan_date' => date('Y-m-d'),
				'is_name' 			=> 'Izin',
				'is_type' 			=> $is_type,
				'is_mulai' 			=> $is_mulai,
				'is_jam' 			=> $is_jam,
				'is_jam_sampai' 	=> $is_jam_sampai,
				'is_ket' 			=> $is_ket,
				'is_nama' 			=> 'Izin',
				'is_status' 		=> 'diproses'
			);

			$this->m_izin->f002_create($data);
			$this->m_izin->create($data);

			$this->session->set_flashdata('alert', 
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<i class="icon fa fa-check"></i> Pengajuan berhasil diajukan.
				</div>');

		}
        redirect('izin/list_pengajuan');
	}

	public function list_pengajuan()
	{
		$data['title_page'] = "LIST PENGAJUAN IZIN";

		$data['alert'] 		= $this->session->flashdata('alert');

		if ($this->template->role_id() == 1 && $this->template->jabatan_id() == 1) 
		{
			$data['is_view'] = $this->m_izin->admin_get()->result();
			$data['is_notif_admin'] = $this->m_izin->hitungJumlahAdmin();

		}

		elseif ($this->template->role_id() == 3 && $this->template->jabatan_id() == 2) 
		{
			$data['is_view'] = $this->m_izin->f0get()->result();
			$data['is_notif_direktur'] = $this->m_izin->hitungJumlahDirektur();

		}

		elseif ($this->template->role_id() == 4) 
		{
			$data['is_view'] = $this->m_izin->hrd_get()->result();
			$data['is_notif_admin'] = $this->m_izin->hitungJumlahAdmin();

		}
		
		elseif ($this->template->role_id() == 2 && $this->template->jabatan_id() == 3) 
		{
			$data['is_view'] = $this->m_izin->f1get()->result();
			$data['is_notif_cmo'] = $this->m_izin->hitungJumlahCmo();

		}

		//main activity

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 2 && $this->template->posisi_id() == 2) 
		{
			$data['is_view'] = $this->m_izin->f2get()->result();
			$data['is_notif_sv2'] = $this->m_izin->hitungJumlahSv2();

		}

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 3 && $this->template->posisi_id() == 2 ) 
		{
			$data['is_view'] = $this->m_izin->f3get()->result();
			$data['is_notif_sv3'] = $this->m_izin->hitungJumlahSv3();

		}

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 4 && $this->template->posisi_id() == 2 ) 
		{
			$data['is_view'] = $this->m_izin->f4get()->result();
			$data['is_notif_sv4'] = $this->m_izin->hitungJumlahSv4();

		}

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 5 && $this->template->posisi_id() == 2 ) 
		{
			$data['is_view'] = $this->m_izin->f5get()->result();
			$data['is_notif_sv5'] = $this->m_izin->hitungJumlahSv5();

		}

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 6 && $this->template->posisi_id() == 2 ) 
		{
			$data['is_view'] = $this->m_izin->f6get()->result();
			$data['is_notif_sv6'] = $this->m_izin->hitungJumlahSv6();

		}

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 8 && $this->template->posisi_id() == 5 ) 
		{
			$data['is_view'] = $this->m_izin->m4get()->result();
			$data['is_notif_sv7'] = $this->m_izin->hitungJumlahSv7();

		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 7 && $this->template->posisi_id() == 9 ) 
		{
			$data['is_view'] = $this->m_izin->f7get()->result();
		}

		//staff.activity

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 2 && $this->template->posisi_id() == 3 ) 
		{
			$data['is_view'] = $this->m_izin->m2get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 3 && $this->template->posisi_id() == 4 ) 
		{
			$data['is_view'] = $this->m_izin->m3get()->result();
		}


		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 4 && $this->template->posisi_id() == 6 ) 
		{
			$data['is_view'] = $this->m_izin->m5get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 4 && $this->template->posisi_id() == 3 ) 
		{
			$data['is_view'] = $this->m_izin->m6get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 4 && $this->template->posisi_id() == 7 ) 
		{
			$data['is_view'] = $this->m_izin->m7get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 5 && $this->template->posisi_id() == 6 ) 
		{
			$data['is_view'] = $this->m_izin->m8get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 5 && $this->template->posisi_id() == 8 ) 
		{
			$data['is_view'] = $this->m_izin->m9get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 8 && $this->template->posisi_id() == 14 ) 
		{
			$data['is_view'] = $this->m_izin->m10get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->posisi_id() == 11 ) 
		{
			$data['is_view'] = $this->m_izin->m11get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->posisi_id() == 12 ) 
		{
			$data['is_view'] = $this->m_izin->m12get()->result();
		}

		else
		{
			$data['is_view'] = $this->m_izin->f004_getPerUser($this->template->user_id())->result();
		}

		$this->template->show('izin/v_list_pengajuan', $data);
	}
	
	public function list_pengajuan_detail($is_id, $is_user)
	{
		$data['title_page'] = "DETAIL LIST PENGAJUAN IZIN";

		$data['is_view'] = $this->m_izin->f006_getISBy($is_id)->result();

		$data['datakategori'] 	= $this->m_izin->getdata();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('izin/v_pengajuan_detail', $data);
	}

	public function list_pengajuan_update()
	{
		$is_id 			= $this->input->post('is_id');
		$date_mulai = $this->input->post('is_mulai');
			$dm 		= explode(' ', $date_mulai);
			$is_mulai 	= $dm[2].'-'.month_number($dm[1]).'-'.$dm[0];
		$is_user 		= $this->input->post('is_user');

		$is_name 		= $this->input->get('is_name');
		
		$is_jam 		= $this->input->post('is_jam');
		$is_jam_sampai 	= $this->input->post('is_jam_sampai');
		$is_name 		= $this->input->get('is_name');
		$is_ket 		= $this->input->post('is_ket');
		$is_type 		= $this->input->post('is_type');

		$name_karyawan = $this->m_izin->f001_getUser($this->template->user_id())->row()->user_name;

		$data = array(
			'is_user'			=> $this->template->user_id(),
			'is_pengajuan_date' => date('Y-m-d'),
			'is_name' 			=> 'Izin',
			'is_type' 			=> $is_type,
			'is_mulai' 			=> $is_mulai,
			'is_jam' 			=> $is_jam,
			'is_jam_sampai' 	=> $is_jam_sampai,
			'is_ket' 			=> $is_ket,
			'is_nama' 			=> 'Izin',
			'is_status' 		=> 'diproses'
		);
		
		$this->m_izin->f007_updatePengajuan($is_id, $is_user, $data);
		$this->m_izin->updatePengajuan($is_id, $is_user, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        	<i class="icon fa fa-check"></i> Pengajuan berhasil diajukan kembali.
      	</div>');

		redirect('izin/list_pengajuan');
		
	}

	public function list_pengajuan_detail_hrd($is_id, $is_user)
	{
		$data['title_page'] = "DETAIL LIST PENGAJUAN IZIN HRD";

		$data['is_hrd'] = $this->m_izin->f006_getISBy($is_id)->result();

		$data['datakategori'] 		= $this->m_izin->getdata();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('izin/v_pengajuan_detail_hrd', $data);
	}

	public function list_pengajuan_update_hrd()
	{
		$is_id 			= $this->input->post('is_id');
		$date_mulai = $this->input->post('is_mulai');
			$dm 		= explode(' ', $date_mulai);
			$is_mulai 	= $dm[2].'-'.month_number($dm[1]).'-'.$dm[0];
		$is_user 		= $this->input->post('is_user');

		$is_name 		= $this->input->get('is_name');
		
		$is_jam 		= $this->input->post('is_jam');
		$is_jam_sampai 	= $this->input->post('is_jam_sampai');
		$is_name 		= $this->input->get('is_name');
		$is_ket 		= $this->input->post('is_ket');
		$is_type 		= $this->input->post('is_type');

		$name_karyawan = $this->m_izin->f001_getUser($this->template->user_id())->row()->user_name;

		$data = array(
			'is_user'			=> $this->template->user_id(),
			'is_pengajuan_date' => date('Y-m-d'),
			'is_name' 			=> 'Izin',
			'is_type' 			=> $is_type,
			'is_mulai' 			=> $is_mulai,
			'is_jam' 			=> $is_jam,
			'is_jam_sampai' 	=> $is_jam_sampai,
			'is_ket' 			=> $is_ket,
			'is_nama' 			=> 'Izin',
			'is_status' 		=> 'diminta'
		);
		
		$this->m_izin->f007_updatePengajuan($is_id, $is_user, $data);
		$this->m_izin->updatePengajuan($is_id, $is_user, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        	<i class="icon fa fa-check"></i> Pengajuan berhasil diajukan kembali.
      	</div>');

		redirect('izin/list_pengajuan');
		
	}

	public function inbox_persetujuan()
	{
		$is_id 			= $this->input->post('is_id');
		$is_user 		= $this->input->post('is_user');
		$is_status 		= $this->input->post('is_status');
		$is_status_ket 	= $this->input->post('is_status_ket');

		$data = array(
			'is_status' => $is_status,
			'is_status_ket'	=> $is_status_ket
		);

		$this->m_izin->f007_updatePengajuan($is_id, $is_user, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        	<i class="icon fa fa-check"></i> Pengajuan berhasil diproses.
      	</div>');

      	redirect('izin/list_pengajuan');
	}

	//master.data

	public function kategori()
	{
		$data['title_page'] = "KATEGORI";

		$data['qKategori'] = $this->m_izin->f001_getKategori()->result();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('izin/v_kategori', $data);
	}

	public function create()
	{
		$kategori_name 		= $this->input->post('kategori_name');
		$kategori_desk 		= $this->input->post('kategori_desk');
		
		$data = array(
			'kategori_name' 		=> $kategori_name,
			'kategori_desk' 		=> $kategori_desk
			
		);

		$this->m_izin->f004_createkategori($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" kategori="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            kategori berhasil di tambahkan.
        </div>');

		redirect(site_url('izin/kategori'));
	}

	public function edit($kategori_id)
	{
		$data['title_page'] = "EDIT KATEGORI";

		$data['qKategoriBy'] = $this->m_izin->f002_getKategoriBy($kategori_id)->result();

		$this->template->show('izin/v_edit_kategori', $data);
	} 

	public function update()
	{
		$kategori_id 		= $this->input->post('kategori_id');
		$kategori_name 		= $this->input->post('kategori_name');

		$data = array(
			'kategori_name' 		=> $kategori_name,
			'kategori_desk' 		=> $kategori_desk
			
		);

		$this->m_izin->f003_updateKategori($kategori_id, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" kategori="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            kategori berhasil di perbaharui.
        </div>');

		redirect(site_url('izin/kategori'));
	}

	function delete($kategori_id)
	{
		$this->m_izin->delete($kategori_id);
		redirect('izin/kategori');
	}
}

/* End of file izin.php */
/* Location: ./application/controllers/izin.php */