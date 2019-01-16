
		
	 

		<!-- Bootstrap core & jQuery JavaScript
		================================================== -->
		<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

		<!-- Plugins -->
		<script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>

		
		<script type="text/javascript">

		$(document).ready(function(){

			$('#btn_login').on('click',function(){
	            var username = $('#uname').val();
	            var password = $('#paswd').val();
	            $.ajax({
	                type : "POST",
	                url  : "<?php echo site_url('Login/login') ?>",
	                dataType : "JSON",
	                data : {username:username,password:password},
	                success: function(response){
	                	$('#message').html(response.message);

						if(response.error){
							$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
						}
						else{
							$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
							$('#uname').val("");
							$('#paswd').val("");
							if (response.level == 1) {
								setTimeout(' window.location.href = "<?php echo site_url('Admin/home'); ?>" ',2000);
								
							}

						}
	                }
	            });
	            $(document).on('click', '#clearMsg', function(){
					$('#responseDiv').hide();
				});
	            return false;
	        });
	       



		});
		</script>


	

	</body>
</html>