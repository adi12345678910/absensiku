<style>
    @media only screen and (max-width: 600px) {
  #notif {
   margin-left: 50px;
  }
}
</style>
<?php
$jumlah_sakit_admin=$this->m_sakit->hitungJumlahAdmin();
$jumlah_izin_admin=$this->m_izin->hitungJumlahAdmin();
$jumlah_remote_admin=$this->m_remote->hitungJumlahAdmin();
$jumlah_cuti_tahunan_admin=$this->m_cuti_tahunan->hitungJumlahAdmin();
$jumlah_cuti_khusus_admin=$this->m_cuti_khusus->hitungJumlahAdmin();

$total_admin = $jumlah_izin_admin + $jumlah_sakit_admin + $jumlah_remote_admin + $jumlah_cuti_khusus_admin + $jumlah_cuti_tahunan_admin;
echo $total_admin;

?>

<?php
$jumlah_sakit_direktur=$this->m_sakit->hitungJumlahDirektur();
$jumlah_izin_direktur=$this->m_izin->hitungJumlahDirektur();
$jumlah_remote_direktur=$this->m_remote->hitungJumlahDirektur();
$jumlah_cuti_khusus_direktur=$this->m_cuti_khusus->hitungJumlahDirektur();
$jumlah_cuti_tahunan_direktur=$this->m_cuti_tahunan->hitungJumlahDirektur();

$total_direktur = $jumlah_izin_direktur+ $jumlah_sakit_direktur + $jumlah_remote_direktur + $jumlah_cuti_khusus_direktur + $jumlah_cuti_tahunan_direktur;
echo $total_direktur;
?>

<?php
$jumlah_sakit_hrd=$this->m_sakit->hitungJumlahHrd();
$jumlah_izin_hrd=$this->m_izin->hitungJumlahHrd();
$jumlah_remote_hrd=$this->m_remote->hitungJumlahHrd();
$jumlah_cuti_tahunan_hrd=$this->m_cuti_tahunan->hitungJumlahHrd();
$jumlah_cuti_khusus_hrd=$this->m_cuti_khusus->hitungJumlahHrd();

$total_Hrd = $jumlah_izin_hrd + $jumlah_sakit_hrd + $jumlah_remote_hrd + $jumlah_cuti_khusus_hrd + $jumlah_cuti_tahunan_hrd;
echo $total_Hrd;
?>

<?php
$jumlah_sakit_cmo=$this->m_sakit->hitungJumlahCmo();
$jumlah_izin_cmo=$this->m_izin->hitungJumlahCmo();
$jumlah_remote_cmo=$this->m_remote->hitungJumlahCmo();
$jumlah_cuti_tahunan_cmo=$this->m_cuti_tahunan->hitungJumlahCmo();
$jumlah_cuti_khusus_cmo=$this->m_cuti_khusus->hitungJumlahCmo();

$total_Cmo = $jumlah_izin_cmo + $jumlah_sakit_cmo + $jumlah_remote_cmo + $jumlah_cuti_khusus_cmo + $jumlah_cuti_tahunan_cmo;
echo $total_Cmo;
?>

<?php
$jumlah_sakit_sv2=$this->m_sakit->hitungJumlahSv2();
$jumlah_izin_sv2=$this->m_izin->hitungJumlahSv2();
$jumlah_remote_sv2=$this->m_remote->hitungJumlahSv2();
$jumlah_cuti_tahunan_sv2=$this->m_cuti_tahunan->hitungJumlahSv2();
$jumlah_cuti_khusus_sv2=$this->m_cuti_khusus->hitungJumlahSv2();

$total_Sv2 = $jumlah_izin_sv2+ $jumlah_sakit_sv2 + $jumlah_remote_sv2 + $jumlah_cuti_khusus_sv2 + $jumlah_cuti_tahunan_sv2;
echo $total_Sv2;
?>

<?php
$jumlah_sakit_sv3=$this->m_sakit->hitungJumlahSv3();
$jumlah_izin_sv3=$this->m_izin->hitungJumlahSv3();
$jumlah_remote_sv3=$this->m_remote->hitungJumlahSv3();
$jumlah_cuti_tahunan_sv3=$this->m_cuti_tahunan->hitungJumlahSv3();
$jumlah_cuti_khusus_sv3=$this->m_cuti_khusus->hitungJumlahSv3();

$total_Sv3 = $jumlah_izin_sv3 + $jumlah_sakit_sv3 + $jumlah_remote_sv3 + $jumlah_cuti_khusus_sv3 + $jumlah_cuti_tahunan_sv3;
echo $total_Sv3;
?>

<?php
$jumlah_sakit_sv4=$this->m_sakit->hitungJumlahSv4();
$jumlah_izin_sv4=$this->m_izin->hitungJumlahSv4();
$jumlah_remote_sv4=$this->m_remote->hitungJumlahSv4();
$jumlah_cuti_tahunan_sv4=$this->m_cuti_tahunan->hitungJumlahSv4();
$jumlah_cuti_khusus_sv4=$this->m_cuti_khusus->hitungJumlahSv4();

$total_Sv4 = $jumlah_izin_sv4 + $jumlah_sakit_sv4 + $jumlah_remote_sv4 + $jumlah_cuti_khusus_sv4 + $jumlah_cuti_tahunan_sv4;
echo $total_Sv4;
?>

<?php
$jumlah_sakit_sv5=$this->m_sakit->hitungJumlahSv5();
$jumlah_izin_sv5=$this->m_izin->hitungJumlahSv5();
$jumlah_remote_sv5=$this->m_remote->hitungJumlahSv5();
$jumlah_cuti_tahunan_sv5=$this->m_cuti_tahunan->hitungJumlahSv5();
$jumlah_cuti_khusus_sv5=$this->m_cuti_khusus->hitungJumlahSv5();

$total_Sv5 = $jumlah_izin_sv5 + $jumlah_sakit_sv5 + $jumlah_remote_sv5 + $jumlah_cuti_khusus_sv5 + $jumlah_cuti_tahunan_sv5;
echo $total_Sv5;
?>

<?php
$jumlah_sakit_sv6=$this->m_sakit->hitungJumlahSv6();
$jumlah_izin_sv6=$this->m_izin->hitungJumlahSv6();
$jumlah_remote_sv6=$this->m_remote->hitungJumlahSv6();
$jumlah_cuti_tahunan_sv6=$this->m_cuti_tahunan->hitungJumlahSv6();
$jumlah_cuti_khusus_sv6=$this->m_cuti_khusus->hitungJumlahSv6();

$total_Sv6 = $jumlah_izin_sv6 + $jumlah_sakit_sv6 + $jumlah_remote_sv6 + $jumlah_cuti_khusus_sv6 + $jumlah_cuti_tahunan_sv6;
echo $total_Sv6;
?>

<?php
$jumlah_sakit_sv7=$this->m_sakit->hitungJumlahSv7();
$jumlah_izin_sv7=$this->m_izin->hitungJumlahSv7();
$jumlah_remote_sv7=$this->m_remote->hitungJumlahSv7();
$jumlah_cuti_tahunan_sv7=$this->m_cuti_tahunan->hitungJumlahSv7();
$jumlah_cuti_khusus_sv7=$this->m_cuti_khusus->hitungJumlahSv7();

$total_Sv7 = $jumlah_izin_sv7 + $jumlah_sakit_sv7 + $jumlah_remote_sv7 + $jumlah_cuti_khusus_sv7 + $jumlah_cuti_tahunan_sv7;
echo $total_Sv7;
?>
<nav class="navbar">
    <div class="container-fluid">

    <div class="navbar-header">
    <?php if ($template_show_role == 1 || $template_show_role == 2 || $template_show_role == 3 || $template_show_role == 4 || $template_show_role == 5): ?>
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
        <?php endif ?>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="<?php echo base_url(); ?>">APLIKASI ABSENSI</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">

                <!-- Call Search -->
                <!--
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li> 
                -->
                <!-- #END# Call Search -->


                
                <!-- Notifications -->
                <?php if ($template_show_role == 1): ?>
                <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <?php if ($total_admin > 0): ?>
                            <span class="label-count"><?php echo $total_admin; ?></span>
                            <?php endif ?>
                        </a>
                        <ul class="dropdown-menu" id="notif">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                              
                                    <li>
                                        <a href="<?php echo site_url('cuti_khusus/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Cuti Khusus : </h4> <h4> <?php echo $jumlah_cuti_khusus_admin; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="<?php echo site_url('cuti_tahunan/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Cuti Tahunan : </h4> <h4> <?php echo $jumlah_cuti_tahunan_admin; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('izin/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Izin : </h4> <h4> <?php echo $jumlah_izin_admin; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('remote/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Remote : </h4> <h4> <?php echo $jumlah_remote_admin; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('sakit/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Jumlah pengajuan Sakit : </h4> <h4> <?php echo $jumlah_sakit_admin; ?></h4>
                                                <p>
                                                   
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endif ?>

                                 <?php if ($template_show_role == 3): ?>
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                           <i class="material-icons">notifications</i>
                                            <?php if ($total_direktur > 0): ?>
                                            <span class="label-count"><?php echo $total_direktur; ?></span>
                                            <?php endif ?>
                                        </a>
                                        <ul class="dropdown-menu" id="notif">
                                            <li class="header">NOTIFICATIONS</li>
                                            <li class="body">
                                                <ul class="menu">

                                   
                                    <li>
                                        <a href="<?php echo site_url('cuti_tahunan/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Cuti Tahunan: </h4> <h4> <?php echo $jumlah_cuti_tahunan_direktur; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                            
                                    <li>
                                        <a href="<?php echo site_url('cuti_khusus/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Cuti Khusus : </h4> <h4> <?php echo $jumlah_cuti_khusus_direktur; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('izin/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Izin : </h4> <h4> <?php echo $jumlah_izin_direktur; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('remote/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Remote : </h4> <h4> <?php echo $jumlah_remote_direktur; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('sakit/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Jumlah pengajuan Sakit : </h4> <h4> <?php echo $jumlah_sakit_direktur; ?></h4>
                                                <p>
                                                   
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endif ?>

                                <?php if ($template_show_role == 2): ?>
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                            <i class="material-icons">notifications</i>
                                            <?php if ($total_Cmo > 0): ?>
                                            <span class="label-count"><?php echo $total_Cmo; ?></span>
                                            <?php endif ?>
                                        </a>
                                        <ul class="dropdown-menu" id="notif">
                                            <li class="header">NOTIFICATIONS</li>
                                            <li class="body">
                                                <ul class="menu">
                                    <li>
                                        <a href="<?php echo site_url('cuti_tahunan/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Cuti Tahunan : </h4> <h4><?php echo $jumlah_cuti_tahunan_cmo; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                
                                        
                                    <li>
                                        <a href="<?php echo site_url('cuti_khusus/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Cuti Khusus : </h4> <h4> <?php echo $jumlah_cuti_khusus_cmo; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('izin/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Izin :</h4> <h4><?php echo $jumlah_izin_cmo; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('remote/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Remote :</h4> <h4> <?php echo $jumlah_remote_cmo; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('sakit/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Jumlah pengajuan Sakit :</h4> <h4><?php echo $jumlah_sakit_cmo; ?></h4>
                                                <p>
                                                   
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endif ?>
                                    <?php if ($template_show_role == 4): ?>
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                            <i class="material-icons">notifications</i>
                                            <span class="label-count"><?php echo $total_Hrd; ?></span>
                                        </a>
                                        <ul class="dropdown-menu" id="notif">
                                            <li class="header">NOTIFICATIONS</li>
                                            <li class="body">
                                                <ul class="menu">

                                   
                                    <li>
                                        <a href="<?php echo site_url('cuti_tahunan/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Cuti Tahunan : </h4> <h4> <?php echo $jumlah_cuti_tahunan_hrd; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?php echo site_url('cuti_khusus/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Cuti Khusus: </h4> <h4> <?php echo $jumlah_cuti_khusus_hrd; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('izin/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Izin : </h4> <h4> <?php echo $jumlah_izin_hrd; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('remote/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Remote : </h4> <h4> <?php echo $jumlah_remote_hrd; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('sakit/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Jumlah pengajuan Sakit : </h4> <h4> <?php echo $jumlah_sakit_hrd; ?></h4>
                                                <p>
                                                   
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endif ?>

                                    <?php if ($template_show_role == 5 && $template_show_divisi == 2 && $template_show_posisi == 2 ): ?>
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                            <i class="material-icons">notifications</i>
                                            <?php if ($total_Sv2 > 0): ?>
                                            <span class="label-count"><?php echo $total_Sv2; ?></span>
                                            <?php endif ?>
                                        </a>
                                        <ul class="dropdown-menu" id="notif">
                                            <li class="header">NOTIFICATIONS</li>
                                            <li class="body">
                                                <ul class="menu">

                                   
                                    <li>
                                        <a href="<?php echo site_url('cuti_tahunan/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Cuti : </h4> <h4> <?php echo $jumlah_cuti_tahunan_sv2; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        
                                    <li>
                                        <a href="<?php echo site_url('cuti_khusus/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Cuti Khusus: </h4> <h4> <?php echo $jumlah_cuti_khusus_sv2; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('izin/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Izin : </h4> <h4> <?php echo $jumlah_izin_sv2; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('remote/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Remote : </h4> <h4> <?php echo $jumlah_remote_sv2; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('sakit/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Jumlah pengajuan Sakit : </h4> <h4> <?php echo $jumlah_sakit_sv2; ?></h4>
                                                <p>
                                                   
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endif ?>
                                    
                                    <?php if ($template_show_role == 5 && $template_show_divisi == 3 && $template_show_posisi == 2 ): ?>
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                            <i class="material-icons">notifications</i>
                                            <?php if ($total_Sv3 > 0): ?>
                                            <span class="label-count"><?php echo $total_Sv3 ?></span>
                                            <?php endif ?>
                                        </a>
                                        <ul class="dropdown-menu" id="notif">
                                            <li class="header">NOTIFICATIONS</li>
                                            <li class="body">
                                                <ul class="menu">

                                   
                                    <li>
                                        <a href="<?php echo site_url('cuti_tahunan/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Cuti : </h4> <h4> <?php echo $jumlah_cuti_tahunan_sv3; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        
                                    <li>
                                        <a href="<?php echo site_url('cuti_khusus/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Cuti Khusus : </h4> <h4> <?php echo $jumlah_cuti_khusus_sv3; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                        <a href="<?php echo site_url('izin/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Izin : </h4> <h4> <?php echo $jumlah_izin_sv3; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('remote/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Remote : </h4> <h4> <?php echo $jumlah_remote_sv3; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('sakit/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Jumlah pengajuan Sakit : </h4> <h4> <?php echo $jumlah_sakit_sv3; ?></h4>
                                                <p>
                                                   
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endif ?>
                                         

                                    <?php if ($template_show_role == 5 && $template_show_divisi == 4 && $template_show_posisi == 2 ): ?>
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                            <i class="material-icons">notifications</i>
                                            <?php if ($total_Sv4 > 0): ?>
                                            <span class="label-count"><?php echo $total_Sv4 ?></span>
                                            <?php endif ?>
                                        </a>
                                        <ul class="dropdown-menu" id="notif">
                                            <li class="header">NOTIFICATIONS</li>
                                            <li class="body">
                                                <ul class="menu">

                                   
                                    <li>
                                        <a href="<?php echo site_url('cuti_tahunan/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Cuti Tahunan : </h4> <h4> <?php echo $jumlah_cuti_tahunan_sv4; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('cuti_khusus/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Khusus : </h4> <h4> <?php echo $jumlah_cuti_khusus_sv4; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?php echo site_url('izin/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Izin : </h4> <h4> <?php echo $jumlah_izin_sv4; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('remote/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Remote : </h4> <h4> <?php echo $jumlah_remote_sv4; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('sakit/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Jumlah pengajuan Sakit : </h4> <h4> <?php echo $jumlah_sakit_sv4; ?></h4>
                                                <p>
                                                   
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endif ?>

                                    <?php if ($template_show_role == 5 && $template_show_divisi == 5 && $template_show_posisi == 2 ): ?>
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                            <i class="material-icons">notifications</i>
                                            <?php if ($total_Sv5 > 0): ?>
                                            <span class="label-count"><?php echo $total_Sv5; ?></span>
                                            <?php endif ?>
                                        </a>
                                        <ul class="dropdown-menu" id="notif">
                                            <li class="header">NOTIFICATIONS</li>
                                            <li class="body">
                                                <ul class="menu">

                                   
                                    <li>
                                        <a href="<?php echo site_url('cuti_tahunan/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Cuti Tahunan : </h4> <h4> <?php echo $jumlah_cuti_tahunan_sv5; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('cuti_khusus/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Cuti Khusus : </h4> <h4> <?php echo $jumlah_cuti_khusus_sv5; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('izin/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Izin : </h4> <h4> <?php echo $jumlah_izin_sv5; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('remote/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Remote : </h4> <h4> <?php echo $jumlah_remote_sv5; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('sakit/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Jumlah pengajuan Sakit : </h4> <h4> <?php echo $jumlah_sakit_sv5; ?></h4>
                                                <p>
                                                   
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endif ?>

                                    <?php if ($template_show_role == 5 && $template_show_divisi == 6 && $template_show_posisi == 2 ): ?>
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                            <i class="material-icons">notifications</i>
                                            <?php if ($total_Sv6 > 0): ?>
                                            <span class="label-count"><?php echo $total_Sv6; ?></span>
                                            <?php endif ?>
                                        </a>
                                        <ul class="dropdown-menu" id="notif">
                                            <li class="header">NOTIFICATIONS</li>
                                            <li class="body">
                                                <ul class="menu">

                                   
                                    <li>
                                        <a href="<?php echo site_url('cuti_tahunan/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Cuti Tahunan : </h4> <h4> <?php echo $jumlah_cuti_tahunan_sv6; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('cuti_khusus/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Cuti Khusus : </h4> <h4> <?php echo $jumlah_cuti_khusus_sv6; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('izin/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Izin : </h4> <h4> <?php echo $jumlah_izin_sv6; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('remote/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Remote : </h4> <h4> <?php echo $jumlah_remote_sv6; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('sakit/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Jumlah pengajuan Sakit : </h4> <h4> <?php echo $jumlah_sakit_sv6; ?></h4>
                                                <p>
                                                   
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endif ?>

                                    <?php if ($template_show_role == 5 && $template_show_divisi == 8 && $template_show_posisi == 5 ): ?>
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                            <i class="material-icons">notifications</i>
                                            <?php if ($total_Sv7 > 0): ?>
                                            <span class="label-count"><?php echo $total_Sv7; ?></span>
                                            <?php endif ?>
                                        </a>
                                        <ul class="dropdown-menu" id="notif">
                                            <li class="header">NOTIFICATIONS</li>
                                            <li class="body">
                                                <ul class="menu">

                                   
                                    <li>
                                        <a href="<?php echo site_url('cuti_tahunan/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Cuti Tahunan : </h4> <h4> <?php echo $jumlah_cuti_tahunan_sv7; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('cuti_khusus/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Cuti Khusus : </h4> <h4> <?php echo $jumlah_cuti_khusus_sv7; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('izin/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Izin : </h4> <h4> <?php echo $jumlah_izin_sv7; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('remote/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                           
                                                <h4>Jumlah pengajuan Remote : </h4> <h4> <?php echo $jumlah_remote_sv7; ?></h4>
                                                <p>
                                                    
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('sakit/list_pengajuan'); ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Jumlah pengajuan Sakit : </h4> <h4> <?php echo $jumlah_sakit_sv7; ?></h4>
                                                <p>
                                                   
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endif ?>

                <!-- #END# Notifications -->

                <!-- Tasks -->
                <!-- <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">flag</i>
                        <span class="label-count">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">TASKS</li>
                        <li class="body">
                            <ul class="menu tasks">
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Footer display issue
                                            <small>32%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Make new buttons
                                            <small>45%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Create new dashboard
                                            <small>54%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Solve transition issue
                                            <small>65%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Answer GitHub questions
                                            <small>92%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="javascript:void(0);">View All Tasks</a>
                        </li>
                    </ul>
                </li> -->
                <!-- #END# Tasks -->

                <!-- <li class="pull-right">
                    <a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a>
                </li> -->
            </ul>
        </div>

    </div>
</nav>