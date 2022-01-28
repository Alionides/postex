var cupboard = {

    variables: {
        geoList: [],
        currentMap:null
    },

    accordionCupboardFunction: function () {
        $('.accordion-dynamic .accordion-toggle-dynamic').on('click', function () {
            var element = this;
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

    getActiveAccordion: function (element, cupboardCount) {
        if (cupboardCount == 1) {
            var childElement = element.find('.accordion-toggle-dynamic');
            var cupboardId = $(childElement).attr('data-cupboardId');
            element.find('.accordion-toggle-dynamic').next().slideToggle('600');
            $(".accordion-content-dynamic").not(element.find('.accordion-toggle-dynamic').next()).slideUp('600');
            if (cupboardId && cupboardId.length != 0) {
                element.find('.accordion-toggle-dynamic').addClass('active');
                element.find('.accordion-content-dynamic').css('display', 'block');
            }
        }
        if (cupboardCount > 0) {
            $('html, body').stop().animate({
                scrollTop: element.find(".accordion-toggle-dynamic").first().offset().top - 20
            }, 400);
        }
    },

    getCupboards: function (cityId, townId, districtId) {
        _serviceProvider.getCupboards.getList(cityId, townId, districtId, main.variables.language)
            .done(function (response) {
                if (response && response.ErrorMessage === undefined) {
                    $('.accordion-wrap').find('div.accordion-dynamic').html("");
                    var accordion = "";

                    $.each(response, function (index, item) {
                        var template =
                            '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">' +
                            '<h6 class="main-title-bold">' + Resource.Address[main.variables.language] + '</h6>' +
                            '<p class="main-title-soft">' + item.Address + '</p>' +
                            '<h6 class="main-title-bold">' + Resource.Phone[main.variables.language] + '</h6>' +
                            '<p class="main-title-soft"><a href="tel:' + item.TelNo + '">' + item.TelNo + '</a> </p> ' +
                            '</div>' +
                            '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">' +
                            '<div style = "height:300px;margin-bottom:30px" id = "map-vect_' + item.Id + '"></div></div>';


                        accordion += '<div class="accordion-content-wrap-dynamic">' +
                            '<div class="accordion-toggle-dynamic all-radius center-between" data-cupboardId=' + item.Id + '><h4>' + item.Name + '</h4></div>' +
                            '<div class="accordion-content-dynamic all-radius">' +
                            template +
                            '</div></div>';
                        cupboard.variables.geoList.push({ id: item.Id, latitude: item.Latitude, longitude: item.Longitude });
                        
                    });
                    $('.accordion-wrap').find('div.accordion-dynamic').html(accordion);

                } else {
                    if (response.ErrorMessage !== undefined) {
                        delay(function () {
                            main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                        }, 400);
                    }
                }
                cupboard.accordionCupboardFunction();
                cupboard.getActiveAccordion($('.accordion-wrap').find('div.accordion-content-wrap-dynamic').first(), response.length);

                for (var i = 0; i < cupboard.variables.geoList.length; i++) {
                    cupboard.generateMap(cupboard.variables.geoList[i].id, cupboard.variables.geoList[i].latitude, cupboard.variables.geoList[i].longitude);
                }

                //Array Clear
                cupboard.variables.geoList = [];
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, Resource.CupboardUnexpectedError[main.variables.language]);
            });
    },

    keyDownBranchSearchField: function (e) {
        var keyCode = e.keyCode;

        var alreadySelectedItem = $("#ul-geodistricts li[selected]");

        if (keyCode == 40) {
            if (alreadySelectedItem) {
                cupboard.moveSelectedCupboardSearchItem(alreadySelectedItem, "next");
            }
            else {
                cupboard.moveSelectedCupboardSearchItem(null, "next");
            }
        }
        else if (keyCode == 38) {

            if (alreadySelectedItem) {
                cupboard.moveSelectedCupboardSearchItem(alreadySelectedItem, "prev");
            }
            else {
                cupboard.moveSelectedCupboardSearchItem(null, "prev");
            }
        }
        else if (keyCode == 13) {
            e.preventDefault();
            if ($("#geodistricts-hidden").val() != $("#geodistricts").val()) {
                if (alreadySelectedItem && alreadySelectedItem.length > 0) {
                    var cityId = alreadySelectedItem.attr('data-cityid');
                    var townId = alreadySelectedItem.attr('data-countyid');
                    var districtId = alreadySelectedItem.attr('data-districtId');
                    $("#geodistricts").val(alreadySelectedItem.attr('data-text'));
                    $("#geodistricts-hidden").val(alreadySelectedItem.attr('data-text'));
                    $('#ul-geodistricts').empty();
                    cupboard.getCupboards(cityId, townId, districtId);
                } else {
                    main.loader(main.enums.loaderEnum.Error, Resource.PleaseSelectaValidAddress[main.variables.language]);
                }
            }
        }
    },

    moveSelectedCupboardSearchItem: function (startPoint, traversal) {

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

    

    generateMap: function (id, latitude, longitude) {
        setTimeout(function () {
            
            //$('[id*="map-vect_"]:not("#map-vect_' + id + '")').remove();
            cupboard.variables.currentMap = null;
            cupboard.variables.currentMap = L.map('map-vect_' + id, { attributionControl: false, crs: L.CRS.EPSG3857 }).setView([latitude, longitude], 15);
            L.control.attribution({ prefix: 'Başarsoft' }).addTo(cupboard.variables.currentMap);
            new L.TileLayer('https://harita.yurticikargo.com/Service/api/v1/map/ProMap?accId=0&appCode=0&x={x}&y={y}&z={z}',
                {
                    subdomains: ['bms'],
                    maxZoom: 19,
                    zIndex: 5
                }).addTo(cupboard.variables.currentMap);

            L.marker([latitude, longitude]).addTo(cupboard.variables.currentMap);
        }, 1000);
    }

}


//GET Location Full Name
$("#geodistricts").keyup(function (e) {
    
    if ((e.keyCode >= 37 && e.keyCode <= 40) || e.keyCode == 13) {
        return;
    }

    main.getGeoDistricts($('#ul-geodistricts'), $(this).val(), main.variables.excludeCyprus);
    if ($(this).val().length < 3) {
        $('#ul-geodistricts').empty();
    }
});


$('#geodistricts').on('focus', function () {
    $(this).closest("div.search-content").find(".searchContent .dropdown").show();

    document.addEventListener("keydown", cupboard.keyDownBranchSearchField, false);
});

$('#geodistricts').on('focusout', function (e) {
    var el = $(this);
    setTimeout(function () {
        el.closest("div.search-content").find(".searchContent .dropdown").slideUp(400);
    }, 200);


    document.removeEventListener("keydown", cupboard.keyDownBranchSearchField, false);
    $("#ul-geodistricts li").removeAttr("selected");

});

//GET Parameters
$('body').on('click', '#ul-geodistricts li', function () {
    var cityId = $(this).attr('data-cityid');
    var townId = $(this).attr('data-countyid');
    var districtId = $(this).attr('data-districtId');
    $("#geodistricts").val($(this).attr('data-text'));
    $('#ul-geodistricts').empty();
    if (cityId && townId && cityId.length != 0 && townId.length != 0) {
        $("#geodistricts-hidden").val($(this).attr('data-text'));

        cupboard.getCupboards(cityId, townId, districtId);
    }
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

