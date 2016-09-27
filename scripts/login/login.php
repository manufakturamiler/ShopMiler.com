{include file='header.tpl'}

<body{if $body_id} id="{$body_id|escape}" {/if}{if $body_class} class="{$body_class|escape}" {/if}>

    {include file='body_head.tpl'}

    <div class="content-wrapper container clearfix">

        <div class="columns-wrapper clearfix">
            <div class="column two">
                <h3 class="boxtitle">{translate key="Register"}</h3>
                <p>{translate key='You will receive additional benefits:'}</p>

                <ul class="register-addons">
                    <li>{translate key='view the progress of order fulfillment'} </li>
                    <li>{translate key='view your shopping history'}</li>
                    <li>{translate key='no need to enter your details while shopping next time'}</li>
                    <li>{translate key='opportunity to get discounts and promotional coupons'}</li>
                </ul>

                <form action="{route key='register'}" method="get" class="register-form">
                    <fieldset>
                        {include file='formantispam.tpl'}
                        <div class="bottombuttons clearfix single">
                            <button type="submit" class="btn register">
                                <span>{translate key="Register"}</span>
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="column two">
                <h3 class="boxtitle">{translate key="Log in"}</h3>
                <form action="{route key='login'}" method="post" class="form-horizontal">
                    <fieldset class="">
                        {include file='formantispam.tpl'}
                        <input type="hidden" name="last_url" value="{$last_url}" />
                        <div class="row clearfix">
                            <div class="label">
                                <label for="mail_input_long">{translate key="E-mail"}:</label>
                            </div>
                            <div class="input">
                                <input type="text" name="mail" id="mail_input_long" size="30">
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="label">
                                <label for="pass_input_long">{translate key="Password"}:</label>
                            </div>
                            <div class="input">
                                <input type="password" name="pass" id="pass_input_long" size="30">
                                <span class="hint">{translate key='Don\'t remember your password? %sClick here%s.' p1="<a href=\"$passlink\">" p2='</a>'}</span>
                            </div>
                        </div>
                        <div class="bottombuttons clearfix">
                            <button type="submit" class="btn btn-red login">
                                <span>{translate key="Log in"}</span>
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