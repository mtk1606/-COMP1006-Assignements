<?php
// config.php - Store API configuration securely
// This file contains our API endpoints and any sensitive information

// Cat API endpoints - no API key required for basic use
define('CAT_IMAGE_API', 'https://api.thecatapi.com/v1/images/search');
define('CAT_FACT_API', 'https://catfact.ninja/fact');



// Function to make API calls
function makeApiCall($url) {
    // Initialize cURL
    $curl = curl_init();
    
    // Set cURL options
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
        ),
    ));
    
    // Execute the request
    $response = curl_exec($curl);
    $error = curl_error($curl);
    curl_close($curl);
    
    // Check for errors
    if ($error) {
        return false;
    }
    
    // Return decoded JSON
    return json_decode($response, true);
}
?>