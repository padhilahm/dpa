<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('partials/head.php') ?>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
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
									<form action="<?= base_url('dpa/sub_proses_tambah') ?>" id="form-tambah" method="POST" enctype="multipart/form-data">

									<div class="form-row">
										<div class="form-group col-md-8">
											<label for="dpa"><strong>Nomor DPA </strong></label>
											<select name="id_dpa" id="id_dpa" class="form-control" required>
										
												<option value="0">Pilih Nomor DPA</option>
												<?php foreach ($all_dpa as $dpa) {?>
													<option value="<?= $dpa->id_dpa ?>">
														<?= $dpa->nomor_dpa ?>
													</option>

												<?php } ?>
											</select>
										</div>

										<div class="form-group col-md-4">
											<label for="waktu"><strong>Waktu Pelaksanaan</strong></label>
											<input type="text" name="waktu" id="waktu" autocomplete="off"  class="form-control" required onkeyup="myFunction()">
										</div>

									</div>
										<div class="form-row">
											<div class="form-group col-md-12">
												<label for="sub_kegiatan"><strong>Sub Kegiatan</strong></label>
												<select name="sub_kegiatan" id="sub_kegiatan" class="form-control" required>
											
													<option value="0">Pilih Sub Kegiatan</option>
													<?php foreach ($all_sub_kegiatan as $sub) {?>
														<option value="<?= $sub->id_sub_kegiatan ?>">
															<?= $sub->sub_kegiatan ?>
														</option>

													<?php } ?>
												</select>
											</div>
											
										</div>
										<div class="form-row">
											<div class="form-group col-md-8">
												<label for="sumber_dana"><strong>Sumber Pendanaan</strong></label>
												<input type="text" name="sumber_dana" id="sumber_dana" placeholder="Masukkan Sumber Pendanaan. . ." autocomplete="off"  class="form-control" required >
											</div>

											<div class="form-group col-md-4">
												<label for="lokasi"><strong>Lokasi</strong></label>
												<input type="text" name="lokasi" id="lokasi" placeholder="Masukkan Lokasi. . ." autocomplete="off"  class="form-control" required >
											</div>
										</div>
										
										<div class="form-row">
											<div class="form-group col-md-8">
												<label for="indikator"><strong>Indikator</strong></label>
												<input type="text" name="indikator" id="indikator" placeholder="Masukkan Indikator. . ." autocomplete="off"  class="form-control" required >
											</div>

											<div class="form-group col-md-4">
												<label for="target"><strong>Target</strong></label>
												<input type="text" name="target" id="target" placeholder="Masukkan Target. . ." autocomplete="off"  class="form-control" required >
											</div>
										</div>
										<hr>
										<div class="form-group float-right">
											<button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
											<a href="<?= base_url() ?>dpa" class="btn btn-secondary"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</a>
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
    $(document).ready(function(){
        $('li#master_dpa').addClass('active');
        $('#menu_dpa').addClass('show');
    });
	</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#sub_kegiatan').select2();
	$('#id_dpa').select2();
});
</script>
</body>
</html>