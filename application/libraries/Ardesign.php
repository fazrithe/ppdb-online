<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ardesign
{
	protected $CI;
	public function __construct()
	{
		$this->CI = &get_instance();
	}

	function generateRandomString($length = 25)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	function get_personal()
	{
		$user_id = $this->CI->session->userdata('user_id');
		$this->CI->db->join('siswa', 'siswa.user_id = users.id', 'left');
		$this->CI->db->join('register', 'register.user_id = users.id', 'left');
		$this->CI->db->join('berkas', 'berkas.user_id = users.id', 'left');
		$this->CI->db->join('pembayaran', 'pembayaran.user_id = users.id', 'left');
		$this->CI->db->where('id', $user_id);
		return $this->CI->db->get('users')->row();
	}

	function get_siswa($id)
	{
		$this->CI->db->join('siswa', 'siswa.user_id = users.id', 'left');
		$this->CI->db->join('register', 'register.user_id = users.id', 'left');
		$this->CI->db->join('berkas', 'berkas.user_id = users.id', 'left');
		$this->CI->db->join('pembayaran', 'pembayaran.user_id = users.id', 'left');
		$this->CI->db->where('id', $id);
		return $this->CI->db->get('users')->row();
	}

	function profile()
	{
		$user_id = $this->CI->session->userdata('user_id');
		$this->CI->db->where('id', $user_id);
		$cek = $this->CI->db->get('users')->row();
		$img_url = base_url() . 'assets/images/foto/' . $cek->image;

		if ($cek->image == null) {
			$img_url = base_url() . 'assets/images/foto/noimg.png';
		}

		return $img_url;
	}
}


/* End of file Ardesign.php and path /application/libraries/Ardesign.php */
