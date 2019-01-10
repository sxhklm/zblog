<?php

function MyAppStore_SubMenus($id) {
	//m-now
	global $zbp;
	echo '<a href="main.php"><span class="m-left ' . ($id == 1 ? 'm-now' : '') . '">在线应用</span></a>';
	echo '<a href="main.php?method=check"><span class="m-left ' . ($id == 2 ? 'm-now' : '') . '">检查更新</span></a>';

	if ($zbp->Config('MyAppStore')->username && $zbp->Config('MyAppStore')->password) {
		echo '<a href="client.php"><span class="m-left ' . ($id == 9 ? 'm-now' : '') . '">已购应用</span></a>';
	} else {
		echo '<a href="client.php"><span class="m-left ' . ($id == 9 ? 'm-now' : '') . '">登录</span></a>';
	}
}

function MyAppStore_GetCheckQueryString() {
	global $zbp;
	$check = '';
	$app = new app;
	if ($app->LoadInfoByXml('theme', $zbp->theme) == true) {
		$check .= $app->id . ':' . $app->modified . ';';
	}
	foreach (explode('|', $zbp->option['ZC_USING_PLUGIN_LIST']) as $id) {
		$app = new app;
		if ($app->LoadInfoByXml('plugin', $id) == true) {
			$check .= $app->id . ':' . $app->modified . ';';
		}
	}
	return $check;
}
function Server_Open($method) {
	global $zbp, $blogversion;

	switch ($method) {
	case 'down':
		Add_Filter_Plugin('Filter_Plugin_Zbp_ShowError', 'ScriptError', PLUGIN_EXITSIGNAL_RETURN);
		header('Content-type: application/x-javascript; Charset=utf-8');
		ob_clean();
		$s = Server_SendRequest(MyAppStore_URL . '?&down=' . GetVars('id', 'GET'));
		if(strlen($s)<100){die($s);}
		if (App::UnPack($s)) {
			$zbp->SetHint('good', '下载APP并解压安装成功!');
		}
		;
		die('{"err":"ok"}');
		break;
	case 'search':
		if (trim(GetVars('q', 'GET')) == '') {
			continue;
		}
        $page=GetVars('page','GET');
		$s = Server_SendRequest(MyAppStore_URL . '?search=' . urlencode(GetVars('q', 'GET')).'&page='.$page);
		echo str_replace('%bloghost%', $zbp->host . 'zb_users/plugin/MyAppStore/main.php', $s);
		break;
	case 'view':
		$s = Server_SendRequest(MyAppStore_URL . '?' . GetVars('QUERY_STRING', 'SERVER'));
		if (strpos($s, '<!--developer-nologin-->') !== false) {
			if ($zbp->Config('MyAppStore')->username || $zbp->Config('MyAppStore')->password) {
				$zbp->Config('MyAppStore')->username = '';
				$zbp->Config('MyAppStore')->password = '';
				$zbp->SaveConfig('MyAppStore');
			}
		}
		if (strpos($s, '<!--shop-nologin-->') !== false) {
			if ($zbp->Config('MyAppStore')->shop_username || $zbp->Config('MyAppStore')->shop_password) {
				$zbp->Config('MyAppStore')->shop_username = '';
				$zbp->Config('MyAppStore')->shop_password = '';
				$zbp->SaveConfig('MyAppStore');
			}
		}
		if (strpos($s, 'www.birdol.com') === false) {
			$zbp->ShowHint('bad', '后台访问应用商城故障，不能登录和下载应用，请检查主机空间是否能远程访问 www.birdol.com。');
		}

		echo str_replace('%bloghost%', $zbp->host . 'zb_users/plugin/MyAppStore/main.php', $s);
		break;
	case 'check':
		$s = Server_SendRequest(MyAppStore_URL . '?check=' . urlencode(MyAppStore_GetCheckQueryString())) . '';
		echo str_replace('%bloghost%', $zbp->host . 'zb_users/plugin/MyAppStore/main.php', $s);
		break;
	case 'checksilent':
		header('Content-type: application/x-javascript; Charset=utf-8');
		ob_clean();
		$s = Server_SendRequest(MyAppStore_URL . '?blogsilent=1' . ($zbp->Config('MyAppStore')->checkbeta ? '&betablog=1' : '') . '&check=' . urlencode(MyAppStore_GetCheckQueryString())) . '';
		if (strpos($s, ';') !== false) {
			$newversion = substr($s, 0, 6);
			$s = str_replace(($newversion . ';'), '', $s);
			if ((int) $newversion > (int) $blogversion) {
				echo '$(".main").prepend("<div class=\'hint\'><p class=\'hint hint_tips\'>提示:Z-BlogPHP有新版本,请用APP应用中心插件的<a href=\'../../zb_users/plugin/MyAppStore/update.php\'>“系统更新与校验”</a>升级' . $newversion . '版(' . ($zbp->Config('MyAppStore')->checkbeta ? 'Beta' : '') . ').</p></div>");';
			}
		}
		if ($s != 0) {
			echo '$(".main").prepend("<div class=\'hint\'><p class=\'hint hint_tips\'>提示:有' . $s . '个应用需要更新,请在应用中心的<a href=\'../../zb_users/plugin/MyAppStore/main.php?method=check\'>“检查应用更新”</a>页升级.</p></div>");';
		}
		die();
		break;
	case 'vaild':
		$data = array();
		$data["username"] = GetVars("app_username");
		$data["password"] = md5(GetVars("app_password"));
		$s = Server_SendRequest(MyAppStore_URL . '?vaild', $data);
		return $s;
		break;
	case 'shopvaild':
		$data = array();
		$data["shop_username"] = GetVars("shop_username");
		$data["shop_password"] = md5(GetVars("shop_password"));
		$s = Server_SendRequest(MyAppStore_URL . '?shopvaild', $data);
		return $s;
		break;
	case 'shoplist':
		$s = Server_SendRequest(MyAppStore_URL . '?shoplist');
		echo str_replace('%bloghost%', $zbp->host . 'zb_users/plugin/MyAppStore/main.php', $s);
		break;
	case 'apptype':
		$zbp->Config('MyAppStore')->apptype = GetVars("type");
		$zbp->SaveConfig('MyAppStore');
		Redirect('main.php');
		break;
	default:
		# code...
		break;
	}

}

function Server_SendRequest($url, $data = array(), $u = '', $c = '') {
	global $zbp;
	$c = MyAppStore_Get_Cookies();
	$u = MyAppStore_Get_UserAgent();
	return Server_SendRequest_Network($url, $data, $u, $c);
}

function Server_SendRequest_Network($url, $data = array(), $u, $c) {
	global $zbp;

	$ajax = Network::Create();
	if (!$ajax) {
		throw new Exception('主机没有开启访问外部网络功能');
	}

	if ($data) {
//POST
		$ajax->open('POST', $url);
		$ajax->enableGzip();
		$ajax->setTimeOuts(120, 120, 0, 0);
		$ajax->setRequestHeader('User-Agent', $u);
		$ajax->setRequestHeader('Cookie', $c);
		$ajax->setRequestHeader('Website',$zbp->host);
		if(isset($_SERVER['HTTP_ACCEPT']))
			$ajax->setRequestHeader('Accept',$_SERVER['HTTP_ACCEPT']);
		$ajax->send($data);
	} else {
		$ajax->open('GET', $url);
		$ajax->enableGzip();
		$ajax->setTimeOuts(120, 120, 0, 0);
		$ajax->setRequestHeader('User-Agent', $u);
		$ajax->setRequestHeader('Cookie', $c);
		$ajax->setRequestHeader('Website',$zbp->host);
		if(isset($_SERVER['HTTP_ACCEPT']))
			$ajax->setRequestHeader('Accept',$_SERVER['HTTP_ACCEPT']);
		$ajax->send();
	}

	return $ajax->responseText;
}
function MyAppStore_GetHttpContent($url) {
		return GetHttpContent($url);
}