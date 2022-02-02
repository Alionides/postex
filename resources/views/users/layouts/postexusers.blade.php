<!DOCTYPE html>
<html lang="tr" xmlns="http://www.w3.org/1999/xhtml">
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <!-- /Added by HTTrack -->
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Yurtiçi Kargo - G&#246;nderi Yap</title>
    <link rel="shortcut icon" href="assets/login/favicon.ico" type="image/x-icon" />
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="assets/login/assets/css/bootstrap.min.css" />
    <!-- Owl Carousel -->
    <link href="assets/login/assets/css/animation.css" rel="stylesheet" />
    <link href="assets/login/assets/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/login/assets/css/owl.theme.default.min.css" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="assets/login/assets/css/main3f56.css?v=11" />
    <link type="text/css" rel="stylesheet" href="assets/login/assets/css/special3f56.css?v=11" />
    <link type="text/css" rel="stylesheet" href="assets/login/assets/css/datepicker3f56.css?v=11" />
    <link href="assets/login/assets/css/jalert3f56.css?v=11" rel="stylesheet" />
    <link href="assets/login/assets/plugin/leaflet/leaflet.css" rel="stylesheet" />
  </head>
  <body class="special-page">
    <div class="overlay"></div>
    <div id="spinner" class="spinnerWrap">
      <div class="spinner">
        <img src="assets/login/assets/img/preloader.gif" />
      </div>
    </div>
    <div id="spinner-loader" class="spinnerWrap" style="display:none">
      <div class="spinner">
        <img src="assets/login/assets/img/preloader.gif" />
      </div>
    </div>
    <div class="wrapper">
      <div class="navbar" role="navigation" id="slide-nav">
          
             @include('users.layouts.grid.header') 
            <div id="page-content">
            @include('users.layouts.grid.navbar')
        </div>
        <section>
          <div class="container-wrap-content subpage-content">
            <div class="space left"></div>
            <div class="middle">
              <div>
                @include('users.layouts.grid.sidebar')
              </div>
              <div>
                <div class="content-wrap">
                  <div class="container-small">
                  
                    
         <!-- content -->
         @yield('userscontent')
        <!-- /content -->


                    <div class="modal fade" id="large-img-modal" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content all-radius">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            <img id="img-modal" src="assets/login/assets/img/shipment-product/large/noimage.png" style="width:100%;height:100%;" onerror='this.src="assets/login/assets/img/shipment-product/large/noimage.png"' />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="space right"></div>
          </div>
        </section>
        <div class="modal fade" id="loadingErrorSuccessPopup" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content all-radius">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="loadingContent">
                  <img src="assets/login/assets/img/preloader.gif" />
                </div>
                <div class="successContent">
                  <h5 class="title-blue">Başarılı</h5>
                  <div class="center-start">
                    <i>
                      <?xml version="1.0" encoding="UTF-8" ?>
                      <svg width="43px" height="32px" viewBox="0 0 43 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs></defs>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                          <g transform="translate(-472.000000, -404.000000)" stroke-width="2" stroke="#44B74F">
                            <g transform="translate(433.000000, 292.000000)">
                              <polyline points="80.9900017 113 55.6091957 142.124475 40 127.454369"></polyline>
                            </g>
                          </g>
                        </g>
                      </svg>
                    </i>
                    <span class="modal-span-message"></span>
                  </div>
                </div>
                <div class="errorContent">
                  <h5 class="title-blue" id="error-content-title">Hata</h5>
                  <div class="center-start">
                    <i id="icon-error">
                      <svg width="36px" height="40px" viewBox="0 0 36 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs></defs>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                          <g transform="translate(-472.000000, -401.000000)" stroke="#BA0000" stroke-width="2">
                            <g transform="translate(433.000000, 292.000000)">
                              <g id="Group-11" transform="translate(40.000000, 110.000000)">
                                <path d="M33.7023523,0 L0.660830438,37.9151464"></path>
                                <path d="M33.7023523,0 L0.660830438,37.9151464" transform="translate(17.181591, 18.957573) scale(-1, 1) translate(-17.181591, -18.957573) "></path>
                              </g>
                            </g>
                          </g>
                        </g>
                      </svg>
                    </i>
                    <i id="icon-warning" style="display:none">
                      <img src="assets/login/assets/img/important.png" />
                    </i>
                    <span class="modal-span-message"></span>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <a id="loader-modal-ok-button" class="btn all-radius btn-loader-ok col-md-2 pull-right">Tamam</a>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="confirm-modal" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content all-radius">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <h5 class="title-blue" id="cofirm-modal-title"> Başarılı </h5>
                <div class="center-start">
                  <i>
                    <img src="assets/login/assets/img/important.png" style="width:50px" />
                  </i>
                  <span class="modal-span-message" id="span-cofirm-message"> Takip listem içinden kayıt silinecek onaylıyor musunuz ? </span>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn all-radius" id="btn-cofirm-ok">Tamam</button>
                <button type="button" class="btn all-radius" id="btn-confirm-cancel">İptal</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="map-modal" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content all-radius">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div id="google-map" style="height: 325px;"></div>
                <br />
                <br />
                <p>
                  <label>Adres: &nbsp;</label>
                  <span id="txtAddress"></span>
                </p>
                <p>
                  <label>İl: &nbsp;</label>
                  <span id="txtCity"></span>
                </p>
                <p>
                  <label>İlçe: &nbsp;</label>
                  <span id="txtCounty"></span>
                </p>
                <p>
                  <label>YK Şubesi: &nbsp;</label>
                  <span id="txtBranch"></span>
                </p>
                <div class="modal-footer">
                  <button type="button" class="btn all-radius" id="btn-map-ok">Tamam</button>
                  <button type="button" class="btn all-radius" data-dismiss="modal" id="btn-map-cancel">İptal</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer>
          <div class="container-wrap-content">
            <div class="space left"></div>
            <div class="middle">
              <div class="row footer-bottom">
                <div class="col-lg-6 col-md-8 col-sm-10 copyright-wrap">
                  <div class="copyright">
                    <img src="assets/login/assets/img/arikanli-holding.svg" alt="arikanli-holding" width="150" height="39" />
                    <span> Yurtiçi Kargo bir Arıkanlı Holding kuruluşudur. <br /> Copyright © 2017 Yurtiçi Kargo. Bütün hakları saklıdır. </span>
                  </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2  col-lg-offset-4 col-md-offset-2 designed-wrap">
                  <div class="designed">
                    <span>Designed by</span>
                    <img src="assets/login/assets/img/smartiks.svg" alt="smartiks" width="130" height="23" />
                  </div>
                </div>
              </div>
            </div>
            <div class="space right"></div>
          </div>
        </footer>
      </div>
      <input type="hidden" value="tr" name="language" id="language" />
      <script src="assets/login/Scripts/jquery.min.js"></script>
      <script src="assets/login/Scripts/bootstrap.min.js"></script>
      <script src="assets/login/Scripts/lodash.min.js"></script>
      <script src="assets/login/Scripts/owl.carousel.js"></script>
      <script src="assets/login/Scripts/jquery.tmpl.min.js"></script>
      <script src="assets/login/Scripts/service/service3f56.js?v=11"></script>
      <script src="assets/login/Scripts/app-extend.js"></script>
      <script src="assets/login/Scripts/resource/language-resource.js"></script>
      <script src="assets/login/Scripts/page/main3f56.js?v=11"></script>
      <script src="assets/login/Scripts/css-browser-selector.js"></script>
      <script src="assets/login/Scripts/lodash.min.js"></script>
      <script src="assets/login/Scripts/bootstrap-datepicker.js"></script>
      <script src="assets/login/Scripts/bootstrap-datepicker.tr.js" charset="UTF-8"></script>
      <script src="assets/login/Scripts/jquery.maskedinput.js" charset="UTF-8"></script>
      <script src="assets/login/Scripts/jAlert.js"></script>
      <script src="assets/login/Scripts/jTimeout.js"></script>
      <script src="assets/login/assets/plugin/leaflet/leaflet.js"></script>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async="async" src="https://www.googletagmanager.com/gtag/js?id=UA-119024172-2"></script>
      <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
          dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-119024172-2');
      </script>
      <script src="assets/login/Scripts/service/shipment-shipping-sender-service3f56.js?v=11"></script>
      <script src="assets/login/Scripts/page/shipment-shipping-sender3f56.js?v=11"></script>
      <script src="assets/login/Scripts/page/shipping-sender-step-one3f56.js?v=11"></script>
      <script src="assets/login/Scripts/page/shipping-sender-step-two3f56.js?v=11"></script>
      <script src="assets/login/Scripts/page/shipping-sender-step-three3f56.js?v=11"></script>
      <script src="assets/login/Scripts/page/shipping-sender-step-four3f56.js?v=11"></script>
      <script src="assets/login/Scripts/page/shipping-sender-step-five3f56.js?v=11"></script>
    </div>
  </body>
  <!-- Mirrored from bireysel.yurticikargo.com/Shipment/ShippingSender by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Feb 2022 10:03:54 GMT -->
</html>