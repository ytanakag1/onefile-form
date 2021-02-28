<div class="first_input">
  <style>label { display: block}</style>
  <h3>プラン名</h3>
    <form method="post">

<?php
$plan = ['光ネオEXA ファミリー'
,'光ネオEXA ハイスピード'
,'光ネオEXA ギガライン'
,'光ネオEXA ギガスマート'];

// これを回してラジオボタンを作る
foreach ($plan as $key => $value) {
  echo "<label><input type='radio' name='plan' value='$value' required>$value</label>" ;
}

?>

    <h3>2年割</h3>
    <label><input type="checkbox" name="nenwari" value="申し込む">申し込む</label>

    <h3>機器レンタル</h3>
    <div class="pr">
      <?php

$rental = ['1G無線LANルータ (東日本のみ)','無線LANカード','HGW本体'];
foreach ($rental as $key => $value) {
  echo "<label><input type='checkbox' name='rental[$key]' value='$value'>$value</label>" ;
}

 
?> 
      <input type="hidden" name="id" value="<?=$id?>">
      <input type="hidden" name="token" value="<?=$this->token?>">
      <b class="pa nick-maisu">
        <input type="number" name="nick-maisu" min="1" max="99" step="1">
      </b>
    </div>
    <p><input type="submit" id="form_submit" name="button" value="確認へ"> </p>

  </form>
</div><!--fm-->
