<?php

// panggil fungsi validasi xss dan injection
require_once('fungsi_validasi.php');

//KONVERSI PHP KE PHP 7
require_once "parser-php-version.php";

$server =  "localhost";
$username = "root";
$password = "";
$database = "wbportaldesav2";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("");
mysql_select_db($database) or die("");

// buat variabel untuk validasi dari file fungsi_validasi.php
$val = new Rizalvalidasi;

function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

function cetak($str){
    return strip_tags(htmlentities($str, ENT_QUOTES, 'UTF-8'));
}

?>
