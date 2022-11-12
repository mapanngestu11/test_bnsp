<?php
class M_ujian extends CI_Model
{

    private $_table = "tbl_nilai_ujian";

    function tampil_data()
    {
        $this->db->select('
        a.id,
        a.nim,
        b.nama,
        c.kode_mk,
        c.matakuliah,
        a.tugas,
        a.uts,
        a.uas,
        a.total_nilai');
        $this->db->from('tbl_nilai_ujian as a');
        $this->db->join('tbl_mahasiswa as b', 'b.nim = a.nim');
        $this->db->join('tbl_matakuliah as c', 'c.kode_mk = a.kode_mk');
        $this->db->group_by('nim');
        $query = $this->db->get();
        return $query;
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function delete_data($id)
    {
        $hsl = $this->db->query("DELETE FROM tbl_nilai_ujian WHERE id='$id'");
        return $hsl;
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function get_data_by_id($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
}
