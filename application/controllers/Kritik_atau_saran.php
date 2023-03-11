<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kritik_atau_saran extends CI_Controller {

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
		$data['title_page'] = "KRITIK  ATAU SARAN";

		$data['q_ks'] 		= $this->m_kritik_saran->f003_getby($this->template->user_id())->result();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('kritik_atau_saran/v_kritik_atau_saran', $data);
	}

	public function kirim()
	{
		$ks_user = $this->template->user_id();
		$ks_status = $this->input->post('ks_status');
		$ks_text = $this->input->post('ks_text');

		$data = array(
			'ks_user' 	=> $ks_user,
			'ks_status' => $ks_status,
			'ks_text' 	=> $ks_text,
			'ks_date'	=> date('Y-m-d H:i:s')
		);

		$this->m_kritik_saran->f001_create($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Krtik atau saran anda berhasil dikirim.
        </div>');

		redirect(site_url('kritik_atau_saran'));
	}

}

/* End of file Kritik_dan_saran.php */
/* Location: ./application/controllers/Kritik_dan_saran.php */