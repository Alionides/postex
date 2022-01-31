var login = {

    resetPassword: function (tcNumber, type) {
        if (tcNumber) {
            delay(function () {
                _serviceProvider.postResetPassword.getDetail(tcNumber, type, main.variables.language)
                    .done(function (response) {
                        if (response && response.ErrorMessage === undefined) {
                            $('#forgotpassword').modal('hide');
                            main.submitAjaxForm($("#btn-reset-password-sms"), false);
                            main.submitAjaxForm($("#btn-reset-password-email"), false);
                            main.loader(main.enums.loaderEnum.Success, "Şifre başarılı şekilde gönderildi.");

                        } else {
                            if (response.ErrorMessage !== undefined) {
                                $('#forgotpassword').modal('hide');
                                main.submitAjaxForm($("#btn-reset-password-sms"), false);
                                main.submitAjaxForm($("#btn-reset-password-email"), false);
                                main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                            }
                        }
                    })
                    .fail(function () {
                        $('#forgotpassword').modal('hide');
                        main.submitAjaxForm($("#btn-reset-password-sms"), false);
                        main.submitAjaxForm($("#btn-reset-password-email"), false);
                        main.loader(main.enums.loaderEnum.Error, main.variables.globalErrorMessage);
                    });
            }, 200);
        }
    },

    maskedGsmNumber: function (tcNumber) {
        if (tcNumber) {
            delay(function () {
                _serviceProvider.getMaskedGsmNumber.getDetail(tcNumber, main.variables.language)
                    .done(function (response) {
                        main.submitAjaxForm($('#btn-password-go'), false);
                        if (response && response.ErrorMessage === undefined) {
                            $('#gms-number').attr("readonly", true).val(response.GsmNo).closest('div.form-group').removeAttr('style');
                            $('#input-email').attr("readonly", true).val(response.Email).closest('div.form-group').removeAttr('style');
                            $('#btn-reset-password-sms').removeAttr('style');
                            $('#btn-reset-password-email').removeAttr('style');
                            $('#btn-call-center').removeAttr('style');
                            $('#btn-password-go').css('display', 'none');
                            $('#tcnumber').attr('readonly', 'readonly').closest('.form-group').find('.tooltip-wrap').hide();
                        } else {
                            if (response.ErrorMessage !== undefined) {
                                $('#forgotpassword').modal('hide');
                                main.loader(main.enums.loaderEnum.Error, "Girdiğiniz TC kimlik numarasıyla kayıtlı bir kullanıcı bulunamadı.");
                            }
                        }
                    })
                    .fail(function () {
                        $('#forgotpassword').modal('hide');
                        main.submitAjaxForm($('#btn-password-go'), false);
                        main.loader(main.enums.loaderEnum.Error, main.variables.globalErrorMessage);
                    });
            }, 200);
        }
    },

    loginForm: function (model) {
        $.post("/account/login", model)
            .done(function (response) {
                if (response && response.ErrorMessage === undefined) {

                    var data = JSON.stringify(model);

                    main.localStorageRemoveItem("User-Information");
                    if ($("#remember-storage").is(":checked")) {
                        main.localStorageSetItem("User-Information", data);
                    } else  {
                        $("#input-username").val("");
                        $("#input-password").val("");
                    }

                    $(".login-first-step").hide();
                    $("#input-username").attr("disabled", true);
                    $("#input-password").attr("disabled", true);
                    $(".login-button").hide();
                    $(".sms-code-wrapper").show();
                    $("#sms-reference-code").html("Lütfen telefonunuza <b>" + response.Reference + "</b> referans numarasıyla gönderilen kodu giriniz.");
                    $("#input-sms-wrapper").show();
                    $("#input-sms-code").attr("data-validate-type", "required");
                    $(".verify-sms").show();
                    $("#countdown").show();
                    $(".resend-sms").hide();

                    main.submitAjaxForm($('#btn-login'), false);

                    var countDownDate = response.CountDown;

                    document.getElementById("countdown").innerHTML = 'Kalan süre: <b>' + countDownDate + '</b>';

                    var x = setInterval(function () {
                        countDownDate -= 1;
                        document.getElementById("countdown").innerHTML = 'Kalan süre: <b>' + countDownDate + '</b>';

                        // If the count down is finished, write some text
                        if (countDownDate <= 0) {
                            clearInterval(x);
                            document.getElementById("countdown").innerHTML = "";
                            $("#input-sms-wrapper").hide();
                            $(".verify-sms").hide();
                            $("#countdown").hide();
                            $("#sms-reference-code").html("Size ayrılan süre içerisinde kodu girmediniz.");
                            $(".resend-sms").show();

                        }
                    }, 1000);

                } else if (response.ErrorMessage === "PasswordExpired") {
                    main.submitAjaxForm($('#btn-password-change'), false);
                    $('#changepassword input').val('').closest('div.form-group').removeClass('error');
                    $('#changepassword').modal('show');
                    main.submitAjaxForm($('#btn-login'), false);
                }
                else {
                    main.submitAjaxForm($('#btn-login'), false);
                    main.loader(main.enums.loaderEnum.Error, "Kullanıcı adı yada şifre yanlış. Lütfen tekrar deneyiniz.");
                }
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, main.variables.globalErrorMessage);
                main.submitAjaxForm($('#btn-login'), false);
            });
    },

    validateSMS: function (model, loginModel) {
        $.post("/account/validateSMS", model)
            .done(function (response) {
                if (response && response.ErrorMessage === undefined) {
                   
                    var returnUrl = main.getQueryString('returnUrl');
                    if (returnUrl) {
                        main.redirectUrl(returnUrl);
                    } else {
                        main.redirectUrl("/home/index");
                    }
                } else if (response.ErrorMessage === "PasswordExpired") {
                    main.submitAjaxForm($('#btn-password-change'), false);
                    $('#changepassword input').val('').closest('div.form-group').removeClass('error');
                    $('#changepassword').modal('show');
                    main.submitAjaxForm($('#btn-login'), false);
                }
                else {
                    main.submitAjaxForm($('#btn-validate-sms'), false);
                    main.loader(main.enums.loaderEnum.Error, "Hatalı kod girişi yaptınız. Lütfen tekrar deneyiniz.");
                }
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, main.variables.globalErrorMessage);
                main.submitAjaxForm($('#btn-validate-sms'), false);
            });
    },

    resendSMS: function () {
        $.post("/account/resendSMS")
            .done(function (response) {
                if (response && response.ErrorMessage === undefined) {
                    $(".login-first-step").hide();
                    $("#input-username").attr("disabled", true);
                    $("#input-password").attr("disabled", true);
                    $(".login-button").hide();
                    $(".sms-code-wrapper").show();
                    $("#sms-reference-code").html("Lütfen telefonunuza <b>" + response.Reference + "</b> referans numarasıyla gönderilen kodu giriniz.");
                    $("#input-sms-wrapper").show();
                    $(".verify-sms").show();
                    $("#countdown").show();
                    $(".resend-sms").hide();

                    main.submitAjaxForm($('#btn-send-sms-again'), false);

                    var countDownDate = response.CountDown;

                    document.getElementById("countdown").innerHTML = 'Kalan süre: <b>' + countDownDate + '</b>';

                    var x = setInterval(function () {

                        countDownDate -= 1;
                        document.getElementById("countdown").innerHTML = 'Kalan süre: <b>' + countDownDate + '</b>';

                        if (countDownDate <= 0) {
                            clearInterval(x);
                            document.getElementById("countdown").innerHTML = "";
                            $("#input-sms-wrapper").hide();
                            $(".verify-sms").hide();
                            $("#countdown").hide();
                            $("#sms-reference-code").html("Size ayrılan süre içerisinde kodu girmediniz.");
                            $(".resend-sms").show();

                        }
                    }, 1000);

                } else if (response.ErrorMessage === "TokenExpired") {
                    $(".login-first-step").show();
                    $("#input-username").attr("disabled", false);
                    $("#input-password").attr("disabled", false);
                    $(".login-button").show();
                    $(".sms-code-wrapper").hide();
                    $("#sms-reference-code").html("").hide();
                    $("#input-sms-wrapper").hide();
                    $(".verify-sms").hide();
                    $("#countdown").hide();
                    $(".resend-sms").hide();
                    $("#input-sms-code").removeAttr("data-validate-type", "required");

                    main.loader(main.enums.loaderEnum.Error, "Lütfen yeniden giriş yapınız.");
                }
                else {
                    main.submitAjaxForm($('#btn-send-sms-again'), false);
                    main.loader(main.enums.loaderEnum.Error, main.variables.globalErrorMessage);
                }
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, main.variables.globalErrorMessage);
                main.submitAjaxForm($('#btn-send-sms-again'), false);
            });
    },

    passwordChange: function () {
        $('#changepassword').modal('hide');
        var model = {
            OldPassword: $('#input-old-password').val(),
            NewPassword: $('#input-new-password').val()
        }
        $.post("/Setting/PasswordChange", model)
            .done(function (data) {
                if (data === true) {
                    $('#changepassword').modal('hide');
                    main.loader(main.enums.loaderEnum.Success, "Şifreniz başarılı şekilde güncellenmiştir. Giriş sayfasına yönlendiriliyorsunuz.");
                    delay(function () {
                        var model = {
                            UserName: $('#input-username').val(),
                            Password: $('#input-new-password').val()
                        }
                        login.loginForm(model);
                    }, 1000);
                } else if (data === false) {
                    main.loader(main.enums.loaderEnum.Error, main.variables.globalErrorMessage);
                }
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, main.variables.globalErrorMessage);
                main.submitAjaxForm($('#btn-login'), false);
            });
    },

    checkPassword: function (obj) {
        var myRegxpNum = /^\d*$/;
        var myRegxpAlp = /^[a-zA-Z]*$/;
        var len = $(obj).val().length;
        var numCount = 0;
        var alpCount = 0;

        for (var i = 0; i < len; i++) {
            if (myRegxpNum.test(obj.val().charAt(i))) {
                numCount++;
            } else if (myRegxpAlp.test(obj.val().charAt(i))) {
                alpCount++;
            }
        }
        if (alpCount > 3 && numCount > 1 && len > 5) {
            return true;
        }
        return false;
    }
}


$(function () {
    var model = JSON.parse(main.localStorageGetItem("User-Information"));
    if (model != null) {
        $('#input-username').val(model.UserName);
        $('#input-password').val(model.Password);
        $('input[name=remember-storage]:first').prop("checked", true);
    }
    main.InputIsEmptyControl();
});

$(document).keypress(function (e) {
    if (e.which === 13) {
        main.validateInput(false);
        var unvalidateInputs = $(".login-form-wrap .error");
        if (unvalidateInputs.length === 0) {
            main.submitAjaxForm($('#btn-login'), true);
            var model = {
                UserName: $('#input-username').val(),
                Password: $('#input-password').val()
            }
            login.loginForm(model);
        }
    }
});

$("#btn-password-go").click(function () {
    var isValid = main.checkTcNum($('#tcnumber').val());
    if (isValid) {
        main.submitAjaxForm($(this), true);
        login.maskedGsmNumber($('#tcnumber').val());

    }
    else {
        $('#tcnumber').closest('div.form-group').addClass('error');
    }
});

$("#btn-reset-password-sms").click(function () {
    var tcNumber = $('#tcnumber').val();
    if (tcNumber) {
        main.submitAjaxForm($(this), true);
        login.resetPassword(tcNumber, "sms");
    } else {
        main.validateInput(false);
    }
});

$("#btn-reset-password-email").click(function () {
    var tcNumber = $('#tcnumber').val();
    if (tcNumber) {
        main.submitAjaxForm($(this), true);
        login.resetPassword(tcNumber, "email");
    } else {
        main.validateInput(false);
    }
});

$("#btn-call-center").click(function () {
    $('#div-call-center-info').show();
    $('#div-call-center').hide();
});

$("#btn-call-center-close").click(function () {
    $('#forgotpassword').modal('hide');
});

$("#btn-login").click(function () {
    main.validateInput(false);
    var unvalidateInputs = $(".login-form-wrap .error").not("#input-sms-code");
    if (unvalidateInputs.length === 0) {
        main.submitAjaxForm($(this), true);
        var model = {
            UserName: $('#input-username').val(),
            Password: $('#input-password').val()
        }
        login.loginForm(model);
    }
});

$("#btn-send-sms-again").click(function () {
    login.resendSMS();
});

$("#btn-validate-sms").click(function () {
    main.validateInput(false);
    var unvalidateInputs = $(".sms-code-wrapper .error");
    if (unvalidateInputs.length === 0) {
        main.submitAjaxForm($(this), true);
        var model = {
            Code: $('#input-sms-code').val()
        }

        login.validateSMS(model);
    }});

$('#tcnumber').on('keyup focusout', function () {
    if ($(this).val() != "" && $(this).val() != null) {
        var isValid = main.checkTcNum($(this).val());
        if (isValid) {
            $(this).closest('.form-group').removeClass('error').find(".control-label").html("Kayıtlı TC Numaranız");
        } else {
            $(this).closest('.form-group').addClass('error').find(".control-label").html("Geçersiz kimlik numarası");
        }
    } else {
        $(this).closest('.form-group').removeClass('error').find(".control-label").html("Kayıtlı TC Numaranız");
    }
});

$('#btn-forgot-password').click(function () {
    $('#forgotpassword').modal('show');
    $('#gms-number').closest('div.form-group').css('display', 'none');
    $('#input-email').closest('div.form-group').css('display', 'none');
    $('#btn-reset-password-sms').css('display', 'none');
    $('#btn-reset-password-email').css('display', 'none');
    $('#btn-call-center').css('display', 'none');
    $('#btn-password-go').removeAttr('style');
    $('#tcnumber').val('').removeAttr('readonly', 'readonly').closest('.form-group').find('.tooltip-wrap').show();;
    $('#div-call-center').show();
    $('#div-call-center-info').hide();
     
});

$("#btn-password-change").click(function () {
    if (main.selectedValidateInput($("#changepassword"))) {
        var oldpass = $('#input-old-password').val();
        var pass = $('#input-new-password').val();
        var passre = $('#input-new-password-re').val();
        if (login.checkPassword($('#input-new-password')) && login.checkPassword($('#input-new-password-re')) && pass === passre && oldpass !== pass) {
            main.submitAjaxForm($(this), true);
            login.passwordChange();
        } else {
            $('#input-new-password').closest('div.form-group').addClass('error');
            $('#input-new-password-re').closest('div.form-group').addClass('error');
        }
    }
});