<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends ED_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function error_404()
	{
		/* Config Halaman */
		$this->data['_head_title'] = 'Error 404';
		$this->data['_header_title'] = 'Error 404';
		$this->data['_header_sub_title'] = "";
		$this->data['_sidebar_focus'] = '';

		/* Load Halaman */
		$this->_load_errors_page('error_404');
	}

}

/* End of file Errors.php */
/* Location: ./application/controllers/Errors.php */