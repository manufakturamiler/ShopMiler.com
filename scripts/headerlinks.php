{if count($headerlinks)}
<ul class="left clearfix">
    <li class="mobile">
        <button class="menu-toggle">Menu<span></span></button>
    </li>
    <li class="hover">
        <strong class="category-claim"><span>{translate key="Product categories"}</span></strong>
    </li>
    {foreach from=$headerlinks item=link} {if $link->getHref() || $link->isActiveCategory() || $link->isActiveNewsCategory()}
    <li{if $link->hasSubCategories() || $link->hasNewsSubCategories()} class="parent"{/if}{if $link->isCategory()} id="hcategory_{$link->getCategoryId()|escape}"{elseif $link->isNewsCategory()} id="ncategory_{$link->getNewsCategoryId()|escape}"{/if}>
        <a {if $link->isPopup()}target="_blank"{/if} href="{$link->getHref($view)|escape}" title="{$link->getTitle()|escape}" id="headlink{$link->getIdentifier()}" class="spanhover mainlevel">
            <span>{$link->getTitle()|escape}</span>
        </a> {if $link->hasSubCategories()} {include file='headermenu.tpl' level=1 headermenu_categories=$link->getActiveLangChildrenList()} {elseif $link->hasNewsSubCategories()} {include file='headernews.tpl' headernews_categories=$link->getNewsActiveLangChildrenList()} {/if}
        </li>
        {/if} {/foreach}
</ul>
{/if}