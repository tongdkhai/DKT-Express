<?php
if(!isset($_COOKIE['admin']))
{
  header("location: login.php");
}
if (isset($_POST['id'])) {
	$id = $_POST['id'];

	require_once ('database.php');
    $query = 'select * from shipper where nhacungcap_id = '.$id;
    $ahippers = executeResult($query);
    if ($shippers != null && count($pshippers) > 0) {
        echo 'Xoá nhà cung cấp không thành công';
        die();
    }

	$sql = 'delete from nhacungcap where id = '.$id;
	execute($sql);

	echo 'Xoá nhà cung cấp thành công';
}