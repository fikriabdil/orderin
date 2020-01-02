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
                    <h3 class="d-flex mt-2 mb-4 text-darkblue">
                        <a href="<?= site_url('curhat') ?>" class="text-darkblue"><i class="fas fa-home"></i></a>
                        <div class="ml-auto font-weight-semibold">Curhat Masuk</div>
                    </h3>
                </div>

                <div class="col-lg-12">
                    <?php if (count($curhat) == 0) : ?>
                        <div class="text-darkblue text-center center-screen" style="min-height: 50vh">
                            <span class="far fa-comment-dots fa-10x"></span>
                            <h4 class="font-weight-semibold my-4">Tidak ada yang dapat ditampilkan</h4>
                        </div>
                    <?php else : ?>
                        <div class="row">
                            <?php foreach ($curhat as $row) : ?>
                                <a href="<?= site_url('curhat/lihat/' . $row['id'] . '/balas') ?>" class="text-decoration-none text-gray-800 col-md-6">
                                    <div class="card fast-transition border-0 mb-3" style="height: 125px;">
                                        <div class="card-body py-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h5 class="font-weight-bold text-darkblue"><?= html_escape($row['nama']) ?></h5>
                                                    <h6 class="font-italic"><?= substr(html_escape($row['isi']), 0, 100) . '...' ?></h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <h6 class="font-weight-semibold"><?= html_escape($row['profesi']) ?> </h6>
                                                    <h6><?= $row['done_at'] ? date_format(date_create(html_escape($row['done_at'])), "d/m/Y") : date_format(date_create(html_escape($row['created_at'])), "d/m/Y"); ?></h6>
                                                    <span class="mb-2 p-1 px-2 font-weight-semibold text-center <?= $row['is_done'] == 1 ? 'text-white bg-success' : 'bg-warning' ?>" style="font-size: 12px;"><?= $row['is_done'] == 1 ? 'Dibalas' : 'Menunggu' ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="text-center text-sm-left" style="font-size: 12px;"><?= $keterangan_data_tampil ?></div>
                                <?= $pagination; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </main>
        <?php $this->load->view('layout/footer.php') ?>
    </div>
    <?php $this->load->view('layout/modal.php') ?>
    <?php $this->load->view('layout/js.php') ?>
    <script>
        function deleteConfirm(url) {
            $(' #btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>
</body>

</html>