<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <?php $this->load->view('layout/head.php') ?>
</head>

<body>

    <div id="container">
        <?php $this->load->view('layout/topbar.php') ?>
        <main id="body" class="container">
            <div class="row m-0">
                <div class='col-12 my-2'>
                    <h3 class="d-flex justify-content-between text-darkblue">
                        <a href="<?= site_url('manajemen/jadwal_mitra') ?>" class="text-darkblue"><i class="fas fa-fas fa-arrow-left"></i></a>
                        <div class="font-weight-semibold"><?= $action ?> Jadwal Mitra</div>
                    </h3>
                </div>
                <div class="col-12">
                    <?php if ($this->session->flashdata('failed')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('failed'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-12 mt-2">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="hari" class="control-label control-required">Hari</label>
                                    <select name="hari" id="hari" class="select2 form-control">
                                        <option value="">Pilih hari</option>
                                        <?php foreach ($dropdown['hari'] as $row) : ?>
                                            <option value="<?= html_escape($row['id']) ?>" <?= $row['id'] == $model['hari'] ? 'selected' : '' ?>><?= html_escape($row['label']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('hari') ?>
                                </div>
                                <div class="form-group">
                                    <label for="kategori_curhat" class="control-label control-required">Kategori Curhat</label>
                                    <select name="kategori_curhat" id="kategori_curhat" class="select2 form-control">
                                        <option value="">Pilih kategori curhat</option>
                                        <?php foreach ($dropdown['kategori_curhat'] as $row) : ?>
                                            <option value="<?= html_escape($row['id']) ?>" <?= $row['id'] == $model['kategori_curhat'] ? 'selected' : '' ?>><?= html_escape($row['profesi']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('kategori_curhat') ?>
                                </div>
                                <div class="form-group">
                                    <label for="mitra" class="control-label control-required">Mitra Curhat</label>
                                    <select name="mitra" id="mitra" class="select2 form-control">
                                        <option value="">Pilih mitra curhat</option>
                                        <?php foreach ($dropdown['mitra'] as $row) : ?>
                                            <option value="<?= html_escape($row['id']) ?>" <?= $row['id'] == $model['mitra'] ? 'selected' : '' ?>><?= html_escape($row['nik']) . ' - ' .  html_escape($row['nama']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('mitra') ?>
                                </div>

                            </div>
                        </div>

                        <div class="form-row justify-content-center mb-2">
                            <div class="form-group col-6 col-md-2">
                                <button type="submit" class="btn btn-darkblue btn-block">Simpan</button>
                            </div>
                            <div class="form-group col-6 col-md-2">
                                <a href="<?= site_url('manajemen/jadwal_mitra') ?>" class="btn btn-secondary btn-block">Batal</a>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#kategori_curhat').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo site_url('manajemen/jadwal_mitra/dropdown_mitra'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        var html = '<option value="">Pilih mitra curhat</option>';

                        data.forEach(row => {
                            html += '<option value=' + row.id + '>' + row.nik + ' - ' + row.nama + '</option>';
                        });
                        $('#mitra').html(html);

                    }
                });
                return false;
            });

        });
    </script>
</body>

</html>