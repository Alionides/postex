@extends('layouts.corporate')
@section('content')
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
               <input class="form-control all-radius" data-validate-type="required" tabindex="1" autocomplete="off" id="password" type="password" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="30" minlength="3">
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
               <input class="form-control all-radius" data-validate-type="required" tabindex="2" autocomplete="off" id="repeatpassword" type="password" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="30" minlength="2">
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
               <button type="button" id="btn-user-information" tabindex="7" class="btn all-radius">DAVAM ET</button>
            </div>
         </div>
      </div>
      <div class="modal fade" id="usagecontract" data-backdrop="static" aria-hidden="true" role="dialog">
      </div>

@endsection