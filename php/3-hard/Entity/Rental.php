<?php

declare(strict_types=1);


namespace App\Entity;


class RentalEntity
{
    /**
     * @var int
     */
    private int $customerId;

    /**
     * @var int
     */
    private int $movieId;

    /**
     * @var int
     */
    private int $daysRented;


    /**
     * @param $customer
     * @return $this
     */
    public function setCustomerId($customer): RentalEntity
    {
        $this->customerId = $customer;
        return $this;
    }

    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    /**
     * @param $movieId
     * @return $this
     */
    public function setMovieId($movieId): RentalEntity
    {
        $this->movieId = $movieId;
        return $this;
    }

    /**
     * @return int
     */
    public function getMovieId(): int
    {
        return $this->movieId;
    }

    /**
     * @param $daysRented
     * @return $this
     */
    public function setDaysRented($daysRented): RentalEntity
    {
        $this->daysRented = $daysRented;
        return $this;
    }

    /**
     * @return int
     */
    public function getDaysRented(): int
    {
        return $this->daysRented;
    }
}