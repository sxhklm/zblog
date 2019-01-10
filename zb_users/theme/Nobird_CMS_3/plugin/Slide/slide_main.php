<?php

require '../../../../../zb_system/function/c_system_base.php';
require '../../../../../zb_system/function/c_system_admin.php';

$zbp->Load();

if (!$zbp->CheckRights('root')) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin($zbp->theme)) {$zbp->ShowError(48);die();}


$blogtitle="幻灯管理".$Nobird_Hello_Title;

require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';


if(isset($_POST['UseSlide'])){
		$zbp->Config('Nobird_Theme_Ads')->UseSlide = $_POST['UseSlide']; //是否启用
    $zbp->SaveConfig("Nobird_Theme_Ads");
    $zbp->ShowHint('good');
}

?>

<div id="divMain">
<div class="divHeader"><?php echo $blogtitle;?></div>
<div class="SubMenu">
		<?php Nobird_Theme_SubMenu();?>
</div>
 <form id="form1" name="form1" method="post">
    <table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
  <tr>
    <th width="15%"><p align="center">配置名称</p></th>
    <th width="50%"><p align="center">配置内容</p></th>
  <th width="25%"><p align="center">配置说明</p></th>
  </tr>
</table>
    </form>
<?php
        $str = '<form action="save_line.php?type=flash" method="post">
                <table width="100%" border="1" class="tableBorder">
                <tr>
                    <th scope="col" width="5%" height="32" nowrap="nowrap">序号</th>
                    <th scope="col" width="25%">标题</th>
                    <th scope="col" width="25%">图片</th>
                    <th scope="col" width="25%">链接</th>
                    <th scope="col" width="5%">排序</th>
                    <th scope="col" width="5%">显示</th>
                    <th scope="col" width="10%">操作</th>
                </tr>';
        $str .= '<tr>';
        $str .= '<td align="center">0</td>';
        $str .= '<td><input type="text" class="sedit" name="title" value=""></td>';
        $str .= '<td><input type="text" class="sedit" name="img" value=""></td>';
        $str .= '<td><input type="text" class="sedit" name="url" value=""></td>';
        $str .= '<td><input type="text" name="order" value="99" style="width:40px"></td>';
        $str .= '<td><input type="text" class="checkbox" name="IsUsed" value="1" /></td>';
        $str .= '<td><input type="hidden" name="editid" value="">
                        <input name="add" type="submit" class="button" value="增加"/></td>';
        $str .= '</tr>';
        $str .= '</form>';
        $where = array(array('=','t_Type','0'));
        $order = array('t_IsUsed'=>'DESC','t_Order'=>'ASC');
        $sql= $zbp->db->sql->Select($Nobird_Slide_Table,'*',$where,$order,null,null);
        $array=$zbp->GetListCustom($Nobird_Slide_Table,$Nobird_Slide_DataInfo,$sql);
        $i =1;
        foreach ($array as $key => $reg) {
            $str .= '<form action="save_line.php?type=flash" method="post" name="flash">';
            $str .= '<tr>';
            $str .= '<td align="center">'.$i.'</td>';
            $str .= '<td><input type="text" class="sedit" name="title" value="'.$reg->Title.'" ></td>';
            $str .= '<td><input type="text" class="sedit" name="img" value="'.$reg->Img.'" ></td>';
            $str .= '<td><input type="text" class="sedit" name="url" value="'.$reg->Url.'" ></td>';
            $str .= '<td><input type="text" class="sedit" name="order" value="'.$reg->Order.'" style="width:40px"></td>';
            $str .= '<td><input type="text" class="checkbox" name="IsUsed" value="'.$reg->IsUsed.'" /></td>';
            $str .= '<td nowrap="nowrap">
                        <input type="hidden" name="editid" value="'.$reg->ID.'">
                        <input name="edit" type="submit" class="button" value="修改"/>
                        <input name="del" type="button" class="button" value="删除" onclick="if(confirm(\'您确定要进行删除操作吗？\')){location.href=\'save_line.php?type=flashdel&id='.$reg->ID.'\'}"/>
                    </td>';
            $str .= '</tr>';
            $str .= '</form>';
            $i++;
        }
        $str .='</table>';
        echo $str;
?>


 <div id="divMain2">
<script type="text/javascript">ActiveTopMenu("topmenu_".$zbp->theme."");</script>
<script type="text/javascript">AddHeaderIcon("<?php echo $bloghost . 'zb_users/theme/'.$zbp->theme.'/logo.png';?>");</script>
</div>
</div>
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>