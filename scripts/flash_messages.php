{dynamic}
<div class="container alerts-container">
    {foreach from=$flash_messages.error item=item key=k}
    <div class="alert-error alert">
        <button type="button" class="close icon-remove">
            <span>{translate key="close"}</span>
        </button>
        <div class="row">
            <p>{$item.message}</p>
        </div>
    </div>
    {/foreach} {foreach from=$flash_messages.warning item=item key=k}
    <div class="alert-warning alert">
        <button type="button" class="close icon-remove">
            <span>{translate key="close"}</span>
        </button>
        <div class="row">
            <p>{$item.message}</p>
        </div>
    </div>
    {/foreach} {foreach from=$flash_messages.info item=item key=k}
    <div class="alert-info alert">
        <button type="button" class="close icon-remove">
            <span>{translate key="close"}</span>
        </button>
        <div class="row">
            <p>{$item.message}</p>
        </div>
    </div>
    {/foreach} {foreach from=$flash_messages.success item=item key=k}
    <div class="alert-success alert">
        <button type="button" class="close icon-remove">
            <span>{translate key="close"}</span>
        </button>
        <div class="row">
            <p>{$item.message}</p>
        </div>
    </div>
    {/foreach}
</div>
{/dynamic}