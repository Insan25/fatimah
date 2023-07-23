<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Auth extends CI_Model
{
    public function testlogin($nm_karyawan,$password)
    {
     $this->db->where('nm_karyawan', $nm_karyawan);
     $this->db->where('password', $password);
     $query = $this->db->get('karyawan');
    
     if ($query->num_rows()>0){
      foreach ($query->result() as $row) {
       $sess = array ('nm_karyawan' => $row->nm_karyawan,
           'password' => $row->password
         );
      }
        $this->session->set_userdata($sess);
        redirect('Dashboard');
     }
     else{
        $this->session->set_flashdata('ingfo','Maaf Username atau Password Anda salah!');
        redirect('Auth');
     }
    }
   
}