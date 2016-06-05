/*--------------------------------

 File Name: Bsquared.js

 Date:
 Modified:
 Notes:
 -----------------------------------*/
/**
 * 
 * @type {{init}}
 */
BSQUARED.UserControls = (function (){

    var defaultWorksTitle = '';
    var defaultWorksDescription = '';
    
    var username;

    /**
     *
     * @param event
     */
    var worksHoverEnterHandle = function(event){
        var worksImageSelected = '#' + event.target.id;
        var url = '/works/'+ username + '/' + $(worksImageSelected).attr('alt');
        console.log(url);
        $.ajax({
            method: 'GET',
            url: url,
            cache: false,
            success: function(data){
                if(data.works !== null && data.works.hasOwnProperty('title')){
                    $('#worksTitle').html(data.works.title);
                }
                else {
                    $('#worksTitle').html('Coming Soon!');
                }
                if(data.works!==null && data.works.hasOwnProperty('project_description')){
                    var description = truncateDescription(data.works.project_description);
                    $('#descriptionWorks').html(data.works.project_description);
                }
                else {
                    $('#descriptionWorks').html('Hover over a project to gather a brief description, or click thee image to see the specs!');
                }
            },
            error: function (data){
              console.log(data);
            }
        })
    };

    /**
     *
     * @param event
     */
    var worksHoverLeaveHandle = function (event){
        $('#worksTitle').html('Select a Project').fadeIn("fast");
        $('#descriptionWorks').html('Hover over a project to gather a brief description, or click thee image to see the specs!').fadeIn("fast");
    };

    var truncateDescription = function (description){
        if(description.length > 25){
            description = description.substr(0, description.indexOf(' '));
        }
        description = description+'...';
        return description;
    };

    return {

        init: function (){

            var currentURL = window.location.pathname;
            var userIndex = currentURL.lastIndexOf('/');
            currentURL = currentURL.substr(userIndex+1, currentURL.length);
            username = currentURL;
            
            var worksImageHover = $('.worksImageHover');
            worksImageHover.on('mouseenter', function(event){
                worksHoverEnterHandle(event);
            });

            worksImageHover.on('mouseleave', function(event){
               worksHoverLeaveHandle(event);
            });
        }
    }
})();