<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<!-- Begin page content -->
	<main role="main">
		<section class=" text-center">
			<div class="container">
				<h1 class="jumbotron-heading"><?php echo $page_title ?></h1>
				
				<p>
					<?php echo anchor('Pengumuman/create', 'Tambah Pengumuman', array('class' => 'btn btn-primary')); ?>
				</p>
			</div>
		</section>

		<div class="container-fluid row">
			
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="border: 2px">
				<div style="background-color: #FFF; padding: 15px">

					
						<!-- Kita format tampilan blog dalam bentuk card -->
						<!-- https://getbootstrap.com/docs/4.0/components/card/ -->
						<div class="card text-black bg-default mb-2" id="update">
							<div class="card-header" name="tanggal" id="tanggal">Tanggal</div>
						  <div class="card-body">
						    <h4 class=" card-title" nama="judul" id="judul" ><b>Judul </b></h4>
						    <br>
						    <!-- <p class="card-text" nama="pengumuman" id="pengumuman">Pengumuman </p> -->
						
						    <textarea  class="form-control" rows="7" readonly="" name="pengumuman" id="pengumuman"> Pengumuman</textarea>
						    <br>
						    <a class="btn btn-info" data-toggle="modal" href="#modal_lihat">Lihat</a>
						  </div>
						</div>
					
				</div>
			</div>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" style="border: 2px;">
				<div style="background-color: #FFF; padding: 15px;">
					<div class="panel panel-default">
				      <div class="panel-heading card-header"><h3><b> Pengumuman </b></h3></div>
				      <div class="card-body">
				        
				        <table class="table table-striped" id="mydata">
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
	              <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
	            </div>
	          </div>
	        </div>
	      </div>
	    </form>
	  <!--END MODAL DELETE-->
					
		<!-- Modal LIHAT -->
		<div class="modal fade" id="modal_lihat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="judul_m"></b></h5>
		      </div>
		      <div class="modal-body">
		        <div class="form-group">
				  	<label for="exampleFormControlTextarea3" id="tanggal_m"></label>
				  	<textarea class="form-control" id="pengumuman_m" rows="7" readonly=""></textarea>
				</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">&nbsp OK &nbsp</button>
		      </div>
		    </div>
		  </div>
		</div>		




	</main>


