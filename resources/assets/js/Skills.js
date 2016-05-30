/*--------------------------------

 File Name: Skills.js
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
BSQUARED.Skills = (function(){

    var url = window.location.pathname;
    var $post = {};
    var destination_id;
    
    return {
        
        init:function(){

            $('#txtSkillLabel').focus();
            $('#fileSkillsIcon').hide();
            $('#fileResume').hide();
            
            $('#skills_DestinationID').on('change').on('click', function(){
                
               destination_id = $('#destination_id').find('option:selected');
                
            });

            $('#btnSubmitSkill_Column_Label_Image').on('click', function(event){
                event.preventDefault();
                
                $post.label = $('#label').val();
                $post.column =$('#column_text').val();

                BSQUARED.Forms.post("POST", url, $post);
            });
            
            $('#btnAddResume').on('click', function(event){
                event.preventDefault();
                $('#fileResume').click();
            });
            
            $('#btnAddSkillsImage').on('click', function(event){
                event.preventDefault();
                $('#fileSkillsIcon').click();
            })
        }
    }
    
    
})();
