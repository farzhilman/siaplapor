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

	public function select_count_laporan()
	{
		$query = $this->db->query("
			SELECT count(giat) as count
			from laporan
			where is_hapus = 0
			");
		return $query->row();
	}

	public function select_count_laporan_pergiat($giat)
	{
		$query = $this->db->query("
			SELECT count(giat) as count
			from laporan
			where giat = '$giat'
			and is_hapus = 0
			");
		return $query->row();
	}

	public function select_giat_terbanyak($user = '')
	{
		$query = $this->db->query("
			SELECT giat, count(giat) as count
			from laporan
			where is_hapus = 0
			GROUP BY giat
			order by count desc
			Limit 5
			");
		return $query->result();
	}

	public function isian_anda($user = '')
	{
		$query = $this->db->query("
			SELECT giat, count(giat) as count
			from laporan
			where is_hapus = 0
			and petugas LIKE '%$user%'
			GROUP BY giat
			order by count desc
			");
		return $query->result();
	}

	public function select_laporan_terbanyak()
	{
		$query = $this->db->query("
			SELECT petugas, count(petugas) as count
			from laporan
			where is_hapus = 0
			GROUP BY petugas
			order by count desc
			Limit 5
			");
		return $query->result();
	}

	public function select_distinct_giat()
	{
		$query = $this->db->query("
			SELECT DISTINCT giat
			from laporan
			where giat NOT IN ('LAPORAN WARGA', 'KEJADIAN DARURAT', 'KEGIATAN RUTIN', 'ARAHAN PIMPINAN')
			order by giat
			");
		return $query->result();
	}

	public function select_filter($petugas, $seksi, $giat, $rw, $rt)
	{
		$query = $this->db->query("
			SELECT *
			from laporan
			where petugas like '%$petugas%'
			and seksi like '%$seksi%'
			and giat like '%$giat%'
			and rw like '%$rw%'
			and rt like '%$rt%'
			and is_hapus = '0'
			order by date_created
			");
		return $query->result();
	}
}