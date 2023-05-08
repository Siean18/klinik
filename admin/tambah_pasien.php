<?php 
include '../config.php';
session_start();

$tipe_pasien = $_POST['tipe_pasien'];
$nama = $_POST['nama'];
$jenkel = $_POST['jenis_kelamin'];
$tempat = $_POST['tempat'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];
$nik = $_POST['nik'];
// var_dump($nik);die;
$nomor_rm = $_POST['nomor_rm'];
$nomor_jkn = $_POST['nomor_jkn'];
 
mysqli_query($conn, "INSERT INTO pasien(tipe_pasien,nama,jenis_kelamin,tempat,tanggal_lahir,alamat,nik,nomor_rm,nomor_jkn) VALUES ('$tipe_pasien','$nama','$jenkel','$tempat','$tanggal_lahir','$alamat','$nik','$nomor_rm','$nomor_jkn')");

$_SESSION['pesan'] = 'Data berhasil di tambahkan';
header("location:tables.php");
 
?>