<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//untuk mengetahui bulan bulan
if ( ! function_exists('bulan'))
{
	function bulan($bln)
	{
		switch ($bln)
		{
			case 1:
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}
}

//format tanggal yyyy-mm-dd
if ( ! function_exists('tgl_indo'))
{
	function tgl_indo($tgl)
	{
		$ubah = gmdate($tgl, time()+60*60*8); 
		$pecah = explode("-",$ubah);  //memecah variabel berdasarkan -
		$tanggal_waktu = $pecah[2];
		$tanggal_waktu_pecah = explode(" ",$tanggal_waktu);
		$jam_menit = explode(":", $tanggal_waktu_pecah[1]);
		$jam = $jam_menit[0];
		$menit = $jam_menit[1];
		$tanggal = $tanggal_waktu_pecah[0];
		$bulan = bulan($pecah[1]);
		$tahun = $pecah[0];
		return $tanggal.' '.$bulan.' '.$tahun.' | '.$jam.':'.$menit; //hasil akhir
	}
}

if ( ! function_exists('tgl_indo_tanpa_jam'))
{
	function tgl_indo_tanpa_jam($tgl)
	{
		$ubah = gmdate($tgl, time()+60*60*8); 
		$pecah = explode("-",$ubah);  //memecah variabel berdasarkan -
		$tanggal_waktu = $pecah[2];
		$tanggal_waktu_pecah = explode(" ",$tanggal_waktu);
		$jam_menit = explode(":", $tanggal_waktu_pecah[1]);
		$jam = $jam_menit[0];
		$menit = $jam_menit[1];
		$tanggal = $tanggal_waktu_pecah[0];
		$bulan = bulan($pecah[1]);
		$tahun = $pecah[0];
		return $tanggal.' '.$bulan.' '.$tahun; //hasil akhir
	}
}

if ( ! function_exists('tgl_indo_tanpa_jam_'))
{
	function tgl_indo_tanpa_jam_($tgl)
	{
		$ubah = gmdate($tgl, time()+60*60*8); 
		$pecah = explode("-",$ubah);  //memecah variabel berdasarkan -
		$tanggal_waktu = $pecah[2];
		$tanggal_waktu_pecah = explode(" ",$tanggal_waktu);
		// $jam_menit = explode(":", $tanggal_waktu_pecah[1]);
		// $jam = $jam_menit[0];
		// $menit = $jam_menit[1];
		$tanggal = $tanggal_waktu_pecah[0];
		$bulan = bulan($pecah[1]);
		$tahun = $pecah[0];
		return $tanggal.'&nbsp;'.$bulan.'&nbsp;'.$tahun; //hasil akhir
	}
}

if ( ! function_exists('tgl_indo_tanpa_blm_db'))
{
	function tgl_indo_tanpa_jam_blm_db($tgl)
	{
		$pecah = explode("/",$tgl);
		$tanggal = $pecah[1];
		$bulan = bulan($pecah[0]);
		$tahun = $pecah[2];
		return $tanggal.'&nbsp;'.$bulan.'&nbsp;'.$tahun; //hasil akhir
	}
}

//format tanggal timestamp
if( ! function_exists('tgl_indo_timestamp')){

	function tgl_indo_timestamp($tgl)
	{
		$inttime=date('Y-m-d H:i:s',$tgl); //mengubah format menjadi tanggal biasa
	 	$tglBaru=explode(" ",$inttime); //memecah berdasarkan spaasi
	 	
	    $tglBaru1=$tglBaru[0]; //mendapatkan variabel format yyyy-mm-dd 
	    $tglBaru2=$tglBaru[1]; //mendapatkan fotmat hh:ii:ss
	 	$tglBarua=explode("-",$tglBaru1); //lalu memecah variabel berdasarkan -

	    $tgl=$tglBarua[2];
	    $bln=$tglBarua[1];
	    $thn=$tglBarua[0];

	 	$bln=bulan($bln); //mengganti bulan angka menjadi text dari fungsi bulan
	 	$ubahTanggal="$tgl $bln $thn | $tglBaru2 "; //hasil akhir tanggal

		return $ubahTanggal;
	}
}

//Angka Rupiah
if ( ! function_exists('buatrp')){

	function buatrp($angka){
		// $jadi = "Rp&nbsp;" . number_format($angka,0,',','.');
		// $jadi = number_format($angka,2,',','.');
		$jadi = number_format($angka,0,',','.');
		return $jadi;
	}
}

//Angka Rupiah
if ( ! function_exists('buatrpkoma2')){

	function buatrpkoma2($angka){
		// $jadi = "Rp&nbsp;" . number_format($angka,0,',','.');
		// $jadi = number_format($angka,2,',','.');
		$jadi = number_format($angka,2,',','.');
		return $jadi;
	}
}
//count date
if ( ! function_exists('hitung_tgl'))
{
	function hitung_tgl($date1, $date2)
	{
		$tgl1 = new DateTime($date1);
		$tgl2 = new DateTime($date2);
		$d = $tgl2->diff($tgl1)->days;
		if ($d == 0) {
			return "hari ini.";
		} else {
			return $d." hari lagi.";
		}
	}
}