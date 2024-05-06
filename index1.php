<?php
// Загрузка данных из файла CSV
$data = array_map('str_getcsv', file('titanic.csv'));
$columns = array_shift($data);
$passengers = array();
foreach ($data as $row) {
    $passengers[] = array_combine($columns, $row);
}

// Поиск пассажиров по возрасту
function searchByAge($passengers, $age) {
    $results = array();
    foreach ($passengers as $passenger) {
        if ($passenger['Age'] == $age) {
            $results[] = $passenger;
        }
    }
    return $results;
}

// Поиск пассажиров по имени с использованием регулярного выражения
function searchByName($passengers, $name) {
    $results = array();
    $pattern = "/\b$name\S*/i";
    foreach ($passengers as $passenger) {
        if (preg_match($pattern, $passenger['Name'])) {
            $results[] = $passenger;
        }
    }
    return $results;
}

// Получение параметров запроса
$age = isset($_GET['age']) ? $_GET['age'] : '';
$name = isset($_GET['name']) ? $_GET['name'] : '';

// Выполнение поиска
if (!empty($age)) {
    $results = searchByAge($passengers, $age);
} elseif (!empty($name)) {
    $results = searchByName($passengers, $name);
} else {
    $results = $passengers;
}

// Создание HTML-страницы с результатами
$html = '<html>
<head>
    <title>Результаты поиска пассажиров</title>
</head>
<body>
    <h1>Результаты поиска пассажиров</h1>
    <table>
        <tr>
            <th>Имя</th>
            <th>Возраст</th>
            <th>Пол</th>
            <th>Класс</th>
            <th>Выжил</th>
        </tr>';
foreach ($results as $result) {
    $html .= '<tr>
                <td>'.$result['Name'].'</td>
                <td>'.$result['Age'].'</td>
                <td>'.$result['Sex'].'</td>
                <td>'.$result['Pclass'].'</td>
                <td>'.$result['Survived'].'</td>
            </tr>';
}
$html .= '</table>
</body>
</html>';

// Вывод HTML-страницы
echo $html;
?>