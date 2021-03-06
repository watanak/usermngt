<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_Model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

	}

	// This function is for checking the posted login values with the database table
	function check_user_login()
	{
		$user_id = $this->input->post('user_id');
		$user_password = $this->input->post('user_password');

		/**set cookie if remember me is clicked**/
		/*
		 if($this->input->post('rememberme') == 'rememberme')
		 {
			$expire = time()+60*60*24*1;//cookie set for a day
			$cookie = array(
			'name'   => 'login_username',
			'value'  => $username,
			'expire' => $expire
			);
			$this->input->set_cookie($cookie);
			$cookie['name'] = 'login_password';
			$cookie['value'] = $password;
			$this->input->set_cookie($cookie);
			$cookie['name'] = 'rememberme';
			$cookie['value'] = 'true';
			$this->input->set_cookie($cookie);
			}
			*/

		$this->db->select('*');
		$this->db->from('login_users');
		$this->db->where('email', $user_id);
		$this->db->where('password', md5($user_password));
		$this->db->where('status_id', 1);

		$result = $this->db->get();

		if ($result->num_rows() == 0) {
			return false;
		} else {
			return $result->row_array();
		}

		return false;
	}

};


/* End of file login_model.php */
/* Location: ./system/application/models/login_model.php */
