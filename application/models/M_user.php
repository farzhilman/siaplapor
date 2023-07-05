<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends ED_Model {

	protected $_table_name = 'master_user';
	protected $_primary_key = 'id';
	protected $_group_by = '';

	public function __construct()
	{
		parent::__construct();
	}

	public function list_dinas()
	{
		$query = $this->db->query("
			SELECT unit_id, user_name
			from penetapan_renstra.master_user
			where length(unit_id)=4
			and user_level=5
			and unit_id<>'9999'
			order by unit_id
			");
		return $query->result();
	}

	public function user_pa($unit_id)
	{
		$query = $this->db->query("
			SELECT distinct b.unit_id, b.pa_name, b.pa_nip, b.pa_jabatan, b.pa_golongan, REPLACE(u.kode_permen, '.', ' ') as kode_permen
			from penetapan_renstra.unit_kerja u, anggaran_ranwal.daftar_kepala_pd b
			where b.unit_id ilike '%$unit_id%'
			and b.unit_id = u.unit_id
			");
		return $query->row();
	}

	public function user_pa_md5($unit_id)
	{
		$query = $this->db->query("
			SELECT distinct b.unit_id, b.pa_name, b.pa_nip, b.pa_jabatan, b.pa_golongan, REPLACE(u.kode_permen, '.', ' ') as kode_permen
			from penetapan_renstra.unit_kerja u, anggaran_ranwal.daftar_kepala_pd b
			where MD5(b.unit_id) = '$unit_id'
			and b.unit_id = u.unit_id
			");
		return $query->row();
	}
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */