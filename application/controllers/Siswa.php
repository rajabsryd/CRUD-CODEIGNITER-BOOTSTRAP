<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Siswa_model'); // Load model
    }

    public function index() {
        $data['siswa'] = $this->Siswa_model->get_all_siswa();
        $this->load->view('siswa_view', $data);
    }

    public function tambah() {
        $this->load->view('tambah_siswa');
    }

    public function simpan() {
        $data = [
            'nama'   => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'no_hp'  => $this->input->post('no_hp')
        ];
        $this->Siswa_model->insert_siswa($data);
        redirect('siswa');
    }

    public function edit($id) {
        $data['siswa'] = $this->Siswa_model->get_siswa_by_id($id);
        $this->load->view('edit_siswa', $data);
    }

    public function update($id) {
        $data = [
            'nama'   => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'no_hp'  => $this->input->post('no_hp')
        ];
        $this->Siswa_model->update_siswa($id, $data);
        redirect('siswa');
    }

    public function hapus($id) {
        $this->Siswa_model->delete_siswa($id);
        redirect('siswa');
    }
}

?>