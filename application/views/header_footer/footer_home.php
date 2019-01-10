
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

			showAgendaandCalendar(); //call function show all agenda
			showabupati();
			showakominfo()

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
	                        			tanggal_a:tgl_a.getDate(),
	                        			tanggal_b:tgl_b.getDate(),
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

	            //calendarrr nya
	            var html = '';
	        	let today = new Date();
				let currentMonth = today.getMonth();
				let currentYear = today.getFullYear();

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
			            				if (date>=agenda[ia].tanggal_a && date<=agenda[ia].tanggal_b) {
			            					
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



		});
		</script>


	

	</body>
</html>