<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends ED_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user_id')) {
            redirect('login');
            // redirect('https://eplanning.surabaya.go.id/');
        }
	}
 
	public function index(){
        
 	}

   public function uploadjpg($id){
        // $id = $this->input->post('id');
    
        $config['upload_path'] = './uploaded/foto/'.$id;
        $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG|pdf|PDF';
        // $config['remove_spaces'] = 'true';
        $config['detect_mime'] = 'true';
        $config['max_size'] = '2000';
        // $config['overwrite'] = TRUE;
        // $config['file_name']      = 'pdf-'.$renja;
 
        $this->load->library('upload', $config);
        
        // create an album if not already exist in uploads dir
        // wouldn't make more sence if this part is done if there are no errors and right before the upload ??
        if (!is_dir('./uploaded/foto/'.$id))
        {
            mkdir('./uploaded/foto/'.$id, 0777, true);
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

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */