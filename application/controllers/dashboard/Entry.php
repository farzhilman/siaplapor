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
		$this->data['entri'] = [];

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
		// $dokumentasi = $this->input->post('dokumentasi');
		$dokumentasi = $_FILES['dokumentasi'];

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

        $config['upload_path'] = './uploaded/foto/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG|pdf|PDF';
        // $config['remove_spaces'] = 'true';
        $config['detect_mime'] = 'true';
        $config['max_size'] = '10000';
        $this->load->library('upload', $config);
        // create an album if not already exist in uploads dir
        // wouldn't make more sence if this part is done if there are no errors and right before the upload ??
        if (!is_dir('./uploaded/foto/'))
        {
            mkdir('./uploaded/foto/', 0777, true);
        }

        if (!$this->upload->do_upload('dokumentasi')){
            $status_upload = 'error';
            $msg = $this->upload->display_errors();
        }
        else{
            $dataupload = $this->upload->data();
            $status_upload = 'success';
            $data['dokumentasi'] = $dataupload['file_name'];
            $msg = $dataupload['file_name'].' berhasil diupload.';
        }
        
        // $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status_upload,'msg'=>$msg)));

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
			$data_entri->id_petugas = $id_petugas;
			$data_entri->petugas = $petugas;
			$data_entri->seksi = $seksi;
			$data_entri->giat = $giat;
			$data_entri->alamat = $alamat;
			$data_entri->rw = $rw;
			$data_entri->rt = $rt;
			$data_entri->tinjau = $tinjau;
			$data_entri->saran = $saran;
			// $data_entri->dokumentasi = $dokumentasi;
			$this->data['entri'] = $data_entri;
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

	public function uploadjpg($id){
        // $id = $this->input->post('id');
        $config['upload_path'] = './uploaded/foto/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG|pdf|PDF';
        // $config['remove_spaces'] = 'true';
        $config['detect_mime'] = 'true';
        $config['max_size'] = '10000';
        // $config['overwrite'] = TRUE;
        // $config['file_name']      = 'pdf-'.$renja;
        $this->load->library('upload', $config);
        // create an album if not already exist in uploads dir
        // wouldn't make more sence if this part is done if there are no errors and right before the upload ??
        if (!is_dir('./uploaded/foto/'))
        {
            mkdir('./uploaded/foto/', 0777, true);
        }

        if (!$this->upload->do_upload('file')){
            $status = 'error';
            $msg = $this->upload->display_errors();
        }
        else{
            $dataupload = $this->upload->data();
            $status = 'success';
           
            $data['id_kunjungan'] = $id;
            $data['nama_file'] = $dataupload['file_name'];
            $data['date_created'] = date('d-M-y H:i:s');
            $this->m_kunjungan_foto->save($data);

            if ($this->session->userdata('user_level') == 1) {
                $msg = $dataupload['file_name'].' berhasil diupload.';
            } else {
                $where_kunjungan['id'] = $id;
                $data_kunjungan = $this->m_kunjungan->get_by($where_kunjungan, 'row');

                $where_bidang['bidang_user'] = $this->session->userdata('user_id');
                $data_bidang = $this->m_bidang->get_by($where_bidang, 'row');
                $data1['id_bidang'] = $data_bidang->id;

                if ($data_kunjungan->id_bidang == NULL) {
                    $this->m_kunjungan->save($data1, $id);
                    $msg = $dataupload['file_name'].' berhasil diupload dan Kunjungan berhasil ditindaklanjuti.';
                } else {
                    $msg = $dataupload['file_name'].' berhasil diupload.';
                }
            }
        }
        $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
    }

    public function isiupload(){
        //Select Where & Tampil
        $where["id_kunjungan"] = $this->input->post('id');
        $where["is_hapus"] = 'f';
        $this->data["isiupload"] = $this->m_kunjungan_foto->get_by($where,"result",NULL,NULL,'id','asc');

        $this->_load_only_view("upload/isi_kunjungan_foto");
    }

    public function hapus_kunjungan_foto()
    {
        $id = $this->input->post('id');
        $data['is_hapus'] = 't';
        $data['date_deleted'] = date('d-M-y H:i:s');

        $this->db->trans_start();
        $this->m_kunjungan_foto->save($data, $id);
        $this->db->trans_complete();

        if ($this->db->trans_status() == TRUE){
            $this->_flashdata_sweet("success","Berhasil dihapus.");
        } else {
            $this->_flashdata_sweet("error","Gagal. Mohon Refresh Halaman.");
        }
        echo "<script>".$this->session->flashdata('_pop_up_script')."</script>";

        $where_foto['id'] = $id;
        $data_foto = $this->m_kunjungan_foto->get_by($where_foto,"row");

        $where["id_kunjungan"] = $data_foto->id_kunjungan;
        $where["is_hapus"] = 'f';
        $this->data["isiupload"] = $this->m_kunjungan_foto->get_by($where,"result",NULL,NULL,'id','asc');

        $this->_load_only_view("upload/isi_kunjungan_foto");    
    }
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/dashboard/Dashboard.php */