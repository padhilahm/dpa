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
            <div class="row">
                <table class="table table-bordered">
                    <tr>
                        <th><strong>DOKUMEN PELAKSANAAN ANGGARAN SATUAN KERJA PERANGKAT DAERAH</strong></th>
                        <th style="vertical-align: middle; text-align: center;" rowspan="2">Formulir DPA-RINCIAN
                            PENARIKAN DANA SKPD </th>
                    </tr>
                </table>
            </div>

            <hr>
            <div class="col text-center">
                <h3 class="h3 text-dark">Laporan Dana Terbesar Pertahun</h3>
            </div>

            <table class="table table-bordered">
                <tr>
                    <th>SKPD</th>
                    <th>Sub Kegiatan</th>
                    <th>Total</th>
                </tr>
                <?php foreach ($dpa_tertinggi as $dana) : ?>
                <tr>

                    <td><?php echo $dana->nama_skpd; ?></td>
                    <td><?php echo $dana->sub_kegiatan; ?></td>
                    <td><?php echo rupiah($dana->total_dana); ?></td>
                </tr>
                <?php endforeach ?>
            </table>
            <hr>

        </div>
    </page>
</body>

</html>