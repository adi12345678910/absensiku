<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan_formal extends CI_Controller {

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
		$data['title_page'] = "PENDIDIKAN FORMAL";

		$data['qPendidikanFormal'] = $this->m_profile->f003_getPendidikanFormal($this->template->user_id())->result();

		$data['jenisp'] = $this->m_profile->f000_getJenisPendidikan()->result();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('profile/v_pendidikan_formal', $data);
	}

	public function create()
	{
		$pendidikan_formal_jenis 		= $this->input->post('pendidikan_formal_jenis');
		$pendidikan_formal_nama_sekolah = $this->input->post('pendidikan_formal_nama_sekolah');
		$pendidikan_formal_fakultas 	= $this->input->post('pendidikan_formal_fakultas');
		$pendidikan_formal_jurusan 		= $this->input->post('pendidikan_formal_jurusan');
		$pendidikan_formal_prog_studi 	= $this->input->post('pendidikan_formal_prog_studi');
		$pendidikan_formal_tempat 		= $this->input->post('pendidikan_formal_tempat');
		$pendidikan_formal_s_d 			= $this->input->post('pendidikan_formal_s_d');
		$pendidikan_formal_ket 			= $this->input->post('pendidikan_formal_ket');

		$data = array(
			'pendidikan_formal_user' 			=> $this->template->user_id(),
			'pendidikan_formal_jenis' 			=> $pendidikan_formal_jenis,
			'pendidikan_formal_nama_sekolah' 	=> $pendidikan_formal_nama_sekolah,
			'pendidikan_formal_fakultas' 		=> $pendidikan_formal_fakultas,
			'pendidikan_formal_jurusan' 		=> $pendidikan_formal_jurusan,
			'pendidikan_formal_prog_studi' 		=> $pendidikan_formal_prog_studi,
			'pendidikan_formal_tempat' 			=> $pendidikan_formal_tempat,
			'pendidikan_formal_s_d' 			=> $pendidikan_formal_s_d,
			'pendidikan_formal_ket' 			=> $pendidikan_formal_ket 
		);

		$this->m_profile->f003_3_getPendidikanFormalCreate($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Pendidikan formal berhasil ditambahkan.
        </div>');

		redirect(site_url('pendidikan_formal'));
	}

	public function show($pendidikan_formal_id, $pendidikan_formal_user)
	{
		$data['title_page'] = "EDIT PENDIDIKAN FORMAL";

		$data['user_id_pf'] = $this->template->user_id();

		$data['qPendidikanFormal'] = $this->m_profile->f003_1_getPendidikanFormalBy($pendidikan_formal_id, $pendidikan_formal_user);

		$data['jenisp'] = $this->m_profile->f000_getJenisPendidikan()->result();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('profile/v_pendidikan_formal_edit', $data);
	}

	public function update()
	{
		$pendidikan_formal_id 			= $this->input->post('pendidikan_formal_id');
		$pendidikan_formal_user 		= $this->template->user_id();

		$pendidikan_formal_jenis 		= $this->input->post('pendidikan_formal_jenis');
		$pendidikan_formal_nama_sekolah = $this->input->post('pendidikan_formal_nama_sekolah');
		$pendidikan_formal_fakultas 	= $this->input->post('pendidikan_formal_fakultas');
		$pendidikan_formal_jurusan 		= $this->input->post('pendidikan_formal_jurusan');
		$pendidikan_formal_prog_studi 	= $this->input->post('pendidikan_formal_prog_studi');
		$pendidikan_formal_tempat 		= $this->input->post('pendidikan_formal_tempat');
		$pendidikan_formal_s_d 			= $this->input->post('pendidikan_formal_s_d');
		$pendidikan_formal_ket 			= $this->input->post('pendidikan_formal_ket');

		$data = array(
			'pendidikan_formal_jenis' 			=> $pendidikan_formal_jenis,
			'pendidikan_formal_nama_sekolah' 	=> $pendidikan_formal_nama_sekolah,
			'pendidikan_formal_fakultas' 		=> $pendidikan_formal_fakultas,
			'pendidikan_formal_jurusan' 		=> $pendidikan_formal_jurusan,
			'pendidikan_formal_prog_studi' 		=> $pendidikan_formal_prog_studi,
			'pendidikan_formal_tempat' 			=> $pendidikan_formal_tempat,
			'pendidikan_formal_s_d' 			=> $pendidikan_formal_s_d,
			'pendidikan_formal_ket' 			=> $pendidikan_formal_ket 
		);

		$this->m_profile->f003_2_getPendidikanFormalUpdate($pendidikan_formal_id, $pendidikan_formal_user, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Pendidikan formal berhasil diperbaharui.
        </div>');

		redirect(site_url('pendidikan_formal'));
	}

	public function delete($pendidikan_formal_id, $pendidikan_formal_user)
	{
		if ($pendidikan_formal_user != $this->template->user_id()) 
		{
			$this->session->set_flashdata('alert', 
			'<div class="alert alert-danger alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            Anda tidak berhak menghapus Pendidikan Formal orang lain.
	        </div>');
		}
		else
		{
			$this->m_profile->f003_4_getPendidikanFormalDelete($pendidikan_formal_id);

			$this->session->set_flashdata('alert', 
			'<div class="alert alert-success alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            Pendidikan formal berhasil dihapus.
	        </div>');
		}

		redirect(site_url('pendidikan_formal'));
	}

}

/* End of file Pendidikan_formal.php */
/* Location: ./application/controllers/Pendidikan_formal.php */