<?php

	Class Fungsi
	{
		protected $ci;

		function __construct()
		{
			$this->ci =& get_instance();
		}

		function user_login()
		{
			$this->ci->load->model('Model_user');
			$user_id = $this->ci->session->userdata('userid');
			$user_data = $this->ci->Model_user->get($user_id);
			return $user_data;
		}
	}