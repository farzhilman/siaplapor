<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends ED_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if (!$this->session->has_userdata('user_level')) {
			// redirect('login');
			redirect('https://eplanning.surabaya.go.id/');
		}
	}

	public function index()
	{

	}

	/* Halaman Edit */
	public function ganti_psw()
	{
		$this->data["data_user"] = $this->master_user->get("result",NULL,NULL,"user_name","asc");
		$this->data["pesan"] = '';

		$this->_load_only_view("setting/ganti_psw");
	}

	public function proses_ganti_password()
	{	
		$password_ = $this->input->post('password_');
		$password = $this->input->post('password');
		$password2 = $this->input->post('password2');
		$user_level = $this->input->post('user_level');
		$id = $this->input->post('id');
		$pesan = '';

		$where["id"] = $id;
		$where["user_level"] = $user_level;
		$data_user = $this->master_user->get_by($where,"row");		

		if ($password == '' || $password2 == '' || $password_ == '') {
			$pesan = 'Mohon memasukkan password.';
			$warna = 'red';
		} elseif (md5($password_) != $data_user->passwd) {
			$pesan = 'Password Lama Salah.';
			$warna = 'red';
		} elseif ($password <> $password2) {
			$pesan = 'Password tidak sama.';
			$warna = 'red';
		} elseif (strlen($password) < 5) {
			$pesan = 'Password minimal 5 karakter atau lebih.';
			$warna = 'red';
		} elseif ($password == $password2 && md5($password_) == $data_user->passwd) {
			$pesan = 'Berhasil.';
			$warna = 'green';

			// $where['id'] = $id;
			$where['user_level'] = $user_level;
			$data['passwd'] = md5($password);
			$data['passwd_ganti'] = $password;
			$this->db->trans_start();
			$this->master_user->save($data, $id, $where);
			$this->db->trans_complete();

			if ($this->db->trans_status() == FALSE)
			{
				$warna = 'red';
				$pesan = 'Gagal mengubah password. Mohon tekan Ctrl + F5.';
			}
		}

		$this->data["pesan"] = $pesan;
		$this->data["warna"] = $warna;
		$this->data["data_user"] = $this->master_user->get("result",NULL,NULL,"user_name","asc");
		$this->_load_only_view("setting/ganti_psw");
	}
}

/* End of file User.php */
/* Location: ./application/controllers/dashboard/setting/User.php */