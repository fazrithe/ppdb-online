<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Download extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Siswa_model', 'model_siswa');
		$this->load->model('admin_model');
		if ($this->session->userdata('siswa_login') != true && $this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
	}

	public function pembayaran($id)
	{

		$data['siswa'] = $this->db->get_where('siswa', ['id_siswa' => $id])->row();

		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Bukti Pembayaran.pdf";
		$this->pdf->load_view('cetak/pembayaran', $data);
	}

	public function pdf($form = '')
	{

		$id = $this->input->post('user_id');
		$data['siswa'] = $this->admin_model->siswa($id)->row();
		if ($form == 'formulir') {
			$this->pdf->setPaper('A4', 'potrait');
			$this->pdf->filename = "Formulir.pdf";
			$this->pdf->load_view('cetak/formulir', $data);
		} elseif ($form == 'berkas') {
			$this->pdf->setPaper('A4', 'potrait');
			$this->pdf->filename = "Berkas.pdf";
			$this->pdf->load_view('cetak/berkas', $data);
		} elseif ($form == 'pernyataan') {
			$this->pdf->setPaper('A4', 'potrait');
			$this->pdf->filename = "Pernyataan.pdf";
			$this->pdf->load_view('cetak/pernyataan', $data);
		} elseif ($form == 'pembayaran') {
			$this->pdf->setPaper('A4', 'potrait');
			$this->pdf->filename = "Pembayaran.pdf";
			$this->pdf->load_view('cetak/pembayaran', $data);
		}
	}

	public function siswa_lulus()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'NO.REG');
		$sheet->setCellValue('C1', 'Nama');
		$sheet->setCellValue('D1', 'Agama');
		$sheet->setCellValue('E1', 'Telp');
		$sheet->setCellValue('F1', 'Tanggal lahir');
		$sheet->setCellValue('G1', 'Tempat Lahir');
		$sheet->setCellValue('H1', 'Kelas');
		$sheet->setCellValue('I1', 'Jenjang');
		$sheet->setCellValue('J1', 'Jenis Kelamin');
		$sheet->setCellValue('K1', 'Alamat');
		$sheet->setCellValue('L1', 'Email');

		$siswa = $this->admin_model->print_lulus();
		$no = 1;
		$x = 2;
		foreach ($siswa as $row) {
			$sheet->setCellValue('A' . $x, $no++);
			$sheet->setCellValue('B' . $x, $row->noreg);
			$sheet->setCellValue('C' . $x, $row->nama);
			$sheet->setCellValue('D' . $x, $row->agama);
			$sheet->setCellValue('E' . $x, $row->hp);
			$sheet->setCellValue('F' . $x, $row->tanggal_lahir);
			$sheet->setCellValue('G' . $x, $row->tempat_lahir);
			$sheet->setCellValue('H' . $x, $row->nama_kelas);
			$sheet->setCellValue('I' . $x, $row->nama_jenjang);
			$sheet->setCellValue('J' . $x, $row->jenis);
			$sheet->setCellValue('K' . $x, $row->alamat);
			$sheet->setCellValue('L' . $x, $row->email);
			$x++;
		}
		$writer = new Xlsx($spreadsheet);
		$filename = 'LAPORAN-' . tanggal(date('Y-m-d'));

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	public function siswa_ditolak()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'NO.REG');
		$sheet->setCellValue('C1', 'Nama');
		$sheet->setCellValue('D1', 'Agama');
		$sheet->setCellValue('E1', 'Telp');
		$sheet->setCellValue('F1', 'Tanggal lahir');
		$sheet->setCellValue('G1', 'Tempat Lahir');
		$sheet->setCellValue('H1', 'Kelas');
		$sheet->setCellValue('I1', 'Jenjang');
		$sheet->setCellValue('J1', 'Jenis Kelamin');
		$sheet->setCellValue('K1', 'Alamat');
		$sheet->setCellValue('L1', 'Email');

		$siswa = $this->admin_model->print_ditolak();
		$no = 1;
		$x = 2;
		foreach ($siswa as $row) {
			$sheet->setCellValue('A' . $x, $no++);
			$sheet->setCellValue('B' . $x, $row->noreg);
			$sheet->setCellValue('C' . $x, $row->nama);
			$sheet->setCellValue('D' . $x, $row->agama);
			$sheet->setCellValue('E' . $x, $row->hp);
			$sheet->setCellValue('F' . $x, $row->tanggal_lahir);
			$sheet->setCellValue('G' . $x, $row->tempat_lahir);
			$sheet->setCellValue('H' . $x, $row->nama_kelas);
			$sheet->setCellValue('I' . $x, $row->nama_jenjang);
			$sheet->setCellValue('J' . $x, $row->jenis);
			$sheet->setCellValue('K' . $x, $row->alamat);
			$sheet->setCellValue('L' . $x, $row->email);
			$x++;
		}
		$writer = new Xlsx($spreadsheet);
		$filename = 'LAPORAN-' . tanggal(date('Y-m-d'));

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}

/* End of file Download.php and path /application/controllers/Download.php */
