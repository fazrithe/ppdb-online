<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		echo "Auth";
	}

	public function login()
	{
		$this->load->view('loginadmin');
	}

	public function validate_login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$credential = array('email' => $email, 'password' => sha1($password));
		// Checking login credential for admin
		$query = $this->db->get_where('users', $credential);
		
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$this->user_model->set_login_userdata($row->id);
		} else {
			$this->session->set_flashdata('error_message', 'Akun kamu belum aktif');
			redirect(site_url('login'), 'refresh');
		}
	}
	public function validate_admin()
	{
		$email = $this->input->post('email', TRUE);
		$password = $this->input->post('password', TRUE);
		$credential = array('email' => $email, 'password' => sha1($password));
		$query = $this->db->get_where('users', $credential);

		if ($query->num_rows() > 0) {
			$row = $query->row();
			$log = $this->user_model->set_login_userdata($row->id);
			if ($log) {
				$msg = array(
					'status' => true,
					'msg' => 'Selamat anda berhasil masuk'
				);
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($msg));
		} else {
			$msg = array(
				'status' => false,
				'msg' => 'Maaf, Email anda tidak terdaftar'
			);
			$this->output->set_content_type('application/json')->set_output(json_encode($msg));
		}
	}
	public function logout()
	{
		// $this->user_model->session_destroy();
		session_destroy();
		redirect(site_url('home'), 'refresh');
	}
}

/* End of file Controllername.php */
