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
    var $post = {};
    var files = {};
    
    
    
    return {

        /**
         *
         */
        init: function() {
            
            $('#fileBackgroundImage').hide();
            $('#txtStatement').focus();
            
            $('#fileProfilePhoto').on('change')

            $('#userStatementForm').submit(function(event){
                event.preventDefault();

                $post.statement = $('#txtStatement').val();
                $post.token = $('input[name="_token"]').val();
                
                BSQUARED.Forms.post('POST', url, $post);
            });
            
            $('#btnBackgroundImage').on('click', function(event){
               event.preventDefault(); 
                $('#fileBackgroundImage').click();
            });


        }
    }
})();