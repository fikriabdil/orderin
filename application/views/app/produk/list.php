<div class='col-lg-12 my-2'>
    <h3 class="d-flex text-darkblue">
        <div class="font-weight-semibold">Produk
        </div>
        <div class="ml-auto">
            <a href="<?= site_url('produk/tambah') ?>" class="text-darkblue"><i class="fas fa-plus"></i></a>
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
                <th scope="col">Gambar</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga Beli</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Berat</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>

                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
        </tbody>
    </table>
</div>