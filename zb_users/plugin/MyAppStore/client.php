<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
require dirname(__FILE__) . '/function.php';
$zbp->Load();
$action = 'root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('MyAppStore')) {$zbp->ShowError(48);die();}

if (!$zbp->Config('MyAppStore')->username || !$zbp->Config('MyAppStore')->password) {
	$blogtitle = '十五楼网络应用终端-登录应用商城';
} else {
	$blogtitle = '十五楼网络应用终端-已购应用';
}

if (GetVars('act') == 'login') {
	$s = Server_Open('vaild');
	if ($s) {
		$zbp->Config('MyAppStore')->username = GetVars("app_username");
		$zbp->Config('MyAppStore')->password = $s;
		$zbp->SaveConfig('MyAppStore');
		$zbp->SetHint('good', '您已成功登录应用商城.');
		Redirect('./main.php');
		die;
	} else {
		$zbp->SetHint('bad', '用户名或密码错误.');
		Redirect('./client.php');
		die;
	}
}

if (GetVars('act') == 'logout') {
	$zbp->Config('MyAppStore')->username = '';
	$zbp->Config('MyAppStore')->password = '';
	$zbp->SaveConfig('MyAppStore');
	$zbp->SetHint('good', '您已退出十五楼网络.');
	Redirect('./client.php');
	die;
}

require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
?>
<div id="divMain">

  <div class="divHeader"><?php echo $blogtitle;?></div>
<div class="SubMenu"><?php MyAppStore_SubMenus(9);?></div>
  <div id="divMain2">
<?php if (!$zbp->Config('MyAppStore')->username) {?>
            <div class="divHeader2">十五楼网络应用终端账户登录</div>
            <form action="?act=login" method="post">
              <table style="line-height:3em;" width="100%" border="0">
                <tr height="32">
                  <th  align="center">账户登录
                    </td>
                </tr>
                <tr height="32">
                  <td  align="center">用户名:
                    <input type="text" name="app_username" value="" style="width:40%"/></td>
                </tr>
                <tr height="32">
                  <td  align="center">密&nbsp;&nbsp;&nbsp;&nbsp;码:
                    <input type="password" name="app_password" value="" style="width:40%" /></td>
                </tr>
                <tr height="32" align="center">
                  <td align="center"><input type="submit" value="登陆" class="button" /></td>
                </tr>
              </table>
            </form>
<?php } else {

//已登录
	Server_Open('shoplist');

}
?>
<div class="footer_bg">
  <div class="footer">
    <div class="footer_nav">
	  <p>©Copyright Birdol.Com. All Rights Reserved. </p>
      <p><a href='<?php echo $zbp->host;?>zb_users/plugin/MyAppStore/client.php?act=logout'>〖清理登录信息〗（如果看不到购买的应用点这里后重新登录。）</a></p>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(function() {
    $( "#dialog-message" ).dialog({
      autoOpen: false,
      modal: true,
      buttons: {
        Ok: function() {
          $( this ).dialog( "close" );
		  window.location.reload();
        }
      }
    });
  });
</script>
<div id="dialog-message" title="更新应用">
  <p>十五楼网络终端正在下载应用中，请稍候...</p>
</div>
<script>


	function installapp_new(id,adapted){
		if(adapted><?php echo $GLOBALS['blogversion'];?>){
			alert("用户当前ZBLOGPHP主程序版本太低,无法安装该应用.");
			return null;
		}
		$( "#dialog-message" ).dialog("open");
		$(".ui-dialog").find("button").hide();
		
    $.post(zbp.options.bloghost+"zb_users/plugin/MyAppStore/do/do_update.php?id="+id,
        "",
        function(data){
            switch(data.uid){
                case '0':
    			$(".ui-dialog").find("button").show();
    			$(".ui-dialog").find("p").html("您尚未登录更新服务账号或帐号密码不正确.");  
                  break;
                case '-1':
    			$(".ui-dialog").find("button").show();
    			$(".ui-dialog").find("p").html("您尚未购买该应用，请购买后再更新.");    
                  break;
                case '-2':
    			$(".ui-dialog").find("button").show();
    			$(".ui-dialog").find("p").html("用户当前十五楼网络应用终端版本太低,无法安装该应用.");    
                  break;  
                default:
    			$(".ui-dialog").find("button").show();
    			$(".ui-dialog").find("p").html("应用已下载及更新已完成.");
            }
        }, "json");
    



	}
</script>


	<script type="text/javascript">ActiveLeftMenu("aMyAppStore");</script>
	<script type="text/javascript">AddHeaderIcon("<?php echo $bloghost . 'zb_users/plugin/MyAppStore/logo.png';?>");</script>
  </div>
</div>

<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>