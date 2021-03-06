<div class="box" id="box_producers">
    <div class="boxhead">
        <span><img src="{baseDir}/public/images/1px.gif" alt="" class="px1">{$boxNs->$box_id->title|escape}</span>
    </div>
    <div class="innerbox">
        {if $boxNs->$box_id->text}
        <h5 class="boxintro">{$boxNs->$box_id->text}</h5>{/if}
        <label class="singleselect" for="box_producers_select">{translate key="Select vendor"}</label>
        <div class="producers_wrap">
            {dynamic}
            <select class="singleselect gotourl" id="box_producers_select">
                {/dynamic}
                <option label="{translate key=" choose "}" value="">{translate key="choose"}</option>
                {foreach from=$boxNs->$box_id->list item=producer} {assign var='id' value=$producer->manufacturer->producer_id}
                <option value="{$boxNs->$box_id->prod_links->$id}">{$producer->manufacturer->name|escape}</option>
                {/foreach}
            </select>
        </div>
    </div>
</div>