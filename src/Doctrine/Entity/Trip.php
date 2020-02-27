<?php

declare(strict_types=1);

namespace Szymczyk\Doctrine\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Trip
 * @package Szymczyk\Doctrine\Entity
 *
 * @ORM\Table(name="trips")
 * @ORM\Entity
 */
class Trip
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20, nullable=false)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="measure_interval", type="integer", nullable=false)
     */
    private $measureInterval;

    /**
     * @var TripMeasure[]
     *
     * @ORM\OneToMany(mappedBy="trip", targetEntity="Szymczyk\Doctrine\Entity\TripMeasure")
     */
    private $measures;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getMeasureInterval(): int
    {
        return $this->measureInterval;
    }

    /**
     * @return TripMeasure[]
     */
    public function getMeasures(): Collection
    {
        return $this->measures;
    }
}
