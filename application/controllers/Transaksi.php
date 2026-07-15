<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_transaksi');
        $this->load->model('Model_pelanggan');
        $this->load->model('Model_produk');
    }

    function index()
    {
        check_not_login();
        $data['transaksi']        = $this->Model_transaksi->view_transaksi();
        $data['detail_transaksi'] = $this->Model_transaksi->detail_transaksi();
        $data['pelanggan']        = $this->Model_pelanggan->view_pelanggan()->result();
        $data['produk']           = $this->Model_produk->view_produk()->result();

        $this->load->view('templates/header');
        $this->load->view('transaksi/index', $data);
        $this->load->view('templates/footer');
    }

    function edit_status($id_transaksi)
    {
        $where = array('id_transaksi' => $id_transaksi);
        $data['transaksi'] = $this->Model_transaksi->edit_status($where, 'transaksi')->result();
    }

    function update_status()
    {
        $id_transaksi   = $this->input->post('id_transaksi');
        $status         = $this->input->post('status');

        $data = array(
            'status' => $status
        );
        $where = array('id_transaksi' => $id_transaksi);
        $this->Model_transaksi->update_status($where, $data, 'transaksi');
        redirect('transaksi');
    }

    // =================================================================
    // INPUT TRANSAKSI DENGAN BANYAK PRODUK SEKALIGUS
    // =================================================================
    function input_transaksi()
    {
        check_not_login();

        $id_pelanggan  = $this->input->post('pelanggan_id');
        $nama_penerima = $this->input->post('nama_penerima');
        $nomor_wa      = $this->input->post('nomor_wa');
        $alamat        = $this->input->post('alamat');
        $id_produk     = $this->input->post('id_produk');   // array
        $qty_produk    = $this->input->post('qty_produk');  // array
        $promo         = $this->input->post('promo');       // array

        if (empty($id_pelanggan) || empty($id_produk) || empty($qty_produk)) {
            $this->session->set_flashdata('error', 'Data transaksi tidak lengkap.');
            redirect('transaksi');
            return;
        }

        // Ambil nama_pelanggan dari DB untuk disimpan sebagai snapshot
        // di tabel transaksi (sesuai kolom nama_pelanggan yang memang ada).
        $pelanggan = $this->Model_pelanggan->edit_pelanggan(
            array('id' => $id_pelanggan),
            'pelanggan'
        )->row();

        if ($pelanggan === null) {
            $this->session->set_flashdata('error', 'Pelanggan tidak ditemukan.');
            redirect('transaksi');
            return;
        }

        $detail_rows = array();

        // Snapshot nama & harga produk diambil dari DB (bukan dari form)
        // supaya tidak bisa dimanipulasi dari sisi client.
        foreach ($id_produk as $index => $produk_id) {

            if (empty($produk_id)) {
                continue;
            }

            $produk = $this->Model_transaksi->get_produk($produk_id);
            if ($produk === null) {
                continue;
            }

            $jumlah = isset($qty_produk[$index]) ? (int) $qty_produk[$index] : 0;
            if ($jumlah <= 0) {
                continue;
            }

            $detail_rows[] = array(
                'id_produk'    => $produk->id_produk,
                'nama_produk'  => $produk->nama_produk,
                'harga_produk' => $produk->harga_produk,
                'promo'        => isset($promo[$index]) ? $promo[$index] : 'tidak',
                'qty_produk'   => $jumlah,
            );
        }

        if (empty($detail_rows)) {
            $this->session->set_flashdata('error', 'Tidak ada produk valid pada transaksi ini.');
            redirect('transaksi');
            return;
        }

        // 1. Insert header transaksi
        $data_transaksi = array(
            'id'             => $id_pelanggan,
            'nama_pelanggan' => $pelanggan->nama_pelanggan,
            'nama_penerima'  => $nama_penerima,
            'nomor_wa'       => $nomor_wa,
            'alamat'         => $alamat,
            'status'         => 'diproses',
            // tgl_transaksi tidak diisi, sudah ada default di DB
        );
        $id_transaksi = $this->Model_transaksi->insert_transaksi($data_transaksi);

        // 2. Lengkapi id_transaksi di setiap baris detail, lalu insert sekaligus
        foreach ($detail_rows as &$row) {
            $row['id_transaksi'] = $id_transaksi;
        }
        unset($row);

        $this->Model_transaksi->insert_detail_transaksi($detail_rows);

        $this->session->set_flashdata('success', 'Transaksi berhasil disimpan.');
        redirect('transaksi');
    }
}