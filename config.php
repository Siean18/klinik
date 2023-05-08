<?php 
error_reporting(0);
//  session_start();
$server = "localhost";
$user = "root";
$pass = "";
$database = "klinik";
 
$conn = mysqli_connect($server, $user, $pass, $database);
 
if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
 
$_SESSION["sukses"] = 'Data Berhasil Disimpan';

// header('Location: admin/index.php');
// exit();
?>