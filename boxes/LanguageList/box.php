<div class="box" id="box_languages">
    {if $boxNs->$box_id->format == 1}
    <select class="singleselect gotourl" id="box_languages_select">
        {foreach from=$boxNs->$box_id->list item=language}
        <option{if $language->name == $boxNs->$box_id->language} selected="selected"{/if} value="{$language->url}">{$language->title|escape}</option>
            {/foreach}
    </select>
    {elseif $boxNs->$box_id->format == 2}
    <ul class="listwithicons clearfix">
        {foreach from=$boxNs->$box_id->list item=language}
        <li{if $language->name == $boxNs->$box_id->language} class="selected"{/if}>
            <a href="{$language->url}" title="{$language->title|escape}" class="spanhover">
                <img src="{baseDir}/public/images/{$language->name|escape}.png" alt="">
                <span>{$language->title|escape}</span>
            </a>
            </li>
            {/foreach}
    </ul>
    {elseif $boxNs->$box_id->format == 3}
    <ul class="icons clearfix">
        {foreach from=$boxNs->$box_id->list item=language}
        <li{if $language->name == $boxNs->$box_id->language} class="selected"{/if}>
            <a href="{$language->url}" title="{$language->title|escape}" class="{$language->name|escape}">
                <img src="{baseDir}/public/flags/{$language->name|escape}.png" alt="">
            </a>
            </li>
            {/foreach}
    </ul>
    {/if}
</div>