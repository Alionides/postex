@extends('layouts.individual')
@section('content')



<h3 class="slideTitle">Fərdi olaraq qeydiyyatdan keç</h3>
<div class="breadcrumb-wrap">
   <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <ul class="list-unstyled">
            <li><a href="{{route('home')}}">Əsas Səhifə</a></li>
            <li class="active"><a>Qeydiyyat</a></li>
         </ul>
      </div>
   </div>
</div>
<div class="all-radius sender-address-detail create-query" id="div-user-information">
   <div class="col-lg-12 col-md-12">
      <h5 class="title-blue">İstifadəçi məlumatları</h5>
   </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group label-floating is-empty">
         <label class="control-label" for="input-name">Ad</label>
         <input class="form-control all-radius" data-validate-type="required" tabindex="1" autocomplete="off" id="input-name" type="text" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="30" minlength="3">
         <div class="tooltip-wrap">
            <a data-toggle="popover" data-content="Adınızı daxil edin. (ən az 2 hərf)">
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
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group label-floating is-empty">
         <label class="control-label" for="input-surname">Soyad</label>
         <input class="form-control all-radius" data-validate-type="required" tabindex="2" autocomplete="off" id="input-surname" type="text" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="30" minlength="2">
         <div class="tooltip-wrap">
            <a data-toggle="popover" data-content="Soyadınızı daxil edin. (ən az 2 hərf)">
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
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group label-floating is-empty">
         <label class="control-label" for="input-tck-number">FİN</label>
         <input class="form-control all-radius" data-validate-type="tcnumber" tabindex="3" autocomplete="off" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="11" minlength="11" id="input-tck-number" type="number">
         <div class="tooltip-wrap">
            <a data-toggle="popover" data-content="FİN nömrənizi daxil edin. ( 7 hərflər və rəqəmlər)">
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
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group label-floating date is-empty">
         <label class="control-label" for="input-birthday">Doğum Tarixi</label>
         <input class="form-control all-radius date-validation" tabindex="4" data-validate-type="required" autocomplete="off" id="input-birthday" type="text">
         <div class="tooltip-wrap">
            <a data-toggle="popover" data-content="Doğum tarixinizi daxil edin.">
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
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group label-floating is-empty">
         <label class="control-label" for="input-email">Email</label>
         <input class="form-control all-radius" data-validate-type="email" tabindex="5" autocomplete="off" id="input-email" type="text" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="50" minlength="5">
         <div class="tooltip-wrap">
            <a data-toggle="popover" data-content="Email ünvanınızı daxil edin.">
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
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group label-floating is-empty">
         <label class="control-label" for="input-phone-number">Mobil</label>
         <input class="form-control all-radius" data-validate-type="phone" tabindex="6" id="input-phone-number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="11" minlength="10" autocomplete="off" type="number">
         <div class="tooltip-wrap">
            <a data-toggle="popover" data-content="Mobil telefon nömrəsini 05XXXXXXXXX şəklində  10 xana  olaraq daxil edin.">
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
         <div class="clarification-text-box">
            <div class="clarification-text-box-content">
               
            <h4 style="text-align: center;">İSTİFADƏ MÜQAVİLƏSİ</h4>
                  <p class="soft">
                  &emsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                   Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                    It has survived not only five centuries, but also the leap into electronic typesetting, 
                    remaining essentially unchanged. It was popularised in the 1960s with the release of 
                    Letraset sheets containing Lorem Ipsum passages, and more recently with 
                    desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. 
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                    It has survived not only five centuries, but also the leap into electronic typesetting,
                     remaining essentially unchanged. It was popularised in the 1960s with the release of
                      Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing 
                      software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                    It has survived not only five centuries, but also the leap into electronic typesetting,
                     remaining essentially unchanged. It was popularised in the 1960s with the release of
                      Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing 
                      software like Aldus PageMaker including versions of Lorem Ipsum.
                  </p>



        </div>
         </div>
      </div>
   </div>
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="form-group">
         <label class="checkbox-container">
         Mən Postex tərəfindən şəxsi məlumatlarımın işlənməsi və ötürülməsinin metodu, məqsədi və hüquqi səbəbləri, ötürülən şəxs qrupları və sahib olduğum hüquqlar barədə məlumatlandırıldım.
         <input class="clarification-check" type="checkbox">
         <span class="checkboxkmark"></span>
         </label>
      </div>
   </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
         <button type="button" id="btn-user-information" tabindex="7" class="btn all-radius">DAVAM ET</button>
      </div>
   </div>
</div>
<div class="sender-address-detail all-radius create-query" id="div-user-address-information" style="display:none">
   <div class="col-lg-12 col-md-12">
      <h5 class="title-blue">İletişim Bilgileri</h5>
   </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
         <div class="radio radio-primary">
            <label>
            <input type="radio" name="radio-customer-type" tabindex="8" checked="checked" value="2">
            <span class="circle"></span>
            <span class="check"></span>
            Konut
            </label>
         </div>
      </div>
   </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
         <div class="radio radio-primary ">
            <label>
            <input type="radio" name="radio-customer-type" tabindex="9" value="3">
            <span class="circle"></span>
            <span class="check"></span>
            İş Yeri
            </label>
         </div>
      </div>
   </div>
   <div id="div-workplace" style="display:none">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
         <div class="form-group label-floating is-empty">
            <label class="control-label" for="input-company-name">Firma Ünvanı</label>
            <input class="form-control all-radius" autocomplete="off" tabindex="10" id="input-company-name" type="text" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100" minlength="3">
            <div class="tooltip-wrap">
               <a data-toggle="popover" data-content="Gönderi yapılan alıcı firma veya bir firmadaki çalışan ise bu alanda firmanın tam ünvanını yazınız. Örnek: Yurtiçi Kargo Servisi A.Ş.">
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
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
         <div class="form-group label-floating is-empty">
            <label class="control-label" for="input-department-name">Departman</label>
            <input class="form-control all-radius" autocomplete="off" id="input-department-name" tabindex="11" type="text" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="50" minlength="3">
            <div class="tooltip-wrap">
               <a data-toggle="popover" data-content="Departman bilgisi giriniz.">
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
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
         <div class="form-group label-floating is-empty">
            <label class="control-label" for="input-tax-number">Vergi Numarası</label>
            <input class="form-control all-radius" autocomplete="off" id="input-tax-number" tabindex="12" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" minlength="10">
            <div class="tooltip-wrap">
               <a data-toggle="popover" data-content="Vergi numarası giriniz.">
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
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="form-group label-floating is-empty">
         <label class="control-label" for="input-address-name">Adres Adı Tanımlama</label>
         <input class="form-control all-radius" data-validate-type="required" autocomplete="off" tabindex="13" id="input-address-name" type="text" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="50" minlength="3">
         <div class="tooltip-wrap">
            <a data-toggle="popover" data-content="Adresinize daha sonra kolay anımsayabilmeniz için bir isim veriniz.">
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
   <div id="div-address-geo-search">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 address-geo-search">
         <div class="form-group label-floating is-empty">
            <div class="search-content search-box-wrap address-wrap">
               <label class="control-label" for="input-address">Mahalle/sokak/il/ilçe giriniz</label>
               <img src="/assets/login/assets/img/arama.svg" class="input-address-search" />
               <input class="form-control all-radius" data-validate-type="required" tabindex="14" id="input-address" type="text" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100" minlength="3">
               <div class="tooltip-wrap">
                  <a data-toggle="popover" data-content="Mahalle, cadde/sokak,ilçe,il bilgilerini girerek arama yapabilirsiniz. Aradığınız adresi bulamadıysanız, (Aradığım adresi bulamadım) 'ı işaretleyiniz.">
                     <svg class="info" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20">
                        <g fill="none" fill-rule="evenodd" transform="translate(1 1)">
                           <rect width="2" height="8" x="8" y="6.878" fill="#ee7d00" rx="1"></rect>
                           <rect width="2" height="2" x="8" y="2.981" fill="#ee7d00" rx="1"></rect>
                           <rect width="18" height="18" stroke="#ee7d00" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" rx="4"></rect>
                        </g>
                     </svg>
                  </a>
               </div>
               <div class="searchContent ">
                  <ul class="dropdown list-unstyled" id="ul-geo-search"></ul>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
         <div class="form-group">
            <div class="radio radio-primary check">
               <label>
               <input type="checkbox" id="check-user-address-status" tabindex="15" name="check-user-address-status" value="false">
               <span class="circle"></span>
               <span class="check"></span>
               Aradığım adresi bulamadım.
               </label>
            </div>
         </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 address-geo-search">
         <div class="form-group label-floating is-empty">
            <div class="form-group label-floating is-empty">
               <label class="control-label" for="input-building-number">Bina Numarası</label>
               <input class="form-control all-radius" id="input-building-number" type="text" tabindex="16" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6" minlength="3">
               <div class="tooltip-wrap">
                  <a data-toggle="popover" data-content="Bina numaranızı giriniz.">
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
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 address-geo-search">
         <div class="form-group label-floating is-empty">
            <div class="form-group label-floating is-empty">
               <label class="control-label" for="input-building-name">Apartman/Bina Adı</label>
               <input class="form-control all-radius" id="input-building-name" type="text" tabindex="17" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100" minlength="3">
               <div class="tooltip-wrap">
                  <a data-toggle="popover" data-content="Bina adı giriniz.">
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
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 address-geo-search">
         <div class="form-group label-floating is-empty">
            <div class="form-group label-floating is-empty">
               <label class="control-label" for="input-floor-number">Kat numarası</label>
               <input class="form-control all-radius" id="input-floor-number" type="text" tabindex="18" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="5" minlength="3">
               <div class="tooltip-wrap">
                  <a data-toggle="popover" data-content="Kat numarası giriniz.">
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
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 address-geo-search">
         <div class="form-group label-floating is-empty">
            <div class="form-group label-floating is-empty">
               <label class="control-label" for="input-flat-number">Daire numarası</label>
               <input class="form-control all-radius" id="input-flat-number" type="text" tabindex="19" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="30" minlength="3">
               <div class="tooltip-wrap">
                  <a data-toggle="popover" data-content="Daire numarası giriniz.">
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
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 address-geo-search">
         <p class="sender-address-result" id="address-readonly" data-address="">Örn; Ayazağa mahallesi Kemerburgaz caddesi No: 10 D Blok Vadi Koru Sarıyer / İstanbul</p>
      </div>
   </div>
   <div id="div-address-not-found" style="display:none">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
         <div class="form-group label-floating is-empty">
            <label class="control-label" for="select-register-city">İl</label>
            <select class="form-control all-radius" tabindex="20" id="select-register-city">
               <option style="display:none;"></option>
            </select>
         </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
         <div class="form-group label-floating is-empty">
            <label class="control-label" for="select-county">İlçe</label>
            <select class="form-control all-radius" tabindex="21" id="select-county">
               <option style="display:none;"></option>
            </select>
         </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="form-group label-floating is-empty">
            <label class="control-label" for="complaint-description">Açık Adres Giriniz.</label>
            <textarea class="form-control all-radius description" tabindex="22" id="complaint-description" type="text" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100" minlength="3"></textarea>
         </div>
      </div>
   </div>
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="form-group label-floating is-empty">
         <label class="control-label" for="complaint-description">Adres Tarifi Giriniz</label>
         <textarea class="form-control all-radius description" tabindex="23" id="input-address-description" rows="4" type="text" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="250" minlength="3"></textarea>
      </div>
   </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group label-floating is-empty">
         <label class="control-label" for="input-phone">Telefon</label>
         <input class="form-control all-radius" autocomplete="off" id="input-phone" tabindex="24" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="11" minlength="10">
         <div class="tooltip-wrap">
            <a data-toggle="popover" data-content="Alan kodu ve 7 haneli telefon no ile beraber başta 0 olacak şekilde 11 hane numaradan oluşan telefon numaranızı giriniz.">
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
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group label-floating is-empty">
         <label class="control-label" for="input-fax">Fax</label>
         <input class="form-control all-radius" autocomplete="off" id="input-fax" tabindex="25" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" minlength="10">
         <div class="tooltip-wrap">
            <a data-toggle="popover" data-content="Alan kodu ve 7 haneli telefon no ile beraber başta 0 olacak şekilde 11 hane numaradan oluşan telefon numaranızı giriniz.">
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
         <div class="radio radio-primary check">
            <label>
            <input type="checkbox" name="check-user-contract" checked="checked" tabindex="26" id="check-requested-campaign" value="true">
            <span class="circle"></span>
            <span class="check"></span>
            Bilgilendirme istiyorum.
            </label>
         </div>
      </div>
   </div>
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="form-group">
         <div class="radio radio-primary check">
            <label>
            <input type="checkbox" name="check-user-contract" tabindex="27" id="check-user-contract" value="false">
            <span class="circle"></span>
            <span class="check"></span>
            Kullanım Sözleşmesini Kabul Ediyorum.
            </label>
            <a href="#" class="member" data-toggle="modal" data-target="#usagecontract"><span>Görüntüle</span></a>
         </div>
      </div>
   </div>
   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
         <button type="button" id="btn-user-save" tabindex="28" disabled class="btn all-radius">Kaydol</button>
      </div>
   </div>
</div>
<div class="modal fade" id="usagecontract" data-backdrop="static" aria-hidden="true" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content all-radius">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div>
                  <h1>İSTİFADƏ MÜQAVİLƏSİ</h1>
                  <p class="soft">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                   Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                    It has survived not only five centuries, but also the leap into electronic typesetting, 
                    remaining essentially unchanged. It was popularised in the 1960s with the release of 
                    Letraset sheets containing Lorem Ipsum passages, and more recently with 
                    desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. 
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                    It has survived not only five centuries, but also the leap into electronic typesetting,
                     remaining essentially unchanged. It was popularised in the 1960s with the release of
                      Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing 
                      software like Aldus PageMaker including versions of Lorem Ipsum.
                  </p>
                
               </div>



            </div>
         </div>
         <div class="modal-footer">
         </div>
      </div>
   </div>
</div>


@endsection