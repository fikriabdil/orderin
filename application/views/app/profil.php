<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view('layout/head.php') ?>
</head>

<body>
    <div id="container">
        <?php $this->load->view('layout/topbar.php') ?>
        <main id="body" class="container">
            <div class="row justify-content-center m-0 mt-3 ">
                <div class='col-lg-6'>
                    <div id="flash_message">
                        <?= !empty($this->session->flashdata('messages')) ? $this->session->flashdata('messages') : '' ?>
                    </div>
                    <div class='card shadow mb-3 border-top-darkblue' style="font-size: 1rem;">
                        <div class='card-body text-center'>
                            <span class="fas fa-user fa-5x mb-3 text-darkblue"></span>
                            <div class="mb-2">
                                <?php if ($session['id_kategori_pengguna'] == 'mitra') {
                                    echo "Mitra " . $session['mitra']['profesi'];
                                } else {
                                    echo "[ " . $session['kategori_pengguna']['kategori'] . " ]";
                                } ?>
                            </div>
                            <div class="font-weight-semibold mb-2">NIK <?= $session['nik'] ?></div>
                            <div class="font-weight-bold text-darkblue mb-2 text-uppercase" style="font-size: 1.5rem"><?= $session['nama'] ?></div>
                            <div>
                                <span class="fas fa-home mx-2 mb-2"></span><?= $session['alamat'] ?><br>
                                <span class="fas fa-mobile-alt mr-2 mb-2"></span><?= $session['no_hp'] ?>
                                <span class="fas fa-envelope mx-2"></span><?= $session['email'] ? $session['email'] : 'Tidak tersedia' ?>
                            </div>
                        </div>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card shadow  border-top-darkblue">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="kata_sandi_lama" class="col-sm-3 col-form-label">Kata sandi lama</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="kata_sandi_lama" class="form-control" id="kata_sandi_lama" placeholder="Kata sandi lama">
                                        <?= form_error('kata_sandi_lama') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kata_sandi_baru" class="col-sm-3 col-form-label">Kata sandi baru</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="kata_sandi_baru" class="form-control" id="kata_sandi_baru" placeholder="Kata sandi baru">
                                        <?= form_error('kata_sandi_baru') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row justify-content-center mt-3">
                            <div class="form-group col-6">
                                <a href="<?= site_url('curhat') ?>" class="btn btn-secondary btn-block">Batal</a>
                            </div>
                            <div class="form-group col-6">
                                <button type="submit" class="btn btn-darkblue btn-block">Ubah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <?php $this->load->view('layout/footer.php') ?>
    </div>

    <?php $this->load->view('layout/js.php') ?>
    <?php $this->load->view('layout/modal.php') ?>
</body>

</html>