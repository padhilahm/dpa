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
			<div id="content" data-url="<?= base_url('skpd') ?>">
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

								<?php if ($this->session->flashdata('success')) : ?>
									<div class="alert alert-success alert-dismissible fade show" role="alert">
										<?= $this->session->flashdata('success') ?>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<?php elseif($this->session->flashdata('error')) : ?>
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
											<?= $this->session->flashdata('error') ?>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									<?php endif ?>

									<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
									<div class="card-body">
										<form action="<?= base_url('skpd/proses_ubah/' . $skpd->id_skpd) ?>" id="form-tambah" method="POST">
											<div class="form-row">
												
										
												<div class="form-group col-md-6">
											<label for="nama"><strong>Nomor SKPD</strong></label>
											<input type="text" name="nomor_skpd" placeholder="Masukkan Nomor SKPD. . ." autocomplete="off"  value="<?= $skpd->id_skpd ?>" class="form-control" required>
										</div>

										<div class="form-group col-md-6">
											<label for="nama"><strong>Nama SKPD</strong></label>
											<input type="text" name="nama_skpd" placeholder="Masukkan Nama SKPD. . ." autocomplete="off"  value="<?= $skpd->nama_skpd ?>" class="form-control" required>
										</div>

										</div>
									<div class="form-row">
										<div class="form-group col-md-3">
											<label for="no_telpon"><strong>Nomor Telpon</strong></label>
											<input type="text" name="no_telpon" placeholder="Masukkan Nomor Telpon. . ." autocomplete="off"  value="<?= $skpd->no_telpon ?>" class="form-control" required>
										</div>
										
										<div class="form-group col-md-9">
											<label for="alamat"><strong>Alamat</strong></label>
											<textarea class="form-control"  name="alamat_skpd" rows="2"><?= $skpd->alamat_skpd ?></textarea>
										</div>
									</div>
											
											<hr>
											<div class="form-group float-right">
												<button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
												<a href="<?= base_url() ?>skpd" class="btn btn-secondary"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</a>
												
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
        $('li#master').addClass('active');
        $('#menu_master').addClass('show');
    });
	</script>
	
	</body>
	</html>