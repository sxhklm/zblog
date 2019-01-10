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
    <div class="tc p20"> <!-- Baidu Button BEGIN -->
<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a><a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a><a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a><a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a><a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a><a title="分享到百度个人中心" href="#" class="bds_ibaidu" data-cmd="ibaidu"></a><a title="分享到百度相册" href="#" class="bds_bdxc" data-cmd="bdxc"></a><a title="分享到开心网" href="#" class="bds_kaixin001" data-cmd="kaixin001"></a><a title="分享到腾讯朋友" href="#" class="bds_tqf" data-cmd="tqf"></a><a title="分享到百度贴吧" href="#" class="bds_tieba" data-cmd="tieba"></a><a title="分享到QQ好友" href="#" class="bds_sqq" data-cmd="sqq"></a><a title="分享到复制网址" href="#" class="bds_copy" data-cmd="copy"></a><a title="分享到我的淘宝" href="#" class="bds_taobao" data-cmd="taobao"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"32"},"share":{},"image":{"viewList":["weixin","tsina","qzone","tqq","renren","ibaidu","bdxc","kaixin001","tqf","tieba","sqq","copy","taobao"],"viewText":"分享到：","viewSize":"32"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["weixin","tsina","qzone","tqq","renren","ibaidu","bdxc","kaixin001","tqf","tieba","sqq","copy","taobao"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<!-- Baidu Button END --> </div>
    <div class="ad pt10 mb15">{$zbp->Config('Nobird_Theme_Ads')->adunderarticle}</div>
    <div class="link-box">
    <h1>相关文章</h1>
    <ul class="ullist4">
{$aid=$article.ID}
{$tagid=$article.Tags}
{$cid=$article.Category.ID}
{php}
    $tagrd=array_rand($tagid);
    if( sizeof($tagid)>0 && ($tagid[$tagrd]->Count)>1){
        $tagi='%{'.$tagrd.'}%';
        $where = array(array('=','log_Status','0'),array('like','log_Tag',$tagi),array('<>','log_ID',$aid));
    }else{
        $where = array(array('=','log_Status','0'),array('=','log_CateID',$cid),array('<>','log_ID',$aid));
    }
    $array = $zbp->GetArticleList(array('*'),$where,array('rand()'=>' '),array(6),'');
    $str ="";
    foreach ($array as $related) {
        if(($related->ID)!=$aid){
        $str .= "<li><a href=\"{$related->Url}\" title=\"{$related->Title}\">{$related->Title}</a><span class=\"time\">{$related->Time('m-d')}</span></li>";
        }
    }
{/php}
{$str}
</ul>
    </div>
    <div class="bk20"></div>
    <div class="comment">
      <h1 class=" clearfix"><img class="fl" src="{$host}zb_users/theme/Nobird_CMS_3/style/images/title_02.png" data-bd-imgshare-binded="1"> <span class="fr">已有{$article.CommNums}人参与</span></h1>
{if !$article.IsLock}
{template:comments}
{/if}
    </div>
    <div class="bk30"></div>

    <!--articleList end-->
