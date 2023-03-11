<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maps extends CI_Controller {

	public function __construct() 
	{
		parent:: __construct();

		$this->load->model('m_maps');
		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');
	}

	public function index()
	{
		$data['title_page'] = "MANAJEMEN MAPS ";

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('maps/v_maps', $data);
	}
}