<?php
function isPrime($number) {
    if ($number < 2) {
        return false;
    }
    
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    
    return true;
}

if (isset($_GET['number'])) {
    $maxNumber = intval($_GET['number']);
    
    if ($maxNumber > 1000) {
        $maxNumber = 1000;
    }
    
    $primeNumbers = [];
    for ($i = 2; $i <= $maxNumber; $i++) {
        if (isPrime($i)) {
            $primeNumbers[] = $i;
        }
    }
    
    echo implode("\n", $primeNumbers);
} elseif (isset($_GET['name'])) {
    $name = htmlspecialchars($_GET["name"]);
    echo 'Привет, ' . $name . '!';
} else {
    echo "Ошибка";
}
?>