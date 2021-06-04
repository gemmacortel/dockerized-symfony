<?php
declare(strict_types=1);


namespace App\Domain;


interface MassageRepositoryInterface
{
    public function getMassagesList(): array;

}