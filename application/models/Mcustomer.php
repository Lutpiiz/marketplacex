<?php
class Mcustomer extends CI_Model {
    function login($inputan) {
        $email = $inputan['email'];
        $password = $inputan['password'];
        $password = sha1($password);

        //cek database
        $this->db->where('email_customer', $email);
        $this->db->where('password', $password);
        $q = $this->db->get('customer');
        $cekcustomer = $q->row_array();

        //jika tidak kosong maka ada
        if (!empty($cekcustomer)) {
            $this->session->set_userdata("id_customer", $cekcustomer["id_customer"]);
            $this->session->set_userdata("email_customer", $cekcustomer["email_customer"]);
            $this->session->set_userdata("nama_customer", $cekcustomer["nama_customer"]);
            $this->session->set_userdata("alamat", $cekcustomer["alamat"]);
            $this->session->set_userdata("no_telepon", $cekcustomer["no_telepon"]);
            return "ada";
        } else {
            return "gak ada";
        }
        
    }

    function register($inputan) {
        $this->db->insert('customer', $inputan);
    }

    function edit($inputan,$id_customer) {
        if(!empty($inputan['password'])){
            $inputan['password'] = sha1($inputan['password']);
        }else{
            unset($inputan['password']);
        }
        $this->db->where('id_customer', $id_customer);
        $this->db->update('customer', $inputan);
        
        $this->db->where('id_customer', $id_customer);
        $q = $this->db->get('customer');
        $cekcustomer = $q->row_array(); 

        $this->session->set_userdata("id_customer", $cekcustomer["id_customer"]);
        $this->session->set_userdata("email_customer", $cekcustomer["email_customer"]);
        $this->session->set_userdata("nama_customer", $cekcustomer["nama_customer"]);
        $this->session->set_userdata("alamat", $cekcustomer["alamat"]);
        $this->session->set_userdata("no_telepon", $cekcustomer["no_telepon"]);
    }


}
