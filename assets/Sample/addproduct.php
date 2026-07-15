<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard/') ?>product">Product</a></li>
                        <li class="breadcrumb-item active">Tambah Produk</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Data Produk</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="post" action="<?= base_url('dashboard/addproduct'); ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input type="text" name="nama_produk" class="form-control <?= form_error('nama_produk') ? 'is-invalid' : null ?>" id="nama_produk" value="<?= set_value('nama_produk'); ?>">
                                    <?= form_error('nama_produk', '<span class="invalid-feedback">', '</span>'); ?>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="stok_produk">Stok Produk</label>
                                            <div class="input-group">
                                                <input type="text" name="stok_produk" class="form-control <?= form_error('stok_produk') ? 'is-invalid' : null ?>" id="stok_produk" value="<?= set_value('stok_produk'); ?>">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">\</span>
                                                </div>
                                                <?= form_error('stok_produk', '<span class="invalid-feedback">', '</span>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Berat Stok Produk</label>
                                            <select class="form-control <?= form_error('berat_stok_produk') ? 'is-invalid' : null ?>" name="berat_stok_produk">
                                                <option value="Kg" selected>Kg</option>
                                                <option value="Gram">Gram</option>
                                                <option value="Ons">Ons</option>
                                            </select>
                                            <?= form_error('berat_stok_produk', '<span class="invalid-feedback">', '</span>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="harga_produk">Harga Produk</label>
                                            <div class="input-group">
                                                <input type="text" name="harga_produk" class="form-control <?= form_error('harga_produk') ? 'is-invalid' : null ?>" id="harga_produk" value="<?= set_value('harga_produk'); ?>">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">\</span>
                                                </div>
                                                <?= form_error('harga_produk', '<span class="invalid-feedback">', '</span>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Satuan Harga Produk</label>
                                            <select class="form-control <?= form_error('satuan_harga_produk') ? 'is-invalid' : null ?>" name="satuan_harga_produk">
                                                <option value="Kg" selected>Kg</option>
                                                <option value="Gram">Gram</option>
                                                <option value="Ons">Ons</option>
                                            </select>
                                            <?= form_error('satuan_harga_produk', '<span class="invalid-feedback">', '</span>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tentang_produk">Tentang Produk</label>
                                    <textarea class="form-control <?= form_error('tentang_produk') ? 'is-invalid' : null ?>" rows="3" name="tentang_produk" id="tentang_produk"><?= set_value('tentang_produk'); ?></textarea>
                                    <?= form_error('tentang_produk', '<span class="invalid-feedback">', '</span>'); ?>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan Produk</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->