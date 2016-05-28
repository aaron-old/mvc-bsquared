/*--------------------------------

 File Name: Bsquared.js

 Date:
 Modified:
 Notes:
 -----------------------------------*/

BSQUARED.Portfolio = (function() {

    return {
        init: function(){
            
            $('.carousel').carousel('pause');

            $(".nav ul li a").each(function(){
                $(".active").removeClass("active");
            });
        }
    }
});

(function(){
    BSQUARED.Portfolio.init();
})();