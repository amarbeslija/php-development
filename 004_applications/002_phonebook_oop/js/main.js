$(document).ready(() => {
    //Function for toastr 
    //@type is a param for toastr style
    //@msg is text what do you whant to display in a msg
    function toastr_show(type, msg) {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        toastr[type](msg);
    }

    //Function for geting page name from url
    function get_path(page) {
        let url = window.location.href;
        var n = url.lastIndexOf('/');
        var after_last_slash = url.substring(n + 1);

        if (page == after_last_slash) {
            return true;
        } else {
            return false;
        }
    }

    //Function for showing image without sending it to server
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                //$('#blah').attr('src', e.target.result);
                $('#profile-image').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    var target = $("#img");
    $(target).change(function(){
        readURL(this);
    })
    



    //Const for register fields and validation of register
    const fullname = $('#fullname');
    const email = $('#email');
    const password = $('#password');
    const passwordRe = $('#password_confirm');
    const fullname_msg = $('.fullname_msg');
    const email_msg = $('.email_msg');
    const password_msg = $('.password_msg');
    const password_repeat_msg = $('.password_repeat_msg');


    // Form validation 
    $('#register_form').click(function (event) {

        event.preventDefault();

        if ($('input').hasClass('is-invalid')) {
            toastr_show("error", "Please check your credentials");
        } else {

            const fullname_checked = fullname.val();
            const email_checked = email.val();
            const password_checked = password.val();
            const password_re_checked = passwordRe.val();

            let data = {
                'function': 'register',
                'fullname': fullname_checked,
                'email': email_checked,
                'password': password_checked,
                'password_repeat': password_re_checked
            };
            $.ajax({
                type: 'post',
                url: './includes/ajax.inc.php',
                data: {
                    'data': JSON.stringify(data)

                },
                success: function (response) {
                    if (response) {
                        window.location.href = 'http://localhost/praksa/v0-starterkit/index'
                        //  window.location.href = 'https://dev.admin.lab387.com/authenticate?app='+app_name+"&package="+package; //promijenio za 2FA
                        /* console.log(response); */
                    }
                }
            });
        }
    });
    // End of Form validation



    // Fullname validation
    fullname.focusout(() => {

        // Check if input is empty
        if (fullname.val() == '') {
            fullname_msg.text('');
            fullname.removeClass('is-valid');
            fullname.removeClass('is-invalid');
        }
        // Check if given input contains two strings and a-z
        else {
            // Validate name
            check_name = fullname.val();
            let data = {
                'function': 'validate_name',
                'check_name': check_name
            };
            $.ajax({
                type: 'post',
                url: './includes/ajax.inc.php',
                data: {
                    'data': JSON.stringify(data)

                },
                success: function (response) {
                    if (response) {
                        result = JSON.parse(response);

                        if (result.valid == 1) {
                            fullname.removeClass('is-invalid');
                            fullname.addClass('is-valid');
                            fullname_msg.text('');
                            fullname_msg.addClass('valid-feedback');
                            fullname_msg.removeClass('invalid-feedback');
                        } else {
                            fullname.removeClass('is-valid');
                            fullname.addClass('is-invalid');
                            fullname_msg.text(result.msg);
                            fullname_msg.addClass('invalid-feedback');
                            fullname_msg.removeClass('valid-feedback');


                        }
                    }
                }
            });
        }
    });
    // End of Fullname validation

    // Email validation
    email.focusout(() => {

        // Check if input is empty
        if (email.val() == '') {
            //emailMsg.text('');
            email.removeClass('is-valid');
            email.addClass('is-invalid');
        } else {
            // Check if email is available
            let check_email = email.val();
            let data;
            if (get_path("profile")) {
                data = {
                    'function': 'validate_email',
                    'email': check_email,
                    'check_db': "false"
                };
            } else {
                data = {
                    'function': 'validate_email',
                    'email': check_email
                };
            }
            $.ajax({
                type: 'post',
                url: './includes/ajax.inc.php',
                data: {
                    'data': JSON.stringify(data)

                },
                success: function (response) {
                    var res = JSON.parse(response);
                    if (res.valid == 1) {
                        email.removeClass('is-invalid');
                        email.addClass('is-valid');
                        email_msg.text('');
                        email_msg.addClass('valid-feedback');
                        email_msg.removeClass('invalid-feedback');
                    } else {
                        email.removeClass('is-valid');
                        email.addClass('is-invalid');
                        email_msg.text(res.msg);
                        email_msg.addClass('invalid-feedback');
                        email_msg.removeClass('valid-feedback');
                    }


                }
            });
        }
    })
    // End of email validation

    // Password validation
    password.focusout(() => {

        pass = password.val();
        passRe = passwordRe.val();
        // Validate pass
        let data = {
            'function': 'validate_pass',
            'password': pass
        };
        $.ajax({
            type: 'post',
            url: './includes/ajax.inc.php',
            data: {
                'data': JSON.stringify(data)

            },
            success: function (response) {
                if (response) {
                    result = JSON.parse(response);

                    if (result.valid == 1) {
                        password.removeClass('is-invalid');
                        password.addClass('is-valid');
                        password_msg.text('');
                        password_msg.addClass('valid-feedback');
                        password_msg.removeClass('invalid-feedback');
                    } else {
                        password.removeClass('is-valid');
                        password.addClass('is-invalid');
                        password_msg.text(result.msg);
                        password_msg.addClass('invalid-feedback');
                        password_msg.removeClass('valid-feedback');
                    }
                }
            }
        });

    });

    passwordRe.focusout(() => {
        pass = password.val();
        passRe = passwordRe.val();
        // Validate pass
        let data = {
            'function': 'validate_pass',
            'password': pass
        };
        $.ajax({
            type: 'post',
            url: './includes/ajax.inc.php',
            data: {
                'data': JSON.stringify(data)

            },
            success: function (response) {
                if (response) {
                    result = JSON.parse(response);

                    if (pass == passRe && result.valid == 1) {
                        passwordRe.removeClass('is-invalid');
                        passwordRe.addClass('is-valid');
                        password_repeat_msg.text('');
                        password_repeat_msg.addClass('valid-feedback');
                        password_repeat_msg.removeClass('invalid-feedback');
                    } else {
                        passwordRe.removeClass('is-valid');
                        passwordRe.addClass('is-invalid');
                        password_repeat_msg.addClass('invalid-feedback');
                        password_repeat_msg.removeClass('valid-feedback');
                        password_repeat_msg.text('');
                    }
                }
            }
        });

    });




    // Phone number validation

    /* const number = $('.edit-profile-phone');

    number.focusout(() => {

        // Check if input is empty
        if (number.val() == '') {
            number.removeClass('is-valid');
            number.removeClass('is-invalid');
        } else {
            // Check if email is available
            let data = {
                'function': 'validate_phone',
                'phone': number.val()
            };
            $.ajax({
                type: 'post',
                url: './includes/ajax.inc.php',
                data: {
                    'data': JSON.stringify(data)
                },
                success: function (response) {
                    let res = JSON.parse(response)
                    if (res.valid == 1) {
                        number.addClass("is-valid")
                        number.removeClass("is-invalid")
                    } else {
                        number.removeClass("is-valid")
                        number.addClass("is-invalid")
                    }
                }
            });
        }
    })// End of phone number validation */

    //LOGIN

    const login = $(".login");
    const login_email = $(".email");
    const login_password = $(".password");

    login.click(function (e) {
        e.preventDefault();

        let data = {
            'function': 'login',
            'email': login_email.val(),
            'password': login_password.val()
        };
        $.ajax({
            type: 'post',
            url: './includes/ajax.inc.php',
            data: {
                'data': JSON.stringify(data)

            },
            success: function (response) {
                if (response == true) {
                    window.location.href = "/praksa/v0-starterkit/index"
                } else {
                    toastr_show("error", "Email or password are wrong!!");
                }
            }
        });
    })


    //When something is changed add class "changed to input on profile page"
    if (get_path("profile")) {
        $('input').focusout(function () {
            $(this).addClass("changed");
        })
        $(".edit-profile-current").focusout(function () {
            let data = {
                'function': 'check_pass_in_db',
                'password': $(this).val()
            };
            $.ajax({
                type: 'post',
                url: './includes/ajax.inc.php',
                data: {
                    'data': JSON.stringify(data)
                },
                success: function (response) {
                    var res = JSON.parse(response);
                    if (res.valid == 1) {
                        $(".edit-profile-current").addClass("is-valid")
                        $(".edit-profile-current").removeClass("is-invalid")
                    } else {
                        $(".edit-profile-current").removeClass("is-valid")
                        $(".edit-profile-current").addClass("is-invalid")
                    }
                }
            });
        })
    }

    $(".edit-profile-submit").click(function (event) {
        event.preventDefault();

        const email = $(".edit-email");
        const old_password = $(".edit-profile-current");
        const new_password = $(".edit-profile-new");
        const fullname = $(".edit-profile-fullname");

        //Edit user password
        if (old_password.val() !== "" && new_password.val() !== "" && new_password.hasClass("is-invalid") !== true && old_password.hasClass("is-invalid") !== true) {
            let data = {
                'function': 'change_password',
                'password': old_password.val(),
                'new_password': new_password.val()
            };
            $.ajax({
                type: 'post',
                url: './includes/ajax.inc.php',
                data: {
                    'data': JSON.stringify(data)
                },
                success: function (response) {
                    var res = JSON.parse(response);
                    if (res.valid == 1) {
                        toastr_show("success", res.msg);
                    } else if (item.valid == 0) {
                        toastr_show("error", res.msg);
                    }
                }
            });
        }


        //Edit user info 
        if ($('input').hasClass('is-invalid') || !$('input').hasClass('changed') || email.val() == "" || fullname.val() == "") {
            toastr_show("error", "Please check your credentials");
        } else {
            //Array of inputs key=database column value = value to be inserted to the coresponding key
            const array = {
                'function': 'edit_profile'
            };
            let fd = new FormData();
            fd.append("img", true);
            fd.append("user", true);

            $(".changed").each(function () {
                key_value = $(this).attr('name');
                switch (key_value) {
                    case "country":
                        name_value = $(this).find('option:selected').val();
                        array[key_value] = name_value;
                        break;

                    case "img":
                        img_value = $("#img").prop('files')[0];
                        fd.append("upload", img_value);
                        break;

                    default:
                        name_value = $(this).val();
                        array[key_value] = name_value;
                }
            });

            if (fd["upload"] !== null) {
                $.ajax({
                    type: 'post',
                    url: './includes/upload.inc.php',
                    data: fd,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        var res = JSON.parse(response);
                        if (res.valid == 1) {
                            toastr_show("success", res.msg);
                        } else {
                            toastr_show("error", res.msg);
                        }
                    }
                });
            }

            $.ajax({
                type: 'post',
                url: './includes/ajax.inc.php',
                data: {
                    "data": JSON.stringify(array)
                },
                success: function (response) {
                    var res = JSON.parse(response);
                    if (res.valid == 1) {
                        toastr_show("success", res.msg);
                    } else {
                        toastr_show("error", res.msg);
                    }
                }
            });
        }
    })


    //Reset password send email
    $("#reset_submit").click(function (event) {
        event.preventDefault();
        let email = $("#reset_email").val();
        let data = {
            'function': 'forgotten_password',
            'email': email
        };
        $.ajax({
            type: 'post',
            url: './includes/ajax.inc.php',
            data: {
                'data': JSON.stringify(data)

            },
            success: function (response) {
                console.log(response);
                /* var res = JSON.parse(response);
                if (res.valid == 1) {
                    toastr_show("success", res.msg);
                } else if (item.valid == 0) {
                    toastr_show("error", res.msg);
                } */
            }
        });
    })

    //Reset password 
    $("#change_password").click(function (event) {
        event.preventDefault();
        let id = $("#uid").text();
        let token = $("#token").text();
        let password = $("#password").val();
        let passwordRe = $("#password_confirm").val();

        if ($('input').hasClass('is-invalid')) {
            toastr_show("error", "Enter valid password");
        } else {
            let data = {
                'function': 'reset_forgotten_password',
                'id': id,
                'token': token,
                'password': password
            };
            $.ajax({
                type: 'post',
                url: './includes/ajax.inc.php',
                data: {
                    'data': JSON.stringify(data)

                },
                success: function (response) {
                    if (response) {
                        console.log(response);
                    }
                }
            });
        }
    })


}); //END DOCUMENT READY
