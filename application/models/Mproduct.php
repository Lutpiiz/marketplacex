<?php
class Mproduct extends CI_Model
{
    function tampil()
    {
        $this->db->select('
            produk.*,
            AVG(rating.nilai_rating) AS rata_rating,
            COUNT(DISTINCT transaksi.id_transaksi) AS jumlah_jual
        ');

        $this->db->from('produk');
        $this->db->join('rating', 'rating.id_produk = produk.id_produk', 'left');
        $this->db->join('transaksi', 'transaksi.id_produk = produk.id_produk AND transaksi.status_transaksi = "selesai"', 'left');
        $this->db->group_by('produk.id_produk');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function detail_produk($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $query = $this->db->get('produk');
        return $query->row_array();
    }

    // , $limit = 18 setelah $id_produk
    public function produk_serupa($id_produk)
    {
        // 1. Ambil semua data produk HANYA SEKALI
        $semua_produk = $this->tampil();

        if (empty($semua_produk)) {
            return [];
        }

        // 2. HITUNG NILAI MAKSIMUM SECARA DINAMIS
        $maks_values = [
            'ram' => 0,
            'storage' => 0,
            'baterai' => 0,
            'ukuran_layar' => 0,
            'harga' => 0,
            'tahun_rilis' => 0,
            'kamera_depan' => 0,
            'kamera_belakang' => 0,
            'resolusi' => 0
        ];

        foreach ($semua_produk as $p) {
            if ((float)$p['ram'] > $maks_values['ram']) $maks_values['ram'] = (float)$p['ram'];
            if ((float)$p['storage'] > $maks_values['storage']) $maks_values['storage'] = (float)$p['storage'];
            if ((float)$p['baterai'] > $maks_values['baterai']) $maks_values['baterai'] = (float)$p['baterai'];
            if ((float)$p['ukuran_layar'] > $maks_values['ukuran_layar']) $maks_values['ukuran_layar'] = (float)$p['ukuran_layar'];
            if ((float)$p['harga'] > $maks_values['harga']) $maks_values['harga'] = (float)$p['harga'];
            if ((int)$p['tahun_rilis'] > $maks_values['tahun_rilis']) $maks_values['tahun_rilis'] = (int)$p['tahun_rilis'];

            // Parsing kamera depan
            $kd = (float)filter_var($p['kamera_depan'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            if ($kd > $maks_values['kamera_depan']) $maks_values['kamera_depan'] = $kd;

            // Parsing kamera belakang
            preg_match_all('/\d+\.?\d*/', $p['kamera_belakang'], $match_kb);
            $kb = array_sum(array_map('floatval', $match_kb[0]));
            if ($kb > $maks_values['kamera_belakang']) $maks_values['kamera_belakang'] = $kb;

            // Parsing resolusi
            preg_match('/(\d+)\s*[xX]\s*(\d+)/', $p['resolusi_layar'], $res);
            $resolusi = isset($res[1], $res[2]) ? ((int)$res[1] * (int)$res[2]) : 0;
            if ($resolusi > $maks_values['resolusi']) $maks_values['resolusi'] = $resolusi;
        }

        // Bagian selanjutnya sama seperti sebelumnya
        $produk_aktif = null;
        $produk_lain = [];
        foreach ($semua_produk as $p) {
            if ($p['id_produk'] == $id_produk) $produk_aktif = $p;
            else $produk_lain[] = $p;
        }
        if ($produk_aktif === null) return [];

        $unique_values = [
            'brands' => array_values(array_unique(array_column($semua_produk, 'brand'))),
            'oss' => array_values(array_unique(array_column($semua_produk, 'os'))),
            'jaringans' => array_values(array_unique(array_column($semua_produk, 'jaringan'))),
            'tipe_layars' => array_values(array_unique(array_column($semua_produk, 'tipe_layar'))),
            'processors' => array_values(array_unique(array_column($semua_produk, 'processor'))),
        ];

        // Kirim $maks_values ke fungsi buat_vector
        $produk_vector = $this->buat_vector($produk_aktif, $unique_values, $maks_values);
        $kemiripan = [];

        foreach ($produk_lain as $produk) {
            $vector = $this->buat_vector($produk, $unique_values, $maks_values);
            $similarity = $this->cosine_similarity($produk_vector, $vector);

            $produk['similarity'] = $similarity;
            $kemiripan[] = $produk;
        }

        usort($kemiripan, function ($a, $b) {
            return $b['similarity'] <=> $a['similarity'];
        });

        return array_slice($kemiripan, 0);
        // , $limit setelah 0
    }

    /**
     * Versi optimasi dari buat_vector.
     * Tidak lagi melakukan query DB, tapi menerima data unik dari parameter.
     */
    private function buat_vector($produk, $unique_values, $maks_values)
    {
        // One-hot encoding helper function
        $one_hot = function ($val, $list) {
            return array_map(function ($item) use ($val) {
                return $item === $val ? 1 : 0;
            }, $list);
        };

        // Buat vector dari fitur kategorikal
        $brand_enc = $one_hot($produk['brand'], $unique_values['brands']);
        $os_enc = $one_hot($produk['os'], $unique_values['oss']);
        $jaringan_enc = $one_hot($produk['jaringan'], $unique_values['jaringans']);
        $tipe_layar_enc = $one_hot($produk['tipe_layar'], $unique_values['tipe_layars']);
        $processor_enc = $one_hot($produk['processor'], $unique_values['processors']);

        // Parsing dan pembersihan fitur numerik (kode Anda sudah bagus)
        $kamera_depan = (float) filter_var($produk['kamera_depan'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        preg_match_all('/\d+\.?\d*/', $produk['kamera_belakang'], $match_kb);
        $kamera_belakang = array_sum(array_map('floatval', $match_kb[0]));
        preg_match('/(\d+)\s*[xX]\s*(\d+)/', $produk['resolusi_layar'], $res);
        $resolusi = isset($res[1], $res[2]) ? ((int)$res[1] * (int)$res[2]) : 0;

        // Normalisasi dan pembobotan fitur numerik (kode Anda sudah bagus)
        // Total bobot numerik = 0.7 (bisa disesuaikan)
        // GUNAKAN $maks_values DARI PARAMETER, BUKAN NILAI STATIS
        $fitur = [
            'ram' => [(float)$produk['ram'], $maks_values['ram'], 0.1],
            'storage' => [(float)$produk['storage'], $maks_values['storage'], 0.1],
            'baterai' => [(float)$produk['baterai'], $maks_values['baterai'], 0.1],
            'ukuran_layar' => [(float)$produk['ukuran_layar'], $maks_values['ukuran_layar'], 0.05],
            'harga' => [(float)$produk['harga'], $maks_values['harga'], 0.12],
            'tahun_rilis' => [(int)$produk['tahun_rilis'], $maks_values['tahun_rilis'], 0.05],
            'kamera_depan' => [$kamera_depan, $maks_values['kamera_depan'], 0.04],
            'kamera_belakang' => [$kamera_belakang, $maks_values['kamera_belakang'], 0.07],
            'resolusi' => [$resolusi, $maks_values['resolusi'], 0.07],
        ];

        $fitur_numerik = [];
        foreach ($fitur as [$nilai, $maks, $bobot]) {
            $fitur_numerik[] = ($maks > 0 ? $nilai / $maks : 0) * $bobot;
        }

        // Bobot fitur kategorikal total = 0.3 (bisa disesuaikan)
        $kategori = array_merge($brand_enc, $os_enc, $jaringan_enc, $tipe_layar_enc, $processor_enc);
        if (count($kategori) > 0) {
            $kategori_bobot = 0.3 / count($kategori); // Bobot dibagi rata
            $kategori_berbobot = array_map(function ($v) use ($kategori_bobot) {
                return $v * $kategori_bobot;
            }, $kategori);
        } else {
            $kategori_berbobot = [];
        }

        return array_merge($fitur_numerik, $kategori_berbobot);
    }

    private function cosine_similarity($a, $b)
    {
        // Kode Anda sudah sempurna, tambahkan pencegahan jika $b adalah 0
        $dot_product = 0;
        $norm_a = 0;
        $norm_b = 0;

        // Pastikan kedua vector memiliki panjang yang sama
        $count = count($a);
        if ($count != count($b)) {
            return 0;
        }

        for ($i = 0; $i < $count; $i++) {
            $dot_product += $a[$i] * $b[$i];
            $norm_a += $a[$i] ** 2;
            $norm_b += $b[$i] ** 2;
        }

        $denominator = sqrt($norm_a) * sqrt($norm_b);

        return $denominator > 0 ? $dot_product / $denominator : 0;
    }

    public function user_transaksi($id_customer)
    {
        $this->db->where('id_customer', $id_customer);
        $this->db->where('status_transaksi', 'selesai');
        $query = $this->db->get('transaksi');
        
        return $query->num_rows() > 0;
    }
}
