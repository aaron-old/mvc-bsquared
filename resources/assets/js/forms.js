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
    
    var sendPortfolioSuccess = function (){
        BSQUARED.Notifications.sendSuccessNotification();
    };
    
    var sendPortfolioError = function(){
        BSQUARED.Notifications.sendErrorNotification();
    };
    
    var sendLoadError = function(){
        BSQUARED.Notifications.error_Loading_Notification();
    };

    /**
     * 
     * @param data
     * @param elements
     */
    var worksLoad = function (data, elements) {
        
        var x = 0;

        for(x; x < elements.length; x++){
            console.log('loading works');
        }
    };

    /**
     * 
     * @param data
     * @param elements
     */
    var pathLoad = function (data, elements) {
        
        var x = 0;
        
        for(x; x < elements.length; x++){
            
        }
    };

    /**
     * 
     * @param data
     * @param element
     */
    var labelLoad = function (data, element) {
        $(element.selector).val(data.label.label);
    };

    /**
     * 
     * @param data
     * @param element
     */
    var columnLoad = function (data, element) {

        //noinspection JSUnresolvedVariable
        console.log(element);
        $(element.selector).val(data.column.column_text);
    };
    
    /**
     * 
     * @param url
     * @param destination_id
     * @returns {string}
     */
    var makeRESTURL = function(url, destination_id){
        
      return url + '/' +  destination_id
    };

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
                success: function(){
                    sendPortfolioSuccess();
                },
                error: function(data){
                    sendPortfolioError()
                }
                
            }).done(function(data){
                console.log(data);
            });
        },

        /**
         * 
         * @param type
         * @param url
         * @param data
         */
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
                    sendPortfolioSuccess();
                },
                error: function(){
                    sendPortfolioError();
                }
            }).done(function(data){
                console.log(data);
            });
        },

        /**
         * 
         * @param event
         * @param data
         */
        uploadFiles: function(event, data){
        },

        /**
         *
         * @param url
         * @param destination_id
         * @param type
         * @param elements
         */
        loadValues: function(url, destination_id, type, elements){
            
            var route = makeRESTURL(url, destination_id);

            $.ajaxSetup({
                headers:{'X-CSRF-TOKEN': $('input[name="_token"]').val()}
            });
            
            $.ajax({
                method: "GET",
                url: route,
                datatype: "json",
                cache: false,
                success:function(data){
                    switch(type){
                        case "works": 
                            console.log(data);
                            worksLoad(data, elements);
                            break;
                        case "label":
                            console.log(data);
                            labelLoad(data, elements);
                            break;
                        case "column":
                            console.log(data);
                            columnLoad(data, elements);
                            break;
                    }
                },
                error:function(data){
                    sendLoadError(data);
                }
            }).done(function(data){
                console.log(data);
            });
        }
    }
})();
