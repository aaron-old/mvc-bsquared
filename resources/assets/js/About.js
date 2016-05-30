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

    var overviewURL = window.location.pathname;
    var labelURL = '/label/';
    var columnURL = '/column/';
    var imageURL = '/path/';
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

        loadValues(labelURL, label);
        console.log(destinations);
    };
    
    var loadValues = function(url, destination_id){
        url = url+destination_id;
        $.ajaxSetup({
            headers:{'X-CSRF-TOKEN': $('input[name="_token"]').val()}
        });
        $.ajax({
            method:"GET",
            url: url,
            datatype: "json",
            cache:false,
            success: function(data){
                console.log('made');
                console.log('data');

            },
            error: function(data){
                console.log(data);
                BSQUARED.Notifications.error_Loading_Notification()
            }
        }).done(function(data){
            console.log('done');
            $('#txtAboutLabel').val(data.label.label);
            //$('#txtAreaAboutColumn').val(data.column);
        });
        
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
            var labelDestination = $('#aboutLabelDestinationID');
            var firstFieldFocus = $('#txtAbout_Overview');
            var fileInput = $('#fileAboutImage');
            var columnDestination = $('#aboutColumnDestinationID');
            var fileDestination = $('#fileAboutDestinationID');

            var formSelectDestination = $('#about_DestinationID');

            fileInput.hide();
            firstFieldFocus.focus();
            labelDestination.val(22);
            columnDestination.val(7);
            fileDestination.val(22);

            loadValues(labelURL, labelDestination.val());
            //load columns
            //load images

            formSelectDestination.on('change', function(){
                destination_id = $('#about_DestinationID').find('option:selected').val();
                getDestinations(destination_id);
            });

            $('#btnSubmitAbout_Column_Label_Image').on('click', function(event){
                event.preventDefault();
                
                var $postLabel = {};
                var $postColumn = {};
                var $postImage = {};
                
                $postLabel.label = $('#txtAboutLabel').val();
                $postColumn.column = $('#txtAreaAboutColumn').val();
                $postLabel.labelDestinationID = $('#aboutLabelDestinationID').val();
                $postLabel.columnDestinationID = $('#aboutColumnDestinationID').val();

                BSQUARED.Forms.post("POST", labelURL, $postLabel);
                //BSQUARED.Forms.post("POST", columnURL, $postColumn);

            });
            
            $('#btnSubmitAbout_Overview').on('click', function(event){
                event.preventDefault();
                
                 var $post = {};
                
                $post.overview = $('#txtAbout_Overview').val();
                
                BSQUARED.Forms.post("POST", overviewURL, $post);
            });
        }
    }
})();