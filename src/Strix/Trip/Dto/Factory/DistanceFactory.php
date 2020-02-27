<?php

declare(strict_types=1);

namespace Szymczyk\Strix\Trip\Dto\Factory;

use Szymczyk\Doctrine\Entity\TripMeasure;
use Szymczyk\Strix\Trip\Dto\Distance;

/**
 * Class DistanceFactory
 * @package Szymczyk\Strix\Trip\Dto\Factory
 */
final class DistanceFactory
{
    /**
     * @param TripMeasure $entity
     * @return Distance
     */
    public static final function createFromTripMeasureEntity(TripMeasure $entity): Distance
    {
        return new Distance(
            $entity->getDistance()
        );
    }
}
