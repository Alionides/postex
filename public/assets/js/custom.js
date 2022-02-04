$( document ).ready(function() {

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.logout').click('onclick',function(){

    $.ajax({
        type: 'post',
        url: 'logout',
        success: function(response) {
            console.log(response);
            if(response.logout == true){
                window.location.href = "/";
            }else{
                
            }                     
        },
        error: function(response) {                    
        }
    });   
})

})

