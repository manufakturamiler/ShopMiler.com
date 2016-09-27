{include file='header.tpl'}
<body{if $body_id} id="{$body_id|escape}"{/if}{if $body_class} class="{$body_class|escape}"{/if}>

    {include file='body_head.tpl'}

    <div class="container content-wrapper clearfix">

        <div class="box" id="box_addresses">
            <h2 class="page-title">{translate key="List of addresses"}</h2>

            <div class="innerbox">
                {if count($user->user->addresses) > 0}
                <div class="user-addresses-wrapper">
                    {foreach from=$user->user->addresses item=address name=list}
                    {assign var=address value=$address->address}
                    <div class="user-addresses clearfix {if $smarty.foreach.list.index % 2}odd{else}even{/if}">
                        <ul class="address-list">
                            {if $address->firstname || $address->lastname}
                            <li class="name">{if $address->firstname}{$address->firstname|escape} {/if}{if $address->lastname}{$address->lastname|escape}{/if}</li>{/if}
                            {if $address->company_name}<li class="company">{$address->company_name|escape}</li>{/if}
                            {if $address->tax_id}<li class="nip">{translate key='NIP No.:'} {$address->tax_id|escape}</li>{/if}
                            {if $address->pesel}<li class="pesel">{translate key='PESEL:'} {$address->pesel|escape}</li>{/if}
                            {if $address->street_1}<li class="address">{$address->street_1|escape}</li>{/if}
                            {if $address->zip_code || $address->city}
                            <li class="city">{if $address->zip_code}{$address->zip_code|escape}, {/if}{if $address->city}{$address->city|escape}{/if}</li>{/if}
                            {if $address->country}<li class="country">{$address->country|escape}</li>{/if}
                            {if $address->phone}<li class="phone">{$address->phone|escape}</li>{/if}
                        </ul>

                        <ul class="links">
                            <li>
                                <a href="{route key='panelAddressEdit' addressId=$address->address_book_id}" class="edit btn spanhover">
                                    <span>{translate key='edit'}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{route key='panelAddressRemove' addressId=$address->address_book_id}" class="remove btn spanhover titlequestion" title="{translate key='Are you sure, you want to remove address: %s, %s %s?' p1=$address->street_1 p2=$address->zip_code p3=$address->city}">
                                    <span>{translate key='remove'}</span>
                                </a>
                            </li>
                            <li>
                                {if 0 == $address->default}
                                <a href="{route key='panelAddressDefault' addressId=$address->address_book_id}" class="default spanhover btn">
                                    <span>{translate key='set as default payment address'}</span>
                                </a>
                                {else}
                                <em class="default">
                                    <span>{translate key='default payment address'}</span>
                                </em>
                                {/if}
                            </li>
                            <li>
                                {if 0 == $address->shipping_default}
                                <a href="{route key='panelAddressShipping' addressId=$address->address_book_id}" class="shipping spanhover btn">
                                    <span>{translate key='set as default delivery address'}</span>
                                </a>
                                {else}
                                <em class="shipping">
                                    <span>{translate key='default delivery address'}</span>
                                </em>
                                {/if}
                            </li>
                        </ul>
                    </div>
                    {/foreach}
                </div>
                {/if}

                <div class="bottombuttons clearfix single">
                    <a class="add button important red spanhover btn" href="{route key='panelAddressEdit'}">
                        <span>{translate key='Add an address'}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {include file='footerbox.tpl'}
    {include file='footer.tpl' force_include_cache='1' force_include_cache_tags='Logic_SkinFooterGroupList,Logic_SkinFooterLinkList,Logic_SkinFooterGroup,Logic_SkinFooterLink'}
    {plugin module=shop template=footer}
    {include file='switch.tpl'}
    </body>
</html>