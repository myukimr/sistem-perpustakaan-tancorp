<?php
class Model_login extends CI_model{

  function authLogin($username, $password){
      $this->db->select('username,password');
      $this->db->from('t_auth');
      $this->db->where('username', $username);
      $this->db->where('password', sha1(md5($password)));
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
          $this->db->select('*');
          $this->db->from('t_auth');
          $this->db->where('username', $username);
          $this->db->where('password', sha1(md5($password)));
          $this->db->where('flag', 1);
          $query2 = $this->db->get();
          if($query2->num_rows() > 0){
            $result = $query2->row_array();
            $data_session = array(
                'auth_id'         => $result['auth_id'],
                'username'        => $result['username'],
                'full_name'       => $result['full_name'],
                'level'           => $result['level'],
                'unit_id'         => $result['unit_id'],
                'email'           => $result['email'],
                'phone'           => $result['phone'],
                'auth_uuid'       => $result['auth_uuid'],
                'status'          => 'member_loged',
            );
            $this->session->set_userdata($data_session);
            return 1; // berhasil login
          } else {
            return 2; // akun non aktif
          }
      } else {
          return 0; // password salah
      }
  }
  
}