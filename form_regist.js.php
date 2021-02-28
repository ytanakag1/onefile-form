$('.first_input').hide();
   
   function prev(){
     $('.first_input').show();
     $('#results').html('');
   }
    var field_val = <?php echo json_encode($fm->post) ?>;

        var name_attr = $('#form_regist').attr('name');
        var value_attr =  $('#form_regist').val();
        field_val[name_attr] = value_attr;

    $(document).on("click", "#form_regist", function (e) { 
    //送信へ
        $.ajax({
          url: location.href ,
          type: 'POST',
          dataType: 'html',
          data:field_val,
        }).done(function(result, textStatus, jqXHR){
    // 成功の場合処理
          $('#second_input').hide();
          $("#results").html(result);
          console.log(textStatus);
        }).fail(function(jqXHR, textStatus, errorThrown){
          // エラーの場合処理
          $("#results").text("エラーが発生しました。ステータス：" + jqXHR.status);
        });
    });