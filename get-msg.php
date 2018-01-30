<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/1/29
 * Time: 11:40
 */

require_once "tool.php";
$db = conn();
$id = get('id');
$sql = 'select * from noxue_chat where id>:id';

$stmt = $db->prepare($sql);
$stmt -> execute([':id'=>$id]);
header('Content-Type:application/json');
echo json_encode($stmt->fetchAll());
