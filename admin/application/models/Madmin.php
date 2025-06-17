<?php
class Madmin extends CI_Model
{
    function login($inputan)
    {
        $email_admin = $inputan['email_admin'];
        $password = $inputan['password'];
        // $password = sha1($password);

        //cek database
        $this->db->where('email_admin', $email_admin);
        $this->db->where('password', $password);
        $q = $this->db->get('admin');
        $cekadmin = $q->row_array();

        //jika tidak kosong maka ada
        if (!empty($cekadmin)) {
            $this->session->set_userdata("id_admin", $cekadmin["id_admin"]);
            $this->session->set_userdata("email_admin", $cekadmin["email_admin"]);
            $this->session->set_userdata("nama_admin", $cekadmin["nama_admin"]);
            return "ada";
        } else {
            return "gak ada";
        }
    }

    function ubah($inputan, $id_admin)
    {
        //jika password tidak kosong maka enkripsi
        if (!empty($inputan['password'])) {
            $inputan['password'] = sha1($inputan['password']);
        } else {
            unset($inputan['password']);
        }

        $this->db->where('id_admin', $id_admin);
        $this->db->update('admin', $inputan);

        //karena akun admin telah diubah pada database, maka tiket bioskopnya juga harus membuat baru

        //dapatkan dulu data admin yang baru yang telah diupdate
        $this->db->where('id_admin', $id_admin);
        $q = $this->db->get('admin');
        $cekadmin = $q->row_array();

        //buat tiket lagi
        $this->session->set_userdata("id_admin", $cekadmin["id_admin"]);
        $this->session->set_userdata("email_admin", $cekadmin["email_admin"]);
        $this->session->set_userdata("nama_admin", $cekadmin["nama_admin"]);
    }
}
