var address = {
    variables: {
        AdressFunction: 2,
        SearchType: 1,
        DistinctPoint: null,
        StreetName: null,
        CountyId: null,
        CityId: null,
        DistrictName: null,
        IsUpdate: false,
        IsAddressSearch: false,

        CountyName: null,
        CityName: null,
        FullAddressText: null,
        DistrictId: null,
        MainType: null,
        BuildingNoIsMandatory: null,
        Id: null,
        Name: null,
        map: null,
        marker: null
    },

    addressGenerator: function () {
        $("#div-user-address-information .error").removeClass("error");

        var buildingNumber = $('#input-building-number').val();
        var floorNumber = $('#input-floor-number').val();
        var flatNumber = $('#input-flat-number').val();
        var buildName = $('#input-building-name').val();
        var addressTemplate = "";

        if (buildingNumber != null && buildingNumber !== "") {
            buildingNumber = " No: " + buildingNumber;
        }
        if (floorNumber != null && floorNumber !== "") {
            floorNumber = " K: " + floorNumber;
        }
        if (flatNumber != null && flatNumber !== "") {
            flatNumber = " D: " + flatNumber;
        }

        if (buildName !== "" && !buildName.match("apartmanı$") && !buildName.match("Apartmanı$") && !buildName.match("Apt$") && !buildName.match("apt$") && !buildName.match("APT$") && !buildName.match("APT.$") && !buildName.match("Apt.$") && !buildName.match("apt.$") && !buildName.match("sitesi$") && !buildName.match("Sitesi$") && !buildName.match("evleri$") && !buildName.match("Evleri$")) {
            buildName += " Apt.";
        }

        if (address.variables.MainType === "1" && address.variables.DistrictName != null) {
            addressTemplate = address.variables.DistrictName + " " + address.variables.Name + " " + buildName + buildingNumber + floorNumber + flatNumber + " " + address.variables.CountyName + "/" + address.variables.CityName;
            address.variables.FullAddressText = address.variables.DistrictName + " " + address.variables.Name + " " + buildName + buildingNumber + floorNumber + flatNumber;
        }
        else if (address.variables.MainType === "2" && address.variables.DistrictName != null) {
            addressTemplate = address.variables.DistrictName + " " + buildName + buildingNumber + floorNumber + flatNumber + " " + address.variables.CountyName + "/" + address.variables.CityName;
            address.variables.FullAddressText = address.variables.DistrictName + " " + buildName + buildingNumber + floorNumber + flatNumber;
        }
        else if (address.variables.MainType === "5" && address.variables.DistrictName != null) {
            addressTemplate = address.variables.DistrictName + " " + address.variables.Name + " " + buildName + buildingNumber + floorNumber + flatNumber + " " + address.variables.CountyName + "/" + address.variables.CityName;
            address.variables.FullAddressText = address.variables.DistrictName + " " + address.variables.Name + " " + buildName + buildingNumber + floorNumber + flatNumber;
        }

        if (address.variables.MainType == "1") {
            if (address.variables.BuildingNoIsMandatory === true || address.variables.BuildingNoIsMandatory == "true") {
                $('#input-building-number').attr("data-validate-type", "required");
                $('#input-building-name').removeAttr("data-validate-type", "required");
            } else {
                $('#input-building-number').attr("data-validate-type", "required");
                $('#input-building-name').attr("data-validate-type", "required");
            }
        } else if (address.variables.MainType == "2") {
            $('#input-building-number').attr("data-validate-type", "required");
            $('#input-building-name').attr("data-validate-type", "required");
        } else if (address.variables.MainType == "5") {
            $('#input-building-number').removeAttr("data-validate-type", "required");
            $('#input-building-name').removeAttr("data-validate-type", "required");
        }

        if ($('#input-building-number').val().length > 0) {
            $('#input-building-name').removeAttr("data-validate-type", "required");
        } else if ($('#input-building-name').val().length > 0 && (address.variables.BuildingNoIsMandatory === false || address.variables.BuildingNoIsMandatory == "false")) {
            $('#input-building-number').removeAttr("data-validate-type", "required");
        }

        if (address.variables.SearchType == "0") {
            $('#address-readonly').html(main.htmlEncode(address.variables.FullAddressText));
        } else {
            $('#address-readonly').html(main.htmlEncode(addressTemplate));
        }

        if ($('#address-readonly').html() == "") {
            $("#input-address").closest('.form-group').addClass("error");
        }

    },

    getGeoSearch: function (element, address) {
        if (address && address.length > 2) {
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
                    main.loader(main.enums.loaderEnum.Error, main.variables.globalErrorMessage);
                });

        } else {
            $(element).empty();
        }
    },

    getCities: function (element) {
        if (element) {
            _serviceProvider.getUserCities.get(function (response) {
                    if (response && response.ErrorMessage === undefined) {
                        $(element).empty();
                        $(element).append($('<option>').css('display', 'none'));
                        $(response).each(function () {
                            $(element).append($('<option>',
                                {
                                    value: this.Id,
                                    text: this.Name
                                }));
                        });
                    } else {
                        if (response.ErrorMessage !== undefined) {
                            main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                        }
                    }
                    if (address.variables.CityId != null) {
                        $(element).val(address.variables.CityId).trigger('change');
                    }
                });

        } else {
            $(element).empty();
        }
    },

    GetCounties: function (element, cityId) {
        if (element) {
            _serviceProvider.getUserCounties.get(cityId,
                function(response) {
                    if (response && response.ErrorMessage === undefined) {
                        $(element).empty();
                        $(element).append($('<option>').css('display', 'none'));
                        $(response).each(function() {
                            $(element).append($('<option>',
                                {
                                    value: this.Id,
                                    text: this.Name
                                }));
                        });
                    } else {
                        if (response.ErrorMessage !== undefined) {
                            main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                        }
                    }
                    if (address.variables.CountyId != null) {
                        $(element).val(address.variables.CountyId).trigger('change');
                    }
                });

        } else {
            $(element).empty();
        }
    },

    keyDownBranchSearchField: function (e) {
        var keyCode = e.keyCode;

        var alreadySelectedItem = $("#ul-geo-search li[selected]");

        if (keyCode === 40) {
            if (alreadySelectedItem) {
                address.moveSelectedBranchSearchItem(alreadySelectedItem, "next");
            }
            else {
                address.moveSelectedBranchSearchItem(null, "next");
            }
        }
        else if (keyCode === 38) {

            if (alreadySelectedItem) {
                address.moveSelectedBranchSearchItem(alreadySelectedItem, "prev");
            }
            else {
                address.moveSelectedBranchSearchItem(null, "prev");
            }
        }
        else if (keyCode === 13) {
            e.preventDefault();

            if (alreadySelectedItem && alreadySelectedItem.length > 0) {
                address.getAddressFromSelected(alreadySelectedItem);
            }
        }
    },

    moveSelectedBranchSearchItem: function (startPoint, traversal) {

        $("#ul-geo-search li").removeAttr("selected");
        $("#ul-geo-search li").removeClass("selected-light-gray");

        if (startPoint && startPoint.length > 0) {

            var startElement = startPoint[0];

            if (traversal === "next") {
                $(startElement).next().first().attr("selected", true);
                $(startElement).next().first().addClass("selected-light-gray");
            }
            else {
                $(startElement).prev().first().attr("selected", true);
                $(startElement).prev().first().addClass("selected-light-gray");
            }
        }
        else {
            if (traversal === "next") {
                var itemBranchSearch = $("#ul-geo-search li");
                itemBranchSearch.first().attr("selected", true);
                itemBranchSearch.first().addClass("selected-light-gray");
            }

        }
    },

    getAddressFromSelected: function (element) {
        var mainType = element.attr('data-main-type');

        address.variables.StreetName = null;
        address.variables.DistinctPoint = null;
        address.variables.CountyId = element.attr('data-countyid');
        address.variables.CityId = element.attr('data-cityid');
        address.variables.DistrictName = element.attr('data-district-name');
        address.variables.CountyName = element.attr('data-county-name');
        address.variables.CityName = element.attr('data-city-name');
        address.variables.DistrictId = element.attr('data-districtid');
        address.variables.MainType = mainType;
        address.variables.BuildingNoIsMandatory = element.attr('data-build-no-mandotary');
        address.variables.Id = element.attr('data-id');
        address.variables.Name = element.attr('data-name');

        if (mainType === "1") {
            address.variables.StreetName = name;
        }
        if (mainType === "5") {
            address.variables.DistinctPoint = name;
        }
        $("#input-address").val(element.attr('data-text'));
        $('#ul-geo-search').empty();
        $('#div-address-geo-search input').removeAttr('disabled');
        address.variables.IsAddressSearch = false;
        address.addressGenerator();
    },

    getGib: function (uniqueId) {
        _serviceProvider.getGib.getDetail(uniqueId, main.variables.language)
            .done(function (response) {
                if (response.ErrorMessage === undefined) {
                    if (response) {
                        if (response.FullName != "" && response.FullName != null) {
                            if (response.Einvoice) {
                                $("#input-company-name").val('').closest('.form-group').addClass('is-empty');
                                $("#input-tax-number").val('').closest('.form-group').addClass('is-empty');
                                main.loader(main.enums.loaderEnum.Error, "Müşteri e-faturaya kayıtlı olduğu için adres gönderici adresi olarak kullanılamaz");
                            } else {
                                $("#input-company-name").val(response.FullName).closest('.form-group').removeClass('is-empty');
                            }
                        } else {
                            $("#input-company-name").val('').closest('.form-group').addClass('is-empty');
                            $("#input-tax-number").val('').closest('.form-group').addClass('is-empty').removeClass('error');
                            main.loader(main.enums.loaderEnum.Error, "Girilen vergi numarasına ait firma bulunmamaktadır!");
                        }
                    }
                } else {
                    if (response.ErrorMessage !== undefined) {
                        main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                    }
                }
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, main.variables.globalErrorMessage);
            });
    },

    mapInitialize: function (model, addressText, isMessage) {
        address.mapClear();
        address.variables.map = L.map('google-map', { attributionControl: false });
        new L.TileLayer('https://harita.yurticikargo.com/Service/api/v1/map/ProMap?accId=0&appCode=0&x={x}&y={y}&z={z}',
            {
                subdomains: ['bms'],
                maxZoom: 19,
                zIndex: 5
            }).addTo(address.variables.map);
        address.variables.map.options.crs = L.CRS.EPSG3857;

        $("#txtAddress").html(addressText);
        if (model.CityName == null) {
            $("#txtCity").html("-");
        } else {
            $("#txtCity").html(model.CityName);
        }

        if (model.CountyName == null) {
            $("#txtCounty").html("-");
        } else {
            $("#txtCounty").html(model.CountyName);
        }

        if (model.UnitName == null) {
            if (isMessage) {
                $("#txtBranch").html("Girmiş olduğunuz adrese en yakın şube, operatörlerimiz tarafından belirlendikten sonra adresinizle gönderi yapabileceksiniz.").addClass("label-red");
            } else {
                $("#txtBranch").html("Girmiş olduğunuz adrese en yakın şube, operatörlerimiz tarafından belirlenecektir.").addClass("label-red");
            }
        } else {
            $("#txtBranch").html(model.UnitName).removeAttr("class");
        }

        if (model && model.UaLatitude == 0 && model.Longitude == 0 && model.Latitude == 0) {
            address.variables.map.setView([39.047368, 35.3268456], 5);
        }
        else {
            var position;
            if (model && model.UaLatitude == 0 && model.Longitude != 0) {
                position = new L.LatLng(model.Latitude, model.Longitude);
                address.variables.map.setView(position, 15);
                var contentString = '<div><h3>Adres Bilgisi</h3><p>' + addressText + '</p></div>';
                var markerss = [[model.CountyName + ' ' + model.CityName, model.Latitude, model.Longitude, "/assets/img/info-man.png"]];

                address.variables.marker = L.marker(position, { icon: L.icon({ iconUrl: markerss[0][3] }), title: markerss[0][0] }).addTo(address.variables.map).bindPopup(contentString).openPopup();
            }
            else {
                var bounds = new L.LatLngBounds();

                var markers = [
                    [model.UnitName + ' ŞUBESİ', model.UaLatitude, model.UaLongitude, "/assets/img/rsz_yk_logo.png"],
                    [model.CountyName + ' ' + model.CityName, model.Latitude, model.Longitude, "/assets/img/info-man.png"]];

                var infoWindowContent = [
                    ['<div><h3>Yurtiçi Kargo</h3><p>' + model.UnitName + ' ŞUBESİ.</p></div>'],
                    ['<div><h3>Adres Bilgisi</h3><p>' + addressText + '</p></div>']];

                for (var i = 0; i < markers.length; i++) {
                    position = new L.LatLng(markers[i][1], markers[i][2]);
                    bounds.extend(position);

                    address.variables.marker = L.marker(position, { icon: L.icon({ iconUrl: markers[i][3] }), title: markers[i][0] }).addTo(address.variables.map).bindPopup(infoWindowContent[i][0]).openPopup();
                    address.variables.map.fitBounds(bounds);
                }
            }
        }
    },

    getAddress: function (addressText, isMessage) {
        _serviceProvider.getAddressVerify.get(addressText)
            .done(function (response) {
                if (response && response.ErrorMessage == undefined && response.AddressAcceptable) {
                    $('#map-modal').modal("show");
                    delay(function () { address.mapInitialize(response, addressText, isMessage); }, 1000);
                } else {
                    if (response && response.ErrorMessage != undefined) {
                        main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                    }
                    else if (response && !response.AddressAcceptable) {
                        main.loader(main.enums.loaderEnum.Error, "Girilen adres bilgisi doğrulanamadı. Lütfen tekrar deneyiniz.");
                    }
                    else {
                        main.loader(main.enums.loaderEnum.Error, main.variables.globalErrorMessage);
                    }
                }
                $("#btn-user-save").attr("readonly", false);
                main.deleteButtonLoader($("#btn-user-save"), false);
            })
            .fail(function () {
                $("#btn-user-save").attr("readonly", false);
                main.deleteButtonLoader($("#btn-user-save"), false);
                $('#map-modal').modal({ show: 'false' });
                main.loader(main.enums.loaderEnum.Error, main.variables.globalErrorMessage);
            });
    },

    mapClear: function () {
        if (address.variables.map != null) {
            address.variables.map.remove();
            address.variables.map = null;
        }
    }
}

$("#input-address").keyup(function (e) {
    /*var isValid = main.addressListing(e);
    if (isValid == true) {
        var value = $(this).val();
        address.getGeoSearch($('#ul-geo-search'), value);
    }*/
   
    if ((e.keyCode >= 37 && e.keyCode <= 40) || e.keyCode == 13) {
        return;
    }

    address.getGeoSearch($('#ul-geo-search'), $(this).val());
    if ($(this).val().length < 3) {
        $('#ul-geo-search').empty();
    }

});

$('#input-address').on('focus', function () {
    $(this).closest("div.search-content").find(".searchContent .dropdown").show();
    document.addEventListener("keydown", address.keyDownBranchSearchField, false);
});

$('#input-address').on('focusout', function () {
    var el = $(this);
    setTimeout(function () {
        el.closest("div.search-content").find(".searchContent .dropdown").slideUp(400);
    }, 200);

    document.removeEventListener("keydown", address.keyDownBranchSearchField, false);
    $("#ul-geo-search li").removeAttr("selected");

});

$('#select-city').change(function () {
    address.variables.CityId = this.value;
    address.GetCounties($('#select-county'), this.value);
});

$('#select-county').change(function () {
    address.variables.CountyId = this.value;
});

$('body').on('click', '#ul-geo-search li', function () {
    address.getAddressFromSelected($(this));
});

$('#input-building-number, #input-floor-number, #input-floor-number,#input-building-name,#input-flat-number, #input-address').on('focusout', function (event) {
    event.preventDefault();
    address.addressGenerator();
});

$('#check-user-address-status').change(function () {
    $("input").closest('.form-group').removeClass("error");
    if ($(this).prop("checked")) {
        //aradıgım adresi bulamadım
        $('#div-address-not-found').show();
        $('#select-city, #select-register-city, #select-county,#complaint-description').attr('data-validate-type', 'required');

        $('.address-geo-search').hide();
        $('#div-address-geo-search input').removeAttr('data-validate-type', 'required');
        address.variables.SearchType = 0;
    } else {
        //Adress arama
        $('#div-address-not-found').hide();
        $('#select-city, #select-register-city, #select-county,#complaint-description').removeAttr('data-validate-type', 'required');

        $('.address-geo-search').show();
        $('#div-address-geo-search #input-address').attr('data-validate-type', 'required');
        address.variables.SearchType = 1;
    }
});

$('input[type=radio][name=radio-customer-type]').change(function () {
    if (this.value === "2") {
        $('#div-workplace').hide();
        $('#div-workplace input').removeAttr('data-validate-type', 'required');
    } else if (this.value === "3") {
        $('#div-workplace').show();
        $('#input-company-name').attr('data-validate-type', 'required');
    }
    address.variables.AdressFunction = this.value;
});

$('#input-tax-number').on('focusout', function () {
    if ($(this).val() != "") {
        if (main.checkTaxNumber(this)) {
            address.getGib(this.value);
        } else {
            $(this).closest('.form-group').addClass("error").find('div.tooltip-wrap a[data-toggle="popover"]').popover('show');
        }
    } else {
        $(this).closest('.form-group').removeClass("error").find('div.tooltip-wrap a[data-toggle="popover"]').popover('hide');
    }
});