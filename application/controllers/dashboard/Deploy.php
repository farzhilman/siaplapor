<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deploy extends ED_Controller {

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
	}

	public function save_kota_visi()
	{
		$txt = $this->input->post('txt');
		$id = $this->input->post('id');

		$data['txt'] = $txt;
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		if ($id == NULL || $id == '') {
			$this->m_kota_visi->save($data);
		} else {
			$this->m_kota_visi->save($data, $id);
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$this->data['txt'] = $txt;
	    $this->_load_only_view('_txt');
	}

	public function save_kota_misi()
	{
		$txt = $this->input->post('txt');
		$id = $this->input->post('id');

		$data['txt'] = $txt;
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		if ($id == NULL || $id == '') {
			$this->m_kota_misi->save($data);
		} else {
			$this->m_kota_misi->save($data, $id);
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where_misi['is_hapus'] = 'f';
		$this->data['misi'] = $this->m_kota_misi->get_by($where_misi,"result", NULL, NuLL, 'id');
	    $this->_load_only_view('_misi');
	}

	public function hapus_kota_misi()
	{
		$id = $this->input->post('id');
		$data['is_hapus'] = 't';
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		$this->m_kota_misi->save($data, $id);
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where_misi['is_hapus'] = 'f';
		$this->data['misi'] = $this->m_kota_misi->get_by($where_misi,"result", NULL, NuLL, 'id');
	    $this->_load_only_view('_misi');
	}

	public function save_kota_indikator_misi()
	{
		$txt = $this->input->post('txt');
		$id = $this->input->post('id');
		$id_misi = $this->input->post('id_parent');
		$target1 = $this->input->post('target1');
		$satuan1 = $this->input->post('satuan1');
		$target2 = $this->input->post('target2');
		$satuan2 = $this->input->post('satuan2');
		$target3 = $this->input->post('target3');
		$satuan3 = $this->input->post('satuan3');
		$target4 = $this->input->post('target4');
		$satuan4 = $this->input->post('satuan4');
		$target5 = $this->input->post('target5');
		$satuan5 = $this->input->post('satuan5');
		$target6 = $this->input->post('target6');
		$satuan6 = $this->input->post('satuan6');
		$definisi = $this->input->post('definisi', false);
		$formulasi = $this->input->post('formulasi');

		$data['txt'] = $txt;
		$data['target_thn1'] = $target1;
		$data['satuan_thn1'] = $satuan1;
		$data['target_thn2'] = $target2;
		$data['satuan_thn2'] = $satuan2;
		$data['target_thn3'] = $target3;
		$data['satuan_thn3'] = $satuan3;
		$data['target_thn4'] = $target4;
		$data['satuan_thn4'] = $satuan4;
		$data['target_thn5'] = $target5;
		$data['satuan_thn5'] = $satuan5;
		$data['target_thn6'] = $target6;
		$data['satuan_thn6'] = $satuan6;
		$data['definisi_operasional'] = $definisi;
		$data['formulasi'] = $formulasi;
		$data['id_misi'] = $id_misi;
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		if ($id == NULL || $id == '') {
			$this->m_kota_indikator_misi->save($data);
		} else {
			$this->m_kota_indikator_misi->save($data, $id);
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where_indikator_tujuan['id_misi'] = $id_misi;
		$where_indikator_tujuan['is_hapus'] = 'f';
		$this->data['indikator_misi'] = $this->m_kota_indikator_misi->get_by($where_indikator_tujuan,"result", NULL, NuLL, 'id');
		$this->data['id_parent'] = $id_misi;
	    $this->_load_only_view('_indikator_misi');
	}

	public function hapus_kota_indikator_misi()
	{
		$id = $this->input->post('id');
		$id_misi = $this->input->post('id_parent');
		$data['is_hapus'] = 't';
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		$this->m_kota_indikator_misi->save($data, $id);
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where_indikator_tujuan['id_misi'] = $id_misi;
		$where_indikator_tujuan['is_hapus'] = 'f';
		$this->data['indikator_misi'] = $this->m_kota_indikator_misi->get_by($where_indikator_tujuan,"result", NULL, NuLL, 'id');
		$this->data['id_parent'] = $id_misi;
	    $this->_load_only_view('_indikator_misi');
	}

	public function save_kota_tujuan()
	{
		$txt = $this->input->post('txt');
		$id = $this->input->post('id');
		$id_misi = $this->input->post('id_parent');

		$data['txt'] = $txt;
		$data['id_misi'] = $id_misi;
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		if ($id == NULL || $id == '') {
			$this->m_kota_tujuan->save($data);
		} else {
			$this->m_kota_tujuan->save($data, $id);
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where_tujuan['id_misi'] = $id_misi;
		$where_tujuan['is_hapus'] = 'f';
		$this->data['tujuan'] = $this->m_kota_tujuan->get_by($where_tujuan,"result", NULL, NuLL, 'id');
		$this->data['id_parent'] = $id_misi;

		$where_indikator_tujuan['id_misi'] = $id_misi;
		$where_indikator_tujuan['is_hapus'] = 'f';
		$this->data['indikator_misi'] = $this->m_kota_indikator_misi->get_by($where_indikator_tujuan,"result", NULL, NuLL, 'id');
		$this->data['_indikator_misi'] = $this->load->view('contents/5/_indikator_misi', $this->data, TRUE);
	    $this->_load_only_view('_tujuan');
	}

	public function hapus_kota_tujuan()
	{
		$id = $this->input->post('id');
		$id_misi = $this->input->post('id_parent');
		$data['is_hapus'] = 't';
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		$this->m_kota_tujuan->save($data, $id);
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where_tujuan['id_misi'] = $id_misi;
		$where_tujuan['is_hapus'] = 'f';
		$this->data['tujuan'] = $this->m_kota_tujuan->get_by($where_tujuan,"result", NULL, NuLL, 'id');
		$this->data['id_parent'] = $id_misi;

		$where_indikator_tujuan['id_misi'] = $id_misi;
		$where_indikator_tujuan['is_hapus'] = 'f';
		$this->data['indikator_misi'] = $this->m_kota_indikator_misi->get_by($where_indikator_tujuan,"result", NULL, NuLL, 'id');
		$this->data['_indikator_misi'] = $this->load->view('contents/5/_indikator_misi', $this->data, TRUE);
	    $this->_load_only_view('_tujuan');
	}

	public function save_kota_indikator_tujuan()
	{
		$txt = $this->input->post('txt');
		$id = $this->input->post('id');
		$id_tujuan = $this->input->post('id_parent');
		$target1 = $this->input->post('target1');
		$satuan1 = $this->input->post('satuan1');
		$target2 = $this->input->post('target2');
		$satuan2 = $this->input->post('satuan2');
		$target3 = $this->input->post('target3');
		$satuan3 = $this->input->post('satuan3');
		$target4 = $this->input->post('target4');
		$satuan4 = $this->input->post('satuan4');
		$target5 = $this->input->post('target5');
		$satuan5 = $this->input->post('satuan5');
		$target6 = $this->input->post('target6');
		$satuan6 = $this->input->post('satuan6');
		$definisi = $this->input->post('definisi', false);
		$formulasi = $this->input->post('formulasi');

		$data['txt'] = $txt;
		$data['target_thn1'] = $target1;
		$data['satuan_thn1'] = $satuan1;
		$data['target_thn2'] = $target2;
		$data['satuan_thn2'] = $satuan2;
		$data['target_thn3'] = $target3;
		$data['satuan_thn3'] = $satuan3;
		$data['target_thn4'] = $target4;
		$data['satuan_thn4'] = $satuan4;
		$data['target_thn5'] = $target5;
		$data['satuan_thn5'] = $satuan5;
		$data['target_thn6'] = $target6;
		$data['satuan_thn6'] = $satuan6;
		$data['definisi_operasional'] = $definisi;
		$data['formulasi'] = $formulasi;
		$data['id_tujuan'] = $id_tujuan;
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		if ($id == NULL || $id == '') {
			$this->m_kota_indikator_tujuan->save($data);
		} else {
			$this->m_kota_indikator_tujuan->save($data, $id);
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where_indikator_tujuan['id_tujuan'] = $id_tujuan;
		$where_indikator_tujuan['is_hapus'] = 'f';
		$this->data['indikator_tujuan'] = $this->m_kota_indikator_tujuan->get_by($where_indikator_tujuan,"result", NULL, NuLL, 'id');
		$this->data['id_parent'] = $id_tujuan;
	    $this->_load_only_view('_indikator_tujuan');
	}

	public function hapus_kota_indikator_tujuan()
	{
		$id = $this->input->post('id');
		$id_tujuan = $this->input->post('id_parent');
		$data['is_hapus'] = 't';
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		$this->m_kota_indikator_tujuan->save($data, $id);
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where_indikator_tujuan['id_tujuan'] = $id_tujuan;
		$where_indikator_tujuan['is_hapus'] = 'f';
		$this->data['indikator_tujuan'] = $this->m_kota_indikator_tujuan->get_by($where_indikator_tujuan,"result", NULL, NuLL, 'id');
		$this->data['id_parent'] = $id_tujuan;
	    $this->_load_only_view('_indikator_tujuan');
	}

	public function save_kota_sasaran()
	{
		$txt = $this->input->post('txt');
		$id = $this->input->post('id');
		$id_tujuan = $this->input->post('id_parent');
		$id_misi = $this->input->post('id_misi');

		$data['txt'] = $txt;
		$data['id_tujuan'] = $id_tujuan;
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		if ($id == NULL || $id == '') {
			$this->m_kota_sasaran->save($data);
		} else {
			$this->m_kota_sasaran->save($data, $id);
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where_sasaran['id_tujuan'] = $id_tujuan;
		$where_sasaran['is_hapus'] = 'f';
		$where_sasaran['txt !='] = '*';
		$this->data['sasaran'] = $this->m_kota_sasaran->get_by($where_sasaran,"result", NULL, NuLL, 'id');
		$this->data['id_parent'] = $id_tujuan;
		$this->data['id_misi'] = $id_misi;

		$where_indikator_tujuan['id_tujuan'] = $id_tujuan;
		$where_indikator_tujuan['is_hapus'] = 'f';
		$this->data['indikator_tujuan'] = $this->m_kota_indikator_tujuan->get_by($where_indikator_tujuan,"result", NULL, NuLL, 'id');
		$this->data['_indikator_tujuan'] = $this->load->view('contents/5/_indikator_tujuan', $this->data, TRUE);

	    $this->_load_only_view('_sasaran');
	}

	public function hapus_kota_sasaran()
	{
		$id = $this->input->post('id');
		$id_misi = $this->input->post('id_misi');
		$id_tujuan = $this->input->post('id_parent');
		$data['is_hapus'] = 't';
		$data['date_modified'] = date('d-M-y H:i:s');

		$tujuan_kota = $this->m_pd_tujuan->select_tujuan_nama_pd($id);
		$tkota = '';
		foreach ($tujuan_kota as $t) {
			$tkota = $tkota." ".$t->unit_name.";";
		}

		if (!empty($tujuan_kota)) {
			$this->_flashdata_sweet("error","Tidak bisa hapus. Karena sudah Dipilih oleh ".$tkota, 5000);
			echo "<script>".$this->session->flashdata('_pop_up_script')."</script>";
			$this->data['status'] = '';
		} else {
			$this->db->trans_start();
			$this->m_kota_sasaran->save($data, $id);
			$this->db->trans_complete();

			if ($this->db->trans_status() == TRUE){
				$this->data['status'] = 'sukses';
			} else {
				$this->data['status'] = 'gagal';
			}
		}

		$where_sasaran['id_tujuan'] = $id_tujuan;
		$where_sasaran['is_hapus'] = 'f';
		$where_sasaran['txt !='] = '*';
		$this->data['sasaran'] = $this->m_kota_sasaran->get_by($where_sasaran,"result", NULL, NuLL, 'id');
		$this->data['id_parent'] = $id_tujuan;
		$this->data['id_misi'] = $id_misi;

		$where_indikator_tujuan['id_tujuan'] = $id_tujuan;
		$where_indikator_tujuan['is_hapus'] = 'f';
		$this->data['indikator_tujuan'] = $this->m_kota_indikator_tujuan->get_by($where_indikator_tujuan,"result", NULL, NuLL, 'id');
		$this->data['_indikator_tujuan'] = $this->load->view('contents/5/_indikator_tujuan', $this->data, TRUE);

	    $this->_load_only_view('_sasaran');
	}

	public function save_kota_indikator_sasaran()
	{
		$txt = $this->input->post('txt');
		$id = $this->input->post('id');
		$id_sasaran = $this->input->post('id_parent');
		$target1 = $this->input->post('target1');
		$satuan1 = $this->input->post('satuan1');
		$target2 = $this->input->post('target2');
		$satuan2 = $this->input->post('satuan2');
		$target3 = $this->input->post('target3');
		$satuan3 = $this->input->post('satuan3');
		$target4 = $this->input->post('target4');
		$satuan4 = $this->input->post('satuan4');
		$target5 = $this->input->post('target5');
		$satuan5 = $this->input->post('satuan5');
		$target6 = $this->input->post('target6');
		$satuan6 = $this->input->post('satuan6');
		$definisi = $this->input->post('definisi', false);
		$formulasi = $this->input->post('formulasi');

		$data['txt'] = $txt;
		$data['target_thn1'] = $target1;
		$data['satuan_thn1'] = $satuan1;
		$data['target_thn2'] = $target2;
		$data['satuan_thn2'] = $satuan2;
		$data['target_thn3'] = $target3;
		$data['satuan_thn3'] = $satuan3;
		$data['target_thn4'] = $target4;
		$data['satuan_thn4'] = $satuan4;
		$data['target_thn5'] = $target5;
		$data['satuan_thn5'] = $satuan5;
		$data['target_thn6'] = $target6;
		$data['satuan_thn6'] = $satuan6;
		$data['definisi_operasional'] = $definisi;
		$data['formulasi'] = $formulasi;
		$data['id_sasaran'] = $id_sasaran;
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		if ($id == NULL || $id == '') {
			$this->m_kota_indikator_sasaran->save($data);
		} else {
			$this->m_kota_indikator_sasaran->save($data, $id);
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where_indikator_sasaran['id_sasaran'] = $id_sasaran;
		$where_indikator_sasaran['is_hapus'] = 'f';
		$this->data['indikator_sasaran'] = $this->m_kota_indikator_sasaran->get_by($where_indikator_sasaran,"result", NULL, NuLL, 'id');
		$this->data['id_parent'] = $id_sasaran;
	    $this->_load_only_view('_indikator_sasaran');
	}

	public function hapus_kota_indikator_sasaran()
	{
		$id = $this->input->post('id');
		$id_sasaran = $this->input->post('id_parent');
		$data['is_hapus'] = 't';
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		$this->m_kota_indikator_sasaran->save($data, $id);
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where_indikator_sasaran['id_sasaran'] = $id_sasaran;
		$where_indikator_sasaran['is_hapus'] = 'f';
		$this->data['indikator_sasaran'] = $this->m_kota_indikator_sasaran->get_by($where_indikator_sasaran,"result", NULL, NuLL, 'id');
		$this->data['id_parent'] = $id_sasaran;
	    $this->_load_only_view('_indikator_sasaran');
	}

	public function save_pd_tujuan_misi()
	{

		$txt = $this->input->post('txt');
		$id_parent = $this->input->post('id_parent');
		$unit_id = $this->input->post('unit_id');
		$id = $this->input->post('id');

		$data['txt'] = $txt;
		$data['unit_id'] = $unit_id;
		$data['id_sasaran_kota'] = $id_parent;
		$data['user_id'] = $this->session->userdata('user_id');
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		if ($id == NULL || $id == '') {
			$this->m_pd_tujuan_->save($data);
		} else {
			$this->m_pd_tujuan_->save($data, $id);
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$this->data['id_parent'] = $id_parent;
		// $this->data['status'] = '';
		$this->data['unit_id'] = $unit_id;

		$where_indikator_sasaran['id_sasaran'] = $id_parent;
		$where_indikator_sasaran['is_hapus'] = 'f';
		$this->data['indikator_sasaran'] = $this->m_kota_indikator_sasaran->get_by($where_indikator_sasaran,"result", NULL, NuLL, 'id');
		$this->data['_indikator_sasaran'] = $this->load->view('contents/5/_indikator_sasaran', $this->data, TRUE);

		$where_sasaran['id_sasaran_kota'] = $id_parent;
		$where_sasaran['is_hapus'] = 'f';
		// $where_sasaran['unit_id'] = $unit_id;
		$this->data['tujuan'] = $this->m_pd_tujuan_->get_by($where_sasaran,"result", NULL, NuLL, 'id');
	    $this->_load_only_view('pd_narasi/_tujuan_');

	}

	public function save_kota_program()
	{
		$txt = $this->input->post('txt');
		$id = $this->input->post('id');
		$id_sasaran = $this->input->post('id_parent');

		$data['txt'] = $txt;
		$data['id_sasaran'] = $id_sasaran;
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		if ($id == NULL || $id == '') {
			$this->m_kota_program->save($data);
			$id_program = $this->db->insert_id();

			$data_indikator_program = $this->m_db_devplan2022->select_indikator_program($txt);
			foreach ($data_indikator_program as $it) {
				$data2['txt'] = $it->indikator;
				$data2['date_modified'] = date('d-M-y H:i:s');
				$data2['id_program'] = $id_program;
				$data2['target_thn1'] = $it->target;
				$data2['target_thn2'] = $it->target;
				$data2['target_thn3'] = $it->target;
				$data2['target_thn4'] = $it->target;
				$data2['target_thn5'] = $it->target;
				$data2['target_thn6'] = $it->target;

				$this->m_kota_indikator_program->save($data2);
			}
		} else {
			$this->m_kota_program->save($data, $id);
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where_program['id_sasaran'] = $id_sasaran;
		$where_program['is_hapus'] = 'f';
		$this->data['program'] = $this->m_kota_program->get_by($where_program,"result", NULL, NuLL, 'id');
		$this->data['id_parent'] = $id_sasaran;
		$this->data['nama_program'] = $this->m_db_dora->distinct_program();

		$where_indikator_sasaran['id_sasaran'] = $id_sasaran;
		$where_indikator_sasaran['is_hapus'] = 'f';
		$this->data['indikator_sasaran'] = $this->m_kota_indikator_sasaran->get_by($where_indikator_sasaran,"result", NULL, NuLL, 'id');
		$this->data['_indikator_sasaran'] = $this->load->view('contents/5/_indikator_sasaran', $this->data, TRUE);

	    $this->_load_only_view('_program');
	}

	public function hapus_kota_program()
	{
		$id = $this->input->post('id');
		$id_sasaran = $this->input->post('id_parent');
		$data['is_hapus'] = 't';
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		$this->m_kota_program->save($data, $id);
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where_program['id_sasaran'] = $id_sasaran;
		$where_program['is_hapus'] = 'f';
		$this->data['program'] = $this->m_kota_program->get_by($where_program,"result", NULL, NuLL, 'id');
		$this->data['id_parent'] = $id_sasaran;
		$this->data['nama_program'] = $this->m_db_devplan2022->distinct_program();

		$where_indikator_sasaran['id_sasaran'] = $id_sasaran;
		$where_indikator_sasaran['is_hapus'] = 'f';
		$this->data['indikator_sasaran'] = $this->m_kota_indikator_sasaran->get_by($where_indikator_sasaran,"result", NULL, NuLL, 'id');
		$this->data['_indikator_sasaran'] = $this->load->view('contents/5/_indikator_sasaran', $this->data, TRUE);

	    $this->_load_only_view('_program');
	}

	public function save_kota_indikator_program()
	{
		$txt = $this->input->post('txt');
		$id = $this->input->post('id');
		$id_program = $this->input->post('id_parent');
		$target1 = $this->input->post('target1');
		$satuan1 = $this->input->post('satuan1');
		$target2 = $this->input->post('target2');
		$satuan2 = $this->input->post('satuan2');
		$target3 = $this->input->post('target3');
		$satuan3 = $this->input->post('satuan3');
		$target4 = $this->input->post('target4');
		$satuan4 = $this->input->post('satuan4');
		$target5 = $this->input->post('target5');
		$satuan5 = $this->input->post('satuan5');
		$target6 = $this->input->post('target6');
		$satuan6 = $this->input->post('satuan6');
		$definisi = $this->input->post('definisi', false);
		$formulasi = $this->input->post('formulasi');

		$data['txt'] = $txt;
		$data['target_thn1'] = $target1;
		$data['satuan_thn1'] = $satuan1;
		$data['target_thn2'] = $target2;
		$data['satuan_thn2'] = $satuan2;
		$data['target_thn3'] = $target3;
		$data['satuan_thn3'] = $satuan3;
		$data['target_thn4'] = $target4;
		$data['satuan_thn4'] = $satuan4;
		$data['target_thn5'] = $target5;
		$data['satuan_thn5'] = $satuan5;
		$data['target_thn6'] = $target6;
		$data['satuan_thn6'] = $satuan6;
		$data['definisi_operasional'] = $definisi;
		$data['formulasi'] = $formulasi;
		$data['id_program'] = $id_program;
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		if ($id == NULL || $id == '') {
			$this->m_kota_indikator_program->save($data);
		} else {
			$this->m_kota_indikator_program->save($data, $id);
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where_program['id'] = $id_program;
		$data_program = $this->m_kota_program->get_by($where_program,"row", NULL, NuLL, 'id');
		$this->data['perangkat_daerah'] = $this->m_db_devplan2022->select_unit_name($data_program->txt);
		
		$where_indikator_program['id_program'] = $id_program;
		$where_indikator_program['is_hapus'] = 'f';
		$this->data['indikator_program'] = $this->m_kota_indikator_program->get_by($where_indikator_program,"result", NULL, NuLL, 'id');
		$this->data['id_parent'] = $id_program;
	    $this->_load_only_view('_indikator_program');
	}

	public function hapus_kota_indikator_program()
	{
		$id = $this->input->post('id');
		$id_program = $this->input->post('id_parent');
		$data['is_hapus'] = 't';
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		$this->m_kota_indikator_program->save($data, $id);
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where_program['id'] = $id_program;
		$data_program = $this->m_kota_program->get_by($where_program,"row", NULL, NuLL, 'id');
		$this->data['perangkat_daerah'] = $this->m_db_devplan2022->select_unit_name($data_program->txt);

		$where_indikator_program['id_program'] = $id_program;
		$where_indikator_program['is_hapus'] = 'f';
		$this->data['indikator_program'] = $this->m_kota_indikator_program->get_by($where_indikator_program,"result", NULL, NuLL, 'id');
		$this->data['id_parent'] = $id_program;
	    $this->_load_only_view('_indikator_program');
	}

	public function save_sdgs()
	{
		$txt = $this->input->post('txt');
		$id = $this->input->post('id');

		$data['txt'] = $txt;
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		if ($id == NULL || $id == '') {
			$this->m_kota_sdgs->save($data);
		} else {
			$this->m_kota_sdgs->save($data, $id);
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$status = 'sukses';
		} else {
			$status = 'gagal';
		}

	    $this->isi_sdgs();
		$this->data['status'] = $status;
	    $this->_load_only_view('tab1/_sdgs');
	}

	public function hapus_sdgs()
	{
		$id = $this->input->post('id');
		$data['is_hapus'] = 't';
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		$this->m_kota_sdgs->save($data, $id);
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$status = 'sukses';
		} else {
			$status = 'gagal';
		}

		$this->isi_sdgs();
		$this->data['status'] = $status;
	    $this->_load_only_view('tab1/_sdgs');
	}

	public function save_tag_sdgs()
	{
		$id_nasional = $this->input->post('id_nasional');
		$id_sdgs = $this->input->post('id_sdgs');

		$data['id_prioritas_nasprov'] = $id_nasional;
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		$this->m_kota_sdgs->save($data, $id_sdgs);
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$status = 'sukses';
		} else {
			$status = 'gagal';
		}

	    $this->isi_sdgs();
		$this->data['status'] = $status;
	    $this->_load_only_view('tab1/_sdgs');
	}

	public function hapus_tag_sdgs()
	{
		$id = $this->input->post('id');
		$data['id_prioritas_nasprov'] = NULL;
		$data['date_modified'] = date('d-M-y H:i:s');

		//hapus tag level bawahnya
		// $where_prioritas['id_sdgs'] = $id;
		// $this->data['prioritas'] = $this->m_kota_prioritas->get_by($where_prioritas,"result", NULL, NuLL, 'id');

		$this->db->trans_start();
		$this->m_kota_sdgs->save($data, $id);
		//hapus tag level bawahnya
		// foreach ($this->data['prioritas'] as $p) {
		// 	$data2['id_sdgs'] = NULL;
		// 	$this->m_kota_prioritas->save($data2, $p->id);
		// 	$where_misi['id_prioritas'] = $p->id;
		// 	$data_misi[$p->id] = $this->m_kota_misi->get_by($where_misi,"result", NULL, NuLL, 'id');
		// }

		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$status = 'sukses';
		} else {
			$status = 'gagal';
		}

		$this->isi_sdgs();
		$this->data['status'] = $status;
	    $this->_load_only_view('tab1/_sdgs');
	}

	public function save_prioritas()
	{
	    $txt = $this->input->post('txt');
		$id = $this->input->post('id');

		$data['txt'] = $txt;
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		if ($id == NULL || $id == '') {
			$this->m_kota_prioritas->save($data);
		} else {
			$this->m_kota_prioritas->save($data, $id);
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$status = 'sukses';
		} else {
			$status = 'gagal';
		}

	    $this->isi_prioritas();
		$this->data['status'] = $status;
	    $this->_load_only_view('tab1/_prioritas');
	}

	public function hapus_prioritas()
	{
		$id = $this->input->post('id');
		$data['is_hapus'] = 't';
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		$this->m_kota_prioritas->save($data, $id);
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$status = 'sukses';
		} else {
			$status = 'gagal';
		}

		$this->isi_prioritas();
		$this->data['status'] = $status;
	    $this->_load_only_view('tab1/_prioritas');
	}

	public function save_tag_prioritas()
	{
	    $id_sdgs = $this->input->post('id_sdgs');
		$id_prioritas = $this->input->post('id_prioritas');

		$data['id_sdgs'] = $id_sdgs;
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		$this->m_kota_prioritas->save($data, $id_prioritas);
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$status = 'sukses';
		} else {
			$status = 'gagal';
		}

	    $this->isi_prioritas();
		$this->data['status'] = $status;
	    $this->_load_only_view('tab1/_prioritas');
	}

	public function hapus_tag_prioritas()
	{
		$id = $this->input->post('id');
		$data['id_sdgs'] = NULL;
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		$this->m_kota_prioritas->save($data, $id);
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$status = 'sukses';
		} else {
			$status = 'gagal';
		}

		$this->isi_prioritas();
		$this->data['status'] = $status;
	    $this->_load_only_view('tab1/_prioritas');
	}

	public function save_misi()
	{
	    $txt = $this->input->post('txt');
		$id = $this->input->post('id');

		$data['txt'] = $txt;
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		if ($id == NULL || $id == '') {
			$this->m_kota_misi->save($data);
		} else {
			$this->m_kota_misi->save($data, $id);
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$status = 'sukses';
		} else {
			$status = 'gagal';
		}

	    $this->isi_misi();
		$this->data['status'] = $status;
	    $this->_load_only_view('tab1/_misi');
	}

	public function hapus_misi()
	{
		$id = $this->input->post('id');
		$data['is_hapus'] = 't';
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		$this->m_kota_misi->save($data, $id);
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$status = 'sukses';
		} else {
			$status = 'gagal';
		}

		$this->isi_misi();
		$this->data['status'] = $status;
	    $this->_load_only_view('tab1/_misi');
	}

	public function save_tag_misi()
	{
	    $id_prioritas = $this->input->post('id_prioritas');
		$id_misi = $this->input->post('id_misi');

		$data['id_kota_prioritas'] = $id_prioritas;
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		$this->m_kota_misi->save($data, $id_misi);
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$status = 'sukses';
		} else {
			$status = 'gagal';
		}

	    $this->isi_misi();
		$this->data['status'] = $status;
	    $this->_load_only_view('tab1/_misi');
	}

	public function hapus_tag_misi()
	{
		$id = $this->input->post('id');
		$data['id_kota_prioritas'] = NULL;
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		$this->m_kota_misi->save($data, $id);
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$status = 'sukses';
		} else {
			$status = 'gagal';
		}

		$this->isi_misi();
		$this->data['status'] = $status;
	    $this->_load_only_view('tab1/_misi');
	}

	public function save_pd_tujuan()
	{
		$txt = $this->input->post('txt');
		$txt2 = $this->input->post('txt2');
		$id_kota_sasaran = $this->input->post('id_kota_sasaran');
		$unit_id = $this->input->post('unit_id');
		$id = $this->input->post('id');

		if ($txt == NULL || $txt == '') {
			$data['txt'] = $txt2;
			$data['unit_id'] = $unit_id;
			$data['user_id'] = $this->session->userdata('user_id');
			$data['date_modified'] = date('d-M-y H:i:s');
		} else {
			$data['txt'] = $txt;
			$data['unit_id'] = $unit_id;
			if ($id == NULL || $id == '') {
				$data['id_kota_sasaran'] = $id_kota_sasaran;
			}
			$data['user_id'] = $this->session->userdata('user_id');
			$data['date_modified'] = date('d-M-y H:i:s');
		}
		
		if($this->session->userdata('user_id') == 'admintt'){
			$data['is_kota'] = 't';
		}

		$this->db->trans_start();
		if ($id == NULL || $id == '') {
			$id_tujuan_pd = $this->m_pd_tujuan->save($data);
			if ($txt != NULL || $txt != '') {
				// $id_tujuan_pd = $this->db->insert_id();
				// $where_i_sas['id_sasaran'] = $id_kota_sasaran;
				// $where_i_sas['is_hapus'] = 'f';
				// $data_indikator_sasaran_kota = $this->m_kota_indikator_sasaran->get_by($where_i_sas);
				// foreach ($data_indikator_sasaran_kota as $it) {
				// 	$data2['txt'] = $it->txt;
				// 	$data2['unit_id'] = $unit_id;
				// 	$data2['id_kota_sasaran'] = $id_kota_sasaran;
				// 	$data2['id_kota_indikator_sasaran'] = $it->id;
				// 	$data2['user_id'] = $this->session->userdata('user_id');
				// 	$data2['date_modified'] = date('d-M-y H:i:s');
				// 	$data2['id_tujuan'] = $id_tujuan_pd;
				// 	$data2['target_thn1'] = $it->target_thn1;
				// 	$data2['target_thn2'] = $it->target_thn2;
				// 	$data2['target_thn3'] = $it->target_thn3;
				// 	$data2['target_thn4'] = $it->target_thn4;
				// 	$data2['target_thn5'] = $it->target_thn5;
				// 	$data2['target_thn6'] = $it->target_thn6;
				// 	$data2['satuan_thn1'] = $it->satuan_thn1;
				// 	$data2['satuan_thn2'] = $it->satuan_thn2;
				// 	$data2['satuan_thn3'] = $it->satuan_thn3;
				// 	$data2['satuan_thn4'] = $it->satuan_thn4;
				// 	$data2['satuan_thn5'] = $it->satuan_thn5;
				// 	$data2['satuan_thn6'] = $it->satuan_thn6;
				// 	$this->m_pd_indikator_tujuan->save($data2);
				// }
			}
		} else {
			$this->m_pd_tujuan->save($data, $id);
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where_tujuan['is_hapus'] = 'f';
		$where_tujuan['unit_id'] = $unit_id;
		$this->data['tujuan'] = $this->m_pd_tujuan->select_tujuan_pd_sas_kota($unit_id);
		$where_narasi['is_hapus'] = 'f';
		$where_narasi['date_modified >'] = '2022-09-15';
		// $this->data['narasi'] = $this->m_kota_sasaran->get_by($where_narasi,"result", NULL, NuLL, 'id');
		$this->data['narasi'] = $this->m_kota_sasaran->select_sasaran_pokin();
		$where_unit_id['unit_id'] = $unit_id;
		$this->data['user'] = $this->m_unit_kerja->get_by($where_unit_id,"row");
		$this->data['unit_id'] = $unit_id;
		$this->data['bidang_urusan'] = $this->m_pd_bidang_urusan->get_by($where_unit_id,"row");
		$this->data['pilih_bidang_urusan'] = $this->m_pd_bidang_urusan->distinct_bidang_urusan($unit_id);
		$this->data['warning'] = '';
		$this->data['isian'] = $this->m_pd_bidang_urusan->select_anggaran($unit_id);
		$this->data['pagu'] = $this->m_pd_bidang_urusan->pagu($unit_id);
		$this->data['cek_bidang'] = $this->m_pd_sub_kegiatan->cek_bidang_($unit_id);
	    $this->_load_only_view('pd/_tujuan');
	}

	public function hapus_pd_tujuan()
	{
		$unit_id = $this->input->post('unit_id');
		$id = $this->input->post('id');
		$id_parent = $this->input->post('id_parent');
		$data['is_hapus'] = 't';
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		// $this->m_pd_tujuan->save($data, $id);
		$this->m_pd_tujuan->hapus_tujuan($id);
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where_tujuan['is_hapus'] = 'f';
		$where_tujuan['unit_id'] = $unit_id;
		$this->data['tujuan'] = $this->m_pd_tujuan->select_tujuan_pd_sas_kota($unit_id);
		$where_narasi['is_hapus'] = 'f';
		$where_narasi['date_modified >'] = '2022-09-15';
		// $this->data['narasi'] = $this->m_kota_sasaran->get_by($where_narasi,"result", NULL, NuLL, 'id');
		$this->data['narasi'] = $this->m_kota_sasaran->select_sasaran_pokin();
		$where_unit_id['unit_id'] = $unit_id;
		$this->data['user'] = $this->m_unit_kerja->get_by($where_unit_id,"row");
		$this->data['unit_id'] = $unit_id;
		$this->data['bidang_urusan'] = $this->m_pd_bidang_urusan->get_by($where_unit_id,"row");
		$this->data['pilih_bidang_urusan'] = $this->m_pd_bidang_urusan->distinct_bidang_urusan($unit_id);
		$this->data['warning'] = '';
		$this->data['isian'] = $this->m_pd_bidang_urusan->select_anggaran($unit_id);
		$this->data['pagu'] = $this->m_pd_bidang_urusan->pagu($unit_id);
		$this->data['cek_bidang'] = $this->m_pd_sub_kegiatan->cek_bidang_($unit_id);
	    $this->_load_only_view('pd/_tujuan');
	}

	public function save_pd_indikator_tujuan()
	{
		$txt = $this->input->post('txt', false);
		$id = $this->input->post('id');
		$unit_id = $this->input->post('unit_id');
		$id_tujuan = $this->input->post('id_parent');
		$target1 = $this->input->post('target1', false);
		$satuan1 = $this->input->post('satuan1', false);
		$target2 = $this->input->post('target2', false);
		$satuan2 = $this->input->post('satuan2', false);
		$target3 = $this->input->post('target3', false);
		$satuan3 = $this->input->post('satuan3', false);
		$target4 = $this->input->post('target4', false);
		$satuan4 = $this->input->post('satuan4', false);
		$target5 = $this->input->post('target5', false);
		$satuan5 = $this->input->post('satuan5', false);
		$target6 = $this->input->post('target6', false);
		$satuan6 = $this->input->post('satuan6', false);
		$definisi = $this->input->post('definisi', false);
		$formulasi = $this->input->post('formulasi', false);

		$data['txt'] = $txt;
		$data['target_thn1'] = $target1;
		$data['satuan_thn1'] = $satuan1;
		$data['target_thn2'] = $target2;
		$data['satuan_thn2'] = $satuan2;
		$data['target_thn3'] = $target3;
		$data['satuan_thn3'] = $satuan3;
		$data['target_thn4'] = $target4;
		$data['satuan_thn4'] = $satuan4;
		$data['target_thn5'] = $target5;
		$data['satuan_thn5'] = $satuan5;
		$data['target_thn6'] = $target6;
		$data['satuan_thn6'] = $satuan6;
		$data['definisi_operasional'] = $definisi;
		$data['formulasi'] = $formulasi;
		$data['id_tujuan'] = $id_tujuan;
		$data['user_id'] = $this->session->userdata('user_id');
		$data['unit_id'] = $unit_id;
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		if ($id == NULL || $id == '') {
			$this->m_pd_indikator_tujuan->save($data);
		} else {
			$this->m_pd_indikator_tujuan->save($data, $id);
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where_indikator_tujuan['id_tujuan'] = $id_tujuan;
		$where_indikator_tujuan['is_hapus'] = 'f';
		$where_indikator_tujuan['is_penunjang'] = 'f';
		$this->data['indikator_tujuan'] = $this->m_pd_indikator_tujuan->get_by($where_indikator_tujuan,"result", NULL, NuLL, 'id');
		foreach ($this->data['indikator_tujuan'] as $it) {
			$wdata_ceks['id_indikator'] = $it->id;
			$wdata_ceks['tipe_indikator'] = 'pd_indikator_tujuan';
			// $data_ceks[$it->id] = $this->m_pd_link->get_by($wdata_ceks, 'row');
			$data_ceks[$it->id] = $this->m_pd_link->select_irenstra_murni($it->id, 'pd_indikator_tujuan');
		}
		$this->data['ceks'] = $data_ceks;
		$this->data['id_parent'] = $id_tujuan;
		$where_unit_id['unit_id'] = $unit_id;
		$this->data['user'] = $this->m_unit_kerja->get_by($where_unit_id,"row");
		$this->data['unit_id'] = $unit_id;
	    $this->_load_only_view('pd/_indikator_tujuan');
	}

	public function hapus_pd_indikator_tujuan()
	{
		$id = $this->input->post('id');
		$id_tujuan = $this->input->post('id_parent');
		$data['is_hapus'] = 't';
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		$this->m_pd_indikator_tujuan->save($data, $id);
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where_data_['id'] = $id;
		$data_ = $this->m_pd_indikator_tujuan->get_by($where_data_,"row");

		$where_indikator_tujuan['id_tujuan'] = $id_tujuan;
		$where_indikator_tujuan['is_hapus'] = 'f';
		$where_indikator_tujuan['is_penunjang'] = 'f';
		$this->data['indikator_tujuan'] = $this->m_pd_indikator_tujuan->get_by($where_indikator_tujuan,"result", NULL, NuLL, 'id');
		foreach ($this->data['indikator_tujuan'] as $it) {
			$wdata_ceks['id_indikator'] = $it->id;
			$wdata_ceks['tipe_indikator'] = 'pd_indikator_tujuan';
			// $data_ceks[$it->id] = $this->m_pd_link->get_by($wdata_ceks, 'row');
			$data_ceks[$it->id] = $this->m_pd_link->select_irenstra_murni($it->id, 'pd_indikator_tujuan');
		}
		$this->data['ceks'] = $data_ceks;
		$this->data['id_parent'] = $id_tujuan;
		$where_unit_id['unit_id'] = $data_->unit_id;
		$this->data['user'] = $this->m_unit_kerja->get_by($where_unit_id,"row");
		$this->data['unit_id'] = $data_->unit_id;
	    $this->_load_only_view('pd/_indikator_tujuan');
	}

	public function save_pd_sasaran()
	{
		$txt = $this->input->post('txt');
		$id_parent = $this->input->post('id_parent');
		$unit_id = $this->input->post('unit_id');
		$id = $this->input->post('id');

		$data['txt'] = $txt;
		$data['unit_id'] = $unit_id;
		$data['id_tujuan'] = $id_parent;
		$data['user_id'] = $this->session->userdata('user_id');
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		if ($id == NULL || $id == '') {
			$this->m_pd_sasaran->save($data);
		} else {
			$this->m_pd_sasaran->save($data, $id);
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$this->data['unit_id'] = $unit_id;
		$where_unit_id['unit_id'] = $unit_id;
		$this->data['user'] = $this->m_unit_kerja->get_by($where_unit_id,"row");
	    $where_sasaran['id_tujuan'] = $id_parent;
		$where_sasaran['is_hapus'] = 'f';
		$this->data['sasaran'] = $this->m_pd_sasaran->get_by($where_sasaran,"result", NULL, NuLL, 'id');

		$where_indikator_tujuan['id_tujuan'] = $id_parent;
		$where_indikator_tujuan['is_hapus'] = 'f';
		$where_indikator_tujuan['is_penunjang'] = 'f';
		$this->data['indikator_tujuan'] = $this->m_pd_indikator_tujuan->get_by($where_indikator_tujuan,"result", NULL, NuLL, 'id');
		foreach ($this->data['indikator_tujuan'] as $it) {
			$wdata_ceks['id_indikator'] = $it->id;
			$wdata_ceks['tipe_indikator'] = 'pd_indikator_tujuan';
			// $data_ceks[$it->id] = $this->m_pd_link->get_by($wdata_ceks, 'row');
			$data_ceks[$it->id] = $this->m_pd_link->select_irenstra_murni($it->id, 'pd_indikator_tujuan');
		}
		$this->data['ceks'] = $data_ceks;
		$this->data['id_parent'] = $id_parent;
		$this->data['_indikator_tujuan'] = $this->load->view('contents/5/pd/_indikator_tujuan', $this->data, TRUE);
	    $this->_load_only_view('pd/_sasaran');
	}

	public function save_pd_sasaran_()
	{
		$txt = $this->input->post('txt');
		$id_parent = $this->input->post('id_parent');
		$unit_id = $this->input->post('unit_id');
		$id = $this->input->post('id');

		$data['txt'] = $txt;
		$data['unit_id'] = $unit_id;
		$data['id_tujuan'] = $id_parent;
		$data['user_id'] = $this->session->userdata('user_id');
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		if ($id == NULL || $id == '') {
			$this->m_pd_sasaran->save($data);
		} else {
			$this->m_pd_sasaran->save($data, $id);
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$this->data['unit_id'] = $unit_id;
		$where_unit_id['unit_id'] = $unit_id;
		$this->data['user'] = $this->m_unit_kerja->get_by($where_unit_id,"row");
	    $where_sasaran['id_tujuan'] = $id_parent;
		$where_sasaran['is_hapus'] = 'f';
		$this->data['sasaran'] = $this->m_pd_sasaran->get_by($where_sasaran,"result", NULL, NuLL, 'id');

		$where_indikator_tujuan['id_tujuan'] = $id_parent;
		$where_indikator_tujuan['is_hapus'] = 'f';
		$where_indikator_tujuan['is_penunjang'] = 'f';
		$this->data['indikator_tujuan'] = $this->m_pd_indikator_tujuan->get_by($where_indikator_tujuan,"result", NULL, NuLL, 'id');
		$this->data['id_parent'] = $id_parent;
		$this->data['_indikator_tujuan'] = $this->load->view('contents/5/pd_narasi/_indikator_tujuan', $this->data, TRUE);
	    $this->_load_only_view('pd_narasi/_sasaran');
	}

	public function hapus_pd_sasaran()
	{
		$id = $this->input->post('id');
		$id_parent = $this->input->post('id_parent');
		$data['is_hapus'] = 't';
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		// $this->m_pd_sasaran->save($data, $id);
		$this->m_pd_tujuan->hapus_sasaran($id);
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where_data_['id'] = $id;
		$data_ = $this->m_pd_sasaran->get_by($where_data_,"row");

		$this->data['unit_id'] = $data_->unit_id;
		$where_sasaran['id_tujuan'] = $id_parent;
		$where_sasaran['is_hapus'] = 'f';
		$this->data['sasaran'] = $this->m_pd_sasaran->get_by($where_sasaran,"result", NULL, NuLL, 'id');

		$where_unit_id['unit_id'] = $data_->unit_id;
		$this->data['user'] = $this->m_unit_kerja->get_by($where_unit_id,"row");

		$where_indikator_tujuan['id_tujuan'] = $id_parent;
		$where_indikator_tujuan['is_hapus'] = 'f';
		$where_indikator_tujuan['is_penunjang'] = 'f';
		$this->data['indikator_tujuan'] = $this->m_pd_indikator_tujuan->get_by($where_indikator_tujuan,"result", NULL, NuLL, 'id');
		$this->data['id_parent'] = $id_parent;
		$this->data['_indikator_tujuan'] = $this->load->view('contents/5/pd/_indikator_tujuan', $this->data, TRUE);
	    $this->_load_only_view('pd/_sasaran');
	}

	public function save_pd_indikator_sasaran()
	{
		$txt = $this->input->post('txt');
		$id = $this->input->post('id', false);
		$id_sasaran = $this->input->post('id_parent');
		$unit_id = $this->input->post('unit_id');
		$target1 = $this->input->post('target1', false);
		$satuan1 = $this->input->post('satuan1', false);
		$target2 = $this->input->post('target2', false);
		$satuan2 = $this->input->post('satuan2', false);
		$target3 = $this->input->post('target3', false);
		$satuan3 = $this->input->post('satuan3', false);
		$target4 = $this->input->post('target4', false);
		$satuan4 = $this->input->post('satuan4', false);
		$target5 = $this->input->post('target5', false);
		$satuan5 = $this->input->post('satuan5', false);
		$target6 = $this->input->post('target6', false);
		$satuan6 = $this->input->post('satuan6', false);
		$definisi = $this->input->post('definisi', false);
		$formulasi = $this->input->post('formulasi', false);

		$data['txt'] = $txt;
		$data['target_thn1'] = $target1;
		$data['satuan_thn1'] = $satuan1;
		$data['target_thn2'] = $target2;
		$data['satuan_thn2'] = $satuan2;
		$data['target_thn3'] = $target3;
		$data['satuan_thn3'] = $satuan3;
		$data['target_thn4'] = $target4;
		$data['satuan_thn4'] = $satuan4;
		$data['target_thn5'] = $target5;
		$data['satuan_thn5'] = $satuan5;
		$data['target_thn6'] = $target6;
		$data['satuan_thn6'] = $satuan6;
		$data['definisi_operasional'] = $definisi;
		$data['formulasi'] = $formulasi;
		$data['id_sasaran'] = $id_sasaran;
		$data['user_id'] = $this->session->userdata('user_id');
		$data['unit_id'] = $unit_id;
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		if ($id == NULL || $id == '') {
			$this->m_pd_indikator_sasaran->save($data);
		} else {
			$this->m_pd_indikator_sasaran->save($data, $id);
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where_unit_id['unit_id'] = $unit_id;
		$this->data['user'] = $this->m_unit_kerja->get_by($where_unit_id,"row");
		$where_indikator_sasaran['id_sasaran'] = $id_sasaran;
		$where_indikator_sasaran['is_hapus'] = 'f';
		$this->data['indikator_sasaran'] = $this->m_pd_indikator_sasaran->get_by($where_indikator_sasaran,"result", NULL, NuLL, 'id');
		foreach ($this->data['indikator_sasaran'] as $it) {
			$wdata_ceks['id_indikator'] = $it->id;
			$wdata_ceks['tipe_indikator'] = 'pd_indikator_sasaran';
			// $data_ceks[$it->id] = $this->m_pd_link->get_by($wdata_ceks, 'row');
			$data_ceks[$it->id] = $this->m_pd_link->select_irenstra_murni($it->id, 'pd_indikator_sasaran');
		}
		$this->data['ceks'] = $data_ceks;
		$this->data['id_parent'] = $id_sasaran;
		$this->data['unit_id'] = $unit_id;
	    $this->_load_only_view('pd/_indikator_sasaran');
	}

	public function hapus_pd_indikator_sasaran()
	{
		$id = $this->input->post('id');
		$id_sasaran = $this->input->post('id_parent');
		$data['is_hapus'] = 't';
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		$this->m_pd_indikator_sasaran->save($data, $id);
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where_data_['id'] = $id;
		$data_ = $this->m_pd_indikator_sasaran->get_by($where_data_,"row");

		$where_indikator_sasaran['id_sasaran'] = $id_sasaran;
		$where_indikator_sasaran['is_hapus'] = 'f';
		$this->data['indikator_sasaran'] = $this->m_pd_indikator_sasaran->get_by($where_indikator_sasaran,"result", NULL, NuLL, 'id');
		foreach ($this->data['indikator_sasaran'] as $it) {
			$wdata_ceks['id_indikator'] = $it->id;
			$wdata_ceks['tipe_indikator'] = 'pd_indikator_sasaran';
			// $data_ceks[$it->id] = $this->m_pd_link->get_by($wdata_ceks, 'row');
			$data_ceks[$it->id] = $this->m_pd_link->select_irenstra_murni($it->id, 'pd_indikator_sasaran');
		}
		$this->data['ceks'] = $data_ceks;
		$this->data['id_parent'] = $id_sasaran;
		$where_unit_id['unit_id'] = $data_->unit_id;
		$this->data['user'] = $this->m_unit_kerja->get_by($where_unit_id,"row");
		$this->data['unit_id'] = $data_->unit_id;
	    $this->_load_only_view('pd/_indikator_sasaran');
	}

	public function save_pd_tujuan_()
	{
		$txt = $this->input->post('txt');
		$id_kota_sasaran = $this->input->post('id_kota_sasaran');
		$unit_id = $this->input->post('unit_id');
		$id = $this->input->post('id');

		$unit_kerja = $this->m_unit_kerja->get("result");

		$where_kota_sasaran['id'] = $id_kota_sasaran;
		$kota_sasaran = $this->m_kota_sasaran->get_by($where_kota_sasaran,"row");

		$data['txt'] = $kota_sasaran->txt;
		$data['unit_id'] = $unit_id;
		$data['id_kota_sasaran'] = $id_kota_sasaran;
		// $data['user_id'] = $this->session->userdata('user_id');
		$data['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		$this->m_pd_tujuan->save($data);
		$id_tujuan_pd = $this->db->insert_id();
		$where_i_sas['id_sasaran'] = $id_kota_sasaran;
		$data_indikator_sasaran_kota = $this->m_kota_indikator_sasaran->get_by($where_i_sas);
		foreach ($data_indikator_sasaran_kota as $it) {
			$data2['txt'] = $it->txt;
			$data2['unit_id'] = $unit_id;
			$data2['id_kota_sasaran'] = $id_kota_sasaran;
			$data2['user_id'] = $this->session->userdata('user_id');
			$data2['date_modified'] = date('d-M-y H:i:s');
			$data2['id_tujuan'] = $id_tujuan_pd;
			$data2['target_thn1'] = $it->target_thn1;
			$data2['target_thn2'] = $it->target_thn2;
			$data2['target_thn3'] = $it->target_thn3;
			$data2['target_thn4'] = $it->target_thn4;
			$data2['target_thn5'] = $it->target_thn5;
			$data2['target_thn6'] = $it->target_thn6;
			$data2['satuan_thn1'] = $it->satuan_thn1;
			$data2['satuan_thn2'] = $it->satuan_thn2;
			$data2['satuan_thn3'] = $it->satuan_thn3;
			$data2['satuan_thn4'] = $it->satuan_thn4;
			$data2['satuan_thn5'] = $it->satuan_thn5;
			$data2['satuan_thn6'] = $it->satuan_thn6;
			$this->m_pd_indikator_tujuan->save($data2);
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			echo 'sukses'.$unit_id.'<br>';
		} else {
			echo 'gagal'.$unit_id.'<br>';
		}
	}

	public function save_pd_tujuan_nomenklatur()
	{
		$id = $this->input->post('id');
		$val = $this->input->post('val');
		$unit_id = $this->input->post('unit_id');

		$where_sasaran['id'] = $val;
		$where_sasaran['is_hapus'] = 'f';
		// $where_sasaran['unit_id'] = $unit_id;
		$data_sasaran = $this->m_pd_sasaran->get_by($where_sasaran,"row", NULL, NuLL, 'id');

		$where_tujuan['id'] = $data_sasaran->id_tujuan;
		$where_tujuan['is_hapus'] = 'f';
		// $where_sasaran['unit_id'] = $unit_id;
		$data_tujuan = $this->m_pd_tujuan_->get_by($where_tujuan,"row", NULL, NuLL, 'id');

		$data3['id_kota_sasaran'] = $data_tujuan->id_sasaran_kota;
		$data3['id_tujuan_ori'] = $data_tujuan->id;
		$data3['txt'] = $data_tujuan->txt;
		$data3['unit_id'] = $unit_id;
		$data3['date_modified'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		if ($id == NULL || $id == '') {
			$this->m_pd_tujuan->save($data3);
			$where_tujuan2['unit_id'] = $unit_id;
			$where_tujuan2['is_hapus'] = 'f';
			$data_max_id_tujuan = $this->m_pd_tujuan->get_by($where_tujuan2,"row", NULL, NuLL, 'id', 'desc');
			$id_tujuan_pd2 = $data_max_id_tujuan->id;

			$where_i_tujuan['id_tujuan'] = $data_tujuan->id;
			$where_i_tujuan['is_hapus'] = 'f';
			$data_indikator_tujuan_kota = $this->m_pd_indikator_tujuan->get_by($where_i_tujuan);
			foreach ($data_indikator_tujuan_kota as $it) {
				$data4['txt'] = $it->txt;
				$data4['unit_id'] = $unit_id;
				$data4['user_id'] = $this->session->userdata('user_id');
				$data4['date_modified'] = date('d-M-y H:i:s');
				$data4['id_tujuan'] = $id_tujuan_pd2;
				$data4['target_thn1'] = $it->target_thn1;
				$data4['target_thn2'] = $it->target_thn2;
				$data4['target_thn3'] = $it->target_thn3;
				$data4['target_thn4'] = $it->target_thn4;
				$data4['target_thn5'] = $it->target_thn5;
				$data4['target_thn6'] = $it->target_thn6;
				$data4['satuan_thn1'] = $it->satuan_thn1;
				$data4['satuan_thn2'] = $it->satuan_thn2;
				$data4['satuan_thn3'] = $it->satuan_thn3;
				$data4['satuan_thn4'] = $it->satuan_thn4;
				$data4['satuan_thn5'] = $it->satuan_thn5;
				$data4['satuan_thn6'] = $it->satuan_thn6;
				$data4['definisi_operasional'] = $it->definisi_operasional;
				$data4['formulasi'] = $it->formulasi;
				$this->m_pd_indikator_tujuan->save($data4);
			}

			$data['id_tujuan'] = $id_tujuan_pd2;
			$data['txt'] = $data_sasaran->txt;
			$data['id_sasaran_ori'] = $data_sasaran->id;
			$data['unit_id'] = $unit_id;
			$data['date_modified'] = date('d-M-y H:i:s');
			$this->m_pd_sasaran->save($data);
			$where_sas2['unit_id'] = $unit_id;
			$where_sas2['is_hapus'] = 'f';
			$data_max_id_sas = $this->m_pd_sasaran->get_by($where_sas2,"row", NULL, NuLL, 'id', 'desc');
			$id_sasaran_pd = $data_max_id_sas->id;
			$where_i_sas['id_sasaran'] = $data_sasaran->id;
			$where_i_sas['is_hapus'] = 'f';
			$data_indikator_sasaran_kota = $this->m_pd_indikator_sasaran->get_by($where_i_sas);
			foreach ($data_indikator_sasaran_kota as $it) {
				$data2['txt'] = $it->txt;
				$data2['unit_id'] = $unit_id;
				$data2['user_id'] = $this->session->userdata('user_id');
				$data2['date_modified'] = date('d-M-y H:i:s');
				$data2['id_sasaran'] = $id_sasaran_pd;
				$data2['target_thn1'] = $it->target_thn1;
				$data2['target_thn2'] = $it->target_thn2;
				$data2['target_thn3'] = $it->target_thn3;
				$data2['target_thn4'] = $it->target_thn4;
				$data2['target_thn5'] = $it->target_thn5;
				$data2['target_thn6'] = $it->target_thn6;
				$data2['satuan_thn1'] = $it->satuan_thn1;
				$data2['satuan_thn2'] = $it->satuan_thn2;
				$data2['satuan_thn3'] = $it->satuan_thn3;
				$data2['satuan_thn4'] = $it->satuan_thn4;
				$data2['satuan_thn5'] = $it->satuan_thn5;
				$data2['satuan_thn6'] = $it->satuan_thn6;
				$data2['definisi_operasional'] = $it->definisi_operasional;
				$data2['formulasi'] = $it->formulasi;
				$this->m_pd_indikator_sasaran->save($data2);
			}
		} else {
			// $this->m_pd_tujuan->save($data, $id);
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where_tujuan['is_hapus'] = 'f';
		$where_tujuan['unit_id'] = $unit_id;
		$this->data['tujuan'] = $this->m_pd_tujuan->select_tujuan_pd_sas_kota($unit_id);
		$where_narasi['is_hapus'] = 'f';
		$where_narasi['unit_id'] = '';
		$this->data['narasi'] = $this->m_pd_sasaran->get_by($where_narasi,"result", NULL, NuLL, 'id');
		$where_unit_id['unit_id'] = $unit_id;
		$this->data['user'] = $this->m_unit_kerja->get_by($where_unit_id,"row");
		$this->data['unit_id'] = $unit_id;
		$this->data['bidang_urusan'] = $this->m_pd_bidang_urusan->get_by($where_unit_id,"row");
		$this->data['pilih_bidang_urusan'] = $this->m_pd_bidang_urusan->distinct_bidang_urusan($unit_id);
		$this->data['warning'] = '';
		$this->data['isian'] = $this->m_pd_bidang_urusan->select_anggaran($unit_id);
		$this->data['pagu'] = $this->m_pd_bidang_urusan->pagu($unit_id);
		$this->data['cek_bidang'] = $this->m_pd_sub_kegiatan->cek_bidang_($unit_id);

	    $this->_load_only_view('pd/_tujuan');
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/dashboard/Dashboard.php */