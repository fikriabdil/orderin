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

            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <div class='row m-0'>
                <div class='col-lg-12'>
                    <h3 class="d-flex my-2 text-darkblue">
                        <a href="<?= site_url('curhat') ?>" class="text-darkblue"><i class="fas fa-fas fa-home"></i></a>
                        <div class="ml-auto font-weight-semibold">Riwayat Curhat</div>
                    </h3>
                </div>

                <div class="col-lg-12 mt-2">
                    <div class='card fast-transition border-0 mb-3'>
                        <div class="card-body py-3">

                        </div>
                    </div>
                </div>
            </div>

        </main>
        <?php $this->load->view('layout/footer.php') ?>
    </div>
    <?php $this->load->view('layout/modal.php') ?>
    <?php $this->load->view('layout/js.php') ?>
    <script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>
</body>

</html>