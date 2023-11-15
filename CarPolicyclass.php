<?php
// create a classes as described in the UML diagram for the CarPolicy Object
class CarPolicy {

    private $policyNumber;
    private $yearlyPremium;
    private $dateOfLastClaim;

//getTotalYearsNoClaims() function
    public function __construct($policyNumber, $yearlyPremium) {
        $this->policyNumber = $policyNumber;
        $this->yearlyPremium = $yearlyPremium;
    }


    public function setDateOfLastClaim($dateOfLastClaim) {
        $this->dateOfLastClaim = $dateOfLastClaim;
    }


    public function getTotalYearsNoClaims() {
        $currentDate = new DateTime();
        $lastDate = new DateTime($this->dateOfLastClaim);
        $interval = $currentDate->diff($lastDate);
        return $interval->format("%y");
    }
//policy number 1234 held by John Smith should retrun "1234: John Smith"

    public function __toString() {
        return $this->policyNumber . ": " . $this->getPolicyHolderName();
    }


    private function getPolicyHolderName() {
        return "John Smith";
    }
}


$carPolicy = new CarPolicy(1234, 1000);
$carPolicy->setDateOfLastClaim("2022-01-01");

echo $carPolicy->__toString() . "\n";
echo "Total Years with No Claims: " . $carPolicy->getTotalYearsNoClaims() . "\n";

?>
