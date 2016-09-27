{if count($boxNs->$box_id->list)}
<h3 class="home-subtitle">{translate key='Sale from our wardrobe'}</h3>
<div class="product-grid category clearfix">
    {if $boxNs->$box_id->text}
    <h5 class="boxintro">{$boxNs->$box_id->text}</h5>{/if} {if $boxNs->$box_id->format
    < 3} {foreach from=$boxNs->$box_id->list item=special_product name=list}
        <div class="product">
            <div class="photo">
                <a href="{route function='product' key=$special_product->getIdentifier() productName=$special_product->translation->name productId=$special_product->getIdentifier()
                     }" title="{$special_product->translation->name|escape}" class="spanhover">
                <img src="{imageUrl type='productGfx' width=$skin_settings->img->medium height=$skin_settings->img->medium image=$special_product->mainImageName() overlay=1}" alt="{$special_product->translation->name|escape}">
                <span class="details">Szczegóły</span>
            </a>
            </div>
            <h2><a href="{route function='product' key=$special_product->getIdentifier() productName=$special_product->translation->name productId=$special_product->getIdentifier()
            }" title="{$special_product->translation->name|escape}" >{$special_product->translation->name|escape}</a></h2> {if $showprices}
            <div class="price">
                {if $skin_settings->global->pricemode == '1' || $skin_settings->global->pricemode == '3'} {if $special_product->specialOffer}
                <span class="old">{currency value=$special_product->defaultStock->getPrice()}</span>
                <span class="promo">{currency value=$special_product->defaultStock->getSpecialOfferPrice()}</span> {else}
                <span class="normal">{currency value=$special_product->defaultStock->getPrice()}</span> {/if} {/if}
            </div>
            {/if}

        </div>
        {/foreach} {else}
        <ol class="productlist">
            {foreach from=$boxNs->$box_id->list item=special_product name=list}
            <li><a href="{route function='product' key=$special_product->getIdentifier() productName=$special_product->translation->name productId=$special_product->getIdentifier()
            }" title="{$special_product->translation->name|escape}">{$special_product->translation->name|escape}</a></li>
            {/foreach}
        </ol>
        {/if}
</div>
{/if}