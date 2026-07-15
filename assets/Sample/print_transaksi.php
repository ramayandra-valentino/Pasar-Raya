<div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="text-bold-500">ID transaksi</td>
                                        <td style="font-weight: bold;">PR-<?php echo $trs->id_transaksi ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">Nama Penerima</td>
                                        <td style="font-weight: bold;"><?php echo $trs->nama_penerima ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">Tgl Pembelian</td>
                                        <td style="font-weight: bold;"><?php echo $trs->tgl_transaksi ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">Pesanan</td>
                                    </tr>
                                    <?php
                                        $this->db->where('id_transaksi', $trs->id_transaksi); 
                                        $detail_transaksi = $this->db->get('detail_transaksi');

                                        $total = 0;
                                        foreach($detail_transaksi->result() as $dtrs) : 
                                        $subtotal = $dtrs->harga_produk * $dtrs->qty_produk;
                                        $total += $subtotal;
                                    ?>
                                    <tr style="border: 1px solid black;">
                                        <td style="width: 25%; border: 1px solid black;"><?php echo $dtrs->nama_produk ?></td>
                                        <td style="width: 15%; text-align: right; border: 1px solid black;"><?php echo number_format($dtrs->harga_produk,0,',','.') ?></td>
                                        <td style="width: 10%; text-align: center; border: 1px solid black;"><?php echo $dtrs->qty_produk ?></td>
                                        <td style="width: 15%; text-align: right; border: 1px solid black;"><?php echo number_format($subtotal,0,',','.') ?></td>
                                    </tr>
                                    <?php endforeach ?>
                                    <tr>
                                        <td colspan="3" style="font-weight: bold; text-align: center;">Total</td>
                                        <td style="width: 15%; text-align: right;"><?php echo number_format($total,0,',','.') ?></td>
                                    </tr>
                                    <tr>
                                    </tr>
                                </tbody>
                            </table>
                        </div>