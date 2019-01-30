$('#name_search_value').keypress(function (e) {
  if (e.which == 13) {
  	var str = $(this).attr('name');
    $('input[name = '+str.substring(0,str.search('_value'))+']').click();
    return false;  
  }
});
$('#actor_search_value').keypress(function (e) {
  if (e.which == 13) {
  	var str = $(this).attr('name');
    $('input[name = '+str.substring(0,str.search('_value'))+']').click();
    return false;  
  }
});