    <div class="positionbar">
      <ul class="bread clearfix">
        <li class="ico"><img src="{$host}zb_users/theme/Nobird_CMS_3/style/images/ico_07.png"></li>
        <li><a href="{$host}">首页</a></li>
        <li>{$article.Category.Name}</li>
        <li class="last">{$article.Title}</li>
      </ul>
    </div>

    <!--articleList begin-->
    <div class="articleList">
      <h1 class="main-tit2"><span class="tit2"><a style="color:#fff;" href="{$article.Category.Url}">{$article.Category.Name}</a></span><span class="black f20 fb"><a href="">{$article.Title}</a></span></h1>
    </div>
    <p style="padding-bottom:10px; margin-bottom:10px; border-bottom:1px dashed #eee;" class="icogroup"><span class="ico-list"><span class="icon icon-01"></span>作者：{$article.Author.StaticName}</span><span class="ico-list"><span class="icon icon-02"></span>{$article.Time('Y.m.d')}</span><span class="ico-list"><span class="icon icon-03"></span>来源：{$name}</span><span class="ico-list"><span class="icon icon-00"></span>标签：{foreach $article.Tags as $tag}<a href="{$tag.Url}">{$tag.Name}</a>{/foreach} </span></p>
    <div class="daoyu lh180"> <font color="#00AA98">导语：</font>{$article.Intro}</div>
    <div class="art-content pt20 f16 lh200">
    {$article.Content}
    </div>

    <!--内容结束-->
	    <div class="tip-bar clearfix"> <span class="tit">温馨提示</span>本文作者系<a style="color:#00AA98;" href="javascript:void(0);">{$article.Author.Alias} </a>，经<a style="color:#00AA98;" href="javascript:void(0);">{$name}</a>编辑修改或补充，转载请注明出处和<span style="color:#00AA98">本文链接</span> </div>
    <div class="tc p20"></div>
    <div class="ad pt10 mb15">{module:adunderarticle}</div>
    <div class="bk20"></div>
    <div class="comment">
      <h1 class=" clearfix"><img class="fl" src="{$host}zb_users/theme/Nobird_CMS_3/style/images/title_02.png" data-bd-imgshare-binded="1"> <span class="fr">已有{$article.CommNums}人参与</span></h1>
{if !$article.IsLock}
{template:comments}
{/if}
    </div>
    <div class="bk30"></div>

    <!--articleList end-->
