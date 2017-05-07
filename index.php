<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	//header('Location: '.$uri.'/dashboard/');

	//echo "Hello";
	//echo "<br>";




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
	$firstMass = getDigmass($firstNumber);
	$secondMass = getDigmass($secondNumber);

	$firstLenght = getLength($firstNumber);
	$secondLenght = getLength($secondNumber);
	

	$lenght = getMinLenght($firstLenght, $secondLenght);

	// поразрядное сравнение
	for ($i = 0; $i < $lenght; $i++)  
  	{
    	if($firstMass[$i] > $secondMass[$i])
		{
			return $firstNumber;
		}

    	if($firstMass[$i] < $secondMass[$i])
		{
			return $secondNumber;
		}
  	}

  	$shorterNumber = getShorterNumber($firstNumber, $secondNumber);
  	return $shorterNumber;
}

function My_arrangeBiggestNumber($arr)
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


	print_r($arr);
	echo "<br>";


	$value_to_delete = $selected_val;
	$arr = array_flip($arr);
	unset ($arr[$value_to_delete]);
	$arr = array_flip($arr);
	
	print_r($arr);
	echo "<br>";


	$array = array ('фигня' , 'ботва' , 'ерунда') ; //Массив для примера
 
	$value_to_delete = 'фигня' ; //Элемент с этим значением нужно удалить
	$array = array_flip($array); //Меняем местами ключи и значения
	unset ($array[$value_to_delete]) ; //Удаляем элемент массива
	$array = array_flip($array); //Меняем местами ключи и значения
 
	print_r ($array) ; //Распечатываем массив
	echo "<br>";

}


//echo "arrangeBiggestNumber of array [1, 34, 3, 98, 9, 76, 45, 4] is ";
//echo "<br>";
//print_r(arrangeBiggestNumber([1, 34, 3, 98, 9, 76, 45, 4]));


My_arrangeBiggestNumber([1, 34, 3, 98, 9, 76, 45, 4]);




//exit;
//Something is wrong with the XAMPP installation :-(
?>


