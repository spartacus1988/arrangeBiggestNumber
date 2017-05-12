<?php

function checkConcatTwoNumber($firstNumber, $secondNumber)
{
	$delta = $secondNumber - $firstNumber;
	if($delta == 1)
	{
		return $secondNumber;
	}
	return false;
}

function My_summaryRanges($arr)
{
	$arr_result = array();
	$counter = count($arr);
	$start_val = false;

	//sort($arr);

	//echo "sorted arr is: ";
	//print_r($arr);
	//echo "<br>";

	while($counter--)
	{
		$direct_counter = count($arr) - $counter -1;
		$next_counter_elem = $direct_counter + 1;
		if($next_counter_elem > count($arr) - 1)
		{
			$next_counter_elem = $next_counter_elem - 1;
		}


		$selected_val = checkConcatTwoNumber($arr[$direct_counter], $arr[$next_counter_elem]);

		//echo "selected_val is: ";
		//print_r($selected_val);
		//echo "<br>";
		
		if($selected_val)
		{
			if($start_val !== false)
			{
				//do nothing here!!!
			}
			else 
			{
				$start_val = $arr[$direct_counter];
			}
		}
		else
		{
			$end_value = $arr[$direct_counter];

			if($start_val !== false)
			{
				array_push($arr_result, $start_val . "->" . $end_value);
			}

			$start_val = false;
		}

	}

	echo "Result value is: ";
	print_r($arr_result);
	echo "<br>";

}

//echo "summaryRanges of array [0, 1, 2, 4, 5, 7] ";
//echo "summaryRanges of array [1, 2, 3, 4, 7, 8, 9, 0, 1, 2] ";
//echo "summaryRanges of array [0, 1, 2, 0, 1, 2] ";
echo "summaryRanges of array [8, 7, 6, 5, 1, 2] ";
echo "<br>";
//My_summaryRanges([0, 1, 2, 4, 5, 7]);
//My_summaryRanges([1, 2, 3, 4, 7, 8, 9, 0, 1, 2]);
//My_summaryRanges([0, 1, 2, 0, 1, 2]);
My_summaryRanges([8, 7, 6, 5, 1, 2]);

?>


