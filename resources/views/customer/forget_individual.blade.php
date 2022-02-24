<!DOCTYPE html>
<html lang="tr" xmlns="http://www.w3.org/1999/xhtml">
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Yurtiçi Kargo - &#220;ye Ol</title>
      <link rel="shortcut icon" href="/favicon.jpg" type="image/x-icon" />
      <!-- Bootstrap -->
      <link type="text/css" rel="stylesheet" href="/assets/login/assets/css/bootstrap.min.css" />
      <!-- Owl Carousel -->
      <link href="/assets/login/assets/css/animation.css" rel="stylesheet" />
      <link href="/assets/login/assets/css/owl.carousel.min.css" rel="stylesheet" />
      <link href="/assets/login/assets/css/owl.theme.default.min.css" rel="stylesheet" />
      <link type="text/css" rel="stylesheet" href="/assets/login/assets/css/main3f56.css?v=11" />
      <link type="text/css" rel="stylesheet" href="/assets/login/assets/css/special3f56.css?v=11" />
      <link type="text/css" rel="stylesheet" href="/assets/login/assets/css/datepicker3f56.css?v=11" />
      <link href="/assets/login/assets/css/jalert3f56.css?v=11" rel="stylesheet" />
      <link href="/assets/login/assets/plugin/leaflet/leaflet.css" rel="stylesheet" />
      <link href="/assets/login/Content/page/register3f56.css?v=11" rel="stylesheet" />
      <link rel="stylesheet" href="/assets/css/custom.css">

   </head>
   <body class="special-page">
      <div class="overlay"></div>
      <div id="spinner" class="spinnerWrap">
         <div class="spinner">
            <img src="/assets/login/assets/img/preloader.gif" />
         </div>
      </div>
      <div id="spinner-loader" class="spinnerWrap" style="display:none">
         <div class="spinner">
            <img src="/assets/login/assets/img/preloader.gif" />
         </div>
      </div>
      <div class="wrapper">
         <div class="navbar" role="navigation" id="slide-nav">
            <header>
               <div class="container-wrap">
                  <div class="header-bottom member-info-logout">
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
                                 <a href="/assets/login/index.html"> <img src="/assets/login/assets/img/logo.svg" alt="Yurtiçi Kargo" class="logo" width="178" height="44" /></a>
                              </div>
                              <div class="col-lg-9 col-md-10 col-sm-10 col-xs-2 col-lg-offset-1">
                                 <div class="right-form">
                                    <div class="contact-form">
                                       <a href="/assets/login/Help.html">
                                       <span>S.S.S.</span>
                                       </a>
                                    </div>
                                    <div class="member-info  left-radius">
                                       <a href="Login.html" class="all-radius">
                                       <span>GİRİŞ</span>
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
              
               <div class="container-wrap container-wrap-content">
                  <div class="space left"></div>
                  <div class="middle">
                     <div class="member-login">
                        <p class="main-content-bold">
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
                                       <a href="/assets/login/index.html" class="title">Ana səhifə</a>
                                    </li>
                                    <li>
                                       <a href="#" class="title">Şifrəmi Uunutdum</a>
                                       <a class="menu-toggle" href="#"></a>
                                       <ul class="depth-2">
                                          <li><a  class="title">Gönderi Yap</a></li>
                                          <li><a  class="title">Gönderilerim</a></li>
                                       </ul>
                                    </li>
                                    <li>
                                       <a  class="title">Kargom Nerede ?</a>
                                    </li>
                                    <li>
                                       <a href="#" class="title">İletişim & Şubeler</a>
                                       <a class="menu-toggle" href="#"></a>
                                       <ul class="depth-2">
                                          <li><a  class="title">Bize Ulaşın</a></li>
                                          <li><a  class="title">Şube Arama</a></li>
                                          <li><a  class="title">Mesaj Gönder</a></li>
                                       </ul>
                                    </li>
                                    <li>
                                       <a  class="title">Raporlar</a>
                                    </li>
                                    <li>
                                       <a href="#" class="title">Ayarlar & Tanımlar</a>
                                       <a class="menu-toggle" href="#"></a>
                                       <ul class="depth-2">
                                          <li><a href="/assets/login/Setting/UserInfo.html" class="title">Üyelik Bilgileri</a></li>
                                          <li><a href="/assets/login/Setting/AddressList.html" class="title">Adres Defterim</a></li>
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
                        <div class="subpage-slide " style="background-image:url(assets/login/assets/img/bireysel-header-img.jpg); ">
                        </div>
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
                                                <a href="/assets/login/index.html" class="title">Ana səhifə</a>
                                             </li>
                                             <li>
                                                <a href="#" class="title">Gönderi İşlemleri</a>
                                                <a class="menu-toggle" href="#"></a>
                                                <ul class="depth-2">
                                                   <li><a href="/assets/login/Shipment/ShippingSender.html" class="title">Gönderi Yap</a></li>
                                                   <li><a href="/assets/login/Shipment/CreateQuery.html" class="title">Gönderilerim</a></li>
                                                </ul>
                                             </li>
                                             <li>
                                                <a href="/assets/login/Shipment/Tracking.html" class="title">Kargom Nerede ?</a>
                                             </li>
                                             <li>
                                                <a href="#" class="title">İletişim & Şubeler</a>
                                                <a class="menu-toggle" href="#"></a>
                                                <ul class="depth-2">
                                                   <li><a href="/assets/login/Contact/ContactUs.html" class="title">Bize Ulaşın</a></li>
                                                   <li><a href="/assets/login/Contact/SearchUnit.html" class="title">Şube Arama</a></li>
                                                   <li><a href="/assets/login/Contact/Support.html" class="title">Mesaj Gönder</a></li>
                                                </ul>
                                             </li>
                                             <li>
                                                <a href="/assets/login/Reporting/CreateQuery.html" class="title">Raporlar</a>
                                             </li>
                                             <li>
                                                <a href="#" class="title">Ayarlar & Tanımlar</a>
                                                <a class="menu-toggle" href="#"></a>
                                                <ul class="depth-2">
                                                   <li><a href="/assets/login/Setting/UserInfo.html" class="title">Üyelik Bilgileri</a></li>
                                                   <li><a href="/assets/login/Setting/AddressList.html" class="title">Adres Defterim</a></li>
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
                              <h3 class="slideTitle">Şifrəmi Uunutdum</h3>
                              <div class="breadcrumb-wrap">
                                 <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                       <ul class="list-unstyled">
                                          <li><a >Ana səhifə</a></li>
                                          <li class="active"><a>Şifrəmi Uunutdum</a></li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              <div class="all-radius sender-address-detail create-query" id="div-user-information">
                                 <div class="col-lg-12 col-md-12">
                                    <h5 class="title-blue">Şifrənizi daxil edin</h5>
                                 </div>
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating is-empty">
                                       <label class="control-label" for="input-name">Yeni şifrə</label>
                                       <input name="password" class="form-control all-radius" data-validate-type="required" tabindex="1" autocomplete="off" id="password" type="password" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="30" minlength="3">
                                       <div class="tooltip-wrap">
                                          <a data-toggle="popover" data-content="Şifrə (ən az 2 simvol)">
                                             <svg class="info" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20">
                                                <g fill="none" fill-rule="evenodd" transform="translate(1 1)">
                                                   <rect width="2" height="8" x="8" y="6.878" fill="#ee7d00" rx="1"></rect>
                                                   <rect width="2" height="2" x="8" y="2.981" fill="#ee7d00" rx="1"></rect>
                                                   <rect width="18" height="18" stroke="#ee7d00" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" rx="4"></rect>
                                                </g>
                                             </svg>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating is-empty">
                                       <label class="control-label" for="input-surname">Yeni şifrənin təkrarı </label>
                                       <input name="confirmpassword" class="form-control all-radius" data-validate-type="required" tabindex="2" autocomplete="off" id="repeatpassword" type="password" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="30" minlength="2">
                                       <input name="token" type="hidden" value="{{ Route::input('token') }}">
                                       <div class="tooltip-wrap">
                                          <a data-toggle="popover" data-content="Şifrənin təkrarı (ən az 2 simvol)">
                                             <svg class="info" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20">
                                                <g fill="none" fill-rule="evenodd" transform="translate(1 1)">
                                                   <rect width="2" height="8" x="8" y="6.878" fill="#ee7d00" rx="1"></rect>
                                                   <rect width="2" height="2" x="8" y="2.981" fill="#ee7d00" rx="1"></rect>
                                                   <rect width="18" height="18" stroke="#ee7d00" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" rx="4"></rect>
                                                </g>
                                             </svg>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                       <button type="button" id="btn-user-information" tabindex="7" class="resetpassword btn all-radius">DAVAM ET</button>
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
            <footer>
               <div class="container-wrap-content">
                  <div class="space left"></div>
                  <div class="middle">
                  <div class="row footer-bottom">
                     <div class="col-lg-6 col-md-8 col-sm-10 copyright-wrap">
                        <div class="copyright">
                           <span>
                           Copyright © 2022 Postex. Bütün hüquqları qorunur.
                           </span>
                        </div>
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
         <script src="/assets/login/assets/plugin/leaflet/leaflet.js"></script>
         <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      </div>

      <script>
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });

         //resetpassword
         $('.resetpassword').click('onclick',function(){
            
             var data = {
                 'password': $('input[name=password]').val(),
                 'confirmpassword': $('input[name=confirmpassword]').val(),
                 'token': $('input[name=token]').val(),
             };
                 $.ajax({
                     type: 'post',
                     url: "{{ route('forgetpassword')}}",
                     data:data,                    
                     success: function(response) {  
                        Swal.fire({
                            icon: 'success',
                            title: 'Uğurlu',
                            text: response.message,
                            showCancelButton: false,
                            showConfirmButton: false
                        })                                     
                     },
                     error: function(xhr, status, error){
                         Swal.fire({
                            icon: 'error',
                            title: 'Xəta',
                            text: xhr.responseJSON.message,
                            showCancelButton: false,
                            showConfirmButton: false
                        })
                     }
                 });        
         })
      </script>
   </body>
</html>