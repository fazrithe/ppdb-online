<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{

	public function get_siswa($id = "")
	{
		$this->db->join('jenjang', 'jenjang.id = siswa.id_jenjang');
		$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
		$this->db->join('berkas', 'berkas.id_siswa = siswa.id_siswa');
		$this->db->where('siswa.user_id', $id);
		return $this->db->get('siswa');
	}

	public function get_jenjang()
	{
		return $this->db->get('jenjang')->result();
	}

	public function get_kelas()
	{
		return $this->db->get('kelas')->result();
	}

	public function get_pembayaran($id)
	{
		$this->db->where('user_id', $id);
		return $this->db->get('pembayaran');
	}

	public function update_formulir($data)
	{
		$this->db->where('user_id', $this->session->userdata('user_id'));
		return $this->db->update('siswa', $data);
	}

	public function insert_regis($data)
	{
		$object = [
			's_formulir' 	=> 1,
		];
		$this->db->where('user_id', $this->session->userdata('user_id'));
		return $this->db->update('register', $object);
	}


	public function get_register($id)
	{
		$this->db->where('user_id', $id);
		return $this->db->get('register');
	}

	public function siswa_users()
	{
		$id = $this->session->userdata('user_id');

		$this->db->join('siswa', 'siswa.user_id = users.id');
		$this->db->where('id', $id);
		return $this->db->get('users');
	}

	public function update_siswa()
	{
		$data = [
			'fullname' => $this->input->post('nama'),
			'phone' => $this->input->post('nomor'),
			'email' => $this->input->post('email')
		];

		return $this->db->update('users', $data, [
			'id' => $this->session->userdata('user_id')
		]);
	}

	public function update_password()
	{
		$pass = $this->input->post('password');
		$data = [
			'password' => sha1($pass),
		];

		return $this->db->update('users', $data, [
			'id' => $this->session->userdata('user_id')
		]);
	}
}
 /* End of file Siswa_model.php */
