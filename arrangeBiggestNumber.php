<?php

function compareTwoNumber($firstNumber, $secondNumber)
{
	$xy = $firstNumber . $secondNumber;
	$yx = $secondNumber . $firstNumber;

	if($xy < $yx)
	{
		return $secondNumber;
	}

	if($xy > $yx)
	{
		return $firstNumber;
	}

	if($xy == $yx)
	{
		return $firstNumber;
	}
}


function delElemMass($arr, $selected_val)
{
	$value_to_delete = $selected_val;
	$arr = array_flip($arr);
	unset ($arr[$value_to_delete]);
	$arr = array_flip($arr);
	return $arr;
}


function My_arrangeBiggestNumber($arr)
{
	$concat_value = "";
	while(!empty($arr))
	{
		$selected_val = $arr[0];
		foreach ($arr as &$value) 
		{
			$selected_val = compareTwoNumber($selected_val, $value);
		}

		//print_r($selected_val);
		//echo "<br>";
		unset($value);

		$concat_value = $concat_value . $selected_val;

		//print_r($arr);
		//echo "<br>";

		$arr = delElemMass($arr, $selected_val);
		$arr = array_values($arr);

		//print_r($arr);
		//echo "<br>";
	}

	echo "Result value is: ";
	print_r($concat_value);
	echo "<br>";
}


echo "arrangeBiggestNumber of array [1, 34, 3, 98, 9, 76, 45, 4] ";
echo "<br>";
My_arrangeBiggestNumber([1, 34, 3, 98, 9, 76, 45, 4]);


?>


