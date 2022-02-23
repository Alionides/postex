
@extends('layouts.postex')
@section('content')
                <div class="banner">
                    <div class="top-mask"><img src="/assets/img/top-mask.svg" alt=" " /></div>
                    <div class="slider">
                        <div class="cargo-form-wrap">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="cargo-wrap">
                                        <ul class="list-unstyled">
                                            <li class="title active">
                                                <a href="#follow" data-toggle="tab">BAĞLAMANI <br /> İZLƏ</a>
                                            </li>
                                            <li class="title">
                                                <a href="#search" data-toggle="tab">ŞÖBƏ<br /> SORĞULA</a>
                                            </li>
                                            <li class="title">
                                                <a href="#calc" data-toggle="tab">QİYMƏT<br /> HESABLA</a>
                                            </li>
                                            <li class="title">
                                                <a href="#call" data-toggle="tab">KURYER<br /> ÇAĞIR</a>
                                            </li>
                                            <li class="tab-menu-icon-wrap">
                                                <a href="#">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="12" viewBox="0 0 17 12">
                                                        <path class="tab-menu-icon" fill-rule="nonzero" d="M1 7V5h15v2H1zm0-2h15c1.333 0 1.333 2 0 2H1C-.333 7-.333 5 1 5zm0 7v-2h15v2H1zm0-2h15c1.333 0 1.333 2 0 2H1c-1.333 0-1.333-2 0-2zm0-8V0h15v2H1zm0-2h15c1.333 0 1.333 2 0 2H1C-.333 2-.333 0 1 0z" />
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-pane-wrap big-all-radius">
                                            <div class="tab-content clearfix">
                                                <div class="tab-pane active" id="follow">
                                                    <div class="form-group label-floating is-empty">

                                                        <label class="control-label" for="shipment-search-btn">İzləmə kodunuzu daxil edin</label>

                                                        <input type="number" id="shipment-search-btn" oninput="javascript: if (this.value.length > this.max) this.value = this.value.slice(0, this.max);" class="form-control all-radius shipment-tracking-code shipment-search" max="16" min="12" />
                                                        <a class="btn btn-default check-tracking-code">
                                                            <?xml version="1.0" encoding="UTF-8" ?>
                                                            <svg class="search-grey" width="24px" height="24px" viewBox="0 0 19 19" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                <defs></defs>
                                                                <g class="img" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                                                    <g transform="translate(-396.000000, -1279.000000)" stroke-width="2">
                                                                        <path d="M403.5,1293 C399.910149,1293 397,1290.08985 397,1286.5 C397,1282.91015 399.910149,1280 403.5,1280 C407.089851,1280 410,1282.91015 410,1286.5 C410,1290.08985 407.089851,1293 403.5,1293 Z M408.5,1291.5 L414,1297 L408.5,1291.5 Z"></path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 26 26" class="search-orange">
                                                                <path fill="#EE7D00" fill-rule="nonzero" d="M10.49 17.981a7.492 7.492 0 1 0 0-14.984 7.492 7.492 0 0 0 0 14.984zm0 2.997C4.695 20.978 0 16.282 0 10.49 0 4.696 4.696 0 10.49 0c5.792 0 10.488 4.696 10.488 10.49 0 5.792-4.696 10.488-10.489 10.488zm5.932-2.437l2.12-2.119 6.992 6.993-2.119 2.12-6.993-6.994zm2.12-2.119l6.992 6.993c1.413 1.413-.706 3.532-2.119 2.12l-6.993-6.994c-1.412-1.412.707-3.531 2.12-2.119z" />
                                                            </svg>
                                                        </a>
                                                    </div>

                                                    <a href="#" data-toggle="modal" data-target="#shipmentTrackingCodeModal"><span class="all-radius">İzləmə kodu nədir?</span></a>

                                                </div>
                                                <div class="tab-pane" id="search">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control all-radius" id="geodistricts-home" placeholder="Məs. İsmail Qutqaşınlı 66" name="search" />
                                                        <a class="btn btn-default">
                                                            <?xml version="1.0" encoding="UTF-8" ?>
                                                            <svg width="24px" height="24px" viewBox="0 0 19 19" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                <defs></defs>
                                                                <g class="img" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                                                    <g transform="translate(-396.000000, -1279.000000)" stroke-width="2">
                                                                        <path d="M403.5,1293 C399.910149,1293 397,1290.08985 397,1286.5 C397,1282.91015 399.910149,1280 403.5,1280 C407.089851,1280 410,1282.91015 410,1286.5 C410,1290.08985 407.089851,1293 403.5,1293 Z M408.5,1291.5 L414,1297 L408.5,1291.5 Z"></path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </a>
                                                        <div class="searchContent" style="display:block">
                                                            <ul class="dropdown list-unstyled" id="ul-geodistricts-home"></ul>
                                                        </div>
                                                        <div class="search-info">
                                                            <div class="center-between">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                                    <g fill="none" fill-rule="evenodd" transform="translate(1 1)">
                                                                        <rect width="2" height="8" x="8" y="6.878" fill="#ffffff" rx="1" />
                                                                        <rect width="2" height="2" x="8" y="2.981" fill="#ffffff" rx="1" />
                                                                        <rect width="18" height="18" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" rx="4" />
                                                                    </g>
                                                                </svg>
                                                                <span>Sorgulamaq istədiyiniz şğbənin; şəhər , rayon ve məhəllə bilgilərinə sürətli çata bilərsiz.</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane search-box-wrap" id="calc">
                                                    <div class="center-between">
                                                        <div class="input-group search-content">
                                                            <input type="text" class="form-control all-radius" id="home-source-input" placeholder="Hardan" name="" />
                                                            <div class="searchContent left" style="display:block">
                                                                <ul class="dropdown list-unstyled" id="ul-geodistricts-home-source"></ul>
                                                            </div>
                                                        </div>
                                                        <div class="input-group">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="88" height="36" viewBox="0 0 88 36">
                                                                <g fill="none" fill-rule="evenodd" stroke="#FFF" stroke-dasharray="3" stroke-width="2" transform="translate(1 1)">
                                                                    <path d="M14 15.429h8.135a5 5 0 0 1 5 5v7.628a5 5 0 0 0 5.024 5l6.865-.033a5 5 0 0 0 4.976-5V5a5 5 0 0 1 5-5h6.5a5 5 0 0 1 5 5v5.429a5 5 0 0 0 5 5H86" />
                                                                    <circle cx="7" cy="15" r="7" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M79.5 22.5l7-7-7-7" />
                                                                </g>
                                                            </svg>
                                                        </div>

                                                    </div>
                                                    <div class="center-between">
                                                        <div class="input-group search-content">
                                                            <input type="text" class="form-control all-radius" id="home-destination-input" placeholder="Hara" name="" />
                                                            <div class="searchContent right" style="display:block">
                                                                <ul class="dropdown list-unstyled" id="ul-geodistricts-home-destination"></ul>
                                                            </div>
                                                        </div>
                                                        <div class="input-group">
                                                            <button type="submit" id="home-price-calculation-button" class="btn all-radius">DAVAM ET</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="call">
                                                    <div class="search-info">
                                                        <div class="center-between">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                                <g fill="none" fill-rule="evenodd" transform="translate(1 1)">
                                                                    <rect width="2" height="8" x="8" y="6.878" fill="#ffffff" rx="1" />
                                                                    <rect width="2" height="2" x="8" y="2.981" fill="#ffffff" rx="1" />
                                                                    <rect width="18" height="18" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" rx="4" />
                                                                </g>
                                                            </svg>
                                                            <span class="info">Göndərmək istediğiniz kargo üçün kuryer çağır səhifəmizdən kuryer tələb edə bilərsiniz.</span>
                                                        </div>
                                                        <div class="center-between">
                                                            <div class="input-group">
                                                                <a  target="_self" class="btn animate-top all-radius"><span>KURYER ÇAĞIR</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="search-query">
                            <a href="#follow" data-toggle="tab" class="all-radius">BAĞLAMANI İZLƏ</a>
                            <a href="#search" data-toggle="tab" class="all-radius">ŞÖBƏ SORĞULA</a>
                            <a href="#calc" data-toggle="tab" class="all-radius">QİYMƏT HESABLA</a>
                            <a href="#call" data-toggle="tab" class="all-radius">KURYER ÇAĞIR</a>
                        </div>
                        <ul class="list-unstyled owl-carousel owl-theme slides">


                                <li class="flex-active-slide item dark-theme">
                                    <div class="fleximg animate-opacity-slider" style="background-image:url(assets/img/banner/web-sosyal-medya-kamp.png); ">
                                        <div class="flex-caption banner-caption">
                                            <div class="container-wrap-content">
                                                <div class="space left"></div>
                                                <div class="middle">
                                                    <div class="row slider-content right-align">
                                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 center-start left-content slider-left-content">
                                                            <div class="left-content-wrap">
                                                                <h5 class="animate-left">Sosial media hesablarımızı izləyənlər qazanır!</h5>
                                                                <p class="animate-opacity">
                                                                    Resmi Sosial media hesablarımızı izləyərək &#246;zel mesaj ile endirim kodunuzu ala bilərsiniz...
                                                                </p>
                                                                <div class="clearfix"></div>


                                                                    <a target="_self" class="btn animate-top all-radius"><span>Ətraflı</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 right-content">
                                                            <div class="right-content-img">
                                                                <img src="assets/img/banner/sosyal-medya-kampanyasi-web-thumb.png" alt=""
                                                                     class="animate-bottom" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" space right "></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="flex-active-slide item dark-theme">
                                    <div class="fleximg animate-opacity-slider" style="background-image:url(assets/img/banner/cover2022.jpg); ">
                                        <div class="flex-caption banner-caption">
                                            <div class="container-wrap-content">
                                                <div class="space left"></div>
                                                <div class="middle">
                                                    <div class="row slider-content right-align">
                                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 center-start left-content slider-left-content">
                                                            <div class="left-content-wrap">
                                                                <h5 class="animate-left">Dolu Dolu keçən Bir il daha.. 2021 də Nələr etdik?</h5>
                                                                <p class="animate-opacity">
                                                                     
                                                                </p>
                                                                <div class="clearfix"></div>


                                                                    <a  target="_blank" class="btn animate-top all-radius"><span>Ətraflı</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 right-content">
                                                            <div class="right-content-img">
                                                                <img src="assets/img/banner/thumb/yk-thumb.png" alt=""
                                                                     class="animate-bottom" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" space right "></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="flex-active-slide item">
                                    <div class="fleximg animate-opacity-slider" style="background-image:url(assets/img/banner/yk-plus-banner.png); ">
                                        <div class="flex-caption banner-caption">
                                            <div class="container-wrap-content">
                                                <div class="space left"></div>
                                                <div class="middle">
                                                    <div class="row slider-content right-align">
                                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 center-start left-content slider-left-content">
                                                            <div class="left-content-wrap">
                                                                <h5 class="animate-left">Postex Plus üçün müraciətlər devam edir!</h5>
                                                                <p class="animate-opacity">
                                                                    Öz işinizi qurmaq istəyən startupçılar ve əlavə gəlir əldə etmek istəyənlərə böyük fürsət
                                                                </p>
                                                                <div class="clearfix"></div>


                                                                    <a  target="_blank" class="btn animate-top all-radius"><span>Ətraflı</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 right-content">
                                                            <div class="right-content-img">
                                                                <img src="assets/img/banner/thumb/yk-plus-logo2-thumb.png" alt=""
                                                                     class="animate-bottom" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" space right "></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="flex-active-slide item">
                                    <div class="fleximg animate-opacity-slider" style="background-image:url(assets/img/banner/site-banner.png); ">
                                        <div class="flex-caption banner-caption">
                                            <div class="container-wrap-content">
                                                <div class="space left"></div>
                                                <div class="middle">
                                                    <div class="row slider-content right-align">
                                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 center-start left-content slider-left-content">
                                                            <div class="left-content-wrap">
                                                                <h5 class="animate-left">Şəhərləri birləşdirən kampaniya</h5>
                                                                <p class="animate-opacity">
                                                                    Açılışa özəl olaraq Rayon göndərişlərini 20 faiz endirimlə gətiririk!
                                                                </p>
                                                                <div class="clearfix"></div>


                                                                    <a target="_self" class="btn animate-top all-radius"><span>Ətraflı</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 right-content">
                                                            <div class="right-content-img">
                                                                <img src="assets/img/banner/thumb/siluet.png" alt=""
                                                                     class="animate-bottom" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" space right "></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="flex-active-slide item">
                                    <div class="fleximg animate-opacity-slider" style="background-image:url(assets/img/banner/slider-abuygulama.png); ">
                                        <div class="flex-caption banner-caption">
                                            <div class="container-wrap-content">
                                                <div class="space left"></div>
                                                <div class="middle">
                                                    <div class="row slider-content right-align">
                                                        <!-- <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 center-start left-content slider-left-content">
                                                            <div class="left-content-wrap">
                                                                <h5 class="animate-left">Avropa İttifaqının yeni gömrük təcrübələri haqqında məlumatlandırma</h5>
                                                                <p class="animate-opacity">
                                                                     
                                                                </p>
                                                                <div class="clearfix"></div>


                                                                    <a target="_self" class="btn animate-top all-radius"><span>Ətraflı</span></a>
                                                            </div>
                                                        </div> -->
                                                        <div class="col-lg-3 col-md-3 right-content">
                                                            <div class="right-content-img">
                                                                <img src="assets/img/banner/thumb/ab-uygulamalar.png" alt=""
                                                                     class="animate-bottom" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" space right "></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="flex-active-slide item">
                                    <div class="fleximg animate-opacity-slider" style="background-image:url(assets/img/banner/sms-teslim.png); ">
                                        <div class="flex-caption banner-caption">
                                            <div class="container-wrap-content">
                                                <div class="space left"></div>
                                                <div class="middle">
                                                    <div class="row slider-content right-align">
                                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 center-start left-content slider-left-content">
                                                            <div class="left-content-wrap">
                                                                <h5 class="animate-left">Təhlükəsizliyiniz üçün təmassız çatdırılma </h5>
                                                                <p class="animate-opacity">
                                                                Koronavirusla bağlı görülən tədbirlər çərçivəsində SMS vasitəsilə çatdırılma müddətinə start verdik.
                                                                </p>
                                                                <div class="clearfix"></div>


                                                                    <a target="_self" class="btn animate-top all-radius"><span>Ətraflı</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 right-content">
                                                            <div class="right-content-img">
                                                                <img src="assets/img/banner/thumb/sms-teslim-thumb.png" alt=""
                                                                     class="animate-bottom" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" space right "></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="flex-active-slide item">
                                    <div class="fleximg animate-opacity-slider" style="background-image:url(assets/img/banner/ogrenci-ogretmen-web.png); ">
                                        <div class="flex-caption banner-caption">
                                            <div class="container-wrap-content">
                                                <div class="space left"></div>
                                                <div class="middle">
                                                    <div class="row slider-content right-align">
                                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 center-start left-content slider-left-content">
                                                            <div class="left-content-wrap">
                                                                <h5 class="animate-left">tələbə və müəllim kampaniyası</h5>
                                                                <p class="animate-opacity">
                                                                Gələcəyimizin təminatı tələbələrimizə və onları yetişdirən müəllimlərimizə 25% endirimdir!
                                                                </p>
                                                                <div class="clearfix"></div>


                                                                    <a target="_self" class="btn animate-top all-radius"><span>Ətraflı</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 right-content">
                                                            <div class="right-content-img">
                                                                <img alt=""
                                                                     class="animate-bottom" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" space right "></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="flex-active-slide item">
                                    <div class="fleximg animate-opacity-slider" style="background-image:url(assets/img/banner/mobil-banner.png); ">
                                        <div class="flex-caption banner-caption">
                                            <div class="container-wrap-content">
                                                <div class="space left"></div>
                                                <div class="middle">
                                                    <div class="row slider-content right-align">
                                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 center-start left-content slider-left-content">
                                                            <div class="left-content-wrap">
                                                                <h5 class="animate-left">Mobil tətbiqimizlə karqonuzu göndərin və 30% endirim əldə edin</h5>
                                                                <p class="animate-opacity">
                                                                  Postex Mobil Tətbiqimizin "Kuryer Çağır" funksiyasından istifadə edərək yükünü göndərənlərə xüsusi 30% endirim!
                                                                </p>
                                                                <div class="clearfix"></div>


                                                                    <a target="_self" class="btn animate-top all-radius"><span>Ətraflı</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 right-content">
                                                            <div class="right-content-img">
                                                                <img src="assets/img/banner/thumb/mobile-thumb.png" alt=""
                                                                     class="animate-bottom" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" space right "></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="flex-active-slide item light-theme">
                                    <div class="fleximg animate-opacity-slider" style="background-image:url(assets/img/banner/kvkk-banner.png); ">
                                        <div class="flex-caption banner-caption">
                                            <div class="container-wrap-content">
                                                <div class="space left"></div>
                                                <div class="middle">
                                                    <div class="row slider-content right-align">
                                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 center-start left-content slider-left-content">
                                                            <div class="left-content-wrap">
                                                                <h5 class="animate-left">Şəxsi məlumatlar haqqında məlumat</h5>
                                                                <p class="animate-opacity">
                                                                     
                                                                </p>
                                                                <div class="clearfix"></div>


                                                                    <a  target="_self" class="btn animate-top all-radius"><span>Ətraflı</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 right-content">
                                                            <div class="right-content-img">
                                                                <img src="assets/img/banner/thumb/kvkk-thumb.png" alt=""
                                                                     class="animate-bottom" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" space right "></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="flex-active-slide item dark-theme">
                                    <div class="fleximg animate-opacity-slider" style="background-image:url(assets/img/banner/cvbanner-bg.jpg); ">
                                        <div class="flex-caption banner-caption">
                                            <div class="container-wrap-content">
                                                <div class="space left"></div>
                                                <div class="middle">
                                                    <div class="row slider-content right-align">
                                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 center-start left-content slider-left-content">
                                                            <div class="left-content-wrap">
                                                                <h5 class="animate-left">Covid-19 epidemiyası ilə bağlı gördüyümüz tədbirlər</h5>
                                                                <p class="animate-opacity">
                                                                     
                                                                </p>
                                                                <div class="clearfix"></div>


                                                                    <a target="_self" class="btn animate-top all-radius"><span>Ətraflı</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 right-content">
                                                            <div class="right-content-img">
                                                                <img alt=""
                                                                     class="animate-bottom" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" space right "></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                        </ul>
                    </div>
                    <div class="bottom-mask"><img src="assets/img/bottom-mask.svg" alt=" " /></div>
                </div>

                    <!-- Modal -->
                    <div class="modal fade page-popup" data-popupId="63" data-period="0" data-showing-count="5" role="dialog">

                        <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content all-radius">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        <img src="assets/img/banner/Uploads/Popup/popup.jpg" alt="Olumsuz hava koşullarından kaynaklı yaşanabilecek gecikmeler halinde anlayışınız i&ccedil;in teşekk&uuml;r ederiz." />
                                    </p>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>

                        </div>
                    </div>
                <!-- Modal -->
                <div class="modal fade" id="shipmentTrackingCodeModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content all-radius">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">

                                <h5 class="blue-title">İzləmə kodu nədir?</h5>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                                        <h6 class="main-title-bold">İzləmə kodu nümunəsi</h6>
                                        <img src="assets/img/gorsel-kodu.png" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="errorPopup" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content all-radius">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
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
                                    <span><b>123456789879</b> no’lu kargo takip numarasına ait bilgi bulunamadı. </span>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal fade" id="successPopup" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content all-radius">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
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
                                    <span>Gönderi ile ilgili alt sayfaya yönlendiriliyorsunuz.</span>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal fade" id="loadingErrorSuccessPopup" data-keyboard="false" data-backdrop="static" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content all-radius">
                            <div class="modal-header">
                                <a href="#" id="modal-close-action" class="close" data-dismiss="modal"></a>
                            </div>
                            <div class="modal-body">
                                <div class="loadingContent">
                                    <img src="assets/img/preloader.gif" />
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
                                    <a href="#" id="modal-success-action" class="btn all-radius pasive-item">Anasayfaya Dön</a>
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
                                        <span class="modal-span-message"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </div>
        <section>
            <div class="info-content-wrap ">
                <div class="container-wrap-content ">
                    <div class="space left "></div>
                    <div class="middle ">
                        <div class="row info ">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 center">
                                <img src="assets/img/phone-yurtici.svg" class=" " alt=" " width="168 " height="25 " />
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 center">
                                <div class="center">
                                    <img src="assets/img/help.svg" class=" " alt=" " width="60 " height="62 " />
                                    <span>Size nasıl yardımcı olabiliriz?</span>
                                </div>

                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 center">
                                <img src="assets/img/communication.png" class=" " alt=" " width="180 " height="69 " />
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 center">
                                <div class="center">
                                    <img src="assets/img/paro.png" class=" " alt=" " width="98 " height="83 " />
                                    <span>PARO'lu olun!</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space right "></div>
                </div>
            </div>
        </section>

        <section class="common-slider-wrap">
            <div class="tab-title-wrap ">
                <div class="container-wrap-content ">
                    <div class="space left "></div>
                    <div class="middle ">
                        <div class="row">
                            <ul class="list-unstyled owl-carousel owl-theme">
                                <li class="all-radius item active" style="max-width:325px; min-width:100px;">
                                    <div class="module-overlay"></div>
                                    <a data-href="#section-social-responsibilities"><span>SOSİAL MƏSULİYYƏT</span></a>
                                </li>
                                <li class="all-radius item" style="max-width:325px; min-width:100px;">
                                    <div class="module-overlay"></div><a data-href="#section-yurtici-kargo-paro-card"><span>POSTEX KARGO PARO KART</span></a>
                                </li>
                                <li class="all-radius item" style="max-width:325px; min-width:100px;">
                                    <div class="module-overlay"></div><a data-href="#section-do-you-know-these"><span>BUNLARI BİLİRSİNİZ? </span></a>
                                </li>
                                <li class="all-radius item" style="max-width:325px; min-width:100px;">
                                    <div class="module-overlay"></div><a data-href="#section-news"><span>XƏBƏRLƏR</span></a>
                                </li>

                                <li class="all-radius item" style="max-width:325px; min-width:100px;">
                                    <div class="module-overlay"></div><a data-href="#section-announcements"><span>ELANLAR</span></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="space right "></div>
                </div>
            </div>
        </section>


        <section class="common-slider-wrap module-type-listing " id="section-news" style="display:none;">
            <div class="container-wrap-content module-slider">

                <div class="space left"></div>
                <div class="middle module">
                    <div class="row">
                        <div class="owl-carousel owl-theme tab-content-wrap">


                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/kargo-sektorunde-cevreci-donusum-hamlesi.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/yk-haberler.jpg" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>Kargo sekt&#246;r&#252;nde &#231;evreci d&#246;n&#252;ş&#252;m hamlesi</h4>
                                            <span>
                                                Yurti&#231;i Kargo, 2022 itibariyle Pilly filosuna 80 aracı daha ilave ederek elektrikli ara&#231; sayısını 270’e &#231;ıkardı.
                                            </span>
                                            <div class="clearfix"></div> <a  target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/yurtici-kargo-hesaplarini-takip-edenler-kazaniyor.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/yk-haberler.jpg" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>Yurti&#231;i Kargo hesaplarını takip edenler kazanıyor!</h4>
                                            <span>
                                                Yurti&#231;i Kargo’nun sosyal medya hesaplarını takip ederek, &#246;zel mesaj yolu ile indirim kodu alanlar, y&#252;zde 25 indirim kazanıyor.
                                            </span>
                                            <div class="clearfix"></div> <a  target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/yurtici-kargo-7-24-iade-donemini-baslatti.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/yk-haberler.jpg" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>Yurti&#231;i Kargo 7/24 iade d&#246;nemini başlattı</h4>
                                            <span>
                                                Yurti&#231;i Kargo, e-ticaret kullanıcılarının kargo iade s&#252;recini kolaylaştıran bir uygulamayı daha hayata ge&#231;irdi.
                                            </span>
                                            <div class="clearfix"></div> <a  target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/kargo-sektorunde-yilin-en-itibarli-is-ortagi-yurtici-kargo.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/yk-haberler.jpg" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>Kargo sekt&#246;r&#252;nde ‘Yılın En İtibarlı İş Ortağı’: Yurti&#231;i Kargo</h4>
                                            <span>
                                                Yurti&#231;i Kargo, ‘T&#252;rkiye’nin En İtibarlı İş Ortakları’ araştırmasında kargo sekt&#246;r&#252;n&#252;n birincisi oldu.
                                            </span>
                                            <div class="clearfix"></div> <a target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/yurtici-kargo-musteri-deneyimi-arastirmasi-nda-zirvede.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/yk-haberler.jpg" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>Yurti&#231;i Kargo ‘M&#252;şteri Deneyimi Araştırması’nda zirvede</h4>
                                            <span>
                                                Turkcell Global Bilgi ve Fast Company&#39;nin yaptığı “M&#252;şteri Deneyimi Araştırması”nda kargo sekt&#246;r&#252;n&#252;n lideri Yurti&#231;i Kargo oldu.
                                            </span>
                                            <div class="clearfix"></div> <a  target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/yurtici-kargo-18-inci-bolge-mudurlugunun-acilisini-yapti.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/yk-haberler.jpg" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>Yurti&#231;i Kargo 18&#39;inci b&#246;lge m&#252;d&#252;rl&#252;ğ&#252;n&#252;n a&#231;ılışını yaptı</h4>
                                            <span>
                                                Yurti&#231;i Kargo, Ankara&#39;da yeni b&#246;lge m&#252;d&#252;rl&#252;ğ&#252;n&#252;n a&#231;ılışını ger&#231;ekleştirdi.
                                            </span>
                                            <div class="clearfix"></div> <a  target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/yurtici-kargo-musteri-deneyimi-endeksinde-zirvede.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/yk-haberler.jpg" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>Yurti&#231;i Kargo, m&#252;şteri deneyimi endeksinde zirvede</h4>
                                            <span>
                                                Yurti&#231;i Kargo, 2021 yılının &#252;&#231;&#252;nc&#252; &#231;eyreğinde m&#252;şteri deneyimi endeksine g&#246;re m&#252;şteri deneyim puanı en y&#252;ksek kargo şirketi oldu
                                            </span>
                                            <div class="clearfix"></div> <a  target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/turkiye-nin-en-buyuk-otomasyon-merkezinin-acilisini-yapti.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/yk-haberler.jpg" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>T&#252;rkiye’nin en b&#252;y&#252;k otomasyon merkezinin a&#231;ılışını yaptı</h4>
                                            <span>
                                                T&#252;rkiye’nin en b&#252;y&#252;k otomasyon sistemine sahip kargo transfer merkezi, g&#246;rkemli bir t&#246;renle İstanbul Esenyurt’ta a&#231;ıldı.
                                            </span>
                                            <div class="clearfix"></div> <a  target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/yurtici-kargo-sayili-otomasyon-sistemlerinden-birini-kuruyor.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/yk-haberler.jpg" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>Yurti&#231;i Kargo, sayılı otomasyon sistemlerinden birini kuruyor</h4>
                                            <span>
                                                 Yurti&#231;i Kargo Genel M&#252;d&#252;r&#252; Fatih &#214;nyol, Yurti&#231;i Kargo&#39;nun kapasitesini y&#252;zde 50 artırdığını belirtti.
                                            </span>
                                            <div class="clearfix"></div> <a  target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/genclerin-en-guvendigi-ilk-10-marka-arasinda-tek-kargo-sirketi.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/yk-haberler.jpg" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>Gen&#231;lerin en g&#252;vendiği ilk 10 marka arasında tek kargo şirketi</h4>
                                            <span>
                                                T&#252;rkiye İtibar Akademisi’nin (TİA) Yıldız Teknik &#220;niversitesi ve Bursa Teknik &#220;niversitesi &#246;ğretim &#252;yelerinin akademik denetimin
                                            </span>
                                            <div class="clearfix"></div> <a  target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/basin/haberler.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/more.png" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>Haberler</h4>
                                            <span>
                                                Haberler&#39;in devamına ulaşmak i&#231;in tıklayın.
                                            </span>
                                            <div class="clearfix"></div> <a  target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="space right"></div>
            </div>
        </section>

        <section class="common-slider-wrap module-type-listing " id="section-announcements" style="display:none;">
            <div class="container-wrap-content module-slider">

                <div class="space left"></div>
                <div class="middle module">
                    <div class="row">
                        <div class="owl-carousel owl-theme tab-content-wrap">


                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/tasindik.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/yk-haberler.jpg" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>Taşındık</h4>
                                            <span>
                                                Genel m&#252;d&#252;rl&#252;ğ&#252;m&#252;z yeni adresinde hizmetlerine devam ediyor.
                                            </span>
                                            <div class="clearfix"></div> <a  target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/minik-dostlarimizin-yanindayiz.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/yk-haberler.jpg" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>Minik Dostlarımızın Yanındayız</h4>
                                            <span>
                                                Kampanya kapsamında barınaklara destek olmak isteyen m&#252;şterilerimizin g&#246;nderilerini barınaklara y&#252;zde 30 indirimle taşıyoruz. 
                                            </span>
                                            <div class="clearfix"></div> <a  target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/arikanli-holding-yeni-ceo-su-hakan-subasi-oldu.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/yk-haberler.jpg" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>Arıkanlı Holding Yeni CEO&#39;su Hakan Subaşı Oldu</h4>
                                            <span>
                                                1996 yılından bu yana eğitim, taşımacılık, medya ve yayıncılık ile sanayi ve inşaat alanlarında faaliyetlerini s&#252;rd&#252;ren Arıkanlı
                                            </span>
                                            <div class="clearfix"></div> <a  target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/yurtici-kargo-guncel-fiyat-listesi-bilgilendirmesi.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/yk-haberler.jpg" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>Yurti&#231;i Kargo G&#252;ncel Fiyat Listesi Bilgilendirmesi</h4>
                                            <span>
                                                Detaylar i&#231;in l&#252;tfen tıklayınız.
                                            </span>
                                            <div class="clearfix"></div> <a target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/posta-hizmet-saglayicisi-yetki-belgelendirmesi.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/yk-haberler.jpg" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>Posta Hizmet Sağlayıcısı Yetki Belgelendirmesi</h4>
                                            <span>
                                                Detaylar i&#231;in l&#252;tfen tıklayınız.
                                            </span>
                                            <div class="clearfix"></div> <a target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/yurtici-kargo-cumartesi-uygulamasi.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/yk-haberler.jpg" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>Yurti&#231;i Kargo Cumartesi Uygulaması</h4>
                                            <span>
                                                Detaylar i&#231;in l&#252;tfen tıklayınız.
                                            </span>
                                            <div class="clearfix"></div> <a  target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/guvenlik-duyurusu.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/yk-haberler.jpg" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>G&#252;venlik Duyurusu</h4>
                                            <span>
                                                Taşımacılık sekt&#246;r&#252;nde yer alan Kargo Şirketlerinin, Su&#231; Gelirlerinin Aklanması ve Ter&#246;r&#252;n Finansmanının &#214;nlenmesiyle ilgili ...
                                            </span>
                                            <div class="clearfix"></div> <a  target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="space right"></div>
            </div>
        </section>

        <section class="common-slider-wrap module-type-listing" id="section-do-you-know-these" style="display:none;">
            <div class="container-wrap-content module-slider">

                <div class="space left"></div>
                <div class="middle module">
                    <div class="row">
                        <div class="owl-carousel owl-theme tab-content-wrap">


                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/covid-19-salgini-hakkinda-aldigimiz-onlemler.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/yk-haberler.jpg" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>Covid-19 Salgını Hakkında Aldığımız &#214;nlemler</h4>
                                            <span>
                                                 
                                            </span>
                                            <div class="clearfix"></div> <a  target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/guvenliginiz-icin-temassiz-teslimat.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/Bunlar%c4%b1%20Biliyor%20Musunuz/sms-teslim-bb.png" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>G&#252;venliğiniz i&#231;in temassız teslimat</h4>
                                            <span>
                                                Koronavir&#252;s ile ilgili alınan tedbirler kapsamında SMS ile teslimat d&#246;nemini başlattık
                                            </span>
                                            <div class="clearfix"></div> <a  target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/sayisiz-urun-sizi-bekliyor.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/Bunlar%c4%b1%20Biliyor%20Musunuz/img-do-you-know.jpg" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>Sayısız &#220;r&#252;n Sizi Bekliyor</h4>
                                            <span>
                                                Yurti&#231;i Kargo hem kurumsal hem de bireysel m&#252;şterilerinin ihtiya&#231;larına y&#246;nelik 6 ana grupta 35 ten fazla farklı &#252;r&#252;n sunmaktadı
                                            </span>
                                            <div class="clearfix"></div> <a  target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/kargo-gondermenin-sayisiz-yolu-var.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/yk-haberler.jpg" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>Kargo G&#246;ndermenin Sayısız Yolu Var</h4>
                                            <span>
                                                Yurti&#231;i Kargo olarak sizlerin hayatını daha da kolaylaştırmak amacı ile iPhone cep telefonları ve iPad’ler i&#231;in Yurti&#231;i Kargo iP
                                            </span>
                                            <div class="clearfix"></div> <a  target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>

                        </div>
                    </div>
                </div>
                <div class="space right"></div>
            </div>
        </section>

        <section class="common-slider-wrap module-type-listing active-list" id="section-social-responsibilities" style="display:none;">
            <div class="container-wrap-content module-slider">

                <div class="space left"></div>
                <div class="middle module">
                    <div class="row">
                        <div class="owl-carousel owl-theme tab-content-wrap">

                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/losev.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/Sosyal%20Sorumluluk/losev.png" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>L&#246;sev</h4>
                                            <span>
                                                Yurti&#231;i Kargo, maddi g&#252;&#231;l&#252;kler i&#231;indeki binlerce l&#246;semili &#231;ocuğa &#252;cretsiz tedavi, eğitim, sosyal ve psikolojik hizmetler vermek
                                            </span>
                                            <div class="clearfix"></div> <a  target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/ilkyar.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/Sosyal%20Sorumluluk/ilkyar.png" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>İlkyar</h4>
                                            <span>
                                                1998 yılında sınırlı olanaklarla eğitim g&#246;rmeye &#231;alışan k&#246;y &#231;ocuklarına yardım eli uzatmak i&#231;in kurulan İlk&#246;ğretim Okullarına Ya
                                            </span>
                                            <div class="clearfix"></div> <a  target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/turkiye-omurilik-felclileri-dernegi.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/Sosyal%20Sorumluluk/tofd.png" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>T&#252;rkiye Omurilik Fel&#231;lileri Derneği</h4>
                                            <span>
                                                1998 yılında, omurilik fel&#231;lilerinin tıbb&#238;, meslek&#238;, ekonomik, sosyal sorunlarının &#231;&#246;z&#252;m&#252; ve yeni omurilik fel&#231;lilerinin oluşmam
                                            </span>
                                            <div class="clearfix"></div> <a  target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="space right"></div>
            </div>
        </section>

        <section class="common-slider-wrap module-type-listing" id="section-yurtici-kargo-paro-card" style="display:none;">
            <div class="container-wrap-content module-slider">
                <div class="space left"></div>
                <div class="middle module">
                    <div class="row">
                        <div class="owl-carousel owl-theme tab-content-wrap">

                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/yurtici-kargo-paro-kart-nedir.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/Yurtici-Paro-Kart/paro-logo-thumb.png" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>Yurti&#231;i Kargo Paro Kart Nedir?</h4>
                                            <span>
                                                Paro, sizin i&#231;in duyarlı markaları ortak bir paydada buluşturarak Parolu kartınızla yaptığınız alışverişlerde sizi tanır ...
                                            </span>
                                            <div class="clearfix"></div> <a target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                                <div class="item tab-module all-radius" style="width:340px">
                                    <div class="module-overlay"></div>
                                    <a href="tr/parolular-kazanir-kampanyasi.html" target="_self">
                                        <div class="tab-img ">
                                            <div class="tab-img-wrap top-radius">
                                                <div class="img-wrap">
                                                    <img src="assets/img/banner/Uploads/Yurtici-Paro-Kart/paro-kart.png" alt=" " />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content ">
                                            <h4>Parolular Kazanır Kampanyası</h4>
                                            <span>
                                                Parolu kart sahiplerine b&#252;y&#252;k fırsat ! Parolu kartınızla yapacağınız Standart ve VIP ...
                                            </span>
                                            <div class="clearfix"></div> <a  target="_self" class="readmore ">DAHA ÇOX</a>
                                        </div>
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="space right"></div>
            </div>
        </section>

        @endsection