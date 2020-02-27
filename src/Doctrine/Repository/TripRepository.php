<?php

declare(strict_types=1);

namespace Szymczyk\Doctrine\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Szymczyk\Doctrine\Entity\Trip;
use Szymczyk\Strix\Trip\Dto\Factory\TripFactory;

/**
 * Class SpeedCalculatorRepository
 * @package Szymczyk\Doctrine\Repository
 */
class TripRepository
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * DoctrineTripRepository constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return \Szymczyk\Strix\Trip\Dto\Trip[]
     */
    public function findAll(): array
    {
        $trips = [];

        $qb = $this->entityManager->createQueryBuilder();
        $query = $qb->select('t')
            ->from(Trip::class, 't')
            ->getQuery();

        $result = $query->execute();

        /** @var Trip $entity */
        foreach ($result as $entity) {
            $trips[] = TripFactory::createFromTripEntity($entity);
        }

        return $trips;
    }
}
