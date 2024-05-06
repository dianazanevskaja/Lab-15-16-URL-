<!DOCTYPE html>
<html>
<head>
    <title>Умножение чисел</title>
</head>
<body>
    <form method="post">
        <p>Введите первое число: <input type="text" name="num1"></p>
        <p>Введите второе число: <input type="text" name="num2"></p>
        <input type="submit" value="Умножить">
    </form>

    <?php
      $num1 = $_POST['num1'];
      $num2 = $_POST['num2'];  
   if (!is_numeric($num1) || !is_numeric($num2)) {
    echo "Пожалуйста, введите корректные числа.";
} else {   
    $umn = $num1 * $num2;
    
   $min="———————————————————";
   // ———————————————————
      $strlr=strlen((string)max($num1,$num2,$umn,$min));
        $ar = array_map('intval', str_split($num2));
       echo "<h3>Процесс умножения:</h3>";
       echo str_replace(".", "&nbsp;", str_pad($num1, 100-$strlr-strlen((string)$num1), '.', STR_PAD_LEFT));
       echo "<br>";
      
       echo str_replace(".", "&nbsp;", str_pad("*".$num2, 100-$strlr-strlen((string)$num2)-1, '.', STR_PAD_LEFT));
       echo "<br>";
   
      
      echo str_replace(".", "&nbsp;", str_pad($min, 100-$strlr-strlen((string)$min), '.', STR_PAD_LEFT));
      echo "<br>";
    
    if(sizeof($ar)==1)
    {
     echo str_replace(".", "&nbsp;", str_pad($umn, 100-$strlr-strlen((string)$umn), '.', STR_PAD_LEFT));
    }
    else
    {
        $r =1;
for($i=sizeof($ar)-1;$i>=0;$i--)
{
   
    $res = $num1 * $ar[$i]*$r;
    echo str_replace(".", "&nbsp;", str_pad("+".$res, 100-$strlr-strlen((string)$res)-1, '.', STR_PAD_LEFT));
    echo "<br>";
  $r=$r*10;  
}
echo str_replace(".", "&nbsp;", str_pad($min, 100-$strlr-strlen((string)$min), '.', STR_PAD_LEFT));
echo "<br>";
echo str_replace(".", "&nbsp;", str_pad($umn, 100-$strlr-strlen((string)$umn), '.', STR_PAD_LEFT));
echo "<br>";
    }
}
    ?>
</body>
</html>