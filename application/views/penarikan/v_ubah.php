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
                                    <form action="<?= base_url('penarikan/proses_ubah/' . $penarikan->id_penarikan) ?>" id="form-ubah" method="POST" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="dpa"><strong>Nomor DPA </strong></label>
                                                <select name="dpa" id="dpa" class="form-control" required>
                                                    <?php foreach ($all_dpa as $dpa) { ?>
                                                        <option <?php if ($penarikan->id_dpa == $dpa->id_dpa) {
                                                                    echo "selected";
                                                                } ?> value="<?= $dpa->id_dpa ?>">
                                                            <?= $dpa->nomor_dpa ?>
                                                        </option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="Jumlah"><strong>Jumlah</strong></label>
                                                <input type="number" value="<?= $penarikan->jumlah_penarikan ?>" name="jumlah" id="jumlah" autocomplete="off" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="bulan_dpa"><strong>Bulan</strong></label>
                                                <select name="bulan" id="bulan" class="form-control" required>
                                                    <?php
                                                    $bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                                    for ($a = 1; $a <= 12; $a++) {
                                                        if ($a == $penarikan->bulan_penarikan) {
                                                            $pilih = "selected";
                                                        } else {
                                                            $pilih = "";
                                                        }
                                                        echo ("<option value=\"$a\" $pilih>$bulan[$a]</option>" . "\n");
                                                    }
                                                    ?>
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
            $('li#tarik').addClass('active');
        });
    </script>



</body>

</html>