<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        // if ($this->session->userdata('status') == 'member_loged') {
        // 	redirect(base_url('') . 'index.php/Dashboard');
        // }
                
        $this->load->model('model_login', 'login');
        $this->load->model('model_master', 'm_master');

        date_default_timezone_set("Asia/Bangkok");
    }

	public function index(){
		$this->load->view('login');
	}
    
    public function doLogin(){
	    $username = strip_tags(trim($this->input->post('username')));
        $password = strip_tags(trim($this->input->post('password')));
        $username = $this->security->xss_clean($username);
        $password = $this->security->xss_clean($password);

        // echo $username.' '.$password;
        
	    $cekAuth = $this->login->authLogin($username, $password);
	    if ($cekAuth == 1) {
	    	$this->db->where('auth_id', $this->session->userdata('auth_id'));
        	$this->db->update('t_auth', array('last_login' => date('Y-m-d H:i:s')));
        	redirect('index.php/Dashboard');
	    } else {
	    	$this->session->set_flashdata('error', 'Username atau Password salah.');
      		redirect('index.php/Auth');
	    }
  	}

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('') . 'index.php/Auth');
    }

    public function perpustakaan(){
        $data['tes'] = '';
        
        $data['all_data'] = $this->m_master->getAllData('m_perpustakaan');
        
        $this->load->view('no_login/perpustakaan', $data);
    }

    public function buku(){
        $data['tes'] = '';
        
        $data['all_data'] = $this->m_master->getAllData('m_buku');
        $data['all_kategori'] = $this->m_master->getAllData('m_kategori');
        
        $this->load->view('no_login/buku', $data);
    }

    public function detail($id){
        $data['tes'] = '';
        
        $data['all_data'] = $this->m_master->getData('m_perpustakaan', 'id', $id);
        $data['all_buku'] = $this->m_master->getAllData('m_buku');
        $data['all_kategori'] = $this->m_master->getAllData('m_kategori');
        
        $this->load->view('no_login/detail_perpustakaan', $data);
    }
    
}
