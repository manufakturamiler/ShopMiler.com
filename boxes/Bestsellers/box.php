{if count($boxNs->$box_id->list)}
<h3 class="home-subtitle">{translate key='Bestsellers'}</h3>
<div class="product-grid clearfix">
    {if $boxNs->$box_id->text}
    <h5 class="boxintro">{$boxNs->$box_id->text}</h5>{/if} {if $boxNs->$box_id->format == 2}
    <ol class="productlist">
        {foreach from=$boxNs->$box_id->list item=bs_product name=list}
        <li><a href="{route function='product' key=$bs_product->getIdentifier() productName=$bs_product->translation->name productId=$bs_product->getIdentifier()
            }" title="{$bs_product->translation->name|escape}">{$bs_product->translation->name|escape}</a></li>
        {/foreach}
    </ol>
    {else} {foreach from=$boxNs->$box_id->list item=bs_product name=list}
    <div class="product">
        <div class="photo">
            <a href="{route function='product' key=$bs_product->getIdentifier() productName=$bs_product->translation->name productId=$bs_product->getIdentifier()}" title="{$bs_product->translation->name|escape}" class="row">
                <img src="{imageUrl type='productGfx' width=$skin_settings->img->medium height=$skin_settings->img->medium image=$bs_product->mainImageName() overlay=1}" alt="{$bs_product->translation->name|escape}">
                <span class="details">Szczegóły</span>
            </a>
        </div>
        <h2><a href="{route function='product' key=$bs_product->getIdentifier() productName=$bs_product->translation->name productId=$bs_product->getIdentifier()}">{$bs_product->translation->name|escape}</a></h2>

        <div class="price">
            {if $showprices} {if $skin_settings->global->pricemode == '1' || $skin_settings->global->pricemode == '3'} {if $bs_product->specialOffer}
            <span class="old">{currency value=$bs_product->defaultStock->getPrice()}</span>
            <span class="promo">{currency value=$bs_product->defaultStock->getSpecialOfferPrice()}</span> {else}
            <span class="normal">{currency value=$bs_product->defaultStock->getPrice()}</span> {/if} {/if} {/if}
        </div>
    </div>
    {/foreach} {/if}
</div>
{/if}