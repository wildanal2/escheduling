<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<!-- Begin page content -->
	<main >
		<section class=" text-center">
			<div class="container">
				<!-- <h1 class="jumbotron-heading"><?php echo $page_title ?></h1> -->
				<br>
				<H2>
					GALLERY
				</H2>
				<hr>
			</div>
		</section>

		<div class="container-fluid row">
			
			<div class="minigallery" style="border: 2px">
				<div style="background-color: #FFF; padding: 15px">
					<div class="boddy card">
						<H5 class="card-header" id="titel_sec">Tambahkan Data Foto</H5>
						<div class="card-body">
							<form class="form-horizontal" id="addgallery">
								<div class="form-group">
									<label style="text-align: left;">Nama Foto </label>
									<input type="text" class="form-control" name="nama" placeholder="Nama Foto" minlength="6" required>
									<div class="invalid-feedback">isi Nama Foto</div>
								</div>
								<div class="form-group">
									<label style="text-align: left;">Tag</label>
									<input type="text" class="form-control" name="tag" placeholder="Tag" minlength="3" required>
									<div class="invalid-feedback">isi Nama Tag</div>
								</div>
								<div class="form-group">
									<label style="text-align: left;">File Foto</label>
									<input type="file" class="form-control" name="file" id="file">
									<div class="invalid-feedback">isi file foto</div>
								</div>
								<input type="hidden" name="id_foto" id="id_foto" class="form-control">
								<input type="hidden" name="fotolama" id="fotolama" class="form-control">
								<input type="hidden" name="status" id="status" value="Insert" class="form-control">
								<div class="row" style="margin-left: 20px">
									<button type="reset" id="batal" class="btn btn-default col-md-3" style="margin-right: 20px;display: none;">Batal</button>
									<button type="submit" id="btn_save" class="btn btn-primary col-md-3">Simpan</button>
								</div> 
							</form>
						</div>
					</div>
					<br>
				</div>
			</div>
			<div class="galleryview" style="border: 2px;">
				<div style="background-color: #FFF; padding: 15px;">
					<div class="boddy card">
				      <div class="card-header"> Daftar Foto</div>
				      <div class="panel-body">
				        <div class="card-title">
				        <table class="table table-striped table-responsive-md" id="mydata">
				          <thead>
				            <tr>
				              <th>No</th>
				              <th>Nama</th>
				              <th>tag</th> 
				              <th>tanggal</th>  
				              <th>foto</th> 
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


		</div>  <!-- end container  -->
		

			<!--MODAL Update-->
			    <form id="formupdate">
			      <div class="modal fade" id="Modal_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			        <div class="modal-dialog" role="document">
			          <div class="modal-content">
			            <div class="modal-header">
			              <h4 class="modal-title">Update Foto</h4>
			              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
			            </div>
			            <div class="modal-body">			              
			              <center><img id="foto_update" style="display: none;"></center>
							<div class="form-group">
								<label style="text-align: left;">Nama Foto </label>
								<input type="text" class="form-control" name="nama_u" placeholder="Nama Foto" minlength="6" required>
								<div class="invalid-feedback">isi Nama Foto</div>
							</div>
							<div class="form-group">
								<label style="text-align: left;">Tag</label>
								<input type="text" class="form-control" name="tag_u" placeholder="Tag" minlength="3" required>
								<div class="invalid-feedback">isi Nama Tag</div>
							</div>
							<div class="form-group">
								<label style="text-align: left;">File Foto Baru</label>
								<input type="file" class="form-control" name="file" id="file">
								<div class="invalid-feedback">isi file foto</div>
							</div>
							<input type="hidden" name="id_foto" id="id_foto" class="form-control">
							<input type="hidden" name="fotolama" id="fotolama" class="form-control"> 
			            </div>
			            <div class="modal-footer">
			            	<button type="button" class="btn btn-secondary col-md-3" data-dismiss="modal">No</button>
							<button type="submit" id="btn_update" class="btn btn-success col-md-3">Update</button>
			            </div>
			          </div>
			        </div>
			      </div>
			    </form>
			  <!--END MODAL Update-->


			  <!--MODAL DELETE-->
			    <form>
			      <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			        <div class="modal-dialog" role="document">
			          <div class="modal-content">
			            <div class="modal-header">
			              <h4 class="modal-title">Hapus Foto</h4>
			              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
			            </div>
			            <div class="modal-body">
			              <strong id="namafoto_hapus"> pesan </strong>
			              <center><img id="foto_delete" height="120" width="180" style="margin-top: 10px"></center>
			            </div>
			            <div class="modal-footer">
			              <input type="hidden" name="id_galery_delete" id="id_galery_delete" class="form-control">
			              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
			              <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
			            </div>
			          </div>
			        </div>
			      </div>
			    </form>
			  <!--END MODAL DELETE-->

	</main>