var register = {

    checkEmailUsed: function (element) {
        if (element.val()) {
            delay(function () {
                _registerService.checkEmailUsed.get(element.val(), main.variables.language)
                    .done(function (response) {
                        if (response.ErrorMessage === undefined) {
                            if (response) {
                                main.loader(main.enums.loaderEnum.Error, "Belirtilen email adresi kayıtlıdır!");
                                $(element).val('').closest('div.form-group').removeClass('success').addClass('error');
                            } else {
                                $(element).closest('div.form-group').removeClass('error').addClass('success');
                            }
                        } else {
                            if (response.ErrorMessage !== undefined) {
                                main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                                $(element).val('').closest('div.form-group').removeClass('success').addClass('error');
                            }
                        }
                    })
                    .fail(function () {
                        main.loader(main.enums.loaderEnum.Error, main.variables.globalErrorMessage);
                        $(element).val('').closest('div.form-group').removeClass('success').addClass('error');
                    });
            }, 200);
        }
    },

    checkIdentityUsed: function (element) {
        if (element.val()) {
            delay(function () {
                _registerService.checkIdentityUsed.get(element.val(), main.variables.language)
                    .done(function (response) {
                        if (response.ErrorMessage === undefined) {
                            if (response) {
                                main.loader(main.enums.loaderEnum.Error, "T.C numarası daha önce kullanılmış.");
                                $(element).val('').closest('div.form-group').removeClass('success').addClass('error');
                            } else {
                                $(element).closest('div.form-group').removeClass('error').addClass('success');
                            }
                        } else {
                            if (response.ErrorMessage !== undefined) {
                                main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                                $(element).val('').closest('div.form-group').removeClass('success').addClass('error');
                            }
                        }
                    })
                    .fail(function () {
                        main.loader(main.enums.loaderEnum.Error, main.variables.globalErrorMessage);
                        $(element).val('').closest('div.form-group').removeClass('success').addClass('error');
                    });
            }, 200);
        }
    },

    checkGsmUsed: function (element) {
        if (element.val()) {
            delay(function () {
                _registerService.checkGsmUsed.get(element.val(), main.variables.language)
                    .done(function (response) {
                        if (response.ErrorMessage === undefined) {
                            if (response) {
                                main.loader(main.enums.loaderEnum.Error, "Belirtilen Gsm tel no kayıtlıdır!");
                                $(element).val('').closest('div.form-group').removeClass('success').addClass('error');
                            } else {
                                $(element).closest('div.form-group').removeClass('error').addClass('success');
                            }
                        } else {
                            if (response.ErrorMessage !== undefined) {
                                main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                                $(element).val('').closest('div.form-group').removeClass('success').addClass('error');
                            }
                        }
                    })
                    .fail(function () {
                        main.loader(main.enums.loaderEnum.Error, main.variables.globalErrorMessage);
                        $(element).val('').closest('div.form-group').removeClass('success').addClass('error');
                    });
            }, 200);
        }
    },

    userInformationPost: function () {
        var model = {
            Name: $('#input-name').val(),
            Surname: $('#input-surname').val(),
            Email: $('#input-email').val(),
            Phone: $('#input-phone-number').val(),
            TcNumber: $('#input-tck-number').val(),
            Birthday: $('#input-birthday').val()
        }

        _registerService.userInformation.post(model)
            .done(function (response) {
                if (response.ErrorMessage === undefined) {
                    if (response) {
                        $('#div-user-address-information').removeAttr('style');
                        main.submitAjaxForm($('#btn-user-information'), false);
                        $('#div-user-information *').attr("disabled", true);
                        main.moveView($('#div-user-address-information'));
                    } else {
                        main.loader(main.enums.loaderEnum.Error, "Kayıt bilgileri doğrulanamadı.");
                        main.submitAjaxForm($('#btn-user-information'), false);
                    }
                } else {
                    if (response.ErrorMessage !== undefined) {
                        main.submitAjaxForm($('#btn-user-information'), false);
                        main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                    }
                }
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, main.variables.globalErrorMessage);
            });

    },

    register: function () {

        var model = {
            AddressFunction: address.variables.AdressFunction,
            CityId: address.variables.CityId,
            CountyId: address.variables.CountyId,
            DistinctPoint: address.variables.DistinctPoint,
            DistrictName: address.variables.DistrictName,
            StreetName: address.variables.StreetName,
            SearchType: address.variables.SearchType,
            RequestedCampaignNotifications: $('#check-requested-campaign').prop("checked"),
            FullAddressText: $("#check-user-address-status").prop("checked") ? $('#complaint-description').val() : $('#address-readonly').text(),
            AddressDescription: $('#input-address-description').val(),
            BuildingNo: $('#input-building-number').val(),
            FaxNo: $('#input-fax').val(),
            Floor: $('#input-floor-number').val(),
            ShortName: $('#input-address-name').val(),
            TelNo: $('#input-phone').val(),
            CompanyName: $('#input-company-name').val(),
            DepartmentName: $('#input-department-name').val(),
            TaxNumber: $('#input-tax-number').val(),
            BuildingName: $('#input-building-name').val(),
            ApartmentNo: $('#input-flat-number').val()
        }

        _registerService.registration.post(model)
            .done(function (response) {
                if (response.ErrorMessage === undefined) {
                    if (response) {
                        main.submitAjaxForm($('#btn-user-save'), false);
                        main.loader(main.enums.loaderEnum.Success, "Kaydınız başarı ile alınmıştır. Geçici şifreniz gerekli tanımların yapılması sonrası en kısa sürede belirtmiş olduğunuz GSM nolu telefona sms ile gönderilecektir. ");

                        delay(function () {
                            main.redirectUrl("/account/login");
                        }, 1000);

                    } else {
                        main.submitAjaxForm($('#btn-user-save'), false);
                        main.loader(main.enums.loaderEnum.Error, "Kayıt işlemi yapılamadı. Lütden daha sonra tekrar deneyiniz.");
                    }
                } else {
                    if (response.ErrorMessage !== undefined) {
                        main.submitAjaxForm($('#btn-user-save'), false);
                        main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                    }
                }
            })
            .fail(function () {
                main.submitAjaxForm($('#btn-user-save'), false);
                main.loader(main.enums.loaderEnum.Error, main.variables.globalErrorMessage);
            });
    },

    getCities: function (element) {
        if (element) {
            _serviceProvider.getCities.get(main.variables.language)
                .done(function (response) {
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
                })
                .fail(function () {
                    main.loader(main.enums.loaderEnum.Error, main.variables.globalErrorMessage);
                });

        } else {
            $(element).empty();
        }
    },

    getCounties: function (element, cityId) {
        if (element) {
            _serviceProvider.getCounties.get(cityId, main.variables.language)
                .done(function (response) {
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
                    if (address.variables.CountyId != null) {
                        $(element).val(address.variables.CountyId).trigger('change');
                    }
                })
                .fail(function () {
                    main.loader(main.enums.loaderEnum.Error, main.variables.globalErrorMessage);
                });

        } else {
            $(element).empty();
        }
    }
}

$(function () {
    register.getCities($("#select-register-city"));
    main.moveView($('#div-user-information'));
});

$('#input-email').on('focusout', function () {
    if ($(this).val() != "" && $(this).val() != null) {
        var isEmail = main.checkIsEmail(this);
        if (isEmail) {
            $(this).closest(".form-group").find(".control-label").html("Email");
            register.checkEmailUsed($(this));
        } else {
            $(this).closest('div.form-group').removeClass('success').addClass('error').find(".control-label")
                .html("Geçersiz e-mail");
        }
    } else {
        $(this).closest(".form-group").find(".control-label").html("Email");
    }
});

$('#input-tck-number').on('focusout keyup', function () {
    if ($(this).val() != "" && $(this).val() != null) {
        var value = main.checkTcNum(this.value);
        if (value) {
            $(this).closest(".form-group").find(".control-label").html("T.C Kimlik No");
            register.checkIdentityUsed($(this));
        } else {
            $(this).closest('.form-group').removeClass('success').addClass('error').find(".control-label")
                .html("Geçersiz kimlik numarası");
        }
    } else {
        $(this).closest(".form-group").find(".control-label").html("T.C Kimlik No");
    }
});

$('#input-phone-number').on('focusout keyup', function () {
    if ($(this).val() != "" && $(this).val() != null) {
        if (main.checkPhone(this)) {
            $(this).closest(".form-group").find(".control-label").html("GSM no");
            register.checkGsmUsed($(this));
        } else {
            $(this).closest('div.form-group').removeClass('success').addClass('error').find(".control-label")
                .html("Geçersiz GSM no");
        }
    } else {
        $(this).closest(".form-group").find(".control-label").html("GSM no");
    }
});

$("#btn-user-information").click(function () {

    if ($(".clarification-check").prop("checked") != true) {
        $(".clarification-check").closest('div.form-group').addClass("error");
        $(".checkboxkmark").css("border", "solid 1px red");
    } else {
        $(".clarification-check").closest('div.form-group').removeClass("error");
        $(".checkboxkmark").css("border", "solid 1px gray");
    }

    if (main.selectedValidateInput($("#div-user-information"))) {
        main.submitAjaxForm($(this), true);
        register.userInformationPost();
    }
});

$('#check-user-contract').change(function () {
    $('#btn-user-save').attr('disabled', !$(this).prop("checked"));
});

$("#btn-user-save").click(function () {
    if (main.selectedValidateInput($("#div-user-address-information"))) {
      if (address.variables.SearchType == "1") {
            var elems = $('#address-readonly').html();
            if (elems == "") {
                $(this).attr("readonly", false);
                main.deleteButtonLoader(this, false);
                $("#input-address").closest('.form-group').addClass("error");
            } else {
                $(this).attr("readonly", true);
                main.addButtonLoader(this, false);
                address.getAddress($('#address-readonly').html(),true);
            }
      } else {
          $(this).attr("readonly", true);
          main.addButtonLoader(this, false);
          var addressText = $('#complaint-description').val() + " " + $("#select-county").find(":selected").text() + "/" + $("#select-register-city").find(":selected").text();
          address.getAddress(addressText, false);
        }

    }
});

$('#btn-map-ok').click(function () {
    $("#map-modal").modal("hide");
    main.submitAjaxForm($("#btn-user-save"), true);
    register.register();
});

$('#select-register-city').change(function () {
    address.variables.CityId = this.value;
    register.getCounties($('#select-county'), this.value);
});