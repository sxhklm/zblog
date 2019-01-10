<?php
# Ads 配置文件

function Nobird_Theme_DefaultAds(){
	global $zbp,$bloghost;
//set config
	if(!$zbp->Config('Nobird_Theme_Ads')->HasKey('Version')){
		$zbp->Config('Nobird_Theme_Ads')->Version = '1.0';
		$zbp->Config('Nobird_Theme_Ads')->maildy = '<script >
var nId = "81415036e04e626074eaa1689dec8b2548f846a639022bfc",nWidth="auto",sColor="light",sText="填写您的邮件地址，订阅我们的精彩内容：" ;;
</script>
<script src="http://list.qq.com/zh_CN/htmledition/js/qf/page/qfcode.js" charset="gb18030"></script>';
		$zbp->Config('Nobird_Theme_Ads')->adunderarticle = '<img width="650" height="94" style="border:0px;" src="'.$bloghost.'zb_users/theme/Nobird_CMS_3/style/images/20140328020326938.jpg">';
		$zbp->Config('Nobird_Theme_Ads')->celanad1 = '<img width="320" height="180" style="border:0px;" src="'.$bloghost.'zb_users/theme/Nobird_CMS_3/style/images/20140520023949628.jpg" title=""></a>';
		$zbp->Config('Nobird_Theme_Ads')->celanad2 = '<a target="_blank" href="#"><img width="320" height="220" style="border:0px;" src="'.$bloghost.'zb_users/theme/Nobird_CMS_3/style/images/20140320104956734.jpg" title=""></a>';
		$zbp->Config('Nobird_Theme_Ads')->celanad3 = '<li style="margin-bottom:0"><img width="288" height="76" src="'.$bloghost.'zb_users/theme/Nobird_CMS_3/style/images/demo_04.jpg"></li>';
		$zbp->Config('Nobird_Theme_Ads')->dingyue = '<li><img src="'.$bloghost.'zb_users/theme/Nobird_CMS_3/style/images/ico_04.png"><a target="_blank" href="'.$bloghost.'feed.php">订阅RRS</a></li>
<li><img src="'.$bloghost.'zb_users/theme/Nobird_CMS_3/style/images/ico_05.png"><a target="_blank" href="http://weibo.com/">新浪微博</a></li>
<li style="padding:0;"><img src="'.$bloghost.'zb_users/theme/Nobird_CMS_3/style/images/ico_06.png"><a target="_blank" href="http://t.qq.com/">腾讯微博</a></li>';
		$zbp->Config('Nobird_Theme_Ads')->leftnav = '<a href="#">设为主页</a>
<a href="#">收藏本站</a>
<a href="#" target="_blank" >投稿说明</a>';
		$zbp->Config('Nobird_Theme_Ads')->rightnav = '<a href="#" target="_blank" >科技快报</a><a href="#" target="_blank" >联系我们</a><a href="#">手机版</a><a href="'.$bloghost.'feed.php">RSS</a>';
		$zbp->Config('Nobird_Theme_Ads')->share = '<li><a target="_blank" href="#"><img width="39" height="39" src="'.$bloghost.'zb_users/theme/Nobird_CMS_3/style/images/share_01.png" data-bd-imgshare-binded="1"></a></li>
<li><a target="_blank" href="#"><img width="39" height="39" src="'.$bloghost.'zb_users/theme/Nobird_CMS_3/style/images/share_02.png" data-bd-imgshare-binded="1"></a></li>
<li><a target="_blank" href="#"><img width="39" height="39" src="'.$bloghost.'zb_users/theme/Nobird_CMS_3/style/images/share_03.png" data-bd-imgshare-binded="1"></a></li>
<li><a target="_blank" href="#"><img width="39" height="39" src="'.$bloghost.'zb_users/theme/Nobird_CMS_3/style/images/share_04.png" data-bd-imgshare-binded="1"></a></li>
<li><a target="_blank" href="#"><img width="39" height="39" src="'.$bloghost.'zb_users/theme/Nobird_CMS_3/style/images/share_05.png" data-bd-imgshare-binded="1"></a></li>
<li><a target="_blank" href="#"><img width="39" height="39" src="'.$bloghost.'zb_users/theme/Nobird_CMS_3/style/images/share_06.png" data-bd-imgshare-binded="1"></a></li>';
		$zbp->Config('Nobird_Theme_Ads')->piclinks = '            <li><a href="#" target="_blank"><img src="'.$bloghost.'zb_users/theme/Nobird_CMS_3/style/images/20140111021318554.jpg" /></a></li>
            <li><a href="#" target="_blank"><img src="'.$bloghost.'zb_users/theme/Nobird_CMS_3/style/images/20140111020614388.jpg" /></a></li>
            <li><a href="#" target="_blank"><img src="'.$bloghost.'zb_users/theme/Nobird_CMS_3/style/images/20140111021318554.jpg" /></a></li>
            <li><a href="#" target="_blank"><img src="'.$bloghost.'zb_users/theme/Nobird_CMS_3/style/images/20140111020614388.jpg" /></a></li>';
		$zbp->Config('Nobird_Theme_Ads')->textlinks = '    <dt>媒体类：</dt>
        <dd><a href="http://opinion.hexun.com/" target="_blank">和讯评论</a> </dd>
        <dd><a href="http://news.jxgdw.com/jswp/" target="_blank">今视网评</a> </dd>';
		$zbp->Config('Nobird_Theme_Ads')->textlinks2 = '    <dt>互联网：</dt>
        <dd><a href="http://it.sohu.com/" target="_blank">搜狐IT</a> </dd>
        <dd><a href="http://www.sfw.cn" target="_blank">上方网</a> </dd>';
		$zbp->Config('Nobird_Theme_Ads')->footlink = '<a href="http://www.ikanchai.com/about/abouts.html" target="_blank" >关于我们</a> | <a href="http://www.ikanchai.com/about/contact.html" target="_blank" >联系我们</a> | <a href="http://www.ikanchai.com/about/report.html" target="_blank" >寻求报道</a> | <a href="http://www.ikanchai.com/about/tougao.html" target="_blank" >投稿说明</a> | <a href="http://www.ikanchai.com/about/ad.html" target="_blank" >广告合作</a>';
		$zbp->Config('Nobird_Theme_Ads')->footintro = '<p>本站介绍：自从2005年，Z-Blog第一版发布以来，从ASP版发展到ASP和PHP双版本，我们一直致力于为您提供更好的Blog程序。</p>';
				$zbp->Config('Nobird_Theme_Ads')->footleft = '<p>地址：广东·佛山·禅城区</p>
        <p>备案：粤ICP备12345678号</p>
        <p>顾问：天地律师事务所</p>';

		$zbp->SaveConfig('Nobird_Theme_Ads');
}
}
function Nobird_Theme_EmptyAds(){
	global $zbp;
//Delconfig
	$zbp->DelConfig('Nobird_Theme_Ads');
}



?>