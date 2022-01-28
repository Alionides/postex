
var einvoice = {
    postInvoiceInfo: function (model) {
        main.addButtonLoader($('#einvoice-send-button'));
        _serviceProvider.postInvoiceInfo.postInvoice(model, main.variables.language)
            .done(function (response) {
                if (response && response.ErrorMessage === undefined) {
                    main.loader(main.enums.loaderEnum.Success, Resource.YourRequestHasBeenForwardedToYourEmailAddress[main.variables.language], Resource.BackToHome[main.variables.language], "/" + main.variables.language);
                } else {
                    $("#einvoice-send-button").removeAttr("disabled");
                    if (response.ErrorMessage !== undefined) {
                        main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                    } else {
                        main.loader(main.enums.loaderEnum.Error, Resource.EinvoiceReportUnexpectedError[main.variables.language]);
                    }
                }
                main.deleteButtonLoader($('#einvoice-send-button'));
            })
            .fail(function () {
                $("#einvoice-send-button").removeAttr("disabled");
                main.loader(main.enums.loaderEnum.Error, Resource.EinvoiceReportUnexpectedError[main.variables.language]);
                main.deleteButtonLoader($('#einvoice-send-button'));
            });
         
    }
}

$("#einvoice-send-button").click(function () {
    main.validateInput(false);
    if (!main.checkIsEmail($("#input-email-address"))) {
        $("#input-email-address").closest(".form-group").addClass("error");
    }

    if ($(".clarification-check").prop("checked") != true) {
        $(".clarification-check").closest('div.form-group').addClass("error");
        $(".checkboxkmark").css("border", "solid 1px red");
    } else {
        $(".clarification-check").closest('div.form-group').removeClass("error");
        $(".checkboxkmark").css("border", "solid 1px gray");
    }

    var unvalidInputs = $(".form-group.error");
    var invoiceNumber = $("#input-invoice-number").val(),
        taxNumber = $("#input-tax-number").val(),
        totalAmount = $("#input-total-amount").val() + "." + $("#input-total-amount-decimals").val(),
        emailAddress = $("#input-email-address").val();
    var model = {
        invoiceOrderNo: invoiceNumber,
        taxNumber: taxNumber,
        emailAddress: emailAddress,
        totalPrice: totalAmount
    };
    if (unvalidInputs.length == 0) {
        $("#einvoice-send-button").attr("disabled", "disabled");
        einvoice.postInvoiceInfo(model);
    }
});