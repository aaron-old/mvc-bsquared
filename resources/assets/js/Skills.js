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
    
    var form      = 'skills';
    
    var labelURL  = '/label';
    var columnURL = '/column';
    var imageURL  = '/path';
    var resumeURL = '/resume';
    
    var destination_id;
    
    var label = $('#txtSkillLabel');
    var column = $('#txtAreaSkillsColumn');

    /**
     *
     * @type {{labelDestinationID: number, columnDestinationID: number, imageDestinationID: number, resumeDestinationID: number}}
     */
    var destinations = {
        labelDestinationID : 1,
        columnDestinationID : 4,
        imageDestinationID  : 1,
        resumeDestinationID : 35
    };
    

    /**
     *
     * @param optionValue
     */
    var setDestinations = function(optionValue){
        destinations.labelDestinationID  = BSQUARED.Destinations.searchLists(form, optionValue, 'labelDestination');
        destinations.columnDestinationID = BSQUARED.Destinations.searchLists(form, optionValue, 'columnDestination');
        destinations.imageDestinationID  = BSQUARED.Destinations.searchLists(form, optionValue, 'image');
        destinations.resumeDestinationID = BSQUARED.Destinations.searchListKeyValue('resume', 'destination_id');

        $('#skillLabelDestinationID').val(destinations.labelDestinationID);
        $('#skillColumnDestinationID').val(destinations.columnDestinationID);
        $('#fileSkillsDestinationID').val(destinations.imageDestinationID);
        $('#fileResumeDestinationID').val(destinations.resumeDestinationID);

        BSQUARED.Forms.loadValues(labelURL, destinations.labelDestinationID, 'label', label);
        BSQUARED.Forms.loadValues(columnURL, destinations.columnDestinationID, 'column', column);
    };

    var getDestinations = function(destination_id){
        switch(destination_id){
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
        }
    };

    return {

        init: function () {
            var firstFieldFocus = $('#txtSkillLabel');
            var fileImageInput = $('#fileSkillsIcon');
            var fileResumeInput = $('#fileResume');
            
            var formSelectDestination = $('#skills_DestinationID');
            var btnSaveSkill = $('#btnSubmitSkill_Column_Label_Image');

            var labelDestinationID = $('#skillLabelDestinationID');
            var columnDestinationID = $('#skillColumnDestinationID');
            var imageDestinationID = $('#fileSkillsDestinationID');
            var resumeDestinationID = $('#fileResumeDestinationID');

            firstFieldFocus.focus();
            fileImageInput.hide();
            fileResumeInput.hide();
            
            labelDestinationID.val(1);
            columnDestinationID.val(4);
            imageDestinationID.val(1);
            resumeDestinationID.val(35);

            BSQUARED.Forms.loadValues(labelURL, labelDestinationID.val(), 'label', label);
            BSQUARED.Forms.loadValues(columnURL, columnDestinationID.val(), 'column', column);


            formSelectDestination.on('change', function () {
                destination_id = $('#skills_DestinationID').find('option:selected').val();
                getDestinations(destination_id);
            });

            btnSaveSkill.on('click', function (event) {
                event.preventDefault();

                var $postLabel = {};
                var $postColumn = {};
                var $postImage = {};
                var $postResume = {};

                $postLabel.label = $('#txtSkillLabel').val();
                $postLabel.labelDestinationID = labelDestinationID.val();

                $postColumn.column = $('#txtAreaSkillsColumn').val();
                $postColumn.columnDestinationID = columnDestinationID.val();


                BSQUARED.Forms.post("POST", labelURL, $postLabel);
                BSQUARED.Forms.post('POST', columnURL, $postColumn);
            });

            $('#btnAddResume').on('click', function (event) {
                event.preventDefault();
                $('#fileResume').click();
            });

            $('#btnAddSkillsImage').on('click', function (event) {
                event.preventDefault();
                $('#fileSkillsIcon').click();
            })
        }
    }
})();
