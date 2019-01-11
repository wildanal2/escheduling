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
							<label for="#">Tanggal </label>
							<div class="input-daterange input-group" data-provide="datepicker" id="datepicker">
							    <input type="text" class="input-sm form-control" name="start" />
							    <span class="input-group-addon"> &nbsp to &nbsp  </span>
							    <input type="text" class="input-sm form-control" name="end" />
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