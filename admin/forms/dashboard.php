<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Dashboard Kepengajaran
        </h1>
    </div>
</div>
                
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success">
            Selamat datang <?php echo "<u>".$data_terlogin['nama_user']."</u> di Halaman "; cek_session("<b><i>Administrator</i></b>", "<b><i>Pengajar/ Tentor</i></b>"); ?>
        </div>
    </div>
</div>
<?php
if(@$_SESSION['admin']) {
    
    if(@$_GET['hal'] == '') { ?>
    <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-green">
                <div class="panel-body">
                    <i class="fa fa-bar-chart-o fa-5x"></i>
                    <h3>
                        <?php
                        $sql_pengajar = mysqli_query($db, "SELECT * FROM tb_pengajar") or die ($db->error);
                        echo mysqli_num_rows($sql_pengajar);
                        ?>
                    </h3>
                </div>
                <div class="panel-footer back-footer-green">Data Pengajar</div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-brown">
                <div class="panel-body">
                    <i class="fa fa-users fa-5x"></i>
                    <h3>
                        <?php
                        $sql_siswa = mysqli_query($db, "SELECT * FROM tb_siswa") or die ($db->error);
                        echo mysqli_num_rows($sql_siswa);
                        ?>
                    </h3>
                </div>
                <div class="panel-footer back-footer-brown">Data Siswa</div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-red">
                <div class="panel-body">
                    <i class="fa fa fa-comments fa-5x"></i>
                    <h3>
                        <?php
                        $sql_quiz = mysqli_query($db, "SELECT * FROM tb_topik_quiz") or die ($db->error);
                        echo mysqli_num_rows($sql_quiz);
                        ?>
                    </h3>
                </div>
                <div class="panel-footer back-footer-red">Ujian/ Test</div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-blue">
                <div class="panel-body">
                    <i class="fa fa-book fa-5x"></i>
                    <h3>
                        <?php
                        $sql_materi = mysqli_query($db, "SELECT * FROM tb_file_materi") or die ($db->error);
                        echo mysqli_num_rows($sql_materi);
                        ?>
                    </h3>
                </div>
                <div class="panel-footer back-footer-blue">Materi</div>
            </div>
        </div>
    </div>
    <?php
    } else if(@$_GET['hal'] == 'editprofil') {
        $sql_admin = mysqli_query($db, "SELECT * FROM tb_admin WHERE id_admin = '$_SESSION[admin]'") or die ($db->error);
        $data = mysqli_fetch_array($sql_admin);
        ?>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Profil &nbsp; <a href="./" class="btn btn-warning btn-sm">Kembali</a></div>
                    <div class="panel-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Lengkap *</label>
                                <input type="text" name="nama_lengkap" value="<?php echo $data['nama_lengkap']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Alamat *</label>
                                <textarea name="alamat" class="form-control" rows="3" required><?php echo $data['alamat']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon *</label>
                                <input type="text" name="no_telp" value="<?php echo $data['no_telp']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="<?php echo $data['email']; ?>" class="form-control" />
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
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-success" />
                                <input type="reset" class="btn btn-danger" value="Reset" />
                            </div>
                        </form>
                        <?php
                        if(@$_POST['simpan']) {
                            $nama_lengkap = @mysqli_real_escape_string($db, $_POST['nama_lengkap']);
                            $alamat = @mysqli_real_escape_string($db, $_POST['alamat']);
                            $no_telp = @mysqli_real_escape_string($db, $_POST['no_telp']);
                            $email = @mysqli_real_escape_string($db, $_POST['email']);
                            $username = @mysqli_real_escape_string($db, $_POST['username']);
                            $password = @mysqli_real_escape_string($db, $_POST['password']);

                            mysqli_query($db, "UPDATE tb_admin SET nama_lengkap = '$nama_lengkap', alamat = '$alamat', no_telp = '$no_telp', email = '$email', username = '$username', password = md5('$password'), pass = '$password' WHERE id_admin = '$_SESSION[admin]'") or die ($db->error);          
                            echo '<script>window.location="./";</script>';
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }

} else if(@$_SESSION['pengajar']) {

    $sql_pengajar = mysqli_query($db, "SELECT * FROM tb_pengajar WHERE id_pengajar = '$_SESSION[pengajar]'") or die ($db->error);
    $data = mysqli_fetch_array($sql_pengajar);
    
    if(@$_GET['hal'] == '') { ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Detail Profil Anda &nbsp; <a href="?hal=editprofil" class="btn btn-warning btn-sm">Edit Profil</a></div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table width="100%">
                                <tr>
                                    <td align="right" width="46%"><b>NIP</b></td>
                                    <td align="center">:</td>
                                    <td width="46%"><?php echo $data['nip']; ?></td>
                                </tr>
                                <tr>
                                    <td align="right"><b>Nama Lengkap</b></td>
                                    <td align="center">:</td>
                                    <td><?php echo $data['nama_lengkap']; ?></td>
                                </tr>
                                <tr>
                                    <td align="right"><b>Tempat Tanggal Lahir</b></td>
                                    <td align="center">:</td>
                                    <td><?php echo $data['tempat_lahir'].", ".tgl_indo($data['tgl_lahir']); ?></td>
                                </tr>
                                <tr>
                                    <td align="right"><b>Jenis Kelamin</b></td>
                                    <td align="center">:</td>
                                    <td><?php if($data['jenis_kelamin'] == 'L') { echo "Laki-laki"; } else { echo "Perempuan"; } ?></td>
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
                                    <td align="right"><b>Jabatan</b></td>
                                    <td align="center">:</td>
                                    <td><?php echo $data['jabatan']; ?></td>
                                </tr>
                                <tr>
                                    <td align="right" valign="top"><b>Foto</b></td>
                                    <td align="center" valign="top">:</td>
                                    <td>
                                        <div style="padding:10px 0;"><img width="250px" src="../admin/img/foto_pengajar/<?php echo $data['foto']; ?>" /></div>
                                    </td>
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
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else if(@$_GET['hal'] == 'editprofil') { ?>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Profil &nbsp; <a href="./" class="btn btn-warning btn-sm">Kembali</a></div>
                    <div class="panel-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>NIP *</label>
                                <input type="text" name="nip" value="<?php echo $data['nip']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap *</label>
                                <input type="text" name="nama_lengkap" value="<?php echo $data['nama_lengkap']; ?>" class="form-control" required />
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
                                <label>Jenis Kelamin *</label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="L">Laki-laki</option>
                                    <option value="P" <?php if($data['jenis_kelamin'] == 'P') { echo "selected"; } ?>>Perempuan</option>
                                </select>
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
                                <label>Foto</label>
                                <div style="padding:0 0 5px 0;"><img width="200px" src="../admin/img/foto_pengajar/<?php echo $data['foto']; ?>" /></div>
                                <input type="file" name="gambar" class="form-control" />
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
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-success" />
                                <input type="reset" class="btn btn-danger" value="Reset" />
                            </div>
                        </form>
                        <?php
                        if(@$_POST['simpan']) {
                            $nip = @mysqli_real_escape_string($db, $_POST['nip']);
                            $nama_lengkap = @mysqli_real_escape_string($db, $_POST['nama_lengkap']);
                            $tempat_lahir = @mysqli_real_escape_string($db, $_POST['tempat_lahir']);
                            $tgl_lahir = @mysqli_real_escape_string($db, $_POST['tgl_lahir']);
                            $jenis_kelamin = @mysqli_real_escape_string($db, $_POST['jenis_kelamin']);
                            $no_telp = @mysqli_real_escape_string($db, $_POST['no_telp']);
                            $alamat = @mysqli_real_escape_string($db, $_POST['alamat']);
                            $username = @mysqli_real_escape_string($db, $_POST['username']);
                            $password = @mysqli_real_escape_string($db, $_POST['password']);

                            $sumber = @$_FILES['gambar']['tmp_name'];
                            $target = 'img/foto_pengajar/';
                            $nama_gambar = @$_FILES['gambar']['name'];

                            if($nama_gambar == '') {
                                mysqli_query($db, "UPDATE tb_pengajar SET nip = '$nip', nama_lengkap = '$nama_lengkap', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', no_telp = '$no_telp', alamat = '$alamat', username = '$username', password = md5('$password'), pass = '$password' WHERE id_pengajar = '$_SESSION[pengajar]'") or die ($db->error);
                                echo '<script>window.location="./";</script>';
                            } else {
                                if(move_uploaded_file($sumber, $target.$nama_gambar)) {
                                    mysqli_query($db, "UPDATE tb_pengajar SET nip = '$nip', nama_lengkap = '$nama_lengkap', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', no_telp = '$no_telp', alamat = '$alamat', foto = '$nama_gambar', username = '$username', password = md5('$password'), pass = '$password' WHERE id_pengajar = '$_SESSION[pengajar]'") or die ($db->error);
                                    echo '<script>window.location="./";</script>';
                                } else {
                                    echo '<script>alert("Gagal mengedit info profil, foto gagal diupload, coba lagi!");</script>';
                                }
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
} ?>