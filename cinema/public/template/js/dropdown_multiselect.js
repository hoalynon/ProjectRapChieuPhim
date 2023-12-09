$(function() {
  
  setCheckboxSelectLabels();
  
  $('.toggle-next').click(function() {
    $(this).next('.checkboxes').slideToggle(400);
  });
  
  $('.ckkBox').change(function() {
    setCheckboxSelectLabels(); 
  });
  
});
  
function setCheckboxSelectLabels(elem) {
  var wrappers = $('.wrapper'); 
  $.each( wrappers, function( key, wrapper ) {
    var checkboxes = $(wrapper).find('.ckkBox');
    var label = $(wrapper).find('.checkboxes').attr('id');
    var prevText = '';
    var hasOne = false;
    $.each( checkboxes, function( i, checkbox ) {
      var button = $(wrapper).find('#dropdown_button');
      if( $(checkbox).prop('checked') == true) {
        var text = $(checkbox).next().html();
        var btnText = prevText + text;
        var numberOfChecked = $(wrapper).find('input.val:checkbox:checked').length;
        if(numberOfChecked >= 4) {
           btnText = numberOfChecked +' '+ label + ' được chọn';
        }
        $(button).text(btnText); 
        prevText = btnText + ', ';
        hasOne = true;
      }
    });
    if (hasOne == false){
      ($(wrapper).find('#dropdown_button')).text(''); 
    }
  });
}
