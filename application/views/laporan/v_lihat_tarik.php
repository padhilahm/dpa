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
            <div id="content" data-url="<?= base_url('laporan/cetak_tarik') ?>">
                <!-- load Topbar -->
                <?php $this->load->view('partials/topbar.php') ?>

                <div class="container-fluid">
                    <div class="clearfix">
                        <div class="float-left">
                            <h1 class="h3 m-0 text-gray-800"><?php echo $title; ?></h1>
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
                    <div class="row">
                        <div class="form-row col-md-12">
                            <form action="<?= base_url('laporan/cetak_tarik') ?>" method="get" accept-charset="utf-8">
                                <div class="form-row ">
                                    <div class="form-group col-md-5">
                                        <select name="organisasi" id="organisasi" class="form-control" required>
                                            <option value="0">Pilih SKPD</option>
                                            <?php foreach ($all_skpd as $skpd) { ?>
                                            <option value="<?= $skpd->id_skpd ?>">
                                                <?= $skpd->nama_skpd ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-5">
                                        <select name="tahun" id="tah" class="form-control" required>
                                            <option value="">Pilih tahun</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="submit" class="btn btn-primary" value="Cetak">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('partials/footer.php') ?>
        </div>
    </div>
    <?php $this->load->view('partials/js.php') ?>
    <script>
    $(document).ready(function() {
        $('li#laporan').addClass('active');
        $('#menu_lap').addClass('show');
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#organisasi').select2();
    });
    </script>
    <script src="<?= base_url('landing/sb-admin/js/demo/datatables-demo.js') ?>"></script>
    <script src="<?= base_url('landing/sb-admin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('landing/sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>