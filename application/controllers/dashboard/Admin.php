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
		if ($this->session->userdata('user_level') == '3') {
			$where['nama'] = $this->session->userdata('user_name');
			$this->data["pegawai"] = $this->m_pegawai->get_by($where, "result",NULL,NULL,"nama");
		} else {
			$this->data["pegawai"] = $this->m_pegawai->get("result",NULL,NULL,"nama");
		}
		$this->data["giat"] = $this->m_laporan->select_distinct_giat();
		// $where['is_hapus'] = '0';
		// $this->data['laporan'] = $this->m_laporan->get_by($where,"result", NULL, NuLL, 'date_created');
		// $this->data["_tabel"] = $this->load->view('contents/admin/_tabel', $this->data, TRUE);

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
	}

	public function filter()
	{
		$petugas = $this->input->post('petugas');
		$seksi = $this->input->post('seksi');
		$giat = $this->input->post('giat');
		$rw = $this->input->post('rw');
		$rt = $this->input->post('rt');

		$where['is_hapus'] = '0';
		$where['petugas'] = $petugas;
		$where['seksi like'] = $seksi;
		$where['giat like'] = $giat;
		$where['rw like'] = $rw;
		$where['rt like'] = $rt;
		$this->data['laporan'] = $this->m_laporan->select_filter($petugas, $seksi, $giat, $rw, $rt);
		$this->data['cetak'] = '';
		$this->data['status'] = '';
		$this->_load_only_view('admin/_tabel');
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/dashboard/Dashboard.php */