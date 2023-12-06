<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {
	public function __construct(){
        parent::__construct();
        if ($this->session->userdata('status') != 'member_loged') {
        	redirect(base_url('') . 'index.php/Auth');
        }
        $this->load->model('model_master', 'm_master');

        date_default_timezone_set("Asia/Bangkok");
    }
    
    public function index(){
        $data['tes'] = '';
        
        $data['all_data'] = $this->m_master->getAllData('m_anggota');
        
        $this->load->view('template/header');
        $this->load->view('anggota/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah(){
        $data['tes'] = '';
        
        $this->load->view('template/header');
        $this->load->view('anggota/tambah', $data);
        $this->load->view('template/footer');
    }

    public function store(){
        $getSeq         = $this->m_master->getSequenceID("m_anggota","id");
        $seqID          = $getSeq + 1;

        $uuid = $this->uuid->v4();

        $nama      = $this->input->post('nama');
        $alamat      = $this->input->post('alamat');
        $nim      = $this->input->post('nim');

        $insert = $this->m_master->insertData("m_anggota", array('id' => $seqID, 'nama' => $nama, 'alamat' => $alamat, 'nim' => $nim));
        if ($insert) {
            $this->session->set_flashdata('success', 'Tambah data berhasil.');
            redirect('index.php/Anggota');
        } else {
            $this->session->set_flashdata('failed', 'Tambah data gagal.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function edit($id){
        $data['tes'] = '';
        $data['all_data'] = $this->m_master->getData("m_anggota", "id", $id);
        
        $this->load->view('template/header');
        $this->load->view('Anggota/edit', $data);
        $this->load->view('template/footer');
    }

    public function update(){
        $nama      = $this->input->post('nama');
        $alamat      = $this->input->post('alamat');
        $nim      = $this->input->post('nim');

        $id          = $this->input->post('id');

        $update = $this->m_master->updateData("m_anggota", "id", $id, array('nama' => $nama, 'alamat' => $alamat, 'nim' => $nim));
        if ($update) {
            $this->session->set_flashdata('success', 'Update data berhasil.');
            redirect('index.php/Anggota');
        } else {
            $this->session->set_flashdata('failed', 'Update data gagal.');
            redirect($_SERVER['HTTP_REFERER']);
        }

    }

    public function delete($id){
        
        $delete = $this->m_master->deleteData("m_anggota","id", $id);
        if ($delete) {
            $this->session->set_flashdata('success', 'Hapus data berhasil.');
            redirect('index.php/Anggota');
        } else {
            $this->session->set_flashdata('failed', 'Hapus data gagal.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
 
 }