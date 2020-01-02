<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang='id'>

<head>
    <?php $this->load->view('layout/head.php') ?>
</head>

<body>
    <div id="container">
        <?php $this->load->view('layout/topbar.php') ?>

        <main id="body" class="container">
            <div class='row row-eq-height m-0'>
                <div class='col-lg-12 mt-2 mb-3'>
                    <h3 class="d-flex text-darkblue">
                        <a href="<?= site_url('curhat') ?>" class="text-darkblue"><i class="fas fa-fas fa-arrow-left"></i></a>
                        <div class="ml-auto font-weight-semibold">Curhat <?= html_escape($curhat['profesi']) ?></div>
                    </h3>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class='card shadow h-100 border-left-darkblue'>
                        <div class='card-body'>
                            <div class="text-center font-weight-semibold">
                                <h4 class="font-weight-bold text-darkblue">Isi Curhat</h4>
                                <?= date('l, d F Y H:i', strtotime(html_escape($curhat['created_at']))) ?>
                            </div>
                            <div class="mt-4">
                                <?= html_escape($curhat['isi']) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class='card shadow h-100 border-left-darkblue'>
                        <div class='card-body'>
                            <div class="text-center font-weight-semibold">
                                <h4 class="font-weight-bold text-darkblue">Tanggapan Curhat</h4>
                                <?= $curhat['done_at'] != NULL ? date('l, d F Y H:i', strtotime(html_escape($curhat['done_at']))) : '' ?>
                            </div>
                            <div class="mt-4">
                                <?php if ($curhat['tanggapan']) {
                                    echo nl2br(html_escape($curhat['tanggapan']));
                                } else {
                                    echo '<div class="text-center text-darkblue"><i class="fas fa-sad-cry fa-10x mb-4"></i><h5 class="page-title font-weight-semibold">Sabar ya, belum ada tanggapan untuk curhatmu</h5></div>';
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3 text-gray-800">
                    <div class="card shadow mb-3 border-left-darkblue">
                        <div class="card-body font-italic">
                            <strong>Catatan:</strong>
                            <ul class="pl-3 mb-1">
                                <li>Silahkan curhat di stand KonTes Curhat Cirebon untuk mendapatkan tanggapan yang lebih mendalam</ol>
                                <li>
                                    Stand KonTes Curhat Cirebon bisa di kunjungi 2x dalam sebulan, mulai pukul 07.00:
                                    <ul class="pl-3 mb-1">
                                        <li>Minggu ke-1 di Car Free Day Jalan Siliwangi</li>
                                        <li>Minggu ke-4 di Car Free Day Bima</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php $this->load->view('layout/footer.php') ?>
    </div>
    <?php $this->load->view('layout/modal.php') ?>
    <?php $this->load->view('layout/js.php') ?>
    </div>
</body>

</html>