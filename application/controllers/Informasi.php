<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {

	public function __construct() 
	{
		parent:: __construct();
		$this->load->model('m_informasi');
		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');
	}

	public function index()
	{
		$data['title_page'] = "PENGUMUMAN KARYAWAN ";

		$data['q_ks'] 		= $this->m_informasi->f003_getby($this->template->user_id())->result();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('informasi_hrd/v_informasi_hrd', $data);
	}

	public function kirim()
	{
		$informasi_user = $this->template->user_id();
		$judul_informasi = $this->input->post('judul_informasi');
		$keterangan_informasi = $this->input->post('keterangan_informasi');

		$data = array(
			'informasi_user'=> $informasi_user,
			'judul_informasi' => $judul_informasi,
			'keterangan_informasi' 	=> $keterangan_informasi,
			'informasi_date'	=> date('Y-m-d H:i:s')
		);

		$this->m_informasi->f001_create($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Krtik atau saran anda berhasil dikirim.
        </div>');

		redirect(site_url('informasi'));
	}
 

	public function create()
	{
		$data['title_page'] = "Pengumuman";

		$data['q_ks'] 		= $this->m_informasi->f003_getby($this->template->user_id())->result();
		$this->template->show('home/v_informasi_detail', $data);
	}

	public function edit($informasi_id)
	{
		$data['title_page'] = "EDIT PENGUMUMAN";

		$data['qPosisiBy'] = $this->m_informasi->f002_getPosisiBy($informasi_id)->result();

		$data['datakategori'] 	= $this->m_informasi->getdata();

		$this->template->show('informasi_hrd/v_informasi_edit', $data);
	} 
	
	public function update()
	{
		$informasi_id		    = $this->input->post('informasi_id');
		$judul_informasi 		= $this->input->post('judul_informasi');
		$keterangan_informasi 	= $this->input->post('keterangan_informasi');
		$data = array(
				
				 
				'judul_informasi' 		=> $judul_informasi,
				'keterangan_informasi'  => $keterangan_informasi
			 

			);
	 

		$this->m_informasi->f006_updateInformasi($informasi_id, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Pengumuman berhasil diperbaharui.
        </div>');

        redirect(site_url('informasi'));
	}

	function delete($informasi_id)
	{
		$this->m_informasi->delete($informasi_id);
	
		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            User berhasil di hapus.
        </div>');

		redirect(site_url('informasi'));
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */



/* End of file Kritik_dan_saran.php */
/* Location: ./application/controllers/Kritik_dan_saran.php */