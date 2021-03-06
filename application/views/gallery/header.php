<!DOCTYPE html>
<html lang="">
    <head 1">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?=base_url()?>assets/image/Mojokerto.png">
        <title>Admin E-scheduling</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style_admin.css">
        <!-- datatables css -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/datatables/datatables.min.css"> 
        <script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
 
    </head>


    <body class="admin-body" onload=display_ct()>

        <!-- navbar top -->
        <nav  class=" navbar navbar-expand-md navbar-dark bg-uno box-shadowf"role="" style="background: #0039e6">
            <a class="navbar-brand" style="color: #ffffff" href="<?php echo site_url() ?>/Admin">Admin E-Scheduling</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnavbar" aria-controls="mainnavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainnavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url() ?>/Pengumuman">Pengumuman</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo site_url() ?>/Gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url() ?>/Agenda">Agenda</a>
                    </li>
                </ul>
                <div class="btn-group" role="group" aria-label="Data baru">
                    <a class="btn-group btn btn-outline-danger " data-toggle="modal" href="#modal_keluar" >Keluar</a>
                </div> 
            </div>
        </nav>


    <!-- Modal Keluar -->
    <form id="form_keluar">
        <div class="modal fade" id="modal_keluar" style="background-color:currentColor; " tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" id="judul_p"><b> Peringatan !! </b></h5> 
              </div>

              <div class="modal-body">
                <div class="form-group">
                    <label for="exampleFormControlTextarea3" id="tanggal_m">Apakah yakin ingin keluar ?</label>    
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default col-md-3" data-dismiss="modal" aria-label="Close">Batal</button>
                <?php echo anchor('login/logout', 'Keluar', array('class' => 'btn btn-danger col-md-3')); ?>
              </div>
              
            </div>
          </div>
        </div>  
    </form>
