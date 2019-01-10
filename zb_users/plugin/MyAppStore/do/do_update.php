<?php
require '../../../../zb_system/function/c_system_base.php';
require '../../../../zb_users/plugin/MyAppStore/function.php';
$zbp->Load();
$action = 'root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('MyAppStore')) {$zbp->ShowError(48);die();}
//$id=GetVars('id','GET');
$s=Server_Open('down');
$s=str_replace('<a href="'.$zbp->host,'<a href="'.'%bloghost%',$s);
echo $s;