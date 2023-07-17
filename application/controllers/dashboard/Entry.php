<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entry extends ED_Controller {

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
		$this->data['_head_title'] = 'Siap Lapor Ketintang';
		if ($this->session->userdata('user_level') == '3') {
			$where['nama'] = $this->session->userdata('user_name');
			$this->data["pegawai"] = $this->m_pegawai->get_by($where, "result",NULL,NULL,"nama");
		} else {
			$this->data["pegawai"] = $this->m_pegawai->get("result",NULL,NULL,"nama");
		}
		$this->data["giat"] = $this->m_laporan->select_distinct_giat();
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
		$tanggal = $this->input->post('tanggal');
		$alamat = $this->input->post('alamat');
		$rw = $this->input->post('rw');
		$rt = $this->input->post('rt');
		$tinjau = $this->input->post('tinjau');
		$saran = $this->input->post('saran');
		$tindaklanjut = $this->input->post('tindaklanjut');
		// $dokumentasi = $this->input->post('dokumentasi');
		// $dokumentasi = $_FILES['dokumentasi'];

		$data['id_petugas'] = $id_petugas;
		$data['petugas'] = $petugas;
		$data['seksi'] = $seksi;
		$data['giat'] = $giat;
		$data['tanggal'] = date('Y-m-d', strtotime($tanggal));
		$data['alamat'] = $alamat;
		$data['rw'] = $rw;
		$data['rt'] = $rt;
		$data['tinjau'] = $tinjau;
		$data['saran'] = $saran;
		$data['tindaklanjut'] = $tindaklanjut;
		// $data['dokumentasi'] = $dokumentasi;
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
			// $data_entri->id_petugas = $id_petugas;
			$data_entri['petugas'] = $petugas;
			$data_entri['seksi'] = $seksi;
			$data_entri['giat'] = $giat;
			$data_entri['tanggal'] = $tanggal;
			$data_entri['alamat'] = $alamat;
			$data_entri['rw'] = $rw;
			$data_entri['rt'] = $rt;
			$data_entri['tinjau'] = $tinjau;
			$data_entri['saran'] = $saran;
			$data_entri['tindaklanjut'] = $tindaklanjut;
			$this->data['entri'] = $data_entri;
		}

		echo "<script>".$this->session->flashdata('_pop_up_script')."</script>";

		if ($this->session->userdata('user_level') == '3') {
			$where['nama'] = $this->session->userdata('user_name');
			$this->data["pegawai"] = $this->m_pegawai->get_by($where, "result",NULL,NULL,"nama");
		} else {
			$this->data["pegawai"] = $this->m_pegawai->get("result",NULL,NULL,"nama");
		}
		$this->data["status"] = '';
		$this->data["giat"] = $this->m_laporan->select_distinct_giat();
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