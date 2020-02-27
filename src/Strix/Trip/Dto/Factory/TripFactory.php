<?php

declare(strict_types=1);

namespace Szymczyk\Strix\Trip\Dto\Factory;

use Szymczyk\Doctrine\Entity\Trip as Entity;
use Szymczyk\Doctrine\Entity\TripMeasure;
use Szymczyk\Strix\Trip\Dto\Trip;

/**
 * Class TripFactory
 * @package Szymczyk\Strix\Trip\Dto\Factory
 */
final class TripFactory
{
    /**
     * @param Entity $entity
     * @return Trip
     */
    public static final function createFromTripEntity(Entity $entity): Trip
    {
        $distances = [];

        /** @var TripMeasure $measure */
        foreach ($entity->getMeasures() as $measure) {
            $distances[] = DistanceFactory::createFromTripMeasureEntity($measure);
        }

        return new Trip(
            $entity->getName(),
            $entity->getMeasureInterval(),
            $distances
        );
    }
}
