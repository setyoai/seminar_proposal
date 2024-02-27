<?php

namespace App\Controllers;

use App\Models\JudulModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class JudulRest extends ResourceController
{
    use ResponseTrait;
    public function __construct()
    {
        $this->kbbiApi = new KBBIApi();
        $this->ratcliff = new AlgorithmRatcliffObershelp();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
//        $kbbiApi = new KBBIApi();

        // Check if the 'judulskripsi' key exists in the request data
        $judulskripsi = $this->request->getVar('judul_skripsi');

        if ($judulskripsi !== null) {
            $cacheKey = 'judul_' . md5($judulskripsi);
            $cachedResult = cache($cacheKey);

            if ($cachedResult !== null) {
                return $this->respond($cachedResult, 200);
            }
            // Membuat instance dari JudulModel
            $judulModel = new JudulModel();

            // Mengambil daftar judul dari model
            $judulList = $judulModel->findAll();

            // Pastikan $judulList bukan null
            if (!empty($judulList)) {
                // Ambil input judul dari pengguna

              $inputJudul = $judulskripsi;

                // Inisialisasi algoritma Ratcliff/Obershelp
                $ratcliff = new AlgorithmRatcliffObershelp();

                // Array untuk menyimpan skor kesamaan dan indeks yang sesuai
                $similarityScores = [];

                foreach ($judulList as $index => $judul) {

                    $similarity = $ratcliff->similarity(
                        $inputJudul,
                        $judul['judul_skripsi']
                    );

                    // Simpan skor kesamaan dan indeksnya
                    $similarityScores[] = [$index, $similarity, $similarity * 100];
                }

                // Urutkan skor kesamaan secara menurun
                usort($similarityScores, function($a, $b) {
                    return $b[1] <=> $a[1];
                });

                // Ambil 3 judul dengan kesamaan tertinggi
                $topThreeTheses = array_slice($similarityScores, 0, 3);
                $topThreeThesesFormatted = array_map(function($item, $index) use ($inputJudul, $judulModel, $judulList) {

                    $words_1 = explode(' ', $inputJudul);
                    $definitions_1 = [];

                    foreach ($words_1 as $word) {
                        // Make API call to search for word definition
                        $result_1 = $this->kbbiApi->search($word);

                        if (isset($result_1['arti']) && is_array($result_1['arti']) && !empty($result_1['arti'][0])) {
                            // Get the first definition
                            $definitions_1[] = $result_1['arti'][0];
                        } else {
                            // Handle the case where definition is not found for a word
                            $definitions_1[] = null;
                        }
                    }

                    $combined_definition_1 = implode(', ', $definitions_1);
//                    echo "Combined $combined_definition_1";

                    $judul_skripsi = $judulList[$item[0]]['judul_skripsi'] . ".";
                    $words_2 = explode(' ', $judul_skripsi);

                    // Initialize array to store definitions
                    $definitions_2 = [];

                    // Loop through each word and fetch its definition
                    foreach ($words_2 as $word) {
                        // Make API call to search for word definition
                        $result_2 = $this->kbbiApi->search($word);

                        if (isset($result_2['arti']) && is_array($result_2['arti']) && !empty($result_2['arti'][0])) {
                            // Get the first definition
                            $definitions_2[] = $result_2['arti'][0];
                        } else {
                            // Handle the case where definition is not found for a word
                            $definitions_2[] = null;
                        }
                    }

                    // Combine definitions into a single string
                    $combined_definition_2 = implode(', ', $definitions_2);

                    $dosen1_name = $judulModel->getDosenNameById($judulList[$item[0]]['dosen1_dosbing']);
                    $dosen2_name = $judulModel->getDosenNameById($judulList[$item[0]]['dosen2_dosbing']);
                    return [
                        'nomor_urut' => $index + 1,
                        'judul' => $judulList[$item[0]]['judul_skripsi'] . ".",
                        'persentase_kesamaan_test' => number_format($item[2], 2) . "%",
                        $combined_definition_1,
                        $combined_definition_2,
                        $result_similarity = $this->ratcliff->similarity($combined_definition_1, $combined_definition_2) * 100,
                        'persentase_kesamaan' => number_format($result_similarity, 2) . "%",
                        'nim_mhs' => $judulList[$item[0]]['nim_mhs'],
                        'nama_mhs' => $judulList[$item[0]]['nama_mhs'],
                        'dosen1_dosbing' => $dosen1_name, // Using the function to get dosen name
                        'dosen2_dosbing' => $dosen2_name, //
                        'tahun_skripsi' => $judulList[$item[0]]['tahun_skripsi'],
                    ];
                },  $topThreeTheses, array_keys($topThreeTheses));

                // Ambil judul paling mirip
                $mostSimilarThesis = reset($similarityScores);

                // Tambahkan data ke respons
                $response['top_three_titles'] = $topThreeThesesFormatted;
                cache()->save($cacheKey, $response, 3600);

                // Kembalikan respons menggunakan metode respond
                return $this->respond($response, 200);
            } else {
                // Tangani kasus ketika judulList kosong
                $response['error'] = "Judul list is empty";
                // Kembalikan respons menggunakan metode respond
                return $this->respond($response, 404); // Misalnya, gunakan kode status HTTP 404 untuk data tidak ditemukan
            }
        } else {
            // Tangani kasus ketika judulskripsi tidak ditemukan
            $response['error'] = "Parameter 'judulskripsi' is missing";

            // Kembalikan respons menggunakan metode respond
            return $this->respond($response, 400); // Misalnya, gunakan kode status HTTP 400 untuk kesalahan permintaan klien
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
