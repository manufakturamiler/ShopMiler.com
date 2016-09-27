{php}$helper = $this->_tpl_vars['helper'];{/php} {include file='header.tpl'}
<body{if $body_id} id="{$body_id|escape}" {/if}{if $body_class} class="{$body_class|escape}" {/if}>
    {include file='body_head.tpl'}

    <div class="content-wrapper container clearfix">

        <aside class="sidebar">
            {dynamic} {foreach from=$boxes_left_side item=v key=k} {box file="../boxes/$v/box.tpl" box="$k"} {/foreach} {/dynamic}
        </aside>

        <div class="content centercol">
            <h2 class="page-title">Lista artykułów</h2> {if count($articles) > 0} {include file='news/listofarticles.tpl'} {else}
            <div class="alert-info alert">
                <p>{translate key="No items have been found."}</p>
            </div>
            {/if}

        </div>
    </div>
    <!-- content wrapper -->

    {include file='footerbox.tpl'} {include file='footer.tpl' force_include_cache='1' force_include_cache_tags='Logic_SkinFooterGroupList,Logic_SkinFooterLinkList,Logic_SkinFooterGroup,Logic_SkinFooterLink'} {plugin module=shop template=footer} {include file='switch.tpl'}
    </body>

    </html>