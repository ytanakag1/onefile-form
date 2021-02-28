<?php
session_start();

  class hikariNeo{
    public $post = [];
    public $token;

    public function viewForm($id){
      $this->token = $this->token();
      include_once 'view-form.php';
    }

    public function showPost($p){
      $rental = '';
      foreach($p as $key=>$val ){
        if( is_array($val) ){
          //checkBox
          foreach($val as $k => $v )
            $rental .= $v .',';
          
          echo '<li>', $key ,' : ' , $rental;
          $this->post[$key] = htmlspecialchars( $rental ,ENT_QUOTES);
          
        }else{
          $this->post[$key] = htmlspecialchars( $val ,ENT_QUOTES);
          echo '<li>' , $key ,' : ' ,$this->post[$key] ;
        }
      }
    }


    public function mailPost($p){
      $rental = '';
        foreach($p as $key=>$val ){
          if( is_array($val) ){
            //checkBox
            foreach($val as $k => $v )
              $rental .= $v .',';
            
            $this->post[$key] = htmlspecialchars( $rental ,ENT_QUOTES);
            
          }else{
            $this->post[$key] = htmlspecialchars( $val ,ENT_QUOTES);
          }
        }
        $to = '********@gmail.com';
        $subject='お申し込み';
        $body = implode("\n",$this->post);
        $from = '';
        $success = mail($to,$subject,$body);

        if( $success) 
          echo '<p>お申し込み受け付けました｡';
          $_SESSION['token']=null;
          $this->post = [];
    }



    // トークン作成のための関数
    public static function token($length = 20){  	
      return substr(str_shuffle('1234567890QWERTYUIOPLKJHGFDSAZXCVBNMabcdefghijklmnopqrstuvwxyz'), 0, $length);
    }

  }
// end class

//常時読み込まれてる
  $id = hikariNeo::token(8);
  $fm = new hikariNeo();

?>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<?php

  if( isset($_POST['plan'],$_POST['id'],$_POST['token'],$_POST['button']) 
  && $_POST['token'] == $_SESSION['token'][$_POST['id']] 
  &&  $_POST['button'] == '確認へ' ){
    /*
      確認画面
      second
    */
?>

  <div id="second_input">
  <style> form{ display:inline}</style>
   <h3>確認してください</h3>
    <?= $fm -> showPost($_POST); ?>
    <div>
      <button type="button" onclick="prev()">戻る</button>
      <form method="post"><input id="form_regist" type="button" name="button" value="送信"></form>
    </div>
  </div> <!--second-->
  <div id="results"></div>
 
  <script>
<?php  include 'form_regist.js.php';?>
  </script>




<?php
  }elseif( !empty( $_POST['button']) && $_POST['button'] == '送信' ){
   /*
     third 送信がおされてる
   */
   
    $fm -> mailPost($_POST);
?>
  <div id="results"></div>




<?php
  }else{
    /*
      first 未送信
    */
    $_SESSION['token']=null;
    $fm ->viewForm($id);
    $_SESSION['token'][$id] = $fm->token;
?>

  <div id="results"></div>
  <script src="form_submit.js"></script>
<?php

  }

