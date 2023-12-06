<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
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
        
        $data['all_data'] = $this->m_master->getAllData('m_kategori');
        
        $this->load->view('template/header');
        $this->load->view('kategori/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah(){
        $data['tes'] = '';
        
        $this->load->view('template/header');
        $this->load->view('kategori/tambah', $data);
        $this->load->view('template/footer');
    }

    public function store(){
        $getSeq         = $this->m_master->getSequenceID("m_kategori","id");
        $seqID          = $getSeq + 1;

        $uuid = $this->uuid->v4();

        $nama      = $this->input->post('nama');

        $insert = $this->m_master->insertData("m_kategori", array('id' => $seqID, 'nama' => $nama));
        if ($insert) {
            $this->session->set_flashdata('success', 'Tambah data berhasil.');
            redirect('index.php/Kategori');
        } else {
            $this->session->set_flashdata('failed', 'Tambah data gagal.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function edit($id){
        $data['tes'] = '';
        $data['all_data'] = $this->m_master->getData("m_kategori", "id", $id);
        
        $this->load->view('template/header');
        $this->load->view('Kategori/edit', $data);
        $this->load->view('template/footer');
    }

    public function update(){
        $nama      = $this->input->post('nama');

        $id          = $this->input->post('id');

        $update = $this->m_master->updateData("m_kategori", "id", $id, array('nama' => $nama));
        if ($update) {
            $this->session->set_flashdata('success', 'Update data berhasil.');
            redirect('index.php/Kategori');
        } else {
            $this->session->set_flashdata('failed', 'Update data gagal.');
            redirect($_SERVER['HTTP_REFERER']);
        }

    }

    public function delete($id){

        $delete = $this->m_master->deleteData("m_kategori","id", $id);
        if ($delete) {
            $this->session->set_flashdata('success', 'Hapus data berhasil.');
            redirect('index.php/Kategori');
        } else {
            $this->session->set_flashdata('failed', 'Hapus data gagal.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
 
 }