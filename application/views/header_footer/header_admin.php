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


    <body style="background: #b3d1ff" onload=display_ct()>
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
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url() ?>/Gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url() ?>/Agenda">Agenda</a>
                    </li>
                </ul>

                <div class="btn-group" role="group" aria-label="Data baru">
                    <a class="btn-group btn btn-outline-danger " data-toggle="modal" href="#modal_keluar" >Keluar</a>
                </div> 


                <!-- <div class="btn-group">
                    <ul class="nav navbar-nav">
                        <li class="dropdown" style="margin-right: 50px">
                            <div class="dropdown-toggle btn-group btn btn-outline-danger dropdown-toggle btn-sm" role="group" aria-label="Data baru" data-toggle="dropdown"> KELUAR
                                
                            </div>

                            // <a class="dropdown-toggle" href="#" data-toggle="dropdown">Login</a>
                            <div class="dropdown-menu">
                                <form class="navbar-form container" role="form">
                                    <p> Apakah yakin ingin keluar ?</p>
                                    <button type="submit" class="btn btn-primary">NO</button>
                                    
                                        <?php echo anchor('login/logout', 'YES', array('class' => 'btn btn-success')); ?>
                                    
                                </form>
                            </div>
                        </li>
                    </ul>
                </div> -->

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

