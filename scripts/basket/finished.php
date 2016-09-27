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

        <div class="box" id="box_basketfinal">
            <h2 class="page-title">{translate key='Message after payment'}</h2>
            <h4 class="paystatus">{$msg|escape}</h4> {$payment_output}
        </div>

    </div>
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

    {/literal} {literal}
    <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 1029938373;
        var google_conversion_language = "en";
        var google_conversion_format = "3";
        var google_conversion_color = "ffffff";
        var google_conversion_label = "wag4CJPC6GEQxbmO6wM";
        var google_conversion_value = 250.00;
        var google_conversion_currency = "PLN";
        var google_remarketing_only = false;
        /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
    </script>
    {/literal}
    </body>

    </html>