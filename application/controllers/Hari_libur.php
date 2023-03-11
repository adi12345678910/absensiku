<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hari_libur extends CI_Controller {

	public function __construct() 
	{
		parent:: __construct();

		$this->load->model('m_hari_libur');
		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');
	}

	public function index()
	{
		$data['title_page'] = "HARI LIBUR";

		$data['alert'] 		= $this->session->flashdata('alert');

		$data['q_hari_libur'] = $this->m_hari_libur->f001_getHariLibur()->result();

		$this->template->show('hari_libur/v_hari_libur', $data);
	}

	public function create()
	{
		$hari_libur 		= $this->input->post('hari_libur_tanggal');
			$broken 		= explode(' ', $hari_libur);
			$month			= month_number($broken[1]);
			$hari_libur_tanggal	= $broken[2].'-'.$month.'-'.$broken[0];
		$hari_libur_nama 		= $this->input->post('hari_libur_nama');
		$hari_libur_desk 		= $this->input->post('hari_libur_desk');

		$data = array(
			'hari_libur_tanggal' => $hari_libur_tanggal, 
			'hari_libur_nama' => $hari_libur_nama, 
			'hari_libur_desk' => $hari_libur_desk
		);

		$this->m_hari_libur->f002_insertHariLibur($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Hari libur berhasil disimpan.
        </div>');

		redirect(site_url('hari_libur'));
	}

	public function delete($hari_libur_id)
	{
		$data = array(
			'hari_libur_deleted_at' 		=> date('Y-m-d H:i:s')
		);

		$this->m_hari_libur->f003_updateHariLibur($hari_libur_id, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Hari Libur berhasil di hapus.
        </div>');

		redirect(site_url('hari_libur'));
	}

}

/* End of file Hari_libur.php */
/* Location: ./application/controllers/Hari_libur.php */