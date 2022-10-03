<?php defined('BASEPATH') or exit('No direct script access allowed');

class Notif
{
	public function __construct()
	{
		$this->_CI = &get_instance();
	}
	public function ws_url()
	{
		return get_settings('server_autonotif');
	}

	public function mail($obj)
	{
		$subject = 'Registrasi PPDB Sekolah Budi Agung';
		$body = $this->_CI->load->view('email/register', $obj, TRUE);
		$result = $this->_CI->email
			->from('support@sekolahbudiagung.sch.id')
			->to($obj['email'])
			->subject($subject)
			->message($body)
			->send();
		return $result;
	}

	public function lulus($obj)
	{
		$subject = 'Status PPDB Sekolah Budi Agung';
		$body = $this->_CI->load->view('email/lulus', $obj, TRUE);
		$result = $this->_CI->email
			->from('support@sekolahbudiagung.sch.id')
			->to($obj['email'])
			->subject($subject)
			->message($body)
			->send();
		return $result;
	}

	public function ditolak($obj)
	{
		$subject = 'Status PPDB Sekolah Budi Agung';
		$body = $this->_CI->load->view('email/ditolak', $obj, TRUE);
		$result = $this->_CI->email
			->from('support@sekolahbudiagung.sch.id')
			->to($obj['email'])
			->subject($subject)
			->message($body)
			->send();
		return $result;
	}

	// Notif Whatsapp
	public function connect()
	{
		$data = [
			"key" => 'ardesign'
		];
		return $this->curlData($this->ws_url() . "/api/whatsapp/connect/?token=ppdb", $data);
	}
	public function whatsapp($number, $msg)
	{
		$data = [
			"number" => $number,
			"message" => $msg,
			"key" => 'ardesign'
		];
		$q = $this->connect();
		$res = json_decode($q);
		if ($res->message == 'Device connected') {
			return $this->curlData($this->ws_url() . "/api/whatsapp/send_text?token=ppdb", $data);
		} else {
			$this->connect();
		}
	}
	// Core of the Core
	public function curlData($url, $data)
	{

		$curl = curl_init();

		$payload = json_encode($data);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}
}
