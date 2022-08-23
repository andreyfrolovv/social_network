<?php

$pdo = new PDO("mysql:host=db;dbname=db", 'user', '123456789');
$pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);

function create_table($name, $query)
{
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Таблица '$name' создона или уже существует";
}

function queryMysql($query)
{
    global $connection;
    $result = $connection->query($query);
    if (!$result) die ("Fatal Error");
    return $result;
}

function destroySession()
{
    $_SESSION = array();
    if (session_id() != "" || isset($_COOKIE[session_name()]));
    setcookie(session_name(), '', time()-25920000, '/');

    session_destroy();
}

function sanitizeString($var)
{
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
        $var = stripslashes($var);
    return $connection->real_escape_string($var);
}

function showProfile($user)
{
    if(file_exists("$user.jpg"))
        echo "<img src='$user.jpg' align='left'>";

    $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");

    if ($result->num_rows)
    {
        $row = $result->fetch_array();
        echo stripslashes($row['text']). "<br style='clear: left;'><br>";
    }
    else echo "<p>Здесь пока не ночто смотреть<br>";
}

