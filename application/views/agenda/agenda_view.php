<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Begin page content -->
<main role="main">
<br>
<div class="container-fluid row">
			
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="border: 2px">
		<div style="background-color: #FFF; padding: 15px">

			<div class="boddy">
				<center><h4 class="namatitel">KALENDER KEGIATAN</h4></center>
				<div class="card">
			        <h4 class="card-header" id="namabulan" style="text-align: center;"><?php
								date_default_timezone_set("Asia/Jakarta");
								echo " " . date("F Y");
								?></h4>
			        <table class="table table-bordered table-responsive-sm" id="calendar">
			            <thead>
			            <tr>
			                <th>Sun</th>
			                <th>Mon</th>
			                <th>Tue</th>
			                <th>Wed</th>
			                <th>Thu</th>
			                <th>Fri</th>
			                <th>Sat</th>
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
			<div class="boddy">
				<center><h4 class="namatitel">AGENDA KEGIATAN</h4></center>
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

</div>  <!-- end container  -->	


			<!--MODAL Baru-->
			    <form id="formbaru">
			      <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			        <div class="modal-dialog" role="document">
			          <div class="modal-content">
			            <div class="modal-header">
			              <h4 class="modal-title">Update Foto</h4>
			              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
			            </div>
			            <div class="modal-body">			              
			               
			               	<div class="form-group col-lg-12">
								<label>Nama Kegiatan</label>
								<input type="text" name="" class="form-control" placeholder="Masukkan Keterangan">
							</div>

							<div class="form-group col-lg-12">
								<label>Keterangan</label>
								<textarea type="text" name="" class="form-control" rows="4" placeholder="Masukkan Keterangan"> </textarea>
							</div>
			            	
							<div class="form-group col-lg-12">
								<label for="#">Tanggal </label>
								<div class="input-daterange input-group" data-provide="datepicker" id="datepicker">
								    <input type="text" class="form-control" name="start" placeholder="Tanggal Mulai" />
								    <span class="input-group-addon"> &nbsp Sampai dengan &nbsp  </span>
								    <input type="text" class="form-control" name="end" placeholder="Tanggal Selesai" />
								</div>	
							</div>

							<div class="form-group col-lg-6">
								<label>Agenda</label>
								<select class="form-control" nama="level"  value="<?php echo set_value('level') ?>" >
										<option disabled selected> Pilih Agenda</option>
									<?php foreach ($level as $key) { ?>
										<option> <?php  echo $key->nama ?> </option>
									<?php }  ?>
								</select>
							</div>

			            </div>
			            <div class="modal-footer">
			            	<button type="button" class="btn btn-secondary col-md-3" data-dismiss="modal">No</button>
							<button type="submit" id="btn_update" class="btn btn-success col-md-3">Update</button>
			            </div>
			          </div>
			        </div>
			      </div>
			    </form>
			  <!--END MODAL baru-->


</main>