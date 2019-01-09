<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Begin page content -->
<main role="main" class="container">
	<section class="text-center">
		<div class="container">
			<h1 class="jumbotron-heading">Tulis Pengumuman</h1>
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
						<label for="cat_name">Judul </label>
						<input type="text" class="form-control" name="judul" value="<?php echo set_value('judul') ?>" required>
						<div class="invalid-feedback">Isi judul dulu</div>
					</div>
					<div class="form-group">
						<label for="text">Pengumuman</label>
						<textarea type="text" class="form-control " name="isi" value="<?php echo set_value('isi') ?>" rows="5" required><?php echo set_value('isi') ?></textarea>
						<div class="invalid-feedback">Isi pengumuman dulu</div>
					</div>
					<button id="submitBtn" type="submit" class="btn btn-primary">Post Pengumuman</button>
				</form>
			</div>
		</div>
	</div>
</section>

</main>