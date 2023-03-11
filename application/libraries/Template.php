<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**

 * Template Class

 *

 * @package     CodeIgniter

 * @subpackage  Libraries

 * @category    Class

 * @author      Ripan Nur Alimajid

 * @copyright	Copyright (c) 2017

 * @link        ripanmajid@yahoo.com

 */



class Template {



  protected $_CI;



  // var $template_data = array();



  public function __construct()

  {

    $this->_CI =&get_instance();



    $this->_CI->load->model('m_auth');



    date_default_timezone_set("Asia/Bangkok");

  }



  // session user login

  public function getSession()

  {

    return $this->_CI->session->userdata('user_id');

  }



  // get user id

  public function user_id()

  {

    return $this->_CI->m_auth->f003_getUser($this->getSession())->row()->user_id;

  }



  // get user id

  public function role_id()

  {

    return $this->_CI->m_auth->f003_getUser($this->getSession())->row()->role_id;

  }

  public function jabatan_id()

  {

    return $this->_CI->m_auth->f003_getUser($this->getSession())->row()->jabatan_id;

  }

  public function posisi_id()

  {

    return $this->_CI->m_auth->f003_getUser($this->getSession())->row()->posisi_id;

  }

  public function divisi_id()

  {

    return $this->_CI->m_auth->f003_getUser($this->getSession())->row()->divisi_id;

  }

  public function informasi_id()

  {

    return $this->_CI->m_auth->f003_getUser($this->getSession())->row()->informasi_id;

  }


  // get user id

  public function lembaga_id()

  {

    return $this->_CI->m_auth->f003_getUser($this->getSession())->row()->lembaga_id;

  }



  public function show($template, $data = null)

  {

    $check = $this->_CI->session->userdata('logged_in');

    if ($check != TRUE) 

    {

      redirect(site_url(''));

    }



    // title web

    $data['title_web']  = "Absensi EMC";



    // url

    $data['url_1'] = $this->_CI->uri->segment(1);

    $data['url_2'] = $this->_CI->uri->segment(2);

    $data['url_3'] = $this->_CI->uri->segment(3);

    $data['url_4'] = $this->_CI->uri->segment(4);



    // data user

    $dataUser           = $this->_CI->m_auth->f003_getUser($this->getSession())->row();



    $data['template_show_name']         = $dataUser->user_name;

    $data['template_show_email']        = $dataUser->user_email;

    $data['template_show_photo']        = $dataUser->user_photo;

    $data['template_show_gender']       = $dataUser->user_gender;

    $data['template_show_divisi']       = $dataUser->user_divisi;

    $data['template_show_role']         = $dataUser->user_role;

    $data['template_show_sisa_remote']  = $dataUser->sisa_remote;

    $data['template_show_sisa_cuti']    = $dataUser->sisa_cuti;

    $data['template_show_posisi']       = $dataUser->user_posisi;

    $data['template_show_lembaga']      = $dataUser->user_lembaga;

    $data['template_show_jabatan']      = $dataUser->user_jabatan;

    $data['template_show_role_name']    = $dataUser->role_name;

  

    $data['template_show_jabatan_home']      = $dataUser->jabatan_name;

    $data['template_show_divisi_home']       = $dataUser->divisi_name;

    $data['template_show_posisi_home']       = $dataUser->posisi_name;

    $data['template_show_judul_informasi_home']            = $dataUser->judul_informasi;

    $data['template_show_keterangan_informasi_home']       = $dataUser->keterangan_informasi;



    // template

    $data['top_bar']    = $this->_CI->load->view('template/v_top_bar', $data, true);

    $data['sidebar']    = $this->_CI->load->view('template/v_sidebar', $data, true);

    $data['content']    = $this->_CI->load->view($template, $data, true);



    return $this->_CI->load->view('template/v_render', $data);

  }



}

