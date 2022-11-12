<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ujian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->model('M_ujian');
        $this->load->model('M_mahasiswa');
        $this->load->model('M_matakuliah');
    }

    public function index()
    {
        $data['ujian'] = $this->M_ujian->tampil_data();
        $data['mahasiswa'] = $this->M_mahasiswa->tampil_data();
        $data['matkul'] = $this->M_matakuliah->tampil_data();

        $this->load->view('ujian', $data);
    }
    public function add()
    {
        date_default_timezone_set("Asia/Jakarta");

        $nim = $this->input->post('nim');
        $kode_mk = $this->input->post('kode_mk');
        $uts = $this->input->post('uts');
        $uas = $this->input->post('uas');
        $tugas = $this->input->post('tugas');


        if ($uts or $uas or $tugas == null) {
            $total_nilai = $tugas * 0.2 + $uts * 0.3 + $uas * 0.4;
            $data = array(
                'nim' => $nim,
                'kode_mk' => $kode_mk,
                'uts' => $uts,
                'uas' => $uas,
                'tugas' => $tugas,
                'total_nilai' => $total_nilai

            );

            $this->M_ujian->input_data($data, 'tbl_nilai_ujian');
            echo $this->session->set_flashdata('msg', 'warning');
            redirect('ujian');
        } else {
            $total_nilai = $tugas * 0.2 + $uts * 0.3 + $uas * 0.4;



            $data = array(
                'nim' => $nim,
                'kode_mk' => $kode_mk,
                'uts' => $uts,
                'uas' => $uas,
                'tugas' => $tugas,
                'total_nilai' => $total_nilai

            );

            $this->M_ujian->input_data($data, 'tbl_nilai_ujian');


            echo $this->session->set_flashdata('msg', 'success');
            redirect('ujian');
        }
    }

    public function delete($id)
    {

        $data = $this->M_ujian->delete_data($id);

        redirect('ujian');
    }
    public function update($id)
    {
        date_default_timezone_set("Asia/Jakarta");
        $id = $this->input->post('id');
        $nim = $this->input->post('nim');
        $kode_mk = $this->input->post('kode_mk');
        $uts = $this->input->post('uts');
        $uas = $this->input->post('uas');
        $tugas = $this->input->post('tugas');

        $data = array(
            'nim' => $nim,
            'kode_mk' => $kode_mk,
            'uts' => $uts,
            'uas' => $uas,
            'tugas' => $tugas

        );

        $where = array(
            'id' => $id
        );

        $this->M_ujian->update_data($where, $data, 'tbl_nilai_ujian');
        redirect('ujian');
    }
}
