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
					<?php if ($this->session->flashdata('success')) : ?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('success') ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php elseif ($this->session->flashdata('error')) : ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('error') ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif ?>
					<div class="card shadow">
						<div class="card-header"><strong>Dokumen Pelaksanaan Anggaran</strong>
							<div class="float-right">
								<a href="<?= base_url('dpa/tambah_sub') ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" width="100%" cellspacing="0" id="datatables">
									<thead>
										<tr>
											<td>No</td>
											<td>Organisasi</td>
											<td>No. DPA</td>
											<td>Waktu Pelaksanaan</td>
											<td>Sumber Dana</td>
											<td>Lokasi</td>
											<?php //if ($this->session->login['role'] == 'admin'): 
											?>
											<td>Aksi</td>
											<?php //endif 
											?>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($all_sub_dpa as $dpa) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $dpa->nama_skpd ?></td>
												<td><?= $dpa->nomor_dpa ?></td>
												<td><?= $dpa->waktu_pelaksanaan ?></td>
												<td><?= $dpa->sumber_dana ?></td>
												<td><?= $dpa->lokasi_dpa_sub ?></td>
												<td>
													<a href="<?= base_url('dpa/sub_ubah/' . $dpa->id_dpa_sub) ?>" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>
													<a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('dpa/sub_hapus/' . $dpa->id_dpa_sub) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
												</td>

												<?php //endif 
												?>
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

	<script>
		$(document).ready(function() {
			$('li#master_dpa').addClass('active');
			$('#menu_dpa').addClass('show');
		});
	</script>

	<script src="<?= base_url('sb-admin/js/demo/datatables-demo.js') ?>"></script>
	<script>
		$(document).ready(function() {
			$('#datatables').DataTable({
				dom: 'Bfrtip',
				buttons: [
					'excel'
				]
			});
		});
	</script>
</body>
</html>