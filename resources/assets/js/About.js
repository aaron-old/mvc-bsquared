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
BSQUARED.About = (function(){

    /**
     * PRIVATE VARIABLES & METHODS
     * @type {string}
     */

    var url = window.location.pathname;
    var destination_id;
    
    var destinations = {
        labelDestinationID : 22,
        columnDestinationID : 7,
        imageDestinationID: 22
    };
    
    var setDestinations = function(label, column, image) {
        destinations.labelDestinationID = label;
        destinations.columnDestinationID = column;
        destinations.imageDestinationID = image;
        
        $('#aboutLabelDestinationID').val(destinations.labelDestinationID);
        $('#aboutColumnDestinationID').val(destinations.columnDestinationID);
        $('#fileAboutDestinationID').val(destinations.imageDestinationID);
        
        console.log(destinations);
    };
    
    var getDestinations = function(destination_id){
        console.log(destination_id);
        
       switch(destination_id){
           case '1':
               console.log(1);
               setDestinations(22, 7, 22);
               break;
           case '2':
               console.log(2);
               setDestinations(23, 8, 23);
               break;
           case '3' :
               console.log(3);
               setDestinations(24, 9, 24);
               break;
           default:
               console.log('default');
       }
    };
    return {

        init:function(){
            $('#fileAboutImage').hide();
            $('#txtAbout_Overview').focus();
            
            
            $('#about_DestinationID').on('change', function(){

                destination_id = $('#about_DestinationID').find('option:selected').val();
                getDestinations(destination_id);
            });

            $('#btnSubmitAbout_Column_Label_Image').on('click', function(event){
                event.preventDefault();
                
                var $postLabel = {};
                var $postColumn = {};
                var $postImage = {};
                
                var labelURL = '/label';
                var columnURL = '/column';
                var imageURL = '/path';
                
                $postLabel.label = $('#txtAboutLabel').val();
                $postColumn.column = $('#txtAreaAboutColumn').val();
                $postLabel.labelDestinationID = $('#aboutLabelDestinationID').val();
                $postLabel.columnDestinationID = $('#aboutColumnDestinationID').val();

                BSQUARED.Forms.postLabelColumn("POST", labelURL, $postLabel);
                BSQUARED.Forms.postLabelColumn("POST", columnURL, $postColumn);

            });
            
            $('#btnSubmitAbout_Overview').on('click', function(event){
                event.preventDefault();
                
                 var $post = {};
                
                $post.overview = $('#txtAbout_Overview').val();
                
                BSQUARED.Forms.post("POST", url, $post);
            });
        }
    }
})();