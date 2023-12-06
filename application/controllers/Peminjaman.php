<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {
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
        
        $data['all_data'] = $this->m_master->getAllDataWithParameter('t_peminjaman', 'status !=', 'selesai');
        $data['all_buku'] = $this->m_master->getAllData('m_buku');
        $data['all_perpustakaan'] = $this->m_master->getAllData('m_perpustakaan');
        $data['all_anggota'] = $this->m_master->getAllData('m_anggota');
        
        $this->load->view('template/header');
        $this->load->view('peminjaman/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah(){
        $data['tes'] = '';
        $data['all_buku'] = $this->m_master->getAllData('m_buku');
        $data['all_perpustakaan'] = $this->m_master->getAllData('m_perpustakaan');
        $data['all_anggota'] = $this->m_master->getAllData('m_anggota');
        
        $this->load->view('template/header');
        $this->load->view('peminjaman/tambah', $data);
        $this->load->view('template/footer');
    }

    public function store(){
        $getSeq         = $this->m_master->getSequenceID("t_peminjaman","id");
        $seqID          = $getSeq + 1;

        $uuid = $this->uuid->v4();

        $tanggal_pinjam      = $this->input->post('tanggal_pinjam');
        $tanggal_kembali   = $this->input->post('tanggal_kembali');
        $anggota_id  = $this->input->post('anggota_id');
        $buku_id  = $this->input->post('buku_id');
        $perpustakaan_id  = $this->input->post('perpustakaan_id');

        $insert = $this->m_master->insertData("t_peminjaman", array('id' => $seqID, 'tanggal_pinjam' => $tanggal_pinjam, 'tanggal_kembali' => $tanggal_kembali, 'anggota_id' => $anggota_id, 'buku_id' => $buku_id, 'perpustakaan_id' => $perpustakaan_id));
        if ($insert) {
            $this->session->set_flashdata('success', 'Tambah data berhasil.');
            redirect('index.php/Peminjaman');
        } else {
            $this->session->set_flashdata('failed', 'Tambah data gagal.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function edit($id){
        $data['tes'] = '';
        $data['all_data'] = $this->m_master->getData("t_peminjaman", "id", $id);
        $data['all_buku'] = $this->m_master->getAllData('m_buku');
        $data['all_perpustakaan'] = $this->m_master->getAllData('m_perpustakaan');
        $data['all_anggota'] = $this->m_master->getAllData('m_anggota');
        
        $this->load->view('template/header');
        $this->load->view('Peminjaman/edit', $data);
        $this->load->view('template/footer');
    }

    public function update(){
        $tanggal_pinjam      = $this->input->post('tanggal_pinjam');
        $tanggal_kembali   = $this->input->post('tanggal_kembali');
        $anggota_id  = $this->input->post('anggota_id');
        $buku_id  = $this->input->post('buku_id');
        $perpustakaan_id  = $this->input->post('perpustakaan_id');

        $id          = $this->input->post('id');

        $update = $this->m_master->updateData("t_peminjaman", "id", $id, array('tanggal_pinjam' => $tanggal_pinjam, 'tanggal_kembali' => $tanggal_kembali, 'anggota_id' => $anggota_id, 'buku_id' => $buku_id, 'perpustakaan_id' => $perpustakaan_id));
        if ($update) {
            $this->session->set_flashdata('success', 'Update data berhasil.');
            redirect('index.php/Peminjaman');
        } else {
            $this->session->set_flashdata('failed', 'Update data gagal.');
            redirect($_SERVER['HTTP_REFERER']);
        }

    }

    public function delete($id){
        
        $delete = $this->m_master->deleteData("t_peminjaman","id", $id);
        if ($delete) {
            $this->session->set_flashdata('success', 'Hapus data berhasil.');
            redirect('index.php/Peminjaman');
        } else {
            $this->session->set_flashdata('failed', 'Hapus data gagal.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function selesai(){
        $data['tes'] = '';
        
        $data['all_data'] = $this->m_master->getAllDataWithParameter('t_peminjaman', 'status', 'selesai');
        $data['all_buku'] = $this->m_master->getAllData('m_buku');
        $data['all_perpustakaan'] = $this->m_master->getAllData('m_perpustakaan');
        $data['all_anggota'] = $this->m_master->getAllData('m_anggota');
        
        $this->load->view('template/header');
        $this->load->view('peminjaman/index', $data);
        $this->load->view('template/footer');
    }

    public function laporan(){
        $data['tes'] = '';
        
        $data['all_data'] = $this->m_master->getAllData('t_peminjaman');
        $data['all_buku'] = $this->m_master->getAllData('m_buku');
        $data['all_perpustakaan'] = $this->m_master->getAllData('m_perpustakaan');
        $data['all_anggota'] = $this->m_master->getAllData('m_anggota');
        
        $this->load->view('template/header');
        $this->load->view('peminjaman/index', $data);
        $this->load->view('template/footer');
    }

    public function flag($id, $status){
        $update = $this->m_master->updateData("t_peminjaman", "id", $id, array('status' => $status));
        if ($update) {
            $this->session->set_flashdata('success', 'Update data berhasil.');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('failed', 'Update data gagal.');
            redirect($_SERVER['HTTP_REFERER']);
        }

    }
 
 }