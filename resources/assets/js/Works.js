/*--------------------------------

 File Name: Bsquared.js
 Date: 2016 28 2016
 Modified By:
 Modified Date:
 Notes:
 -----------------------------------*/

/**
 * 
 * @type {{init}}
 */
BSQUARED.Works = (function(){
    
    var url = window.location.pathname;
    var $post = {};
    var files = {};
    
    
    
    return {
        init : function(){
            $('#fileProjectThumbnail').hide();
            $('#fileProjectDescriptionImage').hide();
            
            $('#txtWorksTitle').focus();
            
            $('#userWorksForm').submit(function(event){
               event.preventDefault();
                
                $post.worksTitle = $('#txtWorksTitle').val();
                $post.description = $('#txtAreaProjectDescription').val();
                $post.link = $('#txtProjectLink').val();
                
                BSQUARED.Forms.post('POST', url, $post);
            });
            
            $('#btnAddProjectThumbnail').on('click', function(){
                event.preventDefault();
                $('#fileProjectThumbnail').click();
            });
            
            $('#btnAddProjectDescriptionImage').on('click', function(event){
                event.preventDefault();
                $('#fileProjectDescriptionImage').click();
            })
        }
    };
})();
