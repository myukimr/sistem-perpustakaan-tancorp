<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
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
        
        $data['all_unit'] = $this->m_master->getAllData('m_unit');
        $data['all_data'] = $this->m_master->getAllData('t_auth');
        
        $this->load->view('template/header');
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah(){
        $data['tes'] = '';
        $data['all_unit'] = $this->m_master->getAllData('m_unit');
        
        $this->load->view('template/header');
        $this->load->view('user/tambah', $data);
        $this->load->view('template/footer');
    }

    public function store(){
        $getSeq         = $this->m_master->getSequenceID("t_auth","auth_id");
        $seqID          = $getSeq + 1;

        $uuid = $this->uuid->v4();

        $username       = $this->input->post('username');
        $password       = sha1(md5($this->input->post('password')));
        $full_name      = $this->input->post('full_name');
        $flag           = $this->input->post('flag');
        $level          = $this->input->post('level');
        $email          = $this->input->post('email');
        $phone          = $this->input->post('phone');
        $gender         = $this->input->post('gender');
        $address        = $this->input->post('address');
        $unit_id        = $this->input->post('unit_id');
        $auth_uuid      = $uuid;
        $created_at     = date("Y-m-d H:i:s");

        $cekUsername = $this->m_master->getData("t_auth", "username", $username);
        if ($cekUsername == NULL) {
            $insert = $this->m_master->insertData("t_auth", array('auth_id' => $seqID, 'username' => $username, 'password' => $password, 'full_name' => $full_name, 'flag' => $flag, 'level' => $level, 'email' => $email, 'phone' => $phone, 'gender' => $gender, 'address' => $address, 'unit_id' => $unit_id, 'auth_uuid' => $auth_uuid, 'created_at' => $created_at));
            if ($insert) {
                $this->session->set_flashdata('success', 'Tambah data berhasil.');
                redirect('index.php/User');
            } else {
                $this->session->set_flashdata('failed', 'Tambah data gagal.');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('failed', 'Username telah digunakan');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function edit($uuid){
        $data['tes'] = '';
        $data['all_data'] = $this->m_master->getData("t_auth", "auth_uuid", $uuid);
        $data['all_unit'] = $this->m_master->getAllData('m_unit');
        
        $this->load->view('template/header');
        $this->load->view('User/edit', $data);
        $this->load->view('template/footer');
    }

    public function update(){
        $username       = $this->input->post('username');
        if ($this->input->post('password') != '') {
            $password       = sha1(md5($this->input->post('password')));
        }
        $full_name      = $this->input->post('full_name');
        $flag           = $this->input->post('flag');
        $level          = $this->input->post('level');
        $email          = $this->input->post('email');
        $phone          = $this->input->post('phone');
        $gender         = $this->input->post('gender');
        $address        = $this->input->post('address');
        $unit_id        = $this->input->post('unit_id');
        $updated_at      = date("Y-m-d H:i:s");
        $auth_id        = $this->input->post('auth_id');

        if ($this->input->post('password') != '') {
             $update = $this->m_master->updateData("t_auth", "auth_id", $auth_id, array('username' => $username, 'password' => $password, 'full_name' => $full_name, 'flag' => $flag, 'level' => $level, 'email' => $email, 'phone' => $phone, 'gender' => $gender, 'address' => $address, 'unit_id' => $unit_id, 'updated_at' => $updated_at));
        } else {
             $update = $this->m_master->updateData("t_auth", "auth_id", $auth_id, array('username' => $username, 'full_name' => $full_name, 'flag' => $flag, 'level' => $level, 'email' => $email, 'phone' => $phone, 'gender' => $gender, 'address' => $address, 'unit_id' => $unit_id, 'updated_at' => $updated_at));
        }

        if ($update) {
            $this->session->set_flashdata('success', 'Update data berhasil. Silahkan login ulang untuk memperbarui session.');
            redirect('index.php/User');
        } else {
            $this->session->set_flashdata('failed', 'Update data gagal.');
            redirect($_SERVER['HTTP_REFERER']);
        }

    }

    public function delete($uuid){
        $data = $this->m_master->getData("t_auth", "auth_uuid", $uuid);

        $delete = $this->m_master->deleteData("t_auth","auth_id", $data['auth_id']);
        if ($delete) {
            $this->session->set_flashdata('success', 'Hapus data berhasil.');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('failed', 'Hapus data gagal.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function profil(){
        $data['tes'] = '';
        $data['all_unit'] = $this->m_master->getAllData('m_unit');
        
        $this->load->view('template/header');
        $this->load->view('user/profil', $data);
        $this->load->view('template/footer');
    }
 
 }