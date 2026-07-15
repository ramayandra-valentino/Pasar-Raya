<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pelanggan extends CI_Model
{
	public function view_pelanggan()
	{
		return $this->db->get('pelanggan');
	}
	public function input_pelanggan($data, $table)
	{
		$this->db->insert($table, $data);
	}
	public function edit_pelanggan($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	public function update_pelanggan($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	public function hapus_pelanggan($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}
?>