
        
        <nav class="navbar navbar-default navbar-fixed-bottom footer" style="background-color: transparent;" role="navigation">
            <div class="container-fluid" >
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <button type="button" class="btn btn-warning btn-lg disabled" id="time"></button>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <div class="runtext-container">
                        <div class="main-runtext">
                            <marquee direction="" onmouseover="this.stop();"onmouseout="this.start();">
                                <div class="text-container">
                                   <!-- <a data-fancybox-group="gallery" class="fancybox" href="#" style="color: #ffffff"><h5><img src="<?php echo base_url() ?>assets/image/logo.png" height="20px">DINAS KOMUNIKASI DAN INFORMATIKA</h5></a> -->
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
        <script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>


        <!-- Plugins -->
        <script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>

        <!-- Custom -->
        <!-- <script src="<?php echo base_url() ?>assets/js/custom.js"></script>-->
        
        <script type="text/javascript" src="<?php echo base_url().'assets/datatables/datatables.min.js'?>"></script> 
        <script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.js"></script>
        
        <script type="text/javascript">

        function display_c(){
                var refresh=1000; // Refresh rate in milli seconds
                mytime=setTimeout('display_ct()',refresh)
                }

        function display_ct() {
            var x = new Date();
            var x1 =  x.getHours( )+ ":" +  x.getMinutes() + ":" +  x.getSeconds();
            document.getElementById('time').innerHTML = x1;
            display_c();
        }

         $(document).ready(function(){
            
            show();    
            function show(){
                    $.ajax({
                        async :false,
                        type  : 'ajax',
                        url   : '<?php echo base_url();?>index.php/pengumuman/getPengumuman',
                        dataType : 'json',
                        success : function(data){
                            var html = '';
                            var i;

                            for(i=0; i<data.length; i++){
                                var string = data[i].isi ;
                                var length = 21;
                                var trimmedString = string.substring(0, length, "..");

                                html += 

                                '<tr>'+
                                    '<td>'+(i+1) +'</td>'+
                                    '<td>'+data[i].judul +'</td>'+
                                    '<td>'+trimmedString+'</td>'+
                                    '<td>'+data[i].tanggal+'</td>'+ 
                                    
                                    '<td>'+
                                        '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit" data-judul="'+data[i].judul+'" data-isi="'+data[i].isi+'" data-tanggal="'+data[i].tanggal+'"  >Edit</a>'+
                                    '</td>'+
                                   

                                    '<td>'+
                                        '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-judul="'+data[i].judul+'" data-isi="'+data[i].isi+'" data-tanggal="'+data[i].tanggal+'">Hapus</a>'+
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


        // ====================  Update DATATABLE ======================================================
            //get data for update record UPDATEEEE
            $('#mydata').on('click','.item_edit',function(){
                //alert($(this).data('isi'));
                var tanggal = $(this).data('tanggal');
                var judul = $(this).data('judul');
                var pengumuman = $(this).data('isi');
                  
                document.getElementById("judul").innerHTML=judul;
                document.getElementById("tanggal").innerHTML=tanggal;
                document.getElementById("pengumuman").value=pengumuman;
               
                document.getElementById("btn_perbaharui").style.display="block";
                
                document.getElementById("judul_m").innerHTML=judul;
                //document.getElementById("judul_p").value=judul;
                document.getElementById("tanggal_m").innerHTML=tanggal;
                document.getElementById("pengumuman_m").value=pengumuman;

               

            });

            
            //UPDATE record to database
             $('#form_update').submit(function(e){
                e.preventDefault(); 

                var judul_m= $('#judul_m').val();
                var pengumuman_m = $('#pengumuman_m').val();
                //alert(judul_m + " "+ pengumuman_m);
                $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url(); ?>/Pengumuman/pengumumanUpdate",
                    dataType : "JSON",
                    data : { 
                            judul:judul_m,
                            pengumuman:pengumuman_m},
                    success: function(data){                     
                        $('#modal_lihat').modal('hide'); 
                        refresh();

                    }
                });
                return false;
            });
            
 //   ========================  END UPDATE RECORD ====================================





            //  ===================   Delete Record ===============================================
            //get data for delete record show prompt
            $('#show_data').on('click','.item_delete',function(){
                var tanggal = $(this).data('tanggal');
                var judul = $(this).data('judul');
                var pengumuman = $(this).data('isi');
                 
                $('#Modal_Delete').modal('show');
                document.getElementById("namaPengumuman_hapus").innerHTML="Hapus Pengumuman '"+judul+"' ?";
                
                
                $('[name="id_pengumuman_delete"]').val(judul);
            });
            //delete record to database
             $('#btn_delete').on('click',function(){
                var id_pengumuman_delete = $('#id_pengumuman_delete').val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url(); ?>/Pengumuman/delete_pengumuman",
                    dataType : "JSON",
                    data : {judul:id_pengumuman_delete},
                    success: function(){
                        $('[name="id_pengumuman_delete"]').val("");
                        $('#Modal_Delete').modal('hide');
                        refresh()
                    }
                });
                return false;
            });
 //   ========================  END DELETE RECORD ====================================

        function refresh() {
                $(".table").DataTable().destroy();
                $('tbody').empty();
                document.getElementById('form_update').reset();
                document.getElementById('tampil').reset();
            
                show();
        }

          
        });

        
//        document.getElementById().innerText = truncateText("pengumuman", 99);
          

        
        

        



        </script>


    </body>
</html>