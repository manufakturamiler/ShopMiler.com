{include file='header.tpl'}
<body{if $body_id} id="{$body_id|escape}" {/if}{if $body_class} class="{$body_class|escape}" {/if}>

    {literal}

    <script>
        dataLayer = [{
        'transactionId': '{order_id}',
        'transactionTotal': '{sum}',
        'transactionTax': '{tax}',
        'transactionShipping': '{shipping}',
        'transactionProducts': [{
            'sku': '{products.product_id}',
            'name': '{products.no}',
            'category': '{products.category}',
            'price': '{products.price}',
            'quantity': '{products.quantity}',
            }]
        }]

        }];
    </script>

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
    {/literal} {include file='body_head_checkout.tpl'}
    <div class="container content-wrapper clearfix">
        <div class="box unibox" id="box_basketsummary">
            <table class="productlist table zebra classic">
                <thead>
                    <tr>
                        <th class="rwd-hide-medium rwd-hide-small img"></th>
                        <th class="name">{translate key="Product"}</th>
                        {if $showDelivery}
                        <th class="time">{translate key="Order delivery date"}</th>
                        {/if}
                        <th class="quantity">{translate key="Quantity"}</th>
                        <th class="price">{translate key="Price"}</th>
                        <th class="sum">{translate key="Value"}</th>
                    </tr>
                </thead>

                <tbody>
                    {foreach from=$user->basket item=basket_product}
                    <tr>
                        <td class="img rwd-hide-medium rwd-hide-small">
                            <img src="{imageUrl type='productGfx' width=75 height=75 image=$basket_product->stock->mainImageName() overlay=1}" alt="{$basket_product->product->translation->name|escape}">
                        </td>
                        <td class="name">
                            <a href="{route function='product' key=$basket_product->product->product->product_id productName=$basket_product->product->translation->name
                                     productId=$basket_product->product->product->product_id}" title="{$basket_product->product->translation->name|escape}">{$basket_product->product->translation->name|escape}</a>
                            <span class="variant">{$basket_product->getName()|escape}</span>
                        </td>
                        {if $showDelivery}
                        <td class="time">{$basket_product->stock->delivery->translation->name|escape}</td>
                        {/if}
                        <td class="quantity">
                            {assign var=id value=$basket_product->getIdentifier()} {float precision=$QUANTITY_PRECISION value=$basket_product->basket->quantity trim=true} {$basket_product->product->unit->translation->name|escape}
                        </td>
                        <td class="price">{currency value=$basket_product->getPrice()}</td>
                        <td class="sum"><em class="color">{currency value=$basket_product->getPriceForAll()}</em></td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>

            <div class="columns-wrapper clearfix">
                <div class="column two">
                    <h3 class="boxtitle">{translate key="Delivery address"}</h3>
                    <ul class="address-list">
                        {if $data.name2 || $data.surname2}
                        <li>
                            {if $data.name2} {$data.name2|escape} {/if} {if $data.surname2} {$data.surname2|escape} {/if}
                        </li>
                        {/if} {if $data.coname2}
                        <li>{$data.coname2|escape}</li>{/if} {if $data.nip2}
                        <li>{translate key='NIP No.:'} {$data.nip2|escape}</li>{/if} {if $data.other_address2}
                        <li>{$data.other_address2|escape}</li>{/if} {if $data.zip2 || $data.city2}
                        <li>
                            {if $data.zip2} {$data.zip2|escape}, {/if} {if $data.city2} {$data.city2|escape} {/if}
                        </li>{/if} {if $data.country2}
                        <li>{country code=$data.country2}</li>{/if} {if $data.phone2}
                        <li>{$data.phone2|escape}</li>{/if}
                    </ul>
                </div>
                <div class="column two">
                    <h3 class="boxtitle">{translate key="Invoicing address"}</h3>
                    <ul class="address-list">
                        {if 1 == $data.address_type && ($data.name || $data.surname)}
                        <li>
                            {if $data.name} {$data.name|escape} {/if} {if $data.surname} {$data.surname|escape} {/if}
                        </li>
                        {/if} {if $data.coname}
                        <li>{$data.coname|escape}</li>{/if} {if $data.nip}
                        <li>{translate key='NIP No.:'} {$data.nip|escape}</li>{/if} {if $data.other_address}
                        <li>{$data.other_address|escape}</li>{/if} {if $data.zip || $data.city}
                        <li>
                            {if $data.zip} {$data.zip|escape}, {/if} {if $data.city} {$data.city|escape} {/if}
                        </li>
                        {/if} {if $data.pesel}
                        <li>{translate key='PESEL:'} {$data.pesel|escape}</li>{/if} {if $data.country}
                        <li>{country code=$data.country}</li>{/if} {if $data.phone}
                        <li>{$data.phone|escape}</li>{/if}
                    </ul>
                </div>
            </div>

            <div class="order-details">
                {if $delivery}
                <div class="row clearfix">
                    <span class="label">{translate key='Expected shipment date:'}</span>
                    <span class="value">{$delivery->translation->name|escape}</span>
                </div>
                {/if}
                <div class="row clearfix">
                    <span class="label">{translate key='Selected form of delivery:'}</span>
                    <span class="value">{$shipping->translation->name|escape} ({currency value=$shipping->getCost()})</span>
                </div>
                <div class="row clearfix">
                    <span class="label">{translate key='Selected form of payment:'}</span>
                    <span class="value">{$payment->translation->title|escape}</span>
                </div>
                {if $discount_summary > 0}
                <div class="row clearfix">
                    <span class="label">{translate key='Granted discount:'}</span>
                    <span class="value">{currency value=$discount_summary}</span>
                </div>
                {/if} {if $data.comment}
                <div class="row clearfix">
                    <span class="label">{translate key='Comments:'}</span>
                    <span class="value">{$data.comment|escape}</span>
                </div>
                {/if}
                <div class="row sum clearfix">
                    <span class="label">{translate key="Amount to be paid:"}</span>
                    <span class="value">{currency value=$sum}</span>
                </div>
            </div>

            {dynamic} {foreach from=$boxes_bottom_side item=v key=k} {box file="../boxes/$v/box.tpl" box="$k"} {/foreach} {/dynamic}

            <form method="post" action="{route key='basketStep3'}">
                <fieldset>
                    <input type="hidden" name="summaryform" value="1">
                    <div class="bottombuttons clearfix center">
                        <button type="submit" name="button1" value="button1" class="btn undo back">
                            <span>{translate key='Back'}</span>
                        </button>
                        <button type="submit" name="button2" value="button2" class="btn btn-red important order clickhide">
                            <span>{translate key='Confirm order'}</span>
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>

        <script type="text/javascript">
            {
                literal
            }
            $(function () {
                var touched = false; // if we modified "Wysylka w" column
                $("span:contains('Monogram')").each(function (e) {
                    var monogram_text = $(this).text().match(/monogram.*?:\s*(.*)/i)[1];
                    if (monogram_text.length > 0) {
                        touched = true;
                        $(this).parent().next('td').html('14 dni');
                    }
                });

                if (!touched)
                    return;

                var longest = 0;
                $('table.productlist tbody tr').find('td:nth-child(3)').each(function () {
                    var m = $(this).text().match(/(\d+)\s*(\w+)/); // "14 dni" or "24 godziny", etc.
                    if (m && m[1] && m[2]) {
                        var length = parseInt(m[1]);
                        if (m[2] === 'godziny')
                            length /= 24;

                        if (length > longest)
                            longest = length;
                    }
                });

                var display = '24 godziny';
                if (longest > 1)
                    display = longest + ' dni';

                $("span:contains('termin wysyłki')").siblings('.value').text(display);
            }); {
                /literal}
        </script>

    </div>
    {include file='footerbox.tpl'} {include file='footer.tpl' force_include_cache='1' force_include_cache_tags='Logic_SkinFooterGroupList,Logic_SkinFooterLinkList,Logic_SkinFooterGroup,Logic_SkinFooterLink'} {plugin module=shop template=footer} {include file='switch.tpl'}
    </body>

    </html>