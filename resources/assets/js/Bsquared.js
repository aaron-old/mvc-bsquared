/**
 * Created by Aaron Young on 5/21/2016.
 */


// Global Namespace.
var BSQUARED = BSQUARED || {};


BSQUARED.Main = (function () {

    var year;
    year = new Date().getFullYear();

    var btnSubmitTest = $('#test');

    // // A private function which logs any arguments
    // alertYear = function(  ) {
    //     alert(currentYear);
    // };

    return {
        
        // A public function utilizing privates
        init: function() {

            var footerYear = $('#footerYear').html('2014-' + year);
            BSQUARED.Profile.init();

            btnSubmitTest.on('click', function(){
               alert('here');
            });
        }
    };

})();

$(document).ready(function(){
    BSQUARED.Main.init();
});
