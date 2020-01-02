<div class='modal fade' id='logoutModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>Apakah anda ingin keluar?</h5>
                <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>×</span>
                </button>
            </div>
            <div class='modal-body'>Pilih "Ya" untuk keluar dan kembali ke halaman utama</div>
            <div class='modal-footer'>
                <a class='btn btn-darkblue btn-150' href='<?= site_url('auth/logout') ?>'>Ya</a>
                <button class='btn btn-secondary btn-150' type='button' data-dismiss='modal'>Tidak</button>
            </div>
        </div>
    </div>
</div>

<div class='modal fade' id='viewModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-scrollable modal-lg' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>Detail</h5>
                <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>×</span>
                </button>
            </div>
            <div class='modal-body' id="isi"></div>
            <div class='modal-footer'>
                <button class='btn btn-secondary btn-150' type='button' data-dismiss='modal'>Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class='modal fade' id='deleteModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>Apakah anda yakin?</h5>
                <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>×</span>
                </button>
            </div>
            <div class='modal-body'>Data yang dihapus tidak dapat dikembalikan.</div>
            <div class='modal-footer'>
                <a id='btn-delete' class='btn btn-darkblue btn-150' href='#'>Ya</a>
                <button class='btn btn-secondary btn-150' type='button' data-dismiss='modal'>Tidak</button>
            </div>
        </div>
    </div>
</div>