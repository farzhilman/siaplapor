<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends ED_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
	}

	public function index($id = NULL)
	{
		$where['id'] = $id;
		$this->data['kunju'] = $this->m_kunjungan->get_by($where, "row");
		
		$this->data['_head_title'] = 'Kuisioner';
		$this->data['_apps_title'] = ' | Bappedalitbang Surabaya';
		$this->data['__head_page'] = $this->load->view('components/head', $this->data, TRUE);
		$this->data['__navbar_page'] = $this->load->view('components/navbar', $this->data, TRUE);
		$this->data['__footer_page'] = $this->load->view('components/footer', $this->data, TRUE);
		$this->data['__script_page'] = $this->load->view('components/script', $this->data, TRUE);
		$this->data['__content_page'] = $this->load->view('cetak', $this->data, TRUE);
		$this->load->view('welcome', $this->data);
	}

	public function preview($id = NULL)
	{
		$where['id'] = $id;
		$this->data['kunju'] = $this->m_kunjungan->get_by($where, "row");

		$this->data['_head_title'] = 'Kuisioner Preview';
		$this->data['_apps_title'] = ' | Bappedalitbang Surabaya';
		$this->data['__head_page'] = $this->load->view('components/head', $this->data, TRUE);
		$this->data['__navbar_page'] = $this->load->view('components/navbar', $this->data, TRUE);
		$this->data['__footer_page'] = $this->load->view('components/footer', $this->data, TRUE);
		$this->data['__script_page'] = $this->load->view('components/script', $this->data, TRUE);
		if (empty($this->data['kunju'])) {
			$this->data['__content_page'] = $this->load->view('cetak_kosong', $this->data, TRUE);
		} else {
			$where_topik['id'] = $this->data['kunju']->id_topik;
			$this->data['topik'] = $this->m_topik->get_by($where_topik, "row");

			$this->data['__content_page'] = $this->load->view('cetak', $this->data, TRUE);
		}
		$this->load->view('welcome', $this->data);
	}

	public function form_kunjungan()
	{
		$this->data['topik'] = $this->m_topik->get("result", NULL, NULL, 'topik');
		$this->_load_only_view_awal('kunjungan');
	}

	public function form_pertanyaan()
	{
		$this->data['plus'] = $this->input->post('plus');

		$this->_load_only_view_awal('pertanyaan');
	}
}

/* End of file Errors.php */
/* Location: ./application/controllers/Errors.php */