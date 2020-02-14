<?php
require_once '../model/operation_class.php';
session_start();

$id_user = $_SESSION['id_user'];

$list = Operation::currentList($id_user);

$_SESSION['listOpeCurrent'] = $list;

header('location: ../view/endOpe.php');

?>