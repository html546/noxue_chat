<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/1/24
 * Time: 11:59
 */
function get($name){
    return isset($_GET[$name])?$_GET[$name]:"";
}
//得到前端输入的内容
function post($name){
    $text = isset($_POST[$name])?$_POST[$name]:"";
//    $text = str_replace('<','&lt',$text);
//    $text = str_replace('>','&gt',$text);
    $text = htmlspecialchars($text);
    $text = str_replace('\n','<br/>',$text);
    return $text;
}
function conn(){
    $dns = "mysql:host=localhost;dbname=chat";
    $db =  new PDO($dns,'root','root');
    $db -> exec('set names utf8');
    return $db;
}