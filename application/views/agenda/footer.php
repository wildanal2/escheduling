
		<!-- navbar jam dan tanggal bottom -->
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

		<!-- =============== Bootstrap & datatables datepicker JavaScript ============== -->
		<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script> 
		<script type="text/javascript" src="<?php echo base_url().'assets/datatables/datatables.min.js'?>"></script> 
		<script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.js"></script>

		<script type="text/javascript">

		// timer jam refresh in detik
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
			// fungsi date picker tanggal mulai
			var datepickerss= $("#datepickerss");
	        datepickerss.datepicker({ 
			    startDate: "today",  
			    todayHighlight: true
	        }) 
	        // fungsi date picker tanggal selesai
	        datepickerss= $("#datepickers");
	        datepickerss.datepicker({    
			    todayHighlight: true
	        })  

	        // deklarasi variabel tanggal sekarang
			let today = new Date();
			let currentMonth = today.getMonth();
			let currentYear = today.getFullYear();
			
			//call function show all agenda berdasarkan bulan dan tahun 
			showAgendaandCalendar(currentMonth,currentYear); 

			// event click previous and next button month
			document.getElementById("previous").addEventListener("click",previous);
			document.getElementById("next").addEventListener("click",next);

			// fungsi next month
			function next() {
				currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
			    currentMonth = (currentMonth + 1) % 12;
			    showAgendaandCalendar(currentMonth, currentYear);
			}

			// fungsi previous month
			function previous() {
				currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
			    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
			    showAgendaandCalendar(currentMonth, currentYear);
			}

	        //function show agenda berdasarkan mulan dan tahun
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
	                    	// mengkonversi tanggal yang akan ditampilkan
	                        const tgl_a = new Date(data[i].tanggal_awal);
	                        var tgl_awal = tgl_a.getDate()+"/"+(parseInt(tgl_a.getMonth(), 10)+1)+"/"+tgl_a.getFullYear();
	                        const tgl_b = new Date(data[i].tanggal_akhir);
	                        var tgl_ahir = tgl_b.getDate()+"/"+(parseInt(tgl_b.getMonth(), 10)+1)+"/"+tgl_b.getFullYear();
	                        
	                        var ag = {
	                        			tanggal_a:tgl_a,
	                        			tanggal_b:tgl_b,
	                        			level:data[i].level
	                        			}
	                        // memasukkan data agenda kedalam array yang nantinya akan diolah untuk coloring calendar
	                        agend.push(ag);

	                        html += '<tr>';
	                        		if (data[i].level == 1) { // bupati
	                        html +=			'<td style="text-align: center" bgcolor="#ff6666"><font color="#fff">'+a+'</font></td>';
	                        		}else if (data[i].level == 2) { // kominfo
	                        html +=			'<td style="text-align: center" bgcolor="#008ae6"><font color="#fff">'+a+'</font></td>';
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
	                    // memasukkan data agenda lokal ke variabel agenda global
	                    agenda=agend;

	                    $("#agendaall").DataTable().destroy();
            			$('tbody').empty();
	                    // memasukkan hatml agenda ke id tblagendakegiatan & set datatables
	                    $('#tbl_agendakegiatan').html(html);
	                    $("#agendaall").DataTable({
	                    		destroy:true,
						        "lengthMenu": [[4,7, 14,-1], [4,7, 14, "Semua"]]
						    }); 
	                }
	            });

	            // nama bulan calendarrr nya
	            const monthName = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

	            var html = '';
	        	let today = new Date();
				let currentMonth = month;
				let currentYear = year;

				document.getElementById("thismonth").innerHTML=""+monthName[currentMonth]+"&nbsp "+currentYear;
				
				// pembuatan tabel calendar
	        	let firstDay = (new Date(currentYear, currentMonth)).getDay();
	        	let daysInMonth = 32 - new Date(currentYear, currentMonth, 32).getDate();

	        	// variabel tanggal dimulai tgl 1
	        	let date = 1;
    			for (let i = 0; i < 6; i++) {
    				// creates a table row calendar
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
			            		// variabel info agar tidak terjadi doubel
			            		var asign=null;

			            		// pengecekan calendar jika ada agenda di tanggal ini(date)
			            		for (var ia = (agenda.length-1); ia >=0 ; ia--) {
			            			for (var ib = 0; ib < agenda.length; ib++) {

			            				if (new Date(currentYear,currentMonth,date) >=agenda[ia].tanggal_a && new Date(currentYear,currentMonth,date)<=agenda[ia].tanggal_b) {
			            					
			            					// pemberian warna jika level bupati
			            					if (agenda[ia].level==1) {
			            						if (asign==null) {
			            							asign=1;
			            						}else if (asign==1 || asign==3) { 
									    	        asign=3; 
				            					}else{ 
			            							asign=5;
			            						}
			            					} 
			            					// pemberian warna jika level kominfo
			            					else if(agenda[ia].level==2){
			            						if(asign==null){
			            							asign=2; 
			            						}else if (asign==2 || asign==4) { 
									    	        asign=4; 
				            					}else{ 
									    	        asign=5; 
				            					}
			            					}
							    	        break; 
				            			} 
			            			} 
			            		}

			            		// penentuan warna warna
			            		// 1 bupati normal
			            		// 4 bupati parah (dua kali kegiatan)
			            		// 3 bupati & kominfo
			            		// 2 jam parah (bupati dan kominfo)

			            		if (asign==null) {
			            			html+='<td style="border: 1px solid #dddddd;">'; 
			            			if (date==today.getDate() && today.getMonth()==currentMonth) {
			            				html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{
			            				html+='<font>'+date+'</font>';
			            			}
							        html+='</td>'; 
			            		}else if(asign==1){ 
			            			html+='<td bgcolor="#ff6666">'; //Bupati 
						            if (date==today.getDate() && today.getMonth()==currentMonth) {
			            				html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{ 
			            				html+='<font style="color: #FFF;">'+date+'</font>';
			            			}
					    	        html+='</td>';
			            		}else if(asign==2){
			            			html+='<td bgcolor="#008ae6">'; //kominfo
						            if (date==today.getDate() && today.getMonth()==currentMonth) {
						            	html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{
			            				html+='<font style="color: #FFF;">'+date+'</font>';
			            			}
					    	        html+='</td>';
			            		}else if(asign==3){
			            			html+='<td bgcolor="#ff6666">'; //Bupati parah
						            if (date==today.getDate() && today.getMonth()==currentMonth) {
						            	html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{
			            				html+='<font style="color: #FFF;">'+date+'</font>';
			            			}
					    	        html+='</td>';
			            		}else if(asign==4){
			            			html+='<td bgcolor="#008ae6">'; //kominfo parah
						            if (date==today.getDate() && today.getMonth()==currentMonth) {
						            	html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{
			            				html+='<font style="color: #FFF;">'+date+'</font>';
			            			}
					    	        html+='</td>';
			            		}else if(asign==5){
			            			html+='<td bgcolor="#8B76A0">'; //jam parah bp_kalender
						            if (date==today.getDate() && today.getMonth()==currentMonth) {
			            				html+='<div style="background: url(<?php echo base_url() ?>assets/image/bg_datenow.png); background-repeat: no-repeat; background-position: center;  font-weight: 900; text-align: center; color: #FFF;">'+date+'</div>';
			            			}else{
			            				html+='<font style="color: #FFF;">'+date+'</font>';
			            			}
					    	        html+='</td>';
			            		}
   							// tanngal bertambah
			                date++;
			            }
			        }

					html+='</tr>';	        		
	        	} 
	        	$('#calendarbody').html(html);  

	        }

//   ========================  Start ADD RECORD ====================================
	        //Save kegiatan baru
            $('#formbaru').submit(function(e){
                e.preventDefault();
        		// memasukkan data inputan ke variabel
        		var namain = $('#namain').val();
        		var ket = $('#ketgiat').val();
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
                        // method clear form & calendar agenda
                        refresh();
                    }
                });

                return false;
            });
//   ========================  END ADD RECORD ====================================


//  ===================  START UPDATE Record ===============================================
            //get data for UPDATE record show prompt
            $('#agendaall').on('click','.item_edit',function(){
            	// memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
                var id_k = $(this).data('id_k');
                var nama = $(this).data('nama'); 
                var ket = $(this).data('ket');
                var tanggal_awal = $(this).data('tanggal_awal'); 
                var tanggal_akhir = $(this).data('tanggal_akhir'); 
                var level = $(this).data('level'); 
                var namalevel = $(this).data('namalevel'); 

                // memasukkan data ke form updatean
				$('[name="id_kup"]').val(id_k);
				$('[name="namaupdt"]').val(nama);
				$('[name="ketup"]').val(ket);
				$('[name="mulaiup"]').val(tanggal_awal);
				$('[name="selesaiup"]').val(tanggal_akhir);
				// data dropdown
				for(var i=0; i < document.getElementById('levelup').options.length; i++){
				    if(document.getElementById('levelup').options[i].value == level) {
				      document.getElementById('levelup').selectedIndex = i;
				      break;
				    }
				 }
				$('[name="level"]').val(level);

                $('#Modal_update').modal('show');
                
            });
            
            //UPDATE record to database (submit button)
             $('#formupdate').submit(function(e){
                e.preventDefault(); 
        		// memasukkan data dari form update ke variabel untuk update db
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



//  ===================  START Delete Record ===================================
            //get data for delete record show prompt modal
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
 //   ==================  END DELETE RECORD ====================================


 		// fungsi refresh reset data all form dan calendar
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