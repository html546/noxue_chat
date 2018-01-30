<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/1/29
 * Time: 15:07
 */

//用于获取当前信息的最大id，用于第一次进入的时候判断要从哪个信息开始获取

require_once "tool.php";
$sql = 'select id from noxue_chat order by id desc limit 0,1';
$db= conn();
$stmt = $db->prepare($sql);
$stmt ->execute();
$res = $stmt->fetch();

?>

var last_id=<?=$res['id']?>;
