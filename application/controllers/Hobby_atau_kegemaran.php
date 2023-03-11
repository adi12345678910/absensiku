<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hobby_atau_kegemaran extends CI_Controller {

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
		$data['title_page'] = "HOBBY ATAU KEGEMARAN";

		$data['qHK'] = $this->m_profile->f009_getHobbyKegemaran($this->template->user_id())->result();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('profile/v_hobby_kegemaran', $data);
	}

	public function create()
	{
		$hk_name 	= $this->input->post('hk_name');

		$data = array(
			'hk_user' 			=> $this->template->user_id(),
			'hk_name'	=> $hk_name
		);

		$this->m_profile->f008_3_getHobbyKegemaranCreate($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Pengalaman organisasi berhasil ditambahkan.
        </div>');

		redirect(site_url('hobby_atau_kegemaran'));
	}

	public function show($hobby_kegemaran_id, $hobby_kegemaran_user)
	{
		$data['title_page'] = "EDIT HOBBY ATAU KEGEMARAN";

		$data['user_id_pf'] = $this->template->user_id();

		$data['qPendidikanFormal'] = $this->m_profile->f008_1_getHobbyKegemaranBy($hobby_kegemaran_id, $hobby_kegemaran_user);

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('profile/v_hobby_kegemaran_edit', $data);
	}

	public function update()
	{
		$hk_id 			= $this->input->post('hk_id');
		$hk_user 		= $this->template->user_id();

		$hk_name 	= $this->input->post('hk_name');

		$data = array(
			'hk_name'	=> $hk_name,
		);

		$this->m_profile->f008_2_getHobbyKegemaranUpdate($hk_id, $hk_user, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Hobby atau kegemaran berhasil diperbaharui.
        </div>');

		redirect(site_url('hobby_atau_kegemaran'));
	}

	public function delete($hk_id, $hk_user)
	{
		if ($hk_user != $this->template->user_id()) 
		{
			$this->session->set_flashdata('alert', 
			'<div class="alert alert-danger alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            Anda tidak berhak menghapus Pengalaman ORganisasi orang lain.
	        </div>');
		}
		else
		{
			$this->m_profile->f008_4_getHobbyKegemaranDelete($hk_id);

			$this->session->set_flashdata('alert', 
			'<div class="alert alert-success alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            Pengalaman organisasi berhasil dihapus.
	        </div>');
		}

		redirect(site_url('hobby_atau_kegemaran'));
	}

}

/* End of file Pendidikan_formal.php */
/* Location: ./application/controllers/Pendidikan_formal.php */