{include file='header.tpl'}
<body{if $body_id} id="{$body_id|escape}" {/if}{if $body_class} class="{$body_class|escape}" {/if}>


    {include file='body_head.tpl'}
    <div class="container content-wrapper clearfix">

        {if count($user->basket)}
        <div class="box unibox" id="box_basketlist">
            <h2 class="page-title">{translate key='Contents of your basket'}</h2>
            <form action="{route key='basket'}" method="post">
                {include file='formantispam.tpl'}
                <table class="productlist table zebra">
                    <thead>
                        <tr>
                            <th class="large img">{translate key="Product"}</th>
                            <th class="name">{translate key="Description"}</th>
                            {if $showDelivery}
                            <th class="rwd-hide-medium time">{translate key="Order delivery date"}</th>
                            {/if}
                            <th class="quantity">{translate key="Quantity"}</th>
                            <th class="rwd-hide-small price">{translate key="Price"}</th>
                            <th class="sum">{translate key="Value"}</th>
                            <th class="actions">{translate key="Actions"}</th>
                        </tr>
                    </thead>

                    <tbody>
                        {foreach from=$user->basket item=basket_product}
                        <tr>
                            <td class="img large">
                                <img src="{imageUrl type='productGfx' width=150 height=150 image=$basket_product->stock->mainImageName() overlay=1}" alt="{$basket_product->product->translation->name|escape}" />
                            </td>
                            <td class="name">
                                <a href="{route function='product' key=$basket_product->product->product->product_id productName=$basket_product->product->translation->name
                                         productId=$basket_product->product->product->product_id}" title="{$basket_product->product->translation->name|escape}">{$basket_product->product->translation->name|escape}</a>
                                <span class="variant">{$basket_product->getName()|escape}</span>
                            </td>
                            {if $showDelivery}
                            <td class="rwd-hide-medium time">{$basket_product->stock->delivery->translation->name|escape}</td>
                            {/if}
                            <td class="quantity"><span class="mobile-quantity">{translate key="Quantity"}</span>{assign var=id value=$basket_product->getIdentifier()}
                                <span class="shaded_inputwrap{if true == $quantity_error.$id} error{/if}"><input name="quantity_{$id}" value="{float precision=$QUANTITY_PRECISION value=$quantity.$id trim=true noformat=true}" type="text" class="short center" /></span> {* {$basket_product->product->unit->translation->name|escape} *}
                            </td>
                            <td class="rwd-hide-small price">{currency value=$basket_product->getPrice()}</td>
                            <td class="sum"><em class="color">{currency value=$basket_product->getPriceForAll()}</em></td>
                            <td class="actions">
                                <a href="{route key='basketRemove' basketId=$basket_product->getIdentifier()}" title="{translate key='Remove product from your basket'}" class="prodremove">
                                    <span>{translate key='Usuń'}</span>
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                        {/foreach}
                    </tbody>
                </table>

                <div class="bottombuttons clearfix center">
                    <button type="submit" name="button" value="button" class="btn" id="calculate">
                        <span>{translate key='Calculate'}</span>
                    </button>
                </div>


                <div id="cart-options">

                    <div class="columns-wrapper clearfix">
                        <div class="column two">
                            <div class="delivery-container">
                                <h3 class="boxtitle">{translate key="Shipping method:"}</h3>

                                <div class="deliverycountry{if count($shipping_countries) < 2} none{/if}">
                                    <span colspan="3" class="desc">
                                        {translate key="Shipping country:"}
                                    </span>
                                    <span colspan="3" class="select">
                                        <select name="shipping_country">
                                            {foreach from=$shipping_countries item=c key=k}
                                            <option value="{$k|escape}"{if $k == $shipping_country} selected="selected"{/if}>{$c|escape}</option>
                                            {/foreach}
                                        </select>
                                    </span>
                                    <span class="actions"></span>
                                </div>
                                <br> {foreach from=$shippings item=shipping name=list}
                                <div class="delivery{if $shipping_id == (int) $shipping->getIdentifier()} selected{/if}{if 0 == $smarty.foreach.list.index} first{/if} clearfix">
                                    <span class="name">
                                        <label for="shipping_{$shipping->getIdentifier()}">
                                            <input type="radio" name="shipping_id" id="shipping_{$shipping->getIdentifier()}" value="{$shipping->getIdentifier()}" {if $shipping_id == (int) $shipping->getIdentifier()}checked="checked" {/if}/>
                                            {$shipping->translation->name|escape}
                                            <span class="description">{$shipping->translation->description|escape}</span>
                                    </label>
                                    </span>
                                    <span class="value">
                                        {currency value=$shipping->getCost($user->basket)}
                                    </span>
                                </div>
                                {/foreach}
                            </div>
                            <span class="alert-delivery">{translate key="alert-delivery"}</span>
                        </div>
                        <div class="column two">
                            <div class="payment-container">
                                <h3 class="boxtitle">{translate key="Payment method:"}</h3> {foreach from=$payments item=payment name=list}
                                <div class="payment{if $payment_id == (int) $payment->getIdentifier()} selected{/if}{if 0 == $smarty.foreach.list.index} first{/if} clearfix">
                                    <span class="name">
                                        <label for="payment_{$payment->getIdentifier()}">
                                            <input type="radio" name="payment_id" id="payment_{$payment->getIdentifier()}" value="{$payment->getIdentifier()}" {if $payment_id == (int) $payment->getIdentifier()}checked="checked" {/if}/>
                                            {$payment->translation->title|escape}
                                            {if 'zagiel' == $payment->payment->name && $sum >= 100}
                                            {plugin module=shop template=basket-zagiel}
                                            {/if}
                                            {if 'lukas' == $payment->payment->name && $sum >= 500}
                                            {plugin module=shop template=basket-lukas}
                                            {/if}
                                            <span class="description">{$payment->translation->description|escape}</span>
                                    <span class="additional_cost_percent"></span>
                                    </label>
                                    </span>
                                    <span class="value"></span>
                                </div>
                                {/foreach}
                            </div>
                        </div>
                    </div>

                    <div class="promo-container">
                        {if $showpromocodes}
                        <div class="promocode">
                            <span class="checkbox-wrap">
                                <label for="promocodeshow">
                                    <input id="promocodeshow" type="checkbox" />
                                    {translate key="I have discount coupon"}</label>
                            </span>
                            <span class="input">
                                {if true == $promocode_error || ! $promocode}
                                <div class="shaded_inputwrap{if true == $promocode_error} error{/if}">
                                    <input type="text" value="{$promocode|escape}" name="promocode" class="">
                                </div>
                                {else}
                                {$promocode->promocode->code|escape}
                                {/if}
                            </span>
                            <span class="action">
                                {if true == $promocode_error || ! $promocode}
                                <button type="submit" class="btn">
                                    <span>{translate key="Use"}</span>
                            <i class="icon-ok"></i>
                            </button>
                            {else}
                            <img src="{baseDir}/public/images/1px.gif" alt="" class="px1 tick"> {/if}
                            </span>
                        </div>
                        {/if} {foreach from=$promos item=promo key=key}
                        <div class="promo {$key} clearfix">
                            <span class="desc">
                                {$promo.desc|replace:'%d':$promo.val}:
                            </span>
                            <span class="value">
                                {currency value=$promo.price}
                            </span>
                        </div>
                        {/foreach}
                    </div>

                    <div class="summary-container">

                        <div class="recount clearfix">
                            <span class="desc"><em>{translate key="Total:"}</em></span>
                            <span class="sum">
                                <em class="color">{currency value=$user->basket->sumProducts(false, false)}</em>
                            </span>
                        </div>

                        <div class="deliveryhead clearfix">
                            <span class="desc">
                                <em>{translate key="Cost of delivery:"}</em>
                            </span>
                            <span class="value"><em class="color"></em></span>
                        </div>

                        <div class="sum clearfix">
                            <span class="desc">
                                {translate key="Amount to be paid:"}
                            </span>
                            <span class="value">
                                {currency value=$sum}
                            </span>
                        </div>

                        {if $loyalty_points}
                        <div class="loyalty_points clearfix">
                            <span class="value">
                                {translate key="You earn %s%s%s points" p1='<span class="points">' p2=$loyalty_points p3='</span>'}
                            </span>
                        </div>
                        {/if}
                    </div>

                    <div class="bottombuttons clearfix center">
                        <button type="submit" class="btn back" name="button1" value="button1">
                            <span>{translate key='Continue shopping'}</span>
                        </button>
                        <input type="hidden" name="recount" value="1" />

                        <button type="submit" class="important order btn btn-red" name="button2" value="button2">
                            <span>{translate key='Make order'}</span>
                        </button>
                    </div>
                </div>
            </form>
            {else}
            <div class="alert-info alert">
                <p>{translate key="Your basket is empty."}</p>
            </div>
            {/if}
        </div>
    </div>

    <script type="text/javascript">
        try {
            literal
        } {
            {
                /literal} Shop.values.Country2Shipping = {$country2shipping}; Shop.values.Shipping2Payment = {$shipping2payment}; Shop.values.SumNoShipping = {$sum_noship}; Shop.values.ShippingValue = {$shippingvalue}; Shop.values.PaymentAdditional = {$paymentadditional}; Shop.values.CurrencyMap = "{$currencymap}"; {literal}}{/literal
            } catch (e) {
                literal
            } {} {
                /literal}
    </script>

    <script type="text/javascript">
        {
            literal
        }
        $('select[name=shipping_country]').on('change', function () {
            var payment_label = $(".payment label:contains('Pobranie')");
            if ($(this).find('option:selected').text() != 'Polska' && $(this).find('option:selected').text() != 'Poland') {
                if (payment_label.parent().parent().hasClass('selected')) {
                    payment_label.parent().parent().removeClass('selected');
                    payment_label.children('input').prop('checked', false);
                    $('.payment.first').addClass('selected');
                    $('.payment.first input').prop('checked', true);
                }
                payment_label.parent().parent().hide();
            } else {
                payment_label.parent().parent().show();
            }
        });
        $(function () {
            // modify "Wysylka" live in Koszyk
            $("span:contains('Monogram')").each(function (e) {
                var monogram_text = $(this).text().match(/monogram.*?:\s*(.*)/i)[1];
                if (monogram_text.length > 0)
                    $(this).parent().next('td').html('14 dni');
            });
        }); {
            /literal}
    </script>

    {include file='footerbox.tpl'} {include file='footer.tpl' force_include_cache='1' force_include_cache_tags='Logic_SkinFooterGroupList,Logic_SkinFooterLinkList,Logic_SkinFooterGroup,Logic_SkinFooterLink'} {plugin module=shop template=footer} {include file='switch.tpl'} {literal}

    <script type="text/javascript">
        var gr_goal_params = {
            param_0: '',
            param_1: '',
            param_2: '',
            param_3: '',
            param_4: '',
            param_5: ''
        };
    </script>
    <script type="text/javascript" src="https://app.getresponse.com/goals_log.js?p=722304&u=BHk6o"></script>

    {/literal}


    </body>

    </html>