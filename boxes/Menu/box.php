{if $boxNs->$box_id->text}
<h3 class="boxtitle">{$boxNs->$box_id->text}</h3>{/if} {if 1 == $boxNs->$box_id->format}
<ul class="category-menu clearfix standard">
    {else}
    <ul class="category-menu clearfix folded">
        {/if} {$boxNs->$box_id->list} {if 1 == $boxNs->$box_id->link_news}
        <li id="category_novelties">
            <a href="{$boxNs->$box_id->url_new}" title="{translate key='News link'}" class="novelties"><img src="{baseDir}/public/images/1px.gif" alt="" class="px1">{translate key="News link"}</a>
        </li>{/if} {if 1 == $boxNs->$box_id->link_promotions}
        <li id="category_promo">
            <a href="{$boxNs->$box_id->url_promotions}" title="{translate key='Promotions link'}" class="promo"><img src="{baseDir}/public/images/1px.gif" alt="" class="px1">{translate key="Promotions link"}</a>
        </li>{/if}
    </ul>