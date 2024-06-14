<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Application\Command\Client;

use App\LoansCorp\Loans\Application\Command\CommandInterface;

readonly class AddClientCommand implements CommandInterface
{
    public function __construct(
        private string $firstName,
        private string $lastName,
    ) {}

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }
}
