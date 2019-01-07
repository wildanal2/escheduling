
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
								   <a data-fancybox-group="gallery" class="fancybox" href="#" style="color: #ffffff"><h5><img src="assets/image/logo.png" height="20px">DINAS KOMUNIKASI DAN INFORMATIKA</h5></a>
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
 		<script src="Hello World"></script>
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

			showAgenda(); //call function show all agenda
          
	        //function show all agenda
	        function showAgenda(){
	            $.ajax({
	                type  : 'ajax',
	                url   : '<?php echo base_url();?>index.php/Home/getAgenda',
	                dataType : 'json',
	                success : function(data){
	                    var html = '';
	                    var i;
	                    for(i=0; i<data.length; i++){
	                        a=i+1;
	                        
	                        // var myDateTime = moment(xx).format('DD-MMM-YYYY');
	                        
	                        var tgl_a = new Date(data[i].tanggal_awal);
	                        var tgl_awal = tgl_a.getDate()+"/"+tgl_a.getMonth()+1+"/"+tgl_a.getYear();
	                        var tgl_b = new Date(data[i].tanggal_akhir);
	                        var tgl_ahir = tgl_b.getDate()+"/"+tgl_b.getMonth()+1+"/"+tgl_b.getYear();
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
	                    $('#tbl_agendakegiatan').html(html); 
	                }
	            });
	        }



		});
		</script>


	

	</body>
</html>