<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todo_list_karyawan extends CI_Controller {

	public function __construct() 
	{
		parent:: __construct();

		$this->load->model('m_rekap_karyawan');
        $this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');
	}

	public function index()
	{
		$data['title_page'] = "TODO LIST KARYAWAN";

        $data['qLembaga']   = $this->m_rekap_karyawan->f001_getLembaga()->result();

        $user_id = $this->template->user_id();
        $role_id = $this->template->role_id();
        $lembaga_id = $this->template->lembaga_id();

        if (empty($_GET))
        {
            if ($lembaga_id == 12 AND $role_id == 1) 
            {
                $data['mulai'] = '';
                $data['akhir'] = '';
                $data['lembaga'] = '';
                $data['name'] = '';
                $data['nama_karyawan'] = NULL;
                $data['karyawan_absen'] = NULL;
                $data['collapse'] = 'collapse';
            }
            else
            {
            	// EMC
                if ($lembaga_id == 4) 
                {
                    $data['mulai'] = '';
                    $data['akhir'] = '';
                    $data['lembaga'] = '';
                    $data['name'] = '';
                    $data['nama_karyawan'] = NULL;
                    $data['karyawan_absen'] = NULL;
                    $data['collapse'] = 'collapse';
                }
                else
                {
                    $data['mulai'] = '';
                    $data['akhir'] = '';
                    $data['name'] = '';
                    $data['nama_karyawan'] = $this->m_rekap_karyawan->f002_getNamaKaryawan($lembaga_id);
                    $data['karyawan_absen'] = NULL;
                    $data['collapse'] = 'collapse';
                }
            }
        }
        else
        {
            if ($lembaga_id == 12 AND $role_id == 1) 
            {
                if (empty($_GET["mulai"]) OR empty($_GET["akhir"]) OR empty($_GET["lembaga"]) OR empty($_GET["name"])) 
                {
                    $data['mulai'] = '';
                    $data['akhir'] = '';
                    $data['lembaga'] = '';
                    $data['name'] = '';
                    $data['nama_karyawan'] = NULL;
                    $data['karyawan_absen'] = NULL;
                    $data['collapse'] = 'collapse';
                }
                else
                {
                    $data['mulai'] = $_GET["mulai"];
                        $broken_mulai         = explode(' ', $_GET["mulai"]);
                        $month_mulai          = month_number($broken_mulai[1]);
                        $tgl_mulai   = $broken_mulai[2].'-'.$month_mulai.'-'.$broken_mulai[0];
                    $data['akhir'] = $_GET["akhir"];
                        $broken_akhir         = explode(' ', $_GET["akhir"]);
                        $month_akhir          = month_number($broken_akhir[1]);
                        $tgl_akhir   = $broken_akhir[2].'-'.$month_akhir.'-'.$broken_akhir[0];
                    $data['lembaga'] = $_GET["lembaga"];

                    $data['name'] = $_GET["name"];

                    $data['nama_karyawan'] = $this->m_rekap_karyawan->f002_getNamaKaryawan($_GET["lembaga"]);

                    if ($_GET["name"] == 'semua_nama') 
                    {
                        $data['karyawan_absen'] = $this->m_rekap_karyawan->f006_filterSemuaLembaga($_GET["lembaga"], $tgl_mulai, $tgl_akhir)->result();
                    }
                    else
                    {
                        $data['karyawan_absen'] = $this->m_rekap_karyawan->f005_filterAbsen($_GET["name"], $tgl_mulai, $tgl_akhir)->result();
                    }

                    $data['collapse'] = '';
                }
            }
            else
            {
            	// EMC
                if ($lembaga_id == 4) 
                {
                    if (empty($_GET["mulai"]) OR empty($_GET["akhir"]) OR empty($_GET["lembaga"]) OR empty($_GET["name"])) 
                    {
                        $data['mulai'] = '';
                        $data['akhir'] = '';
                        $data['lembaga'] = '';
                        $data['name'] = '';
                        $data['nama_karyawan'] = NULL;
                        $data['karyawan_absen'] = NULL;
                        $data['collapse'] = 'collapse';
                    }
                    else
                    {
                        $data['mulai'] = $_GET["mulai"];
                            $broken_mulai         = explode(' ', $_GET["mulai"]);
                            $month_mulai          = month_number($broken_mulai[1]);
                            $tgl_mulai   = $broken_mulai[2].'-'.$month_mulai.'-'.$broken_mulai[0];
                        $data['akhir'] = $_GET["akhir"];
                            $broken_akhir         = explode(' ', $_GET["akhir"]);
                            $month_akhir          = month_number($broken_akhir[1]);
                            $tgl_akhir   = $broken_akhir[2].'-'.$month_akhir.'-'.$broken_akhir[0];
                        $data['lembaga'] = $_GET["lembaga"];

                        $data['name'] = $_GET["name"];

                        $data['nama_karyawan'] = $this->m_rekap_karyawan->f002_getNamaKaryawan($_GET["lembaga"]);

                        if ($_GET["name"] == 'semua_nama') 
                        {
                            $data['karyawan_absen'] = $this->m_rekap_karyawan->f006_filterSemuaLembaga($_GET["lembaga"], $tgl_mulai, $tgl_akhir)->result();
                        }
                        else
                        {
                            $data['karyawan_absen'] = $this->m_rekap_karyawan->f005_filterAbsen($_GET["name"], $tgl_mulai, $tgl_akhir)->result();
                        }

                        $data['collapse'] = '';
                    }
                }
                else
                {
                    if (empty($_GET["mulai"]) OR empty($_GET["akhir"]) OR empty($_GET["name"])) 
                    {
                        $data['mulai'] = '';
                        $data['akhir'] = '';
                        $data['name'] = '';
                        $data['nama_karyawan'] = $this->m_rekap_karyawan->f002_getNamaKaryawan($lembaga_id);
                        $data['karyawan_absen'] = NULL;
                        $data['collapse'] = 'collapse';
                    }
                    else
                    {
                        $data['mulai'] = $_GET["mulai"];
                            $broken_mulai         = explode(' ', $_GET["mulai"]);
                            $month_mulai          = month_number($broken_mulai[1]);
                            $tgl_mulai   = $broken_mulai[2].'-'.$month_mulai.'-'.$broken_mulai[0];
                        $data['akhir'] = $_GET["akhir"];
                            $broken_akhir         = explode(' ', $_GET["akhir"]);
                            $month_akhir          = month_number($broken_akhir[1]);
                            $tgl_akhir   = $broken_akhir[2].'-'.$month_akhir.'-'.$broken_akhir[0];
                        $data['name'] = $_GET["name"];
                        $data['nama_karyawan'] = $this->m_rekap_karyawan->f002_getNamaKaryawan($lembaga_id);

                        $data['karyawan_absen'] = $this->m_rekap_karyawan->f005_filterAbsen($_GET["name"], $tgl_mulai, $tgl_akhir)->result();

                        $data['collapse'] = '';
                    }
                }
            }

        }

        
        

		$this->template->show('todo_list_karyawan/v_todo_list_karyawan', $data);
	}

	public function get_nama_karyawan()
    {
        $lembaga_id = $this->input->post('lembaga_id');
        $nama_karyawan = $this->m_rekap_karyawan->f002_getNamaKaryawan($lembaga_id);

        if (count($nama_karyawan)>0) 
        {
            $nama_select_box = ''; 
            $nama_select_box .= '<option value="semua_nama" selected>Pilih Semua</option>';
            foreach ($nama_karyawan as $nama) 
            {
                $nama_select_box .='<option value='.$nama->user_id.'>'.ucwords(strtolower($nama->user_name)).'</option>';
            }
            $nama_select_box .= '';

            echo json_encode($nama_select_box);
        }
    }
}

/* End of file Todo_list_karyawan.php */
/* Location: ./application/controllers/Todo_list_karyawan.php */