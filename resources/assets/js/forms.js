/*--------------------------------

 File Name: Bsquared.js

 Date:
 Modified:
 Notes:
 -----------------------------------*/

BSQUARED.Forms = (function(){
    
    return {

        post: function(type, url, data){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                }
            });
            $.ajax({
                method: type,
                url: url,
                data: data,
                datatype: "json",
                cache:false,

                success: function(message){
                    BSQUARED.Notifications.sendSuccessNotification();
                }
            }).done(function(message){
                console.log(message['message']);
            });
        
        }
    }
    
})();
