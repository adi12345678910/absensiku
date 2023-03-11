<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluarga extends CI_Controller {

	public function __construct() 
	{
		parent:: __construct();

		if (empty($this->template->user_id())) 
		{
			redirect(site_url(''));
		}

		$this->load->model('m_keluarga');
		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');
	}

	public function index()
	{
		$data['title_page'] = "KELUARGA";

		// Status Pernikahan

		$status_pernikahan = $this->m_keluarga->f001_getStatusPernikahan($this->template->user_id())->result();
		$status_pernikahan_date = $this->m_keluarga->f001_getStatusPernikahan($this->template->user_id())->result();

		if (empty($status_pernikahan)) 
		{
			$data['q_nikah_id'] = '';
			$data['q_nikah_user'] = '';
			$data['q_nikah_status'] = '';
			$data['qStatusPernikahan'] = 'Tidak Diketahui'; 
		}
		else
		{
			foreach ($status_pernikahan as $rws) 
			{
				if ($rws->nikah_status == 'single') 
				{
					$data['q_nikah_id'] = $rws->nikah_id;
					$data['q_nikah_user'] = $rws->nikah_user;
					$data['q_nikah_status'] = $rws->nikah_status;
					$data['qStatusPernikahan'] = 'Single / Lajang';
				}
				elseif ($rws->nikah_status == 'nikah') 
				{
					$data['q_nikah_id'] = $rws->nikah_id;
					$data['q_nikah_user'] = $rws->nikah_user;
					$data['q_nikah_status'] = $rws->nikah_status;
					$data['qStatusPernikahan'] = 'Menikah sejak tanggal : '.tgl_in($rws->nikah_date);
				}
				elseif ($rws->nikah_status == 'cerai') 
				{
					$data['q_nikah_id'] = $rws->nikah_id;
					$data['q_nikah_user'] = $rws->nikah_user;
					$data['q_nikah_status'] = $rws->nikah_status;
					$data['qStatusPernikahan'] = 'Bercerai sejak tanggal : '.tgl_in($rws->nikah_date);
				}
				else
				{
					$data['q_nikah_id'] = '';
					$data['q_nikah_user'] = '';
					$data['q_nikah_status'] = '';
					$data['qStatusPernikahan'] = 'Tidak Diketahui'; 
				}
			}
		}

		// Susunan Keluarga (suami/istri dan anak)
		$data['k_satu_suami'] = $this->m_keluarga->f002_getKeluargaSatuSuami($this->template->user_id());
		$data['k_satu_istri'] = $this->m_keluarga->f003_getKeluargaSatuIstri($this->template->user_id());
		$data['k_satu_anak']  = $this->m_keluarga->f004_getKeluargaSatuAnak($this->template->user_id());

		// Susunan Keluarga (ayah, ibu, saudara sekandung, termasuk anda)
		$data['k_dua_ayah']  = $this->m_keluarga->f005_getKeluargaDuaAyah($this->template->user_id());
		$data['k_dua_ibu'] 	 = $this->m_keluarga->f006_getKeluargaDuaIbu($this->template->user_id());
		$data['k_dua_anak']  = $this->m_keluarga->f007_getKeluargaDuaAnak($this->template->user_id());

		// Ahli Waris 
		$data['ahli_waris']  = $this->m_keluarga->f008_getAhliWaris($this->template->user_id());

		//

		$data['jenisp'] = $this->m_keluarga->f000_getJenisPendidikan()->result();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('profile/v_keluarga', $data);
	}

	//

	public function status_pernikahan()
	{
		$nikah_id 		= $this->input->post('nikah_id');
		$nikah_user 	= $this->input->post('nikah_user');
		$nikah_status 	= $this->input->post('nikah_status');
		$nh_date 		= $this->input->post('nikah_date');

		if (empty($nikah_id) && empty($nikah_user)) 
		{
			if (empty($nh_date)) 
			{
				$nikah_date = '';
			}
			else
			{
				$broken 	= explode(' ', $nh_date);
				$month		= month_number($broken[1]);
				$nikah_date	= $broken[2].'-'.$month.'-'.$broken[0];
			}

			$data = array(
				'nikah_user'	=> 	$this->template->user_id(),
				'nikah_status'	=> 	$nikah_status,
				'nikah_date'	=> 	$nikah_date 
			);

			$this->m_keluarga->f001_2_insertStatusPernikahan($data);
		}
		else
		{
			if (empty($nh_date)) 
			{
				$nikah_date = '';
			}
			else
			{
				$broken 	= explode(' ', $nh_date);
				$month		= month_number($broken[1]);
				$nikah_date	= $broken[2].'-'.$month.'-'.$broken[0];
			}

			$data = array(
				'nikah_status'	=> 	$nikah_status,
				'nikah_date'	=> 	$nikah_date 
			);

			$this->m_keluarga->f001_1_updateStatusPernikahan($nikah_id, $nikah_user, $data);
		}

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Status pernikahan berhasil diperbaharui.
        </div>');

		redirect(site_url('keluarga'));
	
	}

	//

	public function susuan_satu_create()
	{
		$k_satu_status 		= $this->input->post('k_satu_status');
		$k_satu_name 		= $this->input->post('k_satu_name');
		$k_satu_jk 			= $this->input->post('k_satu_jk');
		$k_satu_tmpt_lahir 	= $this->input->post('k_satu_tmpt_lahir');
		$k_stl 				= $this->input->post('k_satu_tgl_lahir');
			$broken 			= explode(' ', $k_stl);
			$month				= month_number($broken[1]);
			$k_satu_tgl_lahir	= $broken[2].'-'.$month.'-'.$broken[0];
		$k_satu_pendidikan 	= $this->input->post('k_satu_pendidikan');
		$k_satu_pekerjaan 	= $this->input->post('k_satu_pekerjaan');

		$data = array(
			'k_satu_user'		=> $this->template->user_id(),
			'k_satu_status'		=> $k_satu_status,
			'k_satu_name'		=> $k_satu_name,
			'k_satu_jk'			=> $k_satu_jk,
			'k_satu_tmpt_lahir'	=> $k_satu_tmpt_lahir,
			'k_satu_tgl_lahir'	=> $k_satu_tgl_lahir,
			'k_satu_pendidikan'	=> $k_satu_pendidikan,
			'k_satu_pekerjaan'	=> $k_satu_pekerjaan
		);	

		$this->m_keluarga->f002_3_getKeluargaSatuCreate($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Susunan Keluarga (suami/istri dan anak) berhasil ditambahkan.
        </div>');

		redirect(site_url('keluarga'));
	}

	public function susunan_satu($k_satu_id, $k_satu_user)
	{
		$data['title_page'] = "EDIT SUSUNAN KELUARGA";

		$data['user_id_ss'] = $this->template->user_id();

		$data['qksatu'] = $this->m_keluarga->f002_1_getKeluargaSatuBy($k_satu_id, $k_satu_user);
		$data['jenisp'] = $this->m_keluarga->f000_getJenisPendidikan()->result();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('profile/v_keluarga_susunan_satu', $data);
	}

	public function susunan_satu_update()
	{
		$k_satu_id 			= $this->input->post('k_satu_id');
		$k_satu_user 		= $this->input->post('k_satu_user');
		$k_satu_status 		= $this->input->post('k_satu_status');
		$k_satu_name 		= $this->input->post('k_satu_name');
		$k_satu_jk 			= $this->input->post('k_satu_jk');
		$k_satu_tmpt_lahir 	= $this->input->post('k_satu_tmpt_lahir');
		$k_stl 				= $this->input->post('k_satu_tgl_lahir');
			$broken 			= explode(' ', $k_stl);
			$month				= month_number($broken[1]);
			$k_satu_tgl_lahir	= $broken[2].'-'.$month.'-'.$broken[0];
		$k_satu_pendidikan 	= $this->input->post('k_satu_pendidikan');
		$k_satu_pekerjaan 	= $this->input->post('k_satu_pekerjaan');

		$data = array(
			'k_satu_status'		=> $k_satu_status,
			'k_satu_name'		=> $k_satu_name,
			'k_satu_jk'			=> $k_satu_jk,
			'k_satu_tmpt_lahir'	=> $k_satu_tmpt_lahir,
			'k_satu_tgl_lahir'	=> $k_satu_tgl_lahir,
			'k_satu_pendidikan'	=> $k_satu_pendidikan,
			'k_satu_pekerjaan'	=> $k_satu_pekerjaan
		);		

		$this->m_keluarga->f002_2_getKeluargaSatuUpdate($k_satu_id, $k_satu_user, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Susunan Keluarga (suami/istri dan anak) berhasil diperbaharui.
        </div>');

		redirect(site_url('keluarga'));
	}

	public function susunan_satu_delete($k_satu_id, $k_satu_user)
	{
		if ($k_satu_user != $this->template->user_id()) 
		{
			$this->session->set_flashdata('alert', 
			'<div class="alert alert-danger alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            Anda tidak berhak menghapus Susunan Keluarga (suami/istri dan anak) orang lain.
	        </div>');
		}
		else
		{
			$this->m_keluarga->f002_4_getKeluargaSatuDelete($k_satu_id);

			$this->session->set_flashdata('alert', 
			'<div class="alert alert-success alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            Susunan Keluarga (suami/istri dan anak) berhasil dihapus.
	        </div>');
		}

		redirect(site_url('keluarga'));
	}

	//

	public function susunan_dua_create()
	{
		$k_dua_status 		= $this->input->post('k_dua_status');
		$k_dua_name 		= $this->input->post('k_dua_name');
		$k_dua_jk 			= $this->input->post('k_dua_jk');
		$k_dua_tmpt_lahir 	= $this->input->post('k_dua_tmpt_lahir');
		$k_dtl 				= $this->input->post('k_dua_tgl_lahir');
			$broken 			= explode(' ', $k_dtl);
			$month				= month_number($broken[1]);
			$k_dua_tgl_lahir	= $broken[2].'-'.$month.'-'.$broken[0];
		$k_dua_pendidikan 	= $this->input->post('k_dua_pendidikan');
		$k_dua_pekerjaan 	= $this->input->post('k_dua_pekerjaan');

		$data = array(
			'k_dua_user'		=> $this->template->user_id(),
			'k_dua_status'		=> $k_dua_status,
			'k_dua_name'		=> $k_dua_name,
			'k_dua_jk'			=> $k_dua_jk,
			'k_dua_tmpt_lahir'	=> $k_dua_tmpt_lahir,
			'k_dua_tgl_lahir'	=> $k_dua_tgl_lahir,
			'k_dua_pendidikan'	=> $k_dua_pendidikan,
			'k_dua_pekerjaan'	=> $k_dua_pekerjaan
		);	

		$this->m_keluarga->f005_3_getKeluargaDuaCreate($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Susunan Keluarga (ayah, ibu, saudara sekandung, termasuk anda) berhasil ditambahkan.
        </div>');

		redirect(site_url('keluarga'));
	}

	public function susunan_dua($k_dua_id, $k_dua_user)
	{
		$data['title_page'] = "EDIT SUSUNAN KELUARGA";

		$data['user_id_ss'] = $this->template->user_id();

		$data['qkdua'] = $this->m_keluarga->f005_1_getKeluargaDuaBy($k_dua_id, $k_dua_user);
		$data['jenisp'] = $this->m_keluarga->f000_getJenisPendidikan()->result();

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('profile/v_keluarga_susunan_dua', $data);
	}

	public function susunan_dua_update()
	{
		$k_dua_id 			= $this->input->post('k_dua_id');
		$k_dua_user 		= $this->input->post('k_dua_user');
		$k_dua_status 		= $this->input->post('k_dua_status');
		$k_dua_name 		= $this->input->post('k_dua_name');
		$k_dua_jk 			= $this->input->post('k_dua_jk');
		$k_dua_tmpt_lahir 	= $this->input->post('k_dua_tmpt_lahir');
		$k_dtl 				= $this->input->post('k_dua_tgl_lahir');
			$broken 			= explode(' ', $k_dtl);
			$month				= month_number($broken[1]);
			$k_dua_tgl_lahir	= $broken[2].'-'.$month.'-'.$broken[0];
		$k_dua_pendidikan 	= $this->input->post('k_dua_pendidikan');
		$k_dua_pekerjaan 	= $this->input->post('k_dua_pekerjaan');

		$data = array(
			'k_dua_status'		=> $k_dua_status,
			'k_dua_name'		=> $k_dua_name,
			'k_dua_jk'			=> $k_dua_jk,
			'k_dua_tmpt_lahir'	=> $k_dua_tmpt_lahir,
			'k_dua_tgl_lahir'	=> $k_dua_tgl_lahir,
			'k_dua_pendidikan'	=> $k_dua_pendidikan,
			'k_dua_pekerjaan'	=> $k_dua_pekerjaan
		);		

		$this->m_keluarga->f005_2_getKeluargaDuaUpdate($k_dua_id, $k_dua_user, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Susunan Keluarga (ayah, ibu, saudara sekandung, termasuk anda) berhasil diperbaharui.
        </div>');

		redirect(site_url('keluarga'));
	}

	public function susunan_dua_delete($k_dua_id, $k_dua_user)
	{
		if ($k_dua_user != $this->template->user_id()) 
		{
			$this->session->set_flashdata('alert', 
			'<div class="alert alert-danger alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            Anda tidak berhak menghapus Susunan Keluarga (ayah, ibu, saudara sekandung, termasuk anda) orang lain.
	        </div>');
		}
		else
		{
			$this->m_keluarga->f005_4_getKeluargaDuaDelete($k_dua_id);

			$this->session->set_flashdata('alert', 
			'<div class="alert alert-success alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            Susunan Keluarga (ayah, ibu, saudara sekandung, termasuk anda) berhasil dihapus.
	        </div>');
	    }

		redirect(site_url('keluarga'));
	}

	//

	public function ahli_waris_create()
	{
		$ahli_waris_name 	= $this->input->post('ahli_waris_name');
		$ahli_waris_hub 	= $this->input->post('ahli_waris_hub');

		$data = array(
			'ahli_waris_user'		=> $this->template->user_id(),
			'ahli_waris_name'		=> $ahli_waris_name,
			'ahli_waris_hub'		=> $ahli_waris_hub
		);		

		$this->m_keluarga->f011_getAhliWarisCreate($data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Ahli waris berhasil ditambahkan.
        </div>');

		redirect(site_url('keluarga'));
	}

	public function ahli_waris($ahli_waris_id, $ahli_waris_user)
	{
		$data['title_page'] = "EDIT AHLI WARIS";

		$data['user_id_ss'] = $this->template->user_id();

		$data['qkaw'] = $this->m_keluarga->f009_getAhliWarisBy($ahli_waris_id, $ahli_waris_user);

		$data['alert'] 		= $this->session->flashdata('alert');

		$this->template->show('profile/v_ahli_waris', $data);
	}

	public function ahli_waris_update()
	{
		$ahli_waris_id 		= $this->input->post('ahli_waris_id');
		$ahli_waris_user 	= $this->input->post('ahli_waris_user');
		$ahli_waris_name 	= $this->input->post('ahli_waris_name');
		$ahli_waris_hub 	= $this->input->post('ahli_waris_hub');

		$data = array(
			'ahli_waris_name'		=> $ahli_waris_name,
			'ahli_waris_hub'		=> $ahli_waris_hub
		);		

		$this->m_keluarga->f010_getAhliWarisUpdate($ahli_waris_id, $ahli_waris_user, $data);

		$this->session->set_flashdata('alert', 
		'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Ahli waris berhasil diperbaharui.
        </div>');

		redirect(site_url('keluarga'));
	}

	public function ahli_waris_delete($ahli_waris_id, $ahli_waris_user)
	{
		if ($ahli_waris_user != $this->template->user_id()) 
		{
			$this->session->set_flashdata('alert', 
			'<div class="alert alert-danger alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            Anda tidak berhak menghapus Ahli waris orang lain.
	        </div>');
		}
		else
		{
			$this->m_keluarga->f012_getAhliWarisDelete($ahli_waris_id);

			$this->session->set_flashdata('alert', 
			'<div class="alert alert-success alert-dismissible" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            Ahli waris berhasil dihapus.
	        </div>');
	    }

		redirect(site_url('keluarga'));
	}

}

/* End of file Pendidikan_formal.php */
/* Location: ./application/controllers/Pendidikan_formal.php */