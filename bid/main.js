jQuery(document).delegate('a.add-record', 'click', function(e) {
  e.preventDefault();    
  var content = jQuery('#sample_table tr'),
  size = jQuery('#tbl_posts >tbody >tr').length + 1,
  element = null,    
  element = content.clone();
  element.attr('id', 'rec-'+size);
  element.find('.delete-record').attr('data-id', size);
  element.appendTo('#tbl_posts_body');
  element.find('.sn').html(size);
});

jQuery(document).delegate('a.delete-record', 'click', function(e) {
  e.preventDefault();    
  var didConfirm = confirm("Bu hizmeti silmek istediğinize emin misniz?");
  if (didConfirm == true) {
   var id = jQuery(this).attr('data-id');
   var targetDiv = jQuery(this).attr('targetDiv');
   jQuery('#rec-' + id).remove();
   
 //regnerate index number on table
 $('#tbl_posts_body tr').each(function(index) {
   //alert(index);
   $(this).find('span.sn').html(index+1);
 });
 return true;
} else {
 return false;
}
});

$(document).ready(function(){
  $("#price").on("click",function(){
  var sayi1=Number($("#s1").val());
  var sayi2=Number($("#s2").val());
  var toplam=sayi1+sayi2;
  $("#sonuc").val(toplam);
  });
  });