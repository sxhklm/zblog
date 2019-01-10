<?php
# List 配置文件

$Nobird_List_Data = array('new','hot','comm','rand');
//$Nobird_List_Cata=$zbp->Config('Nobird_Theme_List')->CateOfList;
$Nobird_List_Cata = explode(",", $zbp->Config('Nobird_Theme_List')->CateOfList);

function Nobird_Theme_Get_Link($type,$num){
	global $zbp,$str,$order;
	$str = '';
	if($type=='new'){
		$order = array('log_PostTime'=>'DESC');
	}
	if($type=='hot'){
		$order = array('log_ViewNums'=>'DESC');
	}
	if($type=='comm'){
		$order = array('log_CommNums'=>'DESC');
	}
	if($type=='rand'){
		$order = array('log_CommNums'=>'DESC');
	}
	$where = array(array('=','log_Status','0'));
	$array = $zbp->GetArticleList(array('*'),$where,$order,array($num),'');
	foreach ($array as $article) {
		$str .= "<li><span ";
		if (date("m-d")==$article->Time('m-d')) {
		$str .="class=\"red\"";
		}
		$str .=">{$article->Time('m-d')}&nbsp;</span>&nbsp;<a href=\"{$article->Url}\" title=\"{$article->Title}\">{$article->Title}</a></li>";
	}
	@file_put_contents($zbp->usersdir . 'theme/'.$GLOBALS['Nobird_Theme_Name'].'/include/'.$GLOBALS['Nobird_Theme_Name'].'_'.$type.'.php', $str);
}

function Nobird_Theme_Get_List($cate){ //获取某个分类的文章列表
	global $zbp,$str,$order;
	$str = '';
	$cates = new Category;
  $cates->LoadInfoByID($cate);
	$arrays=GetList(8,$cate);
	$str .='<div class="newsbox">
			<div class="tt"><h2 class="ico_3"><a target="_blank" title="'.$cates->Name.'" href="'.$cates->Url.'">'.$cates->Name.'</a></h2><a target="_blank" href="'.$cates->Url.'" class="more">»更多</a></div><ul>';
	foreach ($arrays as $article) {
	$str .='<li><span ';
	if (date("m-d")==$article->Time('m-d')) {
	$str .='class="red"';
	}
	$str .=">{$article->Time('m-d')}&nbsp;</span>&nbsp;<a href=\"{$article->Url}\" title=\"{$article->Title}\">{$article->Title}</a></li>";
}
  $str .='</ul></div>';
	@file_put_contents($zbp->usersdir . 'theme/'.$GLOBALS['Nobird_Theme_Name'].'/include/'.$GLOBALS['Nobird_Theme_Name'].'_List.php', $str,FILE_APPEND);

}
function Nobird_Theme_GetListAll(){
	global $zbp;
//想不出什么好办法...就这么清空吧... zx不要怪我...
@file_put_contents($zbp->usersdir . 'theme/'.$GLOBALS['Nobird_Theme_Name'].'/include/'.$GLOBALS['Nobird_Theme_Name'].'_List.php', '');

foreach ($GLOBALS['Nobird_List_Cata'] as $cate) {
    Nobird_Theme_Get_List($cate);
}

}


function Nobird_Theme_Get_Tags(){
	global $zbp,$str;
	$str = '';
	$array = $zbp->GetTagList('','',array('tag_Count'=>'DESC'),array(10),'');
	foreach ($array as $tag) {
		$str .= "<a href=\"{$tag->Url}\" title=\"{$tag->Name}\">{$tag->Name}</a>";
	}
	@file_put_contents($zbp->usersdir . 'theme/'.$GLOBALS['Nobird_Theme_Name'].'/include/'.$GLOBALS['Nobird_Theme_Name'].'_tags.php', $str);
}


function Nobird_Theme_Get_BGColor_Tags(){
	global $zbp,$str;
	$str = '';
	$i = $zbp->modulesbyfilename['tags']->MaxLi;
	if ($i == 0) $i = 30;
	$array = $zbp->GetTagList('','',array('tag_Count'=>'DESC'),array($i),'');
	foreach ($array as $tag) {
	$color1 = '#'.sprintf('%02X',rand(0,255)).sprintf('%02X',rand(0,255)).sprintf('%02X',rand(0,255));	
	$str .= "<span style=\"background-color:".$color1.";\"><a href=\"{$tag->Url}\" title=\"{$tag->Name}\">{$tag->Name}</a></span>";
	}
	@file_put_contents($zbp->usersdir . 'theme/'.$GLOBALS['Nobird_Theme_Name'].'/include/'.$GLOBALS['Nobird_Theme_Name'].'_BGColor_tags.php', $str);
}


function Nobird_Theme_cutTitle($string,$length)
{
    $result= preg_replace('/[\r\n\s]+/', '', trim(SubStrUTF8(TransferHTML($string,'[nohtml]'),$length)).'...');
    return $result;
}

function Nobird_Theme_Get_CommentsWithPic(){
	global $zbp;
	$i = $zbp->modulesbyfilename['comments']->MaxLi;
	if ($i == 0) $i = 10;
	$array = $zbp->GetCommentList('*', array(array('=', 'comm_IsChecking', 0)), array('comm_PostTime' => 'DESC'), $i, null);

	$s = '';
	foreach ($array as $comment) {
  $nobirdcauthor = $comment->Author->StaticName;
  $nobirdccontent = $comment->Content;
  $nobirdccontentend = Nobird_Theme_cutTitle($nobirdccontent,"50");
	
    $s .= '<li class="clearfix"><div class="user"> <img width="72" height="72" src="'.$comment->Author->Avatar.'"> </div><div class="info"><h3><a href="' . $comment->Post->Url . '#cmt' . $comment->ID . '" title="' . htmlspecialchars($comment->Author->StaticName . ' @ ' . $comment->Time()) . '">' . $nobirdcauthor . '</a></h3><p>'.$nobirdccontentend.'</p></div></li>';

	}
	@file_put_contents($zbp->usersdir . 'theme/'.$GLOBALS['Nobird_Theme_Name'].'/include/'.$GLOBALS['Nobird_Theme_Name'].'_CommentsWithPic.php', $s);
}


function Nobird_Theme_Get_Content($str){//暂时还没用上这函数...Orz...
	global $zbp;
	$strContent = @file_get_contents($zbp->usersdir . $str);
	echo $strContent;
}



function Nobird_Theme_UseList(){
	global $zbp;
		if(!$zbp->Config('Nobird_Theme_List')->HasKey('Version')){
		$zbp->Config('Nobird_Theme_List')->Version = '1.0';
		$zbp->Config('Nobird_Theme_List')->CateOfList = '1,2,3,4,5,6,7,8,9,10';
			$zbp->SaveConfig('Nobird_Theme_List');
}
	
	$num = 10;
	foreach ($GLOBALS['Nobird_List_Data'] as $value) {
		Nobird_Theme_Get_Link($value,$num);
	}

    Nobird_Theme_GetListAll();
    Nobird_Theme_Get_CommentsWithPic();
    Nobird_Theme_Get_BGColor_Tags();
}



function Nobird_Theme_UnList(){
	global $zbp;
//Delconfig
	$zbp->DelConfig('Nobird_Theme_List');
	foreach ($GLOBALS['Nobird_List_Data'] as $value) {
		@unlink($zbp->usersdir . 'theme/'.$GLOBALS['Nobird_Theme_Name'].'/include/'.$GLOBALS['Nobird_Theme_Name'].'_'.$value.'.php');
	}

	@unlink($zbp->usersdir . 'theme/'.$GLOBALS['Nobird_Theme_Name'].'/include/'.$GLOBALS['Nobird_Theme_Name'].'_BGColor_tags.php');
	@unlink($zbp->usersdir . 'theme/'.$GLOBALS['Nobird_Theme_Name'].'/include/'.$GLOBALS['Nobird_Theme_Name'].'_tags.php');
	@unlink($zbp->usersdir . 'theme/'.$GLOBALS['Nobird_Theme_Name'].'/include/'.$GLOBALS['Nobird_Theme_Name'].'_CommentsWithPic.php');
	@unlink($zbp->usersdir . 'theme/'.$GLOBALS['Nobird_Theme_Name'].'/include/'.$GLOBALS['Nobird_Theme_Name'].'_List.php');

}



?>