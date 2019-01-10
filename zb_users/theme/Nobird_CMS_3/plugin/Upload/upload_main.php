<?php
require '../../../../../zb_system/function/c_system_base.php';
require '../../../../../zb_system/function/c_system_admin.php';

$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin($zbp->theme)) {$zbp->ShowError(48);die();}
$blogtitle="图片设置".$Nobird_Hello_Title;

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
		<?php Nobird_Theme_SubMenu($act);?>
    </div>
	<div id="divMain2">
<form enctype="multipart/form-data" method="post" action="save.php?type=base">  
    <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
  <tr>
    <td width="15%"><label for="logo.png"><p align="center">上传LOGO图片尺寸大约309×73左右</p></label></td>
    <td width="50%"><p align="center"><input name="logo.png" type="file"/></p></td>
  <td width="25%"><p align="center"><input name="" type="Submit" class="button" value="保存"/></p></td>
  </tr>
</table>
    </form>
<form enctype="multipart/form-data" method="post" action="save.php?type=qrcode">  
    <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
  <tr>
    <td width="15%"><label for="qrcode.png"><p align="center">上传网站右下角二维码图片</p></label></td>
    <td width="50%"><p align="center"><input name="qrcode.png" type="file"/></p></td>
  <td width="25%"><p align="center"><input name="" type="Submit" class="button" value="保存"/></p></td>
  </tr>
</table>
    </form>
   <br />
	</div>
</div>
<script type="text/javascript">ActiveTopMenu("topmenu_".$zbp->theme."");</script>
<script type="text/javascript">AddHeaderIcon("<?php echo $bloghost . 'zb_users/theme/'.$zbp->theme.'/logo.png';?>");</script>
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>