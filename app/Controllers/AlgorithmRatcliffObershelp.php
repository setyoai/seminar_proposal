<?php

namespace App\Controllers;
class AlgorithmRatcliffObershelp
{
    public function similarity($s1, $s2)
    {
        // Pengecekan Kesamaan Awal:
        if ($s1 === $s2) {
            return 1.0;
        }
        // Mendapatkan Daftar Cocokan:
        $matches = $this->getMatchList($s1, $s2);

        // Menghitung Total Panjang Cocokan:
        $sumOfMatches = 0;
        foreach ($matches as $match) {
            $sumOfMatches += strlen($match);
        }

        // Menghitung dan Mengembalikan Skor Kesamaan:
        return 2.0 * $sumOfMatches / (strlen($s1) + strlen($s2));
    }

    private function getMatchList($s1, $s2)
    {
        // Inisialisasi List dan Pencarian Cocokan Utama:
        $list = [];
        $match = $this->frontMaxMatch($s1, $s2);

        // Pengecekan Jika Ada Cocokan:
        if (!empty($match)) {
            // Pembagian String dan Rekursi:
            $frontSource = substr($s1, 0, strpos($s1, $match));
            $frontTarget = substr($s2, 0, strpos($s2, $match));
            $frontQueue = $this->getMatchList($frontSource, $frontTarget);

            $endSource = substr($s1, strpos($s1, $match) + strlen($match));
            $endTarget = substr($s2, strpos($s2, $match) + strlen($match));
            $endQueue = $this->getMatchList($endSource, $endTarget);

            // Penambahan ke Daftar dan Penggabungan Hasil Rekursi:
            $list[] = $match;
            $list = array_merge($list, $frontQueue);
            $list = array_merge($list, $endQueue);
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