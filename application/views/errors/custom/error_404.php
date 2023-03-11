<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>404 Page Not Found</title>
        <!-- Favicon-->
        <link rel="icon" href="<?php echo base_url(); ?>assets/template/favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="<?php echo base_url(); ?>assets/template/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="<?php echo base_url(); ?>assets/template/plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="<?php echo base_url(); ?>assets/template/css/style.css" rel="stylesheet">
    </head>

    <body class="four-zero-four">
        <div class="four-zero-four-container">
            <div class="error-code">404</div>
            <div class="error-message">Halaman ini tidak ada</div>
            <div class="button-place">
                <button type="button" class="btn btn-default btn-lg waves-effect" onclick="javascript:history.back()">KEMBALI</button>
            </div>
        </div>

        <!-- Jquery Core Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/template/plugins/node-waves/waves.js"></script>
    </body>

</html>