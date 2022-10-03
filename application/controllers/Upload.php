<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller
{

	public function uploadKK()
	{

		$iduser = $this->session->userdata('user_id');
		$cek = $this->db->get_where('berkas', ['user_id' => $iduser])->row();
		if (!empty($_FILES['file']['name'])) {
		}

		// Set preference
		$fourRandomDigit = mt_rand(1000, 9999);
		$filename = 'KK-' . date('ymd') . $fourRandomDigit;
		$config['upload_path'] = 'assets/images/berkas/';
		$config['allowed_types'] = 'jpg|jpeg|png|pdf';
		$config['max_size'] = '1024'; // max_size in kb
		$config['overwrite'] = true;
		$config['file_name'] = $filename;

		//Load upload library
		$this->load->library('upload', $config);

		// File upload
		if ($this->upload->do_upload('file')) {
			// Get data about the file
			$uploadData = $this->upload->data();

			if ($cek->kk) {
				$file = FCPATH . '/assets/images/berkas/' . $cek->kk;
				$del = unlink($file);
				if ($del) {
					$data = [
						'kk' => $uploadData['file_name']
					];
					$this->db->where('user_id', $iduser);
					$post = $this->db->update('berkas', $data);
				}
			} else {
				$data = [
					'kk' => $uploadData['file_name']
				];
				$this->db->where('user_id', $iduser);
				$post = $this->db->update('berkas', $data);
			}
		}
	}

	public function uploadAL()
	{

		$iduser = $this->session->userdata('user_id');
		$cek = $this->db->get_where('berkas', ['user_id' => $iduser])->row();
		if (!empty($_FILES['file']['name'])) {
		}

		// Set preference
		$fourRandomDigit = mt_rand(1000, 9999);
		$filename = 'AL-' . date('ymd') . $fourRandomDigit;
		$config['upload_path'] = 'assets/images/berkas/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '1024'; // max_size in kb
		$config['overwrite'] = true;
		$config['file_name'] = $filename;

		//Load upload library
		$this->load->library('upload', $config);

		// File upload
		if ($this->upload->do_upload('file')) {
			// Get data about the file
			$uploadData = $this->upload->data();

			if ($cek->al) {
				$file = FCPATH . '/assets/images/berkas/' . $cek->al;
				$del = unlink($file);
				if ($del) {
					$data = [
						'akte' => $uploadData['file_name']
					];
					$this->db->where('user_id', $iduser);
					$post = $this->db->update('berkas', $data);
				}
			} else {
				$data = [
					'akte' => $uploadData['file_name']
				];
				$this->db->where('user_id', $iduser);
				$post = $this->db->update('berkas', $data);
			}
		}
	}

	public function uploadIZ()
	{

		$iduser = $this->session->userdata('user_id');
		$cek = $this->db->get_where('berkas', ['user_id' => $iduser])->row();
		if (!empty($_FILES['file']['name'])) {
		}

		// Set preference
		$fourRandomDigit = mt_rand(1000, 9999);
		$filename = 'IZ-' . date('ymd') . $fourRandomDigit;
		$config['upload_path'] = 'assets/images/berkas/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '1024'; // max_size in kb
		$config['overwrite'] = true;
		$config['file_name'] = $filename;

		//Load upload library
		$this->load->library('upload', $config);

		// File upload
		if ($this->upload->do_upload('file')) {
			// Get data about the file
			$uploadData = $this->upload->data();

			if ($cek->ijazah) {
				$file = FCPATH . '/assets/images/berkas/' . $cek->ijazah;
				$del = unlink($file);
				if ($del) {
					$data = [
						'ijazah' => $uploadData['file_name']
					];
					$this->db->where('user_id', $iduser);
					$post = $this->db->update('berkas', $data);
				}
			} else {
				$data = [
					'ijazah' => $uploadData['file_name']
				];
				$this->db->where('user_id', $iduser);
				$post = $this->db->update('berkas', $data);
			}
		}
	}

	public function uploadKIP()
	{

		$iduser = $this->session->userdata('user_id');
		$cek = $this->db->get_where('berkas', ['user_id' => $iduser])->row();
		if (!empty($_FILES['file']['name'])) {
		}

		// Set preference
		$fourRandomDigit = mt_rand(1000, 9999);
		$filename = 'KIP-' . date('ymd') . $fourRandomDigit;
		$config['upload_path'] = 'assets/images/berkas/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '1024'; // max_size in kb
		$config['overwrite'] = true;
		$config['file_name'] = $filename;

		//Load upload library
		$this->load->library('upload', $config);

		// File upload
		if ($this->upload->do_upload('file')) {
			// Get data about the file
			$uploadData = $this->upload->data();

			if ($cek->kip) {
				$file = FCPATH . '/assets/images/berkas/' . $cek->kip;
				$del = unlink($file);
				if ($del) {
					$data = [
						'kip' => $uploadData['file_name']
					];
					$this->db->where('user_id', $iduser);
					$post = $this->db->update('berkas', $data);
				}
			} else {
				$data = [
					'kip' => $uploadData['file_name']
				];
				$this->db->where('user_id', $iduser);
				$post = $this->db->update('berkas', $data);
			}
		}
	}

	public function raport1()
	{

		$iduser = $this->session->userdata('user_id');
		$cek = $this->db->get_where('berkas', ['user_id' => $iduser])->row();
		if (!empty($_FILES['file']['name'])) {
		}

		// Set preference
		$fourRandomDigit = mt_rand(1000, 9999);
		$filename = 'RPS1-' . date('ymd') . $fourRandomDigit;
		$config['upload_path'] = 'assets/images/berkas/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '1024'; // max_size in kb
		$config['overwrite'] = true;
		$config['file_name'] = $filename;

		//Load upload library
		$this->load->library('upload', $config);

		// File upload
		if ($this->upload->do_upload('file')) {
			// Get data about the file
			$uploadData = $this->upload->data();

			if ($cek->raport_1) {
				$file = FCPATH . '/assets/images/berkas/' . $cek->raport_1;
				$del = unlink($file);
				if ($del) {
					$data = [
						'raport_1' => $uploadData['file_name']
					];
					$this->db->where('user_id', $iduser);
					$post = $this->db->update('berkas', $data);
				}
			} else {
				$data = [
					'raport_1' => $uploadData['file_name']
				];
				$this->db->where('user_id', $iduser);
				$post = $this->db->update('berkas', $data);
			}
		}
	}

	public function raport2()
	{

		$iduser = $this->session->userdata('user_id');
		$cek = $this->db->get_where('berkas', ['user_id' => $iduser])->row();
		if (!empty($_FILES['file']['name'])) {
		}

		// Set preference
		$fourRandomDigit = mt_rand(1000, 9999);
		$filename = 'RPS2-' . date('ymd') . $fourRandomDigit;
		$config['upload_path'] = 'assets/images/berkas/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '1024'; // max_size in kb
		$config['overwrite'] = true;
		$config['file_name'] = $filename;

		//Load upload library
		$this->load->library('upload', $config);

		// File upload
		if ($this->upload->do_upload('file')) {
			// Get data about the file
			$uploadData = $this->upload->data();

			if ($cek->raport_2) {
				$file = FCPATH . '/assets/images/berkas/' . $cek->raport_2;
				$del = unlink($file);
				if ($del) {
					$data = [
						'raport_2' => $uploadData['file_name']
					];
					$this->db->where('user_id', $iduser);
					$post = $this->db->update('berkas', $data);
				}
			} else {
				$data = [
					'raport_2' => $uploadData['file_name']
				];
				$this->db->where('user_id', $iduser);
				$post = $this->db->update('berkas', $data);
			}
		}
	}

	public function payment()
	{

		$iduser = $this->session->userdata('user_id');
		$cek = $this->db->get_where('pembayaran', ['user_id' => $iduser]);
		if (!empty($_FILES['file']['name'])) {
		}

		// Set preference
		$fourRandomDigit = mt_rand(1000, 9999);
		$filename = 'INV-' . date('ymd') . $fourRandomDigit;
		$config['upload_path'] = 'assets/images/berkas/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '1024'; // max_size in kb
		$config['overwrite'] = true;
		$config['file_name'] = $filename;

		//Load upload library
		$this->load->library('upload', $config);

		// File upload
		if ($this->upload->do_upload('file')) {
			// Get data about the file
			$uploadData = $this->upload->data();

			if ($cek->num_rows() > 0) {
				$file = FCPATH . '/assets/images/berkas/' . $cek->row('pembayaran');
				$del = unlink($file);
				if ($del) {
					$data = [
						'pembayaran' => $uploadData['file_name']
					];
					$this->db->where('user_id', $iduser);
					$post = $this->db->update('pembayaran', $data);
				}
			} else {
				$data = [
					'user_id' => $iduser,
					'pembayaran' => $uploadData['file_name'],
					'created_at' => date('Y-m-d')
				];
				$get_siswa = $this->db->get_where('siswa', ['user_id' => $iduser])->row();
				$kelas = $this->db->get_where('kelas', ['id_kelas' => $get_siswa->id_kelas])->row('nama_kelas');
				$post = $this->db->insert('pembayaran', $data);
				sleep(5);
				$msg = strtr(get_notif('pembayaran'), array('(nama)'    => $get_siswa->nama,));
				$msg2 .= "Halo *Admin*, Siswa dengan No.REG *$get_siswa->noreg* sudah melakukan konfirmasi pembayaran";
				$this->notif->whatsapp($get_siswa->hp, $msg);
				$this->notif->whatsapp(get_settings('phone'), $msg2);
			}
		}
	}

	public function kepsek()
	{

		$cek = $this->db->get_where('settings', ['key' => 'kepsek']);
		if (!empty($_FILES['file']['name'])) {
		}

		// Set preference
		$fourRandomDigit = mt_rand(1000, 9999);
		$filename = 'KEP-' . date('ymd') . $fourRandomDigit;
		$config['upload_path'] = 'assets/images/kepsek/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '1024'; // max_size in kb
		$config['overwrite'] = true;
		$config['file_name'] = $filename;

		//Load upload library
		$this->load->library('upload', $config);

		// File upload
		if ($this->upload->do_upload('file')) {
			// Get data about the file
			$uploadData = $this->upload->data();

			if ($cek->row('value') != null) {
				$file = FCPATH . '/assets/images/kepsek/' . $cek->row('value');
				$del = unlink($file);
				if ($del) {
					$data['value'] = $uploadData['file_name'];
					$this->db->where('key', 'kepsek');
					$post = $this->db->update('settings', $data);
				}
			} else {
				$data['value'] = $uploadData['file_name'];
				$this->db->where('key', 'kepsek');
				$post = $this->db->update('settings', $data);
			}
		}
	}

	public function logo()
	{

		$cek = $this->db->get_where('settings', ['key' => 'logo']);
		if (!empty($_FILES['file']['name'])) {
		}

		// Set preference
		$fourRandomDigit = mt_rand(1000, 9999);
		$filename = 'SC-' . date('ymd') . $fourRandomDigit;
		$config['upload_path'] = 'assets/images/logo/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '1024'; // max_size in kb
		$config['overwrite'] = true;
		$config['file_name'] = $filename;

		//Load upload library
		$this->load->library('upload', $config);

		// File upload
		if ($this->upload->do_upload('file')) {
			// Get data about the file
			$uploadData = $this->upload->data();

			if ($cek->row('value') != null) {
				$file = FCPATH . '/assets/images/logo/' . $cek->row('value');
				$del = unlink($file);
				if ($del) {
					$data['value'] = $uploadData['file_name'];
					$this->db->where('key', 'logo');
					$post = $this->db->update('settings', $data);
				}
			} else {
				$data['value'] = $uploadData['file_name'];
				$this->db->where('key', 'logo');
				$post = $this->db->update('settings', $data);
			}
		}
	}

	public function upload_banner()
	{
		$cek = $this->db->get_where('front', ['key' => 'banner']);
		$fourRandomDigit = mt_rand(1000, 9999);
		$filename = 'BN-' . date('ymd') . $fourRandomDigit;
		$config['upload_path']          = 'assets/images/banner/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 2000;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$config['file_name'] 						= $filename;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('banner')) {
			$uploadData = $this->upload->data();
			if ($cek->row('value') != null) {
				$file = FCPATH . '/assets/images/banner/' . $cek->row('value');
				$del = unlink($file);
				if ($del) {
					$data['value'] = $uploadData['file_name'];
					$this->db->where('key', 'banner');
					$this->db->update('front', $data);
					$this->session->set_flashdata('msg', '<script>
		Swal.fire(
			"Success",
			"Banner berhasil di ubah",
			"success"
		)
		</script>');

					redirect(site_url('admin/setting'));
				}
			} else {
				$data['value'] = $uploadData['file_name'];
				$this->db->where('key', 'banner');
				$this->db->update('front', $data);
				$this->session->set_flashdata('msg', '<script>
		Swal.fire(
			"Success",
			"Banner berhasil di ubah",
			"success"
		)
		</script>');
				redirect(site_url('admin/setting'));
			}
		}
	}
}

/* End of file Upload.php */
