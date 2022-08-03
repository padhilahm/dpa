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
					<div class="float-right">
						<a href="<?= base_url('uraian/export') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
						<a href="<?= base_url('uraian/tambah') ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
					</div>
				</div>
				<hr>
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
				<div class="card shadow">
					<div class="card-header"><strong>Daftar uraian</strong></div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
								<thead>
									<tr>
										<td width="5%">No</td>
										<td>Kode Rekeing</td>
										<td>Uraian</td>
										<td>Aksi</td>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($all_uraian as $uraian): ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $uraian->kode_rekening ?></td>
											<td><?= $uraian->uraian ?></td>
											
											<td width="20%">
												<a href="<?= base_url('uraian/ubah/' . $uraian->id_uraian) ?>" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>
												<a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('uraian/hapus/' . $uraian->id_uraian) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
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
	<script src="<?= base_url('sb-admin/js/demo/datatables-demo.js') ?>"></script>
	<!-- <script src="<?= base_url('sb-admin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

	 <script>
    $(document).ready(function(){
        $('li#master').addClass('active');
        $('#menu_master').addClass('show');
    });
	</script>

	
		<script>
				$(document).ready(function() {
					$('#datatables').DataTable( {
						dom: 'Bfrtip',
						buttons: [
						'excel'
						]
					} );
				} );
			</script>
</body>
</html>