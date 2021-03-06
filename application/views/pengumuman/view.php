<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<!-- Begin page content -->
	<main role="main">
		<section class=" text-center">
			<div class="container">
				<h1 class="jumbotron-heading"><?php echo $page_title ?></h1>
				
				<!--  -->
			</div>
		</section>

		<div class="container-fluid row">
			
			<div class="minipengumuman boddy" style="border: 2px">
				<div style="background-color: #FFF; padding: 15px">

					
						<!-- Kita format tampilan blog dalam bentuk card -->
						<!-- https://getbootstrap.com/docs/4.0/components/card/ -->
						<form id="tampil">
							<input id="id" hidden="" name="id"></input>
						<div class="card text-black bg-default mb-2 boddy" id="update">
							<div class="card-header" name="tanggal" id="tanggal">Tanggal</div>
						  <div class="card-body">
						    <h4 class=" card-title" name="judul" id="judul" ><b>Judul </b></h4>
						    <br>
						    <!-- <p class="card-text" nama="pengumuman" id="pengumuman">Pengumuman </p> -->
						
						    <textarea  class="form-control" rows="7" readonly="" name="pengumuman" id="pengumuman"> Pengumuman</textarea>
						    <br>
						    <a id="btn_perbaharui" style="display: none;" class="btn btn-info card-text pull-right" data-toggle="modal" href="#modal_lihat">Perbarui</a>
						  </div>
						</div>
						</form>
					
				</div>
			</div>
			<div class="pengumumanview" style="border: 2px;">
				<div style="background-color: #FFF; padding: 15px;">
					<div class="panel panel-default card text-black">
				      <div class="panel-heading card-header"><h3><b><center> Pengumuman </center></b></h3></div>
				      <div class="card-body">

				       	<div class="pull-right">
				       		
				       		<a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Tambah Pengumuman </a>
				       	</div>

				       	
				        <table class="table table-striped table-responsive-md" id="mydata">
				          <thead>
				            <tr>
				              <th>No</th>
				              <th>Judul</th>
				              <th>Pengumuman</th> 
				              <th>tanggal</th>  

				              <th>update</th> 
				              <th>delete</th> 
				            </tr>
				          </thead>
				          <tbody id="show_data">

				          </tbody>
				        </table>
				      </div>
				    </div>
				</div>
			</div>


		</div>


		<!--MODAL DELETE-->
	    <form>
	      <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	        <div class="modal-dialog" role="document">
	          <div class="modal-content">
	            <div class="modal-header">
	              <h4 class="modal-title">Hapus Pengumuman</h4>
	              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
	            </div>
	            <div class="modal-body">
	              <strong id="namaPengumuman_hapus"> pesan </strong>
	              <center id="isi_pengumuman"> isi pesan </center>
	            </div>
	            <div class="modal-footer">
	              <input type="hidden" name="id_pengumuman_delete" id="id_pengumuman_delete" class="form-control">
	              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
	              <button type="button" type="submit" id="btn_delete" class="btn btn-danger">Yes</button>
	            </div>
	          </div>
	        </div>
	      </div>
	    </form>
	  <!--END MODAL DELETE-->
					
		<!-- Modal UPDATE -->
	<form id="form_update">
		<div class="modal fade" id="modal_lihat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="temp">Judul</h5>

		        	<input type="hidden" id="judul_m">
		      </div>
		      <div class="modal-body">
		        <div class="form-group">
				  	<label for="exampleFormControlTextarea3" id="tanggal_m"></label>
				  	<textarea class="form-control" id="pengumuman_m" rows="7" required=""> Klik Edit data yang dipilih dibagian datatabel</textarea>
				</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">tutup</button>
		        <button type="submit" id="btn_push" class="btn btn-success col-md-3">Perbarui</button>
		      </div>
		    </div>
		  </div>
		</div>	
	</form>	

	<!--MODAL Baru-->
    
    <form id="formbaru">
    
      <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pengumuman Baru</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
            </div>
            <div class="modal-body">			              
               
               	<div class="form-group col-lg-12">
					<label>Judul</label>
					<input type="text" id="jdl" class="form-control" minlength="10" placeholder="Masukkan Nama Pengumuman"required="" >
					<div class="invalid-feedback">Isi Judul dulu</div>
				</div>

				<div class="form-group col-lg-12">
					<label>Pengumuman</label>
					<textarea type="text" id="isi" class="form-control" rows=4 cols=50 placeholder="Masukkan Pengumuman" name="isi" required="" oninvalid="this.setCustomValidity('Masukkan isi pengumuman')"></textarea>
				</div>
				
            </div>
            <div class="modal-footer">
            	<button type="button" class="btn btn-secondary col-md-3" data-dismiss="modal">Batal</button>
				<button type="submit" id="btn_push" class="btn btn-primary col-md-3">Tambah</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  <!--END MODAL baru-->

	</main>


