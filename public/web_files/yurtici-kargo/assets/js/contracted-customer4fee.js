$(function () {
    contract.contactGeoDistricts($("#address"));
    contract.getContractTypes();
});

var contract = {

    getContractTypes: function () {
        _serviceProvider.getContractTypes.getDetail(main.variables.language)
            .done(function (response) {
                if (response.ErrorMessage === undefined && response && response.length > 0) {
                    var o = new Option("", "");
                    $(o).html("");
                    $("#contract-type").append(o);
                    $.each(response, function (index, callType) {
                        var o = new Option(callType.Name, callType.Value);
                        $(o).html(callType.Name);
                        $("#contract-type").append(o);
                    });
                } else {
                    if (response.ErrorMessage !== undefined) {
                        main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                    } else {
                        main.loader(main.enums.loaderEnum.Error, Resource.GenericUnexpectedError[main.variables.language]);
                    }
                }
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, Resource.GenericUnexpectedError[main.variables.language]);
            });
    },

    postContractCreate: function () {
        var model = contract.getContractModel();
        main.addButtonLoader($('.save-contracted-customer'));
        _serviceProvider.postContractCreate.postCall(model, main.variables.language)
            .done(function (response) {
                if (response) {
                    if (response.ErrorMessage !== undefined) {
                        main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                    } else {
                        main.loader(main.enums.loaderEnum.Success, Resource.WeHaveReceivedYourNotification[main.variables.language], Resource.BackToHome[main.variables.language], "/" + main.variables.language);
                        contract.tabContentInputClear();
                    }
                } else {
                    main.loader(main.enums.loaderEnum.Error, Resource.GenericUnexpectedError[main.variables.language]);
                }
                main.deleteButtonLoader($('.save-contracted-customer'));
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, Resource.GenericUnexpectedError[main.variables.language]);
                main.deleteButtonLoader($('.save-contracted-customer'));
            });
    },

    getContractModel: function () {

        var model = {
            "custName": $(".name-surname").val(),
            "gsmNumber": $(".phone-number").val(),
            "emailAddress": $(".email-address").val(),
            "firmName": $(".company-name").val(),
            "custTitle": $(".applicant-title").val(),
            "contractType": $(".contract-type").val(),
            "abroadShipmentFlag": $(".shipping-abroad:checked").val(),
            "avgShipmentCount": $(".average-shipment-count").val(),
            "city": $(".address").attr('data-cityid'),
            "district": $(".address").attr('data-districtId'),
            "town": $(".address").attr('data-countyid')
        };

        return model;
    },

    contactGeoDistricts: function (element) {

        element.keyup(function (e) {
            //var isNumeric = main.addressListing(e);
            //if (isNumeric == true) {
            //    var address = $(this).val();
            //    main.getGeoDistricts(element.closest('div').find('.ul-geo-search'), address, main.variables.excludeCyprus);
            //}

            if ((e.keyCode >= 37 && e.keyCode <= 40) || e.keyCode == 13) {
                return;
            }

            main.getGeoDistricts(element.closest('div').find('.ul-geo-search'), $(this).val(), main.variables.excludeCyprus);
            if ($(this).val().length < 3) {
                element.closest('div').find('.ul-geo-search').empty();
            }
        });
    },

    getBranchesForContact: function (cityId, countyId, districtId, element) {
        _serviceProvider.getBranchesByCityTown.getDetail(cityId, countyId, districtId, main.variables.language)
            .done(function (response) {
                if (response.ErrorMessage === undefined && response && response.length > 0) {
                    var option = "";
                    element.html('');
                    $.each(response,
                        function (index, item) {
                            option += "<option value='" + item.Id + "'>" + item.Name + "</option>";
                        });
                    element.html(option);
                    element.closest('div').removeClass('is-empty');
                    element.closest('div').removeClass('error');
                } else {
                    if (response.ErrorMessage !== undefined) {
                        contract.delay(function () {
                            main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                        },
                            400);
                    }
                }
            })
            .fail(function () {
                contract.delay(function () {
                    main.loader(main.enums.loaderEnum.Error, Resource.BranchesByCityTownUnexpectedError[main.variables.language]);
                }, 400);
            });
    },

    tabContentInputClear: function () {
        $('div.module-tab').find('input[type=text],input[type=number],input[type=email],textarea,select').closest(".form-group").addClass('is-empty');
        $('div.module-tab').find('input[type=text],input[type=number],input[type=email],textarea,select').closest(".form-group").removeClass('error');
        $('div.module-tab').find('input[type=text],input[type=number],input[type=email],textarea,select').val('');
        $('select, .ul-geo-search').html('');
        $('input[name=optionsRadios],input[name=callerPersonType]').prop("checked", false);
        $("input[name=callerPersonType]").closest(".col-lg-6").css("display", "none");
        $('.phone-number').attr("data-validate-type", "required");
        $('.gsm-number').attr("data-validate-type", "required");
        $('.tck-number').attr("data-validate-type", "required");
        $('.shipment-code').attr("data-validate-type", "required");
    },

    keyDownBranchSearchField: function (e) {
        var keyCode = e.keyCode;

        var alreadySelectedItem = $(".ul-geo-search li[selected]");

        if (keyCode == 40) {
            if (alreadySelectedItem) {
                contract.moveSelectedBranchSearchItem(alreadySelectedItem, "next");
            }
            else {
                contract.moveSelectedBranchSearchItem(null, "next");
            }
        }
        else if (keyCode == 38) {

            if (alreadySelectedItem) {
                contract.moveSelectedBranchSearchItem(alreadySelectedItem, "prev");
            }
            else {
                contract.moveSelectedBranchSearchItem(null, "prev");
            }
        }
        else if (keyCode == 13) {
            e.preventDefault();

            if (alreadySelectedItem && alreadySelectedItem.length > 0) {

                var cityId = alreadySelectedItem.attr('data-cityid');
                var countyId = alreadySelectedItem.attr('data-countyid');
                var districtId = alreadySelectedItem.attr('data-districtId');
                $(".address").val(alreadySelectedItem.attr('data-text'));
                $(".address").attr('data-cityid', cityId);
                $(".address").attr('data-countyid', countyId);
                $(".address").attr('data-districtId', districtId);
                $('.ul-geo-search').empty();
            }
        }
    },

    moveSelectedBranchSearchItem: function (startPoint, traversal) {

        $(".ul-geo-search li").removeAttr("selected").removeClass("selected-light-gray");

        if (startPoint && startPoint.length > 0) {

            var startElement = startPoint[0];

            if (traversal == "next") {

                $(startElement).next().first().attr("selected", true);
                $(startElement).next().first().addClass("selected-light-gray");

            }
            else {

                $(startElement).prev().first().attr("selected", true);
                $(startElement).prev().first().addClass("selected-light-gray");
            }
        }
        else {
            if (traversal == "next") {
                var itemBranchSearch = $(".ul-geo-search li");
                itemBranchSearch.first().attr("selected", true);
                itemBranchSearch.first().addClass("selected-light-gray");
            }

        }
    }
}

$(".save-contracted-customer").click(function () {
    main.validateInput(false);
    var element = $(this).closest('.module-tab');
    if (!main.checkIsEmail(element.find('.email-address'))) {
        element.find('.email-address').closest('.form-group').addClass("error");
    }

    var shipmentCode = element.find('.shipment-code');
    if (shipmentCode.attr('data-validate-type') == 'required') {
        if ($(shipmentCode).val().length === 12 || $(shipmentCode).val().length === 16) {
            $(shipmentCode).closest('div.form-group').removeClass("error");
        } else {
            $(shipmentCode).closest('div.form-group').addClass("error");
        }
    }

    var clarificationCheckBox = element.find(".clarification-check");
    var clarificationCheckMark = element.find(".checkboxkmark");

    if ($(clarificationCheckBox).prop("checked") != true) {
        $(clarificationCheckBox).closest('div.form-group').addClass("error");
        $(clarificationCheckMark).css("border", "solid 1px red");
    } else {
        $(clarificationCheckBox).closest('div.form-group').removeClass("error");
        $(clarificationCheckMark).css("border", "solid 1px gray");
    }

    var shippingAbroadRadio = element.find(".shipping-abroad");

    if (!$(".shipping-abroad:checked").val()) {
        $(shippingAbroadRadio).closest('div.form-group').addClass("error");
        $(".shipping-abroad").next(".circle").css("border", "solid 1px red");
    } else {
        $(shippingAbroadRadio).closest('div.form-group').removeClass("error");
        $(".shipping-abroad").next(".circle").css("border", "solid 1px gray");
    }

    var unvalidateInputs = $(".form-group.error");
    if (unvalidateInputs.length == 0) {
        contract.postContractCreate();
    }
});

$('body').on('click', '.ul-geo-search li', function () {
    var cityId = $(this).attr('data-cityid');
    var countyId = $(this).attr('data-countyid');
    var districtId = $(this).attr('data-districtId');
    $(this).closest('.search-content').find('input').val($(this).attr('data-text'));
    var selectInput = $(this).closest('.module-tab').find('select');
    $('.ul-geo-search').empty();
    $(".address").attr('data-cityid', cityId);
    $(".address").attr('data-countyid', countyId);
    $(".address").attr('data-districtId', districtId);
});

$('.address').on('focus', function () {

    $(this).closest("div.search-content").find(".searchContent .dropdown").show();

    document.addEventListener("keydown", contract.keyDownBranchSearchField, false);
});

$('.address').on('focusout', function () {
    var a = $(this);
    setTimeout(function () {
        a.closest("div.search-content").find(".searchContent .dropdown").slideUp(400);
    }, 200);

    document.removeEventListener("keydown", contract.keyDownBranchSearchField, false);
    $(".ul-geo-search li").removeAttr("selected");
    if (a.val() == "") {
        $(".branch").empty().attr("disabled", "disabled").closest('div').addClass('is-empty');
    }
});

//Tel Bilgisi girildi.
$(".phone-number").on('keyup focus focusout blur load', function (event) {
    event.preventDefault();
    if ($(this).val().length === 10 || $(this).val().length === 11) {
        $(this).closest('div.form-group').removeClass("error");
    } else {
        $(this).closest('div.form-group').addClass("error");
    }

    //if ($(this).val().length > 0) {
    //    $('.gsm-number').removeAttr("data-validate-type", "required").closest('div.form-group').removeClass("error");
    //} else {
    //    $('.gsm-number').attr("data-validate-type", "required");
    //    $(this).closest('div.form-group').removeClass("error");
    //}
});

$("#contract-type").on('change', function () {
    if ($("#contract-type").val()) {
        $("#contract-type").closest('div.form-group').removeClass("error");
    } else {
        $("#contract-type").closest('div.form-group').addClass("error");
    }
});