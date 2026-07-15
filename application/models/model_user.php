<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{
	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('username',$post['username']);
		$this->db->where('password',sha1($post['password']));
		$query = $this->db->get();
		return $query;
	}

	public function get($userid = null)
	{
		$this->db->from('admin');
		if($userid != null)
		{
			$this->db->where('userid',$userid);
		}
		$query = $this->db->get()->row();
		return $query;
	}
}