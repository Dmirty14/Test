<?php
$fi_1 = 0;
$fi_2 = 1;

echo '1. '.$fi_2.'<br>';
for ($i = 2; $i <= 64; $i++) {
    $n = $fi_1;
    $fi_1 = $fi_2;
    $fi_2 = $n + $fi_1;
    echo $i.'. '.$fi_2.'<br>';
}
