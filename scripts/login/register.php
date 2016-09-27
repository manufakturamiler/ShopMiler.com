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

        <div class="box" id="box_register">
            <form action="{route key='register'}" method="post" enctype="multipart/form-data" novalidate class="form-horizontal">
                <fieldset>
                    {include file='formantispam.tpl'}

                    <h2 class="page-title">{translate key="Registration"}</h2> {foreach from=$table1 item=tr}
                    <div class="row clearfix">
                        <span class="login-label label">
                            <label for="input_{$tr.name|escape}">
                                {$tr.label|escape}{if true == $tr.obligatory}<em class="color">*</em>{/if}:
                            </label>
                        </span>

                        <div class="input">
                            <span class="shaded_inputwrap{if $tr.error} error{/if}">
                                <input type="{$tr.type|escape}" name="{$tr.name|escape}" value="{$tr.value|escape}" size="25" id="input_{$tr.name|escape}" />
                            </span> {if $tr.rowspan > 0}
                            <span class="{if $tr.hint}hint{/if}" {if $tr.rowspan> 1} rowspan="{$tr.rowspan|escape}"{/if}>
                                {$tr.hint|escape|nl2br}
                            </span> {/if} {if $tr.error}
                            <div class="error">
                                <ul class="input_error">
                                    {foreach from=$tr.error item=err_text}
                                    <li>{$err_text|escape}</li>
                                    {/foreach}
                                </ul>
                            </div>
                            {/if}
                        </div>
                    </div>
                    <!-- row -->
                    {/foreach} {if 'full' == $mode}
                    <h3 class="boxtitle">{translate key='Address'}</h3>
                    <div class="row clearfix">
                        <span class="adress-label label"><label for=""></label></span>
                        <div class="input">
                            <label for="address_type1" class="checkbox inline">
                                <input type="radio" name="address_type" value="1" id="address_type1" {if 1==( int) $address_type} checked="checked" {/if}> {translate key='private person'}</label>

                            <label for="address_type2" class="checkbox inline">
                                <input type="radio" name="address_type" value="2" id="address_type2" {if 2==( int) $address_type} checked="checked" {/if}> {translate key='company'}</label>
                        </div>
                    </div>
                    <!-- row -->

                    {foreach from=$table2 item=tr}
                    <div class="row clearfix">
                        <span class="adress-label label">
                            <label for="input_{$tr.name|escape}">
                                {$tr.label|escape}{if true == $tr.obligatory}<em class="color">*</em>{/if}:
                            </label>
                        </span>

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
                            <span class="shaded_inputwrap{if $tr.error} error{/if}">
                                <input type="{$tr.type|escape}" name="{$tr.name|escape}" value="{$tr.value|escape}" size="25" id="input_{$tr.name|escape}">
                            </span> {/if} {if $tr.error}
                            <div class="error">
                                <ul class="input_error">
                                    {foreach from=$tr.error item=err_text}
                                    <li>{$err_text|escape}</li>
                                    {/foreach}
                                </ul>
                            </div>
                            {/if} {if $tr.rowspan > 0}
                            <span class="{if $tr.hint}hint{/if}" {if $tr.rowspan> 1} rowspan="{$tr.rowspan|escape}"{/if}>
                                {$tr.hint|escape|nl2br}
                            </span> {/if}
                        </div>
                    </div>
                    <!-- row -->
                    {/foreach} {/if} {if count($additional_fields) > 0}
                    <h3 class="boxtitle">{translate key='Additional information'}</h3> {foreach from=$additional_fields item=field} {assign var=name value='additional_'|cat:$field->getIdentifier()} {if $additional_error.$name} {if $field->field->type == constant('Logic_AdditionalField::TYPE_CHECKBOX')}
                    <div class="witherror witherror_checkbox row clearfix">
                        {else}
                        <div class="witherror witherror_text row clearfix">
                            {/if} {else}
                            <div class="clear row clearfix">
                                {/if}
                                <span class="check-label label">
                                    {if $field->field->type == constant('Logic_AdditionalField::TYPE_CHECKBOX')}
                                    {if 1 == $field->field->req}<em class="color">*</em>{/if}
                                    {else}
                                    <label for="{$name|escape}">
                                        {if 1 == $field->field->req}<em class="color">*</em>{/if}
                                        {$field->translation->description}
                                    </label>
                                    {/if}
                                </span>

                                <div class="input">

                                    {if $field->field->type == constant('Logic_AdditionalField::TYPE_CHECKBOX')}
                                    <label for="{$name|escape}" class="checkbox">
                                        {additionalField field=$field name=$name value=$additional_value.$name editable=true} {$field->translation->description}
                                    </label>
                                    {elseif $field->field->type == constant('Logic_AdditionalField::TYPE_SELECT')} {additionalField field=$field name=$name value=$additional_value.$name|escape editable=true} {else}
                                    <span class="shaded_inputwrap{if $additional_error.$name} error{/if}">
                                        {additionalField field=$field name=$name value=$additional_value.$name|escape editable=true size=25}
                                    </span> {/if} {if $tr.hint}
                                    <span class="{if $tr.hint}hint{/if}" {if $tr.rowspan> 1} rowspan="{$tr.rowspan|escape}"{/if}>
                                        {$tr.hint|escape|nl2br}
                                    </span> {/if} {if $additional_error.$name}
                                    <div class="error">
                                        {formErrors errors=$additional_error.$name class="input_error"}
                                    </div>
                                    {/if}

                                </div>
                            </div>
                            <!-- row -->

                            {/foreach} {/if}

                            <input type="hidden" name="addressform" value="{$mode|escape}" />
                            <div class="bottombuttons clerfix">
                                <button type="submit" class="btn btn-red right register">
                                    <span>{translate key="Register"}</span>
                                </button>
                            </div>
                </fieldset>
            </form>
            </div>
            </div>
            {include file='footerbox.tpl'} {include file='footer.tpl' force_include_cache='1' force_include_cache_tags='Logic_SkinFooterGroupList,Logic_SkinFooterLinkList,Logic_SkinFooterGroup,Logic_SkinFooterLink'} {plugin module=shop template=footer} {include file='switch.tpl'}
            </body>

            </html>