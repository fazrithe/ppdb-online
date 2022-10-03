<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function generateRandomString($length = 25)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function register_user($data)
	{
		$this->db->insert('users', $data);
		$user_id = $this->db->insert_id();
		return $user_id;
	}

	public function register_siswa($data)
	{
		$this->db->insert('siswa', $data);
		$user_id = $this->db->insert_id();
		return $user_id;
	}

	public function form_update($data)
	{
		$this->db->where('id', $data['id']);
		$query = $this->db->update('siswa', $data);
		return $query;
	}
	public function check_duplication($nama = "", $tgl = "")
	{
		$duplicate_email_check = $this->db->get_where('users', array('fullname' => $nama, 'tgl_lahir' => $tgl));
		if ($duplicate_email_check->num_rows() > 0) {
			return false;
		} else {
			return true;
		}
	}

	function set_login_userdata($user_id = "")
	{
		// Checking login credential for admin
		$query = $this->db->get_where('users', array('id' => $user_id));

		if ($query->num_rows() > 0) {
			$row = $query->row();
			$this->session->set_userdata('user_id', $row->id);
			$this->session->set_userdata('role_id', $row->role_id);
			$this->session->set_userdata('role', 'user_role', $row->id);
			$this->session->set_userdata('name', $row->fullname);
			$this->session->set_userdata('email', $row->email);
			$this->session->set_userdata('phone', $row->phone);
			if ($row->role_id == 1) {
				$this->session->set_userdata('admin_login', '1');
				return true;
			} else if ($row->role_id == 2) {
				$this->session->set_userdata('siswa_login', '2');
				redirect(site_url('siswa'), 'refresh');
			} else if ($row->role_id == 3) {
				$this->session->set_userdata('petugas_login', '3');
				redirect(site_url('siswa'), 'refresh');
			}
		} else {
			$this->session->set_flashdata('error_message', 'invalid_login_credentials');
			redirect(site_url('login'), 'refresh');
		}
	}
}

/* End of file User_model.php */
