<?php
/*try {
    $pdo = new PDO("mysql:host=db;dbname=db", 'user', '123456789');
    $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
    $query = "select * from table_name column_1";
    $result = $pdo->query($query);
    if (!$result) die ("Fatal error");

    echo '<table border="1"><tr><td>Name</td></tr>';
    foreach ($result->fetch_assoc() as $value) {
        echo '<tr><td>'.$value.'</td></tr>';
    }
    echo '</table>';

} catch(PDOExeception $e){

    echo 'Подключение не удалось: ' . $e->getMessage();
}*/


$pdo = new PDO("mysql:host=db;dbname=db", 'user', '123456789');
$pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
$result = $pdo->query('SELECT * FROM `table_name`'); // запрос на выборку
//while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
{
    echo '<p>Запись id='.$row['id'].'. Текст: '.$row['text'].'</p>';// выводим данные
}

















$query = "select * from table_name column_1";








$result = $pdo->query($query);
if (!$result) die ("Fatal error");

echo '<table border="1"><tr><td>Name</td></tr>';
foreach ($result->fetch_assoc() as $value) {
    echo '<tr><td>'.$value.'</td></tr>';
}
echo '</table>';