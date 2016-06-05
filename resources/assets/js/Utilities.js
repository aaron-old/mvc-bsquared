/**
 * Created by Aaron Young on 6/3/2016.
 */

BSQUARED.Utilities = (function(){

    
    return {
        
        checkPath : function (url) {
            url = url.slice(1);
            var slash = url.indexOf('/');
            url = url.slice(0, slash);
            return url;
        }
    }
})();
