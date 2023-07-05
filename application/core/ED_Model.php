<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Core class Model
*/

class ED_Model extends CI_Model {

	/* Config dasar yang diturunkan ke seluruh model yang mengextend */
	protected $_table_name = '';
	protected $_primary_key = '';
	protected $_group_by = '';

	/* Fungsi Construct (wajib ada) */
	public function __construct()
	{
		parent::__construct();
	}

	/* Function to count row */
	public function count_all_row()
	{
		return $this->db->count_all($this->_table_name);
	}

	public function count_where($where)
	{
		$this->db->where($where);
		$this->db->from($this->_table_name);
		return $this->db->count_all_results();
	}

	/* Fungsi untuk get dengan query */
	public function get_by_query($query = NULL,$method = "result",$limit = NULL,$offset = NULL)
	{
		/* Cek apakah query ada atau tidak */
		if ($query == NULL) {
			return NULL;
		}

		/* Cek limit dan offset, jika ada maka set limit dan offset */
		if (($limit != NULL || $limit != '') && ($offset != NULL || $offset != '')) {
			$query .= " LIMIT ".$limit." OFFSET ".$offset;
		}

		/* Get berdasarkan query dan kembalikan ke controller */
		return $this->db->query($query)->$method();
	}

	/* Fungsi untuk get dengan query berdasarkan tahun */
	public function get_by_query_year($query = NULL, $year = '',$method = "result")
	{
		/* Cek apakah query ada atau tidak */
		if ($query == NULL) {
			return NULL;
		}

		/* Extend Query with year */
		$query .= "";

		/* Get berdasarkan query dan kembalikan ke controller */
		return $this->db->query($query)->$method();
	}

	/* Fungsi untuk get otomatis */
	public function get($method = "result",$limit = NULL,$offset = NULL,$order_by = NULL,$order = 'asc')
	{
		/* Cek order by, jika ada maka order data */
		if ($order_by != NULL || $order_by != '') {
			$this->db->order_by($order_by, $order);
		}

		/* Cek limit dan offset, jika ada maka set limit dan offset */
		if (($limit != NULL || $limit != '') && ($offset != NULL || $offset != '')) {
			$this->db->limit($limit,$offset);
		}

		/* Get data dan kembalikan ke controller */
		return $this->db->get($this->_table_name)->$method();
	}

	/* Fungsi untuk get dengan where */
	public function get_by($where,$method = 'result',$limit = NULL,$offset = NULL,$order_by = NULL,$order = 'asc')
	{
		/* Set where data */
		$this->db->where($where);

		/* Get data melalui fungsi get dan kembalikan ke controller */
		return $this->get($method,$limit,$offset,$order_by,$order);
	}

	/* Fungsi untuk insert dan update data */
	public function save($data, $id = NULL, $where = NULL)
	{

		/* UPDATE by WHERE */
		/* Jika ada id, maka update data yang ada berdasarkan primary key yang sudah ada */
		if($where != NULL) {
			$this->db->set($data);
			$this->db->where($where);
			$this->db->update($this->_table_name);
		}

		/* UPDATE by ID */
		/* Jika ada id, maka update data yang ada berdasarkan primary key yang sudah ada */
		if($id != NULL) {
			$this->db->set($data);
			$this->db->where($this->_primary_key, $id);
			$this->db->update($this->_table_name);
		}

		/* INSERT */
		/* Jika tidak ada id maka insert data baru */
		if ($id == NULL && $where == NULL) {
			$this->db->set($data);
			$this->db->insert($this->_table_name);
			$id = $this->db->insert_id();
		}

		/* Insert atau update selalu kembalikan id untuk digunakan keperluan lain */
		return $id;
	}

	/* Fungsi untuk hapus data */
	public function delete($where)
	{
		// if (!$id) {
		// 	return FALSE;
		// }
		// $this->db->where($this->_primary_key, $id);

		/* Set Where untuk di delete */
		$this->db->where($where);

		/* Hapus berdasarkan tabel yang ada */
		$this->db->delete($this->_table_name);
	}

	public function save_like($data, $like, $val, $id = NULL)
	{
		$this->db->set($data);
		$this->db->like($like, $val);
		$this->db->update($this->_table_name);
	}
}


/* End of file ED_Model.php */
/* Location: ./application/core/ED_Model.php */