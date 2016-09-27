{if count($filter_groups)}
<div class="box {if 1 == $filter_counter}foldable {/if}{if $category_id == 184}displaynone{/if}" id="box_filter">
    <h3 class="boxtitle">{$boxNs->$box_id->title|escape}</h3>
    <div class="innerbox f-row clearfix">
        {if $boxNs->$box_id->text}
        <h5 class="boxintro">{$boxNs->$box_id->text}</h5>{/if} {foreach from=$filter_groups item=group name=list} {if count($group.items) || ($boxNs->$box_id->price_input && 'Search_Filter_Products_Provider_Price' == $group.provider)} {math equation="x / y" x=12 y=$filter_groups|@count assign="filterCounter"}
        <div class="group f-grid-6" id="filter_{$group.id}">
            <h5 class="{if 0 == $smarty.foreach.list.index}first{/if} {if $group.headselected}selected{/if}">
                {if $group.headlink}<a href="{$group.headlink|escape}" title="">{/if}
                {$group.name|escape}
                {if $group.headlink}</a>{/if}
            </h5>
            <ul class="{if !$group.full}foldable{/if}">
                {foreach from=$group.items item=item} {if $item.active or (isset($item.counter) and $item.counter) or !isset($item.counter)}
                <li class="{if $item.active}selected fa fa-times{/if}{if $item.indent} indent{/if}" id="filter_{$item.id}">
                    <a class="spanhover" title="{$item.name}" href="{if $item.active}{$item.link_remove}{else}{if $filter_type == 1 || !$item.link_add}{$item.link_solo}{else}{$item.link_add}{/if}{/if}">
                        <img src="{baseDir}/public/images/1px.gif" alt="" class="px1"> {if $item.html} {$item.html} {else} {if $item.color}
                        <span>{$item.color|escape}</span> {else}
                        <span>{$item.name|escape}</span> {/if} {/if} {if isset($item.counter)}
                        <em>({$item.counter})</em> {/if}
                    </a>
                </li>
                {/if} {/foreach} {if $boxNs->$box_id->price_input && 'Search_Filter_Products_Provider_Price' == $group.provider}
                <li class="priceinput">
                    <span class="fromto">{translate key='from'}</span>
                    <input type="text" id="filterprice1" value="" class="short">
                    <br>
                    <span class="fromto">{translate key='to'}</span>
                    <input type="text" id="filterprice2" value="" class="short">
                    <div class="bottombuttons">
                        <button class="btn" type="button" id="filterprice">
                            <img src="{baseDir}/public/images/1px.gif" alt="" class="px1">
                            <span>{translate key='Filter'}</span>
                        </button>
                    </div>
                </li>
                {/if}
            </ul>
        </div>
        {/if} {/foreach}
    </div>
</div>
<script type="text/javascript">
    try {
        literal
    } {
        {
            /literal} Shop.values.PriceFilterFrom = '{$boxNs->$box_id->pricefilter_from}'; Shop.values.PriceFilterFromTo = '{$boxNs->$box_id->pricefilter_fromto}'; Shop.values.PriceFilterTo = '{$boxNs->$box_id->pricefilter_to}'; {literal}}{/literal
        } catch (e) {
            literal
        } {} {
            /literal}
</script>
{/if}