<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title class="title-user"><?php echo ucwords(strtolower($title_page)); ?> - <?php echo $title_web; ?></title>

        <?php echo $map['js'];?>

        <link
            rel="stylesheet"
            href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
            integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
            crossorigin=""
            />

            <script
                src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
                integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
                crossorigin=""
            ></script>

        <!-- Favicon-->
        <link rel="icon" href="<?php echo base_url(); ?>assets/template/favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="<?php echo base_url(); ?>assets/template/font.google/family-roboto.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/template/font.google/family-material-icon.css" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="<?php echo base_url(); ?>assets/template/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="<?php echo base_url(); ?>assets/template/plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="<?php echo base_url(); ?>assets/template/plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Colorpicker Css -->
        <link href="<?php echo base_url(); ?>assets/template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

        <!-- Dropzone Css -->
        <link href="<?php echo base_url(); ?>assets/template/plugins/dropzone/dropzone.css" rel="stylesheet">

        <!-- Multi Select Css -->
        <link href="<?php echo base_url(); ?>assets/template/plugins/multi-select/css/multi-select.css" rel="stylesheet">

        <!-- Bootstrap Spinner Css -->
        <link href="<?php echo base_url(); ?>assets/template/plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

        <!-- Bootstrap Tagsinput Css -->
        <link href="<?php echo base_url(); ?>assets/template/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

        <!-- Bootstrap Select Css -->
        <link href="<?php echo base_url(); ?>assets/template/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

        <!-- noUISlider Css -->
        <link href="<?php echo base_url(); ?>assets/template/plugins/nouislider/nouislider.min.css" rel="stylesheet" />

        <!-- JQuery DataTable Css -->
        <link href="<?php echo base_url(); ?>assets/template/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

        <!-- Bootstrap Material Datetime Picker Css -->
        <link href="<?php echo base_url(); ?>assets/template/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

        <!-- Wait Me Css -->
        <link href="<?php echo base_url(); ?>assets/template/plugins/waitme/waitMe.css" rel="stylesheet" />

        <!-- Bootstrap Select Css -->
        <link href="<?php echo base_url(); ?>assets/template/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

        <!-- Sweetalert Css -->
        <link href="<?php echo base_url(); ?>assets/template/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

        
        <!-- Custom Css -->
        <link href="<?php echo base_url(); ?>assets/template/css/style.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="<?php echo base_url(); ?>assets/template/css/themes/all-themes.css" rel="stylesheet" />

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="crossorigin=""/>
        <!-- Make sure you put this AFTER Leaflet's CSS -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <script src="http://maps.googleapis.com/maps/api/js"></script>

    </head>

    <body class="theme-red">

        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->

        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->

        <!-- Search Bar -->
        <!-- 
        <div class="search-bar">
            <div class="search-icon">
                <i class="material-icons">search</i>
            </div>
            <input type="text" placeholder="START TYPING...">
            <div class="close-search">
                <i class="material-icons">close</i>
            </div>
        </div> 
        -->
        <!-- #END# Search Bar -->

        <!-- Top Bar -->
        <?php echo $top_bar; ?>
        <!-- #Top Bar -->

        <section>
            <!-- Left Sidebar -->
            <?php echo $sidebar; ?>
            <!-- #END# Left Sidebar -->
        </section>

        <?php echo $content; ?>

        <!-- Jquery Core Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Select Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/bootstrap-select/js/bootstrap-select.js"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

        <!-- Bootstrap Colorpicker Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

        <!-- Dropzone Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/dropzone/dropzone.js"></script>

        <!-- Input Mask Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

        <!-- Multi Select Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/multi-select/js/jquery.multi-select.js"></script>

        <!-- Jquery Spinner Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/jquery-spinner/js/jquery.spinner.js"></script>

        <!-- Bootstrap Tags Input Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

        <!-- noUISlider Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/nouislider/nouislider.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/node-waves/waves.js"></script>

        <!-- Jquery DataTable Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

        <!-- ajax Js -->
       
        <script src="<?php echo base_url(); ?>assets/select/select2.min.js"></script>
        <link href="<?php echo base_url(); ?>assets/select/select2.min.css" rel="stylesheet" />

        <!-- Autosize Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/autosize/autosize.js"></script>

        <!-- Moment Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/momentjs/moment.js"></script>

        <!-- Bootstrap Material Datetime Picker Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

        <!-- Bootstrap Notify Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/bootstrap-notify/bootstrap-notify.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/node-waves/waves.js"></script>

        <!-- SweetAlert Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/sweetalert/sweetalert.min.js"></script>

        <!-- Custom Js -->
        <script src="<?php echo base_url(); ?>assets/template/js/admin.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/js/pages/ui/dialogs.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/js/pages/tables/jquery-datatable.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/js/pages/forms/basic-form-elements.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/js/pages/forms/advanced-form-elements.js"></script>
        <script src="<?php echo base_url(); ?>assets/my-costum/my-costum.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/js/pages/ui/tooltips-popovers.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/js/pages/ui/modals.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

        <!-- Demo Js -->
        <script src="<?php echo base_url(); ?>assets/template/js/demo.js"></script>

        <?php if ($url_1 == 'profile'): ?>
            <script>
                document.getElementById("uploadBtn").onchange = function () {
                    document.getElementById("uploadFile").value = this.value;
                };
            </script>
        <?php endif ?>

        <?php if ($url_1 == 'pendidikan_formal' && $url_2 == 'show'): ?>
            <?php foreach ($qPendidikanFormal->result() as $row): ?>
                <script>
                    $(document).ready(function() {
                        $('#pendidikan_formal_jenis_edit').on('change', function() {
                            var formal_jenis_id = $(this).val();

                            if (formal_jenis_id == 3) 
                            {   
                                $('.formal_jenis_view').html(
                                    '<div class="col-lg-4">'+
                                        '<label>Jurusan</label>'+
                                        '<div class="form-group">'+
                                            '<div class="form-line">'+
                                                '<input type="text" class="form-control" name="pendidikan_formal_jurusan" value="<?php echo ucwords($row->pendidikan_formal_jurusan); ?>">'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'
                                );
                            }
                            else if(formal_jenis_id == 4 || formal_jenis_id == 5 || formal_jenis_id == 6)
                            {
                                $('.formal_jenis_view').html(
                                    '<div class="col-lg-4">'+
                                        '<label>Fakultas</label>'+
                                        '<div class="form-group">'+
                                            '<div class="form-line">'+
                                                '<input type="text" class="form-control" name="pendidikan_formal_fakultas" value="<?php echo ucwords($row->pendidikan_formal_fakultas); ?>">'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+

                                    '<div class="col-lg-4">'+
                                        '<label>Jurusan</label>'+
                                        '<div class="form-group">'+
                                            '<div class="form-line">'+
                                                '<input type="text" class="form-control" name="pendidikan_formal_jurusan" value="<?php echo ucwords($row->pendidikan_formal_jurusan); ?>">'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+

                                    '<div class="col-lg-4">'+
                                        '<label>Program Studi</label>'+
                                        '<div class="form-group">'+
                                            '<div class="form-line">'+
                                                '<input type="text" class="form-control" name="pendidikan_formal_prog_studi" value="<?php echo ucwords($row->pendidikan_formal_prog_studi); ?>">'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'
                                );
                            }
                            else
                            {
                                $('.formal_jenis_view').html(' ');
                            }
                        });  
                    });
                </script>
            <?php endforeach ?>
        <?php endif ?>

        

        <script>
            $(document).ready(function() {

                // di bandung
                $('#select_provinsi_di').on('change', function(){
                    var provinsi_id = $(this).val();

                    if (provinsi_id == '')
                    {
                        $('.select_kokab_di').hide();
                        $('.select_kec_di').hide();
                        $('.select_desa_di').hide();
                        $('.select_alamat_di').hide();
                        $('.select_rt_di').hide();
                        $('.select_rw_di').hide();
                    } 
                    else
                    {
                        $('.select_kokab_di').show();

                        $.ajax({
                            url: "<?php echo base_url() ?>profile/get_kokab",
                            type: "POST",
                            data: {'provinsi_id' : provinsi_id},
                            dataType: 'json',
                            success: function(data){
                                $('#select_kokab_di').html(data);
                                $('#select_kokab_di').selectpicker('refresh');
                            },
                            error: function(){
                                $('#select_kokab_di').hide();
                            }
                        });
                    }
                }); 

                $('#select_kokab_di').on('change', function(){
                    var kokab_id = $(this).val();

                    if (kokab_id == '')
                    {
                        $('.select_kec_di').hide();
                        $('.select_desa_di').hide();
                        $('.select_alamat_di').hide();
                        $('.select_rt_di').hide();
                        $('.select_rw_di').hide();
                    } 
                    else
                    {
                        $('.select_kec_di').show();

                        $.ajax({
                            url: "<?php echo base_url() ?>profile/get_kec",
                            type: "POST",
                            data: {'kokab_id' : kokab_id},
                            dataType: 'json',
                            success: function(data){
                                $('#select_kec_di').html(data);
                                $('#select_kec_di').selectpicker('refresh');
                            },
                            error: function(){
                                $('#select_kec_di').hide();
                            }
                        });
                    }
                }); 

                $('#select_kec_di').on('change', function(){
                    var kec_id = $(this).val();

                    if (kec_id == '')
                    {
                        $('.select_desa_di').hide();
                        $('.select_alamat_di').hide();
                        $('.select_rt_di').hide();
                        $('.select_rw_di').hide();
                    } 
                    else
                    {
                        $('.select_desa_di').show();

                        $.ajax({
                            url: "<?php echo base_url() ?>profile/get_desa",
                            type: "POST",
                            data: {'kec_id' : kec_id},
                            dataType: 'json',
                            success: function(data){
                                $('#select_desa_di').html(data);
                                $('#select_desa_di').selectpicker('refresh');
                            },
                            error: function(){
                                $('#select_desa_di').hide();
                            }
                        });
                    }
                }); 

                $('#select_desa_di').on('change', function(){
                    var kec_id = $(this).val();

                    if (kec_id == '')
                    {
                        $('.select_alamat_di').hide();
                        $('.select_rt_di').hide();
                        $('.select_rw_di').hide();
                    } 
                    else
                    {
                        $('.select_alamat_di').show();
                        $('.select_rt_di').show();
                        $('.select_rw_di').show();
                    }
                }); 













                // luar bandung
                $('#select_provinsi').on('change', function(){
                    var provinsi_id = $(this).val();

                    if (provinsi_id == '')
                    {
                        $('.select_kokab').hide();
                        $('.select_kec').hide();
                        $('.select_desa').hide();
                        $('.select_alamat').hide();
                        $('.select_rt').hide();
                        $('.select_rw').hide();
                    } 
                     
                    else
                    {
                        $('.select_kokab').show();

                        $.ajax({
                            url: "<?php echo base_url() ?>profile/get_kokab",
                            type: "POST",
                            data: {'provinsi_id' : provinsi_id},
                            dataType: 'json',
                            success: function(data){
                                $('#select_kokab').html(data);
                                $('#select_kokab').selectpicker('refresh');
                            },
                            error: function(){
                                $('#select_kokab').hide();
                            }
                        });
                    }
                }); 

                $('#select_kokab').on('change', function(){
                    var kokab_id = $(this).val();

                    if (kokab_id == '')
                    {
                        $('.select_kec').hide();
                        $('.select_desa').hide();
                        $('.select_alamat').hide();
                        $('.select_rt').hide();
                        $('.select_rw').hide();
                    } 
                    else
                    {
                        $('.select_kec').show();

                        $.ajax({
                            url: "<?php echo base_url() ?>profile/get_kec",
                            type: "POST",
                            data: {'kokab_id' : kokab_id},
                            dataType: 'json',
                            success: function(data){
                                $('#select_kec').html(data);
                                $('#select_kec').selectpicker('refresh');
                            },
                            error: function(){
                                $('#select_kec').hide();
                            }
                        });
                    }
                }); 

                $('#select_kec').on('change', function(){
                    var kec_id = $(this).val();

                    if (kec_id == '')
                    {
                        $('.select_desa').hide();
                        $('.select_alamat').hide();
                        $('.select_rt').hide();
                        $('.select_rw').hide();
                    } 
                    else
                    {
                        $('.select_desa').show();

                        $.ajax({
                            url: "<?php echo base_url() ?>profile/get_desa",
                            type: "POST",
                            data: {'kec_id' : kec_id},
                            dataType: 'json',
                            success: function(data){
                                $('#select_desa').html(data);
                                $('#select_desa').selectpicker('refresh');
                            },
                            error: function(){
                                $('#select_desa').hide();
                            }
                        });
                    }
                }); 

                $('#select_desa').on('change', function(){
                    var kec_id = $(this).val();

                    if (kec_id == '')
                    {
                        $('.select_alamat').hide();
                        $('.select_rt').hide();
                        $('.select_rw').hide();
                    } 
                    else
                    {
                        $('.select_alamat').show();
                        $('.select_rt').show();
                        $('.select_rw').show();
                    }
                }); 

                //

                $('#pendidikan_formal_jenis_add').on('change', function() {
                    var formal_jenis_id_add = $(this).val();

                    if (formal_jenis_id_add == 3) 
                    {   
                        $('.formal_jenis_view_add').html(
                            '<div class="col-lg-4">'+
                                '<label>Jurusan</label>'+
                                '<div class="form-group">'+
                                    '<div class="form-line">'+
                                        '<input type="text" class="form-control" name="pendidikan_formal_jurusan">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'
                        );
                    }
                    else if(formal_jenis_id_add == 4 || formal_jenis_id_add == 5 || formal_jenis_id_add == 6)
                    {
                        $('.formal_jenis_view_add').html(
                            '<div class="col-lg-4">'+
                                '<label>Fakultas</label>'+
                                '<div class="form-group">'+
                                    '<div class="form-line">'+
                                        '<input type="text" class="form-control" name="pendidikan_formal_fakultas">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+

                            '<div class="col-lg-4">'+
                                '<label>Jurusan</label>'+
                                '<div class="form-group">'+
                                    '<div class="form-line">'+
                                        '<input type="text" class="form-control" name="pendidikan_formal_jurusan">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+

                            '<div class="col-lg-4">'+
                                '<label>Program Studi</label>'+
                                '<div class="form-group">'+
                                    '<div class="form-line">'+
                                        '<input type="text" class="form-control" name="pendidikan_formal_prog_studi">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'
                        );
                    }
                    else
                    {
                        $('.formal_jenis_view_add').html(' ');
                    }
                }); 

                //

                $('#frm_absen_masuk').submit(function() {
                    var absen_masuk = $('.absen_masuk').val().length;         
         
                    if (absen_masuk == 0) {                
                        $(".alert_absen_masuk").show();
                        return false;
                    }
                });

                $('#frm_absen_pulang').submit(function() {
                    var absen_pulang = $('.absen_pulang').val().length;         
         
                    if (absen_pulang == 0) {                
                        $(".alert_absen_pulang").show();
                        return false;
                    }
                });

                $('.datemonth').datepicker({
                    autoclose: true,
                    minViewMode: 1,
                    format: 'MM yyyy',
                    monthNames : ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                    monthNamesShort : ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                }); 

                // administrator
                // $('.ubah-password-for-admin').hide();

                $('.ceklis-ubah-password-for-admin').change(function() {
                    if ($(this).is(":checked")) 
                    {
                        $('.ubah-password-for-admin').show();
                    }
                    else
                    {
                        $('.ubah-password-for-admin').hide();
                    }
                });

                $('.ceklis-ubah-jam-pulang').change(function() {
                    if ($(this).is(":checked")) 
                    {
                        $('.edit-jam-pulang').show();
                    }
                    else
                    {
                        $('.edit-jam-pulang').hide();
                    }
                });

                // rekap karyawan
                $('#filter_lembaga_karyawan').on('change', function(){
                    var lembaga_id = $(this).val();
                    if (lembaga_id == 'semua_lembaga')
                    {
                      
                    } 
                    else
                    {
                        $('.filter_karwayan_admin').show();

                        $.ajax({
                            url: "<?php echo base_url() ?>rekap_karyawan/get_nama_karyawan",
                            type: "POST",
                            data: {'lembaga_id' : lembaga_id},
                            dataType: 'json',
                            success: function(data){
                                $('#filter_nama_karyawan').html(data);
                                $('#filter_nama_karyawan').selectpicker('refresh');
                            },
                            error: function(){
                                $('#filter_nama_karyawan').prop('disabled', true);
                            }
                        });
                    }
                }); 

                // input absen
                $('#filter_input_absen').on('change', function(){
                    var lembaga_id = $(this).val();
                    if (lembaga_id != '')
                    {
                        $('.filter_absen_karyawan').show();

                        $.ajax({
                            url: "<?php echo base_url() ?>rekap_karyawan/get_nama_karyawan_absen",
                            type: "POST",
                            data: {'lembaga_id' : lembaga_id},
                            dataType: 'json',
                            success: function(data){
                                $('#filter_nama_karyawan_absen').html(data);
                                $('#filter_nama_karyawan_absen').selectpicker('refresh');
                            },
                            error: function(){
                                $('#filter_nama_karyawan_absen').prop('disabled', true);
                            }
                        });
                    } 
                }); 

                $('.input_absen').change(function() {
                    if ($(this).is(":checked")) 
                    {
                        $('.input_absen_pulang').show();
                        $('.jam_pulang_ab').attr("required", "true");
                    }
                    else
                    {
                        $('.input_absen_pulang').hide();
                        $('.jam_pulang_ab').attr("required", "false");
                    }
                });

                $('.add_program_kerja').change(function() {
                    if ($(this).is(":checked")) 
                    {
                        $('.view_program_kerja').show();
                    }
                    else
                    {
                        $('.view_program_kerja').hide();
                    }
                });



                // user
                $('.edit-user').hide();
                // $('.button-batal-user').hide();
                // $('.button-simpan-user').hide();

                $(".button-edit-user").click(function(){
                    $(".detail-user").slideUp("slow");
                    $(".edit-user").delay(900).slideDown('slow', function() {
                        $(".title-user").html("EDIT USER");
                    });
                }); 

                $(".button-batal-user").click(function(){
                    $(".edit-user").slideUp("slow");
                    $(".detail-user").delay(900).slideDown('slow', function() {
                        $(".title-user").html("DETAIL USER");
                    });;
                });  
            });
        </script>

        <script>
            if (navigator.geolocation) 
            {
                navigator.geolocation.getCurrentPosition(showPosition);
            } 
            else 
            { 
                document.getElementById("demo").innerHTML = "Geolocation is not supported by this browser.";
            }

            function showPosition(position) 
            {
               // document.getElementById("koordinat_t").innerHTML = position.coords.latitude + ", " + position.coords.longitude;

               var geocoder = new google.maps.Geocoder;

               var latlng = {lat: parseFloat(position.coords.latitude), lng: parseFloat(position.coords.longitude)};
                geocoder.geocode({'location': latlng}, function(results, status) {
                  if (status === 'OK') 
                  {
                    if (results[1]) 
                    {
                        document.getElementById("dashboard_address").innerHTML = results[1].formatted_address;

                        <?php  
                            if ($url_1 == 'home' OR empty($url_1)) 
                            {
                                ?>
                                document.getElementById("lokasi").value = results[1].formatted_address;
                                <?php
                            }
                        ?>
                    } 
                    else 
                    {
                      window.alert('No results found');
                    }
                  } 
                  else 
                  {
                    window.alert('Geocoder failed due to: ' + status);
                  }
                });
            }

            

        </script>

        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDR6zqs8irvwdSivh_7aa6guyQfoQ6llXY">
        </script>

        
       
        </script>
            <script type="text/javascript">
                        getLocation();


                        
                    function getLocation(){
                        if (navigator.geolocation){
                            navigator.geolocation.getCurrentPosition(showPosition);
                        }else{
                            alert ("Geolocation is not supported by this browser.");
                        }
                    }
                    function showPosition(position){
                        var lat = position.coords.latitude;
                        var long = position.coords.longitude;
                        document.getElementById('lat').value = lat;
                        document.getElementById('long').value = long; 
                    }
            </script>

        </script>
            <script type="text/javascript">
                        getLocation();


                        
                    function getLocation(){
                        if (navigator.geolocation){
                            navigator.geolocation.getCurrentPosition(showPosition);
                        }else{
                            alert ("Geolocation is not supported by this browser.");
                        }
                    }
                    function showPosition(position){
                        var lat = position.coords.latitude;
                        var long = position.coords.longitude;
                        document.getElementById('lat_').value = lat;
                        document.getElementById('long_').value = long; 
                    }
            </script>

        <script type ="text/javascript">
            $('.is_alternate').select2({
                ajax:{
                    url: "<?php echo base_url(); ?>/cuti_khusus/getdatauser",
                    dataType: "json",
                    delay:10,
                    data: function(params){
                        return{
                            user: params.term
                        };
                    },
                    processResults: function(data){
                        var results = [];

                        $.each(data, function(index, item){
                            results.push({
                                id: item.user_name,
                                text: item.user_name
                            });
                        });
                        return{
                            results: results
                        };
                    }
                }
            });
        </script>

        <script type ="text/javascript">
            $('.is_alternate').select2({
                ajax:{
                    url: "<?php echo base_url(); ?>/cuti_tahunan/getdatauser",
                    dataType: "json",
                    delay:10,
                    data: function(params){
                        return{
                            user: params.term
                        };
                    },
                    processResults: function(data){
                        var results = [];

                        $.each(data, function(index, item){
                            results.push({
                                id: item.user_name,
                                text: item.user_name
                            });
                        });
                        return{
                            results: results
                        };
                    }
                }
            });
        </script>

        <script>
        $(document).ready(function(){
            $('#absen').hide();
            $('#retake').hide();


           $('#ambilfoto').on('click', function(){
            $('#absen').show();
            $('#my_camera').hide();
            $('#retake').show();
            $('#ambilfoto').hide();
            $('#results').show();



           });

           $('#retake').on('click', function(){
            $('#absen').hide();
            $('#my_camera').show();
            $('#retake').hide();
            $('#ambilfoto').show();
            $('#results').hide();




           });

           
        });
        </script>

        <script>
            function goBack() {
                window.history.back();
            }
        </script>

    

    </body>

</html>
