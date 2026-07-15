<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function index()
    {
        check_not_login();
        check_admin();
    	$data['produk'] = $this->Model_produk->view_produk()->result();
        $this->load->view('templates/header');
        $this->load->view('produk/index', $data);
        $this->load->view('templates/footer');
    }
    public function input_produk()
    {
    	$id_produk				= $this->input->post('id_produk');
    	$nama_produk			= $this->input->post('nama_produk');
    	$stok_produk			= $this->input->post('stok_produk');
    	$berat_stok_produk		= $this->input->post('berat_stok_produk');
    	$harga_produk			= $this->input->post('harga_produk');
    	$satuan_harga_produk	= $this->input->post('satuan_harga_produk');
    	$tentang_produk			= $this->input->post('tentang_produk');	
    	$promo					= $this->input->post('promo');
    	$img					= $_FILES['img'];
    	if ($img = '')
    	{}
    	else
    	{
    		$config ['upload_path'] = './assets/img';
    		$config ['allowed_types'] = 'jpg|jpeg|png';

    		$this->load->library('upload', $config);
    		if(!$this->upload->do_upload('img'))
    		{
    			echo "Gambar gagal di Upload";
    		}
    		else
    		{
    			$img = $this->upload->data('file_name');
    		}
    	}

    	$data = array(
    		'id_produk'				=> $id_produk,
    		'nama_produk'			=> $nama_produk,
    		'stok_produk'			=> $stok_produk,
    		'berat_stok_produk'		=> $berat_stok_produk,
    		'harga_produk'			=> $harga_produk,
    		'satuan_harga_produk'	=> $satuan_harga_produk,
    		'tentang_produk'		=> $tentang_produk,
    		'promo'					=> $promo,
    		'img'					=> $img
    	);

    	$this->Model_produk->input_produk($data, 'produk');
    	redirect('produk');
    }

    public function edit_produk($id_produk)
    {
        $where = array('id_produk' => $id_produk);
        $data['produk'] = $this->Model_produk->edit_produk($where, 'produk')->result();
    }
    public function update_produk()
    {
        $id_produk              = $this->input->post('id_produk');
        $nama_produk            = $this->input->post('nama_produk');
        $stok_produk            = $this->input->post('stok_produk');
        $berat_stok_produk      = $this->input->post('berat_stok_produk');
        $harga_produk           = $this->input->post('harga_produk');
        $satuan_harga_produk    = $this->input->post('satuan_harga_produk');
        $tentang_produk         = $this->input->post('tentang_produk'); 
        $promo                  = $this->input->post('promo');

        $data = array(
            'nama_produk'           => $nama_produk,
            'stok_produk'           => $stok_produk,
            'berat_stok_produk'     => $berat_stok_produk,
            'harga_produk'          => $harga_produk,
            'satuan_harga_produk'   => $satuan_harga_produk,
            'tentang_produk'        => $tentang_produk,
            'promo'                 => $promo
        );
        $where = array('id_produk' => $id_produk);
        $this->Model_produk->update_produk($where, $data, 'produk');
        redirect('produk');
    }
    public function hapus_produk($id_produk)
    {
        $where = array('id_produk' => $id_produk);
        $this->Model_produk->hapus_produk($where,'produk');
        redirect('produk');
    }
}
