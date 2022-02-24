
@extends('layouts.corporate')
@section('content')

                              <div class="container-small">
                              <h3 class="slideTitle">Korporati̇v olaraq qeydiyyatdan keç</h3>
                              <div class="breadcrumb-wrap">
                                 <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                       <ul class="list-unstyled">
                                          <li><a href="{{route('home')}}" >Əsas Səhifə</a></li>
                                          <li class="active"><a>Qeydiyyat</a></li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              <div class="sender-address-detail all-radius create-query" id="div-user-address-information">
                                 <div class="col-lg-12 col-md-12">
                                    <h5 class="title-blue">İstifadəçi məlumatları</h5>
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group label-floating is-empty">
                                       <label class="control-label" for="input-receiver-cust-name">Ad</label>
                                       <input name="first_name" class="form-control all-radius" autocomplete="off"  id="input-receiver-cust-name" type="text"  maxlength="100" minlength="3" tabindex="1">
                                       <div class="tooltip-wrap">
                                          <a data-toggle="popover" data-content="En az iki hərf olarak ad bilgilərini açıq şəkilde yazın.">
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
                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group label-floating is-empty">
                                       <label class="control-label" for="input-receiver-cust-name">Soyad</label>
                                       <input name="last_name" class="form-control all-radius" autocomplete="off"  id="input-receiver-cust-name" type="text"  maxlength="100" minlength="3" tabindex="1">
                                       <div class="tooltip-wrap">
                                          <a data-toggle="popover" data-content="En az iki hərf olarak soyad bilgilərini açıq şəkilde yazın">
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
                                       <input name="email" class="form-control all-radius" autocomplete="off" tabindex="2" id="input-email" type="email"  maxlength="100" minlength="3">
                                       <div class="tooltip-wrap">
                                          <a data-toggle="popover" data-content="E-mail bilgisi girilmelidir.">
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
                                       <input name="phone" class="form-control all-radius" autocomplete="off" id="input-gsm-no" tabindex="3"  type="number"  maxlength="11" minlength="3">
                                       <div class="tooltip-wrap">
                                          <a data-toggle="popover" data-content="Mobil 0XXXXXXXXX olarağ 10 xana şəklində girin.">
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
                                       <label class="control-label" for="select-draft-shipments">Seç</label>
                                       <select id="select-draft-shipments" tabindex="1" name="corp_type" onchange='CheckColors(this.value);' class="form-control all-radius">
                                          <option></option>
                                          <option value="karqo">Karqo Şirkəti</option>
                                          <option value="mağaza">Mağaza</option>
                                          <option value="diger">Digər</option>
                                       </select>
                                       <div class="form-group label-floating is-empty">
                                          <label class="control-label" for="input-address-name">Fəaliyyət Növünüz</label>
                                          <textarea class="form-control all-radius description" type="text" name="notes" id="activitytype" style='display:none;' tabindex="19" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="500" minlength="3"></textarea>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                       <button type="button" id="btn-user-save" tabindex="21" class="register_corp_btn btn all-radius">Göndər</button>
                                    </div>
                                 </div>
                              </div>
                           </div>





<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>                           
         <script type="text/javascript">
            function CheckColors(val){
             var element=document.getElementById('activitytype');
             if(val=='diger')
               element.style.display='block';
             else  
               element.style.display='none';
            }
            
         </script> 

      <script>
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
         
         $('.register_corp_btn').click('onclick',function(){
             var data = {
                 'email': $('input[name=email]').val(),
                 'first_name': $('input[name=first_name]').val(),
                 'last_name': $('input[name=last_name]').val(),
                 'phone': $('input[name=phone]').val(),
                 'corp_type': $('select[name=corp_type]').val(),
                 'notes': $('input[name=notes]').val()
             };
                 $.ajax({
                     type: 'post',
                     url: "{{ route('register.corporate')}}",
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

@endsection

         


