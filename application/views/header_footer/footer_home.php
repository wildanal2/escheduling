
		<nav class="navbar navbar-default navbar-fixed-bottom" style="background: #4f0381" role="navigation">
			<div class="container-fluid">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="background-color: #ff9900;">
					<center><h4 style="color: #ffffff" id="time"></h4></center>
				</div>
				
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
					<div class="runtext-container">
						<div class="main-runtext">
							<marquee direction="" onmouseover="this.stop();"onmouseout="this.start();">
								<div class="text-container">
								   <a data-fancybox-group="gallery" class="fancybox" href="#" style="color: #ffffff"><h5><img src="<?php echo base_url() ?>assets/image/logo.png" height="20px">DINAS KOMUNIKASI DAN INFORMATIKA</h5></a>
								</div>
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

			showAgendaandCalendar(); //call function show all agenda
			showAgendaMingguIni();
			showabupati();
			showakominfo();
			showPengumuman();
			showGalerihome();



			function showAgendaMingguIni() {
				$.ajax({ 
	                type  : 'ajax',
	                url   : '<?php echo base_url();?>index.php/Home/getWeekAgenda',
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

	                        html += '<tr>';
	                        		if (data[i].level == 1) {
	                        html +=			'<td style="text-align: center" bgcolor="#66C99B"><font color="#fff">'+a+'</font></td>';
	                        		}else if (data[i].level == 2) {
	                        html +=			'<td style="text-align: center" bgcolor="#FE851C"><font color="#fff">'+a+'</font></td>';
	                        		}
		                    html +=	
		                            '<td>'+data[i].namaKegiatan+'</td>'+
		                            '<td style="text-align: center;">'+tgl_awal+' s.d '+tgl_ahir+'</td>'+ 
	                            '</tr>';
	                    }
	                    agenda=agend;
	                    $('#tbl_agendakegiatan').html(html); 
	                }
	            });
			}
	        //function show all agenda
	        function showAgendaandCalendar(){
	            var agenda=null;

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
	            const monthName = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

	            var html = '';
	        	let today = new Date();
				let currentMonth = today.getMonth();
				let currentYear = today.getFullYear();

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
				            						html+='<td bgcolor="#66C99B">';
										            html+=''+date;
									    	        html+='</td>';
									    	        asign=date;	
				            					}	
			            					}else if(agenda[ia].level==2){
			            						if (asign==null) {
				            						html+='<td bgcolor="#FE851C">';
										            html+=''+date;
									    	        html+='</td>';
									    	        asign=date;	
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
			            		}
   
			                date++;
			            }
			        }

					html+='</tr>';	        		
	        	} 
	        	$('#calendarbody').html(html);  

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
	                         
	                        html += '<tr>';
	                        		
	                        		if (data[i].level == 1) {
	                        html +=			'<td style="text-align: center" bgcolor="#66C99B"><font color="#fff">'+a+'</font></td>';
	                        		}else if (data[i].level == 2) {
	                        html +=			'<td style="text-align: center" bgcolor="#FE851C"><font color="#fff">'+a+'</font></td>';
	                        		}
		                    html +=	
		                            '<td>'+data[i].namaKegiatan+'</td>'+ 
	                            '</tr>';
	                    }
	                    $('#tbl_agendakominfo').html(html); 
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
	                         
	                        html += '<tr>';
	                        		
	                        		if (data[i].level == 1) {
	                        html +=			'<td style="text-align: center" bgcolor="#66C99B"><font color="#fff">'+a+'</font></td>';
	                        		}else if (data[i].level == 2) {
	                        html +=			'<td style="text-align: center" bgcolor="#FE851C"><font color="#fff">'+a+'</font></td>';
	                        		}
		                    html +=	
		                            '<td>'+data[i].namaKegiatan+'</td>'+ 
	                            '</tr>';
	                    }
	                    $('#tbl_agendabupati').html(html); 
	                }
	            });
	        }


	        function showPengumuman(){
	        	 $.ajax({
	                type  : 'ajax',
	                url   : '<?php echo base_url();?>index.php/Pengumuman/getPengumumanFirstRow',
	                dataType : 'json',
	                success : function(data){

	                	const tgl = new Date(data.tanggal);
                        var tgl_a = tgl.getDate()+"/"+tgl.getMonth()+1+"/"+tgl.getFullYear();
                            

	                	document.getElementById("judul").innerHTML=data.judul;
		                document.getElementById("tanggal").innerHTML=tgl_a;
		                document.getElementById("pengumuman").value=data.isi;

		                document.getElementById("judul_m").innerHTML=data.judul;
		                document.getElementById("tanggal_m").innerHTML=tgl_a;
		                document.getElementById("pengumuman_m").value=data.isi;
	                    
	                }
	            });
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
									   '<div class="numbertext">'+data[i].nama+'</div>'+
									    '<img class="img-responsive" src="<?=base_url()?>./assets/image/'+data[i].source+'">'+
									'</div>';

							html1+= '<div class="column">'+
								      '<img class="demo cursor" src="<?=base_url()?>./assets/image/'+data[i].source+'" style="width:100%" onclick="currentSlide('+(i+1)+')" alt="'+data[i].nama+'">'+
								    '</div>';
				    	}
				    	$('#gal_home').html(html); 
				    	$('#column_imggallery').html(html1); 
	                }
	            });
	        }

//   ========================   sliderrrrrr ===========================
	        showSlides(slideIndex);

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