<?php
if (isset($_POST['id'])) {
	$id = $_POST['id'];

	require_once ('database.php');
	$sql = 'delete from donhang where id = '.$id;
	execute($sql);

	echo 'Xoá đơn hàng thành công';
}