<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends ED_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if (!$this->session->userdata('user_id')) {
			redirect('login');
		}
	}

	public function index()
	{
		$data_tanya = [];
		$data_tanyas = [];
		$this->data['_head_title'] = 'Siap Lapor Ketintang';

        $this->data["count_lapor"] = $this->m_laporan->select_count_laporan();
        $this->data["count_giat1"] = $this->m_laporan->select_count_laporan_pergiat('LAPORAN WARGA');
        $this->data["count_giat2"] = $this->m_laporan->select_count_laporan_pergiat('KEJADIAN DARURAT');
        $this->data["count_giat3"] = $this->m_laporan->select_count_laporan_pergiat('KEGIATAN RUTIN');
        $this->data["count_giat4"] = $this->m_laporan->select_count_laporan_pergiat('ARAHAN PIMPINAN');
        $this->data["giat_terbanyak"] = $this->m_laporan->select_giat_terbanyak();
        $this->data["laporan_terbanyak"] = $this->m_laporan->select_laporan_terbanyak();

        if ($this->session->userdata('user_level') == '3') {
        	$this->data["isian_anda"] = $this->m_laporan->isian_anda($this->session->user_name);
		}
		
		$this->_load_view_dashboard();
	}

	// public function dashboard()
	// {
	// 	$unit_id = $this->session->userdata('unit_id');
	// 	$where_unit_id['unit_id'] = $unit_id;
	// 	$this->data['user'] = $this->m_unit_kerja->get_by($where_unit_id,"row");
	//     $this->_load_only_view('dashboard');
	// }

	public function modal_kunjungan_aksi()
	{
		$this->data['title'] = 'Aksi';

		$id = $this->input->post('id');
		$this->data['kunjungan'] = $this->m_kunjungan->select_row($id);

		$where["id_kunjungan"] = $this->input->post('id');
        $where["is_hapus"] = 'f';
        $this->data["isiupload"] = $this->m_kunjungan_foto->get_by($where,"result",NULL,NULL,'id','asc');

        $this->data["bidang"] = $this->m_bidang->get("result",NULL,NULL,'bidang_nama');

		$this->_load_only_view("modal/modal_kunjungan_aksi");
	}

	public function bidang_nama()
	{
		$id = $this->input->post('id');
        $this->data["kunjungan"] = $this->m_kunjungan->select_row($id);

		$this->_load_only_view("modal/div_bidang_nama");
	}

	public function set_bidang()
	{
		$id = $this->input->post('id');
		$id_bidang = $this->input->post('id_bidang');

		$data['id_bidang'] = $id_bidang;
		$this->db->trans_start();
        $this->m_kunjungan->save($data, $id);
        $this->db->trans_complete();

        if ($this->db->trans_status() == TRUE){
            $this->_flashdata_sweet("success","Berhasil ditindaklanjuti.");
        } else {
            $this->_flashdata_sweet("error","Gagal. Mohon Refresh Halaman.");
        }
        echo "<script>".$this->session->flashdata('_pop_up_script')."</script>";

		$where['id'] = $id_bidang;
        $this->data["bidang"] = $this->m_bidang->get_by($where, "row");

		$this->_load_only_view("modal/div_bidang_nama");
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/dashboard/Dashboard.php */