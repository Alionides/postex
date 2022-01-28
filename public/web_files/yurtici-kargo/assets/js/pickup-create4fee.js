var pickup = {
    variables: {
        addressId: 0,
        custId: 0,
        address: 0,
        interval: null,
        requestedPickupDate: null,
        pickupTaxNo: null,
        cargoType: null,
        otherTypeMandotary: null
    },

    postPickupSms: function (gsm, tck) {
        var model = {
            gsmNo: gsm,
            tckNo: tck
        };
        main.addButtonLoader($('#pickup-sms-button'));
        _serviceProvider.postPickupsms.post(model, main.variables.language)
            .done(function (response) {
                if (response && response.ErrorMessage === undefined) {
                    $(".passArea.all-radius").addClass("active-list");
                    $("#pickup-sms-button").css("display", "none");
                    pickup.timerStart();
                    $(".personInfoArea input").attr("readonly", "readonly");
                    $(".personInfoArea input[name=demand-type-id]").attr("disabled", "disabled");
                    $(".clarification-check").attr("disabled", "disabled");
                    $("#remember-storage").attr("disabled", "disabled");
                    main.moveView($("div.passArea"));
                    main.deleteButtonLoader($('#pickup-sms-button'));
                } else {
                    pickup.timerStop();
                    $("#pickup-sms-button").removeAttr("disabled");
                    $(".personInfoArea input").removeAttr("readonly", "readonly");
                    $(".personInfoArea input[name=demand-type-id]").removeAttr("disabled", "disabled");
                    $(".clarification-check").removeAttr("disabled", "disabled");
                    $("#remember-storage").removeAttr("disabled", "disabled");
                    main.deleteButtonLoader($('#pickup-sms-button'));
                    if (response.ErrorMessage !== undefined) {
                        main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                    } else {
                        main.loader(main.enums.loaderEnum.Error, Resource.SendValidationSmsUnexpectedError[main.variables.language]);
                    }
                }
            })
            .fail(function () {
                pickup.timerStop();
                main.loader(main.enums.loaderEnum.Error, Resource.SendValidationSmsUnexpectedError[main.variables.language]);
                $("#pickup-sms-button").removeAttr("disabled");
                $(".personInfoArea input").removeAttr("readonly", "readonly");
                $(".personInfoArea input[name=demand-type-id]").removeAttr("disabled", "disabled");
                $("#remember-storage").removeAttr("disabled", "disabled");
                main.deleteButtonLoader($('#pickup-sms-button'));
            });        
    },

    postPickupSmsVerify: function (gsm, tck, smsCode, nameSurname) {
        var model = {
            gsmNo: gsm,
            tckNo: tck,
            smsCode: smsCode,
            nameSurname: nameSurname
        };
        _serviceProvider.postPickupSmsVerify.post(model, main.variables.language)
            .done(function (response) {
                if (response.ErrorMessage !== undefined) {
                    main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                } else {
                    if (response == true) {
                        pickup.timerStop();
                        $(".passArea").removeClass("active-list").slideUp(400);
                        pickup.getPickupOrders(gsm, tck);
                        var data = JSON.stringify(model);
                        main.localStorageRemoveItem("Pickup-Requester");
                        if ($("#remember-storage").is(":checked")) {
                            main.localStorageSetItem("Pickup-Requester", data);
                        }
                    } else {
                        main.localStorageRemoveItem("Pickup-Requester");
                        main.loader(main.enums.loaderEnum.Error, Resource.GsmNoValidateUnexpectedError[main.variables.language]);
                    }
                }
            })
            .fail(function () {
                main.localStorageRemoveItem("Pickup-Requester");
                main.loader(main.enums.loaderEnum.Error, Resource.GsmNoValidateUnexpectedError[main.variables.language]);
            });
    },

    getPickupOrders: function (gsm, tck) {
        _serviceProvider.getPickupOrders.getDetail(main.variables.language, tck, gsm)
            .done(function (response) {
                if (response.ErrorMessage === undefined && response && response != "[]" && response.length > 0) {
                    $('.row.cargo-form-three').find('div.address-select-div').html('');
                    var exist = [];
                    $.each(response, function (index, item) {
                        var isExist = $.inArray(item.AddressId, exist);
                        if (isExist === -1) {
                            exist.push(item.AddressId);
                            var template =
                                "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>" +
                                "<div class='package-add pickup-address all-radius' data-address='" + item.FullAddressTxt + "' data-custId='" + item.CustId + "'  data-addressid='" + item.AddressId + "'>" +
                                "<i class='add'></i> " +
                                "<span><b>" + item.CustName + "</b><br>" + item.FullAddressTxt.toUpperCase() + "</span>" +
                                "</div>" +
                                "</div>";
                            $('.row.cargo-form-three').find('div.address-select-div').append(template);
                        }
                    });
                    var newAddress = "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>" +
                        "<div class='package-add pickup-address all-radius'>" +
                        "<i class='add'></i> " +
                        "<span data-custId='0'  data-addressid='0'>" + Resource.AddNewAddress[main.variables.language] + "</span>" +
                        "</div>" +
                        "</div>";

                    $('.row.cargo-form-three').addClass("active-list");
                    $('.row.cargo-form-three').find('div.address-select-div').append(newAddress);
                } else {
                    $(".row.request-type").addClass("active-list");
                    $(".row.sender-info").addClass("active-list");
                    pickup.selectRadios();
                    main.moveView($(".row.request-type"));
                }
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, Resource.GenericUnexpectedError[main.variables.language]);
                $(".row.request-type").addClass("active-list");
                $(".row.sender-info").addClass("active-list");
                pickup.selectRadios();
                main.moveView($(".row.request-type"));
            });
    },

    getGib: function (uniqueId) {
        delay(function () {
            _serviceProvider.getGib.getDetail(uniqueId, main.variables.language)
                .done(function (response) {
                    if (response && response.ErrorMessage === undefined) {
                        pickup.variables.pickupTaxNo = response.TaxNumber;
                        if (response.FullName != "") {
                            $("#input-name-surname").val(response.FullName).closest('.col-lg-6').css("display", "none");
                            $('#input-company-title').text(response.FullName).closest('div').removeClass('is-empty').closest('.col-lg-6').css("display", "block");
                        } else {
                            $("#input-name-surname").val('').closest('.col-lg-6').css("display", "block");
                            $('#input-company-title').text('').closest('div').addClass('is-empty').closest('.col-lg-6').css("display", "none");
                        }
                        if ($("input[name=personal-shipment-id]").is(":checked")) {
                            $('#input-company-title').siblings('.control-label').text(Resource.NameSurname[main.variables.language]);
                        } else {
                            $('#input-company-title').siblings('.control-label').text(Resource.CompanyTitle[main.variables.language]);
                        }
                        $('#input-tck-number').closest('div.form-group.label-floating').removeClass('error');
                    } else {
                        $('#input-company-title').text('').closest('div').addClass('is-empty');
                        $("#input-name-surname").val('').closest('div').addClass('is-empty');
                        if ($("input[name=personal-shipment-id]").is(":checked")) {
                            $("#input-name-surname").closest(".col-lg-6").css("display", "block");
                            $("#input-company-title").closest(".col-lg-6").css("display", "none");
                        } else {
                            $('#input-tck-number').closest('div.form-group.label-floating').addClass('error');
                            if (response.ErrorMessage !== undefined) {
                                main.loader(main.enums.loaderEnum.Error,
                                    response.ErrorMessage);
                            } else {
                                main.loader(main.enums.loaderEnum.Error,
                                    Resource.TaxPayerDetailUnexpectedError[main.variables.language]);
                            }
                        }
                    }
                })
                .fail(function () {
                    $('#input-tck-number').closest('div.form-group.label-floating').addClass('error');
                    $('#input-name-surname').val('').closest('div').addClass('is-empty');
                    $('#input-company-title').text('').closest('div').addClass('is-empty');
                    if ($("input[name=personal-shipment-id]").is(":checked")) {
                        $("#input-name-surname").closest(".col-lg-6").css("display", "block");
                        $("#input-company-title").closest(".col-lg-6").css("display", "none");
                    } else {
                        $('#input-tck-number').closest('div.form-group.label-floating').addClass('error');
                        main.loader(main.enums.loaderEnum.Error,
                            Resource.TaxPayerDetailUnexpectedError[main.variables.language]);
                    }
                });
            main.deleteButtonLoader($('#input-tck-number'), true);
        }, 1000);
    },

    timerStop: function () {
        clearInterval(pickup.variables.interval);
    },

    timerStart: function () {
        pickup.variables.interval = setInterval(function () {
            var timer = $(".time").text();
            timer = timer.split(":");
            var minutes = parseInt(timer[0], 10);
            var seconds = parseInt(timer[1], 10);
            seconds -= 1;
            if (minutes < 0) return pickup.timerStop();
            if (minutes < 10 && minutes.length !== 2) minutes = '0' + minutes;
            if (seconds < 0 && minutes !== 0) {
                minutes -= 1;
                seconds = 59;
            }
            else if (seconds < 10 && length.seconds != 2) seconds = '0' + seconds;
            $('.time').text(minutes + ':' + seconds);

            if (minutes == 0 && seconds == 0) {
                pickup.timerStop();
                main.loader(main.enums.loaderEnum.Error, Resource.SmsVerificationHasExpired[main.variables.language]);
                $('.passArea.all-radius').removeClass("active-list");
                $("#pickup-sms-button").css("display", "block");
                $('.time').text('03:00');
            }
        }, 1000);

    },

    getPickupPackage: function () {
        _serviceProvider.getPickupPackage.getDetail(main.variables.language)
            .done(function (response) {
                if (response && response.ErrorMessage === undefined) {
                    var sPackageIcon = '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewbox="0 0 32 32"> <g fill="none" fill-rule="evenodd" transform="translate(1 1)"> <rect width="30" height="30" stroke="#353535" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" rx="2"></rect> <path fill="#353535" d="M21.496 15.072c.21.044.378.2.282.296l-4.084 3.34c-.19.157-.169.21.017.386l5.044 4.757c.478.451.476 1.072-.025 1.382-.511.316-1.326.17-1.79-.31l-4.898-5.074c-.43-.442-.072-.728-.072-.728l5.054-3.933c.153-.119.263-.16.472-.116zm-3.67.591l-5.175 8.862c-.303.52-1.069.78-1.692.568-.615-.21-.818-.806-.497-1.287l5.715-8.505c.165-.245.653-.363 1.098-.268.449.097.699.377.55.63zm-9.31 9.471c-.267-.095-.345-.363-.179-.595l3.202-4.47c.264-.367 0-.693 0-.693L8.625 15.75c-.187-.232.025-.534.463-.676.432-.14.936-.078 1.135.142l2.954 3.284s.25.278 0 .647l-3.878 5.727a.714.714 0 0 1-.783.26z"></path> <path stroke="#353535" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.5 0v11.25L15 8.78l4.5 2.47V3.813M.75 8.25h6M20.25 8.25H30"></path> </g> </svg>';
                    var mPackageIcon = '<svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewbox="0 0 84 84"> <g fill="none" fill-rule="evenodd" transform="translate(2 2)"> <rect width="79.936" height="79.584" x=".433" stroke="#353535" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" rx="6"></rect> <path fill="#353535" d="M55.678 40.293c.55.113.996.51.743.755l-10.753 8.507c-.504.398-.446.534.043.982l13.28 12.114c1.259 1.149 1.255 2.73-.064 3.52-1.346.804-3.492.43-4.713-.792L41.317 52.458c-1.131-1.124-.19-1.853-.19-1.853L54.435 40.59c.402-.303.694-.408 1.244-.297zM46.013 41.8L32.389 64.366c-.798 1.325-2.816 1.99-4.455 1.448-1.62-.533-2.156-2.054-1.309-3.277l15.046-21.66c.436-.625 1.722-.926 2.893-.683 1.181.247 1.839.96 1.449 1.606zM21.5 65.919c-.703-.243-.908-.925-.47-1.516l8.43-11.383c.695-.935 0-1.766 0-1.766l-7.672-9.23c-.492-.593.064-1.362 1.217-1.723 1.138-.358 2.466-.198 2.99.363l7.777 8.361s.66.708 0 1.65l-10.21 14.584c-.426.604-1.351.902-2.062.66z"></path> <path stroke="#353535" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M28.32 1.592v27.61l12.03-6.496 12.032 6.496V5.701M1.434 22.667H20.8M53.793 22.667h25.103"></path> </g> </svg>';
                    var lPackageIcon = '<svg xmlns="http://www.w3.org/2000/svg" width="125" height="124" viewbox="0 0 125 124"> <g fill="none" fill-rule="evenodd" transform="translate(2 2)"> <rect width="119.411" height="119.048" x=".646" stroke="#353535" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" rx="6"></rect> <path fill="#353535" d="M83.173 60.274c.822.168 1.488.763 1.11 1.128L68.22 74.13c-.752.595-.666.799.066 1.468l19.837 18.12c1.881 1.72 1.876 4.086-.095 5.267-2.012 1.203-5.217.643-7.04-1.185L61.72 78.47c-1.69-1.682-.282-2.772-.282-2.772l19.876-14.981c.602-.454 1.037-.61 1.859-.444zm-14.438 2.253L48.384 96.284c-1.192 1.981-4.207 2.975-6.656 2.166-2.42-.797-3.22-3.072-1.954-4.902l22.476-32.4c.65-.936 2.571-1.386 4.32-1.022 1.765.369 2.748 1.436 2.165 2.401zm-36.618 36.08c-1.05-.363-1.357-1.384-.702-2.268l12.594-17.028c1.037-1.399 0-2.641 0-2.641L32.548 62.862c-.735-.886.096-2.037 1.818-2.577 1.7-.535 3.684-.296 4.466.543L50.45 73.336s.988 1.059 0 2.467L35.197 97.619c-.636.904-2.018 1.35-3.08.987z"></path> <path stroke="#353535" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M43.634 2.381v41.302l17.973-9.718 17.972 9.718V8.528M2.143 34.286H31.07M80.357 34.286h37.5"></path> </g> </svg>';
                    var message = '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 package-message" style="display: none;">' +
                        '<div class="form-group label-floating is-empty">' +
                        '<label class="control-label" for="message-description">' + Resource.Other[main.variables.language] + '</label>' +
                        '<textarea class="form-control all-radius description" id="message-description" maxlength="255" type="text"></textarea></div>' +
                        '</div>';


                    $('.col-lg-12.col-md-12.type-choice-wrap').html('');
                    $.each(response, function (index, item) {
                        var description = item.Description;
                        var packageType = item.PackageType;
                        var minWeight = item.MinWeight;
                        var maxWeight = item.MaxWeight;
                        var weightType = item.WeightType;
                        var maxLength = item.MaxLength;
                        var lengthType = item.LengthType;
                        var icon = '';
                        if (packageType === 'S') {
                            icon = sPackageIcon;
                        } else if (packageType === 'M') {
                            icon = mPackageIcon;
                        } else {
                            icon = lPackageIcon;
                        }

                        var template = '<div class="col-lg-4 col-md-4">' +
                            '<div class="center-colum" >' +
                            '<div class="center-bottom">' + icon + '</div>' +
                            '<p>' + Resource.PackageDimension[main.variables.language] + ': ' + packageType + '</p>' +
                            '<div class="typeChoiceNumber">' +
                            '<div class="amount">' +
                            '<input class="amount-input" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" data-max-weight="' + maxWeight + '" data-max-length="' + maxLength + '"  name="amount' + packageType + '" type="number" value="0" max="99" maxlength="2" minlength="1" /> ' +
                            '<input type="button" value="" class="amountPlus" /> ' +
                            '<input type="button" value="" class="amountMinus" /></div>' +
                            '</div>' +
                            '<div class="type-choice-info">' +
                            '<p><b>' + Resource.MaximumWeight[main.variables.language] + '</b> ' + minWeight + ' - ' + maxWeight + ' ' + weightType + ' <b>' + Resource.LongestSide[main.variables.language] + '</b> ' + Resource.LongestSide[main.variables.language] + ' ' + maxLength + ' ' + lengthType + '</p>' +
                            '<p>' + description + '</p>' +
                            '</div>' +
                            '</div >' +
                            '</div >';

                        $('.col-lg-12.col-md-12.type-choice-wrap').append(template);
                    });
                    $('.col-lg-12.col-md-12.type-choice-wrap').append(message);

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

    getGeoSearch: function (element, address) {
        var whiteSpaceCount = (address.split(" ").length - 1);
        if (address && (address.length > 4 && whiteSpaceCount == 0 || whiteSpaceCount > 0 && address.length - whiteSpaceCount > 2)) {
            delay(function () {
                _serviceProvider.getGeoSearch.getDetail(address, main.variables.addressCount, main.variables.language)
                    .done(function (response) {
                        if (response && response.ErrorMessage === undefined) {
                            $(element).empty();
                            $(response).each(function () {
                                $(element).append($('<li>',
                                    {
                                        html: this.HighlightAddressText,
                                        'data-text': this.DistrictName + " " + this.Name + " " + this.CountyName + " " + this.CityName,
                                        'data-cityid': this.CityId,
                                        'data-countyid': this.CountyId,
                                        'data-districtid': this.DistrictId,
                                        'data-id': this.Id,
                                        'data-city-name': this.CityName,
                                        'data-county-name': this.CountyName,
                                        'data-district-name': this.DistrictName,
                                        'data-name': this.Name,
                                        'data-main-type': this.MainType,
                                        'data-build-no-mandotary': this.BuildingNoIsMandatory
                                    }));
                            });
                        } else {
                            if (response.ErrorMessage !== undefined) {
                                main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                            }
                        }
                    })
                    .fail(function () {
                        main.loader(main.enums.loaderEnum.Error, Resource.AutoCompleteUnexpectedError[main.variables.language]);
                    });
            }, main.isMobile ? 500 : 300);

        } else {
            $(element).empty();
        }
    },

    addressGenerator: function () {
        var address = $("#input-address");
        var cityName = $(address).attr('data-city-name');
        var countyName = $(address).attr('data-county-name');
        var districtName = $(address).attr('data-district-name');
        var name = $(address).attr('data-name');
        var mainType = $(address).attr('data-main-type');
        var buildMandotary = $(address).attr('data-build-no-mandotary');

        var buildingNumber = $('#input-building-number').val();
        var floorNumber = $('#input-floor-number').val();
        var flatNumber = $('#input-flat-number').val();
        var apartment = $('#input-apartment-number').val();
        var addressTemplate = "";
        $(".sender-address-detail .error").removeClass("error");

        if (buildingNumber != null && buildingNumber != "") {
            buildingNumber = " No: " + buildingNumber;
        }
        if (floorNumber != null && floorNumber != "") {
            floorNumber = " K: " + floorNumber;
        }
        if (flatNumber != null && flatNumber != "") {
            flatNumber = " D: " + flatNumber;
        }

        if (apartment != "" && !apartment.match("apartmanı$") && !apartment.match("Apartmanı$") && !apartment.match("Apt$") && !apartment.match("apt$") && !apartment.match("Apt.$") && !apartment.match("apt.$") && !apartment.match("sitesi$") && !apartment.match("Sitesi$") && !apartment.match("evleri$") && !apartment.match("Evleri$")) {
            apartment += " Apt.";
        }

        if (mainType === "1") {
            addressTemplate = districtName + " " + name + " " + apartment + buildingNumber + floorNumber + flatNumber + " " + countyName + "/" + cityName;

        } else if (mainType === "2") {
            addressTemplate = districtName + " " + apartment + buildingNumber + floorNumber + flatNumber + " " + countyName + "/" + cityName;
        } else if (mainType === "5") {
            addressTemplate = districtName + " " + name + " " + apartment + buildingNumber + floorNumber + flatNumber + " " + countyName + "/" + cityName;
        }

        if (buildMandotary) {
            $('#input-building-number').attr("data-validate-type", "required");
        } else if (mainType === "5") {
            $('#input-building-number').removeAttr("data-validate-type", "required");
            $('#input-apartment-number').removeAttr("data-validate-type", "required");
        } else {
            pickup.otherTypeMandotary = true;
            $('#input-building-number').attr("data-validate-type", "required");
            $('#input-apartment-number').attr("data-validate-type", "required");
        }

        $('#address-readonly').text(addressTemplate);
        apartment = "";
    },

    findWorkArea: function (address) {
        main.addButtonLoader($('#address-button'));
        _serviceProvider.getGeoFindWorkArea.getDetail(address, 1, main.variables.language)
            .done(function (response) {
                main.deleteButtonLoader($('#address-button'));
                if (response && response.ErrorMessage === undefined) {
                    pickup.getPickupWorkingDays(response.WorkareaId);
                } else {
                    $('#address-button').css('display', 'block');
                    $(".request-type input").removeAttr("disabled", "disabled");
                    $(".sender-info input").removeAttr("readonly", "readonly");
                    $(".sender-info input[name=shipment-type-id]").removeAttr("disabled", "disabled");
                    if (response.ErrorMessage !== undefined) {
                        main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                    } else {
                        main.loader(main.enums.loaderEnum.Error, Resource.VerifyAddressUnexpectedError[main.variables.language]);
                    }
                }
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, Resource.VerifyAddressUnexpectedError[main.variables.language]);
            });
    },

    getPickupWorkingDays: function (workAreaId) {
        _serviceProvider.getPickupWorkingDays.getDetail(workAreaId, main.variables.language)
            .done(function (response) {
                if (response && response.ErrorMessage === undefined) {
                    $('.owl-carousel.owl-theme').html('');
                    if (response.NextPickupDate) {
                        if (main.variables.language === "tr") {
                            main.loader(main.enums.loaderEnum.Error, "Girmiş olduğunuz adres için alım yapılabilecek en yakın tarih " + response.NextPickupDate + "'dir.");
                        } else {
                            main.loader(main.enums.loaderEnum.Error, "No service available on selected dates.Nearest pick up date " + response.NextPickupDate);
                        }
                        $("#address-button").show();
                        $(".request-type input").removeAttr("disabled", "disabled");
                        $(".sender-info input").removeAttr("readonly", "readonly");
                        $(".sender-info input[name=shipment-type-id]").removeAttr("disabled", "disabled");
                    } else {
                        $.each(response.PickupDays, function (index, item) {
                            var date = item.Date;
                            var dateTime = item.DateTime;
                            var pickupAllowed = item.PickupAllowed;
                            var reasonCode = item.ReasonCode;
                            var disabledClass = "";
                            if (!pickupAllowed) {
                                disabledClass = "disabled-module";
                            }
                            var reasonMessage = "";
                            if (reasonCode === "01") {
                                reasonMessage = Resource.Holiday[main.variables.language];
                            } else if (reasonCode === "02") {
                                reasonMessage = Resource.ObtainingSpecificDays[main.variables.language];
                            } else if (reasonCode === "03") {
                                reasonMessage = Resource.ReceptionTimeExceeded[main.variables.language];
                            } else if (reasonCode === "04") {
                                reasonMessage = Resource.BadWeatherConditions[main.variables.language];
                            } else if (reasonCode === "05") {
                                reasonMessage = Resource.SocialEvents[main.variables.language];
                            } else if (reasonCode === "06") {
                                reasonMessage = Resource.BranchOutOfService[main.variables.language];
                            } else {
                                reasonMessage = Resource.PickUpIsAllowedForTheSelectedDay[main.variables.language];
                            }

                            var template =
                                "<div class='item " + disabledClass + "' data-date='" + date + "' data-reasonCode='" + reasonCode + "'>" +
                                "<a href data-toggle='tab'>" +
                                "<div class='title all-radius'> " +
                                "<span>" + dateTime + "</span>" +
                                "</div>" +
                                "</a>" +
                                "<div class='info-popup'>" + reasonMessage + "</div></div>";
                            $('.owl-carousel.owl-theme').append(template);
                            pickup.packageTabOwlCarousel();
                            $('.row.package-info').addClass('active-list');
                            main.moveView($('.row.package-info'));
                        });
                    }

                } else {
                    $("#address-button").show();
                    $(".request-type input").removeAttr("disabled", "disabled");
                    $(".sender-info input").removeAttr("readonly", "readonly");
                    $(".sender-info input[name=shipment-type-id]").removeAttr("disabled", "disabled");
                    if (response.ErrorMessage !== undefined) {
                        main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                    }
                }
            })
            .fail(function () {
                $("#address-button").show();
                main.loader(main.enums.loaderEnum.Error, Resource.PickupDaysByWorkAreaUnexpectedError[main.variables.language]);
            });
    },

    packageTabOwlCarousel: function () {
        if ($('.package-date > div').data('owl.carousel') !== undefined) {
            $('.package-date >div').owlCarousel({ touchDrag: true, mouseDrag: false });
            $('.package-date >div').data('owl.carousel').destroy();
        }
        $(".package-date .owl-carousel").owlCarousel({
            loop: false,
            navText: [
                '<img src="/web_files/yurtici-kargo/assets/img/left-arrow.svg" alt="" width="9" height="15" />',
                '<img src="/web_files/yurtici-kargo/assets/img/right-arrow.svg" alt="" width="9" height="15" />'
            ],
            nav: true,
            dots: false,
            mouseDrag: false,
            responsive: {
                0: {
                    items: 1,
                    margin: 40
                },
                767: {
                    items: 2,
                    margin: 10
                }
            }
        });
    },

    postPickupCreate: function () {
        var model = [],
            refId = pickup.newGuid(),
            callerGsm = $('#input-gsm-number').val(),
            callerName = $('#input-name-surname').val(),
            callerType = 0,
            callerUniqueId = $('#input-tck-number').val(),
            cargoCount = 1,
            cargoDesi = null,
            cargoKg = null,
            cargoType = pickup.variables.cargoType,
            message = $('#message-description').val(),
            pickupAddressId = pickup.variables.addressId,
            pickupAddressText = $('#address-readonly').text(),
            pickupCustCityId = $('#input-address').attr('data-cityid'),
            pickupCustEmail = $('#input-email').val(),
            pickupCustGsm = $('#input-gsm-number').val(),
            pickupCustId = pickup.variables.custId,
            pickupCustName = $('#input-name-surname').val(),
            pickupCustTel = $('#input-phone-number').val(),
            pickupCustTownName = $('#input-address').attr('data-county-name'),
            pickupCustTrNo = $('#input-tck-number').val(),
            pickupTaxNo = pickup.variables.pickupTaxNo,
            requestedPickupDate = pickup.variables.requestedPickupDate;
        if ($('#input-name-surname').val() == "") {
            callerName = $('#input-company-title').text();
        }
        if ($('#input-tck-number').val() == "") {

            callerGsm = $('#gsm-number').val();
            callerName = $('#name-surname').val();
            callerUniqueId = $('#tck-number').val();
            pickupCustName = $('#name-surname').val();
        }
        if (pickup.variables.cargoType == 0) {
            cargoCount = 1;
            cargoKg = 0;
        } else {
            var amounts = $('input[name="amountS"]').val();
            var amountsMaxWeight = $('input[name="amountS"]').attr('data-max-weight');
            var amountsMaxLength = $('input[name="amountS"]').attr('data-max-length');

            var amountm = $('input[name="amountM"]').val();
            var amountmMaxWeight = $('input[name="amountM"]').attr('data-max-weight');
            var amountmMaxLength = $('input[name="amountM"]').attr('data-max-length');

            var amountl = $('input[name="amountL"]').val();
            var amountlMaxWeight = $('input[name="amountL"]').attr('data-max-weight');
            var amountlMaxLength = $('input[name="amountL"]').attr('data-max-length');
            cargoKg = (amounts * amountsMaxWeight) + (amountm * amountmMaxWeight) + (amountl * amountlMaxWeight);
            cargoDesi = ((amounts * (amountsMaxLength * amountsMaxLength * amountsMaxLength / 3000)) + (amountm * (amountmMaxLength * amountmMaxLength * amountmMaxLength / 3000) + (amountl * (amountlMaxLength * amountlMaxLength * amountlMaxLength / 3000))));
            cargoCount = (parseInt(amounts) + parseInt(amountm) + parseInt(amountl));
        }

        if (pickup.variables.custId != null && pickup.variables.custId != 0 && pickup.variables.addressId != null && pickup.variables.addressId != 0) {
            model = {
                "refId": refId,
                "callerGsm": callerGsm,
                "callerName": callerName,
                "callerType": callerType,
                "callerUniqueId": callerUniqueId,
                "cargoCount": cargoCount,
                "cargoDesi": cargoDesi,
                "cargoKg": cargoKg,
                "cargoType": cargoType,
                "message": message,
                "pickupAddressId": pickupAddressId,
                "pickupCustId": pickupCustId,
                "requestedPickupDate": requestedPickupDate
            }
        } else {
            model = {
                "refId": refId,
                "callerGsm": callerGsm,
                "callerName": callerName,
                "callerType": callerType,
                "callerUniqueId": callerUniqueId,
                "cargoCount": cargoCount,
                "cargoDesi": cargoDesi,
                "cargoKg": cargoKg,
                "cargoType": cargoType,
                "message": message,
                "pickupAddressText": pickupAddressText,
                "pickupCustCityId": pickupCustCityId,
                "pickupCustEmail": pickupCustEmail,
                "pickupCustGsm": pickupCustGsm,
                "pickupCustName": pickupCustName,
                "pickupCustTel": pickupCustTel,
                "pickupCustTownName": pickupCustTownName,
                "pickupCustTrNo": pickupCustTrNo,
                "pickupTaxNo": pickupTaxNo,
                "requestedPickupDate": requestedPickupDate
            }
        }
        main.addButtonLoader($('#post-pickup-create-button'));
        _serviceProvider.postPickupCreate.post(model, main.variables.language)
            .done(function (response) {
                main.deleteButtonLoader($('#post-pickup-create-button'));
                if (response && response.ErrorMessage === undefined) {
                    if (main.variables.language == "tr") {
                        main.loader(main.enums.loaderEnum.Success, '"' + response + '"no’lu adres alım numarası ile talebiniz alınmıştır.Belirtmiş olduğunuz tarihte gönderi alımı için kuryemiz gelecektir.', Resource.BackToHome[main.variables.language], "/tr");
                    } else {
                        main.loader(main.enums.loaderEnum.Success, 'Your request (pick up number: "' + response + '") has been received. We will send our courier on the date selected.', Resource.BackToHome[main.variables.language], "/en");
                    }
                } else {
                    $("#post-pickup-create-button").removeAttr("disabled");
                    if (response.ErrorMessage !== undefined) {
                        main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                    } else {
                        main.loader(main.enums.loaderEnum.Error, Resource.PickupOrderCreateUnexpectedError[main.variables.language]);
                    }
                }
            })
            .fail(function () {
                $("#post-pickup-create-button").removeAttr("disabled");
                main.loader(main.enums.loaderEnum.Error, Resource.PickupOrderCreateUnexpectedError[main.variables.language]);
            });
    },

    newGuid: function () {
        return Math.floor(Math.random() * 10000000000000001);
    },

    keyDownBranchSearchField: function (e) {
        var keyCode = e.keyCode;

        var alreadySelectedItem = $("#ul-geo-search li[selected]");

        if (keyCode == 40) {
            if (alreadySelectedItem) {
                pickup.moveSelectedBranchSearchItem(alreadySelectedItem, "next");
            }
            else {
                pickup.moveSelectedBranchSearchItem(null, "next");
            }
        }
        else if (keyCode == 38) {

            if (alreadySelectedItem) {
                pickup.moveSelectedBranchSearchItem(alreadySelectedItem, "prev");
            }
            else {
                pickup.moveSelectedBranchSearchItem(null, "prev");
            }
        }
        else if (keyCode == 13) {
            e.preventDefault();

            if (alreadySelectedItem && alreadySelectedItem.length > 0) {
                pickup.getAddressFromSelected(alreadySelectedItem);
            }
        }
    },

    moveSelectedBranchSearchItem: function (startPoint, traversal) {

        $("#ul-geo-search li").removeAttr("selected");
        $("#ul-geo-search li").removeClass("selected-light-gray");

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
                var itemBranchSearch = $("#ul-geo-search li");
                itemBranchSearch.first().attr("selected", true);
                itemBranchSearch.first().addClass("selected-light-gray");
            }

        }
    },

    getAddressFromSelected: function (element) {
        var cityId = element.attr('data-cityid');
        var countyId = element.attr('data-countyid');
        var id = element.attr('data-id');
        var districtid = element.attr('data-districtid');
        var cityName = element.attr('data-city-name');
        var countyName = element.attr('data-county-name');
        var districtName = element.attr('data-district-name');
        var name = element.attr('data-name');
        var mainType = element.attr('data-main-type');

        $("#input-address").val(element.attr('data-text'))
            .attr("data-cityid", cityId)
            .attr("data-countyid", countyId)
            .attr("data-districtid", districtid)
            .attr("data-city-name", cityName)
            .attr("data-county-name", countyName)
            .attr("data-district-name", districtName)
            .attr("data-name", name)
            .attr("data-id", id)
            .attr("data-main-type", mainType);

        $('#ul-geo-search').empty();
        pickup.addressGenerator();
    },

    getRequestSelectedType: function (value) {
        if (value == 1) {
            $("input[type=text]").filter(function () {
                return this.value;
            }).closest(".form-group").removeClass("is-empty");

            $("input[type=number]").filter(function () {
                return this.value;
            }).closest(".form-group").removeClass("is-empty");
        }
        else {
            $("input[type=text]").filter(function () {
                return !this.value;
            }).closest(".form-group").addClass("is-empty");

            $("input[type=number]").filter(function () {
                return !this.value;
            }).closest(".form-group").addClass("is-empty");
        }
    },

    selectRadios: function () {
        var model = JSON.parse(main.localStorageGetItem("Pickup-Requester"));
        if (model == null) {
            model = {
                "tckNo": $("#tck-number").val(),
                "gsmNo": $("#gsm-number").val(),
                "nameSurname": $("#name-surname").val()
            }
        }
        $('input[type=radio][name=demand-type-id]:first').prop("checked", true);
        pickup.demandTypeChange(model, $('input[type=radio][name=demand-type-id]:first'));

        $('input[type=radio][name=shipment-type-id]:first').prop("checked", true);
        pickup.shipmentTypeChange(model, $('input[type=radio][name=shipment-type-id]:first'));
    },

    demandTypeChange: function (model, element) {

        $('input[type=radio][name=shipment-type-id]:first').prop("checked", true);
        pickup.shipmentTypeChange(model, $('input[type=radio][name=shipment-type-id]:first'));
        if (element.val() == '1') {
            $('#input-name-surname').val(model.nameSurname).closest(".form-group").removeClass("error");
            $('#input-tck-number').val(model.tckNo).closest(".form-group").removeClass("error");
            $('#input-gsm-number').val(model.gsmNo).closest(".form-group").removeClass("error");
        }
        else if (element.val() == '2') {
            $('#input-name-surname').val("").closest(".form-group").removeClass("error");
            $('#input-tck-number').val("").closest(".form-group").removeClass("error");
            $('#input-gsm-number').val("").closest(".form-group").removeClass("error");
        }
        pickup.getRequestSelectedType(element.val());
    },

    shipmentTypeChange: function (model, element) {

        if (element.val() == '1') {
            $('#input-tck-number').attr("minlength", "11").attr("maxlength", "11").closest(".form-group").find(".control-label").text(Resource.RequesterTck[main.variables.language]);
            $('#input-name-surname').closest(".form-group").find(".control-label").text(Resource.NameSurname[main.variables.language]).closest(".col-lg-6").show();
            $('#input-company-title').text('').closest("div").addClass("is-empty").closest(".col-lg-6").hide();

            $('input[type=checkbox][name=personal-shipment-id]').attr("disabled", "disabled");
            $("input[name=personal-shipment-id]").prop('checked', false);

            if ($("input[name=demand-type-id]:checked").val() == '1') {
                $('#input-tck-number').val(model.tckNo).closest(".form-group").removeClass("is-empty error");
                $('#input-name-surname').val(model.nameSurname).closest(".form-group").removeClass("is-empty error");

            } else {
                $('#input-tck-number').val('').closest(".form-group").addClass("is-empty");
                $('#input-name-surname').val('').closest(".form-group").addClass("is-empty");
            }
        }
        else if (element.val() == '2') {
            $('#input-tck-number').attr("minlength", "10").attr("maxlength", "10").val('').closest(".form-group").addClass("is-empty").find(".control-label").text(Resource.RequesterTaxNumber[main.variables.language]);
            $('#input-name-surname').closest(".form-group").addClass("is-empty").closest(".col-lg-6").hide();
            $('#input-company-title').closest(".col-lg-6").show();

            $('input[type=checkbox][name=personal-shipment-id]').removeAttr("disabled", "disabled");
            $("input[name=personal-shipment-id]").on("change", function () {
                if ($("input[name=personal-shipment-id]").is(":checked")) {
                    if ($("input[name=demand-type-id]:checked").val() == '1') {
                        $('#input-tck-number').val(model.tckNo).closest(".form-group").removeClass("is-empty");
                        $('#input-name-surname').val(model.nameSurname).closest(".form-group").removeClass("is-empty");
                    } else {
                        $('#input-tck-number').val('').closest(".form-group").addClass("is-empty");
                        $('#input-name-surname').val('').closest(".form-group").addClass("is-empty");
                    }
                    $('#input-tck-number').closest(".form-group").find(".control-label").text(Resource.RequesterTck[main.variables.language]);
                    $('#input-tck-number').attr("minlength", "11").attr("maxlength", "11");
                    $('#input-name-surname').closest(".form-group").find(".control-label").text(Resource.NameSurname[main.variables.language]).closest(".col-lg-6").css("display", "block");
                    $('#input-company-title').text('').closest(".form-group").addClass("is-empty").closest(".col-lg-6").css("display", "none");
                }
                else {
                    $('#input-tck-number').closest(".form-group").find(".control-label").text(Resource.RequesterTaxNumber[main.variables.language]);
                    $('#input-tck-number').attr("minlength", "10").attr("maxlength", "10").val('').closest(".form-group").addClass("is-empty");
                    $('#input-name-surname').val('').closest(".form-group").addClass("is-empty").closest(".col-lg-6").css("display", "none");
                    $('#input-company-title').text('').siblings('.control-label').text(Resource.CompanyTitle[main.variables.language]).closest(".form-group").addClass("is-empty").closest(".col-lg-6").css("display", "block");
                }
                $('#input-tck-number').closest(".form-group").removeClass("error");
                $('#input-name-surname').closest(".form-group").removeClass("error");
            });
        }
        $('#input-gsm-number').val(model.gsmNo).closest(".form-group").removeClass("is-empty error");
        $('#input-tck-number').closest(".form-group").removeClass("error");
        $('#input-name-surname').closest(".form-group").removeClass("error");
    }
};

$(function () {
    var model = JSON.parse(main.localStorageGetItem("Pickup-Requester"));
    if (model != null) {
        $('#name-surname').val(model.nameSurname).attr("readonly", "readonly").closest('div').removeClass("is-empty");
        $('#gsm-number').val(model.gsmNo).attr("readonly", "readonly").closest('div').removeClass("is-empty");
        $('#tck-number').val(model.tckNo).attr("readonly", "readonly").closest('div').removeClass("is-empty");

        $('#storage-delete').closest(".col-lg-6").show();
        $('#remember-storage').closest(".col-lg-6").hide();
        if (main.variables.language == "tr") {
            $('#storage-delete').closest('label').append(model.nameSurname + " Değilim");
        } else {
            $('#storage-delete').closest('label').append("I am not " + model.nameSurname);
        }
    } else {
        $('#storage-delete').closest(".col-lg-6").hide();
        $('#remember-storage').closest(".col-lg-6").show();
    }
});

$("#pickup-sms-button").click(function () {
    $('input[data-validate-type=name-surname]').val($('input[data-validate-type=name-surname]').val().trim());

    if ($(".personInfoArea .error").length == 0) {
        main.validateInput(false);

        if ($(".clarification-check").prop("checked") != true) {
            $(".clarification-check").closest('div.form-group').addClass("error");
            $(".checkboxkmark").css("border", "solid 1px red");
        } else {
            $(".clarification-check").closest('div.form-group').removeClass("error");
            $(".checkboxkmark").css("border", "solid 1px gray");
        }

        var unvalidateInputs = $(".personInfoArea .error"),
            gsm = $('#gsm-number').val(),
            tck = $('#tck-number').val();
        if (main.localStorageGetItem("Pickup-Requester") != null) {
            if ($('#storage-delete').prop("checked")) {
                if (unvalidateInputs.length == 0) {
                    pickup.postPickupSms(gsm, tck);
                }
            } else {
                $("#pickup-sms-button").hide();
                pickup.getPickupOrders(gsm, tck);
                $(".personInfoArea input").attr("readonly", "readonly");
                $(".personInfoArea input[name=demand-type-id]").attr("disabled", "disabled");
                $(".clarification-check").attr("disabled", "disabled");
                $("#remember-storage").attr("disabled", "disabled");
                $(".container-small .error").removeClass("error");
            }
        } else {
            if (unvalidateInputs.length == 0) {
                pickup.postPickupSms(gsm, tck);
                $(".container-small .error").removeClass("error");
            }
        }
    } else {
        main.loader(main.enums.loaderEnum.Error, Resource.PleaseEnterValidInformation[main.variables.language]);
    }

});

$('#tck-number').on('keyup focus blur load', function (event) {
    event.preventDefault();
    var isValid = main.checkTcNum($(this).val());
    if (isValid) {
        $(this).closest('div.form-group.label-floating').removeClass('error');
    }
    else {
        $(this).closest('div.form-group.label-floating').addClass('error');
    }
});

$("#input-address").keyup(function (e) {
    //var isNumeric = main.addressListing(e);
    //if (isNumeric == true) {
    //    var address = $(this).val();
    //    pickup.getGeoSearch($('#ul-geo-search'), address);
    //}

    if ((e.keyCode >= 37 && e.keyCode <= 40) || e.keyCode == 13) {
        return;
    }

    pickup.getGeoSearch($('#ul-geo-search'), $(this).val());
    if ($(this).val().length < 3) {
        $('#ul-geo-search').empty();
    }
});

$('body').on('click', '#ul-geo-search li', function () {
    pickup.getAddressFromSelected($(this));
});

$("#pickup-sms-verify-button").click(function () {
    var gsm = $('#gsm-number').val();
    var tck = $('#tck-number').val();
    var smsCode = $('#sms-code').val();
    var nameSurname = $('#name-surname').val();
    if (smsCode != "") {
        pickup.postPickupSmsVerify(gsm, tck, smsCode, nameSurname);
        $(".container-small .error").removeClass("error");
    }
});

$("#address-button").click(function () {
    if ($('#input-building-number').val().length > 0 || $('#input-apartment-number').val().length > 0 && pickup.otherTypeMandotary) {
        $('#input-building-number').removeAttr("data-validate-type", "required");
        $('#input-apartment-number').removeAttr("data-validate-type", "required");
    }
    if ($("#input-phone-number").val() != "") {
        $("#input-gsm-number").removeAttr("data-validate-type");
    } else {
        $("#input-gsm-number").attr("data-validate-type", "required");
    }
    main.validateInput(false);
    if (!main.checkIsEmail($("#input-email"))) {
        $("#input-email").closest(".form-group").addClass("error");
    }
    if ($('#input-name-surname').val() == "") {
        $('#input-tck-number').closest('div.form-group.label-floating').addClass('error');
    }
    var unvalidateInputs = $(".sender-info .error");
    if (unvalidateInputs.length == 0) {
        var address = $('#address-readonly').text();
        if (address == "") {
            $("#input-address").closest('.form-group').addClass("error");
        } else {
            pickup.findWorkArea(address);
            pickup.getPickupPackage();
            $('#address-button').css('display', 'none');
            $(".request-type input").attr("disabled", "disabled");
            $(".sender-info input").attr("readonly", "readonly");
            $(".sender-info input[name=shipment-type-id]").attr("disabled", "disabled");
        }
    }
});

$("#post-pickup-create-button").click(function () {
    $(".error").removeClass("error");
    if ($(".pickup-crate").find(".pickup-package").hasClass("active")) {
        if ($("input[name=amountS]").val() != 0 || $("input[name=amountM]").val() != 0 || $("input[name=amountL]").val() != 0) {
            $("#message-description").removeAttr("data-validate-type");
        } else {
            $("#message-description").attr("data-validate-type", "required");
        }
    }
    main.validateInput(false);
    var unvalidateInputs = $(".package-info .active-list .error");
    if ($(".package-date .owl-item a div").hasClass("active")) {
        if (unvalidateInputs.length == 0) {
            pickup.postPickupCreate();
            $(this).attr("disabled", "disabled");
        }
    } else {
        main.loader(main.enums.loaderEnum.Error, Resource.PleaseSelectADate[main.variables.language]);
    }
});

$('input[type=radio][name=demand-type-id]').change(function () {

    var model = JSON.parse(main.localStorageGetItem("Pickup-Requester"));
    if (model == null) {
        model = {
            "tckNo": $("#tck-number").val(),
            "gsmNo": $("#gsm-number").val(),
            "nameSurname": $("#name-surname").val()
        }
    }
    pickup.demandTypeChange(model, $(this));
});

$('#storage-delete').change(function () {
    if ($(this).prop("checked")) {
        $('#name-surname').val('').removeAttr("readonly", "readonly").closest('div').addClass("is-empty");
        $('#gsm-number').val('').removeAttr("readonly", "readonly").closest('div').addClass("is-empty");
        $('#tck-number').val('').removeAttr("readonly", "readonly").closest('div').addClass("is-empty");
        $(this).closest('.col-lg-6').css("display", "none");
        main.localStorageRemoveItem("Pickup-Requester");
        $("#remember-storage").closest('.col-lg-6').css("display", "block");
    } else {
        var model = JSON.parse(main.localStorageGetItem("Pickup-Requester"));
        $(".personInfoArea .error").removeClass("error");
        $('#name-surname').val(model.nameSurname).attr("readonly", "readonly").closest('div').removeClass("is-empty");
        $('#gsm-number').val(model.gsmNo).attr("readonly", "readonly").closest('div').removeClass("is-empty");
        $('#tck-number').val(model.tckNo).attr("readonly", "readonly").closest('div').removeClass("is-empty");
    }
});

$('input[type=radio][name=shipment-type-id]').change(function () {

    var model = JSON.parse(main.localStorageGetItem("Pickup-Requester"));
    if (model == null) {
        model = {
            "tckNo": $("#tck-number").val(),
            "gsmNo": $("#gsm-number").val(),
            "nameSurname": $("#name-surname").val()
        }
    }
    pickup.shipmentTypeChange(model, $(this));
});

$('#input-building-number, #input-floor-number, #input-floor-number, #input-apartment-number').on('keyup focus blur load', function (event) {
    event.preventDefault();
    pickup.addressGenerator();
});

$('body').on('click', '.package-add.pickup-address', function () {
    pickup.variables.custId = $(this).attr('data-custId');
    pickup.variables.addressId = $(this).attr('data-addressid');
    pickup.variables.address = $(this).attr('data-address');
    if ($(this).hasClass('active') === false) {
        $(this).closest('div.address-select-div').find('div.active').removeClass('active');
        $(this).addClass('active');
    }
});

$("#pickup-address-select-button").click(function () {
    if ($('.package-add.pickup-address').closest('div.address-select-div').find('div.active').length > 0) {
        if (pickup.variables.addressId === undefined && pickup.variables.custId === undefined && pickup.variables.address === undefined) {
            $(".row.request-type").addClass("active-list");
            $(".row.sender-info").addClass("active-list");
            main.moveView($(".row.request-type"));
            pickup.selectRadios();
        } else {
            pickup.findWorkArea(pickup.variables.address);
            pickup.getPickupPackage();
            $(".row.package-info").addClass("active-list");
        }
        $(".error").removeClass("error");
        $("#pickup-address-select-button").css("display", "none");
    } else {
        main.loader(main.enums.loaderEnum.Error, Resource.PleaseSelect[main.variables.language]);
    }
});

$('body').on('click', '.title.all-radius', function () {
    $('.title.all-radius').removeClass("active");
    if ($(this).closest('.item.disabled-module').length < 1) {
        $(this).addClass("active");
        pickup.variables.requestedPickupDate = $(this).closest('.item').attr('data-date');
    }
});

$('.typeChoice.pickup-crate > div:not(.type-choice-wrap):not(.package-message)').click(function (e) {
    var hasClass = $(this).hasClass('active');
    $("#post-pickup-create-button").css("display", "block");
    if (!hasClass) {
        $('.typeChoice.pickup-crate > div').removeClass("active");
        $(this).addClass("active");
        if ($(".typeChoice .last").hasClass("active")) {
            pickup.variables.cargoType = 1;
            $('.col-lg-12.col-md-12.type-choice-wrap').addClass("active-list");
            $(".package-message").css("display", "block");
        } else {
            pickup.variables.cargoType = 0;
            $('.col-lg-12.col-md-12.type-choice-wrap').removeClass("active-list");
            $(".package-message").css("display", "none");
        }
    }
});

$('#input-tck-number').on('keyup', function () {

    var value = $('input[name="shipment-type-id"]:checked').val();
    if (value == 1) {
        var isValid = main.checkTcNum($(this).val());
        if (isValid) {
            $('#input-tck-number').closest('div.form-group.label-floating').removeClass('error');
        }
        else {
            $('#input-tck-number').closest('div.form-group.label-floating').addClass('error');
        }
    } else {
        if ($("input[name=personal-shipment-id]").is(":checked")) {
            if ($(this).val().length === 11) {
                var tcIsValid = main.checkTcNum($(this).val());
                if (tcIsValid) {
                    pickup.getGib($(this).val());
                    main.addButtonLoader($(this), true);
                } else {
                    $('#input-tck-number').closest('div.form-group.label-floating').addClass('error');
                }
            } else {
                $('#input-tck-number').closest('div.form-group.label-floating').addClass('error');
            }
        } else {
            if ($(this).val().length === 10) {
                pickup.getGib($(this).val());
                main.addButtonLoader($(this), true);
            } else {
                $('#input-tck-number').closest('div.form-group.label-floating').addClass('error');
            }
        }
    }
});

$('#input-address').on('focus', function () {

    $(this).closest("div.search-content").find(".searchContent .dropdown").show();

    document.addEventListener("keydown", pickup.keyDownBranchSearchField, false);
});

$('#input-address').on('focusout', function (e) {

    var a = $(this);
    setTimeout(function () {
        a.closest("div.search-content").find(".searchContent .dropdown").slideUp(400);
    }, 200);

    document.removeEventListener("keydown", pickup.keyDownBranchSearchField, false);
    $("#ul-geo-search li").removeAttr("selected");

});

$('body').on('focus', '#message-description', function () {
    $(this).closest('div').removeClass("is-empty");
});

$('body').on('focusout', '#message-description', function () {
    if ($(this).val() == "") {
        $(this).closest('div').addClass("is-empty");
    } else {
        $(this).closest('div').removeClass("error");
    }
});

$("input:not([type=email])").on('focusout', function () {
    $(this).closest("div").removeClass("error");
});

$(".clarification-check").on('change', function () {
    if ($(this).prop("checked") == true) {
        $(".clarification-check").closest('div.form-group').removeClass("error");
        $(".checkboxkmark").css("border", "solid 1px gray");
    }
});
