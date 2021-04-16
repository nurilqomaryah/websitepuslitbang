<?php
include('konekdb.php');
session_start();

$sql = "SELECT * FROM pegawai WHERE username_pegawai = '".$_POST['username']."' AND PASSWORD_pegawai = MD5('".$_POST['password']."')";
$query = mysql_query($sql) or die(mysql_error());
$result = mysql_fetch_array($query);
$jumlahpegawai = mysql_num_rows($query);
$statuskoneksi = array();

if($jumlahpegawai === 0){

    header("Location: http://localhost/psifix/?loginStatus=error");
}

if($jumlahpegawai === 1){
    $sql = "SELECT * FROM otoritas o INNER JOIN pegawai p ON p.id_otoritas = o.id_otoritas WHERE p.username_pegawai = '".$_POST['username']."' AND p.password_pegawai = MD5('".$_POST['password']."')";
    $query = mysql_query($sql) or die(mysql_error());
    $otoritas = "";
    while($rowPegawai = mysql_fetch_array($query)){
        $_SESSION['id_pegawai'] = $result[0];
        $otoritas = $rowPegawai[1];
    }
    header("Location: http://localhost/psifix/".strtolower($otoritas)."/home".strtolower($otoritas).".php");
}
?>