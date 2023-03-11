<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sakit extends CI_Controller {

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
		$data['title_page'] = "PENGAJUAN SAKIT";

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('sakit/v_pengajuan', $data);
	}

	public function pengajuan_sakit()
	{
		$is_name 	= $this->input->get('is_name');
		$date_mulai = $this->input->post('is_mulai');
			$dm 		= explode(' ', $date_mulai);
			$is_mulai 	= $dm[2].'-'.month_number($dm[1]).'-'.$dm[0];
		$date_sampai 	= $this->input->post('is_sampai');
			$ds 		= explode(' ', $date_sampai);
			$is_sampai 	= $ds[2].'-'.month_number($ds[1]).'-'.$ds[0];

		$hari_libur = $this->m_sakit->f008_cek_hari_libur($is_mulai, $is_sampai)->result();

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

		$name_karyawan = $this->m_sakit->f001_getUser($this->template->user_id())->row()->user_name;

		// setting konfigurasi upload
		$config['upload_path'] 		= './assets/images/sakit/';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']  		= '10240000';
		$config['file_name'] 		= $is_name.'_'.time().'-'.$name_karyawan;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('file_image'))
		{
			$error = array('error' => $this->upload->display_errors());

			$this->session->set_flashdata('alert', 
			'<div class="alert alert-warning alert-dismissible">
            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            	<i class="icon fa fa-check"></i> File yang anda uploadkan gagal, silahkan ulangi.
          	</div>');
		}

		elseif ($this->template->role_id() == 3 ) 
		{
			$result = $this->upload->data();

			$is_file = $result['file_name'];

			$data = array(
				'user_id'			=> $this->template->user_id(),
				'is_user'			=> $this->template->role_id(),
				'is_divisi'			=> $this->template->divisi_id(),
				'is_jabatan'		=> $this->template->jabatan_id(),
				'is_posisi'			=> $this->template->posisi_id(),
				'is_pengajuan_date' => date('Y-m-d'),
				'is_name' 			=> 'sakit',
				'is_mulai' 			=> $is_mulai,
				'is_sampai' 		=> $is_sampai,
				'is_durasi' 		=> $is_durasi,
				'is_file' 			=> $is_file,
				'is_ket' 			=> $is_ket,
				'is_nama' 			=> 'sakit',
				'is_status' 		=> 'diteruskan'
			);

			$this->m_sakit->f002_create($data);
			$this->m_sakit->create($data);

			$this->session->set_flashdata('alert', 
			'<div class="alert alert-success alert-dismissible">
            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            	<i class="icon fa fa-check"></i> Pengajuan berhasil diajukan.
          	</div>');
		}

		elseif ($this->template->role_id() == 4 ) 
		{
			$result = $this->upload->data();

			$is_file = $result['file_name'];

			$data = array(
				'user_id'			=> $this->template->user_id(),
				'is_user'			=> $this->template->role_id(),
				'is_divisi'			=> $this->template->divisi_id(),
				'is_jabatan'		=> $this->template->jabatan_id(),
				'is_posisi'			=> $this->template->posisi_id(),
				'is_pengajuan_date' => date('Y-m-d'),
				'is_name' 			=> 'sakit',
				'is_mulai' 			=> $is_mulai,
				'is_sampai' 		=> $is_sampai,
				'is_durasi' 		=> $is_durasi,
				'is_file' 			=> $is_file,
				'is_ket' 			=> $is_ket,
				'is_nama' 			=> 'sakit',
				'is_status' 		=> 'diminta'
			);

			$this->m_sakit->f002_create($data);
			$this->m_sakit->create($data);

			$this->session->set_flashdata('alert', 
			'<div class="alert alert-success alert-dismissible">
            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            	<i class="icon fa fa-check"></i> Pengajuan berhasil diajukan.
          	</div>');
		}
		
		else
		{
			$result = $this->upload->data();

			$is_file = $result['file_name'];

			$data = array(
				'user_id'			=> $this->template->user_id(),
				'is_user'			=> $this->template->role_id(),
				'is_divisi'			=> $this->template->divisi_id(),
				'is_jabatan'		=> $this->template->jabatan_id(),
				'is_posisi'			=> $this->template->posisi_id(),
				'is_pengajuan_date' => date('Y-m-d'),
				'is_name' 			=> 'sakit',
				'is_mulai' 			=> $is_mulai,
				'is_sampai' 		=> $is_sampai,
				'is_durasi' 		=> $is_durasi,
				'is_file' 			=> $is_file,
				'is_ket' 			=> $is_ket,
				'is_nama' 			=> 'sakit',
				'is_status' 		=> 'diproses'
			);

			// echo "<pre>";
			// 	print_r($data);
			// echo "</pre>";

			// die;

			$this->m_sakit->f002_create($data);
			$this->m_sakit->create($data);

			$this->session->set_flashdata('alert', 
			'<div class="alert alert-success alert-dismissible">
            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            	<i class="icon fa fa-check"></i> Pengajuan berhasil diajukan.
          	</div>');
		}

        redirect('sakit/list_pengajuan');
	}

	public function list_pengajuan()
	{
		$data['title_page'] = "LIST PENGAJUAN SAKIT";

		$data['alert'] 		= $this->session->flashdata('alert');


		if ($this->template->role_id() == 1 && $this->template->jabatan_id() == 1) 
		{
			$data['is_view'] = $this->m_sakit->admin_get()->result();
			$data['is_notif_admin'] = $this->m_sakit->hitungJumlahAdmin();

		}

		elseif ($this->template->role_id() == 3 && $this->template->jabatan_id() == 2) 
		{
			$data['is_view'] = $this->m_sakit->f0get()->result();
			$data['is_notif_direktur'] = $this->m_sakit->hitungJumlahDirektur();

		}

		elseif ($this->template->role_id() == 4) 
		{
			$data['is_view'] = $this->m_sakit->hrd_get()->result();
			$data['is_notif_hrd'] = $this->m_sakit->hitungJumlahHrd();

		}
		
		elseif ($this->template->role_id() == 2 && $this->template->jabatan_id() == 3) 
		{
			$data['is_view'] = $this->m_sakit->f1get()->result();
			$data['is_notif_cmo'] = $this->m_sakit->hitungJumlahCmo();

		}

		//main activity

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 2 && $this->template->posisi_id() == 2) 
		{
			$data['is_view'] = $this->m_sakit->f2get()->result();
			$data['is_notif_sv2'] = $this->m_sakit->hitungJumlahSv2();

		}

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 3 && $this->template->posisi_id() == 2 ) 
		{
			$data['is_view'] = $this->m_sakit->f3get()->result();
			$data['is_notif_sv3'] = $this->m_sakit->hitungJumlahSv3();

		}

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 4 && $this->template->posisi_id() == 2 ) 
		{
			$data['is_view'] = $this->m_sakit->f4get()->result();
			$data['is_notif_sv4'] = $this->m_sakit->hitungJumlahSv4();

		}

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 5 && $this->template->posisi_id() == 2 ) 
		{
			$data['is_view'] = $this->m_sakit->f5get()->result();
			$data['is_notif_sv5'] = $this->m_sakit->hitungJumlahSv5();

		}

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 6 && $this->template->posisi_id() == 2 ) 
		{
			$data['is_view'] = $this->m_sakit->f6get()->result();
			$data['is_notif_sv6'] = $this->m_sakit->hitungJumlahSv6();

		}

		elseif ($this->template->role_id() == 5 && $this->template->divisi_id() == 8 && $this->template->posisi_id() == 5 ) 
		{
			$data['is_view'] = $this->m_sakit->m4get()->result();
			$data['is_notif_sv7'] = $this->m_sakit->hitungJumlahSv7();

		}

		//lanjut disini aja 
		

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 7 && $this->template->posisi_id() == 9 ) 
		{
			$data['is_view'] = $this->m_sakit->f7get()->result();
		}

		//staff.activity

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 2 && $this->template->posisi_id() == 3 ) 
		{
			$data['is_view'] = $this->m_sakit->m2get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 3 && $this->template->posisi_id() == 4 ) 
		{
			$data['is_view'] = $this->m_sakit->m3get()->result();
		}

		

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 4 && $this->template->posisi_id() == 6 ) 
		{
			$data['is_view'] = $this->m_sakit->m5get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 4 && $this->template->posisi_id() == 3 ) 
		{
			$data['is_view'] = $this->m_sakit->m6get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 4 && $this->template->posisi_id() == 7 ) 
		{
			$data['is_view'] = $this->m_sakit->m7get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 5 && $this->template->posisi_id() == 6 ) 
		{
			$data['is_view'] = $this->m_sakit->m8get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 5 && $this->template->posisi_id() == 8 ) 
		{
			$data['is_view'] = $this->m_sakit->m9get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->divisi_id() == 8 && $this->template->posisi_id() == 14 ) 
		{
			$data['is_view'] = $this->m_sakit->m10get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->posisi_id() == 11 ) 
		{
			$data['is_view'] = $this->m_sakit->m11get()->result();
		}

		elseif ($this->template->role_id() == 6 && $this->template->posisi_id() == 12 ) 
		{
			$data['is_view'] = $this->m_sakit->m12get()->result();
		}

		else
		{
			$data['is_view'] = $this->m_sakit->f004_getPerUser($this->template->user_id())->result();
		}

		$this->template->show('sakit/v_list_pengajuan', $data);
	}

	public function list_pengajuan_detail($is_id, $is_user)
	{
		$data['title_page'] = "DETAIL LIST PENGAJUAN SAKIT";

		$data['is_view'] = $this->m_sakit->f006_getISBy($is_id)->result();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('sakit/v_pengajuan_detail', $data);
	}

	public function list_pengajuan_detail_hrd($is_id, $is_user)
	{
		$data['title_page'] = "DETAIL LIST PENGAJUAN SAKIT HRD";

		$data['is_hrd'] = $this->m_sakit->f006_getISBy($is_id)->result();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('sakit/v_pengajuan_detail_hrd', $data);
	}

	public function list_pengajuan_update_hrd()
	{
		$is_id 			= $this->input->post('is_id');
		$is_user 		= $this->input->post('is_user');

		$is_name 		= $this->input->get('is_name');

		$file_image_old = $this->input->post('file_image_old');

		$date_mulai 	= $this->input->post('is_mulai');
			$dm 		= explode(' ', $date_mulai);
			$is_mulai 	= $dm[2].'-'.month_number($dm[1]).'-'.$dm[0];

		$date_sampai 	= $this->input->post('is_sampai');
			$ds 		= explode(' ', $date_sampai);
			$is_sampai 	= $ds[2].'-'.month_number($ds[1]).'-'.$ds[0];

		$is_ket 		= $this->input->post('is_ket');

		$name_karyawan = $this->m_sakit->f001_getUser($this->template->user_id())->row()->user_name;

		// setting konfigurasi upload
		$path 						= './assets/images/sakit';
        $config['upload_path'] 		= $path;
        $config['allowed_types'] 	= 'gif|jpg|png';
    	$config['max_size']  		= '10240000';
        // $config['overwrite'] 		= false; 
        $config['file_name'] 		= $is_name.'_'.time().'_'.$name_karyawan;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('file_image_new'))
		{
			// $error = $this->upload->display_errors();
			// print_r($error);

			$data = array(
				'is_pengajuan_date' => date('Y-m-d'),
				'is_name' 			=> 'sakit',
				'is_mulai' 			=> $is_mulai,
				'is_sampai'			=> $is_sampai,
				'is_durasi' 		=> $is_durasi,
				'is_ket' 			=> $is_ket,
				'is_nama' 			=> 'sakit',
				'is_status' 		=> 'diminta'
			);
		}

		else
		{
			$result = $this->upload->data();  			

            $is_file = $result['file_name'];

            @unlink($path.$file_image_old);

            $data = array(
				'is_pengajuan_date' => date('Y-m-d'),
				'is_name' 			=> 'sakit',
				'is_mulai' 			=> $is_mulai,
				'is_sampai'			=> $is_sampai,
				'is_file' 			=> $is_file,
				'is_ket' 			=> $is_ket,
				'is_nama' 			=> 'sakit',
				'is_status' 		=> 'diminta'
			);

		}


		$this->m_sakit->f007_updatePengajuan($is_id, $is_user, $data);
		$this->m_sakit->updatePengajuan($is_id, $is_user, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        	<i class="icon fa fa-check"></i> Pengajuan berhasil diajukan kembali.
      	</div>');

		redirect('sakit/list_pengajuan');
		
	}

	public function list_pengajuan_update()
	{
		$is_id 			= $this->input->post('is_id');
		$is_user 		= $this->input->post('is_user');

		$is_name 		= $this->input->get('is_name');

		$file_image_old = $this->input->post('file_image_old');

		$date_mulai 	= $this->input->post('is_mulai');
			$dm 		= explode(' ', $date_mulai);
			$is_mulai 	= $dm[2].'-'.month_number($dm[1]).'-'.$dm[0];

		$date_sampai 	= $this->input->post('is_sampai');
			$ds 		= explode(' ', $date_sampai);
			$is_sampai 	= $ds[2].'-'.month_number($ds[1]).'-'.$ds[0];

		$is_ket 		= $this->input->post('is_ket');

		$name_karyawan = $this->m_sakit->f001_getUser($this->template->user_id())->row()->user_name;

		// setting konfigurasi upload
		$path 						= './assets/images/sakit';
        $config['upload_path'] 		= $path;
        $config['allowed_types'] 	= 'gif|jpg|png';
    	$config['max_size']  		= '10240000';
        // $config['overwrite'] 		= false; 
        $config['file_name'] 		= $is_name.'_'.time().'_'.$name_karyawan;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('file_image_new'))
		{
			// $error = $this->upload->display_errors();
			// print_r($error);

			$data = array(
				'is_pengajuan_date' => date('Y-m-d'),
				'is_name' 			=> 'sakit',
				'is_mulai' 			=> $is_mulai,
				'is_sampai'			=> $is_sampai,
				'is_durasi' 		=> $is_durasi,
				'is_ket' 			=> $is_ket,
				'is_nama' 			=> 'sakit',
				'is_status' 		=> 'diproses'
			);
		}

		else
		{
			$result = $this->upload->data();  			

            $is_file = $result['file_name'];

            @unlink($path.$file_image_old);

            $data = array(
				'is_pengajuan_date' => date('Y-m-d'),
				'is_name' 			=> 'sakit',
				'is_mulai' 			=> $is_mulai,
				'is_sampai'			=> $is_sampai,
				'is_file' 			=> $is_file,
				'is_ket' 			=> $is_ket,
				'is_nama' 			=> 'sakit',
				'is_status' 		=> 'diproses'
			);

		}


		$this->m_sakit->f007_updatePengajuan($is_id, $is_user, $data);
		$this->m_sakit->updatePengajuan($is_id, $is_user, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        	<i class="icon fa fa-check"></i> Pengajuan berhasil diajukan kembali.
      	</div>');

		redirect('sakit/list_pengajuan');
		
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

		$this->m_sakit->f007_updatePengajuan($is_id, $is_user, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        	<i class="icon fa fa-check"></i> Pengajuan berhasil diproses.
      	</div>');

      	redirect('sakit/list_pengajuan');
	}

	
}

/* End of file sakit.php */
/* Location: ./application/controllers/sakit.php */