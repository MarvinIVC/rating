<?php
// save_rating.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the rating from the POST request
    $rating = isset($_POST['rating']) ? intval($_POST['rating']) : 0;

    // Validate rating value
    if ($rating >= 1 && $rating <= 5) {
        // Specify the path to the text file
        $file = 'ratings.txt';

        // Write the rating to the text file
        file_put_contents($file, $rating . PHP_EOL, FILE_APPEND);

        // Respond with a success message
        http_response_code(200);
    } else {
        // Respond with an error message for invalid ratings
        http_response_code(400);
    }
} else {
    // Respond with an error message for invalid request method
    http_response_code(405);
}
?>
