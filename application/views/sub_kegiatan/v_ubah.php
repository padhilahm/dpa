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
			<div id="content" data-url="<?= base_url('sub_kegiatan') ?>">
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
										<form action="<?= base_url('sub_kegiatan/proses_ubah/' . $sub_kegiatan->id_sub_kegiatan) ?>" id="form-tambah" method="POST">
											<div class="form-row">
												
												<div class="form-group col-md-12">
													<label for="nama"><strong>Nama Sub kegiatan</strong></label>
													<input type="text" name="nama" placeholder="Masukkan nama sub kegiatan. . ." autocomplete="off"  class="form-control" required value="<?= $sub_kegiatan->sub_kegiatan ?>">
												</div>
											</div>
											
											<hr>
											<div class="form-group float-right">
												<button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
												<a href="<?= base_url() ?>sub_kegiatan" class="btn btn-secondary"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</a>
												
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