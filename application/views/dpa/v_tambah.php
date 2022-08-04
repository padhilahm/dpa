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
									<form action="<?= base_url('dpa/proses_tambah') ?>" id="form-tambah" method="POST" enctype="multipart/form-data">
										<div class="form-row">

											<div class="form-group col-md-9">
												<label for="nomor_dpa"><strong>Nomor DPA</strong></label>
												<input type="text" name="nomor_dpa" id="nomor_dpa" placeholder="Masukkan Nomor DPA" autocomplete="off" class="form-control" required onkeyup="myFunction()">
											</div>

											<div class="form-group col-md-3">
												<label for="tahun_dpa"><strong>Tahun Pelaksanaan</strong></label>
												<select name="tahun" id="tahun" class="form-control" required>
													<option value="">
														Pilih tahun
													</option>
													<option value="2020">
														2020
													</option>
													<option value="2021">
														2021
													</option>
													<option value="2022">
														2022
													</option>
													<option value="2023">
														2023
													</option>
												</select>
											</div>

										</div>
										<div class="form-row">

											<div class="form-group col-md-12">
												<label for="urusan"><strong>Urusan Pemerintahan</strong></label>
												<input type="text" name="urusan" id="urusan" placeholder="Masukkan Urusan Pemerintahan. . ." autocomplete="off" class="form-control" required>
											</div>

											<div class="form-group col-md-12">
												<label for="bidang"><strong>Bidang Urusan</strong></label>
												<input type="text" name="bidang" id="bidang" placeholder="Masukkan Bidang Urusan. . ." autocomplete="off" class="form-control" required>
											</div>

											<div class="form-group col-md-12">
												<label for="kegiatan"><strong>Kegiatan</strong></label>
												<input type="text" name="kegiatan" id="kegiatan" placeholder="Masukkan Kegiatan. . ." autocomplete="off" class="form-control" required>
											</div>




										</div>

										<div class="form-row">
											<?php if ($this->session->login['role'] == 'admin') { ?>
												<div class="form-group col-md-6">

													<label for="organisasi"><strong>Organisasi</strong></label>
													<select name="organisasi" id="organisasi" class="form-control" required>
														<option value="0">Pilih SKPDP</option>
														<?php foreach ($all_skpd as $skpd) { ?>
															<option value="<?= $skpd->id_skpd ?>">
																<?= $skpd->nama_skpd ?>
															</option>
														<?php } ?>

													</select>

												</div>
											<?php } ?>

											<?php if ($this->session->login['role'] == 'skpd') { ?>
												<input type="hidden" name="organisasi" id="organisasi" value="<?= $this->session->login['kode'] ?>">
											<?php } ?>


											<div class="form-group col-md-6">
												<label for="unit"><strong>Unit</strong></label>
												<input type="text" name="unit" id="unit" placeholder="Masukkan unit. . ." autocomplete="off" class="form-control" required>
											</div>

										</div>

										<div class="form-row">
											<div class="form-group col-md-4">
												<label for="pimpinan"><strong>NIP Pimpinan</strong></label>
												<input type="text" name="nip" id="nip" placeholder="Masukkan NIP . . ." autocomplete="off" class="form-control" required>
											</div>

											<div class="form-group col-md-4">
												<label for="pimpinan"><strong>Nama Pimpinan</strong></label>
												<input type="text" name="pimpinan" id="pimpinan" placeholder="Masukkan pimpinan. . ." autocomplete="off" class="form-control" required>
											</div>

											<div class="form-group col-md-4">
												<label for="jabatan"><strong>Jabatan</strong></label>
												<input type="text" name="jabatan" id="jabatan" placeholder="Masukkan jabatan. . ." autocomplete="off" class="form-control" required>
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
		$(document).ready(function() {
			$('li#master_dpa').addClass('active');
			$('#menu_dpa').addClass('show');
		});
	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#organisasi').select2();
		});
	</script>

</body>

</html>