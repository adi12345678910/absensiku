<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() 
	{
		parent:: __construct();

		$this->load->model('m_auth');

		date_default_timezone_set("Asia/Bangkok");
		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');
	}

	public function index()
	{
		// check session login user
    $check = $this->session->userdata('logged_in');

    if ($check != TRUE) 
    {
			$data['alert'] 		= $this->session->flashdata('alert');

			$this->load->view('auth/v_login', $data);
    }
    else
    {
    	redirect(site_url('home'));
    }
	}

	public function signin()
	{
		$nik 		= $this->input->post('nik');

		$password 	= $this->input->post('password');

		$checkNIK = $this->m_auth->f001_getNIK($nik);

		if ($checkNIK->num_rows() > 0) 
		{
			// get data user db
			$userData = $checkNIK->row();

			// get password db
			$passwordHash = $userData->user_password;

			if (password_verify($password, $passwordHash)) 
			{
				// get status db
				$status = $userData->user_status;

				if ($status == 1) 
				{
					# set session
					$sess_data['logged_in']	= TRUE;
					$sess_data['user_id'] 	= $userData->user_id;

					$this->session->set_userdata($sess_data);

					$data = array(
		        'user_last_login' => date("Y-m-d H:i:s"),
		        'user_jaringan'		=> 'on'
					);

					$this->m_auth->f002_updateLogin($userData->user_id, $data);

					redirect(site_url('home'));
				}
				else
				{
					$this->session->set_flashdata('alert', '
						<div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Akun anda tidak aktif, silahkan hubungi admin.
            </div>
          ');

          redirect(site_url('auth'));
				}
			}
			else
			{
				$this->session->set_flashdata('alert', '
					<div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Password yang anda masukan salah.
          </div>
        ');

        redirect(site_url('auth'));
			}
		}
		else
		{
			$this->session->set_flashdata('alert', '
				<div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Username yang anda masukan salah.
        </div>
      ');

      redirect(site_url('auth'));
		}
	}

	public function signout()
	{
		$check = $this->session->userdata('logged_in');

		if (empty($check) AND !isset($check) AND $check != TRUE) 
		{
			redirect(site_url(''));
		}
		else
		{
			// set session

			$sess_data['logged_in']  = '';

			$this->session->set_userdata($sess_data);

			$data = array('user_jaringan' => 'off');

			$this->m_auth->f002_updateLogin($this->template->user_id(), $data);

			redirect(site_url(''));
		}

	}

	public function signin_kegiatan()
	{
		// $nik = "M0917002";

		// print_r($_POST);
		// echo "<br>";
		// echo "<br>";

		// echo json_encode($_POST);
		// echo "<br>";
		// echo "<br>";

		if (empty($_POST['nik']) || empty($_POST['password'])) 
		{
			redirect('');
		}
		else
		{
			$checkNIK = $this->m_auth->f001_getNIK($_POST['nik']);

			if ($checkNIK->num_rows() > 0) 
			{
				// get data user db
				$userData = $checkNIK->row();

				// get password db
				$passwordHash = $userData->user_password;

				if (password_verify($_POST['password'], $passwordHash)) 
				{
					// get status db
					$status = $userData->user_status;

					if ($status == 1) 
					{
						$data = $checkNIK;

						echo json_encode($data);
					}
					else
					{
						$data = NULL;
					}
				}
				else
				{
					$data = NULL;
				}
			}
			else
			{
				$data = NULL;
			}
		}

		// echo "<pre>";
		// 	print_r($checkNIK->result());
		// echo "</pre>";

		// echo "<br>";

		// echo "test";
	}




}



/* End of file Auth.php */

/* Location: ./application/controllers/Auth.php */