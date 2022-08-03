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

            <div class="col text-center">
                <h4 class="h4 text-dark">Laporan SKPD yang Terdaftar Pertahun <?= $tahun; ?></h4>
            </div>
            <hr>
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>SKPD</th>
                </tr>
                <?php
                $no = 1;
                foreach ($dpa_skpd as $daftar) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $daftar->nama_skpd; ?></td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>
    </page>
</body>

</html>