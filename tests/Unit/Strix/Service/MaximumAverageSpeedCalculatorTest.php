<?php

declare(strict_types=1);

namespace Szymczyk\Strix\Tests\Unit\Strix\Service;

use PHPUnit\Framework\TestCase;
use Szymczyk\Strix\Trip\Dto\Distance;
use Szymczyk\Strix\Trip\Dto\Trip;
use Szymczyk\Strix\Trip\Service\MaximumAverageSpeedCalculator;

/**
 * Class MaximumAverageSpeedCalculatorTest
 * @package Szymczyk\Strix\Tests\Unit\Strix\Service
 */
class MaximumAverageSpeedCalculatorTest extends TestCase
{
    /**
     * @dataProvider provideTripsData()
     *
     * @param Trip $trip
     * @param string $expectedName
     * @param float $expectedDistance
     * @param int $expectedMeasureInterval
     * @param int $expectedAvgSpeed
     */
    public function testTripCalculation(Trip $trip, string $expectedName, float $expectedDistance,
                                        int $expectedMeasureInterval, int $expectedAvgSpeed): void
    {
        $calculator = new MaximumAverageSpeedCalculator();
        $results = $calculator->calculateTrips([$trip]);
        $result = current($results);

        $this->assertCount(1, $results);
        $this->assertEquals($expectedName, $result->getTripName());
        $this->assertEquals($expectedDistance, $result->getDistance());
        $this->assertEquals($expectedMeasureInterval, $result->getInterval());
        $this->assertEquals($expectedAvgSpeed, $result->getAverageSpeed());
    }

    /**
     * Single trip provider
     * @return array
     */
    public function provideTripsData(): array
    {
        return [
            [
                new Trip(
                    'Trip 1',
                    15,
                    [
                        new Distance(0.0),
                        new Distance(0.19),
                        new Distance(0.5),
                        new Distance(0.75),
                        new Distance(1.0),
                        new Distance(1.25),
                        new Distance(1.5),
                        new Distance(1.75),
                        new Distance(2.0),
                        new Distance(2.25),
                    ]
                ), 'Trip 1', 2.25, 15, 74,
            ],
        ];
    }
}
