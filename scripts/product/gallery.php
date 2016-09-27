<!-- Nowy Styl dla MilerSuit -->
{if $category_link=="/pl/garnitury" || $category_link=='/en_GB/suits' || $category_link=='/pl/c/Brandy/260' || $category_link == '/pl/torby' || $category_link=='/pl/spodnie' || $category_link=='/pl/koszule-meskie' || $category_link=='/preorder' || $category_link=='/pl/manufaktura-miler' || $category_link=='/pl/akcesoria/rekawiczki' || $category_link=='/pl/obuwie/loake' || $category_link=='/pl/obuwie/carmina' || $category_link=='/pl/obuwie/berwick'}





<div class="col-md-5 clearfix">
    <div class="productimg k-productimg row">
        <div class="mainimg k-mainimg productdetailsimgsize" style="display:block">

            <a href="#" class="k-img-btn k-img-next"> > </a>
            <a href="#" class="k-img-btn k-img-prev">
                < </a>
                    {if count($gallery)} {assign var=img value=$gallery.0} {/if} {if 1 == count($gallery)}
                    <a id="prodimg{$img->gfx_id}" data-gallery-list="{$product->translation->name|escape}" data-gallery="true" href="{imageUrl type='productGfx' image=$img->unic_name}" title="{$img->name|escape}">
                    <img class="photo {if 1 == (int) $skin_settings->productdetails->productzoom}innerzoom {elseif 2 == (int) $skin_settings->productdetails->productzoom}outerzoom {/if
                                }" src="{imageUrl type='productGfx' width=$skin_settings->img->big height=$skin_settings->img->big image=$img->unic_name}" alt="{$img->name|escape}">
                </a> {else}
                    <img class="photo center-block img-responsive {if 1 == (int) $skin_settings->productdetails->productzoom}innerzoom {elseif 2 == (int) $skin_settings->productdetails->productzoom}outerzoom {/if
                            }k-productimg productimg{if $product->defaultStock->mainImageId()} gallery_{$product->defaultStock->mainImageId()}{/if}" src="{imageUrl
                                  type='productGfx' width=$skin_settings->img->big height=$skin_settings->img->big image=$product->defaultStock->mainImageName() overlay=1}" alt="{$img->name|escape}" /> {/if} {if $product->specialOffer || $product->isNew()}
                    <ul class="tags">
                        {if $product->specialOffer}
                        <li class="promo">{translate key="on sale tag"}</li>
                        {/if} {if $product->isNew()}
                        <li class="new">{translate key="new product tag"}</li>
                        {/if} {if $product->defaultStock->delivery->translation->name == "Preorder"}
                        <li class="preorder">preorder</li>
                        {/if}
                    </ul>
                    {/if}
        </div>

        <div class="smallgallery k-smallgallery row">
            {if count($gallery) > 1 && 0 == (int) $skin_settings->productdetails->miniaturesposition}
            <div class="innersmallgallery">
                <ul>
                    {foreach from=$gallery item=img}
                    <li class="productdetailsminigalleryimgsize k-productdetailminigallery">
                        <a id="prodimg{$img->gfx_id}" data-gallery-list="{$product->translation->name|escape}" data-gallery="true" href="{imageUrl type='productGfx' image=$img->unic_name}" title="{$img->name|escape}" class="gallery{if $img->gfx_id == $product->defaultStock->mainImageId()} current{/if}">
                                <img src="{imageUrl type='productGfx' width=$skin_settings->img->mini height=$skin_settings->img->mini
                                          image=$img->unic_name}" alt="{$img->name|escape}" data-img-name="{imageUrl type='productGfx' width=$skin_settings->img->big height=$skin_settings->img->big image=$img->unic_name}">
                            </a>
                    </li>
                    {/foreach}
                </ul>
            </div>
            {/if}
        </div>
        {*
        <ul data-slider="true">
            {foreach from=$gallery item=img}
            <li style="width: 45px; height: 45px" class="productdetailsminigalleryimgsize">
                <a id="prodimg{$img->gfx_id}" href="{imageUrl type='productGfx' image=$img->unic_name}" title="{$img->name|escape}" class="gallery{if $img->gfx_id == $product->defaultStock->mainImageId()} current{/if}">
                        <img src="{imageUrl type='productGfx' width=$skin_settings->img->big height=$skin_settings->img->big
                                  image=$img->unic_name}" alt="{$img->name|escape}" data-img-name="{imageUrl type='productGfx' width=$skin_settings->img->big height=$skin_settings->img->big" image=$img->unic_name}">
                    </a>
            </li>
            {/foreach}
        </ul>
        *}
    </div>
</div>



<!-- Stary Styl -->
{else}


<div class="productimg f-grid-6">
    <div class="mainimg productdetailsimgsize row" style="display:block">
        {if count($gallery)} {assign var=img value=$gallery.0} {/if} {if 1 == count($gallery)}
        <a id="prodimg{$img->gfx_id}" data-gallery-list="{$product->translation->name|escape}" data-gallery="true" href="{imageUrl type='productGfx' image=$img->unic_name}" title="{$img->name|escape}">
                <img class="photo {if 1 == (int) $skin_settings->productdetails->productzoom}innerzoom {elseif 2 == (int) $skin_settings->productdetails->productzoom}outerzoom {/if
                            }" src="{imageUrl type='productGfx' width=$skin_settings->img->big height=$skin_settings->img->big image=$img->unic_name}" alt="{$img->name|escape}">
            </a> {else}
        <img class="photo {if 1 == (int) $skin_settings->productdetails->productzoom}innerzoom {elseif 2 == (int) $skin_settings->productdetails->productzoom}outerzoom {/if
                        }productimg{if $product->defaultStock->mainImageId()} gallery_{$product->defaultStock->mainImageId()}{/if}" src="{imageUrl
                                                                                                                                         type='productGfx' width=$skin_settings->img->big height=$skin_settings->img->big image=$product->defaultStock->mainImageName() overlay=1}" alt="{$img->name|escape}" /> {/if} {if $product->specialOffer || $product->isNew()}
        <ul class="tags">
            {if $product->specialOffer}
            <li class="promo">{translate key="on sale tag"}</li>
            {/if} {if $product->isNew()}
            <li class="new">{translate key="new product tag"}</li>
            {/if} {if $product->defaultStock->delivery->translation->name == "Preorder"}
            <li class="preorder">preorder</li>
            {/if}
        </ul>
        {/if}
    </div>

    <div class="smallgallery row">
        {if count($gallery) > 1 && 0 == (int) $skin_settings->productdetails->miniaturesposition}
        <div class="innersmallgallery">
            <ul>
                {foreach from=$gallery item=img}
                <li class="productdetailsminigalleryimgsize">
                    <a id="prodimg{$img->gfx_id}" data-gallery-list="{$product->translation->name|escape}" data-gallery="true" href="{imageUrl type='productGfx' image=$img->unic_name}" title="{$img->name|escape}" class="gallery{if $img->gfx_id == $product->defaultStock->mainImageId()} current{/if}">
                            <img src="{imageUrl type='productGfx' width=$skin_settings->img->mini height=$skin_settings->img->mini
                                      image=$img->unic_name}" alt="{$img->name|escape}" data-img-name="{imageUrl type='productGfx' width=$skin_settings->img->big height=$skin_settings->img->big image=$img->unic_name}">
                        </a>
                </li>
                {/foreach}
            </ul>
        </div>
        {/if}
    </div>
    {*
    <ul data-slider="true">
        {foreach from=$gallery item=img}
        <li style="width: 45px; height: 45px" class="productdetailsminigalleryimgsize">
            <a id="prodimg{$img->gfx_id}" href="{imageUrl type='productGfx' image=$img->unic_name}" title="{$img->name|escape}" class="gallery{if $img->gfx_id == $product->defaultStock->mainImageId()} current{/if}">
                    <img src="{imageUrl type='productGfx' width=$skin_settings->img->big height=$skin_settings->img->big
                              image=$img->unic_name}" alt="{$img->name|escape}" data-img-name="{imageUrl type='productGfx' width=$skin_settings->img->big height=$skin_settings->img->big" image=$img->unic_name}">
                </a>
        </li>
        {/foreach}
    </ul>
    *}
</div>
{/if}