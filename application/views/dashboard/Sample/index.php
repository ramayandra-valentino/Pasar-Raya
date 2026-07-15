<section class="row">
    <div class="col-12 col-lg-9">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="height: 110px;">
                        <h3>Dashboard Admin</h3>                                           
                        <h6 class="text-muted mb-0">Selamat Datang Admin Pasar Raya</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <div class="card" >
            <div class="card-body" style="height: 110px;">
                <div class="d-flex align-items-center">
                    <div class="ms-3 name">
                        <h5 class="font-bold">@<?=$this->fungsi->user_login()->username?></h5>
                        <h6 class="text-muted mb-0"><?=$this->fungsi->user_login()->nama?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="row" id="basic-table">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Stok Produk</h4>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table mb-0 table-lg" id="tablestokprd">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Produk</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($produk as $prd) : ?>
                                <tr>
                                    <td><?php echo $prd->id_produk ?></td>
                                    <td><?php echo $prd->nama_produk ?></td>
                                    <td align="right"><?php echo $prd->stok_produk ?> <?php echo $prd->berat_stok_produk; ?></td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card" id="tbpesanan">
                <div class="card-header">
                    <h4 class="card-title">Daftar Pesanan</h4>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table mb-0 table-lg" id="tablepesanan">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($transaksi as $trs) : ?>
                                <tr>
                                    <td>PR-<?php echo $trs->id_transaksi ?></td>
                                    <td><?php echo $trs->tgl_transaksi ?></td>
                                    <td>
                                        <span class="badge bg-<?php if($trs->status == 'Selesai') echo 'success'; elseif($trs->status == 'Di Antarkan') echo 'warning'; else echo 'danger';?>" style="width: 100px;">
                                            <?php echo $trs->status ?>
                                        </span>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="assets/vendors/jquery/jquery.min.js"></script>
<script src="assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
<script src="assets/vendors/fontawesome/all.min.js"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $('.tablepesanan').refresh();
    });
    function refresh()
    {
        setTimeout(function()
        {
            $('.tablepesanan').fadeOut('slow').fadeIn('slow');
            refresh();
        }, 200);
    };
</script>