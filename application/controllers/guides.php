<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
	}

	public function index()
	{
		$data['body'] = 'pages/welcome_message';
		$this->load->view('layout/all',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */