<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Data Pelanggan</h5>
            <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal" data-bs-target="#modal-pelanggan">
                Input Pelanggan
            </button>
<!------------------------------ Modal Insert ------------------------------>
            <div class="modal fade text-left modal-borderless" id="modal-pelanggan" tabindex="-1" role="dialog" aria-labelledby="ModalPelanggan" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Input Pelanggan</h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form form-horizontal" action="<?php echo base_url(). 'Pelanggan/input_pelanggan' ?>" method="post" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>ID Pelanggan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="id" class="form-control" name="id"
                                                placeholder="ID Pelanggan">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nama Pelanggan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama_pelanggan" class="form-control" name="nama_pelanggan"
                                                placeholder="Nama Pelanggan">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nomor Telepon</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nomor_telp" class="form-control" name="nomor_telp"
                                                placeholder="Nomor Telepon">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Password</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="password" id="password" class="form-control" name="password"
                                                placeholder="Password">
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
            <table class="table" id="tablePelanggan">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pelanggan</th>
                        <th>No Telp.</th>
                        <th>Act</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($pelanggan as $plg) : ?>
                    <tr>
                        <td><?php echo $plg->id ?></td>
                        <td><?php echo $plg->nama_pelanggan ?></td>
                        <td><?php echo $plg->nomor_telp ?></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modal-detail<?php echo $plg->id ?>">
                                Detail
                            </button>
                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modal-edit<?php echo $plg->id ?>">
                                Edit
                            </button>
                            <a href="<?php echo base_url('Pelanggan/hapus_pelanggan/').$plg->id ?>" class="btn btn-sm btn-danger">
                                Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <!------------------------------ Modal Detail ------------------------------>
        <?php foreach($pelanggan as $plg) : ?>
        <div class="modal fade text-left modal-borderless" id="modal-detail<?php echo $plg->id ?>" tabindex="-1" role="dialog" aria-labelledby="ModalDetailProduk" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content" style="border: none; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">

                    <div class="modal-header" style="background: transparent; padding: 1.25rem 1.5rem; border: none;">
                        <div>
                            <h5 class="modal-title" style="font-weight: 600; margin-bottom: 2px;">
                                <i data-feather="user" style="width:18px;height:18px;vertical-align:-3px;margin-right:6px;"></i>
                                Detail Pelanggan ID-<?php echo $plg->id ?>
                            </h5>
                        </div>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                            aria-label="Close" style="background: rgba(255,255,255,0.2); border: none; color: #fff;">
                            <i data-feather="x"></i>
                        </button>
                    </div>

                    <div class="modal-body" style="padding: 1.5rem; background: #f8f9fc;">

                        <div style="background: #fff; border-radius: 10px; padding: 1rem 1.25rem; margin-bottom: 1.25rem; box-shadow: 0 1px 4px rgba(0,0,0,0.06);">
                            <div style="display:flex; justify-content:space-between; flex-wrap:wrap; gap: 0.75rem;">
                                <div>
                                    <div style="font-size: 12px; color: #8898aa; text-transform: uppercase; letter-spacing: .05em;">ID Pelanggan</div>
                                    <div style="font-weight: 700; font-size: 15px; color: #32325d;"><?php echo $plg->id ?></div>
                                </div>
                                <div>
                                    <div style="font-size: 12px; color: #8898aa; text-transform: uppercase; letter-spacing: .05em;">Nama Pelanggan</div>
                                    <div style="font-weight: 700; font-size: 15px; color: #32325d;"><?php echo $plg->nama_pelanggan ?></div>
                                </div>
                                <div>
                                    <div style="font-size: 12px; color: #8898aa; text-transform: uppercase; letter-spacing: .05em;">Nomor Telepon</div>
                                    <div style="font-weight: 700; font-size: 15px; color: #32325d;"><?php echo $plg->nomor_telp ?></div>
                                </div>
                            </div>
                        </div>

                        <div style="background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 1px 4px rgba(0,0,0,0.06);">
                            <!-- <div style="padding: 0.85rem 1.25rem; border-bottom: 1px solid #eef0f7; font-weight: 600; color: #32325d;">
                                Kredensial Akun
                            </div> -->
                            <div class="table-responsive">
                                <table class="table mb-0" style="margin-bottom:0;">
                                    <!-- <thead>
                                        <tr style="background: #f8f9fc;">
                                            <th style="width: 50%; font-size: 13px; color: #8898aa; text-transform: uppercase; border-top:none;">Field</th>
                                            <th style="width: 50%; font-size: 13px; color: #8898aa; text-transform: uppercase; border-top:none;">Value</th>
                                        </tr>
                                    </thead> -->
                                    <tbody>
                                        <tr>
                                            <td style="color:#32325d;">Password</td>
                                            <td style="color:#32325d;"><?php echo $plg->password ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

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
        <?php foreach($pelanggan as $plg) : ?>
        <div class="modal fade text-left modal-borderless" id="modal-edit<?php echo $plg->id ?>" tabindex="-1" role="dialog" aria-labelledby="ModalEdit" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Produk : ID-<?php echo $plg->id ?></h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form form-horizontal" action="<?php echo base_url(). 'Pelanggan/update_pelanggan' ?>" method="post" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>ID Pelanggan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="id" class="form-control" name="id"
                                                value="<?php echo $plg->id ?>" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nama Pelanggan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama_pelanggan" class="form-control" name="nama_pelanggan"
                                                value="<?php echo $plg->nama_pelanggan ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nomor Telepon</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nomor_telp" class="form-control" name="nomor_telp"
                                                value="<?php echo $plg->nomor_telp ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Password</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="password" id="password" class="form-control" name="password"
                                                value="<?php echo $plg->password ?>">
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
<script src="assets/vendors/jquery/jquery.min.js"></script>
<script src="assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
<script src="assets/vendors/fontawesome/all.min.js"></script>
<script>
    // Jquery Datatable
    let jquery_datatable = $("#tablePelanggan").DataTable()
</script>