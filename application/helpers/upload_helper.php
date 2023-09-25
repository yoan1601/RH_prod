<?php 
// application/helpers/upload_helper.php

defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('upload_file')) {
    function upload_file($input_name) {
        $CI = &get_instance();
        
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|jpeg|JPEG';
        $config['max_size'] = 100000;
        
        $CI->load->library('upload', $config);

        if (!$CI->upload->do_upload($input_name)) {
            $error = $CI->upload->display_errors();
            return [0, $error];
        } else {
            $upload_data = $CI->upload->data();
            // $file_name = $upload_data['file_name'];
            // return "Le fichier $file_name a été téléchargé avec succès.";
            return [1, $upload_data];
        }
    }
}
