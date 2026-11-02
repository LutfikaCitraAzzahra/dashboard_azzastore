<?php

function simpanGambar($namaInput) {

    if (!isset($_FILES[$namaInput]) ||
        $_FILES[$namaInput]['error'] !== UPLOAD_ERR_OK) {
        throw new Exception("Silakan pilih gambar produk!");
    }

    $file = $_FILES[$namaInput];

    $tipeFile = mime_content_type($file['tmp_name']);

    $tipeDiizinkan = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/webp' => 'webp'
    ];

    if (!isset($tipeDiizinkan[$tipeFile])) {
        throw new Exception("Format gambar harus JPG, PNG, atau WEBP!");
    }

    $folder = __DIR__ . '/uploads/';

    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    $namaFile = uniqid('produk_') . '.' . $tipeDiizinkan[$tipeFile];

    if (!move_uploaded_file($file['tmp_name'], $folder . $namaFile)) {
        throw new Exception("Gambar gagal disimpan!");
    }

    return $namaFile;
}

?>
