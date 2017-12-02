$(document).ready(function(){
  $('.button-collapse').sideNav();
  $('.modal').modal();

  $('ul.tabs').tabs('select_tab', 'tab_id');

  $('#tahun').mask('0000');
  $('#stok').mask('0000',{reverse:false});
  $('#harga').mask('0000000',{reverse:false});
  $('#no_induk').mask('00000000000000000000',{reverse:false});
  $('#no_classification').mask('0000000000',{reverse:false});
  $('#no_klasifikasi').mask('0000000000',{reverse:false});
  $('#no_klasifikasi_edit').mask('0000000000',{reverse:false});
  $('#turunan_no_klasifikasi').mask('0000',{reverse:false});

  $('.js-select-penerbit').select2();
  $('.js-select-bahasa').select2();
  $('.js-select-sumber').select2();
  $('.js-select-rak').select2();
  $('.js-select-format').select2();
  $('.js-select-classification').select2();

  var headheight = $('nav').height()+20;
  var sideheight = window.innerHeight-headheight;
  $('#slide-out').height(sideheight);
  $('#slide-out').perfectScrollbar();

  $(window).resize(function(){
    var headheight = $('nav').height()+20;
    var sideheight = window.innerHeight-headheight;
    $('#slide-out').height(sideheight);
    $('#slide-out').perfectScrollbar('update');
  });

  $('.button-collapse').click(function(){
    var headheight = $('nav').height()+20;
    var sideheight = window.innerHeight-headheight;
    $('#slide-out').height(sideheight);
    $('#slide-out').perfectScrollbar('update');
  });

  $('#barcode-focused').click(function(){
    if ($('#barcode-focused:checked').length>0) {
      $('#barcode').focus();
    }

    else {
      $('#barcode').blur();
    }
  })
});
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
