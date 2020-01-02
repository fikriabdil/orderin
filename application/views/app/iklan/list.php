<div class='col-lg-12 my-2'>
    <h3 class="d-flex text-primary">
        <div class="font-weight-semibold">Iklan
        </div>
        <div class="ml-auto">
            <a href="<?= site_url('curhat/tambah') ?>" class="text-primary"><i class="fas fa-plus"></i></a>
        </div>
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
<div class="col-lg-12 mt-2 table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Akun iklan</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Pengeluaran Harian</th>
                <th scope="col">Jumlah Lead</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Otto</td>
            </tr>
            <tr>

                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>Thornton</td>
            </tr>
        </tbody>
    </table>
</div>