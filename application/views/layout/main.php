<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang='id'>

<head>
    <?php $this->load->view('layout/head.php') ?>
</head>

<body>
    <div id="container">
        <?php $this->load->view('layout/topbar.php') ?>

        <main id="body" class="container-fluid">
            <div class='row m-0'>
                <?php $this->load->view($konten); ?>
            </div>

        </main>

        <?php $this->load->view('layout/footer.php') ?>
    </div>
    <?php $this->load->view('layout/modal.php') ?>
    <?php $this->load->view('layout/js.php') ?>
</body>

</html>