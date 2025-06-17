<?php
class Mlayanan extends CI_Model {
    function tampil() {
        $q = $this->db->get("layanan");

        $d = $q->result_array();

        return $d;
    }

    function simpan($inputan) {
        $config['upload_path'] = $this->config->item("assets_layanan");
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        $ngupload = $this->upload->do_upload("foto_layanan");

        if ($ngupload) {
            $inputan['foto_layanan'] = $this->upload->data("file_name");
        }

        $this->db->insert('layanan', $inputan);
    }

    function hapus($id_layanan) {
        $this->db->where('id_layanan', $id_layanan);
        $this->db->delete('layanan');
    }

    function detail($id_layanan) {
        $this->db->where('id_layanan', $id_layanan);
        $q = $this->db->get('layanan');
        $d = $q->row_array();

        return $d;
    }

    function edit($inputan, $id_layanan) {
        $config['upload_path'] = $this->config->item("assets_layanan");
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);

        $ngupload = $this->upload->do_upload("foto_layanan");

        if ($ngupload) {
            $inputan['foto_layanan'] = $this->upload->data("file_name");
        }

        $this->db->where('id_layanan', $id_layanan);
        $this->db->update('layanan', $inputan);
    }
}