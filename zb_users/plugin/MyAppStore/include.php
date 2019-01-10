<?php
#注册插件
RegisterPlugin("MyAppStore", "ActivePlugin_MyAppStore");
//define('MyAppStore_URL', 'https://www.birdol.com/client/');
define('MyAppStore_URL', 'http://www.birdol.com/client/');

//if(stripos($GLOBALS['bloghost'],'https://')!==false){


define('MyAppStore_PUBLIC_KEY','-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA3HYTjyOIzYnJtIl4M50l
aYgEQmRGeOQA+5H1Ze3Fgc7bbEc+DtJMAmwYaGR3+ULkL4c0m/KXXxujTgEfxGkk
fO7XI7Z0b1EWFm4M7IbXox6LaLU6mK4OK5nMWWyIyawYn0bdw6X/vaXEyzkDE8fP
ZGGPo5OydyZdTm47lXdCewyxk1CQ6nMs75u0mLjnDfsFXNiDx8hvXODnTSJKzb+C
154qg0uRXjaB2ylnhJKDcQCFAbg5uy0iRcrp7+CFG4qvk0c7d/xRRjqY/y3HI+o5
29/vvByD9KVXfWQQI6unfWfO1uEegXcgypHKHRmuyZoIDH7r56sleXKcN0OLesxp
zwIDAQAB
-----END PUBLIC KEY-----');

#定义版本号列
$zbpvers=array();
$zbpvers['130707']='1.0 Beta Build 130707';
$zbpvers['131111']='1.0 Beta2 Build 131111';
$zbpvers['131221']='1.1 Taichi Build 131221';
$zbpvers['140220']='1.2 Hippo Build 140220';
$zbpvers['140614']='1.3 Wonce Build 140614';
$zbpvers['150101']='1.4 Deeplue Build 150101';
$zbpvers['151626']='1.5 Zero Build 151626';
$zbpvers['151740']='1.5.1 Zero Build 151740';
$zbpvers['151910']='1.5.2 Zero Build 151910';

if(!isset($zbpvers[$GLOBALS['blogversion']])){
    if(defined('ZC_VERSION_FULL'))
    	$zbpvers[$GLOBALS['blogversion']] = ZC_VERSION_FULL;
    else
    	$zbpvers[$GLOBALS['blogversion']] = ZC_BLOG_VERSION;
}

function ActivePlugin_MyAppStore() {
	global $zbp;
	Add_Filter_Plugin('Filter_Plugin_Admin_SiteInfo_SubMenu', 'MyAppStore_AddSiteInfoMenu');
	Add_Filter_Plugin('Filter_Plugin_Admin_LeftMenu', 'MyAppStore_AddMenu');
	//Add_Filter_Plugin('Filter_Plugin_CSP_Backend', 'MyAppStore_ChangeSCP');

  $zbp->LoadLanguage('plugin', 'MyAppStore');
}

function MyAppStore_ChangeSCP(&$csp){
    global $zbp;
    $urls = " *.birdol.com";
    $items = array('default-src', 'img-src', 'script-src', 'style-src');
    foreach ($items as $item) {
        if (isset($csp[$item])) {
            $csp[$item] .= $urls;
        }
    } 
    
}

function MyAppStore_AddMenu(&$m) {
	global $zbp;
	$m['nav_MyAppStore'] = MakeLeftMenu("root", '应用商城', $zbp->host . "zb_users/plugin/MyAppStore/main.php", "nav_MyAppStore_AddMenu", "aMyAppStore_AddMenu", $zbp->host . "zb_users/plugin/MyAppStore/images/Cube1.png");
}

function InstallPlugin_MyAppStore() {
	global $zbp;
	$zbp->Config('MyAppStore')->enabledcheck = 1;
	$zbp->Config('MyAppStore')->checkbeta = 0;
	$zbp->Config('MyAppStore')->enabledevelop = 0;
	$zbp->Config('MyAppStore')->enablegzipapp = 0;
	$zbp->SaveConfig('MyAppStore');
}


function MyAppStore_AddSiteInfoMenu() {
	global $zbp;
	if ($zbp->Config('MyAppStore')->enabledcheck) {
		$last = (int) $zbp->Config('MyAppStore')->lastchecktime;
		if ((time() - $last) > 11 * 60 * 60) {
			echo "<script type='text/javascript'>$(document).ready(function(){  $.getScript('{$zbp->host}zb_users/plugin/MyAppStore/main.php?method=checksilent&rnd='); });</script>";
			$zbp->Config('MyAppStore')->lastchecktime = time();
			$zbp->SaveConfig('MyAppStore');
		}
	}
}



function MyAppStore_Get_Cookies(){
	global $zbp;

    $MyAppStore = new App();
    $MyAppStore->LoadInfoByXml('plugin', 'MyAppStore');

	$c = '';
	$un = $zbp->Config('MyAppStore')->username;
	$ps = $zbp->Config('MyAppStore')->password;
	$c .= ' apptype=' . urlencode($zbp->Config('MyAppStore')->apptype) . '; ';
	$c .= ' app_guestver=' . urlencode($MyAppStore->version) . '; ';
	$c .= ' app_host=' . urlencode($zbp->host) . '; ';
	$c .= ' app_email=' . urlencode($zbp->user->Email) . '; ';
	$c .= ' app_user=' . urlencode($zbp->user->Name) . '; ';
	$c .= ' app_appcentre_user=' . urlencode($zbp->Config('AppCentre')->username) . '; ';
	 
	if ($un && $ps) {
		$c .= "username=" . urlencode($un) . "; password=" . urlencode($ps);
	}

	$shopun = $zbp->Config('MyAppStore')->shop_username;
	$shopps = $zbp->Config('MyAppStore')->shop_password;
	if ($shopun && $shopps) {
		$c .= "; shop_username=" . urlencode($shopun) . "; shop_password=" . urlencode($shopps);
	}
	return $c;
}

function MyAppStore_Get_UserAgent(){
	global $zbp;
    $app = $zbp->LoadApp('plugin', 'MyAppStore');
    $pv = strpos(phpversion(), '-')===false? phpversion() : substr(phpversion(),0,strpos(phpversion(), '-'));
	if(isset($GLOBALS['blogversion'])) {
		$u = 'ZBlogPHP/' . $GLOBALS['blogversion'] . ' MyAppStore/'. $app->modified . 'PhpVer/' . $pv . ' ' . GetGuestAgent();
	}
	else {
		$u = 'ZBlogPHP/' . substr(ZC_BLOG_VERSION, -6, 6) . ' MyAppStore/'. $app->modified . 'PhpVer/' . $pv . ' ' . GetGuestAgent();
	}
	return $u;
}

function MyAppStore_Check_App_IsBuy($appid,$throwerror=true){
	global $zbp;
	$ajax = Network::Create();

	$url = str_replace('http://','https://',MyAppStore_URL) . '?checkbuy';
	$c = MyAppStore_Get_Cookies();
	$u = MyAppStore_Get_UserAgent();

	$appid = $appid;
	$username = $zbp->Config('MyAppStore')->username;
	$password = $zbp->Config('MyAppStore')->password;
	$host = $zbp->host;

	$data = array();

	$data['appid'] = $appid;
	$data['host'] = $zbp->host;

	$data['includefilehash'] = file_get_contents($zbp->path . 'zb_users/plugin/MyAppStore/include.php');
	$data['includefilehash'] = md5(str_replace(array('\r','\n'), '', $data['includefilehash']));


	$pu_key = openssl_pkey_get_public(MyAppStore_PUBLIC_KEY);

	$encrypted = '';
	openssl_public_encrypt(implode('|',$data),$encrypted,$pu_key);//公钥加密  
	$encrypted = base64_encode($encrypted);  
	$data = array();
	$data['info'] = $encrypted;

	$ajax->open('POST', $url);
	//$ajax->enableGzip();
	$ajax->setTimeOuts(120, 120, 0, 0);
	$ajax->setRequestHeader('User-Agent', $u);
	$ajax->setRequestHeader('Cookie', $c);
	$ajax->setRequestHeader('Website',$zbp->host);
	$ajax->send($data);


	$encrypted = $ajax->responseText;
	openssl_public_decrypt(base64_decode($encrypted),$decrypted,$pu_key);//公钥解密

	if(md5($zbp->Config('MyAppStore')->username . 'ok') == $decrypted){
		return true;
	}else{
		if($throwerror == true){
			$zbp->ShowError($decrypted);
			die();
		}else{
			return false;
		}
	}

	return false;

}