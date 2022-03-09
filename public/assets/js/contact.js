$(function () {
    var contactDiv = $("#contactTabTitle");
    if (contactDiv) {
        contact.getCallTypes();
    }
    $(".branch").attr("disabled", "disabled");
    main.moveView($("div.title-wrap"));
});

var contact = {

    getCallTypes: function () {
        _serviceProvider.getCallTypes.getDetail(main.variables.language)
            .done(function (response) {
                var tabHtml = "";
                if (response.ErrorMessage === undefined && response && response.length > 0) {
                    $.each(response, function (index, callType) {
                        if (index == 0) {
                            tabHtml += "<div class=\"item\">\n<a href=\"#tab" +
                                callType.Value +
                                "\" data-toggle=\"tab\">\n<div class=\"title active all-radius tab-title\" data-tab-value=\"" +
                                callType.Value +
                                "\"><span>" +
                                callType.Name +
                                "</span></div>\n</a>\n</div>";
                        } else {
                            tabHtml += "<div class=\"item\">\n<a href=\"#tab" +
                                callType.Value +
                                "\" data-toggle=\"tab\">\n<div class=\"title all-radius tab-title\" data-tab-value=\"" +
                                callType.Value +
                                "\"><span>" +
                                callType.Name +
                                "</span></div>\n</a>\n</div>";
                        }
                    });
                    $('#contactTabTitle').html(tabHtml);
                    contact.tabTitleOwlCarousel();
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

    tabTitleOwlCarousel: function () {
        $(".contact-page .owl-carousel").owlCarousel({
            margin: 10,
            loop: false,
            navText: [
                '<img src="/assets/img/left-right/left.svg" alt="" width="9" height="15" />',
                '<img src="/assets/img/left-right/right.svg" alt="" width="9" height="15" />'
            ],
            dots: false,
            nav: true,
            mouseDrag: false,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 2
                },
                767: {
                    items: 4
                }
            }
        });
        var activeTabId = $("#contactTabTitle .active.tab-title").closest('a').attr('href');
        $(activeTabId).addClass('active');
        contact.contactGeoDistricts($(".tab-pane.active").find('.address'));
    },

    postCallCreate: function () {
        var element = $("div.title.active");
        var model = contact.getCallModel(element);
        main.addButtonLoader($('.save-contact'));
        _serviceProvider.postCallCreate.postCall(model, main.variables.language)
            .done(function (response) {
                if (response) {
                    if (response.ErrorMessage !== undefined) {
                        main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                    } else {
                        main.loader(main.enums.loaderEnum.Success, Resource.WeHaveReceivedYourNotification[main.variables.language], Resource.BackToHome[main.variables.language], "/" + main.variables.language);
                        contact.tabContentInputClear();
                    }
                } else {
                    main.loader(main.enums.loaderEnum.Error, Resource.GenericUnexpectedError[main.variables.language]);
                }
                main.deleteButtonLoader($('.save-contact'));
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, Resource.GenericUnexpectedError[main.variables.language]);
                main.deleteButtonLoader($('.save-contact'));
            });
    },

    getCallModel: function (element) {
        var callType = element.attr("data-tab-value"),
            tab = $(".contact-page").find("#tab" + callType),
            description = tab.find(".description").val(),
            tckNo = tab.find(".tck-number").val(),
            shipmentCode = tab.find(".shipment-code").val(),
            callerPersonName = tab.find(".name-surname").val(),
            emailAddress = tab.find(".email-address").val(),
            phoneNumber = tab.find(".phone-number").val(),
            gsmNumber = tab.find(".gsm-number").val(),
            companyName = tab.find(".company-name").val(),
            unitId = tab.find(".branch").val(),
            callerPersonType = tab.find("input[name=callerPersonType]:checked").val();

        var model = {
            "callType": callType,
            "description": description,
            "tckNo": tckNo,
            "shipmentCode": shipmentCode,
            "callerPersonName": callerPersonName,
            "emailAddress": emailAddress,
            "phoneNumber": phoneNumber,
            "gsmNumber": gsmNumber,
            "companyName": companyName,
            "unitId": unitId,
            "callerPersonType": callerPersonType
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
                        contact.delay(function () {
                            main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                        },
                            400);
                    }
                }
            })
            .fail(function () {
                contact.delay(function () {
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

        var alreadySelectedItem = $('.tab-pane.active').find(".ul-geo-search li[selected]");

        if (keyCode == 40) {
            if (alreadySelectedItem) {
                contact.moveSelectedBranchSearchItem(alreadySelectedItem, "next");
            }
            else {
                contact.moveSelectedBranchSearchItem(null, "next");
            }
        }
        else if (keyCode == 38) {

            if (alreadySelectedItem) {
                contact.moveSelectedBranchSearchItem(alreadySelectedItem, "prev");
            }
            else {
                contact.moveSelectedBranchSearchItem(null, "prev");
            }
        }
        else if (keyCode == 13) {
            e.preventDefault();

            if (alreadySelectedItem && alreadySelectedItem.length > 0) {
                var cityId = alreadySelectedItem.attr('data-cityid');
                var countyId = alreadySelectedItem.attr('data-countyid');
                var districtId = alreadySelectedItem.attr('data-districtId');
                $(".address").val(alreadySelectedItem.attr('data-text'));
                $('.ul-geo-search').empty();
                $(".branch").removeAttr("disabled");
                contact.getBranchesForContact(cityId, countyId, districtId, $('.tab-pane.active').find('select.branch'));
            }
        }
    },

    moveSelectedBranchSearchItem: function (startPoint, traversal) {

        $('.tab-pane.active').find(".ul-geo-search li").removeAttr("selected").removeClass("selected-light-gray");

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
                var itemBranchSearch = $('.tab-pane.active').find(".ul-geo-search li");
                itemBranchSearch.first().attr("selected", true);
                itemBranchSearch.first().addClass("selected-light-gray");
            }

        }
    }
}

$("input[name='optionsRadios']").change(function () {
    var value = $(this).val();
    if (value == 1) {
        $("#complaint-branch").val(null);
        $("#complaint-branch").closest('div.col-lg-6').hide();
        $("#complaint-branch").removeAttr('data-validate-type');
        $("#complaint-shipment-code").closest('div.col-lg-6').show();
        $("#complaint-shipment-code").attr('data-validate-type', "required");
        $("input[name=callerPersonType]").closest('.col-lg-6').css("display", "block");
    } else if (value == 2) {
        $("#complaint-branch").closest('div.col-lg-6').show();
        $("#complaint-branch").attr('data-validate-type', "required");
        $("#complaint-shipment-code").val(null);
        $("#complaint-shipment-code").closest('div.col-lg-6').hide();
        $("#complaint-shipment-code").removeAttr('data-validate-type');
        $("input[name=callerPersonType]").prop("checked", false).closest('.col-lg-6').css("display", "none");
    } else if (value == 3) {
        $("#complaint-shipment-code").closest('div.col-lg-6').show();
        $("#complaint-branch").attr('data-validate-type', "required");
        $("#complaint-branch").closest('div.col-lg-6').show();
        $("#complaint-shipment-code").attr('data-validate-type', "required");
        $("input[name=callerPersonType]").prop("checked", false).closest('.col-lg-6').css("display", "none");
    }

    $('div.module-tab').find('input[type=text],textarea,select').closest(".form-group").removeClass('error');
});

$(".save-contact").click(function () {
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

    var unvalidateInputs = $(".tab-pane.active").find(".form-group.error");
    if (unvalidateInputs.length == 0) {
        contact.postCallCreate();
    }
});

$('body').on('click', '.tab-title', function () {
    $('.tab-title').removeClass("active");
    $(this).addClass("active");
    var callType = $(this).attr("data-tab-value");
    var element = "";
    contact.tabContentInputClear();
    if (callType == main.enums.contactEnum.Complaint) {
        element = $("#complaint-address");
    } else if (callType == main.enums.contactEnum.Info) {
        element = $("#info-address");
    } else if (callType == main.enums.contactEnum.Suggestion) {
        element = $("#suggestion-address");
    } else if (callType == main.enums.contactEnum.Thank) {
        element = $("#thank-address");
    }
    $(".branch").attr("disabled", "disabled");
    contact.contactGeoDistricts(element);
});

$('body').on('click', '.ul-geo-search li', function () {
    var cityId = $(this).attr('data-cityid');
    var countyId = $(this).attr('data-countyid');
    var districtId = $(this).attr('data-districtId');
    $(this).closest('.search-content').find('input').val($(this).attr('data-text'));
    var selectInput = $(this).closest('.module-tab').find('select');
    $('.ul-geo-search').empty();
    $(".branch").removeAttr("disabled");
    contact.getBranchesForContact(cityId, countyId, districtId, selectInput);
});

$('.address').on('focus', function () {

    $(this).closest("div.search-content").find(".searchContent .dropdown").show();

    document.addEventListener("keydown", contact.keyDownBranchSearchField, false);
});

$('.address').on('focusout', function () {
    var a = $(this);
    setTimeout(function () {
        a.closest("div.search-content").find(".searchContent .dropdown").slideUp(400);
    }, 200);

    document.removeEventListener("keydown", contact.keyDownBranchSearchField, false);
    $('.tab-pane.active').find(".ul-geo-search li").removeAttr("selected");
    if (a.val() == "") {
        $(".branch").empty().attr("disabled", "disabled").closest('div').addClass('is-empty');
    }
});

$('.tck-number').on('keyup focus blur load', function (event) {
    event.preventDefault();
    var isValid = main.checkTcNum($(this).val());
    if (isValid) {
        $(this).closest('div.form-group.label-floating').addClass('success').closest('div.form-group.label-floating').removeClass('error');
    }
    else {
        $(this).closest('div.form-group.label-floating').addClass('error').closest('div.form-group.label-floating').removeClass('success');
    }

    if ($(this).val().length > 0) {
        $('.shipment-code').removeAttr("data-validate-type", "required").closest('div.form-group').removeClass("error");
    } else {
        $('.shipment-code').attr("data-validate-type", "required");
    }
});

$(".shipment-code").on('keyup focus focusout blur load', function (event) {
    event.preventDefault();
    this.value = this.value.replace(/[^0-9\.]/g, '');
    if ($(this).val().length === 12 || $(this).val().length === 16) {
        $(this).closest('div.form-group').removeClass("error");
    } else {
        $(this).closest('div.form-group').addClass("error");
    }

    if ($(this).val().length > 0) {
        $('.tck-number').removeAttr("data-validate-type", "required").closest('div.form-group').removeClass("error");
    } else {
        $('.tck-number').attr("data-validate-type", "required");
        $(this).closest('div.form-group').removeClass("error");
    }
});


//Gsm Bilgisi girildi.
$(".gsm-number").on('keyup focus focusout blur load', function (event) {
    event.preventDefault();

    if ($(this).val().length === 10 || $(this).val().length === 11) {
        $(this).closest('div.form-group').removeClass("error");
    } else {
        $(this).closest('div.form-group').addClass("error");
    }

    if ($(this).val().length > 0) {
        $('.phone-number').removeAttr("data-validate-type", "required").closest('div.form-group').removeClass("error");
    } else {
        $('.phone-number').attr("data-validate-type", "required");
        $(this).closest('div.form-group').removeClass("error");
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

    if ($(this).val().length > 0) {
        $('.gsm-number').removeAttr("data-validate-type", "required").closest('div.form-group').removeClass("error");
    } else {
        $('.gsm-number').attr("data-validate-type", "required");
        $(this).closest('div.form-group').removeClass("error");
    }
});