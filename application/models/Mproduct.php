<?php
class Mproduct extends CI_Model
{
    function tampil()
    {
        $q = $this->db->get("produk");
        return $q->result_array();
    }

    public function detail_produk($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $query = $this->db->get('produk');
        return $query->row_array();
    }

    public function produk_serupa($id_produk, $limit = 4)
    {
        $produk_aktif = $this->detail_produk($id_produk);
        $semua_produk = $this->tampil();

        $produk_vector = $this->buat_vector($produk_aktif);
        $kemiripan = [];

        foreach ($semua_produk as $produk) {
            if ($produk['id_produk'] == $id_produk) continue;

            $vector = $this->buat_vector($produk);
            $similarity = $this->cosine_similarity($produk_vector, $vector);
            $produk['similarity'] = $similarity;
            $kemiripan[] = $produk;
        }

        usort($kemiripan, function ($a, $b) {
            return $b['similarity'] <=> $a['similarity'];
        });

        return array_slice($kemiripan, 0, $limit);
    }

    private function buat_vector($produk)
    {
        $semua_produk = $this->tampil();

        $brands = array_unique(array_column($semua_produk, 'brand'));
        $oss = array_unique(array_column($semua_produk, 'os'));
        $jaringans = array_unique(array_column($semua_produk, 'jaringan'));
        $tipe_layars = array_unique(array_column($semua_produk, 'tipe_layar'));
        $processors = array_unique(array_column($semua_produk, 'processor'));

        $one_hot = function ($val, $list) {
            return array_map(function ($item) use ($val) {
                return $item === $val ? 1 : 0;
            }, $list);
        };

        $brand_enc = $one_hot($produk['brand'], $brands);
        $os_enc = $one_hot($produk['os'], $oss);
        $jaringan_enc = $one_hot($produk['jaringan'], $jaringans);
        $tipe_layar_enc = $one_hot($produk['tipe_layar'], $tipe_layars);
        $processor_enc = $one_hot($produk['processor'], $processors);

        $kamera_depan = (float) filter_var($produk['kamera_depan'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        preg_match_all('/\d+\.?\d*/', $produk['kamera_belakang'], $match_kb);
        $kamera_belakang = array_sum(array_map('floatval', $match_kb[0]));

        preg_match('/(\d+)\s*[xX]\s*(\d+)/', $produk['resolusi_layar'], $res);
        $resolusi = isset($res[1], $res[2]) ? ((int)$res[1] * (int)$res[2]) : 0;

        // Normalisasi numerik dan bobot fitur
        $fitur = [
            'ram' => [(float)$produk['ram'], 16, 0.1],
            'storage' => [(float)$produk['storage'], 512, 0.1],
            'baterai' => [(float)$produk['baterai'], 6000, 0.1],
            'ukuran_layar' => [(float)$produk['ukuran_layar'], 7.0, 0.05],
            'harga' => [(float)$produk['harga'], 20000000, 0.12],
            'tahun_rilis' => [(int)$produk['tahun_rilis'], 2030, 0.05],
            'kamera_depan' => [$kamera_depan, 100, 0.04],
            'kamera_belakang' => [$kamera_belakang, 200, 0.07],
            'resolusi' => [$resolusi, 6000000, 0.05],
        ];

        $fitur_numerik = [];
        foreach ($fitur as [$nilai, $maks, $bobot]) {
            $fitur_numerik[] = ($maks > 0 ? $nilai / $maks : 0) * $bobot;
        }

        // Bobot fitur kategorikal total = 0.3, masing-masing 0.06
        $kategori = array_merge($brand_enc, $os_enc, $jaringan_enc, $tipe_layar_enc, $processor_enc);
        $kategori_bobot = 0.3 / count($kategori);
        $kategori_berbobot = array_map(function ($v) use ($kategori_bobot) {
            return $v * $kategori_bobot;
        }, $kategori);

        return array_merge($fitur_numerik, $kategori_berbobot);
    }

    private function cosine_similarity($a, $b)
    {
        $dot_product = 0;
        $norm_a = 0;
        $norm_b = 0;

        for ($i = 0; $i < count($a); $i++) {
            $dot_product += $a[$i] * $b[$i];
            $norm_a += $a[$i] ** 2;
            $norm_b += $b[$i] ** 2;
        }

        return $dot_product / (sqrt($norm_a) * sqrt($norm_b) + 0.00001);
    }
}
