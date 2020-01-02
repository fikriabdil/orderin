<div class='col-lg-12 my-2'>
    <h3 class="d-flex text-primary">
        <div class="font-weight-semibold">Stok
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
                <th>Nomor</th>
                <th scope="col">Supplier</th>
                <th scope="col">Produk</th>
                <th scope="col">Jumlah Barang</th>
                <th scope="col">Harga Barang Satuan</th>
                <th scope="col">Ongkos Kirim</th>
                <th scope="col">Harga Barang Total</th>
                <th scope="col">Tanggal Pemesanan</th>
                <th scope="col">Tanggal Diterima</th>
                <th scope="col">Tanggal Retur</th>
                <th scope="col">Tanggal Diterima Retur</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Thornton</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
        </tbody>
    </table>
</div>