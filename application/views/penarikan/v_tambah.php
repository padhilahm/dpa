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
			<div id="content" data-url="<?= base_url('penarikan') ?>">
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
									<form action="<?= base_url('penarikan/proses_tambah') ?>" id="form-tambah" method="POST" enctype="multipart/form-data">
										<div class="form-row">
											<div class="form-group col-md-12">
												<label for="dpa"><strong>Nomor DPA </strong></label>
												<select name="dpa" id="dpa" class="form-control" required>

													<option value="0">Pilih Nomor DPA</option>
													<?php foreach ($all_dpa as $dpa) { ?>
														<option value="<?= $dpa->id_dpa ?>">
															<?= $dpa->nomor_dpa ?>
														</option>
													<?php } ?>
												</select>
											</div>
										</div>

										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="Jumlah"><strong>Jumlah</strong></label>
												<input type="text" name="jumlah" id="jumlah" autocomplete="off" class="form-control" required>
											</div>
											<div class="form-group col-md-6">
												<label for="bulan_dpa"><strong>Bulan</strong></label>
												<select name="bulan" id="bulan" class="form-control" required>
													<option value="">Pilih bulan</option>
													<option value="1">Januari</option>
													<option value="2">Februari</option>
													<option value="3">Maret</option>
													<option value="4">April</option>
													<option value="5">Mei</option>
													<option value="6">Juni</option>
													<option value="7">Juli</option>
													<option value="8">Agustus</option>
													<option value="9">September</option>
													<option value="10">Oktober</option>
													<option value="11">November</option>
													<option value="12">Desember</option>
												</select>
											</div>
										</div>

										<hr>
										<div class="form-group float-right">
											<button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
											<a href="<?= base_url() ?>penarikan" class="btn btn-secondary"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</a>
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
			$('li#penarikan').addClass('active');
		});
	</script>

<script type="text/javascript">

var bayar_rupiah = document.getElementById('jumlah');

bayar_rupiah.addEventListener('keyup', function(e)
{
	bayar_rupiah.value = formatRupiah(this.value, 'Rp. ');
});

bayar_rupiah.addEventListener('keydown', function(event)
{
	limitCharacter(event);
});

function formatRupiah(angka, prefix)
{
	var number_string = angka.replace(/[^,\d]/g, '').toString(),
	split	= number_string.split(','),
	sisa 	= split[0].length % 3,
	rupiah 	= split[0].substr(0, sisa),
	ribuan 	= split[0].substr(sisa).match(/\d{3}/gi);

	if (ribuan) {
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}

	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

function limitCharacter(event)
{
	key = event.which || event.keyCode;
if ( key != 188 // Comma
		 && key != 8 // Backspace
		 && key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
		 && (key < 48 || key > 57) // Non digit
		 // Dan masih banyak lagi seperti tombol del, panah kiri dan kanan, tombol tab, dll
		 ){
	event.preventDefault();
return false;
}
}

function hanyaAngka(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
   if (charCode > 31 && (charCode < 48 || charCode > 57))

	return false;
  return true;
}
</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
	$('#dpa').select2();
});
</script>

</body>

</html>