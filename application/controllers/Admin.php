<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');

		if ($this->session->userdata('admin_login') != true) {
			redirect('home');
		}
	}

	public function index()
	{
		if ($this->session->userdata('admin_login') == true) {
			$this->dashboard();
		}
	}

	public function dashboard()
	{

		$data = [
			'total_siswa' => $this->db->get('register')->num_rows(),
			'pending' => $this->db->get_where('register', ['status' => 0])->num_rows(),
			'lulus' => $this->db->get_where('register', ['status' => 1])->num_rows(),
			'ditolak' => $this->db->get_where('register', ['status' => 3])->num_rows(),
			'selesaikan' => $this->db->get_where('register', ['status' => 2])->num_rows(),
		];
		$this->template->load('admin_template', 'admin/dashboard', $data);
	}

	public function siswa()
	{
		$id_kelas = $this->input->post('id_kelas');
		$id_jenjang = $this->input->post('id_jenjang');
		$data = [
			'siswa' => $this->admin_model->cari_siswa($id_kelas, $id_jenjang)->result(),
			'kelas' => $this->db->get('kelas')->result(),
			'jenjang' => $this->db->get('jenjang')->result(),
		];
		$this->template->load('admin_template', 'admin/siswa', $data);
	}

	public function detail_siswa($id)
	{
		$data = [
			'siswa' => $this->admin_model->detail_siswa($id)->row(),
		];
		$this->template->load('admin_template', 'admin/detail_siswa', $data);
	}

	public function delete_siswa()
	{
		$id = $this->input->post('user_id');
		$data = [
			'user_id' => $id
		];
		$this->db->delete('siswa', $data);
		$this->db->delete('pembayaran', $data);
		$this->db->delete('register', $data);
		$this->db->delete('berkas', $data);
		$this->session->set_flashdata('msg', '<script>
		Swal.fire(
			"Success",
			"Siswa berhasil di hapus",
			"success"
		)
		</script>');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function getKelas()
	{
		$id = $this->input->post('id_jenjang');
		$query = $this->db->get_where('kelas', ['id_jenjang' => $id])->result();
		foreach ($query as $v) {
			echo '<option value="' . $v->id_kelas . '">' . $v->nama_kelas . '</option>';
		}
	}

	public function kelas()
	{
		$data['kelas'] = $this->admin_model->get_kelas();
		$data['jenjang'] = $this->db->get('jenjang')->result();
		$this->template->load('admin_template', 'admin/kelas', $data);
	}

	public function jenjang()
	{
		$data['jenjang'] = $this->db->get('jenjang')->result();

		$this->template->load('admin_template', 'admin/jenjang', $data);
	}

	public function setting()
	{
		$this->template->load('admin_template', 'admin/setting');
	}

	public function invoice()
	{
		$this->template->load('admin_template', 'admin/invocie');
	}

	public function praregister()
	{
		$data['siswa'] = $this->admin_model->praregister()->result();
		$data['total_pra'] = $this->admin_model->praregister()->num_rows();
		$this->template->load('admin_template', 'admin/praregister', $data);
	}

	public function siswa_lulus()
	{
		$data = [
			'siswa' => $this->admin_model->siswa_lulus()
		];
		$this->template->load('admin_template', 'admin/lulus', $data);
	}
	public function siswa_ditolak()
	{
		$data = [
			'siswa' => $this->admin_model->siswa_ditolak()
		];
		$this->template->load('admin_template', 'admin/ditolak', $data);
	}
	public function update_setting()
	{
		$type = $this->input->post('type');
		if ($type == 'whatsapp') {
			$this->admin_model->update_system_whatsapp();
		} else {
			$this->admin_model->update_system_settings();
		}

		$this->session->set_flashdata('msg', '<script>
		Swal.fire(
			"Success",
			"Settings Berhasil Di Update",
			"success"
		)
		</script>');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function whatsapp()
	{
		$data['qr'] = json_decode($this->notif->connect());

		$this->template->load('admin_template', 'admin/whatsapp', $data);
	}

	public function approve_pembayaran()
	{
		$id = $this->input->post('user_id');
		$q = $this->admin_model->approve_pembayaran($id);
		if ($q) {
			$siswa = $this->db->get_where('siswa', ['user_id' => $id])->row();
			$msg = strtr(get_notif('verif_pembayaran'), array('(nama)'    => $siswa->nama,));
			$this->notif->whatsapp($siswa->hp, $msg);
			$this->session->set_flashdata('msg', '<script>
			Swal.fire(
			"Success",
			"Berhasil melakukan perubahan",
			"success"
			)
		</script>');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function lulus()
	{
		$id = $this->input->post('user_id');
		$status = $this->input->post('status');
		
		$user = $this->db->get_where('siswa', ['user_id' => $id])->row();
		$kelas = $this->db->get_where('kelas', ['id_kelas' => $user->id_kelas])->row('nama_kelas');
		$hp = $user->hp;
		$jenjang = $this->db->get_where('jenjang', ['id' => $user->id_jenjang])->row('nama_jenjang');
		$kelas = $this->db->get_where('kelas', ['id_kelas' => $user->id_kelas])->row('nama_kelas');
		$email = $this->db->get_where('users', ['id' => $id])->row('email');
		$obj = [
			'nama' => $user->nama,
			'noreg' => $user->noreg,
			'jenjang' => $jenjang,
			'kelas' => $kelas,
			'email' => $email
		];
		if($status == 1){
		    $q = $this->admin_model->lulus($id);
		    $msg = strtr(get_notif('lulus'), array('(nama)' => $user->nama, '(noreg)' => $user->noreg, '(kelas)' => $kelas));
		    $this->notif->whatsapp($hp, $msg);
		    $this->notif->lulus($obj);
		}else{
		    $q = $this->admin_model->tidak_lulus($id);
		    $msg = strtr(get_notif('ditolak'), array('(nama)' => $user->nama, '(noreg)' => $user->noreg, '(kelas)' => $kelas));
		    $this->notif->whatsapp($hp, $msg);
		    $this->notif->ditolak($obj);
		}
		
		if ($q) {
			$this->session->set_flashdata('msg', '<script>
			Swal.fire(
			"Success",
			"Berhasil update status siswa",
			"success"
		)
		</script>');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function tidak_lulus()
	{
		$id = $this->input->post('user_id');
		$q = $this->admin_model->tidak_lulus($id);
		$user = $this->db->get_where('siswa', ['user_id' => $id])->row();
		$msg = strtr(get_notif('ditolak'), array('(nama)'    => $user->nama,));
		$hp = $user->hp;
		$this->notif->whatsapp($hp, $msg);
		$kelas = $this->db->get_where('kelas', ['id_kelas' => $user->id_kelas])->row('nama_kelas');
		$email = $this->db->get_where('users', ['id' => $id])->row('email');
		$obj = [
			'nama' => $user->nama,
			'noreg' => $user->noreg,
			'kelas' => $kelas,
			'email' => $email
		];
		$this->notif->ditolak($obj);
		if ($q) {
			$this->session->set_flashdata('msg', '<script>
		Swal.fire(
			"Success",
			"Berhasil update status siswa",
			"success"
		)
		</script>');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function tes_wa()
	{
		$msg = 'Tes message aplikasi PPDB By Sekolah Budi Agung - Jakarta';
		$q = $this->notif->whatsapp(get_settings('phone'), $msg);
		$json = json_decode($q, TRUE);

		if ($json) {
			$this->session->set_flashdata('msg', '<script>
		Swal.fire(
			"Success",
			"Pesan berhasil terkirim",
			"success"
		)
		</script>');
		} else {
			$this->session->set_flashdata('msg', '<script>
		Swal.fire(
			"Sorry",
			"Pesan gagal terkirim",
			"warning"
		)
		</script>');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_notif()
	{
		$this->admin_model->update_notif();
		$this->session->set_flashdata('msg', '<script>
		Swal.fire(
			"Success",
			"Notif berhasil disimpan",
			"success"
		)
		</script>');
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function follow()
	{
		$nama = $this->input->post('nama');
		$no = $this->input->post('no');
		$msg = 'Halo, *' . $nama . '*, Terimakasih sudah melakukan registrasi PPDB Sekolah Budi Agung - Jakarta. Silahkan segera lengkapi formulir PPDB anda.';
		$this->notif->whatsapp($no, $msg);
		$this->session->set_flashdata('msg', '<script>
		Swal.fire(
			"Success",
			"Follow Up berhasil dikirim",
			"success"
		)
		</script>');
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function u_siswa()
	{
		$id = $this->input->post('id');
		$obj = [
			'nisn' => $this->input->post('nisn'),
			'no_ijazah' => $this->input->post('ijazah'),
			'sekolah_asal' => $this->input->post('sekolah_asal'),
		];
		$this->db->where('id_siswa', $id);
		$this->db->update('siswa', $obj);
		$this->session->set_flashdata('msg', '<script>
		Swal.fire(
			"Success",
			"Update Formulir",
			"success"
		)
		</script>');
		redirect($_SERVER['HTTP_REFERER']);
	}
}

/* End of file Admin.php */
