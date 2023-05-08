<?php include_once("../config.php");
session_start();
        $id = $_GET['id'];
        $result = mysqli_query($conn, "DELETE FROM pasien WHERE id_pasien=$id");
        $_SESSION['pesan'] = 'Data Berhasil Dihapus';
         header("Location:tables.php"); ?>