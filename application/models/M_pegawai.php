<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends ED_Model {

	protected $_table_name = 'pegawai';
	protected $_primary_key = 'id';
	protected $_group_by = '';

	public function __construct()
	{
		parent::__construct();
	}
}