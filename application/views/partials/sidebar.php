<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
        <div class="sidebar-brand-icon">
            <img class="img-fluid px-sm-4" style="width: 5rem;" src="<?= base_url('assets/logo_prov.png') ?>" alt="">
        </div>
        <div class="sidebar-brand-text">DPA</div>
    </a>
    <?php if ($this->session->login['role'] == 'admin') { ?>
    <hr class="sidebar-divider my-0">
    <li class="nav-item" id="dash">
        <a class="nav-link" href="<?= base_url('dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <?php } ?>
    <?php if ($this->session->login['role'] == 'admin') { ?>
    <hr class="sidebar-divider">
    <li class="nav-item" id="master">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu_master" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-database"></i>
            <span>Master</span>
        </a>
        <div id="menu_master" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?= $aktif == 'satuan' ? 'active' : '' ?>"
                    href="<?= base_url('satuan') ?>">Satuan</a>
                <a class="collapse-item <?= $aktif == 'uraian' ? 'active' : '' ?>"
                    href="<?= base_url('uraian') ?>">Uraian</a>
                <a class="collapse-item <?= $aktif == 'sub_kegiatan' ? 'active' : '' ?>"
                    href="<?= base_url('sub_kegiatan') ?>">Sub Kegiatan</a>
                <a class="collapse-item <?= $aktif == 'pengguna' ? 'active' : '' ?>"
                    href="<?= base_url('pengguna') ?>">Pengguna</a>
                <a class="collapse-item <?= $aktif == 'skpd' ? 'active' : '' ?>" href="<?= base_url('skpd') ?>">SKPD</a>
            </div>
        </div>
    </li>
    <?php } ?>
    <?php if ($this->session->login['role'] == 'admin') { ?>
    <hr class="sidebar-divider">
    <li class="nav-item" id="master_dpa">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu_dpa" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-file"></i>
            <span>DPA</span>
        </a>
        <div id="menu_dpa" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Data:</h6> -->
                <a class="collapse-item <?= $aktif == 'dpa' ? 'active' : '' ?>" href="<?= base_url('dpa') ?>">DPA</a>
                <a class="collapse-item <?= $aktif == 'sub_dpa' ? 'active' : '' ?>"
                    href="<?= base_url('dpa/sub_dpa') ?>">Sub Kegiatan DPA</a>
                <a class="collapse-item <?= $aktif == 'rincian' ? 'active' : '' ?>" href="<?= base_url('rincian') ?>">
                    Rincian
                </a>
            </div>
        </div>
    </li>
    <?php } ?>
    <?php if ($this->session->login['role'] == 'admin') { ?>
    <hr class="sidebar-divider my-0">
    <li class="nav-item" id="tarik">
        <a class="nav-link" href="<?= base_url('penarikan') ?>">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>Penarikan</span></a>
    </li>
    <?php } ?>

    <hr class="sidebar-divider">
    <li class="nav-item" id="laporan">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu_lap" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-chart-bar"></i>
            <span>Laporan</span>
        </a>
        <div id="menu_lap" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Data:</h6> -->
                <a class="collapse-item <?= $aktif == 'lap_ringkasan' ? 'active' : '' ?>"
                    href="<?= base_url('laporan/lihat_ringkasan') ?>">Ringkasan DPA</a>
                <a class="collapse-item <?= $aktif == 'lap_dpa' ? 'active' : '' ?>"
                    href="<?= base_url('laporan') ?>">DPA/tahun</a>
                <a class="collapse-item <?= $aktif == 'lap_tarik_bulan' ? 'active' : '' ?>"
                    href="<?= base_url('laporan/lihat_tarik_bulan') ?>">Penarikan/bulan</a>

                <a class="collapse-item <?= $aktif == 'lap_tarik' ? 'active' : '' ?>"
                    href="<?= base_url('laporan/lihat_tarik') ?>">Penarikan/tahun</a>
                <a class="collapse-item <?= $aktif == 'cetak_terbesar' ? 'active' : '' ?>"
                    href="<?= base_url('laporan/cetak_terbesar') ?>">Penarikan Terbesar</a>

                <a class="collapse-item <?= $aktif == 'dana_terkecil' ? 'active' : '' ?>"
                    href="<?= base_url('laporan/lihat_dana_terkecil') ?>">Pendanaan Terkecil</a>

                <a class="collapse-item <?= $aktif == 'dana_terbesar' ? 'active' : '' ?>"
                    href="<?= base_url('laporan/lihat_dana_terbesar') ?>">Pendanaan Terbesar</a>
                <a class="collapse-item <?= $aktif == 'lap_skpd' ? 'active' : '' ?>"
                    href="<?= base_url('laporan/lihat_skpd') ?>">Rekapitulasi SKPD</a>

            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<script>
$(document).ready(function() {
    $('li').removeClass('active');
})
</script>