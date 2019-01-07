<?php $this->load->view('header_footer/header_home'); 
?>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<a class="navbar-brand" href="#">E-Scheduling</a>
	</div>
</nav>
 











<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
	<div class="container">
		<ul class="navbar-nav navbar-left" style="margin-right: 10px">
					
			<?php
				date_default_timezone_set("Asia/Jakarta");
				echo "Time " . date("h:i:s");
			?>

		</ul>
	</div>
</nav>

<?php $this->load->view('header_footer/footer_home'); ?>