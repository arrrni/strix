<?php

declare(strict_types=1);

namespace Szymczyk\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class TripMeasure
 * @package Szymczyk\Doctrine\Entity
 *
 * @ORM\Table(name="trip_measures")
 * @ORM\Entity
 */
class TripMeasure
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="trip_id", type="integer", nullable=false)
     */
    private $tripId;

    /**
     * @var float
     *
     * @ORM\Column(name="distance", type="decimal", precision=5, scale=2, nullable=false)
     */
    private $distance;

    /**
     * @var Trip
     *
     * @ORM\ManyToOne(inversedBy="measures", targetEntity="Szymczyk\Doctrine\Entity\Trip")
     */
    private $trip;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getTripId(): int
    {
        return $this->tripId;
    }

    /**
     * @return float
     */
    public function getDistance(): float
    {
        return (float)$this->distance;
    }

    /**
     * @return Trip
     */
    public function getTrip(): Trip
    {
        return $this->trip;
    }
}
