<?php

date_default_timezone_set('Europe/Dublin');
include("CarPolicy2.php");

$initialPremium = 600;
$myCarPolicy = new CarPolicy("XM123456", $initialPremium);

$myCarPolicy->setDateOfLastClaim("2015-10-10");

echo "Years with no claims: " . $myCarPolicy->getTotalYearsNoClaims() . "\n";
echo "Your initial premium is $" . $initialPremium . "\n";
echo "Your discounted premium is $" . $myCarPolicy->getDiscountedPremium() . "\n";

?>
