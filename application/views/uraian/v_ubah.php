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
			<div id="content" data-url="<?= base_url('uraian') ?>">
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
										<form action="<?= base_url('uraian/proses_ubah/' . $uraian->id_uraian) ?>" id="form-tambah" method="POST">
											<div class="form-row">
												
												<div class="form-group col-md-6">
													<label for="kode_uraian"><strong>Kode Rekening</strong></label>
													<input type="text" name="kode_rekening" placeholder="Masukkan kode rekening. . ." autocomplete="off"  class="form-control" required value="<?= $uraian->kode_rekening ?>">
												</div>

												<div class="form-group col-md-6">
													<label for="uraian"><strong>Uraian</strong></label>
													<input type="text" name="uraian" placeholder="Masukkan uraian. . ." autocomplete="off"  class="form-control" required value="<?= $uraian->uraian ?>">
												</div>
											</div>
											
											<hr>
											<div class="form-group float-right">
												<button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
												<a href="<?= base_url() ?>uraian" class="btn btn-secondary"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</a>
												
											</div>
										</form>
									</div>				
								</div>
							</div>
						</div>
					</div>
				</div>
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