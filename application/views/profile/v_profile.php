<style type="text/css">
    .fileUpload {
        position: relative;
        overflow: hidden;
        margin: 10px;
    }
    .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }

    
.element.style {
    max-height: 619.6px;
    /* overflow: hidden; */
    min-height: 132px;
}
    
    /* Extra small devices (phones, less than 768px) */
    @media (max-width: 768px) { 
        #card-inside-title {
            font-size: 15px;
        }

        #ukuran_per_col {
            margin-bottom: -5px;
        }

        #ukuran_per_col_2 {
            margin-bottom: -5px;
        }

        #ukuran_per_col_3 {
            margin-bottom: -5px;
        }

        #ukuran_per_col_alamat {
            margin-bottom: -10px;
        }

        /*edit*/

        #ukuran_edit_identitas{
            font-size: 15px;
            color: black;
            margin-bottom: -5px;
        }

        .ukuran_edit_identitas_isi {
            font-size: 15px;
            color: black;
        }

        #edit_ukuran_cover {
            margin-bottom: -25px;
        }

        #edit_ukuran_cover_2 {
            margin-bottom: -5px;
        }

        #edit_ukuran_cover_sub {
            margin-bottom: -30px;
        }

    }
    
    /* Small devices (tablets, 768px and up) */
    @media (min-width: 768px) and (max-width: 992px) { 
        #card-inside-title {
            font-size: 14px;
        }

        #ukuran_per_col {
            margin-bottom: 0px;
        }

        #ukuran_per_col_2 {
            margin-bottom: -5px;
        }

        #ukuran_per_col_3 {
            margin-bottom: -5px;
        }

        #ukuran_per_col_alamat {
            margin-bottom: -10px;
        }

        /*edit*/

        #ukuran_edit_identitas{
            font-size: 14px;
            color: black;
            margin-bottom: -5px;
        }

        .ukuran_edit_identitas_isi {
            font-size: 14px;
            color: black;
        }

        #edit_ukuran_cover {
            margin-bottom: -25px;
        }

        #edit_ukuran_cover_2 {
            margin-bottom: -5px;
        }

        #edit_ukuran_cover_sub {
            margin-bottom: -30px;
        }
    }
    
    /* Medium devices (desktops, 992px and up) */
    @media (min-width: 992px) and (max-width: 1200px) {
        #card-inside-title {
            font-size: 13px;
        }

        #ukuran_per_col {
            margin-bottom: 0px;
        }

        #ukuran_per_col_2 {
            margin-bottom: -20px;
        }

        #ukuran_per_col_3 {
            margin-bottom: 0px;
        }

        #ukuran_per_col_alamat {
            margin-bottom: -10px;
        }

        /*edit*/

        #ukuran_edit_identitas{
            font-size: 13px;
            color: black;
            margin-bottom: -5px;
        }

        .ukuran_edit_identitas_isi {
            font-size: 13px;
            color: black;
        }

        #edit_ukuran_cover {
            margin-bottom: -25px;
        }

        #edit_ukuran_cover_2 {
            margin-bottom: -5px;
        }

        #edit_ukuran_cover_sub {
            margin-bottom: -30px;
        }
    }
    
    /* Large devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) {
        #card-inside-title {
            font-size: 13px;
        }

        #ukuran_per_col {
            margin-bottom: 0px;
        }

        #ukuran_per_col_2 {
            margin-bottom: -20px;
        }

        #ukuran_per_col_3 {
            margin-bottom: 0px;
        }

        #ukuran_per_col_alamat {
            margin-bottom: -10px;
        }

        /*edit*/

        #ukuran_edit_identitas{
            font-size: 13px;
            color: black;
            margin-bottom: -5px;
        }

        .ukuran_edit_identitas_isi {
            font-size: 13px;
            color: black;
        }

        #edit_ukuran_cover {
            margin-bottom: -25px;
        }

        #edit_ukuran_cover_2 {
            margin-bottom: -5px;
        }

        #edit_ukuran_cover_sub {
            margin-bottom: -30px;
        }
    }
}
</style>

<section class="content">
    <div class="container-fluid">
        
        <?php echo $alert; ?>

        <?php foreach ($q_profile as $row): ?>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="header text-center">
                            <h2>FOTO <?php echo $title_page; ?></h2>
                        </div>

                        <div class="body">
                            <?php echo form_open_multipart('profile/update_image', array('class' => 'collapse updateImage')); ?>

                                <input type="hidden" name="user_id" value="<?php echo $row->user_id; ?>">

                                <div class="row" style="border-radius: 5px; margin: 0 5px;">
                                    <br>

                                    <div class="col-md-12 text-center">
                                        <div class="fileUpload bg-success">
                                            <p class="text-center">Klik disini</p>
                                            <span><i class="material-icons">touch_app</i></span>
                                            <input type="hidden" name="image_db" value="<?php echo $row->user_photo; ?>">
                                            <input name="file_image" class="upload" type="file" id="uploadBtn" />
                                        </div>

                                        <input id="uploadFile" placeholder="" disabled="disabled" />
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <p class="font-12 text-center">Hanya file gif, jpg, dan png.</p>
                                        <p class="font-12 text-center">Max 10mb.</p>
                                        <button type="button" class="btn btn-warning waves-effect batalImage">BATAL</button>
                                        <button type="submit" class="btn btn-info waves-effect">SIMPAN</button> 
                                    </div>   
                                </div>
                            </form>

                            <center>
                                <a class="editImage" title="Klik untuk ganti foto" style="cursor: pointer;">
                                <?php if (!empty($row->user_photo)): ?>
                                    <img class="img-responsive thumbnail" src="<?php echo base_url('assets/images/users/'.$row->user_photo); ?>" width="155">
                                <?php else: ?>
                                    <?php if ($row->user_gender == 'l'): ?>
                                        <img class="img-responsive thumbnail" src="<?php echo base_url(); ?>assets/images/users/no-man.png" width="155">
                                    <?php elseif($row->user_gender == 'p'): ?>
                                        <img class="img-responsive thumbnail" src="<?php echo base_url(); ?>assets/images/users/no-woman.png" width="155">
                                    <?php else: ?>
                                        <img class="img-responsive thumbnail" src="<?php echo base_url(); ?>assets/images/users/no-gender.jpg" width="155">
                                    <?php endif ?>
                                <?php endif ?>
                                </a>

                                <br>

                                <?php echo ucwords(strtolower($row->user_name)); ?>
                                <br>
                                
                                <?php echo ucwords($row->jabatan_name); ?>


                                    <?php echo ucwords($row->divisi_name); ?>

                                <br> 
                            </center>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                    <div class="card">

                        <div class="header">
                            <h2>
                                <?php echo $title_page; ?>
                                <small class='header-profile'>Data Personal Pegawai</small>        
                            </h2>

                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>

                                    <ul class="dropdown-menu pull-right">
                                        <li class="buttoneditProfile"><a href="javascript:void(0);">Edit Identitas</a></li>
                                        <li class="buttoneditAlamatDiBandung"><a href="javascript:void(0);">Edit Alamat Di Bandung</a></li>
                                        <li class="buttoneditAlamatLuarBandung"><a href="javascript:void(0);">Edit Alamat Luar Bandung</a></li>
                                        <li class="buttonEditPassword"><a href="javascript:void(0);">Edit Password</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <div class="body">
                            <div class="row">
                                
                                <!-- detail -->
                                <div class="detailProfile col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        
                                        <!-- LEFT -->
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="ukuran_per_col">
                                            <div class="row clearfix">

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ukuran_per_col_2">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12" id="ukuran_per_col_3">
                                                            <h6 class="card-inside-title" id="card-inside-title">Nama Lengkap</h6>
                                                        </div>

                                                        <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                                                            <h6 class="card-inside-title" id="card-inside-title" style="font-weight: normal;">
                                                               <?php echo ucwords(strtolower($row->user_name)); ?>   
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ukuran_per_col_2">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12" id="ukuran_per_col_3">
                                                            <h6 class="card-inside-title" id="card-inside-title">Tempat Lahir</h6>
                                                        </div>
                                                        
                                                        <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                                                            <h6 class="card-inside-title" id="card-inside-title" style="font-weight: normal;">
                                                                <?php 
                                                                    if (empty($row->user_tmpt_lhr)) 
                                                                    {
                                                                        echo "<span class='col-pink'>Belum Diisi</span>";
                                                                    }
                                                                    else 
                                                                    {
                                                                        echo ucwords($row->user_tmpt_lhr);
                                                                    }
                                                                ?>        
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ukuran_per_col_2">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12" id="ukuran_per_col_3">
                                                            <h6 class="card-inside-title" id="card-inside-title">Tanggal Lahir</h6>
                                                        </div>
                                                        
                                                        <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                                                            <h6 class="card-inside-title" id="card-inside-title" style="font-weight: normal;">
                                                                <?php echo tgl_in($row->user_tgl_lhr); ?>        
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ukuran_per_col_2">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12" id="ukuran_per_col_3">
                                                            <h6 class="card-inside-title" id="card-inside-title">Jabatan</h6>
                                                        </div>
                                                        
                                                        <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                                                            <h6 class="card-inside-title" id="card-inside-title" style="font-weight: normal;">
                                                                <?php echo ucwords($row->jabatan_name); ?>         
                                                            </h6>
                                                        </div>
                                                        
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ukuran_per_col_2">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12" id="ukuran_per_col_3">
                                                            <h6 class="card-inside-title" id="card-inside-title">Perusahaan</h6>
                                                        </div>
                                                        
                                                        <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                                                            <h6 class="card-inside-title" id="card-inside-title" style="font-weight: normal;">
                                                                <?php echo ucwords($row->lembaga_name); ?>         
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php if ($template_show_role == 5 || $template_show_role == 6): ?>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ukuran_per_col_2">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12" id="ukuran_per_col_3">
                                                            <h6 class="card-inside-title" id="card-inside-title">Dept. / Bagian</h6>
                                                        </div>
                                                        
                                                        <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                                                            <h6 class="card-inside-title" id="card-inside-title" style="font-weight: normal;">
                                                                <?php echo ucwords($row->divisi_name); ?>        
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endif ?>

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ukuran_per_col_2">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12" id="ukuran_per_col_3">
                                                            <h6 class="card-inside-title" id="card-inside-title">Nomor KTP / SIM</h6>
                                                        </div>
                                                        
                                                        <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                                                            <h6 class="card-inside-title" id="card-inside-title" style="font-weight: normal;">
                                                                <?php 
                                                                    if (empty($row->user_ktp_sim)) 
                                                                    {
                                                                        echo "<span class='col-pink'>Belum Diisi</span>";
                                                                    }
                                                                    else 
                                                                    {
                                                                        echo $row->user_ktp_sim;
                                                                    }
                                                                ?>      
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ukuran_per_col_2">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12" id="ukuran_per_col_3">
                                                            <h6 class="card-inside-title" id="card-inside-title">NPWP</h6>
                                                        </div>
                                                        
                                                        <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                                                            <h6 class="card-inside-title" id="card-inside-title" style="font-weight: normal;">
                                                                <?php 
                                                                    if (empty($row->user_npwp)) 
                                                                    {
                                                                        echo "<span class='col-orange'>Belum Ada</span>";
                                                                    }
                                                                    else
                                                                    {
                                                                        echo $row->user_npwp;
                                                                    } 
                                                                ?>         
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ukuran_per_col_2">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12" id="ukuran_per_col_3">
                                                            <h6 class="card-inside-title" id="card-inside-title">E-mail</h6>
                                                        </div>
                                                        
                                                        <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                                                            <h6 class="card-inside-title" id="card-inside-title" style="font-weight: normal;">
                                                                <?php 
                                                                    if (empty($row->user_email)) 
                                                                    {
                                                                        echo "<span class='col-orange'>Belum Ada</span>";
                                                                    }
                                                                    else
                                                                    {
                                                                        echo $row->user_email;
                                                                    } 
                                                                ?>         
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        
                                        <!-- RIGHT -->
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row clearfix">

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ukuran_per_col_2">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12" id="ukuran_per_col_3">
                                                            <h6 class="card-inside-title" id="card-inside-title">Jenis Kelamin</h6>
                                                        </div>

                                                        <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                                                            <h6 class="card-inside-title" id="card-inside-title" style="font-weight: normal;">
                                                                <?php
                                                                    if ($row->user_gender == 'l') 
                                                                    {
                                                                        echo "Laki - laki";
                                                                    }
                                                                    elseif ($row->user_gender == 'p') 
                                                                    {
                                                                        echo "Perempuan";
                                                                    }
                                                                    else
                                                                    {
                                                                        echo "Tidak diketahui";
                                                                    }
                                                                ?>   
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ukuran_per_col_2">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12" id="ukuran_per_col_3">
                                                            <h6 class="card-inside-title" id="card-inside-title">No Induk Karyawan</h6>
                                                        </div>

                                                        <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                                                            <h6 class="card-inside-title" id="card-inside-title" style="font-weight: normal;">
                                                                 <?php  
                                                                    if (empty($row->user_nik)) 
                                                                    {
                                                                        echo "Belum Tersedia";
                                                                    }
                                                                    else
                                                                    {
                                                                        echo ucwords($row->user_nik);
                                                                    }
                                                                ?>    
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ukuran_per_col_2">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12" id="ukuran_per_col_3">
                                                            <h6 class="card-inside-title" id="card-inside-title">Kewarga Negaraan</h6>
                                                        </div>

                                                        <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                                                            <h6 class="card-inside-title" id="card-inside-title" style="font-weight: normal;">
                                                                <?php 
                                                                    if (empty($row->user_warga)) 
                                                                    {
                                                                        echo "<span class='col-pink'>Belum Diisi</span>";
                                                                    }
                                                                    else 
                                                                    {
                                                                        echo ucwords($row->user_warga);
                                                                    }
                                                                ?>  
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ukuran_per_col_2">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12" id="ukuran_per_col_3">
                                                            <h6 class="card-inside-title" id="card-inside-title">Agama</h6>
                                                        </div>

                                                        <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                                                            <h6 class="card-inside-title" id="card-inside-title" style="font-weight: normal;">
                                                                <?php 
                                                                    if (empty($row->user_agama)) 
                                                                    {
                                                                        echo "<span class='col-pink'>Belum Diisi</span>";
                                                                    }
                                                                    else 
                                                                    {
                                                                        echo  ucwords($row->user_agama);
                                                                    }
                                                                ?>   
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ukuran_per_col_2">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12" id="ukuran_per_col_3">
                                                            <h6 class="card-inside-title" id="card-inside-title">Golongan Darah</h6>
                                                        </div>

                                                        <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                                                            <h6 class="card-inside-title" id="card-inside-title" style="font-weight: normal;">
                                                                <?php 
                                                                    if (empty($row->user_gol_dar)) 
                                                                    {
                                                                        echo "<span class='col-pink'>Belum Diisi</span>";
                                                                    }
                                                                    else 
                                                                    {
                                                                        echo  ucwords($row->user_gol_dar);
                                                                    }
                                                                ?> 
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ukuran_per_col_2">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12" id="ukuran_per_col_3">
                                                            <h6 class="card-inside-title" id="card-inside-title">No. JAMSOSTEK</h6>
                                                        </div>
                                                        
                                                        <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                                                            <h6 class="card-inside-title" id="card-inside-title" style="font-weight: normal;">
                                                                <?php 
                                                                    if (empty($row->user_jamsostek)) 
                                                                    {
                                                                        echo "<span class='col-orange'>Belum Ada</span>";
                                                                    }
                                                                    else
                                                                    {
                                                                        echo $row->user_npwp;
                                                                    } 
                                                                ?>        
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div> 

                                        <!-- ADDRESS -->

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: -5px;">
                                            <div class="row clearfix">

                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="ukuran_per_col_2">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ukuran_per_col_alamat">
                                                            <h6 class="card-inside-title" id="card-inside-title">Alamat Lengkap Di Bandung</h6>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <h6 class="card-inside-title" id="card-inside-title" style="font-weight: normal;">
                                                                <?php if (!empty($v_alamat_di)): ?>
                                                                    <?php  
                                                                        foreach ($v_alamat_di as $rowvad) 
                                                                        {
                                                                            echo ucwords(strtolower($rowvad->alamat_di_alamat)).' RT '.$rowvad->alamat_di_rt.'/RW '.$rowvad->alamat_di_rw.' <br> Desa '.ucwords(strtolower($rowvad->desa_name)).' Kecamatan '.ucwords(strtolower($rowvad->kec_name)).' '.ucwords(strtolower($rowvad->kokab_name)).' Provinsi '.ucwords(strtolower($rowvad->prov_name));
                                                                        }
                                                                    ?> 
                                                                <?php endif ?> 
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="row">
                                                       <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" id="ukuran_per_col_2">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ukuran_per_col_alamat">
                                                                    <h6 class="card-inside-title" id="card-inside-title">Kode Pos</h6>
                                                                </div>

                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <h6 class="card-inside-title" id="card-inside-title" style="font-weight: normal;">
                                                                        <?php 
                                                                        if (empty($q_dbdg_kode_pos)) 
                                                                        {
                                                                            echo "Tidak Ada";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo $q_dbdg_kode_pos;
                                                                        }
                                                                        ?>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12" id="ukuran_per_col_2">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ukuran_per_col_alamat">
                                                                    <h6 class="card-inside-title" id="card-inside-title">Telp. & Hp.</h6>
                                                                </div>

                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <h6 class="card-inside-title" id="card-inside-title" style="font-weight: normal;">
                                                                        <?php echo $q_dbdg_tlp.' & '.$q_dbdg_hp; ?>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>

                                            </div>
                                        </div>  

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: -40px;">
                                            <div class="row clearfix">

                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="ukuran_per_col_2">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ukuran_per_col_alamat">
                                                            <h6 class="card-inside-title" id="card-inside-title">Alamat Lengkap Luar Bandung</h6>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <h6 class="card-inside-title" id="card-inside-title" style="font-weight: normal;">
                                                                <?php if (!empty($v_alamat_luar)): ?>
                                                                    <?php  
                                                                        foreach ($v_alamat_luar as $rowval) 
                                                                        {
                                                                            echo ucwords(strtolower($rowval->alamat_luar_alamat)).' RT '.$rowval->alamat_luar_rt.'/RW '.$rowval->alamat_luar_rw.' <br> Desa '.ucwords(strtolower($rowval->desa_name)).' Kecamatan '.ucwords(strtolower($rowval->kec_name)).' '.ucwords(strtolower($rowval->kokab_name)).' Provinsi '.ucwords(strtolower($rowval->prov_name));
                                                                        }
                                                                    ?> 
                                                                <?php endif ?>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="row">
                                                       <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" id="ukuran_per_col_2">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ukuran_per_col_alamat">
                                                                    <h6 class="card-inside-title" id="card-inside-title">Kode Pos</h6>
                                                                </div>

                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <h6 class="card-inside-title" id="card-inside-title" style="font-weight: normal;">
                                                                       <?php 
                                                                        if (empty($q_lbdg_kode_pos)) 
                                                                        {
                                                                            echo "Tidak Ada";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo $q_lbdg_kode_pos;
                                                                        }
                                                                        ?>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12" id="ukuran_per_col_2">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ukuran_per_col_alamat">
                                                                    <h6 class="card-inside-title" id="card-inside-title">Telp. & Hp.</h6>
                                                                </div>

                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <h6 class="card-inside-title" id="card-inside-title" style="font-weight: normal;">
                                                                        <?php echo $q_lbdg_tlp.' & '.$q_lbdg_hp; ?>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>

                                            </div>
                                        </div>                                           
                            
                                    </div>
                                </div>
                                
                                <!-- edit profile -->
                                <div class="editProfile col-lg-12 col-md-12 col-sm-12 col-xs-12 collapse">
                                    <?php echo form_open('profile/update', array('class' => '')); ?>

                                        <input type="hidden" name="user_id" value="<?php echo $row->user_id; ?>">
                                        <div class="row">

                                            <!-- LEFT -->
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="row">

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="edit_ukuran_cover">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="ukuran_edit_identitas">
                                                                <label>Nama Lengkap</label>
                                                            </div>

                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <input type="text" name="user_name" class="ukuran_edit_identitas_isi form-control" value="<?php echo strtolower($row->user_name); ?>" style="text-transform:capitalize;" required>
                                                                    </div>
                                                                </div> 
                                                            </div>    
                                                        </div>
                                                    </div>

                                                    <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="edit_ukuran_cover">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="ukuran_edit_identitas">
                                                                <label>Jabatan</label>
                                                            </div>

                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <select name="user_jabatan" id="jabatan_idi" class="form-control" required>
                                                                            <option value="" disabled>Silahkan Pilih</option>
                                                                            <?php foreach ($datajabatan as $rowKategori): ?>
                                                                                <option value="<?php echo $rowKategori->jabatan_id; ?>"  <?php if ($row->user_jabatan == $rowKategori->jabatan_id) {echo "selected";} ?>>
                                                                            <?php echo ucwords($rowKategori->jabatan_name); ?>        
                                                                            </option>
                                                                            <?php endforeach ?>
                                                                        </select>                                                                         </div>
                                                                </div> 
                                                            </div>    
                                                        </div>
                                                    </div> -->

                                                    <!-- <?php if ($template_show_role == 5 || $template_show_role == 6): ?>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="edit_ukuran_cover">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="ukuran_edit_identitas">
                                                                <label for="user_divisi">Dept. / Bagian</label>
                                                            </div>       
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <div class="form-line">                                                         
                                                                    <select name="user_divisi" id="divisi_idi" class="form-control" required>
                                                                        <option value="" selected disabled>Silahkan Pilih</option>
                                                                        <?php foreach ($datakategori as $rowKategori): ?>
                                                                            <option value="<?php echo $rowKategori->divisi_name; ?>">
                                                                                <?php echo ucwords($rowKategori->divisi_name); ?>        
                                                                            </option>
                                                                        <?php endforeach ?>
                                                                    </select>     
                                                                    </div> 
                                                                </div>                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endif ?> -->

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="edit_ukuran_cover_2">
                                                        <div class="row">

                                                            <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12" id="edit_ukuran_cover_sub">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="ukuran_edit_identitas">
                                                                        <label>Tempat Lahir</label>
                                                                    </div>

                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" name="user_tmpt_lhr" class="ukuran_edit_identitas_isi form-control" value="<?php echo strtolower($row->user_tmpt_lhr); ?>" style="text-transform:capitalize;" required>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                </div>
                                                            </div>  

                                                            <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12" id="edit_ukuran_cover_sub">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="ukuran_edit_identitas">
                                                                        <label>Tanggal Lahir</label>
                                                                    </div>

                                                                    <?php
                                                                        if ($row->user_tgl_lhr == 0000-00-00) 
                                                                        {
                                                                            $tgl_lhr = tgl_en(date('Y-m-d'));
                                                                        }
                                                                        else
                                                                        {
                                                                            $tgl_lhr = tgl_en($row->user_tgl_lhr);
                                                                        }
                                                                    ?>

                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" name="user_tgl_lhr" class="datepicker form-control" value="<?php echo $tgl_lhr; ?>" required>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                        </div> 
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="edit_ukuran_cover_2">
                                                        <div class="row">

                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="edit_ukuran_cover_sub">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="ukuran_edit_identitas">
                                                                        <label>Nomor KTP / SIM</label>
                                                                    </div>

                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" name="user_ktp_sim" class="ukuran_edit_identitas_isi form-control" value="<?php echo $row->user_ktp_sim; ?>" required>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                </div>
                                                            </div>  

                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="edit_ukuran_cover_sub">
                                                                <div class="row">
                                                                    <div class="col-lg-12"  id="ukuran_edit_identitas">
                                                                        <label>NPWP</label>
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" name="user_npwp" class="ukuran_edit_identitas_isi form-control" value="<?php echo $row->user_npwp; ?>" >
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                        </div> 
                                                    </div>

                                                </div>                                         
                                            </div>

                                            <!-- RIGHT -->
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="row">

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="edit_ukuran_cover_2">
                                                        <div class="row">

                                                            <div class="col-lg-7 col-md-8 col-sm-12 col-xs-12" id="edit_ukuran_cover_sub">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="ukuran_edit_identitas">
                                                                        <label>Jenis Kelamin</label>
                                                                    </div>

                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="form-group" style="padding-top: 12px;">
                                                                            <input name="user_gender" type="radio" id="l" value="l" class="with-gap radio-col-green" <?php if ($row->user_gender == 'l') {echo "checked";} ?> />
                                                                            <label for="l">Laki - laki</label>

                                                                            <input name="user_gender" type="radio" id="p" value="p" class="with-gap radio-col-pink" <?php if ($row->user_gender == 'p') {echo "checked";} ?> />
                                                                            <label for="p">Perempuan</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>  

                                                            <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12" id="edit_ukuran_cover_sub">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="ukuran_edit_identitas">
                                                                        <label>Gol Darah</label>
                                                                    </div>

                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <select class="form-control show-tick" name="user_gol_dar" required>
                                                                                    <option value="o" <?php if ($row->user_gol_dar == 'o') {echo "selected";} ?>>O</option>
                                                                                    <option value="a" <?php if ($row->user_gol_dar == 'a') {echo "selected";} ?>>A</option>
                                                                                    <option value="b" <?php if ($row->user_gol_dar == 'b') {echo "selected";} ?>>B</option>
                                                                                    <option value="ab" <?php if ($row->user_gol_dar == 'ab') {echo "selected";} ?>>AB</option>
                                                                                </select>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                        </div> 
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="edit_ukuran_cover_2">
                                                        <div class="row"> 

                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="edit_ukuran_cover_sub">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="ukuran_edit_identitas">
                                                                        <label>Kewarga Negaraan</label>
                                                                    </div>

                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" name="user_warga" class="ukuran_edit_identitas_isi form-control" value="<?php echo ucwords(strtolower($row->user_warga)); ?>" style="text-transform:capitalize;" required>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="edit_ukuran_cover_sub">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="ukuran_edit_identitas">
                                                                        <label>E-mail</label>
                                                                    </div>

                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" name="user_email" class="ukuran_edit_identitas_isi form-control" value="<?php echo $row->user_email; ?>" required>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                </div>
                                                            </div> 

                                                        </div> 
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="edit_ukuran_cover_2">
                                                        <div class="row">

                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="edit_ukuran_cover_sub">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="ukuran_edit_identitas">
                                                                        <label>Agama</label>
                                                                    </div>

                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" name="user_agama" class="ukuran_edit_identitas_isi form-control" value="<?php echo ucwords($row->user_agama); ?>" style="text-transform:capitalize;" required>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                </div>
                                                            </div>  

                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="edit_ukuran_cover_sub">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="ukuran_edit_identitas">
                                                                        <label>No. JAMSOSTEK</label>
                                                                    </div>

                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input type="text" name="user_jamsostek" class="ukuran_edit_identitas_isi form-control" value="<?php echo $row->user_jamsostek; ?>" >
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                        </div> 
                                                    </div>

                                                </div>
                                            </div>

                                        </div>         
                                        
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left" style="margin-bottom: -15px;">
                                                <button type="button" class="btn bg-grey waves-effect buttoncalcelIdentitas">BATAL</button>
                                                <button type="submit" class="btn btn-primary waves-effect buttonsaveProfile">SIMPAN</button>
                                            </div>
                                        </div> 

                                    </form>
                                </div>

                                <!-- edit alamat di bandung -->
                                <div class="editAlamatDiBandung col-lg-12 col-md-12 col-sm-12 col-xs-12 collapse">
                                   <?php echo form_open('profile/alamat_di', array('class' => '')); ?>

                                        <input type="hidden" name="alamat_di_id" value="<?php echo $q_dbdg_id; ?>">

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 0px;">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                        <p><b>Provinsi</b></p>
                                                        <div class="form-line">
                                                            <select id="select_provinsi_di" class="form-control show-tick " name="alamat_di_prov" required>
                                                                <option value="">Silahkan Pilih</option>

                                                                <?php foreach ($qProvinsi as $rowProv): ?>
                                                                    <option value="<?php echo $rowProv->prov_id; ?>" <?php if ($rowProv->prov_id == $q_dbdg_prov) {echo "selected";} ?>>
                                                                        <?php echo ucwords(strtolower($rowProv->prov_name)); ?>
                                                                    </option>
                                                                <?php endforeach ?>
                                                            </select>         
                                                        </div>                                
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 <?php echo $collapse_di; ?> select_kokab_di">
                                                        <p><b>Kota/Kabupaten</b></p>

                                                        <select id="select_kokab_di" class="form-control show-tick" name="alamat_di_kokab"  required>
                                                            <option value="">Silahkan Pilih</option>

                                                            <?php if (!empty($select_kokab_di)): ?>
                                                                <?php foreach ($select_kokab_di as $rowsk): ?>
                                                                   <option value="<?php echo $rowsk->kokab_id; ?>" <?php if ($rowsk->kokab_id == $q_dbdg_kokab) {echo "selected";} ?>>
                                                                        <?php echo ucwords(strtolower($rowsk->kokab_name)); ?>
                                                                    </option> 
                                                                <?php endforeach ?> 
                                                            <?php endif ?>
                                                        </select>                                         
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 <?php echo $collapse_di; ?> select_kec_di">
                                                        <p><b>Kecamatan</b></p>

                                                        <select id="select_kec_di" class="form-control show-tick" name="alamat_di_kec"  required>
                                                            <option value="">Silahkan Pilih</option>

                                                            <?php if (!empty($select_kec_di)): ?>
                                                                <?php foreach ($select_kec as $rowskec): ?>
                                                                   <option value="<?php echo $rowskec->kec_id; ?>" <?php if ($rowskec->kec_id == $q_dbdg_kec) {echo "selected";} ?>>
                                                                        <?php echo ucwords(strtolower($rowskec->kec_name)); ?>
                                                                    </option> 
                                                                <?php endforeach ?>
                                                            <?php endif ?>
                                                        </select>                                         
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="row">                                         
                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 <?php echo $collapse_di; ?> select_desa_di">
                                                        <p><b>Desa</b></p>

                                                        <select id="select_desa_di" class="form-control show-tick" name="alamat_di_desa"  required>
                                                            <option value="">Silahkan Pilih</option>

                                                            <?php if (!empty($select_desa_di)): ?>
                                                                <?php foreach ($select_desa_di as $rowdes): ?>
                                                                   <option value="<?php echo $rowdes->desa_id; ?>" <?php if ($rowdes->desa_id == $q_dbdg_desa) {echo "selected";} ?>>
                                                                        <?php echo ucwords(strtolower($rowdes->desa_name)); ?>
                                                                    </option> 
                                                                <?php endforeach ?>
                                                            <?php endif ?>
                                                        </select>                                         
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 <?php echo $collapse_di; ?> select_alamat_di">
                                                        <p><b>Alamat</b></p>

                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" name="alamat_di_alamat" class="form-control" value="<?php echo $q_dbdg_alamat; ?>">
                                                            </div>
                                                        </div>                                          
                                                    </div>

                                                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 <?php echo $collapse_di; ?> select_rt_di">
                                                        <p><b>RT</b></p>

                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" name="alamat_di_rt" class="form-control" value="<?php echo $q_dbdg_rt; ?>">
                                                            </div>
                                                        </div>                                          
                                                    </div>

                                                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 <?php echo $collapse_di; ?> select_rw_di">
                                                        <p><b>RW</b></p>

                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" name="alamat_di_rw" class="form-control" value="<?php echo $q_dbdg_rw; ?>">
                                                            </div>
                                                        </div>                                          
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: -25px; margin-top: -20px;">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                        <p><b>Kode Pos</b></p>

                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" name="alamat_di_kode_pos" class="form-control" value="<?php echo $q_dbdg_kode_pos; ?>">
                                                            </div>
                                                        </div>                                         
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                        <p><b>No Telepon</b></p>

                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" name="alamat_di_telp" class="form-control" value="<?php echo $q_dbdg_tlp; ?>">
                                                            </div>
                                                        </div>                                          
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                        <p><b>No Handphone</b></p>
                                                        
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" name="alamat_di_hp" class="form-control" value="<?php echo $q_dbdg_hp; ?>">
                                                            </div>
                                                        </div>                                          
                                                    </div>
                                                </div>  
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left" style="margin-bottom: -15px;">
                                                <button type="button" class="btn bg-grey waves-effect buttoncalcelIdentitas">BATAL</button>
                                                <button type="submit" class="btn btn-primary waves-effect buttonsaveProfile">SIMPAN</button>
                                            </div>
                                        </div>        

                                    </form>
                                </div>

                                <!-- edit alamat luar bandung -->
                                <div class="editAlamatLuarBandung col-lg-12 col-md-12 col-sm-12 col-xs-12 collapse">
                                    <?php echo form_open('profile/alamat_luar', array('class' => '')); ?>

                                        <input type="hidden" name="alamat_luar_id" value="<?php echo $q_lbdg_id; ?>">

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 0px;">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                        <p><b>Provinsi</b></p>

                                                        <select id="select_provinsi" class="form-control show-tick" name="alamat_luar_prov"  required>
                                                            <option value="">Silahkan Pilih</option>

                                                            <?php foreach ($qProvinsi as $rowProv): ?>
                                                                <option value="<?php echo $rowProv->prov_id; ?>" <?php if ($rowProv->prov_id == $q_lbdg_prov) {echo "selected";} ?>>
                                                                    <?php echo ucwords(strtolower($rowProv->prov_name)); ?>
                                                                </option>
                                                            <?php endforeach ?>
                                                        </select>                                         
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 <?php echo $collapse; ?> select_kokab">
                                                        <p><b>Kota/Kabupaten</b></p>

                                                        <select id="select_kokab" class="form-control show-tick" name="alamat_luar_kokab"  required>
                                                            <option value="">Silahkan Pilih</option>

                                                            <?php if (!empty($select_kokab)): ?>
                                                                <?php foreach ($select_kokab as $rowsk): ?>
                                                                   <option value="<?php echo $rowsk->kokab_id; ?>" <?php if ($rowsk->kokab_id == $q_lbdg_kokab) {echo "selected";} ?>>
                                                                        <?php echo ucwords(strtolower($rowsk->kokab_name)); ?>
                                                                    </option> 
                                                                <?php endforeach ?> 
                                                            <?php endif ?>
                                                        </select>                                         
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 <?php echo $collapse; ?> select_kec">
                                                        <p><b>Kecamatan</b></p>

                                                        <select id="select_kec" class="form-control show-tick" name="alamat_luar_kec"  required>
                                                            <option value="">Silahkan Pilih</option>

                                                            <?php if (!empty($select_kec)): ?>
                                                                <?php foreach ($select_kec as $rowskec): ?>
                                                                   <option value="<?php echo $rowskec->kec_id; ?>" <?php if ($rowskec->kec_id == $q_lbdg_kec) {echo "selected";} ?>>
                                                                        <?php echo ucwords(strtolower($rowskec->kec_name)); ?>
                                                                    </option> 
                                                                <?php endforeach ?>
                                                            <?php endif ?>
                                                        </select>                                         
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="row">                                         
                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 <?php echo $collapse; ?> select_desa">
                                                        <p><b>Desa</b></p>

                                                        <select id="select_desa" class="form-control show-tick" name="alamat_luar_desa"  required>
                                                            <option value="">Silahkan Pilih</option>

                                                            <?php if (!empty($select_desa)): ?>
                                                                <?php foreach ($select_desa as $rowdes): ?>
                                                                   <option value="<?php echo $rowdes->desa_id; ?>" <?php if ($rowdes->desa_id == $q_lbdg_desa) {echo "selected";} ?>>
                                                                        <?php echo ucwords(strtolower($rowdes->desa_name)); ?>
                                                                    </option> 
                                                                <?php endforeach ?>
                                                            <?php endif ?>
                                                        </select>                                         
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 <?php echo $collapse; ?> select_alamat">
                                                        <p><b>Alamat</b></p>

                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" name="alamat_luar_alamat" class="form-control" value="<?php echo $q_lbdg_alamat; ?>">
                                                            </div>
                                                        </div>                                          
                                                    </div>

                                                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 <?php echo $collapse; ?> select_rt">
                                                        <p><b>RT</b></p>

                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" name="alamat_luar_rt" class="form-control" value="<?php echo $q_lbdg_rt; ?>">
                                                            </div>
                                                        </div>                                          
                                                    </div>

                                                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 <?php echo $collapse; ?> select_rw">
                                                        <p><b>RW</b></p>

                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" name="alamat_luar_rw" class="form-control" value="<?php echo $q_lbdg_rw; ?>">
                                                            </div>
                                                        </div>                                          
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: -25px; margin-top: -20px;">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                        <p><b>Kode Pos</b></p>

                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" name="alamat_luar_kode_pos" class="form-control" value="<?php echo $q_lbdg_kode_pos; ?>">
                                                            </div>
                                                        </div>                                         
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                        <p><b>No Telepon</b></p>

                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" name="alamat_luar_telp" class="form-control" value="<?php echo $q_lbdg_tlp; ?>">
                                                            </div>
                                                        </div>                                          
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                        <p><b>No Handphone</b></p>
                                                        
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" name="alamat_luar_hp" class="form-control" value="<?php echo $q_lbdg_hp; ?>">
                                                            </div>
                                                        </div>                                          
                                                    </div>
                                                </div>  
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left" style="margin-bottom: -15px;">
                                                <button type="button" class="btn bg-grey waves-effect buttoncalcelIdentitas">BATAL</button>
                                                <button type="submit" class="btn btn-primary waves-effect buttonsaveProfile">SIMPAN</button>
                                            </div>
                                        </div> 

                                    </form>
                                </div>
                                
                                <!-- edit password -->
                                <div class="editPassword col-lg-12 col-md-12 col-sm-12 col-xs-12 collapse">
                                    <?php echo form_open('profile/update_password'); ?>
                                        <input type="hidden" name="user_id" value="<?php echo $row->user_id; ?>">
                                        <input type="hidden" name="user_password_db" value="<?php echo $row->user_password; ?>">

                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="password" name="user_password_input" class="form-control" required>
                                                <label class="form-label">Masukan Password Lama</label>
                                            </div>
                                        </div>

                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="password" class="form-control" name="user_password_baru" required>
                                                <label class="form-label">Masukan Password Baru</label>
                                            </div>
                                        </div>

                                        

                                        <br>

                                        <button type="button" class="btn bg-grey waves-effect buttoncalcelIdentitas">BATAL</button>
                                        <button type="submit" class="btn btn-primary waves-effect">SIMPAN</button>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach ?>

    </div>
</section>
