<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembaga extends CI_Controller {

	public function __construct() 
	{
		parent:: __construct();

		$this->load->model('m_lembaga');
		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');
	}

	public function index()
	{
		$data['title_page'] = "LEMBAGA";

		$data['qLembaga'] = $this->m_lembaga->f001_getLembaga()->result();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('management/v_lembaga', $data);
	}

	public function create()
	{
		$lembaga_name 		= $this->input->post('lembaga_name');
		$lembaga_desk 		= $this->input->post('lembaga_desk');
		$lembaga_status 	= $this->input->post('lembaga_status');

		$data = array(
			'lembaga_name' 		=> $lembaga_name,
			'lembaga_desk' 		=> $lembaga_desk,
			'lembaga_status'	=> $lembaga_status,
			'lembaga_created_at' 		=> date('Y-m-d H:i:s')
		);

		$this->m_lembaga->f004_createLembaga($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Lembaga berhasil di tambahkan.
        </div>');

		redirect(site_url('lembaga'));
	}

	public function edit($lembaga_id)
	{
		$data['title_page'] = "EDIT LEMBAGA";

		$data['qLembagaBy'] = $this->m_lembaga->f002_getLembagaBy($lembaga_id)->result();

		$this->template->show('management/v_lembaga_edit', $data);
	}

	public function update()
	{
		$lembaga_id 		= $this->input->post('lembaga_id');
		$lembaga_name 		= $this->input->post('lembaga_name');
		$lembaga_desk 		= $this->input->post('lembaga_desk');
		$lembaga_status 	= $this->input->post('lembaga_status');

		$data = array(
			'lembaga_name' 		=> $lembaga_name,
			'lembaga_desk' 		=> $lembaga_desk,
			'lembaga_status'	=> $lembaga_status,
			'lembaga_updated_at' 		=> date('Y-m-d H:i:s')
		);

		$this->m_lembaga->f003_updateLembaga($lembaga_id, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Lembaga berhasil di perbaharui.
        </div>');

		redirect(site_url('lembaga'));
	}

	public function delete($lembaga_id)
	{
		$data = array(
			'lembaga_deleted_at' 		=> date('Y-m-d H:i:s')
		);

		$this->m_lembaga->f003_updateLembaga($lembaga_id, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Lembaga berhasil di hapus.
        </div>');

		redirect(site_url('lembaga'));
	}

}

/* End of file Lembaga.php */
/* Location: ./application/controllers/Lembaga.php */