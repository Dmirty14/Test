<?php
$link = mysqli_connect("localhost", "root", "", "test");

$query = 'SELECT * FROM `test`';
if (isset($_GET['filter'])) {
    $query .= ' WHERE ';
    $i = 1;
    $count = count($_GET['filter']);
    foreach ($_GET['filter'] as $key => $val) {
        if ($val[0] == '>' or $val[0] == '<') {
            $query .= "`" . $key . "` " . $val[0] . " ";
            $val = substr($val, 1);
        } else {
            $query .= "`" . $key . "` = ";
        }
        if (is_numeric($val)) {
            $query .= $val;
        } else {
            $query .= "'" . $val . "'";
        }
        if ($count > $i) {
            $query .= ' AND ';
            $i++;
        }
    }
}

// echo $query . "<br>";

$result = mysqli_query($link, $query) or die("Error: " . mysqli_error($link));
$array = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($array);

/*
echo "<pre>";
print_r($array);
echo "</pre>";
*/
?>
