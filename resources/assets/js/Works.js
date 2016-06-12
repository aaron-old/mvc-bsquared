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
    
    var worksURL =  window.location.pathname;
    var form     = 'works';
    var pathURL  = '/path';

    var destination_id;

    var title = $('#txtWorksTitle');
    var description = $('#txtAreaProjectDescription');
    var link = $('#txtProjectLink');


    /**
     *
     * @type {{previewDestinationID: number, thumbnailDestinationID: number, worksDestinationID: number}}
     */
    var destinations = {
        previewDestinationID     : 25,
        thumbnailDestinationID   : 10,
        worksDestinationID       : 10
    };
    
    /**
     *
     * @param optionValue
     */
    var setDestinations = function(optionValue){
        var worksDestinationID = $('#worksDestinationID');
        
        destinations.worksDestinationID = BSQUARED.Destinations.searchLists(form, optionValue, 'general');
        destinations.thumbnailDestinationID = BSQUARED.Destinations.searchLists(form, optionValue, 'thumbDestination');
        destinations.previewDestinationID = BSQUARED.Destinations.searchLists(form, optionValue, 'previewDestination');

        worksDestinationID.val(destinations.worksDestinationID);
        $('#fileProjectThumbnailDestinationID').val(destinations.thumbnailDestinationID);
        $('#fileProjectDescriptionImageDestinationID').val(destinations.previewDestinationID);
        
        BSQUARED.Forms.loadValues(worksURL+'/'+ worksDestinationID.val(), 
            destinations.worksDestinationID, 'works', [title, description, link]);
    };
    
    var getDestinations = function(destination_id){
        var worksThumbnail = $('#fileProjectThumbnail');
        var worksPreview   = $('#fileProjectDescriptionImage');

        var userIDStart = worksThumbnail.attr('name').lastIndexOf('_');
        var userID = worksThumbnail.attr('name').substr(userIDStart+1);
        switch(destination_id){
            case '1':
                setDestinations(1);
                worksThumbnail.attr('name','works_thumbnail_image_1_user_' +userID );
                worksPreview.attr('name', 'works_preview_image_1_user_'+ userID );
                break;
            case '2':
                setDestinations(2);
                worksThumbnail.attr('name','works_thumbnail_image_2_user_' +userID );
                worksPreview.attr('name', 'works_preview_image_2_user_'+ userID );
                break;
            case '3':
                setDestinations(3);
                worksThumbnail.attr('name','works_thumbnail_image_3_user_' +userID );
                worksPreview.attr('name', 'works_preview_image_3_user_'+ userID );
                break;
            case '4':
                setDestinations(4);
                worksThumbnail.attr('name','works_thumbnail_image_4_user_' +userID );
                worksPreview.attr('name', 'works_preview_image_4_user_'+ userID );
                break;
            case '5':
                setDestinations(5);
                worksThumbnail.attr('name','works_thumbnail_image_5_user_' +userID );
                worksPreview.attr('name', 'works_preview_image_5_user_'+ userID );
                break;
            case '6':
                setDestinations(6);
                worksThumbnail.attr('name','works_thumbnail_image_6_user_' +userID );
                worksPreview.attr('name', 'works_preview_image_6_user_'+ userID );
                break;
            case '7':
                setDestinations(7);
                worksThumbnail.attr('name','works_thumbnail_image_7_user_' +userID );
                worksPreview.attr('name', 'works_preview_image_7_user_'+ userID );
                break;
            case '8':
                setDestinations(8);
                worksThumbnail.attr('name','works_thumbnail_image_8_user_' +userID );
                worksPreview.attr('name', 'works_preview_image_8_user_'+ userID );
                break;
            case '9':
                setDestinations(9);
                worksThumbnail.attr('name','works_thumbnail_image_9_user_' +userID );
                worksPreview.attr('name', 'works_preview_image_9_user_'+ userID );
                break;
            default: 
                setDestinations(1);
                worksThumbnail.attr('name','works_thumbnail_image_1_user_' +userID );
                worksPreview.attr('name', 'works_preview_image_1_user_'+ userID );
        }
    };

    return {
        init : function(){
            var worksDestinationID              = $('#worksDestinationID');
            var descriptionImageDestinationID   = $('#fileProjectDescriptionImageDestinationID');
            var thumbnailImageDestinationID     = $('#fileProjectThumbnailDestinationID');
            var formSelectDestination           = $('#works_DestinationID');

            $('#fileProjectThumbnail').hide();
            $('#fileProjectDescriptionImage').hide();
            $('#txtWorksTitle').focus();
            
            worksDestinationID.val(10);
            descriptionImageDestinationID.val(25);
            thumbnailImageDestinationID.val(10);

            var checkedURL = BSQUARED.Utilities.checkPath(worksURL);

            if(checkedURL === 'works'){
                BSQUARED.Forms.loadValues(worksURL+'/'+worksDestinationID.val(),
                    worksDestinationID.val(), 'works', [title, description, link]);
            }

            formSelectDestination.on('change', function(){
                destination_id = formSelectDestination.find('option:selected').val();
                getDestinations(destination_id);
            });
            
            $('#btnSubmitWorksItem').on('click', function(event){
               event.preventDefault();
                var $post = {};

                $('#userWorkPreviewImageForm').submit();
                $('#userWorkThumbnailForm').submit();
                
                $post.workTitle          = $('#txtWorksTitle').val();
                $post.workDescription    = $('#txtAreaProjectDescription').val();
                $post.workLink           = $('#txtProjectLink').val();
                $post.workDestinationID  = $('#worksDestinationID').val();
                
                BSQUARED.Forms.post('POST', worksURL, $post);
            });

            $('#userWorkThumbnailForm').submit(function(event){
               event.preventDefault();

                var data = new FormData($('#userWorkThumbnailForm')[0]);
                data.append('destinationID', $('#fileProjectThumbnailDestinationID').val());
                data.append('photoValue', $('#works_DestinationID option:selected').val());
                BSQUARED.Forms.postFiles("POST", pathURL, data);
            });
            
            $('#userWorkPreviewImageForm').submit(function(event){
                event.preventDefault();

                var data = new FormData($('#userWorkPreviewImageForm')[0]);
                data.append('destinationID', $('#fileProjectDescriptionImageDestinationID').val());
                data.append('photoValue', $('#works_DestinationID option:selected').val());
                BSQUARED.Forms.postFiles("POST", pathURL, data);
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
