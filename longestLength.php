<?php

function My_longestLength($str )
{


	//$chars = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
	$chars = str_split($str);
	print_r($chars);
	echo "<br>";

    $unique_chars = array_unique($chars);
	print_r($unique_chars);
	echo "<br>";


	//$array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
	//$array2 = array("a" => "green", "yellow", "red");
	$result_diff = array_diff_assoc($chars, $unique_chars);
	print_r($result_diff);
	echo "<br>";


	$r = array();
	$prev_key = 0;
	foreach ( $result_diff as $key => $value ) 
	{
	  echo  "key " . $key . "<br>";
	  echo  "value " . $value . "<br>";


	  	$output = array_slice($chars, $prev_key, $key); 
	  	print_r($output);
		echo "<br>";

		$implode_str = implode("", $output);
		print_r($implode_str);
		echo "<br>";

		$r[] = $implode_str;


		$prev_key = $key;


	 //  	$r = array();
		// while ($chars_val = current($chars)) 
		// {
  //   		//if ($chars_val == 'apple') 
  //   		//{
  //       	//	echo key($chars).'<br />';
  //   		//}


		// 	if(key($chars) == $key)
		// 	{
		// 		break;
		// 	}


  //   		next($chars);
		// }
	

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








	// foreach ($unique_chars as $u_value)
	// {
 //    	echo "Значение: " . $u_value . "<br>";
	// }


	// $mystring = 'abc';
	// $findme   = 'a';
	// $pos = strpos($mystring, $findme);

	
	// if ($pos === false) {
 //    	echo "The string '$findme' was not found in the string '$mystring'";
	// } else {
 //    	echo "The string '$findme' was found in the string '$mystring'";
 //    	echo " and exists at position " . $pos;
	// }


	// foreach ($chars as $value)
	// {
 //    	//echo "Значение: " . $value . "<br>";

 //    	$pos = strpos($str, $value);
 //    	echo "The string " . $value . " was found in the string " . $str . " on pos " . $pos . "<br>";


	// }



}


	echo "longestLength of string qweqrty is";
	echo "<br>";
	My_longestLength("qweqrty");

?>