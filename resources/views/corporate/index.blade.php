@extends('layouts.corporate')
@section('content')                 
<link type="text/css" rel="stylesheet" href="/assets/login/assets/css/bootstrap.min.css" />
<script src="/assets/login/Scripts/jquery.min.js"></script>
<script src="/assets/login/Scripts/bootstrap.min.js"></script>
<div class="row">   
   <div class="table-responsive">
      <table class="table" id="table-tracking">
      <thead>
      <tr>
        <th>Qəbul Tarixi</th>
        <th>Təhvil Tarixi</th>
        <th>İzləmə Kodu</th>
        <th align="center">Status</th>
        <th align="center"> Göndərənin Adı<br> Alanın Adı </th>
        <th align="center">Bağlama növü</th>
        <th colspan="4" align="center">Əməliyyatlar</th>
      </tr>
        </thead>
         <tbody>
            @foreach ($acceptance as $accept)
            <tr>
               <td align="center">{{ $accept->id }}</td>
               <td align="center">{{ $accept->id }}</td>
               <td align="center">{{ $accept->id }}</td>
               <td align="center">{{ $accept->id }}</td>

               <td align="center" class="border-wrap">
              <div class="dot-border-first">
                <span class="title" id="pop" data-toggle="popover" data-content="{{ $accept->id }}" data-original-title="" title="">{{ $accept->id }}</span>
              </div>
              <div class="dot-border-last">
                <span class="title" id="pop" data-toggle="popover" data-content="{{ $accept->id }}" data-original-title="" title="">{{ $accept->id }}</span>
              </div>
               </td>

               <td align="center">{{ $accept->id }}</td>
               <td width="20%">
               <a onclick="" title="tıklayınız."> <i style="color:red" class="fas fa-window-close fa-2x"></i> </a>
               <a data-id="909376052773"  title="Gönderi ."> <i style="color:grey" class="fas fa-envelope fa-2x"></i>  </a>
               <a  title="Hareketler"><i style="color:orange" class="fas fa-truck fa-2x"></i></a>
               <a href="javascript:void(0)" class="faplus" data-id="{{ $accept->id }}"><i style="color:green;" class="fas fa-plus fa-2x"></i></a>
                </td>
            </tr>
            @endforeach
         </tbody>
      </table>
      {!! $acceptance->links() !!}
   </div>
</div>
<!-- boostrap model -->
<div class="modal fade create-query-modal" id="ajax-book-model" role="dialog" style="display: none;" data-backdrop="static" data-keyboard="false" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content all-radius">
         <div class="modal-header"><button type="button" class="close" data-dismiss="modal"></button></div>
         <div class="modal-body">
            <h5 class="blue-title top">Gönderi Özeti</h5>
            <div class="space-2x"></div>
            <div class="row">
               <div class="product-service summary">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 summary-info">
                     <span class="first">
                     Gönderici Adresi Kısa Ad
                     </span>
                     <span class="last" id="span-sender-address-short-name">demo gönderici</span>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 summary-info">
                     <span class="first">
                     Gönderici Adı
                     </span>
                     <span class="last" id="title"></span>
                     </div>
                  <div class="space-2x"></div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 summary-info">
                     <span class="first">
                     Alıcı Kısa Ad
                     </span>
                     <span class="last" id="span-receiver-address-short-name">demo alıcı</span>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 summary-info">
                     <span class="first">
                     Alıcı Adı
                     </span>
                     <span class="last" id="span-receiver-name">DEMO ALICI</span>
                  </div>
                  <div class="space-2x"></div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 summary-info">
                     <span class="first">
                     Alıcı adresi
                     </span>
                     <span class="last" id="span-receiver-address">İçmeler Mh. Yılmaz Sk.  No: 2 D: 2 Tuzla İstanbul</span>
                  </div>
                  <div class="space-2x"></div>
                  <div class="table-responsive col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <table class="table module" id="table-shipment-detal-modal">
                        <tbody>
                           <tr>
                              <td width="530">
                                 <div class="summary-info"><span class="first">Gönderi Türü</span><span class="last" id="span-shipment-type">Dosya/Evrak</span></div>
                              </td>
                              <td width="200" align="center"><span class="grey"><span></span></span></td>
                           </tr>
                           <tr class="table-space">
                              <td></td>
                           </tr>
                           <tr>
                              <td width="530">
                                 <div class="summary-info tooltip-table">
                                    <span class="first">Gönderi Tipi</span><span class="last"> STANDART</span>
                                    <div class="tooltip-wrap left">
                                       <a href="#" data-toggle="popover" data-content="Tüm Türkiye Standart Taşıma Hizmeti.
                                          " data-original-title="" title="">
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
                              </td>
                            </tr>
                           <tr class="table-space">
                              <td></td>
                           </tr>
                           <tr class="table-space">
                              <td></td>
                           </tr>
                           <tr>
                              <td width="530">
                                 <div class="summary-info tooltip-table">
                                    <span class="first">Alım Tipi</span><span class="last">Gönderiyi Şubeye Kendim Getireceğim</span>
                                    <div class="tooltip-wrap left">
                                       <a href="#" data-toggle="popover" data-content="Kargonuzu adresinize gelecek kuryemize teslim ederek gönderi yapmak için seçiniz" data-original-title="" title="">
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
                              </td>
                                </tr>
                           <tr class="table-space">
                              <td></td>
                           </tr>
                           <tr>
                              <td width="530">
                                 <div class="summary-info tooltip-table">
                                    <span class="first">Teslimat Tipi</span><span class="last">Alıcının Adresine Teslim Edilsin</span>
                                    <div class="tooltip-wrap left">
                                       <a href="#" data-toggle="popover" data-content="Gönderinin, alıcının belirttiğiniz adresine ulaştırılıp adreste teslim edilmesi hizmetidir." data-original-title="" title="">
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
                              </td>
                                </tr>
                           <tr class="table-space">
                              <td></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 summary-info">
                     <div class="space-2x"></div>
                     <span class="first">
                     Kampanya Kod
                     </span>
                     <span class="last" id="span-campaign-key">120101</span>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 summary-info">
                     <div class="space-2x"></div>
                     <span class="first">
                     Çıkış YK Şubesi
                     </span>
                     <span class="last" id="span-departure-unit-name">MERKEZ</span>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 summary-info">
                     <div class="space-2x"></div>
                     <span class="first">
                     Varış Şubesi
                     </span>
                     <span class="last" id="span-arrival-unit-name">İÇMELER</span>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 summary-info">
                     <div class="space-2x"></div>
                     <span class="first">
                     Ücrete Esas Ağırlık
                     </span>
                     <span class="last" id="span-kg-ds">0</span>
                  </div>
                  <div class="space-2x"></div>
                  <div class="table-responsive col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <table class="table module">
                        <tbody>
                           <tr>
                              <td>
                                 <div class="summary-info">
                                    <span class="last">Toplam tutar</span>
                                 </div>
                              </td>
                              <td align="center">
                                 <span class="grey">
                                 <span id="span-total-price">8.28 <span> ₺</span></span>
                                 </span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="summary-info">
                                    <span class="last">KDV tutarı</span>
                                 </div>
                              </td>
                              <td align="center">
                                 <span class="grey">
                                 <span id="span-vat">1.49 <span> ₺</span></span>
                                 </span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="summary-info">
                                    <span class="last bold">KDV’li Toplam tutar</span>
                                 </div>
                              </td>
                              <td align="center">
                                 <span class="grey">
                                 <span id="span-total-price-with-vat">9.77 <span> ₺</span></span>
                                 </span>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <div class="modal-footer"></div>
         </div>
      </div>
   </div>
</div>
<!-- end bootstrap model -->
<script type="text/javascript">
   $(document).ready(function($){
      $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
   
   
      $('body').on('click', '.faplus', function () {
          var id = $(this).data('id');           
          // ajax
          $.ajax({
              type:"POST",
              url: "{{ url('account/corporate') }}",
              data: { id: id },
              dataType: 'json',
              success: function(res){
                $('#ajax-book-model').modal('show');
                $('span#title').html( res.id );
                $('#id').val(res.id);
                $('#title').val(res.id);
                $('#code').val(res.id);
             }
          });
      });
    
   });
</script>
</body>
</html>
@endsection