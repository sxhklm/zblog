{template:header}
</head>
<body>
<div class="wrapper-outer">
<div class="topBar">
  <div class="wrapper">
    <div class="t-fl"> {$zbp->Config('Nobird_Theme_Ads')->leftnav} </div>
    <div class="t-fr"> {$zbp->Config('Nobird_Theme_Ads')->rightnav} </div>
  </div>
</div>
<!--topBar end-->
<div class="header wrapper clearfix">
  <div class="logo"><a href="{$host}"><img src="{$host}zb_users/theme/Nobird_CMS_3/style/images/logo.png" alt="{$name}" /></a></div>
  <div class="search-fr">
    <div class="ah_nav_zuo_lim">
      <form action="{$host}search.php" target="_blank">
      <input name="q" onblur="if(this.value==''){this.value='请输入关键字';}" onfocus="if(this.value=='请输入关键字'){this.value=''}" class="seach_cha" type="text">
      <input value="搜索" class="seach_dian" type="submit">
      </form>
    </div>
    <div class="contribute"> <a href="#" title="投稿"></a> </div>
  </div>
</div>
<!--header end-->
<div class="wrapper">
<div class="navbar clearfix">
  <div class="pull-left"> 
    <!--nav begin-->
    <div class="navbg">
      <div class="col960">
        <ul id="navul" class="cl">
        {module:navbar}
                            </ul>
      </div>
    </div>
    <script  type="text/javascript"> 
$(document).ready(function(){
	
	$(".navbg").capacityFixed();
	
	$("#navul > li").not(".navhome").hover(function(){
		$(this).addClass("navmoon");
	},function(){
		$(this).removeClass("navmoon");
	});
	
	var s=document.location;
	$("#navul >li").each(function(){
	if ($(this).find("a").attr("href") == s.toString().split("#")[0]){
		$(this).attr("class","navmoon");
	}	});	// 当前页面加class navmoon
	
		
});
</script> 
    <!--nav end--> 
  </div>
  <div class="pull-right" style="width:190px">
		<ul>
	<li class="weibo"><a href="###" title="微博登录" >微博</a></li>
    <li class="weixin"><a href="http://www.ikanchai.com/index.php?m=member&c=index&a=public_qq_loginnew" title="QQ登录">QQ登录</a></li>
    <ul/>
    	
  </div>
</div>
<!--navbar end-->  
<!--wrapper begin-->
<div class="wrapper clearfix pt10">
  <div class="con-left"> 
{if $article.Type==ZC_POST_TYPE_ARTICLE}
{template:post-single}
{else}
{template:post-page}
{/if}
  </div>
  <!--con-left end-->
  {template:sidebar}
  <!--con-right end--> 
  
</div>
<!--wrapper end-->
</div>
{template:footer}

