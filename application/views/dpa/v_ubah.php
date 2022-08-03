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
									<form action="<?= base_url('dpa/proses_ubah') ?>/<?=  $dpa->id_dpa ?>" id="form-tambah" method="POST" enctype="multipart/form-data">
									<div class="form-row">
										<div class="form-group col-md-9">
													<label for="nomor_dpa"><strong>Nomor DPA</strong></label>
													<input type="text" name="nomor_dpa" id="nomor_dpa" value="<?=  $dpa->nomor_dpa ?>" placeholder="Masukkan id DPA" autocomplete="off"  class="form-control" required>
										</div>
										<div class="form-group col-md-3">
											<label for="tahun_dpa"><strong>Tahun Pelaksanaan</strong></label>
												<select name="tahun" id="tahun" class="form-control" required>
													<?php foreach ($all_dpa as $kat) {?>
														<option <?php if ($dpa->tahun == $kat->tahun){echo "selected";} ?> value="<?= $kat->tahun ?>">
															<?= $kat->tahun ?>
														</option>

													<?php } ?>
												</select>
										</div>
									</div>
										<div class="form-row">
											
											<div class="form-group col-md-12">
												<label for="urusan"><strong>Urusan Pemerintahan</strong></label>
												<input type="text" name="urusan" id="urusan" value="<?=  $dpa->urusan_pemerintahan ?>" placeholder="Masukkan Urusan Pemerintahan. . ." autocomplete="off"  class="form-control" required >
											</div>

											<div class="form-group col-md-12">
												<label for="bidang"><strong>Bidang Urusan</strong></label>
												<input type="text" name="bidang" id="bidang" value="<?=  $dpa->bidang_urusan ?>" placeholder="Masukkan Bidang Urusan. . ." autocomplete="off"  class="form-control" required >
											</div>

											<div class="form-group col-md-12">
												<label for="kegiatan"><strong>Kegiatan</strong></label>
												<input type="text" name="kegiatan" id="kegiatan" value="<?=  $dpa->kegiatan ?>" placeholder="Masukkan Kegiatan. . ." autocomplete="off"  class="form-control" required >
											</div>

											


										</div>

										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="organisasi"><strong>Organisasi</strong></label>
								
												<select name="organisasi" id="organisasi" class="form-control" required>
													<?php foreach ($all_skpd as $skpd) { ?>
														<option <?php if ($dpa->organisasi == $skpd->id_skpd) {
																	echo "selected";
																} ?> value="<?= $skpd->id_skpd ?>">
															<?= $skpd->nama_skpd ?>
														</option>

													<?php } ?>
												</select>


											</div>

											<div class="form-group col-md-6">
												<label for="unit"><strong>Unit</strong></label>
												<input type="text" name="unit" id="unit" value="<?=  $dpa->unit ?>" placeholder="Masukkan unit. . ." autocomplete="off"  class="form-control" required >
											</div>
										
										</div>
											
										<div class="form-row">
											<div class="form-group col-md-4">
												<label for="pimpinan"><strong>NIP Pimpinan</strong></label>
												<input type="text" name="nip" id="nip" value="<?=  $dpa->nip_pimpinan ?>" placeholder="Masukkan NIP . . ." autocomplete="off"  class="form-control" required >
											</div>

											<div class="form-group col-md-4">
												<label for="pimpinan"><strong>Nama Pimpinan</strong></label>
												<input type="text" name="pimpinan" id="pimpinan" value="<?=  $dpa->nama_pimpinan ?>" placeholder="Masukkan pimpinan. . ." autocomplete="off"  class="form-control" required >
											</div>

											<div class="form-group col-md-4">
												<label for="jabatan"><strong>Jabatan</strong></label>
												<input type="text" name="jabatan" id="jabatan" value="<?=  $dpa->jabatan_pimpinan ?>" placeholder="Masukkan jabatan. . ." autocomplete="off"  class="form-control" required >
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#organisasi').select2();
});
</script>

</body>
</html>