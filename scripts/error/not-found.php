{include file='header.tpl'}
<body{if $body_id} id="{$body_id|escape}" {/if}{if $body_class} class="{$body_class|escape}" {/if}>
    {include file='body_head.tpl'}

    <div class="content-wrapper container clearfix">

        <div class="box" id="box_404">
            <h2>{translate key="Requested page doesn't exist"}</h2>
            <p>{translate key="We are sorry, page you are looking for doesn't exist."}</p>
        </div>

    </div>
    {include file='footerbox.tpl'} {include file='footer.tpl' force_include_cache='1' force_include_cache_tags='Logic_SkinFooterGroupList,Logic_SkinFooterLinkList,Logic_SkinFooterGroup,Logic_SkinFooterLink'} {plugin module=shop template=footer} {include file='switch.tpl'}
    </body>

    </html>