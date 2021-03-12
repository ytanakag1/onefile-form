<style>body{background:#434;color:#fff}</style>
<div id="first" class="container">
	<h3>プラン名</h3>
		<form method="post">

<?php


	// これを回してラジオボタンを作る
	foreach ($plan as $key => $value) {
	  echo "<label><input type='radio' name='plan' value='$value' required>$value</label>" ;
	}

?>
	<h3>2年割</h3>
	  <label><input type="checkbox" name='nenwari' value="申し込む">申し込む</label>

	<h3>機器レンタル</h3>
		<div class="pr">

<?php

	foreach ($rental as $key => $value) {
	  echo "<label><input type='checkbox' name='rental[]' value='$value'>$value</label>" ;
	}
?>

	  <b class="pa nic_maisu">
	    <input type="number" name="nic_maisu" min="1" max="99" step="1">
	  </b>
	</div>

	<input type="submit" name="btn" value="確認">
	</form>
</div> <!--#first-->
