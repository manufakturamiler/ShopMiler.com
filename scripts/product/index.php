<!-- Nowy Styl dla MilerSuit -->
{if $category_link=='/pl/garnitury' || $category_link=='/en_GB/suits' || $category_link=='/pl/c/Brandy/260' || $category_link == '/pl/torby' || $category_link=='/pl/spodnie' || $category_link=='/pl/koszule-meskie' || $category_link=='/preorder' || $category_link=='/pl/manufaktura-miler' || $category_link=='/pl/akcesoria/rekawiczki' || $category_link=='/pl/obuwie/loake' || $category_link=='/pl/obuwie/carmina' || $category_link=='/pl/obuwie/berwick'} {include file='header.tpl'}
<body{if $body_id} id="{$body_id|escape}" {/if}{if $body_class} class="{$body_class|escape}" {/if}>

    {literal}
    <!-- Google Tag Manager -->
    <noscript>
        <iframe src="//www.googletagmanager.com/ns.html?id=GTM-ML92MV" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '//www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-ML92MV');
    </script>
    <!-- End Google Tag Manager -->
    {/literal} {include file='body_head.tpl'}
    <div class="content-wrapper clearfix" itemscope itemtype="{$schema}://schema.org/Product">


        {if 1 == $product->translation->active || $adminPreview == true}
        <div id="box_productfull" class="suit-new container box_productfull">
            <div class="innerbox pad-t-3 row" data-loading="{translate key=" Uploading file "}...">
                <div class="maininfo clearfix">
                    {include file='product/gallery.tpl'}
                    <div class="col-md-5">
                        <div class="product-meta k-product-meta">
                            <div class="bottomborder row">
                                <h1 class="text-left text-2em" itemprop="name">{$product->translation->name|escape}</h1> {if $loyalty_exchange}
                                <div class="price clearfix text-left">
                                    <em>{$product->defaultStock->loyaltyPointsPrice(true)|escape}</em>
                                </div>
                                {elseif $showprices} {if $skin_settings->global->pricemode == '1' || $skin_settings->global->pricemode == '3'}
                                <div class="price clearfix">
                                    <div class="price-value">
                                        {if $product->specialOffer}
                                        <span class="color main-price">{currency value=$product->defaultStock->getSpecialOfferPrice()}</em>
                                        <del class="old-price">{currency value=$product->defaultStock->getPrice()}</del>
                                        <span class="none" itemprop="price">
                                            {$product->defaultStock->getSpecialOfferPrice()}
                                        </span> {else}
                                        <em class="main-price">{if $product->canBuyStock() && 1 == $skin_settings->productdetails->time && $product->defaultStock->delivery}
                                            {currency float_currency=1 value=$product->defaultStock->getPrice()}
                                            {else}
                                            {$product->defaultStock->availability->translation->name}
                                            {/if}</em>
                                        <del class="none"></del>
                                        <span class="none" itemprop="price">
                                            {$product->defaultStock->getPrice()}
                                        </span> {/if}
                                        <span class="none" itemprop="priceCurrency">{currencyName short=true}</span>
                                    </div>
                                </div>
                                {/if} {$product->translation->short_description}

                                <div class="basket k-basket" itemprop="offers" itemscope itemtype="{$schema}://schema.org/Offer">
                                    <form class="clearfix form-basket{if false == $product->canBuyStock()} none{/if}{if $loyalty_exchange} loyaltyexchange{/if}" method="post" action="{route key=$basketAddRoute stockId='post'}" enctype="multipart/form-data">


                                        {assign var=options value=$product->getOptionsConfigurationStruct()} {if $product->product->group_id && count($options)}
                                        <div class="col-md-12 row">

                                            <div class="stocks form-inline">
                                                {foreach from=$options item=option}
                                                <div class="clearfix">

                                                    <div class="stock-options k-stock-options">
                                                        {switch expr=$option.type} {case expr='file'}
                                                        <div class="option_{$option.type|escape}{if 1 == $option.stock} option_truestock{/if}{if 1 == $option.required} option_required{/if}">
                                                            <input type="file" id="option_{$option.id|escape}" name="option_{$option.id|escape}" />
                                                        </div>
                                                        {/case} {case expr='text'}
                                                        <div class="option_{$option.type|escape}{if 1 == $option.stock} option_truestock{/if}{if 1 == $option.required} option_required{/if}">
                                                            <div class="shaded_inputwrap inputwrap">
                                                                <input type="text" id="option_{$option.id|escape}" name="option_{$option.id|escape}" value="" placeholder="{$option.name|escape}" />
                                                            </div>
                                                        </div>
                                                        {/case} {case expr='checkbox'}

                                                        <div class="checkbox pull-left option_{$option.type|escape}{if 1 == $option.stock} option_truestock{/if}{if 1 == $option.required} option_required{/if}">
                                                            <span class="checkbox-wrap-yesno pull-left">
                                                                <input type="checkbox" class="k-input-width" id="option_{$option.id|escape}" name="option_{$option.id|escape}" value="1" />
                                                                <label class="k-hidden" data-yes="{translate key="TAK"}" data-no="{translate key="NIE"}" for="option_{$option.id|escape}"></label>
                                                            </span>
                                                        </div>
                                                        <div class="label">
                                                            <label for="option_{$option.id|escape}" class="label k-label">
                                                                {$option.name|escape}{if 1 == $option.required}<em class="color">*</em>{/if}:
                                                            </label>
                                                        </div>

                                                        {/case} {case expr='radio'}
                                                        <div class="option_{$option.type|escape}{if 1 == $option.stock} option_truestock{/if}{if 1 == $option.required} option_required{/if}">
                                                            {foreach from=$option.values item=value}
                                                            <span class="radio-wrap">
                                                                <input type="radio" id="option_{$option.id|escape}_{$value.id|escape}" name="option_{$option.id|escape}" value="{$value.id|escape}" />
                                                                <label for="option_{$option.id|escape}_{$value.id|escape}"></label>
                                                            </span>
                                                            <label for="option_{$option.id|escape}_{$value.id|escape}">{$value.name|escape}</label>
                                                            <br /> {/foreach}
                                                        </div>
                                                        {/case} {case expr='color'}

                                                        <div class="k-select clearfix option_{$option.type|escape}{if 1 == $option.stock} option_truestock{/if}{if 1 == $option.required} option_required{/if}">
                                                            <label for="option_{$option.id|escape}" class="color-label">{$option.name|escape}:</label>
                                                            <select class="pull-right color-select" id="option_{$option.id|escape}" name="option_{$option.id|escape}">
                                                                <option value="" title="">{translate key='(choose)'}</option>
                                                                {foreach from=$option.values item=value}
                                                                <option value="{$value.id|escape}" title="{$value.color|escape}">{$value.name|escape}</option>
                                                                {/foreach}
                                                            </select>
                                                        </div>
                                                        {/case} {case expr='select'}
                                                        <div class="k-select option_{$option.type|escape}{if 1 == $option.stock} option_truestock{/if}{if 1 == $option.required} option_required{/if}">
                                                            <select id="option_{$option.id|escape}" name="option_{$option.id|escape}">
                                                                <option value="" title="">{$option.name|escape}</option>
                                                                {foreach from=$option.values item=value}
                                                                <option value="{$value.id|escape}">{$value.name|escape}</option>
                                                                {/foreach}
                                                            </select>
                                                        </div>
                                                        {/case} {/switch}
                                                    </div>
                                                </div>
                                                {/foreach}
                                            </div>
                                            {if $category_link=='/pl/garnitury' || $category_link=='/en_GB/suits' || $category_link=='/pl/spodnie' || $category_link=='/pl/akcesoria/rekawiczki'}
                                            <span class="k-size-button">
                                                <a class="js-open-modal" href="#" data-modal-id="popup"><img src="/skins/user/rwd_shoper_1/images/user/garnitur-granatowy-miler-tabelra-rozmiarow.jpg?nocache=1471870121">  Tabela rozmiarów </a>
                                            </span> {/if}
                                            <span class="monogram-info">{translate key="monogram-info"}</span>
                                        </div>
                                        {/if}
                                        <fieldset{if false==$ enablebasket || 0==( int) $product->defaultStock->availability->availability->can_buy} class="none row col-md-6 pull-left clearfix"{else} class="clearfix {if $product->product->group_id && count($options)}row col-md-12{/if}"{/if}>
                                            <div class="quantity_wrap">
                                                <span class="quantity_name">{translate key="quantity"}</span>
                                                <span class="number-wrap">
                                                    <input name="quantity" value="{float precision=$QUANTITY_PRECISION value=1 trim=true}" type="text" class="short inline">
                                                </span>
                                                <span class="unit">{$product->unit->translation->name|escape}</span>
                                                <input type="hidden" value="{$stock_id|escape}" name="stock_id">
                                                <input type="hidden" value="1" name="nojs">
                                            </div>
                                            <div class="button_wrap k_button_wrap">
                                                <button type="submit" class="addtobasket btn btn-red">
                                                    <span>{if $loyalty_exchange}{translate key="Exchange"}{else}{translate key="Add to the basket"}{/if}</span>
                                                </button>

                                                {if false !== $loyalty_points && !$loyalty_exchange}
                                                <span class="loyalty_points{if 0 == $loyalty_points} none{/if}">
                                                    {translate key="You earn %s%s%s points [%s?%s]" p1='<span class="points">' p2=$loyalty_points p3='</span>' p4='<span class="tooltip_pointer">' p5='</span>'}
                                                <label class="tooltip" id="loyalty_msg">
                                                    {if $loyalty_msg_title}
                                                    <p class="title">{$loyalty_msg_title|escape}</p>
                                                    {/if} {foreach from=$loyalty_msgs item=loyalty_msg}
                                                    <p>{$loyalty_msg|escape}</p>
                                                    {/foreach}
                                                </label>
                                                </span>
                                                {/if}
                                            </div>
                                            {if $category_link=='/pl/manufaktura-miler'}
                                            <div class="btn-comments">
                                                <a href="#box_productcomments" class=" page-scroll check_opinions">Sprawdź opinie ({$product_comments|count})</a>
                                                <img src="http://shopmiler.com/skins/user/shoper_red_1/images/user/comment_arrow.png" alt="Sprawdź opinie">
                                            </div>
                                            {/if}
                                            </fieldset>

                                    </form>






                                    {if $skin_settings->global->pricemode == '1' || $skin_settings->global->pricemode == '2'}
                                    <div class="price-netto">
                                        {if $skin_settings->global->pricemode == '1'}
                                        <span class="price-name">{translate key="Net price"}:</span> {else}
                                        <span class="price-name">{translate key="Price"}:</span> {/if} {if $product->specialOffer}
                                        <del>{currency value=$product->defaultStock->getPrice(true)}</del>
                                        <em {if $skin_settings->global->pricemode == '1'}class="no-color"{/if}>{currency value=$product->defaultStock->getSpecialOfferPrice(true) ceil=2}</em> {else}
                                        <em {if $skin_settings->global->pricemode == '1'}class="no-color"{/if}>{currency value=$product->defaultStock->getPrice(true) ceil=2}</em> {/if}
                                    </div>
                                    {/if} {/if} {if $product->getRichSnippetForAvailability() == 'instore_only'}
                                    <link itemprop="availability" href="{$schema}://schema.org/InStoreOnly" /> {elseif $product->getRichSnippetForAvailability() == 'out_of_stock'}
                                    <link itemprop="availability" href="{$schema}://schema.org/OutOfStock" /> {else}
                                    <link itemprop="availability" href="{$schema}://schema.org/InStock" /> {/if} {if floatval($product->product->other_price)}
                                    <div class="otherprice">
                                        <span class="otherprice-name">{translate key="Price in other shops"}:</span>
                                        <em>{currency value=$product->product->other_price ceil=2}</em>
                                    </div>
                                    {/if}

                                </div>
                                <!-- basket -->
                            </div>
                            <!-- bottomborder -->

                        </div>
                        <!-- product-meta -->
                    </div>
                    <!-- col-sm-5 -->
                    <div class="col-md-2 row">
                        <div class="ymal-related-products">
                            {include file="product/related.tpl"}
                        </div>


                    </div>
                    <!-- col-md-1-->
                </div>
                <!-- maininfo -->
            </div>
            <!-- innerbox -->

            <div class="product-desc">
                {include file="product/description.tpl"} {include file="product/attributes.tpl"}
            </div>

            <div class="product-comments">
                {include file="product/comments.tpl"}
            </div>


        </div>
        <!-- box_productfull -->

    </div>
    <!-- content-wrapper -->

    {if $category_link == '/pl/kategoria/alkohole-alkohole-mocne' || $category_link == '/pl/kategoria/alkohole-wina' || $category_link == '/pl/kategoria/alkohole-kieliszki' || $category_link == '/pl/kategoria/alkohole-degustacje' || $category_link == '/pl/c/USA/113' || $category_link == '/pl/c/Irlandia/112' || $category_link == '/pl/c/Swiat/142' || $category_link == '/pl/c/Cognac/121' || $category_link == '/pl/c/Szwecja/116' || $category_link == '/pl/c/Japonia/115' || $category_link == '/pl/c/Inne/120' || $category_link == '/pl/c/Wina/110' || $category_link == '/pl/c/Nowa-Zelandia/129' || $category_link == '/pl/c/Niemcy/130' || $category_link == '/pl/c/Austria/135' || $category_link == '/pl/c/Australia/128' || $category_link == '/pl/c/USA/125' || $category_link == '/pl/c/Chile/127' || $category_link == '/pl/c/Wlochy/119' || $category_link == '/pl/c/Portugalia/123' || $category_link == '/pl/c/Francja/117' || $category_link == '/pl/c/Hiszpania/118' || $category_link == '/pl/c/Wegry/124' || $category_link == '/pl/c/Argentyna/126' || $category_link == '/category/spirits' || $category_link == '/en_GB/c/Liquors/148' || $category_link == '/en_GB/c/Single-malt/150' || $category_link == '/en_GB/c/Single-malt/111' || $category_link == '/en_GB/c/Blended-whisky/145' || $category_link == '/en_GB/c/Independent-bottling/122' || $category_link == '/en_GB/c/USA/113' || $category_link == '/en_GB/c/Ireland/112' || $category_link == '/en_GB/c/Cognac/121' || $category_link == '/en_GB/c/Other/120' || $category_link == '/en_GB/c/Wine/110' || $category_link == '/en_GB/c/New-Zealand/129' || $category_link == '/pl/c/Alkohole/108' || $category_link == '/en_GB/c/Germany/130' || $category_link == '/en_GB/c/Austria/135' || $category_link == '/en_GB/c/Australia/128' || $category_link == '/en_GB/c/USA/125' || $category_link == '/en_GB/c/Chile/127' || $category_link == '/en_GB/c/Italy/119' || $category_link == '/en_GB/c/Portugal/123' || $category_link == '/en_GB/c/France/117' || $category_link == '/en_GB/c/Spain/118' || $category_link == '/en_GB/c/Hungary/124' || $category_link == '/en_GB/c/Argentina/126' || $category_link == '/pl/c/Alkohole/108'}
    <div id="age-modal-wrapper" class="displaynone">
        <div class="age-wrapper clearfix">
            <div class="age-content clearfix">
                <h2>{translate key="Komunikat"}</h2>
                <p>{translate key='I declare that I am an adult authorized to legally purchase alcohol in my country.'}</p>
                <div class="buttons clearfix">
                    <button class="yes">{translate key='Yes'}</button>
                    <button class="no">{translate key='No'}</button>
                </div>
            </div>
        </div>
    </div>
    {else} {/if} {else}
    <div class="alert-error alert">
        <p>{translate key="This product is not available."}</p>
    </div>
    {/if}


    <script type="text/javascript">
        try {
            literal
        } {
            {
                /literal} Shop.values.OptionsConfiguration = "{$options_configuration|escape}"; Shop.values.OptionsDefault = "{$options_default|escape}"; Shop.values.OptionCurrentStock = "{$stock_id|escape}"; Shop.values.optionCurrentVirt = "default"; Shop.values.OptionImgWidth = "{$skin_settings->img->big|escape}"; Shop.values.OptionImgHeight = "0"; {literal}}{/literal
            } catch (e) {
                literal
            } {} {
                /literal}

                {
                    literal
                }
                $(function () {
                    // clone the delivery row element and show it if monogram inputted
                    var orig_delivery_row = $(".delivery");
                    var monogram_delivery_row = orig_delivery_row.clone()
                        .removeClass('delivery').attr('id', 'monogram_delivery').hide();

                    orig_delivery_row.after(monogram_delivery_row);

                    monogram_delivery_row.find('.second').html('14 dni');

                    $("label:contains('Monogram')").parent().siblings().find('input')
                        .attr('maxlength', 10)
                        .on('keyup', function () {
                            if ($(this).val().length > 0) {
                                monogram_delivery_row.show();
                                orig_delivery_row.hide();
                            } else {
                                monogram_delivery_row.hide();
                                orig_delivery_row.show();
                            }
                        });
                }); {
                    /literal}
    </script>
    {include file='footerbox.tpl'} {include file='footer.tpl' force_include_cache='1' force_include_cache_tags='Logic_SkinFooterGroupList,Logic_SkinFooterLinkList,Logic_SkinFooterGroup,Logic_SkinFooterLink'} {plugin module=shop template=footer} {if $xfbml}
    <div id="fb-root"></div>
    <script type="text/javascript">
        if ($('#box_facebookchat')) $('#box_facebookchat').html('<fb:comments width="' + $('#box_facebookchat').width() + '" href="{route full=true function='
            product ' key=$product->product->product_id productName=$product->translation->name productId=$product->product->product_id}" num_posts="10"></fb:comments>');
    </script>
    <script src="//connect.facebook.net/{lang key='long'}/all.js#xfbml=1"></script>
    {/if} {if 1 == $skin_settings->productdetails->google_p1}
    <script type="text/javascript" src="https://apis.google.com/js/plusone.js">
        {
            literal
        } {
            {
                /literal}lang: '{lang key='short'}'{literal}}{/literal
            }
    </script>
    {/if} {if 1 == $skin_settings->productdetails->pinit}
    <script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
    {/if} {include file='switch.tpl'}

    </body>

    </html>




    {else} {include file='header.tpl'}
    <body{if $body_id} id="{$body_id|escape}" {/if}{if $body_class} class="{$body_class|escape}" {/if}>

        {literal}
        <!-- Google Tag Manager -->
        <noscript>
            <iframe src="//www.googletagmanager.com/ns.html?id=GTM-ML92MV" height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
        <script>
            (function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    '//www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-ML92MV');
        </script>
        <!-- End Google Tag Manager -->
        {/literal} {include file='body_head.tpl'}
        <div class="content-wrapper container clearfix" itemscope itemtype="{$schema}://schema.org/Product">


            {if 1 == $product->translation->active || $adminPreview == true}
            <div id="box_productfull">
                <h1 class="name" itemprop="name">{$product->translation->name|escape}</h1>

                <div class="innerbox" data-loading="{translate key=" Uploading file "}...">
                    <div class="maininfo clearfix">
                        {include file='product/gallery.tpl'}
                        <div class="product-meta">
                            <div class="bottomborder row">
                                <div class="basket" itemprop="offers" itemscope itemtype="{$schema}://schema.org/Offer">
                                    <form class="form-basket{if false == $product->canBuyStock()} none{/if}{if $loyalty_exchange} loyaltyexchange{/if}" method="post" action="{route key=$basketAddRoute stockId='post'}" enctype="multipart/form-data">
                                        {assign var=options value=$product->getOptionsConfigurationStruct()} {if $product->product->group_id && count($options)}
                                        <div class="stocks">
                                            {foreach from=$options item=option}
                                            <div class="row clearfix">
                                                <div class="label">
                                                    <label for="option_{$option.id|escape}" class="label">
                                                        {$option.name|escape}{if 1 == $option.required}<em class="color">*</em>{/if}:
                                                    </label>
                                                </div>
                                                <div class="stock-options f-grid-6">
                                                    {switch expr=$option.type} {case expr='file'}
                                                    <div class="option_{$option.type|escape}{if 1 == $option.stock} option_truestock{/if}{if 1 == $option.required} option_required{/if}">
                                                        <input type="file" id="option_{$option.id|escape}" name="option_{$option.id|escape}" />
                                                    </div>
                                                    {/case} {case expr='text'}
                                                    <div class="option_{$option.type|escape}{if 1 == $option.stock} option_truestock{/if}{if 1 == $option.required} option_required{/if}">
                                                        <div class="shaded_inputwrap inputwrap">
                                                            <input type="text" id="option_{$option.id|escape}" name="option_{$option.id|escape}" value="" />
                                                        </div>
                                                    </div>
                                                    {/case} {case expr='checkbox'}
                                                    <div class="option_{$option.type|escape}{if 1 == $option.stock} option_truestock{/if}{if 1 == $option.required} option_required{/if}">
                                                        <span class="checkbox-wrap-yesno">
                                                        <input type="checkbox" id="option_{$option.id|escape}" name="option_{$option.id|escape}" value="1" />
                                                        <label data-yes="{translate key="TAK"}" data-no="{translate key="NIE"}" for="option_{$option.id|escape}"></label>
                                                    </span>
                                                    </div>
                                                    {/case} {case expr='radio'}
                                                    <div class="option_{$option.type|escape}{if 1 == $option.stock} option_truestock{/if}{if 1 == $option.required} option_required{/if}">
                                                        {foreach from=$option.values item=value}
                                                        <span class="radio-wrap">
                                                        <input type="radio" id="option_{$option.id|escape}_{$value.id|escape}" name="option_{$option.id|escape}" value="{$value.id|escape}" />
                                                        <label for="option_{$option.id|escape}_{$value.id|escape}"></label>
                                                    </span>
                                                        <label for="option_{$option.id|escape}_{$value.id|escape}">{$value.name|escape}</label>
                                                        <br /> {/foreach}
                                                    </div>
                                                    {/case} {case expr='color'}
                                                    <div class="option_{$option.type|escape}{if 1 == $option.stock} option_truestock{/if}{if 1 == $option.required} option_required{/if}">
                                                        <select id="option_{$option.id|escape}" name="option_{$option.id|escape}">
                                                            <option value="" title="">{translate key='(choose)'}</option>
                                                            {foreach from=$option.values item=value}
                                                            <option value="{$value.id|escape}" title="{$value.color|escape}">{$value.name|escape}</option>
                                                            {/foreach}
                                                        </select>
                                                    </div>
                                                    {/case} {case expr='select'}
                                                    <div class="option_{$option.type|escape}{if 1 == $option.stock} option_truestock{/if}{if 1 == $option.required} option_required{/if}">
                                                        <select id="option_{$option.id|escape}" name="option_{$option.id|escape}">
                                                            {if 0 == $option.stock}
                                                            <option value="" title="">{translate key='(choose)'}</option>
                                                            {/if} {foreach from=$option.values item=value}
                                                            <option value="{$value.id|escape}">{$value.name|escape}</option>
                                                            {/foreach}
                                                        </select>
                                                    </div>
                                                    {/case} {/switch}
                                                </div>
                                            </div>
                                            {/foreach}
                                        </div>
                                        {/if}

                                        <span class="monogram-info">{translate key="monogram-info"}</span>


                                        <fieldset{if false==$ enablebasket || 0==( int) $product->defaultStock->availability->availability->can_buy} class="none clearfix"{else} class="clearfix"{/if}>
                                            <div class="quantity_wrap">
                                                <span class="quantity_name">{translate key="quantity"}</span>
                                                <span class="number-wrap">
                                                <input name="quantity" value="{float precision=$QUANTITY_PRECISION value=1 trim=true}" type="text" class="short inline">
                                            </span>
                                                <span class="unit">{$product->unit->translation->name|escape}</span>
                                                <input type="hidden" value="{$stock_id|escape}" name="stock_id">
                                                <input type="hidden" value="1" name="nojs">
                                            </div>
                                            <div class="button_wrap">
                                                <button type="submit" class="addtobasket btn btn-red">
                                                    <span>{if $loyalty_exchange}{translate key="Exchange"}{else}{translate key="Add to the basket"}{/if}</span>
                                                </button>

                                                {if false !== $loyalty_points && !$loyalty_exchange}
                                                <span class="loyalty_points{if 0 == $loyalty_points} none{/if}">
                                                {translate key="You earn %s%s%s points [%s?%s]" p1='<span class="points">' p2=$loyalty_points p3='</span>' p4='<span class="tooltip_pointer">' p5='</span>'}
                                                <label class="tooltip" id="loyalty_msg">
                                                    {if $loyalty_msg_title}
                                                    <p class="title">{$loyalty_msg_title|escape}</p>
                                                    {/if} {foreach from=$loyalty_msgs item=loyalty_msg}
                                                    <p>{$loyalty_msg|escape}</p>
                                                    {/foreach}
                                                </label>
                                                </span>
                                                {/if}
                                            </div>
                                            </fieldset>
                                    </form>
                                    {if $loyalty_exchange}
                                    <div class="price clearfix">
                                        <span class="price-name">{translate key="Price"}:</span>
                                        <em>{$product->defaultStock->loyaltyPointsPrice(true)|escape}</em>
                                    </div>
                                    {elseif $showprices} {if $skin_settings->global->pricemode == '1' || $skin_settings->global->pricemode == '3'}
                                    <div class="price clearfix">
                                        <span class="price-name">{translate key="Price"}:</span>
                                        <div class="price-value">
                                            {if $product->specialOffer}
                                            <em class="color main-price">{currency value=$product->defaultStock->getSpecialOfferPrice()}</em>
                                            <del>{currency value=$product->defaultStock->getPrice()}</del>
                                            <span class="none" itemprop="price">
                                            {$product->defaultStock->getSpecialOfferPrice()}
                                        </span> {else}
                                            <em class="main-price">{currency float_currency=1 value=$product->defaultStock->getPrice()}</em>
                                            <del class="none"></del>
                                            <span class="none" itemprop="price">
                                            {$product->defaultStock->getPrice()}
                                        </span> {/if}
                                            <span class="none" itemprop="priceCurrency">{currencyName short=true}</span>
                                        </div>
                                    </div>
                                    {/if} {if $skin_settings->global->pricemode == '1' || $skin_settings->global->pricemode == '2'}
                                    <div class="price-netto">
                                        {if $skin_settings->global->pricemode == '1'}
                                        <span class="price-name">{translate key="Net price"}:</span> {else}
                                        <span class="price-name">{translate key="Price"}:</span> {/if} {if $product->specialOffer}
                                        <del>{currency value=$product->defaultStock->getPrice(true)}</del>
                                        <em {if $skin_settings->global->pricemode == '1'}class="no-color"{/if}>{currency value=$product->defaultStock->getSpecialOfferPrice(true) ceil=2}</em> {else}
                                        <em {if $skin_settings->global->pricemode == '1'}class="no-color"{/if}>{currency value=$product->defaultStock->getPrice(true) ceil=2}</em> {/if}
                                    </div>
                                    {/if} {/if} {if $product->getRichSnippetForAvailability() == 'instore_only'}
                                    <link itemprop="availability" href="{$schema}://schema.org/InStoreOnly" /> {elseif $product->getRichSnippetForAvailability() == 'out_of_stock'}
                                    <link itemprop="availability" href="{$schema}://schema.org/OutOfStock" /> {else}
                                    <link itemprop="availability" href="{$schema}://schema.org/InStock" /> {/if} {if floatval($product->product->other_price)}
                                    <div class="otherprice">
                                        <span class="otherprice-name">{translate key="Price in other shops"}:</span>
                                        <em>{currency value=$product->product->other_price ceil=2}</em>
                                    </div>
                                    {/if}

                                </div>
                                <!-- basket -->
                            </div>
                            <!-- bottomborder -->
                            <div class="availability">
                                {if $product->defaultStock && ( 1 == $skin_settings->productdetails->availability || ( 1 == $skin_settings->productdetails->time && $product->canBuyStock() ) )} {if 1 == $skin_settings->productdetails->availability && $product->defaultStock->availability && $product->defaultStock->availability->translation}
                                <div class="row clearfix availability">
                                    <span class="first">{translate key="Availability"}:</span> {if $product->defaultStock->availability->availability->photo}
                                    <img src="{baseDir}/{$product->defaultStock->availability->getUrl()}" alt=""> {/if}
                                    <span class="second">{$product->defaultStock->availability->translation->name}</span>
                                </div>
                                {/if} {if $product->canBuyStock() && 1 == $skin_settings->productdetails->time && $product->defaultStock->delivery}
                                <div class="row clearfix delivery">
                                    <span class="first">{translate key="Shipment date:"}</span>
                                    <span class="second">{$product->defaultStock->delivery->translation->name|escape}</span>
                                </div>
                                {/if} {/if} {if 1 == $skin_settings->productdetails->score || 1 == $skin_settings->productdetails->producer || 1 == $skin_settings->productdetails->code || 1 == $skin_settings->productdetails->storage || 1 == $skin_settings->productdetails->recommend || ($can_comment && 1 == $skin_settings->productdetails->comments) }

                                <div class="productdetails-more-details">
                                    {if 1 == $skin_settings->productdetails->score || 1 == $skin_settings->productdetails->producer || 1 == $skin_settings->productdetails->code}
                                    <div class="productdetails-more">
                                        {if 1 == $skin_settings->productdetails->score}
                                        <div class="row evaluation row clearfix" itemprop="aggregateRating" itemscope itemtype="{$schema}://schema.org/AggregateRating">
                                            <span class="first">{translate key="Evaluation"}:</span>
                                            <span class="second">
                                            <span class="votestars"{if $can_vote} id="votestars_{$product->getIdentifier()|escape}"{/if}>
                                                {foreach from=$vote_stars item=star name=list}
                                                <img src="{baseDir}/public/images/1px.gif" alt="" class="px1 star{$star|replace:'.':'-'}">
                                                {/foreach}
                                            </span>
                                            <span class="none" itemprop="ratingValue">
                                                {$product->vote->rate}
                                            </span>
                                            <span class="votecount">({translate key="Your score"}: <b itemprop="reviewCount">{if $product->vote->votes}{$product->vote->votes|escape|replace:'.':'-'}{else}0{/if}</b>)</span>
                                            </span>
                                        </div>
                                        {/if} {if 1 == $skin_settings->productdetails->producer}
                                        <div class="row clearfix manufacturer">
                                            <span class="first">{translate key="Manufacturer"}: </span>
                                            <span class="second">
                                            {$category_id}
                                            {if $product->product->producer_id}
                                            {if $product->producer->manufacturer->web}
                                            <a class="brand popup" href="{$product->producer->manufacturer->web}" title="{$product->producer->manufacturer->name|escape}">
                                                {else}
                                                <a class="brand" href="{route function='producer' key=$product->producer->getIdentifier() producerName=$product->producer->manufacturer->name producerId=$product->producer->getIdentifier()
                                                                       page=1 sort=1 view=$view}" title="{$product->producer->manufacturer->name|escape}">
                                                    {/if}
                                                    {if $product->producer->manufacturer->gfx}
                                                    <img src="{baseDir}/{$product->producer->getUrl()}" alt="{$product->producer->manufacturer->name|escape}" />
                                                    {else}
                                                    {$product->producer->manufacturer->name|escape}
                                                    {/if}
                                                </a>
                                                {else}
                                                -
                                                {/if}
                                                </span>
                                        </div>
                                        {/if}
                                    </div>
                                    {/if}
                                </div>
                                <!-- productdetails-more-details -->
                                {/if}

                            </div>
                            <!-- availability -->



                        </div>
                        <!-- product-meta -->
                    </div>
                    <!-- maininfo -->
                </div>
                <!-- innerbox -->

                <div class="product-desc">
                    {include file="product/description.tpl"} {include file="product/attributes.tpl"}
                </div>

                <div class="related-products">

                    {include file="product/related.tpl"}

                </div>

                <div class="product-comments">
                    {include file="product/comments.tpl"}
                </div>

            </div>
            <!-- box_productfull -->


        </div>
        <!-- content-wrapper -->

        {if $category_link == '/pl/kategoria/alkohole-alkohole-mocne' || $category_link == '/pl/kategoria/alkohole-wina' || $category_link == '/pl/kategoria/alkohole-kieliszki' || $category_link == '/pl/kategoria/alkohole-degustacje' || $category_link == '/pl/c/USA/113' || $category_link == '/pl/c/Irlandia/112' || $category_link == '/pl/c/Swiat/142' || $category_link == '/pl/c/Cognac/121' || $category_link == '/pl/c/Szwecja/116' || $category_link == '/pl/c/Japonia/115' || $category_link == '/pl/c/Inne/120' || $category_link == '/pl/c/Wina/110' || $category_link == '/pl/c/Nowa-Zelandia/129' || $category_link == '/pl/c/Niemcy/130' || $category_link == '/pl/c/Austria/135' || $category_link == '/pl/c/Australia/128' || $category_link == '/pl/c/USA/125' || $category_link == '/pl/c/Chile/127' || $category_link == '/pl/c/Wlochy/119' || $category_link == '/pl/c/Portugalia/123' || $category_link == '/pl/c/Francja/117' || $category_link == '/pl/c/Hiszpania/118' || $category_link == '/pl/c/Wegry/124' || $category_link == '/pl/c/Argentyna/126' || $category_link == '/category/spirits' || $category_link == '/en_GB/c/Liquors/148' || $category_link == '/en_GB/c/Single-malt/150' || $category_link == '/en_GB/c/Single-malt/111' || $category_link == '/en_GB/c/Blended-whisky/145' || $category_link == '/en_GB/c/Independent-bottling/122' || $category_link == '/en_GB/c/USA/113' || $category_link == '/en_GB/c/Ireland/112' || $category_link == '/en_GB/c/Cognac/121' || $category_link == '/en_GB/c/Other/120' || $category_link == '/en_GB/c/Wine/110' || $category_link == '/en_GB/c/New-Zealand/129' || $category_link == '/pl/c/Alkohole/108' || $category_link == '/en_GB/c/Germany/130' || $category_link == '/en_GB/c/Austria/135' || $category_link == '/en_GB/c/Australia/128' || $category_link == '/en_GB/c/USA/125' || $category_link == '/en_GB/c/Chile/127' || $category_link == '/en_GB/c/Italy/119' || $category_link == '/en_GB/c/Portugal/123' || $category_link == '/en_GB/c/France/117' || $category_link == '/en_GB/c/Spain/118' || $category_link == '/en_GB/c/Hungary/124' || $category_link == '/en_GB/c/Argentina/126' || $category_link == '/pl/c/Alkohole/108'}
        <div id="age-modal-wrapper" class="displaynone">
            <div class="age-wrapper clearfix">
                <div class="age-content clearfix">
                    <h2>{translate key="Komunikat"}</h2>
                    <p>{translate key='I declare that I am an adult authorized to legally purchase alcohol in my country.'}</p>
                    <div class="buttons clearfix">
                        <button class="yes">{translate key='Yes'}</button>
                        <button class="no">{translate key='No'}</button>
                    </div>
                </div>
            </div>
        </div>
        {else} {/if} {else}
        <div class="alert-error alert">
            <p>{translate key="This product is not available."}</p>
        </div>
        {/if}

        <script type="text/javascript">
            try {
                literal
            } {
                {
                    /literal} Shop.values.OptionsConfiguration = "{$options_configuration|escape}"; Shop.values.OptionsDefault = "{$options_default|escape}"; Shop.values.OptionCurrentStock = "{$stock_id|escape}"; Shop.values.optionCurrentVirt = "default"; Shop.values.OptionImgWidth = "{$skin_settings->img->big|escape}"; Shop.values.OptionImgHeight = "0"; {literal}}{/literal
                } catch (e) {
                    literal
                } {} {
                    /literal}

                    {
                        literal
                    }
                    $(function () {
                        // clone the delivery row element and show it if monogram inputted
                        var orig_delivery_row = $(".delivery");
                        var monogram_delivery_row = orig_delivery_row.clone()
                            .removeClass('delivery').attr('id', 'monogram_delivery').hide();

                        orig_delivery_row.after(monogram_delivery_row);

                        monogram_delivery_row.find('.second').html('14 dni');

                        $("label:contains('Monogram')").parent().siblings().find('input')
                            .attr('maxlength', 10)
                            .on('keyup', function () {
                                if ($(this).val().length > 0) {
                                    monogram_delivery_row.show();
                                    orig_delivery_row.hide();
                                } else {
                                    monogram_delivery_row.hide();
                                    orig_delivery_row.show();
                                }
                            });
                    }); {
                        /literal}
        </script>
        {include file='footerbox.tpl'} {include file='footer.tpl' force_include_cache='1' force_include_cache_tags='Logic_SkinFooterGroupList,Logic_SkinFooterLinkList,Logic_SkinFooterGroup,Logic_SkinFooterLink'} {plugin module=shop template=footer} {if $xfbml}
        <div id="fb-root"></div>
        <script type="text/javascript">
            if ($('#box_facebookchat')) $('#box_facebookchat').html('<fb:comments width="' + $('#box_facebookchat').width() + '" href="{route full=true function='
                product ' key=$product->product->product_id productName=$product->translation->name productId=$product->product->product_id}" num_posts="10"></fb:comments>');
        </script>
        <script src="//connect.facebook.net/{lang key='long'}/all.js#xfbml=1"></script>
        {/if} {if 1 == $skin_settings->productdetails->google_p1}
        <script type="text/javascript" src="https://apis.google.com/js/plusone.js">
            {
                literal
            } {
                {
                    /literal}lang: '{lang key='short'}'{literal}}{/literal
                }
        </script>
        {/if} {if 1 == $skin_settings->productdetails->pinit}
        <script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
        {/if} {include file='switch.tpl'}

        <div class="ks-test">
            {$category_link}
        </div>
        </body>

        </html>
        {/if}