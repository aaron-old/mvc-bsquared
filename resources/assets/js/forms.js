/*--------------------------------

 File Name: Forms.js
 Date: 2016 28 2016
 Author: Aaron Young
 Modified By:
 Modified Date:
 Notes:
 -----------------------------------*/

/**
 * 
 * @type {{post}}
 */
BSQUARED.Forms = (function(){

    /**
     * PRIVATE VARIABLE & METHODS
     */

    var ajaxSetup;
    var portfolioSuccess;
    var portfolioError;

    /**
     * PUBLIC METHODS
     */
    return {
        
        /**
         * 
         * @param type
         * @param url
         * @param data
         */
        post: function(type, url, data){
            $.ajaxSetup({
                headers:{'X-CSRF-TOKEN': $('input[name="_token"]').val()}
            });
            $.ajax({
                method: type,
                url: url,
                data: data,
                datatype: "json",
                cache:false,
                success: function(data){
                    console.log(data);
                    BSQUARED.Notifications.sendSuccessNotification();
                },
                error: function(data){
                    console.log(data);
                    BSQUARED.Notifications.sendErrorNotification();
                }

            }).done(function(data){
                console.log(data);
            });
        },
        
        
        postFiles : function(type, url, data){
            $.ajaxSetup({
                headers:{'X-CSRF-TOKEN': $('input[name="_token"]').val()}
            });
            $.ajax({
                method:type,
                url:url,
                data: data,
                datatype: "json",
                cache:false,
                processData: false,
                contentType: false,
                success: function(){
                    console.log('alert the user');
                    BSQUARED.Notifications.sendSuccessNotification();
                },
                error: function(){
                    console.log('alert the user');
                    BSQUARED.Notifications.sendErrorNotification();
                }
            })
        },

        uploadFiles: function(event, data){

            
        }
    }
})();
