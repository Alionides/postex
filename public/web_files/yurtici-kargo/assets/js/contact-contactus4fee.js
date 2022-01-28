var contactUs = {

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

    getBranchesForContact: function (cityId, countyId, districtId) {
        $('#div-info').hide();
        _serviceProvider.getBranchesRegion.getDetail(cityId, countyId, districtId, main.variables.language)
            .done(function (response) {
                if (response.ErrorMessage !== undefined) {
                    main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                } else {
                    $('#regional-directorates-accordion-wrap').find('div#regional-directorates-accordion-dynamic').hide();
                    var key = $("#googleApiKey").val();

                    var activeElements = $('#regional-directorates-accordion-wrap').find('div.accordion-content-wrap-dynamic');

                    if (activeElements && activeElements.length > 0) {
                        activeElements.find('.accordion-toggle-dynamic').removeClass('active');
                        activeElements.find('.accordion-content-dynamic').css('display', 'none');
                    }

                    if (response.Name != "" && response.Name != null) {
                        $('#input-name').html(response.Name).closest('.form-group').show();
                    } else {
                        $('#input-name').html("").closest('.form-group').hide();
                    }
                    if (response.Address != "" && response.Address != null) {
                        $('#input-address').html(response.Address).closest('.form-group').show();
                    } else { 
                        $('#input-address').html("").closest('.form-group').hide();
                    }
                    if (response.PhoneNumber != "" && response.PhoneNumber != null) {
                        $('#input-phone').html(response.PhoneNumber).closest('.form-group').show();
                    } else {
                        $('#input-phone').html("").closest('.form-group').hide();
                    }
                    if (response.Latitude != "" && response.Latitude != null && response.Longitude != "" && response.Longitude != null) {
                        var geo = response.Latitude + "," + response.Longitude;
                        $("#locationFrame").attr("src", key + geo);
                    }
                    else {
                        $("#locationFrame").attr("src", "");
                    }

                    $('#div-info').show();
                    main.moveView($('.contact-info-wrap'));
                    main.InputIsEmptyControl();
                    contactUs.accordionDirectorateFunction();
                }
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, Resource.GenericUnexpectedError[main.variables.language]);
            });
    },

    accordionDirectorateFunction: function () {
        $('#regional-directorates-single-accordion-dynamic .accordion-toggle-dynamic').unbind('click');
        $('#regional-directorates-single-accordion-dynamic .accordion-toggle-dynamic').on('click', function () {
            var element = this;

            var activeElements = $("#single-accordion-content-wrap-dynamic div.active");
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

    keyDownBranchSearchField: function (e) {
        var keyCode = e.keyCode;
        var alreadySelectedItem = $(".ul-geo-search li[selected]");

        if (keyCode == 40) {
            if (alreadySelectedItem) {
                contactUs.moveSelectedBranchSearchItem(alreadySelectedItem, "next");
            }
            else {
                contactUs.moveSelectedBranchSearchItem(null, "next");
            }
        }
        else if (keyCode == 38) {

            if (alreadySelectedItem) {
                contactUs.moveSelectedBranchSearchItem(alreadySelectedItem, "prev");
            }
            else {
                contactUs.moveSelectedBranchSearchItem(null, "prev");
            }
        }
        else if (keyCode == 13) {
            e.preventDefault();

            if (alreadySelectedItem && alreadySelectedItem.length > 0) {
                var cityId = alreadySelectedItem.attr('data-cityid');
                var countyId = alreadySelectedItem.attr('data-countyid');
                var districtId = alreadySelectedItem.attr('data-districtId');
                $(".address").val(alreadySelectedItem.attr('data-text')).attr("data-cityid", alreadySelectedItem.attr("data-cityid")).attr("data-countyid", alreadySelectedItem.attr("data-countyid"));
                $('.ul-geo-search').empty();
                contactUs.getBranchesForContact(cityId, countyId, districtId);
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

$(function () {
    main.moveView($('.contact-info-wrap'));
    contactUs.contactGeoDistricts($('.address'));
});

$('.address').on('focus', function () {
    $(this).closest("div.search-content").find(".searchContent .dropdown").show();
    document.addEventListener("keydown", contactUs.keyDownBranchSearchField, false);
});

$('.address').on('focusout', function () {
    var a = $(this);
    setTimeout(function () {
        a.closest("div.search-content").find(".searchContent .dropdown").slideUp(400);
    }, 200);
    document.removeEventListener("keydown", contactUs.keyDownBranchSearchField, false);
});

$('body').on('click', '.ul-geo-search li', function () {
    var cityId = $(this).attr('data-cityid');
    var countyId = $(this).attr('data-countyid');
    var districtId = $(this).attr('data-districtId'); 
    $(this).closest('.search-content').find('input').val($(this).attr('data-text'));
    $('.ul-geo-search').empty();
    contactUs.getBranchesForContact(cityId, countyId, districtId);
});