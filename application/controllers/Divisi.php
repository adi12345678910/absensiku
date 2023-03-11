<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends CI_Controller {

	public function __construct() 
	{
		parent:: __construct();

		$this->load->model('m_divisi');
		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');
	}

	public function index()
	{
		$data['title_page'] = "DIVISI";

		$data['qDivisi'] = $this->m_divisi->f001_getDivisi()->result();

		$data['datakategori'] 		= $this->m_divisi->getdata();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('management/v_divisi', $data);
	}

	public function create()
	{
		$divisi_name 		= $this->input->post('divisi_name');
		$divisi_desk 		= $this->input->post('divisi_desk');

		$data = array(
			'divisi_name' 		=> $divisi_name,
			'divisi_desk' 		=> $divisi_desk
		);

		$this->m_divisi->f004_createdivisi($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" divisi="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            divisi berhasil di tambahkan.
        </div>');

		redirect(site_url('divisi'));
	}

	public function edit($divisi_id)
	{
		$data['title_page'] = "EDIT DIVISI";

		$data['qDivisiBy'] = $this->m_divisi->f002_getDivisiBy($divisi_id)->result();

		$data['datakategori'] 		= $this->m_divisi->getdata();

		$this->template->show('management/v_divisi_edit', $data);
	} 

	public function update()
	{
		$divisi_id 		= $this->input->post('divisi_id');
		$divisi_name 		= $this->input->post('divisi_name');
		$divisi_desk 		= $this->input->post('divisi_desk');
		$data = array(
			'divisi_name' 		=> $divisi_name,
			'divisi_desk' 		=> $divisi_desk
			);

		$this->m_divisi->f003_updateDivisi($divisi_id, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" divisi="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            divisi berhasil di perbaharui.
        </div>');

		redirect(site_url('divisi'));
	}

	function delete($divisi_id)
	{
		$this->m_divisi->delete($divisi_id);
		redirect('divisi');
	}

}

/* End of file Divisi.php */
/* Location: ./application/controllers/Divisi.php */