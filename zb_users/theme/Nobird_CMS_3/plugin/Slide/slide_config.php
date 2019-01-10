<?php
# Slide 幻灯片 config文件

$DEFALUT_FLASH="5qyi6L+O5L2/55SoTm9iaXJk5Li65oKo5o+Q5L6b55qEQ01T5Li76aKYfGh0dHA6Ly93d3cuaWthbmNoYWkuY29tL3VwbG9hZGZpbGUvMjAxNC8wODA0LzIwMTQwODA0MDU0MzM2NzIxLmpwZ3xodHRwOi8vd3d3LmJpcmRvbC5jb20v";
$Nobird_Slide_Table='%pre%Nobird_slide';
$Nobird_Slide_DataInfo=array(
    'ID'=>array('t_ID','integer','',0),
    'Type'=>array('t_Type','integer','',0),
    'Title'=>array('t_Title','string',255,''),
    'Url'=>array('t_Url','string',255,''),
    'Img'=>array('t_Img','string',255,''),
    'Order'=>array('t_Order','integer','',99),
    'Code'=>array('t_Code','string',255,''),
    'IsUsed'=>array('t_IsUsed','boolean','',true),
    'Intro'=>array('t_Intro','string',255,''),
    'Addtime'=>array('t_Addtime','integer','',0),
    'Endtime'=>array('t_Endtime','integer','',0),
);

function Nobird_Slide_Get_Flash($Nobird_Slide_Table,$Nobird_Slide_DataInfo){
    global $zbp;
    $where = array(array('=','t_Type','0'),array('=','t_IsUsed','1'));
    $order = array('t_IsUsed'=>'DESC','t_Order'=>'ASC');
    $sql= $zbp->db->sql->Select($Nobird_Slide_Table,'*',$where,$order,null,null);
    $array=$zbp->GetListCustom($Nobird_Slide_Table,$Nobird_Slide_DataInfo,$sql);
    $str = "";

    foreach ($array as $key => $reg) {
        $str .= "<li><a href='".$reg->Url."' title='".$reg->Title."' target='_blank'><img alt='".$reg->Title."' src='".$reg->Img."'/></a></li>\n";
     //$str .= '<img src="'.$reg->Img.'" alt="'.$reg->Title.'" /></li>';
    }

    @file_put_contents($zbp->usersdir . 'theme/'.$zbp->theme.'/include/slide.php', $str);  
}

// install   include this file, then creattable & defaultcode
// uninstall  funtion EmptyCode
function Nobird_Slide_CreateTable(){
	global $zbp;
	$s=$zbp->db->sql->CreateTable($GLOBALS['Nobird_Slide_Table'],$GLOBALS['Nobird_Slide_DataInfo']);
	$zbp->db->QueryMulit($s);
}

function Nobird_Slide_DefaultCode(){
	global $zbp;
	$Arr_DF = explode('|',base64_decode($GLOBALS['DEFALUT_FLASH']));
	$r = new Base($GLOBALS['Nobird_Slide_Table'],$GLOBALS['Nobird_Slide_DataInfo']);
	$r->Title=$Arr_DF[0];
	$r->Img=$Arr_DF[1];
	$r->Url=$Arr_DF[2];
	$r->Save();
	$s = new Base($GLOBALS['Nobird_Slide_Table'],$GLOBALS['Nobird_Slide_DataInfo']);
	$s->Type=99;
	$s->Code='';
	$s->Save();
}

function Nobird_Theme_DefaultSlide(){
	global $zbp;
// all of above
		Nobird_Slide_CreateTable();
		Nobird_Slide_DefaultCode();	
}



function Nobird_Theme_EmptySlide(){
	global $zbp;
	$s=$zbp->db->sql->DelTable($GLOBALS['Nobird_Slide_Table']);
	$zbp->db->QueryMulit($s);
	//Delconfig
	$zbp->DelConfig('Nobird_Slide_Config');
	@unlink($zbp->usersdir . 'theme/'.$GLOBALS['Nobird_Theme_Name'].'/include/slide.php');

}


?>