<?php
class Fit{
  private $kyori;
  protected $hoken = 35000;
  public static $shaken = "2021/10";
  protected $zei = 35000;

  public function __construct($d){
    @session_start();
    $engin = 'start';
    echo $d;
  }

  public function soko($km){
    if($km > 0 )
    $this->kyori += $km;	
  }

  public function getKyori(){
    return  $this->kyori;
  }
  
  public function kyori(){
    echo  $this->kyori;
  
  }
}
echo Fit::$shaken;

class Lexus extends Fit{
  protected $zei = 80000;

  function getZei(){
    echo $this->zei;
  }
}
$date = date("l");
$lexusA  = new Lexus($date);
$lexusA->soko(50);

echo "<p>レクサスの走行距離";
$lexusA->kyori();
echo "<p>レクサスの重量税";
$lexusA->getZei();

exit;


//クラスを使う方法  インスタンス=クラスのコピー

  $fitA = new Fit();  //new でインスタンスを作る
  $fitA->shaken = '2022/12'; //外から上書き可
  echo $fitA->shaken; //$は先頭にしか付けない
  // echo $fitA->kyori;  //private修飾子は出ない
  // echo $fitA->hoken ; //protectedも外から出せない

  // fitA を55k走らせる
  $fitA->soko(55);  // -> アロー演算子
  $abc = $fitA->getKyori();   //objectとでる
  echo "<p>fitAの走行距離は$abc </p>";
  //echo "<p>fitAの走行距離は$fitA->getKyori() </p>";

  $fitA->soko(20);  //さらに20k走らせる
  ?>  <!--ここからhtml-->
  <p>今日の距離は<?=$fitA->kyori()?></p> 

<?php
  /*
    クラス内変数は メンバ ,プロパティ,オブジェクト変数
    クラス内関数は メソッド 
  */ 
 // 2代目のフィットを fitB として100k 走らせてください
 // 走った距離も表示
 $fitB = new Fit(); 
 $fitB->soko(100);
 echo $fitB->getKyori();
 // こっちの車検日は?
 echo '<p>fitBの車検日は' , $fitB->shaken;

// インスタンスはお互いに分離してる
