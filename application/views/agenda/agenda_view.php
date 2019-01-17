<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Begin page content -->
<main role="main">
<br>
<div class="container-fluid row">
			
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="border: 2px">
		<div style="background-color: #FFF; padding: 10px">

			<div class="boddy card">
				<center><h4 class="namatitel card-header">KALENDER KEGIATAN</h4></center>
				<div class="card-body">
					<div class="row card-title">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<button class="btn btn-outline-primary col-md-12" id="previous">Previous</button>	
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<h5 style="text-align: center;" id="thismonth"></h5>
						</div>
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<button class="btn btn-outline-primary col-md-12" id="next">Next</button>	
						</div>
					</div>

					
			     					
			        <table class="table table-bordered table-responsive-sm" id="calendar">
			            <thead>
			            <tr>
			                <th>Mingg</th>
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

		</div>
	</div>
	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="border: 2px;">
		<div style="background-color: #FFF; padding: 15px;">
			<div class="boddy card">
				<center><h4 class="namatitel card-header">AGENDA KEGIATAN</h4></center>
				<div class="card-body">
					<div class="pull-right"><a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Tambah Agenda</a></div>

					<table class="table table-striped table-bordered" style="width:100%" id="agendaall">
						<thead>
							<tr style="background-color: #E8E8E8;">
							   <th style="width: 5%;">No</th>
							   <th style="text-align: center; width: 25%;">Kegiatan</th>
							   <th style="text-align: center; width: 24%;">Keterangan</th>
							   <th style="text-align: center; width: 13%">Tanggal Mulai</th>
							   <th style="text-align: center; width: 13%">Tanggal Selesai</th>
							   <th style="text-align: center; width: 10%">Edit</th>
							   <th style="text-align: center; width: 10%">Hapus</th>
							</tr>
						</thead>
						<tbody id="tbl_agendakegiatan" style="text-align: center;">
							
						</tbody> 
					</table>
				</div>
			</div>	
		</div>
	</div>

</div>  <!-- end container  -->	


			<!--MODAL Baru-->
			    <form id="formbaru">
			      <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			        <div class="modal-dialog" role="document">
			          <div class="modal-content">
			            <div class="modal-header">
			              <h4 class="modal-title">Agenda Baru</h4>
			              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
			            </div>
			            <div class="modal-body">			              
			               
			               	<div class="form-group col-lg-12">
								<label>Nama Kegiatan</label>
								<input type="text" id="namain" class="form-control" placeholder="Masukkan Nama Kegiatan" required="">
							</div>

							<div class="form-group col-lg-12">
								<label>Keterangan</label>
								<textarea type="text" id="ket" class="form-control" rows="4" placeholder="Masukkan Keterangan" required=""> </textarea>
							</div>
			            	
							<div class="form-group col-lg-12">
								<label for="#">Tanggal </label>
								<div class="input-daterange input-group" data-provide="datepicker" id="datepicker">
								    <input type="text" class="form-control" id="mulai" placeholder="Tanggal Mulai" required="" />
								    <span class="input-group-addon"> &nbsp Sampai dengan &nbsp  </span>
								    <input type="text" class="form-control" id="selesai" placeholder="Tanggal Selesai" required="" />
								</div>	
							</div>

							<div class="form-group col-lg-6">
								<label>Agenda</label>
								<select class="form-control" id="level" required="">
										<option disabled selected> Pilih Agenda</option>
									<?php foreach ($level as $key) { ?>
										<option value="<?php  echo $key->id ?>"> <?php  echo $key->nama ?> </option>
									<?php }  ?>
								</select>
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



		<!--MODAL START UPDATEEE UPDATEEE-->
			    <form id="formupdate">
			      <div class="modal fade" id="Modal_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			        <div class="modal-dialog" role="document">
			          <div class="modal-content">
			            <div class="modal-header">
			              <h4 class="modal-title">Perbarui Agenda</h4>
			              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
			            </div>
			            <div class="modal-body">			              
			               
			               	<div class="form-group col-lg-12">
								<label>Nama Kegiatan</label>
								<input type="text" id="namaupdt" name="namaupdt" class="form-control" placeholder="Masukkan Nama Kegiatan" required="">
							</div>

							<div class="form-group col-lg-12">
								<label>Keterangan</label>
								<textarea type="text" id="ketup" name="ketup" class="form-control" rows="4" placeholder="Masukkan Keterangan" required=""> </textarea>
							</div>
			            	
							<div class="form-group col-lg-12">
								<label for="#">Tanggal </label>
								<div class="input-daterange input-group" data-provide="datepicker" id="datepicker">
								    <input type="text" class="form-control" id="mulaiup" name="mulaiup" placeholder="Tanggal Mulai" required="" />
								    <span class="input-group-addon"> &nbsp Sampai dengan &nbsp  </span>
								    <input type="text" class="form-control" id="selesaiup" name="selesaiup" placeholder="Tanggal Selesai" required="" />
								</div>	
							</div>

							<div class="form-group col-lg-6">
								<label>Agenda</label>
								<select class="form-control" name="levelup" id="levelup" required="">
										<option disabled selected> Pilih Agenda</option>
									<?php foreach ($level as $key) { ?>
										<option value="<?php  echo $key->id ?>"> <?php  echo $key->nama ?> </option>
									<?php }  ?>
								</select>
							</div>

			            </div>
			            <div class="modal-footer">
			            	<input type="hidden" id="id_kup" name="id_kup" value="">
			            	<button type="button" class="btn btn-secondary col-md-3" data-dismiss="modal">Batal</button>
							<button type="submit" id="btn_push" class="btn btn-success col-md-3">Perbarui</button>
			            </div>
			          </div>
			        </div>
			      </div>
			    </form>
			  <!--END UPDATEEE UPDATEEE-->



			  <!--MODAL Delete-->
			    <form id="formdelete">
			      <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			        <div class="modal-dialog" role="document">
			          <div class="modal-content">
			            <div class="modal-header">
			              <h4 class="modal-title">Agenda Delete</h4>
			              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
			            </div>
			            <div class="modal-body">			              
			               
			               	<div class="form-group col-lg-12">
								<label>Apa Anda Yakin Ingin Meng<font style="color: red;"><b>Hapus</b></font> Agenda Berikut?</label>
								<br><br>
								<center><H4 id="msg"></H4></center>
								<input type="hidden" name="id_kegiatan" id="id_kegiatan" value="">
							</div>
 
							<br><br><br>
							<center>
			            		<button type="button" class="btn btn-secondary col-md-3" data-dismiss="modal" style="margin-right: 20px">Batal</button>
			            		<button type="submit" id="btn_delete" class="btn btn-danger col-md-3">Hapus</button>	
			            	</center>
			            </div>
			            <div class="modal-footer">

			            </div>
			          </div>
			        </div>
			      </div>
			    </form>
			  <!--END MODAL Delete-->


</main>