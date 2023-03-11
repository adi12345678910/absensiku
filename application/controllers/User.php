<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() 
	{
		parent:: __construct();

		$this->load->model('m_user');
		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');
	}


	public function index()
	{
		$data['title_page'] 		= "USER";

		$data['alert'] 				= $this->session->flashdata('alert');

		$data['qUser'] 				= $this->m_user->f001_getUser()->result();

		$data['qRole'] 				= $this->m_user->f003_getRole()->result();

		$data['datajabatan'] 		= $this->m_user->getjabatan();

		$data['datakategori'] 		= $this->m_user->getdata();

		$data['dataposisi'] 		= $this->m_user->getposisi();

		$data['qLembaga'] 			= $this->m_user->f004_getLembaga()->result();
		
		$data['dataposisi'] 		= $this->m_user->getposisi();
		
		$this->template->show('management/v_user', $data);
	}

	public function create()
	{
		$user_nik 			= $this->input->post('user_nik');
		$user_name 			= $this->input->post('user_name');
		$tgl_lhr 			= $this->input->post('user_tgl_lhr');
			$broken 		= explode(' ', $tgl_lhr);
			$month			= month_number($broken[1]);
			$user_tgl_lhr	= $broken[2].'-'.$month.'-'.$broken[0];
		$user_gender 		= $this->input->post('user_gender');
		$user_hp 			= $this->input->post('user_hp');
		$user_alamat 		= $this->input->post('user_alamat');
		$user_jabatan 		= $this->input->post('user_jabatan');
		$user_role 			= $this->input->post('user_role');
		$user_divisi 		= $this->input->post('user_divisi');
		$user_posisi 		= $this->input->post('user_posisi');
		$user_lembaga 		= $this->input->post('user_lembaga');
		$user_password 		= $this->input->post('user_password');
		$user_email 		= $this->input->post('user_email');
		$user_status 		= $this->input->post('user_status');
		$user_status 		= $this->input->post('user_status');
		$sisa_cuti 			= $this->input->post('sisa_cuti');
		$sisa_remote 		= $this->input->post('sisa_remote');


		$data = array(
			'user_id' 			=> $user_id,
			'user_nik' 			=> $user_nik,
		    'user_name' 		=> $user_name,
			'user_tgl_lhr' 		=> $user_tgl_lhr,
			'user_gender' 		=> $user_gender,
			'user_hp' 			=> $user_hp,
			'user_alamat' 		=> $user_alamat,
			'user_jabatan' 		=> $user_jabatan,
			'user_role' 		=> $user_role,
			'user_divisi' 		=> $user_divisi,
			'user_posisi' 		=> $user_posisi,
			'user_lembaga' 		=> $user_lembaga,
			'user_password' 	=> password_hash($user_password, PASSWORD_DEFAULT),
			'user_email' 		=> $user_email,
			'user_status' 		=> $user_status,
			'user_created_at' 	=> date("Y-m-d H:i:s"),
			'sisa_cuti' 		=> $sisa_cuti,
			'sisa_remote' 		=> $sisa_remote

		);

		$this->m_user->f002_insertUsert($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            User berhasil disimpan.
        </div>');

		redirect(site_url('user'));
	}

	public function show($user_id)
	{
		$data['title_page'] = "DETAIL USER";

		$data['qUserBy'] = $this->m_user->f005_getUserBy($user_id)->result();

		$data['qRole'] 		= $this->m_user->f003_getRole()->result();
		$data['qLembaga'] 	= $this->m_user->f004_getLembaga()->result();
		$data['datajabatan'] 		= $this->m_user->getjabatan();
		$data['datakategori'] 		= $this->m_user->getdata();
		$data['dataposisi'] 		= $this->m_user->getposisi();

		$this->template->show('management/v_user_detail', $data);
	}

	public function update()
	{
		$user_id 		= $this->input->post('user_id');
		$user_nik 		= $this->input->post('user_nik');
		$user_name 		= $this->input->post('user_name');
		$tgl_lhr 			= $this->input->post('user_tgl_lhr');
			$broken 		= explode(' ', $tgl_lhr);
			$month			= month_number($broken[1]);
			$user_tgl_lhr	= $broken[2].'-'.$month.'-'.$broken[0];
		$user_gender 	= $this->input->post('user_gender');
		$user_alamat 	= $this->input->post('user_alamat');
		$user_hp 		= $this->input->post('user_hp');
		$user_divisi 	= $this->input->post('user_divisi');
		$user_posisi 	= $this->input->post('user_posisi');
		$user_jabatan 	= $this->input->post('user_jabatan');
		$user_status 	= $this->input->post('user_status');
		$user_lembaga 	= $this->input->post('user_lembaga');
		$user_role 		= $this->input->post('user_role');
		$user_email 	= $this->input->post('user_email');
		$user_password 	= $this->input->post('user_password');
		$sisa_cuti 		= $this->input->post('sisa_cuti');
		$sisa_remote 	= $this->input->post('sisa_remote');


		if (empty($user_password)) 
		{
			$data = array(
				
				'user_nik' 			=> $user_nik,
				'user_name' 		=> $user_name,
				'user_tgl_lhr' 		=> $user_tgl_lhr,
				'user_gender' 		=> $user_gender,
				'user_alamat' 		=> $user_alamat,
				'user_hp' 			=> $user_hp,
				'user_divisi' 		=> $user_divisi,
				'user_posisi' 		=> $user_posisi,
				'user_jabatan' 		=> $user_jabatan,
				'user_status' 		=> $user_status,
				'user_lembaga' 		=> $user_lembaga,
				'user_role' 		=> $user_role,
				'user_email' 		=> $user_email,
				'sisa_cuti' 		=> $sisa_cuti,
				'sisa_remote' 		=> $sisa_remote


			);
		}
		else
		{
			$data = array(
				
				'user_nik' 			=> $user_nik,
				'user_name' 		=> $user_name,
				'user_tgl_lhr' 		=> $user_tgl_lhr,
				'user_gender' 		=> $user_gender,
				'user_alamat' 		=> $user_alamat,
				'user_hp' 			=> $user_hp,
				'user_divisi' 		=> $user_divisi,
				'user_posisi' 		=> $user_posisi,
				'user_jabatan' 		=> $user_jabatan,
				'user_status' 		=> $user_status,
				'user_lembaga' 		=> $user_lembaga,
				'user_role' 		=> $user_role,
				'user_email' 		=> $user_email,
				'sisa_cuti' 		=> $sisa_cuti,
				'sisa_remote' 		=> $sisa_remote,
				'user_password' 	=> password_hash($user_password, PASSWORD_DEFAULT)
			);
		}

		$this->m_user->f006_updateUSer($user_id, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            User berhasil diperbaharui.
        </div>');

        redirect(site_url('user'));
	}

	public function delete($user_id)
	{
		$data = array(
			'user_deleted_at' 		=> date('Y-m-d H:i:s')
		);

		$this->m_user->f006_updateUSer($user_id, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            User berhasil di hapus.
        </div>');

		redirect(site_url('user'));
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */