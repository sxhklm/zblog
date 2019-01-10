<?php
require '../../../zb_system/function/c_system_base.php';

require '../../../zb_system/function/c_system_admin.php';

require dirname(__FILE__) . '/function.php';

$zbp->Load();

$action = 'root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}

if (!$zbp->CheckPlugin('MyAppStore')) {$zbp->ShowError(48);die();}

$blogtitle = '十五楼网络--应用终端';


Add_Filter_Plugin('Filter_Plugin_CSP_Backend', 'MyAppStore_ChangeSCP');

require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';
?>
<div id="divMain">

  <div class="divHeader"><?php echo $blogtitle;?></div>
<div class="SubMenu"><?php MyAppStore_SubMenus(GetVars('method', 'GET') == 'check' ? 2 : 1);?></div>
  <div id="divMain2">

<?php
$method = GetVars('method', 'GET');
if (!$method) {
	$method = 'view';
}

Server_Open($method);
?>
	<script type="text/javascript">
		window.plug_list = "<?php echo AddNameInString($option['ZC_USING_PLUGIN_LIST'], $option['ZC_BLOG_THEME'])?>";
		window.signkey = '<?php echo $zbp->GetToken()?>';
	</script>

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
function installapp(id){
	$( "#dialog-message" ).dialog("open");
	$(".ui-dialog").find("button").hide();
	$.getScript(zbp.options.bloghost+"zb_users/plugin/MyAppStore/do/do_update.php?id="+id,function(){
		$(".ui-dialog").find("button").show();
		$(".ui-dialog").find("p").html("应用已下载完成,请在插件或主题管理界面开启应用.");
	});
}


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