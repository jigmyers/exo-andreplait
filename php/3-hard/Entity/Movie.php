<?php

declare(strict_types=1);


namespace App\Entity;


class MovieEntity
{
    /**
     * @var string
     */
    private string $title;

    /**
     * @var int
     */
    private int $priceCode;

    public function setPriceCode(int $code): MovieEntity
    {
        $this->priceCode = $code;
        return $this;
    }

    public function getPriceCode(): int
    {
        return $this->priceCode;
    }

    public function setTitle($title): MovieEntity
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}