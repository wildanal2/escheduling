        <nav class="navbar navbar-default navbar-fixed-bottom footer" style=" background-color: transparent;" role="navigation">
            <div class="container-fluid" >
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <button type="button" class="btn btn-warning btn-lg disabled" id="time"></button>
                </div>
                
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <div class="runtext-container">
                        <div class="main-runtext">
                            <marquee direction="" onmouseover="this.stop();"onmouseout="this.start();">
                                <div class="text-container">
                                  <!--  <a data-fancybox-group="gallery" class="fancybox" href="#" style="color: #ffffff"><h5><img src="<?php echo base_url() ?>assets/image/logo.png" height="20px">DINAS KOMUNIKASI DAN INFORMATIKA</h5></a> -->
                                </div>
                            </marquee>
                        </div>
                    </div>
                </div> 

                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" >
                    <button type="button" class="btn btn-danger btn-lg disabled" style="align-items: center;"> 
                        <?php
                        date_default_timezone_set("Asia/Jakarta");
                        echo " " . date("d:M:Y");
                        ?>
                    </button>
                </div>
            </div>  
        </nav>

        <!-- Bootstrap core & jQuery JavaScript
        ================================================== -->
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script> 
        <script type="text/javascript" src="<?php echo base_url().'assets/datatables/datatables.min.js'?>"></script> 
        

        <script type="text/javascript">

        function display_c(){
                var refresh=1000; // Refresh rate in milli seconds
                mytime=setTimeout('display_ct()',refresh)
                }

                function display_ct() {
                    var x = new Date()
                    var x1 =  x.getHours( )+ ":" +  x.getMinutes() + ":" +  x.getSeconds();
                    document.getElementById('time').innerHTML = x1;
                    display_c();
                }


        $(document).ready(function(){

            showgallery();    

            function showgallery(){
                    $.ajax({
                        type  : 'ajax',
                        url   : '<?php echo base_url();?>index.php/Gallery/getfotogalery',
                        dataType : 'json',
                        success : function(data){
                            var html = '';
                            var i;
                            for(i=0; i<data.length; i++){
                                html += '<tr>'+
                                    '<td>'+(i+1) +'</td>'+
                                    '<td>'+data[i].nama +'</td>'+
                                    '<td>'+data[i].tag+'</td>'+ 
                                    '<td>'+data[i].tanggal+'</td>'+ 
                                    '<td><img src="<?=base_url()?>./assets/image/'+data[i].source+'" height="100" width="130"></td>'+ 
                                    '<td>'+
                                    '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit" data-source_foto="'+data[i].source+'" data-nama_foto="'+data[i].nama+'" data-tag="'+data[i].tag+'" data-id_foto="'+data[i].id_galery+'" >Edit</a>'+
                                    '</td>'+
                                    '<td>'+
                                        '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-nama_foto="'+data[i].nama+'" data-source_foto="'+data[i].source+'" data-id_foto="'+data[i].id_galery+'">Hapus</a>'+
                                    '</td>'+
                                    '</tr>';    
                            }
                            $('#show_data').html(html);
                            $(".table").DataTable({
                                "lengthMenu": [[5,10,15,25,-1],[5,10,15,25,"Semua"]]
                            });                 
                        }
                    });
            }

// ====================  Update ======================================================
            //get data for update record UPDATEEEE
            $('#show_data').on('click','.item_edit',function(){
                var id_galery = $(this).data('id_foto');
                var namafoto_galery = $(this).data('nama_foto');
                var tag_galery = $(this).data('tag');
                var sourcefoto_galery = $(this).data('source_foto');
                  
                document.getElementById("foto_update").height="100";
                document.getElementById("foto_update").width="160";
                document.getElementById("foto_update").src="<?=base_url()?>./assets/image/"+sourcefoto_galery;
                document.getElementById("foto_update").style.display="block"; 
                //set iinput
                $('[name="id_foto"]').val(id_galery);
                $('[name="nama_u"]').val(namafoto_galery);
                $('[name="tag_u"]').val(tag_galery); 
                $('[name="fotolama"]').val(sourcefoto_galery);

                $('#Modal_update').modal('show');
            });
            // UPDATEEE record to database
            $('#formupdate').submit(function(e){
                e.preventDefault();
                $.ajax({
                        url:'<?php echo base_url();?>index.php/Gallery/editGallery', //URL submit
                        type:"post", //method Submit
                        data:new FormData(this), //penggunaan FormData
                        processData:false,
                        contentType:false,
                        cache:false,
                        async:false,
                        success: function(data){ 
                            $('#Modal_update').modal('hide');
                            resetinputan();         
                        }
                });
                return false;
            });
//  ====================== END UPDATE ================================================


//  ===================   Delete Record ===============================================
            //get data for delete record show prompt
            $('#show_data').on('click','.item_delete',function(){
                var id_galery = $(this).data('id_foto');
                var namafoto_galery = $(this).data('nama_foto');
                var sourcefoto_galery = $(this).data('source_foto');
                 
                $('#Modal_Delete').modal('show');
                document.getElementById("namafoto_hapus").innerHTML="Apakah Anda Yakin Ingin Menghapus Foto '"+namafoto_galery+"' Berikut?";
                document.getElementById("foto_delete").src="<?=base_url()?>./assets/image/"+sourcefoto_galery;
                $('[name="id_galery_delete"]').val(id_galery);
            });
            //delete record to database
             $('#btn_delete').on('click',function(){
                var id_galery_delete = $('#id_galery_delete').val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url(); ?>/Gallery/delete_foto",
                    dataType : "JSON",
                    data : {id_gallery:id_galery_delete},
                    success: function(){
                        $('[name="id_galery_delete"]').val("");
                        $('#Modal_Delete').modal('hide');
                        resetinputan();
                    }
                });
                return false;
            });
 //   ========================  END DELETE RECORD ====================================


            //Save new Foto
            $('#addgallery').submit(function(e){
                e.preventDefault();
                if ($('#file').get(0).files.length != 0) {
                    $.ajax({
                        url:'<?php echo base_url();?>index.php/Gallery/upload_gallery', //URL submit
                        type:"post", //method Submit
                        data:new FormData(this), //penggunaan FormData
                        processData:false,
                        contentType:false,
                        cache:false,
                        async:false,
                        success: function(data){ 
                            alert("sukses");
                            resetinputan();         
                        }
                    });
                }else{
                    alert("Pilih file untuk di upload");
                }
                
                return false;
            });

            $('#batal').click(function(){
                resetinputan();
            });

            function resetinputan() {
                document.getElementById("titel_sec").innerHTML="Tambahkan Data Foto";
                document.getElementById("foto_update").style.display="none";
                document.getElementById("batal").style.display="none";
                
                
                $('[name="status"]').val("Insert");
                $(".table").DataTable().destroy();
                $('tbody').empty(); 
                document.getElementById('addgallery').reset();
                showgallery();
            }
  



        });
        </script>


    

    </body>
</html>