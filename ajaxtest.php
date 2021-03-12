<?php //ajaxtetst.php

	$variable = json_decode($_POST['shohin']);
	// print_r($variable);
	include 'inc-array.php';
	$total = 0;

// var_dump($variable->nenwari);→申し込む
	if( isset($variable->nenwari) ){
		//２年割なら
		// echo $variable->plan;//→ 光ネオEXA ファミリー
	  $total += $plan_price[$variable->plan] * $nenwari;
	}else{
		$total += $plan_price[$variable->plan];
	}

	if(isset($variable->rental)){
		//値があれば配列｡checkBoxが一つ以上on
					
		foreach ($variable->rental as $k => $val){
				if( $val == '無線LANカード' ){
					 $nic_tanka = $rental_price[$val] ; //→ (int)100
					// echo $variable->nic_maisu; → 1 枚とか
					$total += $variable->nic_maisu * $nic_tanka;

				}else{
					$total +=  $rental_price[$val]; //→ 500とか
				}
		} 
	}
				


echo $total;