<div class="con-right">
<div class="mail-box mb10">
<h1>邮箱订阅{$name}</h1>


<div class="pt15 mb15"><!--QQ邮件列表订阅嵌入代码-->

{$zbp->Config('Nobird_Theme_Ads')->maildy}

</div>

      <div class="icogroup">
        <ul class="clearfix">
{$zbp->Config('Nobird_Theme_Ads')->dingyue}
        </ul>
      </div>
    </div>
    
    

    <div class="sharebox mb10">
<ul class="share-ico clearfix">
{$zbp->Config('Nobird_Theme_Ads')->share}
      </ul>
    </div>
    
    <!--sharebox end-->
  <!--  weichat二维码图片  注释掉  谁需要自己打开就好了
    <div style="height:120px; background:#00AA98;" class="ad-box mb20"> <img width="320" height="120" src="http://www.ikanchai.com/statics/images/ikanchai2014/images/weixin.jpg"></div>
    -->
    <!--ad-box end--> 
    

    <div class="box-a mb20">
  <h1 class="title">最新文章</h1>
  <div class="newlist"> 
            <ul class="ullist">
{module:previous} 
                </ul>
  </div>
</div>

    
    <div style="background:#00AA98;" class="ad-box mb20"><a target="_blank" href="#">
   {$zbp->Config('Nobird_Theme_Ads')->celanad1}
    </div>
    <!--ad-box end-->
    
    <div class="box-b mb20"> <span class="arrow-right"></span>
  <h1 class="title pt10 pl10">热门排行</h1>
  <ul class="ullist2">
{module:Nobird_CMS_3_hot}
          </ul>
</div>
    
    <div style="background:#00AA98;" class="ad-box mb20">
    {$zbp->Config('Nobird_Theme_Ads')->celanad2}
    </div>
    <!--ad-box end-->
    
    <div class="box-b mb20 p10"> <span class="arrow-right"></span>
  <h1 class="title pt10 pl10">他们在这里</h1>
  <ul class="ullist3">
{module:Nobird_CMS_3_CommentsWithPic}
    </ul>
</div>

<div class="box-b mb20 p10"> <span class="arrow-right"></span>
  <h1 class="title">关键词</h1>
  <div class="label-list divcolortags">{module:Nobird_CMS_3_BGColor_tags}</div>
</div>


<div class="box-b mb20 p10"> <span class="arrow-right"></span>
  <h1 class="title">赞助我们</h1>
  <div class="zz-list">
    <ul>
      {$zbp->Config('Nobird_Theme_Ads')->celanad3}
    </ul>
  </div>
</div>

  </div>