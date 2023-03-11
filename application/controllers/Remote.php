<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class remote extends CI_Controller {

	public function __construct() 
	{
		parent:: __construct();

		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');	}

	public function index()
	{
		$data['title_page'] = "PENGAJUAN REMOTE";

		$data['alert'] 		= $this->session->flashdata('alert');

		$data['datakategori'] 		= $this->m_remote->getdata();

		$data['sisa_remote'] = $this->m_remote->f001_getUser($this->template->user_id())->row()->sisa_remote;


		$this->template->show('remote/v_pengajuan', $data);
	}

	public function pengajuan_remote()
	{
		$is_name 	= $this->input->post('is_name');
		$date_mulai = $this->input->post('is_mulai');
			$dm 		= explode(' ', $date_mulai);
			$is_mulai 	= $dm[2].'-'.month_number($dm[1]).'-'.$dm[0];
		$date_sampai 	= $this->input->post('is_sampai');
			$ds 		= explode(' ', $date_sampai);
			$is_sampai 	= $ds[2].'-'.month_number($ds[1]).'-'.$ds[0];

		$hari_libur = $this->m_remote->f008_cek_hari_libur($is_mulai, $is_sampai)->result();

		$begin = new DateTime($is_mulai);
		$end = new DateTime($is_sampai);

		$daterange     = new DatePeriod($begin, new DateInterval('P1D'), $end);
		//mendapatkan range antara dua tanggal dan di looping
		$i 	 = 0;
		$x	 = 0;
		$end = 1;

		foreach($daterange as $date){
		    $daterange     = $date->format("Y-m-d");
		    $datetime     = DateTime::createFromFormat('Y-m-d', $daterange);

		    //Convert tanggal untuk mendapatkan nama hari
		    $day         = $datetime->format('D');

		    //Check untuk menghitung yang bukan hari minggu
		    if($day != "Sun") {
		        //echo $i;
		        $x    +=    $end-$i;
		        
		    }
		    $end++;
		    $i++;
		}    

		$is_durasi = $x+1-count($hari_libur);

		$is_ket 	= $this->input->post('is_ket');

		$name_karyawan = $this->m_remote->f001_getUser($this->template->user_id())->row()->user_name;

		

		if ($this->template->role_id() == 3 ) {

			$data = array(
				'user_id'			=> $this->template->user_id(),
				'is_user'			=> $this->template->role_id(),
				'is_divisi'			=> $this->template->divisi_id(),
				'is_jabatan'		=> $this->template->jabatan_id(),
				'is_posisi'			=> $this->template->posisi_id(),
				'is_pengajuan_date' => date('Y-m-d'),
				'is_name' 			=> $is_name,
				'is_mulai' 			=> $is_mulai,
				'is_sampai' 		=> $is_sampai,
				'is_durasi'			=> $is_durasi,
				'is_ket' 			=> $is_ket,
				'is_nama' 			=> 'Remote',
				'is_status' 		=> 'diteruskan'
			);

			// echo "<pre>";
			// 	print_r($data);
			// echo "</pre>";

			// die;

			$this->m_remote->f002_create($data);
			$this->m_remote->create($data);

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
				'is_name' 			=> $is_name,
				'is_mulai' 			=> $is_mulai,
				'is_sampai' 		=> $is_sampai,
				'is_durasi'			=> $is_durasi,
				'is_ket' 			=> $is_ket,
				'is_status' 		=> 'diminta',
				'is_nama' 			=> 'Remote'

			);

			// echo "<pre>";
			// 	print_r($data);
			// echo "</pre>";

			// die;

			$this->m_remote->f002_create($data);
			$this->m_remote->create($data);

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
				'is_name' 			=> $is_name,
				'is_mulai' 			=> $is_mulai,
				'is_sampai' 		=> $is_sampai,
				'is_durasi' 		=> $is_durasi,
				'is_ket' 			=> $is_ket,
				'is_nama' 			=> 'Remote',
				'is_status' 		=> 'diproses'
			);

			// echo "<pre>";
			// 	print_r($data);
			// echo "</pre>";

			// die;

			$this->m_remote->f002_create($data);
			$this->m_remote->create($data);

			$this->session->set_flashdata('alert', 
			'<div class="alert alert-success alert-dismissible">
            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            	<i class="icon fa fa-check"></i> Pengajuan berhasil diajukan.
          	</div>');
		}

        redirect('remote/list_pengajuan');
	}

	public function list_pengajuan()
	{
		$data['title_page'] = "LIST PENGAJUAN REMOTE";

		$data['alert'] 		= $this->session->flashdata('alert');

		$data['sisa_remote'] = $this->m_remote->f001_getUser($this->template->user_id())->row()->sisa_remote;


		if ($this->template->role_id() == 1 && $this->template->jabatan_id() == 1) 
		{
			$data['is_view'] = $this->m_remote->admin_get()->result();
			$data['is_notif_admin'] = $this->m_remote->hitungJumlahAdmin();

		}

		elseif ($this->template->role_id() == 3 && $this->template->jabatan_id() == 2) 
		{
			$data['is_view'] = $this->m_remote->f0get()->result();
			$data['is_notif_direktur'] = $this->m_remote->hitungJumlahDirektur();

		}

		elseif ($this->template->role_id() == 4) 
		{
			$data['is_view'] = $this->m_remote->hrd_get()->result();
			$data['is_notif_admin'] = $this->m_remote->hitungJumlahAdmin();

		}
		
		elseif ($this->template->role_id() == 2 && $this->template->jabatan_id() == 3) 
		{
			$data['is_view'] = $this->m_remote->f1get()->result();
			$data['is_notif_cmo'] = $this->m_remote->hitungJumlahCmo();

		}

		//main activity

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 2 && $this->template->posisi_id() == 2) 
		{
			$data['is_view'] = $this->m_remote->f2get()->result();
			$data['is_notif_sv2'] = $this->m_remote->hitungJumlahSv2();

		}

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 3 && $this->template->posisi_id() == 2 ) 
		{
			$data['is_view'] = $this->m_remote->f3get()->result();
			$data['is_notif_sv3'] = $this->m_remote->hitungJumlahSv3();

		}

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 4 && $this->template->posisi_id() == 2 ) 
		{
			$data['is_view'] = $this->m_remote->f4get()->result();
			$data['is_notif_sv4'] = $this->m_remote->hitungJumlahSv4();

		}

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 5 && $this->template->posisi_id() == 2 ) 
		{
			$data['is_view'] = $this->m_remote->f5get()->result();
			$data['is_notif_sv5'] = $this->m_remote->hitungJumlahSv5();

		}

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 6 && $this->template->posisi_id() == 2 ) 
		{
			$data['is_view'] = $this->m_remote->f6get()->result();
			$data['is_notif_sv6'] = $this->m_remote->hitungJumlahSv6();

		}

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 8 && $this->template->posisi_id() == 5 ) 
		{
			$data['is_view'] = $this->m_remote->m4get()->result();
			$data['is_notif_sv7'] = $this->m_remote->hitungJumlahSv7();

		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 7 && $this->template->posisi_id() == 9 ) 
		{
			$data['is_view'] = $this->m_remote->f7get()->result();
		}

		//staff.activity

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 2 && $this->template->posisi_id() == 3 ) 
		{
			$data['is_view'] = $this->m_remote->m2get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 3 && $this->template->posisi_id() == 4 ) 
		{
			$data['is_view'] = $this->m_remote->m3get()->result();
		}

		

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 4 && $this->template->posisi_id() == 6 ) 
		{
			$data['is_view'] = $this->m_remote->m5get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 4 && $this->template->posisi_id() == 3 ) 
		{
			$data['is_view'] = $this->m_remote->m6get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 4 && $this->template->posisi_id() == 7 ) 
		{
			$data['is_view'] = $this->m_remote->m7get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 5 && $this->template->posisi_id() == 6 ) 
		{
			$data['is_view'] = $this->m_remote->m8get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 5 && $this->template->posisi_id() == 8 ) 
		{
			$data['is_view'] = $this->m_remote->m9get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 8 && $this->template->posisi_id() == 14 ) 
		{
			$data['is_view'] = $this->m_remote->m10get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->posisi_id() == 11 ) 
		{
			$data['is_view'] = $this->m_remote->m11get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->posisi_id() == 12 ) 
		{
			$data['is_view'] = $this->m_remote->m12get()->result();
		}

		else
		{
			$data['is_view'] = $this->m_remote->f004_getPerUser($this->template->user_id())->result();
		}

		$this->template->show('remote/v_list_pengajuan', $data);
	}

	public function list_pengajuan_detail($is_id, $is_user)
	{
		$data['title_page'] = "DETAIL LIST PENGAJUAN REMOTE";

		$data['is_view'] = $this->m_remote->f006_getISBy($is_id)->result();

		$data['datakategori'] 		= $this->m_remote->getdata();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('remote/v_pengajuan_detail', $data);
	}

	public function list_pengajuan_update()
	{
		$is_id 			= $this->input->post('is_id');
		$is_user 		= $this->input->post('is_user');

		$is_name 		= $this->input->post('is_name');

		$file_image_old = $this->input->post('file_image_old');

		$date_mulai 	= $this->input->post('is_mulai');
			$dm 		= explode(' ', $date_mulai);
			$is_mulai 	= $dm[2].'-'.month_number($dm[1]).'-'.$dm[0];

		$date_sampai 	= $this->input->post('is_sampai');
			$ds 		= explode(' ', $date_sampai);
			$is_sampai 	= $ds[2].'-'.month_number($ds[1]).'-'.$ds[0];

		$is_ket 		= $this->input->post('is_ket');

		$name_karyawan = $this->m_remote->f001_getUser($this->template->user_id())->row()->user_name;

            $data = array(
				'is_pengajuan_date' => date('Y-m-d'),
				'is_name' 			=> $is_name,
				'is_mulai' 			=> $is_mulai,
				'is_sampai'			=> $is_sampai,
				'is_ket' 			=> $is_ket,
				'is_status' 		=> 'diproses'
			);

		

		$this->m_remote->f007_updatePengajuan($is_id, $is_user, $data);
		$this->m_remote->updatePengajuan($is_id, $is_user, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        	<i class="icon fa fa-check"></i> Pengajuan berhasil diajukan kembali.
      	</div>');

		redirect('remote/list_pengajuan');
		
	}

	public function list_pengajuan_detail_hrd($is_id, $is_user)
	{
		$data['title_page'] = "DETAIL LIST PENGAJUAN REMOTE HRD";

		$data['is_hrd'] = $this->m_remote->f006_getISBy($is_id)->result();

		$data['datakategori'] 		= $this->m_remote->getdata();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('remote/v_pengajuan_detail_hrd', $data);
	}

	public function list_pengajuan_update_hrd()
	{
		$is_id 			= $this->input->post('is_id');
		$is_user 		= $this->input->post('is_user');

		$is_name 		= $this->input->post('is_name');

		$file_image_old = $this->input->post('file_image_old');

		$date_mulai 	= $this->input->post('is_mulai');
			$dm 		= explode(' ', $date_mulai);
			$is_mulai 	= $dm[2].'-'.month_number($dm[1]).'-'.$dm[0];

		$date_sampai 	= $this->input->post('is_sampai');
			$ds 		= explode(' ', $date_sampai);
			$is_sampai 	= $ds[2].'-'.month_number($ds[1]).'-'.$ds[0];

		$is_ket 		= $this->input->post('is_ket');

		$name_karyawan = $this->m_remote->f001_getUser($this->template->user_id())->row()->user_name;

		
		
		

            $data = array(
				'is_pengajuan_date' => date('Y-m-d'),
				'is_name' 			=> $is_name,
				'is_mulai' 			=> $is_mulai,
				'is_sampai'			=> $is_sampai,
				'is_ket' 			=> $is_ket,
				'is_status' 		=> 'diminta'
			);

		$this->m_remote->f007_updatePengajuan($is_id, $is_user, $data);
		$this->m_remote->updatePengajuan($is_id, $is_user, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        	<i class="icon fa fa-check"></i> Pengajuan berhasil diajukan kembali.
      	</div>');

		redirect('remote/list_pengajuan');
		
	}

	public function inbox_detail($is_id)
	{
		$data['title_page'] = "DETAIL INBOX PENGAJUAN REMOTE";

		$data['is_view'] = $this->m_remote->f006_getISBy($is_id)->result();

		if ($this->template->role_id() == 5 || $this->template->role_id() == 4 || $this->template->role_id()== 3 || $this->template->role_id() == 2 || $this->template->role_id() == 1) 
		{
			$this->template->show('remote/v_inbox_detail', $data);
		}
		else
		{
			redirect(site_url('remote'));
		}
	}

	public function inbox_persetujuan()
	{
		$is_id 			= $this->input->post('is_id');
		$is_user 		= $this->input->post('is_user');
		$user_id 		= $this->input->post('user_id');
		$user_role 		= $this->input->post('user_role');
		$is_status 		= $this->input->post('is_status');
		$is_status_ket 	= $this->input->post('is_status_ket');
		$is_durasi 		= $this->input->post('is_durasi');
		$sisa_remote 		= $this->input->post('sisa_remote');


		if ($this->template->role_id() == 1 || $this->template->role_id() == 4 && $is_status == 'diterima') 
		{
			$sisa_remote = $sisa_remote - $is_durasi;

			$data1 = array(
				'is_status' => $is_status,
				'is_status_ket'	=> $is_status_ket
			);

			$data = array(
				
				'sisa_cuti'	=> $sisa_cuti
			);
			
		}

		else
		{
			$data1 = array(
				'is_status' => $is_status,
				'is_status_ket'	=> $is_status_ket,
			);
		}

		$this->m_remote->f007_updatePengajuan($is_id, $is_user, $data1);
		$this->m_remote->f009_updatePengajuan($user_id,$user_role, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        	<i class="icon fa fa-check"></i> Pengajuan berhasil diproses.
      	</div>');

      	redirect('remote/list_pengajuan');
	}

	//master.data

	public function kategori()
	{
		$data['title_page'] = "KATEGORI";

		$data['qKategori'] = $this->m_remote->f001_getKategori()->result();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('remote/v_kategori', $data);
	}

	public function create()
	{
		$kategori_name 		= $this->input->post('kategori_name');
		$kategori_desk 		= $this->input->post('kategori_desk');
		
		$data = array(
			'kategori_name' 		=> $kategori_name,
			'kategori_desk' 		=> $kategori_desk
			
		);

		$this->m_remote->f004_createkategori($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" kategori="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            kategori berhasil di tambahkan.
        </div>');

		redirect(site_url('remote/kategori'));
	}

	public function edit($kategori_id)
	{
		$data['title_page'] = "EDIT KATEGORI";

		$data['qKategoriBy'] = $this->m_remote->f002_getKategoriBy($kategori_id)->result();

		$this->template->show('remote/v_edit_kategori', $data);
	} 

	public function update()
	{
		$kategori_id 		= $this->input->post('kategori_id');
		$kategori_name 		= $this->input->post('kategori_name');

		$data = array(
			'kategori_name' 		=> $kategori_name,
			'kategori_desk' 		=> $kategori_desk
			
		);

		$this->m_remote->f003_updateKategori($kategori_id, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" kategori="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            kategori berhasil di perbaharui.
        </div>');

		redirect(site_url('remote/kategori'));
	}

	function delete($kategori_id)
	{
		$this->m_remote->delete($kategori_id);
		redirect('remote/kategori');
	}

}

/* End of file remote.php */
/* Location: ./application/controllers/remote.php */