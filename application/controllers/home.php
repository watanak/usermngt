<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		// Load the necessary stuff...
		// $this->lang->load('general');

	}

	public function index()
	{
		$this->load->view("template/header");
		$this->load->view("index_view");
		$this->load->view("template/footer");
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */