<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
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
        
        $data['all_data'] = $this->m_master->getAllData('m_buku');
        $data['all_kategori'] = $this->m_master->getAllData('m_kategori');
        
        $this->load->view('template/header');
        $this->load->view('buku/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah(){
        $data['tes'] = '';
        $data['all_kategori'] = $this->m_master->getAllData('m_kategori');
        
        $this->load->view('template/header');
        $this->load->view('buku/tambah', $data);
        $this->load->view('template/footer');
    }

    public function store(){
        $getSeq         = $this->m_master->getSequenceID("m_buku","id");
        $seqID          = $getSeq + 1;

        $uuid = $this->uuid->v4();

        $judul      = $this->input->post('judul');
        $penerbit   = $this->input->post('penerbit');
        $pengarang  = $this->input->post('pengarang');
        $kategori_id  = $this->input->post('kategori_id');

        $insert = $this->m_master->insertData("m_buku", array('id' => $seqID, 'judul' => $judul, 'penerbit' => $penerbit, 'pengarang' => $pengarang, 'kategori_id' => $kategori_id));
        if ($insert) {
            $this->session->set_flashdata('success', 'Tambah data berhasil.');
            redirect('index.php/Buku');
        } else {
            $this->session->set_flashdata('failed', 'Tambah data gagal.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function edit($id){
        $data['tes'] = '';
        $data['all_data'] = $this->m_master->getData("m_buku", "id", $id);
        $data['all_kategori'] = $this->m_master->getAllData('m_kategori');
        
        $this->load->view('template/header');
        $this->load->view('Buku/edit', $data);
        $this->load->view('template/footer');
    }

    public function update(){
        $judul      = $this->input->post('judul');
        $penerbit   = $this->input->post('penerbit');
        $pengarang  = $this->input->post('pengarang');
        $kategori_id  = $this->input->post('kategori_id');

        $id          = $this->input->post('id');

        $update = $this->m_master->updateData("m_buku", "id", $id, array('judul' => $judul, 'penerbit' => $penerbit, 'pengarang' => $pengarang, 'kategori_id' => $kategori_id));
        if ($update) {
            $this->session->set_flashdata('success', 'Update data berhasil.');
            redirect('index.php/Buku');
        } else {
            $this->session->set_flashdata('failed', 'Update data gagal.');
            redirect($_SERVER['HTTP_REFERER']);
        }

    }

    public function delete($id){
        
        $delete = $this->m_master->deleteData("m_buku","id", $id);
        if ($delete) {
            $this->session->set_flashdata('success', 'Hapus data berhasil.');
            redirect('index.php/Buku');
        } else {
            $this->session->set_flashdata('failed', 'Hapus data gagal.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
 
 }