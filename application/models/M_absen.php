<?php
class M_absen extends CI_Model
{

    private $_table = "tbl_absen";

    function tampil_data()
    {
        $this->db->select('
        a.id,
        a.nim,
        b.nama,
        c.kode_mk,
        c.matakuliah,
        a.kehadiran,
        a.tanggal');
        $this->db->from('tbl_absen as a');
        $this->db->join('tbl_mahasiswa as b', 'b.nim = a.nim');
        $this->db->join('tbl_matakuliah as c', 'c.kode_mk = a.kode_mk');
        $query = $this->db->get();
        return $query;
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function delete_data($id)
    {
        $hsl = $this->db->query("DELETE FROM tbl_absen WHERE id='$id'");
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

    function get_total_hadir()
    {
        $this->db->select('Count(a.nim) as jumlah_hadir,b.nim,b.nama');
        $this->db->from('tbl_absen as a');
        $this->db->join('tbl_mahasiswa as b', 'b.nim = a.nim');
        $this->db->Where('kehadiran', '1');
        $this->db->group_by('a.nim');
        $query = $this->db->get();
        return $query;
    }
    function get_kehadiran()
    {
        $this->db->select('Count(a.nim) as jumlah_total,sum(a.kehadiran) as jumlah_hadir,b.nim,b.nama,c.total_nilai,d.kode_mk,d.matakuliah');
        $this->db->from('tbl_absen as a');
        $this->db->join('tbl_mahasiswa as b', 'b.nim = a.nim');
        $this->db->join('tbl_nilai_ujian as c', 'c.nim = a.nim');
        $this->db->join('tbl_matakuliah as d', 'd.kode_mk = a.kode_mk');
        $this->db->group_by('a.nim');
        $query = $this->db->get();
        return $query;
    }
}
