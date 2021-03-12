<?php // testfunc.php オブジェクトにしてみます
 class Atruction{ 
 	// クラス定義した場合のルール
 			// 1.変数,関数には 修飾子(外部アクセス可=public,不可=plivate)をつける
 			// 2.変数は宣言部分と代入部分(関数内)に別れる
 			// 3.クラス内の変数にアクセスするばあい $this->変数名 の演算子をつける
		private $SUF ;  private	$suf;
	  public $namae ; public $gender; public $tosi ;
		
		public function kosho($n,$g,$t){ //引数は渡した順序で値をもらう 
			$this->SUF= "ちゃん";  $this->suf = "くん"; // 関数外で代入された変数を使う場合はグローバル宣言する
				if($g==1){ //男ならくん,女ならちゃんと出るようにしてください
					echo 	$n.$this->suf ;
				}else{
			  	echo  $n.$this->SUF  ; 
				}
			$this->nenrei($t);	
		}
		public function nenrei($t){   // 年齢12歳以上ならちゃんは乗れます,それ未満は乗れません.
			  // 三項演算子で書いた場合
			 	 echo $t >= 12 ? "は乗れます" : "は乗れません" ;
		}  
 } // end classs
// クラスを使う場合のルール 
 		// 1.new演算子でクラスをインスタンス(実態)化する →オブジェクトを作る
    // 2.変数,関数へのアクセスにはアロー演算子 ->が必要
 $atr = new Atruction(); // オブジェクト作成時には()がほしい,	
  $namae ="つとむ";  $gender = 2; $tosi = 13;
	$atr ->kosho($namae,$gender,$tosi);
	  