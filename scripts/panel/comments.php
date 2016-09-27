{include file='header.tpl'}
<body{if $body_id} id="{$body_id|escape}" {/if}{if $body_class} class="{$body_class|escape}" {/if}>

    {include file='body_head.tpl'}
    <div class="content-wrapper container clearfix">
        <div class="innermain container">

            <div class="panel" id="box_productcomments">
                <h2 class="page-title">{translate key="Opinions about products"}</h2>

                <div class="comments-list clearfix">
                    {foreach from=$user->user->comments item=comment name=list}
                    <div class="productcomment">
                        <div class="meta clearfix">
                            <h5><a class="product" href="{route function='product' key=$comment->product->getIdentifier() productName=$comment->product->translation->name
                                productId=$comment->product->getIdentifier()}" title="{$comment->translation->name|escape}">{
                                $comment->product->translation->name|escape}</a></h5>
                            <span class="date">{date value=$comment->comment->date}</span>
                        </div>
                        <p>{$comment->comment->content|escape}</p>
                    </div>
                    {/foreach}
                </div>
            </div>
        </div>
        {include file='footerbox.tpl'} {include file='footer.tpl' force_include_cache='1' force_include_cache_tags='Logic_SkinFooterGroupList,Logic_SkinFooterLinkList,Logic_SkinFooterGroup,Logic_SkinFooterLink'} {plugin module=shop template=footer} {include file='switch.tpl'}
        </body>

        </html>