<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang='id'>

<head>
    <?php $this->load->view('layout/head.php') ?>
</head>

<body>
    <div id="container" >
        <?php $this->load->view('layout/topbar.php') ?>
        <main id="body" class="container">
            <div class="row m-0">
                <div class='col-12 my-2'>
                    <h3 class="d-flex justify-content-between text-darkblue">
                        <a href="<?= site_url('manajemen/pengguna') ?>" class="text-darkblue"><i class="fas fa-fas fa-arrow-left"></i></a>
                        <div class="font-weight-semibold"><?= $action ?> Pengguna</div>
                    </h3>
                </div>
                <div class="col-12 mt-2">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="nik">NIK</label>
                                        <input type="text" name="nik" id="nik" class="form-control" maxlength="16" placeholder="Nomor Induk Kependudukan" value="<?= html_escape($model['nik']) ?>" autocomplete="off">
                                        <?= form_error('nik') ?>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="nama">Nama lengkap</label>
                                        <input type="text" name="nama" id="nama" class="form-control" maxlength="32" placeholder="Nama lengkap sesuai KTP" value="<?= html_escape($model['nama']) ?>" autocomplete="off">
                                        <?= form_error('nama') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat sesuai KTP" value="<?= html_escape($model['alamat']) ?>" autocomplete="off">
                                    <?= form_error('alamat') ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="no_hp">No. HP</label>
                                        <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="No HP" value="<?= html_escape($model['no_hp']) ?>" autocomplete="off">
                                        <?= form_error('no_hp') ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?= html_escape($model['email']) ?>" autocomplete="off">
                                        <?= form_error('email') ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="id_kategori_pengguna">Kategori pengguna</label>
                                    <select name="id_kategori_pengguna" id="id_kategori_pengguna" class="form-control">
                                        <option value="">Pilih kategori pengguna</option>
                                        <?php foreach ($dropdown['id_kategori_pengguna'] as $row) : ?>
                                            <option value="<?= html_escape($row['id']) ?>" <?= $row['id'] == $model['id_kategori_pengguna'] ? 'selected' : '' ?>><?= html_escape($row['kategori']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_kategori_pengguna') ?>
                                </div>
                                <div id="profesi_mitra" class="form-group">
                                    <label for="id_kategori_curhat">Kategori curhat</label>
                                    <select class="form-control" id="id_kategori_curhat" name="id_kategori_curhat">
                                        <option value="">Semua kategori curhat</option>
                                        <?php foreach ($dropdown['id_kategori_curhat'] as $row) : ?>
                                            <option value="<?= html_escape($row['id']) ?>" <?= set_select('id_kategori_curhat', $row['id'], ($model['id_kategori_curhat'] == $row['id'])) ?>><?= html_escape($row['profesi']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_kategori_curhat') ?>
                                </div>
                                <div class="form-group ">
                                    <label for="kata_sandi">Kata sandi</label>
                                    <input type="password" name="kata_sandi" id="kata_sandi" class="form-control" placeholder="Kata sandi" autocomplete="off">
                                    <?= form_error('kata_sandi') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row justify-content-center mb-2">
                            <div class="form-group col-6 col-md-2">
                                <button type="submit" class="btn btn-darkblue btn-block">Simpan</button>
                            </div>
                            <div class="form-group col-6 col-md-2">
                                <a href="<?= site_url('manajemen/pengguna') ?>" class="btn btn-secondary btn-block">Batal</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </main>
        <?php $this->load->view('/layout/footer.php') ?>
    </div>

    <?php $this->load->view('layout/modal.php') ?>
    <?php $this->load->view('layout/js.php') ?>
    <script>
        $('#id_kategori_pengguna').val() == 'mitra' ? $("#profesi_mitra").show() : $("#profesi_mitra").hide();
        $('#id_kategori_pengguna').change(function() {
            $(this).val() === 'mitra' ? $("#profesi_mitra").show() : $("#profesi_mitra").hide();
        })
    </script>
</body>

</html>