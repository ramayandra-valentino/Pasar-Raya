<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_produk extends CI_Model
{
	public function view_produk()
	{
		return $this->db->get('produk');
	}
	public function view_stok()
	{
		$this->db->order_by('stok_produk', 'ASC');
		return $this->db->get('produk', 5);
	}
	public function input_produk($data, $table)
	{
		$this->db->insert($table, $data);
	}
	public function edit_produk($where, $table)
	{
		return $this->db->get_where($tabel, $where);
	}
	public function update_produk($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	public function hapus_produk($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}
?>