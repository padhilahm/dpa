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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
                                <div class="card-body">
                                    <form action="<?= base_url('rincian/proses_ubah/' . $rincian->id_rincian) ?>"
                                        id="form-ubah" method="POST" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="sub_dpa"><strong>Sub Kegiatan DPA </strong></label>
                                                <select name="sub" id="sub" class="form-control" required>
                                                    <?php foreach ($all_sub as $sub) { ?>
                                                    <option <?php if ($rincian->id_sub_kegiatan == $sub->id_sub_kegiatan) {
                                                                    echo "selected";
                                                                } ?> value="<?= $sub->id_sub_kegiatan ?>">
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
                                                    <?php foreach ($all_uraian as $uraian) { ?>
                                                    <option <?php if ($rincian->id_uraian == $uraian->id_uraian) {
                                                                    echo "selected";
                                                                } ?> value="<?= $uraian->id_uraian ?>">
                                                        <?= $uraian->uraian ?>
                                                    </option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="koefisien"><strong>Koefisien</strong></label>
                                                <input type="number" value="<?= $rincian->koefisien ?>" name="koefisien"
                                                    id="koefisien" autocomplete="off" class="form-control" required>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="harga"><strong>Harga</strong></label>
                                                <input type="text" value="<?= $rincian->harga_rincian ?>" name="harga"
                                                    id="harga" autocomplete="off" class="form-control" required>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="ppn"><strong>PPN</strong></label>
                                                <input type="text" value="<?= $rincian->ppn ?>" name="ppn" id="ppn"
                                                    autocomplete="off" class="form-control" required>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="satuan"><strong>Satuan </strong></label>

                                                <select name="satuan" id="satuan" class="form-control" required>
                                                    <?php foreach ($all_satuan as $satuan) { ?>
                                                    <option <?php if ($rincian->id_satuan == $satuan->id_satuan) {
                                                                    echo "selected";
                                                                } ?> value="<?= $satuan->id_satuan ?>">
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
</body>

</html>