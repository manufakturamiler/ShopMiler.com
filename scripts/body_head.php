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
{/literal}

<div id="page-top">
</div>

{dynamic} {if $cookie}
<div id="cookie">
    <div class="container clearfix">
        {if $cookiepage}
        <span class="desc">{translate key="In order to deliver services, this website uses cookies in accordance with the %sCookies Policy%s. You can specify the cookies storage conditions and access them in your browser settings." s1="<a href=\"$cookiepage\">" s2="</a>"}</span> {else}
        <span class="desc">{translate key="In order to deliver services, this website uses cookies in accordance with the %sCookies Policy%s. You can specify the cookies storage conditions and access them in your browser settings." s1="" s2=""}</span> {/if}
        <span class="close fa fa-times"></span>
    </div>
</div>
{/if} {/dynamic} {if 1 == $skin_settings->header->basket} {dynamic}
<nav class="main-menu container">
    <div class="top-row">
        <button class="search-toggle">Szukaj</button>
        <div class="search-form">
            <form class="search clearfix" action="{route key='search'}" method="post">
                {include file='formantispam.tpl'}
                <input type="text" name="search" autofocus="autofocus" placeholder="{translate key='search in the shop...'}" value="" class="search fadingtext" />
                <button>Szukaj</button>
            </form>
        </div>
    </div>

</nav>
<div class="top-wrapper">
    <div class="container clearfix">
        <div class="left">
            <ul class="family-list">
                <li>
                    <a href="#" class="infobox"><span>Miler Spirits &amp; Style</span></a>
                    <ul class="submenu clearfix">
                        <li>
                            <div class="logo">
                                <a href="http://gentlemanschoice.pl/" target="_blank"><img src="http://sklepmiler.pl/skins/user/rwd_shoper_1/images/user/gch-logo.png" alt=""></a>
                            </div>
                            <h3><a href="http://gentlemanschoice.pl/" target="_blank">Gentleman'S Choice</a></h3>
                            <p><a href="http://gentlemanschoice.pl/" target="_blank">{translate key='Details'} &raquo;</a></p>
                        </li>
                        <li>
                            <div class="logo">
                                <a href="http://www.milerpije.pl/" target="_blank"><img src="http://spiritsandstyle.com/img/pije.png" alt=""></a>
                            </div>
                            <h3><a href="http://www.milerpije.pl/" target="_blank">MilerPije.pl</a></h3>
                            <p><a href="http://www.milerpije.pl/" target="_blank">{translate key='Details'} &raquo;</a></p>
                        </li>
                        <li>
                            <div class="logo">
                                <a href="http://www.milerszyje.pl/"><img src="http://spiritsandstyle.com/img/szyje.png" alt=""></a>
                            </div>
                            <h3><a href="http://www.milerszyje.pl/">MilerSzyje.pl</a></h3>
                            <p><a href="http://www.milerszyje.pl/">{translate key='Details'} &raquo;</a></p>
                        </li>
                        <li>
                            <div class="logo">
                                <a href="http://sipofstyle.pl/" target="_blank"><img src="http://spiritsandstyle.com/img/sipofstyle.png" alt=""></a>
                            </div>
                            <h3><a href="http://sipofstyle.pl/" target="_blank">SipOfStyle.pl</a></h3>
                            <p><a href="http://sipofstyle.pl/" target="_blank">{translate key='Details'} &raquo;</a></p>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="center clearfix">
            <a href="mailto:info@spiritsandstyle.com" class="mail">info@spiritsandstyle.com</a>
        </div>
        <div class="right clearfix">
            <ul class="clearfix">
                {if true == $user_logged}
                <li class="hello">
                    {translate key="Hello"} <strong>{$user->user->getName()|escape}</strong>
                </li>
                <li class="myaccount">
                    <a href="{route key='panel'}" title="{translate key='My account'}" class="myaccount spanhover">
                        <span>{translate key="My account"}</span>
                    </a>
                </li>
                <li class="logout">
                    <a href="{route key='logout'}" title="{translate key='Log out'}" class="logout spanhover">
                        <span>{translate key="Log out"}</span>
                    </a>
                </li>
                {else}
                <li class="login">
                    <a href="{route key='login'}" title="{translate key='Log in'}" class="login spanhover">
                        <span>{translate key="Log in"}</span>
                    </a>
                </li>
                <li class="register">
                    <a href="{route key='register'}" title="{translate key='Register'}" class="register spanhover">
                        <strong>{translate key="Register"}</strong>
                    </a>
                </li>
                {/if}
            </ul>
        </div>
        {if $boxes_header_side|@count > 0} {dynamic} {foreach from=$boxes_header_side item=v key=k} {box file="../boxes/$v/box.tpl" box="$k"} {/foreach} {/dynamic} {/if}
    </div>
</div>
<!-- top wrapper -->
{/dynamic} {/if}

<div class="mobile-top-logo">
    <a href="/" Title="Home"><img src="{$path}images/user/top-mobile-logo.png" alt="Miler Menswear" /></a>
</div>

<div class="mobile-row">

    <a href="/" class="mobile-logo">
        <img src="{$path}/images/user/logo-square.png" alt="Miler" />
    </a>

    <button class="menu-button">
        <span>
        </span>
    </button>

    <a href="{route key='basket'}" title="Basket" class="mobile-basket">
        <img src="{$path}/images/user/basket-new.png" alt="Basket" />
    </a>
    <a href="{route key='panel'}" title="Account" class="mobile-basket">
        <img src="{$path}/images/user/acount-new.png" alt="Account" />
    </a>

    <a class="szukaj-mobile" href="javascript:void(0)"><img src="{$path}/images/user/search-new.png" /></a>

    <div class="mobile-language">
        <a href="/pl/index" alt="polish" title="polish"><img src="{$path}/images/user/polish.png" /></a>
        <a href="/en_GB/index" alt="english" title="english"><img src="{$path}/images/user/english.png" /></a>
    </div>

</div>

<div class="search-bar">

    <nav class="main-menu container">
        <div class="top-row">
            <button class="search-toggle">Szukaj</button>
            <div class="search-form">
                <form class="search clearfix" action="{route key='search'}" method="post">
                    {include file='formantispam.tpl'}
                    <input type="text" name="search" autofocus="autofocus" placeholder="{translate key='search in the shop...'}" value="" class="search fadingtext" />
                    <button>Szukaj</button>
                </form>
            </div>
        </div>

    </nav>

</div>

<div class="mobile-menu">
    <nav class="main-menu container">
        <div class="mobile-menu-row">

            {dynamic} {foreach from=$boxes_left_side item=v key=k} {box file="../boxes/$v/box.tpl" box="$k"} {/foreach} {/dynamic}

        </div>
    </nav>
</div>

<header class="header container clearfix" id="page-nav">

    <h1>
        <a href="{baseDir nonempty=1}" title="{translate key='Main page'}" class="link-logo {if $seo_has_blank_logo}link-logo-text{else}link-logo-img{/if} left">
            {if $seo_has_blank_logo}
            {$seo_logo_title|escape}
            {else}
            <img src="{$path}/images/user/logo_grey.png" alt="{$seo_logo_title|escape}">
            {/if}
        </a>
    </h1>


    <div class="quick-container">
        <div class="quick-info clearfix">
            <span class="return">{translate key='30 day return policy'}</span>
        </div>

        <div class="quick-info-2 clearfix">
            <span class="return">{translate key='61 225 87 82'}</span>
        </div>

    </div>


    {if 1 == $skin_settings->header->basket} {dynamic}

    <div class="top-buttons">
        <div class="basket top-basket {if 0 == $user->basket->countProducts()} empty-basket{/if}">
            <a href="{route key='basket'}" title="Koszyk" class="count">
                <span class="countlabel">
                    <b>
                        <b class="sum">{currency value=$user->basket->sumProducts(false, false)}</b>
                        <b class="count"><span>{$user->basket->countProducts()}</span></b>
                </b>

                </span>
            </a>
        </div>

        <div class="basket top-account">
            {if true == $user_logged}
            <a href="{route key='panel'}" title="Konto" class="count">
                <span class="countlabel">
                    <span class="claim separate">{$user->user->getName()|escape}</span>
                </span>
            </a>
            {else}

            <a href="{route key='panel'}" title="Konto" class="count">
                <span class="countlabel">
                    <span class="claim">{translate key="Moje"}</span>
                <span class="claim">{translate key="Konto"}</span>
                </span>
            </a>

            {/if}

        </div>

        <a class="szukaj" href="javascript:void(0)"><img src="{$path}/images/user/search-ico.png" /></a>


        {/dynamic} {/if}
    </div>
    <a href="/pl/index"><img src="{$path}/images/user/polish.png" class="head-lang" /></a>
    <a href="/en_GB/index"><img src="{$path}/images/user/english.png" class="head-lang" /></a>
</header>

<nav class="main-menu container">
    <div class="bottom-row">
        {dynamic} {foreach from=$boxes_left_side item=v key=k} {box file="../boxes/$v/box.tpl" box="$k"} {/foreach} {/dynamic}
    </div>


</nav>

<div class="btn-tgl-up">
    <a href="#page-top" class="page-scroll">&#8743;</a>
</div>



{dynamic} {include file='flash_messages.tpl'} {/dynamic}