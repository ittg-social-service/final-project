

  $(document).ready(function(){
    $('.modal').modal({dismissible: false});
    $(".dropdown-button").dropdown({belowOrigin:true});
    $(".dropdown-button-landing").dropdown({hover:true, belowOrigin:true});
    $('.slider').slider({full_width: true, height:700});
    $(".button-collapse").sideNav();
    $('select').material_select();
    $('.collapsible').collapsible();
  });
