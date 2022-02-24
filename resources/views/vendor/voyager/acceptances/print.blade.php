<div style="width: 100%;padding: 5px;; " id="datadiv">

<div  align="center">
   <p style="text-align: center;margin-bottom: 0;">             
        
   </p>
   <p style="text-align: center;margin-top: 0;"> {{$acceptance[0]->tracking_id}}</p>
   <div style="padding: 10px;  " align="center">{!! DNS1D::getBarcodeSVG($acceptance[0]->tracking_id, 'C39',0.9,50,'black',true) !!}</div>
                                                    
</div>
<div style="width: 100%;display: inline-flex;">
   <div style="display: inline-block;border: 1px solid; position: relative; border-radius: 10px;width: 49%">
      <spam style="
         font-weight: bold;
         position: absolute;
         top: -11px;
         right: 20px;
         background-color: white;">
         GÖNDƏRƏN
      </spam>
      <div style="border: 1px solid; border-radius: 8px;margin: 20px 15px;padding: 7px;position: relative;">
         <spam style="
            font-weight: bold;
            position: absolute;
            top: -11px;
            background-color: white;">
             AD SOYAD
         </spam>
         {{$acceptance[0]->sender_first_name.' '.$acceptance[0]->sender_last_name}}
      </div>
      <div style="border: 1px solid; border-radius: 8px;margin: 20px 15px;padding: 7px;position: relative;">
         <spam style="
            font-weight: bold;
            position: absolute;
            top: -11px;
            background-color: white;">
            ÜNVAN
         </spam>
         {{$acceptance[0]->sender_address}}
      </div>
      <div style="border: 1px solid; border-radius: 8px;margin: 20px 15px;padding: 7px;position: relative;">
         <spam style="
            font-weight: bold;
            position: absolute;
            top: -11px;
            background-color: white;">
            TELEFON
         </spam>
         {{$acceptance[0]->sender_phone}}
      </div>
   
      <div style=" display: flex;">
         <img style="margin: auto;" width="300"  src="/assets/img/logo.png">
      </div>
   </div>
   <div style="display: inline-block;width: 1%"></div>
   <div style="display: inline-block;width: 49%;">
      <div style="border: 1px solid;position: relative; border-radius: 10px;margin-bottom: 15px">
         <spam style="
            font-weight: bold;
            position: absolute;
            top: -11px;
            left: 20px;
            background-color: white;">{{$acceptance[0]->updated_at}}</spam>
         <spam style="
            font-weight: bold;
            position: absolute;
            top: -11px;
            right: 20px;
            background-color: white;">QƏBUL EDƏN</spam>
         <div style="position: relative; border-radius: 8px;margin: 10px 15px;padding: 7px;position: relative;">
            <p style="font-weight: bold;margin-top: 0"> {{$acceptance[0]->receiver_first_name.' '.$acceptance[0]->receiver_last_name}}</p>
            <p>
               FIN: 
               <spam style="font-weight: bold;">{{$acceptance[0]->reciever_fin}}</spam>
            </p>
            <p>
               TELEFON:
               <spam style="font-weight: bold;">{{$acceptance[0]->receiver_phone}}</spam>
            </p>
            <p>
               ÜNVAN:
               <spam style="font-weight: bold;">{{$acceptance[0]->receiver_address}}</spam>
            </p>
            <p style="margin-bottom: 0">
               ÖLKƏ:
               <spam style="font-weight: bold;">Azerbaycan</spam>
            </p>
         </div>
      </div>
      <div style="border: 1px solid;position: relative; border-radius: 10px">
         <spam style="
            font-weight: bold;
            position: absolute;
            top: -11px;
            right: 20px;
            background-color: white;">BAĞLAMA</spam>
         <div style="border: 1px solid; position: relative; border-radius: 8px;margin: 20px 15px;padding: 7px;position: relative;">
            <spam style="
               font-weight: bold;
               position: absolute;
               top: -11px;
               background-color: white;">NÖVÜ</spam>
            {{$acceptance[0]->package_type}}
         </div>
         <div style="border: 1px solid; position: relative; border-radius: 8px;margin: 20px 15px;padding: 7px;position: relative;">
            <spam style="
               font-weight: bold;
               position: absolute;
               top: -11px;
               background-color: white;">ÇƏKİSİ</spam>
            {{$acceptance[0]->kg}}
         </div>
         <div style="border: 1px solid; position: relative; border-radius: 8px;margin: 20px 15px;padding: 7px;position: relative;">
            <spam style="
               font-weight: bold;
               position: absolute;
               top: -11px;
               background-color: white;">QİYMƏT</spam>
            {{$acceptance[0]->price}}
         </div>
    
      </div>
   </div>
   <div style=" clear: both;"></div>
</div>
</div>
                  


<script>

      
  
         
(function () {


   const printContents = document.getElementById('datadiv').innerHTML;
            const originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            window.onafterprint = () => window.close();


})();
           
</script>
                                    



