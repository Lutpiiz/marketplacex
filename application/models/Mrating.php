<?php
class Mrating extends CI_Model
{
    public function get_all_ratings()
    {
        return $this->db->get('rating')->result_array();
    }

    public function get_user_similarity_matrix($ratings)
    {
        $user_matrix = [];

        foreach ($ratings as $r) {
            $user_matrix[$r['id_customer']][$r['id_produk']] = $r['nilai_rating'];
        }

        $similarities = [];

        foreach ($user_matrix as $userA => $ratingsA) {
            foreach ($user_matrix as $userB => $ratingsB) {
                if ($userA != $userB) {
                    $common = array_intersect_key($ratingsA, $ratingsB);
                    if (count($common) == 0) continue;

                    $num = 0;
                    $denA = 0;
                    $denB = 0;

                    foreach ($common as $product => $val) {
                        $ra = $ratingsA[$product];
                        $rb = $ratingsB[$product];
                        $num += $ra * $rb;
                        $denA += $ra * $ra;
                        $denB += $rb * $rb;
                    }

                    if ($denA > 0 && $denB > 0) {
                        $similarities[$userA][$userB] = $num / (sqrt($denA) * sqrt($denB));
                    }
                }
            }
        }

        return $similarities;
    }

    public function predict_rating($targetUserId, $productId, $ratings, $similarities)
    {
        $numerator = 0;
        $denominator = 0;

        foreach ($ratings as $r) {
            if ($r['id_produk'] == $productId && $r['id_customer'] != $targetUserId) {
                $sim = $similarities[$targetUserId][$r['id_customer']] ?? 0;
                $numerator += $sim * $r['nilai_rating'];
                $denominator += abs($sim);
            }
        }

        return ($denominator == 0) ? 0 : $numerator / $denominator;
    }
}
