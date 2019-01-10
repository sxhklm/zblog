<?php
require '../../../../../zb_system/function/c_system_base.php';
require '../../../../../zb_system/function/c_system_admin.php';

$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin($GLOBALS['Nobird_Theme_Name'])) {$zbp->ShowError(48);die();}
$blogtitle="参数配置".$Nobird_Hello_Title;

$act = "";

require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';

if(isset($_POST['adunderarticle'])){
  $zbp->Config("Nobird_Theme_Ads")->maildy = $_POST['maildy'];
  $zbp->Config("Nobird_Theme_Ads")->adunderarticle = $_POST['adunderarticle'];
  $zbp->Config("Nobird_Theme_Ads")->celanad1 = $_POST['celanad1'];
  $zbp->Config("Nobird_Theme_Ads")->celanad2 = $_POST['celanad2'];
  $zbp->Config("Nobird_Theme_Ads")->celanad3 = $_POST['celanad3'];
  $zbp->Config("Nobird_Theme_Ads")->dingyue = $_POST['dingyue'];
  $zbp->Config("Nobird_Theme_Ads")->leftnav = $_POST['leftnav'];
  $zbp->Config("Nobird_Theme_Ads")->rightnav = $_POST['rightnav'];
  $zbp->Config("Nobird_Theme_Ads")->share = $_POST['share'];
  $zbp->Config("Nobird_Theme_Ads")->textlinks = $_POST['textlinks'];
  $zbp->Config("Nobird_Theme_Ads")->textlinks2 = $_POST['textlinks2'];
  $zbp->Config("Nobird_Theme_Ads")->piclinks = $_POST['piclinks'];
  $zbp->Config("Nobird_Theme_Ads")->footleft = $_POST['footleft'];
  $zbp->Config("Nobird_Theme_Ads")->footlink = $_POST['footlink'];
  $zbp->Config("Nobird_Theme_Ads")->footintro = $_POST['footintro'];
        $zbp->Config('Nobird_Theme_Ads')->uninstalldel=$_POST['uninstalldel'];

  $zbp->SaveConfig("Nobird_Theme_Ads");
  $zbp->ShowHint('good');
}
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
		<?php Nobird_Theme_SubMenu($act);?>
    </div>
	<div id="divMain2">
	  <form id="form1" name="form1" method="post">
    <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
  <tr>
    <th width="15%"><p align="center">配置名称</p></th>
    <th width="50%"><p align="center">配置内容</p></th>
  <th width="25%"><p align="center">配置说明</p></th>
  </tr>
    <tr>
    <td><label for="leftnav"><p align="center">顶部左侧导航</p></label></td>
    <td><p align="left"><textarea name="leftnav" type="text" id="leftnav" style="width:98%;"><?php echo $zbp->Config("Nobird_Theme_Ads")->leftnav;?></textarea></p></td>
  <td><p align="left">顶部左侧导航</p></td>
  </tr>
  <tr>
    <td><label for="rightnav"><p align="center">顶部右侧导航</p></label></td>
    <td><p align="left"><textarea name="rightnav" type="text" id="rightnav" style="width:98%;"><?php echo $zbp->Config("Nobird_Theme_Ads")->rightnav;?></textarea></p></td>
  <td><p align="left">顶部右侧导航</p></td>
  </tr>
      <tr>
    <td><label for="maildy"><p align="center">首页右上方邮件订阅代码（QQ列表提供）</p></label></td>
    <td><p align="left"><textarea name="maildy" type="text" id="maildy" style="width:98%;"><?php echo $zbp->Config("Nobird_Theme_Ads")->maildy;?></textarea></p></td>
  <td><p align="left">首页右上方邮件订阅代码（QQ列表提供）</p></td>
  </tr>
  
  
    <tr>
    <td><label for="dingyue"><p align="center">右侧栏订阅链接及微博链接</p></label></td>
    <td><p align="left"><textarea name="dingyue" type="text" id="dingyue" style="width:98%;"><?php echo $zbp->Config("Nobird_Theme_Ads")->dingyue;?></textarea></p></td>
  <td><p align="left">右侧栏订阅链接及微博链接</p></td>
  </tr>

  <tr>
    <td><label for="share"><p align="center">右侧栏分享代码</p></label></td>
    <td><p align="left"><textarea name="share" type="text" id="share" style="width:98%;"><?php echo $zbp->Config("Nobird_Theme_Ads")->share;?></textarea></p></td>
  <td><p align="left">右侧栏分享代码</p></td>
  </tr>
  <tr>
    <td><label for="adunderarticle"><p align="center">文章下方广告</p></label></td>
    <td><p align="left"><textarea name="adunderarticle" type="text" id="adunderarticle" style="width:98%;"><?php echo $zbp->Config("Nobird_Theme_Ads")->adunderarticle;?></textarea></p></td>
  <td><p align="left">文章下方广告</p></td>
  </tr> 
   <tr>
    <td><label for="celanad1"><p align="center">侧栏广告位1</p></label></td>
    <td><p align="left"><textarea name="celanad1" type="text" id="celanad1" style="width:98%;"><?php echo $zbp->Config("Nobird_Theme_Ads")->celanad1;?></textarea></p></td>
  <td><p align="left">侧栏广告位1</p></td>
  </tr>
  <tr>
    <td><label for="celanad2"><p align="center">侧栏广告位2</p></label></td>
    <td><p align="left"><textarea name="celanad2" type="text" id="celanad2" style="width:98%;"><?php echo $zbp->Config("Nobird_Theme_Ads")->celanad2;?></textarea></p></td>
  <td><p align="left">侧栏广告位2</p></td>
  </tr> 
   <tr>
    <td><label for="celanad3"><p align="center">侧栏广告位3</p></label></td>
    <td><p align="left"><textarea name="celanad3" type="text" id="celanad3" style="width:98%;"><?php echo $zbp->Config("Nobird_Theme_Ads")->celanad3;?></textarea></p></td>
  <td><p align="left">赞助我们</p></td>
  </tr>


   <tr>
    <td><label for="piclinks"><p align="center">首页底部 图片友情链接</p></label></td>
    <td><p align="left"><textarea name="piclinks" type="text" id="piclinks" style="width:98%;"><?php echo $zbp->Config("Nobird_Theme_Ads")->piclinks;?></textarea></p></td>
  <td><p align="left">首页底部 图片友情链接</p></td>
  </tr>
  <tr>
    <td><label for="textlinks"><p align="center">友情链接1</p></label></td>
    <td><p align="left"><textarea name="textlinks" type="text" id="textlinks" style="width:98%;"><?php echo $zbp->Config("Nobird_Theme_Ads")->textlinks;?></textarea></p></td>
  <td><p align="left">友情链接1</p></td>
  </tr> 
   <tr>
    <td><label for="textlinks2"><p align="center">友情链接2</p></label></td>
    <td><p align="left"><textarea name="textlinks2" type="text" id="textlinks2" style="width:98%;"><?php echo $zbp->Config("Nobird_Theme_Ads")->textlinks2;?></textarea></p></td>
  <td><p align="left">友情链接2</p></td>
  </tr>
  <tr>
    <td><label for="footleft"><p align="center">页面底部 左侧版权上方内容</p></label></td>
    <td><p align="left"><textarea name="footleft" type="text" id="footleft" style="width:98%;"><?php echo $zbp->Config("Nobird_Theme_Ads")->footleft;?></textarea></p></td>
  <td><p align="left">页面底部 右侧链接</p></td>
  </tr> 
  <tr>
    <td><label for="footlink"><p align="center">页面底部 右侧链接</p></label></td>
    <td><p align="left"><textarea name="footlink" type="text" id="footlink" style="width:98%;"><?php echo $zbp->Config("Nobird_Theme_Ads")->footlink;?></textarea></p></td>
  <td><p align="left">页面底部 右侧链接</p></td>
  </tr> 
   <tr>
    <td><label for="footintro"><p align="center">页面底部 本站介绍</p></label></td>
    <td><p align="left"><textarea name="footintro" type="text" id="footintro" style="width:98%;"><?php echo $zbp->Config("Nobird_Theme_Ads")->footintro;?></textarea></p></td>
  <td><p align="left">本站介绍</p></td>
  </tr>
<tr>
    <td><label for="uninstalldel"><p align="center">卸载时是否删除配置信息</p></label></td>
    <td><input name="uninstalldel" type="text" value="<?php echo $zbp->Config('Nobird_Theme_Ads')->uninstalldel; ?>" class="checkbox" style="display:none;" /></td>
  <td><p align="left">OFF表示不删除</p></td>
</tr>
<tr>
  	<td colspan="3">
  		<input name="" type="Submit" class="button" value="保存"/>
  	</td>
  </tr>
</table>
    </form>
	 <br />
	</div>
</div>
<script type="text/javascript">ActiveTopMenu("topmenu_".$GLOBALS['Nobird_Theme_Name']."");</script>
<script type="text/javascript">AddHeaderIcon("<?php echo $bloghost . 'zb_users/theme/'.$GLOBALS['Nobird_Theme_Name'].'/logo.png';?>");</script>
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>