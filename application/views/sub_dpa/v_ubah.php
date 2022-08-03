<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">
	<div id="wrapper">
		<!-- load sidebar -->
		<?php $this->load->view('partials/sidebar.php') ?>

		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('dpa') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>

				<div class="container-fluid">
					<div class="clearfix">
						<div class="float-left">
							<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
						</div>

					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<div class="card shadow">

								<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
								<div class="card-body">
									<form action="<?= base_url('dpa/sub_proses_ubah/' . $sub_dpa->id_dpa_sub) ?>" id="form-tambah" method="POST" enctype="multipart/form-data">

										<div class="form-row">
											<div class="form-group col-md-8">
												<label for="dpa"><strong>Nomor DPA </strong></label>
												<select name="id_dpa" id="id_dpa" class="form-control" required>
													<?php foreach ($all_dpa as $kat) { ?>
														<option <?php if ($sub_dpa->id_dpa == $kat->id_dpa) {
																	echo "selected";
																} ?> value="<?= $kat->id_dpa ?>">
															<?= $kat->id_dpa ?>
														</option>

													<?php } ?>
												</select>


											</div>

											<div class="form-group col-md-4">
												<label for="waktu"><strong>Waktu Pelaksanaan</strong></label>
												<input type="text" name="waktu" id="waktu" value="<?= $sub_dpa->waktu_pelaksanaan ?>" class="form-control" required>
											</div>

										</div>
										<div class="form-row">
											<div class="form-group col-md-12">
												<label for="sub_kegiatan"><strong>Sub Kegiatan</strong></label>
								
												<select name="sub_kegiatan" id="sub_kegiatan" class="form-control" required>
													<?php foreach ($all_sub_kegiatan as $sub) { ?>
														<option <?php if ($sub_dpa->id_sub_kegiatan == $sub->id_sub_kegiatan) {
																	echo "selected";
																} ?> value="<?= $sub->id_sub_kegiatan ?>">
															<?= $sub->sub_kegiatan ?>
														</option>

													<?php } ?>
												</select>

											</div>

										</div>
										<div class="form-row">
											<div class="form-group col-md-8">
												<label for="sumber_dana"><strong>Sumber Pendanaan</strong></label>
												<input type="text" name="sumber_dana" value="<?=  $sub_dpa->sumber_dana ?>" id="sumber_dana" placeholder="Masukkan Sumber Pendanaan. . ." autocomplete="off" class="form-control" required>
											</div>

											<div class="form-group col-md-4">
												<label for="lokasi"><strong>Lokasi</strong></label>
												<input type="text" name="lokasi" id="lokasi" placeholder="Masukkan Lokasi. . ." value="<?=  $sub_dpa->lokasi_dpa_sub ?>" autocomplete="off" class="form-control" required>
											</div>
										</div>

										<div class="form-row">
											<div class="form-group col-md-8">
												<label for="indikator"><strong>Indikator</strong></label>
												<input type="text" name="indikator" id="indikator" placeholder="Masukkan Indikator. . ." value="<?=  $sub_dpa->indikator_keluaran ?>" class="form-control" required>
											</div>

											<div class="form-group col-md-4">
												<label for="target"><strong>Target</strong></label>
												<input type="text" name="target" id="target" placeholder="Masukkan Target. . ." value="<?=  $sub_dpa->target_keluaran ?>" autocomplete="off" class="form-control" required>
											</div>
										</div>
										<hr>
										<div class="form-group float-right">
											<button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
											<a href="<?= base_url() ?>dpa/sub_dpa" class="btn btn-secondary"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</a>
										</div>
									</form>
								</div>


							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- load footer -->
			<?php $this->load->view('partials/footer.php') ?>
		</div>
	</div>
	<?php $this->load->view('partials/js.php') ?>
	<script>
		$(document).ready(function() {
			$('li#master_dpa').addClass('active');
			$('#menu_dpa').addClass('show');
		});
	</script>



</body>

</html>