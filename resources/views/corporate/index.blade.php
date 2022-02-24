@extends('layouts.corporate')
@section('content')            

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
               <td align="center">{{ substr($accept->created_at ,0,10)  }}</td>
               <td align="center">{{ substr($accept->created_at ,0,10)  }}</td>
               <td align="center">{{ $accept->tracking_id}}</td>
               <td align="center">{{ $accept->status }}</td>

               <td align="center" class="border-wrap">
              <div class="dot-border-first">
                <span class="title" id="pop" data-toggle="popover" data-content="{{ $accept->sender_first_name.' '.$accept->sender_last_name }}" data-original-title="" title="">{{ $accept->sender_first_name.' '.$accept->sender_last_name }}</span>
              </div>
              <div class="dot-border-last">
                <span class="title" id="pop" data-toggle="popover" data-content="{{ $accept->receiver_first_name.' '.$accept->receiver_last_name }}" data-original-title="" title="">{{ $accept->receiver_first_name.' '.$accept->receiver_last_name }}</span>
              </div>
               </td>

               <td align="center">{{ $accept->package_type }}</td>
               <td width="20%">
               <a onclick="" title="tıklayınız."> <i style="color:red" class="fas fa-window-close fa-2x"></i> </a>
               <a data-id="909376052773"  title="Gönderi ."> <i style="color:grey" class="fas fa-envelope fa-2x"></i>  </a>
               <a  href="{{route('account.corporate.wherecargo', ['id' => $accept->id])}}" title="Karqom haradadır"><i style="color:orange" class="fas fa-truck fa-2x"></i></a>
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
            <h5 class="blue-title top">Postun xülasəsi</h5>
            <div class="space-2x"></div>
            <div class="row">
               <div class="product-service summary">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 summary-info">
                     <span class="first">
                     Göndərənin  Adı
                     </span>
                     <span class="last" id="span-sender-name"></span>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 summary-info">
                     <span class="first">
                     Çıxış filialı
                     </span>
                     <span class="last" id="span-sender-adress"></span>
                     </div>
                  <div class="space-2x"></div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 summary-info">
                     <span class="first">
                     Alıcının Adı
                     </span>
                     <span class="last" id="span-receiver-name"></span>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 summary-info">
                     <span class="first">
                     Qəbul  filialı
                     </span>
                     <span class="last" id="span-receiver-adress"></span>
                  </div>
                  <div class="space-2x"></div>
                 
                  <div class="space-2x"></div>
                  <div class="table-responsive col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <table class="table module" id="table-shipment-detal-modal">
                        <tbody>
                         
                           <tr class="table-space">
                              <td></td>
                           </tr>
                           <tr>
                              <td width="530">
                                 <div class="summary-info tooltip-table">
                                    <span class="first">Bağlama növü</span><span id="span-package-type" class="last"> </span>
                                    <div class="tooltip-wrap left">
                                       <a href="#" data-toggle="popover" data-content="Bağlama növü." data-original-title="" title="">
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
                     İzləmə Kodu
                     </span>
                     <span class="last" id="span-tracking-id"></span>
                  </div>
                  
                  
                  
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 summary-info">
                     <div class="space-2x"></div>
                     <span class="first">
                     Bağlamanın Çəkisi
                     </span>
                     <span class="last" id="span-kg-ds"></span>
                  </div>
                  
                  
                  <div class="space-2x"></div>




                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                     <div class="space-2x"></div>
                     <span class="last">
                     Ümumi məbləğ
                     </span>
                  </div>
                  
                  
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                     <div class="space-2x"></div>
                     <span id="span-total-price" class="last" ></span>
                  </div>
                  
                  
                  <!-- <div class="table-responsive col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <table class="table module">
                        <tbody>
                           <tr>
                              <td>
                                 <div class="summary-info">
                                    <span class="last">Ümumi məbləğ</span>
                                 </div>
                              </td>
                              <td align="left">
                                 <span class="grey">
                                 
                                 <span id="span-total-price"></span>
                                 </span>
                              </td>
                           </tr>                           
                        
                        </tbody>
                     </table>
                  </div> -->



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
                $('span#span-sender-name').html( res.sender_first_name+' '+res.sender_last_name );
                $('span#span-sender-adress').html( res.sender_address);
                $('span#span-receiver-name').html( res.receiver_first_name+' '+res.receiver_last_name);
                $('span#span-receiver-adress').html( res.receiver_address);
                $('span#span-package-type').html( res.package_type);
                $('span#span-tracking-id').html( res.tracking_id);
                $('span#span-departure-unit-name').html( res.sender_adress);
                $('span#span-arrival-unit-name').html( res.receiver_adress);
                $('span#span-kg-ds').html( res.kg);
                $('span#span-total-price').html( res.price+' &#8380;');
             }
          });
      });
    
   });
</script>
</body>
</html>
@endsection