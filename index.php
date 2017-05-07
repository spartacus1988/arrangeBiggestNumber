<?php
function arrangeBiggestNumber($arr)
{
	for($i=0;$i<count($arr)-1;$i++)
	{
		for($j=0;$j<count($arr)-$i-1;$j++)
		{
			$xy=$arr[$j].$arr[$j+1];
			$yx=$arr[$j+1].$arr[$j];

			if($xy<$yx)
			{
				$tmp=$arr[$j];
				$arr[$j]=$arr[$j+1];
				$arr[$j+1]=$tmp;
			}
		}
	}

	$result=implode("",$arr);
	return $result; 
}



// функция возвращает кол-во цифр в натуральном числе.
function getLength($number) 
{
    $length = 0;
    if ($number == 0){
        $length = 1;
    } else {
        $length = (int) log10($number)+1;
    }
    return $length;
}

//возращает массив цифр поразрядно
function getDigmass($number) 
{
	$array = array();
	while ($number > 0) 
	{
    	$array[] = $number % 10;
    	$number = intval($number / 10); 
	}
	$array = array_reverse($array);
	return $array;
}


function getMinLenght($firstLenght, $secondLenght) 
{
	if($firstLenght > $secondLenght)
	{
		return $secondLenght;
	}	

	if($firstLenght < $secondLenght)
	{
		return $firstLenght;
	}

	if($firstLenght == $secondLenght)
	{
		return $firstLenght;
	}
}


function getShorterNumber($firstNumber, $secondNumber) 
{
	$firstLenght = getLength($firstNumber);
	$secondLenght = getLength($secondNumber);

	if($firstLenght > $secondLenght)
	{
		return $secondNumber;
	}	

	if($firstLenght < $secondLenght)
	{
		return $firstNumber;
	}

	if($firstLenght == $secondLenght)
	{
		return $firstNumber;
	}
}

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

	// $firstMass = getDigmass($firstNumber);
	// $secondMass = getDigmass($secondNumber);

	// $firstLenght = getLength($firstNumber);
	// $secondLenght = getLength($secondNumber);
	

	// $lenght = getMinLenght($firstLenght, $secondLenght);

	// // поразрядное сравнение
	// for ($i = 0; $i < $lenght; $i++)  
 //  	{
 //    	if($firstMass[$i] > $secondMass[$i])
	// 	{
	// 		return $firstNumber;
	// 	}

 //    	if($firstMass[$i] < $secondMass[$i])
	// 	{
	// 		return $secondNumber;
	// 	}
 //  	}

 //  	$shorterNumber = getShorterNumber($firstNumber, $secondNumber);
 //  	return $shorterNumber;
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

		//определяем самое большое число с минимальными количеством разрядов
		$selected_val = $arr[0];
		foreach ($arr as &$value) 
		{
			$selected_val = compareTwoNumber($selected_val, $value);
		}

		//$selected_val = compareTwoNumber(678453457, 67838);
		print_r($selected_val);
		echo "<br>";
		unset($value);

		$concat_value = $concat_value . $selected_val;

		print_r($arr);
		echo "<br>";

		$arr = delElemMass($arr, $selected_val);
		$arr = array_values($arr);

		print_r($arr);
		echo "<br>";
	}

	echo "Result value is: ";
	print_r($concat_value);
	echo "<br>";

}


echo "arrangeBiggestNumber of array [1, 34, 3, 98, 9, 76, 45, 4] is ";
echo "<br>";
print_r(arrangeBiggestNumber([1, 34, 3, 98, 9, 76, 45, 4]));
echo "<br>";


My_arrangeBiggestNumber([1, 34, 3, 98, 9, 76, 45, 4]);


?>


