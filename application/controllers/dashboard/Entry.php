<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entry extends ED_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if (!$this->session->userdata('user_id')) {
			redirect('login');
			// redirect('https://eplanning.surabaya.go.id/');
		}
	}

	public function index()
	{
		$this->data['_head_title'] = 'Siap Lapor';
		$this->data["pegawai"] = $this->m_pegawai->get("result",NULL,NULL,"nama");
		$this->data["_form"] = $this->load->view('contents/entry/_form', $this->data, TRUE);;
		$this->data["status"] = '';

		$this->_load_view_dashboard('entry/form');
	}

	public function submit_laporan()
	{
		$id = $this->input->post('id');
		$id_petugas = $this->input->post('id_petugas');
		$petugas = $this->input->post('petugas');
		$seksi = $this->input->post('seksi');
		$giat = $this->input->post('giat');
		$alamat = $this->input->post('alamat');
		$rw = $this->input->post('rw');
		$rt = $this->input->post('rt');
		$tinjau = $this->input->post('tinjau');
		$saran = $this->input->post('tinjau');
		$dokumentasi = $this->input->post('dokumentasi');

		$data['id_petugas'] = $id_petugas;
		$data['petugas'] = $petugas;
		$data['seksi'] = $seksi;
		$data['giat'] = $giat;
		$data['alamat'] = $alamat;
		$data['rw'] = $rw;
		$data['rt'] = $rt;
		$data['tinjau'] = $tinjau;
		$data['saran'] = $saran;
		$data['dokumentasi'] = $dokumentasi;
		$data['date_created'] = date('Y-m-d H:i:s', now());

		$this->db->trans_start();
		if ($id == NULL || $id == '') {
			$this->m_laporan->save($data);
		} else {
			$this->m_laporan->save($data, $id);
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->_flashdata_sweet("success","Berhasil Entri.<br>Terima Kasih.", 2000);
		} else {
			$this->_flashdata_sweet("warning","Gagal Entri. Mohon refresh.", 2000);
		}

		echo "<script>".$this->session->flashdata('_pop_up_script')."</script>";

		// $this->data['nama_pic'] = $nama_pic;
		// $this->data['nomor_pic'] = $nomor_pic;
		// $this->data['email_pic'] = $email_pic;
		// $this->data['daerah'] = $daerah;
		// $this->data['instansi'] = $instansi;
		// $this->data['tanggal'] = $tanggal;
		// $this->data['waktu'] = $waktu;
		// $this->data['tempat_inap'] = $tempat_inap;
		// $this->data['lama_inap'] = $lama_inap;
		// $this->data['jumlah_peserta'] = $jumlah_peserta;
		// $this->data['nama_pimpinan'] = $nama_pimpinan;
		// $this->data['jabatan_pimpinan'] = $jabatan_pimpinan;
		// $this->data['tujuan'] = $tujuan;
		// $where_topik['id'] = $topik;
		// $data_topik = $this->m_topik->get_by($where_topik, 'row');
		// $this->data['topik'] = $data_topik;
		// $this->data['replikasi'] = $replikasi;
		// $where_pertanyaan['id_kunjungan'] = $id_kunjungan;
		// $data_pertanyaan = $this->m_pertanyaan->get_by($where_pertanyaan, 'result');
		// $this->data['pertanyaan'] = $data_pertanyaan;

		// $where_id['nama_pic'] = $nama_pic;
		// $where_id['nomor_pic'] = $nomor_pic;
		// $where_id['email_pic'] = $email_pic;
		// $where_id['daerah'] = $daerah;
		// $where_id['instansi'] = $instansi;
		// $where_id['tanggal'] = $tanggal;
		// $where_id['waktu'] = $waktu;
		// $where_id['tempat_inap'] = $tempat_inap;
		// $where_id['lama_inap'] = $lama_inap;
		// $where_id['jumlah_peserta'] = $jumlah_peserta;
		// $where_id['nama_pimpinan'] = $nama_pimpinan;
		// $where_id['jabatan_pimpinan'] = $jabatan_pimpinan;
		// $where_id['tujuan'] = $tujuan;
		// $where_id['id_topik'] = $topik;
		// $where_id['replikasi'] = $replikasi;
		// $this->data['id'] = $this->m_laporan->get_by($where_id, 'row');
		// $this->session->set_flashdata('_pop_up_script', "");
		$this->data["pegawai"] = $this->m_pegawai->get("result",NULL,NULL,"nama");
		$this->data["status"] = '';
		$this->_load_only_view('entry/_form');
		// redirect('dashboard');
	}

	public function hapus()
	{
		$id = $this->input->post('id');
		$data['is_hapus'] = '1';
		$data['date_deleted'] = date('Y-m-d H:i:s', now());

		$this->db->trans_start();
		$this->m_laporan->save($data, $id);
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->data['status'] = 'sukses';
		} else {
			$this->data['status'] = 'gagal';
		}

		$where['is_hapus'] = '0';
		$this->data['laporan'] = $this->m_laporan->get_by($where,"result", NULL, NuLL, 'date_created');
		$this->_load_only_view('admin/_tabel');
	}

	public function form_kunjungan()
	{
		$this->data['topik'] = $this->m_topik->get("result", NULL, NULL, 'topik');
		$this->_load_only_view_awal('kunjungan');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/dashboard/Dashboard.php */