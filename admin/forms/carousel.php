<?php
if(@$_SESSION['admin']) { ?>

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Manajemen Siswa</h1>
        </div>
    </div>

    <div class="row">
        <?php

        $id = @$_GET['id'];
        $sql_per_id = mysqli_query($db, "SELECT * FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas WHERE id_siswa = '$id'") or die ($db->error);
        $data = mysqli_fetch_array($sql_per_id);


        if(@$_GET['action'] == '') { ?>

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="?page=manajemensiswa&action=tambah" class="btn btn-primary btn-sm">Tambah Data</a> <a href="./laporan/cetak.php?data=siswa" target="_blank" class="btn btn-default btn-sm">Cetak Data Siswa</a></div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="datasiswa">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIS</th>
                                    <th>Nama Lengkap</th>
                                    <th>Alamat</th>
                                    <th>Kelas</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;
                                $sql_siswa = mysqli_query($db, "SELECT * FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas") or die ($db->error);
                                if(mysqli_num_rows($sql_siswa) > 0) {
                                    while($data_siswa = mysqli_fetch_array($sql_siswa)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data_siswa['nis']; ?></td>
                                            <td><?php echo $data_siswa['nama_siswa']; ?></td>
                                            <td><?php echo $data_siswa['alamat']; ?></td>
                                            <td><?php echo $data_siswa['nama_kelas']; ?></td>
                                            <td><?php echo $data_siswa['status']; ?></td>
                                            <td align="center" width="170px">
                                                <a href="?page=manajemensiswa&action=edit&id=<?php echo $data_siswa['id_siswa']; ?>" class="badge" style="background-color:#f60;">Edit</a>
                                                <a onclick="return confirm('Yakin akan menghapus data?');" href="?page=manajemensiswa&action=hapus&id=<?php echo $data_siswa['id_siswa']; ?>" class="badge" style="background-color:#f00;">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="7" align="center">Data tidak ditemukan</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <script>
                                $(document).ready(function () {
                                    $('#datasiswa').dataTable();
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $query = "INSERT INTO tb_audit_trail VALUES ('','".@$_SESSION['admin']."', 'Admin','Halaman Manajemen siswa', curdate())";
            $sql = mysqli_query($db, $query) or die($db->error);

        } else if(@$_GET['action'] == 'detail') {
            ?>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Detail Data Siswa &nbsp; <a href="?page=manajemensiswa" class="btn btn-warning btn-sm">Kembali</a></div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table width="100%">
                                <tr>
                                    <td align="right" valign="top"><b>Foto</b></td>
                                    <td align="center" valign="top">:</td>
                                    <td>
                                        <div style="padding:10px 0;"><img width="250px" src="../img/foto_siswa/<?php echo $data['foto']; ?>" /></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" width="46%"><b>NIS</b></td>
                                    <td align="center">:</td>
                                    <td width="46%"><?php echo $data['nis']; ?></td>
                                </tr>
                                <tr>
                                    <td align="right"><b>Nama Lengkap</b></td>
                                    <td align="center">:</td>
                                    <td><?php echo $data['nama_siswa']; ?></td>
                                </tr>
                                <tr>
                                    <td align="right"><b>Tempat Tanggal Lahir</b></td>
                                    <td align="center">:</td>
                                    <td><?php echo $data['tempat_lahir'].", ".tgl_indo($data['tgl_lahir']); ?></td>
                                </tr>
                                <tr>
                                    <td align="right"><b>Nomor Telepon</b></td>
                                    <td align="center">:</td>
                                    <td><?php echo $data['no_telp']; ?></td>
                                </tr>
                                <tr>
                                    <td align="right"><b>Alamat</b></td>
                                    <td align="center">:</td>
                                    <td><?php echo $data['alamat']; ?></td>
                                </tr>
                                <tr>
                                    <td align="right"><b>Kelas</b></td>
                                    <td align="center">:</td>
                                    <td><?php echo $data['nama_kelas']; ?></td>
                                </tr>
                                <tr>
                                    <td align="right"><b>Username</b></td>
                                    <td align="center">:</td>
                                    <td><?php echo $data['username']; ?></td>
                                </tr>
                                <tr>
                                    <td align="right"><b>Password</b></td>
                                    <td align="center">:</td>
                                    <td><?php echo $data['pass']; ?></td>
                                </tr>
                                <tr>
                                    <td align="right"><b>Status</b></td>
                                    <td align="center">:</td>
                                    <td><?php echo ucfirst($data['status']); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else if(@$_GET['action'] == 'tambah') {
            ?>
            <form method="post" action="?page=manajemensiswa&action=prosestambah" enctype="multipart/form-data">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Tambah Data Siswa &nbsp; <a href="?page=manajemensiswa" class="btn btn-warning btn-sm">Kembali</a></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="gambar" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>NIS *</label>
                                <input type="text" name="nis" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap *</label>
                                <input type="text" name="nama_siswa" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir *</label>
                                <input type="text" name="tempat_lahir" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir *</label>
                                <input type="date" name="tgl_lahir" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon *</label>
                                <input type="text" name="no_telp" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Alamat *</label>
                                <textarea name="alamat" class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <select name="id_kelas" class="form-control">
                                    <?php
                                    $sql2 = tampil_per_id("tb_kelas", "id_kelas = '$data[id_kelas]'");
                                    $data2 = mysqli_fetch_array($sql2);
                                    if(mysqli_num_rows($sql2) > 0) {
                                        echo '<option value="'.$data2['id_kelas'].'">'.$data2['nama_kelas'].'</option>';
                                        echo '<option value="">- Pilih -</option>';
                                    } else {
                                        echo '<option value="">- Pilih -</option>';
                                    }

                                    $sql_kelas = mysqli_query($db, "SELECT * FROM tb_kelas") or die ($db->error);
                                    while($data_kelas = mysqli_fetch_array($sql_kelas)) {
                                        echo '<option value="'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Username *</label>
                                <input type="text" name="username" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Password *</label>
                                <input type="text" name="password" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="aktif">Aktif</option>
                                    <option value="tidak aktif">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                                <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Pilihan Mata Pelajaran</div>
                        <div class="panel-body">
                            <div class="row">
                                <?php
                                $sql = "SELECT * FROM tb_mapel";
                                $querySql = mysqli_query($db, $sql) or die($db->error);
                                while($data = mysqli_fetch_array($querySql))
                                {
                                    ?>
                                    <div class="col-md-4">
                                        <input type="checkbox" name="mapel[]" value="<?php echo $data['id_mapel']; ?>"/> <?php echo $data['nama_mapel']; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
        } else if(@$_GET['action'] == 'prosestambah') {
            $nis = @mysqli_real_escape_string($db, $_POST['nis']);
            $nama_siswa = @mysqli_real_escape_string($db, $_POST['nama_siswa']);
            $tempat_lahir = @mysqli_real_escape_string($db, $_POST['tempat_lahir']);
            $tgl_lahir = @mysqli_real_escape_string($db, $_POST['tgl_lahir']);
            $no_telp = @mysqli_real_escape_string($db, $_POST['no_telp']);
            $alamat = @mysqli_real_escape_string($db, $_POST['alamat']);
            $id_kelas = @mysqli_real_escape_string($db, $_POST['id_kelas']);
            $username = @mysqli_real_escape_string($db, $_POST['username']);
            $password = @mysqli_real_escape_string($db, $_POST['password']);
            $status = @mysqli_real_escape_string($db, $_POST['status']);

            $sumber = @$_FILES['gambar']['tmp_name'];
            $target = '../img/foto_siswa/';
            $nama_gambar = @$_FILES['gambar']['name'];

            if($nama_gambar != '') {
                if(move_uploaded_file($sumber, $target.$nama_gambar)) {
                    mysqli_query($db, "INSERT INTO tb_siswa VALUES(NULL, '$nis', '$nama_siswa', '$tempat_lahir', '$tgl_lahir', '$no_telp', '$alamat', '$id_kelas', '$nama_gambar', '$username', md5('$password'), '$password', '$status')") or die ($db->error);
                } else {
                    echo '<script>alert("Gagal menambah data siswa, foto gagal diupload, coba lagi!"); window.location="?page=manajemensiswa";</script>';
                }
            } else {
                mysqli_query($db, "INSERT INTO tb_siswa VALUES(NULL, '$nis', '$nama_siswa', '$tempat_lahir', '$tgl_lahir', '$no_telp', '$alamat', '$id_kelas', '$nama_gambar', '$username', md5('$password'), '$password', '$status')") or die ($db->error);
            }

            //Penambahan Mata Pelajaran Siswa
            $id_siswa = "";
            $sql = "SELECT id_siswa FROM tb_siswa WHERE nis = $nis";
            $querySql = mysqli_query($db, $sql) or die($db->error);
            while($data = mysqli_fetch_array($querySql))
            {
                $id_siswa = $data['id_siswa'];
                $lengthKelas = count($_POST['mapel']);
                for ($i = 0; $i < $lengthKelas; $i++)
                {
                    $sqlMapel = "INSERT INTO tb_detail_mapel VALUES (NULL, '$id_siswa','".@mysqli_real_escape_string($db, $_POST['mapel'][$i])."','1')";
                    $queryMapel = mysqli_query($db, $sqlMapel) or die($db->error);
                }
            }
            echo '<script>window.location="?page=manajemensiswa";</script>';
        } else if(@$_GET['action'] == 'edit') {
            ?>
            <form method="post" action="?page=manajemensiswa&action=prosesedit&id=<?php echo $data['id_siswa']; ?>" enctype="multipart/form-data">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Edit Data Siswa &nbsp; <a href="?page=manajemensiswa" class="btn btn-warning btn-sm">Kembali</a></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Foto</label>
                                <div style="padding:0 0 5px 0;"><img width="200px" src="../img/foto_siswa/<?php echo $data['foto']; ?>" /></div>
                                <input type="file" name="gambar" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>NIS *</label>
                                <input type="text" name="nis" value="<?php echo $data['nis']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap *</label>
                                <input type="text" name="nama_siswa" value="<?php echo $data['nama_siswa']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir *</label>
                                <input type="text" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir *</label>
                                <input type="date" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon *</label>
                                <input type="text" name="no_telp" value="<?php echo $data['no_telp']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Alamat *</label>
                                <textarea name="alamat" class="form-control" rows="3" required><?php echo $data['alamat']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <select name="id_kelas" class="form-control">
                                    <?php
                                    $sql2 = tampil_per_id("tb_kelas", "id_kelas = '$data[id_kelas]'");
                                    $data2 = mysqli_fetch_array($sql2);
                                    if(mysqli_num_rows($sql2) > 0) {
                                        echo '<option value="'.$data2['id_kelas'].'">'.$data2['nama_kelas'].'</option>';
                                        echo '<option value="">- Pilih -</option>';
                                    } else {
                                        echo '<option value="">- Pilih -</option>';
                                    }

                                    $sql_kelas = mysqli_query($db, "SELECT * FROM tb_kelas") or die ($db->error);
                                    while($data_kelas = mysqli_fetch_array($sql_kelas)) {
                                        echo '<option value="'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Username *</label>
                                <input type="text" name="username" value="<?php echo $data['username']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Password *</label>
                                <input type="text" name="password" value="<?php echo $data['pass']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="aktif">Aktif</option>
                                    <option value="tidak aktif" <?php if($data['status'] == 'tidak aktif') { echo "selected"; } ?>>Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                                <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Pilihan Mata Pelajaran</div>
                        <div class="panel-body">
                            <div class="row">
                                <?php
                                $dataArray = array();
                                $sqlMapel = "SELECT id_mapel FROM tb_detail_mapel WHERE id_siswa = '".$data['id_siswa']."'";
                                $queryMapel = mysqli_query($db, $sqlMapel) or die($db->error);
                                $i = 0;
                                while($dataMapel = mysqli_fetch_array($queryMapel))
                                {
                                    $dataArray[$i] = $dataMapel['id_mapel'];
                                    $i++;
                                }
                                $sql = "SELECT * FROM tb_mapel";
                                $querySql = mysqli_query($db, $sql) or die($db->error);
                                while($data = mysqli_fetch_array($querySql))
                                {
                                    ?>
                                    <div class="col-md-4">
                                        <input type="checkbox" name="mapel[]" value="<?php echo $data['id_mapel']; ?>" <?php echo(in_array($data['id_mapel'], $dataArray) == "true" ? "checked" : ""); ?>><?php echo $data['nama_mapel']; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
        } else if(@$_GET['action'] == 'prosesedit') {
            $nis = @mysqli_real_escape_string($db, $_POST['nis']);
            $nama_siswa = @mysqli_real_escape_string($db, $_POST['nama_siswa']);
            $tempat_lahir = @mysqli_real_escape_string($db, $_POST['tempat_lahir']);
            $tgl_lahir = @mysqli_real_escape_string($db, $_POST['tgl_lahir']);
            $no_telp = @mysqli_real_escape_string($db, $_POST['no_telp']);
            $alamat = @mysqli_real_escape_string($db, $_POST['alamat']);
            $id_kelas = @mysqli_real_escape_string($db, $_POST['id_kelas']);
            $username = @mysqli_real_escape_string($db, $_POST['username']);
            $password = @mysqli_real_escape_string($db, $_POST['password']);
            $status = @mysqli_real_escape_string($db, $_POST['status']);

            $sumber = @$_FILES['gambar']['tmp_name'];
            $target = '../img/foto_siswa/';
            $nama_gambar = @$_FILES['gambar']['name'];

            if($nama_gambar == '') {
                mysqli_query($db, "UPDATE tb_siswa SET nis = '$nis', nama_siswa = '$nama_siswa', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', no_telp = '$no_telp', alamat = '$alamat', id_kelas = '$id_kelas', username = '$username', password = md5('$password'), pass = '$password', status = '$status' WHERE id_siswa = '$id'") or die ($db->error);
            } else {
                if(move_uploaded_file($sumber, $target.$nama_gambar)) {
                    mysqli_query($db, "UPDATE tb_siswa SET nis = '$nis', nama_siswa = '$nama_siswa', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', no_telp = '$no_telp', alamat = '$alamat', id_kelas = '$id_kelas', username = '$username', password = md5('$password'), pass = '$password', status = '$status' WHERE id_siswa = '$id'") or die ($db->error);
                } else {
                    echo '<script>alert("Gagal mengedit data siswa, foto gagal diupload, coba lagi!"); window.location="?page=manajemensiswa";</script>';
                }
            }

            //Delete Data Mapel
            $arrayExisting[] = "";
            $sqlExisting = "SELECT id, id_mapel FROM tb_detail_mapel WHERE id_siswa = '".$data['id_siswa']."'";
            $queryExisting = mysqli_query($db, $sqlExisting) or die($db->error);
            $i = 0;
            while ($dataExisting = mysqli_fetch_array($queryExisting))
            {
                $arrayExisting[$i] = $dataExisting['id_mapel'];
                $i++;
            }

            $arrayNew[] = "";
            $j = 0;
            $lengtNewData = count($_POST['mapel']);
            for ($j = 0; $j < $lengtNewData; $j++)
            {
                if($_POST["mapel"][$j] != FALSE)
                {
                    $arrayNew[$j] = $_POST['mapel'][$j];
                }
            }

            $diff = array_diff($arrayExisting, $arrayNew);

            $deleteData[] = "";
            $l = 0;
            foreach ($diff as $key=>$value)
            {
                $deleteData[$l] = $value;
            }

            $lengthDeleteData = count($deleteData);
            for ($k = 0; $k < $lengthDeleteData; $k++)
            {
                $sqlDelete = "DELETE FROM tb_detail_mapel WHERE id_mapel='".$deleteData[$k]."' AND id_siswa ='".$data['id_siswa']."'";
                $queryDelete = mysqli_query($db, $sqlDelete) or die($db->error);
            }

            //Insert Data Mapel
            $id_siswa = $data['id_siswa'];
            $lengthKelas = count($_POST['mapel']);
            for ($i = 0; $i < $lengthKelas; $i++)
            {
                $resultCheck = 0;
                $sqlCheck = "SELECT count(id) as total FROM tb_detail_mapel WHERE id_siswa=$id_siswa AND id_mapel='".$_POST['mapel'][$i]."'";
                $querySqlCheck = mysqli_query($db, $sqlCheck) or die($db->error);
                while($dataCheck = mysqli_fetch_array($querySqlCheck))
                {
                    $resultCheck = $dataCheck['total'];
                }

                if($resultCheck == 0)
                {
                    $sqlMapel = "INSERT INTO tb_detail_mapel VALUES (NULL, '$id_siswa','".@mysqli_real_escape_string($db, $_POST['mapel'][$i])."','1')";
                    $queryMapel = mysqli_query($db, $sqlMapel) or die($db->error);
                }
            }

            echo '<script>window.location="?page=manajemensiswa";</script>';
        } else if(@$_GET['action'] == 'hapus') {
            mysqli_query($db, "DELETE FROM tb_siswa WHERE id_siswa = '$id'") or die ($db->error);
            echo '<script>window.location="?page=manajemensiswa";</script>';
        }
        ?>
    </div>

    <?php
} else if(@$_SESSION['pengajar']) { ?>
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Daftar Siswa</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="datasiswa">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>NIS</th>
                                <th>Nama Lengkap</th>
                                <th>Kelas</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $id = @$_SESSION['pengajar'];
                            $sql_siswa = mysqli_query($db, "SELECT * FROM tb_siswa JOIN tb_kelas_ajar ON tb_siswa.id_kelas = tb_kelas_ajar.id_kelas JOIN tb_kelas ON tb_kelas.id_kelas = tb_siswa.id_kelas WHERE tb_kelas_ajar.id_pengajar = '$id'") or die ($db->error);

                            if(mysqli_num_rows($sql_siswa) > 0) {
                                while($data_siswa = mysqli_fetch_array($sql_siswa)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data_siswa['nis']; ?></td>
                                        <td><?php echo $data_siswa['nama_siswa']; ?></td>
                                        <td><?php echo $data_siswa['nama_kelas']; ?></td>
                                        <td><?php echo $data_siswa['status']; ?></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6" align="center">Data tidak ditemukan</td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php
                        $query = "INSERT INTO tb_audit_trail VALUES ('', '".@$_SESSION['pengajar']."', 'Pengajar', 'Halaman Manajemen siswa', curdate())";
                        $sql = mysqli_query($db, $query) or die($db->error); ?>
                        <script>
                            $(document).ready(function () {
                                $('#datasiswa').dataTable();
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} ?>