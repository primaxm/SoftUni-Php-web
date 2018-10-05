<?php
$input = explode(", ", readline());

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>" . PHP_EOL;
echo "<quiz>" . PHP_EOL;
for ($i = 0; $i < count($input); $i += 2) {
    setFormat($input[$i], $input[$i+1]);
}
echo "</quiz>";

function setFormat($question, $answer) {
    echo "  <question>" . PHP_EOL;
    echo "    {$question}" . PHP_EOL;
    echo "  </question>" . PHP_EOL;
    echo "  <answer>" . PHP_EOL;
    echo "   {$answer}" . PHP_EOL;
    echo "  </answer>" . PHP_EOL;
}
