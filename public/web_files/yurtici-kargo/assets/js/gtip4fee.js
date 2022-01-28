
var gtip = {
    getGtipSearch: function () {
        var model = gtip.getGtipModel();
        main.addButtonLoader($('.gtip-search'));
        _serviceProvider.getGtipSearch.getCall(model.hs_search, model.hs_param_type, main.variables.language)
            .done(function (response) {
                $('.results-area').html('');
                $(".gtip-disclaimer").hide();
                if (response instanceof Array) {
                    $.each(response, function (key, value) {
                        var template = 
                            main.variables.language == "tr" ? 
                            '<div class="col-lg-12 result-item">' +
                            '<div class="hs-row row"><div class="col-lg-3 result-title">' + Resource.HsCode[main.variables.language] + '</div>' +
                            '<div class="col-lg-9 result-content">' + value.hsCode + '</div ></div>' +
                            '<div class="hs-row row"><div class="col-lg-3 result-title">' + Resource.HsCodeDescription[main.variables.language] + '</div > ' +
                            '<div class="col-lg-9 result-content">' + value.hsCodeExplanation + '</div></div>' +
                            '<div class="hs-row row"><div class="col-lg-3 result-title">' + Resource.HsCodeDescriptionEng[main.variables.language] + '</div > ' +
                            '<div class="col-lg-9 result-content">' + value.hsCodeExplanationEng + '</div></div>' +
                            '</div>' 
                            : 
                            '<div class="col-lg-12 result-item">' +
                            '<div class="hs-row row"><div class="col-lg-3 result-title">' + Resource.HsCode[main.variables.language] + '</div>' +
                            '<div class="col-lg-9 result-content">' + value.hsCode + '</div ></div>' +
                            '<div class="hs-row row"><div class="col-lg-3 result-title">' + Resource.HsCodeDescriptionEng[main.variables.language] + '</div > ' +
                            '<div class="col-lg-9 result-content">' + value.hsCodeExplanationEng + '</div></div>' +
                            '<div class="hs-row row"><div class="col-lg-3 result-title">' + Resource.HsCodeDescription[main.variables.language] + '</div > ' +
                            '<div class="col-lg-9 result-content">' + value.hsCodeExplanation + '</div></div>' +
                            '</div>';
                        $('.results-area').append(template);
                        $(".gtip-disclaimer").show();
                    });
                } else if (response.ErrorMessage) {
                    main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                } else {
                    main.loader(main.enums.loaderEnum.Error, Resource.GenericUnexpectedError[main.variables.language]);
                }
                main.deleteButtonLoader($('.gtip-search'));
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, Resource.GenericUnexpectedError[main.variables.language]);
                main.deleteButtonLoader($('.gtip-search'));
            });
    },

    getGtipModel: function () {

        var model = {
            "hs_search": $(".search-value").val(),
            "hs_param_type": $(".gtip-type").val()
        };

        return model;
    },
}

$(".gtip-search").click(function () {
    main.validateInput(false);

    var unvalidateInputs = $(".form-group.error");
    if (unvalidateInputs.length == 0) {
        gtip.getGtipSearch();
    }
});

$("#gtip-type").change(function () {
    $('.results-area').html('');
    $("#search-value").val('');
    $(".gtip-disclaimer").hide();
});