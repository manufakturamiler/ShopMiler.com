{include file='header.tpl'}
<body{if $body_id} id="{$body_id|escape}" {/if}{if $body_class} class="{$body_class|escape}" {/if}>

    {include file='body_head.tpl'}
    <div class="content-wrapper container clearfix">


        <div class="box" id="box_basketfinal">
            <h2 class="page-title">{translate key='Payment'}</h2>

            <div class="innerbox">
                {if $payment_message} {$payment_message|escape} {else} {$payment_form} {/if}
            </div>
        </div>

    </div>
    {include file='footerbox.tpl'} {include file='footer.tpl' force_include_cache='1' force_include_cache_tags='Logic_SkinFooterGroupList,Logic_SkinFooterLinkList,Logic_SkinFooterGroup,Logic_SkinFooterLink'} {plugin module=shop template=footer} {include file='switch.tpl'}
    </body>

    </html>