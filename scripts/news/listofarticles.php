<div class="box" id="box_articlelist">
    {foreach from=$articles item=article name=list}
    <article class="article" role="article">
        <h2 class="article_name"><a href="{route function='news' key=$article->getIdentifier() newsId=$article->getIdentifier()}">{$article->article->name|escape}</a></h2>
        <h5 class="article_date">
            {date value=$article->article->date format='Zend_Date::DATE_MEDIUM'}{if $article->article->author}, {$article->article->author|escape}{/if}
        </h5>
        <div class="resetcss row">{$article->article->short_content}</div>
        {if $article->article->content|strlen > 0 && $article->article->short_content != $article->article->content}
        <a class="readmore" href="{route function='news' key=$article->getIdentifier() newsId=$article->getIdentifier()}">{translate key="more"} &raquo;</a> {/if}
    </article>
    {/foreach}
</div>