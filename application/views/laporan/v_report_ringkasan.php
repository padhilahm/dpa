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
            <div class="row">
                <table class="table table-bordered">
                    <tr>
                        <th><strong>DOKUMEN PELAKSANAAN ANGGARAN SATUAN KERJA PERANGKAT DAERAH</strong></th>
                        <th style="vertical-align: middle; text-align: center;" rowspan="2">Formulir DPA-RINGKASAN
                            BELANJA
                            SKPD </th>
                    </tr>
                    <tr>
                        <td> Pemerintah Provinsi Kalimantan Selatan Tahun Anggaran <?php echo $dpa_tahun->tahun; ?></td>
                    </tr>
                </table>
            </div>



            <div class="row">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">
                    <strong>Organisasi</strong></label>
                <label for="colFormLabelSm" class="col-sm-10 col-form-label col-form-label-sm">
                    <?php echo $dpa_tahun->nama_skpd; ?>
                </label>
            </div>

            <?php foreach ($dpa_sub as $sub) { ?>

            <div class="row">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"><strong>Sub
                        Kegiatan</strong></label>
                <label for="colFormLabelSm" class="col-sm-10 col-form-label col-form-label-sm">
                    <?php echo $sub->sub_kegiatan; ?>
                </label>
            </div>

            <br>
            <div class="row">
                <table class="table table-bordered" width="100%" cellspacing="0" id="datatables">


                    <thead>
                        <tr align="center">
                            <td colspan="5">Ringkasan Anggaran Pendapatan dan Belanja
                                Satuan Kerja Perangkat Daerah</td>
                        </tr>
                        <tr>
                            <td>No</td>
                            <td>Uraian</td>
                            <td>Koefisien</td>
                            <td>Harga</td>
                            <td>Jumlah</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 0;
                            $idnya = $sub->id_dpa_sub;
                            // echo "<h1>'$idnya'</h1>";
                            $data = $this->db->query("select * FROM tbl_rincian a join tbl_dpa_sub b on a.id_dpa_sub=b.id_dpa_sub join tbl_uraian c on a.id_uraian=c.id_uraian join tbl_satuan d on a.id_satuan=d.id_satuan WHERE b.id_dpa_sub='$idnya'")->result();
                            foreach ($data as $rincian) : ?>
                        <tr>
                            <td><?= ++$no ?></td>
                            <td><?= $rincian->uraian ?></td>
                            <td><?= $rincian->koefisien ?></td>
                            <td><?= rupiah($rincian->harga_rincian); ?></td>
                            <td><?php $jumlah = $rincian->koefisien * $rincian->harga_rincian;
                                        echo rupiah($jumlah);
                                        ?></td>

                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

            <?php } ?>
            <br>
            <div class="row">
                <label for="colFormLabelSm" class="col-sm-7 col-form-label col-form-label-sm"></label>
                <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">
                    <?php
                    $tanggal = date('Y-m-d');
                    $tgl_indo = tgl_indo($tanggal);
                    echo "Banjarmasin, tanggal " . $tgl_indo; ?><br><?php
                                                                    echo $dpa_tahun->jabatan_pimpinan; ?>
                </label>
                <br><br><br><br><br>
                <label for="colFormLabelSm" class="col-sm-7 col-form-label col-form-label-sm"></label>
                <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">
                    <?php
                    echo $dpa_tahun->nama_pimpinan; ?><br><?php
                                                            echo "NIP. " . $dpa_tahun->nip_pimpinan; ?>
                </label>
            </div>
            <br><br>
        </div>
        </div>
    </page>
</body>

</html>