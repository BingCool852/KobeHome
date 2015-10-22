$(function() {
    /*
     *Tab选项卡切换
     */
    var titles = $('.menu_list'),
        divs = $('.set_content');
    profile_arrow = $('.profile_arrow');
    if (titles.length != divs.length) {
        return;
    } else {
        for (var i = 0; i < titles.length; i++) {
            titles[i].id = i;
            titles[i].onclick = function() {
                for (var j = 0; j < titles.length; j++) {
                    $(titles[j]).removeClass('menu_list_select');
                }
                $(this).addClass('menu_list_select');
                for (var z = 0; z < divs.length; z++) {
                    $(divs[z]).css('display', 'none');
                    $(profile_arrow[z]).css('display', 'none');
                }
                $(divs[this.id]).css('display', 'block');
                $(profile_arrow[this.id]).css('display', 'block');
            }
        }
    }

    /**
     * 出生日期年月日判断并更新
     */
    $('#select_month,#select_year').blur(function() {
        var month = parseInt($('#select_month').val()),
            year = parseInt($('#select_year').val());
        console.log(month);
        console.log(year);
        var monthdays = returnMonthDays(year, month);
        $('#select_day').empty();
        for (var i = 1; i <= monthdays; i++) {
            $('#select_day').append('<option value="' + i + '">' + i + '号' + '</option>');
        }
    });

    /*
     *地址管理添加模块切换
     */
    var add_address = $('.add_address'),
        address_msg = $('.address_msg'),
        address_helpmsg = $('.address_helpmsg'),
        cancel_btns = $('.address_btn'),
        line = $('.line');
    for (var i = 0; i < add_address.length; i++) {
        add_address[i].id = i;
        cancel_btns[i].id = i;
        add_address[i].onclick = function() {
            for (var j = 0; j < add_address.length; j++) {
                $(this).parent().parent().hide();
            }
            $(address_msg[this.id]).show('slow');
            $(line[this.id]).show('slow');
        };

        cancel_btns[i].onclick = function() {
            for (var z = 0; z < cancel_btns.length; z++) {
                $(this).parent().parent().show();
            }
            $(address_msg[this.id]).hide('slow');
            $(line[this.id]).hide('slow');
            $(address_helpmsg[this.id]).show('slow');
        }
    }

    function returnMonthDays(year, month) {
        switch (month) {
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                {
                    return 31;
                    break;
                }
            case 4:
            case 6:
            case 9:
            case 11:
                {
                    return 30;
                    break;
                }
            case 2:
                {
                    if (year % 4 == 0 && year % 100 != 0) {
                        return 29;
                    } else {
                        return 28;
                    }
                    break;
                }
            default:
                return 30;
        }
    }
});