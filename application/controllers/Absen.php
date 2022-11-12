<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->model('M_ujian');
        $this->load->model('M_absen');
        $this->load->model('M_mahasiswa');
        $this->load->model('M_matakuliah');
    }

    public function index()
    {
        $data['absen'] = $this->M_absen->tampil_data();
        $data['mahasiswa'] = $this->M_mahasiswa->tampil_data();
        $data['matkul'] = $this->M_matakuliah->tampil_data();
        $this->load->view('absen', $data);
    }
    public function add()
    {
        date_default_timezone_set("Asia/Jakarta");
        $nim = $this->input->post('nim');
        $kode_mk = $this->input->post('kode_mk');
        $kehadiran = $this->input->post('kehadiran');
        $tanggal = $this->input->post('tanggal');


        $data = array(
            'nim' => $nim,
            'kode_mk' => $kode_mk,
            'kehadiran' => $kehadiran,
            'tanggal' => $tanggal
        );

        $this->M_absen->input_data($data, 'tbl_absen');


        echo $this->session->set_flashdata('msg', 'success');
        redirect('absen');
    }

    public function delete($id)
    {

        $data = $this->M_absen->delete_data($id);

        redirect('absen');
    }
    public function update($id)
    {
        date_default_timezone_set("Asia/Jakarta");
        $id = $this->input->post('id');
        $nim = $this->input->post('nim');
        $kode_mk = $this->input->post('kode_mk');
        $kehadiran = $this->input->post('kehadiran');
        $tanggal = $this->input->post('tanggal');

        $data = array(
            'nim' => $nim,
            'kode_mk' => $kode_mk,
            'kehadiran' => $kehadiran,
            'tanggal' => $tanggal
        );

        $where = array(
            'id' => $id
        );

        $this->M_absen->update_data($where, $data, 'tbl_absen');
        redirect('absen');
    }
}
