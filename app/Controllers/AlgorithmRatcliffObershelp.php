<?php

namespace App\Controllers;
class AlgorithmRatcliffObershelp
{
    public function similarity($s1, $s2)
    {
        if ($s1 === $s2) {
            return 1.0;
        }
//      Jika kedua string identik, maka kesamaannya adalah 1.0 (100%).

        $matches = $this->getMatchList($s1, $s2);
        $sumOfMatches = 0;
        foreach ($matches as $match) {
            $sumOfMatches += strlen($match);
        }
//        Metode getMatchList() dipanggil untuk mendapatkan daftar substring yang cocok di antara kedua string.
//        Setiap panjang substring yang cocok ditambahkan ke variabel $sumOfMatches

        return 2.0 * $sumOfMatches / (strlen($s1) + strlen($s2));
//        Skor kesamaan dihitung dengan rumus (2 * total panjang substring yang cocok) dibagi dengan (panjang total kedua string).
    }

    private function getMatchList($s1, $s2)
    {
        $list = [];
        $match = $this->frontMaxMatch($s1, $s2);
//      Metode frontMaxMatch() dipanggil untuk mendapatkan substring terpanjang yang cocok di awal kedua string(anchor).

        // Pengecekan Jika Ada Cocokan:
        if (!empty($match)) {
            // Pembagian String dan Rekursi:
            $frontSource = substr($s1, 0, strpos($s1, $match));
            $frontTarget = substr($s2, 0, strpos($s2, $match));
            $frontQueue = $this->getMatchList($frontSource, $frontTarget);
//          Metode getMatchList() dipanggil secara rekursif untuk mendapatkan daftar
//          substring yang cocok di bagian depan dan belakang kedua string.

            $endSource = substr($s1, strpos($s1, $match) + strlen($match));
            $endTarget = substr($s2, strpos($s2, $match) + strlen($match));
            $endQueue = $this->getMatchList($endSource, $endTarget);

            $list[] = $match;
            $list = array_merge($list, $frontQueue);
            $list = array_merge($list, $endQueue);
//          Hasil substring yang cocok dari bagian depan, tengah, dan belakang digabungkan ke dalam satu daftar dan dikembalikan.
        }
        return $list;
    }

    private function frontMaxMatch($s1, $s2)
    {
        // Inisialisasi Variabel Penyimpanan:
        $longest = 0;
        $longestSubstring = "";

        // Iterasi Melalui Indeks s1:
        for ($i = 0; $i < strlen($s1); $i++) {
            // Iterasi Melalui Panjang Substring:
            for ($j = $i + 1; $j <= strlen($s1); $j++) {
                // Mengambil dan Memeriksa Substring:
                $substring = substr($s1, $i, $j - $i);
                if (strpos($s2, $substring) !== false && strlen($substring) > $longest) {
                    $longest = strlen($substring);
                    $longestSubstring = $substring;
                }
             }
        }
        return $longestSubstring;
    }
}