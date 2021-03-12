<?php   //06_php/object/hikarineo.php

class neoExa{
	public $post = [] ; //一応配列として初期化しておく

	public function viewForm(){
		//送信画面の始まり
		include_once 'inc-array.php';
		include_once 'view-form.php';
	}

	public function showPost(){
	//確認画面
		include_once 'inc-array.php';

		foreach ($_POST as $key => $value){
		// ↑ これをループしてサニタイズ htmlspecialchars() して表示する
			// var_dump( $input_name[$key] );
			if( isset($input_name[$key]) ){ 
				echo "<h3> $input_name[$key]</h3>";
			}else{
				//キーがなければスキップ
				continue ;
			} 


			if(is_array($value)){
				//checkBoxなら
				foreach ($value as $k => $val){
					$post[$key][$k] = htmlspecialchars($val,ENT_QUOTES);
					echo '<p>', $post[$key][$k];
				}
				
			}else{
				$post[$key] = htmlspecialchars($value,ENT_QUOTES);
				echo '<p>', $post[$key];
			}
		} //roop END

		$this->post = $post; //クラス変数に渡す

		echo '<form method="post">
			<input id="form_regist" type="button" name="button" value="送信">
			</form> <div id="prd"> <!--ここに見積もり結果--> </div>';
	}  // 確認画面 END

}  
// END class

	$neo = new neoExa(); //インスタンス作成
	
	if( !empty($_POST['btn']) && $_POST['btn']=='確認' ){
		//確認画面
		$neo->showPost();


	}elseif( !empty($_POST['btn']) && $_POST['btn']=='送信'){
		//post送信してないので今回はここは書きません

	}else{
		//送信画面の始まり

			$neo->viewForm(); 

	} //送信画面の終わり

?>


<style>label{display:block}.pr{position:relative;}.pa{position:absolute;}.nic_maisu{top: 25px;
left: 142px;}</style>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
				//	↓ json形式 
	var post = '<?= json_encode($neo->post)?>';
	console.log(post);

	$("#form_regist").on("click", function () {
    $.ajax({
      url: 'ajaxtest.php',
      type: "POST",
      dataType: "html",
      data:{shohin: post },
      success: function (res) {
        $('#prd').html(res);
        console.log(res);
      }
    });
  });

</script>