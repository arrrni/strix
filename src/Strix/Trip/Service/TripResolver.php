<?php

declare(strict_types=1);

namespace Szymczyk\Strix\Trip\Service;

use Szymczyk\Doctrine\Repository\TripRepository;

/**
 * Class TripResolver
 * @package Szymczyk\Strix\Trip\Service
 */
class TripResolver
{
    /**
     * @var TripRepository
     */
    private $repository;

    /**
     * @var MaximumAverageSpeedCalculator
     */
    private $calculator;

    public function __construct(TripRepository $repository, MaximumAverageSpeedCalculator $calculator)
    {
        $this->repository = $repository;
        $this->calculator = $calculator;
    }

    public function getCalculatedTrips()
    {
        return $this->calculator->calculateTrips(
            $this->repository->findAll()
        );
    }
}
