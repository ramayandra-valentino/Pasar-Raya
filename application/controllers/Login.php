<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
    	check_already_login();
        $this->load->view('dashboard/login');
    }
    public function process()
    {
    	$post = $this->input->post(null, TRUE);
		if(isset($post['login']))
		{
			$this->load->model('Model_user');
			$query = $this->Model_user->login($post);
			if($query->num_rows() > 0)
			{
				$row = $query->row();
				$params = array(
				'userid' => $row->userid,
				'level' => $row->level
				);
				$this->session->set_userdata($params);
				echo "<script>

				alert('Login Sukses');
				window.location='".site_url('dashboard')."';

				</script>";
			}
			else
			{
				// $this->session->set_flashdata('error', 'Gagal');
				// redirect('login');
				echo"<script>
				alert('Username atau Password Salah, Login Gagal');
				window.location='".site_url('Login/index')."';
				</script>";
			}
		}
    }
    public function logout()
    {
    	$params = array("userid", "level");
    	$this->session->unset_userdata($params);
    	redirect('Login/index');
    }
}
