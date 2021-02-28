var field_val = {};

$(document).on("click", "#form_submit", function (e) { 
//確認へ
   e.preventDefault();

   $('[type="radio"]:checked' ).each(function(i,e){
     var name_attr = $(e).attr('name');
     var value_attr =  $(e).val();
     field_val[name_attr] = value_attr;
   });
   $('[type="checkbox"]:checked' ).each(function(i,e){
     var name_attr = $(e).attr('name');
     var value_attr =  $(e).val();
     field_val[name_attr] = value_attr;
   });
   $('input:not([type="radio"]):not([type="checkbox"])' ).each(function(i,e){
     var name_attr = $(e).attr('name');
     var value_attr =  $(e).val();
     field_val[name_attr] = value_attr;
   });
   console.log(field_val);
 
   $.ajax({
     url: location.href ,
     type: 'POST',
     dataType: 'html',
     data:field_val,
   }).done(function(result, textStatus, jqXHR){
       $('.first_input').hide();
       $("#results").html(result).show();
       console.log(textStatus);
     }).fail(function(jqXHR, textStatus, errorThrown){
       // エラーの場合処理
       $("#results").text("エラーが発生しました。ステータス：" + jqXHR.status);
     });

});