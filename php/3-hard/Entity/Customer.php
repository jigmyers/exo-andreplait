<?php

declare(strict_types=1);


namespace App\Entity;

class CustomerEntity
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @param $name
     * @return $this
     */
    public function setName($name): CustomerEntity
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}