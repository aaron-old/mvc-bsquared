/*--------------------------------

 File Name: Statement.js
 Date: 2016 28 2016
 Author: Aaron Young
 Modified By:
 Modified Date:
 Notes:
 -----------------------------------*/

/**
 *
 * @type {{init}}
 */
BSQUARED.Statement = (function(){

    var url = window.location.pathname;
    var pathURL = '/path';
    
    var $post = {};
    
    return {
        
        init: function() {
            
            $('#fileBackgroundImage').hide();
            $('#txtStatement').focus();
            
            $('#fileProfilePhoto').on('change');

            $('#userStatementForm').submit(function(event){
                event.preventDefault();
                $post.statement = $('#txtStatement').val();
                $post.token = $('input[name="_token"]').val();
                var checkedURL = BSQUARED.Utilities.checkPath(url);
                if(checkedURL === 'statement'){
                    BSQUARED.Forms.post('POST', url, $post);
                }
            });

            $('#userBackgroundImageForm').submit(function(event){
               event.preventDefault();
                var data = new FormData($('#userBackgroundImageForm')[0]);
                data.append('destinationID', $('#fileBackgroundImageDestinationID').val());
                BSQUARED.Forms.postFiles('POST', pathURL, data);
            });
            
            $('#btnBackgroundImage').on('click', function(event){
               event.preventDefault(); 
                $('#fileBackgroundImage').click();
            });
        }
    }
})();