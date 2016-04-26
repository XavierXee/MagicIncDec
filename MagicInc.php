<?php

    function magicIncDec($inputValue, $modeDecremental){

    	$i = 0;
    	$j = 0;
    	$val = floatval($inputValue);
    	$modeDec = $modeDecremental === 'true' ? true : false;;
    	$troncatedInput = 0;
    	$coefPosNeg = $val < 0 ? -1 : 1 ;
    	$inputString = strval(abs($val));
    	$inputValueStringArray = str_split($inputString);

    	// Si la valeur d'entrée n'est pas un nombre ou est mal formatée la fonction renvoie 0
		if($val == 0) { return 0; }

		for ($w = 0; $w < count($inputValueStringArray); $w++) {
			if($inputValueStringArray[$w] === "."){
				$i++;
			} else if(intval($inputValueStringArray[$w] < 1)) { 
				$i++; 
			}
		}

		if($inputValueStringArray[0] != '0'){
			$i = 0;
		}

		if($modeDec == true){
			$res = intval($inputString[$i]) * $coefPosNeg - 1;
		} else {
			$res = intval($inputString[$i]) * $coefPosNeg + 1;
		}

		if($res == 0) {
			$res = 0.9 * $coefPosNeg;
		}

		if($i == 0){
			$j = pow(10, count($inputValueStringArray)-1);
		} else {
			$j = 1 / pow(10, $i - 1);
		}

		return $res * $j;

    }

	echo magicIncDec($_REQUEST['inputValue'], $_REQUEST['modeDecremental']);

?>