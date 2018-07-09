<?php

class User extends CI_Model {

    public function __construct()
    {
         $this->load->database();
    }

// $query = $this->db->get_compiled_select();
// echo $query;

    public function signup($data) {
        
        $this->db->insert('users',$data);
        
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('email'=>$data['email']));
        $query = $this->db->get();
        
        $userData = $query->row_array();
        $this->session->set_userdata($userData);
        return TRUE;
    }


    public function login($data) {
        
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($data);
        $query = $this->db->get();
        
        $userData = $query->row_array();

        if (empty($userData)) {
            return FALSE;
        }
        
        $this->session->set_userdata($userData);
        return TRUE;
    }

    public function questions() {
        $data['user_id'] = $this->session->userdata('id');

        $this->db->select('*');
        $this->db->from('questions');
        $this->db->where($data);
        $query = $this->db->get();
        
        $userData = $query->result_array();
        return $userData;
    }

}