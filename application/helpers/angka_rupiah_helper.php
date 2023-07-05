<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('buatrp')){

	function buatrp($angka){
		// $jadi = "Rp " . number_format($angka,2,',','.');
		$jadi = number_format($angka);
		return $jadi;
	}
}