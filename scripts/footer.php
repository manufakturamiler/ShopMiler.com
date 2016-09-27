<div class="footer-top">
    <ul class="media">
        <li>{translate key="As seen on:"}</li>
        <li><img src="{$path}/images/user/styleforum.gif" /></li>
        <li><img src="{$path}/images/user/manolo-logo.jpg" /></li>
        <li><img src="{$path}/images/user/but-w-butonierce.png" /></li>
        <li><img src="{$path}/images/user/all-tied-up.jpg" /></li>
        <li><img src="{$path}/images/user/playboy-logo.jpg" /></li>
    </ul>

</div>

<div class="footer-bottom">
    {if count($footergroups)} {foreach from=$footergroups item=group}
    <div class="footer-row">
        <h3>{$group->group->name|escape}</h3>
        <ul>
            {foreach from=$group->links item=link} {if $link->getHref()}
            <li><a href="{$link->getHref()|escape}" class="{if $link->isPopup()}popup{/if}" title="{$link->getTitle()|escape}" id="footlink{$link->getIdentifier()}">{$link->getTitle()|escape}</a></li>{/if} {/foreach}
        </ul>
    </div>
    {/foreach} {/if} {*

    <div class="newsletter">
        <p>{translate key='Sign up to our newsletter to stay updated and receive a <strong>5% discount for your first purchase</strong>'}</p>


        <!-- Begin MailChimp Signup Form -->
        <div id="mc_embed_signup">
            <form action="//gentlemanschoice.us9.list-manage.com/subscribe/post?u=20941cf76c30bf1731ea5c8da&amp;id=2cc993e72f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">

                    <div class="mc-field-group clearfix">
                        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                        <button type="submit" id="mc-embedded-subscribe">{translate key='Sign up'}</button>
                    </div>
                    <div id="mce-responses" class="clear">
                        <div class="response" id="mce-error-response" style="display:none"></div>
                        <div class="response" id="mce-success-response" style="display:none"></div>
                    </div>
                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;">
                        <input type="text" name="b_20941cf76c30bf1731ea5c8da_2cc993e72f" tabindex="-1" value="">
                    </div>
                </div>
            </form>
        </div>

        <!--End mc_embed_signup-->*}
    </div>
</div>
<div class="copyright clearfix">
    <p class="left">Copyright &copy; 2012-2016 shopmiler.com</p>
    <p class="right">{translate key='All rights reserved'}</a>
    </p>
</div>

{*
<div id="email-modal-wrapper" class="displaynone">
    <div class="email-wrapper clearfix">
        <div class="email-content clearfix">
            <a href="#" class="close">{translate key="Zamknij"}</a>
            <h2>{translate key="Elegancki newsletter"}</h2>
            <p>{translate key="newsletter33"}</p>
            <p><strong>{translate key="newsletter331"}</strong></p>
            {translate key="getresponse01"}

            <div id="mc_embed_signup_scroll">

                <div class="mc-field-group clearfix">
                    <input type="text" name="email" class="required email" id="mce-EMAIL" placeholder="e-mail"> {translate key="getresponse02"} {translate key="getresponse03"}
                    <button type="submit" value="subscribe" id="mc-embedded-subscribe">Zapisz mnie</button>
                </div>
                <div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                </div>
                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;">
                    <input type="text" name="b_20941cf76c30bf1731ea5c8da_2cc993e72f" tabindex="-1" value="">
                </div>
            </div>
            </form>
        </div>
    </div>
</div>*} {*


<div id="email-modal-wrapper" class="displaynone">
    <div class="email-wrapper clearfix">
        <div class="email-content clearfix">
            <a href="#" class="close">{translate key="Zamknij"}</a>
            <h2>{translate key="Elegancki newsletter"}</h2>
            <p>{translate key="newsletter33"}</p>
            <p><strong>{translate key="newsletter331"}</strong></p>
            {translate key="newsletter-form"}

            <div id="mc_embed_signup_scroll">

                <div class="mc-field-group clearfix">
                    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="twoj.email@domena.pl">
                    <button type="submit" id="mc-embedded-subscribe">Zapisz mnie</button>
                </div>
                <div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                </div>
                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;">
                    <input type="text" name="b_20941cf76c30bf1731ea5c8da_2cc993e72f" tabindex="-1" value="">
                </div>
            </div>
            </form>
        </div>
    </div>
</div>*} {*{literal}
<script type="text/javascript" src="https://app.getresponse.com/view_webform_v2.js?u=BHk6o&webforms_id=4754304"></script>
{/literal}*}


<div id="fb-root"></div>
{literal}
<script>
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.4&appId=279026968810561";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
{/literal} {literal}
<script>
    var userLang = navigator.language || navigator.userLanguage;
    switch (userLang) {
    case 'pl-PL':
        break;
    default:
        if (window.location.href != 'http://shopmiler.com/en_GB/index' && window.location.href != 'http://shopmiler.com/pl/index' && window.location.href == 'http://shopmiler.com') {
            window.location.href = 'http://shopmiler.com/en_GB/index';
        }
        break;
    }
</script>
{/literal}

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<div class="slideout-widget widget-facebook print">
    <div class="slideout-widget-handler"></div>
    <div class="slideout-widget-content">
        <div class="fb-page" data-href="https://www.facebook.com/MilerMenswear/" data-width="280" data-height="214" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
            <div class="fb-xfbml-parse-ignore">
                <blockquote cite="https://www.facebook.com/MilerSpiritsAndStyle?fref=ts"><a href="https://www.facebook.com/MilerSpiritsAndStyle?fref=ts">Miler Spirits &amp; Style</a></blockquote>
            </div>
        </div>
    </div>
</div>

<div class="modal-overlay"></div>
<!-- overlay for modal lightbox-->