var _registerService = {

    checkEmailUsed: {
        get: function (email, language) {
            return $.get("/service/checkemailused", { email: email, language: language});
        }
    },

    checkIdentityUsed: {
        get: function (tcNumber, language) {
            return $.get("/service/checkidentityused", { tcNumber: tcNumber, language: language});
        }
    },

    checkGsmUsed: {
        get: function (gsmNo, language) {
            return $.get("/service/checkgsmused", { gsmNo: gsmNo, language: language});
        }
    },

    validateidentity: {
        post: function (model, language) {
            return $.post("/service/validateidentity?language=" + language, model);
        }
    },

    userInformation: {
        post: function (userInformation) {
            return $.post("/account/RegisterUserInformation", userInformation);
        }
    },

    registration: {
        post: function (registrationModel) {
            return $.post("/account/Registration", registrationModel);
        }
    }
}
