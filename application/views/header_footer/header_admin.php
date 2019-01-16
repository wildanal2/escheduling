<!DOCTYPE html>
<html lang="">
    <head 1">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin E-scheduling</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style_home.css">
        
        <script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
        
 
    </head>


    <body style="background: #EDF0F5" onload=display_ct()>
        <nav  class=" navbar navbar-expand-md navbar-dark bg-uno box-shadowf"role="" style="background: #4f0381">
            <a class="navbar-brand" style="color: #ffffff" href="#">Admin E-Scheduling</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnavbar" aria-controls="mainnavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainnavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo site_url() ?>/Admin">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url() ?>/Pengumuman">Pengumuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url() ?>/Gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url() ?>/Agenda">Agenda</a>
                    </li>
                </ul>

                <!-- <div class="btn-group" role="group" aria-label="Data baru">
                    <?php echo anchor('login/logout', 'Logout', array('class' => 'btn btn-outline-danger')); ?>
                </div> -->


                <div class="btn-group">
                    <ul class="nav navbar-nav">
                        <li class="dropdown" style="margin-right: 50px">
                            <div class="dropdown-toggle btn-group btn btn-outline-danger dropdown-toggle btn-sm" role="group" aria-label="Data baru" data-toggle="dropdown"> KELUAR
                                
                            </div>

                            <!-- <a class="dropdown-toggle" href="#" data-toggle="dropdown">Login</a>  -->
                            <div class="dropdown-menu">
                                <form class="navbar-form container" role="form">
                                    <p> Apakah yakin ingin keluar ?</p>
                                    <button type="submit" class="btn btn-primary">NO</button>
                                    
                                        <?php echo anchor('login/logout', 'YES', array('class' => 'btn btn-success')); ?>
                                    
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

