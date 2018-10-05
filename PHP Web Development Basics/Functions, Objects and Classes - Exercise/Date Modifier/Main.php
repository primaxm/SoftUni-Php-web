<?php
include "DateModifier.php";
$fdate = readline();
$sdate = readline();

$dateModifier = new DateModifier();
echo $dateModifier->dateDif($fdate, $sdate);