<?php

class CarPolicy {

    private $policyNumber;
    private $yearlyPremium;
    private $dateOfLastClaim;


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


    public function getDiscount() {
        $yearsNoClaims = $this->getTotalYearsNoClaims();

        if ($yearsNoClaims >= 3 && $yearsNoClaims <= 5) {
            return 0.10; // 10% discount for 3 to 5 years with no claims
        } elseif ($yearsNoClaims > 5) {
            return 0.15; // 15% discount for more than 5 years with no claims
        } else {
            return 0; // No discount for less than 3 years with no claims
        }
    }


    public function getDiscountedPremium() {
        $discount = $this->getDiscount();
        return $this->yearlyPremium * (1 - $discount);
    }


    public function __toString() {
        return $this->policyNumber . ": " . $this->getPolicyHolderName();
    }


    private function getPolicyHolderName() {
        return "John Smith";
    }
}

?>
