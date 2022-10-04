<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}


	public function index()
	{
		$this->load->view('home');
	}
    
    
	public function ppdb($jenjang)
	{
		$data['id_jenjang'] = $this->db->get_where('jenjang', ['nama_jenjang' => $jenjang])->row('id');
		$data['page_name'] = 'ppdb_' . $jenjang;
		$data['page_title'] = 'PPDB ' . $jenjang;
		$data['jenjang'] = $jenjang;
		if ($jenjang == 'tk') {
			$data['color'] = '#E67817';
			$data['name'] = 'PPDB PG / TK';
		} elseif ($jenjang == 'sd') {
			$data['color'] = '#f60303';
			$data['name'] = 'PPDB SD';
		} elseif ($jenjang == 'smp') {
			$data['color'] = '#1f3370';
			$data['name'] = 'PPDB SMP';
		} elseif ($jenjang == 'sma') {
			$data['color'] = '#557c99';
			$data['name'] = 'PPDB SMA';
		} elseif ($jenjang == 'smk') {
			$data['color'] = '#000000';
			$data['name'] = 'PPDB SMK';
		} else {
			$data['page_name'] = 'umum';
			$data['color'] = '#00B6BC';
			$data['name'] = 'PPDB UMUM';
		}
		$this->load->view('ppdb/index', $data);
	}

	public function daftar()
	{
		$data = [
			'jenjang' => $this->input->get('jenjang'),
			'id_jenjang' => $this->input->get('id_jenjang'),
			'jurusan' => $this->db->get('jenjang')->result(),
			'kelas' => $this->db->get_where('kelas', ['id_jenjang' => $this->input->get('id_jenjang')])->result()
		];
		$this->load->view('daftar', $data);
	}

	public function prosesdaftar()
	{
		$pass = $this->user_model->generateRandomString(10);
		$id_jenjang =  $this->input->post('jenjang');
		$date =  $this->input->post('tanggal_lahir');
		$data = [
			'fullname'		=> html_escape($this->input->post('nama')),
			'tgl_lahir'		=> date('Y-m-d', strtotime($date)),
			'email'				=> $this->input->post('email'),
			'phone'				=> html_escape($this->input->post('phone')),
			'password'		=> sha1($pass),
			'date_added'	=> strtotime(date("Y-m-d H:i:s")),
			'role_id'			=> 2,
		];

		$validity = $this->user_model->check_duplication($data['fullname'], $data['tgl_lahir']);
		if ($validity) {
			$userid = $this->user_model->register_user($data);
			$siswa = [
				'user_id'						=> $userid,
				'noreg'							=> 'PPDB-' . get_settings('tahun_ajar') . '/' . strtoupper($this->ardesign->generateRandomString(6)),
				'nama'							=> html_escape($this->input->post('nama')),
				'tempat_lahir'			=> html_escape($this->input->post('tempat_lahir')),
				'tanggal_lahir'			=> date('Y-m-d', strtotime($date)),
				'alamat'						=> html_escape($this->input->post('alamat')),
				'agama'							=> html_escape($this->input->post('agama')),
				'jenis'							=> html_escape($this->input->post('jk')),
				'id_jenjang'				=> $id_jenjang,
				'id_kelas'					=> html_escape($this->input->post('kelas')),
				'hp'								=> html_escape($this->input->post('phone')),
				'date'				=> date('Y-m-d'),
			];
			$n_kelas = $this->db->get_where('kelas', ['id_kelas' => $siswa['id_kelas']])->row('nama_kelas');
			$obj = [
				'nama' 	=> $data['fullname'],
				'email' => $data['email'],
				'pass'	=> $pass,
				'kelas'	=> $n_kelas,
				'noreg'	=> $siswa['noreg'],
			];
			$msg = strtr(get_notif('register'), array('(pass)' => $pass,'(nama)' => $siswa['nama'],'(noreg)' => $siswa['noreg']));
			$msg2 = strtr(get_notif('admin_register'), array('(noreg)'  => $siswa['noreg'], '(nama)'  => $data['fullname'], '(kelas)'  => $n_kelas));
			$usr = $this->user_model->register_siswa($siswa);
			$this->db->insert('register', ['user_id' => $userid, 'id_siswa' => $usr, 'created_at' => date('Y-m-d')]);
			$this->db->insert('berkas', ['user_id' => $userid, 'id_siswa' => $usr]);
			$this->notif->whatsapp($data['phone'], $msg);
			$this->notif->whatsapp(get_settings('phone'), $msg2);

			$this->notif->mail($obj);
			$res = [
				'status' => true,
				'message' => 'Pendaftaran Berhasil Cek Email & Whatsapp Anda!'
			];
		} else {
			$res = [
				'status' => false,
				'message' => 'Nama atau Tanggal Lahir sudah terdaftar! Silahkan menghubungi Secretariat Sekolah Budi Agung - Jakarta'
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($res));
	}

	public function login()
	{
		if ($this->session->userdata('admin_login') == true) {
			redirect('admin');
		} elseif ($this->session->userdata('petugas_login') == true) {
			redirect('petugas');
		} elseif ($this->session->userdata('siswa_login') == true) {
			redirect('siswa');
		}
		$jenjang = $this->input->post('jenjang');
		$kelas = $this->input->post('kelas');
		if($jenjang==0 && $kelas==0){
			$data = [
				
				'siswa' => $this->admin_model->siswa_lulus(),
				'jenjang' => $this->input->get('jenjang'),
				'id_jenjang' => $this->input->get('id_jenjang'),
				'jurusan' => $this->db->get('jenjang')->result(),
				'kelas' => $this->db->get_where('kelas')->result(),
				'jenjang_id' => $jenjang,
				'kelas_id' => $kelas,
			];
		}elseif($jenjang==0 || $kelas!=0){
			$data = [
				'siswa' => $this->admin_model->siswa_lulus_where_kelas($kelas),
				'jenjang' => $this->input->get('jenjang'),
				'id_jenjang' => $this->input->get('id_jenjang'),
				'jurusan' => $this->db->get('jenjang')->result(),
				'kelas' => $this->db->get_where('kelas')->result(),
				'jenjang_id' => $jenjang,
				'kelas_id' => $kelas,
			];
		}elseif($jenjang!=0 || $kelas==0){
			$data = [
				'siswa' => $this->admin_model->siswa_lulus_where_jenjang($jenjang),
				'jenjang' => $this->input->get('jenjang'),
				'id_jenjang' => $this->input->get('id_jenjang'),
				'jurusan' => $this->db->get('jenjang')->result(),
				'kelas' => $this->db->get_where('kelas')->result(),
				'jenjang_id' => $jenjang,
				'kelas_id' => $kelas,
			];
		}else{
			$data = [
				
				'siswa' => $this->admin_model->siswa_lulus_where($jenjang, $kelas),
				'jenjang' => $this->input->get('jenjang'),
				'id_jenjang' => $this->input->get('id_jenjang'),
				'jurusan' => $this->db->get('jenjang')->result(),
				'kelas' => $this->db->get_where('kelas')->result()
			];
		}
		
		$this->load->view('login', $data);
	}
}

/* End of file Controllername.php */
