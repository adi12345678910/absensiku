<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todo_list extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('m_todo_list');
		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');
	}

	public function index()
	{
		$data['title_page'] = "MY TODO LIST";

		$data['alert'] 		= $this->session->flashdata('alert');

		$data['q_todo'] = $this->m_todo_list->f001_get($this->template->user_id());

		$this->template->show('todo_list/v_todo_list', $data);	
	}

	public function done($todo_id)
	{
		$data = array(
			'todo_status' 	=> 'done', 
			'todo_tgl_done' => date('Y-m-d H:i:s') 
		);

		$this->m_todo_list->f002_done($todo_id, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Todo List berhasil di laksanakan.
        </div>');

		redirect(site_url('todo_list'));
	}

	public function delete($todo_id)
	{
		$this->m_todo_list->f003_delete($todo_id);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Todo List berhasil dihapus.
        </div>');

		redirect(site_url('todo_list'));
	}

	public function tampil()
	{
		$data['title_page'] = "TODO LIST";

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('todo_list/v_todo', $data);
	}

	public function todo()
	{

		$data['title_page'] = "PENGAJUAN SAKIT";

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('sakit/v_pengajuan', $data);
		$todo_name 	= $this->input->post('todo_name');
		$todo_desk 	= $this->input->post('todo_desk');
		$t_kerja 	= $this->input->post('todo_kerja');
		if (empty($t_kerja)) 
		{
			$todo_kerja = "0";
		}
		else
		{
			$todo_kerja = $this->input->post('todo_kerja');
		}

		$data = array(
			'todo_name' 		=> $todo_name, 
			'todo_desk' 		=> $todo_desk, 
			'todo_kerja' 		=> $todo_kerja,
			'todo_user'			=> $this->template->user_id(),
			'todo_status'		=> 'todo',
			'todo_tgl_input'	=> date('Y-m-d H:i:s') 
		);

		$this->m_todo_list->f009_createTodo($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Berhasil menambahakn Todo List.
        </div>');

		redirect(site_url('todo_list'));
	}

}

/* End of file Todo_list.php */
/* Location: ./application/controllers/Todo_list.php */