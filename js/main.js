Shop.include({
    selectorFunctions: {
        boxslider: {
            selector: '.box.slider',
            load: function (slider, shopInstance) {
                slider.removeClass('loading');

                var _initialSlideWidth = 280,
                    _slideWidth,
                    _sliderWidth,
                    _visibleSlides,
                    _maxHeight = 0,
                    _autoMove = false,
                    _autoMoveDuration = Shop.useroptions.slider.automove;

                if (slider.hasClass('slider_automove')) {
                    _autoMove = true;
                }

                var slides = slider.find('.product');

                if (slides.length > 1) {
                    var sliderWrap = $('<div class="slider-wrap" />').css('text-align', 'left');

                    var nav = $('<div />').appendTo(slider);
                    var prev = $('<span class="slider-nav-left" />').css({
                        'display': 'none'
                    }).appendTo(nav);
                    var next = $('<span class="slider-nav-right" />').css({
                        'display': 'block'
                    }).appendTo(nav);

                    slides.wrapAll(sliderWrap);
                    sliderWrap = slider.find('.slider-wrap');

                    shopInstance.addEvent('img:change', function () {
                        sliderWrap.css('height', 'auto');

                        slides.each(function () {
                            if ($(this).outerHeight() >= _maxHeight) {
                                _maxHeight = $(this).outerHeight();
                                sliderWrap.height(_maxHeight + 6);
                            }
                        });
                    });

                    $(window).on('resize', function () {
                        _sliderWidth = slider.outerWidth();
                        _visibleSlides = Math.floor(_sliderWidth / _initialSlideWidth) || 1;
                        _slideWidth = _sliderWidth / _visibleSlides;

                        slides.each(function () {
                            if ($(this).outerHeight() >= _maxHeight) {
                                _maxHeight = $(this).outerHeight();
                            }
                        });

                        slides.outerWidth(_slideWidth);
                        sliderWrap.outerWidth((_slideWidth * slides.length) + 3).height(_maxHeight + 6);

                        slides.css('left', '0');

                        if (slides.length > _visibleSlides) {
                            next.show();
                            prev.hide();
                        } else {
                            next.hide();
                            prev.hide();
                        }
                    }).trigger('resize');

                    next.on('click', function () {
                        slides.animate({
                            left: "-=" + (_slideWidth)
                        }, 400, function () {
                            var pos = parseInt($(this).css('left'));

                            if ((slides.length - _visibleSlides) * Math.floor(_slideWidth) <= -pos) {
                                next.hide();
                            }

                            if (-pos > 0) {
                                prev.show();
                            }
                        });
                    });

                    prev.on('click', function () {
                        slides.animate({
                            left: "+=" + (_slideWidth)
                        }, 400, function () {
                            var pos = parseInt($(this).css('left'));

                            if (-pos <= 0) {
                                prev.hide();
                            }

                            if ((slides.length - _visibleSlides) * Math.floor(_slideWidth) >= -pos) {
                                next.show();
                            }
                        });
                    });

                    slider.on('swipeleft', function () {
                        if (next.is(':visible')) {
                            next.trigger('click');
                        }
                    });

                    slider.on('swiperight', function () {
                        if (prev.is(':visible')) {
                            prev.trigger('click');
                        }
                    });

                    if (_autoMove) {
                        setInterval(function () {
                            if (next.is(':visible')) {
                                next.trigger('click');
                            } else {
                                slides.animate({
                                    left: 0
                                }, 600, function () {
                                    next.show();
                                    prev.hide();
                                })
                            }
                        }, _autoMoveDuration)
                    }
                }
            }
        },

        gotourl: {
            selector: '.gotourl',
            domready: function (el) {
                el.off('change').on('change', function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    if ($(this).val().length > 0) {
                        if ($(this).prop('tagName') == 'INPUT' && $(this).attr('type').match(/(radio|checkbox)/)) {
                            if (!!$(this.is(':checked')))
                                window.location.href = $(this).val();
                        } else {
                            window.location.href = $(this).val();
                        }
                    }
                });
            }
        },

        bottest: {
            selector: '.bottest',
            domready: function (el) {
                el.remove();
            }
        },

        clickhide: {
            selector: '.clickhide',
            domready: function (el) {
                el.on('mouseup', function () {
                    $(this).hide();
                });
            }
        },

        titlequestion: {
            selector: '.titlequestion',
            domready: function (el) {
                el.off('click').on('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    $(this).blur();
                    if (confirm($(this).attr('title'))) {
                        window.location.href = $(this).attr('href');
                    }
                });
            }
        },

        box_producers_select: {
            selector: '#box_producers_select',
            domready: function (el) {
                el.find('option[value="' + window.location.pathname + '"]').attr('selected', true);
            }
        },

        resetsubmit: {
            selector: 'button.resetsubmit',
            domready: function (el, shopInstance) {
                if (Shop.exist(el.form)) {
                    el.off('click').on('click', function (e) {
                        e.preventDefault();
                        e.stopPropagation();

                        var f = $(this.form);
                        f.find('input[type=text]').each(function () {
                            $(this).val('');
                        });
                        f.find('input[type=checkbox]').each(function () {
                            $(this).attr('checked', false);
                        });
                        f.find('select').each(function () {
                            this.selectedIndex = 0;
                        });

                        $('<input />').attr({
                            'type': 'hidden',
                            'name': 'reset',
                            'value': 1
                        }).appendTo(f);

                        f.submit();
                    });
                }
            }
        },

        reset: {
            selector: 'button.reset',
            domready: function (el, shopInstance) {
                if (Shop.exist(el.form)) {
                    el.on('click', function (e) {
                        e.stopPropagation();
                        e.preventDefault();
                        var f = $(this.form);
                        f.find('input[type=text]').each(function () {
                            $(this).val('');
                        });
                        f.find('input[type=checkbox]').each(function () {
                            $(this).attr('checked', false);
                        });
                        f.find('select').each(function () {
                            $(this).selectedIndex = 0;
                        });
                    });
                }
            }
        },

        flashmessageclose: {
            selector: '.alert .close',
            domready: function (el) {
                el.on('click', function (e) {
                    e.stopPropagation();
                    e.preventDefault();

                    $(this).parent().slideUp(300, function () {
                        $(this).remove();
                    })
                });
                el.css('display', 'block');
            }
        },

        alert: {
            selector: '.alert-modal',
            domready: function (el, shopInstance) {
                el.on('click', function (e) {
                    e.preventDefault();
                    shopInstance.alert($(this).attr('title'));
                })
            }
        },

        basketsubmit: {
            selector: '#box_productfull form.form-basket',
            domready: function (el, shopInstance) {
                shopInstance.addEvent('cart:add', function (ev, evForm, options, $form) {
                    var sid = parseInt([$form.find('input[name^=stock_id]').val()].join(''));

                    if ($form.hasClass('form-basket')) {
                        if (sid > 0) {
                            var l = $(el).find('.option_file.option_required input[type=file]');
                            if (l.length) {
                                for (var x = 0; x < l.length; ++x) {
                                    if ('' === $(l[x]).val()) {
                                        shopInstance.alert(Shop.lang.common.product_select_optionfile);
                                        options.preventSubmit = true;
                                        return false;
                                    }
                                }
                            }

                            var l = $(el).find('.option_text.option_required input[type=text]');
                            if (l.length) {
                                for (var x = 0; x < l.length; ++x) {
                                    if ('' === $(l[x]).val()) {
                                        shopInstance.alert(Shop.lang.common.product_select_optiontext);
                                        options.preventSubmit = true;
                                        return false;
                                    }
                                }
                            }

                            var l = $(el).find('.option_radio.option_required input[type=radio]');
                            if (l.length) {
                                var radioCheck = false;
                                for (var x = 0; x < l.length; ++x) {
                                    if ($(l[x]).is(':checked')) {
                                        var radioCheck = true;
                                    }
                                }

                                if (!radioCheck) {
                                    shopInstance.alert(Shop.lang.common.product_select_optionradio);
                                    options.preventSubmit = true;
                                    return false;
                                }
                            }

                            var l = $(el).find('.option_select.option_required select');
                            if (l.length) {
                                for (var x = 0; x < l.length; ++x) {
                                    if ('' === $(l[x]).val() || Shop.lang.common.product_stock_select === $(l[x]).val()) {
                                        shopInstance.alert(Shop.lang.common.product_select_optionselect);
                                        options.preventSubmit = true;
                                        return false;
                                    }
                                }
                            }

                            var l = $(el).find('.option_checkbox.option_required input[type="checkbox"]');
                            if (l.length) {
                                for (var x = 0; x < l.length; ++x) {
                                    if (!$(l[x]).is(':checked')) {
                                        shopInstance.alert(Shop.lang.common.product_select_optioncheckbox);
                                        options.preventSubmit = true;
                                        return false;
                                    }
                                }
                            }

                            var l = $(el).find('.option_color.option_required select');
                            if (l.length) {
                                for (var x = 0; x < l.length; ++x) {
                                    if ('' === $(l[x]).val()) {
                                        shopInstance.alert(Shop.lang.common.product_select_optioncolor);
                                        options.preventSubmit = true;
                                        return false;
                                    }
                                }
                            }

                            if (Shop.exist(shopInstance.classes.AjaxBasket)) {
                                if (!$(this).hasClass(shopInstance.ajaxbasket.options.loyaltyexchange_class)) {
                                    options.preventSubmit = true;
                                    shopInstance.ajaxbasket.wrapform($form[0], evForm);
                                } else {
                                    options.preventSubmit = false;
                                }
                            } else {
                                options.preventSubmit = false;
                            }
                        } else {
                            shopInstance.alert(Shop.lang.common.product_select_stock);
                        }
                    }
                }, true);
            }
        },

        footerTab: {
            selector: '.innerfooter ul.overall',
            liSelector: '.innerfooter .head',

            domready: function (el, shopInstance) {
                var self = this;
                el.find('.head').each(function () {
                    $(this).off('click').on('click', [this], function (e) {
                        var toShow = $(this).parent().children(':not(:visible)');
                        var toHide = $(self.liSelector).parent().children(':visible:not(.head)');

                        if (!$(this).hasClass('active') && shopInstance.rwd.small) {
                            toHide.slideUp();
                            $(self.liSelector).removeClass('active').addClass('hidden');

                            $(this).removeClass('hidden').addClass('active');
                            toShow.slideDown();
                        }
                    });
                });

                var liElems = $(this.liSelector).parent().children(':not(.head)');

                $(window).resize(function () {
                    if (window.innerWidth > shopInstance.rwd.breakPoints.mid) {
                        liElems.show();
                    } else {
                        liElems.hide();
                        $(self.liSelector).removeClass('active').addClass('hidden');
                    }
                });
            }
        },

        minigalleryhover: {
            selector: '#box_productfull .maininfo .productimg div.smallgallery li img',
            load: function (el, shopInstance) {
                var img = $('#box_productfull .maininfo .productimg div.mainimg img.productimg');
                if (!Shop.exist(img)) return;

                el.on('mouseenter', function (e) {
                    var oid = img.attr('class').replace(/.*gallery_([0-9]+).*/, '$1');
                    var olink = $('prodimg' + oid);
                    var nid = $(this).parent().attr('id').replace(/prodimg/, '');
                    var nlink = $(this).parent();
                    if (oid == nid || Shop.exist(olink)) return;

                    olink.parent().parent().find('a.gallery').removeClass('current');
                    nlink.addClass('current');
                    img.removeClass('gallery_' + oid).addClass('gallery_' + nid);
                    img.attr('src', $(this).attr('data-img-name'));
                    img.attr('alt', $(this).attr('alt'));
                    $('<img />').attr('href', nlink.attr('href'));

                    if (img.hasClass('innerzoom') || img.hasClass('outerzoom')) {
                        if (img._zoomimage) {
                            img._zoomimage.remove();
                        }

                        img.removeClass('non-stock-img');

                        Shop.ImageZoom.setOptions({
                            img: img,
                            inner: img.hasClass('innerzoom')
                        });

                        shopInstance.subclass('ImageZoom');
                    }
                });

                el.on('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    $(this).parent().trigger('click');
                });

                if (img.hasClass('innerzoom') || img.hasClass('outerzoom')) {
                    if (img._zoomimage) {
                        img._zoomimage.remove();
                    }

                    img.removeClass('non-stock-img');

                    Shop.ImageZoom.setOptions({
                        img: img,
                        inner: img.hasClass('innerzoom')
                    });

                    shopInstance.subclass('ImageZoom');
                }

                img.parent().off('click').on('click', function () {
                    var osid = $(this).find('img.productimg').attr('class').replace(/.*gallery_([0-9]+).*/, '$1');
                    $('a#prodimg' + osid + '[data-gallery="true"]').trigger('click');
                });
            }
        },

        registrationCart: {
            selector: '#box_basketaddress input[name=address_type]',
            domready: function (el) {
                el.on('change', function () {
                    var c = $('#box_basketaddress input[name=address_type][value=2]').prop('checked');
                    var r1r2 = $('#box_basketaddress input[name=coname], #box_basketaddress input[name=nip]').parent();
                    var r3 = $('#box_basketaddress input[name=pesel]');
                    var select = $('select[name=country]');

                    if (c == true) {
                        r1r2.each(function () {
                            $(this).removeClass('none');
                            var next = $(this).next('tr');

                            if (next.find('td.error')) {
                                next.removeClass('none');
                            }
                        });

                        if (r3) r3.addClass('none');
                    } else {
                        r1r2.each(function () {
                            $(this).addClass('none');
                            var next = $(this).next('tr');

                            if (next.find('td.error')) {
                                next.addClass('none');
                            }
                        });

                        if ('PL' == select.val().toUpperCase().replace(/[^A-Z]/g, '') || $(this).val() == '179') {
                            if (r3) r3.removeClass('none');
                        }
                    }
                });

                if (el.val() == 2) {
                    el.trigger('change');
                }
            }
        },

        /* switch "PESEL/NIP & Company name" registration form */
        registration: {
            selector: '#box_register input[name="address_type"]',
            domready: function ($radioAddressType) {
                var $personToHide;
                var $companyToHide;
                var $selectCountry;
                var toggle;

                $selectCountry = $('form select[name="country"]');
                $personToHide = $('.pesel');
                $companyToHide = $('.nip, .coname');

                toggle = (function () {
                    if ($(this).is(':checked')) {
                        if ($(this).val() === '1') {
                            if (('PL' == $selectCountry.val().toUpperCase().replace(/[^A-Z]/g, '') || $selectCountry.val() === '179')) {
                                $personToHide.removeClass('none');
                            }

                            $companyToHide.addClass('none');
                        } else {
                            $personToHide.addClass('none');
                            $companyToHide.removeClass('none');
                        }
                    }
                }.bind($radioAddressType));

                $radioAddressType.on('change', toggle);
                toggle();
            }
        },

        /* Hides "PESEL" for other countries than PL */
        pesel: {
            selector: 'form input[name="pesel"]',
            domready: function ($inputPesel) {
                var $toHide;
                var $selectCountry;
                var toggle;

                $selectCountry = $('select[name="country"]');
                $toHide = $selectCountry.parents('form').find('.pesel');

                toggle = (function () {
                    var isPerson;

                    isPerson = $('input[name="address_type"][value="2"]').is(':checked');

                    if (('PL' == $(this).val().toUpperCase().replace(/[^A-Z]/g, '') || $(this).val() === '179') && !isPerson) {
                        $toHide.removeClass('none');
                        $inputPesel.removeClass('none');
                    } else {
                        $toHide.addClass('none');
                        $inputPesel.addClass('none');
                    }
                }.bind($selectCountry));

                $selectCountry.on('change', toggle);
                toggle();
            }
        },

        /* Hides "* (required)"" from company name and NIP for other countries than PL */
        country: {
            selector: 'form select[name="country"]',
            domready: function ($selectCountry) {
                var $toHide;
                var toggle;

                $toHide = $('label[for="input_coname"] em.color, label[for="input_nip"] em.color');
                toggle = (function () {
                    if ('PL' == $(this).val().toUpperCase().replace(/[^A-Z]/g, '') || $(this).val() === '179') {
                        $toHide.removeClass('none');
                    } else {
                        $toHide.addClass('none');
                    }
                }.bind($selectCountry));

                $selectCountry.on('change', toggle);
                toggle();
            }
        },

        horizontalCategoriesFromList: {
            selector: 'body[id^=shop_category]',
            domready: function (el) {
                var id = parseInt(el.attr('id').replace('shop_category', ''));
                if (id > 0) {
                    var hc = $('#hcategory_' + id);
                    if (hc.length) {
                        hc.addClass('current');
                        hc.parents('li.parent').addClass('current_parent');
                    }
                }
            }
        },

        horizontalCategoriesFromProduct: {
            selector: 'body[id^=shop_product]',
            domready: function (el) {
                var id = parseInt(el.attr('class').replace(/^.*shop_product_from_cat_(\d+).*$/, '$1'));
                if (id > 0) {
                    var hc = $('hcategory_' + id);
                    if (hc.length) {
                        hc.addClass('current');
                        hc.find('li.parent').addClass('current_parent');
                    }
                }
            }
        },

        inputFileEvent: {
            selector: '.input .input-file',
            domready: function (el) {
                var uploadInfo = $('<span />').addClass('loading-info none').appendTo(el.parent());
                $(el.form).on('submit', function (e) {
                    $('.loading-info').removeClass('none')
                });
            }
        },

        horizontalCurrentPage: {
            selector: '.menu .innermenu > ul > li > h3 > a',
            domready: function (el, shopInstance) {
                var href = el.attr('href') + '/';

                if (window.location.pathname && (
                        href == window.location.pathname || el.attr('href') == window.location.pathname ||
                        (href != shopInstance.urls.base && 0 == window.location.pathname.indexOf(href))
                    )) {
                    el.find('li').addClass('current');
                }
            }
        },

        horizontalMenuAdjust: {
            selector: '.menu .innermenu li.parent',
            domready: function (el, shopInstance) {
                el.on('mouseenter', function () {
                    var childUl = el.find('> .submenu > ul');

                    if ((childUl.offset().left + childUl.outerWidth()) > window.innerWidth) {
                        childUl.addClass('sub-right');
                        childUl.find('ul').addClass('sub-right');
                    }
                });
            }
        },

        accordion: {
            selector: '.accordion',
            header_class: 'acc-header',
            toggle_class: 'acc-toggle',

            domready: function (el) {
                var that = this;
                el.find('.' + this.header_class).each(function () {
                    $(this).nextUntil('.acc-header').wrapAll('<div class="' + that.toggle_class + '" />');
                });

                el.find('.' + this.toggle_class).hide();

                el.find('.' + this.header_class).on('click', function () {
                    if (!$(this).hasClass('active')) {
                        $(this).next().stop(false, true).slideDown();
                        $(this).addClass('active');
                    } else {
                        $(this).next().stop(false, true).slideUp();
                        $(this).removeClass('active');
                    }
                });
            }
        },

        boxCategoryParents: {
            selector: '#box_menu li.current',
            domready: function (el) {
                el.parent().parent().addClass('current_parent');
            }
        },

        uploadFileLimit: {
            selector: 'input[type=file]',
            domready: function (el, shopInstance) {
                el.on('change', function (e) {
                    if (!!this.files && !!this.files[0]) {
                        if (this.files[0].size > 25 * 1048576) {
                            shopInstance.alert(Shop.lang.common.file_too_big.replace("{size}", 25));
                            try {
                                shopInstance.value = '';
                            } catch (e) {}
                        }
                    }
                });
            }
        },

        cookiepolicy: {
            selector: '#cookie .close',
            domready: function (el) {
                var $cookieContainer;

                $cookieContainer = $('#cookie');
                $cookieContainer.addClass('none');

                if (!localStorage.getItem('cookie') && !$.cookie('cookie_read')) {
                    $cookieContainer.removeClass('none');
                }

                el.on('mousedown', function (e) {
                    e.stopPropagation();
                    e.preventDefault();

                    $cookieContainer.remove();
                    localStorage.setItem('cookie', '1');
                });
            }
        },

        slide_widget: {
            selector: '.widget',
            seen_part: '.widget-front',
            hidden_part: '.widget-inner',

            domready: function (el) {
                var that = this,
                    widget = $(this.selector),
                    ev = Shop.useroptions.widget.ev,
                    side = Shop.useroptions.widget.side;

                if (side === 'left') {
                    widget.css('right', 'inherit');
                    widget.find(this.seen_part).css('float', 'right');
                    widget.find(this.hidden_part).css('float', 'right');
                }

                if (Modernizr.touch) {
                    ev = 'click';
                }

                widget.each(function (self) {
                    if (!this.widget) {
                        var width = $(this).find(self.hidden_part).outerWidth();
                        $(this).css(side, -(width + 1));

                        $(this).find(self.seen_part).on(ev, function () {
                            if (ev == 'click' && $(this).parent().hasClass('active')) {
                                $(this).parent().removeClass('active');

                                if (side === 'right') {
                                    $(this).parent().stop(true, false).animate({
                                        'right': -(width + 1),
                                        'z-index': 1000
                                    }, 300);
                                } else {
                                    $(this).parent().stop(true, false).animate({
                                        'left': -(width + 1),
                                        'z-index': 1000
                                    }, 300);
                                }
                            } else {
                                $(this).parent().addClass('active');
                                if (side === 'right') {
                                    $(this).parent().stop(true, false).animate({
                                        'right': 0,
                                        'z-index': 99999
                                    }, 300);
                                } else {
                                    $(this).parent().stop(true, false).animate({
                                        'left': 0,
                                        'z-index': 99999
                                    }, 300);
                                }
                            }
                        });

                        if (ev != 'click') {
                            $(this).on('mouseleave', function () {
                                if (side === 'right') {
                                    $(this).stop(true, false).animate({
                                        'right': -(width + 1),
                                        'z-index': 1000
                                    }, 300);
                                } else {
                                    $(this).stop(true, false).animate({
                                        'left': -(width + 1),
                                        'z-index': 1000
                                    }, 300);
                                }
                            });
                        }

                        this.widget = true;
                    }
                }, [this]);
            }
        },

        sort_category: {
            selector: '.sortlinks',
            domready: function (el) {
                var container = el.find('.products-active-sort');
                var options = el.find('.products-sort-options');
                var activeText = $.trim(options.find('.active-sort').text());

                $('<span />').text(activeText).appendTo(container);

                options.hide();

                var contPos = container.position();
                options.css({
                    'position': 'absolute',
                    'left': contPos.left,
                    'top': contPos.top + container.height(),
                    'width': container.outerWidth()
                });
                el.find('.products-sort-options a').css('display', 'block');

                container.off('click').on('click', function () {
                    options.slideToggle('fast');
                }).css('cursor', 'pointer');

                $('body').off('click').on('click', function (e) {
                    if (e.originalEvent !== undefined) {
                        if (!container.is($(e.target)) && !$(e.target).parent().is(container)) {
                            options.slideUp('fast');
                        }
                    }
                });
            }
        },

        scroll_top: {
            selector: '.up',
            domready: function (el) {
                el.css('bottom', -el.height());
                var showed = 0;
                $(window).on('scroll', function (e) {
                    if ($(this).scrollTop() >= 100 && !showed) {
                        showed = 1;
                        el.stop(true).animate({
                            'bottom': '50px'
                        }, 300)
                    } else if ($(this).scrollTop() < 100) {
                        el.stop(true).animate({
                            'bottom': -el.height()
                        }, 300, function () {
                            showed = 0;
                        });
                    }
                });

                el.on('click', function (e) {
                    e.preventDefault();

                    $('html, body').animate({
                        'scrollTop': 0
                    }, 500);
                });
            }
        },

        ajax_basket: {
            selector: '.basket-contain',
            domready: function (el) {
                var basket = el.prev();
                var products = el.find('.basket-product-list li');

                $(window).on('resize', function () {
                    var basketPos = basket.position();
                    el.css({
                        top: basketPos.top + basket.outerHeight() - 1,
                        left: basketPos.left - 140,
                        width: basket.outerWidth() + 150
                    });
                });


                basket.off('mouseenter mouseleave').on('mouseenter', function () {
                    if (el.find('.basket-product-list li').length > 0) {
                        el.stop(true, true).slideDown('fast');
                    }
                }).on('mouseleave', function (e) {
                    if (!$(e.relatedTarget).parent().is(el)) {
                        el.stop(true, true).slideUp('fast');
                    }
                });

                el.off('mouseleave').on('mouseleave', function (e) {
                    if (!$(e.relatedTarget).is(basket)) {
                        $(this).stop(true, true).slideUp('fast');
                    }
                });
            }
        },

        switch_classic: {
            selector: '#turn-classic',
            domready: function (el) {
                var rwdFull;

                rwdFull = sessionStorage.getItem('showFullPage');
                if (!rwdFull || rwdFull === '0') {
                    sessionStorage.setItem('showFullPage', '0');
                } else {
                    el.removeClass('rwd');
                    el.text(Shop.lang.common.view_rwd_version);

                    $('.wrap').removeClass('rwd');
                    $('meta[name="viewport"]').attr('content', '');
                }

                el.on('click', function () {
                    if (el.hasClass('rwd')) {
                        sessionStorage.setItem('showFullPage', '1');
                    } else {
                        sessionStorage.setItem('showFullPage', '0');
                    }

                    location.reload();
                });
            }
        },

        comment: {
            selector: 'a.addcomment',
            domready: function (el) {
                if ($('.tab-container').length > 0) {
                    el.parent().on('click', function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        $('.tab-container').find('li.box_productcomments div').trigger('click');

                        setTimeout(function () {
                            window.location.hash = '#commentform';
                        }, 200)
                    });
                }
            }
        },

        mobileSearch: {
            selector: '.logo-bar .search-form',
            domready: function (el, shopInstance) {
                var searchButton = $('.menu-mobile li a.fa-search');

                $(window).resize(function () {
                    if (this.innerWidth < 768) {
                        searchButton.off('click').on('click', function (e) {
                            e.preventDefault();

                            if (!el.hasClass('mini-search')) {
                                el.addClass('mini-search');
                                $(this).addClass('active');
                            } else {
                                el.removeClass('mini-search');
                                $(this).removeClass('active');
                            }
                        });
                    } else {
                        searchButton.off('click');
                        el.removeClass('mini-search');
                    }
                });
            }
        }
    }
});

Shop.BasketHandler.condition = function () {
    if (Shop.exist($('#box_basketlist'))) {
        Shop.BasketHandler.setOptions({
            step: 1,
            containers: {
                step1: $('#cart-options')
            },
            selectors: {
                deliveryrow: 'div.delivery',
                paymentrow: 'div.payment',
                deliverychangelink: 'div.deliveryhead em.fold a',
                paymentchangelink: 'div.paymenthead em.fold a',
                paymentheadlabel: 'div.paymenthead span.desc em.color',
                paymentrlabel: 'span.name label',
                paymentradios: 'div.payment input[type=radio]',
                deliveryradios: 'div.delivery input[type=radio]',
                deliveryheadlabel: 'div.deliveryhead span.desc em.color',
                deliveryheadvalue: 'div.deliveryhead span.value em.color',
                deliverylabel: 'div.deliveryhead span.cost em',
                deliverytrlabel: 'span.name label',
                deliverytrvalue: 'span.value',
                trradio: 'input[type=radio]',
                countrytr: 'div.deliverycountry',
                trcountryselect: 'select',
                recalc: '#recalc',
                recalcbtn: '#recalc button'
            },
            ordersumfield: $('#box_basketlist #cart-options div.sum span.value')
        });
        return true;
    }

    if (Shop.exist($('#box_basketaddress'))) {
        Shop.BasketHandler.setOptions({
            step: 2,
            containers: {
                step2: $('#box_basketaddress')
            },
            selectors: {
                trdifferentaddress: 'tr.different, h4.different',
                differentaddress: 'input[name=different]',
                differentaddress_parent: 'tr.different_address',
                personaladdress: '#address_type1',
                companyaddress: '#address_type2',
                formcompanyname: 'input[name=coname]',
                formcompanynameError: 'tr.error_coname td.error',
                formtaxid: 'input[name=nip]',
                formtaxidError: 'tr.error_nip td.error',
                formcompanyname2: 'input[name=coname2]',
                formpesel: 'input[name=pesel]',
                formtaxid2: 'input[name=nip2]',
                countryselect: 'select[name=country]',
                addresstyperadios: 'input[type=radio][name^=address_type]',
                addressselectsubmit: '*[type=submit][name^=address_submit]',
                addressselect: 'select[name^=address]',
                addressinput: '*[name={name}]',
                addressfieldscontainer: 'table.address'
            },
            getaddressurl: 'panel/getaddress/id/{id}'
        });
        return true;
    }

    if (Shop.exist($('#box_basketshipping'))) {
        Shop.BasketHandler.setOptions({
            step: 'shipping',
            containers: {
                shipping: $('#box_basketshipping')
            },
            selectors: {
                deliveryrow: 'div.delivery',
                paymentrow: 'div.payment',
                paymentrlabel: 'span.name label',
                paymentradios: 'div.payment input[type=radio]',
                deliveryradios: 'div.delivery input[type=radio]',
                deliveryheadlabel: '.payment .desc',
                deliveryheadvalue: '.total-values .payment .value',
                deliverylabel: '.payment .desc',
                deliverytrlabel: 'span.name label',
                deliverytrvalue: 'span.value',
                trradio: 'input[type=radio]'
            },
            ordersumfield: $('#box_basketshipping div.sum span.value')
        });
        return true;
    }

    if (Shop.exist($('#box_basketsummary'))) {
        Shop.BasketHandler.setOptions({
            step: 3
        });
        return true;
    }

    if (Shop.exist($('#box_basketfinal'))) {
        Shop.BasketHandler.setOptions({
            step: 'done'
        });
        return true;
    }

    return false;
};

Shop.AjaxBasket.condition = function (shopInstance) {
    return (Shop.useroptions.ajaxbasket.mode === 2);
};

Shop.AddressContainer.condition = function () {
    return Shop.exist($('.address-handler'));
};

Shop.Address.condition = function () {
    return true;
};

Shop.AjaxLayer.condition = function () {
    return Shop.exist($('.ajaxlayer'));
};

Shop.CreditCard.condition = function () {
    return Shop.exist($('form .credit-card-container'));
};

Shop.FilterPrice.condition = function () {
    return Shop.exist($('#box_filter .priceinput input'));
};

Shop.FilterSelects.condition = function () {
    return (Shop.exist($('.centercol #box_filter')) || Shop.exist($('.top #box_filter')) || Shop.exist($('.footer #box_filter')));
};

Shop.FilterFolder.condition = function () {
    return (Shop.exist($('.leftcol #box_filter')) || Shop.exist($('.rightcol #box_filter')));
};

Shop.RwdMenu.condition = function (shopInstance) {
    return true;
};

Shop.RwdGallery.condition = function (shopInstance) {
    return Shop.exist($('.innersmallgallery-rwd'));
};

Shop.Gallery.condition = function (shopInstance) {
    return Shop.exist($('[data-gallery="true"]')) && (shopInstance.versionParser(shopInstance.version) >= shopInstance.versionParser('5.6.0'));
};

Shop.Mask.condition = function (shopInstance) {
    return true;
};

Shop.Modal.condition = function (shopInstance) {
    return true;
};

Shop.QuickView.condition = function (shopInstance) {
    return Shop.exist($('.quickview'));
};

Shop.xhrBox.condition = function (shopInstance) {
    return (Shop.exist($('.box-xhr')) || Shop.exist($('#box_productfull')));
};

Shop.ImageSlider.condition = function () {
    var div = ($('#box_productfull .productimg .smallgallery'));

    if (Shop.exist(div)) {
        Shop.ImageSlider.setOptions({
            container: div
        });
        return true;
    } else {
        return false;
    }
};

Shop.ImageZoom.condition = function () {
    var img = $('img.innerzoom');

    if (!Shop.exist(img)) {
        img = $('img.outerzoom');
    }

    if (Shop.exist(img)) {
        Shop.ImageZoom.setOptions({
            img: img,
            inner: img.hasClass('innerzoom')
        });
        return true;
    }

    return false;
};

Shop.LazyPicture.condition = function () {
    return ($('img[data-src]').length > 0);
};

Shop.PageSlider.condition = function () {
    return (Shop.exist($('.pageslider ul.slides')));
};

Shop.ProductAvailability.condition = function () {
    return (Shop.exist($('.availability-notifier-btn, .availability-notifier-unsubscribe-btn')));
};

Shop.ProductAvailability.setOptions({
    selectors: {
        availabilitynotifier: '.availability-notifier-container',
        availabilitynotifier_btn: '.availability-notifier-btn',
        availabilitynotifier_unsub: '.availability-notifier-unsubscribe-container',
        availabilitynotifier_btn_unsub: '.availability-notifier-unsubscribe-btn'
    }
});

Shop.ProductVoter.condition = function () {
    var span = $('span.votestars');
    return !!(Shop.exist(span) && span.attr('id'));
};

Shop.SkinPreviewBox.condition = function () {
    return !!(typeof ($.cookie('skinpreview')) == 'string' && $.cookie('skinpreview').length && window.self === window.top);
};

Shop.LoyaltyPoints.condition = function () {
    return Shop.exist($('#box_productfull .loyalty_points .points'));
};

Shop.Tabs.condition = function (shopInstance) {
    return Shop.exist($('.product-modules.active'));
};

Shop.StockHandler.condition = function (shopInstance) {
    if ($('.stocks').length > 0) {
        return true;
    } else {
        return false;
    }
};

Shop.BasketDeliveryPayment.condition = function () {
    return (Shop.exist($('#cart-options')));
};

Shop.BasketDeliveryPayment.setOptions({
    selectors: {
        deliveryCheckboxList: '.delivery-container .delivery input[name=shipping_id]',
        summaryTotalPrice: '.summary-container .sum .value'
    }
});

Shop.AddToCart.condition = function () {
    return true;
}

Shop.EnhancedEcommerce.condition = function () {
    return Shop.values.partnerEE || Shop.values.clientEE;
}

Shop.useroptions.slider = {
    fadearrows: false,
    automove: 4000
};

Shop.useroptions.widget = {
    ev: 'mouseenter',
    side: 'right'
};

/*{
Shop.useroptions.ajaxbasket = {
mode : {$settings.shopping.basket_adding}
}
}*/

/* preinit here */

$(document).ready(function () {
    if (!window.shoper) {
        window.shoper = new Shop();
    }

    $(window).trigger('resize');
});