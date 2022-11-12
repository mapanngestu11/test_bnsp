<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('upload');
		$this->load->model('M_mahasiswa');
	}

	public function index()
	{
		$data['mahasiswa'] = $this->M_mahasiswa->tampil_data();
		$this->load->view('mahasiswa', $data);
	}
	public function add()
	{
		date_default_timezone_set("Asia/Jakarta");
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$jurusan = $this->input->post('jurusan');
		$no_hp = $this->input->post('no_hp');

		$data = array(
			'nim' => $nim,
			'nama' => $nama,
			'jurusan' => $jurusan,
			'no_hp' => $no_hp

		);

		$this->M_mahasiswa->input_data($data, 'tbl_mahasiswa');


		echo $this->session->set_flashdata('msg', 'success');
		redirect('mahasiswa');
	}

	public function delete($id)
	{

		$data = $this->M_mahasiswa->delete_data($id);

		redirect('Mahasiswa');
	}
	public function update($id)
	{
		date_default_timezone_set("Asia/Jakarta");
		$id = $this->input->post('id');
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$jurusan = $this->input->post('jurusan');
		$no_hp = $this->input->post('no_hp');

		$data = array(
			'nim' => $nim,
			'nama' => $nama,
			'jurusan' => $jurusan,
			'no_hp' => $no_hp
		);

		$where = array(
			'id' => $id
		);

		$this->M_mahasiswa->update_data($where, $data, 'tbl_mahasiswa');
		redirect('mahasiswa');
	}
}
