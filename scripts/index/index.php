{include file='header.tpl'}
<body{if $body_id} id="{$body_id|escape}" {/if}{if $body_class} class="{$body_class|escape}" {/if}>

    {include file='body_head.tpl'}


    <div class="content-wrapper home container">

        {dynamic} {foreach from=$boxes_top_side item=v key=k} {box file="../boxes/$v/box.tpl" box="$k"} {/foreach} {/dynamic}

    </div>
    <!-- content-wrapper -->


    {include file='footerbox.tpl'} {include file='footer.tpl' force_include_cache='1' force_include_cache_tags='Logic_SkinFooterGroupList,Logic_SkinFooterLinkList,Logic_SkinFooterGroup,Logic_SkinFooterLink'} {plugin module=shop template=footer} {include file='switch.tpl'} {literal}
    <script type="text/javascript">
        var clicky_site_ids = clicky_site_ids || [];
        clicky_site_ids.push(100898490);
        (function () {
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = '//static.getclicky.com/js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(s);
        })();
    </script>
    <noscript>
        <p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/100898490ns.gif" /></p>
    </noscript>
    {/literal} {literal}
    <script src="https://www.salesmanago.pl/dynamic/xiqs3wq3khuootz4/popups.js"></script>

    {/literal}
    </body>

    </html>