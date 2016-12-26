<?php
require 'vendor/autoload.php';
//配置缓存
$config = [
	'file' => [ 'dir' => 'storage/cache' ]
];
\houdunwang\config\Config::set( 'cache', $config );
//数据库
\houdunwang\config\Config::set( 'database', [
	//读库列表
	'read'     => [ ],
	//写库列表
	'write'    => [ ],
	//表字段缓存目录
	'cacheDir' => 'storage/field',
	//开启读写分离
	'proxy'    => false,
	//主机
	'host'     => 'localhost',
	//类型
	'driver'   => 'mysql',
	//帐号
	'user'     => 'root',
	//密码
	'password' => 'admin888',
	//数据库
	'database' => 'demo',
	//表前缀
	'prefix'   => ''
] );
$config = [
	'size' => 2,//分卷大小 单位KB
	'dir'  => 'backup/' . date( "Ymdhis" ),//备份目录
];
//\houdunwang\backup\Backup::backup( $config, function ( $result ) {
//	if ( $result['status'] == 'run' ) {
//		echo $result['message'];
//		echo "<script>setTimeout(function(){location.href='{$_SERVER['REQUEST_URI']}'},1000);</script>";
//	} else {
//		echo $result['message'];
//	}
//} );
$dirs = \houdunwang\backup\Backup::getBackupDir( 'backup' );
print_r( $dirs );
//$config = [
//	'dir' => 'backup/20161227124128'
//];
//\houdunwang\backup\Backup::recovery( $config, function ( $result ) {
//	if ( $result['status'] == 'run' ) {
//		echo $result['message'];
//		echo "<script>setTimeout(function(){location.href='{$_SERVER['REQUEST_URI']}'},1000);</script>";
//	} else {
//		echo $result['message'];
//	}
//} );
