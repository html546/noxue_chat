<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/1/29
 * Time: 9:31
 */
//print_r($_POST);
require_once "tool.php";
$nickname = post('nickname');
$msg = post('msg');
header('Content-type: application/json');
if($msg == ''){
    echo json_encode(['code'=>-2,'msg'=>'聊天信息不能为空，谢谢!']);
    exit;
}
$db = conn();
$sql = 'insert into noxue_chat(nickname,msg)VALUES (:nickname,:msg)';
$stmt = $db -> prepare($sql);
$stmt -> execute([':nickname'=>$nickname,':msg'=>$msg]);
if($db->lastInsertId()>0){
    echo json_encode(['code'=>0,'msg'=>'ok']);
    exit;
}else{
    echo json_encode(['code'=>-1,'msg'=>'failed']);
    exit;
}
