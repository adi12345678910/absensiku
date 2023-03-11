<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance {

  public function situs_offline() 
  {
    if (file_exists(APPPATH . 'config/config.php')) 
    {
      include(APPPATH . 'config/config.php');
      if (isset($config['maintenance']) && $config['maintenance'] === TRUE) 
      {
        include ('maintenance.html');
        exit;
      }
    }
  }

}