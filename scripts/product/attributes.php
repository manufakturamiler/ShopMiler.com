{if count($attrs)}
<div class="box tab" id="box_productdata">
    <div class="boxhead tab-head">
        <h3>
            <img src="{baseDir}/public/images/1px.gif" alt="" class="px1">
            {translate key="Technical data"}
        </h3>
    </div>

    <div class="innerbox tab-content">
        <table class="table">
            <tbody>
                {foreach from=$attrs item=attr} {if 1 == $attr.type}
                <tr class="s-row">
                    <td class="name s-grid-4">{$attr.name|escape}</td>
                    <td class="value">{if 1 == $attr.value}{translate key="Yes"}{else}{translate key="No"}{/if}</td>
                </tr>
                {elseif strlen($attr.value)}
                <tr class="s-row">
                    <td class="name s-grid-4">{$attr.name|escape}</td>
                    <td class="value">{$attr.value|escape}</td>
                </tr>
                {/if} {/foreach}
            </tbody>
        </table>
    </div>
</div>
{/if}