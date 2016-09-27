{include file='header.tpl'}
<body{if $body_id} id="{$body_id|escape}" {/if}{if $body_class} class="{$body_class|escape}" {/if}>

    {include file='body_head.tpl'}
    <div class="container content-wrapper clearfix">

        <div class="box" id="box_useredit">
            <h2 class="page-title">{translate key="Edit your profile"}</h2>
            <form action="{route key='panelEdit'}" method="post" class="form-horizontal">
                <fieldset>
                    {include file='formantispam.tpl'}
                    <div class="row clearfix">
                        <div class="label">
                            <label for="mail_input">
                                {translate key="E-mail"}<em class="color">*</em>:
                            </label>
                        </div>
                        <div class="input">
                            <div class="shaded_inputwrap">
                                <input type="text" name="mail" id="mail_input" value="{$data.mail|escape}" size="30" class="{if $data_error.surname} error{/if}">
                            </div>
                            {if $data_error.mail}
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
                            <label for="name_input">{translate key="First name"}:</label>
                        </div>
                        <div class="input">
                            <div class="shaded_inputwrap">
                                <input type="text" name="name" id="name_input" value="{$data.name|escape}" size="30" class="{if $data_error.surname} error{/if}">
                            </div>
                            {if $data_error.name}
                            <ul class="input_error">
                                {foreach from=$data_error.name item=err_text}
                                <li>{$err_text|escape}</li>
                                {/foreach}
                            </ul>
                            {/if}
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="label">
                            <label for="surname_input">{translate key="Surname"}:</label>
                        </div>
                        <div class="input">
                            <div class="shaded_inputwrap">
                                <input type="text" name="surname" id="surname_input" value="{$data.surname|escape}" size="30" class="{if $data_error.surname} error{/if}">
                            </div>
                            {if $data_error.surname}
                            <ul class="input_error">
                                {foreach from=$data_error.surname item=err_text}
                                <li>{$err_text|escape}</li>
                                {/foreach}
                            </ul>
                            {/if}
                        </div>
                    </div>

                    {if count($additional_fields) > 0}
                    <h3 class="boxtitle">{translate key='Additional information'}</h3> {foreach from=$additional_fields item=field}
                    <div class="row clearfix">
                        <div class="label">
                            {assign var=name value='additional_'|cat:$field->getIdentifier()}

                            <label for="{$name}" {if $data_error.$name && $field->field->type == constant('Logic_AdditionalField::TYPE_CHECKBOX')}class="witherror_checkbox"{/if}> {if $field->field->type == constant('Logic_AdditionalField::TYPE_CHECKBOX')}
                                <span class="checkbox-wrap">
                                    {additionalField field=$field name=$name value=$data.$name}
                                    <label for="{$name}"></label>
                                </span> {$field->translation->description}
                            </label>
                            {elseif $field->field->type == constant('Logic_AdditionalField::TYPE_SELECT')} {$field->translation->description}
                            </label>
                            {additionalField field=$field name=$name value=$additional_value.$name|escape editable=true} {else} {$field->translation->description} {if 1 == $field->field->req}<em class="color">*</em>{/if}:
                            </label>
                        </div>
                        <div class="input">
                            <div class="shaded_inputwrap{if $data_error.$name} error{/if}">
                                {additionalField field=$field name=$name value=$data.$name|escape editable=true size=30}
                            </div>
                            {/if} {formErrors errors=$data_error.$name class="input_error"}
                        </div>
                    </div>
                    {/foreach} {/if}

                    <div class="bottombuttons clearfix">
                        <button type="submit" class="button important save">
                            <span>{translate key="Save"}</span>
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

    {include file='footerbox.tpl'} {include file='footer.tpl' force_include_cache='1' force_include_cache_tags='Logic_SkinFooterGroupList,Logic_SkinFooterLinkList,Logic_SkinFooterGroup,Logic_SkinFooterLink'} {plugin module=shop template=footer} {include file='switch.tpl'}
    </body>

    </html>