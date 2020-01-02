<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view('layout/head.php') ?>
</head>

<body>
    <div id="container" class="full-bg center-screen">
        <main id="body" class="container-fluid">
            <div class="row text-left m-0">
                <div class="col-10 col-md-4 col-xl-2 mx-auto my-4">
                    <div class="text-center">
                        <div class="text-darkblue mt-3 mb-4 page-title">
                            <h2 class="font-weight-bold">Login</h2>
                        </div>
                    </div>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="username" id="username" value="<?= html_escape($model['username']) ?>" class="form-control" placeholder="Nama pengguna" autocomplete="off">
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Kata sandi" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-darkblue btn-block">Masuk</button>
                        </div>
                    </form>
                    <?php if ($this->session->flashdata('danger')) : ?>
                        <div class='text-center alert alert-danger' role='alert'>
                            <?php echo $this->session->flashdata('danger'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </div>

    <?php $this->load->view('layout/js.php') ?>
</body>

</html>