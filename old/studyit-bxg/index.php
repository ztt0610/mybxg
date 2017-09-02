<?php
 // 路由：根据URL的不同导航到不同的页面
  
  // var_dump($_SERVER);
  // 判断数组中是否包含指定属性 array_key_exists('PATH_INFO',$_SERVER)

  /*
  规定好URL格式，从而方便页面的导航
  /main/index
  /main/login
  /tercher/list
  */
$dir="main";//默认文件目录名称
$filename="login";//默认文件名称
//判断路径是否存在
if(array_key_exists('PATH_INFO',$_SERVER)){
	//获取url路径
	$path = $_SERVER['PATH_INFO'];
	//去掉url中第一个斜杠
	$str=substr($path, 1);
	// 以/分割文件目录和名称 转化为数组
	$arr=explode( "/",$str);
	if(count($arr)==2){
		//覆盖文件目录
		$dir=$arr[0];
		//覆盖文件名称
		$filename=$arr[1];
	}else{
		//跳转login页面
		$filename="login";
	}

}
//在当前页面嵌入另一个页面（子页面）
include("./views/".$dir."/".$filename.".html");
?>