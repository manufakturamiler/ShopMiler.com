{include file='header.tpl'}
<body{if $body_id} id="{$body_id|escape}" {/if}{if $body_class} class="{$body_class|escape}" {/if}>

    {include file='body_head.tpl'}

    <div class="container content-wrapper clearfix">

        <div class="box box_infopage" id="infopage{$page->getIdentifier()}">
            <h2 class="page-title">{$page->page->name|escape}</h2>

            <div class="page-content">
                <div class="resetcss">{$page->getContent()}</div>
            </div>
        </div>

    </div>
    {include file='footerbox.tpl'} {include file='footer.tpl' force_include_cache='1' force_include_cache_tags='Logic_SkinFooterGroupList,Logic_SkinFooterLinkList,Logic_SkinFooterGroup,Logic_SkinFooterLink'} {plugin module=shop template=footer} {include file='switch.tpl'}
    </body>

    </html>