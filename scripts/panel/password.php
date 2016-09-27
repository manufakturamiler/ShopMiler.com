{include file='header.tpl'}
<body{if $body_id} id="{$body_id|escape}" {/if}{if $body_class} class="{$body_class|escape}" {/if}>

    {include file='body_head.tpl'}

    <div class="container content-wrapper clearfix">

        <div class="box" id="box_passchange">
            <h2 class="page-title">{translate key="Change of password"}</h2>
            <form action="{route key='panelPassword'}" method="post" class="form-horizontal">
                <fieldset>
                    {include file='formantispam.tpl'}
                    <div class="row clearfix">
                        <div class="label">
                            <label for="pass_input">
                                {translate key="Current password"}<em class="color">*</em>:
                            </label>
                        </div>
                        <div class="input">
                            <div class="shaded_inputwrap{if $data_error.pass} error{/if}">
                                <input type="password" name="pass" id="pass_input" value="" size="30" />
                            </div>
                            {if $data_error.pass}
                            <ul class="input_error">
                                {foreach from=$data_error.pass item=err_text}
                                <li>{$err_text|escape}</li>
                                {/foreach}
                            </ul>
                            {/if}
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="label">
                            <label for="pass1_input">{translate key="New password"}<em class="color">*</em>:</label>
                        </div>
                        <div class="input">
                            <div class="shaded_inputwrap{if $data_error.pass1} error{/if}">
                                <input type="password" name="pass1" id="pass1_input" value="" size="30" />
                            </div>
                            {if $data_error.pass1}
                            <ul class="input_error">
                                {foreach from=$data_error.pass1 item=err_text}
                                <li>{$err_text|escape}</li>
                                {/foreach}
                            </ul>
                            {/if}
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="label">
                            <label for="pass2_input">{translate key="Retype your password"}<em class="color">*</em>:</label>
                        </div>
                        <div class="input">
                            <div class="shaded_inputwrap{if $data_error.pass2} error{/if}">
                                <input type="password" name="pass2" id="pass2_input" value="" size="30" />
                            </div>
                            {if $data_error.pass2}
                            <ul class="input_error">
                                {foreach from=$data_error.pass2 item=err_text}
                                <li>{$err_text|escape}</li>
                                {/foreach}
                            </ul>
                            {/if}
                        </div>
                    </div>
                    <div class="bottombuttons clearfix">
                        <button type="submit" class="btn important save">
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