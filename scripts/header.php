<!DOCTYPE html>
<!--[if lte IE 8]>     <html lang="{lang key='short'}" class="lt-ie8"> <![endif]-->
<!--[if IE 9]>         <html lang="{lang key='short'}" class="lt-ie8 lt-ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="{lang key='short'}">
<!--<![endif]-->

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title>{$seo_title|escape}</title>
    <meta name="keywords" content="{$seo_keywords|escape}" />
    <meta name="description" content="{$seo_description|escape}" />
    <meta name="viewport" content="{if $smarty.cookies.show_full_page == 0}width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0{else}{/if}">
    <meta name="google-site-verification" content="BvuKEe5ptXP0CrynEPTE_r_MzllNDsiE8R-mt7TxfYY" />
    <meta name="google-site-verification" content="hmKQCQ2c_AiH2wiP0PTbuTbYI9hMdiwmeSNimMzivjs" />
    <meta name="google-site-verification" content="kb1A-gj2hznv9O-M-INoB22idp2R5XtrlM3YNwNuiJg" />
    <meta name="google-site-verification" content="nDU-wpjmIANSKwnQrgTNfR2nPRq2J_EmsZ5FdYcIvwI" />
    <meta name="google-site-verification" content="oDXi2X7b3K9tIywSYXMcT0IhD6EbWfOgd4Sm_VE26JY" />
    <meta name="google-site-verification" content="67lZ67_c7aRZi9MJAM62UIq40mp5ZZX_8Wui5TEZSG4" />


    <link rel="home" href="{baseDir nonempty=1}" />
    <link rel="shortcut icon" href="{$path}images/favicon.png" />
    <link href='https://fonts.googleapis.com/css?family=Oranienbaum&subset=latin,latin-ext' rel='stylesheet' type='text/css'> {plugin module=shop template=pre-head}

    <link id="csslink" rel="stylesheet" type="text/css" href="{sfc type='css' id=$skin_id user=$user_css gallery=0 lang=$lang_full}" />
    <script type="text/javascript" src="{sfc type='js' id=$skin_id user=$user_js gallery=0 lang=$lang_full moo=0 jq=1 mainname='main-jq'}"></script>
    <script src="//use.typekit.net/bkm2cjj.js"></script>
    <script>
        {
            literal
        }
        try {
            Typekit.load();
        } catch (e) {} {
            /literal}
    </script>

    {if count($seo_links)} {foreach from=$seo_links item=v key=k}
    <link rel="{$k|escape}" href="{$v|escape}" /> {/foreach} {/if} {if count($opengraph_header)} {foreach from=$opengraph_header item=v key=k} {if strlen($v)}
    <meta property="og:{$k|escape}" content="{$v|escape}" /> {/if} {/foreach} {/if} {$snippet_head} {literal}
    <!-- Facebook Pixel Code -->
    <script>
        ! function (f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window,
            document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');

        fbq('init', '306925449517096');
        fbq('track', "PageView");
        fbq('track', 'AddToCart');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=306925449517096&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->
    {/literal} {plugin module=shop template=post-head}
</head>