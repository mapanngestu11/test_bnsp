<?php
class M_mahasiswa extends CI_Model
{

    private $_table = "tbl_mahasiswa";

    function tampil_data()
    {
        return $this->db->get('tbl_mahasiswa');
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function delete_data($id)
    {
        $hsl = $this->db->query("DELETE FROM tbl_mahasiswa WHERE id='$id'");
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
