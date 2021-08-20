<?php
@session_start();

if(@$_GET['sesi'] == 'admin') {
	@$_SESSION['admin'] = null;
	echo "<script>window.location='/admin';</script>";
} else if(@$_GET['sesi'] == 'author') {
	@$_SESSION['author'] = null;
	echo "<script>window.location='/admin';</script>";
}
?>