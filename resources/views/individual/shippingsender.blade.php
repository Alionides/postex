@extends('users.layouts.postexusers')
@section('userscontent')

<div class="shipping-sender">
    <div>
        <ul class="nav nav-pills">
            <li class="active number-title">
                <a href="#1a" class="not-active" tabindex="-1" id="btn-step-one-go" data-toggle="tab"><span>1</span></a>
            </li>
            <li class="number-title">
                <a href="#2a" class="not-active" tabindex="-1" id="btn-step-two-go" data-toggle="tab"><span>2</span></a>
            </li>
            <li class="number-title">
                <a href="#3a" class="not-active" tabindex="-1" id="btn-step-three-go" data-toggle="tab"><span>3</span></a>
            </li>
            <li class="number-title">
                <a href="#4a" class="not-active" tabindex="-1" id="btn-step-four-go" data-toggle="tab"><span>4</span></a>
            </li>
            <li class="number-title">
                <a href="#5a" class="not-active" tabindex="-1" id="btn-step-five-go" data-toggle="tab"><span>5</span></a>
            </li>
        </ul>
        <ul class="nav nav-pills">
            <li class="right">
                <img src="assets/login/assets/img/visa-logo.svg" alt="visa" />
                <img src="assets/login/assets/img/master-card-logo.png" alt="mastercard" />
                <img src="assets/login/assets/img/security-logo.png" alt="security" />
            </li>
        </ul>
    </div>
    <div class="tab-content clearfix">
        <div class="tab-pane active" id="1a">
            <h5 class="blue-title top">Gönderici Adresi ve Alıcı Seçimi</h5>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group label-floating is-empty">
                        <label class="control-label" for="select-draft-shipments">Favori Gönderilerim</label>
                        <select id="select-draft-shipments" tabindex="1" class="form-control all-radius">
                            <option style="display:none;"></option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group label-floating is-empty">
                        <button type="submit" id="btn-delete-draft-shipment" tabindex="2" style="display:none" class="btn all-radius">Taslağı Sil</button>
                    </div>
                </div>
            </div>

            <div class="row type-content">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 package-add-module">
                    <div>
                        <h6 class="title">Gönderen</h6>
                        <div class="tooltip-wrap left">
                            <a  data-toggle="popover" data-content="Gönderici bilgilerini seçiniz." data-original-title="" title="">
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
                    <div class="package-item all-radius ">
                        <div class="form-group label-floating is-empty shipping-select">
                            <label class="control-label" for="select-sender-address">Gönderi Kısa Ad</label>
                            <select id="select-sender-address" tabindex="3" data-validate-type="required" class="form-control all-radius">
                                <option style="display:none;"></option>
                            </select>
                        </div>
                        <div class="shipping-content" style="display:none">
                            <div class="space-x"></div>
                            <h6 class="view-title"><a onclick="shippingSenderStepOne.adresEditLocalStorage()" title="DÜZELTME YAP" href="assets/login/Setting/SenderAddress.html"><i><img src="assets/login/assets/img/iletisim.svg" width="25"></i></a></h6>
                                <h6 class="view title">DEMO USER</h6>
                            <h6 class="view address" id="sender-full-address">
                                Adres Bilgisi
                            </h6>
                            <h6 class="view" id="sender-city-country">il / ilçe</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 package-add-module">
                    <div>
                        <div>
                            <h6 class="title">Alıcı</h6>
                            <div class="tooltip-wrap left">
                                <a  data-toggle="popover" data-content="Alıcı bilgilerini seçiniz." data-original-title="" title="">
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
                    <div class="package-item all-radius">
                        <div class="form-group label-floating is-empty shipping-select">
                            <label class="control-label" for="select-receiver-address">Alıcı Kısa Ad</label>
                            <select id="select-receiver-address" tabindex="4" data-validate-type="required" class="form-control all-radius">
                                <option style="display:none;"></option>
                            </select>
                        </div>
                        <a href="assets/login/Setting/ConsigneeAddressa938.html?request=shipping" tabindex="5" class="btn all-radius center"><span>+</span></a>
                        <div class="shipping-content" style="display:none">
                            <div class="space-x"></div>
                            <h6 class="view-title"><a onclick="shippingSenderStepOne.adresEditLocalStorage()" title="DÜZELTME YAP" href="assets/login/Setting/ConsigneeAddress.html"><i><img src="assets/login/assets/img/iletisim.svg" width="25"></i></a></h6>
                            <h6 class="view title" id="receiver-full-name">Ahmet UYAR</h6>
                            <h6 class="view address" id="receiver-full-address">
                                Adres bilgisi
                            </h6>
                            <h6 class="view" id="receiver-city-country">
                                il / ilçe
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-6 col-md-offset-6 col-sm-offset-6">
                    <button type="submit" tabindex="6" id="btn-shippment-sender-step-one" class="btn all-radius">İleri</button>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="2a">
            <h5 class="blue-title top">Gönderi Türü</h5>
            <div class="row">
                <div class="type-content">
                    <div class="typeChoice">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 first">
                            <div class="title"><h6 class="package-title">Dosya / Evrak<br /> ( 0 - 500gr )</h6></div>
                            <div class="package-item all-radius">
                                <div class="type file all-radius"><svg xmlns="http://www.w3.org/2000/svg" width="94" height="124" viewbox="0 0 94 124"> <g fill="none" fill-rule="evenodd" stroke="#353535" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" transform="translate(2 2)"> <path d="M13.5 28h37.125M52.875 100h24.75M13.125 68h50.66M13.5 50h64.125M13.5 59h64.125"></path> <rect width="90" height="120" rx="6"></rect> </g> </svg></div>
                                <div class="content" id="div-file-shipment-type">

                                </div>
                                <div class="content-box-info" id="div-file-shipment-content-box" style="display:none">
                                    <div class="package-form">
                                        <div class="form-group label-floating info-wrap all-radius">
                                            <div class="start-between">
                                                <div class="box all-radius center">
                                                    <a  onclick="shippingSenderStepTwo.imgLargeShow(this);">
                                                        <img id="img-file-shipment-product" onerror='this.src = "assets/login/assets/img/shipment-product/noimage.png"' src="assets/login/assets/img/shipment-product/noimage.png">
                                                    </a>
                                                </div>
                                                <div class="stock">
                                                    <h5>Stok Adet</h5>
                                                    <span id="span-stock-count">0</span>
                                                </div>
                                            </div>
                                        </div><div class="space-2x"></div>
                                        <h5 id="info-stock-description">İlgili ambalaj ücretsizdir.</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 last">
                            <div class="title">
                                <h6 class="package-title">Paket / Koli</h6>
                            </div>
                            <div class="package-item all-radius">
                                <div class=" type package all-radius">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="125" height="124" viewbox="0 0 125 124"> <g fill="none" fill-rule="evenodd" transform="translate(2 2)"> <rect width="119.411" height="119.048" x=".646" stroke="#353535" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" rx="6"></rect> <path fill="#353535" d="M83.173 60.274c.822.168 1.488.763 1.11 1.128L68.22 74.13c-.752.595-.666.799.066 1.468l19.837 18.12c1.881 1.72 1.876 4.086-.095 5.267-2.012 1.203-5.217.643-7.04-1.185L61.72 78.47c-1.69-1.682-.282-2.772-.282-2.772l19.876-14.981c.602-.454 1.037-.61 1.859-.444zm-14.438 2.253L48.384 96.284c-1.192 1.981-4.207 2.975-6.656 2.166-2.42-.797-3.22-3.072-1.954-4.902l22.476-32.4c.65-.936 2.571-1.386 4.32-1.022 1.765.369 2.748 1.436 2.165 2.401zm-36.618 36.08c-1.05-.363-1.357-1.384-.702-2.268l12.594-17.028c1.037-1.399 0-2.641 0-2.641L32.548 62.862c-.735-.886.096-2.037 1.818-2.577 1.7-.535 3.684-.296 4.466.543L50.45 73.336s.988 1.059 0 2.467L35.197 97.619c-.636.904-2.018 1.35-3.08.987z"></path> <path stroke="#353535" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M43.634 2.381v41.302l17.973-9.718 17.972 9.718V8.528M2.143 34.286H31.07M80.357 34.286h37.5"></path> </g> </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 center typeChoiceTwo" style="display:none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="383" height="40" viewbox="0 0 383 40"> <defs> <lineargradient id="a" x1="19.523%" x2="83.117%" y1="50%" y2="50%"> <stop offset="0%" stop-color="#C8C8C8"></stop> <stop offset="100%" stop-color="#0069B3"></stop> </lineargradient> </defs> <path fill="none" fill-rule="evenodd" stroke="url(#a)" stroke-dasharray="3" stroke-width="2" d="M873 1132v1.468c0 11.046-8.954 20-20 20H510.532c-10.235 0-18.532 8.297-18.532 18.532" transform="translate(-491 -1132)"></path> </svg>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 package-add-module package-step-two-module package-clone-item" id="div-package-shipment-type-item" style="display:none">
                        <div class="package-item all-radius package-item-detail">
                            <div class="package-item-title all-radius">
                                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="28" viewbox="0 0 29 28"> <g class="img" fill="none" fill-rule="evenodd" stroke="#353535" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <path d="M27.228 1.48L2.479 26.227M26.52 26.228L1.773 1.479"></path> </g> </svg> <span>PAKET / KOLİ</span>
                            </div>
                            <div class="package-item-content">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label" for="select-package-shipment-name">Paket Koli İsmi</label>
                                            <select id="select-package-shipment-name" tabindex="7" class="form-control all-radius">
                                                <option style="display:none;"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="package-form">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Adet</label>
                                                <input class="form-control all-radius" disabled="disabled" tabindex="8" id="input-package-count" data-type="count" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3" minlength="1" data-package-type="package" type="number" />
                                                <div class="tooltip-wrap">
                                                    <a  data-toggle="popover" data-content="Gönderi adedi giriniz. (Gönderi adedi stok miktarından büyük olamaz.)" data-original-title="" title="">
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
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="package-form">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Birim (kg)</label>
                                                <input class="form-control all-radius" disabled="disabled" tabindex="9" id="input-package-kg" data-type="kg" data-package-type="package" data-input-type="number" type="text" oninput="javascript: if (this.value.indexOf('.') >= 0) { if (this.value.split('.')[0] > this.maxLength) this.value = this.maxLength; }else if (this.value.indexOf(',') >= 0) { if (this.value.split(',')[0] > this.maxLength) this.value = this.maxLength; } else {if (this.value > this.maxLength) this.value = this.maxLength;}" maxlength="100" minlength="1" />
                                                <div class="tooltip-wrap">
                                                    <a  data-toggle="popover" data-content="YK Kolileri için sağda belirtilen maksimum Kg kadar, kendi koliniz için maksimum 100 kg olacak şekilde gönderinizin ağırlık bilgisini kg cinsinden yazınız. Aynı kutu ürününden birden fazla gönderi için bir paket/koli için kg bilgisi giriniz." data-original-title="" title="">
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
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="package-form">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">En (cm)</label>
                                                <input class="form-control all-radius" min="1" tabindex="10" id="input-package-width" data-validate-type="required" disabled="disabled" data-type="width" data-package-type="package" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3" minlength="1" />
                                                <div class="tooltip-wrap">
                                                    <a  data-toggle="popover" data-content="Maksimum 150 cm olacak şekilde gönderinizin en bilgisini cm cinsinden yazınız." data-original-title="" title="">
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
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="package-form">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Boy (cm)</label>
                                                <input class="form-control all-radius" min="1" tabindex="11" id="input-package-length" data-validate-type="required" disabled="disabled" data-type="length" data-package-type="package" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3" minlength="1" />
                                                <div class="tooltip-wrap">
                                                    <a  data-toggle="popover" data-content="Maksimum 150 cm olacak şekilde gönderinizin boy bilgisini cm cinsinden yazınız." data-original-title="" title="">
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
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="package-form">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Yükseklik (cm)</label>
                                                <input class="form-control all-radius" min="1" tabindex="12" id="input-package-height" data-validate-type="required" disabled="disabled" data-type="height" data-package-type="package" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3" minlength="1" />
                                                <div class="tooltip-wrap">
                                                    <a  data-toggle="popover" data-content="Maksimum 150 cm olacak şekilde gönderinizin yükseklik bilgisini cm cinsinden yazınız." data-original-title="" title="">
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
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="border"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="package-form">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Paket Koli İsmi</label>
                                                <input class="form-control all-radius" id="input-package-name" tabindex="13" disabled="disabled" data-type="name" data-package-type="package" type="text" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" minlength="1" maxlength="50" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="package-form">
                                            <div class="form-group label-floating info-wrap all-radius">
                                                <div class="start-between">
                                                    <div class="box all-radius center">
                                                        <a  onclick="shippingSenderStepTwo.imgLargeShow(this);">
                                                            <img id="img-shipment-product" src="assets/login/assets/img/shipment-product/noimage.png" onerror='this.src="assets/login/assets/img/shipment-product/noimage.png"' />
                                                        </a>
                                                    </div>
                                                    <div class="max-ds">
                                                        <h5>Maks. Ds</h5>
                                                        <span id="span-package-maks-ds">0</span>
                                                    </div>
                                                    <div class="max-kg">
                                                        <h5>Maks. Kg</h5>
                                                        <span id="span-package-max-kg">0</span>
                                                    </div>
                                                    <div class="stock">
                                                        <h5>Stok Adet</h5>
                                                        <span id="span-package-stock-count">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row result">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="package-form">
                                                <div class="form-group label-floating is-empty readonly-wrap">
                                                    <label class="control-label">Hesaplanan Hacimsel Ağırlık</label>
                                                    <div class="tooltip-wrap left">
                                                        <a  data-toggle="popover" data-content="Gönderinin hacmi (dm3) hesaplanır. Hacim (dm3) Formülü:

{En (cm) x Boy (cm) x Yükseklik (cm)}
/ 1.000 (6475 sayılı yasa gereği hacim ölçümlerinin dm3 cinsinden yapılması zorunludur.Gönderi hacmi üçe bölünür ve ağırlık ile karşılaştırılır. Bir gönderi maksimum 900 dm3 olabilir." data-original-title="" title="">
                                                            <svg class="info" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20">
                                                                <g fill="none" fill-rule="evenodd" transform="translate(1 1)">
                                                                    <rect width="2" height="8" x="8" y="6.878" fill="#ee7d00" rx="1"></rect>
                                                                    <rect width="2" height="2" x="8" y="2.981" fill="#ee7d00" rx="1"></rect>
                                                                    <rect width="18" height="18" stroke="#ee7d00" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" rx="4"></rect>
                                                                </g>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div class="form-group">
                                                        <span class="form-control pull-left" style="width:20%;" id="span-package-calDs">0</span>
                                                        <span class="form-control pull-left" style="width:15%;">Ds</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="package-form">
                                                <div class="form-group label-floating is-empty readonly-wrap">
                                                    <label class="control-label">Fiyata Esas Ücrete Esas Ağırlık</label>
                                                    <div class="tooltip-wrap left">
                                                        <a  data-toggle="popover" data-content="Girmiş olduğunuz kg cinsinden ağırlık ve hesaplanan ds bilgisinden hangisi büyük ise bu alanda gösterilir." data-original-title="" title="">
                                                            <svg class="info" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20">
                                                                <g fill="none" fill-rule="evenodd" transform="translate(1 1)">
                                                                    <rect width="2" height="8" x="8" y="6.878" fill="#ee7d00" rx="1"></rect>
                                                                    <rect width="2" height="2" x="8" y="2.981" fill="#ee7d00" rx="1"></rect>
                                                                    <rect width="18" height="18" stroke="#ee7d00" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" rx="4"></rect>
                                                                </g>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div class="form-group">
                                                        <span class="form-control" style="float:left;width:20%;" id="span-package-calKgDs">0</span>
                                                        <span class="form-control" style="float:left;width:15%;">Kg/Ds</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 package-add-module-button" style="display:none">
                        <div class="package-add all-radius">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewbox="0 0 37 37"> <g class="img" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"> <path d="M19 1v35M36 19H1"></path> </g> </svg> <span>PAKET / KOLİ</span>
                        </div>
                    </div>
                    <div class="space-2x"></div><div class="space-2x"></div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p>Paket / Koli seçiminizde dilerseniz Yurtiçi Kargo'nun 24 çeşit ambalaj ürününden size uygun olanı seçebilir dilerseniz de "Kendi paketim / Kolim" alanından gönderinize özel en, boy, yükseklik, kg ve adet bilgilerini girerek tanım yapabilirsiniz. Her bir koli için maksimum 100 ücrete esas ağırlık toplamda 2.000 ücrete esas ağırlık tanımı yapabilirsiniz. Daha büyük gönderileriniz için lütfen şubemizle irtibata geçiniz. Hesaplanan tüm veriler, gösterilen şubedeki stok adet bilgisi bilgi amacı ile gösterilmiş olup kargonuz eğer adresinizden alınırsa, şubede yapılacak ölçüm ve tartım sonrası ilettiğiniz bilgilerden farklı bir Ücrete esas ağırlık bilgisi oluşur ise aradaki fark için ek bir ödeme yapmanız talep edilebilir.</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <button type="submit" id="btn-shipping-sender-step-two-back" tabindex="14" class="btn all-radius prev">Geri</button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
                        <button type="submit" id="btn-shippment-sender-step-two" tabindex="15" class="btn all-radius next">İleri</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="3a">
            <h5 class="blue-title top">Hizmet Seçimi</h5>
            <div class="row">
                <div class="type-service">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h6 class="grey">Gönderi Tarihi</h6>
                        <div class="space-x"></div>
                        <div class="date-info big-all-radius">
                            <div class="owl-carousel owl-theme">
                                <div class="item">
                                    <a href="#"><div class="title all-radius"><span>04 Aralık 2017, Pazartesi</span></div></a>
                                </div>
                                <div class="item">
                                    <a href="#"><div class="title all-radius"><span>04 Aralık 2017, Pazartesi</span></div></a>
                                </div>
                            </div>
                        </div>
                        <p class="main-content-bold" id="info-message"></p>
                        <div class="space-2x"></div>
                        <div class="space-x"></div>
                        <div class="service">
                            <div class="service-info">
                                <div class="head all-radius center-between">
                                    <div class="black"><span>Hizmet</span></div>
                                    <div class="black"><span>Adrese Kurye Talep<br /> İletme Son Saati</span></div>
                                    <div class="black"><span>Şubeden Son <br />Gönderi Saati</span>	</div>
                                    <div class="black"><span>Tahmini Teslim <br />Tarihi</span></div>
                                    <div class="black"><span>Taşıma Bedeli <br />(KDV hariç)</span></div>
                                </div>
                                <div class="content" id="div-shiping-sender-shipment-service">

                                </div>
                            </div>
                        </div>
                        <div class="space-2x"></div>
                        <div class="space-2x"></div>
                        <p class="grey">
                            <b>Adrese Kurye Talep İletme Son Saati :</b> Kargonun adresinizden alınıp gönderimin yapılması için talebinizi iletebileceğiniz son zamanı gösterir. Belirtilen bu zamandan 10 dakika öncesine kadar talebinizi İnternet Şube aracılığı ile iletebilirsiniz. Bu saatten sonra iletilen talepler bir sonraki iş günü işleme alınır.İletilen adrese kurye talepleri iş sırasına alınmakta ve iletilme zamanına göre önceliklendirilmektedir. Belirtilen zaman taahhütleri adresten gönderinin alınması durumunda geçerlidir.
                        </p>
                        <div class="space-x"></div>
                        <p class="grey">
                            <b>Şubeden Son Gönderi Saati :</b> Kargonun tarafınızdan Yurtiçi Kargo şubesine teslim edilerek şubeden yapılacak gönderimler için son işlem zamanını gösterir.
                        </p>
                        <div class="space-x"></div>
                        <div class="space-x"></div>
                        <h6 class="grey">Önemli Bilgiler</h6>
                        <div class="space-x"></div>
                        <p class="info">
                            Posta gönderisi kapsamındaki gönderiler, KDV'siz nihai hizmet bedelinin %2,35'i oranındaki tutar "posta hizmet bedeli" ayrıca faturaya eklenir. Tahmini teslim tarihi olarak gösterilen zamanlar bilgi amaçlıdır. Yurtiçi Kargo'nun her gün teslimat yapılan adreslere, belirli günlerde teslimat yapılan adreslere ve teslimat alanı kapsamı dışındaki noktalara göre bu bilgi değişebilir. Ekspres gönderi hizmetimiz VIP hizmeti, her gün teslimat yapılan adresler kapsamında olmayan noktalara gönderilemez.
                            Yurtiçi Kargo, kargonuzun içeriğini koruyacak nitelikte bir ambalajı olmadığı durumlarda kırılabilecek cam ve benzeri ürünlerde, tamir amaçlı gönderilerde ve kullanılmış elektronik ürünlerin taşınmasında, kargonuzu için taahhütname talebinde bulunma hakkını saklı tutar. Yurtiçi Kargo teslimat yaptığı adresler için ücret bazlı değişiklik yapma hakkını saklı tutar.
                        </p>
                    </div>
                    <div class="space-x"></div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <button type="submit" id="btn-shipping-sender-step-three-back" tabindex="16" class="btn all-radius prev">Geri</button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
                        <button type="submit" id="btn-shippment-sender-step-three" tabindex="17" class="btn all-radius next">İleri</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="4a">
            <h5 class="blue-title top">Ürün Servis Seçimi</h5>
            <div class="row">
                <div class="product-service col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table module" id="table-shipment-services">
                            <thead>
                                <tr>
                                    <th colspan="2" width="430"></th>
                                    <th width="150" align="center" class="title first"><div class="black"><span>Standart Fiyat</span></div></th>
                                    <th width="150" align="center" class="title last"><div class="black"><span>Size Özel Fiyat</span></div></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <button type="submit" id="btn-shipping-sender-step-four-back" tabindex="18" class="btn all-radius prev">Geri</button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
                        <button type="submit" id="btn-shippment-sender-step-four" tabindex="19" class="btn all-radius next">İleri</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="5a">
            <h5 class="blue-title top">Gönderi Özeti</h5>
            <div class="row">
                <div class="product-service summary">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 summary-info">
                        <span class="first">
                            Gönderici
                        </span>
                        <span class="last" id="span-summary-sender-name">
                            Ev Adresim (Ahmet UYAR)
                        </span>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 summary-info">
                        <span class="first">
                            Alıcı
                        </span>
                        <span class="last" id="span-summary-receiver-name">
                            İş Adresi (Ahmet UYAR)
                        </span>
                    </div>
                    <div class="space-2x"></div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 summary-info">
                        <span class="first">
                            Alıcı adresi
                        </span>
                        <span class="last" id="span-summary-receiver-address">
                            SAHRAYI CEDİT MH. SIDDIKLAR İŞ MERKEZİ ARKA KAPISI 1. KAT APT. NO: 51 Kadıköy / İstanbul
                        </span>
                    </div>
                    <div class="table-responsive col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <table class="table module" id="table-summary">
                            <thead>
                                <tr>
                                    <th width="430"></th>
                                    <th width="150" align="center" class="title first"><div class="black"><span>Standart Fiyat</span></div></th>
                                    <th width="150" align="center" class="title last"><div class="black"><span>Size Özel Fiyat</span></div></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p class="info">
                            Yukarıdaki bilgilerin doğru olduğundan eminseniz lütfen aşağıdaki alanları doldurunuz. Gönderi Kısa Ad bölümünden bu gönderiye vereceğiniz kısa isimle, hem takibini yapabilir hem de ayrı gönderiyi hızlıca tekrarlayabilirsiniz. Gönderi İçeriği alanı için 2.el ürün, kırılabilir / hassas gönderi gibi genel ifadeler kullanınız. Bu bilgi şubemizin gönderinizi taşıma şeklini belirleyecektir.
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label" for="input-short-name">Gönderi Kısa Ad</label>
                            <input class="form-control all-radius" data-validate-type="required" id="input-short-name" tabindex="20" type="text" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="50" minlength="1">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label" for="input-content">Gönderi İçeriği</label>
                            <input class="form-control all-radius" data-validate-type="required" id="input-content" tabindex="21" type="text" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="50" minlength="1">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <div class="radio radio-primary check">
                                <label>
                                    <input type="checkbox" id="check-draft-shipment" tabindex="22" value="true">
                                    <span class="circle"></span>
                                    <span class="check"></span>
                                    Taslak olarak sakla
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p>Yurtiçi Kargo, kargonuzun içeriğini koruyacak nitelikte bir ambalajı olmadığı durumlarda kırılabilecek cam ve benzeri ürünlerde, tamir amaçlı gönderilerde ve kullanılmış elektronik ürünlerin taşınmasında, taahhütname talebinde bulunma hakkını saklı tutar.</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <button type="submit" id="btn-shipping-sender-step-five-back" tabindex="23" class="btn all-radius prev">Geri</button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
                        <button type="submit" id="btn-shippment-sender-step-five" tabindex="24" class="btn all-radius next">Kaydet</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection