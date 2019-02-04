<?php


$apps = [];
$apps[] = "7a81b904f63762f00d53c4d79825420efd00f5f9, 2019-01-29T13:12:11, 10.00";
$apps[] = createApplication("m14 5ss", date("Y-m-d\TH:i:s"), 15.25);
$apps[] = createApplication("m14 5ss", date("Y-m-d\TH:i:s"), 15.25);
$apps[] = createApplication("m14 5ss", date("Y-m-d\TH:i:s", strtotime("+1 week")), 15.25);
$apps[] = createApplication("m14 5ss", date("Y-m-d\TH:i:s", strtotime("-1 week")), 15.25);



$apps[] = createApplication("m15 5aa", date("Y-m-d\TH:i:s"), 15.25);
$apps[] = createApplication("m15 5aa", date("Y-m-d\TH:i:s"), 15.25);
$apps[] = createApplication("m14 5sd", date("Y-m-d\TH:i:s", strtotime("+1 week")), 15.25);
$apps[] = createApplication("m14 5gh", date("Y-m-d\TH:i:s", strtotime("-1 week")), 15.25);


assessApplications($apps);


/*
 * @param String $postal_code Hashed Postal code
 * @param Timestamp $timestamp A timestamp in the format ‘year-month-dayThour:minute:second’
 * @param Float $amount Amount in the format ‘pounds.pennies’
 */
function createApplication($postal_code, $timestamp, $amount){
	$postal_code = strtolower($postal_code);
	$postal_code = hash('ripemd160', $postal_code);
	$amount = number_format((float)$amount, 2, '.', '');
	return $postal_code . ", " . $timestamp . ", " . $amount;
}

function assessApplications($list){
	print("INPUT ========>");
	print_r($list);


	$formatted = [];

	//extract values from string
	foreach($list as $k=>$i){
		$ls = explode(",", $i);
		$hash = trim($ls[0]);
		$x['timestamp'] = DateTime::createFromFormat("Y-m-d\TH:i:s", trim($ls[1]));
		$x['amount'] = trim($ls[2]);
		$formatted[$hash][] = $x;
	}


	print("Formatted ========>");
	print_r($formatted);

	$fraudulent = [];
	$tmp = [];
	foreach($formatted as $i){
		if(sizeof($i) > 1){
			//if size higher than 1, user has multiple applications
			//these must now be assessed for fraud
		}
	}

	print("OUTPUT ========>");
}

/*
 * Test for 24 hour overlap of two given dates
 * @return boolean true if overlaps
 */
function testOverlap($time1, $time2){
	if($time1->format('d') == $time2->format('d')){
		return true;
	}
	return false;
}





