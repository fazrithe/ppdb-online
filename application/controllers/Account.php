<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('siswa_model');
	}

	public function get_siswa()
	{
		if (!$this->input->is_ajax_request()) {
			show_404(); // Jika tidak akses melalui ajax request
		} else {
			$siswa = $this->siswa_model->siswa_users();

			if ($siswa->num_rows() > 0) {
				$this->outputs['data'] = $siswa->row();
				$this->outputs['status']  = true;
			}

			echo json_encode($this->outputs);
		}
	}

	public function update_account()
	{
		if (!$this->input->is_ajax_request()) {
			show_404();
		} else {
			$update = $this->siswa_model->update_siswa();
			if ($update) {
				$this->outputs['status']  = true;
				$this->outputs['msg'] = "Data berhasil diupdate !";
			}
			echo json_encode($this->outputs);
		}
	}

	public function updatePass()
	{
		if (!$this->input->is_ajax_request()) {
			show_404();
		} else {
			$update = $this->siswa_model->update_password();
			if ($update) {
				$this->session->sess_destroy();
				$this->outputs['status']  = true;
				$this->outputs['msg'] = "Password berhasil diupdate !";
			}
			echo json_encode($this->outputs);
		}
	}

	public function fotoUpload()
	{

		if (!empty($_FILES['file']['name'])) {
		}
		$iduser = $this->session->userdata('user_id');
		$cek = $this->db->get_where('users', ['id' => $iduser])->row();
		// Set preference
		$fourRandomDigit = mt_rand(1000, 9999);
		$config['upload_path'] = 'assets/images/foto/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '1024'; // max_size in kb
		$config['overwrite'] = true;
		$config['file_name'] = 'User-' . $fourRandomDigit . time();

		//Load upload library
		$this->load->library('upload', $config);

		// File upload
		if ($this->upload->do_upload('file')) {
			// Get data about the file
			$uploadData = $this->upload->data();
			if ($cek->image == null) {
				$data = [
					'image' => $uploadData['file_name']
				];
				$this->db->where('id', $iduser);
				$post = $this->db->update('users', $data);
			} else {
				$file = FCPATH . '/assets/images/foto/' . $cek->image;
				$del = unlink($file);
				if ($del) {
					$data = [
						'image' => $uploadData['file_name']
					];
					$this->db->where('id', $iduser);
					$post = $this->db->update('users', $data);
				}
			}
		}
	}
}

/* End of file Account.php and path /application/controllers/Account.php */
