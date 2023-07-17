<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Core class Controller
*/
class ED_Controller extends CI_Controller
{
	/* Config dasar yang diturunkan ke seluruh controller yang mengextend */
	protected $data;
	protected $data_json;

	/* Fungsi Construct yang sudah dimodifikasi */
	public function __construct()
	{
		/* Jalankan construct yang ada di CI_Controller (wajib ada) */
		parent::__construct();

		/* Encryption Initialisation (keperluan keamanan) */
		$this->encryption->initialize(
		        array(
		                'cipher' => 'blowfish',
		                'mode' => 'cfb',
		        )
		);
		// $this->encryption->set_cipher(MCRYPT_BLOWFISH);
		// $this->encryption->set_mode(MCRYPT_MODE_CFB);

		/* Config untuk keperluan title (diambil dari my_config.php) */
		$this->data['_apps_title'] = $this->config->item('tag_apps');
		$this->data['_tag_meta_desc'] = $this->config->item('tag_meta_desc');
		$this->data['_tag_meta_author'] = $this->config->item('tag_meta_author');
		$this->data['_copy_company_footer'] = $this->config->item('copyright_company');
		$this->data['_copy_city_footer'] = $this->config->item('city_company');
		$this->data['_copy_author_footer'] = $this->config->item('tag_meta_author');
		$this->data['_copy_mail_footer'] = $this->config->item('email_company');
		// $this->data['_apps_sub_title'] = $this->config->item('tag_apps_jargon');

		/* Config untuk keperluan halaman */
		$this->data['_head_title'] = "Siap Lapor Ketintang";
		$this->data['_header_title'] = "";
		$this->data['_header_sub_title'] = "";
		$this->data['_pop_up_script'] = $this->session->flashdata('_pop_up_script');
		$this->data['_sidebar_focus'] = "";
		$this->data['_print'] = "";
		$this->data['_script__'] = "";


		/* Tahun dasar pencatatan */
		$this->data['_tahun_dasar'] = $this->config->item('tahun_dasar');
		$this->data['_tahun_sekarang'] = date("Y");

		/* Variabel tambahan Json (keperluan API) */
		$this->data_json["code"] = "";
		$this->data_json["status"] = "";
		$this->data_json["data"] = "";
	}

	/* Function untuk load Dashboard */
	protected function _load_view_dashboard($content = 'dashboard')
	{
		/* Load semua file yang dibutuhkan untuk semua bagian halaman kecuali content */
		$this->data['__head_page'] = $this->load->view('components/head', $this->data, TRUE);
		$this->data['__header_page'] = $this->load->view('components/header', $this->data, TRUE);
		$this->data['__navbar_page'] = $this->load->view('components/navbar', $this->data, TRUE);
		$this->data['__footer_page'] = $this->load->view('components/footer', $this->data, TRUE);
		$this->data['__script_page'] = $this->load->view('components/script', $this->data, TRUE);
		// $this->data['__headmenu_page'] = $this->load->view('components/headmenu', $this->data, TRUE);
		$this->data['_pop_up_script'] = $this->session->flashdata('_pop_up_script');
		$this->data['__user_menu_page'] = $this->load->view('components/'.$this->session->userdata('user_level').'/user_menu', $this->data, TRUE);
		
		/* Load Content sesuai kategori user */
		// $this->data['__content_page'] = $this->load->view('contents/'.$this->session->userdata('user_level').'/'.$content, $this->data, TRUE);
		$this->data['__content_page'] = $this->load->view('contents/'.$content, $this->data, TRUE);

		/* Load view Dashboard */
		$this->load->view('dashboard', $this->data);
	}

	protected function _load_view_dashboard_bersih($content = 'dashboard')
	{
		/* Load semua file yang dibutuhkan untuk semua bagian halaman kecuali content */
		$this->data['__head_page'] = $this->load->view('components/head', $this->data, TRUE);
		$this->data['__script_page'] = $this->load->view('components/script', $this->data, TRUE);
		
		$this->data['__content_page'] = $this->load->view('contents/'.$content, $this->data, TRUE);

		/* Load view Dashboard */
		$this->load->view('dashboard_bersih', $this->data);
	}

	protected function _load_view_print($content = 'dashboard', $save = FALSE)
	{
		/* Load semua file yang dibutuhkan untuk semua bagian halaman kecuali content */
		$this->data['__head_page'] = $this->load->view('components/head', $this->data, TRUE);
		$this->data['__header_page'] = '';
		$this->data['__navbar_page'] = '';
		$this->data['__footer_page'] = '';
		$this->data['__script_page'] = $this->load->view('components/script', $this->data, TRUE);
		// $this->data['__headmenu_page'] = $this->load->view('components/headmenu', $this->data, TRUE);
		// $this->data['_pop_up_script'] = $this->session->flashdata('_pop_up_script');

		$this->data['__user_menu_page'] = '';
		
		/* Load Content sesuai kategori user */
		// $this->data['__content_page'] = $this->load->view('contents/'.$this->session->userdata('user_level').'/'.$content, $this->data, TRUE);
		$this->data['__content_page'] = $this->load->view('contents/'.$content, $this->data, TRUE);

		/* Load view Dashboard */
		$this->load->view('dashboard', $this->data, $save);
	}

	/* Function untuk load only view */
	protected function _load_only_view($content = "dashboard")
	{
		/* Load semua file yang dibutuhkan untuk semua bagian halaman kecuali content */
		// $this->data['__head_page'] = $this->load->view('components/head', $this->data, TRUE);
		// $this->data['__script_page'] = $this->load->view('components/script', $this->data, TRUE);

		/* Load view Dashboard */
		// $this->load->view('contents/'.$this->session->userdata('user_level').'/'.$content, $this->data);
		$this->load->view('contents/'.$content, $this->data);

		/* Load Content sesuai kategori user */
		// $this->data['__content_page'] = $this->load->view('contents/'.$this->session->userdata('level').'/'.$content, $this->data, TRUE);

		/* Load view Dashboard */
		// $this->load->view('only_view', $this->data);
	}

	protected function _load_only_view_awal($content = "dashboard")
	{
		/* Load semua file yang dibutuhkan untuk semua bagian halaman kecuali content */
		// $this->data['__head_page'] = $this->load->view('components/head', $this->data, TRUE);
		// $this->data['__script_page'] = $this->load->view('components/script', $this->data, TRUE);

		/* Load view Dashboard */
		// $this->load->view('contents/'.$this->session->userdata('user_level').'/'.$content, $this->data);
		$this->load->view($content, $this->data);

		/* Load Content sesuai kategori user */
		// $this->data['__content_page'] = $this->load->view('contents/'.$this->session->userdata('level').'/'.$content, $this->data, TRUE);

		/* Load view Dashboard */
		// $this->load->view('only_view', $this->data);
	}

	/* Function untuk encode json */
	protected function _load_json_encode()
	{
		echo json_encode($this->data_json);
	}

	/* Function untuk decode json */
	protected function _load_json_decode($data)
	{
		$this->data_json = json_decode($data);
	}

	/* Function untuk load Error */
	protected function _load_errors_page($content = 'dashboard')
	{
		/* File yang dibutuhkan untuk load bagian semua halaman kecuali content */
		$this->data['__head_page'] = $this->load->view('components/head', $this->data, TRUE);
		$this->data['__script_page'] = $this->load->view('components/script', $this->data, TRUE);
		
		/* Content */
		$this->data['__content_page'] = $this->load->view('errors/ED_errors/'.$content, $this->data, TRUE);

		/* Load view Dashboard */
		$this->load->view('errors', $this->data);
	}

	/* Function untuk buat flashdata PopUp status */
	protected function _flashdata_pop_up($jenis = "success",$message = "Tes",$auto_close = "5",$focus = "false",$icon = "")
	{
		// $this->session->set_flashdata('_pop_up_script', "Pleasure.handleToastrSettings(true, 'toast-top-full-width', false, '".$jenis."', 'true', null, '".$message."');");
		$this->session->set_flashdata('_pop_up_script',
			"App.alert({
				container:'#alert-show',
				place:'prepend',
				type:'".$jenis."',
				message:'".$message."',
				close:true,
				reset:true,
				focus:".$focus.",
				closeInSeconds:'".$auto_close."',
				icon:'".$icon."'
			});");
	}

	protected function _flashdata_sweet($icon = "success", $title = "berhasil", $time = 1000)
	{
		$this->session->set_flashdata('_pop_up_script',
		"Swal.fire({
			timer: ".$time.",
			icon: '".$icon."',
			title:'".$title."'
		});");
	}

	protected function _flashdata_toast($icon = "success", $title = "berhasil", $time = 1000)
	{
		$this->session->set_flashdata('_pop_up_script',
		"Toast.fire({
			icon: '".$icon."',
			title:'".$title."'
		});");
	}

	protected function _flashdata_msg($icon = "success", $title = "berhasil", $time = 1000)
	{
		$this->session->set_flashdata('_msg', $title);
	}

	/* Decrypt code (keperluan keamanan) */
	public function _decrypt_code($code)
	{
		return $this->encryption->decrypt(base64_decode($code));
	}

	/* Encrypt code (keperluan keamanan) */
	public function _encrypt_code($code)
	{
		return base64_encode($this->encryption->encrypt($code));
	}

	/* Function untuk get data sekarang. */
	protected function _date_now_mysql()
	{
		return date('Y-m-d');
	}

	public function save_aktivitas($unit_id = NULL, $aktivitas = NULL, $id_elemen = NULL, $tipe = NULL, $val = NULL, $keterangan = NULL)
	{
		
		$data_aktiv['unit_id'] = $unit_id;
		$data_aktiv['user_id'] = $this->session->userdata('user_id');
		$data_aktiv['aktivitas'] = $aktivitas;
		$data_aktiv['id_elemen'] = $id_elemen;
		$data_aktiv['tipe'] = $tipe;
		$data_aktiv['val'] = $val;
		$data_aktiv['keterangan'] = $keterangan;
		$data_aktiv['activity_date'] = date('d-M-y H:i:s');
		$this->m_log_aktivitas->save($data_aktiv);
	}

}

/* End of file ED_Controller.php */
/* Location: ./application/core/ED_Controller.php */