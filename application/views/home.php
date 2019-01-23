<?php $this->load->view('header_footer/header_home'); 
?> 


<div class="container-fluid" style="width: 100%; margin-top: -10px; ">
	

	<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-es">
		<div class="boddy" >
			<h4 class="namatitel">KALENDER KEGIATAN BULAN INI</h4>
			<div class="card bs-example">
		        <h4 style="text-align: center;" id="thismonth"></h4>
		        <table class="table" id="calendar">
		            <thead>
		            <tr style="background-color: #E8E8E8">
		                <th>Minggu</th>
			            <th>Senin</th>
			            <th>Selasa</th>
			            <th>Rabu</th>
			            <th>Kamis</th>
			            <th>Jumat</th>
			            <th>Sabtu</th>
		            </tr> 
		            <tbody id="calendarbody">

		            </tbody> 
		        </table>
		        <table class="table table-bordered"  style="margin-top: -10px; margin-bottom: -2px">
		        	<td> <img height="20px" src="<?php echo base_url() ?>assets/image/w_hijau.png">  : Bupati</td> 
		        	<td> <img height="20px" src="<?php echo base_url() ?>assets/image/w_orange.png"> : Kominfo</td> 
		        	<td> <img height="20px" src="<?php echo base_url() ?>assets/image/w_jam-parah.png"> : Bupati dan Kominfo</td>
		        </table>
		     </div>
	    </div>

		<div class="boddymid" style="padding-bottom: 10px;">
			<h4 class="namatitel">AGENDA KEGIATAN MINGGU INI</h4>
			<table class="table table-bordered">
			  <tr style="background-color: #E8E8E8">
			    <th style="text-align: center;width: 10%;">No</th>
			    <th style="text-align: center; width: 70%;">Kegiatan</th>
			    <th style="text-align: right; width: 20%">Tanggal</th>
			  </tr>
				
				<tbody id="tbl_agendakegiatan">
					
				</tbody> 
			</table>
 
			 
		</div>	

	</div>

	<div class="col-xs-5 col-sm-4 col-md-4 col-lg-4 col-es-mid">
		
		<!-- bupati bulan ini -->
		<div class="boddy">
	    	<h4 class="namatitel">AGENDA BUPATI BULAN INI</h4>
		     <table class="table table-bordered" id="tbl_bupati">
				<thead>
					<tr style="background-color: #E8E8E8">
					   <th style="width: 10%;">Tgl</th>
					   <th style="text-align: center; width: 90%;">Kegiatan</th>
					</tr>
				</thead>	
				<tbody id="tbl_agendabupati">		
				</tbody> 
			</table>	
	    </div>
	    
	    <!-- kominfo bulan ini -->
	    <div class="boddymid">
	    	<h4 class="namatitel">AGENDA KOMINFO BULAN INI</h4>
		     <table class="table table-bordered" id="tbl_kominfo">
		     	<thead>
		     		<tr style="background-color: #E8E8E8">
					   <th style="width: 10%;">Tgl</th>
					   <th style="text-align: center; width: 90%;">Kegiatan</th>
					</tr>
		     	</thead>
				<tbody id="tbl_agendakominfo">		
				</tbody> 
			</table>	
	    </div>
	     
	</div>

	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-es boddy" >
		<h4 class="namatitel">PENGUMUMAN</h4>
		<div id="con_lstpgumuman">	
		</div>

		<div class="card-body" id="card_pengumuman" style="display: none;">
			<div class="row" style="margin-bottom: -10px; ">
				<div class="col-sm-1" style="margin-left: 20px;">
					<a id="back" class="prevv" >❮</a>		
				</div>
				<div class="col-sm-9">
					<center><b><font id="judul" size="4"></font></b></center>
				</div>
			</div>
		    
		    <hr> 
		    <textarea  class="form-control" rows="7" readonly="" id="pengumuman"></textarea>
		   
		    <div class="row align-items-center" >
		    	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

			    </div>
			    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
			    	<small class="text-muted" id="tanggal" style="text-align: right;"></small>
		  		</div>
		  	</div>
  		</div>

	</div> 

		<!-- <div class="card text-black bg-default mb-2" id="update">
		</div> -->
		
		

	<div class="col-xs-3 col-sm-3 col-es boddymid">
		<h4 class="namatitel">GALERY</h4>
	     				 
		<div class="">
				<div id="gal_home">	
				    <!-- container img gallery -->
				</div>

				  <a class="prevgal" id="prev">❮</a>
				  <a class="nextgal" id="next">❯</a>

				<div class="caption-container" id="capimg"> <a href="javascript:void(0);" id="caption" class="imgdetail" style="color: white;"></a></div>

				<div class="row" style="margin-left: 2px;margin-right: 2px;">

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


	<!-- The Image Modal -->
	<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">              
	      <div class="modal-body">
	      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <img src="" id="imagepreview" style="width: 100%;" >
	      </div>
	    </div>
	  </div>
	</div>



<?php $this->load->view('header_footer/footer_home'); ?>