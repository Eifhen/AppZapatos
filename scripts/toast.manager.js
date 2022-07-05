(function(){
    'use strict';
    
    var toast = document.getElementById('delete_toast');
    if(toast){
        var active = toast.getAttribute('data');
        if(active){
            var toast = new bootstrap.Toast(toast);
            toast.show();
        }
    }
    
})();