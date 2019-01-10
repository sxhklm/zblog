<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';

$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin($zbp->theme)) {$zbp->ShowError(48);die();}
$blogtitle="首页".$Nobird_Hello_Title;

$act = "";

require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';

?>

<style>
input.color{padding:0}
input.sedit{ width:93%;}
table input{margin:0.25em 0;}
table input.text{padding: 2px 5px;}
table .button{padding: 2px 12px 5px 12px; margin: 0.25em 0;}
.tc{border: solid 2px #E1E1E1;width: 50px;height: 23px;float: left;margin: 0.25em;cursor: pointer}
.tc:hover,.active{border: 2px solid #2694E8;}
.upinfo{position: relative;left: 3px;top: -19px;color: white;background: #5EAAE4;width: 190px;height: 23px;display: inline-block;text-align: center;opacity: 0.8;filter: alpha(opacity=80);}
.imageshow{margin:0.25em 0;}.imageshow img{margin:0 10px;margin-bottom:-10px;}
.divHeader { background-position:0 11px !important; }
</style>


<div id="divMain">
	<div class="divHeader"><?php echo $blogtitle;?></div>
	<div class="SubMenu">
		<?php Nobird_Theme_SubMenu();?>
    </div>
	<div id="divMain2">

    <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
     <tr height="32"><td>温馨提示：</td></tr>
     <tr height="32"><td style="color:#F00">        1、本页面是主题插件设置页面，请谨慎操作；</td></tr>
     <tr height="32"><td>       2、配置不当可能会造成网站内容的错位；</td></tr>
     <tr height="32"><td>       3、如有宝贵意见还望提出，将在下一版中进行修订；</td></tr>
     <tr height="32"><td>       </td></tr>
     <tr height="32"><td>       </td></tr>
     <tr height="32"><td>       </td></tr>
     <tr height="32"><td>       主题作者：Nobird。主页：<a href="http://www.birdol.com" target="_blank">鸟儿博客</a></td></tr>
     <tr height="32"><td>       如果在使用过程中有什么问题，请到作者主页进行反馈。</td></tr>
     <tr height="32"><td>       收费主题(大于100元)快速解决问题的方法：联系QQ：8769298，竭诚为您服务。</td></tr> 
  </tr>
</table>
   
 <br />
	</div>
</div>
<script type="text/javascript">ActiveTopMenu("topmenu_Nobird_CMS_1");</script>
<script type="text/javascript">AddHeaderIcon("<?php echo $bloghost . 'zb_users/theme/'.$zbp->theme.'/logo.png';?>");</script>
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>