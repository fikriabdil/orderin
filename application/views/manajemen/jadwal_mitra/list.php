<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang='id'>

<head>
    <?php $this->load->view('layout/head.php') ?>
</head>

<body>
    <div id='container'>
        <?php $this->load->view('layout/topbar.php') ?>
        <main id='body' class="container">
            <div class='row m-0'>
                <div class='col-12 my-2'>
                    <h3 class="d-flex justify-content-between text-darkblue">
                        <a href="<?= site_url('curhat') ?>" class="text-darkblue"><i class="fas fa-home"></i></a>
                        <div class="text-center font-weight-semibold">Jadwal Mitra Curhat<br>
                            <h6 class="mt-2"><?= date('l, d F Y') ?></h6>
                        </div>
                        <a href="<?= site_url('manajemen/jadwal_mitra/tambah') ?>" class="text-darkblue"><i class="fas fa-plus"></i></a>
                    </h3>
                </div>
                <div class="col-12">
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
                <div class='col-12 mt-2 mb-4  row-eq-height'>
                    <div class="row justify-content-center ">
                        <?php foreach ($jadwal as $jadwal) : ?>
                            <div class="col-md-4 mb-4">
                                <div class="card shadow  h-100">
                                    <div class="card-header bg-darkblue text-white text-center">
                                        <h6 class="m-0 font-weight-semibold "><?= strtoupper(html_escape($jadwal['kategori'])) ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="m-0">
                                            <?php
                                            if (!$jadwal['mitra']) {
                                                echo '<div class="font-italic text-center text-gray-700">Tidak ada yang bertugas untuk hari ini</div>';
                                            } else {
                                                echo '<ol class="pl-4 m-0">';
                                                foreach ($jadwal['mitra'] as $mitra) {
                                                    echo '<li class="mb-2">' . html_escape($mitra['nama']) . '</li>';
                                                }
                                                echo '</ol>';
                                            } ?>
                                        </h6>
                                    </div>
                                    <a href="" class="card-footer text-muted  text-decoration-none text-right ">
                                        <div style="font-size: 0.75rem;">Lihat jadwal lainnya <span class="ml-2 fas fa-arrow-right"></span></div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </main>
        <?php $this->load->view('/layout/footer.php') ?>
    </div>

    <?php $this->load->view('layout/modal.php') ?>
    <?php $this->load->view('layout/js.php') ?>
</body>

</html>