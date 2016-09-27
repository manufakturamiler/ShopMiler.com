{if count($boxNs->$box_id->list)}
<h3 class="home-subtitle">{translate key='New arrivals for true gentlemen'}</h3>
<div class="product-grid category clearfix">
    {if $boxNs->$box_id->text}
    <h5 class="boxintro">{$boxNs->$box_id->text}</h5>{/if} {if $boxNs->$box_id->format == 2}
    <ol class="productlist">
        {foreach from=$boxNs->$box_id->list item=newproduct name=list}
        <li><a href="{route function='product' key=$newproduct->getIdentifier() productName=$newproduct->translation->name productId=$newproduct->getIdentifier()
            }" title="{$newproduct->translation->name|escape}">{$newproduct->translation->name|escape}</a></li>
        {/foreach}
    </ol>
    {else} {foreach from=$boxNs->$box_id->list item=newproduct name=list}
    <div class="product">
        <div class="photo">
            <a href="{route function='product' key=$newproduct->getIdentifier() productName=$newproduct->translation->name productId=$newproduct->getIdentifier()
                     }" title="{$newproduct->translation->name|escape}" class="row">
                <img src="{imageUrl type='productGfx' width=$skin_settings->img->medium height=$skin_settings->img->medium image=$newproduct->mainImageName() overlay=1}" alt="{$newproduct->translation->name|escape}">
                <span class="details">Szczegóły</span>
            </a>
        </div>

        <h2><a href="{route function='product' key=$newproduct->getIdentifier() productName=$newproduct->translation->name productId=$newproduct->getIdentifier()
            }">{$newproduct->translation->name|escape}</a></h2>

        <div class="price">
            {if $showprices} {if $skin_settings->global->pricemode == '1' || $skin_settings->global->pricemode == '3'} {if $newproduct->specialOffer}
            <span class="old">{currency value=$newproduct->defaultStock->getPrice()}</span>
            <span class="promo">{currency value=$newproduct->defaultStock->getSpecialOfferPrice()}</span> {else}
            <span class="normal">{currency value=$newproduct->defaultStock->getPrice()}</span> {/if} {/if} {/if}
        </div>
    </div>
    {/foreach} {/if}
</div>
{/if}