<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public function __construct() 
	{
		parent:: __construct();

		$this->load->model('m_jabatan');
		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');
	}

	public function index()
	{
		$data['title_page'] = "JABATAN";

		$data['qJabatan'] = $this->m_jabatan->f001_getJabatan()->result();

		$data['datakategori'] 		= $this->m_jabatan->getdata();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('management/v_jabatan', $data);
	}

	public function create()
	{
		$jabatan_name 		= $this->input->post('jabatan_name');
		$jabatan_desk 		= $this->input->post('jabatan_desk');

		$data = array(
			'jabatan_name' 		=> $jabatan_name,
			'jabatan_desk' 		=> $jabatan_desk
		);

		$this->m_jabatan->f004_createjabatan($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" jabatan="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            jabatan berhasil di tambahkan.
        </div>');

		redirect(site_url('jabatan'));
	}

	public function edit($jabatan_id)
	{
		$data['title_page'] = "EDIT JABATAN";

		$data['qJabatanBy'] = $this->m_jabatan->f002_getJabatanBy($jabatan_id)->result();

		$data['datakategori'] 		= $this->m_jabatan->getdata();

		$this->template->show('management/v_jabatan_edit', $data);
	} 

	public function update()
	{
		$jabatan_id 		= $this->input->post('jabatan_id');
		$jabatan_name 		= $this->input->post('jabatan_name');
		$jabatan_desk 		= $this->input->post('jabatan_desk');
		$data = array(
			'jabatan_name' 		=> $jabatan_name,
			'jabatan_desk' 		=> $jabatan_desk
			);

		$this->m_jabatan->f003_updateJabatan($jabatan_id, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" jabatan="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            jabatan berhasil di perbaharui.
        </div>');

		redirect(site_url('jabatan'));
	}

	function delete($jabatan_id)
	{
		$this->m_jabatan->delete($jabatan_id);
		redirect('jabatan');
	}

}

/* End of file jabatan.php */
/* Location: ./application/controllers/jabatan.php */