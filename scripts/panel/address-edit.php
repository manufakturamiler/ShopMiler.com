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

        <div class="box" id="box_address">
            <h2 class="page-title">
                {if $address_id > 0}
                {translate key="Edycja adresu"}
                {else}
                {translate key="New address"}
                {/if}
            </h2>
            <form action="{route key='panelAddressEdit' addressId=$address_id}" method="post" class="form-horizontal">
                <fieldset>
                    {include file='formantispam.tpl'} {foreach from=$table item=tr}
                    <div class="row clearfix">
                        <div class="label">
                            <label for="input_{$tr.name|escape}">
                                {$tr.label|escape}{if true == $tr.obligatory}<em class="color">*</em>{/if}:
                            </label>
                        </div>

                        <div class="input">
                            {if 'select' == $tr.type}
                            <select class="{if $tr.error} error{/if}" name="{$tr.name|escape}" id="input_{$tr.name|escape}">
                                {foreach from=$tr.list item=c key=k}
                                <option value="{$k|escape}" {if $k==$ tr.value} selected="selected" {/if}>
                                    {$c|escape}
                                </option>
                                {/foreach}
                            </select>
                            {else}
                            <div class="shaded_inputwrap{if $tr.error} error{/if}">
                                <input type="{$tr.type|escape}" name="{$tr.name|escape}" value="{$tr.value|escape}" size="25" id="input_{$tr.name|escape}">
                            </div>
                            {/if} {if $tr.rowspan > 0}
                            <span class="hint">
                                {$tr.hint|escape|nl2br}
                            </span> {/if}
                        </div>

                        {if $tr.error}
                        <div class="error">
                            <ul class="input_error">
                                {foreach from=$tr.error item=err_text}
                                <li>{$err_text|escape}</li>
                                {/foreach}
                            </ul>
                        </div>
                        {/if}
                    </div>
                    <!-- row -->
                    {/foreach} {if $show_default1 || $show_default2} {/if} {if $show_default1}
                    <div class="row clearfix">
                        <div class="label"></div>
                        <div class="input">
                            <label for="default1" class="checkbox">
                                <input type="checkbox" name="default1" value="1" id="default1" {if 1==$ default1} checked="checked" {/if}> {translate key='Default address'}</label>
                        </div>
                    </div>
                    {/if} {if $show_default2}
                    <div class="row clearfix">
                        <div class="label"></div>
                        <div class="input">
                            <label for="default2" class="checkbox">
                                <input type="checkbox" name="default2" value="1" id="default2" {if 1==$ default2} checked="checked" {/if}> {translate key='Delivery address'}</label>
                        </div>
                    </div>
                    {/if}

                    <input type="hidden" name="addressform" value="1">
                    <div class="bottombuttons clearfix">
                        <button type="submit" name="button1" value="button1" class="btn undo">
                            <span>&laquo; {translate key='Back'}</span>
                        </button>
                        <button type="submit" name="button2" value="button2" class="btn btn-red important save">
                            {if $address_id > 0}
                            <span>{translate key='Save'}</span> {else}
                            <span>{translate key='Add'}</span> {/if}
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    {include file='footerbox.tpl'} {include file='footer.tpl' force_include_cache='1' force_include_cache_tags='Logic_SkinFooterGroupList,Logic_SkinFooterLinkList,Logic_SkinFooterGroup,Logic_SkinFooterLink'} {plugin module=shop template=footer} {include file='switch.tpl'}
    </body>

    </html>