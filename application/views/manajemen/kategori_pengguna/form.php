<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang='en'>

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
                        <a href="<?= site_url('manajemen/kategori_pengguna') ?>" class="text-darkblue"><i class="fas fa-fas fa-arrow-left"></i></a>
                        <div class="font-weight-semibold"><?= $action ?> Kategori Pengguna</div>
                    </h3>
                </div>
                <div class="col-12 mt-2">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kategori" class="control-label control-required">Kategori</label>
                                    <input type="text" maxlength="20" class="form-control" id="kategori" name="kategori" value="<?= html_escape($model['kategori']) ?>" autocomplete="off">
                                    <?= form_error('kategori') ?>
                                </div>

                            </div>
                        </div>
                        <div class="form-row justify-content-center mb-2">
                            <div class="form-group col-6 col-md-2">
                                <button type="submit" class="btn btn-darkblue btn-block">Simpan</button>
                            </div>
                            <div class="form-group col-6 col-md-2">
                                <a href="<?= site_url('manajemen/kategori_pengguna') ?>" class="btn btn-secondary btn-block">Batal</a>
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
</body>

</html>