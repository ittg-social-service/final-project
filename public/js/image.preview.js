(function($){
  $(function(){
    $('#file').on('change', function () {
      var reader = new FileReader();

        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            $("#image").attr('src', e.target.result); 
        };

        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
   }); // end of document ready

})(jQuery); // end of jQuery name space
