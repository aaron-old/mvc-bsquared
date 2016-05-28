/*--------------------------------

File Name: Bsquared.js

Date:
Modified:
Notes:
-----------------------------------*/


// Global Namespace.
var BSQUARED = BSQUARED || {};

/**
 * 
 * @type {{init}}
 */
BSQUARED.Main = (function () {
    
    var year = new Date().getFullYear();
    
    return {
        
        // A public function utilizing privates
        init: function() {
            var footerYear = $('#footerYear').html('2014-' + year);


        }
    };

})();

$(document).ready(function(){
    BSQUARED.Main.init();
    BSQUARED.Profile.init();
});
