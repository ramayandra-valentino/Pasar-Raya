<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Data Transaksi</h5>
            <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal" data-bs-target="#modal-transaksi">
                Input Transaksi
            </button>

<!------------------------------ Modal Input Transaksi ------------------------------>
            <div class="modal fade text-left modal-borderless" id="modal-transaksi" tabindex="-1" role="dialog" aria-labelledby="ModalTransaksi" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Input Transaksi</h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form class="form form-horizontal" id="form-transaksi" action="<?php echo base_url(). 'Transaksi/input_transaksi' ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Pelanggan</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select id="pelanggan_id" class="form-control" name="pelanggan_id" required>
                                            <option value="">-- Pilih Pelanggan --</option>
                                            <?php foreach($pelanggan as $plg) : ?>
                                            <option value="<?php echo $plg->id ?>">
                                                <?php echo $plg->nama_pelanggan ?> (<?php echo $plg->nomor_telp ?>)
                                            </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Nama Penerima</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" name="nama_penerima" placeholder="Nama Penerima" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Nomor WA</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" name="nomor_wa" placeholder="Nomor WhatsApp" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Alamat</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <textarea class="form-control" name="alamat" rows="2" placeholder="Alamat Pengiriman" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 10px;">
                                <h6 style="margin:0;">Daftar Produk</h6>
                                <button type="button" class="btn btn-sm btn-primary" id="btn-tambah-produk">
                                    <i class="bx bx-plus"></i> Tambah Produk
                                </button>
                            </div>

                            <div class="table-responsive">
                                <table class="table" id="table-produk-transaksi">
                                    <thead>
                                        <tr>
                                            <th style="width:30%">Produk</th>
                                            <th style="width:15%">Harga</th>
                                            <th style="width:12%">Qty</th>
                                            <th style="width:15%">Promo</th>
                                            <th style="width:18%">Subtotal</th>
                                            <th style="width:10%"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="body-produk-transaksi">
                                        <tr class="row-produk">
                                            <td>
                                                <select name="id_produk[]" class="form-control select-produk" required>
                                                    <option value="">-- Pilih Produk --</option>
                                                    <?php foreach($produk as $prd) : ?>
                                                    <option value="<?php echo $prd->id_produk ?>" data-harga="<?php echo $prd->harga_produk ?>">
                                                        <?php echo $prd->nama_produk ?>
                                                    </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control harga-produk" readonly value="0">
                                            </td>
                                            <td>
                                                <input type="number" name="qty_produk[]" class="form-control qty-produk" value="1" min="1" required>
                                            </td>
                                            <td>
                                                <select name="promo[]" class="form-control">
                                                    <option value="tidak">Tidak</option>
                                                    <option value="ya">Ya</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control subtotal-produk" readonly value="0">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-danger btn-hapus-baris">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" class="text-end"><strong>Total</strong></td>
                                            <td colspan="2">
                                                <input type="text" id="total-transaksi" class="form-control" readonly value="0">
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
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
<!--------------------------- End Modal Input Transaksi ----------------------------->
        </div>
        <div class="card-body">
            <table class="table" id="tabletransaksi">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pelanggan</th>
                        <th>Whatsapp</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Act</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($transaksi as $trs) : ?>
                    <tr>
                        <form class="form form-horizontal" action="<?php echo base_url(). 'Transaksi/update_status' ?>" method="post">
                        <td>
                            <div class="bg-<?php if($trs->status == 'Selesai') echo 'success'; elseif($trs->status == 'Di Antarkan') echo 'warning'; else echo 'danger';?>" style="color: #fff; border-radius: 5px;padding: 10px 5px 10px 10px;">
                            PR-<input type="text" id="id_produk" class="form-control " name="id_transaksi" value="<?php echo $trs->id_transaksi ?>" readonly style="border: none;background: transparent;padding: 0 0 0 0;margin-top: -24px;margin-left: 28px;width: 10%;color: #fff;">
                            </div>
                        </td>
                        <td><?php echo $trs->nama_pelanggan ?></td>
                        <td align="center">
                            <a href="https://api.whatsapp.com/send?phone=62<?php echo $trs->nomor_wa ?>" target="_blank">
                                <?php echo $trs->nomor_wa ?>
                            </a>
                        </td>
                        <td><?php echo $trs->alamat ?></td>
                        <td class="">
                            <select class="form-select " id="status" name="status" onchange="this.form.submit();">
                                <?php if($trs->status == 'Di Proses') : ?>
                                <option value="Di Proses" selected>Di Proses</option>
                                <option value="Di Antarkan">Di Antarkan</option>
                                <option value="Selesai">Selesai</option>
                                <?php elseif($trs->status == 'Di Antarkan') : ?>
                                <option value="Di Proses">Di Proses</option>
                                <option value="Di Antarkan" selected>Di Antarkan</option>
                                <option value="Selesai">Selesai</option>
                                <?php else : ?>
                                <option value="Di Proses">Di Proses</option>
                                <option value="Di Antarkan">Di Antarkan</option>
                                <option value="Selesai" selected>Selesai</option>
                                <?php endif; ?>
                            </select>
                            </form>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modal-detail<?php echo $trs->id_transaksi ?>">
                                Detail
                            </button>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
<!------------------------------ Modal Detail ------------------------------>
        <?php
            // Samakan nilai ini dengan variabel PROMO_DISKON di JavaScript (bagian bawah file)
            $diskon_persen = 10; // diskon promo dalam persen
        ?>
        <?php foreach ($transaksi as $trs) : ?>
        <div class="modal fade text-left modal-borderless" id="modal-detail<?php echo $trs->id_transaksi ?>" tabindex="-1" role="dialog" aria-labelledby="ModalDetailtransaksi" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content" style="border: none; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">

                    <div class="modal-header" style="background: transparent; padding: 1.25rem 1.5rem; border: none;">
                        <div>
                            <h5 class="modal-title" style="font-weight: 600; margin-bottom: 2px;">
                                <i data-feather="file-text" style="width:18px;height:18px;vertical-align:-3px;margin-right:6px;"></i>
                                Detail Transaksi PR-<?php echo $trs->id_transaksi ?>
                            </h5>
                        </div>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                            aria-label="Close" style="background: rgba(255,255,255,0.2); border: none; color: #fff;">
                            <i data-feather="x"></i>
                        </button>
                    </div>

                    <div class="modal-body" style="padding: 1.5rem; background: #f8f9fc;">

                        <!-- Area yang akan dicetak -->
                        <div id="printarea<?php echo $trs->id_transaksi ?>">

                            <div style="background: #fff; border-radius: 10px; padding: 1rem 1.25rem; margin-bottom: 1.25rem; box-shadow: 0 1px 4px rgba(0,0,0,0.06);">
                                <div style="display:flex; justify-content:space-between; flex-wrap:wrap; gap: 0.75rem;">
                                    <div>
                                        <div style="font-size: 12px; color: #8898aa; text-transform: uppercase; letter-spacing: .05em;">ID Transaksi</div>
                                        <div style="font-weight: 700; font-size: 15px; color: #32325d;">PR-<?php echo $trs->id_transaksi ?></div>
                                    </div>
                                    <div>
                                        <div style="font-size: 12px; color: #8898aa; text-transform: uppercase; letter-spacing: .05em;">Nama Penerima</div>
                                        <div style="font-weight: 700; font-size: 15px; color: #32325d;"><?php echo $trs->nama_penerima ?></div>
                                    </div>
                                    <div>
                                        <div style="font-size: 12px; color: #8898aa; text-transform: uppercase; letter-spacing: .05em;">Tgl Pembelian</div>
                                        <div style="font-weight: 700; font-size: 15px; color: #32325d;"><?php echo $trs->tgl_transaksi ?></div>
                                    </div>
                                    <div>
                                        <div style="font-size: 12px; color: #8898aa; text-transform: uppercase; letter-spacing: .05em;">Alamat</div>
                                        <div style="font-weight: 700; font-size: 15px; color: #32325d;"><?php echo $trs->alamat ?></div>
                                    </div>
                                </div>
                            </div>

                            <div style="background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 1px 4px rgba(0,0,0,0.06);">
                                <div style="padding: 0.85rem 1.25rem; border-bottom: 1px solid #eef0f7; font-weight: 600; color: #32325d;">
                                    Pesanan
                                </div>
                                <div class="table-responsive">
                                    <table class="table mb-0" style="margin-bottom:0;">
                                        <thead>
                                            <tr style="background: #f8f9fc;">
                                                <th style="width: 40%; font-size: 13px; color: #8898aa; text-transform: uppercase; border-top:none;">Produk</th>
                                                <th style="width: 20%; text-align: right; font-size: 13px; color: #8898aa; text-transform: uppercase; border-top:none;">Harga</th>
                                                <th style="width: 15%; text-align: center; font-size: 13px; color: #8898aa; text-transform: uppercase; border-top:none;">Qty</th>
                                                <th style="width: 25%; text-align: right; font-size: 13px; color: #8898aa; text-transform: uppercase; border-top:none;">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $this->db->where('id_transaksi', $trs->id_transaksi);
                                                $detail_transaksi = $this->db->get('detail_transaksi');

                                                $total = 0;
                                                foreach($detail_transaksi->result() as $dtrs) :
                                                    // NOTE: baris ini mengasumsikan tabel detail_transaksi punya kolom "promo" (ya/tidak).
                                                    // Jika kolom belum ada, tambahkan kolomnya dan pastikan
                                                    // controller/model menyimpan nilai promo[] saat input transaksi.
                                                    $ada_promo = isset($dtrs->promo) && $dtrs->promo == 'ya';
                                                    $harga_final = $dtrs->harga_produk;
                                                    if ($ada_promo) {
                                                        $harga_final = $dtrs->harga_produk - ($dtrs->harga_produk * $diskon_persen / 100);
                                                    }
                                                    $subtotal = $harga_final * $dtrs->qty_produk;
                                                    $total += $subtotal;
                                            ?>
                                            <tr>
                                                <td style="color:#32325d;">
                                                    <?php echo $dtrs->nama_produk ?>
                                                    <?php if ($ada_promo) : ?>
                                                        <span style="font-size:11px;color:#2dce89;">(Promo)</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="text-align: right; color:#32325d;">
                                                    <?php if ($ada_promo) : ?>
                                                        <span style="text-decoration:line-through; color:#adb5bd; font-size:12px;">
                                                            <?php echo number_format($dtrs->harga_produk,0,',','.') ?>
                                                        </span><br>
                                                        <?php echo number_format($harga_final,0,',','.') ?>
                                                    <?php else : ?>
                                                        <?php echo number_format($dtrs->harga_produk,0,',','.') ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="text-align: center; color:#32325d;"><?php echo $dtrs->qty_produk ?></td>
                                                <td style="text-align: right; color:#32325d;"><?php echo number_format($subtotal,0,',','.') ?></td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                        <tfoot>
                                            <tr style="background: #f8f9fc;">
                                                <td colspan="3" style="font-weight: 700; text-align: right; color:#32325d;">Total</td>
                                                <td style="font-weight: 700; text-align: right; color:#32325d;"><?php echo number_format($total,0,',','.') ?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <!-- End Area yang akan dicetak -->

                    </div>

                    <div class="modal-footer" style="border-top: 1px solid #eef0f7; padding: 1rem 1.5rem;">
                        <button class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button class="btn btn-sm btn-danger" id="btnPrint" onclick="printPage('printarea<?php echo $trs->id_transaksi ?>', '<?php echo $trs->id_transaksi ?>')">
                            <i data-feather="printer" style="width:14px;height:14px;vertical-align:-2px;margin-right:4px;"></i>
                            Print
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>

<!--------------------------- End Modal Detail ----------------------------->
    </div>
</section>
<script src="assets/vendors/jquery/jquery.min.js"></script>
<script src="assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
<script src="assets/vendors/fontawesome/all.min.js"></script>
<script>
    // Cetak hanya isi modal detail transaksi, tanpa mengubah tampilan/tata letak halaman utama
    function printPage(elId, idTransaksi)
    {
        var contentToPrint = document.getElementById(elId).innerHTML;

        var printWindow = window.open('', '_blank', 'width=800,height=650');

        printWindow.document.open();
        printWindow.document.write(`
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="utf-8">
                <title>Cetak Transaksi PR-${idTransaksi}</title>
                <style>
                    * { box-sizing: border-box; }
                    body {
                        font-family: Arial, Helvetica, sans-serif;
                        padding: 24px;
                        color: #32325d;
                        margin: 0;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-top: 10px;
                    }
                    th, td {
                        padding: 8px 6px;
                        font-size: 13px;
                    }
                    thead tr, tfoot tr {
                        background: #f2f2f2 !important;
                        -webkit-print-color-adjust: exact;
                        print-color-adjust: exact;
                    }
                    table, th, td {
                        border: 1px solid #ccc;
                    }
                    .badge {
                        display: inline-block;
                        padding: 4px 8px;
                        border-radius: 4px;
                        color: #fff;
                        font-size: 12px;
                    }
                    .bg-success { background: #2dce89 !important; }
                    .bg-warning { background: #fb6340 !important; }
                    .bg-danger  { background: #f5365c !important; }
                    h3 {
                        margin: 0 0 12px 0;
                    }
                    @media print {
                        body { padding: 10px; }
                    }
                </style>
            </head>
            <body>
                ${contentToPrint}
            </body>
            </html>
        `);
        printWindow.document.close();

        printWindow.onload = function () {
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        };
    }

    // Jquery Datatable
    let jquery_datatable = $("#tabletransaksi").DataTable()
</script>

<script>
$(document).ready(function () {

    // Samakan nilai ini dengan $diskon_persen di PHP (bagian Modal Detail di atas)
    var PROMO_DISKON = 10; // diskon promo dalam persen

    function tambahBarisProduk() {
        let baris = $('#body-produk-transaksi .row-produk:first').clone();
        baris.find('select.select-produk').val('');
        baris.find('.harga-produk').val('0');
        baris.find('.qty-produk').val('1');
        baris.find('.subtotal-produk').val('0');
        baris.find('select[name="promo[]"]').val('tidak');
        $('#body-produk-transaksi').append(baris);
        updateProdukOptions();
    }

    $('#btn-tambah-produk').on('click', function () {
        tambahBarisProduk();
    });

    $('#body-produk-transaksi').on('click', '.btn-hapus-baris', function () {
        if ($('#body-produk-transaksi .row-produk').length > 1) {
            $(this).closest('tr').remove();
            hitungTotal();
            updateProdukOptions();
        }
    });

    // Cegah memilih produk yang sama pada baris berbeda
    $('#body-produk-transaksi').on('change', '.select-produk', function () {
        let baris = $(this).closest('tr');
        let selectedVal = $(this).val();

        let sudahDipilih = false;
        $('.select-produk').not(this).each(function () {
            if (selectedVal !== '' && $(this).val() === selectedVal) {
                sudahDipilih = true;
            }
        });

        if (sudahDipilih) {
            alert('Produk ini sudah dipilih pada baris lain. Silakan pilih produk yang berbeda.');
            $(this).val('');
            baris.find('.harga-produk').val(0);
            hitungSubtotal(baris);
            updateProdukOptions();
            return;
        }

        let harga = $(this).find('option:selected').data('harga') || 0;
        baris.find('.harga-produk').val(harga);
        hitungSubtotal(baris);
        updateProdukOptions();
    });

    // Nonaktifkan pilihan produk yang sudah dipilih di baris lain
    function updateProdukOptions() {
        let selectedValues = [];
        $('.select-produk').each(function () {
            let val = $(this).val();
            if (val) selectedValues.push(val);
        });

        $('.select-produk').each(function () {
            let currentSelect = $(this);
            let currentVal = currentSelect.val();
            currentSelect.find('option').each(function () {
                let optVal = $(this).val();
                if (optVal === '') return;
                if (selectedValues.includes(optVal) && optVal !== currentVal) {
                    $(this).prop('disabled', true);
                } else {
                    $(this).prop('disabled', false);
                }
            });
        });
    }

    $('#body-produk-transaksi').on('input', '.qty-produk', function () {
        let baris = $(this).closest('tr');
        hitungSubtotal(baris);
    });

    // Hitung ulang subtotal saat promo diubah
    $('#body-produk-transaksi').on('change', 'select[name="promo[]"]', function () {
        let baris = $(this).closest('tr');
        hitungSubtotal(baris);
    });

    function hitungSubtotal(baris) {
        let harga = parseFloat(baris.find('.harga-produk').val()) || 0;
        let qty = parseFloat(baris.find('.qty-produk').val()) || 0;
        let promo = baris.find('select[name="promo[]"]').val();

        let subtotal = harga * qty;
        if (promo === 'ya') {
            subtotal = subtotal - (subtotal * PROMO_DISKON / 100);
        }

        baris.find('.subtotal-produk').val(subtotal);
        hitungTotal();
    }

    function hitungTotal() {
        let total = 0;
        $('.subtotal-produk').each(function () {
            total += parseFloat($(this).val()) || 0;
        });
        $('#total-transaksi').val(total);
    }

    // Set kondisi awal saat halaman dimuat
    updateProdukOptions();

});
</script>