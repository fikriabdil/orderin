<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang='id'>

<head>
    <?php $this->load->view('layout/head.php') ?>
    <link href='<?php echo base_url('theme/vendor/datatables/dataTables.bootstrap4.min.css') ?>' rel='stylesheet'>
</head>

<body>
    <div id="container" class="full-bg">
        <?php $this->load->view('layout/topbar.php') ?>
        <main id="body" class="container">
            <div class="row m-0">
                <div class='col-12 my-2'>
                    <h3 class="d-flex justify-content-between text-darkblue">
                        <a href="<?= site_url('curhat') ?>" class="text-darkblue"><i class="fas fa-home"></i></a>
                        <div class="font-weight-semibold">Pengguna</div>
                        <a href="<?= site_url('manajemen/pengguna/tambah') ?>" class="text-darkblue"><i class="fas fa-plus"></i></a>
                    </h3>
                </div>
                <div class="col-12">
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show mb-1" role="alert">
                            <?= $this->session->flashdata('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-12 mt-2">
                    <div class="table-responsive d-none d-md-block">
                        <table id="daftar_pengguna" class='table table-bordered bg-white' id='dataTable' width='100%' cellspacing='0'>
                            <thead class="thead-darkblue">
                                <tr>
                                    <th width="40">No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Kategori Pengguna</th>
                                    <th>Keterangan</th>
                                    <th width="80" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $number = 1;
                                foreach ($user as $row) : ?>
                                    <tr>
                                        <td><?php echo $number ?>.</td>
                                        <td><?= html_escape($row['nik']) ?></td>
                                        <td><?= html_escape($row['nama']) ?></td>
                                        <td><?= html_escape($row['kategori']) ?></td>
                                        <td><?= html_escape($row['profesi']) ?></td>
                                        <td class="text-center">
                                            <a href="<?= site_url('manajemen/pengguna/ubah/' . html_escape($row['id'])) ?>" class='btn btn-sm fas fa-edit text-primary' data-toggle="tooltip" data-placement="top" title="Ubah"></a>
                                            <a href="#" class='btn btn-sm fas fa-trash-alt text-primary' onclick="deleteConfirm(' <?= site_url('manajemen/pengguna/hapus/' . html_escape($row['id'])) ?>')" data-toggle="tooltip" data-placement="top" title="Hapus"></a>
                                        </td>
                                    </tr>
                                <?php $number++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-md-none">
                        <ul class="list-group">
                            <?php
                            foreach ($user as $row) : ?>
                                <li class="list-group-item list-group-item-action mb-3 border-left-darkblue shadow" style="border-radius: 0;">
                                    <div class="d-flex w-100 justify-content-between">
                                        <small class="mb-1"><?= html_escape($row['nik']) ?></small>
                                        <small><?= html_escape($row['kategori']) ?></small>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mt-1 mb-2 font-weight-bold text-darkblue"><?= html_escape($row['nama']) ?></h5>
                                        <div class="">
                                            <a href="<?= site_url('manajemen/pengguna/ubah/' . html_escape($row['id'])) ?>" class='btn btn-sm fas fa-edit text-primary' data-toggle="tooltip" data-placement="bottom" title="Ubah"></a>
                                            <a href="#" class='btn btn-sm fas fa-trash-alt text-primary' onclick="deleteConfirm(' <?= site_url('manajemen/pengguna/hapus/' . html_escape($row['id'])) ?>')" data-toggle="tooltip" data-placement="top" title="Hapus"></a>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
        <?php $this->load->view('/layout/footer.php') ?>
    </div>

    <?php $this->load->view('layout/modal.php') ?>
    <?php $this->load->view('layout/js.php') ?>
    <script src='<?php echo base_url('theme/vendor/datatables/jquery.dataTables.js') ?>'></script>
    <script src='<?php echo base_url('theme/vendor/datatables/dataTables.bootstrap4.min.js') ?>'></script>
    <script src='<?php echo base_url('theme/js/demo/datatables-demo.js') ?>'></script>
    <script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
        $("#daftar_pengguna").dataTable({
            "order": [],
            "aoColumns": [{
                    "bSortable": true
                },
                {
                    "bSortable": true
                },
                {
                    "bSortable": true
                },
                {
                    "bSortable": true
                },
                {
                    "bSortable": true
                },
                {
                    "bSortable": false
                }
            ],
            "sDom": '<"top">rt<"bottom"lp><"clear">'
        });
    </script>

</body>

</html>