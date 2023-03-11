<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Sign In | Absensi EMC</title>
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

        <!-- Custom Css -->
        <link href="<?php echo base_url(); ?>assets/template/css/style.css" rel="stylesheet">
    </head>

    <body class="login-page">
        <div class="login-box">

            <div class="logo">
                <a href="javascript:void(0);"><b>ABSENSI AKENO</b></a>
                <small>Human Capital Information System</small>
            </div>

            <?php echo $alert; ?>

            <div class="card">
                <div class="body">
                    <?php echo form_open('auth/signin', array('id' => 'sign_in')); ?>

                        <div class="msg">Silahkan Sign In untuk absen harian anda.</div>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">credit_card</i>
                            </span>

                            <div class="form-line">
                                <input type="text" class="form-control" name="nik" id="username" placeholder="No Induk Karyawan" required autofocus>
                            </div>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>

                            <div class="form-line">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-8 p-t-5">
                                <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                                <label for="rememberme">Remember Me</label>
                            </div>

                            <div class="col-xs-4">
                                <button class="btn btn-block bg-green waves-effect" id="submit" type="submit">SIGN IN</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>

        <!-- Jquery Core Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/node-waves/waves.js"></script>

        <!-- Validation Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/jquery-validation/jquery.validate.js"></script>

        <!-- Custom Js -->
        <script src="<?php echo base_url(); ?>assets/template/js/admin.js"></script>
        <script src="<?php echo base_url(); ?>assets/template/js/pages/examples/sign-in.js"></script>

    </body>

</html>