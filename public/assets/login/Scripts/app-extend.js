$.ajaxRequest = function (type, url, data, callback, element) {

    $.ajax({
        url: url,
        data: data,
        type: type,
        beforeSend: function () {
            $.jTimeout.reset();
            $('#curTime').val(window.localStorage.timeoutCountdown);
            main.addLoader();
        },
        complete: function () {
            main.removeLoader();
        },
        success: function (response, status, xhr) {
            if (response.ErrorMessage !== undefined) {
                main.removeLoader();
                main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
            }
            if (xhr.responseJSON != undefined && xhr.responseJSON.Status !== undefined) {
                main.redirectUrl("/Account/Login?returnUrl=" + xhr.responseJSON.RedirectUrl);
            }
            else {
                callback(response);
            }
        },
        error: function () {
            if (element) {
                main.submitAjaxForm(element, false);
            }
            main.loader(main.enums.loaderEnum.Error, main.variables.globalErrorMessage);
        }
    });
};