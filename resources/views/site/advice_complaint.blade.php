
@extends('layouts.postex')
@section('content')

<style>
.swal2-container {
  z-index: 20000 !important;
}
</style>
<div class="banner subpage-banner">
   <div class="top-mask"><img src="/assets/img/top-mask.svg" alt=" " /></div>
   <div class="subpage-slide-wrap">
      <div class="subpage-slide " style="background-image:url(/assets/img/banner.png); ">
         <div class="container-small">
            <h3 class="slideTitle">ƏLAQƏ FORMASI</h3>
         </div>
      </div>
   </div>
</div>
<section id="dynamic-content-section">
        <div class="container-wrap-content general-content">
           <div class="space left"></div>
           <div class="middle">
              <div class="container-small">
                 <div class="contact-page-wrap">                   
                    <div class="row module-tab-wrap contact-page">
                       
                       <div class="content-wrap">
                          <div class="col-md-12 content">
                             <div class="tab-pane-wrap all-radius">
                                <div class="tab-content clearfix">



                                   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group label-floating is-empty">
                                       <label class="control-label" for="input-receiver-cust-name">Ad</label>
                                       <input name="first_name" class="form-control all-radius" autocomplete="off"  id="input-receiver-cust-name" type="text"  maxlength="100" minlength="3" tabindex="1" data-validate-type="required">
                                       <div class="tooltip-wrap">
                                          <a data-toggle="popover" data-content="En az iki hərf olmalıdır">
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
                                       <label class="control-label" for="input-receiver-cust-name">Soyad</label>
                                       <input name="last_name" class="form-control all-radius" autocomplete="off"  id="input-receiver-cust-name" type="text"  maxlength="100" minlength="3" tabindex="1" data-validate-type="required">
                                       <div class="tooltip-wrap">
                                          <a data-toggle="popover" data-content="En az iki hərf olmalıdır ">
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
                                       <input name="email" class="form-control all-radius" autocomplete="off" tabindex="2" id="input-email" type="email"  maxlength="100" minlength="3" data-validate-type="required">
                                       <div class="tooltip-wrap">
                                          <a data-toggle="popover" data-content="Email.">
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
                                       <label class="control-label" for="input-gsm-no">Mobil</label>
                                       <input name="phone" class="form-control all-radius" autocomplete="off" id="input-gsm-no" tabindex="3"  type="number"  maxlength="11" minlength="3" data-validate-type="required">
                                       <div class="tooltip-wrap">
                                          <a data-toggle="popover" data-content="Mobil 0XXXXXXXXX olarağ 10 xana şəklində daxil edin.">
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
                                       <label class="control-label" for="input-receiver-cust-name">İzləmə kodu</label>
                                       <input name="tracking_id" class="form-control all-radius" autocomplete="off"  id="input-receiver-cust-name" type="text"  maxlength="100" minlength="3" tabindex="1" data-validate-type="required">
                                       <div class="tooltip-wrap">
                                          <a data-toggle="popover" data-content="İzləmə kodu ">
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
                                    <label class="control-label" for="complaint-description">Mətn</label> 
                                    <textarea class="form-control all-radius description input-tooltip" id="complaint-description" name="notes" type="text" maxlength="2000" data-validate-type="required"></textarea>
                                    <div class="tooltip-wrap">
                                       <a data-toggle="popover" data-content="Mətn" data-original-title="" title="">
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

                                 <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-6 col-md-offset-6 col-sm-offset-6">
                                    <div class="form-group">
                                       <button id="advice_and_complaint" type="button" class="btn all-radius save-contact">Göndər</button>
                                    </div>
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




     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>            

     <script>
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
         
         $('#advice_and_complaint').click('onclick',function(){       
          
             var data = {                 
                 'first_name': $('input[name=first_name]').val(),
                 'last_name': $('input[name=last_name]').val(),
                 'email': $('input[name=email]').val(),
                 'phone': $('input[name=phone]').val(),
                 'tracking_id': $('input[name=tracking_id]').val(),
                 'notes': $('textarea[name=notes]').val()
             };           


                 $.ajax({
                     type: 'post',
                     url: "{{ route('home.advice_complaint')}}",
                     data:data,                    
                     success: function(response) {  
                        Swal.fire({
                            icon: 'success',
                            title: 'Uğurlu',
                            text: response.message,
                            showCancelButton: true,
                            showConfirmButton: false
                        })                                     
                     },
                     error: function(xhr, status, error){
                         Swal.fire({
                            icon: 'error',
                            title: 'Xəta'
                        })
                     }
                 });        
         })
      </script> 

@endsection