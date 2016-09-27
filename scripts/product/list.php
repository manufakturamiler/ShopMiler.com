{php}$helper = $this->_tpl_vars['helper'];{/php} {include file='header.tpl'}
<body{if $body_id} id="{$body_id|escape}" {/if}{if $body_class} class="{$body_class|escape}" {/if}>
    {include file='body_head.tpl'}

    <div class="content-wrapper container clearfix">

        <aside class="sidebar">
            {dynamic} {foreach from=$boxes_left_side item=v key=k} {box file="../boxes/$v/box.tpl" box="$k"} {/foreach} {/dynamic}
        </aside>

        <div class="content centercol">
            {if $products->getTotalItemCount() > 0}
            <h2 class="page-title">
                {if $body_class|strstr:"product_new" && $category_name|escape == ''}
                {translate key="Nowości"}
                {elseif $body_class|strstr:"product_promo" && $category_name|escape == ''}
                {translate key="Promocje"}
                {elseif $category_name}
                {translate key=""}
                {else}
                {translate key='Number of products found:'} {$products->getTotalItemCount()}
                {/if}
            </h2> {if $category_description}
            <div class="category-desc">
                {$category_description}
            </div>
            {/if}


            <div class="filters-wrapper clearfix">
                {dynamic} {foreach from=$boxes_top_side item=v key=k} {box file="../boxes/$v/box.tpl" box="$k"} {/foreach} {/dynamic}
                <div class="sort-and-view">
                    {if true == $sort_links}
                    <span class="sortlinks">
                        <div class="products-sort-container clearfix">
                            <span class="products-active-sort">{translate key="Sort according to:"} </span>
                    <div class="products-sort-options">
                        <a href="{php} echo $helper->url(array('sort' => 1)); {/php}{if $google}?{$google|escape}{/if}" {if $sort==1 }class="active-sort" {/if}>{translate key="Product name A-Z"}
                                </a>
                        <a href="{php} echo $helper->url(array('sort' => 2)); {/php}{if $google}?{$google|escape}{/if}" {if $sort==2 }class="active-sort" {/if}>{translate key="Product name Z-A"}
                                </a>
                        <a href="{php} echo $helper->url(array('sort' => 3)); {/php}{if $google}?{$google|escape}{/if}" {if $sort==3 }class="active-sort" {/if}>{translate key="Price: Low to High"}
                                </a>
                        <a href="{php} echo $helper->url(array('sort' => 4)); {/php}{if $google}?{$google|escape}{/if}" {if $sort==4 }class="active-sort" {/if}>{translate key="Price: High to Low"}
                                </a>
                    </div>
                </div>
                </span>
                {/if}
            </div>
        </div>
        <!-- filters-wrapper -->

        {include file='product/tableofproducts.tpl'} {if $products->getTotalItemCount() > $products->getItemCountPerPage()}
        <div class="floatcenterwrap">
            {include file='paginator.tpl'}
        </div>
        {/if}

    </div>
    </div>
    <!-- content wrapper -->

    {if $category_name == 'Alkohole'}
    <div id="age-modal-wrapper" class="displaynone">
        <div class="age-wrapper clearfix">
            <div class="age-content clearfix">
                <h2>Komunikat</h2>
                <p>{translate key='I declare that I am an adult authorized to legally purchase alcohol in my country.'}</p>
                <div class="buttons clearfix">
                    <button class="yes">{translate key='Yes'}</button>
                    <button class="no">{translate key='No'}</button>
                </div>
            </div>
        </div>
    </div>
    {else} {/if} {else}
    <div class="content-wrapper container clearfix">
        <div class="alert-info alert">
            <p>{translate key="No products have been found."}</p>
        </div>
    </div>
    <!-- content wrapper -->

    {/if} {include file='footerbox.tpl'} {include file='footer.tpl' force_include_cache='1' force_include_cache_tags='Logic_SkinFooterGroupList,Logic_SkinFooterLinkList,Logic_SkinFooterGroup,Logic_SkinFooterLink'} {plugin module=shop template=footer} {include file='switch.tpl'}
    </body>

    </html>