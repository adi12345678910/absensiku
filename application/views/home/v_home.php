<style type="text/css">
    
    /* Extra small devices (phones, less than 768px) */
    
    @media (max-width: 768px) { 
        
        #all_absen_masuk {
            
            font-size: 12px;
            
        }
        
        
        
        #absen_masuk_sub {
            
            margin-bottom: -25px;
            
        }
        
        
        
        #absen_att {
            
            margin-right: -10px;
            
        }
        
        
        
        #absen_att_pulang {
            
            margin-right: -40px;
            
        }
        
        
        
        #absen_att_titik {
            
            margin-right: -15px;
            
        }

        .titik2 {
            
            margin-left: 20px;
            
        }
        
        
        
        #ukuran_jam_absen {
            
            font-size: 12px;
            
        }
        
        
        
        #sudah_absen {
            
            font-size: 12px;
            
        }
        
        
        
        
        
        /*todo list*/
        
        
        
        
        
        #all_todo {
            
            font-size: 12px;
            
        }
        
        
        
        .all_todo {
            
            font-size: 12px;
            
        }
        
    }
    
    
    
    /* Small devices (tablets, 768px and up) */
    
    @media (min-width: 768px) and (max-width: 992px) { 
        
        #all_absen_masuk {
            
            font-size: 13px;
            
        }
        
        
        
        #absen_masuk_sub {
            
            margin-bottom: -25px;
            
        }
        
        
        
        #absen_att {
            
            margin-right: -50px;
            
        }
        #absen_att66 {
            
            margin-right: 100px;
            
        }
        
        
        
        #absen_att_pulang {
            
            margin-right: -30px;
            
        }
        
        
        
        #absen_att_titik {
            
            margin-right: -15px;
            
        }
        
        
        
        #ukuran_jam_absen {
            
            font-size: 13px;
            
        }
        
        
        
        #sudah_absen {
            
            font-size: 13px;
            
        }
        
        
        
        
        
        /*todo list*/
        
        
        
        
        
        #all_todo {
            
            font-size: 13px;
            
        }
        
        
        
        .all_todo {
            
            font-size: 13px;
            
        }
        
    }
    
    
    
    /* Medium devices (desktops, 992px and up) */
    
    @media (min-width: 992px) and (max-width: 1200px) {
        
        #all_absen_masuk {
            
            font-size: 14px;
            
        }
        
        
        
        #absen_masuk_sub {
            
            margin-bottom: -25px;
            
        }
        
        
        
        #absen_att {
            
            margin-right: -50px;
            
        }
        
        
        
        #absen_att_pulang {
            
            margin-right: -30px;
            
        }
        
        
        
        #absen_att_titik {
            
            margin-right: -15px;
            
        }
        
        
        
        #ukuran_jam_absen {
            
            font-size: 14px;
            
        }
        
        
        
        #sudah_absen {
            
            font-size: 14px;
            
        }
        
        
        
        
        
        /*todo list*/
        
        
        
        
        
        #all_todo {
            
            font-size: 14px;
            
        }
        
        
        
        .all_todo {
            
            font-size: 14px;
            
        }
        
    }
    
    
    
    /* Large devices (large desktops, 1200px and up) */
    
    @media (min-width: 1200px) {
        
        #all_absen_masuk {
            
            font-size: 15px;
            
        }
        
        
        
        #absen_masuk_sub {
            
            margin-bottom: -25px;
            
        }
        
        
        
        #absen_att {
            
            margin-right: -55px;
            
        }

        #absen_att66 {
            
            margin-right: -100px;
            
        }
        
        
        
        #absen_att_pulang {
            
            margin-right: -45px;
            
        }
        
        
        
        #absen_att_titik {
            
            margin-right: -15px;
            
        }

        .titik2 {
            
            margin-left: 10px;
            
        }
        
        
        
        #ukuran_jam_absen {
            
            font-size: 15px;
            
        }
        
        
        
        #sudah_absen {
            
            font-size: 15px;
            
        }
        
        
        
        
        
        /*todo list*/
        
        
        
        
        
        #all_todo {
            
            font-size: 15px;
            
        }
        
        
        
        .all_todo {
            
            font-size: 15px;
            
        }
        
    }
    
</style>



<section class="content">
    
    <div class="container-fluid">
    
		<div class="alert alert-warning alert-dismissible" role="alert">
            
            Harus mengaktifkan lokasi/GPS pada perangkat anda sebelum absen !
        </div>
    
        
        
        
        <?php echo $alert; ?>  
        
        <?php echo $checktodo; ?>  
        
        
        
        <?php $checkAbsen = $this->m_home->f001_checkAbsen($user_id, $today);  ?>
        
        
        
        <div class="row clearfix">
            
            <?php if ($checkAbsen->num_rows() < 1): ?>
            
            
            
            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                
                
                <div class="card" style="padding: 1px;">
                    
                    
                    
                    <div class="header">
                        
                        <h2>Absen Masuk</h2>
                        
                    </div>
                    
                    
                    
                    <div class="body demo-masked-input" id="all_absen_masuk">
                        
                        <?php echo form_open('home/absen_masuk', array('class' => 'form-horizontal', 'id' => 'frm_absen_masuk')); ?>
                        
                        <div class="row clearfix">
                            
                            
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="absen_masuk_sub">
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3 form-control-label" id="absen_att" style="text-align: left;">
                                        
                                        <label>Nama</label>
                                        
                                    </div>
                                    
                                    
                                    
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 form-control-label" id="absen_att_titik">
                                        
                                        <label>:</label>
                                        
                                    </div>
                                    
                                    
                                    
                                    <div class="col-lg-7 col-md-6 col-sm-6 col-xs-7 form-control-label" style="text-align: left;">
                                        
                                        <label><?php echo ucwords(strtolower($template_show_name)); ?></label>
                                        
                                    </div>
                                    
                                </div> 
                                
                            </div>
                            
                            
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="absen_masuk_sub">
                                
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3 form-control-label" id="absen_att" style="text-align: left;">
                                        
                                        <label>Tanggal</label>

                                    </div>
                                    
                                    
                                    
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 form-control-label" id="absen_att_titik">
                                        
                                        <label>:</label>
                                        
                                    </div>
                                    
                                    
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-7 form-control-label" style="text-align: left;">
                                        
                                        <label><?php echo tgl_in($today); ?></label>
                                        
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                            
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="absen_masuk_sub">
                                
                                <div class="row">
                                    
                                    
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3 form-control-label" id="absen_att" style="text-align: left;">
                                        
                                        <label>Jam</label>
                                        
                                    </div>
                                    
                                    
                                    
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 form-control-label" id="absen_att_titik">
                                        
                                        <label>:</label>
                                        
                                    </div>
                                    
                                    
                                    
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 form-control-label" style="margin-left: 15px;">
                                        
                                        <div class="form-group">
                                            
                                            <div class="form-line">
                                                
                                                <!--<input type="text" class="timepicker form-control absen_masuk" id="ukuran_jam_absen" name="absen_masuk" placeholder="23:59">-->
                                                <input type="text" class="form-control absen_masuk" id="ukuran_jam_absen" name="absen_masuk" placeholder="23:59" value="<?php echo date('H:i');?>" readonly />
                                                
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                    
                                    
                                </div> 
                                
                            </div>
                            
                            
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 alert_absen_masuk collapse" id="absen_masuk_sub">
                                
                                <div class="row">
                                    
                                    
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-control-label" style="text-align: left;">
                                        
                                        <label class="col-pink">* Waktu harus di isi.</label>
                                        
                                    </div>
                                    
                                    
                                    
                                </div> 
                                
                            </div>
                            
                            
                            
                            
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: -5px;">
                                
                                <div class="row">
                                    
                                    <div class="text-center">
                                        
                                        <input type="hidden" name="id" value="<?php echo $user_id; ?>">
                                        
                                        <input type="hidden" name="browser" value="<?php echo $browser; ?>">
                                        
                                        <input type="hidden" name="pc" value="<?php echo $pc; ?>">
                                        
                                        <input type="hidden" id="lokasi" name="lokasi" value="">
                                        
                                        <input type="hidden" id="long" name="long" value="">
                                        
                                        <input type="hidden" id="lat" name="lat" value="">
                                        
                                        <input type="hidden" id="jarak" name="jarak" value="">
                                        
                                        
                                        <div class="text-center"style="padding: 69px;">
                                            <a href="javascript:void(0);"  class="btn btn-warning text-white m-t-30" id="accesscamera" data-toggle="modal" data-target="#photoModal" required><i class="material-icons long" >camera</i><span>Absen Masuk</span></a>
                                        </div>
                                        <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Capture Photo</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div align="center">
                                                            <div class="text-center" id="my_camera"></div>
                                                            <br>
                                                            <imput  id="results" name="image" value="">
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning text-white m-t-30" id="ambilfoto"  onClick="take_snapshot()" required><i class="material-icons long" >camera_alt</i> Ambil Foto</button>
                                                            <button type="submit" class="btn btn-danger text-white m-t-30" id="absen" ><i class="material-icons long" >check_circle</i><span>Absen    </span></a>
                                                                <button type="button" class="btn btn-info text-white m-t-30" id="retake" required><i class="material-icons long" >camera_alt</i> Retake</button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <script src="<?php echo base_url(); ?>assets/js/webcam.js"></script>
                                                    
                                                    <!-- Configure a few settings and attach camera -->
                                                    <script language="JavaScript">
                                                        Webcam.set({
                                                            width: 340,
                                                            height: 250,
                                                            
                                                            image_format: 'jpeg',
                                                            jpeg_quality: 90
                                                        });
                                                        Webcam.attach('#my_camera');
                                                        
                                                        
                                                        function take_snapshot() {
                                                            
                                                            // take snapshot and get image data
                                                            Webcam.snap(function (data_uri) {
                                                                // display results in page
                                                                document.getElementById('results').innerHTML =
                                                                '<img src="' + data_uri + '"/><input type="hidden" name="image" value="' + data_uri + '" required/>';
                                                            });
                                                        }
                                                    </script>
                                                    
                                                    
                                                </div>
                                                
                                                
                                            </div>
                                            
                                            
                                            
                                        </div>
                                        
                                        
                                        
                                    </form>
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                
                
                
                <?php else: ?>
                
                <?php if (empty($checkAbsen->row()->absen_pulang)): ?>
                
                
                
                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                    
                <div class="card" style="padding: 1px;">
                        
                        
                        
                        <div class="header">
                            
                            <h2>Absen Pulang</h2>
                            
                        </div>
                        
                        
                        
                        <div class="body demo-masked-input" id="all_absen_masuk">
                            
                            <?php echo form_open('home/absen_pulang', array('class' => 'form-horizontal', 'id' => 'frm_absen_pulang')); ?>
                            
                            <div class="row">
                                
                                
                                
                                <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12" id="absen_masuk_sub">
                                    
                                    <div class="row clearfix">
                                        
                                        <div class="col-lg-5 col-md-4 col-sm-4 col-xs-3 form-control-label" id="absen_att" style="text-align: left;">
                                            
                                            <label>Nama</label>
                                            
                                        </div>
                                        
                                        
                                        
                                        <div class="titik2 col-lg-1 col-md-1 col-sm-1 col-xs-1 form-control-label" id="absen_att_titik">
                                            
                                            <label>:</label>
                                            
                                        </div>
                                        
                                        
                                        
                                        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-7 form-control-label" style="text-align: left;">
                                            
                                            <label><?php echo ucwords($template_show_name); ?></label>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                                
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="absen_masuk_sub">
                                    
                                    <div class="row clearfix">
                                        
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3 form-control-label" id="absen_att" style="text-align: left;">
                                            
                                            <label>Tanggal</label>
                                            
                                        </div>
                                        
                                        
                                        
                                        <div class="titik2 col-lg-1 col-md-1 col-sm-1 col-xs-1 form-control-label" id="absen_att_titik">
                                            
                                            <label>:</label>
                                            
                                        </div>
                                        
                                        
                                        
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-7 form-control-label" style="text-align: left;">
                                            
                                            <label><?php echo tgl_in($today); ?></label>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                                
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="absen_masuk_sub">
                                    
                                    <div class="row clearfix">
                                        
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label" id="absen_att_pulang" style="text-align: left;">
                                            
                                            <label>Jam Masuk</label>
                                            
                                        </div>
                                        
                                        
                                        
                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 form-control-label" id="absen_att_titik">
                                            
                                            <label>:</label>
                                            
                                        </div>
                                        
                                        
                                        
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-5 form-control-label" style="text-align: left;">
                                            
                                            <label><?php echo date('H:i', strtotime($checkAbsen->row()->absen_masuk)); ?></label>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                                
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="absen_masuk_sub">
                                    
                                    <div class="row clearfix">
                                        
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label" id="absen_att_pulang" style="text-align: left;">
                                            
                                            <label>Jam Pulang</label>
                                            
                                        </div>
                                        
                                        
                                        
                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 form-control-label" id="absen_att_titik">
                                            
                                            <label>:</label>
                                            
                                        </div>
                                        
                                        
                                        
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-5 form-control-label" style="margin-left: 15px;">
                                            
                                            <div class="form-group">
                                                
                                                <div class="form-line">
                                                    
                                                    <!--<input type="text" class="timepicker form-control absen_pulang" id="ukuran_jam_absen" name="absen_pulang" placeholder="23:59">-->
                                                    <input type="text" class="form-control absen_pulang" id="ukuran_jam_absen" name="absen_pulang" placeholder="23:59" value="<?php echo date('H:i');?>" readonly />
                                                    
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                                
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 alert_absen_pulang collapse" id="absen_masuk_sub">
                                    
                                    <div class="row">
                                        
                                        
                                        
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-control-label" style="text-align: left;">
                                            
                                            <label class="col-pink">* Waktunya isi donk.</label>
                                            
                                        </div>
                                        
                                        
                                        
                                    </div> 
                                    
                                </div>
                                
                                
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: -5px;">
                                    
                                    <div class="row clearfix">
                                        
                                        <div class="text-center">
                                            
                                            <input type="hidden" name="id" value="<?php echo $user_id; ?>">
                                            
                                            <input type="hidden" name="browser" value="<?php echo $browser; ?>">
                                            
                                            <input type="hidden" name="pc" value="<?php echo $pc; ?>">
                                            
                                            <input type="hidden" id="lokasi" name="lokasi" value="">
                                            
                                            <input type="hidden" name="masuk" value="<?php echo $checkAbsen->row()->absen_masuk; ?>">
                                            
                                            <input type="hidden" id="long_" name="long_" value="">
                                            
                                            <input type="hidden" id="lat_" name="lat_" value="">
                                            
                                            <input type="hidden" id="jarak_" name="jarak_" value="">
                                            
                                            
                                            <div class="text-center"style="padding: 55px">
                                                <a href="javascript:void(0);"  class="btn btn-warning text-white m-t-30" id="accesscamera" data-toggle="modal" data-target="#photoModal" required><i class="material-icons long" >camera</i><span>Absen Pulang</span></a>
                                            </div>
                                            <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Capture Photo</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div align="center">
                                                                <div class="text-center" id="my_camera"></div>
                                                                <br>
                                                                <imput  id="results" name="image_pulang" value="">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-warning text-white m-t-30" id="ambilfoto"  onClick="take_snapshot()" required><i class="material-icons long" >camera_alt</i> Ambil Foto</button>
                                                                <button type="submit" class="btn btn-danger text-white m-t-30" id="absen" ><i class="material-icons long" >check_circle</i><span>Absen    </span></a>
                                                                    <button type="button" class="btn btn-info text-white m-t-30" id="retake" required><i class="material-icons long" >camera_alt</i> Retake</button>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <script src="<?php echo base_url(); ?>assets/js/webcam.js"></script>
                                                        
                                                        <!-- Configure a few settings and attach camera -->
                                                        <script language="JavaScript">
                                                            Webcam.set({
                                                                width: 340,
                                                                height: 250,
                                                                
                                                                image_format: 'jpeg',
                                                                jpeg_quality: 90
                                                            });
                                                            Webcam.attach('#my_camera');
                                                            
                                                            
                                                            function take_snapshot() {
                                                                
                                                                // take snapshot and get image data
                                                                Webcam.snap(function (data_uri) {
                                                                    // display results in page
                                                                    document.getElementById('results').innerHTML =
                                                                    '<img src="' + data_uri + '"/><input type="hidden" name="image_pulang" value="' + data_uri + '" required/>';
                                                                });
                                                            }
                                                        </script>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                            
                                            
                                            
                                        </div>
                                        
                                    </form>
                                    
                                </div>
                                
                                
                                
                            </div>
                            
                        </div>
                </div>
                        
                        
                        
                        <?php else: ?>
                        
                        
                        
                        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                            
                            <div class="card">
                                
                                
                                
                                <div class="body">
                                    
                                    <input type="hidden" id="time" name="lokasi" value="">
                                    
                                    <input type="hidden" id="lokasi" name="lokasi" value="">
                                    
                                    <?php foreach ($checkAbsen->result() as $row): ?>
                                    
                                    
                                    
                                    <!-- Nav tabs -->
                                    
                                    <ul class="nav nav-tabs tab-nav-right" role="tablist" id="sudah_absen">
                                        
                                        <li role="presentation" class="active">
                                            
                                            <a href="#home" data-toggle="tab">ABSEN</a>
                                            
                                        </li>
                                        
                                        
                                        
                                        <li role="presentation">
                                            
                                            <a href="#profile" data-toggle="tab">MASUK</a>
                                            
                                        </li>
                                        
                                        
                                        
                                        <li role="presentation">
                                            
                                            <a href="#messages" data-toggle="tab">PULANG</a>
                                            
                                        </li>
                                        
                                    </ul>
                                    
                                    
                                    
                                    <!-- Tab panes -->
                                    
                                    <div class="tab-content" id="sudah_absen">
                                        
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            
                                            <div class="list-group">
                                                
                                                <a href="javascript:void(0);" class="list-group-item">
                                                    
                                                    Nama <span class="pull-right"><?php echo ucwords($row->user_name); ?></span>
                                                    
                                                </a>
                                                
                                                
                                                
                                                <a href="javascript:void(0);" class="list-group-item">
                                                    
                                                    Tanggal <span class="pull-right"><?php echo tgl_in($row->absen_date); ?></span>
                                                    
                                                </a>
                                                
                                                
                                                
                                                <a href="javascript:void(0);" class="list-group-item">
                                                    
                                                    Jam Masuk <span class="pull-right"><?php echo date('H:i', strtotime($row->absen_masuk)); ?></span>
                                                    
                                                </a>
                                                
                                                
                                                
                                                <a href="javascript:void(0);" class="list-group-item">
                                                    
                                                    Jam Pulang <span class="pull-right"><?php echo  date('H:i', strtotime($row->absen_pulang)); ?></span>
                                                    
                                                </a>
                                                
                                                
                                                
                                                <a href="javascript:void(0);" class="list-group-item">
                                                    
                                                    Point Masuk 
                                                    
                                                    <?php
                                                    
                                                    if ($row->absen_masuk_poin < 0) 
                                                    
                                                    {
                                                        
                                                        echo '<span class="badge bg-red">'.$row->absen_masuk_poin.'</span>';
                                                        
                                                    }
                                                    
                                                    elseif ($row->absen_masuk_poin > 0) 
                                                    
                                                    {
                                                        
                                                        echo '<span class="badge bg-green">+'.$row->absen_masuk_poin.'</span>';
                                                        
                                                    }
                                                    
                                                    else
                                                    
                                                    {
                                                        
                                                        echo '<span class="badge bg-grey">'.$row->absen_masuk_poin.'</span>';
                                                        
                                                    }  
                                                    
                                                    ?>
                                                    
                                                </a>
                                                
                                                <a href="javascript:void(0);" class="list-group-item">
                                                    
                                                    Point Pulang
                                                    
                                                    <?php
                                                    
                                                    if ($row->absen_pulang_poin < 0) 
                                                    
                                                    {
                                                        
                                                        echo '<span class="badge bg-red">'.$row->absen_pulang_poin.'</span>';
                                                        
                                                    }
                                                    
                                                    elseif ($row->absen_pulang_poin > 0) 
                                                    
                                                    {
                                                        
                                                        echo '<span class="badge bg-green">+'.$row->absen_pulang_poin.'</span>';
                                                        
                                                    }
                                                    
                                                    else
                                                    
                                                    {
                                                        
                                                        echo '<span class="badge bg-grey">'.$row->absen_pulang_poin.'</span>';
                                                        
                                                    }  
                                                    
                                                    ?>
                                                    
                                                </a>
                                                
                                            </div>
                                            
                                        </div>
                                        
                                        
                                        
                                        <div role="tabpanel" class="tab-pane fade" id="profile">
                                            
                                            <?php if ($row->absen_masuk_os != 'Android' AND $row->absen_masuk_os != 'iOS' AND $row->absen_masuk_os != 'Unknown Platform' AND $row->absen_masuk_os != 'Windows Phone'): ?>
                                            
                                            <p>Personal Computer : <?php echo $row->absen_masuk_pc; ?></p>        
                                            
                                            <?php endif ?>
                                            
                                            <p>IP : <?php echo $row->absen_masuk_ip; ?></p>
                                            
                                            <p>Operasi System : <?php echo $row->absen_masuk_os; ?></p>
                                            
                                            <p>Browser : <?php echo $row->absen_masuk_browser; ?></p>
                                            
                                            <p>Lokasi : <?php echo $row->absen_masuk_lokasi; ?></p>
                                            
                                            
                                            
                                            
                                            
                                            
                                        </div>
                                        
                                        
                                        
                                        <div role="tabpanel" class="tab-pane fade" id="messages">
                                            
                                            <?php if ($row->absen_pulang_os != 'Android' AND $row->absen_pulang_os != 'iOS' AND $row->absen_pulang_os != 'Unknown Platform' AND $row->absen_pulang_os != 'Windows Phone'): ?>
                                            
                                            <p>Personal Computer : <?php echo $row->absen_masuk_pc; ?></p>      
                                            
                                            <?php endif ?>
                                            
                                            <p>IP : <?php echo $row->absen_masuk_ip; ?></p>
                                            
                                            <p>Operasi System : <?php echo $row->absen_masuk_os; ?></p>
                                            
                                            <p>Browser : <?php echo $row->absen_masuk_browser; ?></p>
                                            
                                            <p>Lokasi : <?php echo $row->absen_masuk_lokasi; ?></p>
                                                                                        
                                        </div>
                                        
                                    </div>
                                    
                                    
                                    
                                    <?php endforeach ?>
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                        
                        
                        
                        <?php endif ?>
                        
                        <?php endif ?>
                        <div class="col-lg-7 col-md-5 col-sm-12 col-xs-12">
                            
                            <div class="card">
                                
                                
                                
                                <div class="header">

                                    <h2>PENGUMUMAN KARYAWAN</h2>
                                    <!-- pepek -->
                                    <ul class="header-dropdown m-r-5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>

                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="<?php echo base_url('home/create'); ?>">Tambah Pengumuman</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    

                
                                </div>
                                

                             
                                <div class="body" style="margin-bottom: 15 px;">
                                    
                                <?php foreach ($q_ks as $row): ?>
                                    <label class="text-center"> </label>
                                
                                        <div class="col-lg-3 col-md-1 col-sm-3 col-xs-7 form-control-label" id="absen_att66" style="text-align: left;">
        
                                            <label></label> <label><?php echo $row->judul_informasi; ?></label>
                                            
                                        </div>
                                    
                                        <div class="col-lg-12 col-md-7 col-sm-12 col-xs-12 form-control-label" id="absen_att" style="text-align: left;">
                                
                                                    
                                                    <body>

                                                        <p> <?php echo $row->keterangan_informasi; ?> </p>
                                                        
                                                    </body>
                                               
                                        

                                            
                                            
                                        </div>
                                                                            <?php endforeach ?>
                                    
                                </div> 
                                
                                
                                
                                <div class="body" style="padding: 128px;">
                                    
                                 
                                                
                                    
                                </div>

                                
 
                                        </div>
                                    
                                </div>

                                

                                
                                
                            </div>
                        
                        </div>
                 
                        <div class="col-lg-5 col-md-5    col-sm-12 col-xs-12">
                            
                            <div class="card">
                                
                                
                                
                                <div class="header">
                                    
                                    <h2>INFORMASI</h2>
                                    
                                    
                                </div>
                                
                                
                                
                                <div class="body" style="margin-bottom: -50px;">
                                    
                                 
                                    <label class="text-center"> </label>
                                
                                        <div class="col-lg-4 col-md-8 col-sm-4 col-xs-3 form-control-label" id="absen_att" style="text-align: left;">
        
                                            <label>Nama</label>
                                            
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 form-control-label" id="absen_att_titik">
        
                                            <label>:</label>
                                            
                                        </div>     
                                    
                                        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-7 form-control-label" style="text-align: left;">
        
                                            <label><?php echo ucwords(strtolower($template_show_name)); ?> (<?php echo ucwords(strtolower($template_show_jabatan_home)); ?>)</label>
                                            
                                        </div>
                                    
                                </div>

                                

                                <div class="body">
                                    
                                 
                                    <label class="text-center"> </label>
                                    

                                        <div class="col-lg-4 col-md-8 col-sm-4 col-xs-3 form-control-label" id="absen_att" style="text-align: left;">
        
                                            <label>Divisi</label>
                                            
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 form-control-label" id="absen_att_titik">
        
                                            <label>:</label>
                                            
                                        </div>     
                                    
                                        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-7 form-control-label" style="text-align: left;">
        
                                            <label><?php echo ucwords(strtolower($template_show_divisi_home)); ?></label>
                                            
                                        </div>
                                    
                                </div>

                                
                                <div class="body">
                                    
                                 
                                    <label class="text-center"> </label>
                                    

                                        <div class="col-lg-4 col-md-8 col-sm-4 col-xs-3 form-control-label" id="absen_att" style="text-align: left;">
        
                                            <label>Posisi</label>
                                            
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 form-control-label" id="absen_att_titik">
        
                                            <label>:</label>
                                            
                                        </div>     
                                    
                                        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-7 form-control-label" style="text-align: left;">
        
                                            <label><?php echo ucwords(strtolower($template_show_posisi_home)); ?></label>
                                            
                                        </div>
                                    
                                </div>

                                <div class="body">
                                    
                                 
                                    <label class="text-center"> </label>
                                    

                                        <div class="col-lg-4 col-md-8 col-sm-4 col-xs-3 form-control-label" id="absen_att" style="text-align: left;">
        
                                            <label>Cuti</label>
                                            
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 form-control-label" id="absen_att_titik">
        
                                            <label>:</label>
                                            
                                        </div>     
                                    
                                        <div class="col-lg-7 col-md-8 col-sm-6 col-xs-7 form-control-label" style="text-align: left;">
        
                                            <label>Sisa <?php echo ucwords(strtolower($template_show_sisa_cuti)); ?></label>
                                            
                                        </div>
                                    
                                </div>

                                <div class="body">
                                    
                                 
                                    <label class="text-center"> </label>
                                    

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3 form-control-label" id="absen_att" style="text-align: left;">
        
                                            <label>Remote</label>
                                            
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 form-control-label" id="absen_att_titik">
        
                                            <label>:</label>
                                            
                                        </div>     
                                    
                                        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-7 form-control-label" style="text-align: left;">
        
                                            <label>Sisa <?php echo ucwords(strtolower($template_show_sisa_remote)); ?></label>
                                            
                                        </div>
                                    
                                </div>

                                <div class="body">
                                    
                                 
                                    <label class="text-center"> </label>
                                    

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3 form-control-label" id="absen_att" style="text-align: left;">
        
                                            <label></label>
                                            
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs- form-control-label" id="absen_att_titik">
        
                                            <label></label>
                                            
                                        </div>     
                                    
                                        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-7 form-control-label" style="text-align: left;">
        
                                            <label></label>
                                            
                                        </div>
                                    
                                </div>

                                

                                
                                
                            </div>
                        
                        </div>
        </section>
        
        
        
        
        
        
        
        
        
        