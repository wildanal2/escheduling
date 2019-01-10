<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Begin page content -->
<main role="main" class="container">
	<section class="text-center">
		<div class="container">
			<h1 class="jumbotron-heading">Tambah Agenda</h1>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					
					

					<?php echo form_open( 'Agenda/create' ); ?>

						<div class="form-group col-lg-8">
							<label for="#">Nama Kegiatan </label>
							<input type="text" class="form-control" name="namaKegiatan" value="<?php echo set_value('namaKegiatan') ?>" >
					
						</div>
						<div class="form-group col-lg-4">
							<label for="#">Tanggal Awal </label>
							<div class="input-group date" data-provide="datepicker">
							      <input type="text" class="form-control" nama="tanggal_awal" value="<?php echo set_value('tanggal_awal') ?>" >
							      
							      <div class="input-group-addon">
							          <span class="glyphicon glyphicon-th"></span>
							      </div>
							</div>
						</div>
						<div class="form-group col-lg-4">
							<label for="#">Tanggal Akhir </label>
							<div class="input-group date" data-provide="datepicker">
							      <input type="text" class="form-control" nama="tanggal_akhir" value="<?php echo set_value('tanggal_akhir') ?>" >
							      
							      <div class="input-group-addon">
							          <span class="glyphicon glyphicon-th"></span>
							      </div>
							</div>
						</div>

						<div class="form-group col-lg-4">
							<label>Agenda</label>
							<select class="form-control" nama="level"  value="<?php echo set_value('level') ?>" >
									<option disabled selected> Pilih Agenda</option>
								<?php foreach ($level as $key) { ?>
									<option> <?php  echo $key->nama ?> </option>
								<?php }  ?>
							</select>
						</div>
									
					<button id="submitBtn" type="submit" class="btn btn-primary">Tambah Agenda</button>
				</form>
			</div>
		</div>
	</div>
</section>

</main>