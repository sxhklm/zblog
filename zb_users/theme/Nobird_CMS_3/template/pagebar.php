{if $pagebar}
<a class="a1">{$pagebar.PageAll} 条</a> 
{foreach $pagebar.buttons as $k=>$v}
  {if $pagebar.PageNow==$k}
	<span>{$k}</span>
  {else}
	<a href="{$v}">{$k}</a>
  {/if}
{/foreach}
{/if}
