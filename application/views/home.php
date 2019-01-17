<?php $this->load->view('header_footer/header_home'); 
?> 


<div class="container-fluid" style="width: 100%;  ">
	<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
		<div class="boddy" >
			<h4 class="namatitel">KALENDER KEGIATAN BULAN INI</h4>
			<div class="card">
		        <h5 style="text-align: center;" id="thismonth"></h5>
		        <table class="table table-bordered table-responsive-sm" id="calendar">
		            <thead>
		            <tr>
		                <th>Ming</th>
			            <th>Sen</th>
			            <th>Sel</th>
			            <th>Rab</th>
			            <th>Kam</th>
			            <th>Jum</th>
			            <th>Sab</th>
		            </tr>
		            </thead>
		            <tbody id="calendarbody">

		            </tbody>
		        </table>
		     </div>
	    </div>
	    
		<div class="boddymid" style="padding-bottom: 10px;">
			<h4 class="namatitel">AGENDA KEGIATAN MINGGU INI</h4>
			<table>
			  <tr style="background-color: #E8E8E8">
			    <th style="width: 10%;">No</th>
			    <th style="text-align: center; width: 70%;">Kegiatan</th>
			    <th style="text-align: right; width: 20%">Tanggal</th>
			  </tr>
				
				<tbody id="tbl_agendakegiatan">
					
				</tbody> 
			</table>
		</div>	

		
		

	</div>
	<div class="col-xs-5 col-sm-4 col-md-4 col-lg-4" style="margin-left: -20px">
		
		<div class="boddy">
	    	<h4 class="namatitel">AGENDA BUPATI BULAN INI</h4>
		     <table id="tbl_bupati">
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
	     
	    <div class="boddymid">
	    	<h4 class="namatitel">AGENDA KOMINFO BULAN INI</h4>
		     <table id="tbl_kominfo">
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
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 boddy" >
		<h4 class="namatitel">PENGUMUMAN</h4>
		
		<div id="con_lstpgumuman">	
		</div>

		<div class="card-body" id="card_pengumuman" style="display: none;">
			<div class="row" style="margin-bottom: -10px;">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<a id="back" class="prevv" >❮</a>		
				</div>
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
					<center><b><font id="judul" size="4"></font></b></center>
				</div>
			</div>
		    
		    <hr> 
		    <textarea  class="form-control" rows="7" readonly="" id="pengumuman"></textarea>
		   
		    <div class="row align-items-center" >
		    	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

			    </div>
			    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" >
			    	<small class="text-muted" id="tanggal" style="text-align: right;"></small>
		  		</div>
		  	</div>
  		</div>

	</div> 

		<!-- <div class="card text-black bg-default mb-2" id="update">
		</div> -->
		
		

	<div class="col-xs-3 col-sm-3 boddymid">
		<h4 class="namatitel">GALERY</h4>
	     				 
		<div class="">
				<div id="gal_home">	
				    <!-- container img gallery -->
				</div>

				  <a class="prev" id="prev">❮</a>
				  <a class="next" id="next">❯</a>

				<div class="caption-container"> <p id="caption"></p>  </div>

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

<?php $this->load->view('header_footer/footer_home'); ?>