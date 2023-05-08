<?php 
session_start();
include '../config.php';
$id= $_GET['id'];

$tipe_pasien = $_POST['tipe_pasien'];
$nama = $_POST['nama'];
$jenkel = $_POST['jenis_kelamin'];
$tempat = $_POST['tempat'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];
$nik = $_POST['nik'];
$nomor_rm = $_POST['nomor_rm'];
$nomor_jkn = $_POST['nomor_jkn'];
 
mysqli_query($conn, "UPDATE pasien SET tipe_pasien='$tipe_pasien',nama='$nama',jenis_kelamin='$jenkel',tempat='$tempat',tanggal_lahir='$tanggal_lahir',alamat='$alamat',nik='$nik',nomor_rm='$nomor_rm',nomor_jkn='$nomor_jkn' WHERE id_pasien=$id"); 
$_SESSION['pesan'] = "Data berhasil di update";
header("location:tables.php");
 
?>