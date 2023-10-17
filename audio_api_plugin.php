<?php

/*
Plugin Name: Audio API
Description: Receive audio .wav files and convert to .mp3 format and stores them in the media library.
*/

// Define the API endpoint
add_action('rest_api_init', function () {
    register_rest_route('audio/v1', '/convert', [
        'methods' => 'GET',
        'callback' => 'convert_wav_to_mp3'
    ]);
});

function convert_wav_to_mp3($request) {
    $response = array();

    // Check if a file is uploaded
    // if (isset($_FILES['wav_file'])) {
    //     $file = $_FILES['wav_file'];

    //     // Check if it's a valid .wav file
    //     $file_info = pathinfo($file['name']);
    //     if ($file_info['extension'] !== 'wav') {
    //         $response['error'] = 'Invalid file format. Please upload a .wav file.';
    //     } else {
    //         // Convert .wav to .mp3
    //         exec("ffmpeg -i " . $file['tmp_name'] . " " . $file_info['filename'] . ".mp3");

    //         // Store in WordPress media library
    //         $upload_dir = wp_upload_dir();
    //         $file_path = $upload_dir['path'] . '/' . $file_info['filename'] . '.mp3';
    //         $file_name = $file_info['filename'] . '.mp3';

    //         $attachment = array(
    //             'guid'           => $upload_dir['url'] . '/' . $file_name,
    //             'post_mime_type' => 'audio/mpeg',
    //             'post_title'     => preg_replace('/\.[^.]+$/', '', $file_name),
    //             'post_content'   => '',
    //             'post_status'    => 'inherit'
    //         );

    //         $attach_id = wp_insert_attachment($attachment, $file_path);

    //         $attach_data = wp_generate_attachment_metadata($attach_id, $file_path);
    //         wp_update_attachment_metadata($attach_id, $attach_data);

    //         // Clean up temporary files
    //         unlink($file['tmp_name']);
    //         unlink($file_info['filename'] . '.mp3');

    //         $response['success'] = 'File converted and stored successfully.';
    //     }
    // } else {
    //     $response['error'] = 'No file uploaded.';
    // }

    return new WP_REST_Response($response, 200);
}