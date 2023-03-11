<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_kritik_saran extends CI_Controller {

	public function __construct() 
	{
		parent:: __construct();

		$this->load->model('m_kritik_saran');
		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');
	}

	public function index()
	{
		$data['title_page'] = "DATA KRITIK SARAN";

		$data['q_ks'] 		= $this->m_kritik_saran->f002_get()->result();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('data_kritik_saran/v_data_kritik_saran', $data);
	}

}

/* End of file Data_kritik_saran.php */
/* Location: ./application/controllers/Data_kritik_saran.php */