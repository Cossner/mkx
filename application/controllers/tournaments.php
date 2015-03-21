<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tournaments extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->model('frontend');
	}

	public function index()
	{
		$table = $this->frontend->getTableOrderNewest('tournament');
		$data['body'] = 'pages/tournaments';
		$this->load->view('layout/all',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */