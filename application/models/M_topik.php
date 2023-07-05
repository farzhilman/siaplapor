<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_topik extends ED_Model {

	protected $_table_name = 'topik';
	protected $_primary_key = 'id';
	protected $_group_by = '';

	public function __construct()
	{
		parent::__construct();
	}
}