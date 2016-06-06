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
    
    var form      = 'about';
    var labelURL  = '/label';
    var columnURL = '/column';
    var imageURL  = '/path';
    
    var destination_id;

    var column = $('#txtAreaAboutColumn');
    var label  = $('#txtAboutLabel');

    /**
     * 
     * @type {{labelDestinationID: number, columnDestinationID: number, imageDestinationID: number}}
     */
    var destinations = {
        labelDestinationID  : 22,
        columnDestinationID : 7,
        imageDestinationID  : 22
    };

    /**
     *
     * @param optionValue
     */
    var setDestinations = function(optionValue) {
        
        destinations.labelDestinationID  = BSQUARED.Destinations.searchLists(form, optionValue, 'labelDestination');
        destinations.columnDestinationID = BSQUARED.Destinations.searchLists(form, optionValue, 'columnDestination');
        destinations.imageDestinationID  = BSQUARED.Destinations.searchLists(form, optionValue, 'image');
        
        $('#aboutLabelDestinationID').val(destinations.labelDestinationID);
        $('#aboutColumnDestinationID').val(destinations.columnDestinationID);
        $('#fileAboutDestinationID').val(destinations.imageDestinationID);

        BSQUARED.Forms.loadValues(labelURL, destinations.labelDestinationID, 'label', label);
        BSQUARED.Forms.loadValues(columnURL, destinations.columnDestinationID, 'column', column);
    };

    /**
     * 
     * @param destination_id
     */
    var getDestinations = function(destination_id){
        switch(destination_id) {
            case '1':
                setDestinations(1);
                break;
            case '2':
                setDestinations(2);
                break;
            case '3' :
                setDestinations(3);
                break;
            default:
                setDestinations(1);
                break;
        }
    };
    
    return {

        init:function(){
            
            var firstFieldFocus = $('#txtAbout_Overview');
            var fileInput = $('#fileAboutImage');
            var aboutLabelDestinationID = $('#aboutLabelDestinationID');
            var fileDestination = $('#fileAboutDestinationID');
            var aboutColumnDestinationID = $('#aboutColumnDestinationID');
            var formSelectDestination = $('#about_DestinationID');
            var btnSaveAbout = $('#btnSubmitAbout_Column_Label_Image');
            var btnSaveOverview = $('#btnSubmitAbout_Overview');
            var btnAboutImage = $('#btnAddAboutImage');

            fileInput.hide();
            firstFieldFocus.focus();
            aboutLabelDestinationID.val(22);
            aboutColumnDestinationID.val(7);
            fileDestination.val(22);
            
            BSQUARED.Forms.loadValues(labelURL, aboutLabelDestinationID.val(), 'label', label);
            BSQUARED.Forms.loadValues(columnURL, aboutColumnDestinationID.val(), 'column', column);
            
            formSelectDestination.on('change', function(){
                destination_id = $('#about_DestinationID').find('option:selected').val();
                getDestinations(destination_id);
            });
            
            btnSaveAbout.on('click', function(event){
                event.preventDefault();
                
                var $postLabel = {};
                var $postColumn = {};
                var $postImage = {};
                var token = $('input[name="_token"]');
                
                $postLabel.label = $('#txtAboutLabel').val();
                $postColumn.column = $('#txtAreaAboutColumn').val();
                $postLabel.labelDestinationID = $('#aboutLabelDestinationID').val();
                $postColumn.columnDestinationID = $('#aboutColumnDestinationID').val();
                $postColumn.token = token.val();
                $postLabel.token = token.val();
                
                BSQUARED.Forms.post("POST", labelURL, $postLabel);
                BSQUARED.Forms.post("POST", columnURL, $postColumn);
                
            });
            
            btnAboutImage.on('click', function(event){
                event.preventDefault();
                fileInput.click();
            });

            btnSaveOverview.on('click', function(event){
                event.preventDefault();
                 var $post = {};
                $post.overview = $('#txtAbout_Overview').val();
                BSQUARED.Forms.post("POST", overviewURL, $post);
            });
        }
    }
})();