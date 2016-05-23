/**
 * 
 * @type {{init}}
 */
BSQUARED.LoginForms = (function(){
    
    var email = $('.email');
    var password = $('.password');
    var userIcon = $('.user-icon');
    var passIcon = $('.pass-icon');

    /**
     * 
     */
    return {
        init:function(){
            email.focus(function(){
                userIcon.css('left', '-48px');
            }).blur(function(){
                userIcon.css('left', '0px');
            });
            
            password.focus(function(){
                passIcon.css('left', '-48px');
            }).blur(function(){
                passIcon.css('left', '0px');
            });
        }
    }
})();