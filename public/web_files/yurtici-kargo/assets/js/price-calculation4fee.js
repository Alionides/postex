var price = {

    enums: {

        compProdTypeEnum: {
            PurchaseService: "1",
            DeliveryService: "2",
            OtherService: "3",
            ShortMessageService: "4"
        }
    },

    variables: {
        excludeCyprus: true,
        shipmentType: 0
    },

    priceCalculation: function (totalCount, packages, totalWeight, shipmentType) {
        var model = {
            SourceCityId: $('#SourceCityAndCounty').attr('data-cityid'),
            SourceCountyId: $('#SourceCityAndCounty').attr('data-countyid'),
            DestinationCityId: $('#DestinationCityAndCounty').attr('data-cityid'),
            DestinationCountyId: $('#DestinationCityAndCounty').attr('data-countyid'),
            TotalKgds: totalWeight,
            ShipmentType: shipmentType,
            TotalCount: totalCount,
            CampaignPackageRequest: packages
        };
        _serviceProvider.postPricing.post(model, main.variables.language)
            .done(function (response) {
                if (response.ErrorMessage !== undefined) {
                    main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                    $(".price-title").removeClass("active").css("display", "none");
                    $(".price-detail").removeClass("active").css("display", "none");
                    $(".complementary-products-tab").hide().closest('.container-exp').css("display", "none");

                } else {
                    if (response && response.length > 0) {
                        debugger;
                        $('.complementary-products-tab').find('div.tab-title-middle.owl-carousel.owl-theme').html('');
                        $('.complementary-products-tab').find('div.tab-content.clearfix').html('');
                        $(".package-price-summary").removeAttr("style");
                        $(".opportunity").show();
                        $.each(response, function (index, item) {

                            var total = (parseFloat(item.ProductPrice) + parseFloat(item.ProductVat.toFixed(2)));
                            var totalCampaign = (parseFloat(item.ProductCampaignPrice) + parseFloat(item.ProductCampaignVat.toFixed(2)));
                            $.each(item.ComplementaryProducts, function (index, productItem) {
                                if (productItem.IsSelected) {
                                    var productPrice = parseFloat(productItem.Price) + parseFloat(productItem.Vat.toFixed(2));
                                    var productCampaignPrice = parseFloat(productItem.CampaignPrice) + parseFloat(productItem.CampaignVat.toFixed(2));
                                    total += productPrice;
                                    totalCampaign += productCampaignPrice;
                                }
                            });

                            var tabTemp = "";
                            var isActive = index === 0 ? "active" : "";
                            if (item.ComplementaryProducts === null) {
                                tabTemp = '<div class="item disabled-module" data-prodtype="' + item.ProductId + '" data-product-price="' + item.ProductPrice + '" data-product-campaign-price="' + item.ProductCampaignPrice + '" data-product-vat="' + item.ProductVat + '" data-product-campaign-vat="' + item.ProductCampaignVat + '" ><a href= "#' + index + '_' + item.ProductId + '" data-toggle="tab"><div class="title all-radius ' + isActive + '"><span>' + item.ProductName + '</span><div class="price-module-title center"><div><span class="price-mod first">--</span></div><div><span class="price-mod last">--</span></div></div></div></a></div>';
                            } else {
                                tabTemp = '<div class="item" data-prodtype="' + item.ProductId + '" data-product-price="' + item.ProductPrice + '" data-product-campaign-price="' + item.ProductCampaignPrice + '" data-product-vat="' + item.ProductVat + '" data-product-campaign-vat="' + item.ProductCampaignVat + '" ><a href= "#' + index + '_' + item.ProductId + '" data-toggle="tab"><div class="title all-radius ' + isActive + '"><span>' + item.ProductName + '</span><div class="price-module-title center"><div><span class="price-mod first">' + total.toFixed(2) + '</span><b class="price-icon">₺</b></div><div><span class="price-mod last"> ' + totalCampaign.toFixed(2) + '</span><b class="price-icon">₺</b></div></div></div></a></div>';
                            }
                            index++;
                            var contentTemp = '<div class="tab-pane ' + isActive + '" id="' + index + '_' + item.ProductId + '">';
                            contentTemp += '<h6 class="view">' + item.ProductDescription + '</h6>';

                            var purchaseTemplate = '<div class="purchase-services"><h6 class="title-grey">' + Resource.PurchaseServices[main.variables.language] + '</h6>',
                                deliveryTemplate = '<div class="delivery-services"><h6 class="title-grey">' + Resource.DeliveryServices[main.variables.language] + '</h6>',
                                otherTemplate = '<div class="other-services"><h6 class="title-grey">' + Resource.OtherServices[main.variables.language] + '</h6>',
                                shortMessageTemplate = '<div class="sms-services"><h6 class="title-grey">' + Resource.SmsServices[main.variables.language] + '</h6>';

                            $.each(item.ComplementaryProducts, function (index, productItem) {
                                var isChecked = "";
                                if (productItem.IsSelected) {
                                    isChecked = "checked";
                                }

                                var isDisabled = "";
                                if (!productItem.IsEditable) {
                                    isDisabled = "disabled";
                                }

                                var inputType = "radio", inputCheck = "";
                                if (productItem.CompProdType === price.enums.compProdTypeEnum.PurchaseService || productItem.CompProdType === price.enums.compProdTypeEnum.DeliveryService) {
                                    inputType = "radio";
                                } else if (productItem.CompProdType === price.enums.compProdTypeEnum.OtherService || productItem.CompProdType === price.enums.compProdTypeEnum.ShortMessageService) {
                                    inputType = "checkbox";
                                    inputCheck = "check";
                                }
                                var template = "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>" +
                                    "<div class='form-group'>" +
                                    "<div class='radio radio-primary " + inputCheck + "'>" +
                                    "<label>" +
                                    "<input onchange='price.productTotalCalculate()'" +
                                    "data-type='product-additional-services'" +
                                    "type='" + inputType + "' " +
                                    "name='CompProdType" + productItem.CompProdType + "_" + item.ProductId + "'" + isChecked + " " + isDisabled + " data-comp-prod-type=" + productItem.CompProdType + " data-price=" + productItem.Price + " data-campaign-price='" + productItem.CampaignPrice + "' data-product-campaign-vat='" + productItem.CampaignVat + "'  data-product-vat='" + productItem.Vat + "' >" +
                                    "<span class='circle'></span><span class='check'></span>" + productItem.Name + "<br><b class='product-item-price first'> " + productItem.Price + "</b>" +
                                    "<b class='price-icon'> ₺</b><b class='product-item-price last'>" + productItem.CampaignPrice + "</b><b class='price-icon'> ₺</b>" +
                                    "</label></div>" +
                                    "</div>" +
                                    "</div>";

                                if (productItem.CompProdType === price.enums.compProdTypeEnum.PurchaseService) {
                                    purchaseTemplate += template;
                                } else if (productItem.CompProdType === price.enums.compProdTypeEnum.DeliveryService) {
                                    deliveryTemplate += template;
                                } else if (productItem.CompProdType === price.enums.compProdTypeEnum.OtherService) {
                                    otherTemplate += template;
                                } else if (productItem.CompProdType === price.enums.compProdTypeEnum.ShortMessageService) {
                                    shortMessageTemplate += template;
                                }
                            });

                            purchaseTemplate += "</div>";
                            deliveryTemplate += "</div>";
                            otherTemplate += "</div>";
                            shortMessageTemplate += "</div>";

                            contentTemp += purchaseTemplate + deliveryTemplate + otherTemplate + shortMessageTemplate;
                            contentTemp += '</div>';

                            $('.complementary-products-tab').find('div.tab-title-middle').append(tabTemp);
                            $('.complementary-products-tab').find('div.tab-content.clearfix').append(contentTemp);
                            $('.complementary-products-tab').show().closest('.container-exp').css("display", "block");
                            $(".price-title").addClass("active").slideDown(400);

                        });
                        price.productTotalCalculate();
                        main.tabOwlCarousel();
                        $('.tab-title-middle.owl-carousel.owl-theme.owl-loaded').removeClass('owl-hidden');

                        main.moveView($('.complementary-products-tab'));
                        price.hideServices();
                    } else {
                        main.loader(main.enums.loaderEnum.Error, Resource.CalculatePriceUnexpectedError[main.variables.language]);
                        $(".price-title").removeClass("active").css("display", "none");
                        $(".price-detail").removeClass("active").css("display", "none");
                        $(".complementary-products-tab").hide().closest('.container-exp').css("display", "none");
                    }
                }
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, Resource.CalculatePriceUnexpectedError[main.variables.language]);
                $(".price-title").removeClass("active").css("display", "none");
                $(".price-detail").removeClass("active").css("display", "none");
                $(".complementary-products-tab").hide().closest('.container-exp').css("display", "none");
            });
    },

    awbPriceCalculation: function (totalWeight, shipmentType, packageSize, totalDesi) {
        var model = {
            CountryId: $('#countryId').val(),
            CargoType: shipmentType,
            TotalKg: totalWeight,
            TotalDesi: totalDesi,
            Shipments: packageSize
        };
        _serviceProvider.awbPostPricing.post(model, main.variables.language)
            .done(function (response) {
                if (response && response.ErrorMessage === undefined && response.length > 0) {
                    $('.complementary-products-tab').find('div.tab-title-middle.owl-carousel.owl-theme').html('');
                    $('.complementary-products-tab').find('div.tab-content.clearfix').html('');

                    var tableTemplate = "";
                    $.each(response, function (key, value) {
                        var isValid = value.ValidFlag;
                        var productName = value.ProdName;

                        var price = value.Price;
                        var localPrice = value.LocalPrice;
                        var currency = value.Currency;
                        if (isValid === false) {
                            tableTemplate += "<tr class='disable-color'><td>" + productName + "</td><td class='text-center'>-</td></tr >";
                        } else {
                            tableTemplate += "<tr><td>" + productName + "</td><td class='text-center'>" + price + " " + currency + " / " + localPrice + " TL </td></tr >";
                        }
                    });
                    $('#table-header-one').text(Resource.Price[main.variables.language]);
                    $('.container-exp').removeAttr("style");
                    $('.price-title').removeAttr("style");
                    $('#table-pricing-info tbody').html(tableTemplate);
                    main.moveView($('#table-pricing-info tbody'));

                } else {
                    if (response.ErrorMessage !== undefined) {
                        main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                    } else {
                        main.loader(main.enums.loaderEnum.Error, Resource.CalculatePriceUnexpectedError[main.variables.language]);
                    }
                    $(".price-title").removeClass("active").css("display", "none");
                    $(".price-detail").removeClass("active").css("display", "none");
                }
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, Resource.CalculatePriceUnexpectedError[main.variables.language]);
                $(".price-title").removeClass("active").css("display", "none");
                $(".price-detail").removeClass("active").css("display", "none");
            });

    },

    totalKgDs: function (width, height, length) {

        if ($("#countryId").val() != 0) {
            return ((width * height * length) / 5000);
        }
        return ((width * height * length) / 3000);
    },

    getCountry: function (element) {
        main.addLoader();
        _serviceProvider.getCountry.getDetail(main.variables.language)
            .done(function (response) {
                if (response && response.ErrorMessage === undefined) {
                    $(element).empty();

                    $(element).append($('<option>', {
                        value: 0,
                        text: "TURKIYE"
                    }));
                    $("#countryId").closest('div').removeClass('is-empty');
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
                main.removeLoader();
            })
            .fail(function () {
                main.removeLoader();
                main.loader(main.enums.loaderEnum.Error, Resource.GenericUnexpectedError[main.variables.language]);
            });
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

    calculatePrice: function () {
        main.validateInput(false);
        if ($("#countryId").val() != 0) {
            $("#DestinationCityAndCounty").closest(".form-group").removeClass("error");
        }
        var unvalidateInputs = $(".form-group.error");
        var onError = false,
            countryId = $('#countryId').val(),
            shipmentType = price.variables.shipmentType;

        if (shipmentType == main.enums.shipmentTypeEnum.Package) {
            var count = $('.package-add-module:not(.package-clone-item)').length;
            if (count === 0) {
                onError = true;
            }
        }

        if (!onError) {

            var totalCount = 0,
                totalWeight = 0,
                totalDesi = 0;
                totKgDs = 0;
            var packageSize = [];
            var packages = [];

            $('.package-item-detail').each(function () {
                if ($(this).closest('.package-clone-item').length === 0) {
                    var widht = $(this).find('input[data-type="width"]').val();
                    var height = $(this).find('input[data-type="height"]').val();
                    var lenght = $(this).find('input[data-type="length"]').val();
                    var weight = $(this).find('input[data-type="weight"]').val();
                    if (widht == "" || height == "" || lenght == "" || weight == "") {
                        unvalidateInputs.length += 1;
                    }

                    var desi = price.totalKgDs(widht, height, lenght);

                    var package = {
                        Width: widht,
                        Height: height,
                        Length: lenght,
                        Weight: weight,
                        Desi: desi,
                        Kg: weight,
                        Kgds: weight > desi ? weight : desi,
                        Count: 1
                    }

                    totalDesi += parseInt(package.Desi);
                    packageSize.push(package);
                    packages.push(package);
                    totKgDs += parseInt(package.Kgds);
                    totalWeight += parseInt(package.Weight);
                    totalCount++;
                }
            });

            if (shipmentType == main.enums.shipmentTypeEnum.Document) {
                totalCount = 1;
                totalWeight = 0;
                packageSize = [];
                var package = {
                    Width: 0,
                    Height: 0,
                    Length: 0,
                    Weight: 0,
                    Desi: 0,
                    Kg: 0,
                    Kgds: 0,
                    Count: 1
                }

                packageSize.push(package);
                packages.push(package);
            }
            if (unvalidateInputs.length == 0) {
                if (countryId == 0) {
                    price.priceCalculation(totalCount, packages, totKgDs, shipmentType);
                } else {
                    price.awbPriceCalculation(totalWeight, shipmentType, packageSize, totalDesi);
                }
            }


            var k = $(".typeChoice .first").hasClass("active");

            if (k > 0) {
                $(".price-detail").addClass("active").slideDown(400);
            }
        }
    },

    keyDownSourceBranchSearchField: function (e) {
        var keyCode = e.keyCode;

        var alreadySelectedItem = $("#ul-source-city-county li[selected]");

        if (keyCode == 40) {
            if (alreadySelectedItem) {
                price.moveSelectedSourceBranchSearchItem(alreadySelectedItem, "next");
            }
            else {
                price.moveSelectedSourceBranchSearchItem(null, "next");
            }
        }
        else if (keyCode == 38) {

            if (alreadySelectedItem) {
                price.moveSelectedSourceBranchSearchItem(alreadySelectedItem, "prev");
            }
            else {
                price.moveSelectedSourceBranchSearchItem(null, "prev");
            }
        }
        else if (keyCode == 13) {
            e.preventDefault();

            if (alreadySelectedItem && alreadySelectedItem.length > 0) {
                $("#SourceCityAndCounty").val(alreadySelectedItem.attr('data-text')).attr("data-cityid", alreadySelectedItem.attr("data-cityid")).attr("data-countyid", alreadySelectedItem.attr("data-countyid"));
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
                price.moveSelectedDestinationBranchSearchItem(alreadySelectedItem, "next");
            }
            else {
                price.moveSelectedDestinationBranchSearchItem(null, "next");
            }
        }
        else if (keyCode == 38) {

            if (alreadySelectedItem) {
                price.moveSelectedDestinationBranchSearchItem(alreadySelectedItem, "prev");
            }
            else {
                price.moveSelectedDestinationBranchSearchItem(null, "prev");
            }
        }
        else if (keyCode == 13) {
            e.preventDefault();
            if (alreadySelectedItem && alreadySelectedItem.length > 0) {
                $("#DestinationCityAndCounty").val(alreadySelectedItem.attr('data-text')).attr("data-cityid", alreadySelectedItem.attr("data-cityid")).attr("data-countyid", alreadySelectedItem.attr("data-countyid"));
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
    },

    packageTotalCalculate: function () {
        var totalDesi = 0,
            totalWeight = 0;
        $('.package-item-detail').each(function () {
            if ($(this).closest('.package-clone-item').length === 0) {
                var width = $(this).find('input[data-type="width"]').val();
                var height = $(this).find('input[data-type="height"]').val();
                var length = $(this).find('input[data-type="length"]').val();

                var weight = $(this).find('input[data-type="weight"]').val();

                totalWeight += parseInt(weight);
                var total = parseFloat(price.totalKgDs(width, height, length));
                totalDesi += total;
            }
        });
        var totalWeightInfo = parseFloat(totalWeight).toFixed(2);
        var totalDesiInfo = parseFloat(totalDesi).toFixed(2);
        var totalBasisWeightInfo = totalDesi > totalWeight ? totalDesi : totalWeight;
        if (isNaN(totalBasisWeightInfo) || isNaN(totalDesiInfo) || isNaN(totalWeightInfo)) {
            totalBasisWeightInfo = 0;
            totalDesiInfo = 0;
            totalWeightInfo = 0;
        }
        $('#package-info-table-total-weight').text(parseFloat(totalWeightInfo).toFixed(2));
        $('#package-info-table-total-desi').text(parseFloat(totalDesiInfo).toFixed(2));
        $('#package-info-table-total-basis-weight').text(parseFloat(totalBasisWeightInfo).toFixed(2));
    },

    productTotalCalculate: function () {
        var productDiv = $('.title.all-radius.active').closest('.item');
        var summary = {
            ProductStandardPrice: parseFloat(productDiv.attr('data-product-price')),
            ProductStandardCampingPrice: parseFloat(productDiv.attr('data-product-campaign-price')),
            ProductAdditionalServicesPrice: 0.00,
            ProductAdditionalServicesCampingPrice: 0.00,
            ProductTotalPrice: 0.00,
            ProductTotalCampingPrice: 0.00,
            ProductKdvPrice: parseFloat(productDiv.attr('data-product-vat')),
            ProductKdvCampingPrice: parseFloat(productDiv.attr('data-product-campaign-vat')),
            ProductGenaralTotalPrice: 0.00,
            ProductGenaralTotalCampingPrice: 0.00
        }

        $('.tab-pane-wrap .tab-pane.active').find('input[data-type="product-additional-services"]').each(function (index, item) {
            if (item.checked) {
                var price = $(item).attr('data-price');
                var campaignPrice = $(item).attr('data-campaign-price');
                summary.ProductAdditionalServicesPrice += parseFloat(price);
                summary.ProductAdditionalServicesCampingPrice += parseFloat(campaignPrice);
                var productCampaignVat = $(item).attr('data-product-campaign-vat');
                var productVat = $(item).attr('data-product-vat');
                summary.ProductKdvCampingPrice += parseFloat(productCampaignVat);
                summary.ProductKdvPrice += parseFloat(productVat);
            }
        });

        summary.ProductTotalPrice = summary.ProductStandardPrice + summary.ProductAdditionalServicesPrice;
        summary.ProductTotalCampingPrice = summary.ProductStandardCampingPrice + summary.ProductAdditionalServicesCampingPrice;
        summary.ProductGenaralTotalPrice = summary.ProductTotalPrice + summary.ProductKdvPrice;
        summary.ProductGenaralTotalCampingPrice = summary.ProductTotalCampingPrice + summary.ProductKdvCampingPrice;

        $('#product-standard-conveyance').html("<b>" + summary.ProductStandardPrice.toFixed(2) + "<span>₺</span></b><br/><b>" + summary.ProductStandardCampingPrice.toFixed(2) + "<span>₺</span></b>");
        $('#product-additional-services').html("<b>" + summary.ProductAdditionalServicesPrice.toFixed(2) + "<span>₺</span></b><br/><b>" + summary.ProductAdditionalServicesCampingPrice.toFixed(2) + "<span>₺</span></b>");
        $('#product-total').html("<b>" + summary.ProductTotalPrice.toFixed(2) + "<span>₺</span></b><br/><b>" + summary.ProductTotalCampingPrice.toFixed(2) + "<span>₺</span></b>");
        $('#product-kdv').html("<b>" + summary.ProductKdvPrice.toFixed(2) + "<span>₺</span></b></br><b>" + summary.ProductKdvCampingPrice.toFixed(2) + "<span>₺</span></b>");
        $('#product-genaral-total').html("<b>" + summary.ProductGenaralTotalPrice.toFixed(2) + "<span>₺</span></b><br/><b>" + summary.ProductGenaralTotalCampingPrice.toFixed(2) + "<span>₺</span></b>");
        productDiv.find('.price-module-title.center').html('<div><span class="price-mod first">' + summary.ProductGenaralTotalPrice.toFixed(2) + '</span> <b class="price-icon">₺</b> </div><div><span class="price-mod last"> ' + summary.ProductGenaralTotalCampingPrice.toFixed(2) + '</span> <b class="price-icon">₺</b></div>');

    },

    hideServices: function () {
        var purchase = $(".content-wrap .tab-pane.active").find(".purchase-services");
        var delivery = $(".content-wrap .tab-pane.active").find(".delivery-services");
        var other = $(".content-wrap .tab-pane.active").find(".other-services");
        var sms = $(".content-wrap .tab-pane.active").find(".sms-services");
        if (purchase.find("div").length < 1) {
            purchase.css("display", "none");
        } if (delivery.find("div").length < 1) {
            delivery.css("display", "none");
        } if (other.find("div").length < 1) {
            other.css("display", "none");
        } if (sms.find("div").length < 1) {
            sms.css("display", "none");
        }
    }
}

$(function () {
    var country = $("#countryId");
    if (country) {
        price.getCountry(country);
    }

    price.cargoSelectTown();


    var homeSliderPrice = main.localStorageGetItem("Price-Calculation");
    if (homeSliderPrice) {
        var model = JSON.parse(homeSliderPrice);
        if (model) {
            $("#DestinationCityAndCounty").val(model.destinationInput).attr("data-cityid", model.destinationCityId).attr("data-countyid", model.destinationCountyId);
            $("#SourceCityAndCounty").val(model.sourceInput).attr("data-cityid", model.sourceCityId).attr("data-countyid", model.sourceCountyId);
            $("#countryId").val("0");
            main.localStorageRemoveItem("Price-Calculation");
        }
    }
    $("#DestinationCityAndCounty").removeClass('disabled');
    $("#DestinationCityAndCounty").removeAttr('disabled');
    main.moveView($("#countryId"));
});

$("#btn-price-calculation").click(function () {
    price.calculatePrice();
});

$('#button-select-address').click(function () {
    main.validateInput(false);
    if ($("#countryId").val() != "") {
        if ($("#countryId").val() != 0) {
            $("#DestinationCityAndCounty").closest(".form-group").removeClass("error");
        } else {
            if (!$("#DestinationCityAndCounty").attr("data-cityid") || $("#DestinationCityAndCounty").attr("data-cityid") == "0") {
                $("#DestinationCityAndCounty").closest('.form-group').addClass('error');
            }
        }
        if (!$("#SourceCityAndCounty").attr("data-cityid") || $("#SourceCityAndCounty").attr("data-cityid") == "0") {
            $("#SourceCityAndCounty").closest('.form-group').addClass('error');
        }
        var unvalidateInputs = $(".form-group.error");
        if (unvalidateInputs.length == 0) {
            $(this).attr("disabled", "disabled");
            $(".cargo-form-one input,select").attr("disabled", "disabled");
            var result = main.cargoFormOne();
            if (result) {
                $(".typeChoice,.typeChoiceTitle").slideDown(400);
                main.moveView($(".typeChoice"));
            } else {
                $(".cargo-form-one input,select").removeAttr("disabled", "disabled");
                $(this).removeAttr("disabled", "disabled");
            }
        } else {
            $(".cargo-form-one input,select").removeAttr("disabled", "disabled");
            $(this).removeAttr("disabled", "disabled");
        }
    }
});

$(".cargo-form-one #countryId").on("change", function () {
    price.cargoSelectTown();
});

$("#SourceCityAndCounty").keyup(function (e) {
    if (e.which != 13) {
        $(this).attr("data-cityid", "0");
    }
    //var isNumeric = main.addressListing(e);
    //if (isNumeric == true) {
    //    var address = $(this).val();
    //    main.getGeoDistricts($('#ul-source-city-county'), address, price.variables.excludeCyprus);
    //}

    if ((e.keyCode >= 37 && e.keyCode <= 40) || e.keyCode == 13) {
        return;
    }

    main.getGeoDistricts($('#ul-source-city-county'), $(this).val(), price.variables.excludeCyprus);
    if ($(this).val().length < 3) {
        $('#ul-source-city-county').empty();
    }
});

$("#DestinationCityAndCounty").keyup(function (e) {
    if (e.which != 13) {
        $(this).attr("data-cityid", "0");
    }
    //var isNumeric = main.addressListing(e);
    //if (isNumeric == true) {
    //    var address = $(this).val();
    //    main.getGeoDistricts($('#ul-destination-city-county'), address, price.variables.excludeCyprus);
    //}

    if ((e.keyCode >= 37 && e.keyCode <= 40) || e.keyCode == 13) {
        return;
    }

    main.getGeoDistricts($('#ul-destination-city-county'), $(this).val(), price.variables.excludeCyprus);
    if ($(this).val().length < 3) {
        $('#ul-destination-city-county').empty();
    }
});

$('body').on('click', '#ul-destination-city-county li', function () {
    var cityId = $(this).attr('data-cityid');
    var countyId = $(this).attr('data-countyid');
    $("#DestinationCityAndCounty").val($(this).attr('data-text')).attr("data-cityid", cityId).attr("data-countyid", countyId);
    $('#ul-destination-city-county').empty();
});

$('body').on('click', '#ul-source-city-county li', function () {
    var cityId = $(this).attr('data-cityid');
    var countyId = $(this).attr('data-countyid');
    $("#SourceCityAndCounty").val($(this).attr('data-text')).attr("data-cityid", cityId).attr("data-countyid", countyId);
    $('#ul-source-city-county').empty();
});

$('#SourceCityAndCounty').on('focus', function () {

    $(this).closest("div.search-content").find(".searchContent .dropdown").show();

    document.addEventListener("keydown", price.keyDownSourceBranchSearchField, false);
});

$('#SourceCityAndCounty').on('focusout', function (e) {

    var a = $(this);
    setTimeout(function () {
        a.closest("div.search-content").find(".searchContent .dropdown").slideUp(400);
    }, 200);

    document.removeEventListener("keydown", price.keyDownSourceBranchSearchField, false);
    $("#ul-geo-search li").removeAttr("selected");

});

$('#DestinationCityAndCounty').on('focus', function () {

    $(this).closest("div.search-content").find(".searchContent .dropdown").show();

    document.addEventListener("keydown", price.keyDownDestinationBranchSearchField, false);
});

$('#DestinationCityAndCounty').on('focusout', function (e) {

    var a = $(this);
    setTimeout(function () {
        a.closest("div.search-content").find(".searchContent .dropdown").slideUp(400);
    }, 200);

    document.removeEventListener("keydown", price.keyDownDestinationBranchSearchField, false);
    $("#ul-geo-search li").removeAttr("selected");

});

$('body').on('click', '.title.all-radius', function () {
    if ($(this).closest('.item.disabled-module').length < 1) {
        $('.title.all-radius').removeClass("active");
        $(this).addClass("active");
        var contentId = $(this).closest('div[data-prodtype]').attr('data-prodtype');
        var tabContent = $('div[id*="_' + contentId + '"]');
        if (tabContent.hasClass('active') === false) {
            $('div.tab-content.clearfix').find('.tab-pane.active').removeClass('active');
            tabContent.addClass('active');
        }
        price.productTotalCalculate();
    } else {
        $(this).closest('.item').find('.price-module-title.center').html('<div><span class="price-mod first">--</span></div><div><span class="price-mod last">--</span> </div>');
    }
    price.hideServices();
});

$('.typeChoice > div').on('click', function (e) {
    var hasClass = $(this).hasClass('active');
    if (!hasClass) {
        $(".package-price-summary").css("display", "none");
        $(".opportunity").css("display", "none");
        $('.typeChoice > div').removeClass("active");
        $(".price-title,.price-detail").removeClass("active").slideUp(400);
        $(this).addClass("active");
        $(".package-price").addClass("active").slideDown(400);
        if ($(".typeChoice .last").hasClass("active")) {
            $(".typeChoiceTwo,.package-add-module-button").addClass("active").slideDown(400);
            price.variables.shipmentType = 2;
            $('.package-total-info-table').addClass('active-list');
            $("#btn-price-calculation").show();
            $(".complementary-products-tab").css('display', 'none');
            $(".package-add-module-button").trigger('click');
        } else {
            $(".package-add-module.active").remove();
            $(".price-title,.complementary-products-tab,.price-detail,.typeChoiceTwo,.package-add-module-button,.package-add-module").removeClass("active").slideUp(50);
            price.variables.shipmentType = 0;
            $('.package-total-info-table').removeClass('active-list');
            $("#btn-price-calculation").hide();
            price.calculatePrice();
        }
        price.packageTotalCalculate();
    }
});

$('body').on("keyup", 'input[data-package-type="package"]', function (e) {
    if ($(this).val().length <= 1 && $(this).val() < 1 && (e.which == 96 || e.which == 48)) {
        $(this).val(1);
    }
    price.packageTotalCalculate();
});

$('body').on("focusout", 'input[data-package-type="package"]', function (e) {
    if ($(this).val().length > 0) {
        $(this).closest('div').removeClass('is-empty error');
    }
    if ($(this).val() < 1 && $(this).val() != "") {
        $(this).val(1);
        $(this).closest('div').removeClass('is-empty error');
    }
    price.packageTotalCalculate();
});

$('body').on('change', '.package-item-detail input', function () {
    $(".price-title").removeClass("active").css("display", "none");
    $(".price-detail").removeClass("active").css("display", "none");
    $(".complementary-products-tab").hide().closest('.container-exp').css("display", "none");
});

$('body').on('click', '.package-add-module.active .package-item-title:not(:first)', function () {
    $(this).closest(".package-add-module.active").remove();
    $(".price-title").removeClass("active").css("display", "none");
    $(".price-detail").removeClass("active").css("display", "none");
    $(".complementary-products-tab").hide().closest('.container-exp').css("display", "none");
    price.packageTotalCalculate();
});