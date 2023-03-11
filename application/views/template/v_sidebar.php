<style>
  .label-aja {
   
    line-height: 18px;
    background-color: rgb(196, 8, 8);
    padding: 2px 7px;
    border-radius: 50%; 
}
  </style>
<?php
$admin_sakit=$this->m_sakit->hitungJumlahAdmin();
$admin_izin=$this->m_izin->hitungJumlahAdmin();
$admin_remote=$this->m_remote->hitungJumlahAdmin();
$admin_cuti_tahunan=$this->m_cuti_khusus->hitungJumlahAdmin();
$admin_cuti_khusus=$this->m_cuti_tahunan->hitungJumlahAdmin();
?>

<?php
$direktur_sakit=$this->m_sakit->hitungJumlahDirektur();
$direktur_izin=$this->m_izin->hitungJumlahDirektur();
$direktur_remote=$this->m_remote->hitungJumlahDirektur();
$direktur_cuti_tahunan=$this->m_cuti_khusus->hitungJumlahDirektur();
$direktur_cuti_khusus=$this->m_cuti_tahunan->hitungJumlahDirektur();

?>
<?php
$hrd_sakit=$this->m_sakit->hitungJumlahHrd();
$hrd_izin=$this->m_izin->hitungJumlahHrd();
$hrd_remote=$this->m_remote->hitungJumlahHrd();
$hrd_cuti_tahunan=$this->m_cuti_khusus->hitungJumlahHrd();
$hrd_cuti_khusus=$this->m_cuti_tahunan->hitungJumlahHrd();
?>

<?php
$cmo_sakit=$this->m_sakit->hitungJumlahCmo();
$cmo_izin=$this->m_izin->hitungJumlahCmo();
$cmo_remote=$this->m_remote->hitungJumlahCmo();
$cmo_cuti_tahunan=$this->m_cuti_khusus->hitungJumlahCmo();
$cmo_cuti_khusus=$this->m_cuti_tahunan->hitungJumlahCmo();
?>

<?php
$sv2_sakit=$this->m_sakit->hitungJumlahSv2();
$sv2_izin=$this->m_izin->hitungJumlahSv2();
$sv2_remote=$this->m_remote->hitungJumlahSv2();
$sv2_cuti_tahunan=$this->m_cuti_khusus->hitungJumlahSv2();
$sv2_cuti_khusus=$this->m_cuti_tahunan->hitungJumlahSv2();
?>

<?php
$sv3_sakit=$this->m_sakit->hitungJumlahSv3();
$sv3_izin=$this->m_izin->hitungJumlahSv3();
$sv3_remote=$this->m_remote->hitungJumlahSv3();
$sv3_cuti_tahunan=$this->m_cuti_khusus->hitungJumlahSv3();
$sv3_cuti_khusus=$this->m_cuti_tahunan->hitungJumlahSv3();
?>

<?php
$sv4_sakit=$this->m_sakit->hitungJumlahSv4();
$sv4_izin=$this->m_izin->hitungJumlahSv4();
$sv4_remote=$this->m_remote->hitungJumlahSv4();
$sv4_cuti_tahunan=$this->m_cuti_khusus->hitungJumlahSv4();
$sv4_cuti_khusus=$this->m_cuti_tahunan->hitungJumlahSv4();
?>

<?php
$sv5_sakit=$this->m_sakit->hitungJumlahSv5();
$sv5_izin=$this->m_izin->hitungJumlahSv5();
$sv5_remote=$this->m_remote->hitungJumlahSv5();
$sv5_cuti_tahunan=$this->m_cuti_khusus->hitungJumlahSv5();
$sv5_cuti_khusus=$this->m_cuti_tahunan->hitungJumlahSv5();
?>

<?php
$sv6_sakit=$this->m_sakit->hitungJumlahSv6();
$sv6_izin=$this->m_izin->hitungJumlahSv6();
$sv6_remote=$this->m_remote->hitungJumlahSv6();
$sv6_cuti_tahunan=$this->m_cuti_khusus->hitungJumlahSv6();
$sv6_cuti_khusus=$this->m_cuti_tahunan->hitungJumlahSv6();
?>

<?php
$sv7_sakit=$this->m_sakit->hitungJumlahSv7();
$sv7_izin=$this->m_izin->hitungJumlahSv7();
$sv7_remote=$this->m_remote->hitungJumlahSv7();
$sv7_cuti_tahunan=$this->m_cuti_khusus->hitungJumlahSv7();
$sv7_cuti_khusus=$this->m_cuti_tahunan->hitungJumlahSv7();
?>


<aside id="leftsidebar" class="sidebar">

    <!-- User Info -->
    <div class="user-info">

        <div class="image">
            <?php if (!empty($template_show_photo)): ?>
                <img src="<?php echo base_url('assets/images/users/'.$template_show_photo); ?>" width="48" height="48" alt="User"  />
                
            <?php else: ?>
                <?php if ($template_show_gender == 'l'): ?>
                    <img src="<?php echo base_url(); ?>assets/images/users/no-man.png" width="48" height="48" alt="User" />
                <?php elseif($template_show_gender == 'p'): ?>
                    <img src="<?php echo base_url(); ?>assets/images/users/no-woman.png" width="48" height="48" alt="User" />
                <?php else: ?>
                    <img src="<?php echo base_url(); ?>assets/images/users/no-gender.jpg" width="48" height="48" alt="User" />
                <?php endif ?>
            <?php endif ?>
        </div>



        
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo ucwords($template_show_name); ?></div>
            <div class="name"><?php echo $template_show_role_name; ?>  </div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">

                    <li>
                        <?php echo anchor('auth/signout', '<i class="material-icons">input</i>Sign Out'); ?>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <!-- #User Info -->

    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>

            <li <?php if($url_1 == 'home' OR empty($url_1)) {echo 'class="active"';} ?>>
                <a href="<?php echo site_url(); ?>">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>

            
            <?php if ($template_show_role == 1): ?>
            <li <?php if($url_1 == 'sakit' || $url_1 == 'izin' || $url_1 == 'cuti_khusus' || $url_1 == 'cuti_tahunan' || $url_1 == 'remote' ) {echo 'class="active"';} ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">device_hub</i>
                    <span>Pengajuan</span>
                </a>

                <ul class="ml-menu">

                    <li <?php if($url_1 == 'cuti_khusus' || $url_1 == 'cuti_tahunan' ) {echo 'class="active"';} ?>>
                        <a href="javascript:void(0);" class="menu-toggle" >
                    
                            <span>Cuti</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if($url_1 == 'cuti_khusus'   ) {echo 'class="active"';} ?>>
                                <a href="<?php echo site_url('cuti_khusus/list_pengajuan'); ?>">
                                    <span>Khusus</span><span class="badge bg-red label-aja"  style="margin-left: 110px; color: white;font-size:12px;"><?php echo $admin_cuti_tahunan; ?></span>                             
                                </a>
                            </li>
                            
                            <li <?php if( $url_1 == 'cuti_tahunan' ) {echo 'class="active"';} ?>>
                                <a href="<?php echo site_url('cuti_tahunan/list_pengajuan'); ?>">
                                    <span>Tahunan</span>
                                    <span class="badge bg-red label-aja" style="margin-left: 103px; color: white; font-size:12px;"><?php echo $admin_cuti_khusus; ?></span>
                                </a>
                            </li>          
                        </ul>
                    </li>

                    <li <?php if($url_1 == 'izin' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('izin/list_pengajuan'); ?>">
                            
                            <span>Izin</span>
                            <span class="badge bg-red label-aja" style="margin-left: 159px; color: white; font-size:12px;"><?php echo $admin_izin; ?></span>
                        </a>
                    </li>

                    <li <?php if($url_1 == 'remote' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('remote/list_pengajuan'); ?>">
                        
                            <span>Remot</span>
                            <span class="badge bg-red label-aja " style="margin-left: 140px; color: white; font-size:12px;"><?php echo $admin_remote; ?></span>

                        </a>
                    </li>

                    <li <?php if($url_1 == 'sakit' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('sakit/list_pengajuan'); ?>">
                            
                            <span>Sakit</span>
                            <span class="badge bg-red label-aja" style="margin-left: 149px; color: white; font-size:12px"><?php echo $admin_sakit; ?></span>

                            
                        </a>
                    </li>
                </ul>
            </li>
        </li>
        <?php endif ?>


        <?php if ($template_show_role == 3): ?>
            <li <?php if($url_1 == 'sakit' || $url_1 == 'izin' || $url_1 == 'cuti_khusus' || $url_1 == 'cuti_tahunan' || $url_1 == 'remote' ) {echo 'class="active"';} ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">device_hub</i>
                    <span>Pengajuan</span>
                </a>

                <ul class="ml-menu">

                    <li <?php if($url_1 == 'cuti_khusus' || $url_1 == 'cuti_tahunan' ) {echo 'class="active"';} ?>>
                        <a href="javascript:void(0);" class="menu-toggle" >
                    
                            <span>Cuti</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if($url_1 == 'cuti_khusus'   ) {echo 'class="active"';} ?>>
                                <a href="<?php echo site_url('cuti_khusus/list_pengajuan'); ?>">
                                    <span>Khusus</span><span class="badge bg-red label-aja"  style="margin-left: 110px; color: white; font-size:12px"><?php echo $direktur_cuti_tahunan; ?></span>                             
                                </a>
                            </li>
                            
                            <li <?php if( $url_1 == 'cuti_tahunan' ) {echo 'class="active"';} ?>>
                                <a href="<?php echo site_url('cuti_tahunan/list_pengajuan'); ?>">
                                    <span>Tahunan</span>
                                    <span class="badge bg-red label-aja" style="margin-left: 103px; color: white;  font-size:12px"><?php echo $direktur_cuti_khusus; ?></span>
                                </a>
                            </li>          
                        </ul>
                    </li>

                    <li <?php if($url_1 == 'izin' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('izin/list_pengajuan'); ?>">
                            
                            <span>Izin</span>
                            <span class="badge bg-red label-aja" style="margin-left: 159px; color: white; font-size:12px"><?php echo $direktur_izin; ?></span>
                        </a>
                    </li>

                    <li <?php if($url_1 == 'remote' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('remote/list_pengajuan'); ?>">
                        
                            <span>Remot</span>
                            <span class="badge bg-red label-aja" style="margin-left: 140px; color: white; font-size:12px"><?php echo $direktur_remote; ?></span>

                        </a>
                    </li>

                    <li <?php if($url_1 == 'sakit' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('sakit/list_pengajuan'); ?>">
                            
                            <span>Sakit</span>
                            <span class="badge bg-red label-aja" style="margin-left: 149px; color: white; font-size:12px"><?php echo $direktur_sakit; ?></span>

                            
                        </a>
                    </li>
                </ul>
            </li>
        </li>
        <?php endif ?>

     
        <?php if ($template_show_role == 2): ?>
            <li <?php if($url_1 == 'sakit' || $url_1 == 'izin' || $url_1 == 'cuti_khusus' || $url_1 == 'cuti_tahunan' || $url_1 == 'remote' ) {echo 'class="active"';} ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">device_hub</i>
                    <span>Pengajuan</span>
                </a>

                <ul class="ml-menu">

                    <li <?php if($url_1 == 'cuti_khusus' || $url_1 == 'cuti_tahunan' ) {echo 'class="active"';} ?>>
                        <a href="javascript:void(0);" class="menu-toggle" >
                    
                            <span>Cuti</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if($url_1 == 'cuti_khusus'   ) {echo 'class="active"';} ?>>
                                <a href="<?php echo site_url('cuti_khusus/list_pengajuan'); ?>">
                                    <span>Khusus</span><span class="badge bg-red label-aja "  style="margin-left: 110px; color: white;font-size:12px"><?php echo $cmo_cuti_tahunan; ?></span>                             
                                </a>
                            </li>
                            
                            <li <?php if( $url_1 == 'cuti_tahunan' ) {echo 'class="active"';} ?>>
                                <a href="<?php echo site_url('cuti_tahunan/list_pengajuan'); ?>">
                                    <span>Tahunan</span>
                                    <span class="badge bg-red label-aja" style="margin-left: 103px; color: white; font-size:12px"><?php echo $cmo_cuti_khusus; ?></span>
                                </a>
                            </li>          
                        </ul>
                    </li>

                    <li <?php if($url_1 == 'izin' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('izin/list_pengajuan'); ?>">
                            
                            <span>Izin</span>
                            <span class="badge bg-red label-aja" style="margin-left: 159px; color: white; font-size:12px"><?php echo $cmo_izin; ?></span>
                        </a>
                    </li>

                    <li <?php if($url_1 == 'remote' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('remote/list_pengajuan'); ?>">
                        
                            <span>Remot</span>
                            <span class="badge bg-red label-aja" style="margin-left: 140px; color: white; font-size:12px"><?php echo $cmo_remote; ?></span>

                        </a>
                    </li>

                    <li <?php if($url_1 == 'sakit' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('sakit/list_pengajuan'); ?>">
                            
                            <span>Sakit</span>
                            <span class="badge bg-red label-aja" style="margin-left: 149px; color: white; font-size:12px"><?php echo $cmo_sakit; ?></span>

                            
                        </a>
                    </li>
                </ul>
            </li>
        </li>
        <?php endif ?>


        <?php if ($template_show_role == 4): ?>
            <li <?php if($url_1 == 'sakit' || $url_1 == 'izin' || $url_1 == 'cuti_khusus' || $url_1 == 'cuti_tahunan' || $url_1 == 'remote' ) {echo 'class="active"';} ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">device_hub</i>
                    <span>Pengajuan</span>
                </a>

                <ul class="ml-menu">

                    <li <?php if($url_1 == 'cuti_khusus' || $url_1 == 'cuti_tahunan' ) {echo 'class="active"';} ?>>
                        <a href="javascript:void(0);" class="menu-toggle" >
                    
                            <span>Cuti</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if($url_1 == 'cuti_khusus'   ) {echo 'class="active"';} ?>>
                                <a href="<?php echo site_url('cuti_khusus/list_pengajuan'); ?>">
                                    <span>Khusus</span><span class="badge bg-red label-aja"  style="margin-left: 110px; color: white; font-size:12px"><?php echo $hrd_cuti_tahunan; ?></span>                             
                                </a>
                            </li>
                            
                            <li <?php if( $url_1 == 'cuti_tahunan' ) {echo 'class="active"';} ?>>
                                <a href="<?php echo site_url('cuti_tahunan/list_pengajuan'); ?>">
                                    <span>Tahunan</span>
                                    <span class="badge bg-red label-aja" style="margin-left: 103px; color: white; font-size:12px"><?php echo $hrd_cuti_khusus; ?></span>
                                </a>
                            </li>          
                        </ul>
                    </li>

                    <li <?php if($url_1 == 'izin' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('izin/list_pengajuan'); ?>">
                            
                            <span>Izin</span>
                            <span class="badge bg-red label-aja" style="margin-left: 159px; color: white; font-size:12px"><?php echo $hrd_izin; ?></span>
                        </a>
                    </li>

                    <li <?php if($url_1 == 'remote' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('remote/list_pengajuan'); ?>">
                        
                            <span>Remot</span>
                            <span class="badge bg-red label-aja" style="margin-left: 140px; color: white; font-size:12px"><?php echo $hrd_remote; ?></span>

                        </a>
                    </li>

                    <li <?php if($url_1 == 'sakit' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('sakit/list_pengajuan'); ?>">
                            
                            <span>Sakit</span>
                            <span class="badge bg-red label-aja" style="margin-left: 149px; color: white; font-size:12px"><?php echo $hrd_sakit; ?></span>

                            
                        </a>
                    </li>
                </ul>
            </li>
        </li>
        <?php endif ?>


        <?php if ($template_show_role == 5 && $template_show_divisi == 2 && $template_show_posisi == 2 ): ?>
            <li <?php if($url_1 == 'sakit' || $url_1 == 'izin' || $url_1 == 'cuti_khusus' || $url_1 == 'cuti_tahunan' || $url_1 == 'remote' ) {echo 'class="active"';} ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">device_hub</i>
                    <span>Pengajuan</span>
                </a>

                <ul class="ml-menu">

                    <li <?php if($url_1 == 'cuti_khusus' || $url_1 == 'cuti_tahunan' ) {echo 'class="active"';} ?>>
                        <a href="javascript:void(0);" class="menu-toggle" >
                    
                            <span>Cuti</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if($url_1 == 'cuti_khusus'   ) {echo 'class="active"';} ?>>
                                <a href="<?php echo site_url('cuti_khusus/list_pengajuan'); ?>">
                                    <span>Khusus</span><span class="badge bg-red label-aja"  style="margin-left: 110px; color: white; font-size:12px"><?php echo $sv2_cuti_tahunan; ?></span>                             
                                </a>
                            </li>
                            
                            <li <?php if( $url_1 == 'cuti_tahunan' ) {echo 'class="active"';} ?>>
                                <a href="<?php echo site_url('cuti_tahunan/list_pengajuan'); ?>">
                                    <span>Tahunan</span>
                                    <span class="badge bg-red label-aja" style="margin-left: 103px; color: white; font-size:12px"><?php echo $sv2_cuti_khusus; ?></span>
                                </a>
                            </li>          
                        </ul>
                    </li>

                    <li <?php if($url_1 == 'izin' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('izin/list_pengajuan'); ?>">
                            
                            <span>Izin</span>
                            <span class="badge bg-red label-aja" style="margin-left: 159px; color: white; font-size:12px"><?php echo $sv2_izin; ?></span>
                        </a>
                    </li>

                    <li <?php if($url_1 == 'remote' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('remote/list_pengajuan'); ?>">
                        
                            <span>Remot</span>
                            <span class="badge bg-red label-aja" style="margin-left: 140px; color: white; font-size:12px"><?php echo $sv2_remote; ?></span>

                        </a>
                    </li>

                    <li <?php if($url_1 == 'sakit' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('sakit/list_pengajuan'); ?>">
                            
                            <span>Sakit</span>
                            <span class="badge bg-red label-aja" style="margin-left: 149px; color: white; font-size:12px"><?php echo $sv2_sakit; ?></span>

                            
                        </a>
                    </li>
                </ul>
            </li>
        </li>
        <?php endif ?>


        <?php if ($template_show_role == 5 && $template_show_divisi == 3 && $template_show_posisi == 2 ): ?>
            <li <?php if($url_1 == 'sakit' || $url_1 == 'izin' || $url_1 == 'cuti_khusus' || $url_1 == 'cuti_tahunan' || $url_1 == 'remote' ) {echo 'class="active"';} ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">device_hub</i>
                    <span>Pengajuan</span>
                </a>

                <ul class="ml-menu">

                    <li <?php if($url_1 == 'cuti_khusus' || $url_1 == 'cuti_tahunan' ) {echo 'class="active"';} ?>>
                        <a href="javascript:void(0);" class="menu-toggle" >
                    
                            <span>Cuti</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if($url_1 == 'cuti_khusus'   ) {echo 'class="active"';} ?>>
                                <a href="<?php echo site_url('cuti_khusus/list_pengajuan'); ?>">
                                    <span>Khusus</span><span class="badge bg-red label-aja"  style="margin-left: 110px; color: white; font-size:12px"><?php echo $sv3_cuti_tahunan; ?></span>                             
                                </a>
                            </li>
                            
                            <li <?php if( $url_1 == 'cuti_tahunan' ) {echo 'class="active"';} ?>>
                                <a href="<?php echo site_url('cuti_tahunan/list_pengajuan'); ?>">
                                    <span>Tahunan</span>
                                    <span class="badge bg-red label-aja" style="margin-left: 103px; color: white; font-size:12px"><?php echo $sv3_cuti_khusus; ?></span>
                                </a>
                            </li>          
                        </ul>
                    </li>

                    <li <?php if($url_1 == 'izin' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('izin/list_pengajuan'); ?>">
                            
                            <span>Izin</span>
                            <span class="badge bg-red label-aja" style="margin-left: 159px; color: white; font-size:12px"><?php echo $sv3_izin; ?></span>
                        </a>
                    </li>

                    <li <?php if($url_1 == 'remote' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('remote/list_pengajuan'); ?>">
                        
                            <span>Remot</span>
                            <span class="badge bg-red label-aja" style="margin-left: 140px; color: white; font-size:12px"><?php echo $sv3_remote; ?></span>

                        </a>
                    </li>

                    <li <?php if($url_1 == 'sakit' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('sakit/list_pengajuan'); ?>">
                            
                            <span>Sakit</span>
                            <span class="badge bg-red label-aja" style="margin-left: 149px; color: white; font-size:12px"><?php echo $sv3_sakit; ?></span>

                            
                        </a>
                    </li>
                </ul>
            </li>
        </li>
        <?php endif ?>


        <?php if ($template_show_role == 5 && $template_show_divisi == 4 && $template_show_posisi == 2 ): ?>
            <li <?php if($url_1 == 'sakit' || $url_1 == 'izin' || $url_1 == 'cuti_khusus' || $url_1 == 'cuti_tahunan' || $url_1 == 'remote' ) {echo 'class="active"';} ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">device_hub</i>
                    <span>Pengajuan</span>
                </a>

                <ul class="ml-menu">

                    <li <?php if($url_1 == 'cuti_khusus' || $url_1 == 'cuti_tahunan' ) {echo 'class="active"';} ?>>
                        <a href="javascript:void(0);" class="menu-toggle" >
                    
                            <span>Cuti</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if($url_1 == 'cuti_khusus'   ) {echo 'class="active"';} ?>>
                                <a href="<?php echo site_url('cuti_khusus/list_pengajuan'); ?>">
                                    <span>Khusus</span><span class="badge bg-red label-aja"  style="margin-left: 110px; color: white; font-size:12px"><?php echo $sv4_cuti_tahunan; ?></span>                             
                                </a>
                            </li>
                            
                            <li <?php if( $url_1 == 'cuti_tahunan' ) {echo 'class="active"';} ?>>
                                <a href="<?php echo site_url('cuti_tahunan/list_pengajuan'); ?>">
                                    <span>Tahunan</span>
                                    <span class="badge bg-red label-aja" style="margin-left: 103px; color: white; font-size:12px"><?php echo $sv4_cuti_khusus; ?></span>
                                </a>
                            </li>          
                        </ul>
                    </li>

                    <li <?php if($url_1 == 'izin' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('izin/list_pengajuan'); ?>">
                            
                            <span>Izin</span>
                            <span class="badge bg-red label-aja" style="margin-left: 159px; color: white; font-size:12px"><?php echo $sv4_izin; ?></span>
                        </a>
                    </li>

                    <li <?php if($url_1 == 'remote' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('remote/list_pengajuan'); ?>">
                        
                            <span>Remot</span>
                            <span class="badge bg-red-label-aja" style="margin-left: 140px; color: white; font-size:12px"><?php echo $sv4_remote; ?></span>

                        </a>
                    </li>

                    <li <?php if($url_1 == 'sakit' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('sakit/list_pengajuan'); ?>">
                            
                            <span>Sakit</span>
                            <span class="badge bg-red label-aja" style="margin-left: 149px; color: white; font-size:12px"><?php echo $sv4_sakit; ?></span>

                            
                        </a>
                    </li>
                </ul>
            </li>
        </li>
        <?php endif ?>

        <?php if ($template_show_role == 5 && $template_show_divisi == 5 && $template_show_posisi == 2 ): ?>
            <li <?php if($url_1 == 'sakit' || $url_1 == 'izin' || $url_1 == 'cuti_khusus' || $url_1 == 'cuti_tahunan' || $url_1 == 'remote' ) {echo 'class="active"';} ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">device_hub</i>
                    <span>Pengajuan</span>
                </a>

                <ul class="ml-menu">

                    <li <?php if($url_1 == 'cuti_khusus' || $url_1 == 'cuti_tahunan' ) {echo 'class="active"';} ?>>
                        <a href="javascript:void(0);" class="menu-toggle" >
                    
                            <span>Cuti</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if($url_1 == 'cuti_khusus'   ) {echo 'class="active"';} ?>>
                                <a href="<?php echo site_url('cuti_khusus/list_pengajuan'); ?>">
                                    <span>Khusus</span><span class="badge bg-red label-aja"  style="margin-left: 110px; color: white; font-size:12px"><?php echo $sv5_cuti_tahunan; ?></span>                             
                                </a>
                            </li>
                            
                            <li <?php if( $url_1 == 'cuti_tahunan' ) {echo 'class="active"';} ?>>
                                <a href="<?php echo site_url('cuti_tahunan/list_pengajuan'); ?>">
                                    <span>Tahunan</span>
                                    <span class="badge bg-red label-aja" style="margin-left: 103px; color: white; font-size:12px"><?php echo $sv5_cuti_khusus; ?></span>
                                </a>
                            </li>          
                        </ul>
                    </li>

                    <li <?php if($url_1 == 'izin' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('izin/list_pengajuan'); ?>">
                            
                            <span>Izin</span>
                            <span class="badge bg-red label-aja" style="margin-left: 159px; color: white; font-size:12px"><?php echo $sv5_izin; ?></span>
                        </a>
                    </li>

                    <li <?php if($url_1 == 'remote' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('remote/list_pengajuan'); ?>">
                        
                            <span>Remot</span>
                            <span class="badge bg-red label-aja" style="margin-left: 140px; color: white; font-size:12px"><?php echo $sv5_remote; ?></span>

                        </a>
                    </li>

                    <li <?php if($url_1 == 'sakit' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('sakit/list_pengajuan'); ?>">
                            
                            <span>Sakit</span>
                            <span class="badge bg-red label-aja" style="margin-left: 149px; color: white; font-size:12px"><?php echo $sv5_sakit; ?></span>

                            
                        </a>
                    </li>
                </ul>
            </li>
        </li>
        <?php endif ?>

        <?php if ($template_show_role == 5 && $template_show_divisi == 6 && $template_show_posisi == 2 ): ?>
            <li <?php if($url_1 == 'sakit' || $url_1 == 'izin' || $url_1 == 'cuti_khusus' || $url_1 == 'cuti_tahunan' || $url_1 == 'remote' ) {echo 'class="active"';} ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">device_hub</i>
                    <span>Pengajuan</span>
                </a>

                <ul class="ml-menu">

                    <li <?php if($url_1 == 'cuti_khusus' || $url_1 == 'cuti_tahunan' ) {echo 'class="active"';} ?>>
                        <a href="javascript:void(0);" class="menu-toggle" >
                    
                            <span>Cuti</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if($url_1 == 'cuti_khusus'   ) {echo 'class="active"';} ?>>
                                <a href="<?php echo site_url('cuti_khusus/list_pengajuan'); ?>">
                                    <span>Khusus</span><span class="badge bg-red label-aja"  style="margin-left: 110px; color: white; font-size:12px"><?php echo $sv6_cuti_tahunan; ?></span>                             
                                </a>
                            </li>
                            
                            <li <?php if( $url_1 == 'cuti_tahunan' ) {echo 'class="active"';} ?>>
                                <a href="<?php echo site_url('cuti_tahunan/list_pengajuan'); ?>">
                                    <span>Tahunan</span>
                                    <span class="badge bg-red label-aja" style="margin-left: 103px; color: white; font-size:12px"><?php echo $sv6_cuti_khusus; ?></span>
                                </a>
                            </li>          
                        </ul>
                    </li>

                    <li <?php if($url_1 == 'izin' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('izin/list_pengajuan'); ?>">
                            
                            <span>Izin</span>
                            <span class="badge bg-red label-aja" style="margin-left: 159px; color: white; font-size:12px"><?php echo $sv6_izin; ?></span>
                        </a>
                    </li>

                    <li <?php if($url_1 == 'remote' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('remote/list_pengajuan'); ?>">
                        
                            <span>Remot</span>
                            <span class="badge bg-red label-aja" style="margin-left: 140px; color: white; font-size:12px"><?php echo $sv6_remote; ?></span>

                        </a>
                    </li>

                    <li <?php if($url_1 == 'sakit' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('sakit/list_pengajuan'); ?>">
                            
                            <span>Sakit</span>
                            <span class="badge bg-red label-aja" style="margin-left: 149px; color: white; font-size:12px"><?php echo $sv6_sakit; ?></span>

                            
                        </a>
                    </li>
                </ul>
            </li>
        </li>
        <?php endif ?>



        <?php if ($template_show_role == 5 && $template_show_divisi == 8 && $template_show_posisi == 5 ): ?>
            <li <?php if($url_1 == 'sakit' || $url_1 == 'izin' || $url_1 == 'cuti_khusus' || $url_1 == 'cuti_tahunan' || $url_1 == 'remote' ) {echo 'class="active"';} ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">device_hub</i>
                    <span>Pengajuan</span>
                </a>

                <ul class="ml-menu">

                    <li <?php if($url_1 == 'cuti_khusus' || $url_1 == 'cuti_tahunan' ) {echo 'class="active"';} ?>>
                        <a href="javascript:void(0);" class="menu-toggle" >
                    
                            <span>Cuti</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if($url_1 == 'cuti_khusus'   ) {echo 'class="active"';} ?>>
                                <a href="<?php echo site_url('cuti_khusus/list_pengajuan'); ?>">
                                    <span>Khusus</span><span class="badge bg-red label-aja"  style="margin-left: 110px; color: white; font-size:12px"><?php echo $sv7_cuti_tahunan; ?></span>                             
                                </a>
                            </li>
                            
                            <li <?php if( $url_1 == 'cuti_tahunan' ) {echo 'class="active"';} ?>>
                                <a href="<?php echo site_url('cuti_tahunan/list_pengajuan'); ?>">
                                    <span>Tahunan</span>
                                    <span class="badge bg-red label-aja" style="margin-left: 103px; color: white; font-size:12px"><?php echo $sv7_cuti_khusus; ?></span>
                                </a>
                            </li>          
                        </ul>
                    </li>

                    <li <?php if($url_1 == 'izin' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('izin/list_pengajuan'); ?>">
                            
                            <span>Izin</span>
                            <span class="badge bg-red label-aja" style="margin-left: 159px; color: white; font-size:12px"><?php echo $sv7_izin; ?></span>
                        </a>
                    </li>

                    <li <?php if($url_1 == 'remote' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('remote/list_pengajuan'); ?>">
                        
                            <span>Remot</span>
                            <span class="badge bg-red label-aja" style="margin-left: 140px; color: white; font-size:12px"><?php echo $sv7_remote; ?></span>

                        </a>
                    </li>

                    <li <?php if($url_1 == 'sakit' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('sakit/list_pengajuan'); ?>">
                            
                            <span>Sakit</span>
                            <span class="badge bg-red label-aja" style="margin-left: 149px; color: white; font-size:12px"><?php echo $sv7_sakit; ?></span>

                            
                        </a>
                    </li>
                </ul>
            </li>
        </li>
        <?php endif ?>

        <?php if ($template_show_role == 6): ?>
            <li <?php if($url_1 == 'sakit' || $url_1 == 'izin' || $url_1 == 'cuti_khusus' || $url_1 == 'cuti_tahunan' || $url_1 == 'remote' ) {echo 'class="active"';} ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">device_hub</i>
                    <span>Pengajuan</span>
                </a>

                <ul class="ml-menu">

                    <li <?php if($url_1 == 'cuti_khusus' || $url_1 == 'cuti_tahunan' ) {echo 'class="active"';} ?>>
                        <a href="javascript:void(0);" class="menu-toggle" >
                    
                            <span>Cuti</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if($url_1 == 'cuti_khusus'   ) {echo 'class="active"';} ?>>
                                <a href="<?php echo site_url('cuti_khusus/list_pengajuan'); ?>">
                                    <span>Khusus</span><span class="badge bg-red label-aja"  style="margin-left: 110px; color: white; font-size:12px"></span>                             
                                </a>
                            </li>
                            
                            <li <?php if( $url_1 == 'cuti_tahunan' ) {echo 'class="active"';} ?>>
                                <a href="<?php echo site_url('cuti_tahunan/list_pengajuan'); ?>">
                                    <span>Tahunan</span>
                                    <span class="badge bg-red label-aja" style="margin-left: 103px; color: white; font-size:12px"></span>
                                </a>
                            </li>          
                        </ul>
                    </li>

                    <li <?php if($url_1 == 'izin' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('izin/list_pengajuan'); ?>">
                            
                            <span>Izin</span>
                            <span class="badge bg-red label-aja" style="margin-left: 159px; color: white; font-size:12px"></span>
                        </a>
                    </li>

                    <li <?php if($url_1 == 'remote' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('remote/list_pengajuan'); ?>">
                        
                            <span>Remot</span>
                            <span class="badge bg-red label-aja" style="margin-left: 140px; color: white; font-size:12px"></span>

                        </a>
                    </li>

                    <li <?php if($url_1 == 'sakit' OR empty($url_1)) {echo 'class="active"';} ?>>
                        <a href="<?php echo site_url('sakit/list_pengajuan'); ?>">
                            
                            <span>Sakit</span>
                            <span class="badge bg-red label-aja" style="margin-left: 149px; color: white; font-size:12px"></span>

                            
                        </a>
                    </li>
                </ul>
            </li>
        </li>
        <?php endif ?>


        <li class="header">REKAPITULASI</li>
            <li <?php if($url_1 == 'rekap_absen') {echo 'class="active"';} ?>>
                <a href="<?php echo base_url('rekap_absen'); ?>">
                    <i class="material-icons">border_color</i>
                    <span>Absen</span>
                </a>
            </li>

            <?php if ($template_show_role == 1 OR $template_show_role == 3 OR $template_show_role == 4): ?>
                <li <?php if($url_1 == 'rekap_karyawan') {echo 'class="active"';} ?>>
                    <a href="<?php echo base_url('rekap_karyawan'); ?>">
                        <i class="material-icons">developer_board</i>
                        <span>Karyawan</span>
                    </a>
                </li>
            <?php endif ?>
            
            <!-- start harian -->
            <?php if ($template_show_role == 1 OR $template_show_role == 3 OR $template_show_role == 4): ?>
                <li <?php if($url_1 == 'rekap_harian') {echo 'class="active"';} ?>>
                    <a href="<?php echo base_url('rekap_harian'); ?>">
                        <i class="material-icons">assignment</i>
                        <span>Harian</span>
                    </a>
                </li>
            <?php endif ?>
            <!-- end harian -->
            
            <!-- start bulanan -->
            <?php if ($template_show_role == 1): ?>
               <li <?php if($url_1 == 'rekap_bulanan') {echo 'class="active"';} ?>>
                    <a href="<?php echo base_url('rekap_bulanan'); ?>">
                        <i class="material-icons">assignment</i>
                        <span>Bulanan</span>
                    </a>
                </li>

                <li <?php if($url_1 == 'hari_libur') {echo 'class="active"';} ?>>
                    <a href="<?php echo base_url('hari_libur'); ?>">
                        <i class="material-icons">event_busy</i>
                        <span>Hari Libur</span>
                    </a>
                </li> 

                
            <?php endif ?>

            <?php if ($template_show_lembaga == 1): ?>
                <?php if ($template_show_role == 3 OR $template_show_role == 4): ?>
                    <li <?php if($url_1 == 'rekap_bulanan') {echo 'class="active"';} ?>>
                        <a href="<?php echo base_url('rekap_bulanan'); ?>">
                            <i class="material-icons">assignment</i>
                            <span>Bulanan</span>
                        </a>
                    </li>

                    <li <?php if($url_1 == 'hari_libur') {echo 'class="active"';} ?>>
                        <a href="<?php echo base_url('hari_libur'); ?>">
                            <i class="material-icons">event_busy</i>
                            <span>Hari Libur</span>
                        </a>
                    </li>

                    <li <?php if($url_1 == 'karyawan') {echo 'class="active"';} ?>>
                        <a href="<?php echo base_url('karyawan'); ?>">
                            <i class="material-icons">people</i>
                            <span>Karyawan</span>
                        </a>
                    </li> 
                <?php endif ?>
            <?php endif ?>
            <!-- end bulanan -->
            
            <?php if ($template_show_role == 1 OR $template_show_role == 3 OR $template_show_role == 4): ?>
                <li <?php if($url_1 == 'program_kerja' OR empty($url_1)) {echo 'class="active"';} ?>>
                    <a href="<?php echo base_url('program_kerja'); ?>">
                        <i class="material-icons">chrome_reader_mode</i>
                        <span>Program Kerja</span>
                    </a>
                </li>

            <?php endif ?>

            
            

            <li class="header">LAINYA</li>
            <li <?php if($url_1 == 'todo_list' OR empty($url_1)) {echo 'class="active"';} ?>>
                <a href="<?php echo base_url('todo_list'); ?>">
                    <i class="material-icons">featured_play_list</i>
                    <span>My Todo List</span>
                </a>
            </li>

          

            <?php if ($template_show_role == 1 OR $template_show_role == 3 OR $template_show_role == 4): ?>
                <li <?php if($url_1 == 'todo_list_karyawan' OR empty($url_1)) {echo 'class="active"';} ?>>
                    <a href="<?php echo base_url('todo_list_karyawan'); ?>">
                        <i class="material-icons">featured_video</i>
                        <span>Todo List Karyawan</span>
                    </a>
                </li>
            <?php endif ?>

            <li <?php if($url_1 == 'kritik_atau_saran' OR empty($url_1)) {echo 'class="active"';} ?>>
                <a href="<?php echo base_url('kritik_atau_saran'); ?>">
                    <i class="material-icons">contact_mail</i>
                    <span>Kritik Atau Saran</span>
                </a>
            </li>

            <!-- start bulanan -->
            <?php if ($template_show_role == 1): ?>
               <li <?php if($url_1 == 'data_kritik_saran') {echo 'class="active"';} ?>>
                    <a href="<?php echo base_url('data_kritik_saran'); ?>">
                        <i class="material-icons">date_range</i>
                        <span>Data Kritik Saran</span>
                    </a>
                </li> 
            <?php endif ?>

            <?php if ($template_show_lembaga == 4): ?>
                <?php if ($template_show_role == 3 OR $template_show_role == 4): ?>
                    <li <?php if($url_1 == 'data_kritik_saran') {echo 'class="active"';} ?>>
                        <a href="<?php echo base_url('data_kritik_saran'); ?>">
                            <i class="material-icons">date_range</i>
                            <span>Data Kritik Saran</span>
                        </a>
                    </li>
                <?php endif ?>
            <?php endif ?>
            <!-- end bulanan -->

            


            
                <li class="header">PRIVILEGES</li>

                <li <?php if($url_1 == 'profile' || $url_1 == 'pendidikan_formal' || $url_1 == 'karya_ilmiah' || $url_1 == 'pendidikan_non_formal' || $url_1 == 'bahasa_asing' || $url_1 == 'keluarga' || $url_1 == 'pengalaman_kerja' || $url_1 == 'pengalaman_organisasi' || $url_1 == 'hobby_atau_kegemaran') {echo 'class="active"';} ?>>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">account_circle</i>
                        <span>Profile</span>
                    </a>

                    <ul class="ml-menu">
                        <li <?php if($url_1 == 'profile') {echo 'class="active"';} ?>>
                            <a href="<?php echo site_url('profile'); ?>">
                                <span>Identitas</span>
                            </a>
                        </li>

                        <li <?php if($url_1 == 'keluarga') {echo 'class="active"';} ?>>
                            <a href="<?php echo site_url('keluarga'); ?>">
                                <span>Keluarga</span>
                            </a>
                        </li>

                        <li <?php if($url_1 == 'pendidikan_formal' || $url_1 == 'karya_ilmiah' || $url_1 == 'pendidikan_non_formal' || $url_1 == 'bahasa_asing') {echo 'class="active"';} ?>>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Pendidikan</span>
                            </a>

                            <ul class="ml-menu">
                                <li <?php if($url_1 == 'pendidikan_formal') {echo 'class="active"';} ?>>
                                    <a href="<?php echo site_url('pendidikan_formal'); ?>">
                                        <span>Pendidikan Formal</span>
                                    </a>
                                </li>

                                <li <?php if($url_1 == 'karya_ilmiah') {echo 'class="active"';} ?>>
                                    <a href="<?php echo site_url('karya_ilmiah'); ?>">
                                        <span>Karya Ilmiah</span>
                                    </a>
                                </li>

                                <li <?php if($url_1 == 'pendidikan_non_formal') {echo 'class="active"';} ?>>
                                    <a href="<?php echo site_url('pendidikan_non_formal'); ?>">
                                        <span>Pendidikan Non Formal</span>
                                    </a>
                                </li>

                                <li <?php if($url_1 == 'bahasa_asing') {echo 'class="active"';} ?>>
                                    <a href="<?php echo site_url('bahasa_asing'); ?>">
                                        <span>Bahasa Asing</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>

                        <li <?php if($url_1 == 'pengalaman_kerja' || $url_1 == 'pengalaman_organisasi' || $url_1 == 'hobby_atau_kegemaran') {echo 'class="active"';} ?>>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Personal Skill</span>
                            </a>

                            <ul class="ml-menu">
                                <li <?php if($url_1 == 'pengalaman_kerja') {echo 'class="active"';} ?>>
                                    <a href="<?php echo site_url('pengalaman_kerja'); ?>">
                                        <span>Pengalaman Kerja</span>
                                    </a>
                                </li>

                                <li <?php if($url_1 == 'pengalaman_organisasi') {echo 'class="active"';} ?>>
                                    <a href="<?php echo site_url('pengalaman_organisasi'); ?>">
                                        <span>Pengalaman Organisasi</span>
                                    </a>
                                </li>

                                <li <?php if($url_1 == 'hobby_atau_kegemaran') {echo 'class="active"';} ?>>
                                    <a href="<?php echo site_url('hobby_atau_kegemaran'); ?>">
                                        <span>Hobby atau Kegemaran</span>
                                    </a>
                                </li>                            
                            </ul>
                        </li>
                    </ul>
                </li>

                <?php if ($template_show_role == 1): ?>
                <li <?php if($url_1 == 'maps') {echo 'class="active"';} ?>>
                    <a href="<?php echo base_url('maps'); ?>">
                        <i class="material-icons">map</i>
                        <span>Maps</span>
                    </a>
                </li>  

                <li <?php if($url_1 == 'divisi') {echo 'class="active"';} ?>>
                    <a href="<?php echo base_url('divisi'); ?>">
                        <i class="material-icons">flag</i>
                        <span>Divisi</span>
                    </a>
                </li>  

                <li <?php if($url_1 == 'posisi') {echo 'class="active"';} ?>>
                    <a href="<?php echo base_url('posisi'); ?>">
                        <i class="material-icons">person_outline</i>
                        <span>Posisi</span>
                    </a>
                </li>  

                <li <?php if($url_1 == 'role') {echo 'class="active"';} ?>>
                    <a href="<?php echo base_url('role'); ?>">
                        <i class="material-icons">share</i>
                        <span>Role Users</span>
                    </a>
                </li>

                <li <?php if($url_1 == 'user') {echo 'class="active"';} ?>>
                    <a href="<?php echo base_url('user'); ?>">
                        <i class="material-icons">account_box</i>
                        <span>Users</span>
                    </a>
                </li>
                <?php endif ?>

                <?php if ($template_show_role == 1 || $template_show_role == 3 || $template_show_role == 4): ?>

                <li <?php if($url_1 == 'karyawan') {echo 'class="active"';} ?>>
                    <a href="<?php echo base_url('karyawan'); ?>">
                        <i class="material-icons">people</i>
                        <span>Karyawan</span>
                    </a>
                </li> 
                

                <!--
                <li <?php if($url_1 == 'lembaga') {echo 'class="active"';} ?>>
                    <a href="<?php echo base_url('lembaga'); ?>">
                        <i class="material-icons">flag</i>
                        <span>Lembaga</span>
                    </a>
                </li>    
                -->
                <?php endif ?>
                
                

                
            

        </ul>
    </div>
    <!-- #Menu -->

    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            <span id="dashboard_address"></span>
        </div>

        <div class="version">
            <b >Version: </b> 1.0.5, Absen &copy; 2017 - 2018.
        </div>
    </div>
    <!-- #Footer -->

</aside>