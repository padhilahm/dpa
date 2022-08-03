<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

if (!function_exists('rupiah')) {
	function rupiah($angka){
	$hasil_rupiah = number_format($angka,0,',','.');
	return "Rp. ".$hasil_rupiah;
	}
}

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

if ( ! function_exists('bulan_singkat'))
{
	function bulan_singkat($bln)
	{
		switch ($bln)
		{
			case 1:
			return "JAN";
			break;
			case 2:
			return "FEB";
			break;
			case 3:
			return "MAR";
			break;
			case 4:
			return "APR";
			break;
			case 5:
			return "MEI";
			break;
			case 6:
			return "JUN";
			break;
			case 7:
			return "JUL";
			break;
			case 8:
			return "AGU";
			break;
			case 9:
			return "SEP";
			break;
			case 10:
			return "OKT";
			break;
			case 11:
			return "NOV";
			break;
			case 12:
			return "DES";
			break;
		}
	}
}

if ( ! function_exists('tanggalmiring'))
{
	function tanggalmiring($tgl)
	{
		$tanggal = date("m/d/Y", strtotime($tgl));
		return $tanggal;
	}
}

if ( ! function_exists('tanggalawal'))
{
	function tanggalawal($tgl)
	{
		$tanggal = date("Y-m-d", strtotime($tgl));
		return $tanggal;
	}
}

if ( ! function_exists('tgl_indo'))
    {
        function tgl_indo($tgl)
        {
            $ubah = gmdate($tgl, time()+60*60*8);
            $pecah = explode("-",$ubah);
            $tanggal = $pecah[2];
            $bulan = bulan($pecah[1]);
            $tahun = $pecah[0];
            return $tanggal.' '.$bulan.' '.$tahun;
        }
    }

if ( ! function_exists('number_to_words'))
{
	function number_to_words($number)
	{
		$before_comma = trim(to_word($number));
		$after_comma = trim(comma($number));
		return ucwords($results = $before_comma.' rupiah '.$after_comma);
	}

	function to_word($number)
	{

		$words = "";

		$arr_number = array(

			"",

			"satu",

			"dua",

			"tiga",

			"empat",

			"lima",
			"enam",
			"tujuh",

			"delapan",

			"sembilan",

			"sepuluh",

			"sebelas");


		if($number<12)

		{

			$words = " ".$arr_number[$number];

		}

		else if($number<20)
		{

			$words = to_word($number-10)." belas";

		}

		else if($number<100)

		{

			$words = to_word($number/10)." puluh ".to_word($number%10);

		}

		else if($number<200)

		{

			$words = "seratus ".to_word($number-100);

		}
		else if($number<1000)

		{

			$words = to_word($number/100)." ratus ".to_word($number%100);

		}

		else if($number<2000)

		{

			$words = "seribu ".to_word($number-1000);

		}

		else if($number<1000000)

		{

			$words = to_word($number/1000)." ribu ".to_word($number%1000);
		}

		else if($number<1000000000)

		{

			$words = to_word($number/1000000)." juta ".to_word($number%1000000);

		}

		else

		{

			$words = "undefined";

		}

		return $words;
	}

	function comma($number)
	{

		$after_comma = stristr($number,',');

		$arr_number = array(

			"nol",

			"satu",

			"dua",

			"tiga",

			"empat",

			"lima",
			"enam",

			"tujuh",

			"delapan",

			"sembilan");


		$results = "";

		$length = strlen($after_comma);

		$i = 1;

		while($i<$length)

		{

			$get = substr($after_comma,$i,1);

			$results .= " ".$arr_number[$get];
			$i++;       }
			return $results;
	}
}