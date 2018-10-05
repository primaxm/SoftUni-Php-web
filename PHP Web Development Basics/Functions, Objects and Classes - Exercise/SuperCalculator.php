<?php
$command = readline();
$result = [];

while($command !== "finally") {
    switch ($command) {
        case "sum":
            array_push($result, sum());
            break;
        case "multiply":
            array_push($result, multiply());
            break;
        case "divide":
            $div = divide();
            if (is_numeric($div)) {
                array_push($result, $div);
            } else {
                echo "Caught exception: " . PHP_EOL . "Division by zero.";
            }
            break;
        case "subtract":
            array_push($result, subtract());
            break;
        case "factorial":
            array_push($result, factorial());
            break;
        case "root":
            $root = root();
            if (is_numeric($root)) {
                array_push($result, $root);
            } else {
                echo "Caught exception: " . PHP_EOL . "Can't take the root of a negative number";
            }
            break;
        case "power":
            array_push($result, power());
            break;
        case "absolute":
            array_push($result, absolute());
            break;
        case "pythagorean":
            array_push($result, pythagorean());
            break;
        case "triangleArea":
            $area = root();
            if (is_numeric($area)) {
                array_push($result, $area);
            } else {
                echo "Caught exception: " . PHP_EOL . "Can't take the root of a negative number";
            }
            break;
        case "quadratic":
            $qu = quadratic();
            if (is_numeric($qu)) {
                array_push($result, $qu);
            } else {
                echo "Caught exception: " . PHP_EOL . "Division by zero.";
            }
            break;
    }

    $command = readline();
    print_r($result);
}


function sum() {
    $num1 = floatval(readline());
    $num2 = floatval(readline());
    return $num1 + $num2;
}

function multiply() {
    $num1 = floatval(readline());
    $num2 = floatval(readline());
    return $num1 * $num2;
}

function divide() {
    $num1 = floatval(readline());
    $num2 = floatval(readline());
    if ($num2 !== 0) {
        return $num1 / $num2;
    } else {
        return "error";
    }
}

function subtract() {
    $num1 = floatval(readline());
    $num2 = floatval(readline());
    return $num1 - $num2;
}

function factorial() {
    return gmp_fact(floatval(readline()));
}

function root () {
    $num1 = floatval(readline());
    if ($num1 >= 0) {
        return sqrt($num1);
    } else {
        return "error";
    }
}

function power() {
    $num1 = floatval(readline());
    $num2 = floatval(readline());
    return pow($num1, $num2);
}

function absolute() {
    return abs(floatval(readline()));
}

function pythagorean() {
    $num1 = floatval(readline());
    $num2 = floatval(readline());
    return sqrt(pow($num1) + pow($num2));
}
function triangleArea() {
    $num1 = floatval(readline());
    $num2 = floatval(readline());
    $num3 = floatval(readline());

    $p = ($num1+$num2+$num3) / 2;
    $num = $p * ($p-$num1) * ($p-$num2) * ($p-$num3);
    if($num >= 0) {
        return sqrt($num);
    } else {
        return "error";
    }

}

function quadratic() {
    $a = floatval(readline());
    $b = floatval(readline());
    $c = floatval(readline());

    if ($a === 0) {
        return "error";
    } else {
        $d = pow($b - 4 * $a * $c);
        if ($d < 0) {
            return 0;
        } elseif ($d === 0) {
            return -$b/(2 * $a);
        } else {
            $root1 = ($b + sqrt($d)/ (2 * $a));
            $root2 = ($b - sqrt($d)/ (2 * $a));
            return $root1 + $root2;
        }
    }

}