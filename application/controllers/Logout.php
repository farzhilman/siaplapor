<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends ED_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// $this->save_aktivitas(NULL, 'Logout');
		$this->session->sess_destroy();
		redirect('');

		// echo  "<script type='text/javascript'>";
	 //    echo "window.close();";
	 //    echo "</script>";
	}

}

/* End of file Logout.php */
/* Location: ./application/controllers/Logout.php */