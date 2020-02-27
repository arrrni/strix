<?php

declare(strict_types=1);

namespace Szymczyk\Strix\Trip\Dto;

/**
 * Class Trip
 * @package Szymczyk\Strix\Trip\Dto
 */
final class Trip
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $measureInterval;

    /**
     * @var Distance[]
     */
    private $distances;

    /**
     * @var int
     */
    private $averageSpeed;

    /**
     * Trip constructor.
     * @param string $name
     * @param float $measureInterval
     * @param Distance[] $distances
     * @param int $averageSpeed
     */
    public function __construct(string $name, float $measureInterval, array $distances, int $averageSpeed = null)
    {
        $this->name = $name;
        $this->measureInterval = $measureInterval;
        $this->distances = $distances;
        $this->averageSpeed = $averageSpeed;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getMeasureInterval(): float
    {
        return $this->measureInterval;
    }

    /**
     * @return Distance[]
     */
    public function getDistances(): array
    {
        return $this->distances;
    }

    /**
     * @return int
     */
    public function getAverageSpeed(): ?int
    {
        return $this->averageSpeed;
    }
}
