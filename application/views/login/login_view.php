<?php
    //menampilkan error menggunakan alert javascript
    if(isset($error)){
        echo '<script> alert("'.$error.'"); 
            </script>';
    } ?>
    <div class="container">       
        <br><br><br>
        <center>
            <!-- logo tengah mojokerto -->
            <img src="<?=base_url()?>assets/image/logo2_Mojokerto.png" class="" height="110px">
        </center>
        <br>

        <div class="col-xs-1 col-sm-3 col-md-3 col-lg-4"></div>
        <div class="col-xs-10 col-sm-6 col-md-6 col-lg-4" >
            <div class="login">
                <form id="form_login">
                    <fieldset>
                    <?php echo validation_errors(); ?>
                        <br>
                        <p class="text-center">Hey! Let's go to work.</p>
                        <div class="form-horizontal fomlogin">
                            <!-- form kolom username -->
                            <div class="input-group textinput">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="uname" type="text" class="form-control" name="uname" placeholder="username"  minlength="4" required>
                            </div>
                            <!-- form kolom Password -->
                            <div class="input-group textinput">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="paswd" type="Password" class="form-control" name="paswd" placeholder="Password" minlength="4" required>
                            </div>
                            <!-- form kolom information / pesan -->
                            <div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
                              <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
                              <span id="message"></span>
                            </div>  
                            <!-- button login/ submit -->
                            <button type="submit" class="btn buttonload" id="btn_login"><i id="loadbtn" style="display: none;" class="fa fa-spinner fa-spin"></i> Sign In</button>
                            <br>
                        </div>
                    </fieldset>
                </form>
            </div><br>
            <center><p> &copy; Copyright 2019</p></center>
        </div> 
        <div class="col-xs-1 col-sm-3 col-md-3 col-lg-4"></div>

        
    </div>