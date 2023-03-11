<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karya_ilmiah extends CI_Controller {

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
		$data['title_page'] = "KARYA ILMIAH";

		$data['qKaryaIlmiah'] = $this->m_profile->f004_getKaryaIlmiah($this->template->user_id())->result();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('profile/v_karya_imliah', $data);
	}

	public function create()
	{
		$karya_ilmiah_name 		= $this->input->post('karya_ilmiah_name');

		$data = array(
			'karya_ilmiah_user' 			=> $this->template->user_id(),
			'karya_ilmiah_name' 				=> $karya_ilmiah_name,
		);

		$this->m_profile->f004_3_getKaryaIlmiahCreate($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Pendidikan formal berhasil ditambahkan.
        </div>');

		redirect(site_url('karya_ilmiah'));
	}

	public function show($karya_ilmiah_id, $karya_ilmiah_user)
	{
		$data['title_page'] = "EDIT KARYA ILMIAH";

		$data['user_id_pf'] = $this->template->user_id();

		$data['qPendidikanFormal'] = $this->m_profile->f004_1_getKaryaIlmiahBy($karya_ilmiah_id, $karya_ilmiah_user);

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('profile/v_karya_ilmiah_edit', $data);
	}

	public function update()
	{
		$karya_ilmiah_id 		= $this->input->post('karya_ilmiah_id');
		$karya_ilmiah_user 		= $this->template->user_id();

		$karya_ilmiah_name 		= $this->input->post('karya_ilmiah_name');

		$data = array(
			'karya_ilmiah_name' 			=> $karya_ilmiah_name,
		);

		$this->m_profile->f004_2_getKaryaIlmiahUpdate($karya_ilmiah_id, $karya_ilmiah_user, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Karya ilmiah berhasil diperbaharui.
        </div>');

		redirect(site_url('karya_ilmiah'));
	}

	public function delete($karya_ilmiah_id, $karya_ilmiah_user)
	{
		if ($karya_ilmiah_user != $this->template->user_id()) 
		{
			$this->session->set_flashdata('alert', 
			'<div class="alert alert-danger alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            Anda tidak berhak menghapus Karya Ilmiah orang lain.
	        </div>');
		}
		else
		{
			$this->m_profile->f004_4_getKaryaIlmiahDelete($karya_ilmiah_id);

			$this->session->set_flashdata('alert', 
			'<div class="alert alert-success alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            Karya Ilmiah berhasil dihapus.
	        </div>');
		}

		redirect(site_url('karya_ilmiah'));
	}

}

/* End of file Pendidikan_formal.php */
/* Location: ./application/controllers/Pendidikan_formal.php */