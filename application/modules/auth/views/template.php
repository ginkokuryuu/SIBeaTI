<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('public/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>

<body>
    <div class="content-wrapper">
        <?php echo $contents ?>
    </div>

    <script src='<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js'></script>
    <script src='<?=base_url()?>assets/bower_components/bootstrap/dist/bootstrap.min.js'></script>
    <script src='<?=base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'></script>
    <script src='<?=base_url()?>assets//dist/js/adminlte.min.js'></script>
</body>

</html>
