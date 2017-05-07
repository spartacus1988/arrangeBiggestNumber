<?php

function maxLength($array) 
{
	$maxLength = null;
	$maxLengthIndex = null;

	foreach ($array as $index => $value) 
	{
  		$length = strlen($value);
  		if (is_null($maxLength) || $length > $maxLength) 
  		{
    		$maxLength = $length;
    		$maxLengthIndex = $index;
  		}
	}
	echo 'Самая длинная строка "' . $array[$maxLengthIndex] . '" под номером ' . $maxLengthIndex . '.';
	return $array[$maxLengthIndex];
}






function My_longestLength($str)
{
	$chars = str_split($str);
	print_r($chars);
	echo "<br>";

    $unique_chars = array_unique($chars);
	print_r($unique_chars);
	echo "<br>";

	$result_diff = array_diff_assoc($chars, $unique_chars);
	print_r($result_diff);
	echo "<br>";

	$r = array();
	$prev_key = 0;
	foreach ( $result_diff as $key => $value ) 
	{
	  	echo  "key " . $key . "<br>";
	 	echo  "value " . $value . "<br>";


	  	$output = array_slice($chars, $prev_key, $key-$prev_key); 
	  	print_r($output);
	  	echo "<br>";

	  	$implode_str = implode("", $output);
		print_r($implode_str);
		echo "<br>";

		$r[] = $implode_str;

		$prev_key = $key;
	}

	$last_substr = array_slice($chars, $prev_key); 
	print_r($last_substr);
	echo "<br>";

	$implode_str = implode("", $last_substr);
	print_r($implode_str);
	echo "<br>";

	$r[] = $implode_str;

	print_r($r);
	echo "<br>";

	$prev_value = "";
	foreach ( $r as &$value ) 
	{
		$temp_substr = substr($value, 1); 
		print_r($temp_substr);
		echo "<br>"; 

		if((strlen($prev_value) > 0) && (substr($prev_value, -1) !== substr($value, 0, 1)   ))
		{

			echo "last_sym_prev_value " . substr($prev_value, -1) . "<br>";
			echo "first_sym_value " . substr($value, 0, 1)  . "<br>";

			$value = $prev_value . $value;
		}
		$prev_value = $temp_substr;
	}

	print_r($r);
	echo "<br>";

	$maxLengthString = maxLength($r);
	print_r($maxLengthString);
	echo "<br>";

	return strlen($maxLengthString);
}


	//$input_str = "qweqrtyquiopazzzzzsdfghjklqqx";
	//$input_str = "qweqrtyquiopasdfghjklqqx";
	//$input_str = "qweqrtyquiop";
	$input_str = "qweqrty";
	//$input_str = "abcdeef";
	//$input_str = "jabjcdel";


	echo "longestLength of string ".$input_str." is";
	echo "<br>";
	print_r(My_longestLength($input_str));

?>