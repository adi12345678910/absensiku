<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Karyawan extends CI_Controller {



	public function __construct()

	{

		parent::__construct();

		

		$this->load->model('m_karyawan');

		$this->load->model('m_profile');

		$this->load->model('m_keluarga');



		$this->load->library("PHPExcel/PHPExcel");

		$this->load->library("pdf");

		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');

	}



	public function index()

	{

		$data['title_page'] = "KARYAWAN";



		$data['alert'] 		= $this->session->flashdata('alert');



		$data['qUser'] 		= $this->m_karyawan->f001_getUser()->result();

		

		$data['qRole'] 		= $this->m_karyawan->f003_getRole()->result();

		$data['qLembaga'] 	= $this->m_karyawan->f004_getLembaga()->result();



		$this->template->show('karyawan/v_karyawan', $data);

	}

	

	public function create()

	{

		$user_nik 		= $this->input->post('user_nik');

		$user_name 			= $this->input->post('user_name');

		$tgl_lhr 			= $this->input->post('user_tgl_lhr');

			$broken 		= explode(' ', $tgl_lhr);

			$month			= month_number($broken[1]);

			$user_tgl_lhr	= $broken[2].'-'.$month.'-'.$broken[0];

		$user_gender 		= $this->input->post('user_gender');

		$user_hp 			= $this->input->post('user_hp');

		$user_alamat 		= $this->input->post('user_alamat');

		$user_jabatan 		= $this->input->post('user_jabatan');

		$user_role 			= $this->input->post('user_role');

		$user_divisi 		= $this->input->post('user_divisi');

		$user_lembaga 		= $this->input->post('user_lembaga');

		$user_password 		= $this->input->post('user_password');

		$user_email 		= $this->input->post('user_email');

		$user_status 		= $this->input->post('user_status');



		$check = $this->m_karyawan->f007_checkUSer($user_nik);



		if ($check->num_rows() > 0) 

		{

			$this->session->set_flashdata('alert', 

				'<div class="alert alert-warning alert-dismissible" role="alert">

	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

	                Nik yang anda masukan sudah digunakan, silahkan cari untuk memastikan.

	            </div>');

		}

		else

		{

			$data = array(

				'user_nik' 			=> $user_nik,

			    'user_name' 		=> $user_name,

				'user_tgl_lhr' 		=> $user_tgl_lhr,

				'user_gender' 		=> $user_gender,

				'user_hp' 			=> $user_hp,

				'user_alamat' 		=> $user_alamat,

				'user_jabatan' 		=> $user_jabatan,

				'user_role' 		=> $user_role,

				'user_divisi' 		=> $user_divisi,

				'user_lembaga' 		=> $user_lembaga,

				'user_password' 	=> password_hash($user_password, PASSWORD_DEFAULT),

				'user_email' 		=> $user_email,

				'user_status' 		=> $user_status,

				'user_created_at' 	=> date("Y-m-d H:i:s")

			);



			$this->m_karyawan->f002_insertUsert($data);



			$this->session->set_flashdata('alert', 

			'<div class="alert alert-success alert-dismissible" role="alert">

	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

	            Karyawan berhasil disimpan.

	        </div>');

		}



		redirect(site_url('karyawan'));

	}



	public function show($user_id)

	{

		$data['title_page'] = "DETAIL KARYAWAN";



		$data['qUserBy'] = $this->m_karyawan->f005_getUserBy($user_id)->result();



		$data['alert'] 		= $this->session->flashdata('alert');



		$alamat_luar_bandung = $this->m_profile->f013_alamatLuarBandung($user_id)->result();

		if (empty($alamat_luar_bandung)) 

		{

			$data['q_lbdg_3'] 		= '&nbsp;';

			$data['q_lbdg_2'] 		= '&nbsp;';

			$data['q_lbdg_1'] 		= '&nbsp;';



			$data['q_lbdg_kode_pos'] = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

			$data['q_lbdg_no'] 	= '';

		}

		else

		{

			$q_lbdg_prov 		= $this->m_profile->f013_alamatLuarBandung($user_id)->row()->prov_name;

			$q_lbdg_kokab 		= $this->m_profile->f013_alamatLuarBandung($user_id)->row()->kokab_name;

			$data['q_lbdg_3']	= ucwords(strtolower($q_lbdg_kokab)).' Provinsi '.ucwords(strtolower($q_lbdg_prov));



			$q_lbdg_kec 		= $this->m_profile->f013_alamatLuarBandung($user_id)->row()->kec_name;

			$q_lbdg_desa 		= $this->m_profile->f013_alamatLuarBandung($user_id)->row()->desa_name;

			$data['q_lbdg_2']	= 'Desa '.ucwords(strtolower($q_lbdg_desa)).' Kecamatan '.ucwords(strtolower($q_lbdg_kec));



			$q_lbdg_alamat 		= $this->m_profile->f013_alamatLuarBandung($user_id)->row()->alamat_luar_alamat;

			$q_lbdg_rt 			= $this->m_profile->f013_alamatLuarBandung($user_id)->row()->alamat_luar_rt;

			$q_lbdg_rw 			= $this->m_profile->f013_alamatLuarBandung($user_id)->row()->alamat_luar_rw;

			$data['q_lbdg_1']	= ucwords(strtolower($q_lbdg_alamat)).' RT '.$q_lbdg_rt.' / RW '.$q_lbdg_rw;



			$data['q_lbdg_kode_pos']	= $this->m_profile->f013_alamatLuarBandung($user_id)->row()->alamat_luar_kode_pos;



			$q_lbdg_tlp 		= $this->m_profile->f013_alamatLuarBandung($user_id)->row()->alamat_luar_telp;

			$q_lbdg_hp 			= $this->m_profile->f013_alamatLuarBandung($user_id)->row()->alamat_luar_hp;



			if (empty($q_lbdg_tlp) && empty($q_lbdg_hp)) 

			{

				$data['q_lbdg_no'] 	= '';

			}

			elseif (empty($q_lbdg_tlp)) 

			{

				$data['q_lbdg_no'] 	= $q_lbdg_tlp;

			}

			elseif (empty($q_lbdg_tlp)) 

			{

				$data['q_lbdg_no'] 	= $q_lbdg_hp;

			}

			else

			{

				$data['q_lbdg_no'] 	= $q_lbdg_tlp.' & '.$q_lbdg_hp;

			}

		}



		$alamat_di_bandung = $this->m_profile->f014_alamatDiBandung($user_id)->result();

		if (empty($alamat_di_bandung)) 

		{

			$data['q_dbdg_3'] 		= '&nbsp;';

			$data['q_dbdg_2'] 		= '&nbsp;';

			$data['q_dbdg_1'] 		= '&nbsp;';



			$data['q_dbdg_kode_pos'] = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

			$data['q_dbdg_no'] 	= '';

		}

		else

		{

			$q_dbdg_prov 		= $this->m_profile->f014_alamatDiBandung($user_id)->row()->prov_name;

			$q_dbdg_kokab 		= $this->m_profile->f014_alamatDiBandung($user_id)->row()->kokab_name;

			$data['q_dbdg_3']	= ucwords(strtolower($q_dbdg_kokab)).' Provinsi '.ucwords(strtolower($q_dbdg_prov));



			$q_dbdg_kec 		= $this->m_profile->f014_alamatDiBandung($user_id)->row()->kec_name;

			$q_dbdg_desa 		= $this->m_profile->f014_alamatDiBandung($user_id)->row()->desa_name;

			$data['q_dbdg_2']	= 'Desa '.ucwords(strtolower($q_dbdg_desa)).' Kecamatan '.ucwords(strtolower($q_dbdg_kec));



			$q_dbdg_alamat 		= $this->m_profile->f014_alamatDiBandung($user_id)->row()->alamat_di_alamat;

			$q_dbdg_rt 			= $this->m_profile->f014_alamatDiBandung($user_id)->row()->alamat_di_rt;

			$q_dbdg_rw 			= $this->m_profile->f014_alamatDiBandung($user_id)->row()->alamat_di_rw;

			$data['q_dbdg_1']	= ucwords(strtolower($q_dbdg_alamat)).' RT '.$q_dbdg_rt.' / RW '.$q_dbdg_rw;



			$data['q_dbdg_kode_pos']	= $this->m_profile->f014_alamatDiBandung($user_id)->row()->alamat_di_kode_pos;



			$q_dbdg_tlp 		= $this->m_profile->f014_alamatDiBandung($user_id)->row()->alamat_di_telp;

			$q_dbdg_hp 			= $this->m_profile->f014_alamatDiBandung($user_id)->row()->alamat_di_hp;



			if (empty($q_dbdg_tlp) && empty($q_dbdg_hp)) 

			{

				$data['q_dbdg_no'] 	= '';

			}

			elseif (empty($q_dbdg_tlp)) 

			{

				$data['q_dbdg_no'] 	= $q_dbdg_tlp;

			}

			elseif (empty($q_dbdg_tlp)) 

			{

				$data['q_dbdg_no'] 	= $q_dbdg_hp;

			}

			else

			{

				$data['q_dbdg_no'] 	= $q_dbdg_tlp.' & '.$q_dbdg_hp;

			}

			

		}



		$data['qPendidikanFormal'] = $this->m_profile->f003_getPendidikanFormal($user_id)->result();



		$data['qKaryaIlmiah'] = $this->m_profile->f004_getKaryaIlmiah($user_id)->result();



		$data['qPendidikanNonFormal'] = $this->m_profile->f005_getPendidikanNonFormal($user_id)->result();



		$data['qBahasaAsing'] = $this->m_profile->f006_getBahasaAsing($user_id)->result();



		// Status Pernikahan

		$status_pernikahan = $this->m_keluarga->f001_getStatusPernikahan($user_id)->result();

		$status_pernikahan_date = $this->m_keluarga->f001_getStatusPernikahan($user_id)->result();



		if (empty($status_pernikahan)) 

		{

			$data['qSP'] = '';

			$data['qSPstatus'] = '';

		}

		else

		{

			foreach ($status_pernikahan as $rws) 

			{

				if ($rws->nikah_status == 'single') 

				{

					$data['qSP'] = 'Single';

					$data['qSPstatus'] = '';

				}

				elseif ($rws->nikah_status == 'nikah') 

				{

					$data['qSP'] = 'Menikah sejak tanggal :';

				 	$data['qSPstatus'] = tgl_in($rws->nikah_date);

				}

				elseif ($rws->nikah_status == 'cerai') 

				{

				 	$data['qSP'] = 'Bercerai sejak tanggal : ';

				 	$data['qSPstatus'] = tgl_in($rws->nikah_date);

				}

				else

				{

					$data['qSP'] = '';

					$data['qSPstatus'] = ''; 

				}

			}

		}



		// Susunan Keluarga (suami/istri dan anak)

		$data['k_satu_suami'] = $this->m_keluarga->f002_getKeluargaSatuSuami($user_id);

		$data['k_satu_istri'] = $this->m_keluarga->f003_getKeluargaSatuIstri($user_id);

		$data['k_satu_anak']  = $this->m_keluarga->f004_getKeluargaSatuAnak($user_id)->result();



		// Susunan Keluarga (ayah, ibu, saudara sekandung, termasuk anda)

		$data['k_dua_ayah']  = $this->m_keluarga->f005_getKeluargaDuaAyah($user_id)->result();

		$data['k_dua_ibu'] 	 = $this->m_keluarga->f006_getKeluargaDuaIbu($user_id)->result();

		$data['k_dua_anak']  = $this->m_keluarga->f007_getKeluargaDuaAnak($user_id)->result();



		// Ahli Waris 

		$data['ahli_waris']  = $this->m_keluarga->f008_getAhliWaris($user_id)->result();



		$data['qPengalamanKerja'] = $this->m_profile->f007_getPEngalamanKerja($user_id)->result();



		$data['qPengalamanOrganisasi'] = $this->m_profile->f008_getPengalamanOrganisasi($user_id)->result();



		$data['qHK'] = $this->m_profile->f009_getHobbyKegemaran($user_id)->result();



		//





		$data['qRole'] 		= $this->m_karyawan->f003_getRole()->result();

		

		$data['qLembaga'] 	= $this->m_karyawan->f004_getLembaga()->result();



		$this->template->show('karyawan/v_karyawan_detail', $data);

	}



	public function edit($user_id)
	{
		$data['title_page'] = "EDIT KARYAWAN";

		$data['qUserBy'] = $this->m_karyawan->f005_getUserBy($user_id)->result();

		$data['qRole'] 		= $this->m_karyawan->f003_getRole()->result();

		$data['qDivisi'] 		= $this->m_karyawan->f003_getDivisi()->result();

		$data['qLembaga'] 	= $this->m_karyawan->f004_getLembaga()->result();

		$data['alert'] 		= $this->session->flashdata('alert');	

		$this->template->show('karyawan/v_karyawan_edit', $data);
	}

	public function update()
	{
		$user_id 		= $this->input->post('user_id');

		$user_nik 		= $this->input->post('user_nik');
		$user_name 		= $this->input->post('user_name');
		$tgl_lhr 			= $this->input->post('user_tgl_lhr');
			$broken 		= explode(' ', $tgl_lhr);
			$month			= month_number($broken[1]);
			$user_tgl_lhr	= $broken[2].'-'.$month.'-'.$broken[0];
		$user_gender 	= $this->input->post('user_gender');
		$user_divisi 	= $this->input->post('user_divisi');
		$user_jabatan 	= $this->input->post('user_jabatan');
		$user_lembaga 	= $this->input->post('user_lembaga');
		$user_role 		= $this->input->post('user_role');
		$user_email 	= $this->input->post('user_email');
		$user_password 	= $this->input->post('user_password');

		if (empty($user_password)) 
		{
			$data = array(
				'user_nik' 			=> $user_nik,
				'user_name' 		=> $user_name,
				'user_tgl_lhr' 		=> $user_tgl_lhr,
				'user_gender' 		=> $user_gender,
				'user_divisi' 		=> $user_divisi,
				'user_jabatan' 		=> $user_jabatan,
				'user_lembaga' 		=> $user_lembaga,
				'user_role' 		=> $user_role,
				'user_email' 		=> $user_email
			);
		}
		else
		{
			$data = array(
				'user_nik' 			=> $user_nik,
				'user_name' 		=> $user_name,
				'user_tgl_lhr' 		=> $user_tgl_lhr,
				'user_gender' 		=> $user_gender,
				'user_divisi' 		=> $user_divisi,
				'user_jabatan' 		=> $user_jabatan,
				'user_lembaga' 		=> $user_lembaga,
				'user_role' 		=> $user_role,
				'user_email' 		=> $user_email,
				'user_password' 	=> password_hash($user_password, PASSWORD_DEFAULT)
			);
		}

		$this->m_karyawan->f006_updateUSer($user_id, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Karyawan berhasil diperbaharui.
        </div>');

        redirect(site_url('karyawan/show/'.$user_id));
	}



	public function print_out($user_id)

	{

		$data['title_page'] = "Biodata Karyawan";



		$data['qUserBy'] = $this->m_karyawan->f005_getUserBy($user_id)->result();



		$alamat_luar_bandung = $this->m_profile->f013_alamatLuarBandung($user_id)->result();

		if (empty($alamat_luar_bandung)) 

		{

			$data['q_lbdg_3'] 		= '&nbsp;';

			$data['q_lbdg_2'] 		= '&nbsp;';

			$data['q_lbdg_1'] 		= '&nbsp;';



			$data['q_lbdg_kode_pos'] = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

			$data['q_lbdg_no'] 	= '';

		}

		else

		{

			$q_lbdg_prov 		= $this->m_profile->f013_alamatLuarBandung($user_id)->row()->prov_name;

			$q_lbdg_kokab 		= $this->m_profile->f013_alamatLuarBandung($user_id)->row()->kokab_name;

			$data['q_lbdg_3']	= ucwords(strtolower($q_lbdg_kokab)).' Provinsi '.ucwords(strtolower($q_lbdg_prov));



			$q_lbdg_kec 		= $this->m_profile->f013_alamatLuarBandung($user_id)->row()->kec_name;

			$q_lbdg_desa 		= $this->m_profile->f013_alamatLuarBandung($user_id)->row()->desa_name;

			$data['q_lbdg_2']	= 'Desa '.ucwords(strtolower($q_lbdg_desa)).' Kecamatan '.ucwords(strtolower($q_lbdg_kec));



			$q_lbdg_alamat 		= $this->m_profile->f013_alamatLuarBandung($user_id)->row()->alamat_luar_alamat;

			$q_lbdg_rt 			= $this->m_profile->f013_alamatLuarBandung($user_id)->row()->alamat_luar_rt;

			$q_lbdg_rw 			= $this->m_profile->f013_alamatLuarBandung($user_id)->row()->alamat_luar_rw;

			$data['q_lbdg_1']	= ucwords(strtolower($q_lbdg_alamat)).' RT '.$q_lbdg_rt.' / RW '.$q_lbdg_rw;



			$data['q_lbdg_kode_pos']	= $this->m_profile->f013_alamatLuarBandung($user_id)->row()->alamat_luar_kode_pos;



			$q_lbdg_tlp 		= $this->m_profile->f013_alamatLuarBandung($user_id)->row()->alamat_luar_telp;

			$q_lbdg_hp 			= $this->m_profile->f013_alamatLuarBandung($user_id)->row()->alamat_luar_hp;



			if (empty($q_lbdg_tlp) && empty($q_lbdg_hp)) 

			{

				$data['q_lbdg_no'] 	= '';

			}

			elseif (empty($q_lbdg_tlp)) 

			{

				$data['q_lbdg_no'] 	= $q_lbdg_tlp;

			}

			elseif (empty($q_lbdg_tlp)) 

			{

				$data['q_lbdg_no'] 	= $q_lbdg_hp;

			}

			else

			{

				$data['q_lbdg_no'] 	= $q_lbdg_tlp.' & '.$q_lbdg_hp;

			}

		}



		$alamat_di_bandung = $this->m_profile->f014_alamatDiBandung($user_id)->result();

		if (empty($alamat_di_bandung)) 

		{

			$data['q_dbdg_3'] 		= '&nbsp;';

			$data['q_dbdg_2'] 		= '&nbsp;';

			$data['q_dbdg_1'] 		= '&nbsp;';



			$data['q_dbdg_kode_pos'] = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

			$data['q_dbdg_no'] 	= '';

		}

		else

		{

			$q_dbdg_prov 		= $this->m_profile->f014_alamatDiBandung($user_id)->row()->prov_name;

			$q_dbdg_kokab 		= $this->m_profile->f014_alamatDiBandung($user_id)->row()->kokab_name;

			$data['q_dbdg_3']	= ucwords(strtolower($q_dbdg_kokab)).' Provinsi '.ucwords(strtolower($q_dbdg_prov));



			$q_dbdg_kec 		= $this->m_profile->f014_alamatDiBandung($user_id)->row()->kec_name;

			$q_dbdg_desa 		= $this->m_profile->f014_alamatDiBandung($user_id)->row()->desa_name;

			$data['q_dbdg_2']	= 'Desa '.ucwords(strtolower($q_dbdg_desa)).' Kecamatan '.ucwords(strtolower($q_dbdg_kec));



			$q_dbdg_alamat 		= $this->m_profile->f014_alamatDiBandung($user_id)->row()->alamat_di_alamat;

			$q_dbdg_rt 			= $this->m_profile->f014_alamatDiBandung($user_id)->row()->alamat_di_rt;

			$q_dbdg_rw 			= $this->m_profile->f014_alamatDiBandung($user_id)->row()->alamat_di_rw;

			$data['q_dbdg_1']	= ucwords(strtolower($q_dbdg_alamat)).' RT '.$q_dbdg_rt.' / RW '.$q_dbdg_rw;



			$data['q_dbdg_kode_pos']	= $this->m_profile->f014_alamatDiBandung($user_id)->row()->alamat_di_kode_pos;



			$q_dbdg_tlp 		= $this->m_profile->f014_alamatDiBandung($user_id)->row()->alamat_di_telp;

			$q_dbdg_hp 			= $this->m_profile->f014_alamatDiBandung($user_id)->row()->alamat_di_hp;



			if (empty($q_dbdg_tlp) && empty($q_dbdg_hp)) 

			{

				$data['q_dbdg_no'] 	= '';

			}

			elseif (empty($q_dbdg_tlp)) 

			{

				$data['q_dbdg_no'] 	= $q_dbdg_tlp;

			}

			elseif (empty($q_dbdg_tlp)) 

			{

				$data['q_dbdg_no'] 	= $q_dbdg_hp;

			}

			else

			{

				$data['q_dbdg_no'] 	= $q_dbdg_tlp.' & '.$q_dbdg_hp;

			}

			

		}



		$data['qPendidikanFormal'] = $this->m_profile->f003_getPendidikanFormal($user_id)->result();



		$data['qKaryaIlmiah'] = $this->m_profile->f004_getKaryaIlmiah($user_id)->result();



		$data['qPendidikanNonFormal'] = $this->m_profile->f005_getPendidikanNonFormal($user_id)->result();



		$data['qBahasaAsing'] = $this->m_profile->f006_getBahasaAsing($user_id)->result();



		// Status Pernikahan

		$status_pernikahan = $this->m_keluarga->f001_getStatusPernikahan($user_id)->result();

		$status_pernikahan_date = $this->m_keluarga->f001_getStatusPernikahan($user_id)->result();



		if (empty($status_pernikahan)) 

		{

			$data['qSP1'] = '&nbsp;&nbsp;&nbsp;';

			$data['qSP2'] = '&nbsp;&nbsp;&nbsp;';

			$data['qSP3'] = '&nbsp;&nbsp;&nbsp;';



			$data['qSP2status'] = '&nbsp;&nbsp;&nbsp;';

			$data['qSP3status'] = '&nbsp;&nbsp;&nbsp;'; 

		}

		else

		{

			foreach ($status_pernikahan as $rws) 

			{

				if ($rws->nikah_status == 'single') 

				{

					$data['qSP1'] = 'v';

					$data['qSP2'] = '&nbsp;&nbsp;&nbsp;';

					$data['qSP3'] = '&nbsp;&nbsp;&nbsp;';



					$data['qSP2status'] = '&nbsp;&nbsp;&nbsp;';

					$data['qSP3status'] = '&nbsp;&nbsp;&nbsp;'; 

				}

				elseif ($rws->nikah_status == 'nikah') 

				{

					$data['qSP1'] = '&nbsp;&nbsp;&nbsp;';

					$data['qSP2'] = 'v';

				 	$data['qSP3'] = '&nbsp;&nbsp;&nbsp;';



				 	$data['qSP2status'] = tgl_in($rws->nikah_date);

				 	$data['qSP3status'] = '&nbsp;&nbsp;&nbsp;';

				}

				elseif ($rws->nikah_status == 'cerai') 

				{

					$data['qSP1'] = '&nbsp;&nbsp;&nbsp;';

					$data['qSP2'] = '&nbsp;&nbsp;&nbsp;';

				 	$data['qSP3'] = 'v';



				 	$data['qSP2status'] = '&nbsp;&nbsp;&nbsp;';

				 	$data['qSP3status'] = tgl_in($rws->nikah_date);

				}

				else

				{

					$data['qSP1'] = '&nbsp;&nbsp;&nbsp;';

					$data['qSP2'] = '&nbsp;&nbsp;&nbsp;';

					$data['qSP3'] = '&nbsp;&nbsp;&nbsp;';



					$data['qSP2status'] = '&nbsp;&nbsp;&nbsp;';

					$data['qSP3status'] = '&nbsp;&nbsp;&nbsp;';  

				}

			}

		}



		// Susunan Keluarga (suami/istri dan anak)

		$data['k_satu_suami'] = $this->m_keluarga->f002_getKeluargaSatuSuami($user_id);

		$data['k_satu_istri'] = $this->m_keluarga->f003_getKeluargaSatuIstri($user_id);

		$data['k_satu_anak']  = $this->m_keluarga->f004_getKeluargaSatuAnak($user_id)->result();



		// Susunan Keluarga (ayah, ibu, saudara sekandung, termasuk anda)

		$data['k_dua_ayah']  = $this->m_keluarga->f005_getKeluargaDuaAyah($user_id)->result();

		$data['k_dua_ibu'] 	 = $this->m_keluarga->f006_getKeluargaDuaIbu($user_id)->result();

		$data['k_dua_anak']  = $this->m_keluarga->f007_getKeluargaDuaAnak($user_id)->result();



		// Ahli Waris 

		$data['ahli_waris']  = $this->m_keluarga->f008_getAhliWaris($user_id)->result();



		$data['qPengalamanKerja'] = $this->m_profile->f007_getPEngalamanKerja($user_id)->result();



		$data['qPengalamanOrganisasi'] = $this->m_profile->f008_getPengalamanOrganisasi($user_id)->result();



		$data['qHK'] = $this->m_profile->f009_getHobbyKegemaran($user_id)->result();





		$this->pdf->load_view('karyawan/v_karyawan_print', $data);

        $this->pdf->set_paper("A4", "portrait"); //landscape or portrait

        $this->pdf->render();



        $this->pdf->stream("biodata_karyawan.pdf", array('Attachment' => false));

	}



	public function nonaktifkan($user_id)

	{

		$data = array(

			'user_status' 		=> 0

		);



		$this->m_karyawan->f006_updateUSer($user_id, $data);



		$this->session->set_flashdata('alert', 

		'<div class="alert alert-success alert-dismissible" role="alert">

            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            Karyawan berhasil dinonaktifkan.

        </div>');



        redirect(site_url('karyawan/show/'.$user_id));

	}



	public function aktifkan($user_id)

	{

		$data = array(

			'user_status' 		=> 1

		);



		$this->m_karyawan->f006_updateUSer($user_id, $data);



		$this->session->set_flashdata('alert', 

		'<div class="alert alert-success alert-dismissible" role="alert">

            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            Karyawan berhasil dinonaktifkan.

        </div>');



        redirect(site_url('karyawan/show/'.$user_id));

	}



}



/* End of file Karyawan.php */

/* Location: ./application/controllers/Karyawan.php */