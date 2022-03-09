<!DOCTYPE html>

<html lang="tr" xmlns="http://www.w3.org/1999/xhtml">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Postex</title>
    <link rel="shortcut icon" href="/favicon.jpg" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="/assets/login//assets/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="/assets/login//assets/css/main3f56.css?v=11" />
    <link type="text/css" rel="stylesheet" href="/assets/login//assets/css/login3f56.css?v=11" />
</head>

<body class="login-page">
    <div class="overlay"></div>
    <div class="wrapper">
        <div class="navbar" role="navigation" id="slide-nav">
            <header>
                <div class="container-wrap">
                    <div class="header-bottom">
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
                                        <a href="{{ route('home')}}"> <img src="/assets/img/logo.png" alt="Postex" class="logo" width="178" height="44" /></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="space right"></div>
                    </div>
                </div>
            </header>

            <div id="page-content">
                <section class="middle-content">
                    <nav>
                        <div class="container-wrap">
                            <div class="container-wrap-content">
                                <div class="space left"></div>
                                <div class="space right"></div>
                            </div>
                        </div>
                    </nav>
                    <div class="banner subpage-banner">
                    </div>
                </section>
            </div>
            <section>
                <div class="container-wrap-content">
                    <div class="space left"></div>
                    <div class="middle">
                        <div class="login-wrap col-lg-10 col-md-12 col-sm-12 col-xs-12">
                            <div class="login-form">

                                <div class="all-radius login-form-wrap">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h5 class="title-blue"> Giriş</h5>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <p class="main-content-bold">Postex fərdi hesabına xoş gəldiniz.</p>
                                    </div>

                                    <div class="login-first-step">

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label" for="input-username">Elektron-poçt</label>
                                                <input class="form-control all-radius" type="text" name="email">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label" for="input-password">Şifrə</label>
                                                <input class="form-control all-radius" type="password" name="password">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="radio radio-primary check">
                                                    <label>
                                                        <input type="checkbox" name="remember-storage" id="remember-storage" value="true" />
                                                        <span class="circle"></span>
                                                        <span class="check"></span>Məni Xatırla
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="sms-code-wrapper" style="display:none;">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <p class="main-content-bold" id="sms-reference-code"></p>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="input-sms-wrapper">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label" for="input-username">SMS Kodu</label>
                                                <input class="form-control all-radius" id="input-sms-code" autocomplete="off" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6" minlength="6" />
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <p class="main-content-bold" id="countdown"></p>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 resend-sms" style="display:none">
                                            <div class="form-group">
                                                <button type="button" id="btn-send-sms-again" class="btn all-radius">Tekrar Gönder</button>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 verify-sms">
                                            <div class="form-group">
                                                <button type="button" id="btn-validate-sms" class="btn all-radius">Doğrula</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 login-button">
                                        <div class="form-group">
                                            <button type="button" id="btn-login" class="btn all-radius">Giriş</button>
                                        </div>
                                    </div>
                                    <div class="login-first-step">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <p class="main-content-bold">Bir hesabınız yoxdu?</p>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <a href="{{ route('register.individual') }}" class="member"><span>Qeydiyyat</span></a>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <a id="btn-forgot-password" class="member"><span>Şifrəmi Unuttum</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="space right"></div>
                </div>
            </section>
            <div class="modal fade" id="loadingErrorSuccessPopup" data-backdrop="static" aria-hidden="true" role="dialog">
                <div class="modal-dialog">
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
                                <h5 class="title-blue">Hata</h5>
                                <div class="center-start">
                                    <i>
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
                                    
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>

            <div id="forgotpassword" class="modal fade create-query" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-hidden="true">
                <div class="modal-dialog forgotpassword">
                    <div class="modal-content all-radius">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div class="col-lg-8 com-md-8 col-sm-12 col-xs-12 col-lg-offset-2">
                                <h5 class="title-blue">Şifremi unuttum</h5>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-8 com-md-8 col-sm-12 col-xs-12 col-lg-offset-2">
                                <div class="text-center" id="div-call-center">
                                    <p>
                                        Parolanızı unuttuysanız, buradan sıfırlayabilirsiniz.
                                    </p>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label" for="tcnumber">Kayıtlı TC Numaranız</label>
                                                <input class="form-control all-radius input-lg" tabindex="1" data-validate-type="tcnumber" autocomplete="off" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="11" minlength="11" id="tcnumber" type="number" />
                                                <div class="tooltip-wrap">
                                                    <a data-toggle="popover" data-content="Geçerli bir T.C Numarası giriniz.">
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
                                            <div class="form-group " style="display:none">
                                                <input class="form-control all-radius input-lg" tabindex="2" placeholder="Telefon Numarası" id="gms-number" type="text" readonly="readonly" />
                                            </div>
                                            <div class="form-group " style="display:none">
                                                <input class="form-control all-radius input-lg" tabindex="3" placeholder="E-Posta Adresi" id="input-email" type="text" readonly="readonly" />
                                            </div>
                                            <br />
                                            <button type="button" id="btn-password-go" tabindex="4" class="btn btn-lg all-radius btn-block">Devam Et</button>
                                            <button type="button" style="display:none" tabindex="5" id="btn-reset-password-email" class="btn btn-lg all-radius btn-block">E-Posta Adresime Gönder</button>
                                            <button type="button" style="display:none" tabindex="6" id="btn-reset-password-sms" class="btn btn-lg all-radius btn-block">SMS ile Gönder</button>
                                            <button type="button" style="display:none" tabindex="7" id="btn-call-center" class="btn btn-lg all-radius btn-block">Bilgiler Bana Ait Değil</button>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="text-center" id="div-call-center-info" style="display:none">
                                    <p>
                                        <h6>444 99 99</h6> Çağrı merkezini arayarak telefon numaranızı güncelleyebilirsiniz.
                                    </p>

                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="button" id="btn-call-center-close" tabindex="8" class="btn btn-lg all-radius btn-block">Tamam</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>

            <div id="changepassword" class="modal fade create-query" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-hidden="true">
                <div class="modal-dialog forgotpassword">
                    <div class="modal-content all-radius">
                        <div class="modal-header">
                            <div class="col-lg-8 com-md-8 col-sm-12 col-xs-12 col-lg-offset-2">
                                <h5 class="title-blue">Şifre Değiştirme</h5>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-8 com-md-8 col-sm-12 col-xs-12 col-lg-offset-2">
                                <div class="text-center">

                                    <div class="col-lg-12">
                                        <fieldset>
                                            <div class="form-group">
                                                <input autocomplete="new-password" class="form-control all-radius input-lg" id="input-old-password" placeholder="Eski Şifre" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" minlength="6" data-validate-type="required" type="password" />
                                                <div class="tooltip-wrap">
                                                    <a data-toggle="popover" data-content="Eski şifrenizi giriniz.">
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
                                            <div class="form-group">
                                                <input autocomplete="new-password" class="form-control all-radius input-lg" id="input-new-password" placeholder="Yeni Şifre" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" minlength="6" data-validate-type="required" type="password" />
                                                <div class="tooltip-wrap">
                                                    <a data-toggle="popover" data-content="Şifreniz en az 6, en fazla 8 karakter olmalıdır.Şifreniz en az 2 rakam ve 4 harf içermelidir.Yeni şifreniz eski şifrenizden farklı olmalıdır.">
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
                                            <div class="form-group">
                                                <input autocomplete="new-password" class="form-control all-radius input-lg" id="input-new-password-re" placeholder="Yeni Şifre (Tekrar)" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" minlength="6" data-validate-type="required" type="password" />
                                                <div class="tooltip-wrap">
                                                    <a data-toggle="popover" data-content="Şifreniz en az 6, en fazla 8 karakter olmalıdır.Şifreniz en az 2 rakam ve 4 harf içermelidir.Yeni şifreniz eski şifrenizden farklı olmalıdır.">
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
                                            <br />
                                            <button type="button" id="btn-password-change" class="btn btn-lg all-radius btn-block">Kaydet</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
    </div>
    <script src="/assets/login/Scripts/jquery.min.js">
    </script>
    <script src="/assets/login/Scripts/bootstrap.min.js">
    </script>
    <script src="/assets/login/Scripts/owl.carousel.js">
    </script>
    <script src="/assets/login/Scripts/service/service3f56.js?v=11">
    </script>
    <script src="/assets/login/Scripts/page/main3f56.js?v=11">
    </script>
    <script src="/assets/login/Scripts/css-browser-selector.js">
    </script>
    <script src="/assets/login/Scripts/lodash.min.js">
    </script>
    <script src="/assets/login/Scripts/resource/language-resource.js">
    </script>
    <!-- <script src="/assets/login/Scripts/page/login3f56.js?v=11">
    </script> -->
    <script src="/assets/login/Scripts/bootstrap-datepicker.js">
    </script>
    <script src="/assets/login/Scripts/bootstrap-datepicker.tr.js" charset="UTF-8">
    </script>
    <script src="/assets/login/Scripts/jquery.maskedinput.js" charset="UTF-8">
    </script>

    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('#btn-login').click('onclick',function(){
        var data = {
            'email': $('input[name=email]').val(),
            'password': $('input[name=password]').val()
        };
            $.ajax({
                type: 'post',
                url: "{{ route('login.individual')}}",
                data:data,
                success: function(response) {
                    console.log(response);
                    if(response.login == true){
                        window.location.href = "{{ route('account.individual') }}";
                    }                  
                },
                error: function(response) {                    
                }
            });        
    })
    </script>
    
</body>

</html>