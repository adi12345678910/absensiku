<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() 
	{
		parent:: __construct();

		$this->load->model('m_home');
		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');
		$this->load->model('m_home');


	}

	public function index()
	{
		$data['title_page'] = "HOME";

		

		if ($this->agent->is_browser())
		{
		    $data['browser'] = $this->agent->browser().' versi '.$this->agent->version();
		}
		elseif ($this->agent->is_robot())
		{
		    $data['browser'] = $this->agent->robot();
		}
		elseif ($this->agent->is_mobile())
		{
		    $data['browser'] = $this->agent->mobile();
		}
		else
		{
		    $data['browser'] = 'Unidentified User Browser';
		}

		$data['user_id'] = $this->template->user_id();

		$data['pc'] = gethostbyaddr($_SERVER['REMOTE_ADDR']);

		$data['today'] 		= date("Y-m-d");

		$data['alert'] 		= $this->session->flashdata('alert');

		$k_lem = $this->template->lembaga_id();
		$b_now = date('m');
		$t_now = date('Y');

		$data['input_todo_list_program'] = $this->m_home->f008_getProgramKerja($k_lem, $b_now, $t_now);

		$data['q_ks'] 		= $this->m_home->f003_getby($this->template->user_id())->result();
		
		$checkTodo = $this->m_home->f010_cekTodo($this->template->user_id());


		if ($checkTodo->num_rows() > 0) 
		{
			$todo_tgl_input = $checkTodo->row()->todo_tgl_input;
			$tgl_t = date('Y-m-d', strtotime($todo_tgl_input));

			if ($tgl_t < date('Y-m-d')) 
			{
				$data['checktodo'] = '<div class="alert alert-warning alert-dismissible" role="alert">
		                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                Ada Todo List yang belum selesai, silahkan <a href='.site_url('todo_list').'>klik disini</a> untuk melihat.
		            </div>';
			}
			else
			{
				$data['checktodo'] = '';
			}
		}
		else
		{
			$data['checktodo'] = '';
		}

		$this->template->show('home/v_home', $data);
	}

	public function absen_masuk()
	{
		$user 		= $this->input->post('id');
		$date 		= date("Y-m-d");
		$time		= $this->input->post('absen_masuk');
		$pc 		= $this->input->post('pc');
		$os 		= $this->agent->platform();
		$ip 		= $this->input->ip_address();
		$browser 	= $this->input->post('browser');
		$location 	= $this->input->post('lokasi');
		$long	    = $this->input->post('long');
		$lat	    = $this->input->post('lat');
		$jarak	    = $this->input->post('jarak');

		$point1 = array("lat" => -6.9229783, "long" => 107.7496046 );
		$point2 = array("lat" => $lat, "long" => $long);

		
		$jarak = $this->distance($point1['lat'], $point1['long'], $point2['lat'], $point2['long']);
		
		

		$jam_masuk 	= strtotime(date('H:i', strtotime($this->m_home->f003_jamMasuk()->row()->setting_time)));
		$user_masuk = strtotime(date('H:i', strtotime($time)));

		$point = ($jam_masuk-$user_masuk)/60;



		$image = $this->input->post('image');
		$image = str_replace('data:image/jpeg;base64,','', $image);
		$image = base64_decode($image);
		$filename = 'image_'.time().'.png';
		file_put_contents(FCPATH.'/assets/images/absen/masuk/'.$filename,$image);

		$data = array(
			'absen_user' 			=> $user,
			'absen_date' 			=> $date,
			'absen_masuk' 			=> $time,
			'absen_masuk_pc' 		=> $pc,
			'absen_masuk_os' 		=> $os,
			'absen_masuk_ip' 		=> $ip,
			'absen_masuk_browser'	=> $browser,
			'absen_masuk_lokasi' 	=> $location,
			'absen_masuk_poin'		=> $point,
			'absen_masuk_status'	=> 2,
			'long'			        => $long,
			'lat'					=> $lat,
			'jarak'					=> $jarak,
			'image'					=> $filename

		);

		$this->m_home->f002_absenMasuk($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Behasil absen masuk.
        </div>');
		echo json_encode($res);
		redirect(site_url(''));
	}
	public function distance($lat1, $lon1, $lat2, $lon2)
	{
		$theta = $lon1 - $lon2;
		$miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
		$miles = acos($miles);
		$miles = rad2deg($miles);
		$miles = $miles * 60 * 1.1515;
		$feet  = $miles * 5280;
		$yards = $feet / 3;
		$kilometers = $miles * 1.609344;
		$meters = $kilometers * 1000;
		return $meters;	
	}

	public function dd($str)
	{
		echo '<pre>';
		print_r($str);
		echo '</pre>';
		die();
	}

	public function absen_pulang()
	{
		$user 		= $this->input->post('id');
		$date 		= date("Y-m-d");
		$time		= $this->input->post('absen_pulang');
		$pc 		= $this->input->post('pc');
		$os 		= $this->agent->platform();
		$ip 		= $this->input->ip_address();
		$browser 	= $this->input->post('browser');
		$location 	= $this->input->post('lokasi');
		$long_	    = $this->input->post('long_');
		$lat_	    = $this->input->post('lat_');
		$jarak_	    = $this->input->post('jarak');

		$point1 = array("lat" => -6.9229783, "long" => 107.7496046 );
		$point2 = array("lat" => $lat_, "long" => $long_);

		
		$jarak_ = $this->distance($point1['lat'], $point1['long'], $point2['lat'], $point2['long']);
		
		$jam_pulang  = strtotime(date('H:i', strtotime($this->m_home->f005_jamPulang()->row()->setting_time)));
		$user_pulang = strtotime(date('H:i', strtotime($time)));

		$point = ($user_pulang-$jam_pulang)/60;

		$image_pulang = $this->input->post('image_pulang');
		$image_pulang = str_replace('data:image/jpeg;base64,','', $image_pulang);
		$image_pulang = base64_decode($image_pulang);
		$filename = 'image_pulang_'.time().'.png';
		file_put_contents(FCPATH.'/assets/images/absen/pulang/'.$filename,$image_pulang);

		$data = array(
			'absen_pulang' 			=> $time,
			'absen_pulang_pc' 		=> $pc,
			'absen_pulang_os' 		=> $os,
			'absen_pulang_ip' 		=> $ip,
			'absen_pulang_browser'	=> $browser,
			'absen_pulang_lokasi' 	=> $location,
			'absen_pulang_poin'		=> $point,
			'absen_pulang_status'	=> 3,
			'long_'			        => $long_,
			'lat_'					=> $lat_,
			'jarak_'				=> $jarak_,
			'image_pulang'			=> $filename

		);

		$this->m_home->f004_absenPulang($user, $date, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Behasil absen pulang.
        </div>');

		redirect(site_url(''));
		
	}

	public function distance_($lat1, $lon1, $lat2, $lon2)
	{
		$theta = $lon1 - $lon2;
		$miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
		$miles = acos($miles);
		$miles = rad2deg($miles);
		$miles = $miles * 60 * 1.1515;
		$feet  = $miles * 5280;
		$yards = $feet / 3;
		$kilometers = $miles * 1.609344;
		$meters = $kilometers * 1000;
		return $meters;	
	}

	public function todo()
	{
		$todo_name 	= $this->input->post('todo_name');
		$todo_desk 	= $this->input->post('todo_desk');
		$t_kerja 	= $this->input->post('todo_kerja');
		if (empty($t_kerja)) 
		{
			$todo_kerja = "0";
		}
		else
		{
			$todo_kerja = $this->input->post('todo_kerja');
		}

		$data = array(
			'todo_name' 		=> $todo_name, 
			'todo_desk' 		=> $todo_desk, 
			'todo_kerja' 		=> $todo_kerja,
			'todo_user'			=> $this->template->user_id(),
			'todo_status'		=> 'todo',
			'todo_tgl_input'	=> date('Y-m-d H:i:s') 
		);

		$this->m_home->f009_createTodo($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Berhasil menambahakn Todo List.
        </div>');

		redirect(site_url('home'));
	}

	/*lupa absen pulang*/
	public function checkabsen()
	{
		$today = date('Y-m-d');
		$num = date('N', strtotime($today)); 

		$karyawan = $this->m_home->f007_getUSer()->result();

		foreach ($karyawan as $row) 
		{
			$user_id = $row->user_id;

			$checkAbsen = $this->m_home->f006_checkAbsen($user_id, $today);

			if ($checkAbsen->num_rows() < 1) 
			{
				if ($num != 7) 
				{
					$data = array(
						'absen_user' 			=> $user_id,
						'absen_date'			=> $today,
						'absen_masuk_status'	=> 6,
						'absen_pulang_status'	=> 6
					);

					$this->m_home->f002_absenMasuk($data);
				}
				else
				{
					$data = array(
						'absen_user' 			=> $user_id,
						'absen_date'			=> $today,
						'absen_masuk_status'	=> 9,
						'absen_pulang_status'	=> 9
					);

					$this->m_home->f002_absenMasuk($data);
				}
			}
		}
	}


	
	public function create()
	{
		$data['title_page'] = "Pengumuman";

		$data['q_ks'] 		= $this->m_home->f002_get(($this->template->user_id()))->result();
		
		$this->template->show('home/v_informasi_hrd', $data);
	}
	
	public function kirim()
	{
		$informasi_user = $this->template->user_id();
		$judul_informasi = $this->input->post('judul_informasi');
		$keterangan_informasi = $this->input->post('keterangan_informasi');

		$data = array(
			'informasi_user'=> $informasi_user,
			'judul_informasi' => $judul_informasi,
			'keterangan_informasi' 	=> $keterangan_informasi,
			'informasi_date'	=> date('Y-m-d H:i:s')
		);

		$this->m_home->f001_create($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Pengumuman anda berhasil dikirim.
        </div>');

		redirect(site_url('home'));
	}



	public function edit($informasi_id)
	{
		$data['title_page'] = "EDIT PENGUMUMAN";

		$data['qPosisiBy'] = $this->m_home->f002_getPosisiBy($informasi_id)->result();

		$data['datakategori'] 	= $this->m_home->getdata();

		$this->template->show('home/v_informasi_edit', $data);
	} 
	
	public function update()
	{
		$informasi_id		    = $this->input->post('informasi_id');
		$judul_informasi 		= $this->input->post('judul_informasi');
		$keterangan_informasi 	= $this->input->post('keterangan_informasi');
		$data = array(
				
				 
				'judul_informasi' 		=> $judul_informasi,
				'keterangan_informasi'  => $keterangan_informasi
			 

			);
	 

		$this->m_home->f006_updateInformasi($informasi_id, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Pengumuman berhasil diperbaharui.
        </div>');

        redirect(site_url('home'));
	}

	function delete($informasi_id)
	{
		$this->m_home->delete($informasi_id);
	
		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            User berhasil di hapus.
        </div>');

		redirect(site_url('home/create'));
	}
	
	
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */