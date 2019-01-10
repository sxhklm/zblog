<li class="clearfix">
        <div class="thumb"><a href="{$article.Url}" target="_blank"> <img src="{$article.Img}" width="200" height="131" /> </a></div>
        <div class="mark">
          <h1><a href="{$article.Url}" target="_blank">{$article.Title}</a></h1>
          <p class="icogroup"><span class="ico-list"><span class="icon icon-01"></span>作者：{$article.Author.StaticName}</span><span class="ico-list"><span class="icon icon-02"></span>{$article.Time('Y.m.d')}</span><span class="ico-list"><span class="icon icon-03"></span><a href="{$article.Category.Url}">{$article.Category.Name}</a></span></p>
          <p class="info">{php}$intro= preg_replace('/[\r\n\s]+/', '', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),88)).'...');echo $intro;{/php}</p>
        </div>
        <a href="{$article.Url}" class="more" target="_blank">阅读全文</a> </li>