$(function () {

    $(".delivery-detail").removeClass("active").css("display", "none");
    $(".delivery-type").css("display", "none");
    delivery.getCountry($("#countryId"));

    delivery.cargoSelectTown();

    if (main.variables.language == "tr") {
        $("#countryId").closest('div').removeClass('is-empty');
        $("#DestinationCityAndCounty").removeClass('disabled');
        $("#DestinationCityAndCounty").removeAttr('disabled');
    }
    $("input[name=optionsRadiosPosted]:first").prop("checked", true);
    $("input[name=optionsRadiosDelivery]:first").prop("checked", true);
    main.moveView($("#countryId"));
});

var delivery = {

    variables: {
        departureCityId: "",
        departureTownId: "",
        departureDistrictId: "",
        arrivalCityId: "",
        arrivalTownId: "",
        arrivalDistrictId: "",
        addressPickup: false,
        addressDelivery: false,
        excludeCyprus: true
    },

    getCountry: function (element) {
        main.addLoader();
        _serviceProvider.getCountry.getDetail(main.variables.language)
            .done(function (response) {
                if (response.ErrorMessage === undefined && response && response.length > 0) {
                    $(element).empty();
                    if (main.variables.language != 'tr') {
                        $(element).append($('<option>').css('display', 'none'));
                    }
                    $(element).append($('<option>',
                        {
                            value: 0,
                            text: "TURKIYE"
                        }));

                    $(response).each(function () {
                        $(element).append($('<option>',
                            {
                                value: this.CountryId,
                                text: this.CountryName
                            }));
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
        main.removeLoader();
    },

    getDeliveryAwbInfo: function (departureCityId, arrivalCountryId) {
        main.addButtonLoader($('#btn-search'));
        _serviceProvider.getDeliveryInfo.getDelivery(departureCityId, arrivalCountryId, main.variables.language)
            .done(function (response) {
                if (response.ErrorMessage === undefined && response && response.length > 0) {
                    var tableTemplate = "";
                    $.each(response, function (key, value) {
                        var prodName = value.ProdName,
                            maxDay = value.MaxEstimatedArrivalDate,
                            minDay = value.MinEstimatedArrivalDate;
                        tableTemplate += "<tr><td class='text-center'>" +
                            prodName +
                            "</td><td class='text-center'>" +
                            minDay +
                            "</td><td class='text-center font'>" +
                            maxDay +
                            "</td></tr >";
                    });
                    $('#table-delivery-times tbody').html(tableTemplate);
                    main.tabOwlCarousel();

                    $(".delivery-detail").addClass("active").css("display", "block");
                    main.moveView($('#table-delivery-times tbody'));
                } else {
                    if (response.ErrorMessage !== undefined) {
                        main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                    } else {
                        main.loader(main.enums.loaderEnum.Error, Resource.EstimatedDeliveryDateUnexpectedError[main.variables.language]);
                    }
                    $(".delivery-detail").removeClass("active").css("display", "none");
                    $("#btn-continue").removeAttr("disabled", "disabled");
                    $("#SourceCityAndCounty").removeAttr("disabled", "disabled");
                    $("#countryId").removeAttr("disabled", "disabled");
                }
                main.deleteButtonLoader($('#btn-search'));
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, Resource.EstimatedDeliveryDateUnexpectedError[main.variables.language]);
                $(".delivery-detail").removeClass("active").css("display", "none");
                $("#btn-continue").removeAttr("disabled", "disabled");
                $("#SourceCityAndCounty").removeAttr("disabled", "disabled");
                $("#countryId").removeAttr("disabled", "disabled");
                main.deleteButtonLoader($('#btn-search'));
            });
        main.removeLoader();
    },

    postDeliveryInfo: function (model) {
        main.addButtonLoader($('#btn-search'));
        _serviceProvider.postDeliveryInfo.postDelivery(model, main.variables.language)
            .done(function (response) {
                if (response.ErrorMessage === undefined && response && response.result.length > 0) {
                    var tableTemplate = "";
                    $.each(response.result,
                        function (key, value) {
                            var mainProdName = value.MainProduct.MainProdName,
                                validFlag = value.MainProduct.ValidFlag,
                                maxDay = value.MaxDeliveryDay,
                                minDay = value.MinDeliveryDay;
                            if (validFlag != "0") {
                                tableTemplate += "<tr><td class='text-center'>" +
                                    mainProdName +
                                    "</td><td class='text-center'>" +
                                    minDay +
                                    "</td><td class='text-center font'>" +
                                    maxDay +
                                    "</td></tr >";
                            } else {
                                tableTemplate += "<tr class='disable-color'><td class='text-center'>" +
                                    mainProdName +
                                    "</td><td class='text-center'>-</td><td class='text-center font'>-</td></tr >";
                            }
                        });
                    $('#table-delivery-times tbody').html(tableTemplate);
                    main.tabOwlCarousel();

                    $(".delivery-detail").addClass("active").css("display", "block");
                    main.moveView($('#table-delivery-times tbody'));
                    if (response.specificDaysMessage && response.specificDaysMessage != "") {
                        main.loader(main.enums.loaderEnum.Error, response.specificDaysMessage);
                    }
                } else {
                    $(".delivery-detail").removeClass("active").css("display", "none");
                    if (response.ErrorMessage !== undefined) {
                        main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                    } else {
                        main.loader(main.enums.loaderEnum.Error, Resource.EstimatedDeliveryDateUnexpectedError[main.variables.language]);
                    }
                }
                main.deleteButtonLoader($('#btn-search'));
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, Resource.EstimatedDeliveryDateUnexpectedError[main.variables.language]);
                $(".delivery-detail").removeClass("active").css("display", "none");
                main.deleteButtonLoader($('#btn-search'));
            });
        main.removeLoader();
    },

    cargoSelectTown: function () {
        var k = $("#countryId option:selected").text();
        if (k == "TURKIYE") {
            $("#DestinationCityAndCounty").removeAttr("disabled");
            $("#DestinationCityAndCounty").removeClass("disabled");
        }
        else {
            $("#DestinationCityAndCounty").prop("disabled", true);
            $("#DestinationCityAndCounty").addClass("disabled");
            $("#DestinationCityAndCounty").val("");
        }
    },

    keyDownSourceBranchSearchField: function (e) {
        var keyCode = e.keyCode;

        var alreadySelectedItem = $("#ul-source-city-county li[selected]");

        if (keyCode == 40) {
            if (alreadySelectedItem) {
                delivery.moveSelectedSourceBranchSearchItem(alreadySelectedItem, "next");
            }
            else {
                delivery.moveSelectedSourceBranchSearchItem(null, "next");
            }
        }
        else if (keyCode == 38) {

            if (alreadySelectedItem) {
                delivery.moveSelectedSourceBranchSearchItem(alreadySelectedItem, "prev");
            }
            else {
                delivery.moveSelectedSourceBranchSearchItem(null, "prev");
            }
        }
        else if (keyCode == 13) {
            e.preventDefault();

            if (alreadySelectedItem && alreadySelectedItem.length > 0) {
                delivery.variables.departureCityId = alreadySelectedItem.attr("data-cityid");
                delivery.variables.departureTownId = alreadySelectedItem.attr("data-countyid");
                delivery.variables.departureDistrictId = alreadySelectedItem.attr("data-districtid");
                $("#SourceCityAndCounty").val(alreadySelectedItem.attr('data-text'));
                $('#ul-source-city-county').empty();
            }
        }
    },

    moveSelectedSourceBranchSearchItem: function (startPoint, traversal) {

        $("#ul-source-city-county li").removeAttr("selected");
        $("#ul-source-city-county li").removeClass("selected-light-gray");

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
                var itemBranchSearch = $("#ul-source-city-county li");
                itemBranchSearch.first().attr("selected", true);
                itemBranchSearch.first().addClass("selected-light-gray");
            }

        }
    },

    keyDownDestinationBranchSearchField: function (e) {
        var keyCode = e.keyCode;

        var alreadySelectedItem = $("#ul-destination-city-county li[selected]");

        if (keyCode == 40) {
            if (alreadySelectedItem) {
                delivery.moveSelectedDestinationBranchSearchItem(alreadySelectedItem, "next");
            }
            else {
                delivery.moveSelectedDestinationBranchSearchItem(null, "next");
            }
        }
        else if (keyCode == 38) {

            if (alreadySelectedItem) {
                delivery.moveSelectedDestinationBranchSearchItem(alreadySelectedItem, "prev");
            }
            else {
                delivery.moveSelectedDestinationBranchSearchItem(null, "prev");
            }
        }
        else if (keyCode == 13) {
            e.preventDefault();

            if (alreadySelectedItem && alreadySelectedItem.length > 0) {
                delivery.variables.arrivalCityId = alreadySelectedItem.attr("data-cityid");
                delivery.variables.arrivalTownId = alreadySelectedItem.attr("data-countyid");
                delivery.variables.arrivalDistrictId = alreadySelectedItem.attr("data-districtid");
                $("#DestinationCityAndCounty").val(alreadySelectedItem.attr('data-text'));
                $('#ul-destination-city-county').empty();
            }
        }
    },

    moveSelectedDestinationBranchSearchItem: function (startPoint, traversal) {

        $("#ul-destination-city-county li").removeAttr("selected");
        $("#ul-destination-city-county li").removeClass("selected-light-gray");

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
                var itemBranchSearch = $("#ul-destination-city-county li");
                itemBranchSearch.first().attr("selected", true);
                itemBranchSearch.first().addClass("selected-light-gray");
            }

        }
    }
}

$("#btn-search").click(function () {
    var unvalidateInputs;
    if ($("#countryId").val() == 0) {

        main.validateInput(false);
        unvalidateInputs = $(".form-group .error");
        delivery.variables.addressDelivery = $("#address-delivery").prop("checked");
        delivery.variables.addressPickup = $("#address-pickup").prop("checked");

        var model = {
            departureCityId: delivery.variables.departureCityId,
            departureTownId: delivery.variables.departureTownId,
            departureDistrictId: delivery.variables.departureDistrictId,
            arrivalCityId: delivery.variables.arrivalCityId,
            arrivalTownId: delivery.variables.arrivalTownId,
            arrivalDistrictId: delivery.variables.arrivalDistrictId,
            addressPickup: delivery.variables.addressPickup,
            addressDelivery: delivery.variables.addressDelivery
        }

        if (delivery.variables.addressDelivery == false) {
            model.arrivalDistrictId = null;
        }
        if (delivery.variables.addressPickup == false) {
            model.departureDistrictId = null;
        }
        if (unvalidateInputs.length == 0) {
            delivery.postDeliveryInfo(model);
        }
    } else {
        main.validateInput(false);
        $("#DestinationCityAndCounty").closest(".form-group").removeClass("error");
        unvalidateInputs = $(".form-group .error");
        if (unvalidateInputs.length == 0) {
            delivery.getDeliveryAwbInfo(delivery.variables.departureCityId, $("#countryId").val());
        }
    }
});

$("#btn-continue").click(function () {
    main.validateInput(false);
    if ($("#countryId").val() != 0) {
        $("#DestinationCityAndCounty").closest(".form-group").removeClass("error");
    } else {
        if (delivery.variables.arrivalCityId == "" || delivery.variables.arrivalCityId == "0") {
            $("#DestinationCityAndCounty").closest('.form-group').addClass('error');
        }
    }
    if (delivery.variables.departureCityId == "" || delivery.variables.departureCityId == "0") {
        $("#SourceCityAndCounty").closest('.form-group').addClass('error');
    }
    var unvalidateInputs = $(".error");
    if (unvalidateInputs.length == 0) {
        if ($("#countryId").val() != 0) {
            main.validateInput(false);
            $("#DestinationCityAndCounty").closest(".form-group").removeClass("error");
            unvalidateInputs = $(".form-group .error");
            if (unvalidateInputs.length == 0) {
                delivery.getDeliveryAwbInfo(delivery.variables.departureCityId, $("#countryId").val());
            }
        } else {
            $(".delivery-type").css("display", "block");
        }
     
        $("#btn-continue").attr("disabled", "disabled");
        $("#SourceCityAndCounty").attr("disabled", "disabled");
        $("#countryId").attr("disabled", "disabled");
        $("#DestinationCityAndCounty").attr("disabled", "disabled");

    }
});

$("#countryId").on("change", function () {
    delivery.cargoSelectTown();
});

$("#SourceCityAndCounty").keyup(function (e) {
    if (e.which != 13) {
        delivery.variables.departureCityId = "0";
        delivery.variables.departureTownId = "0";
        delivery.variables.departureDistrictId = "0";
    }
    //var isNumeric = main.addressListing(e);
    //if (isNumeric == true) {
    //    var address = $(this).val();
    //    main.getGeoDistricts($('#ul-source-city-county'), address, delivery.variables.excludeCyprus);
    //}

    if ((e.keyCode >= 37 && e.keyCode <= 40) || e.keyCode == 13) {
        return;
    }

    main.getGeoDistricts($('#ul-source-city-county'), $(this).val(), delivery.variables.excludeCyprus);
    if ($(this).val().length < 3) {
        $('#ul-source-city-county').empty();
    }
});

$("#DestinationCityAndCounty").keyup(function (e) {
    if (e.which != 13) {
        delivery.variables.arrivalCityId = "0";
        delivery.variables.arrivalTownId = "0";
        delivery.variables.arrivalDistrictId = "0";
    }
    //var isNumeric = main.addressListing(e);
    //if (isNumeric == true) {
    //    var address = $(this).val();
    //    main.getGeoDistricts($('#ul-destination-city-county'), address, delivery.variables.excludeCyprus);
    //}

    if ((e.keyCode >= 37 && e.keyCode <= 40) || e.keyCode == 13) {
        return;
    }

    main.getGeoDistricts($('#ul-destination-city-county'), $(this).val(), delivery.variables.excludeCyprus);
    if ($(this).val().length < 3) {
        $('#ul-destination-city-county').empty();
    }
});

$('body').on('click', '#ul-destination-city-county li', function () {
    delivery.variables.arrivalCityId = $(this).attr("data-cityid");
    delivery.variables.arrivalTownId = $(this).attr("data-countyid");
    delivery.variables.arrivalDistrictId = $(this).attr("data-districtid");
    $("#DestinationCityAndCounty").val($(this).attr('data-text')).attr("data-cityid", delivery.variables.arrivalCityId).attr("data-countyid", delivery.variables.arrivalTownId);
    $('#ul-destination-city-county').empty();
});

$('body').on('click', '#ul-source-city-county li', function () {
    delivery.variables.departureCityId = $(this).attr("data-cityid");
    delivery.variables.departureTownId = $(this).attr("data-countyid");
    delivery.variables.departureDistrictId = $(this).attr("data-districtid");
    $("#SourceCityAndCounty").val($(this).attr('data-text')).attr("data-cityid", delivery.variables.departureCityId).attr("data-countyid", delivery.variables.departureTownId);
    $('#ul-source-city-county').empty();
});

$('#SourceCityAndCounty').on('focus', function () {

    $(this).closest("div.search-content").find(".searchContent .dropdown").show();

    document.addEventListener("keydown", delivery.keyDownSourceBranchSearchField, false);
});

$('#SourceCityAndCounty').on('focusout', function (e) {

    var a = $(this);
    setTimeout(function () {
        a.closest("div.search-content").find(".searchContent .dropdown").slideUp(400);
    }, 200);

    document.removeEventListener("keydown", delivery.keyDownSourceBranchSearchField, false);
    $("#ul-geo-search li").removeAttr("selected");

});

$('#DestinationCityAndCounty').on('focus', function () {

    $(this).closest("div.search-content").find(".searchContent .dropdown").show();

    document.addEventListener("keydown", delivery.keyDownDestinationBranchSearchField, false);
});

$('#DestinationCityAndCounty').on('focusout', function (e) {

    var a = $(this);
    setTimeout(function () {
        a.closest("div.search-content").find(".searchContent .dropdown").slideUp(400);
    }, 200);

    document.removeEventListener("keydown", delivery.keyDownDestinationBranchSearchField, false);
    $("#ul-geo-search li").removeAttr("selected");

});

$("#countryId").change(function () {

    if ($("#DestinationCityAndCounty").prop('disabled') == false && $("#SourceCityAndCounty").val()) {
        $("#btn-continue").addClass("disabled");
    }

    if ($("#DestinationCityAndCounty").prop('disabled') == true && $("#SourceCityAndCounty").val()) {
        $("#btn-continue").removeClass("disabled");
    }     
});

$(document).keyup(function (event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);

    if (event.target.id == "SourceCityAndCounty" || event.target.id == "DestinationCityAndCounty") {

        if (keycode == '13') {
            var control = event.target.id == "SourceCityAndCounty" ? "#DestinationCityAndCounty" : "#SourceCityAndCounty";
            var current = event.target.id == "SourceCityAndCounty" ? "#SourceCityAndCounty" : "#DestinationCityAndCounty";
            $(current).attr("data-cityid", "999");
            if ($(control).val() || $("#DestinationCityAndCounty").prop('disabled')) {
                $("#btn-continue").removeClass("disabled");
            }
            else {
                $("#btn-continue").addClass("disabled");
            }
        }
        else {
            if ($("#countryId").val() != 0) {
                $("#btn-continue").removeClass("disabled");
            } else {
                if (delivery.variables.arrivalCityId == "" || delivery.variables.arrivalCityId == "0") {
                    $("#btn-continue").addClass("disabled");
                }
            }
            if (delivery.variables.departureCityId == "" || delivery.variables.departureCityId == "0") {
                $("#btn-continue").addClass("disabled");
            }
        }
    }
});

$("#SourceCityAndCounty, #DestinationCityAndCounty").on('keydown keyup', function () {
    var key = event.keyCode || event.charCode;

    if (key != 8 && key != 46 && (key < 37 || key > 40)) {
        if ($("#SourceCityAndCounty").val() == "") {
            $("#SourceCityAndCounty").attr("data-cityid", "0");
            $("#SourceCityAndCounty").attr("data-countyid", "0");
            $("#btn-continue").addClass("disabled");
            return;
        }

        if ($("#DestinationCityAndCounty").val() == "" && $("#DestinationCityAndCounty").prop('disabled') == false) {
            $("#DestinationCityAndCounty").attr("data-cityid", "0");
            $("#DestinationCityAndCounty").attr("data-countyid", "0");
            $("#btn-continue").addClass("disabled");
            return;
        }

        if (parseInt($("#SourceCityAndCounty").attr("data-cityid")) > 0 || parseInt($("#SourceCityAndCounty").attr("data-countyid")) > 0) {
            if (parseInt($("#DestinationCityAndCounty").attr("data-cityid")) > 0 || parseInt($("#DestinationCityAndCounty").attr("data-countyid")) > 0 || $("#DestinationCityAndCounty").prop('disabled')) {
                $("#btn-continue").removeClass("disabled");
            }
            else {
                $("#btn-continue").addClass("disabled");
            }
        }
        else {
            $("#btn-continue").addClass("disabled");
        }
    }
});