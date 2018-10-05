<?php
$in = readline();
$users = [];
while($in !== "login") {
    list($username, $password) = explode (" -> ", $in);
    $users[$username] = $password;
    $in = readline();
}

$log = readline();
$faildCount = 0;
while($log !== "end") {
    list($userLog, $passLog) = explode (" -> ", $log);

    if (array_key_exists($userLog, $users) && $users[$userLog] === $passLog) {
        echo "{$userLog}: logged in successfully" . PHP_EOL;
    } else {
        echo "{$userLog}: login failed" . PHP_EOL;
        $faildCount++;
    }
    $log = readline();
}

echo "unsuccessful login attempts: {$faildCount}";