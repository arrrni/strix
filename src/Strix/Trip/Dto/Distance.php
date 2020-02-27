<?php

declare(strict_types=1);

namespace Szymczyk\Strix\Trip\Dto;

/**
 * Class Distance
 * @package Szymczyk\Strix\Trip\Dto
 */
final class Distance
{
    /**
     * @var float
     */
    private $value;

    /**
     * Distance constructor.
     * @param float $value
     */
    public function __construct(float $value)
    {
        $this->value = $value;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
}
