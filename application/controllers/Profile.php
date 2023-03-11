<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct() 
	{
		parent:: __construct();

		$this->load->model('m_profile');
		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');
		$this->load->model('m_user');

	}

	public function index()
	{
		$data['title_page'] = "IDENTITAS";

		$data['datajabatan'] 		= $this->m_user->getjabatan();


		$data['datakategori'] 		= $this->m_profile->getdata();

		$data['q_profile'] = $this->m_profile->f001_getProfileBy($this->template->user_id())->result();

		$data['qProvinsi'] = $this->m_profile->f009_getProvinsi()->result();

		$alamat_luar_bandung = $this->m_profile->f013_alamatLuarBandung($this->template->user_id())->result();
		if (empty($alamat_luar_bandung)) 
		{
			$data['v_alamat_luar'] = '';

			$data['q_lbdg_id'] = '';

			$data['q_lbdg_prov'] = '';

			$data['collapse'] 		= 'collapse';

			$data['select_kokab'] 		= '';
			$data['q_lbdg_kokab'] 		= '';

			$data['select_kec'] 		= '';
			$data['q_lbdg_kec'] 		= '';

			$data['select_desa'] 		= '';
			$data['q_lbdg_desa'] 		= '';

			$data['q_lbdg_alamat'] 		= '';
			$data['q_lbdg_rt'] 			= '';
			$data['q_lbdg_rw'] 			= '';

			
			$data['q_lbdg_kode_pos'] 	= '';
			$data['q_lbdg_tlp'] 		= '';
			$data['q_lbdg_hp'] 			= '';
		}
		else
		{
			// view
			$data['v_alamat_luar'] 		= $alamat_luar_bandung;

			// edit
			$data['q_lbdg_id'] 			= $this->m_profile->f013_alamatLuarBandung($this->template->user_id())->row()->alamat_luar_id;

			$data['q_lbdg_prov'] 		= $q_luar_bdg_prov = $this->m_profile->f013_alamatLuarBandung($this->template->user_id())->row()->alamat_luar_prov;

			$data['collapse'] 			= '';

			$data['select_kokab'] 		= $this->m_profile->f010_getKokab($q_luar_bdg_prov);
			$data['q_lbdg_kokab'] 		= $q_lbdg_kokab	= $this->m_profile->f013_alamatLuarBandung($this->template->user_id())->row()->alamat_luar_kokab;

			$data['select_kec'] 		= $this->m_profile->f011_getKec($q_lbdg_kokab);
			$data['q_lbdg_kec'] 		= $q_lbdg_kec = $this->m_profile->f013_alamatLuarBandung($this->template->user_id())->row()->alamat_luar_kec;

			$data['select_desa'] 		= $this->m_profile->f012_getDesa($q_lbdg_kec);
			$data['q_lbdg_desa'] 		= $this->m_profile->f013_alamatLuarBandung($this->template->user_id())->row()->alamat_luar_desa;

			$data['q_lbdg_alamat'] 		= $this->m_profile->f013_alamatLuarBandung($this->template->user_id())->row()->alamat_luar_alamat;
			$data['q_lbdg_rt'] 			= $this->m_profile->f013_alamatLuarBandung($this->template->user_id())->row()->alamat_luar_rt;
			$data['q_lbdg_rw'] 			= $this->m_profile->f013_alamatLuarBandung($this->template->user_id())->row()->alamat_luar_rw;

			$data['q_lbdg_kode_pos']	= $this->m_profile->f013_alamatLuarBandung($this->template->user_id())->row()->alamat_luar_kode_pos;
			$data['q_lbdg_tlp'] 		= $this->m_profile->f013_alamatLuarBandung($this->template->user_id())->row()->alamat_luar_telp;
			$data['q_lbdg_hp'] 			= $this->m_profile->f013_alamatLuarBandung($this->template->user_id())->row()->alamat_luar_hp;	
		}



		$alamat_di_bandung = $this->m_profile->f014_alamatDiBandung($this->template->user_id())->result();
		if (empty($alamat_di_bandung)) 
		{
			$data['v_alamat_di'] = '';

			$data['q_dbdg_id'] = '';

			$data['q_dbdg_prov'] = '';

			$data['collapse_di'] 		= 'collapse';

			$data['select_kokab'] 		= '';
			$data['q_dbdg_kokab'] 		= '';

			$data['select_kec'] 		= '';
			$data['q_dbdg_kec'] 		= '';

			$data['select_desa'] 		= '';
			$data['q_dbdg_desa'] 		= '';

			$data['q_dbdg_alamat'] 		= '';
			$data['q_dbdg_rt'] 			= '';
			$data['q_dbdg_rw'] 			= '';

			
			$data['q_dbdg_kode_pos'] 	= '';
			$data['q_dbdg_tlp'] 		= '';
			$data['q_dbdg_hp'] 			= '';
		}
		else
		{
			// view
			$data['v_alamat_di'] 		= $alamat_di_bandung;

			// edit
			$data['q_dbdg_id'] 			= $this->m_profile->f014_alamatDiBandung($this->template->user_id())->row()->alamat_di_id;

			$data['q_dbdg_prov'] 		= $q_di_bdg_prov = $this->m_profile->f014_alamatDiBandung($this->template->user_id())->row()->alamat_di_prov;

			$data['collapse_di'] 			= '';

			$data['select_kokab_di'] 		= $this->m_profile->f010_getKokab($q_di_bdg_prov);
			$data['q_dbdg_kokab'] 		= $q_dbdg_kokab	= $this->m_profile->f014_alamatDiBandung($this->template->user_id())->row()->alamat_di_kokab;

			$data['select_kec_di'] 		= $this->m_profile->f011_getKec($q_dbdg_kokab);
			$data['q_dbdg_kec'] 		= $q_dbdg_kec = $this->m_profile->f014_alamatDiBandung($this->template->user_id())->row()->alamat_di_kec;

			$data['select_desa_di'] 		= $this->m_profile->f012_getDesa($q_dbdg_kec);
			$data['q_dbdg_desa'] 		= $this->m_profile->f014_alamatDiBandung($this->template->user_id())->row()->alamat_di_desa;

			$data['q_dbdg_alamat'] 		= $this->m_profile->f014_alamatDiBandung($this->template->user_id())->row()->alamat_di_alamat;
			$data['q_dbdg_rt'] 			= $this->m_profile->f014_alamatDiBandung($this->template->user_id())->row()->alamat_di_rt;
			$data['q_dbdg_rw'] 			= $this->m_profile->f014_alamatDiBandung($this->template->user_id())->row()->alamat_di_rw;

			$data['q_dbdg_kode_pos']	= $this->m_profile->f014_alamatDiBandung($this->template->user_id())->row()->alamat_di_kode_pos;
			$data['q_dbdg_tlp'] 		= $this->m_profile->f014_alamatDiBandung($this->template->user_id())->row()->alamat_di_telp;
			$data['q_dbdg_hp'] 			= $this->m_profile->f014_alamatDiBandung($this->template->user_id())->row()->alamat_di_hp;	
		}

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('profile/v_profile', $data);
	}

	public function update()
	{
		$user_id 			= $this->input->post('user_id');
		$user_name 			= $this->input->post('user_name');
		$user_tmpt_lhr 		= $this->input->post('user_tmpt_lhr');
		$tgl_lhr 			= $this->input->post('user_tgl_lhr');
			$broken 		= explode(' ', $tgl_lhr);
			$month			= month_number($broken[1]);
			$user_tgl_lhr	= $broken[2].'-'.$month.'-'.$broken[0];
		$user_ktp_sim 		= $this->input->post('user_ktp_sim');
		$user_npwp 			= $this->input->post('user_npwp');

		$user_gender 		= $this->input->post('user_gender');
		$user_gol_dar 		= $this->input->post('user_gol_dar');
		$user_warga 		= $this->input->post('user_warga');
		$user_agama 		= $this->input->post('user_agama');
		$user_jamsostek 	= $this->input->post('user_jamsostek');
		$user_email 		= $this->input->post('user_email');
		
		$user_alamat 		= $this->input->post('user_alamat');
		$user_kode_pos 		= $this->input->post('user_kode_pos');
		$user_hp 			= $this->input->post('user_hp');

		// $user_alamat_luar_bandung 	= $this->input->post('user_alamat_luar_bandung');
		// $user_kode_pos_luar_bandung	= $this->input->post('user_kode_pos_luar_bandung');
		// $user_hp_luar_bandung 		= $this->input->post('user_hp_luar_bandung');

		$data = array(
			'user_name' 	=> $user_name,
			'user_tmpt_lhr' => $user_tmpt_lhr,
			'user_tgl_lhr'	=> $user_tgl_lhr,
			'user_ktp_sim'	=> $user_ktp_sim,
			'user_npwp'		=> $user_npwp,

			'user_gender' 	=> $user_gender,
			'user_gol_dar' 	=> $user_gol_dar,
			'user_warga'		=> $user_warga,
			'user_agama'		=> $user_agama,
			'user_jamsostek'	=> $user_jamsostek,
			'user_email'		=> $user_email,

			// 'user_alamat' 		=> $user_alamat,
			// 'user_kode_pos' 	=> $user_kode_pos,
			// 'user_hp' 			=> $user_hp,

			// 'user_alamat_luar_bandung' 		=> $user_alamat_luar_bandung,
			// 'user_kode_pos_luar_bandung' 	=> $user_kode_pos_luar_bandung,
			// 'user_hp_luar_bandung' 			=> $user_hp_luar_bandung,

			'user_updated_at' => date('Y-m-d H:i:s')
		);

		// echo "<pre>";
		// print_r($data);	
		// echo "</pre>";	

		// die;

		$this->m_profile->f002_updateProfile($user_id, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Profile berhasil di perbaharui.
        </div>');

		redirect(site_url('profile'));
	}

	public function update_username()
	{
		$user_id 				= $this->input->post('user_id');

		$user_username 			= $this->input->post('user_username');

		$user_password_db 		= $this->input->post('user_password_db');
		$user_password_input 	= $this->input->post('user_password_input');

		if (password_verify($user_password_input, $user_password_db)) 
		{
			$data = array(
				'user_username' 	=> $user_username,
				'user_updated_at' 	=> date('Y-m-d H:i:s')
			);

			$this->m_profile->f002_updateProfile($user_id, $data);

			$this->session->set_flashdata('alert', 
			'<div class="alert alert-success alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            Username berhasil di perbaharui.
	        </div>');
		}
		else
		{
			$this->session->set_flashdata('alert', 
			'<div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Password yang anda masukan salah.
            </div>');
		}

		redirect(site_url('profile'));
	}

	public function update_password()
	{
		$user_id 				= $this->input->post('user_id');

		$user_password_db 		= $this->input->post('user_password_db');
		$user_password_input 	= $this->input->post('user_password_input');

		$user_password_baru 	= $this->input->post('user_password_baru');

		if (password_verify($user_password_input, $user_password_db)) 
		{
			$data = array(
				'user_password' 	=> password_hash($user_password_baru, PASSWORD_DEFAULT),
				'user_updated_at' 	=> date('Y-m-d H:i:s')
			);

			$this->m_profile->f002_updateProfile($user_id, $data);

			$this->session->set_flashdata('alert', 
			'<div class="alert alert-success alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            Password berhasil di perbaharui.
	        </div>');
		}
		else
		{
			$this->session->set_flashdata('alert', 
			'<div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Password lama yang anda masukan salah.
            </div>');
		}

		redirect(site_url('profile'));
	}

	public function update_image()
	{
		$user_id = $this->input->post('user_id');

		$image_db = $this->input->post('image_db');

		if (empty($image_db)) 
		{
			// setting konfigurasi upload
	        $config['upload_path'] 		= './assets/images/users/';
	        $config['allowed_types'] 	= 'gif|jpg|png';
	    	$config['max_size']  		= '10240000'; 
	        $config['file_name'] 		= $user_id.'_'.time();

	        // load library upload
	        $this->load->library('upload', $config);
	        if (!$this->upload->do_upload('file_image')) 
	        {
	            $this->session->set_flashdata('alert', 
					'<div class="alert alert-warning alert-dismissible">
			        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			        	<i class="icon fa fa-warning"></i> Image yang anda uploadkan gagal.
			      	</div>');
	        } 
	        else 
	        {
	   			$result = $this->upload->data();   			

	            $user_image = $result['file_name'];

	            $data = array(
	            	'user_photo' 		=> $user_image,
			        'user_updated_at' 	=> date("Y-m-d H:i:s")
	            );

	            $this->m_profile->f002_updateProfile($user_id, $data);

				$this->session->set_flashdata('alert', 
				'<div class="alert alert-success alert-dismissible">
	            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            	<i class="icon fa fa-check"></i> Image berhasil diperbaharui.
	          	</div>');
	        }
		}
		else
		{
			// setting konfigurasi upload
			$path 						= './assets/images/users/';
	        $config['upload_path'] 		= $path;
	        $config['allowed_types'] 	= 'gif|jpg|png';
	    	$config['max_size']  		= '10240000';
	        // $config['overwrite'] 		= false; 
	        $config['file_name'] 		= $user_id.'_'.time(); 

	        // load library upload
	        $this->load->library('upload', $config);
	        if (!$this->upload->do_upload('file_image')) 
	        {
	            $this->session->set_flashdata('alert', 
					'<div class="alert alert-warning alert-dismissible">
			        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			        	<i class="icon fa fa-warning"></i> Image yang anda uploadkan gagal.
			      	</div>');
	        } 
	        else 
	        {
	   			$result = $this->upload->data();   			

	            $user_image = $result['file_name'];

	            @unlink($path.$image_db);

	            $data = array(
	            	'user_photo' 		=> $user_image,
			        'user_updated_at' 	=> date("Y-m-d H:i:s")
	            );

	            $this->m_profile->f002_updateProfile($user_id, $data);

				$this->session->set_flashdata('alert', 
				'<div class="alert alert-success alert-dismissible">
	            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	            	<i class="icon fa fa-check"></i> Image berhasil diperbaharui.
	          	</div>');
	        }
		}

        redirect(site_url('profile'));
	}

	public function get_kokab()
    {
        $provinsi_id = $this->input->post('provinsi_id');
        $nama_kokab = $this->m_profile->f010_getKokab($provinsi_id);

        if (count($nama_kokab)>0) 
        {
            $nama_select_box = ''; 
            $nama_select_box .= '<option value="" selected>Silahkan Pilih</option>';
            foreach ($nama_kokab as $nama) 
            {
                $nama_select_box .='<option value='.$nama->kokab_id.'>'.ucwords(strtolower($nama->kokab_name)).'</option>';
            }
            $nama_select_box .= '';

            echo json_encode($nama_select_box);
        }
    }

    public function get_kec()
    {
        $kokab_id = $this->input->post('kokab_id');
        $nama_kec = $this->m_profile->f011_getKec($kokab_id);

        if (count($nama_kec)>0) 
        {
            $nama_select_box = ''; 
            $nama_select_box .= '<option value="" selected>Silahkan Pilih</option>';
            foreach ($nama_kec as $nama) 
            {
                $nama_select_box .='<option value='.$nama->kec_id.'>'.ucwords(strtolower($nama->kec_name)).'</option>';
            }
            $nama_select_box .= '';

            echo json_encode($nama_select_box);
        }
    }

    public function get_desa()
    {
        $kec_id = $this->input->post('kec_id');
        $nama_desa = $this->m_profile->f012_getDesa($kec_id);

        if (count($nama_desa)>0) 
        {
            $nama_select_box = ''; 
            $nama_select_box .= '<option value="" selected>Silahkan Pilih</option>';
            foreach ($nama_desa as $nama) 
            {
                $nama_select_box .='<option value='.$nama->desa_id.'>'.ucwords(strtolower($nama->desa_name)).'</option>';
            }
            $nama_select_box .= '';

            echo json_encode($nama_select_box);
        }
    }

    public function alamat_luar()
    {
    	$alamat_luar_id 		= $this->input->post('alamat_luar_id');
    	$alamat_luar_user 		= $this->template->user_id();

    	$alamat_luar_prov 		= $this->input->post('alamat_luar_prov');
    	$alamat_luar_kokab 		= $this->input->post('alamat_luar_kokab');
    	$alamat_luar_kec 		= $this->input->post('alamat_luar_kec');
    	$alamat_luar_desa 		= $this->input->post('alamat_luar_desa');
    	$alamat_luar_alamat 	= $this->input->post('alamat_luar_alamat');
    	$alamat_luar_rt 		= $this->input->post('alamat_luar_rt');
    	$alamat_luar_rw 		= $this->input->post('alamat_luar_rw');
    	$alamat_luar_kode_pos 	= $this->input->post('alamat_luar_kode_pos');
    	$alamat_luar_telp 		= $this->input->post('alamat_luar_telp');
    	$alamat_luar_hp 		= $this->input->post('alamat_luar_hp');

    	if (empty($alamat_luar_id)) 
    	{
    		$data = array(
    			'alamat_luar_user'		=> $alamat_luar_user,
		    	'alamat_luar_prov'		=> $alamat_luar_prov,
		    	'alamat_luar_kokab'		=> $alamat_luar_kokab,
		    	'alamat_luar_kec'		=> $alamat_luar_kec,
		    	'alamat_luar_desa'		=> $alamat_luar_desa,
		    	'alamat_luar_alamat'	=> $alamat_luar_alamat,
		    	'alamat_luar_rt'		=> $alamat_luar_rt,
		    	'alamat_luar_rw'		=> $alamat_luar_rw,
		    	'alamat_luar_kode_pos'	=> $alamat_luar_kode_pos,
		    	'alamat_luar_telp'		=> $alamat_luar_telp,
		    	'alamat_luar_hp'		=> $alamat_luar_hp
	    	);

	    	$this->m_profile->f013_2_alamatLuarBandungCreate($data);
    	}
    	else
    	{
    		$data = array(
		    	'alamat_luar_prov'		=> $alamat_luar_prov,
		    	'alamat_luar_kokab'		=> $alamat_luar_kokab,
		    	'alamat_luar_kec'		=> $alamat_luar_kec,
		    	'alamat_luar_desa'		=> $alamat_luar_desa,
		    	'alamat_luar_alamat'	=> $alamat_luar_alamat,
		    	'alamat_luar_rt'		=> $alamat_luar_rt,
		    	'alamat_luar_rw'		=> $alamat_luar_rw,
		    	'alamat_luar_kode_pos'	=> $alamat_luar_kode_pos,
		    	'alamat_luar_telp'		=> $alamat_luar_telp,
		    	'alamat_luar_hp'		=> $alamat_luar_hp
	    	);

	    	$this->m_profile->f013_1_alamatLuarBandungUpdate($alamat_luar_id, $alamat_luar_user, $data);
    	}

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Alamat luar bandung berhasil di perbaharui.
        </div>');

        redirect(site_url('profile'));
    }

    public function alamat_di()
    {
    	$alamat_di_id 		= $this->input->post('alamat_di_id');
    	$alamat_di_user 		= $this->template->user_id();

    	$alamat_di_prov 		= $this->input->post('alamat_di_prov');
    	$alamat_di_kokab 		= $this->input->post('alamat_di_kokab');
    	$alamat_di_kec 		= $this->input->post('alamat_di_kec');
    	$alamat_di_desa 		= $this->input->post('alamat_di_desa');
    	$alamat_di_alamat 	= $this->input->post('alamat_di_alamat');
    	$alamat_di_rt 		= $this->input->post('alamat_di_rt');
    	$alamat_di_rw 		= $this->input->post('alamat_di_rw');
    	$alamat_di_kode_pos 	= $this->input->post('alamat_di_kode_pos');
    	$alamat_di_telp 		= $this->input->post('alamat_di_telp');
    	$alamat_di_hp 		= $this->input->post('alamat_di_hp');

    	if (empty($alamat_di_id)) 
    	{
    		$data = array(
    			'alamat_di_user'		=> $alamat_di_user,
		    	'alamat_di_prov'		=> $alamat_di_prov,
		    	'alamat_di_kokab'		=> $alamat_di_kokab,
		    	'alamat_di_kec'		=> $alamat_di_kec,
		    	'alamat_di_desa'		=> $alamat_di_desa,
		    	'alamat_di_alamat'	=> $alamat_di_alamat,
		    	'alamat_di_rt'		=> $alamat_di_rt,
		    	'alamat_di_rw'		=> $alamat_di_rw,
		    	'alamat_di_kode_pos'	=> $alamat_di_kode_pos,
		    	'alamat_di_telp'		=> $alamat_di_telp,
		    	'alamat_di_hp'		=> $alamat_di_hp
	    	);

	    	$this->m_profile->f014_2_alamatDiBandungCreate($data);
    	}
    	else
    	{
    		$data = array(
		    	'alamat_di_prov'		=> $alamat_di_prov,
		    	'alamat_di_kokab'		=> $alamat_di_kokab,
		    	'alamat_di_kec'		=> $alamat_di_kec,
		    	'alamat_di_desa'		=> $alamat_di_desa,
		    	'alamat_di_alamat'	=> $alamat_di_alamat,
		    	'alamat_di_rt'		=> $alamat_di_rt,
		    	'alamat_di_rw'		=> $alamat_di_rw,
		    	'alamat_di_kode_pos'	=> $alamat_di_kode_pos,
		    	'alamat_di_telp'		=> $alamat_di_telp,
		    	'alamat_di_hp'		=> $alamat_di_hp
	    	);

	    	$this->m_profile->f014_1_alamatDiBandungUpdate($alamat_di_id, $alamat_di_user, $data);
    	}

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Alamat di bandung berhasil di perbaharui.
        </div>');

        redirect(site_url('profile'));
    }


}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */