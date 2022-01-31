var _serviceProvider = {
    shipmentsTracking: {
        getDetail: function (id, callback) {
            $.ajaxRequest("GET", "/shipment/ShipmentsTracking", { id: id }, callback);
        }
    },

    shipmentsTrackingAwb: {
        getDetail: function (id, callback) {
            $.ajaxRequest("GET", "/shipment/ShipmentsTrackingAwb", { id: id }, callback);
        }
    },

    shipmentsTrackingSearch: {
        getDetail: function (id, callback) {
            $.ajaxRequest("GET", "/shipment/ShipmentsTrackingSearch", { id: id }, callback);
        }
    },

    shipmentsTrackingMovement: {
        getDetail: function (id, callback) {
            $.ajaxRequest("GET", "/shipment/ShipmentTrackingMovement", { id: id }, callback);
        }
    },

    shipmentTrackingNotMine: {
        postDetail: function (id, callback) {
            $.ajaxRequest("POST", "/shipment/ShipmentTrackingNotMine", { id: id }, callback);
        }
    },

    geoDistricts: {
        getDetail: function (address, count, excludeCyprus, language) {
            return $.get("/service/geodistricts", { address: address, count: count, language: language, excludeCyprus: excludeCyprus });
        }
    },

    getBranchesByCityTown: {
        getDetail: function (cityId, countyId, districtId, language) {
            return $.get("/service/getbranchesbycitytown", { cityId: cityId, countyId: countyId, districtId: districtId, language: language });
        }
    },

    getBranches: {
        getDetail: function (branchId, language) {
            return $.get("/service/branches", { branchId: branchId, language: language });
        }
    },

    getGeoSearch: {
        getDetail: function (address, maxResultCount, language) {
            return $.get("/service/getgeosearch",
                { language: language, address: address, maxResultCount: maxResultCount });
        }
    },

    getGib: {
        getDetail: function (uniqueId, language) {
            return $.get("/service/getgib", { uniqueId: uniqueId, language: language });
        }
    },

    getBranchProduct: {
        getDetail: function (branchId, language) {
            return $.get("/service/branchproduct", { branchId: branchId, language: language });
        }
    },

    getBranchProductWorkingTimes: {
        getDetail: function (branchId, productId, dateTime, language) {
            return $.get("/service/branchproductworkingtimes",
                { branchId: branchId, productId: productId, dateTime: dateTime, language: language });
        }
    },

    postResetPassword: {
        getDetail: function (tcNumber, type, language) {
            return $.get("/service/resetpassword", { tcNumber: tcNumber, type: type, language: language });
        }
    },

    getMaskedGsmNumber: {
        getDetail: function (tcNumber, language) {
            return $.get("/service/getmaskedgsmnumber", { tcNumber: tcNumber, language: language });
        }
    },

    logout: {
        post: function () {
            return $.post("/account/Logout");
        }
    },

    getCities: {
        get: function (language) {
            return $.get("/service/getcities", { language: language });
        }
    },

    getUserCities: {
        get: function (callback) {
            $.ajaxRequest("GET", "/Setting/GetCities", {}, callback);
        }
    },

    getCounties: {
        get: function (cityId, language) {
            return $.get("/service/getcounties", { cityId: cityId, language: language });
        }
    },

    getUserCounties: {
        get: function (cityId, callback) {
            $.ajaxRequest("GET", "/Setting/GetCounties", { cityId: cityId }, callback);
        }
    },

    getAddressVerify: {
        get: function (address) {
            return $.get("/account/VerifyAddress", { address: address });
        }
    },

    approveClarification: {
        post: function () {
            return $.post("/Account/ApproveClarification");
        }
    }
}
