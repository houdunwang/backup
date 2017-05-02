<?php

namespace tests;
header("Content-type:text/html;charset=utf8");
include '../vendor/autoload.php';
use houdunwang\backup\Backup;
use houdunwang\config\Config;

Config::loadFiles('../config');
$config = [
    'size' => 2,//分卷大小单位KB
    'dir'  => 'backup/'.date("Ymdhis"),//备份目录
];
$obj    = new Backup();
$status = $obj->backup(
    $config,
    function ($result) {
        if ($result['status'] == 'run') {
            //备份进行中
            echo $result['message'];
            //刷新当前页面继续下次
            echo "<script>setTimeout(function(){location.href='{$_SERVER['REQUEST_URI']}'},1000);</script>";
        } else {
            //备份执行完毕
            echo $result['message'];
        }
    }
);
if ($status === false) {
    //备份过程出现错误
    echo $obj->getError();
}