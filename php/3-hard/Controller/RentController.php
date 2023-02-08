<?php

namespace App\Controller;

use App\Entity\CustomerEntity;
use App\Repository\CustomerRepository;
use App\Structure\PriceCodeStructure;

class RentController
{
    /**
     * @var PriceCodeStructure
     */
    private PriceCodeStructure $priceCodeStructure;

    /**
     * @var CustomerRepository
     */
    private CustomerRepository $customerRepository;

    public function __construct(PriceCodeStructure $priceCodeStructure, CustomerRepository $customerRepository)
    {
        $this->priceCodeStructure = $priceCodeStructure;
        $this->customerRepository = $customerRepository;
    }

    /**
     * @param $customerId
     * @return string
     * @Route('rent/{customerId}')
     */
    public function getRentByCustomer($customerId): string {
        /** @var CustomerEntity $customer */
        $customer = $this->customerRepository->find(['id' => $customerId]);
        $customerRentals = $this->rentalRepository->findBy(['customerId' => $customerId]);
        $totalAmount = 0.0;
        $frequentRenterPoints = 0;
        $result = "Rental Record for " . $customer->getName() . "\n";

        foreach ($customerRentals as $customerRental){
            $thisAmount = 0.0;
            $frequentRenterPoints++;
            switch($customerRental->getMovie()->getPriceCode()) {
                case $this->priceCodeStructure::REGULAR:
                    $thisAmount += 2;
                    if($customerRental->getDaysRented() > 2)
                        $thisAmount += ($customerRental->getDaysRented() - 2) * 1.5;
                    break;
                case $this->priceCodeStructure::NEW_RELEASE:
                    $thisAmount += $customerRental->getDaysRented() * 3;
                    if($customerRental->getDaysRented() > 1){
                        $frequentRenterPoints++;
                    }
                    break;
                case $this->priceCodeStructure::CHILDREN:
                    $thisAmount += 1.5;
                    if($customerRental->getDaysRented() > 3) {
                        $thisAmount += ($customerRental->getDaysRented() - 3) * 1.5;
                    }
                    break;
            }

            $result .= "\t" . $customerRental->getMovie()->getTitle() . "\t"
                . number_format($thisAmount, 1) . "\n";
            $totalAmount += $thisAmount;

        }

        $result .= "You owed " . number_format($totalAmount, 1)  . "\n";
        $result .= "You earned " . $frequentRenterPoints . " frequent renter points\n";

        return $result;
    }
}