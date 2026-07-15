<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function index()
    {
        check_not_login();
        check_admin();
    	$data['pelanggan'] = $this->Model_pelanggan->view_pelanggan()->result();
        $this->load->view('templates/header');
        $this->load->view('pelanggan/index', $data);
        $this->load->view('templates/footer');
    }
    public function input_pelanggan()
    {
    	$id					= $this->input->post('id');
    	$nama_pelanggan		= $this->input->post('nama_pelanggan');
    	$nomor_telp			= $this->input->post('nomor_telp');
    	$password			= $this->input->post('password');

    	$data = array(
    		'id'				=> $id,
    		'nama_pelanggan'	=> $nama_pelanggan,
    		'nomor_telp'		=> $nomor_telp,
    		'password'			=> $password
    	);

    	$this->Model_pelanggan->input_pelanggan($data, 'pelanggan');
    	redirect('pelanggan');
    }

    public function edit_pelanggan($id)
    {
        $where = array('id' => $id);
        $data['pelanggan'] = $this->Model_pelanggan->edit_pelanggan($where, 'pelanggan')->result();
    }
    public function update_pelanggan()
    {
        $id             = $this->input->post('id');
        $nama_pelanggan	= $this->input->post('nama_pelanggan');
        $nomor_telp		= $this->input->post('nomor_telp');
        $password      	= $this->input->post('password');

        $data = array(
            'nama_pelanggan'	=> $nama_pelanggan,
            'nomor_telp'           => $nomor_telp,
            'password'     		=> $password
        );
        $where = array('id' => $id);
        $this->Model_pelanggan->update_pelanggan($where, $data, 'pelanggan');
        redirect('pelanggan');
    }
    public function hapus_pelanggan($id)
    {
        $where = array('id' => $id);
        $this->Model_pelanggan->hapus_pelanggan($where,'pelanggan');
        redirect('pelanggan');
    }
}
