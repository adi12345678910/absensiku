<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

	public function index()
	{
		$this->load->view('errors/custom/error_404');
	}

}

/* End of file errors.php */
/* Location: ./application/controllers/errors.php */