<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_todo_list extends CI_Model {

	public function f001_get($todo_user)
	{
		$this->db->order_by('todo_status DESC, todo_tgl_input DESC');
		$this->db->where('todo_user', $todo_user);
		$this->db->join('p_program_kerja', 'p_program_kerja.kerja_id=t_todo.todo_kerja');
		return $this->db->get('t_todo');
	}

	public function f002_done($todo_id, $data)
	{
		$this->db->where('todo_id', $todo_id);
		return $this->db->update('t_todo', $data);
	}

	public function f003_delete($todo_id)
	{
		$this->db->where('todo_id', $todo_id);
		$this->db->delete('t_todo');
	}

	public function f009_createTodo($data)
	{
		return $this->db->insert('t_todo', $data);
	}

	public function f010_cekTodo($todo_user)
	{
		$this->db->where('todo_user', $todo_user);
		$this->db->where('todo_status', 'todo');
		return $this->db->get('t_todo');
	}

}

/* End of file M_todo_list.php */
/* Location: ./application/models/M_todo_list.php */