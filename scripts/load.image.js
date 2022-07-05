
(function(){
    'use strict';

        var inputImage = document.getElementById('image');
        var showImage = document.getElementById('show_img');
        var imgTxt = document.getElementById('img_text');
        var imgContainer = document.getElementById('img_container');
  
        if(showImage){

            var img_data = showImage.getAttribute('data');
           
            if(img_data !== 'false'){
                imgTxt.classList.add('d-none');
                showImage.classList.remove('d-none');
                imgContainer.classList.remove('d-flex');
            }
    
            inputImage.addEventListener('change', displayImage);
    
            function displayImage( input ){
                if(input.target.files && input.target.files[0]){
                    var reader = new FileReader();
    
                    reader.onload = function(element){
                        imgTxt.classList.add('d-none');
                        showImage.classList.remove('d-none');
                        imgContainer.classList.remove('d-flex');
                        showImage.src = element.target.result;
                    }
    
                   reader.readAsDataURL(input.target.files[0]);
                }
            }
        }
        


})();