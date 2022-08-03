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
                                    <form action="<?= base_url('rincian/proses_tambah') ?>" id="form-tambah"
                                        method="POST" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="sub_dpa"><strong>Sub Kegiatan DPA </strong></label>
                                                <select name="sub" id="sub" class="form-control" required>

                                                    <option value="0">Pilih Sub Kegiatan DPA</option>
                                                    <?php foreach ($all_sub as $sub) { ?>
                                                    <option value="<?= $sub->id_sub_kegiatan ?>">
                                                        <?= $sub->sub_kegiatan ?>
                                                    </option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="uraian"><strong>Uraian </strong></label>
                                                <select name="uraian" id="uraian" class="form-control" required>

                                                    <option value="0">Pilih Uraian</option>
                                                    <?php foreach ($all_uraian as $uraian) { ?>
                                                    <option value="<?= $uraian->id_uraian ?>">
                                                        <?= $uraian->uraian ?>
                                                    </option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="koefisien"><strong>Koefisien</strong></label>
                                                <input type="number" name="koefisien" id="koefisien" autocomplete="off"
                                                    class="form-control" required>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="harga"><strong>Harga</strong></label>
                                                <input type="text" name="harga" id="harga" autocomplete="off"
                                                    class="form-control" required>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="ppn"><strong>PPN</strong></label>
                                                <input type="text" name="ppn" id="ppn" autocomplete="off"
                                                    class="form-control" required>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="satuan"><strong>Satuan </strong></label>
                                                <select name="satuan" id="satuan" class="form-control" required>

                                                    <option value="0">Pilih satuan</option>
                                                    <?php foreach ($all_satuan as $satuan) { ?>
                                                    <option value="<?= $satuan->id_satuan ?>">
                                                        <?= $satuan->satuan ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="form-group float-right">
                                            <button type="submit" class="btn btn-success"><i
                                                    class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                                            <a href="<?= base_url() ?>dpa" class="btn btn-secondary"><i
                                                    class="fa fa-times"></i>&nbsp;&nbsp;Batal</a>
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
    <script type="text/javascript">
    var bayar_rupiah = document.getElementById('harga');

    bayar_rupiah.addEventListener('keyup', function(e) {
        bayar_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    bayar_rupiah.addEventListener('keydown', function(event) {
        limitCharacter(event);
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    function limitCharacter(event) {
        key = event.which || event.keyCode;
        if (key != 188 // Comma
            &&
            key != 8 // Backspace
            &&
            key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
            &&
            (key < 48 || key > 57) // Non digit
            // Dan masih banyak lagi seperti tombol del, panah kiri dan kanan, tombol tab, dll
        ) {
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
        $('#uraian').select2();
        $('#sub').select2();
    });
    </script>
</body>

</html>