
		
	 

		<!-- Bootstrap core & jQuery JavaScript
		================================================== -->
		<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

		<!-- Plugins -->
		<script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>

		
		<script type="text/javascript">
		
		function startTimer(duration, display) {
		    var timer = duration, minutes, seconds;
		    timee = setInterval(function () {
		        minutes = parseInt(timer / 60, 10)
		        seconds = parseInt(timer % 60, 10);

		        minutes = minutes < 10 ? "0" + minutes : minutes;
		        seconds = seconds < 10 ? "0" + seconds : seconds;

		        display.text(minutes + ":" + seconds);

		        if (--timer < 0) {
		            // $('#responseDiv').removeClass('alert-danger').hide();
					$('#uname').val("");
					$('#paswd').val("");
		            document.getElementById("btn_login").disabled = false;
		            display.text("Sign In");
		            clearInterval(timee);
		        }

		    }, 1000);
		}

		$(document).ready(function(){

			cekattempts();
			function cekattempts(){
				$.ajax({
	            	async : false,
	                type : "ajax",
	                url   : '<?php echo base_url();?>index.php/Login/cekattempt',
	                dataType : "JSON", 
	                success: function(response){
	                	
						if (response.jumlah>5) {
							$('#message').html("Terlalu banyak upaya login");
							$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show(); 

							var secondd = response.penalty;
						    display = $('#btn_login');
						    startTimer(secondd, display); 
							document.getElementById("btn_login").disabled = true;
	                	}

	                }
	            });
			}
 
			$('#form_login').submit(function(e){
	            var username = $('#uname').val();
	            var password = $('#paswd').val();

	            $.ajax({
	            	async : false,
	                type : "POST",
	                url   : '<?php echo base_url();?>index.php/Login/ceklogin',
	                dataType : "JSON",
	                data : {username:username,password:password},
	                success: function(response){
	                	
						if(response.error){
							if (response.jumlah>5) {
								$('#message').html(response.message + "\n terlalu banyak upaya login"+ ", upaya login "+response.jumlah+"X  (lebih 5 kali upaya login, anda akan terkena Penalty)");
								var secondd = response.penalty;
							    display = $('#btn_login');
							    startTimer(secondd, display); 
								document.getElementById("btn_login").disabled = true;
		                	}else if (response.jumlah>2 && response.jumlah<6){
		                		$('#message').html(response.message + ", upaya login "+response.jumlah+"X  (lebih 5 kali upaya login, anda akan terkena Penalty)");
		                	}else{
		                		$('#message').html(response.message);
		                	} 
		                	//  menampilkan pesan errorr
							$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show(); 
						}
						else{
							$('#message').html(response.message);

							document.getElementById("loadbtn").style.display="inline-block";
							document.getElementById("btn_login").disabled = true;

							$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
							$('#uname').val("");
							$('#paswd').val("");
							if (response.level == 1) {
								setTimeout(' window.location.href = "<?php echo site_url('Admin'); ?>" ',2000);
							}

						}

	                }
	            });

	   //          $(document).on('click', '#clearMsg',function(){
				// 	$('#responseDiv').hide();
				// });
	            return false;
	        });
	       



		});
		</script>


	

	</body>
</html>