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
            'variants': '{products.option}',
            'price': '{products.price}',
            'quantity': '{products.quantity}'
            }]
        }]

        }];
    </script>
    {/literal} {include file='body_head_checkout.tpl'}

    <div class="container content-wrapper clearfix">
        <div class="columns-wrapper clearfix">
            <div class="column two">
                <h3 class="boxtitle">{translate key='Registered Clients'}</h3>
                <span id="ifregistered">{translate key='ifregisteredthen'}</span>
                <form action="{route key='basketStep2'}" method="post" class="form-horizontal login" novalidate>
                    <input type="hidden" name="loginform" value="1">
                    <div class="row clearfix">
                        <div class="label">
                            <label for="input_mail">{translate key='E-mail'}:</label>
                        </div>
                        <div class="input">
                            <input type="email" class="" name="mail" value="{$data.mail}" id="input_mail">
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="label">
                            <label for="input_pass">{translate key='Password'}:</label>
                        </div>
                        <div class="input">
                            <input type="password" class="" name="pass" value="{$data.pass}" id="input_pass">
                        </div>
                    </div>
                    <div class="bottombuttons clearfix">
                        <button type="submit" class="btn btn-red important">{translate key='Sign in'}</button>
                    </div>

                </form>
            </div>
            <div class="column two">
                {if $enable_register}
                <h3 class="boxtitle">
                    {translate key="I do not have an account yet"}
                </h3>

                <p>{translate key='Sign up to take advantage of the privileges for returning customers'}:</p>
                <ul>
                    <li>{translate key='view the order status and purchase history'}</li>
                    <li>{translate key='no need to enter your data for next purchases'}</li>
                    <li>{translate key='possibility to receive discounts and discount codes'}</li>
                    {if $loyalty_order_gives_points}
                    <li>{translate key='you can collect loyalty points for your shopping'}</li>
                    {/if}
                </ul>

                <form action="{route key='basketRegister'}" method="get" class="form-horizontal register">
                    <div class="bottombuttons clearfix single">
                        <button class="btn btn-red important register" type="submit">{translate key='Create an account'}</button>
                    </div>
                </form>
                {/if} {if $allow_single} {if $enable_register === false}
                <h3 class="boxtitle">
                    {translate key="I do not have an account"}
                </h3> {/if}

                <p>{translate key="You don't have to create an account in our store to place an order."}</p>
                <p>{translate key='Click "Place an order" button'}</p>

                <form action="{route key='basketNoRegister'}" method="get" class="order">
                    <div class="bottombuttons clearfix single">
                        <button class="btn btn-red important order" type="submit">{translate key='Place an order'}</button>
                    </div>
                </form>
                {/if}
            </div>

        </div>


    </div>
    {include file='footerbox.tpl'} {include file='footer.tpl' force_include_cache='1' force_include_cache_tags='Logic_SkinFooterGroupList,Logic_SkinFooterLinkList,Logic_SkinFooterGroup,Logic_SkinFooterLink'} {plugin module=shop template=footer} {include file='switch.tpl'} {literal}
    <!-- Facebook Pixel Code -->
    <script>
        ! function (f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window,
            document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');

        fbq('init', '306925449517096');
        fbq('track', "PageView");
        fbq('track', 'InitiateCheckout');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=306925449517096&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->
    {/literal}

    </body>

    </html>