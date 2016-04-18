<?php

    function magicIncDec($inputValue, $modeDecremental){

    	$i = 0;
    	$j = 0;
    	$dotPosition = 0;
    	$val = floatval($inputValue);
    	$modeDec = $modeDecremental === 'true'? true: false;;
    	$troncatedInputFloat = 0;
    	$coefPosNeg = $val < 0 ? -1 : 1 ;
    	$inputString = strval(abs($val));
    	$inputValueStringArray = str_split($inputString);

    	// Si la valeur d'entrée n'est pas un nombre ou est mal formatée la fonction renvoie 0
		if($val == 0) { return 0; }

		for ($w = 0; $w < count($inputValueStringArray); $w++) {
			if($inputValueStringArray[$w] === "."){
				$dotPosition = $w;
				$i++;
			} else if(intval($inputValueStringArray[$w] < 1)) { 
				$i++; 
			} else {
				$i = 0;
			}
		}

		if($modeDec == true){
			$res = intval($inputString[$i]) * $coefPosNeg - 1;
		} else {
			$res = intval($inputString[$i]) * $coefPosNeg + 1;
		}

		if($j == 0){
			$troncatedInputFloat = floatval((str_split($inputValue)));
		} else {
			$troncatedInputFloat = floatval((str_split($inputValue, $j)));
		}
		

		$res = $i == 0 ? $res * pow(10, $troncatedInputFloat) : $res * (1/pow(10, $i-1));

		return $res;

    }

	echo magicIncDec($_REQUEST['inputValue'], $_REQUEST['modeDecremental']);

?>