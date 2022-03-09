$.ajaxSetup({ cache: false });

var isMobile = false; //initiate as false

// device detection
if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4))) {
    isMobile = true;
}

var main = {

    enums: {
        loaderEnum: {
            Loader: 1,
            Success: 2,
            Error: 3,
            RemoveLoader: 4,
            Warning: 5
        }
    },

    variables: {
        language: "tr",
        addressCount: isMobile ? 10 : 50,
        excludeCyprus: false,
        globalErrorMessage: "İşleminizde beklenmeyen bir hata oluştu. Lütfen daha sonra tekrar deneyiniz"
    },

    checkTcNum: function (value) {
        if (value === "00000000000") {
            return false;
        } else {
            value = value.toString();
            var isEleven = /^[0-9]{11}$/.test(value);
            var totalX = 0;
            for (var i = 0; i < 10; i++) {
                totalX += Number(value.substr(i, 1));
            }
            var isRuleX = totalX % 10 == value.substr(10, 1);
            var totalY1 = 0;
            var totalY2 = 0;
            for (var i = 0; i < 10; i += 2) {
                totalY1 += Number(value.substr(i, 1));
            }
            for (var i = 1; i < 10; i += 2) {
                totalY2 += Number(value.substr(i, 1));
            }
            var isRuleY = ((totalY1 * 7) - totalY2) % 10 == value.substr(9, 0);
            return isEleven && isRuleX && isRuleY;
        }

    },

    loader: function (status, message, action, url) {
        $('#confirm-modal').modal('hide');
        $("#loadingErrorSuccessPopup .modal-dialog").removeClass("loading");
        $("#loadingErrorSuccessPopup .modal-dialog").removeClass("success");
        $("#loadingErrorSuccessPopup .modal-dialog").removeClass("error");
        $('#loadingErrorSuccessPopup').modal('show');

        if (status === main.enums.loaderEnum.Loader) {
            $("#loadingErrorSuccessPopup .modal-dialog").addClass("loading");
        }
        if (action != null && url != null) {
            $("#loader-modal-ok-button").addClass("active-list").removeClass("pasive-item").html(action).attr("href", url);
        } else {
            $("#loader-modal-ok-button").removeClass("active-list").addClass("pasive-item");
        }
    },

    moveView: function (element) {
        var el = element;
        var elOffset = el.offset().top;
        var elHeight = el.height();

        var windowHeight = $(window).height();
        var offset;

        if (elHeight < windowHeight) {
            offset = elOffset - ((windowHeight / 2) - (elHeight / 2));
        }
        else {
            offset = elOffset;
        }
        var speed = 700;
        $('html, body').animate({ scrollTop: offset }, speed);

    },

    deleteCookie: function (name) {
        document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    },

    createCookie: function (name, value, days) {
        var expires;

        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        } else {
            expires = "";
        }
        document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
    },

    readCookie: function (name) {
        var nameEQ = encodeURIComponent(name) + "=";
        var ca = document.cookie.split(";");
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === " ") c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return decodeURIComponent(c.substring(nameEQ.length, c.length));
        }
        return null;
    },

    getQueryString: function (name) {
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    },

    getPathQueryString: function (order) {
        var pathArray = window.location.pathname.split("/");
        var pathOrder = pathArray[order];
        return pathOrder;
    },

    addLoader: function () {
        $("#spinner-loader").css("display", "block");
        $('body').delay(350).css({ 'overflow': 'visible' });
    },

    removeLoader: function () {
        $("#spinner-loader").css("display", "none");
        $('body').delay(350).css({ 'overflow': 'visible' });
    },

    getGeoDistricts: function (element, address, excludeCyprus) {
        if (address && address.length > 2) {
            delay(function () {
                _serviceProvider.geoDistricts.getDetail(address, main.variables.addressCount, excludeCyprus, main.variables.language)
                    .done(function (response) {
                        if (response && response.ErrorMessage === undefined) {
                            $(element).empty();
                            $(response).each(function () {
                                $(element).append($('<li>',
                                    {
                                        html: this.HighlightAddressText,
                                        'data-cityid': this.CityId,
                                        'data-countyid': this.CountyId,
                                        'data-districtid': this.DistrictId,
                                        'data-text': this.DistrictName + " " + this.CountyName + " " + this.CityName
                                    }
                                ));
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
            }, 200);
        } else {
            $(element).empty();
        }
    },

    setSelectedSlideMenuItem: function (currentUrl, customUrl) {
        var urlSlideMenuItem;
        if (customUrl) {
            urlSlideMenuItem = $("#sidebar-menu ul li").find('a[href="' + customUrl + '"]');
        } else {
            urlSlideMenuItem = $("#sidebar-menu ul li").find('a[href="' + currentUrl + '"]');
        }
        if (urlSlideMenuItem.length > 0) {
            var nextElement = $(urlSlideMenuItem).next("a.menu-toggle");
            urlSlideMenuItem.closest("li").addClass("active");
            $("#sidebar-menu .depth-1 .active").parentsUntil(".depth-1").parent("li").first().addClass("active");
            if (nextElement.length < 1) {
                urlSlideMenuItem.closest("li").addClass("active-menu");
            }
        }
        else {
            $("#sidebar-menu .depth-1 > li:first-child").addClass("active-menu");
        }
    },

    setSelectedSidebarMenuItem: function (currentUrl) {
        var urlMenuItem = $("#sidebar .sub-menu-wrap #sub-menu-wrap .menu-content ul li a[href='" + currentUrl + "']");

        if (urlMenuItem.length > 0) {
            var subMenus = urlMenuItem.parents("ul");

            subMenus.show();
            urlMenuItem.closest("li").addClass("selected");
            $("#sidebar .depth-1 .selected").parentsUntil(".depth-1").parent("li").addClass("active");
        }
    },

    accordionFunction: function () {
        $('.accordion').find('.accordion-toggle').click(function () {
            $(this).next().slideToggle('600');
            $(".accordion-content").not($(this).next()).slideUp('600');
        });
        $('.accordion-toggle').on('click', function () {
            var el = $(this);
            if (el.hasClass('active')) {
                el.removeClass('active');
            } else {
                $('.accordion-toggle').removeClass("active");
                $(this).addClass("active");
            }
        });

    },

    cargoFormOne: function () {
        var error = 0;
        $(".cargo-form-one .form-group").each(function () {
            var c = $(this).find("select,input");
            var f = $(this).find("select,input").prop("disabled");
            if (f == false) {
                if (c.val() == "") {
                    c.closest(".form-group").addClass("error");
                    error++;
                    c.on('change', function () {
                        main.cargoFormOne();
                    });
                    c.on('keyup', function () {
                        main.cargoFormOne();
                    });
                }
                else {
                    c.closest(".form-group").removeClass("error");
                }
            }
            else {
                c.closest(".form-group").removeClass("error");
            }
        });
        return error == 0;
    },

    localStorageSetItem: function (storage, model) {
        localStorage.setItem(storage, model);
    },

    localStorageGetItem: function (storage) {
        var response = localStorage.getItem(storage);
        return response;
    },

    localStorageRemoveItem: function (storage) {
        localStorage.removeItem(storage);
    },

    validateInput: function (formInput) {
        var inputToValidate;
        var result;
        if (formInput == false) {
            var validateInputs = $("[data-validate-type]");
            for (var i = 0; i < validateInputs.length; i++) {
                inputToValidate = validateInputs[i];
                result = main.startValidateInput(inputToValidate);
                if (!result) {
                    $(inputToValidate).closest(".form-group").addClass("error");
                }
                else {
                    $(inputToValidate).closest(".form-group").removeClass("error");
                }
            }
        }
        else {
            inputToValidate = formInput;
            result = main.startValidateInput(inputToValidate);
            if (!result) {
                $(inputToValidate).closest(".form-group").addClass("error");
            }
            else {
                $(inputToValidate).closest(".form-group").removeClass("error");
            }
        }
    },

    selectedValidateInput: function (element, notElement) {
        var inputToValidate;
        var result;
        var validateInputs = element.find("[data-validate-type]");
        for (var i = 0; i < validateInputs.length; i++) {
            inputToValidate = validateInputs[i];
            result = main.startValidateInput(inputToValidate);
            if (!result) {
                $(inputToValidate).closest(".form-group").addClass("error");
            }
            else {
                $(inputToValidate).closest(".form-group").removeClass("error");
            }
        }

        if (notElement) {
            notElement.find(".error").removeClass("error");
        }
        if (element.find('.error').length > 0) {
            return false;
        } else {
            return true;
        }
    },

    dotdotAdd: function (text, lengthToCut) {
        if (text.length > lengthToCut) {
            var cutted = text.substr(0, lengthToCut);
            return cutted + "...";
        }
        return text;
    },

    startValidateInput: function (elementInput) {
        var input = elementInput;
        var validateType = $(input).attr("data-validate-type");
        if (validateType) {
            switch (validateType) {
                case "required":
                    if (!main.checkEmpty(input)) {
                        return true;
                    }
                    return false;
                case "phone":
                    return main.checkPhone(input);
                case "number":
                    return main.checkNumber(input);
                case "stringonly":
                    if (!main.checkEmpty(input)) {
                        return main.checkOnlyString(input);
                    }
                    return false;
                case "required-datetime":
                    return main.checkDatetime(input);
                case "email":
                    if (!main.checkEmpty(input)) {
                        return main.checkIsEmail(input);
                    }
                    return false;
                case "shipmenttracking":
                    if (!main.checkEmpty(input)) {
                        var trackingValue = main.checkNumber(input);
                        if (trackingValue != false && trackingValue.length === 12 || trackingValue.length === 16) {
                            return true;
                        }
                        return false;
                    }
                    return false;
                case "tcnumber":
                    if (!main.checkEmpty(input)) {
                        return main.checkTcNum(input.value);
                    }
                    return false;
                case "name-surname":
                    if (!main.checkEmpty(input)) {
                        return main.checkNameSurname(input);
                    }
                    return false;
            }
        }
    },

    checkEmpty: function (element) {
        if (!element || !element.value || element.value.trim().length < 1) {
            return true;
        }
        return false;
    },

    checkTaxNumber: function (element) {
        if (!element || !element.value || element.value.trim().length === 10) {
            return true;
        }
        return false;
    },

    checkPhone: function (element) {
        if ((element.value.match("^5") && element.value.length === 10) || (element.value.match("^05") && element.value.length === 11)) {
            return true;
        }
        return false;
    },

    checkNumber: function (element) {
        if (element || element.value || element.value.length > 0) {
            var n = element.value;
            return !isNaN(parseFloat(n)) && isFinite(n);
        }
        return false;
    },

    checkOnlyString: function (element) {
        var word = element.value;
        if (!/[^a-zA-Z]/.test(word)) {
            return true;
        }
        return false;
    },

    checkIsEmail: function (element) {
        var emailValue = element.value;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test(emailValue);
    },

    checkDatetime: function (element) {
        var value = element.value;
        return !/Invalid|NaN/.test(new Date(value).toString());

    },

    checkNameSurname: function (element) {
        $(element).val($(element).val().trim());
        if ($(element).val().indexOf(' ') != -1) {
            return true;
        }
        return false;
    },

    addButtonLoader: function (element, isInput) {
        if (isInput == true) {
            $(element).addClass('input-loading').attr("disabled", "disabled");
        } else {
            $(element).addClass('spinner-wrap').attr("disabled", "disabled").append("<i class='spinner'></i>");
        }
    },

    deleteButtonLoader: function (element, isInput) {
        if (isInput == true) {
            $(element).removeClass('input-loading').removeAttr("disabled");
        } else {
            $(element).removeClass('spinner-wrap').removeAttr("disabled").find('.spinner').remove();
        }
    },

    submitAjaxForm: function (element, status) {
        if (status) {
            $("input").attr("readonly", true);
            $("select").attr("readonly", true);
            main.addButtonLoader(element, false);
        } else {
            $("input").attr("readonly", false);
            $("select").attr("readonly", false);
            main.deleteButtonLoader(element, false);
        }
    },

    redirectUrl: function (url) {
        window.location.href = url;
    },

    InputIsEmptyControl: function () {
        $('.form-group input,select,textarea').each(function () {
            $(this).closest(".form-group").removeClass("is-empty");
            var inputVal = $(this).val();
            if (inputVal == "" || inputVal == null) {
                $(this).closest(".form-group").addClass("is-empty");
            }
        });
    },

    leftMenuActive: function (element) {
        $("#sidebar .depth-1 li").removeClass("active");
        $("#slidemenu .depth-1 li").removeClass("active");
        $(element).addClass("active");
    },

    logout: function () {
        main.loader(main.enums.loaderEnum.Loader);
        _serviceProvider.logout.post()
            .done(function (result) {
                if (result) {
                    main.loader(main.enums.loaderEnum.Success, "Başarı ile çıkış yaptınız.Giriş sayfasına yönlendiriliyorsunuz.");
                    delay(function () {
                        window.location.replace("/account/login");
                    }, 1000);
                } else {
                    main.loader(main.enums.loaderEnum.Error, "Çıkış işleminde hata oldu.");
                }
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, "Çıkış işleminde hata oldu.");
            });

    },

    approveClarification: function () {
        $("#clarification-text").modal('hide');
        main.loader(main.enums.loaderEnum.Loader);
        _serviceProvider.approveClarification.post()
            .done(function (result) {
                if (result) {
                    main.loader(main.enums.loaderEnum.Success, "Üyelik sözleşmesini başarıyla onayladınız.");
                } else {
                    main.loader(main.enums.loaderEnum.Error, "İşleminizi gerçekleştirirken bir hata oluştu.");
                }
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, "İşleminizi gerçekleştirirken bir hata oluştu.");
            });

    },

    confirmModal: function (title, message, func) {
        $('#cofirm-modal-title').html(title);
        $('#span-cofirm-message').html(message);
        $('#btn-cofirm-ok').attr('onclick', func);
        $('#confirm-modal').modal('show');
    },

    popoverBind: function () {
        $('[data-toggle="popover"]').popover({
            trigger: 'hover',
            placement: 'top'
        });
    },

    addressListing: function (event) {
        var isValid = false;
        var char = [186, 191, 219, 220, 221, 222];
        var key = ['Ş', 'ş', 'i', 'İ', 'ç', 'Ç', 'ö', 'Ö', 'ü', 'Ü', 'ğ', 'Ğ', 'ı', 'I'];
        if ((event.which <= 90 && event.which >= 48) || $.inArray(event.which, char) >= 0) {
            isValid = true;
        } else if (event.which == 0 && $.inArray(event.key, key) >= 0) {
            isValid = true;
        } else if (event.which == 8 || event.which == 46) {
            isValid = true;
        }
        return isValid;
    },

    convertStringIsNullOrEmpty: function (value) {
        if (value == "null" || value == "" || value == null) {
            value = "";
            return value;
        } else {
            return value;
        }

    },

    sessionControl: function () {

        $.jTimeout({
            'onClickExtend': function (jTimeout) {
                $('.jAlert').closeAlert();
                window.localStorage.timeoutCountdown = 600;
                $('#curTime').val(600);
            },
            'extendOnMouseMove': true,
            'loginUrl': '/Account/LogoutSession',
            'logoutUrl': '/Account/LogoutSession'
        });

        var timer,
            setTimer = function () {
                timer = window.setInterval(function () {
                    $('#curTime').val(window.localStorage.timeoutCountdown);
                }, 1000);
            };
        setTimer();
    },

    htmlEncode: function(str){
        return String(str).replace(/[^\w. ]/gi, function (c) {
            return '&#' + c.charCodeAt(0) + ';';
        });
    }
};

$(function () {

    $.mask.definitions['0'] = '[0-9 ]';

    if ($('.date .form-control')) {
        $('.date .form-control')
            .datetimepicker({
                meridiem: [],
                weekStart: 2,
                format: "dd.mm.yyyy",
                todayBtn: true,
                language: "tr",
                minView: 2,
                forceParse: false
            })
            .mask("99.99.9999")
            .bind('click',
            function () {

                $(this).focus();
            });

    }

    $('body').on('keydown', '.date input', function (e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 9) {
            $('.datepicker.dropdown-menu:visible').css('display', '');
        }
    });

    $('a[href="#"]').click(function (e) {
        e.preventDefault();
    });

    //Section Tab
    $('[data-href]').click(function () {
        var href = $(this).attr('data-href');
        var isActive = $(href).hasClass('active-list');
        if (!isActive) {
            $('.all-radius.item.active').removeClass('active');
            $(this).closest('li.all-radius.item').addClass('active');
            $('.module-type-listing.active-list').removeClass('active-list');
            $(href).addClass('active-list');
        }
    });

    $("#slide-nav").on("click", '.navbar-toggle', function (e) {
        var selected = $(this).hasClass('slide-active');
        $(this).toggleClass('slide-active', !selected);
        $('#slidemenu').toggleClass('slide-active');
        $('.navbar, body, .navbar-header').toggleClass('slide-active');
        $(".slide-active .overlay").on("click", function () {
            $('.navbar-toggle,body,.navbar,.navbar-header,#slidemenu').removeClass("slide-active");
        });
    });

    $(window).on('resize', _.debounce(function () {
        if ($(window).width() > 767 && $('.navbar-toggle').is(':hidden')) {
            $('#slidemenu, body, .navbar, .navbar-header').removeClass('slide-active');
        }
    }, 200));

    //Member click
    $(".member-info").on("click", function () {
        $(".header-bottom,body").toggleClass("active");
    });
    //
    $(".tab-menu-icon-wrap").on("click", function () {
        $("body").toggleClass("active-tab");
        $(".active-tab .overlay").on("click", function () {
            $('body').removeClass("active-tab");
        });
    });

    $('html').click(function (e) {
        if (!$(e.target).is('.header-bottom') && !$(e.target).is('.header-bottom *')) {
            $('.header-bottom,body').removeClass("active");
        }
        //Menu click
        if (!$(e.target).is('.navbar-nav li *')) {
            $('.navbar-nav .title').removeClass("open");
            $('.navbar-nav .menu-toggle').removeClass("rotate");
            $('.navbar-nav .depth-2').removeClass("active").slideUp(400);
        }
        //Material form click
        if (!$(e.target).is('.form-group') && !$(e.target).is('.form-group *')) {
            $('.form-group').removeClass("is-focused");
        }
    });
    //Submenu  
    $('#slidemenu .menu-toggle').click(function (e) {
        e.preventDefault();
        var toggleButton = $(this);

        if (toggleButton.closest("li").hasClass('active')) {
            $(this).closest("li").removeClass("active");
            $(this).closest("ul").find("li").removeClass("active");

        } else {
            $(this).closest("ul").find("li").removeClass("active");
            toggleButton.closest("li").addClass('active');

        }
    });

    $('#sidebar .menu-toggle').click(function (e) { return false; });


    $("#sidebar .title,#sidebar .menu-toggle,#slidemenu a").hover(
        function () {
            $(this).closest("li").addClass("hover");
        }, function () {
            $(this).closest("li").removeClass("hover");
        }
    );

    //Language choose
    $("#selectpicker").hover(
        function () {
            $(this).addClass('active');
        },
        function () {
            $(this).removeClass('active');
        }
    );
    // Material form
    $('.form-group').click(function () {
        var el = $(this);
        if (!el.hasClass('is-focused')) {
            $('.form-group').removeClass("is-focused");
            $(this).addClass("is-focused");
        }
    });

    //$('.form-group input').keyup(function () {
    //    $(this).closest(".form-group").removeClass("is-empty");
    //    var inputVal = $(this).val();
    //    if (inputVal == "") {
    //        $(this).closest(".form-group").addClass("is-empty");
    //    }
    //});

    //$('.form-group select').on('change', function () {
    //    $(this).closest(".form-group").removeClass("is-empty");
    //    var selectBox = $(this).val();
    //    if (selectBox == "") {
    //        $(this).closest(".form-group").addClass("is-empty");
    //    }
    //});

    //$('.form-group textarea').keyup(function () {
    //    $(this).closest(".form-group").removeClass("is-empty");
    //    var inputVal = $(this).val();
    //    if (inputVal == "") {
    //        $(this).closest(".form-group").addClass("is-empty");
    //    }
    //    else {
    //        $(this).closest(".form-group").removeClass("is-empty");
    //    }
    //});

    main.popoverBind();

    //Graphic action
    $.fn.isInViewport = function () {
        var infoGraphicTop = $(".info-graphic-top");
        if (infoGraphicTop.length > 0) {
            var elementTop = $(".info-graphic-top").offset().top; // offset() ile nesnelerin left- top özelliğini öğreniriz
            var elementBottom = elementTop + $(".info-graphic-top").height(); //innerHeight = height + padding  -   outerHeight = height + padding + border

            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();

            return elementBottom > viewportTop && elementTop < viewportBottom;
        }
    };
    $(window).on('scroll load', _.debounce(function () {
        if ($(".info-graphic-top").isInViewport()) {
            $('.info-graphic-top').addClass("view");
        } else {
            $('.info-graphic-top').removeClass("view");
        }
    }, 200));

    main.accordionFunction();

    main.setSelectedSlideMenuItem(window.location.pathname);

    if (main.getPathQueryString(1) != "Account" && main.getPathQueryString(1) != "account") {
        main.sessionControl();
    }

});

$(window).on('load', function () {
    $("#spinner").css("display", "none");
    $('body').css({ 'overflow': 'visible' });
});

var delay = (function () {
    var timer = 0;
    return function (callback, ms) {
        clearTimeout(timer);
        timer = setTimeout(callback, ms);
    };
})();

$("input[data-validate-type]:not([data-validate-type=name-surname],[data-validate-type=tcnumber])").on("keyup focusout", function () {
    main.validateInput(this);
});

$("body").bind("paste", "input[type=number],input[data-input-type=number]", function (e) {
    var clipboardData = e.originalEvent.clipboardData;
    if (!clipboardData) {
        clipboardData = window.clipboardData;
    }
    if (clipboardData && clipboardData.getData) {
        var pastedData = clipboardData.getData('text');
        pastedData = pastedData.replace(',', '.');
        clipboardData.setData("text", pastedData);
        if (!$.isNumeric(pastedData) || pastedData < 0) {
            e.preventDefault();
        }
    }
    delay(function () {
        main.InputIsEmptyControl();
    }, 0);
});

$('body').on("keyup keydown", 'input[type=number],input[data-input-type=number]', function (e) {
    var chracters = [48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 8, 46, 17, 9, 37, 39];
    var values = ['é', '!', "'", '"', '#', '+', '£', '@', '€', '$', '%', '½', '&', '/', '{', '(', '[', ')', ']', '=', '}', '?', '\\', '*', '-', '_', '|`', '<', '>', ',', ';', '.', ':', '*'];

    if (e.ctrlKey && (e.which === 67 || e.which === 86 || e.which === 88)) {
    } else if ($(this).attr('data-type') == "kg" && !e.altKey && !e.shiftKey && !e.ctrlKey && !e.metaKey && (e.which === 188 || e.which === 110 || e.which === 190)) {
    } else if (((e.shiftKey || e.altKey || e.ctrlKey || e.metaKey) && $.inArray(e.which, chracters) > -1) || $.inArray(e.which, chracters) < 0) {
        if ((e.target.value == '^' || e.target.value == '`' || e.target.value == '¨' || e.target.value == '~' || e.target.value == '´') && ($.inArray(e.which, chracters) < 0 || $.inArray(e.target.value, values) > -1)) {
            e.target.value = '';
        } else if ($.inArray(e.target.value, values) > -1) {
            e.target.value = '';
        }
        e.preventDefault();
    } if ((e.shiftKey || e.altKey) && e.which != 16 && e.which != 18 && (e.which === 188 || e.which === 110 || e.which === 190 || $.inArray(e.which, chracters) < 0 || $.inArray(e.target.value, values) > -1)) {
            e.target.value = '';
        e.preventDefault();
    }
    if (e.target.value.indexOf('^') > -1) {
        e.target.value = e.target.value.replace('^', '');
    } if(e.target.value.indexOf('~') > -1) {
        e.target.value = e.target.value.replace('~', '');
    } if (e.target.value.indexOf('`') > -1) {
        e.target.value = e.target.value.replace('`', '');
    } if (e.target.value.indexOf('´') > -1) {
        e.target.value = e.target.value.replace('´', '');
    } if (e.target.value.indexOf('¨') > -1) {
        e.target.value = e.target.value.replace('¨', '');
    }
});

$("input[type=email]").on("focusout", function () {
    var isEmail = main.checkIsEmail(this);
    if (isEmail) {
        $(this).closest('div').removeClass("error").find('div.tooltip-wrap a[data-toggle="popover"]').popover('hide');
    } else {
        $(this).closest('div').addClass("error").find('div.tooltip-wrap a[data-toggle="popover"]').popover('show');
    }
});

$("#sidebar .depth-1 li").click(function () {
    main.leftMenuActive($(this));
});

$("#slidemenu .depth-1 li").click(function () {
    main.leftMenuActive($(this));
});

$(".last-version-wrap .close").click(function () {
    $(this).closest(".last-version-wrap").slideToggle("slow");
    $(".quick-access-wrap input").removeClass("active");
});

$("#btn-logout").click(function () {
    main.logout();
});

$("#btn-approve-clarification-text").click(function () {

    if ($(".clarification-check").prop("checked") != true) {
        $(".clarification-check").closest('div.form-group').addClass("error");
        $(".checkboxkmark").css("border", "solid 1px red");
        return;
    } else {
        $(".clarification-check").closest('div.form-group').removeClass("error");
        $(".checkboxkmark").css("border", "solid 1px gray");
        main.approveClarification();
    }

});

$("#loader-modal-ok-button").click(function () {
    $('#loadingErrorSuccessPopup').modal('hide');
});

$("#btn-confirm-cancel").click(function () {
    $('#confirm-modal').modal('hide');
});

$('#loadingErrorSuccessPopup').on('hidden.bs.modal', function (e) {
    $(this).find('div.modal-dialog').removeClass('error');
});

$('body').on('change keydown keyup keypress', 'input,select,textarea', function () {
    main.InputIsEmptyControl();
});

$('body').on('focusout', 'input[data-validate-type=name-surname]', function () {
    if ($(this).val() != "" && $(this).val() != null) {
        $(this).val($(this).val().trim());
        if ($(this).val().indexOf(' ') == -1) {
            $(this).closest('.form-group').addClass('error').find(".control-label").html("Geçersiz Ad Soyad");
        } else {
            $(this).closest('.form-group').removeClass('error').find(".control-label").html("Alıcı Ad ve Soyad");
        }
    } else {
        $(this).closest('.form-group').removeClass('error').find(".control-label").html("Alıcı Ad ve Soyad");
    }
});

$(document).on("wheel", "input[type=number]", function (e) {
    $(this).blur();
});