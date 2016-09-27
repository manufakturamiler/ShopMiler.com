{if strlen(trim($product->translation->description)) || count($product->files)}
<div id="box_description">
    <div class="resetcss" itemprop="description">{$product->translation->description}</div>
    {if count($product->files)}
    <div class="productfiles">
        <h5 class="">{translate key="Downloadable files:"}</h5>
        <ul class="productfiles">
            {foreach from=$product->files item=file}
            <li>
                <a href="{route key='productFile' name=$file->name file=$file->file_name}" title="{if $file->description}{$file->description|escape}{else}{$file->name|escape}{/if}" class="spanhover">
                    <img src="{baseDir}/public/images/1px.gif" alt="" class="px1">
                    <span>{if $file->description}{$file->description|escape}{else}{$file->name|escape}{/if}</span>
                </a>
            </li>
            {/foreach}
        </ul>
    </div>
    {/if}
</div>
{/if}