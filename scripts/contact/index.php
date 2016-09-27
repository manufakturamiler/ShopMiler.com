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

    <div class="content-wrapper container clearfix">
        <div class="box" id="box_contact">
            <h2 class="page-title">{translate key="Contact form"}</h2>
            <form class="formprotect form-horizontal" method="post" action="{route key='contact'}" enctype="multipart/form-data" novalidate>
                <fieldset>
                    {include file='formantispam.tpl'}

                    <div class="row clearfix">
                        <div class="label">
                            <label for="contact1">{translate key="Name and surname:"}</label>
                        </div>
                        <div class="input">
                            <input id="contact1" type="text" name="name" value="{$data.name|escape}" size="30" class="{if $data_error.name}error{/if}"> {if $data_error.name}
                            <ul class="row error">
                                {foreach from=$data_error.name item=err_text}
                                <li>{$err_text|escape}</li>
                                {/foreach}
                            </ul>
                            {/if}
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="label">
                            <label for="contact2">{translate key="E-mail address:"} <em class="color">*</em> </label>
                        </div>
                        <div class="input">
                            <input id="contact2" type="email" name="mail" value="{$data.mail|escape}" size="30" class="{if $data_error.mail}error{/if}"> {if $data_error.mail}
                            <ul class="input_error">
                                {foreach from=$data_error.mail item=err_text}
                                <li>{$err_text|escape}</li>
                                {/foreach}
                            </ul>
                            {/if}
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="label">
                            <label for="contact3">{translate key="Subject:"}</label>
                        </div>
                        <div class="input">
                            <input id="contact3" type="text" name="subject" value="{$data.subject|escape}" size="30" class="{if $data_error.subject}error{/if}"> {if $data_error.subject}
                            <ul class="input_error">
                                {foreach from=$data_error.subject item=err_text}
                                <li>{$err_text|escape}</li>
                                {/foreach}
                            </ul>
                            {/if}
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="label">
                            <label for="contact4">{translate key="Message:"} <em class="color">*</em></label>
                        </div>
                        <div class="input">
                            <textarea rows="5" cols="30" id="contact4" name="text" class="{if $data_error.text}error{/if}">{$data.text|escape}</textarea>
                            {if $data_error.text}
                            <ul class="input_error">
                                {foreach from=$data_error.text item=err_text}
                                <li>{$err_text|escape}</li>
                                {/foreach}
                            </ul>
                            {/if}
                        </div>
                    </div>

                    {foreach from=$additional_fields item=field} {assign var=name value='additional_'|cat:$field->getIdentifier()} {if $data_error.$name} {if $field->field->type == constant('Logic_AdditionalField::TYPE_CHECKBOX')}
                    <div class="row clearfix error witherror_checkbox f-row">
                        {else}
                        <div class="row clearfix error witherror_text f-row">
                            {/if} {else}
                            <div class="row clearfix ">
                                {/if}

                                <div class="label label-checkbox f-grid-1">
                                    {if $field->field->type == constant('Logic_AdditionalField::TYPE_CHECKBOX')} {if 1 == $field->field->req}<em class="color">*</em>{/if} {else}
                                    <label for="{$name|escape}">
                                        {if 1 == $field->field->req}<em class="color">*</em>{/if} {$field->translation->description}
                                    </label>
                                    {/if}
                                </div>

                                <div class="input">
                                    {if $field->field->type == constant('Logic_AdditionalField::TYPE_CHECKBOX')} {additionalField field=$field name=$name value=$data.$name editable=true}
                                    <label for="{$name|escape}" class="f-grid-4">{$field->translation->description}</label>
                                    {elseif $field->field->type == constant('Logic_AdditionalField::TYPE_SELECT')} {additionalField field=$field name=$name value=$additional_value.$name|escape editable=true} {else}
                                    <div class="{if $data_error.$name}error{/if}" class="f-grid-7">
                                        {additionalField field=$field name=$name value=$data.$name|escape editable=true size=30}
                                    </div>
                                    {/if} {if $data_error.$name}
                                    <div class="error">
                                        {formErrors errors=$data_error.$name class="input_error"}
                                    </div>
                                    {/if}
                                </div>

                            </div>
                            {/foreach}
                            <div class="bottombuttons clearfix">
                                <button type="submit" class="btn btn-red2 send">
                                    <span>{translate key="Send"}</span>
                                </button>
                            </div>
                </fieldset>
            </form>
            </div>
            </div>
            {include file='footerbox.tpl'} {include file='footer.tpl' force_include_cache='1' force_include_cache_tags='Logic_SkinFooterGroupList,Logic_SkinFooterLinkList,Logic_SkinFooterGroup,Logic_SkinFooterLink'} {plugin module=shop template=footer} {include file='switch.tpl'}
            </body>

            </html>