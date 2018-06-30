$(document).ready(function(){
  $('#valor').maskMoney();
  $("#anunciar").submit(function(){
   var value = $('#valor').maskMoney('unmasked')[0];
   $('#valor').val(value);
 });
});
