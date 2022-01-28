
var earchiveInvoice = {
    postInvoiceInfo: function (model) {
        main.addButtonLoader($('#earchive-invoice-button-step1'));
        _serviceProvider.postEArchiveInvoiceInfo.postEArchiveInvoice(model, main.variables.language)
            .done(function (response) {
                main.deleteButtonLoader($('#earchive-invoice-button-step1'));

                if (response && response.ErrorMessage === undefined) {
                    $(".e-archive-contact-info").show();
                    $("#input-invoice-number").attr("disabled", "disabled");
                    $("#input-total-amount").attr("disabled", "disabled");
                    $("#input-total-amount-decimals").attr("disabled", "disabled");
                    $("#earchive-invoice-button-step1").attr("disabled", "disabled");

                    $("#invoiceCount").val(response);

                    $("#input-email").closest('div').removeClass('is-empty error');
                    $("#input-gsm-number").closest('div').removeClass('is-empty error');

                    if (response > 10) {
                        $("#input-email").attr("data-validate-type", "required");
                        $("#input-email").closest('div').addClass('is-empty');
                    } else {
                        $("#input-email").attr("data-validate-type", "");
                        $("#input-email").closest('div').removeClass('is-empty');
                    }
                } else {
                    $("#earchive-invoice-button-step1").removeAttr("disabled");
                    $("#input-invoice-number").removeAttr("disabled");
                    $("#input-total-amount").removeAttr("disabled");
                    $("#input-total-amount-decimals").removeAttr("disabled");

                    if (response.ErrorMessage !== undefined) {
                        main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                    } else {
                        main.loader(main.enums.loaderEnum.Error, Resource.EArchiveinvoiceReportUnexpectedError[main.variables.language]);
                    }
                }
            })
            .fail(function () {
                $("#earchive-invoice-button-step1").removeAttr("disabled");
                $("#input-invoice-number").removeAttr("disabled");
                $("#input-total-amount").removeAttr("disabled");
                $("#input-total-amount-decimals").removeAttr("disabled");

                main.loader(main.enums.loaderEnum.Error, Resource.earchive - invoiceReportUnexpectedError[main.variables.language]);
                main.deleteButtonLoader($('#earchive-invoice-button-step1'));
            });
    },

    sendValidationCode: function (model) {
        main.addButtonLoader($('#earchive-invoice-button-step2'));
        _serviceProvider.sendValidationCode.sendValidationCode(model, main.variables.language)
            .done(function (response) {
                main.deleteButtonLoader($('#earchive-invoice-button-step2'));

                if (response && response.ErrorMessage === undefined) {
                    $(".e-archive-validation-info").show();
                    $("#input-email").attr("disabled", "disabled");
                    $("#input-gsm-number").attr("disabled", "disabled");
                    $("#earchive-invoice-button-step2").attr("disabled", "disabled");

                    $("#sms-code").closest('div').removeClass('is-empty error');

                    if ($("#invoiceCount").val() <= 10) {
                        $("#input-email").closest('div').removeClass('is-empty error');
                    }

                    if ($("#invoiceCount").val() > 10 || $("#input-email").val()) {
                        if (!main.checkIsEmail($("#input-email"))) {
                            $("#input-email").closest(".form-group").addClass("error");
                            return;
                        }
                    } else {
                        $("#input-email").closest('div').removeClass('is-empty error');
                    }

                    //main.loader(main.enums.loaderEnum.Success, Resource.YourRequestHasBeenForwardedToYourEmailAddress[main.variables.language], Resource.BackToHome[main.variables.language], "/" + main.variables.language);
                } else {
                    $("#earchive-invoice-button-step2").removeAttr("disabled");
                    $("#input-email").removeAttr("disabled");
                    $("#input-gsm-number").removeAttr("disabled");

                    if (response.ErrorMessage !== undefined) {
                        main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                    } else {
                        main.loader(main.enums.loaderEnum.Error, Resource.EArchiveinvoiceReportUnexpectedError[main.variables.language]);
                    }
                }
            })
            .fail(function () {
                $("#earchive-invoice-button-step2").removeAttr("disabled");
                $("#input-email").removeAttr("disabled");
                $("#input-gsm-number").removeAttr("disabled");

                main.loader(main.enums.loaderEnum.Error, Resource.earchive - invoiceReportUnexpectedError[main.variables.language]);
                main.deleteButtonLoader($('#earchive-invoice-button-step2'));
            });
    },

    validateSMSCode: function (model) {
        main.addButtonLoader($('#earchive-invoice-button-step3'));
        _serviceProvider.validateSmsCode.validateSmsCode(model, main.variables.language)
            .done(function (response) {
                main.deleteButtonLoader($('#earchive-invoice-button-step3'));

                if (response && response.ErrorMessage === undefined) {
                    $("#earchive-invoice-button-step3").attr("disabled", "disabled");

                    if ($("#invoiceCount").val() <= 10) {
                        $("#input-email").closest('div').removeClass('is-empty error');
                    }

                    if ($("#invoiceCount").val() > 10) {
                        main.loader(main.enums.loaderEnum.Success, Resource.YourRequestHasBeenForwardedToYourEmailAddress[main.variables.language], Resource.BackToHome[main.variables.language], "/" + main.variables.language);
                    } else {
                        main.loader(main.enums.loaderEnum.Success, Resource.YourRequestHasBeenForwardedToYourPhone[main.variables.language], Resource.BackToHome[main.variables.language], "/" + main.variables.language);
                    }
                } else {
                    $("#earchive-invoice-button-step3").removeAttr("disabled");
                    $("#sms-code").removeAttr("disabled");

                    if (response.ErrorMessage !== undefined) {
                        main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                    } else {
                        main.loader(main.enums.loaderEnum.Error, Resource.EArchiveinvoiceReportUnexpectedError[main.variables.language]);
                    }
                }
            })
            .fail(function () {
                $("#earchive-invoice-button-step3").removeAttr("disabled");
                $("#sms-code").removeAttr("disabled");

                main.loader(main.enums.loaderEnum.Error, Resource.earchive - invoiceReportUnexpectedError[main.variables.language]);
                main.deleteButtonLoader($('#earchive-invoice-button-step3'));
            });
    }
};


$("#earchive-invoice-button-step1").click(function () {
    main.validateInput(false);
    var invoiceNumber = $("#input-invoice-number").val(),
        totalAmount = $("#input-total-amount").val() + "." + $("#input-total-amount-decimals").val()
    var model = {
        invoiceOrderNo: invoiceNumber,
        totalPrice: totalAmount
    };
    if (invoiceNumber && $("#input-total-amount").val() && $("#input-total-amount-decimals").val()) {
        $("#earchive-invoice-button-step1").attr("disabled", "disabled");
        earchiveInvoice.postInvoiceInfo(model);
    }
});

$("#earchive-invoice-button-step2").click(function () {
    main.validateInput(false);
    if ($("#invoiceCount").val() > 10 || $("#input-email").val()) {
        if (!main.checkIsEmail($("#input-email"))) {
            $("#input-email").closest(".form-group").addClass("error");
            return;
        }
        else {
            $("#input-email").closest('div').removeClass('is-empty error');
        }
    } else {
        $("#input-email").closest('div').removeClass('is-empty error');
    }

    if ($("#input-gsm-number").val().length < 10) {
        $("#input-gsm-number").closest(".form-group").addClass("error");
        return;
    }

    var invoiceNumber = $("#input-invoice-number").val(),
        gsm = $("#input-gsm-number").val();
    var model = {
        invoiceOrderNo: invoiceNumber,
        gsm: gsm
    };

    if ($("#invoiceCount").val() > 10 && !$("#input-email").val()) {
        $("#input-email").closest('div').addClass('is-empty error');
        return;
    }

    if ($("#input-invoice-number").val() && $("#input-gsm-number").val()) {
        $("#earchive-invoice-button-step2").attr("disabled", "disabled");
        earchiveInvoice.sendValidationCode(model);
    }
});

$("#earchive-invoice-button-step3").click(function () {
    main.validateInput(false);

    if ($("#invoiceCount").val() > 10 || $("#input-email").val()) {
        if (!main.checkIsEmail($("#input-email"))) {
            $("#input-email").closest(".form-group").addClass("error");
            return;
        }
        else {
            $("#input-email").closest('div').removeClass('is-empty error');
        }
    } else {
        $("#input-email").closest('div').removeClass('is-empty error');
    }

    var invoiceNumber = $("#input-invoice-number").val(),
        gsm = $("#input-gsm-number").val(),
        emailAddress = $("#input-email").val(),
        totalAmount = $("#input-total-amount").val() + "." + $("#input-total-amount-decimals").val(),
        smsCode = $("#sms-code").val();
    var model = {
        invoiceOrderNo: invoiceNumber,
        gsm: gsm,
        emailAddress: emailAddress,
        totalPrice: totalAmount,
        smsCode: smsCode
    };

    if ($("#input-invoice-number").val() && $("#input-gsm-number").val() && $("#sms-code").val() && $("#input-total-amount").val() && $("#input-total-amount-decimals").val()) {
        $("#earchive-invoice-button-step2").attr("disabled", "disabled");
        earchiveInvoice.validateSMSCode(model);
    }
});