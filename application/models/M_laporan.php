<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends ED_Model {

	protected $_table_name = 'laporan';
	protected $_primary_key = 'id';
	protected $_group_by = '';

	public function __construct()
	{
		parent::__construct();
	}

	public function select_kunjungan_soon()
	{
		$query = $this->db->query("
			SELECT k.*, t.topik, b.bidang_nama
			from kunjungan k left join topik t ON t.id = k.id_topik left join bidang b ON b.id = k.id_bidang
			where k.is_hapus = 'f'
			and tanggal >= now()::date
			order by tanggal, waktu
			");
		return $query->row();
	}

	public function select_kunjungan_belum()
	{
		$query = $this->db->query("
			SELECT k.*, t.topik, case when tanggal = now()::date then 'sekarang' else 'belum' end as ket_tanggal, b.bidang_nama
			from kunjungan k left join topik t ON t.id = k.id_topik left join bidang b ON b.id = k.id_bidang
			where k.is_hapus = 'f'
			and tanggal >= now()::date
			order by tanggal, waktu
			");
		return $query->result();
	}
	
	public function select_kunjungan_sudah()
	{
		$query = $this->db->query("
			SELECT k.*, t.topik, b.bidang_nama
			from kunjungan k left join topik t ON t.id = k.id_topik left join bidang b ON b.id = k.id_bidang
			where k.is_hapus = 'f'
			and tanggal < now()::date
			order by tanggal desc, waktu desc
			");
		return $query->result();
	}

	public function select_row($id)
	{
		$query = $this->db->query("
			SELECT k.*, t.topik, b.bidang_nama
			from kunjungan k left join topik t ON t.id = k.id_topik left join bidang b ON b.id = k.id_bidang
			where k.id = $id
			");
		return $query->row();
	}
	
	public function get_target($id, $tipe)
	{
		$query = $this->db->query("
			SELECT *
			from $tipe
			where id = $id
			and is_hapus = 'f'
			");
		return $query->row();
	}
}