{include file='header.tpl'}
<body{if $body_id} id="{$body_id|escape}" {/if}{if $body_class} class="{$body_class|escape}" {/if}>


    {include file='body_head.tpl'}

    <div class="container content-wrapper clearfix">

        <div class="box" id="box_panel">
            <h2 class="page-title">{translate key="Customer's panel"}</h2> {if count($orders)}
            <h3 class="boxtitle">{translate key='Your orders'}</h3>
            <table class="orders payable table">
                <thead>
                    <tr>
                        <th class="id">{translate key='Order no.'}</th>
                        <th class="sum">{translate key='Value'}</th>
                        <th class="status">{translate key='Status'}</th>
                        <th class="parcels">{translate key='Package'}</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$orders item=order name=list} {assign var=id value=$order->getIdentifier()} {assign var=link value=$orders_links[$id]}
                    <tr class="{if $smarty.foreach.list.index % 2}odd{else}even{/if}">
                        <td class="id">
                            {translate key='%sOrder no. %d%s' p0="<a href=\ "$link\">" p1=$id p2='</a>'}
                            <span class="smalldate">({date value=$order->order->date})</span>
                        </td>
                        <td class="sum">{currency value=$order->sumOrder()}</td>
                        <td class="status">
                            <span>{$order->status->translation->name|escape}</span> {if $order->sumOrder()*100 > $order->order->paid*100 && $order->hasOnlinePayment()} {assign var=onlinepayment value=$order->getOnlinePayment()} {if !$onlinepayment->isFinished() or !$onlinepayment->isStarted()} {if !$onlinepayment->isFinished() and $onlinepayment->isStarted()}
                            <a class="titlequestion" title="{translate key='Your payment is processed. Are you sure you want to pay again?'}" href="{route
                                                                                                                                                    key='panelPayment' orderId=$id}">{translate key='pay again'}</a> {else}
                            <a href="{route key='panelPayment' orderId=$id}">{translate key='pay'}</a> {/if} {/if} {/if}
                        </td>
                        <td class="parcels">
                            {if count($order->parcels) > 0} {foreach from=$order->parcels item=parcel} {if strlen($parcel->getTraceLink())}
                            <a href="{$parcel->getTraceLink()}" class="trace popup">
                                {$parcel->parcel->shipping_code|escape}
                            </a>
                            <span class="smalldate">({translate key='shipped:'} {date value=$parcel->parcel->send_date})</span> {/if} {/foreach} {else} - {/if}
                        </td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
            {if $orders_alllink}
            <a class="allorders button spanhover" href="{route key='panelOrders'}">
                <span>{translate key='Order history (%d)' p1=$orders_count}</span>
            </a>
            {/if} {/if}

            <div class="columns-wrapper clearfix">
                <div class="column two">
                    <h3 class="boxtitle">{translate key='Account settings'}</h3>
                    <p class="name">{if $user->user->userinfo->firstname || $user->user->userinfo->lastname }{$user->user->userinfo->firstname|escape} {$user->user->userinfo->lastname|escape}{/if}</p>
                    <p class="mail">{$user->user->userinfo->email|escape}</p>

                    <div class="bottombuttons clearfix single">
                        <a href="{route key='panelEdit'}" class="editprofile button spanhover">
                            <span>{translate key='Edit your profile'}</span>
                        </a>
                        <a href="{route key='panelPassword'}" class="changepass button spanhover">
                            <span>{translate key='Change your password'}</span>
                        </a>

                        <a href="{route key='logout'}" class="changepass button spanhover">
                            <span>{translate key='Logout'}</span>
                        </a>
                    </div>
                </div>
                <div class="column two clearfix">
                    <h3 class="boxtitle">{translate key='Addresses'}</h3>
                    <ul class="address-list">
                        <li><strong>{translate key='Invoicing address'}</strong></li>
                        {if $billing_address} {assign var=address value=$billing_address->address} {if $address->firstname || $address->lastname }
                        <li>{if $address->firstname}{$address->firstname|escape} {/if}{if $address->lastname}{$address->lastname|escape}{/if}</li>{/if} {if $address->company_name}
                        <li>{$address->company_name|escape}</li>{/if} {if $address->tax_id}
                        <li>{translate key='NIP No.:'} {$address->tax_id|escape}</li>{/if} {if $address->pesel}
                        <li>{translate key='PESEL:'} {$address->pesel|escape}</li>{/if} {if $address->street_1}
                        <li>{$address->street_1|escape}</li>{/if} {if $address->zip_code || $address->city }
                        <li>{if $address->zip_code}{$address->zip_code|escape}, {/if}{if $address->city}{$address->city|escape}{/if}</li>{/if} {if $address->country}
                        <li>{$address->country|escape}</li>{/if} {if $address->phone}
                        <li>{$address->phone|escape}</li>{/if} {else}
                        <li>{translate key='[none]'}</li>
                        {/if}
                        </li>
                    </ul>
                    <ul class="address-list">
                        <li><strong>{translate key='Delivery address'}</strong></li>
                        {if $shipping_address} {assign var=address value=$shipping_address->address} {if $address->firstname || $address->lastname }
                        <li>{if $address->firstname}{$address->firstname|escape} {/if}{if $address->lastname}{$address->lastname|escape}{/if}</li>{/if} {if $address->company_name}
                        <li>{$address->company_name|escape}</li>{/if} {if $address->tax_id}
                        <li>{translate key='NIP No.:'} {$address->tax_id|escape}</li>{/if} {if $address->street_1}
                        <li>{$address->street_1|escape}</li>{/if} {if $address->zip_code || $address->city }
                        <li>{if $address->zip_code}{$address->zip_code|escape}, {/if}{if $address->city}{$address->city|escape}{/if}</li>{/if} {if $address->country}
                        <li>{$address->country|escape}</li>{/if} {if $address->phone}
                        <li>{$address->phone|escape}</li>{/if} {else}
                        <li>{translate key='[none]'}</li>
                        {/if}
                    </ul>

                    <a href="{route key='panelAddressList'}" class="editaddresses button spanhover">
                        <span>{translate key='Go to address edition'}</span>
                    </a>

                </div>
            </div>

            {if $loyalty}
            <h3 class="boxtitle">{translate key='Loyalty program'}</h3>
            <ul class="loyalty row">
                <li>
                    <p class="sum">{translate key='Points total: %s%s%s' p1='<b>' p2=$loyalty_points p3='</b>'}</p>
                </li>
                {if $loyalty_discount}
                <li class="loyalty_discount">
                    <b>{translate key='Discount level'}</b> {if $loyalty_level && $loyalty_level.level}
                    <p class="current">{translate key='Permanent discount you have for gathering loylaty points (%s%s%s)' p1='<b>' p2=$loyalty_level.level p3='</b>'}</p>
                    <h3>{translate key='discount %s' p1=$loyalty_level.discount}</h3> {if $loyalty_next_level}
                    <p class="next">{translate key='To gain bigger discount gather another %s%s%s points' p1='<b>' p2=$loyalty_next_level p3='</b>'}</p>
                    {/if} {elseif $loyalty_next_level}
                    <p class="next">{translate key="You need at least %s%s%s more points to gain permanent discount" p1='<b>' p2=$loyalty_next_level p3='</b>'}</p>
                    {/if}
                </li>
                {/if} {if $loyalty_exchange}
                <a href="{route key='loyaltyList'}" class="loyaltylist button spanhover">
                    <span>{translate key='Go to list of products for which points may be exchanged'}</span>
                </a>
                {/if}
            </ul>
            {/if} {if $comments_count > 0 || $favourites_count > 0}
            <h3 class="boxtitle">{translate key='Products'}</h3>
            <div class="bottombuttons single clearfix">
                {if $comments_count > 0}
                <a href="{route key='panelComments'}" class="prodcomments button spanhover">
                    <span>{translate key='Your opinions about products (%d)' p0=$comments_count}</span>
                </a>
                {/if} {if $favourites_count > 0}
                <a href="{route key='panelFavourites'}" class="prodstorage button spanhover">
                    <span>{translate key='Stored products (%d)' p0=$favourites_count}</span>
                </a>
                {/if}
            </div>
            {/if}
        </div>
    </div>
    <!-- contet-wrapper -->
    {include file='footerbox.tpl'} {include file='footer.tpl' force_include_cache='1' force_include_cache_tags='Logic_SkinFooterGroupList,Logic_SkinFooterLinkList,Logic_SkinFooterGroup,Logic_SkinFooterLink'} {plugin module=shop template=footer} {include file='switch.tpl'}
    </body>

    </html>