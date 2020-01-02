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
                        <a href="<?= site_url('curhat/balas') ?>" class="text-darkblue"><i class="fas fa-fas fa-arrow-left"></i></a>
                        <div class="ml-auto font-weight-semibold">Curhat <?= html_escape($curhat['profesi']) ?></div>
                    </h3>
                </div>
                <div class="col-12">
                    <?php if ($this->session->flashdata('message')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('message'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class='card shadow border-top-darkblue h-100'>
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
                    <div class='card shadow border-top-darkblue  h-100'>
                        <div class='card-body'>
                            <div class="text-center font-weight-semibold">
                                <h4 class="font-weight-bold text-darkblue">Tanggapan Curhat</h4>
                                <div><?= $curhat['done_at'] != NULL ? date('l, d F Y H:i', strtotime(html_escape($curhat['done_at']))) : '' ?></div>
                            </div>
                            <div class="mt-4" id="section_tanggapan">
                                <?php if ($curhat['done_at'] == NULL && $session['id_kategori_pengguna'] != 'masyarakat') : ?>
                                    <form action="" method="post" enctype="multipart/form-data" id="form-edit">
                                        <div class="form-group">
                                            <label for="tanggapan">Tanggapan</label>
                                            <textarea name="tanggapan" id="tanggapan" rows="5" class="form-control" autocomplete="off"><?= nl2br(html_escape($curhat['tanggapan'])) ?></textarea>
                                            <?= form_error('tanggapan') ?>
                                        </div>
                                        <div class="form-group m-0">
                                            <button type="submit" class="btn btn-darkblue btn-block">Kirim</button>
                                        </div>
                                    </form>
                                <?php else :
                                    if ($curhat['tanggapan']) {
                                        echo nl2br(html_escape($curhat['tanggapan']));
                                    } else {
                                        echo '<div class="text-center text-darkblue"><i class="fas fa-sad-cry fa-10x mb-4"></i><h5 class="page-title font-weight-semibold">Yaah, belum ada tanggapan untuk curhatmu</h5></div>';
                                    }
                                endif; ?>
                            </div>
                        </div>
                        <?php if ($curhat['tanggapan']) : ?>
                            <div class="card-footer py-1">
                                <div class="d-flex w-100 justify-content-between">
                                    <div class="py-1"><?= $curhat['mitra'] != NULL ? "Konselor: <span class='font-italic'>" . html_escape($curhat['mitra']['nama']) . "</span>" : '' ?></div>
                                    <button class="btn btn-link p-0" id="btn-edit"><i class="fas fa-edit"></i></button>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </main>

        <?php $this->load->view('layout/footer.php') ?>
    </div>
    <?php $this->load->view('layout/modal.php') ?>
    <?php $this->load->view('layout/js.php') ?>
    <script>
        $("#btn-edit").click(function() {
            let html = `
                <form action="" method="post" enctype="multipart/form-data" id="form-edit">
                    <div class="form-group">
                        <label for="tanggapan">Tanggapan</label>
                        <textarea name="tanggapan" id="tanggapan" rows="5" class="form-control" autocomplete="off"><?= nl2br(html_escape($curhat['tanggapan'])) ?></textarea>
                        <?= form_error('tanggapan') ?>
                    </div>
                    <div class="form-group m-0">
                        <button type="submit" class="btn btn-darkblue btn-block">Ubah</button>
                         <button type="button" class="btn btn-secondary btn-block" onclick="cancel()">Batal</button>
                    </div>
                </form>
            `;
            $("#section_tanggapan").html(html);
        });

        function cancel() {
            $("#section_tanggapan").html($("#tanggapan").html());
        }
    </script>
    </div>
</body>

</html>