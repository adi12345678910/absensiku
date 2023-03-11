<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan_non_formal extends CI_Controller {

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
		$data['title_page'] = "PENDIDIKAN NON FORMAL";

		$data['qPendidikanNonFormal'] = $this->m_profile->f005_getPendidikanNonFormal($this->template->user_id())->result();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('profile/v_pendidikan_non_formal', $data);
	}

	public function create()
	{
		$formal_non_name 		= $this->input->post('formal_non_name');
		$formal_non_tempat 		= $this->input->post('formal_non_tempat');
		$formal_non_s_d 			= $this->input->post('formal_non_s_d');
		$formal_non_ket 			= $this->input->post('formal_non_ket');

		$data = array(
			'formal_non_user' 			=> $this->template->user_id(),
			'formal_non_name' 		=> $formal_non_name,
			'formal_non_tempat' 	=> $formal_non_tempat,
			'formal_non_s_d' 			=> $formal_non_s_d,
			'formal_non_ket' 			=> $formal_non_ket  
		);

		$this->m_profile->f005_3_getPendidikanNonFormalCreate($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Pendidikan non formal berhasil ditambahkan.
        </div>');

		redirect(site_url('pendidikan_non_formal'));
	}

	public function show($pendidikan_non_formal_id, $pendidikan_non_formal_user)
	{
		$data['title_page'] = "EDIT PENDIDIKAN NON FORMAL";

		$data['user_id_pf'] = $this->template->user_id();

		$data['qPendidikanFormal'] = $this->m_profile->f005_1_getPendidikanNonFormalBy($pendidikan_non_formal_id, $pendidikan_non_formal_user);

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('profile/v_pendidikan_non_formal_edit', $data);
	}

	public function update()
	{
		$formal_non_id 			= $this->input->post('formal_non_id');
		$formal_non_user 		= $this->template->user_id();

		$formal_non_name 		= $this->input->post('formal_non_name');
		$formal_non_tempat 		= $this->input->post('formal_non_tempat');
		$formal_non_s_d 			= $this->input->post('formal_non_s_d');
		$formal_non_ket 			= $this->input->post('formal_non_ket');

		$data = array(
			'formal_non_name' 		=> $formal_non_name,
			'formal_non_tempat' 	=> $formal_non_tempat,
			'formal_non_s_d' 			=> $formal_non_s_d,
			'formal_non_ket' 			=> $formal_non_ket 
		);

		$this->m_profile->f005_2_getPendidikanNonFormalUpdate($formal_non_id, $formal_non_user, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Pendidikan non formal berhasil diperbaharui.
        </div>');

		redirect(site_url('pendidikan_non_formal'));
	}

	public function delete($formal_non_id, $formal_non_user)
	{
		if ($formal_non_user != $this->template->user_id()) 
		{
			$this->session->set_flashdata('alert', 
			'<div class="alert alert-danger alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            Anda tidak berhak menghapus Pendidikan Non Formal orang lain.
	        </div>');
		}
		else
		{
			$this->m_profile->f005_4_getPendidikanNonFormalDelete($formal_non_id);

			$this->session->set_flashdata('alert', 
			'<div class="alert alert-success alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            Pendidikan formal berhasil dihapus.
	        </div>');
		}

		redirect(site_url('pendidikan_non_formal'));
	}

}

/* End of file Pendidikan_formal.php */
/* Location: ./application/controllers/Pendidikan_formal.php */