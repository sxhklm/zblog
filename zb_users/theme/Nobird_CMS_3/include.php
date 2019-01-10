<?php
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'NBconfig.php';   //Default config
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'plugin/Ads/Ads_config.php'; // Use Ads
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'plugin/List/List_config.php'; // Use List
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'plugin/Slide/slide_config.php'; // Use slide
RegisterPlugin("Nobird_CMS_3","ActivePlugin_Nobird_CMS_3");

function ActivePlugin_Nobird_CMS_3(){
	Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu','Nobird_CMS_3_AddMenu');
	Add_Filter_Plugin('Filter_Plugin_PostArticle_Succeed','Nobird_CMS_3_Main'); //挂上list的更新接口
	Add_Filter_Plugin('Filter_Plugin_PostComment_Succeed','Nobird_Theme_Get_CommentsWithPic'); //挂上list的更新接口
}

function Nobird_CMS_3_AddMenu(&$m){
	global $zbp;
	$m[]=MakeTopMenu("root",'主题配置',$zbp->host . "zb_users/theme/".$GLOBALS['Nobird_Theme_Name']."/main.php","","topmenu_".$GLOBALS['Nobird_Theme_Name']."");

}

function Nobird_CMS_3_Main(){
    Nobird_Theme_UseList();
}

function InstallPlugin_Nobird_CMS_3(){
	global $zbp;

//Use Ads
    Nobird_Theme_DefaultAds();
//Use list
    Nobird_Theme_UseList();
    Nobird_Theme_DefaultSlide();

}




function UninstallPlugin_Nobird_CMS_3(){
	global $zbp;
if ($zbp->Config('Nobird_Theme_Ads')->uninstalldel==1){

//Del Ads
	Nobird_Theme_EmptyAds();
}
//UNstall List
  Nobird_Theme_UnList();
  Nobird_Theme_EmptySlide();
}


?>