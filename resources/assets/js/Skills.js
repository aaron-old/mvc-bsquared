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

    var labelURL  = '/label';
    var columnURL = '/column';
    var imageURL  = '/path';
    var resumeURL = '/resume';

    var destination_id;

    /**
     *
     * @type {{labelDestinationID: number, columnDestinationID: number, imageDestinationID: number, resumeDestinationID: number}}
     */
    var destinations = {
      labelDestinationID    : 1,
        columnDestinationID : 4,
        imageDestinationID  : 1,
        resumeDestinationID : 35
    };

    /**
     *
     * @param label
     * @param column
     * @param image
     * @param resume
     */
    var setDestinations = function(label, column, image, resume){
        destinations.labelDestinationID  = label;
        destinations.columnDestinationID = column;
        destinations.imageDestinationID  = image;
        destinations.resumeDestinationID = resume;

        $('#skillLabelDestinationID').val(destinations.labelDestinationID);
        $('#skillColumnDestinationID').val(destinations.columnDestinationID);
        $('#fileSkillsDestinationID').val(destinations.imageDestinationID);
        $('#fileResumeDestinationID').val(destinations.resumeDestinationID);

        loadValues(labelURL, label);
        loadValues(columnURL, column);
    };

    var loadValues = function(url, destination_id){
        url = url + '/' + destination_id;
        $.ajaxSetup({
            headers:{'X-CSRF-TOKEN': $('input[name="_token"]').val()}
        });
        $.ajax({
            method:"GET",
            url: url,
            datatype: "json",
            cache:false,
            success: function(data){
            },
            error: function(data){
                BSQUARED.Notifications.error_Loading_Notification()
            }
        }).done(function(data){
            if(data.hasOwnProperty('label')){
                $('#txtSkillLabel').val(data.label.label);
            }
            if(data.hasOwnProperty('column')){
                $('#txtAreaSkillsColumn').val(data.column.column_text);
            }
        });
    };

    var getDestinations = function(destination_id){
        switch(destination_id){
            case '1':
                setDestinations(1, 4, 1, 35);
                break;
            case '2':
                setDestinations(2, 5, 2, 35);
                break;
            case '3' :
                setDestinations(3, 6, 3, 35);
                break;
            default:
                setDestinations(1, 4, 1, 35);
        }
    };

    return {

        init:function(){
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
            fileResumeInput.hide();

            labelDestinationID.val(1);
            columnDestinationID.val(4);
            imageDestinationID.val(1);
            resumeDestinationID.val(35);

            loadValues(labelURL, labelDestinationID.val());
            loadValues(columnURL, columnDestinationID.val());

            formSelectDestination.on('change').on('click', function(){
               destination_id = $('#skills_DestinationID').find('option:selected').val();
                getDestinations(destination_id);
            });

            btnSaveSkill.on('click', function(event){
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
