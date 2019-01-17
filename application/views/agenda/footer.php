
		
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

		<!-- =============== Bootstrap core & jQuery JavaScript ================================================== -->
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --> 
		<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script> 
		<script type="text/javascript" src="<?php echo base_url().'assets/datatables/datatables.min.js'?>"></script> 
		<script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.js"></script>

		<!-- Custom -->
		<!-- <script src="<?php echo base_url() ?>assets/js/custom.js"></script>-->

 


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
			let today = new Date();
			let currentMonth = today.getMonth();
			let currentYear = today.getFullYear();
			
			showAgendaandCalendar(currentMonth,currentYear); //call function show all agenda 

			document.getElementById("previous").addEventListener("click",previous);
			document.getElementById("next").addEventListener("click",next);

			function next() {
				currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
			    currentMonth = (currentMonth + 1) % 12;
			    showAgendaandCalendar(currentMonth, currentYear);
			}

			function previous() {
				currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
			    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
			    showAgendaandCalendar(currentMonth, currentYear);
			}

	        //function show all agenda
	        function showAgendaandCalendar(month,year){
	            var agenda=null;
	            var mm =(month+1);

	            $.ajax({
	            	async: false,
	                type : "POST",
	                url   : '<?php echo base_url();?>index.php/Agenda/getMyAgenda',
	                dataType : 'json',
	                data : { 
                    		month_p:mm,
                    		year_p:year},

	                success : function(data){ 
	                    var agend=[];
	                    var html='';
	                    for(i=0; i<data.length; i++){ 
	                    	a=i+1;             
	                        const tgl_a = new Date(data[i].tanggal_awal);
	                        var tgl_awal = tgl_a.getDate()+"/"+tgl_a.getMonth()+1+"/"+tgl_a.getFullYear();
	                        const tgl_b = new Date(data[i].tanggal_akhir);
	                        var tgl_ahir = tgl_b.getDate()+"/"+tgl_b.getMonth()+1+"/"+tgl_b.getFullYear();
	                        
	                        var ag = {
	                        			tanggal_a:tgl_a,
	                        			tanggal_b:tgl_b,
	                        			level:data[i].level
	                        			}

	                        agend.push(ag);

	                        html += '<tr>';
	                        		if (data[i].level == 1) {
	                        html +=			'<td style="text-align: center" bgcolor="#66C99B"><font color="#fff">'+a+'</font></td>';
	                        		}else if (data[i].level == 2) {
	                        html +=			'<td style="text-align: center" bgcolor="#FE851C"><font color="#fff">'+a+'</font></td>';
	                        		}
		                    html +=	
		                            '<td>'+data[i].namaKegiatan+'</td>'+
		                            '<td>'+data[i].keterangan+'</td>'+
		                            '<td>'+tgl_awal+'</td>'+
		                            '<td>'+tgl_ahir+'</td>'+
		                            '<td>'+
                            		'<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit" data-id_k="'+data[i].id_k+'" data-nama="'+data[i].namaKegiatan+'" data-ket="'+data[i].keterangan+'" data-tanggal_awal="'+data[i].tanggal_awal+'" data-tanggal_akhir="'+data[i].tanggal_akhir+'" data-level="'+data[i].level+'" data-namalevel="'+data[i].nama+'" >Ubah</a>'+
                            		'</td>'+
                            		'<td>'+
                            		'<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id_k="'+data[i].id_k+'" data-nama="'+data[i].namaKegiatan+'">Hapus</a>'+
                            		'</td>'+

	                            '</tr>';
	                    } 
	                    agenda=agend;
	                    $("#agendaall").DataTable().destroy();
            			$('tbody').empty();
	                    
	                    $('#tbl_agendakegiatan').html(html);
	                    $("#agendaall").DataTable({
	                    		destroy:true,
						        "lengthMenu": [[10, 15, 25, -1], [10, 15, 25, "Semua"]]
						    }); 
	                }
	            });

	            //calendarrr nya
	            const monthName = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

	            var html = '';
	        	let today = new Date();
				let currentMonth = month;
				let currentYear = year;

				document.getElementById("thismonth").innerHTML=""+monthName[currentMonth]+"&nbsp "+currentYear;
				
	        	let firstDay = (new Date(currentYear, currentMonth)).getDay();
	        	let daysInMonth = 32 - new Date(currentYear, currentMonth, 32).getDate();

	        	let date = 1;
    			for (let i = 0; i < 6; i++) {
    				// creates a table row
	        		html+='<tr>';

	        		//creating individual cells, filing them up with data.
			        for (let j = 0; j < 7; j++) {
			            if (i === 0 && j < firstDay) {
			                html+='<td>';
			                html+='';
			                html+='</td>';
			            } else if (date > daysInMonth) {
			                break;
			            } else {	 
			            		var asign=null;

			            		for (var ia = (agenda.length-1); ia >=0 ; ia--) {
			            			for (var ib = 0; ib < agenda.length; ib++) {

			            				if (new Date(currentYear,currentMonth,date) >=agenda[ia].tanggal_a && new Date(currentYear,currentMonth,date)<=agenda[ia].tanggal_b) {
			            					
			            					if (agenda[ia].level==1) {
			            						if (asign==null) {
			            							asign=1;
			            						}else{
			            							asign=3;
			            						}
			            					} else if(agenda[ia].level==2){
			            						if (asign==1) { 
									    	        asign=3; 
				            					}else{ 
									    	        asign=2; 
				            					}
			            					}
							    	        break; 
				            			} 
			            			} 
			            		}

			            		if (asign==null) { 
			            			html+='<td>';
									html+=''+date;
							        html+='</td>'; 
			            		}else if(asign==1){
			            			html+='<td bgcolor="#66C99B">'; //ijo
						            html+=''+date;
					    	        html+='</td>';
			            		}else if(asign==2){
			            			html+='<td bgcolor="#FE851C">'; //orange
						            html+=''+date;
					    	        html+='</td>';
			            		}else if(asign==3){
			            			html+='<td bgcolor="#ABAA61">'; //coklat
						            html+=''+date;
					    	        html+='</td>';
			            		}
   
			                date++;
			            }
			        }

					html+='</tr>';	        		
	        	} 
	        	$('#calendarbody').html(html);  

	        }

//   ========================  Start ADD RECORD ====================================
	         //Save new Foto
            $('#formbaru').submit(function(e){
                e.preventDefault();
        		var namain = $('#namain').val();
        		var ket = $('#ket').val();
        		var mulaiin = $('#mulai').val();
        		var selesaiin = $('#selesai').val();
        		var levelin = $('#level').val();

                $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url(); ?>/Agenda/agendaBaru",
                    dataType : "JSON",
                    data : {nama:namain,
                    		keterangan:ket,
                    		mulai:mulaiin,
                    		selesai:selesaiin,
                    		level:levelin},

                    success: function(){ 
                        $('#Modal_Add').modal('hide'); 
                        refresh();
                    }
                });

                return false;
            });
//   ========================  END ADD RECORD ====================================


//  ===================  START UPDATE Record ===============================================
            //get data for UPDATE record show prompt
            $('#agendaall').on('click','.item_edit',function(){
                var id_k = $(this).data('id_k');
                var nama = $(this).data('nama'); 
                var ket = $(this).data('ket');
                var tanggal_awal = $(this).data('tanggal_awal'); 
                var tanggal_akhir = $(this).data('tanggal_akhir'); 
                var level = $(this).data('level'); 
                var namalevel = $(this).data('namalevel'); 

				$('[name="id_kup"]').val(id_k);
				$('[name="namaupdt"]').val(nama);
				$('[name="ketup"]').val(ket);
				$('[name="mulaiup"]').val(tanggal_awal);
				$('[name="selesaiup"]').val(tanggal_akhir);

				for(var i=0; i < document.getElementById('levelup').options.length; i++){
				    if(document.getElementById('levelup').options[i].value == level) {
				      document.getElementById('levelup').selectedIndex = i;
				      break;
				    }
				 }
				$('[name="level"]').val(level);

                $('#Modal_update').modal('show');
                
            });
            
            //UPDATE record to database
             $('#formupdate').submit(function(e){
                e.preventDefault(); 
        		var id_kegup = $('#id_kup').val();
				var namaup = $('#namaupdt').val();
        		var ketup = $('#ketup').val();
        		var mulaiup = $('#mulaiup').val();
        		var selesaiup = $('#selesaiup').val();
        		var levelup = $('select[name=levelup]').val()

                $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url(); ?>/Agenda/agendaUpdate",
                    dataType : "JSON",
                    data : { 
                    		id_k:id_kegup,
                    		nama:namaup,
                    		keterangan:ketup,
                    		mulai:mulaiup,
                    		selesai:selesaiup,
                    		level:levelup},

                    success: function(data){
                    	$('#Modal_update').modal('hide'); 
                        refresh();
                    }
                });
                return false;
            });
 //   ========================  END UPDATE RECORD ====================================



//  ===================  START Delete Record ===============================================
            //get data for delete record show prompt
            $('#agendaall').on('click','.item_delete',function(){
                var id_k = $(this).data('id_k');
                var nama = $(this).data('nama'); 
			                 
                $('#Modal_Delete').modal('show');
                document.getElementById("msg").innerHTML='Agenda "'+nama+'"';
                
                $('[name="id_kegiatan"]').val(id_k);
            });
            //delete record to database
             $('#formdelete').submit(function(e){
                e.preventDefault(); 
        		var id_keg_delete = $('#id_kegiatan').val();

        		 $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url(); ?>/Agenda/agendaDelete",
                    dataType : "JSON",
                    data : {id_k:id_keg_delete},
                    success: function(){
                    	$('[name="id_galery_delete"]').val("");
                        $('#Modal_Delete').modal('hide'); 
                        refresh();
                    }
                });
                return false;
            });
 //   ========================  END DELETE RECORD ====================================

 		function refresh() {
 			$("#agendaall").DataTable().destroy();
            $('tbody').empty();
            document.getElementById('formbaru').reset();
            document.getElementById('formupdate').reset();
            document.getElementById('formdelete').reset();
            
            showAgendaandCalendar(currentMonth,currentYear); //call function show all agenda 
 		}
	      


		});
		</script>




	</body>
</html>