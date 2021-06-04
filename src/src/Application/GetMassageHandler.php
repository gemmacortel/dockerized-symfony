<?php
declare(strict_types=1);

namespace App\Application;


use App\Domain\MassageRepositoryInterface;

class GetMassageHandler
{
    /**
     * @var MassageRepositoryInterface
     */
    private $massageRepository;

    public function __construct(MassageRepositoryInterface $massageRepository)
    {

        $this->massageRepository = $massageRepository;
    }

    public function execute(): array
    {
        return $this->massageRepository->getMassagesList();
    }


}