<?php

namespace App\Controllers;

class KBBIApi extends BaseController
{

    public function search($query)
    {
        // Check if query is empty
        if (empty($query)) {
            // Return error response
            return [
                'error' => true,
                'message' => 'Query cannot be empty'
            ];
        }

        // API Endpoint
        $apiUrl = 'https://kbbi-api-zhirrr.vercel.app/api/kbbi?text=' . urlencode($query);

        // Initialize cURL session
        $curl = curl_init();

        // Set cURL options
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL request
        $response = curl_exec($curl);

        // Close cURL session
        curl_close($curl);

        // Check if request was successful
        if ($response === false) {
            // Return error response
            return [
                'error' => true,
                'message' => 'Error occurred while fetching data'
            ];
        } else {
            // Decode JSON response
            // Return the result
            return json_decode($response, true);
        }
    }
}
