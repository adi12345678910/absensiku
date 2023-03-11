<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cuti_khusus extends CI_Controller {

	public function __construct() 
	{
		parent:: __construct();

		$this->load->helper('url');

		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');	}

	public function index()
	{
		$data['title_page'] = "PENGAJUAN CUTI KHUSUS";

		$data['datakategori'] 		= $this->m_cuti_khusus->getdata();

		$data['datakategoricuti'] 		= $this->m_cuti_khusus->getdatacuti();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('cuti_khusus/v_pengajuan', $data);
		
	}

	

	public function pengajuan_cuti_khusus()
	{
		
		$is_name 	= $this->input->get('is_name');
		$is_type 	= $this->input->post('is_type');
		$date_mulai = $this->input->post('is_mulai');
			$dm 		= explode(' ', $date_mulai);
			$is_mulai 	= $dm[2].'-'.month_number($dm[1]).'-'.$dm[0];
		$date_sampai 	= $this->input->post('is_sampai');
			$ds 		= explode(' ', $date_sampai);
			$is_sampai 	= $ds[2].'-'.month_number($ds[1]).'-'.$ds[0];

		$hari_libur = $this->m_cuti_khusus->f008_cek_hari_libur($is_mulai, $is_sampai)->result();

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

		$is_alternate 	= $this->input->post('is_alternate');

		$is_ket 	= $this->input->post('is_ket');

		
		$this->load->view('cuti_khusus/v_pengajuan', $this->data);

		$name_karyawan = $this->m_cuti_khusus->f001_getUser($this->template->user_id())->row()->user_name;
 
	 		if ($this->template->role_id() == 3 ) {
	 

			$data = array(
				'user_id'			=> $this->template->user_id(),
				'is_user'			=> $this->template->role_id(),
				'is_divisi'			=> $this->template->divisi_id(),
				'is_jabatan'		=> $this->template->jabatan_id(),
				'is_posisi'			=> $this->template->posisi_id(),				
				'is_pengajuan_date' => date('Y-m-d'),
				'is_name' 		=> 'Cuti Khusus',
				'is_type' 		=> $is_type,
				'is_mulai' 		=> $is_mulai,
				'is_sampai' 	=> $is_sampai,
				'is_durasi' 	=> $is_durasi,
				'is_alternate' 	=> $is_alternate,
				'is_ket' 		=> $is_ket,
				'is_nama' 		=> 'Cuti Khusus',
				'is_status' 	=> 'diteruskan'
			);
			
			$this->m_cuti_tahunan->f002_create($data);
			$this->m_cuti_tahunan->create($data);
			
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
				'is_name' 		=> 'Cuti Khusus',
				'is_type' 		=> $is_type,
				'is_mulai' 		=> $is_mulai,
				'is_sampai' 	=> $is_sampai,
				'is_durasi' 	=> $is_durasi,
				'is_alternate' 	=> $is_alternate,
				'is_ket' 		=> $is_ket,
				'is_nama' 		=> 'Cuti Khusus',
				'is_status' 	=> 'diminta'
			);

			$this->m_cuti_khusus->f002_create($data);
			$this->m_cuti_khusus->create($data);

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
				'is_name' 		=> 'Cuti Khusus',
				'is_type' 		=> $is_type,
				'is_mulai' 		=> $is_mulai,
				'is_sampai' 	=> $is_sampai,
				'is_durasi' 	=> $is_durasi,
				'is_alternate' 	=> $is_alternate,
				'is_ket' 		=> $is_ket,
				'is_nama' 		=> 'Cuti Khusus',
				'is_status' 	=> 'diproses'
			);

			// echo "<pre>";
			// 	print_r($data);
			// echo "</pre>";

			// die;

			$this->m_cuti_khusus->f002_create($data);
			$this->m_cuti_khusus->create($data);

			$this->session->set_flashdata('alert', 
			'<div class="alert alert-success alert-dismissible">
            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            	<i class="icon fa fa-check"></i> Pengajuan berhasil diajukan.
          	</div>');
		}

        redirect('cuti_khusus/list_pengajuan');
	}

	public function list_pengajuan()
	{
		$data['title_page'] = "LIST PENGAJUAN CUTI KHUSUS";

		$data['alert'] 		= $this->session->flashdata('alert');

		if ($this->template->role_id() == 1 && $this->template->jabatan_id() == 1) 
		{
			$data['is_view'] = $this->m_cuti_khusus->admin_get()->result();
			$data['is_notif_admin'] = $this->m_cuti_khusus->hitungJumlahAdmin();

		}

		elseif ($this->template->role_id() == 3 && $this->template->jabatan_id() == 2) 
		{
			$data['is_view'] = $this->m_cuti_khusus->f0get()->result();
			$data['is_notif_direktur'] = $this->m_cuti_khusus->hitungJumlahDirektur();

		}

		elseif ($this->template->role_id() == 4) 
		{
			$data['is_view'] = $this->m_cuti_khusus->hrd_get()->result();
			$data['is_notif_admin'] = $this->m_cuti_khusus->hitungJumlahAdmin();

		}
		
		elseif ($this->template->role_id() == 2 && $this->template->jabatan_id() == 3) 
		{
			$data['is_view'] = $this->m_cuti_khusus->f1get()->result();
			$data['is_notif_cmo'] = $this->m_cuti_khusus->hitungJumlahCmo();

		}

		//main activity

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 2 && $this->template->posisi_id() == 2) 
		{
			$data['is_view'] = $this->m_cuti_khusus->f2get()->result();
			$data['is_notif_sv2'] = $this->m_cuti_khusus->hitungJumlahSv2();

		}

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 3 && $this->template->posisi_id() == 2 ) 
		{
			$data['is_view'] = $this->m_cuti_khusus->f3get()->result();
			$data['is_notif_sv3'] = $this->m_cuti_khusus->hitungJumlahSv3();

		}

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 4 && $this->template->posisi_id() == 2 ) 
		{
			$data['is_view'] = $this->m_cuti_khusus->f4get()->result();
			$data['is_notif_sv4'] = $this->m_cuti_khusus->hitungJumlahSv4();

		}

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 5 && $this->template->posisi_id() == 2 ) 
		{
			$data['is_view'] = $this->m_cuti_khusus->f5get()->result();
			$data['is_notif_sv5'] = $this->m_cuti_khusus->hitungJumlahSv5();

		}

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 6 && $this->template->posisi_id() == 2 ) 
		{
			$data['is_view'] = $this->m_cuti_khusus->f6get()->result();
			$data['is_notif_sv6'] = $this->m_cuti_khusus->hitungJumlahSv6();

		}

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 8 && $this->template->posisi_id() == 5 ) 
		{
			$data['is_view'] = $this->m_cuti_khusus->m4get()->result();
			$data['is_notif_sv7'] = $this->m_cuti_khusus->hitungJumlahSv7();

		}




		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 7 && $this->template->posisi_id() == 9 ) 
		{
			$data['is_view'] = $this->m_cuti_khusus->f7get()->result();
		}

		//staff.activity

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 2 && $this->template->posisi_id() == 3 ) 
		{
			$data['is_view'] = $this->m_cuti_khusus->m2get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 3 && $this->template->posisi_id() == 4 ) 
		{
			$data['is_view'] = $this->m_cuti_khusus->m3get()->result();
		}

		

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 4 && $this->template->posisi_id() == 6 ) 
		{
			$data['is_view'] = $this->m_cuti_khusus->m5get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 4 && $this->template->posisi_id() == 3 ) 
		{
			$data['is_view'] = $this->m_cuti_khusus->m6get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 4 && $this->template->posisi_id() == 7 ) 
		{
			$data['is_view'] = $this->m_cuti_khusus->m7get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 5 && $this->template->posisi_id() == 6 ) 
		{
			$data['is_view'] = $this->m_cuti_khusus->m8get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 5 && $this->template->posisi_id() == 8 ) 
		{
			$data['is_view'] = $this->m_cuti_khusus->m9get()->result();
		}



		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 8 && $this->template->posisi_id() == 14 ) 
		{
			$data['is_view'] = $this->m_cuti_khusus->m10get()->result();
		}

		

		elseif ($this->template->role_id() == 6 && $this->template->posisi_id() == 11 ) 
		{
			$data['is_view'] = $this->m_cuti_khusus->m11get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->posisi_id() == 12 ) 
		{
			$data['is_view'] = $this->m_cuti_khusus->m12get()->result();
		}


		else
		{
			$data['is_view'] = $this->m_cuti_khusus->f004_getPerUser($this->template->user_id())->result();
		}

		$this->template->show('cuti_khusus/v_list_pengajuan', $data);
	}

	public function list_pengajuan_detail($is_id, $is_user)
	{
		$data['title_page'] = "DETAIL LIST PENGAJUAN CUTI KHUSUS";

		$data['datakategori'] 		= $this->m_cuti_khusus->getdata();

		$data['datakategoricuti'] 		= $this->m_cuti_khusus->getdatacuti();
		
		$data['is_view'] = $this->m_cuti_khusus->f006_getISBy($is_id)->result();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('cuti_khusus/v_pengajuan_detail', $data);
	}

	public function list_pengajuan_update()
	{
		
		$is_id 			= $this->input->post('is_id');
		$is_user 		= $this->input->post('is_user');

		$is_name 	= $this->input->get('is_name');
		$is_type 	= $this->input->post('is_type');

		$file_image_old = $this->input->post('file_image_old');

		$date_mulai 	= $this->input->post('is_mulai');
			$dm 		= explode(' ', $date_mulai);
			$is_mulai 	= $dm[2].'-'.month_number($dm[1]).'-'.$dm[0];

		$date_sampai 	= $this->input->post('is_sampai');
			$ds 		= explode(' ', $date_sampai);
			$is_sampai 	= $ds[2].'-'.month_number($ds[1]).'-'.$ds[0];

		$is_ket 		= $this->input->post('is_ket');
		$is_alternate 	= $this->input->post('is_alternate');
		$name_karyawan = $this->m_cuti_khusus->f001_getUser($this->template->user_id())->row()->user_name;


			$data = array(
				'is_pengajuan_date' => date('Y-m-d'),
				'is_name' 			=> 'Cuti Khusus',
				'is_type' 			=> $is_type,
				'is_mulai' 			=> $is_mulai,
				'is_sampai'			=> $is_sampai,
				'is_alternate' 		=> $is_alternate,
				'is_ket' 			=> $is_ket,
				'is_nama' 			=> 'Cuti Khusus',
				'is_status' 		=> 'diproses'
			);

		$this->m_cuti_khusus->f007_updatePengajuan($is_id, $is_user, $data);

		$this->m_cuti_khusus->updatePengajuan($is_id, $is_user, $data);
		
		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        	<i class="icon fa fa-check"></i> Pengajuan berhasil diajukan kembali.
      	</div>');

		redirect('cuti_khusus/list_pengajuan');
		
	}

	
	public function list_pengajuan_detail_hrd($is_id, $is_user)
	{
		$data['title_page'] = "DETAIL LIST PENGAJUAN CUTI KHUSUS";

		$data['datakategori'] 		= $this->m_cuti_khusus->getdata();

		$data['datakategoricuti'] 		= $this->m_cuti_khusus->getdatacuti();
		
		$data['is_hrd'] = $this->m_cuti_khusus->f006_getISBy($is_id)->result();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('cuti_khusus/v_pengajuan_detail_hrd', $data);
	}

	public function list_pengajuan_update_hrd()
	{
		
		$is_id 			= $this->input->post('is_id');
		$is_user 		= $this->input->post('is_user');

		$is_name 	= $this->input->get('is_name');
		$is_type 	= $this->input->post('is_type');

		$file_image_old = $this->input->post('file_image_old');

		$date_mulai 	= $this->input->post('is_mulai');
			$dm 		= explode(' ', $date_mulai);
			$is_mulai 	= $dm[2].'-'.month_number($dm[1]).'-'.$dm[0];

		$date_sampai 	= $this->input->post('is_sampai');
			$ds 		= explode(' ', $date_sampai);
			$is_sampai 	= $ds[2].'-'.month_number($ds[1]).'-'.$ds[0];

		$is_ket 		= $this->input->post('is_ket');
		$is_alternate 	= $this->input->post('is_alternate');
		$name_karyawan = $this->m_cuti_khusus->f001_getUser($this->template->user_id())->row()->user_name;

	
		

			$data = array(
				'is_pengajuan_date' => date('Y-m-d'),
				'is_name' 			=> 'Cuti Khusus',
				'is_type' 			=> $is_type,
				'is_mulai' 			=> $is_mulai,
				'is_sampai'			=> $is_sampai,
				'is_alternate' 		=> $is_alternate,
				'is_ket' 			=> $is_ket,
				'is_nama' 			=> 'Cuti Khusus',
				'is_status' 		=> 'diminta'
			);

		

		$this->m_cuti_khusus->f007_updatePengajuan($is_id, $is_user, $data);

		$this->m_cuti_khusus->updatePengajuan($is_id, $is_user, $data);
		
		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        	<i class="icon fa fa-check"></i> Pengajuan berhasil diajukan kembali.
      	</div>');

		redirect('cuti_khusus/list_pengajuan');
		
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

		$this->m_cuti_khusus->f007_updatePengajuan($is_id, $is_user, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        	<i class="icon fa fa-check"></i> Pengajuan berhasil diproses.
      	</div>');

      	redirect('cuti_khusus/list_pengajuan');
	}

	//master.data

	public function kategori()
	{
		$data['title_page'] = "KATEGORI";

		$data['qKategori'] = $this->m_cuti_khusus->f001_getKategori()->result();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('cuti_khusus/v_kategori', $data);
	}

	public function create()
	{
		$kategori_name 		= $this->input->post('kategori_name');
		$kategori_desk 		= $this->input->post('kategori_desk');
		
		$data = array(
			'kategori_name' 		=> $kategori_name,
			'kategori_desk' 		=> $kategori_desk
			
		);

		$this->m_cuti_khusus->f004_createkategori($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" kategori="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            kategori berhasil di tambahkan.
        </div>');

		redirect(site_url('cuti_khusus/kategori'));
	}

	public function edit($kategori_id)
	{
		$data['title_page'] = "EDIT KATEGORI";

		$data['qKategoriBy'] = $this->m_cuti_khusus->f002_getKategoriBy($kategori_id)->result();

		$this->template->show('cuti_khusus/v_edit_kategori', $data);
	} 

	public function update()
	{
		$kategori_id 		= $this->input->post('kategori_id');
		$kategori_name 		= $this->input->post('kategori_name');

		$data = array(
			'kategori_name' 		=> $kategori_name,
			'kategori_desk' 		=> $kategori_desk
			
		);

		$this->m_cuti_khusus->f003_updateKategori($kategori_id, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" kategori="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            kategori berhasil di perbaharui.
        </div>');

		redirect(site_url('cuti_khusus/kategori'));
	}

	function delete($kategori_id)
	{
		$this->m_cuti_khusus->delete($kategori_id);
		redirect('cuti_khusus/kategori');
	}

	function getdatauser()
	{
		$user = $this->input->get('user');
		$query = $this->m_cuti_khusus->get_user($user, 'user_name');
		echo json_encode($query);
	}

}

/* End of file cuti_khusus.php */
/* Location: ./application/controllers/cuti_khusus.php */