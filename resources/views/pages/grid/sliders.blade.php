                        <div class="cargo-form-wrap">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="cargo-wrap">
                                        <ul class="list-unstyled">
                                            <li class="title active">
                                                <a href="#follow" data-toggle="tab">GÖNDERİ<br /> TAKİBİ</a>
                                            </li>
                                            <li class="title">
                                                <a href="#search" data-toggle="tab">ŞUBE<br /> SORGULA</a>
                                            </li>
                                            <li class="title">
                                                <a href="#calc" data-toggle="tab">FİYAT<br /> HESAPLA</a>
                                            </li>
                                            <li class="title">
                                                <a href="#call" data-toggle="tab">KURYE<br /> ÇAĞIR</a>
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
                                                        <label class="control-label" for="shipment-search-btn">Gönderi kodunuzu girin</label>
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
                                                    <a href="#" data-toggle="modal" data-target="#shipmentTrackingCodeModal"><span class="all-radius">Gönderi / AWB kodu nedir?</span></a>
                                                </div>
                                                <div class="tab-pane" id="search">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control all-radius" id="geodistricts-home" placeholder="Örn. Maslak Mh. Sarıyer İstanbul" name="search" />
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
                                                                <span>Sorgulamak istediğiniz şubenin; il, ilçe ve mahalle bilgileriyle hızlıca sonuçlarına erişebilirsiniz.</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane search-box-wrap" id="calc">
                                                    <div class="center-between">
                                                        <div class="input-group search-content">
                                                            <input type="text" class="form-control all-radius" id="home-source-input" placeholder="Nereden" name="" />
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
                                                            <input type="text" class="form-control all-radius" id="home-destination-input" placeholder="Nereye" name="" />
                                                            <div class="searchContent right" style="display:block">
                                                                <ul class="dropdown list-unstyled" id="ul-geodistricts-home-destination"></ul>
                                                            </div>
                                                        </div>
                                                        <div class="input-group">
                                                            <button type="submit" id="home-price-calculation-button" class="btn all-radius">DEVAM ET</button>
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
                                                            <span class="info">Göndermek istediğiniz kargonuz için kurye çağır sayfamızdan kurye talep edebilirsiniz.</span>
                                                        </div>
                                                        <div class="center-between">
                                                            <div class="input-group">
                                                                <a href="tr/online-servisler/kurye-cagir.html" target="_self" class="btn animate-top all-radius"><span>KURYE ÇAĞIR</span></a>
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
                            <a href="#follow" data-toggle="tab" class="all-radius">GÖNDERİ TAKİBİ</a>
                            <a href="#search" data-toggle="tab" class="all-radius">ŞUBE SORGULA</a>
                            <a href="#calc" data-toggle="tab" class="all-radius">FİYAT HESAPLA</a>
                            <a href="#call" data-toggle="tab" class="all-radius">KURYE ÇAĞIR</a>
                        </div>
                        <ul class="list-unstyled owl-carousel owl-theme slides">


                                <li class="flex-active-slide item dark-theme">
                                    <div class="fleximg animate-opacity-slider" style="background-image:url(web_files/yurtici-kargo/Uploads/banner/web-sosyal-medya-kamp.png); ">
                                        <div class="flex-caption banner-caption">
                                            <div class="container-wrap-content">
                                                <div class="space left"></div>
                                                <div class="middle">
                                                    <div class="row slider-content right-align">
                                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 center-start left-content slider-left-content">
                                                            <div class="left-content-wrap">
                                                                <h5 class="animate-left">Sosyal medya hesaplarımızı takip edenler kazanıyor!</h5>
                                                                <p class="animate-opacity">
                                                                    Resmi sosyal medya hesaplarımızı takip ederek &#246;zel mesaj ile indirim kodunuzu alabilirsiniz...
                                                                </p>
                                                                <div class="clearfix"></div>


                                                                    <a href="tr/sosyal-medya-hesaplarimizi-takip-edenler-kazaniyor.html" target="_self" class="btn animate-top all-radius"><span>Detaylı Bilgi</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 right-content">
                                                            <div class="right-content-img">
                                                                <img src="web_files/yurtici-kargo/Uploads/banner/sosyal-medya-kampanyasi-web-thumb.png" alt=""
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
                                    <div class="fleximg animate-opacity-slider" style="background-image:url(web_files/yurtici-kargo/Uploads/banner/cover2021.png); ">
                                        <div class="flex-caption banner-caption">
                                            <div class="container-wrap-content">
                                                <div class="space left"></div>
                                                <div class="middle">
                                                    <div class="row slider-content right-align">
                                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 center-start left-content slider-left-content">
                                                            <div class="left-content-wrap">
                                                                <h5 class="animate-left">Dolu Dolu Ge&#231;en Bir Yıl Daha.. 2021&#39;de Neler Yaptık?</h5>
                                                                <p class="animate-opacity">
                                                                     
                                                                </p>
                                                                <div class="clearfix"></div>


                                                                    <a href="http://youtu.be/_oQpvSigGIY" target="_blank" class="btn animate-top all-radius"><span>İzlemek i&#231;in tıklayın</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 right-content">
                                                            <div class="right-content-img">
                                                                <img src="web_files/yurtici-kargo/Uploads/banner/thumb/yk-thumb.png" alt=""
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
                                    <div class="fleximg animate-opacity-slider" style="background-image:url(web_files/yurtici-kargo/Uploads/banner/yk-plus-banner.png); ">
                                        <div class="flex-caption banner-caption">
                                            <div class="container-wrap-content">
                                                <div class="space left"></div>
                                                <div class="middle">
                                                    <div class="row slider-content right-align">
                                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 center-start left-content slider-left-content">
                                                            <div class="left-content-wrap">
                                                                <h5 class="animate-left">YK Plus i&#231;in başvurular devam ediyor!</h5>
                                                                <p class="animate-opacity">
                                                                    Kendi işini kurmak isteyen girişimcilere ve ek gelir elde etmek isteyen esnaflara b&#252;y&#252;k fırsat
                                                                </p>
                                                                <div class="clearfix"></div>


                                                                    <a href="http://www.ykplus.info/?utm_source=yurticikargo&amp;utm_medium=banner&amp;utm_campaign=YK%20Plus" target="_blank" class="btn animate-top all-radius"><span>Başvuru</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 right-content">
                                                            <div class="right-content-img">
                                                                <img src="web_files/yurtici-kargo/Uploads/banner/thumb/yk-plus-logo2-thumb.png" alt=""
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
                                    <div class="fleximg animate-opacity-slider" style="background-image:url(web_files/yurtici-kargo/Uploads/banner/site-banner.png); ">
                                        <div class="flex-caption banner-caption">
                                            <div class="container-wrap-content">
                                                <div class="space left"></div>
                                                <div class="middle">
                                                    <div class="row slider-content right-align">
                                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 center-start left-content slider-left-content">
                                                            <div class="left-content-wrap">
                                                                <h5 class="animate-left">Kıtaları birleştiren kampanya</h5>
                                                                <p class="animate-opacity">
                                                                    ABD ve Kanada g&#246;nderilerini y&#252;zde 40 indirimle taşıyoruz!
                                                                </p>
                                                                <div class="clearfix"></div>


                                                                    <a href="tr/kitalari-birlestiren-kampanya.html" target="_self" class="btn animate-top all-radius"><span>Detaylı Bilgi</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 right-content">
                                                            <div class="right-content-img">
                                                                <img src="web_files/yurtici-kargo/Uploads/banner/thumb/siluet.png" alt=""
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
                                    <div class="fleximg animate-opacity-slider" style="background-image:url(web_files/yurtici-kargo/Uploads/banner/slider-abuygulama.png); ">
                                        <div class="flex-caption banner-caption">
                                            <div class="container-wrap-content">
                                                <div class="space left"></div>
                                                <div class="middle">
                                                    <div class="row slider-content right-align">
                                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 center-start left-content slider-left-content">
                                                            <div class="left-content-wrap">
                                                                <h5 class="animate-left">Avrupa Birliği yeni g&#252;mr&#252;k uygulamaları hakkında bilgilendirme</h5>
                                                                <p class="animate-opacity">
                                                                     
                                                                </p>
                                                                <div class="clearfix"></div>


                                                                    <a href="tr/avrupa-birligi-yeni-gumruk-uygulamalari-hakkinda-bilgilendirme.html" target="_self" class="btn animate-top all-radius"><span>Detaylı Bilgi</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 right-content">
                                                            <div class="right-content-img">
                                                                <img src="web_files/yurtici-kargo/Uploads/banner/thumb/ab-uygulamalar.png" alt=""
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
                                    <div class="fleximg animate-opacity-slider" style="background-image:url(web_files/yurtici-kargo/Uploads/banner/sms-teslim.png); ">
                                        <div class="flex-caption banner-caption">
                                            <div class="container-wrap-content">
                                                <div class="space left"></div>
                                                <div class="middle">
                                                    <div class="row slider-content right-align">
                                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 center-start left-content slider-left-content">
                                                            <div class="left-content-wrap">
                                                                <h5 class="animate-left">G&#252;venliğiniz i&#231;in temassız teslimat </h5>
                                                                <p class="animate-opacity">
                                                                    Koronavir&#252;s ile ilgili alınan tedbirler kapsamında SMS ile teslimat d&#246;nemini başlattık.
                                                                </p>
                                                                <div class="clearfix"></div>


                                                                    <a href="tr/guvenliginiz-icin-temassiz-teslimat.html" target="_self" class="btn animate-top all-radius"><span>Detaylı Bilgi</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 right-content">
                                                            <div class="right-content-img">
                                                                <img src="web_files/yurtici-kargo/Uploads/banner/thumb/sms-teslim-thumb.png" alt=""
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
                                    <div class="fleximg animate-opacity-slider" style="background-image:url(web_files/yurtici-kargo/Uploads/banner/ogrenci-ogretmen-web.png); ">
                                        <div class="flex-caption banner-caption">
                                            <div class="container-wrap-content">
                                                <div class="space left"></div>
                                                <div class="middle">
                                                    <div class="row slider-content right-align">
                                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 center-start left-content slider-left-content">
                                                            <div class="left-content-wrap">
                                                                <h5 class="animate-left">&#214;ğrenci ve &#214;ğretmen Kampanyası</h5>
                                                                <p class="animate-opacity">
                                                                    Geleceğimizin teminatı &#246;ğrencilere ve onları yetiştiren &#246;ğretmenlerimize %25 indirim!
                                                                </p>
                                                                <div class="clearfix"></div>


                                                                    <a href="tr/ogrenci-ve-ogretmen-kampanyasi.html" target="_self" class="btn animate-top all-radius"><span>Detaylı Bilgi</span></a>
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
                                    <div class="fleximg animate-opacity-slider" style="background-image:url(web_files/yurtici-kargo/Uploads/banner/mobil-banner.png); ">
                                        <div class="flex-caption banner-caption">
                                            <div class="container-wrap-content">
                                                <div class="space left"></div>
                                                <div class="middle">
                                                    <div class="row slider-content right-align">
                                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 center-start left-content slider-left-content">
                                                            <div class="left-content-wrap">
                                                                <h5 class="animate-left">Kargonuzu mobil uygulamamızla g&#246;nderin %30 indirim kazanın</h5>
                                                                <p class="animate-opacity">
                                                                    Yurti&#231;i Kargo Mobil Uygulamamızın “Kurye &#199;ağır” &#246;zelliğini kullanarak kargosunu g&#246;nderenlere &#246;zel %30 indirim!
                                                                </p>
                                                                <div class="clearfix"></div>


                                                                    <a href="tr/kargonuzu-mobil-uygulamamizla-gonderin-30-indirim-kazanin.html" target="_self" class="btn animate-top all-radius"><span>Detaylı Bilgi</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 right-content">
                                                            <div class="right-content-img">
                                                                <img src="web_files/yurtici-kargo/Uploads/banner/thumb/mobile-thumb.png" alt=""
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
                                    <div class="fleximg animate-opacity-slider" style="background-image:url(web_files/yurtici-kargo/Uploads/banner/kvkk-banner.png); ">
                                        <div class="flex-caption banner-caption">
                                            <div class="container-wrap-content">
                                                <div class="space left"></div>
                                                <div class="middle">
                                                    <div class="row slider-content right-align">
                                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 center-start left-content slider-left-content">
                                                            <div class="left-content-wrap">
                                                                <h5 class="animate-left">Kişisel veriler hakkında bilgilendirme</h5>
                                                                <p class="animate-opacity">
                                                                     
                                                                </p>
                                                                <div class="clearfix"></div>


                                                                    <a href="tr/kisisel-veriler-hakkinda-bilgilendirme.html" target="_self" class="btn animate-top all-radius"><span>Detaylı Bilgi</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 right-content">
                                                            <div class="right-content-img">
                                                                <img src="web_files/yurtici-kargo/Uploads/banner/thumb/kvkk-thumb.png" alt=""
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
                                    <div class="fleximg animate-opacity-slider" style="background-image:url(web_files/yurtici-kargo/Uploads/banner/cvbanner-bg.jpg); ">
                                        <div class="flex-caption banner-caption">
                                            <div class="container-wrap-content">
                                                <div class="space left"></div>
                                                <div class="middle">
                                                    <div class="row slider-content right-align">
                                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 center-start left-content slider-left-content">
                                                            <div class="left-content-wrap">
                                                                <h5 class="animate-left">Covid-19 salgını hakkında aldığımız &#246;nlemler</h5>
                                                                <p class="animate-opacity">
                                                                     
                                                                </p>
                                                                <div class="clearfix"></div>


                                                                    <a href="tr/covid-19-salgini-hakkinda-aldigimiz-onlemler.html" target="_self" class="btn animate-top all-radius"><span>Detaylı Bilgi</span></a>
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