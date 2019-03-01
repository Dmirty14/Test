<?php
require 'figures.php';

$figures = [];
for ($i = 0; $i < 50; $i++) {
    switch(rand(1, 3)) {
        case 1:
            $figure = new Rectangle(rand(1, 10), rand(1, 20));
            $figures[] = [$figure->area(), $figure];
            break;
        case 2:
            $figure = new Circle(rand(0, 10));
            $figures[] = [$figure->area(), $figure];
            break;
        case 3:
            $figure = new Pyramid(rand(1, 10), rand(3, 8), rand(1, 20));
            $figures[] = [$figure->area(), $figure];
            break;
        default:
            break;
    }
}

rsort($figures);
foreach ($figures as $figure)
    echo $figure[1]->print().'<br>';