<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Application\Command;

interface HandlerInterface
{
    public function __invoke(CommandInterface $commandInterface): void;
}
