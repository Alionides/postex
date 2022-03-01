
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" />

<style>
body {
    background-color: lightblue;
}

.padding {
    padding: 2rem !important
}

.card {
   margin-bottom: 30px;
    border: none;
    -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
    -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
    box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22)
}

.card-header {
    background-color: #fff;
    border-bottom: 1px solid #e6e6f2
}

h3 {
    font-size: 20px
}

h5 {
    font-size: 15px;
    line-height: 26px;
    color: #3d405c;
    margin: 0px 0px 15px 0px;
    font-family: 'Circular Std Medium'
}

.text-dark {
    color: #3d405c !important
}



</style>



<div id="datadiv" class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding" >
     <div class="card">
         <div class="card-header p-4">
        
            <img src="/assets/img/logo.png" alt="Postex" class="logo" width="178" height="44" />
        
             <div class="float-right" style="margin-bottom: 30px;" >
                 <h3 class="mb-0">Faktura </h3>
                 Tarix: <span id="date"></span>
             </div>
         </div>
         <div   >            
             <div class="table-responsive-sm">
                 <table class="table table-striped">
                     <thead>
                         <tr>
                             <th class="center">#</th>
                             <th>Ad Soyad</th>
                             <th>Təslimat filialı</th>
                             <th class="center">Əlaqə Nömrəsi</th>
                             <th class="right">Çəkisi</th>
                             <th class="right">İzləmə kodu</th>
                         </tr>
                     </thead>
                     <tbody>
                     @foreach ($postex_data as $key => $i)
                         <tr>
                             <td class="center">{{$key+1}}</td>
                             <td class="left strong">{{$i['name'].' '.$i['surname']}}</td>
                             <td class="left">{{$i['receiver_address']}}</td>
                             <td class="right">{{$i['receiver_phone']}}</td>
                             <td class="center">{{$i['weight']}} kq</td>
                             <td class="right">{{$i['tracking_id']}}</td>
                         </tr>
                    @endforeach                     
                     </tbody>
                 </table>
             </div>
      
         </div>
         <div class="card-footer bg-white" style="padding-top:30px; padding-bottom:30px" >
             <p class="mb-0">Sürücü:  {{$postex->driver}}   <span style="margin-left: 150px;;">İmza:_________________</span> <span style="margin-left: 150px;;">M.Y:</span> </p>
         </div>
     </div>
 </div>


 <script>
n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
if(m<10) 
{
    m='0'+m;
}
d = n.getDate();
if(d<10) 
{
    d='0'+d;
}
document.getElementById("date").innerHTML = d + "/" + m + "/" + y;
 </script>

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


 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>