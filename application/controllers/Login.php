<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends ED_Controller {

	public function __construct()
	{
		parent::__construct();
		// if ($this->session->has_userdata('user_level')) {
		// 	redirect('dashboard');
			// redirect('https://eplanning.surabaya.go.id/');
		// }
	}
 
	public function index()
	{
		if ($this->session->has_userdata('user_level')) {
			redirect('dashboard');
		} else {

			$this->data['_head_title'] = 'Masuk';
			$this->data['_apps_title'] = ' | Bappedalitbang Surabaya';
			// $this->data['__head_page'] = $this->load->view('components/head', $this->data, TRUE);
			$this->data['__navbar_page'] = $this->load->view('components/navbar', $this->data, TRUE);
			$this->data['__footer_page'] = $this->load->view('components/footer', $this->data, TRUE);
			$this->data['_pop_up_script'] = $this->session->flashdata('_pop_up_script');
			$this->data['_msg'] = $this->session->flashdata('_msg');
			// $this->data['__script_page'] = $this->load->view('components/script', $this->data, TRUE);
			// $this->data['__content_page'] = $this->load->view('login', $this->data, TRUE);
			$this->load->view('login', $this->data);
		}
		/* Load View Login */
		// $this->load->view('login', $this->data);
	}
	
	public function proses()
	{
		/* get data POST, jika tidak ada redirect login */
		if ($this->input->post('username') == NULL) {
			$this->_flashdata_msg("danger","");
			redirect('login');
		}
		$where['user_id'] = $this->input->post('username');
		$where['user_password'] = md5($this->input->post('password'));

		/* access db */
		$data_login = $this->master_user->get_by($where,'row');
		$data_login_array = $this->master_user->get_by($where,'row_array');

		/* cek validitas login */
		$log_login = $this->_cek_valid_login($data_login);
		if ($log_login['status_login']) {
			$where['user_id'] = $this->input->post('username');
			$data['last_login'] = date('Y-m-d H:i:s');
			$this->master_user->save($data, NULL, $where);
			$this->_set_session($data_login_array);
			// $this->_flashdata_pop_up("success","Berhasil Login ".$data_login_array["username"], "2");
			$this->_flashdata_toast("success","Selamat Datang !");
			redirect('dashboard');
		} else {
			echo "<script>console.log('Debug Objects: " . $log_login['kode'] . "' );</script>";
			/* Flashdata dari pengecekan gagal */
			if ($log_login['kode'] == '404') {
				// $this->_flashdata_pop_up("danger","Username atau Password salah !!!");
				$this->_flashdata_msg("danger","Username atau Password salah !!!");
			} else if ($log_login['kode'] == '500') {
				// $this->_flashdata_pop_up("danger","Username yang anda gunakan sudah dilock !!!");
				$this->_flashdata_msg("danger","Username yang anda gunakan sudah dilock !!!");
			} else if ($log_login['kode'] == '300') {
				// $this->_flashdata_pop_up("danger","Waktu anda untuk login sudah habis !!!");
				$this->_flashdata_msg("danger","Waktu anda untuk login sudah habis !!!");
			} else if ($log_login['kode'] == '301') {
				// $this->_flashdata_pop_up("danger","Belum merupakan waktu login !!!");
				$this->_flashdata_msg("danger","Belum merupakan waktu login !!!");
			}
			redirect('login');
		}
	}

	public function proses_ajax(){
		/* get data POST, jika tidak ada redirect login */
		if ($this->input->post('username') == NULL) {
			redirect('login');
		}
		$where['user_id'] = $this->input->post('username');
		$where['user_password'] = md5($this->input->post('password'));

		/* access db */
		$data_login = $this->master_user->get_by($where,'row');
		$data_login_array = $this->master_user->get_by($where,'row_array');

		/* cek validitas login */
		$log_login = $this->_cek_valid_login($data_login);
		if ($log_login['status_login']) {
			$this->_set_session($data_login_array);
			$this->_flashdata_pop_up("success","Berhasil Login ".$data_login_array["username"], "2");
			// redirect($this->session->userdata('_url_redirect_login'));
			$this->_load_only_view("dash");
		} else {
			/* Flashdata dari pengecekan gagal */
			if ($log_login['kode'] == '404') {
				$this->_flashdata_pop_up("danger","Username atau Password salah !!!");
			} else if ($log_login['kode'] == '500') {
				$this->_flashdata_pop_up("danger","Username yang anda gunakan sudah dilock !!!");
			} else if ($log_login['kode'] == '300') {
				$this->_flashdata_pop_up("danger","Waktu anda untuk login sudah habis !!!");
			} else if ($log_login['kode'] == '301') {
				$this->_flashdata_pop_up("danger","Belum merupakan waktu login !!!");
			}
			redirect('login');
		}
	}

	/* Function untuk set session */
	private function _set_session($data_login){
		/* Set Main Session */
		// $this->session->set_userdata('id_user',$data_login->id_user);
		// $this->session->set_userdata('username',$data_login->username);
		// $this->session->set_userdata('nama_user',$data_login->nama_user);
		// $this->session->set_userdata('level_user',$data_login->level_user);

		/* Set yang berhubungan dengan SKPD, apakah bidang atau admin SKPD */
		// if ($data_login->level_user == "ADMIN") {
		// 	$this->session->set_userdata('id_skpd',$data_login->id_skpd);
		// } else if ($data_login->level_user == "USER") {
		// 	$this->session->set_userdata('id_bidang_skpd',$data_login->id_bidang_skpd);
		// }

		$this->session->set_userdata($data_login);
	}

	private function _destroy_session(){
		$this->session->sess_destroy();
	}

	/* Function untuk pengecekan validitas login */
	private function _cek_valid_login($data_login = null){
		/* Cek apakah data bukan null atau kosong */
		if ($data_login == null || $data_login == "") {
			$log_login['status_login'] = false;
			$log_login['kode'] = "404";
			return $log_login;
		}

		// /* Cek apakah locked user */
		// if ($data_login->locked == 'YES') {
		// 	$log_login['status_login'] = false;
		// 	$log_login['kode'] = "500";
		// 	return $log_login;
		// }

		// /* Cek apakah tanggal hari ini melewati batas aktif */
		// if (strtotime($this->_date_now_mysql()) > strtotime($data_login->tgl_batas_aktif)) {
		// 	$log_login['status_login'] = false;
		// 	$log_login['kode'] = "300";
		// 	return $log_login;
		// }

		// /* Cek apakah tanggal hari ini sudah bisa aktif */
		// if (strtotime($this->_date_now_mysql()) < strtotime($data_login->tgl_mulai_aktif)) {
		// 	$log_login['status_login'] = false;
		// 	$log_login['kode'] = "301";
		// 	return $log_login;
		// }
		$log_login['status_login'] = true;
		$log_login['kode'] = "200";
		return $log_login;
	}

	public function proses_sso()
	{
		// $user_id = $this->encryption->decrypt(base64_decode($user_id_));
		// $password = $this->encryption->decrypt(base64_decode($password_));
		/* get data POST, jika tidak ada redirect login */
		// if ($this->input->post('username') == NULL) {
		// 	redirect('login');
		// }
		// return $this->input->post('body');
		// return $_REQUEST;

		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password');

		$where['user_id'] = $this->input->post('username');
		$where['passwd'] = md5($this->input->post('password'));

		// $where['user_id'] = $user_id;
		// $where['passwd'] = md5($password);

		/* access db */
		$data_login = $this->master_user->get_by($where,'row');
		$data_login_array = $this->master_user->get_by($where,'row_array');

		/* cek validitas login */
		$log_login = $this->_cek_valid_login($data_login);
		if ($log_login['status_login']) {
			$where['user_id'] = $this->input->post('username');
			$data['last_login'] = date('Y-m-d H:i:s');
			$this->master_user->save($data, NULL, $where);

			// $this->_set_session($data_login_array);
			// $this->_flashdata_pop_up("success","Berhasil Login ".$data_login_array["username"], "2");
			// redirect('dashboard');

			$data = array("username"=>$data_login->user_name,"status"=> 1);
			header('Content-Type: application/json');
			echo json_encode($data);

		} else {
			// /* Flashdata dari pengecekan gagal */
			// if ($log_login['kode'] == '404') {
			// 	$this->_flashdata_pop_up("danger","Username atau Password salah !!!");
			// } else if ($log_login['kode'] == '500') {
			// 	$this->_flashdata_pop_up("danger","Username yang anda gunakan sudah dilock !!!");
			// } else if ($log_login['kode'] == '300') {
			// 	$this->_flashdata_pop_up("danger","Waktu anda untuk login sudah habis !!!");
			// } else if ($log_login['kode'] == '301') {
			// 	$this->_flashdata_pop_up("danger","Belum merupakan waktu login !!!");
			// }
			// redirect('login');

			$data = array("username"=>"gagal ".$username.'-'.$password,"status"=> 0);
			header('Content-Type: application/json');
			echo json_encode($data);
		}
	}

	public function proses_sso_uname()
	{
		$username = $this->input->post('username', TRUE);

		$where['user_id'] = $this->input->post('username');
		$data_login = $this->master_user->get_by($where,'row');
		$data_login_array = $this->master_user->get_by($where,'row_array');

		/* cek validitas login */
		$log_login = $this->_cek_valid_login($data_login);
		if ($log_login['status_login']) {
			$where['user_id'] = $this->input->post('username');
			$data['last_login'] = date('Y-m-d H:i:s');
			$this->master_user->save($data, NULL, $where);

			$data = array("username"=>$data_login->user_name,"status"=> 1);
			header('Content-Type: application/json');
			echo json_encode($data);

		} else {

			$data = array("username"=>"gagal ".$username.'-'.$password,"status"=> 0);
			header('Content-Type: application/json');
			echo json_encode($data);
		}
	}

	public function proses_sso_get($username)
	{
		$where['md5(user_id)'] = $username;
		$data_login_array = $this->master_user->get_by($where,'row_array');
		$this->_set_session($data_login_array);
		redirect('dashboard');
	}

	public function proses_set_session($username)
	{
		$where['md5(user_id)'] = $username;

		$data_login = $this->master_user->get_by($where,'row');
		$data_login_array = $this->master_user->get_by($where,'row_array');

		$where['user_id'] = $this->input->post('username');
		$data['last_login'] = date('Y-m-d H:i:s');
		$this->master_user->save($data, NULL, $where);

		$this->_set_session($data_login_array);
		
		redirect('dashboard'); json_encode($data);
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */