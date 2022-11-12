<?php
class M_matakuliah extends CI_Model
{

    private $_table = "tbl_matakuliah";

    function tampil_data()
    {
        return $this->db->get('tbl_matakuliah');
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function delete_data($id)
    {
        $hsl = $this->db->query("DELETE FROM tbl_matakuliah WHERE id='$id'");
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
