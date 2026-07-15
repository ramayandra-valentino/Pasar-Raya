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
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('messagealert'); ?>"></div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mt-2">Data Semua Produk</h3>
                            <a href="<?= base_url('dashboard/') ?>addproduct">
                                <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah Data</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-auto">
                            <table id="example2" class="table table-bordered table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Tentang Produk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($hasil as $h) : ?>
                                        <tr>
                                            <td class="dt-center"><?= $i; ?></td>
                                            <td class="dt-center"><?= $h['id_produk'] ?></td>
                                            <td class="dt-center"><?= $h['nama_produk'] ?></td>
                                            <td class="dt-center"><?= $h['stok_produk'] ?>\<?= $h['berat_stok_produk'] ?></td>
                                            <td class="dt-center"><?= $h['harga_produk'] ?>\<?= $h['satuan_harga_produk'] ?></td>
                                            <td class="display-name-text"><?= $h['tentang_produk'] ?></td>
                                            <td>
                                                <a href="<?= base_url('dashboard/detailproduct'); ?>/<?= $h['id_produk'] ?>" class="d-none d-inline badge badge-success p-2 rounded-2 text-white" style="font-size: 13px;font-weight: 400;"> <i class="fas fa-info fa-sm text-white-50 mr-2"></i>Detail</a>
                                                <a href="<?= base_url('dashboard/editproduct'); ?>/<?= $h['id_produk'] ?>" class="d-none d-inline badge badge-warning p-2 rounded-2 text-white" style="font-size: 13px;font-weight: 400;"> <i class="fas fa-edit fa-sm text-white-50 mr-2"></i>Update</a>
                                                <a href="<?= base_url('dashboard/deleteproduct'); ?>/<?= $h['id_produk'] ?>" class="d-none d-inline badge badge-danger p-2 rounded-2 text-white sweet-confirm" style="font-size: 13px;font-weight: 400;"> <i class="fas fa-trash fa-sm text-white-50 mr-2"></i>Delete</a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Stok</th>
                                        <th>Berat</th>
                                        <th>Harga</th>
                                        <th>Tentang Produk</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->