var regionalDirectorates = {
    getRegionalDirectorates: function () {
        _serviceProvider.getRegionalDirectorates.getDetail(main.variables.language)
            .done(function (response) {
                if (response && response.ErrorMessage === undefined) {
                    $('#regional-directorates-accordion-wrap').find('div#regional-directorates-accordion-dynamic').html("");
                    var accordion = "";
                    var key = $("#googleApiKey").val();

                    $.each(response, function (index, item) {
                        var status = '';
                        var geo = item.Latitude + "," + item.Longitude;

                        accordion += '<div class="accordion-content-wrap-dynamic">' +
                            '<div class="accordion-toggle-dynamic all-radius center-between"><h4>' + item.Name + '</h4><div  class="main-title-soft center-between">' + status + ' </div></div>' +
                            '<div class="accordion-content-dynamic all-radius">' +
                            '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">' +
                            '<h6 class="main-title-bold">' + Resource.Address[main.variables.language] + '</h6>' +
                            '<p class="main-title-soft">' + item.Address + '</p>' +
                            '<h6 class="main-title-bold">' + Resource.Phone[main.variables.language] + '</h6>' +
                            '<p class="main-title-soft">' + item.PhoneNumber + ' </p> ' +
                            '</div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><iframe width="100%" height="150px" frameborder="0" style="border:0" src="' + key +
                            geo +
                            '" allowfullscreen=""></iframe></div>' +
                            '</div></div>';
                    });
                    $('#regional-directorates-accordion-wrap').find('div#regional-directorates-accordion-dynamic').html(accordion);

                } else {
                    if (response.ErrorMessage !== undefined) {
                        delay(function () {
                            main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                        }, 400);
                    }
                }
                regionalDirectorates.accordionDirectorateFunction();
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, Resource.BranchesByCityTownUnexpectedError[main.variables.language]);
            });
    },

    accordionDirectorateFunction: function () {
        $('#regional-directorates-accordion-dynamic .accordion-toggle-dynamic').on('click', function () {
            var element = this;

            var activeElements = $("#regional-directorates-accordion-dynamic > .accordion-content-wrap-dynamic div.active");
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
    }
};


$(function () {
    regionalDirectorates.getRegionalDirectorates();
});

$("#complaint-address").on('keyup', function (e) {
    if ($(this).val().length == 0) {
        $("#div-info").hide();
        $('#regional-directorates-single-accordion-dynamic .accordion-toggle-dynamic').addClass('active');
        $('#regional-directorates-single-accordion-dynamic .accordion-content-dynamic').css('display', 'block');
        $('.accordion-wrap').find('div.accordion-dynamic').show();
    }
});