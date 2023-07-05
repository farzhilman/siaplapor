<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends ED_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if (!$this->session->has_userdata('user_level')) {
			redirect('login');
			// redirect('https://eplanning.surabaya.go.id/');
		}
	}

	public function index($t = '')
	{
		$this->data['status'] = '';
		$where['is_hapus'] = '0';
		$this->data['laporan'] = $this->m_laporan->get_by($where,"result", NULL, NuLL, 'date_created');
		$this->data["_tabel"] = $this->load->view('contents/admin/_tabel', $this->data, TRUE);;

		$this->_load_view_dashboard('admin/index');
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/dashboard/Dashboard.php */