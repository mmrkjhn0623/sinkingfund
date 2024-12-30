<?php

if (!function_exists('base64UrlEncode')) {
    function base64UrlEncode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
}

if (!function_exists('encryptid')) {
    function encryptid($id) {
        $key = "your-encryption-key-32-characters-long";
        $method = "AES-256-CBC";
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method)); // Generate IV
        $encrypted = openssl_encrypt($id, $method, $key, 0, $iv);
        return base64UrlEncode($encrypted . '::' . $iv); // Encode with IV
    }
}