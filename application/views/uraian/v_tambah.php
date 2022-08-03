<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">
	<div id="wrapper">
		<?php $this->load->view('partials/sidebar.php') ?>
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('uraian') ?>">
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
								<form action="<?= base_url('uraian/proses_tambah') ?>" id="form-tambah" method="POST">
									<div class="form-row">
										
										<div class="form-group col-md-6">
											<label for="kode_rekening"><strong>Kode Rekening</strong></label>
											<input type="text" name="kode_rekening" placeholder="Masukkan nama uraian. . ." autocomplete="off"  class="form-control" required>
										</div>
										<div class="form-group col-md-6">
											<label for="uraian"><strong>Uraian</strong></label>
											<input type="text" name="uraian" placeholder="Masukkan nama uraian. . ." autocomplete="off"  class="form-control" required>
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