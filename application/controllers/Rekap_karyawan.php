<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_karyawan extends CI_Controller {

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
		$data['title_page'] = "REKAP KARYAWAN";

        $data['qLembaga']   = $this->m_rekap_karyawan->f001_getLembaga()->result();

        $data['alert']      = $this->session->flashdata('alert');

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
                        $data['karyawan_absen'] = $this->m_rekap_karyawan->f004_filterSemuaLembaga($_GET["lembaga"], $tgl_mulai, $tgl_akhir)->result();
                    }
                    else
                    {
                        $data['karyawan_absen'] = $this->m_rekap_karyawan->f003_filterAbsen($_GET["name"], $tgl_mulai, $tgl_akhir)->result();
                    }

                    $data['collapse'] = '';
                }
            }
            else
            {
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
                            $data['karyawan_absen'] = $this->m_rekap_karyawan->f004_filterSemuaLembaga($_GET["lembaga"], $tgl_mulai, $tgl_akhir)->result();
                        }
                        else
                        {
                            $data['karyawan_absen'] = $this->m_rekap_karyawan->f003_filterAbsen($_GET["name"], $tgl_mulai, $tgl_akhir)->result();
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

                        $data['karyawan_absen'] = $this->m_rekap_karyawan->f003_filterAbsen($_GET["name"], $tgl_mulai, $tgl_akhir)->result();

                        $data['collapse'] = '';
                    }
                }
            }

        }

		$this->template->show('rekap_karyawan/v_rekap_karyawan', $data);
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

    public function get_nama_karyawan_absen()
    {
        $lembaga_id = $this->input->post('lembaga_id');
        $nama_karyawan = $this->m_rekap_karyawan->f002_getNamaKaryawan($lembaga_id);

        if (count($nama_karyawan)>0) 
        {
            $nama_select_box = ''; 
            $nama_select_box .= '<option value="" selected disabled>Silahkan Pilih</option>';
            foreach ($nama_karyawan as $nama) 
            {
                $nama_select_box .='<option value='.$nama->user_id.'>'.ucwords(strtolower($nama->user_name)).'</option>';
            }
            $nama_select_box .= '';

            echo json_encode($nama_select_box);
        }
    }

    public function input_absen()
    {
        $url_absen     = $this->input->post('url_absen');

        $absen_user     = $this->input->post('absen_user');
        $tgl_absen      = $this->input->post('absen_date');
        $broken         = explode(' ', $tgl_absen);
            $month      = month_number($broken[1]);
            $absen_date = $broken[2].'-'.$month.'-'.$broken[0];

        $absen_masuk    = $this->input->post('absen_masuk');
        $jam_masuk  = strtotime(date('H:i', strtotime($this->m_rekap_karyawan->f009_jamMasuk()->row()->setting_time)));
        $user_masuk = strtotime(date('H:i', strtotime($absen_masuk)));
        $point_masuk = ($jam_masuk-$user_masuk)/60;

        $absen_pulang   = $this->input->post('absen_pulang');
        $jam_pulang  = strtotime(date('H:i', strtotime($this->m_rekap_karyawan->f010_jamPulang()->row()->setting_time)));
        $user_pulang = strtotime(date('H:i', strtotime($absen_pulang)));
        $point_pulang = ($user_pulang-$jam_pulang)/60;

        $cekAbsen = $this->m_rekap_karyawan->f007_inputAbsen($absen_user, $absen_date);
        if ($cekAbsen->num_rows() > 0) 
        {
            $this->session->set_flashdata('alert', 
            '<div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Karyawan tersebut sudah absen pada tanggal '.tgl_in($absen_date).'.
            </div>');

            redirect(site_url('rekap_karyawan'));
        }
        else
        {
            if (empty($absen_pulang)) 
            {
                $data = array(
                    'absen_user'        => $absen_user,  
                    'absen_date'        => $absen_date,  
                    'absen_masuk'       => $absen_masuk,
                    'absen_masuk_poin'  => $point_masuk,
                    'absen_masuk_status'    => 2
                );
            }
            else
            {
                $data = array(
                    'absen_user'            => $absen_user,  
                    'absen_date'            => $absen_date,  
                    'absen_masuk'           => $absen_masuk, 
                    'absen_masuk_poin'      => $point_masuk,
                    'absen_masuk_status'    => 2,
                    'absen_pulang'          => $absen_pulang,
                    'absen_pulang_poin'     => $point_pulang,
                    'absen_pulang_status'   => 3
                );
            }

            $this->m_rekap_karyawan->f008_absenMasuk($data);

            $this->session->set_flashdata('alert', 
            '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Behasil input absen.
            </div>');

            redirect(site_url('rekap_karyawan/?'.$url_absen));
        }
    }
}

/* End of file Rekap_karyawan.php */
/* Location: ./application/controllers/Rekap_karyawan.php */