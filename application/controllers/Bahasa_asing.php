<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahasa_asing extends CI_Controller {

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
		$data['title_page'] = "BAHASA ASING";

		$data['qBahasaAsing'] = $this->m_profile->f006_getBahasaAsing($this->template->user_id())->result();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('profile/v_bahasa_asing', $data);
	}

	public function create()
	{
		$bahasa_asing_name 		= $this->input->post('bahasa_asing_name');
		$bahasa_asing_lisan = $this->input->post('bahasa_asing_lisan');
		$bahasa_asing_tertulis 	= $this->input->post('bahasa_asing_tertulis');

		$data = array(
			'bahasa_asing_user' 			=> $this->template->user_id(),
			'bahasa_asing_name' 			=> $bahasa_asing_name,
			'bahasa_asing_lisan' 	=> $bahasa_asing_lisan,
			'bahasa_asing_tertulis' 		=> $bahasa_asing_tertulis
		);

		$this->m_profile->f006_3_getBahasaAsingCreate($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Bahasa asing berhasil ditambahkan.
        </div>');

		redirect(site_url('bahasa_asing'));
	}

	public function show($bahasa_asing_id, $bahasa_asing_user)
	{
		$data['title_page'] = "EDIT BAHASA ASING";

		$data['user_id_pf'] = $this->template->user_id();

		$data['qPendidikanFormal'] = $this->m_profile->f006_1_getBahasaAsingBy($bahasa_asing_id, $bahasa_asing_user);

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('profile/v_bahasa_asing_edit', $data);
	}

	public function update()
	{
		$bahasa_asing_id 			= $this->input->post('bahasa_asing_id');
		$bahasa_asing_user 		= $this->template->user_id();

		$bahasa_asing_name 		= $this->input->post('bahasa_asing_name');
		$bahasa_asing_lisan = $this->input->post('bahasa_asing_lisan');
		$bahasa_asing_tertulis 	= $this->input->post('bahasa_asing_tertulis');

		$data = array(
			'bahasa_asing_name' 			=> $bahasa_asing_name,
			'bahasa_asing_lisan' 	=> $bahasa_asing_lisan,
			'bahasa_asing_tertulis' 		=> $bahasa_asing_tertulis
		);

		$this->m_profile->f006_2_getBahasaAsingUpdate($bahasa_asing_id, $bahasa_asing_user, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Bahasa asing berhasil diperbaharui.
        </div>');

		redirect(site_url('bahasa_asing'));
	}

	public function delete($bahasa_asing_id, $bahasa_asing_user)
	{
		if ($bahasa_asing_user != $this->template->user_id()) 
		{
			$this->session->set_flashdata('alert', 
			'<div class="alert alert-danger alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            Anda tidak berhak menghapus Bahasa Asing orang lain.
	        </div>');
		}
		else
		{
			$this->m_profile->f006_4_getBahasaAsingDelete($bahasa_asing_id);

			$this->session->set_flashdata('alert', 
			'<div class="alert alert-success alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            Bahasa asing berhasil dihapus.
	        </div>');
		}

		redirect(site_url('bahasa_asing'));
	}

}

/* End of file Pendidikan_formal.php */
/* Location: ./application/controllers/Pendidikan_formal.php */