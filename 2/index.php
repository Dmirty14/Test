<?php
$link = mysqli_connect('localhost', 'user', '', 'test') or die('Error: ' . mysqli_error($link));

mysqli_query($link, 'CREATE TEMPORARY TABLE `books` ( `author` varchar(127) NOT NULL, `book` varchar(127) NOT NULL, PRIMARY KEY (`author`,`book`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8');
$query = 'INSERT IGNORE INTO `books` VALUES (';
for ($i = 0; $i < 100; $i++)
    $query .= '"Автор'.rand(1, 12).' А.А.", "Название'.rand(1, 50).'"),(';

$query = rtrim($query,",(");
mysqli_query($link, $query);

$q = mysqli_query($link, 'SELECT `author`, count(`author`) as count FROM `books` GROUP BY `author` HAVING count(`author`) < 7');
while ($row = mysqli_fetch_array($q))
    echo $row['author'].' - '.$row['count'].'<br>';