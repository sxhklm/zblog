<?php
require '../../../zb_system/function/c_system_base.php';
$zbp->Load();
ob_clean();
header('Content-Type: application/x-javascript; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate');
if (!$zbp->ValidToken(GetVars('token', 'GET'),'AppCentre_JS')) {$zbp->ShowError(5, __FILE__, __LINE__);die();}
$t = '&token=' . $zbp->GetToken('AppCentre');
?>

$(document).ready(function(){ 

$("#divMain2").prepend("<form class='search' name='edit' id='edit' method='post' enctype='multipart/form-data' action='"+bloghost+"zb_users/plugin/AppCentre/app_upload.php'><p>本地上传并安装主题zba文件:&nbsp;<input type='file' id='edtFileLoad' name='edtFileLoad' size='40' />&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' class='button' value='提交' name='B1' />&nbsp;&nbsp;<?php echo "<input id='token' name='token' type='hidden' value='".$zbp->GetToken('AppCentre')."'/>"?>
<input class='button' type='reset' value='重置' name='B2' />&nbsp;</p></form>");



$(".theme").each(function(){
	var t=$(this).find("strong").html();
	var s="<p>";

	if(app_enabledevelop){

	s=s+"<a class=\"button\" href='"+bloghost+"zb_users/plugin/AppCentre/theme_edit.php?id="+t+"<?php echo $t?>' title='编辑该主题信息'><img height='16' width='16' src='"+bloghost+"zb_users/plugin/AppCentre/images/application_edit.png'/></a>&nbsp;&nbsp;&nbsp;&nbsp;";

	s=s+"<a class=\"button\" href='"+bloghost+"zb_users/plugin/AppCentre/app_pack.php?type=theme&id="+t+"<?php echo $t?>' title='导出该主题' target='_blank'><img height='16' width='16' src='"+bloghost+"zb_users/plugin/AppCentre/images/download.png'/></a>&nbsp;&nbsp;&nbsp;&nbsp;";

	}

	if($(this).hasClass("theme-now")){
		s=s+"<a class=\"button\" href='"+bloghost+"zb_system/admin/module_edit.php?source=theme' title='给该主题增加侧栏模块'><img height='16' width='16' src='"+bloghost+"zb_users/plugin/AppCentre/images/bricks.png'/></a>&nbsp;&nbsp;&nbsp;&nbsp;";
	}


	if($(this).hasClass("theme-other")){
		s=s+"<a class=\"button\" href='"+bloghost+"zb_users/plugin/AppCentre/app_del.php?type=theme&id="+t+"<?php echo $t?>' title='删除该主题' onclick='return window.confirm(\"单击“确定”继续。单击“取消”停止。\");'><img height='16' width='16' src='"+bloghost+"zb_users/plugin/AppCentre/images/delete.png'/></a>&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	if(app_enabledevelop&&app_username){
		s=s+"<a class=\"button\" href='"+bloghost+"zb_users/plugin/AppCentre/submit.php?type=theme&amp;id="+t+"<?php echo $t?>' title='上传应用到官方网站应用中心' target='_blank'><img height='16' width='16' src='"+bloghost+"zb_users/plugin/AppCentre/images/drive-upload.png'/></a>";
	}

	s=s+"</p>";
	$(this).append(s);
	
});

});