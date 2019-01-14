<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin E-scheduling</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
        

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/datatables/datatables.min.css"> 
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-datepicker3.css">
        <script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
        
    </head>


    <body style="background: #B781CC" onload=display_ct()>
        <nav  class=" navbar navbar-expand-md navbar-dark bg-uno box-shadowf"role="" style="background: #4f0381">
            <a class="navbar-brand" style="color: #ffffff" href="#">Admin E-Scheduling</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnavbar" aria-controls="mainnavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainnavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url() ?>/Admin">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url() ?>/Pengumuman">Pengumuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url() ?>/Gallery">Gallery</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo site_url() ?>/Agenda">Agenda</a>
                    </li>
                </ul>
                <div class="btn-group" role="group" aria-label="Data baru">
                    <?php echo anchor('user/logout', 'Logout', array('class' => 'btn btn-outline-danger')); ?>
                </div>
            </div>
        </nav>

