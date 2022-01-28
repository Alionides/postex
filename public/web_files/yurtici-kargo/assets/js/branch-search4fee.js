var branch = {

    variables: {
        selectedProdoctId: null,
        selectedBranchId: null,
        selectedBranchName: null,
        selectedPreviousDate: null,
        selectedNextDate: null,
        currentMap: null
    },

    getBranches: function (branchId, elemenet) {
        _serviceProvider.getBranches.getDetail(branchId, main.variables.language)
            .done(function (response) {
                $(elemenet).next('div.accordion-content-dynamic.all-radius').html('');
                if (response && response.ErrorMessage === undefined) {
                    var geo = response.Latitude + "," + response.Longitude;
                    var key = $("#googleApiKey").val();
                    var template =
                        '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">' +
                        '<h6 class="main-title-bold">' + Resource.Address[main.variables.language] + '</h6>' +
                        '<p class="main-title-soft">' + response.Address + '</p>' +
                        '<h6 class="main-title-bold">' + Resource.Phone[main.variables.language] + '</h6>' +
                        '<p class="main-title-soft">' + response.PhoneMain + ' </p> ' +
                        '<p  class="main-title-soft">' + response.PhoneAlternate + ' </p> ' +
                        '</div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div style="height:300px;margin-bottom:30px" id="map-vect_' + response.Id + '"></div><a href="#" id="branch-detail-modal" data-branch="' + response.Id + '" data-name="' + response.Name + '" class="btn all-radius">' +
                        '' + Resource.BranchDetail[main.variables.language] + '</a></div></div>';

                    $(elemenet).next('div.accordion-content-dynamic.all-radius').html(template);

                    branch.generateMap(response.Id, response.Latitude, response.Longitude);

                } else {
                    if (response.ErrorMessage !== undefined) {
                        main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                    }
                }
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, Resource.BranchDetailUnexpectedError[main.variables.language]);
            });
    },

    accordionBranchFunction: function () {
        $('.accordion-dynamic .accordion-toggle-dynamic').on('click', function () {
            var element = this;
            var dataBranchId = $(element).attr('data-branchId');
            if (dataBranchId && dataBranchId.length != 0) {
                branch.getBranches(dataBranchId, element);
            }
            var activeElements = $(".accordion-content-wrap-dynamic div.active");
            if (activeElements.length) {
                activeElements.removeClass("active").next().slideUp('500');
            }

            if (activeElements.is(element))
                return;

            window.setTimeout(function () {
                $('html, body').animate({ scrollTop: $(element).offset().top - 20 }, 400);
                $(element).addClass("active").next().slideDown('600');
            }, activeElements.length ? 500 : 0);
        });
    },

    getBranchesByCityTown: function (cityId, countyId, districtId) {
        _serviceProvider.getBranchesByCityTown.getDetail(cityId, countyId, districtId, main.variables.language)
            .done(function (response) {
                if (response && response.ErrorMessage === undefined) {
                    $('.accordion-wrap').find('div.accordion-dynamic').html("");
                    var accordion = "";

                    $.each(response, function (index, item) {
                        var status = '';
                        if (item.IsOpen) {
                            status = "<i class='open'></i><span>" + Resource.Open[main.variables.language] + "</span>";
                        } else {
                            status = "<i class='close'></i><span>" + Resource.Closed[main.variables.language] + "</span>";
                        }
                        accordion += '<div class="accordion-content-wrap-dynamic">' +
                            '<div class="accordion-toggle-dynamic all-radius center-between" data-branchId=' + item.Id + '><h4>' + item.Name + '</h4><div  class="main-title-soft center-between">' + status + ' </div></div>' +
                            '<div class="accordion-content-dynamic all-radius">' +
                            '<p>' + item.Address + '</p>' +
                            '</div></div>';
                    });
                    $('.accordion-wrap').find('div.accordion-dynamic').html(accordion);

                } else {
                    if (response.ErrorMessage !== undefined) {
                        delay(function () {
                            main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                        }, 400);
                    }
                }
                branch.accordionBranchFunction();
                branch.getActiveAccordion($('.accordion-wrap').find('div.accordion-content-wrap-dynamic').first(), response.length);
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, Resource.BranchesByCityTownUnexpectedError[main.variables.language]);
            });
    },

    getActiveAccordion: function (element, branchCount) {
        if (branchCount == 1) {

            var dataBranchId = element.find('.accordion-toggle-dynamic').attr('data-branchId');
            element.find('.accordion-toggle-dynamic').next().slideToggle('600');
            $(".accordion-content-dynamic").not(element.find('.accordion-toggle-dynamic').next()).slideUp('600');
            if (dataBranchId && dataBranchId.length != 0) {
                branch.getBranches(dataBranchId, element.find('.accordion-toggle-dynamic'));
                element.find('.accordion-toggle-dynamic').addClass('active');
                element.find('.accordion-content-dynamic').css('display', 'block');
            }
        }
        if (branchCount > 0) {
            $('html, body').stop().animate({
                scrollTop: element.find(".accordion-toggle-dynamic").first().offset().top - 20
            }, 400);
        }
    },

    keyDownBranchSearchField: function (e) {
        var keyCode = e.keyCode;

        var alreadySelectedItem = $("#ul-geodistricts li[selected]");

        if (keyCode == 40) {
            if (alreadySelectedItem) {
                branch.moveSelectedBranchSearchItem(alreadySelectedItem, "next");
            }
            else {
                branch.moveSelectedBranchSearchItem(null, "next");
            }
        }
        else if (keyCode == 38) {

            if (alreadySelectedItem) {
                branch.moveSelectedBranchSearchItem(alreadySelectedItem, "prev");
            }
            else {
                branch.moveSelectedBranchSearchItem(null, "prev");
            }
        }
        else if (keyCode == 13) {
            e.preventDefault();
            if ($("#geodistricts-hidden").val() != $("#geodistricts").val()) {
                if (alreadySelectedItem && alreadySelectedItem.length > 0) {
                    var cityId = alreadySelectedItem.attr('data-cityid');
                    var countyId = alreadySelectedItem.attr('data-countyid');
                    var districtId = alreadySelectedItem.attr('data-districtId');
                    $("#geodistricts").val(alreadySelectedItem.attr('data-text'));
                    $("#geodistricts-hidden").val(alreadySelectedItem.attr('data-text'));
                    $('#ul-geodistricts').empty();
                    branch.getBranchesByCityTown(cityId, countyId, districtId);
                } else {
                    main.loader(main.enums.loaderEnum.Error, Resource.PleaseSelectaValidAddress[main.variables.language]);
                }
            }
        }
    },

    moveSelectedBranchSearchItem: function (startPoint, traversal) {

        $("#ul-geodistricts li").removeAttr("selected");
        $("#ul-geodistricts li").removeClass("selected-light-gray");

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
                var itemBranchSearch = $("#ul-geodistricts li");
                itemBranchSearch.first().attr("selected", true);
                itemBranchSearch.first().addClass("selected-light-gray");
            }

        }
    },

    getBranchProduct: function (branchId) {
        _serviceProvider.getBranchProduct.getDetail(branchId, main.variables.language)
            .done(function (response) {
                if (response && response.ErrorMessage === undefined) {
                    $('.popup-slider-items > div').html("");
                    if (branch.variables.selectedBranchName != null) {
                        $('#modal-branch-name').html(branch.variables.selectedBranchName);
                    }
                    var count = 1;
                    $.each(response, function (index, item) {
                        var activeClass = "";
                        var name = item.Name;
                        var description = item.Description;
                        var id = item.Id;
                        if (count === 1) {
                            branch.variables.selectedProdoctId = id;
                            activeClass = "active";
                        }
                        count++;
                        var template =
                            "<div class='item' data-id='" + id + "'><a href data-toggle='tab'><div class='title all-radius " + activeClass + "'><span>" + name + "</span></div></a>";
                        if (description != null) {
                            template += "<div class='info-popup'>" + description + "</div>";
                        }
                        template += "</div>";

                        $('.popup-slider-items > div').append(template);
                    });
                    branch.branchTabOwlCarousel();

                    if (branch.variables.selectedBranchId != null && branch.variables.selectedProdoctId != null) {
                        branch.getBranchProductWorkingTimes(branch.variables.selectedBranchId, branch.variables.selectedProdoctId, null);
                    }

                } else {
                    if (response.ErrorMessage !== undefined) {
                        main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                    } else {
                        main.loader(main.enums.loaderEnum.Error, Resource.BranchProductsUnexpectedError[main.variables.language]);
                    }
                }
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, Resource.BranchProductsUnexpectedError[main.variables.language]);
            });
    },

    getBranchProductWorkingTimes: function (branchId, productId, dateTime) {
        _serviceProvider.getBranchProductWorkingTimes.getDetail(branchId, productId, dateTime, main.variables.language)
            .done(function (response) {
                if (response && response.ErrorMessage === undefined) {
                    $('.table-responsive.w-line.w-width table tbody').html('');
                    $('.popup-slider-items-date.owl-carousel').html('');

                    var previousDate = response.PreviousDate;
                    var currentDate = response.CurrentDate;
                    var nextDate = response.NextDate;
                    var previousDateFormat = response.PreviousDateFormat;
                    var currentDateFormat = response.CurrentDateFormat;
                    var nextDateFormat = response.NextDateFormat;
                    branch.variables.selectedNextDate = nextDate;
                    branch.variables.selectedPreviousDate = previousDate;

                    var dataTemplate = "";

                    dataTemplate += " <div class='item-date' data-date='" + currentDate + "'><span>" + currentDateFormat + "</span></div>";
                    dataTemplate += " <div class='item-date' data-date='" + nextDate + "'><span>" + nextDateFormat + "</span></div>";
                    dataTemplate += " <div class='item-date' data-date='" + previousDate + "'><span>" + previousDateFormat + "</span></div>";

                    $('.popup-slider-items-date.owl-carousel.owl-theme').append(dataTemplate);

                    branch.branchDateTabOwlCarousel();

                    $.each(response.ProductWorkingTimes, function (index, item) {
                        var destination = item.Destination;
                        var lastItemClass = "";
                        var branchShipmentStartTime = item.BranchShipmentStartTime;
                        var branchShipmentEndTime = item.BranchShipmentEndTime;
                        var pickupStartTime = item.PickupStartTime;
                        var pickupEndTime = item.PickupEndTime;
                        if (index === response.ProductWorkingTimes.length - 1) {
                            lastItemClass = 'class="last-table-item"';
                        }
                        var table = '<tr ' + lastItemClass + '>' +
                            '<td align= "left" rowspan="2" > ' + destination + '</td>' +
                            '<td align="left">' + Resource.TimeToDeliverByShipment[main.variables.language] + '</td>' +
                            '<td align="center">' + branchShipmentStartTime + '</td>' +
                            '<td align="center">' + branchShipmentEndTime + '</td>' +
                            '</tr>' +
                            '<tr>' +
                            '<td align="left">' + Resource.PickupRequestTimes[main.variables.language] + '</td>' +
                            '<td align="center">' + pickupStartTime + '</td>' +
                            '<td align="center">' + pickupEndTime + '</td>' +
                            '</tr>';

                        $('.table-responsive.w-line.w-width table tbody').append(table);
                    });
                } else {
                    if (response.ErrorMessage !== undefined) {
                        main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                    } else {
                        main.loader(main.enums.loaderEnum.Error, Resource.BranchProductsUnexpectedError[main.variables.language]);
                    }
                }
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, Resource.BranchProductsUnexpectedError[main.variables.language]);
            });
    },

    branchTabOwlCarousel: function () {

        if ($('.popup-slider-items > div').data('owl.carousel') !== undefined) {
            $('.popup-slider-items > div').owlCarousel({ touchDrag: true, mouseDrag: false });
            $('.popup-slider-items > div').data('owl.carousel').destroy();
        }
        $('.popup-slider-items > div').owlCarousel({
            margin: 10,
            loop: false,
            items: 1,
            mouseDrag: false,
            navText: [
                '<img src="/web_files/yurtici-kargo/assets/img/left-arrow.svg" alt="" width="9" height="15" />',
                '<img src="/web_files/yurtici-kargo/assets/img/right-arrow.svg" alt="" width="9" height="15" />'
            ],
            nav: true,
            dots: false,
            responsive: {
                600: {
                    items: 4
                }
            }
        });
    },

    branchDateTabOwlCarousel: function () {

        if ($('.popup-slider-items-date.owl-carousel').data('owl.carousel') !== undefined) {
            $('.popup-slider-items-date.owl-carousel').owlCarousel({ touchDrag: true, mouseDrag: false });
            $('.popup-slider-items-date.owl-carousel').data('owl.carousel').destroy();
        }
        $(".popup-slider-items-date.owl-carousel").owlCarousel({
            margin: 10,
            loop: true,
            items: 1,
            mouseDrag: false,
            navText: [
                '<img src="/web_files/yurtici-kargo/assets/img/left-arrow.svg" id="img-tab-date-previous" alt="" width="9" height="15" />',
                '<img src="/web_files/yurtici-kargo/assets/img/right-arrow.svg" id="img-tab-date-next" alt="" width="9" height="15" />'
            ],
            nav: true,
            dots: false
        });
    },

    generateMap: function (id, latitude, longitude) {
        setTimeout(function () {
            $('[id*="map-vect_"]:not("#map-vect_' + id + '")').remove();

            branch.variables.currentMap = null;

            branch.variables.currentMap = L.map('map-vect_' + id, { attributionControl: false, crs: L.CRS.EPSG3857 }).setView([latitude, longitude], 15);
            L.control.attribution({ prefix: 'Başarsoft' }).addTo(branch.variables.currentMap);
            new L.TileLayer('https://harita.yurticikargo.com/Service/api/v1/map/ProMap?accId=0&appCode=0&x={x}&y={y}&z={z}',
                {
                    subdomains: ['bms'],
                    maxZoom: 19,
                    zIndex: 5
                }).addTo(branch.variables.currentMap);

            L.marker([latitude, longitude]).addTo(branch.variables.currentMap);
        }, 1000);
    }
};


$(function () {
    var model = JSON.parse(main.localStorageGetItem("Branch-Search"));
    main.localStorageRemoveItem("Branch-Search");
    if (model) {
        var cityId = model.cityid;
        var countyId = model.countyid;
        var districtId = model.districtId;
        $("#geodistricts").val(model.branch);
        $("#geodistricts-hidden").val(model.branch);
        branch.getBranchesByCityTown(cityId, countyId, districtId);
    }
    var element = $('.accordion-content-wrap-dynamic:first');
    branch.getActiveAccordion(element);
});

$("#geodistricts").keyup(function (e) {
    //var isNumeric = main.addressListing(e);
    //if (isNumeric == true) {
    //    var address = $(this).val();
    //    main.getGeoDistricts($('#ul-geodistricts'), address, main.variables.excludeCyprus);
    //}

    if ((e.keyCode >= 37 && e.keyCode <= 40) || e.keyCode == 13) {
        return;
    }

    main.getGeoDistricts($('#ul-geodistricts'), $(this).val(), main.variables.excludeCyprus);
    if ($(this).val().length < 3) {
        $('#ul-geodistricts').empty();
    }
});

$('body').on('click', '#ul-geodistricts li', function () {
    var cityId = $(this).attr('data-cityid');
    var countyId = $(this).attr('data-countyid');
    var districtId = $(this).attr('data-districtId');
    $("#geodistricts").val($(this).attr('data-text'));
    $('#ul-geodistricts').empty();
    if (cityId && countyId && cityId.length != 0 && countyId.length != 0) {
        $("#geodistricts-hidden").val($(this).attr('data-text'));
        branch.getBranchesByCityTown(cityId, countyId, districtId);
    }
});

$('body').on('click', '#branch-detail-modal', function () {
    var branchId = $(this).attr('data-branch');
    var name = $(this).attr('data-name');
    branch.variables.selectedBranchId = branchId;
    branch.variables.selectedBranchName = name;
    branch.getBranchProduct(branchId);
    $('#service').modal('show');

});

$('#geodistricts').on('focus', function () {
    $(this).closest("div.search-content").find(".searchContent .dropdown").show();

    document.addEventListener("keydown", branch.keyDownBranchSearchField, false);
});

$('#geodistricts').on('focusout', function (e) {
    var el = $(this);
    setTimeout(function () {
        el.closest("div.search-content").find(".searchContent .dropdown").slideUp(400);
    }, 200);


    document.removeEventListener("keydown", branch.keyDownBranchSearchField, false);
    $("#ul-geodistricts li").removeAttr("selected");

});

$('body').on('click', '.title.all-radius', function () {
    $('.title.all-radius').removeClass("active");
    if ($(this).closest('.item.disabled-module').length < 1) {
        $(this).addClass("active");
        branch.variables.selectedProdoctId = $(this).closest('.item').attr('data-id');
        branch.getBranchProductWorkingTimes(branch.variables.selectedBranchId, branch.variables.selectedProdoctId, null);
    }
});

$('body').on('click', '#img-tab-date-next', function () {
    branch.getBranchProductWorkingTimes(branch.variables.selectedBranchId,
        branch.variables.selectedProdoctId,
        branch.variables.selectedNextDate);
});

$('body').on('click', '#img-tab-date-previous', function () {
    branch.getBranchProductWorkingTimes(branch.variables.selectedBranchId,
        branch.variables.selectedProdoctId,
        branch.variables.selectedPreviousDate);
});

$(document).ready(function () {
    var defaultClasses = "col-lg-12 col-md-12 col-sm-12 col-xs-12 search-box-wrap";
    var menuOnlyClasses = "col-lg-offset-0 col-lg-12 col-md-offset-2 col-md-10 col-sm-offset-4 col-sm-8 col-xs-12 search-box-wrap";

    var element = $(".search-box-wrap").eq(1);

    var addNewClasses = function (targetElement) {
        targetElement.removeClass(defaultClasses);
        targetElement.addClass(menuOnlyClasses);
    }

    //Is Menu Open
    var isChecked = $("#menu-collapsed").is(":checked");

    if (!isChecked) {
        addNewClasses(element);
    }

    $("#menu-collapsed").change(function () {
        if (this.checked) { //Menu Close
            element.removeClass(menuOnlyClasses);
            element.addClass(defaultClasses);
        }
        else { //Menu Open
            addNewClasses(element);
        }
    });
});

