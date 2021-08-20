<?php
@session_start();
include "../../koneksi.php";

$user = @mysqli_real_escape_string($db, $_POST['user']);
$pass = @mysqli_real_escape_string($db, $_POST['pass']);

$sql = mysqli_query($db, "SELECT * FROM m_user WHERE username = '$user' AND password = md5('$pass')") or die ($db->error);
$cek = mysqli_num_rows($sql);
$data = mysqli_fetch_array($sql);
if($cek > 0) {
	echo "sukses";
	@$_SESSION['admin'] = $data['id_user'];
} else {
	$sql2 = mysqli_query($db, "SELECT * FROM m_user WHERE username = '$user' AND password = md5('$pass')") or die ($db->error);
	$data2 = mysqli_fetch_array($sql2);
	$cek2 = mysqli_num_rows($sql2);
	if($cek2 > 0) {
		if($data2['status'] == 'aktif') {
			echo "sukses";
			@$_SESSION['author'] = $data2['id_user'];
		} else {
			echo "akun tidak aktif";
		}
	} else {
		echo "gagal";
	}
}
?>