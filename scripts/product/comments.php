{if false !== $product_comments && 1 == $skin_settings->productdetails->comments}
<div id="box_productcomments" class="col-sm-6 col-sm-offset-3">
    <h3 class="title">{translate key="Opinions about the product"} ({$product_comments|count})</h3>

    <div class="comments-list clearfix">
        {foreach from=$product_comments item=comment name=list}
        <div class="productcomment" id="comment{$comment->getIdentifier()}" itemprop="review" itemscope itemtype=" {$schema}://schema.org/Review">
            <div class="meta clearfix">
                <h5 class="reviewer" itemprop="author">{$comment->comment->user_name|escape}</h5>
                <span class="date">{date value=$comment->comment->date}</span>
            </div>
            <p class="description row" itemprop="description">{$comment->comment->content|escape}</p>
        </div>
        {/foreach}
    </div>
    {if $can_comment}
    <form action="{route key='productComment' productId=$product->getIdentifier()}" method="post" class="form-horizontal" id="commentform">
        <fieldset>
            {include file='formantispam.tpl'}

            <div class="row clearfix">
                <div class="label">
                    <label for="commentuser">{translate key="Nick:"}</label>
                </div>
                <div class="input">
                    <input name="user" type="text" id="commentuser" value="{if $user_logged}{$user->user->getName()|escape}{else}{$data.user|escape}{/if}" size="30" class="f-grid-12"> {if $data_error.user}
                    <ul class="input_error">
                        {foreach from=$data_error.user item=err_text}
                        <li>{$err_text|escape}</li>
                        {/foreach}
                    </ul>
                    {/if}
                </div>
            </div>
            <div class="row clearfix">
                <div class="label">
                    <label for="comment">{translate key="Your opinion:"}</label>
                </div>
                <div class="input">
                    <textarea name="comment" id="comment" rows="5" cols="30" class="f-grid-12">{$data.comment|escape}</textarea>
                    {if $data_error.comment}
                    <ul class="input_error">
                        {foreach from=$data_error.comment item=err_text}
                        <li>{$err_text|escape}</li>
                        {/foreach}
                    </ul>
                    {/if}
                </div>
            </div>
            <div class="bottombuttons clearfix">
                <button type="submit" class="btn">
                    <span>{translate key="Send"}</span>
                </button>
            </div>
        </fieldset>
    </form>
    {/if}
</div>
{/if}