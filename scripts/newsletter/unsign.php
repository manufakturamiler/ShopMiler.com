{include file='header.tpl'}
<body{if $body_id} id="{$body_id|escape}" {/if}{if $body_class} class="{$body_class|escape}" {/if}>
    {include file='body_head.tpl'}
    <div class="content-wrapper container clearfix">

        <div class="box" id="box_newsletterunsign">
            <h2 class="page-title">{translate key="Sign out of subscription"}</h2>

            <div class="innerbox">
                <form action="{route key='newsletterUnsign'}" method="post" class="form-horizontal">
                    <fieldset>
                        <div class="row clearfix">
                            <div class="label">
                                <label for="email_input1">{translate key="Enter your e-mail address to sign out of subscription."}</label>
                            </div>
                            <div class="input">
                                <div class="shaded_inputwrap{if $data_error.email} error{/if}">
                                    <input type="text" name="email" id="email_input1" value="{$email|escape}" size="30">
                                </div>
                            </div>
                        </div>
                        <div class="bottombuttons clearfix">
                            <button type="submit" class="btn unsign">
                                <span>{translate key="Sign out"}</span>
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

    </div>
    {include file='footerbox.tpl'} {include file='footer.tpl' force_include_cache='1' force_include_cache_tags='Logic_SkinFooterGroupList,Logic_SkinFooterLinkList,Logic_SkinFooterGroup,Logic_SkinFooterLink'} {plugin module=shop template=footer} {include file='switch.tpl'}
    </body>

    </html>