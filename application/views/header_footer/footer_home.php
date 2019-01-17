
		<nav class="navbar navbar-default navbar-fixed-bottom" style="background: #2929a3; margin-bottom: -10px" role="navigation">
			<div class="container-fluid">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="background-color: #ff9900;">
					<center><h4 style="color: #ffffff" id="time"></h4></center>
				</div>
				
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
					<div class="runtext-container" style="margin-top: 5px">
						<div class="main-runtext">
							<marquee direction="" onmouseover="this.stop();"onmouseout="this.start();" id="text_berjalan">


							</marquee>
						</div>
					</div>
				</div> 

				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="background-color: #ff1a1a"  >
					<h4 style="color: #ffffff" style="align-items: center;"> 
						<?php
						date_default_timezone_set("Asia/Jakarta");
						echo " " . date("d:M:Y");
						?>
					</h4>
				</div>
			</div>	
		</nav>
		

		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug --> 
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 		<script type="text/javascript" src="<?php echo base_url().'assets/datatables/datatables.min.js'?>"></script> 





		
		<script type="text/javascript">
		var slideIndex = 1;

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


			function currentSlide(n) {
			  showSlides1(slideIndex = n);
			}

			function showSlides1(n) {
			  var i;
			  var slides = document.getElementsByClassName("mySlides");
			  var dots = document.getElementsByClassName("demo");
			  var captionText = document.getElementById("caption");
			  if (n > slides.length) {slideIndex = 1}
			  if (n < 1) {slideIndex = slides.length}
			  for (i = 0; i < slides.length; i++) {
			      slides[i].style.display = "none";
			  }
			  for (i = 0; i < dots.length; i++) {
			      dots[i].className = dots[i].className.replace(" active", "");
			  }

			  slides[slideIndex-1].style.display = "block";
			  dots[slideIndex-1].className += " active"; 
			  captionText.innerHTML = dots[slideIndex-1].alt;
			}



		$(document).ready(function(){

			const monthName = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

			showAgendaandCalendar(); //call function show all agenda
			// showAgendaMingguIni();
			showabupati();
			showakominfo();
			showPengumuman();
			showGalerihome();
			showpengumumanfooter();



			function showAgendaMingguIni() {
				
			}

	        //function show all agenda
	        function showAgendaandCalendar(){
	            var agenda=null;
	            var agendaweek= null

	            // minggu an isi datanyaaa
	            $.ajax({ 
	            	async: false,
	                type  : 'ajax',
	                url   : '<?php echo base_url();?>index.php/Home/getWeekAgenda',
	                dataType : 'json',
	                success : function(data){
	                    var html = '';
	                    var i;
	                    var agendwee=[];

	                    for(i=0; i<data.length; i++){
	           
	                        var agweek = {
	                        			nama:data[i].namaKegiatan,
	                        			ket:data[i].keterangan,
	                        			tanggal_awal:data[i].tanggal_awal,
	                        			tanggal_akhir:data[i].tanggal_akhir,
	                        			level:data[i].level
	                        			} 
	                        agendwee.push(agweek);   
	                    }
	                    agendaweek=agendwee; 
	                }
	            });

	            // agenda month
	            $.ajax({
	            	async: false,
	                type  : 'ajax',
	                url   : '<?php echo base_url();?>index.php/Home/getAgenda',
	                dataType : 'json',
	                success : function(data){
	                    var html = '';
	                    var i;
	                    var agend=[];

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
	                    }
	                    agenda=agend; 
	                }
	            });

	            //calendarrr nya
	           
	            var html = '';
	            var htmlweek = '';

	        	let today = new Date();
				let currentMonth = today.getMonth();
				let currentYear = today.getFullYear();

				document.getElementById("thismonth").innerHTML=""+monthName[currentMonth]+"&nbsp "+currentYear;
				
	        	let firstDay = (new Date(currentYear, currentMonth)).getDay();
	        	let daysInMonth = 32 - new Date(currentYear, currentMonth, 32).getDate();

	        	let date = 1;
	        	let numday = 1;

    			for (let i = 0; i < 6; i++) {
    				// creates a table row
	        		html+='<tr>';

	        		//creating individual cells, filing them up with data.
			        for (let numdays = 0; numdays < 7; numdays++) {
			        	var doubell = null;
			            if (i === 0 && numdays < firstDay) {
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

			            //cek minggu an tgl
			            for (var io = 0; io < agendaweek.length; io++) {
			            	var tgla = new Date(agendaweek[io].tanggal_awal);
			            	var tglb = new Date(agendaweek[io].tanggal_akhir);

			            	if (date>=tgla.getDate() && date<=tglb.getDate()) {
		            			var tgll = date+"/"+tgla.getMonth()+1+"/"+tgla.getFullYear();
			            		if (date==today.getDate()) {
			            			htmlweek += '<tr style="background-color: #C8AFD4;font-weight: 900;">';
			            		}else{
			            			htmlweek += '<tr>';
			            		}

			            		///////// isiiiiii 
		                        		if (agendaweek[io].level == 1) {
		                        htmlweek +=			'<td style="text-align: center" bgcolor="#66C99B"><font color="#fff">'+numday+'</font></td>';
		                        		}else if (agendaweek[io].level == 2) {
		                        htmlweek +=			'<td style="text-align: center" bgcolor="#FE851C"><font color="#fff">'+numday+'</font></td>';
		                        		}
			                    htmlweek +=	
			                            '<td>'+agendaweek[io].nama+', '+agendaweek[io].ket+'</td>'+
			                            	'<td style="text-align: right;">'+tgll+' '+
		                        		'</tr>';
		                        /////////////////////

		                        numday++;
			            	}
			            	

			            }
			            

			        }

					html+='</tr>';	        		
	        	} 
	        	$('#calendarbody').html(html);  
	        	$('#tbl_agendakegiatan').html(htmlweek); 
	        }

	        function showakominfo(){
	            $.ajax({
	                type  : 'ajax',
	                url   : '<?php echo base_url();?>index.php/Home/getAgendakominfo',
	                dataType : 'json',
	                success : function(data){
	                    var html = '';
	                    var i;
	                    for(i=0; i<data.length; i++){
	                        a=i+1;
	                        var tgla = new Date(data[i].tanggal_awal);

	                        html += '<tr>'+
	                        	'<td style="text-align: center" bgcolor="#FE851C"><font color="#fff">'+tgla.getDate()+'</font></td>'+
		                            '<td>'+data[i].namaKegiatan+', '+data[i].keterangan+'</td>'+ 
	                            '</tr>'; 
	                    }
	                    $('#tbl_agendakominfo').html(html);
	                    $("#tbl_kominfo").DataTable({
	                    		destroy:true,searching: false,
						        "lengthMenu": [[5,10, -1], [5,10, "Semua"]],
						        "bLengthChange": false
						    });
	                }
	            });
	        }

	        function showabupati(){
	            $.ajax({
	                type  : 'ajax',
	                url   : '<?php echo base_url();?>index.php/Home/getAgendabupati',
	                dataType : 'json',
	                success : function(data){
	                    var html = '';
	                    var i;
	                    for(i=0; i<data.length; i++){
	                        a=i+1;
	                        var tgla = new Date(data[i].tanggal_awal);

	                        html += '<tr>'+
	                        	'<td style="text-align: center" bgcolor="#66C99B"><font color="#fff">'+tgla.getDate()+'</font></td>'+
		                            '<td>'+data[i].namaKegiatan+', '+data[i].keterangan+'</td>'+ 
	                            '</tr>';
	                    }
	                    $('#tbl_agendabupati').html(html); 
	                    $("#tbl_bupati").DataTable({
	                    		destroy:true,searching: false,
	                    		"lengthMenu": [[5,10, -1], [5,10, "Semua"]],
	                    		"bLengthChange": false
						    });

	                }
	            });
	        }


	        function showPengumuman(){
	        	 $.ajax({
	                type  : 'ajax',
	                url   : '<?php echo base_url();?>index.php/Pengumuman/getPengumumanHome',
	                dataType : 'json',
	                success : function(data){
	                	html='';
	                	for(i= 0; i<data.length; i++) {

	                		const tgl = new Date(data[i].tanggal);
	                        var tgl_a = tgl.getDate()+"-"+tgl.getMonth()+1+"-"+tgl.getFullYear();

	                		html += '<div class="card">'+
										'<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">'+
											 '<img  width="40px" src="<?php echo base_url() ?>assets/image/horn.png" style="margin: 10px;" >'+
										'</div>'+
										'<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10" style="align-items: center;">'+
											'<a style="color: #000;" class="item_view linkpengumum" data-judul="'+data[i].judul+'" data-isi="'+data[i].isi+'"  data-tanggal="'+data[i].tanggal+'" ><h5>'+data[i].judul+'</h5></a>'+
											'<p style="margin-top: -5px">'+tgl_a+'</p>'+
										'</div>'+
									'</div><hr>';
	                	}
	                    $('#con_lstpgumuman').html(html); 
	                }
	            });
	        }

	        $('#con_lstpgumuman').on('click','.item_view',function(){
                var judul = $(this).data('judul');
                var isi = $(this).data('isi'); 
                
                const tgl = new Date($(this).data('tanggal'));
	            var tgl_a = tgl.getDate()+"-"+monthName[tgl.getMonth()+1]+"-"+tgl.getFullYear();  

                document.getElementById("judul").innerHTML=judul;
                document.getElementById("pengumuman").innerHTML=isi;
                document.getElementById("tanggal").innerHTML=tgl_a;

                document.getElementById("con_lstpgumuman").style.display="none";
                document.getElementById("card_pengumuman").style.display="block";
            });

	        document.getElementById("back").addEventListener("click",hidepengumuman);

	        function hidepengumuman(){
	        	document.getElementById("con_lstpgumuman").style.display="block";
                document.getElementById("card_pengumuman").style.display="none";
	        }



	        function showGalerihome(){
	        	 $.ajax({
	        	 	async: false,
	                type  : 'ajax',
	                url   : '<?php echo base_url();?>index.php/Home/getGalleryHome',
	                dataType : 'json',
	                success : function(data){
	                	var html='';
	                	var html1='';
	                	for(i=0; i<data.length; i++){
	                		html+=  '<div class="mySlides">'+
									   // '<div class="numbertext">'+data[i].nama+'</div>'+
									    '<img class="img-responsive" src="<?=base_url()?>./assets/image/'+data[i].source+'">'+
									'</div>';

							html1+= '<div class="column">'+
								      '<img class="demo cursor img-responsive" src="<?=base_url()?>./assets/image/'+data[i].source+'" style="width:100%" onclick="currentSlide('+(i+1)+')" alt="'+data[i].nama+'">'+
								    '</div>';
							
				    	}
				    	$('#gal_home').html(html); 
				    	$('#column_imggallery').html(html1); 
	                }
	            });
	        }


	        function showpengumumanfooter(){
	        	 $.ajax({
	        	 	async: false,
	                type  : 'ajax',
	                url   : '<?php echo base_url();?>index.php/Home/getPengumumanfooter',
	                dataType : 'json',
	                success : function(data){
	                	var html=''; 
	                	for(i=0; i<data.length; i++){
	                		html+=  '<a data-fancybox-group="gallery" class="fancybox" href="#" style="color: #fff;font-size: 18px; margin-left:50px ;" >'+
	                				'<img src="<?php echo base_url() ?>assets/image/logo.png" height="20px"> '+
	                				'Dinas Komunikasi dan Informatika Kabupaten Mojokerto '+data[i].judul+'  '+data[i].isi+'</a>';
				    	}
				    	$('#text_berjalan').html(html);
	                }
	            });
	        }


//   ========================   sliderrrrrr ===========================
	        carousel();

	        function carousel() {
				var slides = document.getElementsByClassName("mySlides");
				if (slideIndex > slides.length) slideIndex=1;
				showSlides(slideIndex);
				slideIndex++;
				setTimeout(carousel, 8000);
			}

			document.getElementById("prev").addEventListener("click",minSlides);
			document.getElementById("next").addEventListener("click",plusSlides);

			function plusSlides() {
				n= 1;
			  showSlides(slideIndex += n);
			} 
			function minSlides() {
				n= -1;
			  showSlides(slideIndex += n);
			}

			function showSlides(n) {
			  var i;
			  var slides = document.getElementsByClassName("mySlides");
			  var dots = document.getElementsByClassName("demo");
			  var captionText = document.getElementById("caption");
			  if (n > slides.length) {slideIndex = 1}
			  if (n < 1) {slideIndex = slides.length}
			  for (i = 0; i < slides.length; i++) {
			      slides[i].style.display = "none";
			  }
			  for (i = 0; i < dots.length; i++) {
			      dots[i].className = dots[i].className.replace(" active", "");
			  }

			  slides[slideIndex-1].style.display = "block";
			  dots[slideIndex-1].className += " active"; 
			  captionText.innerHTML = dots[slideIndex-1].alt;
			}
//  end slide

		});
		</script>


	

	</body>
</html>