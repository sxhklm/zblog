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
        <!-- {module:catalog} -->
        </ul>
      </div>
    </div>
    <script  type="text/javascript"> 
$(document).ready(function(){
	
	$(".navbg").capacityFixed();
	
	$("#navul > li").not(".navhome").hover(function(){
		$(this).addClass("navmoon");
			var s=document.location;
	$("#navul >li").each(function(){
	if ($(this).find("a").attr("href") == s.toString().split("#")[0]){
		$(this).attr("class","navmoon");
	}	});	
		
	},function(){
		$(this).removeClass("navmoon");
			var s=document.location;
	$("#navul >li").each(function(){
	if ($(this).find("a").attr("href") == s.toString().split("#")[0]){
		$(this).attr("class","navmoon");
	}	});	
		
	});
	
	var s=document.location;
	$("#navul >li").each(function(){
	if ($(this).find("a").attr("href") == s.toString().split("#")[0]){
		$(this).attr("class","navmoon");
	}	});	
		
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
    
    <!--焦点图-->
    <div class="yx-rotaion" style="margin-bottom:25px;">
      <ul class="rotaion_list">{module:slide}</ul>
    </div>
    <script type="text/javascript" src="{$host}zb_users/theme/{$theme}/script/jquery.yx_rotaion.js"></script> 
    <script type="text/javascript">
$(".yx-rotaion").yx_rotaion({auto:true});
</script> 
    
    <!--焦点图结束--> 
    
    <!--articleList begin-->
    <div class="articleList">
      <h1 class="main-tit"><span class="tit">热门文章速递</span><span class="gray-3">致力于独立、前瞻、深入的分析评论</span></h1>
    </div>
    <ul class="articleCon">
     
        {foreach $articles as $article}

{if $article.IsTop}
{template:post-istop}
{else}
{template:post-multi}
{/if}

{/foreach}
          </ul>
    <div class="bk30"></div>
    <div class="pagination">{template:pagebar}</div>
        <!--articleList end--> 
    
  </div>
  <!--con-left end-->
  {template:sidebar}
  <!--con-right end--> 
  
</div>
<!--wrapper end-->
{if $type=='index'&&$page=='1'}
{template:between}
{else}
{/if}

</div>
{template:footer}