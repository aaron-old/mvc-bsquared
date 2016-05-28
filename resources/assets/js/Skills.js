/*--------------------------------

 File Name: Bsquared.js

 Date:
 Modified:
 Notes:
 -----------------------------------*/

BSQUARED.Skills = (function(){
    
    var btnSubmitSkills = $('#btnSubmitSkills');
    
    return {
        
        init:function(){
            
            btnSubmitSkills.on('click', function(event){
                event.preventDefault();
                
                var url = window.location.pathname;
                var $post = {};
                
                $post.portion = $('#destination_id').val();
                $post.label = $('#label').val();
                $post.column =$('#column_text').val();

                BSQUARED.Forms.post("POST", url, $post);
            });
        }
    }
    
    
})();
