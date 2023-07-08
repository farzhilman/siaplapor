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
		$this->data['_head_title'] = 'Siap Lapor Ketintang';
		$this->data['status'] = '';
		$this->data['cetak'] = '';
		$where['is_hapus'] = '0';
		$this->data['laporan'] = $this->m_laporan->get_by($where,"result", NULL, NuLL, 'date_created');
		$this->data["_tabel"] = $this->load->view('contents/admin/_tabel', $this->data, TRUE);;

		$this->_load_view_dashboard('admin/index');
	}

	public function excel()
	{
		$this->data['_head_title'] = 'Excel Siap Lapor Ketintang';
		$this->data['cetak'] = 't';
		$this->data['status'] = '';
		$this->data['nama_file'] = 'Report Siap Lapor Ketintang - '.date('mdY - Hi');
		$where['is_hapus'] = '0';
		$this->data['laporan'] = $this->m_laporan->get_by($where,"result", NULL, NuLL, 'date_created');
		$this->data['__head_page'] = $this->load->view('components/head', $this->data, TRUE);
		$this->data['__script_page'] = $this->load->view('components/script', $this->data, TRUE);
		$this->data['__content_page'] = $this->load->view('contents/admin/_tabel', $this->data, TRUE);

		/* Load view Dashboard */
		$this->load->view('dashboard_bersih_excel', $this->data);

		$this->_load_view_dashboard('admin/index');
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/dashboard/Dashboard.php */