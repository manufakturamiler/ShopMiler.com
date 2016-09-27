{include file='header.tpl'}
<body{if $body_id} id="{$body_id|escape}" {/if}{if $body_class} class="{$body_class|escape}" {/if}>

    {include file='body_head_checkout.tpl'}
    <div class="container content-wrapper clearfix">

        <div class="box" id="box_basketaddress">
            <form action="{route key='basketStep2'}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="is_cod" value="{$isCod}" id="is_cod">
                <fieldset>
                    {include file='formantispam.tpl'}
                    <div class="innerbox f-row">
                        <div class="basket-step-border">
                            <h3 class="boxtitle">{translate key='Billing and shipping address'}</h3>
                            <table class="maindata form-horizontal">
                                <tbody>
                                    {foreach from=$table1 item=tr}
                                    <tr class="{$tr.name|escape}">
                                        <td class="label">
                                            <label for="input_{$tr.name|escape}">
                                                {$tr.label|escape}{if true == $tr.obligatory}<em class="color">*</em>{/if}:
                                            </label>
                                        </td>

                                        <td class="input">
                                            {if 'select' == $tr.type}
                                            <select class="{if $tr.error} error{/if}" name="{$tr.name|escape}" id="input_{$tr.name|escape}">
                                                {foreach from=$tr.list item=c key=k}
                                                <option value="{$k|escape}" {if $k==$ tr.value} selected="selected" {/if}>{$c|escape}</option>
                                                {/foreach}
                                            </select>
                                            {else}
                                            <div class="shaded_inputwrap{if $tr.error} error{/if}">
                                                <input type="{$tr.type|escape}" name="{$tr.name|escape}" value="{$tr.value|escape}" id="input_{$tr.name|escape}">
                                            </div>
                                            {/if} {if $tr.error}
                                            <div class="error">
                                                <ul class="input_error">
                                                    {foreach from=$tr.error item=err_text}
                                                    <li>{$err_text|escape}</li>
                                                    {/foreach}
                                                </ul>
                                            </div>
                                            {/if}
                                        </td>
                                    </tr>


                                    {/foreach}
                                </tbody>
                            </table>

                            <div class="client-address">
                                <h4 class="separator">{translate key='Address'}</h4>
                                <table class="address form-horizontal">
                                    <tbody>
                                        {if 'user' == $mode && $user->user && count($user->user->addresses) > 0}
                                        <tr class="select_address">
                                            <td class="label">
                                                <label for="">{translate key='Available addresses'}:</label>
                                            </td>

                                            <td class="input">
                                                <select name="address">
                                                    <option value="0">{translate key='New address'}</option>
                                                    {foreach from=$user->user->addresses item=address}
                                                    <option value="{$address->getIdentifier()}" {if $address_value==$ address->getIdentifier()} selected="selected"{/if}> {$address->address->address_name|escape}
                                                    </option>
                                                    {/foreach}
                                                </select>
                                                <button type="submit" name="address_submit" value="address_submit" class="button address_submit">
                                                    <span>&raquo;</span>
                                                </button>
                                            </td>
                                        </tr>
                                        {/if}

                                        <tr class="address_type">
                                            <td class="label"></td>
                                            <td class="input">
                                                <label for="address_type1" class="checkbox inline">
                                                    <input type="radio" name="address_type" value="1" id="address_type1" {if 1==( int) $address_type} checked="checked" {/if}> {translate key='private person'}</label>

                                                <label for="address_type2" class="checkbox inline">
                                                    <input type="radio" name="address_type" value="2" id="address_type2" {if 2==( int) $address_type} checked="checked" {/if}> {translate key='company'}</label>
                                            </td>
                                        </tr>

                                        {foreach from=$table2 item=tr}
                                        <tr class="{$tr.name|escape}">
                                            <td class="label">
                                                <label for="input_{$tr.name|escape}">
                                                    {$tr.label|escape}{if true == $tr.obligatory}<em class="color">*</em>{/if}:
                                                </label>
                                            </td>

                                            <td class="input">
                                                {if 'select' == $tr.type}
                                                <select class="{if $tr.error} error{/if}" name="{$tr.name|escape}" id="input_{$tr.name|escape}">
                                                    {foreach from=$tr.list item=c key=k}
                                                    <option value="{$k|escape}" {if $k==$ tr.value} selected="selected" {/if}>{$c|escape}</option>
                                                    {/foreach}
                                                </select>
                                                {else}
                                                <div class="shaded_inputwrap{if $tr.error} error{/if}">
                                                    <input type="{$tr.type|escape}" name="{$tr.name|escape}" value="{$tr.value|escape}" id="input_{$tr.name|escape}">
                                                </div>
                                                {/if} {if $tr.error}
                                                <div class="error">
                                                    <ul class="input_error">
                                                        {foreach from=$tr.error item=err_text}
                                                        <li>{$err_text|escape}</li>
                                                        {/foreach}
                                                    </ul>
                                                </div>
                                                {/if}
                                            </td>
                                        </tr>


                                        {/foreach}

                                        <tr class="different_address">
                                            <td class="label"></td>
                                            <td class="input">
                                                <label for="address_different" class="checkbox">
                                                    <input type="checkbox" name="different" value="1" id="address_different" {if 1==( int) $different_value} checked="checked" {/if}> {translate key='Different shipping address'}</label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="client-add-info f-grid-6">
                                <div class="client-address-different">
                                    <h4 class="boxtitle different separator">{translate key='Different shipping address'}</h4>
                                    <table class="address-different form-horizontal">
                                        <tbody>
                                            {if 'user' == $mode && $user->user && count($user->user->addresses) > 0}
                                            <tr class="different select_address2">
                                                <td class="label">
                                                    <label for="">{translate key='Available addresses'}:</label>
                                                </td>

                                                <td class="input">
                                                    <select name="address2">
                                                        <option value="0">{translate key='New address'}</option>
                                                        {foreach from=$user->user->addresses item=address}
                                                        <option value="{$address->getIdentifier()}" {if $address2_value==$ address->getIdentifier()} selected="selected"{/if}> {$address->address->address_name|escape}
                                                        </option>
                                                        {/foreach}
                                                    </select>
                                                    <button type="submit" name="address_submit2" value="address_submit2" class="button address_submit">
                                                        <span>&raquo;</span>
                                                    </button>
                                                </td>
                                            </tr>
                                            {/if} {foreach from=$table3 item=tr}
                                            <tr class="different {$tr.name|escape}">
                                                <td class="label">
                                                    <label for="input_{$tr.name|escape}">
                                                        {if true == $tr.obligatory}
                                                        <em class="color">*</em> {/if} {$tr.label|escape}:
                                                    </label>
                                                </td>

                                                <td class="input">
                                                    {if 'select' == $tr.type}
                                                    <select class="{if $tr.error} error{/if}" name="{$tr.name|escape}" id="input_{$tr.name|escape}">
                                                        {foreach from=$tr.list item=c key=k}
                                                        <option value="{$k|escape}" {if $k==$ tr.value} selected="selected" {/if}>{$c|escape}</option>
                                                        {/foreach}
                                                    </select>
                                                    {else}
                                                    <div class="shaded_inputwrap{if $tr.error} error{/if}">
                                                        <input type="{$tr.type|escape}" name="{$tr.name|escape}" value="{$tr.value|escape}" id="input_{$tr.name|escape}">
                                                    </div>
                                                    {/if} {if $tr.error}
                                                    <div class="error">
                                                        <ul class="input_error">
                                                            {foreach from=$tr.error item=err_text}
                                                            <li>{$err_text|escape}</li>
                                                            {/foreach}
                                                        </ul>
                                                    </div>
                                                    {/if}
                                                </td>
                                            </tr>
                                            {/foreach}
                                        </tbody>
                                    </table>
                                </div>

                                <h3 class="boxtitle">{translate key='Additional information'}</h3>
                                <table class="form-horizontal">
                                    <tbody>
                                        <tr>
                                            <td class="label">
                                                <label for="comment">{translate key='Comments'}</label>
                                            </td>
                                            <td class="input" colspan="2">
                                                <div class="shaded_textareawrap">
                                                    <textarea name="comment" rows="5" cols="30">{$comment_value|escape}</textarea>
                                                </div>
                                                {if $comment_error}
                                                <div class="error">
                                                    <ul class="input_error">
                                                        {foreach from=$comment_error item=err_text}
                                                        <li>{$err_text|escape}</li>
                                                        {/foreach}
                                                    </ul>
                                                </div>
                                                {/if}
                                            </td>
                                        </tr>

                                        {foreach from=$additional_fields item=field} {assign var=name value='additional_'|cat:$field->getIdentifier()} {if $additional_error.$name} {if $field->field->type == constant('Logic_AdditionalField::TYPE_CHECKBOX')}
                                        <tr class="witherror witherror_checkbox">
                                            {else}
                                            <tr class="witherror witherror_text">
                                                {/if} {else}
                                                <tr class="additional-fields">
                                                    {/if}

                                                    <td class="label">
                                                        {if $field->field->type == constant('Logic_AdditionalField::TYPE_CHECKBOX')} {if 1 == $field->field->req}<em class="color">*</em>{/if} {else}
                                                        <label for="{$name|escape}">
                                                            {if 1 == $field->field->req}<em class="color">*</em>{/if} {$field->translation->description}
                                                        </label>
                                                        {/if}
                                                    </td>
                                                    <td class="input" colspan="2">
                                                        {if $field->field->type == constant('Logic_AdditionalField::TYPE_CHECKBOX')}
                                                        <label for="{$name|escape}" class="checkbox">
                                                            {additionalField field=$field name=$name value=$additional_value.$name editable=true} {$field->translation->description}
                                                        </label>
                                                        {elseif $field->field->type == constant('Logic_AdditionalField::TYPE_TEXT')}
                                                        <div class="shaded_inputwrap{if $additional_error.$name} error{/if}">
                                                            {additionalField field=$field name=$name value=$additional_value.$name|escape editable=true}
                                                        </div>
                                                        {else} {additionalField field=$field name=$name value=$additional_value.$name|escape editable=true} {/if} {if $additional_error.$name}
                                                        <div class="error">
                                                            {formErrors errors=$additional_error.$name class="input_error"}
                                                        </div>
                                                        {/if}
                                                    </td>
                                                </tr>


                                                {/foreach}
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {if $shipping_data}
                        <input type="hidden" name="shipping_data" value="{$shipping_data|escape}"> {/if}
                        <input type="hidden" name="addressform" value="{$mode|escape}">

                        <div class="bottombuttons clearfix center">
                            <button type="submit" name="button1" value="button1" class="btn back">
                                <span>{translate key='Back'}</span>
                            </button>
                            <button type="submit" name="button2" value="button2" class="important summary btn-red btn">
                                <span>{translate key='Summary'}</span>
                            </button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

    </div>

    <script type="text/javascript">
        try {
            literal
        } {
            {
                /literal} Shop.values.Country2Shipping = {$country2shipping}; {literal}}{/literal
            } catch (e) {
                literal
            } {} {
                /literal}
    </script>
    {include file='footerbox.tpl'} {include file='footer.tpl' force_include_cache='1' force_include_cache_tags='Logic_SkinFooterGroupList,Logic_SkinFooterLinkList,Logic_SkinFooterGroup,Logic_SkinFooterLink'} {plugin module=shop template=footer} {include file='switch.tpl'}

    </body>

    </html>