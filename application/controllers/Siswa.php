<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Siswa_model', 'model_siswa');
	}


	public function index()
	{
		if ($this->session->userdata('siswa_login') == true) {
			$this->dashboard();
		} else {
			redirect(site_url('login'), 'refresh');
		}
	}

	public function dashboard()
	{
		if ($this->session->userdata('siswa_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		$id = $this->session->userdata('user_id');
		$data = [
			'siswa' => $this->model_siswa->get_siswa($id)->row(),
			'jenjang' => $this->model_siswa->get_jenjang(),
			'kelas' => $this->model_siswa->get_kelas(),
			'pembayaran' => $this->model_siswa->get_pembayaran($id),
			'register' => $this->model_siswa->get_register($id)
		];
		$cek_regis = $this->model_siswa->get_register($id);

		if ($cek_regis->row('s_formulir') == null) {
			$this->template->load('template', 'siswa/formulir', $data);
		} elseif ($cek_regis->row('s_berkas') == 0) {
			$data['berkas'] = $this->db->get_where('berkas', ['user_id' => $id])->row();
			$this->template->load('template', 'siswa/berkas', $data);
		} elseif ($cek_regis->row('s_pembayaran') == 0) {
			$this->template->load('template', 'siswa/pembayaran', $data);
		} else {
			$this->template->load('template', 'siswa/dashboard', $data);
		}
	}

	public function formulir()
	{
		if ($this->session->userdata('siswa_login') == true) {
			$this->dashboard();
		} else {
			redirect(site_url('login'), 'refresh');
		}
		$id = $this->session->userdata('user_id');
		$data = [
			'id_siswa' => $this->input->post('id'),
			'user_id'    => $id,
			'nama' => $this->input->post('nama'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'alamat' => $this->input->post('alamat'),
			'hp' => $this->input->post('hp'),
			'jenis' => $this->input->post('jk'),
			'anak_ke' => $this->input->post('anak_ke'),
			'status_anak' => $this->input->post('status_anak'),
			'nama_ayah' => $this->input->post('nama_ayah'),
			'pendidikan_ayah' => $this->input->post('pendidikan_ayah'),
			'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
			'nama_ibu' => $this->input->post('nama_ibu'),
			'pendidikan_ibu' => $this->input->post('pendidikan_ibu'),
			'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
			'alamat_ortu' => $this->input->post('alamat_ortu'),
			'nisn' => $this->input->post('nisn'),
			'sekolah_asal' => $this->input->post('sekolah_asal'),
			'no_ijazah' => $this->input->post('no_ijazah'),
			'updated_at' => date('Y-m-d')
		];
		$this->model_siswa->update_formulir($data);
		$cek_regis = $this->db->get_where('register', ['user_id' => $id])->row('user_id');
		if ($cek_regis == $id) {
			$this->model_siswa->insert_regis($data);
			$this->session->set_flashdata('msg', '<script>
			Swal.fire(
				"Success",
				"Formulir berhasil disimpan",
				"success"
			)
			</script>');
		}

		redirect('siswa');
	}

	public function update_formulir()
	{
		if ($this->session->userdata('siswa_login') == true) {
			$this->dashboard();
		} else {
			redirect(site_url('login'), 'refresh');
		}
		$id = $this->session->userdata('user_id');
		$data = [
			'id_siswa' => $this->input->post('id'),
			'user_id'    => $id,
			'nama' => $this->input->post('nama'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'alamat' => $this->input->post('alamat'),
			'hp' => $this->input->post('hp'),
			'jenis' => $this->input->post('jk'),
			'anak_ke' => $this->input->post('anak_ke'),
			'status_anak' => $this->input->post('status_anak'),
			'nama_ayah' => $this->input->post('nama_ayah'),
			'pendidikan_ayah' => $this->input->post('pendidikan_ayah'),
			'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
			'nama_ibu' => $this->input->post('nama_ibu'),
			'pendidikan_ibu' => $this->input->post('pendidikan_ibu'),
			'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
			'alamat_ortu' => $this->input->post('alamat_ortu'),
			'nisn' => $this->input->post('nisn'),
			'sekolah_asal' => $this->input->post('sekolah_asal'),
			'no_ijazah' => $this->input->post('no_ijazah'),
			'updated_at' => date('Y-m-d')
		];
		$this->model_siswa->update_formulir($data);
		redirect('siswa');
	}

	public function konfrim_berkas()
	{
		if ($this->session->userdata('siswa_login') == true) {
			$this->dashboard();
		} else {
			redirect(site_url('login'), 'refresh');
		}
		$id = $this->session->userdata('user_id');
		$get_siswa = $this->db->get_where('siswa', ['user_id' => $id])->row();
		$kelas = $this->db->get_where('kelas', ['id_kelas' => $get_siswa->id_kelas])->row('nama_kelas');
		$object = [
			's_berkas' => 1
		];
		$this->db->where('user_id', $id);
		$this->db->update('register', $object);
		$msg2 = "Halo *Admin*, Siswa dengan No.REG *$get_siswa->noreg* sudah melakukan konfirmasi berkas";
		$this->notif->whatsapp(get_settings('phone'), $msg2);
		$this->session->set_flashdata('msg', '<script>
			Swal.fire(
				"Success",
				"Berkas berhasil disimpan",
				"success"
			)
			</script>');
		redirect('siswa');
	}

	public function profile()
	{
		$this->template->load('template', 'siswa/profile');
	}

	public function lampiran()
	{
		$id = $this->session->userdata('user_id');
		$this->db->where('user_id', $id);
		$this->db->update('register', ['s_lampiran' => 1,'tgl_lampiran'=>date('Y-m-d')]);
		$siswa = $this->db->get_where('siswa', ['user_id' => $id])->row();
		$kelas = $this->db->get_where('kelas', ['id_kelas' => $siswa->id_kelas])->row('nama_kelas');
		$msg2 = "Halo *Admin*, Siswa dengan NO.REG *$siswa->noreg* sudah menyetujui Surat Pernyataan";
		$this->notif->whatsapp(get_settings('phone'), $msg2);
		$this->session->set_flashdata('msg', '<script>
			Swal.fire(
			"Berhasil",
			"Terimakasih sudah menyetujui surat pernyataan",
			"success"
		)
		</script>');
		redirect($_SERVER['HTTP_REFERER']);
	}
}

/* End of file Siswa.php */
