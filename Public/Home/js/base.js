var divOffsetTop = 0;
window.onscroll = function() {

    var div = document.getElementById('nav');
    // 计算页面滚动了多少（需要区分不同浏览器）    
    var topVal = 0;
    if (window.pageYOffset) { //这一条滤去了大部分， 只留了IE678    
        topVal = window.pageYOffset;
    } else if (document.documentElement.scrollTop) { //IE678 的非quirk模式    
        topVal = document.documentElement.scrollTop;
    } else if (document.body.scrolltop) { //IE678 的quirk模式    
        topVal = document.body.scrolltop;
    }
    if (topVal <= divOffsetTop) {
        div.style.position = "";
    } else {
        div.style.position = "fixed";
    }
}

$(document).ready(function() {

    var div = document.getElementById('nav');
    divOffsetTop = div.offsetTop;

    $('#menu_list').nmcDropDown({
        show: {
            height: 'show',
            opacity: 'show'
        }
    });

    var titles = $('.hide_box'),
        divs = $('.menu1_hide_box');
    if (titles.length != divs.length) {
        return;
    } else {
        for (var z = 1; z < divs.length; z++) {
            divs[z].style.display = "none";
        }
        for (var i = 0; i < titles.length; i++) {
            titles[i].id = i;
            divs[i].id = i;
            titles[i].onmouseover = function() {
                for (var j = 0; j < titles.length; j++) {
                    $(this).addClass("nav_menu_box2");
                }
                $(this).addClass('menu_box2_img');
                $(this).removeClass("nav_menu_box2");
                for (var z = 0; z < divs.length; z++) {
                    divs[z].style.display = "none";
                }
                divs[this.id].style.display = "block";

                $(divs[this.id]).hover(function() {

                    $(titles[this.id]).removeClass("nav_menu_box2");
                    $(this).addClass('menu_box2_img');

                    $(this).css("display", "block");

                }, function() {
                    $(titles[this.id]).addClass("nav_menu_box2");
                    $(this).css("display", "none");

                });
            }
            titles[i].onmouseout = function() {
                divs[this.id].style.display = "none";
                $(this).addClass("nav_menu_box2");
            }


        }
    }


});

/**
 * [下拉菜单函数]
 * @DateTime  2015-09-24T23:35:43+0800
 */
(function(a) {
    a.fn.nmcDropDown = function(b) {
        var c = a.extend({}, a.fn.nmcDropDown.defaults, b);
        return this.each(function() {
            menu = a(this);
            submenus = menu.children("li:has(" + c.submenu_selector + ")");
            if (c.fix_IE) {
                menu.css("z-index", 51).parents().each(function(d) {
                    if (a(this).css("position") == "relative") {
                        a(this).css("z-index", (d + 52))
                    }
                });
                submenus.children(c.submenu_selector).css("z-index", 50)
            }
            over = function() {
                a(this).addClass(c.active_class).children(c.submenu_selector).animate(c.show, c.show_speed);
                return false
            };
            out = function() {
                a(this).removeClass(c.active_class).children(c.submenu_selector).animate(c.hide, c.hide_speed);
                return false
            };
            if (c.trigger == "click") {
                submenus.toggle(over, out).children(c.submenu_selector).hide()
            } else {
                if (a().hoverIntent) {
                    submenus.hoverIntent({
                        interval: c.show_delay,
                        over: over,
                        timeout: c.hide_delay,
                        out: out
                    }).children(c.submenu_selector).hide()
                } else {
                    submenus.hover(over, out).children(c.submenu_selector).hide()
                }
            }
        })
    };
    a.fn.nmcDropDown.defaults = {
        trigger: "hover",
        active_class: "open",
        submenu_selector: "ul",
        show: {
            opacity: "show"
        },
        show_speed: 400,
        show_delay: 100,
        hide: {
            opacity: "hide"
        },
        hide_speed: 200,
        hide_delay: 100,
        fix_IE: true
    }
})(jQuery);


/**
 * [解决下拉闪烁]
 * @DateTime  2015-09-24T23:44:55+0800
 */
(function($) {
    $.fn.hoverIntent = function(f, g) {
        var cfg = {
            sensitivity: 7,
            interval: 100,
            timeout: 0
        };
        cfg = $.extend(cfg, g ? {
            over: f,
            out: g
        } : f);
        var cX, cY, pX, pY;
        var track = function(ev) {
            cX = ev.pageX;
            cY = ev.pageY;
        };
        var compare = function(ev, ob) {
            ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
            if ((Math.abs(pX - cX) + Math.abs(pY - cY)) < cfg.sensitivity) {
                $(ob).unbind("mousemove", track);
                ob.hoverIntent_s = 1;
                return cfg.over.apply(ob, [ev]);
            } else {
                pX = cX;
                pY = cY;
                ob.hoverIntent_t = setTimeout(function() {
                    compare(ev, ob);
                }, cfg.interval);
            }
        };
        var delay = function(ev, ob) {
            ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
            ob.hoverIntent_s = 0;
            return cfg.out.apply(ob, [ev]);
        };
        var handleHover = function(e) {
            var p = (e.type == "mouseover" ? e.fromElement : e.toElement) || e.relatedTarget;
            while (p && p != this) {
                try {
                    p = p.parentNode;
                } catch (e) {
                    p = this;
                }
            }
            if (p == this) {
                return false;
            }
            var ev = jQuery.extend({}, e);
            var ob = this;
            if (ob.hoverIntent_t) {
                ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
            }
            if (e.type == "mouseover") {
                pX = ev.pageX;
                pY = ev.pageY;
                $(ob).bind("mousemove", track);
                if (ob.hoverIntent_s != 1) {
                    ob.hoverIntent_t = setTimeout(function() {
                        compare(ev, ob);
                    }, cfg.interval);
                }
            } else {
                $(ob).unbind("mousemove", track);
                if (ob.hoverIntent_s == 1) {
                    ob.hoverIntent_t = setTimeout(function() {
                        delay(ev, ob);
                    }, cfg.timeout);
                }
            }
        };
        return this.mouseover(handleHover).mouseout(handleHover);
    };
})(jQuery);