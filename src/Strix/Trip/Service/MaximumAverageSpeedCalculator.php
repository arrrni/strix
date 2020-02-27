<?php

declare(strict_types=1);

namespace Szymczyk\Strix\Trip\Service;

use Szymczyk\Strix\Trip\Dto\CalculatedTrip;
use Szymczyk\Strix\Trip\Dto\Distance;
use Szymczyk\Strix\Trip\Dto\MeasureSection;
use Szymczyk\Strix\Trip\Dto\Trip;

/**
 * Class MaximumAverageSpeedCalculator
 * @package Szymczyk\Strix\Trip\Service
 */
class MaximumAverageSpeedCalculator
{
    /**
     * @param Trip[] $trips
     * @return array
     */
    public function calculateTrips(array $trips): array
    {
        $results = [];

        /** @var Trip $trip */
        foreach ($trips as $trip) {
            $distances = $trip->getDistances();

            $tripName = $trip->getName();
            $measureInterval = $trip->getMeasureInterval();
            $distance = 0;
            $averageSpeed = 0;

            if (count($distances) > 1) {
                $sections = $this->createMeasureSections($distances, $measureInterval);
                $sectionWithMaximumSpeed = $this->getMeasureSectionWithMaximumAverageSpeed($sections);

                $distance = empty($distances) ? null : \end($distances)->getValue();
                $averageSpeed = \floor($sectionWithMaximumSpeed->getAverageSpeed());
            }

            $results[] = new CalculatedTrip($tripName, $distance, $measureInterval, $averageSpeed);
        }

        return $results;
    }

    /**
     * @param Distance ...$distances
     * @param float $interval
     * @return array
     */
    private function createMeasureSections(array $distances, float $interval): array
    {
        $sections = [];

        /** @var Distance $lastDistance */
        foreach ($distances as $key => $lastDistance) {
            if (!isset($distances[$key + 1])) {
                break;
            }

            $startDistance = $lastDistance->getValue();
            $stopDistance = $distances[$key + 1]->getValue();
            $averageSpeed = (3600 * \abs($startDistance - $stopDistance)) / $interval;

            $sections[] = new MeasureSection($startDistance, $startDistance, $averageSpeed);
        }

        return $sections;
    }

    /**
     * @param MeasureSection ...$sections
     * @return MeasureSection|null
     */
    private function getMeasureSectionWithMaximumAverageSpeed(array $sections): ?MeasureSection
    {
        /** @var MeasureSection|null $maximumSpeedSection */
        $maximumSpeedSection = null;

        foreach ($sections as $measureSection) {
            $averageSpeed = $measureSection->getAverageSpeed();

            if ($maximumSpeedSection === null || $maximumSpeedSection->getAverageSpeed() < $averageSpeed) {
                $maximumSpeedSection = $measureSection;
            }
        }

        return $maximumSpeedSection;
    }
}
