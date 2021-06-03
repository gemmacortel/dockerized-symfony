<?php

namespace App\UI\CLI;

use App\Application\SuspiciousReadingsFinder;
use App\Infrastructure\Repository\ClientRepositoryResolver;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BasicCommand extends Command
{
    protected static $defaultName = 'app:basic-command';

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('This is a basic command');

        return 0;
    }
}

