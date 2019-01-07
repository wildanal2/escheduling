
		<nav class="navbar navbar-default navbar-fixed-bottom" style="background: #4f0381" height="60px" role="navigation">
			
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="background-color: #ffff00 ">
					<h4 style="color: #ffffff" style="text-align: center;" id="time"></h4>
				</div>
				
				<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
					<marquee direction="" 
					onmouseout="this.start();">

					

					     <div class="text-container">
					   &nbsp; &nbsp; &nbsp;<a data-fancybox-group="gallery" class="fancybox" href="#" style="color: #ffffff"><h5><img src="assets/image/logo.png" height="20px">DINAS KOMUNIKASI DAN INFORMATIKA</h5></a>
					    </div>
						
					
					</marquee>
					</div>
					</div>
				</div>

				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="background-color: #ff1a1a"  >
					<h4 style="color: #ffffff" style="align-items: center;"> 
						<?php
						date_default_timezone_set("Asia/Jakarta");
						echo " " . date("d:M:Y");
						?>
					</h4>
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

		</script>


	

	</body>
</html>