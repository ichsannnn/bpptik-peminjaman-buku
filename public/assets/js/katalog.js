$(document).ready(function(){
  $('.button-collapse').sideNav();
  $('.parallax').parallax();
  $('.modal').modal();
  $('#search_form').submit(function(){
    if ($(this).find('input').val()=='') {
      return false;
    }

    else {
      return true;
    }
  });
});
