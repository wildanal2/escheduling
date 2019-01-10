
		
		<nav class="navbar navbar-default navbar-fixed-bottom footer" style="background: #4f0381" role="navigation">
			<div class="container-fluid" >
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<button type="button" class="btn btn-warning btn-lg disabled" id="time"></button>
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="<?php echo base_url()?>assets/js/jquery-1.9.1.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>


		<!-- Plugins -->
		<script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>

		<!-- Custom -->
		<!-- <script src="<?php echo base_url() ?>assets/js/custom.js"></script>
 -->

 		
        <script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.tanggal').datepicker({
                    format: "dd/mm/yyyy",
				    weekStart: 0,
				    startDate: 0,
				    daysOfWeekDisabled: "0",
				    autoclose: true,
				    todayHighlight: true
                });
            });
        </script>
		
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
			showcalendar();

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
	                        var tgl_awal = tgl_a.getDate()+"/"+tgl_a.getMonth()+1+"/"+tgl_a.getFullYear();
	                        var tgl_b = new Date(data[i].tanggal_akhir);
	                        var tgl_ahir = tgl_b.getDate()+"/"+tgl_b.getMonth()+1+"/"+tgl_b.getFullYear();
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

	        function showcalendar() {
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
			            }
						else if (date > daysInMonth) {
			                break;
			            }
			            else {
			                html+='<td>';
			                html+=''+date;
			                // if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
			                //     cell.classList.add("bg-info");
			                // } // color today's date
			                html+='</td>';
			                date++;
			            }
			        }

					html+='</tr>';	        		
	        	}

	        	$('#calendarbody').html(html); 
	        }



		});
		</script>


	

	</body>
</html>