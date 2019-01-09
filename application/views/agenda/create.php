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
					
					<?php    
						$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
					?>
					<?php echo validation_errors(); ?>

					<?php echo form_open( 'Pengumuman/create', array('class' => 'needs-validation', 'novalidate' => '') ); ?>

					<div class="form-group">
						<label for="cat_name">Nama Kegiatan </label>
						<input type="text" class="form-control" name="judul" value="<?php echo set_value('judul') ?>" required>
						<div class="invalid-feedback">isi nama kegiatan dulu</div>
					</div>

					<form name="postform" action="aksi.php" target="_blank" method="post">
						<table align="center" id="tabeledit" width="350">
							<div class="form-group">
								<label for="cat_name">Tanggal Awal </label>
								<input type="text">
								
							</div>
							<div class="form-group">
								<label for="cat_name">Tanggal Akhir </label>
								<input type="text">
								
							</div>
						</table>
					</form>

					<div class="form-group">
						<label>Kegiaan</label>
						<?php echo form_dropdown('id', $level, set_value('id'), 'class="form-control" required' ); ?>
						<div class="invalid-feedback">Pilih dulu</div>
					</div>

					<button id="submitBtn" type="submit" class="btn btn-primary">Post Pengumuman</button>
				</form>
			</div>
		</div>
	</div>
</section>

</main>