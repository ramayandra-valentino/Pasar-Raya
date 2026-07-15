<?php
class Model_transaksi extends CI_Model
{
	public function view_transaksi()
	{
		$this->db->order_by('tgl_transaksi', 'DESC');
		$result = $this->db->get('transaksi');
		if($result->num_rows() > 0)
		{
			return $result->result();
		}
	}

	public function view_pesanan()
	{
		$this->db->order_by('tgl_transaksi', 'DESC');
		$result = $this->db->get('transaksi', 6);
		if($result->num_rows() > 0)
		{
			return $result->result();
		}
	}

	// FIX: sebelumnya "$this->db->from('transaksi')->get('detail_transaksi')"
	// menghasilkan CROSS JOIN (SELECT * FROM transaksi, detail_transaksi
	// tanpa ON), sehingga baris data bisa terduplikasi. Diganti jadi
	// query biasa ke detail_transaksi saja, karena id_transaksi sudah
	// ada di tabel ini untuk dicocokkan manual di view/controller.
	public function detail_transaksi()
	{
		$result = $this->db->get('detail_transaksi');
		if($result->num_rows() > 0)
		{
			return $result->result();
		}
	}

	public function edit_status($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function update_status($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	// =================================================================
	// TAMBAHAN UNTUK INPUT TRANSAKSI
	// =================================================================

	/**
	 * Ambil data produk dari DB (bukan dari input form) supaya nama &
	 * harga tidak bisa dimanipulasi dari sisi client. Disimpan sebagai
	 * snapshot di detail_transaksi (sesuai kolom nama_produk & harga_produk
	 * yang memang ada di tabel tersebut).
	 */
	public function get_produk($id_produk)
	{
		$result = $this->db->select('id_produk, nama_produk, harga_produk')
							->from('produk')
							->where('id_produk', $id_produk)
							->get();
		if ($result->num_rows() > 0) {
			return $result->row();
		}
		return null;
	}

	/**
	 * Insert baris header transaksi.
	 * $data contoh: [
	 *     'id'             => 1,                 // id pelanggan
	 *     'nama_pelanggan' => 'Budi',
	 *     'nama_penerima'  => 'Budi',
	 *     'nomor_wa'       => '08123456789',
	 *     'alamat'         => 'Jl. Contoh No. 1',
	 *     'status'         => 'diproses'
	 *     // tgl_transaksi tidak perlu diisi, sudah ada default di DB
	 * ]
	 * Return: id_transaksi yang baru dibuat (insert_id)
	 */
	public function insert_transaksi($data)
	{
		$this->db->insert('transaksi', $data);
		return $this->db->insert_id();
	}

	/**
	 * Insert banyak baris sekaligus ke detail_transaksi.
	 * $data_detail = array of associative array, contoh salah satu elemen:
	 * [
	 *     'id_transaksi'  => 10,
	 *     'id_produk'     => 3,
	 *     'nama_produk'   => 'Beras 5kg',
	 *     'harga_produk'  => 65000,
	 *     'promo'         => 'tidak',
	 *     'qty_produk'    => 2
	 * ]
	 */
	public function insert_detail_transaksi($data_detail)
	{
		return $this->db->insert_batch('detail_transaksi', $data_detail);
	}
}