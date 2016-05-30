/*--------------------------------

 File Name: Bsquared.js
 Date: 2016 28 2016
 Author: Aaron Young
 Modified By:
 Modified Date:
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
    BSQUARED.Portfolio.init();
    BSQUARED.Profile.init();
    BSQUARED.Statement.init();
    BSQUARED.About.init();
    BSQUARED.Skills.init();
    BSQUARED.Works.init();
});
