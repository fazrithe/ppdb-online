<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('tanggal')) {
	function tanggal($tanggal)
	{
		$ubahTanggal = gmdate($tanggal, time() + 60 * 60 * 8);
		$pecahTanggal = explode('-', $ubahTanggal);
		$tanggal = $pecahTanggal[2];
		$bulan = bulan_panjang($pecahTanggal[1]);
		$tahun = $pecahTanggal[0];
		return $tanggal . ' ' . $bulan . ' ' . $tahun;
	}
}

if (!function_exists('bulan_panjang')) {
	function bulan_panjang($bulan)
	{
		switch ($bulan) {
			case 1:
				return 'Januari';
				break;
			case 2:
				return 'Februari';
				break;
			case 3:
				return 'Maret';
				break;
			case 4:
				return 'April';
				break;
			case 5:
				return 'Mei';
				break;
			case 6:
				return 'Juni';
				break;
			case 7:
				return 'Juli';
				break;
			case 8:
				return 'Agustus';
				break;
			case 9:
				return 'September';
				break;
			case 10:
				return 'Oktober';
				break;
			case 11:
				return 'November';
				break;
			case 12:
				return 'Desember';
				break;
		}
	}
}

if (!function_exists('bulan_pendek')) {
	function bulan_pendek($bulan)
	{
		switch ($bulan) {
			case 1:
				return 'Jan';
				break;
			case 2:
				return 'Feb';
				break;
			case 3:
				return 'Mar';
				break;
			case 4:
				return 'Apr';
				break;
			case 5:
				return 'Mei';
				break;
			case 6:
				return 'Jun';
				break;
			case 7:
				return 'Jul';
				break;
			case 8:
				return 'Agu';
				break;
			case 9:
				return 'Sep';
				break;
			case 10:
				return 'Okt';
				break;
			case 11:
				return 'Nov';
				break;
			case 12:
				return 'Des';
				break;
		}
	}
}

if (!function_exists('bulan_angka')) {
	function bulan_angka($bulan)
	{
		switch ($bulan) {
			case 1:
				return '01';
				break;
			case 2:
				return '02';
				break;
			case 3:
				return '03';
				break;
			case 4:
				return '04';
				break;
			case 5:
				return '05';
				break;
			case 6:
				return '06';
				break;
			case 7:
				return '07';
				break;
			case 8:
				return '08';
				break;
			case 9:
				return '09';
				break;
			case 10:
				return '10';
				break;
			case 11:
				return '11';
				break;
			case 12:
				return '12';
				break;
		}
	}
}

if (!function_exists('nama_hari')) {
	function nama_hari($hari)
	{
		if ($hari == 'Sunday') {
			return 'Minggu';
		} elseif ($hari == 'Monday') {
			return 'Senin';
		} elseif ($hari == 'Tuesday') {
			return 'Selasa';
		} elseif ($hari == 'Wednesday') {
			return 'Rabu';
		} elseif ($hari == 'Thursday') {
			return 'Kamis';
		} elseif ($hari == 'Friday') {
			return 'Jumat';
		} elseif ($hari == 'Saturday') {
			return 'Sabtu';
		}
	}
}

if (!function_exists('rupiah')) {
	function rupiah($angka)
	{

		$rupiah = "Rp " . number_format($angka, 2, ',', '.');
		return $rupiah;
	}
}

if (!function_exists('get_settings')) {
	function get_settings($key = '')
	{
		$CI    = &get_instance();
		$CI->load->database();

		$CI->db->where('key', $key);
		$result = $CI->db->get('settings')->row('value');
		return $result;
	}
}

if (!function_exists('get_notif')) {
	function get_notif($key = '')
	{
		$CI    = &get_instance();
		$CI->load->database();

		$CI->db->where('key', $key);
		$result = $CI->db->get('notif')->row('value');
		return $result;
	}
}

if (!function_exists('get_front')) {
	function get_front($key = '')
	{
		$CI    = &get_instance();
		$CI->load->database();

		$CI->db->where('key', $key);
		$result = $CI->db->get('front')->row('value');
		return $result;
	}
}

if (!function_exists('rupiah')) {
	function rupiah($angka)
	{

		$rupiah = "Rp " . number_format($angka, 0, ',', '.');
		return $rupiah;
	}
}
