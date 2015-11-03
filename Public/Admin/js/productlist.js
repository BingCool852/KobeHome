$(function() {
    $('.change').on('click', function() {

        var content = $(this).parent().parent().text();
        var arr = [];
        arr = content.split('\n')
        var inputs = $('.msg_box>input');
        for (var i = 0; i < 6; i++) {
            $(inputs[i]).val(trim(arr[i + 1]));
        }
        if (trim(arr[8]) == "已上架") {
            $('.yes').attr('checked', 'checked');
        }
        if (trim(arr[8]) == "未上架") {
            $('.no').attr('checked', 'checked');
        }
        $("textarea").val(trim(arr[9]));
        console.log(arr);
        layer.open({
            type: 1,
            dialog: {
                msg: '右下角消息提示',
                btns: 2,
            },
            title: '修改商品',
            area: ['750px', '100%'],
            shadeClose: true, //点击遮罩关闭
            content: $(".input_box")
        });
    });
});
