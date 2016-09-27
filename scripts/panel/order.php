{include file='header.tpl'}
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
    <div class="container content-wrapper clearfix">

        <div class="box" id="box_order">
            <h2 class="page-title">{translate key="Order details"} (id: {$order->getIdentifier()})</h2> {assign var=id value=$order->getIdentifier()}
            <div class="order-details">
                <div class="row clearfix">
                    <span class="label">{translate key='Order No.'}</span>
                    <span class="value">{$id|escape}</span>
                </div>
                <div class="row clearfix">
                    <span class="label">{translate key='Status'}</span>
                    <span class="value">{$order->status->translation->name|escape}</span>
                </div>
                <div class="row clearfix">
                    <span class="label">{translate key='Order placement date'}</span>
                    <span class="value">{date value=$order->order->date}</span>
                </div>
                {if $config_confirm}
                <div class="row clearfix">
                    <span class="label">{translate key='E-mail confirmation'}</span>

                    <span class="value">
                        {if 1 == $order->order->confirm}
                        <span class="confirmed">{translate key='confirmed'}</span> {else}
                    <span class="notconfirmed">{translate key='none!'}</span> {/if}
                    </span>
                </div>
                {/if}
                <div class="row clearfix">
                    <span class="label">{translate key='Payment'}</span>
                    <span class="value">{$order->payment->translation->title|escape}</span>
                </div>
                <div class="row clearfix">
                    <span class="label">{translate key='Delivery'}</span>
                    <span class="value">{$order->shipping->translation->name|escape}</span>
                </div>
                {if $order->invoice && true == $show_invoice}
                <div class="row clearfix">
                    <span class="label">{translate key='Invoice'}</span>
                    <span class="value"><a href="{baseDir}/console/invoices/pdf/id/{$order->invoice->invoice->invoice_id}{if $token}/token/{$token|escape}{/if}">{translate key='display'}</a></span>
                </div>
                {/if} {if count($order->parcels) > 0}
                <div class="row clearfix">
                    <span class="label">{translate key='Package'}</span>
                    <span class="value">
                        {foreach from=$order->parcels item=parcel}
                        {if strlen($parcel->getTraceLink())}
                        <a href="{$parcel->getTraceLink()}" class="trace popup">{$parcel->parcel->shipping_code|escape}</a>
                        <span class="date">({translate key='shipped:'} {date value=$parcel->parcel->send_date})</span>
                    <br /> {/if} {/foreach}
                    </span>
                </div>
                {/if} {if $order->order->notes_pub}
                <div class="row clearfix">
                    <span class="label">{translate key='Comments'}</span>
                    <span class="value">{$order->order->notes_pub|escape}</span>
                </div>
                {/if}
            </div>

            <div class="clearfix">
                <ul class="address-list">
                    {assign var=address value=$order->billingAddress}
                    <li><strong>{translate key='Invoicing address'}</strong></li>
                    {if $address->firstname || $address->lastname}
                    <li>
                        {if $address->firstname} {$address->firstname|escape} {/if} {if $address->lastname} {$address->lastname|escape} {/if}
                    </li>
                    {/if} {if $address->company}
                    <li>{$address->company|escape}</li>
                    {/if} {if $address->tax_id}
                    <li>{translate key='NIP No.:'} {$address->tax_id|escape}</li>
                    {/if} {if $address->pesel}
                    <li>{translate key='PESEL:'} {$address->pesel|escape}</li>
                    {/if} {if $address->street1}
                    <li>{$address->street1|escape}</li>
                    {/if} {if $address->postcode || $address->city}
                    <li>
                        {if $address->postcode} {$address->postcode|escape}, {/if} {if $address->city} {$address->city|escape} {/if}
                    </li>
                    {/if} {if $address->country}
                    <li>{$address->country|escape}</li>
                    {/if} {if $address->phone}
                    <li>{$address->phone|escape}</li>
                    {/if}
                    </li>
                </ul>
                <ul class="address-list">
                    {assign var=address value=$order->deliveryAddress}
                    <li><strong>{translate key='Delivery address'}</strong></li>
                    {if $address->firstname || $address->lastname}
                    <li>
                        {if $address->firstname} {$address->firstname|escape} {/if} {if $address->lastname} {$address->lastname|escape} {/if}
                    </li>
                    {/if} {if $address->company}
                    <li>
                        {$address->company|escape}
                    </li>
                    {/if} {if $address->tax_id}
                    <li>{translate key='NIP No.:'} {$address->tax_id|escape}</li>
                    {/if} {if $address->street1}
                    <li>{$address->street1|escape}</li>
                    {/if} {if $address->postcode || $address->city}
                    <li>
                        {if $address->postcode} {$address->postcode|escape}, {/if} {if $address->city} {$address->city|escape} {/if}
                    </li>
                    {/if} {if $address->country}
                    <li>{$address->country|escape}</li>
                    {/if} {if $address->phone}
                    <li>{$address->phone|escape}</li>
                    {/if}
                </ul>
            </div>


            <h3 class="boxtitle">{translate key='Ordered products'}</h3>
            <table class="products classic zebra table">
                <thead>
                    <tr>
                        <th class="name">{translate key='Name'}</th>
                        <th class="quantity">{translate key='Quantity'}</th>
                        <th class="price">{translate key='Price'}</th>
                        <th class="sum">{translate key='Value'}</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr class="sum">
                        <td class="label" colspan="3">{translate key='Total'}:</td>
                        <td class="value">{currency value=$order->sumProductsCost()}</td>
                    </tr>

                    <tr class="shipping">
                        <td class="label" colspan="3">{translate key='Delivery cost'}:</td>
                        <td class="value">{currency value=$order->order->shipping_cost}</td>
                    </tr>

                    {if $order->sumDiscounts() > 0}
                    <tr class="discount">
                        <td class="label" colspan="3">{translate key='Granted discount:'}</td>
                        <td class="value">{currency value=$order->sumDiscounts()}</td>
                    </tr>
                    {/if}

                    <tr class="topay">
                        <td class="label" colspan="3">{translate key='Amount to be paid'}:</td>
                        <td class="value">{currency value=$order->sumOrder()}</td>
                    </tr>
                </tfoot>

                <tbody>
                    {foreach from=$order->products item=product name=list}
                    <tr class="{if $smarty.foreach.list.index % 2}odd{else}even{/if}">
                        <td class="name">{$product->product->name|escape}{if $product->product->option}, <span class="variant">{$product->product->option|escape}</span>{/if}</td>
                        <td class="quantity">{float value=$product->product->quantity}</td>
                        <td class="price">{currency value=$product->product->price}</td>
                        <td class="sum">{currency value=$product->getPriceTimesQuantity(false)}</td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>

            {if $order->sumOrder()*100 > $order->order->paid*100 && $order->hasOnlinePayment()} {assign var=onlinepayment value=$order->getOnlinePayment()} {if !$onlinepayment->isFinished() or !$onlinepayment->isStarted()}
            <form action="{route key='panelPayment' orderId=$id token=$token}" method="get" class="form-horizontal">
                <fieldset>
                    <div class="bottombuttons clearfix single">
                        {if !$onlinepayment->isFinished() and $onlinepayment->isStarted()} {translate key='Your payment is processed'}
                        <button class="btn btn-red2 important pay" type="submit">
                            <span>{translate key='Pay again'}</span>
                        </button>
                        {else}
                        <button class="btn btn-red2 important pay" type="submit">
                            <span>{translate key='Pay'}</span>
                        </button>
                        {/if}
                    </div>
                </fieldset>
            </form>
            {/if} {/if}

        </div>

    </div>
    {include file='footerbox.tpl'} {include file='footer.tpl' force_include_cache='1' force_include_cache_tags='Logic_SkinFooterGroupList,Logic_SkinFooterLinkList,Logic_SkinFooterGroup,Logic_SkinFooterLink'} {plugin module=shop template=footer} {include file='switch.tpl'}
    </body>

    </html>