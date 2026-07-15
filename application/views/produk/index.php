<section class="section">
    <div class="card">
        <!-- <div class="card-header"> -->
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Data Produk</h5>
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-produk">
                Input Produk
            </button>
<!------------------------------ Modal Insert ------------------------------>
            <div class="modal fade text-left modal-borderless" id="modal-produk" tabindex="-1" role="dialog" aria-labelledby="ModalProduk" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Input Produk</h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form form-horizontal" action="<?php echo base_url(). 'Produk/input_produk' ?>" method="post" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>ID Produk</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="id_produk" class="form-control" name="id_produk"
                                                placeholder="ID Produk">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Produk</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama_produk" class="form-control" name="nama_produk"
                                                placeholder="Nama Produk">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Stok</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="number" id="stok_produk" class="form-control" name="stok_produk"
                                                placeholder="Berat Stok">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <input type="text" id="berat_stok_produk" class="form-control" name="berat_stok_produk"
                                                placeholder="satuan" style="width: 130%; margin-left: -18px;">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Harga</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="number" id="harga_produk" class="form-control" name="harga_produk"
                                                placeholder="Harga">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <input type="text" id="satuan_harga_produk" class="form-control" name="satuan_harga_produk"
                                                placeholder="satuan" style="width: 130%; margin-left: -18px;">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Gambar</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input class="form-control" type="file" id="formFile" name="img">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Promo</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="promo" class="form-control" name="promo"
                                                placeholder="Promo produk">
                                        </div>
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                id="floatingTextarea" name="tentang_produk"></textarea>
                                            <label for="floatingTextarea" style="margin-left: 10px;">Tentang Produk</label>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Batal</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Submit</span>
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
<!--------------------------- End Modal Insert ----------------------------->
        </div>
        <div class="card-body">
            <table class="table" id="tabelproduk">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Produk</th>
                        <th colspan="2">Kuantitas</th>
                        <th colspan="2">Harga</th>
                        <th>Promo</th>
                        <th>Act</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($produk as $prd) : ?>
                    <tr>
                        <td><?php echo $prd->id_produk ?></td>
                        <td><?php echo $prd->nama_produk ?></td>
                        <td align="right"><?php echo $prd->stok_produk ?></td>
                        <td><?php echo $prd->berat_stok_produk; ?></td>
                        <td align="right"><?php echo $prd->harga_produk ?></td>
                        <td>/ <?php echo $prd->satuan_harga_produk ?></td>
                        <td><?php echo $prd->promo ?> %</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modal-detail<?php echo $prd->id_produk ?>">
                                Detail
                            </button>
                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modal-edit<?php echo $prd->id_produk ?>">
                                Edit
                            </button>
                            <a href="<?php echo base_url('Produk/hapus_produk/').$prd->id_produk ?>" class="btn btn-sm btn-danger">
                                Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
<!------------------------------ Modal Detail ------------------------------>
        <?php foreach($produk as $prd) : ?>
        <div class="modal fade text-left modal-borderless" id="modal-detail<?php echo $prd->id_produk ?>" tabindex="-1" role="dialog" aria-labelledby="ModalDetailProduk" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content" style="border: none; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">

                    <div class="modal-header" style="background: transparent; padding: 1.25rem 1.5rem; border: none;">
                        <div>
                            <h5 class="modal-title" style="font-weight: 600; margin-bottom: 2px;">
                                <i data-feather="package" style="width:18px;height:18px;vertical-align:-3px;margin-right:6px;"></i>
                                Detail Produk IDP-<?php echo $prd->id_produk ?>
                            </h5>
                        </div>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                            aria-label="Close" style="background: rgba(255,255,255,0.2); border: none; color: #fff;">
                            <i data-feather="x"></i>
                        </button>
                    </div>

                    <div class="modal-body" style="padding: 1.5rem; background: #f8f9fc;">

                        <!-- Area yang akan dicetak -->
                        <div id="printarea<?php echo $prd->id_produk ?>">

                            <div style="background: #fff; border-radius: 10px; padding: 1rem 1.25rem; margin-bottom: 1.25rem; box-shadow: 0 1px 4px rgba(0,0,0,0.06);">
                                <div style="display:flex; justify-content:space-between; flex-wrap:wrap; gap: 0.75rem;">
                                    <div>
                                        <div style="font-size: 12px; color: #8898aa; text-transform: uppercase; letter-spacing: .05em;">ID Produk</div>
                                        <div style="font-weight: 700; font-size: 15px; color: #32325d;">IDP-<?php echo $prd->id_produk ?></div>
                                    </div>
                                    <div>
                                        <div style="font-size: 12px; color: #8898aa; text-transform: uppercase; letter-spacing: .05em;">Nama Produk</div>
                                        <div style="font-weight: 700; font-size: 15px; color: #32325d;"><?php echo $prd->nama_produk ?></div>
                                    </div>
                                    <div>
                                        <div style="font-size: 12px; color: #8898aa; text-transform: uppercase; letter-spacing: .05em;">Stok</div>
                                        <div style="font-weight: 700; font-size: 15px; color: #32325d;"><?php echo $prd->stok_produk ?> <?php echo $prd->berat_stok_produk ?></div>
                                    </div>
                                    <div>
                                        <div style="font-size: 12px; color: #8898aa; text-transform: uppercase; letter-spacing: .05em;">Harga</div>
                                        <div style="font-weight: 700; font-size: 15px; color: #32325d;"><?php echo number_format($prd->harga_produk,0,',','.') ?> / <?php echo $prd->satuan_harga_produk ?></div>
                                    </div>
                                    <?php if($prd->promo > 0) : ?>
                                    <div>
                                        <div style="font-size: 12px; color: #8898aa; text-transform: uppercase; letter-spacing: .05em;">Promo</div>
                                        <span class="badge bg-warning" style="padding: 6px 10px; border-radius: 6px; color: #fff;">
                                            <?php echo $prd->promo ?>%
                                        </span>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div style="background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 1px 4px rgba(0,0,0,0.06); margin-bottom: 1.25rem;">
                                <div style="padding: 0.85rem 1.25rem; border-bottom: 1px solid #eef0f7; font-weight: 600; color: #32325d;">
                                    Tentang Produk
                                </div>
                                <div style="padding: 1rem 1.25rem; color: #525f7f; font-size: 14px; line-height: 1.6;">
                                    <?php echo nl2br($prd->tentang_produk) ?>
                                </div>
                            </div>

                            <?php if(!empty($prd->img)) : ?>
                            <div style="background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 1px 4px rgba(0,0,0,0.06); text-align: center; padding: 1rem;">
                                <img src="<?= base_url('assets'); ?>/img/<?php echo $prd->img; ?>" style="max-width: 60%; border-radius: 8px;">
                            </div>
                            <?php endif; ?>

                        </div>
                        <!-- End Area yang akan dicetak -->

                    </div>

                    <div class="modal-footer" style="border-top: 1px solid #eef0f7; padding: 1rem 1.5rem;">
                        <button class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
<!--------------------------- End Modal Detail ----------------------------->

<!------------------------------ Modal Update ------------------------------>
        <?php foreach($produk as $prd) : ?>
        <div class="modal fade text-left modal-borderless" id="modal-edit<?php echo $prd->id_produk ?>" tabindex="-1" role="dialog" aria-labelledby="ModalEdit" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Produk : IDP-<?php echo $prd->id_produk ?></h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form form-horizontal" action="<?php echo base_url(). 'Produk/update_produk' ?>" method="post" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>ID Produk</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="id_produk" class="form-control" name="id_produk"
                                                value="<?php echo $prd->id_produk ?>" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Produk</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama_produk" class="form-control" name="nama_produk"
                                                value="<?php echo $prd->nama_produk ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Stok</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="number" id="stok_produk" class="form-control" name="stok_produk"
                                                value="<?php echo $prd->stok_produk ?>">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <input type="text" id="berat_stok_produk" class="form-control" name="berat_stok_produk"
                                                value="<?php echo $prd->berat_stok_produk ?>" style="width: 115%; margin-left: -18px;">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Harga</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="number" id="harga_produk" class="form-control" name="harga_produk"
                                                value="<?php echo $prd->harga_produk ?>">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <input type="text" id="satuan_harga_produk" class="form-control" name="satuan_harga_produk"
                                                value="<?php echo $prd->satuan_harga_produk ?>" style="width: 115%; margin-left: -18px;">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Promo</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="promo" class="form-control" name="promo"
                                                value="<?php echo $prd->promo ?>">
                                        </div>
                                        <div class="form-floating">
                                            <textarea class="form-control" id="floatingTextarea" name="tentang_produk" value="<?php echo $prd->tentang_produk ?>" style="height: 200px;">
                                                <?php echo $prd->tentang_produk ?>
                                            </textarea>
                                            <label for="floatingTextarea" style="margin-left: 10px;">Tentang Produk</label>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Batal</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Submit</span>
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
        </div>
        <?php endforeach ?>
<!--------------------------- End Modal Update ----------------------------->
    </div>
</section>
<script src="<?= base_url('assets'); ?>/vendors/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendors/fontawesome/all.min.js"></script>
<script>
    // Jquery Datatable
    let jquery_datatable = $("#tabelproduk").DataTable()
</script>