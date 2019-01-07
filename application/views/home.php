<?php $this->load->view('header_footer/header_home'); 
?> 


<div class="container-fluid" style="width: 100%">
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 boddy">
		<h4 class="namatitel">AGENDA KEGIATAN</h4>
		<table>
		  <tr style="background-color: #E8E8E8">
		    <th style="width: 10%;">No</th>
		    <th style="text-align: center; width: 40%;">Kegiatan</th>
		    <th style="text-align: right; width: 40%">Tgl Mulai & Selesai</th>
		  </tr>
			
			<tbody id="tbl_agendakegiatan">
				
			</tbody> 
		</table>
		

	</div>
	<div class="col-xs-5 col-sm-4 col-md-4 col-lg-4 boddy">
		<h4 class="namatitel">KALENDER KEGIATAN</h4>
	</div>
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 boddy">
		<h4 class="namatitel">PENGUMUMAN</h4>
	</div>

</div>

<?php $this->load->view('header_footer/footer_home'); ?>