                <?php include '../header.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">EDIT DATA</h1>
                    <?php
                        include_once('../config.php');
                        $id = $_GET['id'];
                        $result = mysqli_query($conn,"SELECT * FROM pasien WHERE id_pasien = $id");
                        while($data_pasien = mysqli_fetch_array($result)){
                            $tipe_pasien = $data_pasien['tipe_pasien'];
                            $nama = $data_pasien['nama'];
                            $jenis_kelamin = $data_pasien['jenis_kelamin'];
                            $tempat = $data_pasien['tempat'];
                            $tanggal_lahir = $data_pasien['tanggal_lahir'];
                            $alamat = $data_pasien['alamat'];
                            $nik = $data_pasien['nik'];
                            $nomor_rm = $data_pasien['nomor_rm'];
                            $nomor_jkn = $data_pasien['nomor_jkn'];
                        }


                        // TIPE PASIEN UMUM
                        $carikode_u = mysqli_query($conn,"SELECT MAX(nomor_rm) FROM pasien WHERE tipe_pasien = 'u'");

                        // TIPE PASIEN BPJS
                        $carikode_b = mysqli_query($conn,"SELECT MAX(nomor_rm) FROM pasien WHERE tipe_pasien = 'b'");
        
                        // menjadikannya array
                        $datakode_u = mysqli_fetch_array($carikode_u);
                        $datakode_b = mysqli_fetch_array($carikode_b);
                        // jika $datakode
                        if ($datakode_u) {
                            // membuat variabel baru untuk mengambil kode barang mulai dari 1
                            $nilaikode_u = substr($datakode_u[0], 1);
                            // menjadikan $nilaikode ( int )
                            $kode_u = (int) $nilaikode_u;
                            // setiap $kode di tambah 1
                            $kode_u = $kode_u + 1;
                            // hasil untuk menambahkan kode
                            // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
                            // atau angka sebelum $kode
                            $hasilkode_u = "U".str_pad($kode_u, 3, "0", STR_PAD_LEFT);
                        } else {
                        $hasilkode_u = "U001";
                        }

                        if ($datakode_b) {
                            // membuat variabel baru untuk mengambil kode barang mulai dari 1
                            $nilaikode_b = substr($datakode_b[0], 1);
                            // menjadikan $nilaikode ( int )
                            $kode_b = (int) $nilaikode_b;
                            // setiap $kode di tambah 1
                            $kode_b = $kode_b + 1;
                            // hasil untuk menambahkan kode
                            // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
                            // atau angka sebelum $kode
                            $hasilkode_b = "B".str_pad($kode_b, 3, "0", STR_PAD_LEFT);
                            } else {
                            $hasilkode_b = "B001";
                            }
                    ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                            <div class="text-left mb-4">
                                        <a href='tables.php' class="d-none d-sm-inline-block btn btn-sm btn-primary"><i
                                            class="fas fa-backward fa-sm text-white-50"></i> Kembali</a>
                                    </div>
                            <form method="post" action="edit_pasien.php?id=<?=$id; ?>">
                                
                            <div class="form-group">
                                    <label for="exampleInputEmail1"><b>Tipe Pasien</b></label>
                                    <select class="form-control" name="tipe_pasien" onchange="myFunction(this)">
                                        <option value="u" id="umum"  <?php if($tipe_pasien=='u'){echo'selected';}else{} ?>>Umum</option>
                                        <option value="b" id="bpjs"  <?php if($tipe_pasien=='b'){echo'selected';}else{} ?>>BPJS</option>
                                    </select>
                                </div>
                                <div class="form-group" id="jkn">
                                    <label for="exampleInputEmail1"><b>Nomor JKN</b></label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan JKN" onkeypress="return hanyaAngka(event)" name="nomor_jkn" value="<?= $nomor_jkn;?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><b>Nama Pasien</b></label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama Pasien" name="nama" value="<?= $nama;?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><b>Jenis Kelamin</b></label>
                                    <select class="form-control" name="jenis_kelamin" required>
                                        <option value="L" <?php if($jenis_kelamin=='L'){echo'selected';}else{} ?>>Laki-Laki</option>
                                        <option value="P" <?php if($jenis_kelamin=='P'){echo'selected';}else{} ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group mb-3">
                                            <label for="exampleInputEmail1" class="input-group"><b>Tempat</b></label>
                                            <input type="text" class="form-control" name="tempat" value="<?= $tempat;?>" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                    <div class="input-group mb-3">
                                            <label for="exampleInputEmail1" class="input-group"><b>Tanggal Lahir</b></label>
                                            <input type="date" class="form-control" name="tanggal_lahir" value="<?= $tanggal_lahir;?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="input-group"><b>Alamat</b></label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat" required><?= $alamat;?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><b>NIK</b></label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan NIK" name="nik" value="<?= $nik;?>" onkeypress="return hanyaAngka(event)" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><b>Nomor Rekam Medis</b></label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Nomor Rekam Medis" id="nomor_rm" name="nomor_rm" value="<?= $nomor_rm;?>" readonly>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Siean 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik logout untuk keluar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Menghapus?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Data yang dihapus tidak bisa dikembalikan!</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="delete.php">Hapus</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script>


        $(document).ready(function(){setTimeout(function(){$("#pesan").fadeIn('slow');}, 500);});
            setTimeout(function(){$("#pesan").fadeOut('slow');}, 3000);
        
        
            function myFunction(select){
                var umum = "<?php echo $hasilkode_u; ?>";
                var bpjs = "<?php echo $hasilkode_b; ?>";

                // console.log(bpjs);die;
            if(select.value=="u"){
                document.getElementById('jkn').style.display = "none";
                document.getElementById("nomor_rm").value = umum;
            }else{
                document.getElementById('jkn').style.display = "block";
                document.getElementById("nomor_rm").value = bpjs;
            }
        }

        function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}

        
            


    </script>
</body>

</html>