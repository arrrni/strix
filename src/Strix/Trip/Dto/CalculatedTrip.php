<?php

declare(strict_types=1);

namespace Szymczyk\Strix\Trip\Dto;

/**
 * Class CalculatedTrip
 * @package Szymczyk\Strix\Trip\Dto
 */
final class CalculatedTrip
{
    /**
     * @var string
     */
    private $tripName;

    /**
     * @var float
     */
    private $distance;

    /**
     * @var float
     */
    private $interval;

    /**
     * @var int
     */
    private $averageSpeed;

    /**
     * CalculatedTrip constructor.
     *
     * @param string $tripName
     * @param float $distance
     * @param float $interval
     * @param float $averageSpeed
     */
    public function __construct(string $tripName, float $distance, float $interval, float $averageSpeed)
    {
        $this->tripName = $tripName;
        $this->distance = $distance;
        $this->interval = $interval;
        $this->averageSpeed = $averageSpeed;
    }

    /**
     * @return string
     */
    public function getTripName(): string
    {
        return $this->tripName;
    }

    /**
     * @return float
     */
    public function getDistance(): float
    {
        return $this->distance;
    }

    /**
     * @return float
     */
    public function getInterval(): float
    {
        return $this->interval;
    }

    /**
     * @return float
     */
    public function getAverageSpeed(): float
    {
        return $this->averageSpeed;
    }
}
