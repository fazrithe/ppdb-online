<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Send extends CI_Controller
{

	public function note()
	{
		$no = $this->input->post('no');
		$msg = $this->input->post('message');
		$this->notif->whatsapp($no, $msg);
		$this->session->set_flashdata('msg', '<script>
		Swal.fire(
			"Success",
			"Pesan berhasil terkirim",
			"success"
		)
		</script>');
		redirect($_SERVER['HTTP_REFERER']);
	}
}

/* End of file Send.php */
