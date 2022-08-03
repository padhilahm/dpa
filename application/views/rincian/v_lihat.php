<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">
	<div id="wrapper">
		<?php $this->load->view('partials/sidebar.php') ?>

		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('rincian') ?>">
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
						<?php elseif($this->session->flashdata('error')) : ?>
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
									<a href="<?= base_url('rincian/tambah') ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered" width="100%" cellspacing="0" id="datatables">
										<thead>
											<tr>
												<td>No</td>
												<td>Sub Kegiatan</td>
												<td>Uraian</td>
												<td>Koefisien</td>
												<td>Harga</td>
												<td>Jumlah</td>
												<?php //if ($this->session->login['role'] == 'admin'): ?>
												<td>Aksi</td>
												<?php //endif ?>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($all_rincian as $rincian): ?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $rincian->sub_kegiatan ?></td>
													<td><?= $rincian->uraian ?></td>
													<td><?= $rincian->koefisien ?></td>
													<td><?= rupiah($rincian->harga_rincian); ?></td>
													<td><?php $jumlah=$rincian->harga_rincian*$rincian->koefisien;
													echo rupiah($jumlah);
													 ?></td>
													<td>
														<a href="<?= base_url('rincian/ubah/' . $rincian->id_rincian) ?>" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>
														<a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('rincian/hapus/' . $rincian->id_rincian) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
													</td>

														<?php //endif ?>

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
				$(document).ready(function(){
					$('li#master_dpa').addClass('active');
					$('#menu_dpa').addClass('show');
				});
			</script>
			
			<script src="<?= base_url('sb-admin/js/demo/datatables-demo.js') ?>"></script>
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