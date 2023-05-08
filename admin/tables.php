                <?php include '../header.php'; ?>   
                <!-- End of Topbar -->
                <?php
                include_once("../config.php");
                $result = mysqli_query($conn,"SELECT * FROM pasien");
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">DATA PASIEN</h1>
                    <?php
                        if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                        echo '<div id="pesan" class="alert alert-success" style="display:none;">'.$_SESSION['pesan'].'</div>';
                        }
                        $_SESSION['pesan'] = '';
                    ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="text-right mb-4">
                                <a href="tambah_data.php" class="d-none d-sm-inline-block btn btn-sm btn-success"><i
                                    class="fas fa-user-plus fa-sm text-white-50"></i> Tambah Data</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Rekam Medis</th>
                                            <th>Tipe Pasien</th>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>Nomor JKN</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <?php
                                    $i = 1;
                                    while($data_pasien=mysqli_fetch_array($result)){

                                        if($data_pasien['tipe_pasien']=='u'){
                                            $tipe_pasien = "UMUM";
                                        }else{
                                            $tipe_pasien = "BPJS";
                                        }
                                        $id = $data_pasien['id_pasien'];
                                        $nama = $data_pasien['nama'];
                                        ?>
                                            <tr>
                                                <th><?=$i++?></th>
                                                <th><?=$data_pasien['nomor_rm']?></th>
                                                <th><?=$tipe_pasien?></th>
                                                <th><?=$data_pasien['nama']?></th>
                                                <th><?=$data_pasien['nik']?></th>
                                                <th><?=$data_pasien['nomor_jkn']?></th>
                                                <th>
                                                <a class='btn btn-success' href='edit_data.php?id=<?=$data_pasien['id_pasien']?>'>Edit</a>
                                                <a class='btn btn-danger' onclick="return confirm('Yakin Hapus?')" href='delete.php?id=<?=$data_pasien['id_pasien']?>'>Hapus</a>
                                                <a class='btn btn-primary' href='detail.php?id=<?=$data_pasien['id_pasien']?>'>Detail</a>
                                                </th>
                                            </tr>
                                    <?php
                                    }
                                    ?>
                                    
                                </table>
                            </div>
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
            if(select.value=="u"){
                document.getElementById('jkn').style.display = "none";
            }else{
                document.getElementById('jkn').style.display = "block";
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