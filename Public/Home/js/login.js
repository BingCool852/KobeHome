$(function() {
    $(document).ready(function() {

        /*
        登录用户名验证
         */
        $('#name').blur(function() {
            var login_name = $('#name').val();
            if (login_name == "") {
                $('#login_usernotin').css({
                    display: 'none',
                });
                $('#login_usernull').css({
                    display: 'block',
                    color: '#ED2553'

                });
            } else {
                $.get(login_url, {
                        username: login_name
                    },
                    function(data) {
                        if (data.status == 'login_usernotin') {
                            $('#login_usernull').css({
                                display: 'none',
                            });
                            $('#login_usernotin').css({
                                display: 'block',
                                color: '#ED2553'

                            });
                        }

                    }, 'json');
            }

            $('#name').focus(function() {
                $('#login_usernull,#login_usernotin').css({
                    display: 'none'
                });
            });
        });

        /*
        注册用户验证
         */
        $('#regname').blur(function() {
            var regname = $('#regname').val();
            if (regname == "") {
                $('#userin').css({
                    display: 'none'
                });
                $('#usernotin').css({
                    display: 'none'
                });
                $('#usernull').css({
                    display: 'block'
                });
            } else {
                $.get(register_url, {
                        name: regname
                    },
                    function(data) {
                        if (data.status == 'notin') {
                            $('#userin').css({
                                display: 'none'
                            });
                            $('#usernull').css({
                                display: 'none'
                            });
                            $('#usernotin').css({
                                display: 'block',
                                color: "#49B949"
                            });
                        }
                        if (data.status == 'in') {
                            $('#usernull').css({
                                display: 'none'
                            });
                            $('#usernotin').css({
                                display: 'none'
                            });
                            $('#userin').css({
                                display: 'block'
                            });
                        }

                    }, 'json');
            }
        });

        /*
        清除提示框信息
         */
        $("#reregpass").blur(function() {
            var password = $('#regpass').val();
            var repassword = $('#reregpass').val();
            if (password !== "" && password !== repassword) {
                $("#check_password").css({
                    display: 'block'
                });
            }
            $('#reregpass').focus(function() {
                $("#check_password").css({
                    display: 'none'
                });
            })
        });

        /*
        登录密码验证
         */
        $('#pass').blur(function() {
            var pass = $('#pass').val();
            var name = $('#name').val();
            if (isNull(name) != 1 && isNull(pass) == 1) {
                $('#password_error').css({
                    display: 'none'
                });
                $('#passnull').css({
                    display: 'block',
                    color: '#ED2553'
                });
            } else if (isNull(name) != 1 && isNull(pass) != 1) {
                $.get(pass_url, {
                        userinfo: [{
                            "pass": pass,
                            "name": name
                        }]
                    },
                    function(data) {
                        if (data.status == 'password_error') {
                            $('#passnull').css({
                                display: 'none'
                            });
                            $('#password_error').css({
                                display: 'block',
                                color: '#ED2553'
                            });
                        }
                    }, 'json');
            }

            $("#pass").focus(function() {
                $('#passnull,#password_error').css({
                    display: 'none',
                });
            });
        });
    });
});