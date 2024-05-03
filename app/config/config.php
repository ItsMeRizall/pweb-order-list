<?php

require_once 'env.php';

define("BASEURL",$_ENV['BASEURL']);

// Konfigurasi koneksi ke database
define('DB_HOST', $_ENV['DB_HOST']); // Host basis data (biasanya 'localhost')
define('DB_USER', $_ENV['DB_USER']); // Nama pengguna basis data
define('DB_PASS', ''); // Kata sandi pengguna basis data
define('DB_NAME', $_ENV['DB_NAME']); // Nama basis data

// Buat koneksi ke database menggunakan PDO
try {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
    $dbh = new PDO($dsn, DB_USER, DB_PASS);

    // Atur mode error PDO ke Exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Atur karakter koneksi ke UTF-8
    $dbh->exec('SET NAMES utf8');
} catch (PDOException $e) {
    // Tangani kesalahan koneksi
    die('Koneksi database gagal: ' . $e->getMessage());
}