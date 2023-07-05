<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Awal extends ED_Controller {

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

	public function index()
	{
		if ($this->session->has_userdata('user_level')) {
			redirect('dashboard');
		} else {

			$this->data['_head_title'] = 'Masuk';
			$this->data['_apps_title'] = ' | ';
			// $this->data['__head_page'] = $this->load->view('components/head', $this->data, TRUE);
			$this->data['__navbar_page'] = $this->load->view('components/navbar', $this->data, TRUE);
			$this->data['__footer_page'] = $this->load->view('components/footer', $this->data, TRUE);
			// $this->data['__script_page'] = $this->load->view('components/script', $this->data, TRUE);
			// $this->data['__content_page'] = $this->load->view('login', $this->data, TRUE);
			$this->data['_msg'] = $this->session->flashdata('_msg');
			$this->load->view('login', $this->data);
		}
	}

	public function submit_kunjungan()
	{
		$id = $this->input->post('id');
		$nama_pic = $this->input->post('nama_pic');
		$nomor_pic = $this->input->post('nomor_pic');
		$email_pic = $this->input->post('email_pic');
		$daerah = $this->input->post('daerah');
		$instansi = $this->input->post('instansi');
		$tanggal = $this->input->post('tanggal');
		$waktu = $this->input->post('waktu');
		$tempat_inap = $this->input->post('tempat_inap');
		$lama_inap = $this->input->post('lama_inap');
		$jumlah_peserta = $this->input->post('jumlah_peserta');
		$nama_pimpinan = $this->input->post('nama_pimpinan');
		$jabatan_pimpinan = $this->input->post('jabatan_pimpinan');
		$tujuan = $this->input->post('tujuan');
		$topik = $this->input->post('topik');
		$replikasi = $this->input->post('replikasi');
		$pertanyaan = $this->input->post('pertanyaan');
		$jumlah = $this->input->post('jumlah-tanya');

		$data['nama_pic'] = $nama_pic;
		$data['nomor_pic'] = $nomor_pic;
		$data['email_pic'] = $email_pic;
		$data['daerah'] = $daerah;
		$data['instansi'] = $instansi;
		$data['tanggal'] = $tanggal;
		$data['waktu'] = $waktu;
		$data['tempat_inap'] = $tempat_inap;
		$data['lama_inap'] = $lama_inap;
		$data['jumlah_peserta'] = $jumlah_peserta;
		$data['nama_pimpinan'] = $nama_pimpinan;
		$data['jabatan_pimpinan'] = $jabatan_pimpinan;
		$data['tujuan'] = $tujuan;
		$data['id_topik'] = $topik;
		$data['replikasi'] = $replikasi;
		$data['pertanyaan'] = $pertanyaan;
		$data['date_created'] = date('d-M-y H:i:s');

		$this->db->trans_start();
		if ($id == NULL || $id == '') {
			$this->m_kunjungan->save($data);

			$where['is_hapus'] = 'f';
			$data_akhir_kunjungan = $this->m_kunjungan->get_by($where, "row", NULL, NULL, 'id', 'desc');

			$id_kunjungan = $data_akhir_kunjungan->id;
			$data2['id_kunjungan'] = $id_kunjungan;
			$data2['pertanyaan'] = $this->input->post('pertanyaan');
			$this->m_pertanyaan->save($data2);
			if ($jumlah >= 2) {
				for ($i=1; $i <= $jumlah; $i++) {
					$pertanyaans = $this->input->post('pertanyaan-'.$i);
					$data3['id_kunjungan'] = $id_kunjungan;
					$data3['pertanyaan'] = $pertanyaans;
					$data3['date_created'] = date('d-M-y H:i:s');
					if ($pertanyaans == '' || $pertanyaans == NULL) {
					} else {
						$this->m_pertanyaan->save($data3);
					}
				}
			}
		} else {
			$this->m_kunjungan->save($data, $id);
		}
		$this->db->trans_complete();

		if ($this->db->trans_status() == TRUE){
			$this->_flashdata_sweet("success","Berhasil submit.<br>Terima Kasih.", 2000);
		} else {
			$this->_flashdata_sweet("danger","Gagal Submit. Mohon refresh.", 2000);
		}

		echo "<script>".$this->session->flashdata('_pop_up_script')."</script>";

		$this->data['nama_pic'] = $nama_pic;
		$this->data['nomor_pic'] = $nomor_pic;
		$this->data['email_pic'] = $email_pic;
		$this->data['daerah'] = $daerah;
		$this->data['instansi'] = $instansi;
		$this->data['tanggal'] = $tanggal;
		$this->data['waktu'] = $waktu;
		$this->data['tempat_inap'] = $tempat_inap;
		$this->data['lama_inap'] = $lama_inap;
		$this->data['jumlah_peserta'] = $jumlah_peserta;
		$this->data['nama_pimpinan'] = $nama_pimpinan;
		$this->data['jabatan_pimpinan'] = $jabatan_pimpinan;
		$this->data['tujuan'] = $tujuan;
		$where_topik['id'] = $topik;
		$data_topik = $this->m_topik->get_by($where_topik, 'row');
		$this->data['topik'] = $data_topik;
		$this->data['replikasi'] = $replikasi;
		$where_pertanyaan['id_kunjungan'] = $id_kunjungan;
		$data_pertanyaan = $this->m_pertanyaan->get_by($where_pertanyaan, 'result');
		$this->data['pertanyaan'] = $data_pertanyaan;

		$where_id['nama_pic'] = $nama_pic;
		$where_id['nomor_pic'] = $nomor_pic;
		$where_id['email_pic'] = $email_pic;
		$where_id['daerah'] = $daerah;
		$where_id['instansi'] = $instansi;
		$where_id['tanggal'] = $tanggal;
		$where_id['waktu'] = $waktu;
		$where_id['tempat_inap'] = $tempat_inap;
		$where_id['lama_inap'] = $lama_inap;
		$where_id['jumlah_peserta'] = $jumlah_peserta;
		$where_id['nama_pimpinan'] = $nama_pimpinan;
		$where_id['jabatan_pimpinan'] = $jabatan_pimpinan;
		$where_id['tujuan'] = $tujuan;
		$where_id['id_topik'] = $topik;
		$where_id['replikasi'] = $replikasi;
		$this->data['id'] = $this->m_kunjungan->get_by($where_id, 'row');

		$this->_load_only_view_awal('submitted');
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