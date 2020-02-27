<?php

declare(strict_types=1);

namespace Szymczyk\Strix\Trip\Dto;

/**
 * Class MeasureSection
 * @package Szymczyk\Strix\Trip\Dto
 */
final class MeasureSection
{
    /**
     * @var float
     */
    private $start;

    /**
     * @var float
     */
    private $end;

    /**
     * @var float
     */
    private $averageSpeed;

    /**
     * MeasureSection constructor.
     *
     * @param float $start
     * @param float $end
     * @param float $averageSpeed
     */
    public function __construct(float $start, float $end, float $averageSpeed)
    {
        $this->start = $start;
        $this->end = $end;
        $this->averageSpeed = $averageSpeed;
    }

    /**
     * @return float
     */
    public function getStart(): float
    {
        return $this->start;
    }

    /**
     * @return float
     */
    public function getEnd(): float
    {
        return $this->end;
    }

    /**
     * @return float
     */
    public function getAverageSpeed(): float
    {
        return $this->averageSpeed;
    }
}
