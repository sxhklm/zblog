<?php
$Nobird_Theme_Name="Nobird_CMS_3";//换到不同的主题的时候  改改这里就行了
$Nobird_Hello_Title=" - ".$GLOBALS['Nobird_Theme_Name']." - Nobird为您提供的主题配置功能";


function Nobird_Theme_SubMenu(){
	global $zbp,$bloghost;
$url = $_SERVER['PHP_SELF'];
$filename1 = explode('/',$url);
$filename = end($filename1);
//echo $filename; // use filename ,judgment focus
		echo '<a href="'.$bloghost.'zb_users/theme/'.$GLOBALS['Nobird_Theme_Name'].'/main.php"><span class="m-left ' . ($filename=='main.php'?'m-now':'') . '">首页</span></a>';
		echo '<a href="'.$bloghost.'zb_users/theme/'.$GLOBALS['Nobird_Theme_Name'].'/plugin/Ads/Ads_main.php"><span class="m-left ' . ($filename=='Ads_main.php'?'m-now':'') . '">广告&参数配置</span></a>';
		echo '<a href="'.$bloghost.'zb_users/theme/'.$GLOBALS['Nobird_Theme_Name'].'/plugin/Upload/upload_main.php"><span class="m-left ' . ($filename=='upload_main.php'?'m-now':'') . '">图片设置</span></a>';
		echo '<a href="'.$bloghost.'zb_users/theme/'.$GLOBALS['Nobird_Theme_Name'].'/plugin/Slide/slide_main.php"><span class="m-left ' . ($filename=='slide_main.php'?'m-now':'') . '">幻灯片管理</span></a>';
		echo '<a href="http://www.birdol.com/" target="_blank"><span class="m-left" style="color:#F00">帮助</span></a>';
}



?>