<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="icon" type="image/png" href="<?= base_url('landing/sb-admin') ?>/assets/logo_prov.png'; ?>" />
    <link href="<?= base_url('landing/sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    page[size='A4'] {
        background: white;
        width: 21cm;
        height: 29.7cm;
        display: block;
        margin: 0 auto;
        padding-left: 25px;
        padding-right: 25px;
        padding-top: 25px;
        margin-bottom: 0.5cm;
        border: 1px solid #dadada
    }
    </style>
</head>

<body>
    <page size='A4'>
        <div class="container-fluid">
            <?php foreach ($dpa_sub as $sub) : ?>
            <div class="row">
                <table class="table table-bordered">
                    <tr>
                        <th><strong>DOKUMEN PELAKSANAAN ANGGARAN SATUAN KERJA PERANGKAT DAERAH</strong></th>
                        <th style="vertical-align: middle; text-align: center;" rowspan="2">Formulir DPA-RINCIAN
                            PENARIKAN DANA SKPD </th>
                    </tr>
                    <tr>
                        <td> Pemerintah Provinsi Kalimantan Selatan Tahun Anggaran <?php echo $tahun; ?></td>
                    </tr>
                </table>
            </div>

            <hr>
            <div class="col text-center">
                <h3 class="h3 text-dark">Rencana Penarikan Dana Perbulan</h3>
            </div>

            <table class="table table-bordered">
                <tr>
                    <th>Bulan</th>
                    <th>Jumlah</th>
                </tr>
                <tr>
                    <td><?php echo bulan($sub->bulan_penarikan); ?></td>
                    <td><?php echo rupiah($sub->jumlah_penarikan); ?></td>
                </tr>
            </table>
            <hr>
            <div class="row">
                <label for="colFormLabelSm" class="col-sm-7 col-form-label col-form-label-sm"></label>
                <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">
                    <?php
                        $tanggal = date('Y-m-d');
                        $tgl_indo = tgl_indo($tanggal);
                        echo "Banjarmasin, tanggal " . $tgl_indo; ?><br><?php
                                                                        echo $sub->jabatan_pimpinan; ?>
                </label>
                <br><br><br><br><br>
                <label for="colFormLabelSm" class="col-sm-7 col-form-label col-form-label-sm"></label>
                <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">
                    <?php
                        echo $sub->nama_pimpinan; ?><br><?php
                                                        echo "NIP. " . $sub->nip_pimpinan; ?>
                </label>
            </div>
            <?php endforeach ?>
        </div>
    </page>
</body>

</html>