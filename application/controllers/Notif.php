<?php
//codesource: www.youtube.com/c/peternakkode

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notif extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_notif');
        $this->load->library('form_validation');
		$this->load->model('m_sakit');
		$this->load->model('m_izin');
		$this->load->model('m_remote');
		$this->load->model('m_cuti_khusus');
		$this->load->model('m_cuti_tahunan');
    }

    public function get_tot(){
        $tot = $this->M_notif->total_rows();
        $result['tot'] = $tot;
        $result['msg'] = "Berhasil direfresh secara realtime";
        echo json_encode($result);
    }


}
