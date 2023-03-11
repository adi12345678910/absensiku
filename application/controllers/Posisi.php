<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posisi extends CI_Controller {

	public function __construct() 
	{
		parent:: __construct();

		$this->load->model('m_posisi');
		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');
	}

	public function index()
	{
		$data['title_page'] = "POSISI";

		$data['qPosisi'] = $this->m_posisi->f001_getPosisi()->result();

		$data['datakategori'] 		= $this->m_posisi->getdata();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('management/v_posisi', $data);
	}

	public function create()
	{
		$posisi_name 		= $this->input->post('posisi_name');
		$posisi_desk 		= $this->input->post('posisi_desk');

		$data = array(
			'posisi_name' 		=> $posisi_name,
			'posisi_desk' 		=> $posisi_desk
		);

		$this->m_posisi->f004_createPosisi($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" posisi="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            posisi berhasil di tambahkan.
        </div>');

		redirect(site_url('posisi'));
	}

	public function edit($posisi_id)
	{
		$data['title_page'] = "EDIT POSISI";

		$data['qPosisiBy'] = $this->m_posisi->f002_getPosisiBy($posisi_id)->result();

		$data['datakategori'] 		= $this->m_posisi->getdata();

		$this->template->show('management/v_posisi_edit', $data);
	} 

	public function update()
	{
		$posisi_id 		= $this->input->post('posisi_id');
		$posisi_name 		= $this->input->post('posisi_name');
		$posisi_desk 		= $this->input->post('posisi_desk');
		$data = array(
			'posisi_name' 		=> $posisi_name,
			'posisi_desk' 		=> $posisi_desk
			);

		$this->m_posisi->f003_updatePosisi($posisi_id, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" posisi="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            posisi berhasil di perbaharui.
        </div>');

		redirect(site_url('posisi'));
	}

	function delete($posisi_id)
	{
		$this->m_posisi->delete($posisi_id);
		redirect('posisi');
	}

}

/* End of file posisi.php */
/* Location: ./application/controllers/posisi.php */