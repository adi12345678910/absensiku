<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengalaman_kerja extends CI_Controller {

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
		$data['title_page'] = "PENGAMAN KERJA";

		$data['qPengalamanKerja'] = $this->m_profile->f007_getPEngalamanKerja($this->template->user_id())->result();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('profile/v_pengalaman_kerja', $data);
	}

	public function create()
	{
		$pengalaman_kerja_nama_perusahaan 	= $this->input->post('pengalaman_kerja_nama_perusahaan');
		$pengalaman_kerja_jab 				= $this->input->post('pengalaman_kerja_jab');
		$pengalaman_kerja_s_d 				= $this->input->post('pengalaman_kerja_s_d');
		$pengalaman_kerja_ket 				= $this->input->post('pengalaman_kerja_ket');

		$data = array(
			'pengalaman_kerja_user' 			=> $this->template->user_id(),
			'pengalaman_kerja_nama_perusahaan'	=> $pengalaman_kerja_nama_perusahaan,
			'pengalaman_kerja_jab' 				=> $pengalaman_kerja_jab,
			'pengalaman_kerja_s_d' 				=> $pengalaman_kerja_s_d,
			'pengalaman_kerja_ket' 				=> $pengalaman_kerja_ket
		);

		$this->m_profile->f007_3_getPengalamanKerjaCreate($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Pengalaman kerja berhasil ditambahkan.
        </div>');

		redirect(site_url('pengalaman_kerja'));
	}

	public function show($pengalaman_kerja_id, $pengalaman_kerja_user)
	{
		$data['title_page'] = "EDIT PENGALAMAN KERJA";

		$data['user_id_pf'] = $this->template->user_id();

		$data['qPendidikanFormal'] = $this->m_profile->f007_1_getPengalamanKerjaBy($pengalaman_kerja_id, $pengalaman_kerja_user);

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('profile/v_pengalaman_kerja_edit', $data);
	}

	public function update()
	{
		$pengalaman_kerja_id 			= $this->input->post('pengalaman_kerja_id');
		$pengalaman_kerja_user 			= $this->template->user_id();

		$pengalaman_kerja_nama_perusahaan 	= $this->input->post('pengalaman_kerja_nama_perusahaan');
		$pengalaman_kerja_jab 				= $this->input->post('pengalaman_kerja_jab');
		$pengalaman_kerja_s_d 				= $this->input->post('pengalaman_kerja_s_d');
		$pengalaman_kerja_ket 				= $this->input->post('pengalaman_kerja_ket');

		$data = array(
			'pengalaman_kerja_nama_perusahaan'	=> $pengalaman_kerja_nama_perusahaan,
			'pengalaman_kerja_jab' 				=> $pengalaman_kerja_jab,
			'pengalaman_kerja_s_d' 				=> $pengalaman_kerja_s_d,
			'pengalaman_kerja_ket' 				=> $pengalaman_kerja_ket
		);

		$this->m_profile->f007_2_getPengalamanKerjaUpdate($pengalaman_kerja_id, $pengalaman_kerja_user, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Pengalaman kerja berhasil diperbaharui.
        </div>');

		redirect(site_url('pengalaman_kerja'));
	}

	public function delete($pengalaman_kerja_id, $pengalaman_kerja_user)
	{
		if ($pengalaman_kerja_user != $this->template->user_id()) 
		{
			$this->session->set_flashdata('alert', 
			'<div class="alert alert-danger alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            Anda tidak berhak menghapus Pengalaman Kerja orang lain.
	        </div>');
		}
		else
		{
			$this->m_profile->f007_4_getPengalamanKerjaDelete($pengalaman_kerja_id);

			$this->session->set_flashdata('alert', 
			'<div class="alert alert-success alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            Pengalaman kerja berhasil dihapus.
	        </div>');
		}

		redirect(site_url('pengalaman_kerja'));
	}

}

/* End of file Pendidikan_formal.php */
/* Location: ./application/controllers/Pendidikan_formal.php */