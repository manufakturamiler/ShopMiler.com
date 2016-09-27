{if $category_link=='/pl/garnitury' || $category_link=='/en_GB/suits' || $category_link == '/pl/torby' || $category_link=='/pl/spodnie' || $category_link=='/pl/koszule-meskie' || $category_link=='/preorder' || $category_link=='/pl/manufaktura-miler' || $category_link=='/pl/akcesoria/rekawiczki' || $category_link=='/pl/obuwie/loake' || $category_link=='/pl/obuwie/carmina' || $category_link=='/pl/obuwie/berwick'} {if count($related_products) && 1 == $skin_settings->productdetails->related}
<div class="ymal box row" id="box_productrelated">
    <div class="ymal-border">
        <h3>{translate key="Related products"}</h3>

        <div class="clearfix text-center">
            {foreach from=$related_products item=rproduct name=list}

            <a href="{route function=$productRoute key=$rproduct->product->product_id productName=$rproduct->translation->name
                     productId=$rproduct->product->product_id}" title="{$rproduct->translation->name|escape}">
                <div class="ymal-photo {if $smarty.foreach.list.index % 2}odd{else}even{/if}">
                    <div class="ymal-rel">

                        <img class="img-responsive" src="{imageUrl width=$skin_settings->img->small height=$skin_settings->img->small type='productGfx' image=$rproduct->mainImageName() overlay=1}" alt="{$rproduct->translation->name|escape}">
                        <div class="ymal-hvr">
                            <div class="ymal-price">
                                {if $rproduct->specialOffer} {currency value=$rproduct->defaultStock->getSpecialOfferPrice()} {else} {currency value=$rproduct->defaultStock->getPrice()} {/if}
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            {/foreach}
        </div>
    </div>
    </a>
</div>
{/if} {else} {if count($related_products) && 1 == $skin_settings->productdetails->related}
<div class="box row tab" id="box_productrelated">
    <h3 class="boxtitle">{translate key="Related products"}</h3>

    <div class="product-grid clearfix">
        {foreach from=$related_products item=rproduct name=list}
        <div class="product row {if $smarty.foreach.list.index % 2}odd{else}even{/if}">
            <div class="photo">
                <a class="f-grid-2" href="{route function=$productRoute key=$rproduct->product->product_id productName=$rproduct->translation->name
                                          productId=$rproduct->product->product_id}" title="{$rproduct->translation->name|escape}">
                    <img src="{imageUrl width=$skin_settings->img->small height=$skin_settings->img->small type='productGfx' image=$rproduct->mainImageName() overlay=1}" alt="{$rproduct->translation->name|escape}">
                    <span class="details">Szczegóły &raquo;</span>
                </a>

            </div>


            <h2><a href="{route function=$productRoute key=$rproduct->product->product_id productName=$rproduct->translation->name
                productId=$rproduct->product->product_id}" title="{$rproduct->translation->name|escape}">
                <span class="productname" itemprop="isRelatedTo">{$rproduct->translation->name|escape}</span>
                </a></h2> {if $loyalty_exchange}
            <div class="price clearfix">
                <span class="normal">{float precision=0 value=$product->defaultStock->loyaltyPointsPrice(true)}</span>
            </div>
            {elseif $showprices}
            <div class="price clearfix">
                {* {if $rproduct->specialOffer}
                <span class="promo">{currency value=$rproduct->defaultStock->getPrice()}</span>
                <span class="normal">{currency value=$rproduct->defaultStock->getSpecialOfferPrice()}</span> {else}
                <span class="normal">{currency value=$rproduct->defaultStock->getPrice()}</span> {/if} *} {if $skin_settings->global->pricemode == '1' || $skin_settings->global->pricemode == '3'} {if $rproduct->specialOffer}
                <span class="promo">{currency value=$rproduct->defaultStock->getPrice()}</span>
                <span class="normal">{currency value=$rproduct->defaultStock->getSpecialOfferPrice()}</span> {else}
                <span class="normal">{currency value=$rproduct->defaultStock->getPrice()}</span> {/if} {/if} {if $skin_settings->global->pricemode == '1' || $skin_settings->global->pricemode == '2'} {if $skin_settings->global->pricemode == '1'}
                <i class="price-netto">({translate key="net"}:
                    {/if}
                    {if $rproduct->specialOffer}
                    <em>{currency value=$rproduct->defaultStock->getSpecialOfferPrice(true)}</em>
                    <del>{currency value=$rproduct->defaultStock->getPrice(true)}</del>
                    {else}
                    <em>{currency value=$rproduct->defaultStock->getPrice(true)}</em>
                    {/if}
                    {if $skin_settings->global->pricemode == '1'}
                    )</i> {/if} {/if}
            </div>
            {/if}

        </div>
        {/foreach}
    </div>
</div>
{/if} {/if}