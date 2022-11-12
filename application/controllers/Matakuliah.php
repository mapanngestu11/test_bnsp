<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matakuliah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->model('M_matakuliah');
    }

    public function index()
    {
        $data['matkul'] = $this->M_matakuliah->tampil_data();
        $this->load->view('matakuliah', $data);
    }
    public function add()
    {
        date_default_timezone_set("Asia/Jakarta");
        $kode_mk = $this->input->post('kode_mk');
        $matakuliah = $this->input->post('matakuliah');


        $data = array(
            'kode_mk' => $kode_mk,
            'matakuliah' => $matakuliah
        );

        $this->M_matakuliah->input_data($data, 'tbl_matakuliah');


        echo $this->session->set_flashdata('msg', 'success');
        redirect('matakuliah');
    }

    public function delete($id)
    {

        $data = $this->M_matakuliah->delete_data($id);

        redirect('matakuliah');
    }
    public function update($id)
    {
        date_default_timezone_set("Asia/Jakarta");
        $id = $this->input->post('id');
        $kode_mk = $this->input->post('kode_mk');
        $matakuliah = $this->input->post('matakuliah');

        $data = array(
            'kode_mk' => $kode_mk,
            'matakuliah' => $matakuliah
        );

        $where = array(
            'id' => $id
        );

        $this->M_matakuliah->update_data($where, $data, 'tbl_matakuliah');
        redirect('matakuliah');
    }
}
