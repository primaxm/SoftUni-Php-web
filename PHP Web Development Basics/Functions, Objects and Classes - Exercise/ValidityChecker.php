<?php
list($x1, $y1, $x2, $y2) = array_map("intval", explode(", ", readline()));

distance($x1, $y1, 0, 0);
distance($x2, $y2, 0, 0);
distance($x1, $y1, $x2, $y2);

function distance($x1, $y1, $x2, $y2) {
    if (strpos(sqrt(pow(abs($x1-$x2), 2) + pow(abs($y1-$y2), 2)),'.') === false) {
        echo "{{$x1}, {$y1}} to {{$x2}, {$y2}} is valid" . PHP_EOL;
    } else {
        echo "{{$x1}, {$y1}} to {{$x2}, {$y2}} is invalid" . PHP_EOL;
    }
}