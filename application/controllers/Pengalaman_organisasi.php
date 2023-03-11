<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengalaman_organisasi extends CI_Controller {

	public function __construct() 
	{
		parent:: __construct();

		$this->load->model('m_profile');
		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');
	}

	public function index()
	{
		$data['title_page'] = "PENGALAMAN ORGANISASI";

		$data['qPengalamanOrganisasi'] = $this->m_profile->f008_getPengalamanOrganisasi($this->template->user_id())->result();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('profile/v_pengalaman_organisasi', $data);
	}

	public function create()
	{
		$pengalaman_organisasi_name 	= $this->input->post('pengalaman_organisasi_name');
		$pengalaman_organisasi_tempat 				= $this->input->post('pengalaman_organisasi_tempat');
		$pengalaman_organisasi_jab 				= $this->input->post('pengalaman_organisasi_jab');
		$pengalaman_organisasi_s_d 				= $this->input->post('pengalaman_organisasi_s_d');

		$data = array(
			'pengalaman_organisasi_user' 			=> $this->template->user_id(),
			'pengalaman_organisasi_name'	=> $pengalaman_organisasi_name,
			'pengalaman_organisasi_tempat' 				=> $pengalaman_organisasi_tempat,
			'pengalaman_organisasi_jab' 				=> $pengalaman_organisasi_jab,
			'pengalaman_organisasi_s_d' 				=> $pengalaman_organisasi_s_d
		);

		$this->m_profile->f008_3_getOPengalamanORganisasiCreate($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Pengalaman organisasi berhasil ditambahkan.
        </div>');

		redirect(site_url('pengalaman_organisasi'));
	}

	public function show($pengalaman_organisasi_id, $pengalaman_organisasi_user)
	{
		$data['title_page'] = "EDIT PENGALAMAN ORGANISASI";

		$data['user_id_pf'] = $this->template->user_id();

		$data['qPendidikanFormal'] = $this->m_profile->f008_1_getOPengalamanORganisasiBy($pengalaman_organisasi_id, $pengalaman_organisasi_user);

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('profile/v_pengalaman_organisasi_edit', $data);
	}

	public function update()
	{
		$pengalaman_organisasi_id 			= $this->input->post('pengalaman_organisasi_id');
		$pengalaman_organisasi_user 			= $this->template->user_id();

		$pengalaman_organisasi_name 	= $this->input->post('pengalaman_organisasi_name');
		$pengalaman_organisasi_tempat 				= $this->input->post('pengalaman_organisasi_tempat');
		$pengalaman_organisasi_jab 				= $this->input->post('pengalaman_organisasi_jab');
		$pengalaman_organisasi_s_d 				= $this->input->post('pengalaman_organisasi_s_d');

		$data = array(
			'pengalaman_organisasi_name'	=> $pengalaman_organisasi_name,
			'pengalaman_organisasi_tempat' 				=> $pengalaman_organisasi_tempat,
			'pengalaman_organisasi_jab' 				=> $pengalaman_organisasi_jab,
			'pengalaman_organisasi_s_d' 				=> $pengalaman_organisasi_s_d,
		);

		$this->m_profile->f008_2_getOPengalamanORganisasiUpdate($pengalaman_organisasi_id, $pengalaman_organisasi_user, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Pengalaman organisasi berhasil diperbaharui.
        </div>');

		redirect(site_url('pengalaman_organisasi'));
	}

	public function delete($pengalaman_organisasi_id, $pengalaman_organisasi_user)
	{
		if ($pengalaman_organisasi_user != $this->template->user_id()) 
		{
			$this->session->set_flashdata('alert', 
			'<div class="alert alert-danger alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            Anda tidak berhak menghapus Pengalaman ORganisasi orang lain.
	        </div>');
		}
		else
		{
			$this->m_profile->f008_4_getOPengalamanORganisasiDelete($pengalaman_organisasi_id);

			$this->session->set_flashdata('alert', 
			'<div class="alert alert-success alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            Pengalaman organisasi berhasil dihapus.
	        </div>');
		}

		redirect(site_url('pengalaman_organisasi'));
	}

}

/* End of file Pendidikan_formal.php */
/* Location: ./application/controllers/Pendidikan_formal.php */