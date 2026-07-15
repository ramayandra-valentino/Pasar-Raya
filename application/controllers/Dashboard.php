<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
    	check_not_login();
    	check_admin();
        $data['produk'] = $this->Model_produk->view_stok()->result();
        $data['transaksi'] = $this->Model_transaksi->view_pesanan();
        $this->load->view('templates/header');
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }
}
