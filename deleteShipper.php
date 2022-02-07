<?php
if (isset($_POST['id'])) {
	$id = $_POST['id'];

	require_once ('database.php');
	$sql = 'delete from shipper where id = '.$id;
	execute($sql);

	echo 'Xoá shipper thành công';
}