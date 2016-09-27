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
                            <p><a href="http://gentlemanschoice.pl/" target="_blank">Sprawdź szczegóły &raquo;</a></p>
                        </li>
                        <li>
                            <div class="logo">
                                <a href="http://www.milerpije.pl/" target="_blank"><img src="http://spiritsandstyle.com/img/pije.png" alt=""></a>
                            </div>
                            <h3><a href="http://www.milerpije.pl/" target="_blank">MilerPije.pl</a></h3>
                            <p><a href="http://www.milerpije.pl/" target="_blank">Sprawdź szczegóły &raquo;</a></p>
                        </li>
                        <li>
                            <div class="logo">
                                <a href="http://www.milerszyje.pl/"><img src="http://spiritsandstyle.com/img/szyje.png" alt=""></a>
                            </div>
                            <h3><a href="http://www.milerszyje.pl/">MilerSzyje.pl</a></h3>
                            <p><a href="http://www.milerszyje.pl/">Sprawdź szczegóły &raquo;</a></p>
                        </li>
                        <li>
                            <div class="logo">
                                <a href="http://sipofstyle.pl/" target="_blank"><img src="http://spiritsandstyle.com/img/sipofstyle.png" alt=""></a>
                            </div>
                            <h3><a href="http://sipofstyle.pl/" target="_blank">SipOfStyle.pl</a></h3>
                            <p><a href="http://sipofstyle.pl/" target="_blank">Sprawdź szczegóły &raquo;</a></p>
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
    </div>
</div>
<!-- top wrapper -->

<header class="header container clearfix">
    {dynamic}
    <h1>
        <a href="{baseDir nonempty=1}" title="{translate key='Main page'}" rel="nofollow" class="logo">
            <img src="{$path}images/logo.png" alt="Logo" />
        </a>
    </h1>

    <div class="quick-info clearfix">
        <span class="return">Możliwość zwrotu do 30 dni</span>
    </div>

    <div class="basket top-basket {if 0 == $user->basket->countProducts()} empty-basket{/if}">
        <a href="{route key='basket'}" title="Koszyk" class="count">
            <span class="countlabel">
                <span class="claim">{translate key="Basket"}:</span>
            <b>
                    <b class="sum">{currency value=$user->basket->sumProducts(false)}</b>
            <b class="count"><span>{$user->basket->countProducts()}</span></b>
            </b>
            </span>
        </a>
    </div>

    {/dynamic}
</header>

<div class="basket-steps container">
    <ol class="clearfix">
        {if $body_class == 'shop_basket_finished'}
        <li class="mark-green">
            <span>{translate key="Basket"}</span>
        </li>
        <li class="mark-green">
            <span>{translate key="Your details"}</span>
        </li>
        {/if} {foreach from=$breadcrumbs->getBreadCrumbs() item=item name=bclist} {if $smarty.foreach.bclist.index != 0}
        <li class="{if $smarty.foreach.bclist.last}active-step{/if}{if $item.url || $breadcrumbs->getBreadCrumbs()|@count >= 4} mark-green{/if}">
            {if $item.url}<a href="{$item.url|escape}">{/if}  
            <span>{$item.name}</span>
            {if $item.url}</a>{/if}
        </li>
        {/if} {/foreach} {if $breadcrumbs->getBreadCrumbs()|@count
        <=3 } <li {if $body_class=='shop_basket_finished' }class="mark-green" {/if}>
            <span>{translate key="Summary"}</span>
            </li>
            {/if} {if $breadcrumbs->getBreadCrumbs()|@count
            <=4 } <li {if $body_class=='shop_basket_finished' }class="mark-green" {/if}>
                <span>{translate key="Confirmation"}</span>
                </li>
                {/if}
    </ol>
</div>

{dynamic} {include file='flash_messages.tpl'} {/dynamic}