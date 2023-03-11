<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

	public function __construct() 
	{
		parent:: __construct();

		$this->load->model('m_role');
		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');
	}

	public function index()
	{
		$data['title_page'] = "ROLE";

		$data['qRole'] = $this->m_role->f001_getRole()->result();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('management/v_role', $data);
	}

	public function create()
	{
		$role_name 		= $this->input->post('role_name');
		$role_desk 		= $this->input->post('role_desk');
		$role_status 	= $this->input->post('role_status');

		$data = array(
			'role_name' 		=> $role_name,
			'role_desk' 		=> $role_desk,
			'role_status'		=> $role_status,
			'role_created_at' 	=> date('Y-m-d H:i:s')
		);

		$this->m_role->f004_createRole($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Role berhasil di tambahkan.
        </div>');

		redirect(site_url('role'));
	}

	public function edit($role_id)
	{
		$data['title_page'] = "EDIT ROLE";

		$data['qRoleBy'] = $this->m_role->f002_getRoleBy($role_id)->result();

		$this->template->show('management/v_role_edit', $data);
	}

	public function update()
	{
		$role_id 		= $this->input->post('role_id');
		$role_name 		= $this->input->post('role_name');
		$role_desk 		= $this->input->post('role_desk');
		$role_status 	= $this->input->post('role_status');

		$data = array(
			'role_name' 		=> $role_name,
			'role_desk' 		=> $role_desk,
			'role_status'		=> $role_status,
			'role_updated_at'	=> date('Y-m-d H:i:s')
		);

		$this->m_role->f003_updateRole($role_id, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Role berhasil di perbaharui.
        </div>');

		redirect(site_url('role'));
	}

	public function delete($role_id)
	{
		$data = array(
			'role_deleted_at' 		=> date('Y-m-d H:i:s')
		);

		$this->m_role->f003_updateRole($role_id, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Role berhasil di hapus.
        </div>');

		redirect(site_url('role'));
	}

}

/* End of file Role.php */
/* Location: ./application/controllers/Role.php */