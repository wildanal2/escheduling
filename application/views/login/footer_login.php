
		
	 

		<!-- Bootstrap core & jQuery JavaScript
		================================================== -->
		<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

		<!-- Plugins -->
		<script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>

		
		<script type="text/javascript">
		
		// fungsi timeer timestampts
		function startTimer(duration, display) {
		    var timer = duration, minutes, seconds;
		    timee = setInterval(function () {
		        minutes = parseInt(timer / 60, 10)
		        seconds = parseInt(timer % 60, 10);

		        minutes = minutes < 10 ? "0" + minutes : minutes;
		        seconds = seconds < 10 ? "0" + seconds : seconds;

		        display.text(minutes + ":" + seconds);

		        // jika timer sudah selesai
		        if (--timer < 0) { 
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

			// fungsi pengecekan jika pengguna memiliki upaya percobaan login
			function cekattempts(){
				$.ajax({
	            	async : false,
	                type : "ajax",
	                url   : '<?php echo base_url();?>index.php/Login/cekattempt',
	                dataType : "JSON", 
	                success: function(response){
	                	
	                	// jika percobaan login lebih dari 5 kali akan mendapatkan penalty
						if (response.jumlah>5) {
							$('#message').html("Terlalu banyak upaya login");
							$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show(); 

							var secondd = response.penalty;
						    display = $('#btn_login');
						    // memulai times login attmets
						    startTimer(secondd, display); 
							document.getElementById("btn_login").disabled = true;
	                	}

	                }
	            });
			}
 			
 			// fungsi button submit / login
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
	                	
	                	// jika terdapat error / user pass salah
						if(response.error){

							if (response.jumlah>5) {
								// jika upaya login salah lebih dari 5 kali
								$('#message').html(response.message + "\n terlalu banyak upaya login"+ ", upaya login "+response.jumlah+"X  (lebih 5 kali upaya login, anda akan terkena Penalty)");

								var secondd = response.penalty;
							    display = $('#btn_login');
							    startTimer(secondd, display); 
								document.getElementById("btn_login").disabled = true;
								
		                	}else if (response.jumlah>2 && response.jumlah<6){
		                		// jika upaya login salah lebih 3 kali akan diberi peringatan
		                		$('#message').html(response.message + ", upaya login "+response.jumlah+"X  (lebih 5 kali upaya login, anda akan terkena Penalty)");
		                	}else{
		                		// jika username password salan tanpa ada kecurigaan login salah
		                		$('#message').html(response.message);
		                	} 
		                	//  menampilkan pesan errorr
							$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show(); 

						}
						else{
							// menampilkan informasi silahkan menuggu
							$('#message').html(response.message);
							$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
							$('#uname').val("");
							$('#paswd').val("");

							// menampilkan loding button dan mendisable button
							document.getElementById("loadbtn").style.display="inline-block";
							document.getElementById("btn_login").disabled = true;
							
							// jika sukses login akan diarahkan ke dasboard admin dengan jeda waktu 2detik
							if (response.level == 1) {
								setTimeout(' window.location.href = "<?php echo site_url('Admin'); ?>" ',2000);
							}

						}

	                }
	            }); 
	            return false;
	        });
	       



		});
		</script>


	

	</body>
</html>