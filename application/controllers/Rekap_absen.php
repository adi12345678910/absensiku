<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_absen extends CI_Controller {

	public function __construct() 
	{
		parent:: __construct();

		$this->load->model('m_rekap_absen');
		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');
	}

	public function index()
	{
		$data['title_page'] = "REKAP ABSEN";

		if ($this->template->role_id() == 1 || $this->template->role_id() == 4)  
		{
			$data['q_rekap_absen'] = $this->m_rekap_absen->f001_getRekapAbsen($this->template->user_id())->result();

			$this->template->show('rekap_absen/v_rekap_absen', $data);
		}
		elseif ($this->template->role_id() == 2 || $this->template->role_id() == 3 || $this->template->role_id() == 5 || $this->template->role_id() == 6)
		
		{			
			$data['q_rekap_absen'] = $this->m_rekap_absen->f00_getRekapAbsen($this->template->user_id())->result();

			$this->template->show('rekap_absen/v_rekap_absen', $data);
		}
		else
		{
			redirect(site_url('rekap_absen'));
		}	
		
	}

	public function show($absen_id)
	{
		$data['title_page'] = "DETAIL ABSEN";

		$data['alert'] 		= $this->session->flashdata('alert');

		$user_login = $this->template->user_id();

		$user_login_lembaga = $this->template->lembaga_id();

		$user_login_role = $this->template->role_id();

		$absen_user = $this->m_rekap_absen->f002_getRekapAbsenBy($absen_id)->row()->absen_user;

		if ($user_login == $absen_user) 
		{
			$data['q_rekap_absen_by'] 	= $this->m_rekap_absen->f002_getRekapAbsenBy($absen_id);

			$status_masuk_id 			= $this->m_rekap_absen->f002_getRekapAbsenBy($absen_id)->row()->absen_masuk_status;
			if (!empty($status_masuk_id)) {
				$data['status_masuk'] 		= $this->m_rekap_absen->f003_getstatus($status_masuk_id)->row()->setting_name;
			}


			$status_pulang_id 			= $this->m_rekap_absen->f002_getRekapAbsenBy($absen_id)->row()->absen_pulang_status;
			if (!empty($status_pulang_id)) {
				$data['status_pulang'] 		= $this->m_rekap_absen->f003_getstatus($status_pulang_id)->row()->setting_name;
			}

			$this->template->show('rekap_absen/v_rekap_absen_detail', $data);
				
		}
		elseif ($user_login_lembaga == 1) 
		{
			if ($user_login_role == 1 || $user_login_role == 4) 
			{
				$data['q_rekap_absen_by'] 	= $this->m_rekap_absen->f002_getRekapAbsenBy($absen_id);

				$status_masuk_id 			= $this->m_rekap_absen->f002_getRekapAbsenBy($absen_id)->row()->absen_masuk_status;
				if (!empty($status_masuk_id)) {
					$data['status_masuk'] 		= $this->m_rekap_absen->f003_getstatus($status_masuk_id)->row()->setting_name;
				}


				$status_pulang_id 			= $this->m_rekap_absen->f002_getRekapAbsenBy($absen_id)->row()->absen_pulang_status;
				if (!empty($status_pulang_id)) {
					$data['status_pulang'] 		= $this->m_rekap_absen->f003_getstatus($status_pulang_id)->row()->setting_name;
				}

				$this->template->show('rekap_absen/v_rekap_absen_detail', $data);
			}
						
		}
		elseif ($user_login_lembaga == 4) 
		{
			if ($user_login_role == 3 OR $user_login_role == 4) 
			{
				$data['q_rekap_absen_by'] 	= $this->m_rekap_absen->f002_getRekapAbsenBy($absen_id);

				$status_masuk_id 			= $this->m_rekap_absen->f002_getRekapAbsenBy($absen_id)->row()->absen_masuk_status;
				$data['status_masuk'] 		= $this->m_rekap_absen->f003_getstatus($status_masuk_id)->row()->setting_name;


				$status_pulang_id 			= $this->m_rekap_absen->f002_getRekapAbsenBy($absen_id)->row()->absen_pulang_status;
				if (!empty($status_pulang_id)) {
					$data['status_pulang'] 		= $this->m_rekap_absen->f003_getstatus($status_pulang_id)->row()->setting_name;
				}

				$this->template->show('rekap_absen/v_rekap_absen_detail', $data);
			}
						
		}

		else
		{
			$this->template->show('rekap_absen/v_rekap_absen_not_found', $data);
		}
	}

	public function update_time()
	{
		$absen_id 		= $this->input->post('absen_id');
		$absen_user 	= $this->input->post('absen_user');

		$jam_masuk 	= strtotime(date('H:i', strtotime($this->m_rekap_absen->f004_jamMasuk()->row()->setting_time)));

		$absen_masuk 	= $this->input->post('absen_masuk');
		$user_masuk 	= strtotime(date('H:i', strtotime($absen_masuk)));
		$point_masuk 	= ($jam_masuk-$user_masuk)/60;

		$jam_pulang  = strtotime(date('H:i', strtotime($this->m_rekap_absen->f006_jamPulang()->row()->setting_time)));

		$absen_pulang 	= $this->input->post('absen_pulang');
		$user_pulang 	= strtotime(date('H:i', strtotime($absen_pulang)));
		$point_pulang 	= ($user_pulang-$jam_pulang)/60;

		if (empty($absen_pulang)) 
		{
			$data = array(
				'absen_masuk' 			=> $absen_masuk,
				'absen_masuk_poin' 		=> $point_masuk,
				'absen_masuk_status'	=> 2
			);
		}
		else
		{
			$data = array(
				'absen_masuk' 			=> $absen_masuk,
				'absen_masuk_poin' 		=> $point_masuk,
				'absen_masuk_status'	=> 2,
				'absen_pulang' 			=> $absen_pulang,
				'absen_pulang_poin'		=> $point_pulang,
				'absen_pulang_status' 	=> 3
			);
		}

		$this->m_rekap_absen->f005_updateUSer($absen_id, $absen_user, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Waktu berhasil diperbaharui.
        </div>');

        redirect(site_url('rekap_absen/show/'.$absen_id));
	}

	public function edit($absen_id)
	{
		$data['title_page'] = "EDIT REKAP ABSEN";

		$data['q_rekap_absen_by'] 	= $this->m_rekap_absen->f002_getRekapAbsenBy($absen_id);

		$this->template->show('rekap_absen/v_rekap_absen_edit', $data);
	} 

	public function edit_rekap()
	{
		$absen_id 		= $this->input->post('absen_id');
		$jarak 			= $this->input->post('jarak');

		$data = array(
			'jarak' 	=> $jarak,

			
		);

		$this->m_rekap_absen->f007_edit_rekap($absen_id, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" kategori="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            kategori berhasil di perbaharui.
        </div>');

		redirect(site_url('rekap_absen'));
	}

	public function edit_pulang($absen_id)
	{
		$data['title_page'] = "EDIT REKAP ABSEN PULANG";

		$data['q_rekap_absen_by'] 	= $this->m_rekap_absen->f002_getRekapAbsenBy($absen_id);

		$this->template->show('rekap_absen/v_rekap_absen_edit_pulang', $data);
	} 

	public function edit_rekap_pulang()
	{
		$absen_id 		= $this->input->post('absen_id');
		$jarak_ 			= $this->input->post('jarak_');

		$data = array(
			'jarak_' 	=> $jarak_,

			
		);

		$this->m_rekap_absen->f007_edit_rekap_pulang($absen_id, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" kategori="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            kategori berhasil di perbaharui.
        </div>');

		redirect(site_url('rekap_absen'));
	}
}

/* End of file Rekap_absen.php */
/* Location: ./application/controllers/Rekap_absen.php */