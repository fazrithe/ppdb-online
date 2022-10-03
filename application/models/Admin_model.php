<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

	public function cari_siswa($kelas = '', $jenjang = '')
	{
		if ($kelas && $jenjang) {
			$this->db->select('*');
			$this->db->from('register', 'siswa');
			$this->db->join('siswa', 'siswa.id_siswa = register.id_siswa', 'left');
			$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
			$this->db->where('siswa.id_kelas', $kelas);
			$this->db->where('siswa.id_jenjang', $jenjang);
			$this->db->where('register.status', 1);
			$this->db->order_by('id_register', 'desc');
			return $this->db->get();
		} else {
			$this->db->select('*');
			$this->db->from('register', 'siswa');
			$this->db->join('siswa', 'siswa.id_siswa = register.id_siswa', 'left');
			$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
			$this->db->order_by('id_register', 'desc');
			return $this->db->get();
		}
	}

	public function detail_siswa($id)
	{
		$this->db->join('siswa', 'siswa.user_id = users.id', 'left');
		$this->db->join('register', 'register.user_id = users.id', 'left');
		$this->db->join('berkas', 'berkas.user_id = users.id', 'left');
		$this->db->join('pembayaran', 'pembayaran.user_id = users.id', 'left');
		$this->db->where('id', $id);
		return $this->db->get('users');
	}

	public function siswa($id = '')
	{
		if (!$id) {
			$this->db->select('*');
			$this->db->from('siswa');
			$this->db->join('register', 'siswa.user_id = register.user_id', 'LEFT');
			$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas', 'LEFT');
			$this->db->join('jenjang', 'siswa.id_jenjang = jenjang.id', 'LEFT');
			$this->db->join('pembayaran', 'siswa.user_id = pembayaran.id_pembayaran', 'LEFT');
			$query = $this->db->get();
		} else {
			$this->db->select('*');
			$this->db->from('siswa', 'users');
			$this->db->join('register', 'siswa.user_id = register.user_id', 'LEFT');
			$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas', 'LEFT');
			$this->db->join('jenjang', 'siswa.id_jenjang = jenjang.id', 'LEFT');
			$this->db->join('pembayaran', 'siswa.user_id = pembayaran.id_pembayaran', 'LEFT');
			$this->db->join('users', 'users.id = siswa.user_id', 'LEFT');
			$this->db->where('users.id', $id);
			$query = $this->db->get();
		}
		return $query;
	}

	public function siswa_lulus()
	{
		$this->db->select('*');
		$this->db->from('register', 'siswa');
		$this->db->join('siswa', 'siswa.user_id = register.user_id', 'left');
		$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
		$this->db->where('.register.status', 1);
		return $this->db->get()->result();
	}

	public function print_lulus()
	{
		$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
		$this->db->join('jenjang', 'jenjang.id = siswa.id_jenjang', 'left');
		$this->db->join('register', 'register.id_siswa = siswa.id_siswa', 'left');
		$this->db->join('users', 'users.id = siswa.user_id', 'left');
		$this->db->where('register.status', 1);
		return $this->db->get('siswa')->result();
	}
	
	public function print_ditolak()
	{
		$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
		$this->db->join('jenjang', 'jenjang.id = siswa.id_jenjang', 'left');
		$this->db->join('register', 'register.id_siswa = siswa.id_siswa', 'left');
		$this->db->join('users', 'users.id = siswa.user_id', 'left');
		$this->db->where('register.status', 3);
		return $this->db->get('siswa')->result();
	}
	
	public function siswa_ditolak()
	{
		$this->db->select('*');
		$this->db->from('register', 'siswa');
		$this->db->join('siswa', 'siswa.user_id = register.user_id', 'left');
		$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
		$this->db->where('.register.status', 3);
		return $this->db->get()->result();
	}

	public function get_kelas()
	{
		$this->db->join('jenjang', 'jenjang.id = kelas.id_jenjang', 'left');
		return $this->db->get('kelas')->result();
	}

	public function praregister()
	{
		$this->db->select('*');
		$this->db->from('register', 'siswa');
		$this->db->join('siswa', 'siswa.id_siswa = register.id_siswa', 'left');
		$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
		$this->db->where('s_formulir', null);
		$this->db->order_by('id_register', 'desc');
		$s = $this->db->get();
		return $s;
	}

	public function update_system_settings()
	{
		$data['value'] = html_escape($this->input->post('system_name'));
		$this->db->where('key', 'system_name');
		$this->db->update('settings', $data);

		$data['value'] = html_escape($this->input->post('system_title'));
		$this->db->where('key', 'system_title');
		$this->db->update('settings', $data);

		$data['value'] = html_escape($this->input->post('system_email'));
		$this->db->where('key', 'system_email');
		$this->db->update('settings', $data);

		$data['value'] = html_escape($this->input->post('school_addres'));
		$this->db->where('key', 'school_addres');
		$this->db->update('settings', $data);

		$data['value'] = html_escape($this->input->post('biaya'));
		$this->db->where('key', 'biaya');
		$this->db->update('settings', $data);

		$data['value'] = html_escape($this->input->post('school_name'));
		$this->db->where('key', 'school_name');
		$this->db->update('settings', $data);

		$data['value'] = html_escape($this->input->post('school_account'));
		$this->db->where('key', 'school_account');
		$this->db->update('settings', $data);

		$data['value'] = html_escape($this->input->post('school_number'));
		$this->db->where('key', 'school_number');
		$this->db->update('settings', $data);
		
		$data['value'] = html_escape($this->input->post('bank_name'));
		$this->db->where('key', 'bank_name');
		$this->db->update('settings', $data);
		
		$data['value'] = html_escape($this->input->post('bank_account'));
		$this->db->where('key', 'bank_account');
		$this->db->update('settings', $data);
		
		$data['value'] = html_escape($this->input->post('bank_number'));
		$this->db->where('key', 'bank_number');
		$this->db->update('settings', $data);

		$data['value'] = $this->input->post('tahun_ajar');
		$this->db->where('key', 'tahun_ajar');
		$this->db->update('settings', $data);

		$data['value'] = $this->input->post('sambutan');
		$this->db->where('key', 'sambutan');
		$this->db->update('settings', $data);
	}

	public function update_system_whatsapp()
	{
		$data['value'] = $this->input->post('phone');
		$this->db->where('key', 'phone');
		$this->db->update('settings', $data);

		$data['value'] = $this->input->post('server_autonotif');
		$this->db->where('key', 'server_autonotif');
		$this->db->update('settings', $data);
	}

	public function approve_pembayaran($id)
	{
		$data = [
			's_pembayaran' => 1,
			'status' => 2,
			'created_at' => date('Y-m-d')
		];
		$this->db->where('user_id', $id);
		return $this->db->update('register', $data);
	}

	public function lulus($id)
	{
		$data = [
			'status' => 1,
			'created_at' => date('Y-m-d')
		];
		$this->db->where('user_id', $id);
		return $this->db->update('register', $data);
	}
	public function tidak_lulus($id)
	{
		$data = [
			'status' => 3,
			'created_at' => date('Y-m-d')
		];
		$this->db->where('user_id', $id);
		return $this->db->update('register', $data);
	}

	public function update_notif()
	{
		$data['value'] = $this->input->post('register');
		$this->db->where('key', 'register');
		$this->db->update('notif', $data);

		$data['value'] = $this->input->post('admin_register');
		$this->db->where('key', 'admin_register');
		$this->db->update('notif', $data);

		$data['value'] = $this->input->post('pembayaran');
		$this->db->where('key', 'pembayaran');
		$this->db->update('notif', $data);

		$data['value'] = $this->input->post('verif_pembayaran');
		$this->db->where('key', 'verif_pembayaran');
		$this->db->update('notif', $data);

		$data['value'] = $this->input->post('lulus');
		$this->db->where('key', 'lulus');
		$this->db->update('notif', $data);

		$data['value'] = $this->input->post('ditolak');
		$this->db->where('key', 'ditolak');
		$this->db->update('notif', $data);
	}
}


/* End of file Admin_model.php and path /application/models/Admin_model.php */
