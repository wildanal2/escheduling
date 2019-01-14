<?php $this->load->view('header_footer/header_home'); 
?> 


<div class="container-fluid" style="width: 100%">
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<div class="boddy" style="padding-bottom: 50px;">
			<h4 class="namatitel">AGENDA KEGIATAN MINGGU INI</h4>
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

	</div>
	<div class="col-xs-5 col-sm-4 col-md-4 col-lg-4">
		<div class="boddy">
			<h4 class="namatitel">KALENDER KEGIATAN BULAN INI</h4>
			<div class="card">
		        <h5 style="text-align: center;" id="thismonth"></h5>
		        <table class="table table-bordered table-responsive-sm" id="calendar">
		            <thead>
		            <tr>
		                <th>Minggu</th>
			            <th>Senin</th>
			            <th>Selasa</th>
			            <th>Rabu</th>
			            <th>Kamis</th>
			            <th>Jumat</th>
			            <th>Sabtu</th>
		            </tr>
		            </thead>
		            <tbody id="calendarbody">

		            </tbody>
		        </table>
		     </div>
	     </div>

	    <div class="boddymid">
	    	<h4 class="namatitel">AGENDA BUPATI BULAN INI</h4>
		     <table>
				<tr style="background-color: #E8E8E8">
				   <th style="width: 10%;">No</th>
				   <th style="text-align: center; width: 90%;">Kegiatan</th>
				</tr>
				<tbody id="tbl_agendabupati">		
				</tbody> 
			</table>	
	    </div>
	     
	    <div class="boddymid">
	    	<h4 class="namatitel">AGENDA KOMINFO BULAN INI</h4>
		     <table>
				<tr style="background-color: #E8E8E8">
				   <th style="width: 10%;">No</th>
				   <th style="text-align: center; width: 90%;">Kegiatan</th>
				</tr>
				<tbody id="tbl_agendakominfo">		
				</tbody> 
			</table>	
	    </div>
	     
	</div>
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 boddy">
		<h4 class="namatitel">PENGUMUMAN</h4>
		<div class="card text-black bg-default mb-2" id="update">
							
		  	<div class="card-body">
			    <h4 class=" card-title" nama="judul" style="text-align: center;" id="judul" ><b>Judul </b></h4>
			    <br>
			    <!-- <p class="card-text" nama="pengumuman" id="pengumuman">Pengumuman </p> -->
			
			    <textarea  class="form-control" rows="7" readonly="" name="pengumuman" id="pengumuman"> Pengumuman</textarea>
			    <br>
			    <div class="row align-items-center" >
			    	<div class="col-md-9">
				    	<!-- <a class=" btn btn-info" data-toggle="modal" href="#modal_lihat">Lihat</a> -->
				    </div>
				    <div class="col-md-3" >
				    	<small class="text-muted"name="tanggal" id="tanggal">Tanggal</small>
			  		</div>
			  	</div>
		  	</div><br>
		</div>

	</div>

	<div class="col-xs-3 col-sm-3 boddymid">
		<h4 class="namatitel">GALERY</h4>
	     				 
		<div class="">
				<div id="gal_home">	
				    <!-- container img gallery -->
				</div>

				  <a class="prev" id="prev">❮</a>
				  <a class="next" id="next">❯</a>

			<div class="caption-container"> <p id="caption"></p>  </div>

				<div class="row" style="margin-left: 2px">

					<div id="column_imggallery">
					    <!-- container rowsColls img -->
				    </div> 
				</div>

		</div>

	</div> 

</div>


<!-- Modal LIHAT -->
		<div class="modal fade" id="modal_lihat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title align-items-center" style="text-align: center; font-size:30px; font-weight: bold;" id="judul_m"></h5>
		      </div>
		      <div class="modal-body">
		        <div class="form-group">
		        	<div class="col-md-10"></div>
		        	<div class="col-md-2">
				  		<small style="text-align: right;" id="tanggal_m"></small>
				  	</div>

				  	<textarea class="form-control" id="pengumuman_m" rows="7" readonly=""></textarea>
				</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">&nbsp OK &nbsp</button>
		      </div>
		    </div>
		  </div>
		</div>

<?php $this->load->view('header_footer/footer_home'); ?>