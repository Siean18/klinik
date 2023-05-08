                <?php include '../header.php'; ?>   
                <!-- End of Topbar -->
                <?php
                include_once("../config.php");
                $id = $_GET['id'];
                $result = mysqli_query($conn,"SELECT * FROM pasien WHERE id_pasien = $id");
                ?> 
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">DETAIL PASIEN</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="text-left mb-4">
                                        <a href='tables.php' class="d-none d-sm-inline-block btn btn-sm btn-primary"><i
                                            class="fas fa-backward fa-sm text-white-50"></i> Kembali</a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="text-right mb-4">
                                        <a href='edit_data.php?id=$data_pasien[id_pasien]' class="d-none d-sm-inline-block btn btn-sm btn-success"><i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
                                        <a data-toggle='modal' data-target='#hapusModal' href='delete.php?id=$data_pasien[id_pasien]' class="d-none d-sm-inline-block btn btn-sm btn-danger"><i
                                            class="fas fa-user-plus fa-sm text-white-50"></i> Hapus</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table" width="100%" cellspacing="0">
                                    <?php
                                    while($data_pasien=mysqli_fetch_array($result)){

                                        if($data_pasien['tipe_pasien']=='u'){
                                            $tipe_pasien = "UMUM";
                                        }else{
                                            $tipe_pasien = "BPJS";
                                        }

                                        if($data_pasien['jenis_kelamin']=='L'){
                                            $jenis_kelamin = "Laki-Laki";
                                        }else{
                                            $jenis_kelamin = "Perempuan";
                                        }
                                        echo "
                                            <tbody>
                                                <th>Tipe Pasien</th>
                                                <th>:</th>
                                                <th>$tipe_pasien</th>
                                            </tbody>
                                            <tbody>
                                                <th>Nama Pasien</th>
                                                <th>:</th>
                                                <th>".$data_pasien['nama']."</th>
                                            </tbody>
                                            <tbody>
                                                <th>Jenis Kelamin</th>
                                                <th>:</th>
                                                <th>$jenis_kelamin</th>
                                            </tbody>
                                            <tbody>
                                                <th>TTL</th>
                                                <th>:</th>
                                                <th>".$data_pasien['tempat'].",".$data_pasien['tanggal_lahir']."</th>
                                            </tbody>
                                            <tbody>
                                                <th>Alamat</th>
                                                <th>:</th>
                                                <th>".$data_pasien['alamat']."</th>
                                            </tbody>
                                            <tbody>
                                                <th>NIK</th>
                                                <th>:</th>
                                                <th>".$data_pasien['nik']."</th>
                                            </tbody>
                                            <tbody>
                                                <th>Nomor Rekam Medis</th>
                                                <th>:</th>
                                                <th>".$data_pasien['nomor_rm']."</th>
                                            </tbody>
                                            <tbody>
                                                <th>Nomor JKN</th>
                                                <th>:</th>
                                                <th>".$data_pasien['nomor_jkn']."</th>
                                            </tbody>
                                        ";
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
            <?php include '../footer.php'; ?>   