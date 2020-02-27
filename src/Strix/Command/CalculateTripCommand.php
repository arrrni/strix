<?php

namespace Szymczyk\Strix\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Szymczyk\Strix\Trip\Dto\CalculatedTrip;
use Szymczyk\Strix\Trip\Service\TripResolver;

/**
 * Class CalculateTripCommand
 * @package Szymczyk\Strix\Command
 */
class CalculateTripCommand extends Command
{
    /**
     * @var TripResolver
     */
    private $tripResolver;

    public function __construct(TripResolver $tripResolver)
    {
        parent::__construct('app:calculate-trips');
        $this->tripResolver = $tripResolver;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        try {
            $table = new Table($output);
            $table->setHeaders(['Trip name', 'Distance', 'Measure interval', 'Avg speed']);

            /** @var CalculatedTrip[] $result */
            $result = $this->tripResolver->getCalculatedTrips();

            foreach ($result as $trip) {
                $table->addRow([
                    $trip->getTripName(),
                    $trip->getDistance(),
                    $trip->getInterval(),
                    $trip->getAverageSpeed()
                ]);
            }

            $table->render();
        } catch (\RuntimeException $e) {
            $io->error($e->getMessage());
        }

        return 1;
    }
}
