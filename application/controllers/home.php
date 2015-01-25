<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
	}

	public function index()
	{
		show_error("fghfghfdgh");
		//$data['body'] = 'pages/welcome_message';
		//$this->load->view('layout/all',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */