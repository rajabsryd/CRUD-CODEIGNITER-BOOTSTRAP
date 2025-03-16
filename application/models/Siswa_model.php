<?php
class Siswa_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_siswa() {
        return $this->db->get('siswa')->result();
    }

    public function get_siswa_by_id($id) {
        return $this->db->get_where('siswa', ['id' => $id])->row();
    }

    public function insert_siswa($data) {
        $this->db->insert('siswa', $data);
        return $this->db->affected_rows();
    }

    public function update_siswa($id, $data) {
        $this->db->where('id', $id)->update('siswa', $data);
        return $this->db->affected_rows();
    }

    public function delete_siswa($id) {
        $this->db->where('id', $id)->delete('siswa');
        return $this->db->affected_rows();
    }
}

?>