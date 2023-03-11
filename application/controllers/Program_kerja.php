<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program_kerja extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('m_program_kerja');
		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');
		
	}

	public function index()
	{
		$data['title_page'] = "PROGRAM KERJA";

		$data['alert'] 		= $this->session->flashdata('alert');

		if ($this->template->role_id() == 1) 
		{
			$data['q_program_kerja'] = $this->m_program_kerja->f002_get();
		}
		else
		{
			$data['q_program_kerja'] = $this->m_program_kerja->f003_getLembaga($this->template->lembaga_id());
		}

		$this->template->show('program_kerja/v_program_kerja', $data);
	}

	public function create()
	{
		$program_nama 	= $this->input->post('program_nama');
		$program_bulan 	= $this->input->post('program_bulan');
		$program_tahun 	= $this->input->post('program_tahun');
		$program_desk 	= $this->input->post('program_desk');

		$data = array(
			'kerja_name' 			=> $program_nama,
			'kerja_periode_bulan' 	=> $program_bulan,
			'kerja_periode_tahun' 	=> $program_tahun,
			'kerja_desk'		 	=> $program_desk, 
			'kerja_user' 			=> $this->template->user_id(),
			'kerja_lembaga'		 	=> $this->template->lembaga_id(), 
		);

		$this->m_program_kerja->f001_create($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Program kerja berhasil di tambahkan.
        </div>');

		redirect(site_url('program_kerja'));
	}

	public function todo_list($kerja_id)
	{
		$q_program_kerja_name = $this->m_program_kerja->f004_getBy($kerja_id)->row()->kerja_name;
		$data['title_page'] = 'TODO LIST PADA PROGRAM KERJA " '.strtoupper($q_program_kerja_name).' "';

		$data['alert'] 		= $this->session->flashdata('alert');

		$data['q_todo_kerja'] = $this->m_program_kerja->f006_getTodo($kerja_id);

		$this->template->show('program_kerja/v_program_kerja_todo_list', $data);
	}

	public function edit($kerja_id)
	{
		$data['title_page'] = "EDIT PROGRAM KERJA";

		$data['alert'] 		= $this->session->flashdata('alert');

		$data['kerja_lembaga'] = $this->template->lembaga_id();

		$data['q_program_kerja'] = $this->m_program_kerja->f004_getBy($kerja_id)->result();

		$this->template->show('program_kerja/v_program_kerja_edit', $data);
	}

	public function update()
	{
		$program_id 	= $this->input->post('program_id');

		$program_nama 	= $this->input->post('program_nama');
		$program_bulan 	= $this->input->post('program_bulan');
		$program_tahun 	= $this->input->post('program_tahun');
		$program_desk 	= $this->input->post('program_desk');

		$data = array(
			'kerja_name' 			=> $program_nama,
			'kerja_periode_bulan' 	=> $program_bulan,
			'kerja_periode_tahun' 	=> $program_tahun,
			'kerja_desk'		 	=> $program_desk, 
			'kerja_user_update' 	=> $this->template->user_id(),
		);

		$this->m_program_kerja->f005_update($program_id, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Program kerja berhasil di perbaharui.
        </div>');

		redirect(site_url('program_kerja'));
	}

	public function delete($kerja_id)
	{
		$cek = $this->m_program_kerja->f006_getTodo($kerja_id);

		if ($cek->num_rows() > 0) 
		{
			$this->session->set_flashdata('alert', 
			'<div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Program Kerja sedang digunakan.
            </div>');
		}
		else
		{
			$this->m_program_kerja->f007_delete($kerja_id);

			$this->session->set_flashdata('alert', 
			'<div class="alert alert-success alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            Program Kerja List berhasil dihapus.
	        </div>');
		}

		redirect(site_url('program_kerja'));
	}

}

/* End of file Program_kerja.php */
/* Location: ./application/controllers/Program_kerja.php */