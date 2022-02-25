<!DOCTYPE html>
<html lang="tr" xmlns="http://www.w3.org/1999/xhtml">
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <!-- /Added by HTTrack -->
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Postex</title>
    <link rel="shortcut icon" href="/favicon.jpg" type="image/x-icon" />
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="/assets/login//assets/css/bootstrap.min.css" />
    <!-- Owl Carousel -->
    <link href="/assets/login//assets/css/animation.css" rel="stylesheet" />
    <link href="/assets/login//assets/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="/assets/login//assets/css/owl.theme.default.min.css" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="/assets/login//assets/css/main3f56.css?v=11" />
    <link type="text/css" rel="stylesheet" href="/assets/login//assets/css/special3f56.css?v=11" />
    <link type="text/css" rel="stylesheet" href="/assets/login//assets/css/datepicker3f56.css?v=11" />
    <link href="/assets/login//assets/css/jalert3f56.css?v=11" rel="stylesheet" />
    <link href="/assets/login//assets/plugin/leaflet/leaflet.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link type="text/css" rel="stylesheet" href="/assets/login/assets/css/bootstrap.min.css" />
    <script src="/assets/login/Scripts/jquery.min.js"></script>
    <script src="/assets/login/Scripts/bootstrap.min.js"></script>   
  </head>
  <body class="special-page">
    <div class="overlay"></div>
    <div id="spinner" class="spinnerWrap">
      <div class="spinner">
        <img src="/assets/login//assets/img/preloader.gif" />
      </div>
    </div>
    <div id="spinner-loader" class="spinnerWrap" style="display:none">
      <div class="spinner">
        <img src="/assets/login//assets/img/preloader.gif" />
      </div>
    </div>
    <div class="wrapper">
      <div class="navbar" role="navigation" id="slide-nav">
          
      <header>

<div class="container-wrap">
    <div class="header-bottom ">
        <div class="space left">
            <div class="navbar-header">
                <a class="navbar-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="12" viewBox="0 0 17 12">
                        <path class="menu" fill-rule="nonzero" d="M1 7V5h15v2H1zm0-2h15c1.333 0 1.333 2 0 2H1C-.333 7-.333 5 1 5zm0 7v-2h15v2H1zm0-2h15c1.333 0 1.333 2 0 2H1c-1.333 0-1.333-2 0-2zm0-8V0h15v2H1zm0-2h15c1.333 0 1.333 2 0 2H1C-.333 2-.333 0 1 0z" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="middle">
            <div class="container-middle">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-10 header-logo">
                        <a href="{{route('account.corporate')}}"> <img src="/assets/img/logo.png" alt="Yurtiçi Kargo" class="logo" width="178" height="44" /></a>                        
                    </div>
                    <div class="col-lg-9 col-md-10 col-sm-10 col-xs-2 col-lg-offset-1">
                        <div class="right-form">
                            <div class="contact-form">
                                <a >
                                    <span>SUAL CAVAB</span>
                                </a>
                            </div>
                                <div class="member-info left-radius">
                                    <a id="btn-logouts" class="all-radius logout">
                                        <span>ÇIXIŞ</span>
                                    </a>
                                </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="space right"></div>
    </div>
</div>
<div class="customer-btn-wrap mobile">
    <h4>GİRİŞ/ QEYDİYYAT</h4>
    <a class="customer-btn-default all-radius" href="{{route('register.individual')}}">FƏRDİ</a>
    <a class="customer-btn-default all-radius" href="{{route('register.corporate')}}">KORPORATİV</a>
</div>
<div class="container-wrap container-wrap-content">
    <div class="space left"></div>
    <div class="middle">
        <div class="member-login">
            <p class="main-content-bold">
                @if (Auth::guard('customer')->check())
                    <div>
                        <b>
                            {{Auth::guard('customer')->user()->first_name.' '.Auth::guard('customer')->user()->last_name}}
                        </b>
                    </div>
                    <span>Kargo Hesabınıza xoş gəldiniz</span><a class="logout" href="#"> ( Çıxış )</a>
                @endif
            </p>
        </div>
    </div>
    <div class="space right"></div>
</div>
</header>
            <div id="page-content">
            <section class="middle-content">
            <!--Mobile Menu-->
            <nav>
              <div class="container-wrap">
                <div class="container-wrap-content">
                  <div class="space left"></div>
                  <div class="middle">
                    <div id="slidemenu" class="nav navbar-nav">
                      <ul class="depth-1">
                        <li>
                          <a  class="title">Əsas səhifə</a>
                        </li>
                        <li>
                          <a href="#" class="title">Bağlama əməliyyatları</a>
                          <a class="menu-toggle" href="#"></a>
                          <ul class="depth-2">
                            <li>
                              <a  class="title">Bağlama Göndər</a>
                            </li>
                            <li>
                              <a  class="title">Bağlamalarım</a>
                            </li>
                          </ul>
                        </li>
                        <li>
                          <a  class="title">Bağlamalarım hardadır ?</a>
                        </li>
                        <li>
                          <a href="#" class="title">Əlaqə & Filiallar</a>
                          <a class="menu-toggle" href="#"></a>
                          <ul class="depth-2">
                            <li>
                              <a  class="title">Əlaqə</a>
                            </li>
                            <li>
                              <a  class="title">Filial Axtarışı</a>
                            </li>
                          </ul>
                        </li>
                        <li>
                          <a  class="title">Hesabatlar</a>
                        </li>
                        <li>
                          <a href="#" class="title">Parametrlər</a>
                          <a class="menu-toggle" href="#"></a>
                          <ul class="depth-2">
                            <li>
                              <a  class="title">Üzvlük məlumatları</a>
                            </li>
                            <li>
                              <a  class="title">Adres Dəftərim</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="space right"></div>
                </div>
              </div>
            </nav>
            <div class="banner subpage-banner">
              <div class="top-mask">
                <img src="/assets/login/assets/img/top-mask.svg" alt=" " />
              </div>
              <div class="subpage-slide-wrap">
                <div class="subpage-slide " style="background-image:url(/assets/login/assets/img/bireysel-header-img.jpg); "></div>
              </div>
              <div class="bottom-mask">
                <img src="/assets/login/assets/img/bottom-mask.svg" alt=" " />
              </div>
            </div>
          </section>
        </div>
        <section>
          <div class="container-wrap-content subpage-content">
            <div class="space left"></div>
            <div class="middle">
              <div>
              <div id="sidebar">
                  <div class="sub-menu-wrap">
                    <div id="sub-menu-wrap">
                      <div class="menu-content small-right-radius">
                        <div id="sidebar-menu" class="sidebar-nav">
                          <div class="nav">
                            <ul class="depth-1">
                              <li>
                                <a href="{{route('home')}}" class="title">Əsas səhifə</a>
                              </li>
                              <li>
                                <a href="#" class="title">Bağlama əməliyyatları</a>
                                <a class="menu-toggle" href="#"></a>
                                <ul class="depth-2">
                                  <li>
                                    <a  class="title">Bağlama Göndər</a>
                                  </li>
                                  <li>
                                    <a  class="title">Bağlamalarım</a>
                                  </li>
                                </ul>
                              </li>
                              <li>
                                <a  class="title">Bağlamalarım hardadır ?</a>
                              </li>
                              <li>
                                <a href="#" class="title">Əlaqə & Filiallar</a>
                                <a class="menu-toggle" href="#"></a>
                                <ul class="depth-2">
                                  <li>
                                    <a  class="title">Əlaqə</a>
                                  </li>
                                  <li>
                                    <a class="title">Filial Axtarışı</a>
                                  </li>
                                </ul>
                              </li>
                              <li>
                                <a  class="title">Hesabatlar</a>
                              </li>
                              <li>
                                <a href="#" class="title">Parametrlər</a>
                                <a class="menu-toggle" href="#"></a>
                                <ul class="depth-2">
                                  <li>
                                    <a  class="title">Üzvlük məlumatları</a>
                                  </li>
                                  <li>
                                    <a  class="title">Adres Dəftərim</a>
                                  </li>
                                </ul>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <div class="content-wrap">
                  <div class="container-small">
                  
                    
                  <!-- content -->
                  @yield('content')
                  <!-- /content -->


                    <div class="modal fade" id="large-img-modal" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content all-radius">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            <img id="img-modal" src="/assets/login//assets/img/shipment-product/large/noimage.png" style="width:100%;height:100%;" onerror='this.src="/assets/login//assets/img/shipment-product/large/noimage.png"' />
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
                  <img src="/assets/login//assets/img/preloader.gif" />
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
                      <img src="/assets/login//assets/img/important.png" />
                    </i>
                   
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
                    <img src="/assets/login//assets/img/important.png" style="width:50px" />
                  </i>
                  
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
                     <span>Copyright © 2022 Posstex. Bütün hüquqları qorunur. </span>
                  </div>
                </div>
                
            </div>
            <div class="space right"></div>
          </div>
        </footer>
      </div>
      <input type="hidden" value="tr" name="language" id="language" />
      <script src="/assets/login/Scripts/jquery.min.js"></script>
      <script src="/assets/login/Scripts/bootstrap.min.js"></script>
      <script src="/assets/login/Scripts/lodash.min.js"></script>
      <script src="/assets/login/Scripts/owl.carousel.js"></script>
      <script src="/assets/login/Scripts/jquery.tmpl.min.js"></script>
      <script src="/assets/login/Scripts/service/service3f56.js?v=11"></script>
      <script src="/assets/login/Scripts/app-extend.js"></script>
      <script src="/assets/login/Scripts/resource/language-resource.js"></script>
      <script src="/assets/login/Scripts/page/main3f56.js?v=11"></script>
      <script src="/assets/login/Scripts/css-browser-selector.js"></script>
      <script src="/assets/login/Scripts/lodash.min.js"></script>
      <script src="/assets/login/Scripts/bootstrap-datepicker.js"></script>
      <script src="/assets/login/Scripts/bootstrap-datepicker.tr.js" charset="UTF-8"></script>
      <script src="/assets/login/Scripts/jquery.maskedinput.js" charset="UTF-8"></script>
      <script src="/assets/login/Scripts/jAlert.js"></script>
      <script src="/assets/login/Scripts/jTimeout.js"></script>
      <script src="/assets/login//assets/plugin/leaflet/leaflet.js"></script>
      <script src="/assets/login/Scripts/service/shipment-shipping-sender-service3f56.js?v=11"></script>
      <script src="/assets/login/Scripts/page/shipment-shipping-sender3f56.js?v=11"></script>
      <script src="/assets/login/Scripts/page/shipping-sender-step-one3f56.js?v=11"></script>
      <script src="/assets/login/Scripts/page/shipping-sender-step-two3f56.js?v=11"></script>
      <script src="/assets/login/Scripts/page/shipping-sender-step-three3f56.js?v=11"></script>
      <script src="/assets/login/Scripts/page/shipping-sender-step-four3f56.js?v=11"></script>
      <script src="/assets/login/Scripts/page/shipping-sender-step-five3f56.js?v=11"></script>
      <script src="/assets/js/custom.js"></script>
    </div>
  </body>
  <!-- Mirrored from bireysel.yurticikargo.com/Shipment/ShippingSender by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Feb 2022 10:03:54 GMT -->
</html>