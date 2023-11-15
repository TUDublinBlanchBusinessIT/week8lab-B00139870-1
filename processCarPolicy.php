<?php

date_default_timezone_set('Europe/Dublin');
include("CarPolicy2.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $policyNumber = $_POST["policyNumber"];
    $yearlyPremium = $_POST["yearlyPremium"];
    $dateOfLastClaim = $_POST["dateOfLastClaim"];


    $userCarPolicy = new CarPolicy($policyNumber, $yearlyPremium);
    $userCarPolicy->setDateOfLastClaim($dateOfLastClaim);

 
    $initialPremium = $userCarPolicy->getTotalYearsNoClaims();
    $discountedPremium = $userCarPolicy->getDiscountedPremium();


    echo "Policy Number: $policyNumber\n";
    echo "Initial Premium: $" . $initialPremium . "\n";
    echo "Discounted Premium: $" . $discountedPremium . "\n";
} else {
    echo "Invalid request method.";
}

?>
