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
            <div class='row m-0'>
                <div class='col-lg-12 my-2'>
                    <h3 class="d-flex text-darkblue">
                        <a href="<?= site_url('curhat') ?>" class="text-darkblue"><i class="fas fa-fas fa-arrow-left"></i></a>
                        <div class="ml-auto font-weight-semibold">Curhat baru</div>
                    </h3>
                </div>
                <div class="col-lg-12 mt-2">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="id_mitra" class="control-label control-required">Kategori Curhat</label>
                            <select name="id_mitra" id="id_mitra" class="form-control can-input">
                                <option value="">Pilih kategori</option>
                                <?php foreach ($dropdown['id_mitra'] as $row) : ?>
                                    <option value="<?= html_escape($row['id']) ?>" <?= set_select('id_mitra', $row['id'], ($model['id_mitra'] == $row['id'])) ?>><?= html_escape($row['profesi']) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_mitra') ?>
                        </div>
                        <div class="form-group ">
                            <label for="isi_curhat" class="control-label control-required">Curhatku</label>
                            <textarea name="isi_curhat" id="isi_curhat" rows="5" class="form-control can-input" autocomplete="off"><?= html_escape($model['isi_curhat']) ?></textarea>
                            <?= form_error('isi_curhat') ?>
                        </div>

                        <div class="form-row mt-3 justify-content-center">
                            <div class="form-group col-6 col-md-2">
                                <button type="submit" class="btn btn-darkblue btn-block">Kirim</button>
                            </div>
                            <div class="form-group col-6 col-md-2">
                                <a href="<?php echo site_url('curhat') ?>" class="btn btn-secondary btn-block">Batal</a>
                            </div>
                        </div>
                    </form>

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